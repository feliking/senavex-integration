<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 19-06-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'UsuarioTemporal.php');
include_once(PATH_TABLA . DS . 'Usuario.php');
include_once(PATH_TABLA . DS . 'Perfil.php');
include_once(PATH_TABLA . DS . 'PerfilOpciones.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'EmpresaImportador.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_MODELO . DS . 'SQLUsuario.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLPerfil.php');
include_once(PATH_MODELO . DS . 'SQLPerfilOpciones.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaImportador.php');
include_once( PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
require(PATH_BASE . DS . 'lib'.DS.'captcha'.DS.'simple-php-captcha.php');
include_once( PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');

class Login extends Principal {

  public function Login() {
    $vista = Principal::getVistaInstance();
     
    $usuario_temp = new UsuarioTemporal();
    $usuario = new Usuario();
    $persona = new Persona();
    $empresapersona = new EmpresaPersona();
    $sqlUsuario = new SQLUsuario();
    $sqlPersona = new SQLPersona();
    $sqlEmpresaPersona = new SQLEmpresaPersona();
    
    $fechaespanol=FuncionesGenerales::fechaenespañol();
    if($_POST['tarea']=='codigoCaptcha'){
        if(md5($_REQUEST['codigo'])==$_REQUEST['id_persona'])
        {
            echo '[{"suceso":"1"}]';
        }else
        {
            $captcha = simple_php_captcha();
            $srccaptcha=explode('/', $captcha[image_src], 3);
            $codigocaptcha=md5($captcha[code]);
            echo '[{"suceso":"0"},{"code":"'.$codigocaptcha.'"},{"src":"'.(is_prod?"lib/":"").$srccaptcha[2].'"}]';
        }
        exit;
    }
    if($_POST['tarea']=='codigoCaptchaRefrescar'){
        
        $captcha = simple_php_captcha();
        $srccaptcha=explode('/', $captcha[image_src], 3);
        $codigocaptcha=md5($captcha[code]);
        echo '[{"suceso":"0"},{"code":"'.$codigocaptcha.'"},{"src":"'.(is_prod?"lib/":"").$srccaptcha[2].'"}]';
        exit;
    }
    if($_POST['tarea']=='verificarDominioCorreo'){
        $domain = substr($_REQUEST["email"], strpos($_REQUEST["email"], '@') + 1);
        if  (checkdnsrr($domain) !== FALSE) {
        
            echo '0';
        }
        else {
            echo '1';
        }
        exit;
    }
    if($_POST['tarea']=='verificarCorreo'){
        $usuario_temp ->setEmail($_REQUEST["email"]);
        $resultado = $sqlUsuario->getVerificaEmail($usuario_temp);        
        if ($resultado=='0'){
            echo '0';
        }
        else {
            echo '1';
        }
        exit;
    }
    if($_POST['tarea']=='verificarUsuario'){ //verifica si existe un usuario normal
        $separador=substr ($_REQUEST["usuario"],0,2);
        if($separador=='T-')//este es el dsicriminador de usuarios temporal o normal
        {   
            $usuario_temp = $this->getLoginUsuarioTemp($_REQUEST["usuario"], $_REQUEST["clave"]);
            if (!empty($usuario_temp)) 
            {  
                $dias=FuncionesGenerales::diasrestantesusuariotemporal($usuario_temp-> getFecha_creacion());
                if($dias== '0')
                {
                   $usuario_temp->setEstado('0');
                   $sqlUsuario->setGuardarUsuarioTemp($usuario_temp);
                }
                if($usuario_temp->getEstado()>'0')
                {
                    echo '0';
                } 
                else 
                {
                    echo '<div class=" inicial fadein">El Usuario esta Inactivo.</div>';
                }
            } else {
                echo '<div class=" inicial fadein">El Usuario y/o clave son incorrectos.</div>';
            }
        }else//normal
        {
            $separador=substr ($_REQUEST["usuario"],0,4);
            if($separador=='IMP-')//este es el dsicriminador de usuarios temporal o normal
            {   
                $datos_usuario = $this->getLoginUsuario($_REQUEST["usuario"], $_REQUEST["clave"]);
                echo '0';
            }else{
                /********************/
                $datos_usuario = $this->getLoginUsuario($_REQUEST["usuario"], $_REQUEST["clave"]);
                if (!empty($datos_usuario)) 
                {  
                    if( $datos_usuario->getActivo())
                    {
                        echo '0';
                    } 
                    else 
                    {
                        echo '<div class="inicial fadein">El Usuario esta Inactivo.</div>';
                    }
                } else {
                    echo '<div class=" inicial fadein">El Usuario y/o clave son incorrectos.</div>';
                }
            //**********************
            }
        }
        exit;
    }
    if($_POST['tarea']=='ingresarSistema'){
        $separador=substr ($_REQUEST["usuario"],0,2);//Sacamos el delimitador de usuario
        if($separador=='T-')//este es el dsicriminador de usuarios temporal o normal
        {
            $usuario_temp = $this->getLoginUsuarioTemp($_REQUEST["usuario"], $_REQUEST["clave"]);
            $nombre=explode(' ',$usuario_temp->getNombres());
           
            $_SESSION["nombre"] = ucfirst ( strtolower($nombre[0]));
            $_SESSION["id_usuario"] = $usuario_temp->getId_usuario_temporal();             
            $_SESSION["usuario"] = $_POST["usuario"];
            $_SESSION["clave"] = md5($_POST["clave"]);
            $_SESSION["email"] = $usuario_temp->getEmail();
            $_SESSION["estado_usuario_temp"] = $usuario_temp->getEstado();
            $_SESSION["rol"] = 'temporal';
            $_SESSION["sw_bienvenida_temporal"] = $usuario_temp->getBienvenida();
            $_SESSION["fecha_creacion"] = $usuario_temp->getFecha_creacion();
            
            $vista->assign('nombre', $_SESSION["nombre"]);
            $vista->assign('sw_bienvenida_temporal', $_SESSION["sw_bienvenida_temporal"]);
            $vista->assign('id_usuario_temp', $_SESSION["id_usuario"]);
            $vista->assign('usuario_temp',$_SESSION["usuario"]);
            $vista->assign('clave_temp', $_SESSION["clave"]);
            include_once( PATH_CONTROLADOR . DS . 'admEmpresaTemporal' . DS . 'AdmEmpresaTemporal.php');
            $admEmpresaTemporal = new admEmpresaTemporal();
             
            exit;
        }
        else //usuarios normales
        {    
             $separador=substr ($_REQUEST["usuario"],0,4);//Sacamos el delimitador de usuario
            if($separador=='IMP-')//este es el dsicriminador de usuarios temporal o normal
            {
                
                $datos_usuario = $this->getLoginUsuario($_REQUEST["usuario"], $_REQUEST["clave"]);
                $_SESSION["email"]= $persona->getEmail();
                $_SESSION["id_persona"]= $persona->getId_persona();
                $_SESSION["nombre"] = ucfirst ( strtolower($persona->getNombres()));
                $_SESSION["nombrecompleto"] = ucfirst ( strtolower($persona->getNombres())).' '.ucfirst ( strtolower($persona->getPaterno())).' '.ucfirst ( strtolower($persona->getMaterno()));
                $_SESSION["id_usuario"] = $datos_usuario->getId_usuario();             
                $_SESSION["usuario"] = $datos_usuario->getUsuario();
                $_SESSION["formato_imagen"] = $persona->getFormato_imagen();
                $_SESSION["clave"] = md5($datos_usuario->getClave());            
                $_SESSION["rol"] = 'REGISTRO_IMPORTADOR';
                
                $vista->assign('rol', $_SESSION["rol"]);
                $vista->assign('id_persona', $_SESSION["id_persona"]);
                $vista->assign('nombre', $_SESSION["nombre"]);
                $vista->assign('nombrecompleto', $_SESSION["nombrecompleto"]);
                $vista->assign('formato_imagen', $_SESSION["formato_imagen"]);
                $vista->assign('id_usuario', $_SESSION["id_usuario"]);
                $vista->assign('usuario',$_SESSION["usuario"]);
                $vista->assign('clave', $_SESSION["clave"]);
                $vista->assign('tipo_usuario', $_SESSION["tipo_usuario"]);  
                
                include_once( PATH_CONTROLADOR . DS . 'admImportTemporal' . DS . 'AdmImportTemporal.php');
                $admImportTemporal = new admImportTemporal();
             
            exit;
        } 
            else{
            /*****************************/
            $datos_usuario = $this->getLoginUsuario($_REQUEST["usuario"], $_REQUEST["clave"]);
            $_SESSION["tipo_usuario"] = $datos_usuario->getId_tipo_usuario();
            FuncionesGenerales::guardarAccesoUsuario($datos_usuario->getId_usuario());
           
            if($_SESSION["tipo_usuario"] =='1')//es para un usuario interno si es del senavex
            {
            
                $persona->setId_persona($datos_usuario->getId_persona());
                $persona= $sqlPersona->getDatosPersonaPorId($persona);
                // variables de sesion
               
                $_SESSION["email"]= $persona->getEmail();
                $_SESSION["id_persona"]= $persona->getId_persona();
                $_SESSION["nombre"] = ucfirst ( strtolower($persona->getNombres()));
                $_SESSION["nombrecompleto"] = ucfirst ( strtolower($persona->getNombres())).' '.ucfirst ( strtolower($persona->getPaterno())).' '.ucfirst ( strtolower($persona->getMaterno()));
                $_SESSION["id_usuario"] = $datos_usuario->getId_usuario();             
                $_SESSION["usuario"] = $datos_usuario->getUsuario();
                $_SESSION["formato_imagen"] = $persona->getFormato_imagen();
                $_SESSION["clave"] = md5($datos_usuario->getClave());            
                $_SESSION["rol"] = 'root';
                
                $vista->assign('rol', $_SESSION["rol"]);
                $vista->assign('id_persona', $_SESSION["id_persona"]);
                $vista->assign('nombre', $_SESSION["nombre"]);
                $vista->assign('nombrecompleto', $_SESSION["nombrecompleto"]);
                $vista->assign('formato_imagen', $_SESSION["formato_imagen"]);
                $vista->assign('id_usuario', $_SESSION["id_usuario"]);
                $vista->assign('usuario',$_SESSION["usuario"]);
                $vista->assign('clave', $_SESSION["clave"]);
                $vista->assign('tipo_usuario', $_SESSION["tipo_usuario"]);   
                
                //esto es para preguntar sacar su empresa y su perfil
                $empresapersona->setId_Persona($persona->getId_persona());
                $empresapersona= $sqlEmpresaPersona->getDatosEmpresaPersonaPorIdPersonaSenavex($empresapersona);
                if($empresapersona)//preguntamos si su perfil esta activo
                {
                        $_SESSION["id_empresa_persona"]=$empresapersona->getId_empresa_persona();
                       //aqui sacamos el nombre de la empresa y lo declaramos como variable de sesion
                        $empresa = new Empresa();
                        $sqlEmpresa = new SQLEmpresa();
                        $empresa->setId_empresa($empresapersona->getId_Empresa());
                        $empresa= $sqlEmpresa->getEmpresaPorID($empresa);
                        $_SESSION["id_empresa"] = $empresa->getId_Empresa();//declaramos el ide de la empresa
                        $_SESSION["empresa"] = $empresa->getRazon_Social();//declaramos como valribale de sesion a nomrbre sde la empresa
                        $_SESSION["id_perfil"] = $empresapersona->getId_perfil();// declaramos el perfil como variable de sesion    
                        //-----------------------aca sacamos la descricion del perfil--------------------
                        $perfil = new Perfil();
                        $sqlPerfil = new SQLPerfil();
                        $perfil->setId_perfil($empresapersona->getId_perfil());
                        $perfil = $sqlPerfil->getBuscarDescripcionPorId($perfil);
                        $_SESSION["perfil"]=$perfil->getDescripcion();
                        //-----------------------------------
                        $opcion_x=$perfil->getOpciones();
                        $str='';
                        for ($index = 0; $index < strlen($opcion_x); $index++) {
                            $POpciones = new PerfilOpciones();
                            $SQLPOpciones = new SQLPerfilOpciones();
                            $POpciones->setOpcion($opcion_x[$index]);
                            $lista = $SQLPOpciones->getPerfilOpcionesByOpcion($POpciones);
                            if($lista[0]->getHabilitado()=='1'){
                                $str.=$lista[0]->getOpcion();
                            }

                        }
                        $_SESSION["opciones_persona"] = str_split($str);
//                        $_SESSION["opciones_persona"] = str_split($perfil->getOpciones());// declaramos las opciones que tiene la persona dividiendola en un array                }
//                        $_SESSION["opciones_persona"] = str_split($empresapersona->getOpciones_persona());// declaramos las opciones que tiene la persona dividiendola en un array                }
                }
                else
                {
                    // como no tinee ningun perfil en su empresa mostramos a pantallla de sin perfil y nos salimos
					$_SESSION["id_empresa_persona"]='';
                    $_SESSION["id_perfil"]='';
                    $_SESSION["empresa"]='';
                    $vista->display("avisos/sinPerfil.tpl");
                    exit;
                }
                $vista->assign('id_empresa', $_SESSION["id_empresa"]);//declaramos el id de la empresa
                $vista->assign('empresa', $_SESSION["empresa"]);//declaramos en ola vista la variable empresa
                $vista->assign('id_perfil', $_SESSION["id_perfil"]);//declaramos el perfil del usuario  
                $vista->assign('perfil', $_SESSION["perfil"]);//declaramos el perfil del usuario  
                $vista->assign('opciones_persona',$_SESSION["opciones_persona"]);//declaramos las opciones que tiene la persona  
            }  
            if($_SESSION["tipo_usuario"] =='2')//es para un usuario externo
            {
                $persona->setId_persona($datos_usuario->getId_persona());
                $persona= $sqlPersona->getDatosPersonaPorId($persona);
                
                $_SESSION["email"]= $persona->getEmail();
                $_SESSION["id_persona"]= $persona->getId_persona();
                $_SESSION["formato_imagen"] = $persona->getFormato_imagen();
                $_SESSION["nombre"] = ucwords  ( strtolower($persona->getNombres()));
                $_SESSION["nombrecompleto"] = ucwords  ( strtolower($persona->getNombres())).' '.ucfirst ( strtolower($persona->getPaterno())).' '.ucfirst ( strtolower($persona->getMaterno()));
                $_SESSION["id_usuario"] = $datos_usuario->getId_usuario();             
                $_SESSION["usuario"] = $datos_usuario->getUsuario();
                $_SESSION["clave"] = md5($datos_usuario->getClave());            
                $_SESSION["rol"] = 'root';
                
                $vista->assign('rol', $_SESSION["rol"]);
                $vista->assign('id_persona', $_SESSION["id_persona"]);
                $vista->assign('nombre', $_SESSION["nombre"]);
                $vista->assign('nombrecompleto', $_SESSION["nombrecompleto"]);
                $vista->assign('formato_imagen', $_SESSION["formato_imagen"]);
                $vista->assign('id_usuario', $_SESSION["id_usuario"]);
                $vista->assign('usuario',$_SESSION["usuario"]);
                $vista->assign('clave', $_SESSION["clave"]);
                $vista->assign('tipo_usuario', $_SESSION["tipo_usuario"]);   
                $separador=substr ($_REQUEST["usuario"],-4);

                if(substr($_SESSION["usuario"], -4, 4) == '-IMP'){
                    $porc = explode("-",$datos_usuario->getUsuario());
                    $empresas=(array)FuncionesGenerales::perfilesEnEmpresaPorPersonaApi($_SESSION["id_persona"], $porc[0]);
                } else {
                    $empresas=(array)FuncionesGenerales::perfilesEnEmpresaPorPersona($_SESSION["id_persona"]);
                }
               
                if( count($empresas)=='0' )// no tiene perfil en ninuguna empresa
                {
                    $_SESSION["empresa"]='';
                    $_SESSION["ruex"]='';
                    $_SESSION["id_empresa"] ="";
                    $vista->display("avisos/sinPerfil.tpl");
                    exit;
                }
                elseif(count($empresas)=='1' )// tiene perfil solo en una empresa
                {
                    // echo 2;  die;
                    $elementoempresa=array_values($empresas);
                    $_SESSION["id_empresa_persona"]=$elementoempresa[0]->id_empresa_persona;
                    $_SESSION["id_empresa"] =$elementoempresa[0]->id_empresa;
                    $_SESSION["id_perfil"] =$elementoempresa[0]->id_perfil;                    
                    //-----------------------aca sacamos la descricion del perfil--------------------
                        $perfil = new Perfil();
                        $sqlPerfil = new SQLPerfil();
                        $perfil->setId_perfil($elementoempresa[0]->id_perfil);
                        $perfil = $sqlPerfil->getBuscarDescripcionPorId($perfil);
                        $_SESSION["perfil"]=$perfil->getDescripcion();
                    //-----------------------------------
//                    $_SESSION["opciones_persona"]=str_split($elementoempresa[0]->opciones_persona);
                       $opcion_x=$perfil->getOpciones();
                        $str='';
                        for ($index = 0; $index < strlen($opcion_x); $index++) {
                            $POpciones = new PerfilOpciones();
                            $SQLPOpciones = new SQLPerfilOpciones();
                            $POpciones->setOpcion($opcion_x[$index]);
                            $lista = $SQLPOpciones->getPerfilOpcionesByOpcion($POpciones);
                            if($lista[0]->getHabilitado()=='1'){
                                $str.=$lista[0]->getOpcion();
                            }

                        }
                        $_SESSION["opciones_persona"] = str_split($str);
//                    $_SESSION["opciones_persona"]=str_split($perfil->getOpciones());
                    $vista->assign('menor_cuantia', $_SESSION["menor_cuantia"]);
                    if($separador != '-IMP'){
                        $empresa = new Empresa();
                        $sqlEmpresa = new SQLEmpresa();
                        $empresa->setId_empresa($_SESSION["id_empresa"]);
                        $empresa =$sqlEmpresa->getEmpresaPorID($empresa);
                        $_SESSION["empresa"]=$empresa->getRazon_Social();
                        $_SESSION["estado_empresa"] =$empresa->getEstado();  
                        $_SESSION["ruex"] =$empresa->getRuex();
                        if($empresa->getMenor_Cuantia()=='1')
                        {
                            $_SESSION["menor_cuantia"]=$empresa->getMenor_Cuantia();
                        }
                        else
                        {
                            if($empresa->getFrecuente()=="1") $_SESSION["menor_cuantia"]='';
                            else $_SESSION["menor_cuantia"]='1';
                        }
                       
                   } else {
                        $empresaImportador = new EmpresaImportador();
                        $sqlEmpresaImportador = new SQLEmpresaImportador();
                        $empresaImportador->setId_empresa_importador($_SESSION["id_empresa"]);
                        $empresaImportador =$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
                        $_SESSION["empresa"]=$empresaImportador->getRazon_social();
                        $_SESSION["estado_empresa"] =$empresaImportador->getEstado();  
                        $_SESSION["ruex"] =$empresaImportador->getRui();
                   }
                    
                     
                }
                else//tiene perfil en varias empresas
                {
                   $_SESSION["id_empresa_persona"]='x';
                }
            }
            if($_SESSION["tipo_usuario"] =='3')//eres una empresa renato
            {
                $empresa = new Empresa();
                $sqlEmpresa = new SQLEmpresa();
                $empresa->setId_usuario_root($datos_usuario->getId_usuario());
                $empresa= $sqlEmpresa->getEmpresaPorIdUsuarioRoot($empresa);
                //print('<pre>'.print_r($_REQUEST,true).'</pre>');
               
                $perfilrenato=new Perfil();
                $sqlPerfilRenato=new SQLPerfil();
                $perfilrenato->setTipo('3');
                $perfilrenato=$sqlPerfilRenato->getListarPerfilPorTipo($perfilrenato);
                
                // print('<pre>'.print_r($perfilrenato[0]->getOpciones(),true).'</pre>');
                $_SESSION["email"]= $empresa->getEmail();
                $_SESSION["id_empresa"]= $empresa->getId_empresa();
                $_SESSION["formato_imagen"]= $empresa->getFormato_imagen();
                $_SESSION["nombre"] = ucfirst ( strtolower($empresa->getRazon_Social()));
                $_SESSION["nombrecompleto"] = strtoupper($empresa->getNombre_Comercial());
                $_SESSION["estado_empresa"]= $empresa->getEstado(); 
                $_SESSION["id_usuario"] = $datos_usuario->getId_usuario();             
                $_SESSION["usuario"] = $datos_usuario->getUsuario();
                $_SESSION["clave"] = md5($datos_usuario->getClave());            
                $_SESSION["rol"] = 'root';
                $_SESSION["opciones_persona"] = str_split($perfilrenato[0]->getOpciones());
                //$_SESSION["opciones_persona"] = str_split('fheoq');
                $_SESSION["id_empresa_persona"]='empresa';//esto es un caso especial solo para empresa
                $_SESSION["ruex"]=$empresa->getRuex();
                if($empresa->getMenor_Cuantia()=='1')
                {
                    $_SESSION["menor_cuantia"]=$empresa->getMenor_Cuantia();
                }
                else
                {
                    if($empresa->getFrecuente()=="1") $_SESSION["menor_cuantia"]='';
                    else $_SESSION["menor_cuantia"]='1';
                }
                
                $vista->assign('menor_cuantia', $_SESSION["menor_cuantia"]);
                $vista->assign('ruex', $_SESSION["ruex"]);
                $vista->assign('id_persona', $_SESSION["id_empresa"]);
                $vista->assign('nombre', $_SESSION["nombre"]);
                $vista->assign('formato_imagen', $_SESSION["formato_imagen"]);
                $vista->assign('nombrecompleto', $_SESSION["nombrecompleto"]);
                $vista->assign('id_usuario', $_SESSION["id_usuario"]);
                $vista->assign('usuario',$_SESSION["usuario"]);
                $vista->assign('clave', $_SESSION["clave"]);
                $vista->assign('tipo_usuario', $_SESSION["tipo_usuario"]);   
                $vista->assign('opciones_persona',$_SESSION["opciones_persona"]);//declaramos las opciones que tiene la persona         
                $vista->assign('estado_empresa',$_SESSION["opciones_persona"]);
                
            }
            include_once( PATH_CONTROLADOR . DS . 'admPanelPrincipal' . DS . 'AdmPanelPrincipal.php');
            $admEmpresaTemporal = new AdmPanelPrincipal();
            exit;
            /*****************************/
        }
        }
    }     
    if($_POST['tarea']=='checkboxbienvenida')
    { //es el checkbox de bienvenida para usuarios temporales
       $usuario_temp->setId_usuario_temporal($_SESSION["id_usuario"]);
       $usuario_temp = $sqlUsuario->getUsuarioTemporalPorId($usuario_temp);      
       $usuario_temp->setBienvenida($_REQUEST["sw"]);       
       $sqlUsuario->setGuardarUsuarioTemp($usuario_temp);
       exit;
    }
    if($_POST['tarea']=='resetpass'){
        $correo = $_REQUEST['passw_email'];
        $numero_documento = $_REQUEST['passw_ci'];
        
        $persona = new Persona();
        $sql_persona = new SQLPersona();
        $persona->setEmail($correo);
        $persona->setNumero_documento($numero_documento);
        $lista = $sql_persona->getPersona_NumeroDocumento_Correo($persona);
        
        if(count($lista)>0){
            
            $usuario = new Usuario();
            $sql_usuario = new SQLUsuario();
            $usuario->setId_persona($lista[0]->getId_persona());
            $users = $sql_usuario->getListaDatosUsuarioPorIdPersona($usuario);
            
            if(count($users)>0){
                
                $clave=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
                
                if(AdmCorreo::enviarCorreo($lista[0]->getEmail(),$lista[0]->getNombres(),$users[0]->getUsuario(),$clave,'',37)){
                    $users[0]->setClave($clave);
                    if($sql_usuario->setGuardarUsuario($users[0])){
                        echo '[{"suceso":"1","causa":"Contraseña Reestablecida, Revise su correo por favor"}]';
                    }else{
                        echo '[{"suceso":"0","causa":"Error, Intentelo mas tárde"}]';
                    }
                }else{
                    echo '[{"suceso":"0","causa":"Error, no se pudo enviar la contraseña"}]';
                }
            }else{
                //print('<pre>'.print_r('lista vacia',true).'</pre>');
                $hoy = date("Y-m-d H:i:s");
                //------creamos el usuario y la conteraseña------------------------
                $campousuario=trim(mb_strtoupper($lista[0]->getNombres()));
                $campousuario=$campousuario[0].$persona->getNumero_documento();
                $clave=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
                
                $usuario = new Usuario();
                $sqlUsuario = new SQLUsuario();
                $usuario->setUsuario($campousuario);
                $usuario->setClave($clave);
                $usuario->setFecha_creacion($hoy);
                $usuario->setId_persona($lista[0]->getId_persona());
                $usuario->setActivo(1);
                //esto es cuando se crea un suaurio interno del senavex o un usuario externo
                $usuario->setId_tipo_usuario(2);
                //print('<pre>'.print_r($usuario,true).'</pre>');
                if($sqlUsuario->setGuardarUsuario($usuario)){
                    //print('<pre>'.print_r($usuario,true).'</pre>');
                   echo '[{"suceso":"0","msg":"Datos guardados Correctamente."}]';
                }
                else{ 
                    echo '[{"suceso":"0","causa":"Ups! hubo un error al recuperar tu contraseña, consulte al administrador"}]';
                }
                //echo '[{"suceso":"0","causa":"Persona sin usuario, consulte a su administrador"}]';
            }
        }else{
            echo '[{"suceso":"0","causa":"Correo y Numero de Documento Incorrectos "}]';
        }
        exit;
    }
    if($_POST['tarea']=='registrarSistemaTemporal')
    {
       // $carnet=trim(ereg_replace("[^0-9]", "", $_REQUEST["ci"]));//es para extraer solo los numeros del carnet
        $carnet=trim(filter_var($_REQUEST["ci"], FILTER_SANITIZE_NUMBER_INT));
		$clave=(string)substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
		$fecha_nacimiento_array=explode("/",$_REQUEST["fechanacimiento"]);
		$fecha_nacimiento=$fecha_nacimiento_array[2].'-'.$fecha_nacimiento_array[1].'-'.$fecha_nacimiento_array[0];
		$fecha_actual_array=explode("/",date ('d/m/Y'));
		$fecha_actual=$fecha_actual_array[2].'-'.$fecha_actual_array[1].'-'.$fecha_actual_array[0];
		
        
        $usuario_temp->setNombres($_REQUEST["nombre"]." ".$_REQUEST["apellidop"]."  ".$_REQUEST["apellidom"]);
		$usuario_temp->setUsuario('T-'.$carnet); 
		$usuario_temp->setClave($clave);  
        $usuario_temp->setCi($_REQUEST["ci"]);
        $usuario_temp->setFechanacimiento($fecha_nacimiento);
        $usuario_temp->setEmail($_REQUEST["email"]);
        $usuario_temp->setTelf($_REQUEST["telf"]);
        $usuario_temp->setEstado(1); 
        $usuario_temp->setFecha_creacion($fecha_actual); 
		
        if(AdmCorreo::enviarCorreo($_REQUEST["email"],$_REQUEST["nombre"],$carnet,$clave,'',2))
        {
            if($sqlUsuario->setGuardarUsuarioTemp($usuario_temp))
            {
                //---- esto es para el mensaje----------------------------------------------------------------------------------
                 echo '0';
			}
			
		}
        else
        {
            echo '1';
        }  
        exit;
        
    }
    /****** esto es prar el captcha***********/
       $captcha = simple_php_captcha();
       $srccaptcha=explode('/', $captcha[image_src], 3);
       $codigocaptcha=md5($captcha[code]);
       
       $vista->assign("srccaptcha",(is_prod?"lib/":"").$srccaptcha[2]);
       $vista->assign("codigocaptcha",$codigocaptcha);
    /***************************************/
    $vista->assign("mensajelogin",$fechaespanol); 
    $vista->display("Index.tpl"); 
  }

  public function getLoginUsuarioTemp($user, $clave) {
    $usuario_temp = new UsuarioTemporal();
    $sqlUsuario = new SQLUsuario();
    $usuario_temp->setUsuario($user);
    $usuario_temp->setClave($clave);    
    return $sqlUsuario->getLoginUsuarioTemp($usuario_temp);
  }
   public function getLoginUsuario($user, $clave) { 
    $usuario = new Usuario();
    $sqlUsuario = new SQLUsuario();
    $usuario->setUsuario($user);
    $usuario->setClave($clave);
    return $sqlUsuario->getLoginUsuario($usuario);
  }

}