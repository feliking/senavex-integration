
<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 23-09-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'PersonaHistorico.php');
include_once(PATH_TABLA . DS . 'Departamento.php');
include_once(PATH_TABLA . DS . 'Usuario.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'Perfil.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'TipoDocumentoIdentidad.php');
include_once(PATH_TABLA . DS . 'AusenciaAsistente.php');
include_once(PATH_TABLA . DS . 'Firma.php');
include_once(PATH_TABLA . DS . 'AuditoriaEventos.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexPersona.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'Direccion.php');
include_once(PATH_TABLA . DS . 'DireccionTipo.php');
include_once(PATH_TABLA . DS . 'DireccionTipoCalle.php');
include_once(PATH_TABLA . DS . 'DireccionTipoZona.php');
include_once(PATH_TABLA . DS . 'DireccionUbicacionEdificio.php');
include_once(PATH_TABLA . DS . 'Logs.php');

include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLPersonaHistorico.php');
include_once(PATH_MODELO . DS . 'SQLDepartamento.php');
include_once(PATH_MODELO . DS . 'SQLUsuario.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLPerfil.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');
include_once(PATH_MODELO . DS . 'SQLTipoDocumentoIdentidad.php');
include_once(PATH_MODELO . DS . 'SQLAusenciaAsistente.php');
include_once(PATH_MODELO . DS . 'SQLFirma.php');
include_once(PATH_MODELO . DS . 'SQLAuditoriaEventos.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexPersona.php');
include_once(PATH_MODELO . DS . 'SQLRegional.php');
include_once(PATH_MODELO . DS . 'SQLDireccion.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipo.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoCalle.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoZona.php');
include_once(PATH_MODELO . DS . 'SQLDireccionUbicacionEdificio.php');
include_once(PATH_MODELO . DS . 'SQLLogs.php');

include_once( PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');
include_once( PATH_CONTROLADOR . DS . 'admDireccion' . DS . 'AdmDireccion.php');

class AdmPersona extends Principal {

  public function AdmPersona() {

    $vista = Principal::getVistaInstance();

    $persona = new Persona();
    $departamento = new Departamento();
    $usuario = new Usuario();
    $empresa_persona = new EmpresaPersona();
    $perfil = new Perfil();
    $pais = new Pais();
    $tipodocumentoidentidad =new TipoDocumentoIdentidad();
    $sqlPersona = new SQLPersona();
    $sqlDepartamento = new SQLDepartamento();
    $sqlUsuario = new SQLUsuario();
    $sqlEmpresaPersona = new SQLEmpresaPersona();
    $sqlPerfil = new SQLPerfil();
    $sqlPais =new SQLPais();
    $sqlTipodocumentoidentidad = new SQLTipoDocumentoIdentidad();
    //--------------solicitar firma--------------
    if($_REQUEST['tarea']=='solicitarFirma')
    {
        $persona->setId_persona($_REQUEST['id_persona']);
        $persona=$sqlPersona->getDatosPersonaPorId($persona);
        $persona->setFirma(false);
        $sqlPersona->setGuardarPersona($persona);
        exit;
    }
    //----------------para ver la persona--------------------------------
    if($_REQUEST['tarea']=='eliminarFirma')
    {
        if(unlink('styles/img/firmas/'.$_REQUEST['id_firma'].'.png'))
        {            
            $firma=new Firma();
            $sqlfirma = new SQLFirma();
            $firma->setId_firma($_REQUEST['id_firma']);
            $firma=$sqlfirma->getFirmaPorID($firma);
            $firma->setEstado(false);
            $firma->setId_asistente_elimina($_SESSION['id_persona']);
            if($sqlfirma->setGuardarFirma($firma))
            {
                $firmas=$sqlfirma->getFirmasPorIdPersona($firma);
                if(count($firmas)==0)
                {
                    $persona->setId_persona($firma->getId_persona());
                    $persona=$sqlPersona->getDatosPersonaPorId($persona);
                    $persona->setFirma(false);
                    $sqlPersona->setGuardarPersona($persona);
                }
                echo '[{"suceso":"0","msg":"La Firma se elimino Correctamente"}]';
                
            }
            else
            {
                echo '[{"suceso":"0","msg":"Se tuvieron problemas de conexion por favor intente nuevamente."}]';
            }
        }  
        else 
        {
            echo '[{"suceso":"0","msg":"Se tuvieron problemas de conexion por favor intente nuevamente."}]';
        }        
        exit;
    }
    //----------------para ver la persona--------------------------------
    if($_REQUEST['tarea']=='verPersona')
    {
//        $persona = $this->asignarPersona($_REQUEST['id_persona']);
        
        $persona = new Persona();
        $departamento = new Departamento();    
        $pais = new Pais();
	$sqlDepartamento = new SQLDepartamento();
        $tipodocumentoidentidad =new TipoDocumentoIdentidad();
        $sqlPersona = new SQLPersona();
        $sqlTipodocumentoidentidad = new SQLTipoDocumentoIdentidad();
        $persona->setId_persona($_REQUEST['id_persona']);
        $persona=$sqlPersona->getDatosPersonaPorId($persona);
        $tipodocumentoidentidad->setId_tipo_documentoidentidad($persona->getId_tipo_documento());
        $tipodocumentoidentidad=$sqlTipodocumentoidentidad->getBuscarDescripcionPorId($tipodocumentoidentidad);
        $persona->setId_tipo_documento($tipodocumentoidentidad->getDescripcion());

        if(is_numeric($persona->getExpedido())){
            $departamento->setId_departamento($persona->getExpedido());
            $departamento=$sqlDepartamento->getBuscarDepartamentoPorId($departamento);
            $expedido = $departamento->getSigla();
        } else {
            $expedido = $persona->getExpedido();
        }
    
        $pais = new Pais();
        $sqlPais = new SQLPais();
        $pais->setId_pais($persona->getId_pais_origen());
        $pais = $sqlPais->getBuscarDescripcionPorId($pais);
//        print('<pre>'.print_r(,true).'</pre>');
        $firma=new Firma();
        $sqlfirma = new SQLFirma();
        $firma->setId_persona($_REQUEST['id_persona']);
        $firmas=$sqlfirma->getFirmasPorIdPersona($firma);
        foreach ($firmas as &$firma)
        {
            $fecha= explode("-", $firma->getFecha());
            $firma->setFecha($fecha[2].'/'.$fecha[1].'/'.$fecha[0]);
        }
        
        if(count($firmas)>0)
            $vista->assign ('firmas',$firmas);

        $vista->assign('expedido',$expedido);
        $vista->assign('persona',$persona);
        $vista->assign('nacionalidad', $pais->getNombre());
        $vista->display("admPersona/VerPersona.tpl");
        exit;
    }
    //------------------para guardar la firma de la persona-----------------------
    if($_REQUEST['tarea']=='guardarFirma')//aqui cambiaos le perfil de los fuincionarios 
    {
        $id_persona = $_SESSION['id_persona'];
        if(isset($_REQUEST['id_persona'])){
            $id_persona = $_REQUEST['id_persona'];
            unset($_REQUEST['id_persona']);
        }
        $vista->assign("id_persona", $id_persona);
        $vista->display("admPersona/guardarFirma.tpl");
        exit;
    }
    //--------------------------------me devuelve todos los funcionarios activos del senavex
     if($_REQUEST['tarea']=='funcionariosSenavex')//es para listarme todos los exportadores
    {
        $persona->setEstado('1');
        $datospersona=$sqlPersona->getListarPersonasPorEstado($persona);
         
        $strJson = '';
        echo '[';
        foreach ($datospersona as $persona){
            $empresa_persona->setId_Persona($persona->getId_persona());
            if($sqlEmpresaPersona->checkEmpresaPersonaDelSenavex($empresa_persona)=='1')//preguntamos si el perfil que tiene es del senavex
            {
                $strJson .= '{"id_persona":"' . $persona->getId_persona() .
                 '","nombres":"' . $persona->getNombres() ." ".$persona->getPaterno()." ".$persona->getMaterno().
                 '","id_tipo_documento":"' . $persona->getId_tipo_documento() .
                 '","formato_imagen":"' . $persona->getFormato_imagen() .
                 '","numero_documento":"' . $persona->getNumero_documento() . '"},';
            }

        }
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    //-------------------------para edicion de persona--------------------------------------------------------
    if($_REQUEST['tarea']=='editarPersona')
    {
        $sucesso='0';
        if($_REQUEST['nuevousuario'] or $_REQUEST['nuevacontrasena'])
        {
            $usuario->setId_usuario($_SESSION['id_usuario']);
            $usuario=$sqlUsuario->getDatosUsuarioPorId($usuario);
            if($_REQUEST['nuevousuario']) $usuario->setUsuario($_REQUEST['nuevousuario']);
            if($_REQUEST['nuevacontrasena']) $usuario->setClave($_REQUEST['nuevacontrasena']);
            if($sqlUsuario->setGuardarUsuario($usuario))
            {
                if($_REQUEST['nuevousuario']) $_SESSION['usuario']=$_REQUEST['nuevousuario'];
                //echo 'se guardo';
            }
            else
            {
                $sucesso='1';
            }
        }
        if($_REQUEST['nombresconf'])
        {
            
            $persona->setId_persona($_SESSION['id_persona']);
            $persona = $sqlPersona->getDatosPersonaPorId($persona);
            $hoy = date("Y-m-d H:i:s");
            
            //aqui guardas ara el historico
            $personahistorico = new PersonaHistorico();
            $sqlPersonahistorico = new SQLPersonaHistorico();
            $personahistorico->setId_persona($_SESSION['id_persona']);
            
            $personahistorico->setNombres($persona->getNombres());
            $personahistorico->setPaterno($persona->getPaterno());
            $personahistorico->setMaterno($persona->getMaterno());
            $personahistorico->setId_tipo_documento($persona->getId_tipo_documento());
            $personahistorico->setNumero_documento($persona->getNumero_documento());//este es el documento
            $personahistorico->setNumero_contacto($persona->getNumero_contacto());
            $personahistorico->setEmail($persona->getEmail());
            $personahistorico->setId_pais_origen($persona->getId_pais_origen());
            $personahistorico->setId_departamento($persona->getId_departamento());
            $personahistorico->setCiudad($persona->getCiudad());
            $personahistorico->setDireccion($persona->getDireccion());
            $personahistorico->setFecha_modificacion($hoy);
            $personahistorico->setGenero($persona->getGenero());
            
            if($sqlPersonahistorico->setGuardarPersonaHistorico($personahistorico))
            {
                //---------------- esto es para la variables de sesion
                $_SESSION["email"]= $_REQUEST['emailconf'];
                $_SESSION["nombre"] = ucwords  ( strtolower($_REQUEST['nombresconf']));
                $_SESSION["nombrecompleto"] = ucwords ( strtolower($_REQUEST['nombresconf'])).' '.ucwords( strtolower($_REQUEST['apellidopconf'])).' '.ucwords( strtolower($_REQUEST['apellidomconf']));
                
                // aqui modificamos a la persona
                $persona->setNombres(mb_strtoupper($_REQUEST['nombresconf']));
                $persona->setPaterno(mb_strtoupper($_REQUEST['apellidopconf']));
                $persona->setMaterno(mb_strtoupper($_REQUEST['apellidomconf']));
                $persona->setId_tipo_documento($_REQUEST['tipodocumentoconf']);
                //$persona->setNumero_documento($_REQUEST['numerodocumentoconf']);//este es el documento
//                $persona->setNumero_contacto($_REQUEST['numerocontactoconf']);
                $persona->setEmail($_REQUEST['emailconf']);
                $persona->setId_pais_origen($_REQUEST['idpaisconf']);
//                $persona->setId_departamento($_REQUEST['iddepartamentoconf']);
//                $persona->setCiudad($_REQUEST['ciudadconf']);
//                $persona->setDireccion($_REQUEST['direccionconf']);
                $persona->setUltima_modificacion($hoy);
                $persona->setGenero(($_REQUEST['generop']=='1'?true:false));
                $empresa_persona = new EmpresaPersona();
                $empresa_persona->setId_Empresa($_SESSION['id_empresa']);
                $empresa_persona->setId_Persona($_SESSION['id_persona']);
                
                $sqlEmpresa_Persona = new SQLEmpresaPersona();
                $empresa_persona=$sqlEmpresa_Persona->getEmpresaPorPersonaEmpresa($empresa_persona);
                $empresa_persona->setCargo($_REQUEST['cargoconf']);
                $sqlEmpresa_Persona->setGuardarEmpresaPersona($empresa_persona);
                
                $persona->setDireccion(AdmDireccion::guardarDireccion($_REQUEST));
                if($sqlPersona->setGuardarPersona($persona))
                {
                    //echo 'se guardo'; 
                }
                else
                {
                    $sucesso='1';
                }
            }
            else
            {
                $sucesso='1';
            }
            
        }
        if($sucesso=='0')
        {
            echo '[{"suceso":"0","msg":"Datos guardados correctamente."}]';
        }
        else
        {
            echo '[{"suceso":"1","msg":"Problemas al guardar los datos del usuario."}]';
        }
        exit;
    }
    if($_REQUEST['tarea']=='configuracion'){
        $datostipodocumento=$sqlTipodocumentoidentidad->getListarTipoDocumentoIdentidad($tipodocumentoidentidad);
        $datospais=$sqlPais->getListarPais($pais);
        
        $persona->setId_persona($_SESSION["id_persona"]);
        $persona=$sqlPersona->getDatosPersonaPorId($persona);
        
        $vista->assign('usuario',$_SESSION["usuario"]);
        $vista->assign('id_persona',$persona->getId_persona());
        $vista->assign('nombres',ucwords (strtolower ($persona->getNombres())));
        $vista->assign('paterno',ucwords (strtolower ($persona->getPaterno())));
        $vista->assign('materno',ucwords (strtolower ($persona->getMaterno())));
        $vista->assign('id_tipo_documento',$persona->getId_tipo_documento());
        $vista->assign('numero_documento',$persona->getNumero_documento());
        $vista->assign('email',$persona->getEmail());
        //$vista->assign('numero_contacto',$persona->getNumero_contacto());
        //$vista->assign('numero_contacto2',$persona->getNumero_contacto2());
        $empresa_persona = new EmpresaPersona();
        $empresa_persona->setId_Empresa($_SESSION['id_empresa']);
        $empresa_persona->setId_persona($_SESSION['id_persona']);
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        $empresa_persona = $sqlEmpresaPersona->getEmpresaPorPersonaEmpresa($empresa_persona);
        $vista->assign('cargo',$empresa_persona->getCargo());
        $vista->assign('expedido',$persona->getExpedido());
        $vista->assign('id_pais_origen',$persona->getId_pais_origen());
//        $vista->assign('id_departamento',$persona->getId_departamento());
//        $vista->assign('ciudad',$persona->getCiudad());
        $direccion_antigua = 0;
        if(preg_match("/[a-z]/i", $persona->getDireccion())) $direccion_antigua=1;
        $vista->assign('direccion_antigua', $direccion_antigua);
        $vista->assign('direccion',$persona->getDireccion());
        $vista->assign('genero',$persona->getGenero());
        $vista->assign('editable', true);
        $vista->assign('datostipodocumento', $datostipodocumento);
        $vista->assign('datospais', $datospais);
        $vista->display('admPersona/Configuracion.tpl');
        exit;
    }
    if($_REQUEST['tarea']=='listarPersonasPorEmpresa')// esto es para mostrales la liste de personas y sus perfiles que tiene asignados por empresa
    {
        $empresa_persona->setId_Empresa($_SESSION["id_empresa"]);
        $datosempresapersona=$sqlEmpresaPersona->getListarPersonaPorEmpresa($empresa_persona);
        $i = -1;
        $rep_legales=0;
        foreach ($datosempresapersona as $empresapersona) {
            $i++;
            $empresaPorPersona[$i] = array('id_persona'=>$empresapersona->persona->getId_persona(), 
                'id_empresa_persona'=>$empresapersona->getId_empresa_persona(), 
                'nombres'=>$empresapersona->persona->getNombres().' '.$empresapersona->persona->getPaterno().' '.$empresapersona->persona->getMaterno(), 
                'numero_documento'=>$empresapersona->persona->getNumero_documento(),
                'id_perfil'=>$empresapersona->perfil->getId_perfil(),
                'perfil'=>$empresapersona->perfil->getDescripcion());
                $rep_legales+=($empresapersona->perfil->getId_perfil() == 3 || $empresapersona->perfil->getId_perfil() == 2)? 1 : 0;
        } 
        if($_SESSION["tipo_usuario"]=='1')
        {
            $perfil->setTipo('1');
        }
        else
        {
            $perfil->setTipo('2');
        }
        
        $datosperfil=$sqlPerfil->getListarPerfilPorTipo($perfil);
        $vista->assign("datosperfil",$datosperfil); 
        $vista->assign("datosempresapersona",$empresaPorPersona); 
        $vista->assign("rep_legales",$rep_legales);
        $vista->display('admPersona/PersonasPorEmpresa.tpl');
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
        $persona->setEmail($_REQUEST["email"]);
        $resultado = $sqlPersona->getDatosPersonaPorEmail($persona);
        if ($resultado=='0'){
            echo '0';
        }
        else {
            echo '1';
        }
        exit;
    }
    if($_REQUEST['tarea']=='exportadores')//es para listarme todos los exportadores
    {
        $persona->setEstado('1');
        $datospersona=$sqlPersona->getListarPersonasPorEstado($persona);
         
        if($_SESSION["tipo_usuario"]=='1')//primero pregntamos si es un suuario interno del senavex
        {
            $strJson = '';
            echo '[';
            foreach ($datospersona as $persona){
                $empresa_persona->setId_Persona($persona->getId_persona());
                if($sqlEmpresaPersona->checkEmpresaPersona($empresa_persona)=='0')//preguntamos si no tiene perfil en alguna empresa
                {
                    $strJson .= '{"id_persona":"' . $persona->getId_persona() .
                        '","nombres":"' . $persona->getNombres() ." ".$persona->getPaterno()." ".$persona->getMaterno().
                        '","id_tipo_documento":"' . $persona->getId_tipo_documento() .
                        '","formato_imagen":"' . $persona->getFormato_imagen() .
                        '","numero_documento":"' . $persona->getNumero_documento() . '"},';
                }
                else
                {
                   if($sqlEmpresaPersona->checkEmpresaPersonaDelSenavex($empresa_persona)=='1')//preguntamos si el perfil que tiene es del senavex
                   {
                       $strJson .= '{"id_persona":"' . $persona->getId_persona() .
                        '","nombres":"' . $persona->getNombres() ." ".$persona->getPaterno()." ".$persona->getMaterno().
                        '","id_tipo_documento":"' . $persona->getId_tipo_documento() .
                        '","formato_imagen":"' . $persona->getFormato_imagen() .
                        '","numero_documento":"' . $persona->getNumero_documento() . '"},';
                   }
                }

            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
        }
        else//no es del senavex e u  exportador
        {
        
            $strJson = '';
            echo '[';
            foreach ($datospersona as $persona){
                $empresa_persona->setId_Persona($persona->getId_persona());
                if($sqlEmpresaPersona->checkEmpresaPersonaDelSenavex($empresa_persona)=='0')//preguntamos si esa persona no tiene un perfil en el senavex
                {
                    $strJson .= '{"id_persona":"' . $persona->getId_persona() .
                        '","nombres":"' . $persona->getNombres() ." ".$persona->getPaterno()." ".$persona->getMaterno().
                        '","id_tipo_documento":"' . $persona->getId_tipo_documento() .
                        '","formato_imagen":"' . $persona->getFormato_imagen() .
                        '","numero_documento":"' . $persona->getNumero_documento() . '"},';
                }

            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
        }
        exit;
    }
     if($_REQUEST['tarea']=='getPersona')//es para enviareme la persona en un json
    {
        $empresa_persona->setId_Empresa(!empty($_REQUEST['id_empresa'])? $_REQUEST['id_empresa']:$_SESSION['id_empresa']);
        $empresa_persona->setId_Persona($_REQUEST['id_persona']);
        
        $empresa_persona=$sqlEmpresaPersona->getEmpresaPorPersonaEmpresa($empresa_persona);
        
        $persona = $this->asignarPersona($_REQUEST['id_persona']);
        echo '[';
        $strJson .= '{"id_persona":"' . $persona->getId_persona() .
                    '","nombres":"' . $persona->getNombres() .
                    '","paterno":"' .$persona->getPaterno() .
                    '","materno":"' .$persona->getMaterno().
                    '","id_tipo_documento":"' . $persona->getId_tipo_documento() .
                    '","numero_documento":"' . $persona->getNumero_documento() .
                    '","numero_contacto":"' . $persona->getNumero_contacto() .
                    '","numero_contacto2":"' . $persona->getNumero_contacto2() .
                    '","cargo":"' . $empresa_persona->getCargo() .
                    '","expedido":"' . $persona->getExpedido() .
                    '","email":"' . $persona->getEmail() .
                    '","id_pais_origen":"' . $persona->getId_pais_origen() .
                    '","id_departamento":"' . $persona->getId_departamento() .
                    '","ciudad":"' . $persona->getCiudad().
                    '","formato_imagen":"' . $persona->getFormato_imagen().
                    '","direccion":"' . $persona->getDireccion() .'"}';
        echo $strJson;
        echo ']';
        exit;
    }
     if($_REQUEST['tarea']=='getPersonaId')//esta te da con solo los ids
    {
        $persona->setId_persona($_REQUEST['id_persona']);
        $persona=$sqlPersona->getDatosPersonaPorId($persona);
        
        if(!empty($_REQUEST['id_empresa']) || !empty($_SESSION['id_empresa'])){
            $empresa_persona->setId_Empresa(!empty($_REQUEST['id_empresa'])? $_REQUEST['id_empresa']:$_SESSION['id_empresa']);
            $empresa_persona->setId_Persona($_REQUEST['id_persona']);

            $empresa_persona=$sqlEmpresaPersona->getEmpresaPorPersonaEmpresa($empresa_persona);
        }
        if($persona->getGenero())
        {
            $sw='1';
        }
        else 
        {
            $sw='0';
        }
        echo '[';
        $strJson .= '{"id_persona":"' . $persona->getId_persona() .
                    '","nombres":"' . $persona->getNombres() .
                    '","paterno":"' .$persona->getPaterno() .
                    '","materno":"' .$persona->getMaterno().
                    '","id_tipo_documento":"' . $persona->getId_tipo_documento() .
                    '","numero_documento":"' . $persona->getNumero_documento() .
                    '","numero_contacto":"' . $persona->getNumero_contacto() .
                    '","numero_contacto2":"' . $persona->getNumero_contacto2() .
                    (($empresa_persona!=null && (!empty($_REQUEST['id_empresa']) || !empty($_SESSION['id_empresa'])))? '","cargo":"' . $empresa_persona->getCargo():'') .
                    '","expedido":"' . $persona->getExpedido() .
                    '","email":"' . $persona->getEmail() .
                    '","id_pais_origen":"' . $persona->getId_pais_origen() .
                    '","id_departamento":"' . $persona->getId_departamento() .
                    '","ciudad":"' . $persona->getCiudad().
                    '","genero":"' . $sw.
                    '","formato_imagen":"' . $persona->getFormato_imagen().
                    '","direccion":"' . $persona->getDireccion() .'"}';
        echo $strJson;
        echo ']';
        exit;
    }
    if($_POST['tarea']=='verificarNumeroDocumento'){
        $persona->setNumero_documento($_REQUEST["numero_documento"]);
        $persona->setId_tipo_documento($_REQUEST["tipo_documento"]);
        $resultado = $sqlPersona->getDatosPersonaPorNumeroDocumento($persona);
        if ($resultado=='0'){
            echo '0';
        }
        else {
            echo '1';
        }
        exit;
    }
    
    if($_REQUEST['tarea']=='guardarPersonaExportador')
    {        
        $perfil->setId_perfil($_REQUEST['idperfil']);
        $perfil=$sqlPerfil->getBuscarDescripcionPorId($perfil);
       
        $hoy = date("Y-m-d H:i:s");
        //------creamos el usuario y la conteraseña------------------------
        $campousuario=trim(mb_strtoupper($_REQUEST['nombres']));
        $campousuario=$campousuario[0].$_REQUEST['customers'];
        $clave=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
     
        switch ($_REQUEST['idperfil']) 
        {
            //----------------exportadires----------------------
            case 3:  
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],($_SESSION["tipo_usuario"] == 3 ? $_SESSION["nombre"]: $_SESSION["empresa"]),$campousuario,$clave,3)) $swenvio=true;
                else $swenvio=false;
                break;//es un rl
            case 4: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],($_SESSION["tipo_usuario"] == 3 ? $_SESSION["nombre"]: $_SESSION["empresa"]),$campousuario,$clave,7)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 12:
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],($_SESSION["tipo_usuario"] == 3 ? $_SESSION["nombre"]: $_SESSION["empresa"]),$campousuario,$clave,8)) $swenvio=true;
                else $swenvio=false;
                break;//apoderado
            case 5:  $swenvio=true;
                break;//es un recojo de tramites
            //---------------------senavex------------------------------
            case 1:  
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'',$campousuario,$clave,17)) $swenvio=true;
                else $swenvio=false;
                break;//es un adminsitrador del sistema
            case 7: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'',$campousuario,$clave,18)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 6: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'',$campousuario,$clave,19)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 10: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'',$campousuario,$clave,20)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 8: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'',$campousuario,$clave,21)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 9: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'',$campousuario,$clave,22)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 11: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'',$campousuario,$clave,23)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
        }
        //$swenvio = true;
        if($swenvio)//perguntamos si no es el de recojo de tramites
        {
//            print('<pre>'.print_r($_REQUEST,true).'<  /pre>');
            $persona = new Persona();
            $persona->setNombres(mb_strtoupper($_REQUEST['nombres']));
            $persona->setPaterno(mb_strtoupper($_REQUEST['apellidop']));
            $persona->setMaterno(mb_strtoupper($_REQUEST['apellidom']));
            $persona->setId_tipo_documento($_REQUEST['tipodocumento']);
            $persona->setNumero_documento(strval($_REQUEST['customers']));//este es el documento

            $persona->setExpedido($_REQUEST['expedido']);
            $persona->setEmail($_REQUEST['email']);
            $persona->setId_pais_origen($_REQUEST['idpais']);

            $persona->setDireccion(AdmDireccion::guardarDireccion($_REQUEST));
            $persona->setFecha_creacion($hoy);
            $persona->setEstado(1);//para el estado activo
            $persona->setId_usuario_creacion($_SESSION['id_usuario']);

//            if(AdmCorreo::enviarCorreo($_REQUEST["email"],$_REQUEST["nombre"],$carnet,$clave,'',2))
//             var_dump($persona);
            
            $sw_repl = $_REQUEST['sw_repl'];
            $empresa_persona = new EmpresaPersona();
            $sqlEmpresaPersona = new SQLEmpresaPersona();
            if($sqlPersona->setGuardarPersona($persona)){
                if($sw_repl==='true'){
                    $empresa_persona->setId_Perfil(3);
                    $empresa_persona->setId_Empresa($_SESSION["id_empresa"]);
                    $list = $sqlEmpresaPersona->getListarPersonaExportadores($empresa_persona);
                    $list = $sqlEmpresaPersona->getListPersonasPorPerfil($empresa_persona);
                    foreach ($list as $value) {
                        $value->setId_Perfil(4);
                        $sqlEmpresaPersona->setGuardarEmpresaPersona($value);
                    }

                    $servicio = new Servicio();
                    $sqlServicio = new SQLServicio();
                    $servicio->setId_servicio(4);
                    $servicio=$sqlServicio->getBuscarServicioPorId($servicio);
                    $servicio_exportador = new ServicioExportador();
                    $sqlServicio_exportador = new SQLServicioExportador();
                    $servicio_exportador->setId_Servicio($servicio->getId_servicio());
                    $servicio_exportador->setCosto_Actual($servicio->getCosto());
                    $servicio_exportador->setFecha_Servicio(date("Y-m-d H:i:s"));
                    $servicio_exportador->setId_Persona($_SESSION['id_persona']);
                    $servicio_exportador->setId_empresa($_SESSION['id_empresa']);
                    $servicio_exportador->setFacturado(0);
                    $sqlServicio_exportador->Save($servicio_exportador);
                }
                
                $empresa_persona = new EmpresaPersona();
                $empresa_persona->setId_Persona($persona->getId_persona());
                $empresa_persona->setId_Empresa($_SESSION["id_empresa"]);
                $empresa_persona->setId_Perfil($_REQUEST['idperfil']);
                $empresa_persona->setFecha_Vinculacion($hoy);
                $empresa_persona->setId_regional($_REQUEST['apregional']);
                $empresa_persona->setOpciones_persona($perfil->getOpciones());
                if(!isset($_REQUEST['nropoder']) && !empty($_REQUEST['nropoder']))
                    $empresa_persona->setNro_poder($_REQUEST['nropoder']);
                $empresa_persona->setActivo(1);
                $empresa_persona->setCargo($_REQUEST['cargo']);

                if($sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona)){
//                    if($_REQUEST['idperfil']!='5')//preguntamos si no es recojo de tramites
//                    {
                        if($empresa_persona->getId_Perfil()==3){
                            $empresa = new Empresa();
                            $sqlEmpresa = new SQLEmpresa();
                            $empresa->setId_empresa($_SESSION["id_empresa"]);
                            $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
                            $empresa->setId_representante_legal($empresa_persona->getId_Persona());
                            $sqlEmpresa->setGuardarEmpresa($empresa);
                        }
                        //-guardamos el usuario
                        $usuario->setUsuario($campousuario);
                        $usuario->setClave($clave);
                        $usuario->setFecha_creacion($hoy);
                        $usuario->setId_persona($persona->getId_persona());
                        $usuario->setActivo(1);
                        //esto es cuando se crea un suaurio interno del senavex o un usuario externo
                        if($_SESSION["tipo_usuario"] =='1') $usuario->setId_tipo_usuario(1);
                        else $usuario->setId_tipo_usuario(2);

                        if($sqlUsuario->setGuardarUsuario($usuario)){
                           echo '[{"suceso":"0","msg":"Datos guardados Correctamente."}]';
                        }
                        else echo '[{"suceso":"2","msg":"Problemas al guardar los datos del usuario"}]';
//                    }
//                    else echo '[{"suceso":"0","msg":"Datos guardados Correctamente."}]';
                }
                else echo '[{"suceso":"3","msg":"Problemas al guardar los datos en empresa_persona"}]';    
            }
            else echo '[{"suceso":"1","msg":"Problemas al guardar los datos de la persona"}]';
        }
        else echo '[{"suceso":"4","msg":"No se envio el correo"}]';
        exit;
    }
    if($_REQUEST['tarea']=='editarPerfilPersonaEmpresa')//aqui cambiaos le perfil de los funcionarios 
    {
        $hoy = date("Y-m-d H:i:s");
        $empresa_persona->setId_Empresa_Persona($_REQUEST['id_empresa_persona']);
        $empresa_persona=$sqlEmpresaPersona->getEmpresaPersonaPorID($empresa_persona);
        $empresa_persona->setFecha_Baja($hoy);
        $empresa_persona->setActivo('0');
        
        
        if($sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona))//desactivo la empresa_persona
        {
            $nueva_empresa_persona = new EmpresaPersona();
            $nueva_empresa_persona->setId_Persona($_REQUEST['id_persona']);
            $nueva_empresa_persona->setId_Empresa($_SESSION["id_empresa"]);
            $nueva_empresa_persona->setId_Perfil($_REQUEST['id_perfil']);
            $nueva_empresa_persona->setFecha_Vinculacion($hoy);
            $nueva_empresa_persona->setActivo('1');
            $nueva_empresa_persona->setId_regional($empresa_persona->getId_regional());
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
        else
        {
            echo '[{"suceso":"1","msg":"Problemas al guardar los datos."}]';
        }
        exit;
    }
    if ($_REQUEST['tarea'] == 'actualizarDatosPersona') {
        $hoy = date("Y-m-d H:i:s");
        
        $persona->setId_persona($_REQUEST['id_persona']);
        $persona->setNombres(mb_strtoupper($_REQUEST['nombres']));
        $persona->setPaterno(mb_strtoupper($_REQUEST['paterno']));
        $persona->setMaterno(mb_strtoupper($_REQUEST['materno']));

        if($_REQUEST['numero_contacto']!=''){
            $persona->setNumero_contacto($_REQUEST['numero_contacto']);
        }
        $persona->setEmail($_REQUEST['email']);
        $persona->setId_pais_origen($_REQUEST['pais_origen']);
        $persona->setId_departamento($_REQUEST['departamento']);
        $persona->setCiudad($_REQUEST['ciudad']);
        $persona->setDireccion($_REQUEST['direccion']);
        $persona->setUltima_modificacion($hoy);

        if ($sqlPersona->setGuardarPersona($persona)) {
            echo '{"success":true,"msg":"Los datos del usuario se actualizaron correctamente"}';
        }else{
            echo '{"success":false,"msg":"Problemas al actualizar los datos..."}';
        }
        
        exit;
    }
    
    if($_SESSION["tipo_usuario"]=='1'){
        $perfil->setTipo('1');
    }else{
        $perfil->setTipo('2');
    }
    
    if($_REQUEST['tarea']=='Persona_Empresa'){
        $FSPersona = new FacturaSenavexPersona();
        $sqlFSPersona = new SQLFacturaSenavexPersona();
        $FSPersona->setId_factura_senavex_empresa($_REQUEST['empresa_id']);
        $lista=$sqlFSPersona->getPersonaPorEmpresa($FSPersona);
        $strJson = '';
        echo '[';
        foreach ($lista as $datos){
            $strJson .= '{"id":"' . $datos->getId_factura_senavex_persona() .
                    '","ci":"'.$datos->getCi().
                    '","nombre":"'.$datos->getNombres().' '.$datos->getApellido_paterno().' '.$datos->getApellido_materno().'"},';
           
        }
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    if($_REQUEST['tarea']=='listarRegionales'){
        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        $lista = $sqlRegional->getListarRegional($regional);
        $strJson = '';
        $strJson_aux = '';
        echo '[';
        foreach ($lista as $datos){
            if($datos->getId_regional()==11){
                $strJson_aux= '{"id_regional":"' . $datos->getId_regional() .
                    '","ciudad":"'.$datos->getCiudad().'"},';
            }else{
                $strJson .= '{"id_regional":"' . $datos->getId_regional() .
                    '","ciudad":"'.$datos->getCiudad().'"},';
            }
           
        }
        $strJson.=$strJson_aux;
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    if($_REQUEST['tarea']=='agregarPersona'){
        //print('<pre>'.print_r($_REQUEST,true).'</pre>');
        $FSPersona = new FacturaSenavexPersona();
        $sqlFSPersona = new SQLFacturaSenavexPersona();
        
        $FSPersona->setCi($_REQUEST['persona_ci']);
        $FSPersona->setNombres($_REQUEST['persona_nombre']);
        $FSPersona->setApellido_paterno($_REQUEST['persona_apaterno']);
        $FSPersona->setApellido_materno($_REQUEST['persona_amaterno']);
        $sqlFSPersona->Save($FSPersona);
//        print('<pre>'.print_r($FSPersona,true).'</pre>');
        if(empty($FSPersona)==true){
                echo '-1';
        }else{
            
            echo '[';
            echo '{"id":"'.$FSPersona->getId_factura_senavex_persona().'",'
                .'"ci":"'.$FSPersona->getCi().'",'
                .'"nombre":"'.$FSPersona->getNombre().' '.$FSPersona->getApellido_paterno().' '.$FSPersona->getApellido_materno().'"}';
            echo ']';
        }
        exit;
    }
    if($_REQUEST['tarea']=='asignarPersonal'){
        
        $perfil = new Perfil();
        $sqlPerfil = new SQLPerfil();
        $perfil->setId_perfil($_SESSION['id_perfil']);
        $perfil = $sqlPerfil->getPerfilPorID($perfil);

        $datosperfil=$sqlPerfil->getListarPerfilPorTipo($perfil);
        $datostipodocumento=$sqlTipodocumentoidentidad->getListarTipoDocumentoIdentidad($tipodocumentoidentidad);
        $datospais=$sqlPais->getListarPaisSinNinguno($pais);
        $departamento = new Departamento();
        $sqlEmpresa =new SQLEmpresa();
        $datosdepartamento=$sqlEmpresa->getDatosDepartamento($departamento);
        
        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        $datosregionales = $sqlRegional->getListarRegional($regional);
        
        $vista->assign("editable",true);
        $vista->assign('datosperfil', $datosperfil);
        $vista->assign('tipo',$_SESSION["tipo_usuario"]);
        $vista->assign('datosregionales', $datosregionales);
        $vista->assign('datosdepartamento', $datosdepartamento);
        $vista->assign('datostipodocumento', $datostipodocumento);
        $vista->assign('datospais', $datospais);
        
        $vista->display("admPersona/AsignacionPersonal.tpl");
        if($_SESSION['id_empresa']==0){
         //   print('<pre>'.print_r($datospais,true).'</pre>');
        }
        exit;
    }
    /*$datosperfil=$sqlPerfil->getListarPerfilPorTipo($perfil);
    $datostipodocumento=$sqlTipodocumentoidentidad->getListarTipoDocumentoIdentidad($tipodocumentoidentidad);
    $datospais=$sqlPais->getListarPaisSinNinguno($pais);
    $departamento = new Departamento();
    $sqlEmpresa =new SQLEmpresa();
    $datosdepartamento=$sqlEmpresa->getDatosDepartamento($departamento);
    
    $regional = new Regional();
    $sqlRegional = new SQLRegional();
    $datosregionales = $sqlRegional->getListarRegional($regional);
    $vista->assign("editable",true);
    $vista->assign('datosperfil', $datosperfil);
    $vista->assign('tipo',$_SESSION["tipo_usuario"]);
    $vista->assign('datosregionales', $datosregionales);
    $vista->assign('datosdepartamento', $datosdepartamento);
    $vista->assign('datostipodocumento', $datostipodocumento);
    $vista->assign('datospais', $datospais);

    $vista->display("admPersona/AsignacionPersonal.tpl");*/
  }
  public static function existePersonaId($id_persona){
      $persona = new Persona();
      $persona->setId_persona($id_persona);
      $sqlPersona = new SQLPersona();
      return $sqlPersona->getDatosPersonaPorId($persona);
  }
  public static function asignarPersona($id_persona){

    //print('<pre>'.print_r($_REQUEST,true).'</pre>');exit;
    $persona = new Persona();
    $departamento = new Departamento();    
    $pais = new Pais();
    $tipodocumentoidentidad =new TipoDocumentoIdentidad();
    $sqlPersona = new SQLPersona();
    $sqlDepartamento = new SQLDepartamento();
    $sqlPais =new SQLPais();
    $sqlTipodocumentoidentidad = new SQLTipoDocumentoIdentidad();
    
    $persona->setId_persona($id_persona);
    $persona=$sqlPersona->getDatosPersonaPorId($persona);
    
    if($persona->getId_departamento())
    {
        $departamento->setId_departamento($persona->getId_departamento());
        $departamento=$sqlDepartamento->getBuscarDepartamentoPorId($departamento);
        $persona->setId_departamento($departamento->getNombre());
    }
    
    $pais->setId_pais($persona->getId_pais_origen());
    $pais=$sqlPais->getBuscarDescripcionPorId($pais);    
    $persona->setId_pais_origen($pais->getNombre());
    
    $tipodocumentoidentidad->setId_tipo_documentoidentidad($persona->getId_tipo_documento());
    $tipodocumentoidentidad=$sqlTipodocumentoidentidad->getBuscarDescripcionPorId($tipodocumentoidentidad);
    $persona->setId_tipo_documento($tipodocumentoidentidad->getDescripcion());
    
    return $persona;
  }
  public static function listarPersonasPorEmpresa($id_empresa)
  {
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        $empresa_persona->setId_Empresa($id_empresa);
        $datosempresapersona=$sqlEmpresaPersona->getListarPersonaPorEmpresa($empresa_persona);
        $i = -1;
        foreach ($datosempresapersona as $empresapersona) {
            $i++;
            $empresaPorPersona[$i] = array('id_persona'=>$empresapersona->persona->getId_persona(), 
                'id_empresa_persona'=>$empresapersona->getId_empresa_persona(), 
                'nombres'=>$empresapersona->persona->getNombres().' '.$empresapersona->persona->getPaterno().' '.$empresapersona->persona->getMaterno(), 
                'numero_documento'=>$empresapersona->persona->getNumero_documento(),
                'id_perfil'=>$empresapersona->perfil->getId_perfil(),
                'perfil'=>$empresapersona->perfil->getDescripcion(),
                'id_persona'=>$empresapersona->persona->getId_persona());
        } 
        return $empresaPorPersona;
  }
}