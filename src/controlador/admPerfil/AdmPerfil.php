<?php
/**
/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');


include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'Usuario.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'Perfil.php');
include_once(PATH_TABLA . DS . 'TipoUsuario.php');
include_once(PATH_TABLA . DS . 'PerfilOpciones.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLUsuario.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLPerfil.php');
include_once(PATH_MODELO . DS . 'SQLTipoUsuario.php');
include_once(PATH_MODELO . DS . 'SQLPerfilOpciones.php');


include_once( PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');

class AdmPerfil extends Principal {

  public function AdmPerfil() {

    $vista = Principal::getVistaInstance();
    
    $persona = new Persona();
    $usuario = new Usuario();
    $empresa_persona = new EmpresaPersona();
    $perfil = new Perfil();
    $sqlPersona = new SQLPersona();
    $sqlUsuario = new SQLUsuario();
    $sqlEmpresaPersona = new SQLEmpresaPersona();
    $sqlPerfil = new SQLPerfil();
    if($_REQUEST['tarea']=='eliminar'){
        $hoy = date("Y-m-d h:m:s"); 
        $empresa_persona->setId_Empresa_Persona($_REQUEST['id_empresa_persona']);
        $empresa_persona=$sqlEmpresaPersona->getEmpresaPersonaPorID($empresa_persona);
        $empresa_persona->setFecha_Baja($hoy);
        $empresa_persona->setActivo(0);
        if($sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona)){
            //-----------------aqui tengo que reparte las colas solo een el cazo del senavex--------------------------------
              if($_SESSION["tipo_usuario"] =='1') AdmSistemaColas::redistribucionColaAsistente($empresa_persona->getId_persona());
                
                echo '[{"suceso":"0","msg":"Datos guardados Correctamente."}]';
        }else{
                echo '[{"suceso":"1","msg":"Problemas al guardar los datos en empresa_persona"}]';
        }
        exit;
    }
    if($_REQUEST['tarea']=='asignarPerfilPersona')// es par asignarle un perfil a una person aque ya existe
    { 
        $empresa_persona->setId_Persona($_REQUEST['id_persona']);
        $empresa_persona->setId_Empresa($_SESSION['id_empresa']);

        $hoy = date("Y-m-d h:m:s"); 
        $usuario->setId_persona($_REQUEST['id_persona']);
        $usuario=$sqlUsuario->getDatosUsuarioPorIdPersona($usuario);
        $swnuevo_usr = false;
        if($usuario == null && empty($usuario)){
            $perfil->setId_perfil($_REQUEST['id_perfil']);
            $perfil=$sqlPerfil->getBuscarDescripcionPorId($perfil);
       

            //------creamos el usuario y la conteraseña------------------------
            $campousuario=trim(mb_strtoupper($_REQUEST['nombres']));
            $persona = new Persona();
            $persona->setId_persona($_REQUEST['id_persona']);
            $persona = $sqlPersona->getDatosPersonaPorId($persona);
            $campousuario=$campousuario[0].$persona->getNumero_documento();
            $clave=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
            $usuario = new Usuario();
            $usuario->setId_persona($_REQUEST['id_persona']);
            $usuario->setUsuario($campousuario);
            $usuario->setClave($clave);
            $usuario->setActivo(1);
            $usuario->setFecha_creacion($hoy);
            $swnuevo_usr = true;
        }

        if($_SESSION["tipo_usuario"] =='1') { 
            $usuario->setId_tipo_usuario(1);
        } else { 
            $usuario->setId_tipo_usuario(2);
        }
        $sqlUsuario->setGuardarUsuario($usuario);
        
        if($sqlEmpresaPersona->checkEmpresaPersonaPorIdpersonaIdempresa($empresa_persona)=='0')//no existe el perfil lo creamos
        {
           
            //----------- esto es para sacar las opciones segun e perfil que tenga---------
            $perfil->setId_perfil($_REQUEST['id_perfil']);
            $perfil=$sqlPerfil->getBuscarDescripcionPorId($perfil);
            $perfil->getOpciones();
            //--------------------
            $empresa_persona->setId_Persona($_REQUEST['id_persona']);
            $empresa_persona->setId_Empresa($_SESSION["id_empresa"]);
            $empresa_persona->setId_Perfil($_REQUEST['id_perfil']);
            $empresa_persona->setFecha_Vinculacion($hoy);
            $empresa_persona->setOpciones_persona($perfil->getOpciones());
            $empresa_persona->setActivo('1');

            if($sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona)){
                echo '[{"suceso":"0","msg":"Datos guardados Correctamente."}]';
            }else{
                echo '[{"suceso":"1","msg":"Problemas al guardar los datos en empresa_persona"}]';
            }
        }
        elseif($sqlEmpresaPersona->checkEmpresaPersonaPorIdpersonaIdempresa($empresa_persona)=='1')//ya existe el prefil lo modificamos
        {
            $empresa_persona=$sqlEmpresaPersona->getEmpresaPorPersonaEmpresa($empresa_persona);
            $empresa_persona->setActivo('0');
            $empresa_persona->setFecha_Baja($hoy);
            
            if($sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona))
            {
                $nueva_empresa_persona = new EmpresaPersona();
                $nueva_empresa_persona->setId_Persona($_REQUEST['id_persona']);
                $nueva_empresa_persona->setId_Empresa($_SESSION["id_empresa"]);
                $nueva_empresa_persona->setId_Perfil($_REQUEST['id_perfil']);
                $nueva_empresa_persona->setFecha_Vinculacion($hoy);
                $nueva_empresa_persona->setActivo('1');
                //------------ esto es para sacar las opciones segun e perfil que tenga---------
                    $perfil->setId_perfil($_REQUEST['id_perfil']);
                    $perfil=$sqlPerfil->getBuscarDescripcionPorId($perfil);
                    $perfil->getOpciones();
                //--------------------
                $nueva_empresa_persona->setOpciones_persona($perfil->getOpciones());
                if($sqlEmpresaPersona->setGuardarEmpresaPersona($nueva_empresa_persona))
                {
                    echo '[{"suceso":"0","msg":"Datos guardados Correctamente."}]';
                }
                else
                {
                    echo '[{"suceso":"1","msg":"Problemas al guardar los datos."}]';
                }
            }
        }
        else
        {
            echo '[{"suceso":"0","msg":"El perfil ya ha sido asignado anteriormente."}]'; 
        }
        //-------------------enviamos lso correos-------------------------------------------
        switch ($_REQUEST['id_perfil']) 
        {
            //-------------------------exporatadores----------------------
            case 3:  
                if(AdmCorreo::enviarCorreo($_REQUEST['id_persona'],$_SESSION["id_empresa"],'','','',1)) $swenvio=true;
                else $swenvio=false;
                break;//es un rl
            case 4: 
                if($swnuevo_usr){
                    if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],($_SESSION["tipo_usuario"] == 3 ? $_SESSION["nombre"]: $_SESSION["empresa"]),$usuario->getUsuario(),$usuario->getClave(),7)) {
                        $swenvio=true;
                    }
                }else{ 
                    if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],($_SESSION["tipo_usuario"] == 3 ? $_SESSION["nombre"]: $_SESSION["empresa"]),'','',9)){
                        $swenvio=true;
                    }else {
                        $swenvio=false;
                    }
                }
                break;//es un para firmas
            case 12:
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],($_SESSION["tipo_usuario"] == 3 ? $_SESSION["nombre"]: $_SESSION["empresa"]),'','',10)) $swenvio=true;
                else $swenvio=false;
                break;//apoderado
            case 5:  $swenvio=true;
                break;//es un recojo de tramites
            //-------------------------senavex-------------------------------------------
            case 1:  
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',24)) $swenvio=true;
                else $swenvio=false;
                break;//es un adminsitrador del sistema
            case 7: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',25)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 6:
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',26)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 10: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',27)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 8: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',28)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 9: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',29)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 11: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',30)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
        }
        exit;
    }
    if($_REQUEST['tarea']=='opcionesestados'){
        $perfil = new Perfil();
        $sqlPerfil= new SQLPerfil();
        $lista_menu = $sqlPerfil->getListarPerfil($perfil);
        
        $perfilOpciones = new PerfilOpciones();
        $sqlPerfilOpciones = new SQLPerfilOpciones();
        $lista_opciones = $sqlPerfilOpciones->getListaPerfilOpciones($perfilOpciones);
        
        $tipoUsuario = new TipoUsuario();
        $sqlTipoUsuario = new SQLTipoUsuario();
        $lista_tipo_usuario = $sqlTipoUsuario->getListaTipoUsuario($tipoUsuario);
        
        $vista->assign('lista_usuario',$lista_tipo_usuario);
        $vista->assign('lista_opciones',$lista_opciones);
        $vista->assign('lista_menu',$lista_menu);
        $vista->display('admPerfil/editarmenu.tpl');
        exit;
    }
    
    
    if($_REQUEST['tarea']=='guardar_perfilopciones'){
        
        $perfil = new Perfil();
        $sqlPerfil = new SQLPerfil();
        $perfil->setId_perfil($_REQUEST['opciones']);
        $perfil= $sqlPerfil->getBuscarDescripcionPorId($perfil);
        $perfil->setTipo($_REQUEST['tipo_perfil']);
        $perfil->setHabilitado($_REQUEST['checkbox-perfil']=='on'? "1":"0");
        
        $str='';
        $lista=array_keys($_REQUEST);
        for ($index = 5; $index < count($lista) -1 ; $index++) {
            $str .= $_REQUEST[$lista[$index]];
        }
        $perfil->setOpciones($str);
        $salida = '';
        try {
            $sqlPerfil->save($perfil);
            $salida='1';
        } catch (Exception $exc) {
            $salida='-1';
        }
        echo $salida;
        
        //print('<pre>'.print_r($perfil,true).'</pre>');
        exit;
    }
    if($_REQUEST['tarea']=='perfil_opciones'){
//        print('<pre>'.print_r($_REQUEST,true).'</pre>');
        $perfil = new Perfil();
        $sqlPerfil = new SQLPerfil();
        $perfil->setId_perfil($_REQUEST['id_perfil']);
        $aux = $sqlPerfil->getBuscarDescripcionPorId($perfil);
//        print('<pre>'.print_r($aux->getOpciones(),true).'</pre>');
        echo '[';
        echo '{"opciones":"'.$aux->getOpciones().'","estado":"'.$aux->getHabilitado().'", "tipo":"'.$aux->getTipo().'"}';
        echo ']';
        exit;
    }
  }      
}