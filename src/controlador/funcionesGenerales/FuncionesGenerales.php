<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 24-09-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'TransaccionFirmada.php');
include_once(PATH_TABLA . DS . 'Usuario.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Perfil.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'TipoCorreo.php');
include_once(PATH_TABLA . DS . 'AuditoriaEventos.php');
include_once(PATH_TABLA . DS . 'Firma.php');
include_once(PATH_TABLA . DS . 'MotivoAnulacion.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLUsuario.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLTransaccionFirmada.php');
include_once(PATH_TABLA . DS . 'Acceso.php');
include_once(PATH_MODELO . DS . 'SQLAcceso.php');
include_once(PATH_MODELO . DS . 'SQLPerfil.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLTipoCorreo.php');
include_once(PATH_MODELO . DS . 'SQLAuditoriaEventos.php');
include_once(PATH_MODELO . DS . 'SQLFirma.php');
include_once(PATH_MODELO . DS . 'SQLMotivoAnulacion.php');
include_once( PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');

class FuncionesGenerales extends Principal {
  public function FuncionesGenerales() {
      
    $empresapersona = new EmpresaPersona();
    $empresapersonaopciones = new EmpresaPersona();
    $transaccionFirmada = new TransaccionFirmada();
    $sqlempresapersona = new SQLEmpresaPersona();
    $sqlTransaccionFirmada = new SQLTransaccionFirmada();
    
    //------------------------------subir firma------------------
    if($_REQUEST['tarea']=='subirFirma')//subir imagen 
    {
        $firma = new Firma();
        $sqlfirma = new SQLFirma();
//        $firma->setId_persona($_SESSION['id_persona']);
        $firma->setId_persona($_REQUEST['id_persona']);
        $firma->setFecha(date("Y-m-d h:m:s"));
        $firma->setEstado(true);
        if($sqlfirma->setGuardarFirma($firma))
        {
            $img = $_REQUEST['imagen'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            if(file_put_contents('styles/img/firmas/'. $firma->getId_firma().'.png',base64_decode($img)))
            {
                $persona =new Persona();
                $sqlpersona =new SQLPersona();
                $persona->setId_persona($_SESSION['id_persona']);
                $persona=$sqlpersona->getDatosPersonaPorId($persona);
                $persona->setFirma(true);
                $sqlpersona->setGuardarPersona($persona);
                echo '[{"suceso":"1"}]';
            }
            else 
            {
                $sqlfirma->setEliminarFirma($firma);
                echo '[{"suceso":"0"}]';
            }
        }
        else
        {
             echo '[{"suceso":"0"}]';
        }
        exit;
    }
    
    if($_REQUEST['tarea']=='subirimagen')//subir imagen 
    {
        require_once(PATH_BASE . DS . 'lib'.DS.'ImageManipulator'.DS.'ImageManipulator.php');
        if ($_FILES['fotoupload']['error'] > 0) 
        {
            echo '[{"suceso":"1","msg":"Error de la imagen."}]';
            file_put_contents('/tmp/'. $_REQUEST['id'].'.png', $_REQUEST['data']);
        } 
        else 
        {
            // array of valid extensions
            $validExtensions = array('.jpg', '.jpeg', '.png');
            // get extension of the uploaded file
            
            $fileExtension = strrchr($_FILES['fotoupload']['name'], ".");
            // check if file Extension is on the list of allowed ones
            if (in_array($fileExtension, $validExtensions)) {                
                $manipulator = new ImageManipulator($_FILES['fotoupload']['tmp_name']);

                $width  = $manipulator->getWidth();
                $height = $manipulator->getHeight();
                $centreX = round($width /2);
                $centreY = round($height /2);

                //lo volvemos cuadrad y lo cortamos
                if($width  > $height ) 
                {
                    $x1 = $centreX - $centreY ; 
                    $y1 = 0; 
                    $x2 = $centreX + $centreY; 
                    $y2 = $height; 
                    // lo cortamos
                    $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
                }
                elseif($width  < $height)
                {
                    $x1 = 0; 
                    $y1 = $centreY-$centreX; 
                    $x2 = $width; 
                    $y2 = $centreY+$centreX; 
                    // lo cortamos
                    $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
                }
                //le damos tamaño de 100 x 100
                $newImage = $manipulator->resample(100, 100);
                //eliminar imagen  
                //guardamos la nueva imagen
                if($_SESSION["tipo_usuario"] =='3')
                {
                    try {
                    unlink('styles/img/empresas/' .$_SESSION['id_empresa'].'.'.$_SESSION['formato_imagen']);//borramos la imagen antigua
                    }catch (Exception $e) {}
                    //guardamos la nueva imagen
                    $manipulator->save('styles/img/empresas/' .$_SESSION['id_empresa']. $fileExtension);
                    $_SESSION['formato_imagen']=substr($fileExtension,1);//declaramos la nueva variable de session
                    //------guardamos el formato de la persona 
                    $empresa = new Empresa();
                    $sqlEmpresa = new SQLEmpresa();
                    $empresa->setId_empresa($_SESSION['id_empresa']);
                    $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
                    $empresa->setFormato_imagen(substr($fileExtension,1));
                    //----------
                    if ($sqlEmpresa->setGuardarEmpresa($empresa)) {
                        echo '[{"suceso":"0","msg":"imagen guardada correctamente.","id_empresa":"'.$_SESSION['id_empresa'].'","formato_imagen":"'.substr($fileExtension,1).'"}]';
                    }else{
                        echo '[{"suceso":"1","msg":"Problemas de conexion intentelo mas tarde."}]';
                    }

                    //----------
                }
                else
                {
                    try {
                    unlink('styles/img/personal/' .$_SESSION['id_persona'].'.'.$_SESSION['formato_imagen']);//borramos la imagen antigua
                    }catch (Exception $e) {}
                    //guardamos la nueva imagen
                    $manipulator->save('styles/img/personal/' .$_SESSION['id_persona']. $fileExtension);
                    $_SESSION['formato_imagen']=substr($fileExtension,1);//declaramos la nueva variable de session
                    //------guardamos el formato de la persona 
                    $persona = new Persona();
                    $sqlPersona = new SQLPersona();
                    $persona->setId_persona($_SESSION['id_persona']);
                    $persona=$sqlPersona->getDatosPersonaPorId($persona);
                    $persona->setFormato_imagen(substr($fileExtension,1));
                    //----------
                    if ($sqlPersona->setGuardarPersona($persona)) {
                        echo '[{"suceso":"0","msg":"imagen guardada correctamente.","id_persona":"'.$_SESSION['id_persona'].'","formato_imagen":"'.substr($fileExtension,1).'"}]';
                    }else{
                        echo '[{"suceso":"1","msg":"Problemas de conexion intentelo mas tarde."}]';
                    }
                }
            }
            else
            {
                echo '[{"suceso":"1","msg":"Formato de imagen no admitido."}]';
            }
        }
        exit;
    }
    if($_REQUEST['tarea']=='cambiaropciones')//esto es para cambiar el orden de las opciones por persona
    {
        $_SESSION["opciones_persona"] =str_split($_REQUEST['opciones_persona_c']);
        if($_SESSION["tipo_usuario"]=='1' or ($_SESSION["tipo_usuario"]=='2' and !isset($_SESSION["ingresoempresa"])))
        {
            $empresapersona->setId_empresa_persona($_SESSION["id_empresa_persona"]);
            $empresapersonaopciones = $sqlempresapersona-> getEmpresaPersonaPorID($empresapersona);
            if (!empty($empresapersonaopciones )) 
            {
                $empresapersonaopciones->setOpciones_persona($_REQUEST['opciones_persona_c']);
                $sqlempresapersona->setGuardarEmpresaPersona($empresapersonaopciones);
            }
        }
        exit;
    }
    if($_REQUEST['tarea']=='generarPin')//es para solicitar u pin
    {
        $hoy=date("Y-m-d h:m:s");
        $pin=substr(str_shuffle("0123456789"), 0, 4);
        
        $transaccionFirmada->setId_evento($_REQUEST['id_evento']);
        $transaccionFirmada->setPin($pin);
        $transaccionFirmada->setId_persona($_REQUEST['id_persona']);
        $transaccionFirmada->setId_empresa($_REQUEST['id_empresa']);
        $transaccionFirmada->setEstado(FALSE);
        $transaccionFirmada->setFecha_solicitud_transaccion($hoy);

        if($sqlTransaccionFirmada->setGuardarTransaccion($transaccionFirmada)){
            $datTransaccionFirmada = $sqlTransaccionFirmada->getDatosTransaccionPorId($transaccionFirmada);
            echo $pin.":".$datTransaccionFirmada->getId_transaccion_firmada();
        }else{
            echo "0:0";
        }
        exit;
    }
     if($_REQUEST['tarea']=='generarPinCorreo')//es para solicitar u pin
    {
        $hoy=date("Y-m-d h:m:s");
        $pin=substr(str_shuffle("0123456789"), 0, 4);
        
        $transaccionFirmada->setId_evento($_REQUEST['id_evento']);
        $transaccionFirmada->setPin($pin);
        $transaccionFirmada->setId_persona($_REQUEST['id_persona']);
        $transaccionFirmada->setId_empresa($_REQUEST['id_empresa']);
        $transaccionFirmada->setEstado(FALSE);
        $transaccionFirmada->setFecha_solicitud_transaccion($hoy);

        if($sqlTransaccionFirmada->setGuardarTransaccion($transaccionFirmada)){
            $datTransaccionFirmada = $sqlTransaccionFirmada->getDatosTransaccionPorId($transaccionFirmada);
            //enviar correo.
            if(AdmCorreo::enviarCorreo($_REQUEST['id_persona'],$_REQUEST['id_empresa'],$pin,'Pin Transaccional','',35));
            {
                echo $pin.":".$datTransaccionFirmada->getId_transaccion_firmada();
            }
            
        }
        exit;
    }
    if($_REQUEST['tarea']=='borrarPin')//es para borrar un pin que no ha sido utilizado
    {
        $transaccionFirmada->setId_transaccion_firmada($_REQUEST['id_transaccion_pin']);
        if($sqlTransaccionFirmada->setEliminarTransaccion($transaccionFirmada)){
            echo "1";
        }else{
            echo "0";
        }
        exit;
    }
    if($_REQUEST['tarea']=='verificarPin')//es para verificar si el pin introducido es igual al de la tabla
    {
        $transaccionFirmada->setId_transaccion_firmada($_REQUEST['id_transaccion_pin']);
        $transaccionFirmada->setPin($_REQUEST['pin_introducido']);
        
        $resultado=$sqlTransaccionFirmada->setVerificarPin($transaccionFirmada);
        if(!empty($resultado)){
            echo '1';
        }
        else {
            echo '0';
        }
        exit;
    }

    if($_REQUEST['tarea']=='firmarPin')//es para cambiar el estado de la transaccion
    {      
        $hoy=date("Y-m-d h:m:s");
        $transaccionFirmada->setId_transaccion_firmada($_REQUEST['id_transaccion_pin']);
        $transaccionFirmada=$sqlTransaccionFirmada->getDatosTransaccionPorId($transaccionFirmada);
        $transaccionFirmada->setEstado(TRUE);
        $transaccionFirmada->setFecha_confirmacion_transaccion($hoy);
        //------------------esto es para la auditoriaeventos------------------------------
                       
        if($sqlTransaccionFirmada->setGuardarTransaccion($transaccionFirmada)){
     
                $auditoriaeventos = new AuditoriaEventos();
                $sqlauditoriaeventos = new SQLAuditoriaEventos();
                $auditoriaeventos->setIp($_SERVER['REMOTE_ADDR']);
                $auditoriaeventos->setId_transaccion_firmada($_REQUEST['id_transaccion_pin']);
                $auditoriaeventos->setId_servicio_exportador($_REQUEST['id_servicio_exportador']);
                if($sqlauditoriaeventos->setGuardarAuditoriaEventos($auditoriaeventos)) echo '1';
                else echo '0';
        }else{
            echo '0';
        }
        exit;
    }
    
    if($_REQUEST['tarea']=='listarMotivoAnulacion'){
        $motivo_anulacion = new MotivoAnulacion();
        $sqlMotivoAnulacion = new SQLMotivoAnulacion();
        
        $resultado = $sqlMotivoAnulacion->getListarMotivoAnulacion($motivo_anulacion);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            
            $strJson .= '{"id_motivo_anulacion":"' . $datos->getId_motivo_anulacion() .
                    '","descripcion":"' . $datos->getDescripcion() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if($_REQUEST['tarea']=='codificar')//esto es para cambiar el orden de las opciones por persona
    {
        echo sha1($_SESSION['id_empresa']);
        exit;
    }
    if($_REQUEST['tarea']=='encuesta_dat')//esto es para cambiar el orden de las opciones por persona
    {
        $empresa = new Empresa();
        $sqlEmpresa = new SQLEmpresa();
        $empresa->setId_empresa($_SESSION['id_empresa']);
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
        echo ($_SESSION["tipo_usuario"]);        
        echo("|");
        echo $empresa->getEncuesta();
        exit;
    }
    
  }
  public static function MensajeBienvenida()
  {
        date_default_timezone_set('America/La_Paz');//eteblacemos la fecha y hora pordefecto..
        $hora= date ("H");
        if ($hora<6) { 
        $mensaje=" Hoy has madrugado mucho... "; 
        }elseif($hora<8){ 
        $mensaje=" Hoy has madrugado.. "; 
        }elseif($hora<12){ 
        $mensaje=" Buenos días "; 
        }elseif($hora<13){ 
        $mensaje="Hora del Almuerzo"; 
        }elseif($hora<19){ 
        $mensaje="Buenas Tardes "; 
        }elseif($hora<22){ 
        $mensaje="Buenas Noches "; 
        }else{ $mensaje="Seguimos trabajando.."; } 
        
        return $mensaje;
  }
   public static function diasrestantesusuariotemporal($fecha)
  {
    $datetime1 = new DateTime($fecha);
    $datetime2 = new DateTime(date ('Y-m-d'));
    $interval = $datetime1->diff($datetime2);
    $dias=$interval->days;
    if($dias>= 5)
    {
       $dias=0;
    }
    else
    {
        $dias=5-$dias;
    }
    return $dias;
  }  
  public static function fechaenespañol()
  {
    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

    return $dias[date('w')].", ".date('d')." de ".$meses[date('n')-1]. " de ".date('Y') ;;
  } 
  public static function perfilesEnEmpresaPorPersona($id_persona)
  {
    $empresapersona = new EmpresaPersona();
    $sqlempresapersona = new SQLEmpresaPersona();
    $empresapersona->setId_Persona($id_persona);
    $empresas=$sqlempresapersona->getListarEmpresaPorPersona($empresapersona);
    return $empresas;
  }

  public static function perfilesEnEmpresaPorPersonaApi($id_persona)
  {
    $empresapersona = new EmpresaPersona();
    $sqlempresapersona = new SQLEmpresaPersona();
    $empresapersona->setId_Persona($id_persona);
    $empresas=$sqlempresapersona->getListarEmpresaPorPersonaApi($empresapersona);
    return $empresas;
  }

  public static function perfilesEnEmpresaPorPersona1($id_persona)
  {
    $empresapersona = new EmpresaPersona();
    $sqlempresapersona = new SQLEmpresaPersona();
    $empresapersona->setId_Persona($id_persona);
    $empresas=$sqlempresapersona->getListarEmpresaPorPersona($empresapersona);
    return $empresas;
  }
  
  public static function generarUsuarioRoot($nit){
    
    $usuario = new Usuario();
    $sqlUsuario = new SQLUsuario();
    
    $hoy = date("Y-m-d h:m:s");
    $usuario->setUsuario($nit);
    $clave=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
    //$clave='12345678';
    $usuario->setClave($clave);
    $usuario->setFecha_creacion($hoy);
    $usuario->setUltima_modificacion($hoy);
    $usuario->setId_persona(0);
    $usuario->setActivo(TRUE);
    $usuario->setId_tipo_usuario(3);

    if($sqlUsuario->setGuardarUsuario($usuario)){
        $datUsuario = $sqlUsuario->getDatosUsuarioPorId($usuario);
        //Enviar Mail a root con usr y pass
        
        return $datUsuario->getId_usuario().','.$clave.','.$nit;
    }else{
        return null;
    }
  }
  public static function generarRepresentanteLegal(Empresa $empresa,$nombres,$apellidop,$apellidom,$tipodocumento,$documento,$direccion,$numerocontacto2,$idpais,$genero,$email,$id_persona,$cargo,$expedido)
  {
       //--------guardamos la persona en el objeto 
        $logs = new Logs();
        $sqlLogs = new SQLLogs();
        
        $persona = new Persona();
        $sqlPersona = new SQLPersona();
        $hoy = date("Y-m-d h:m:s");
        $usuario = new Usuario();
        $sqlUsuario = new SQLUsuario();
            
        if($id_persona=='0')
        {
            //es nuevo
            $persona->setNombres(mb_strtoupper($nombres));
            $persona->setPaterno(mb_strtoupper($apellidop));
            $persona->setMaterno(mb_strtoupper($apellidom));
            $persona->setId_tipo_documento($tipodocumento);
            $persona->setNumero_documento($documento);//este es el documento
            $persona->setDireccion($direccion);
           // if($numerocontacto!=''){$persona->setNumero_contacto($numerocontacto);}
           // if($numerocontacto2!=''){$persona->setNumero_contacto2($numerocontacto2);}
            $persona->setExpedido($expedido);
            $persona->setEmail($email);
            $persona->setId_pais_origen($idpais);
            $persona->setFecha_creacion($hoy);
            $persona->setEstado(1);//para el estado activo
            $persona->setId_usuario_creacion($_SESSION['id_usuario']);
            if($genero==1) $persona->setGenero(true);
            else $persona->setGenero(false);
            try{
                 $sqlPersona->setGuardarPersona($persona);
            } catch (Exception $ex) {
                $logs->setDescripcion('ERROR: generarRepresentanteLegal: creacion de la PERSONA');
                $logs->setId_servicio(0);
                $logs->setMensaje($ex->getMessage());
                $logs->setObjeto(print_r($persona,true));
                $logs->setDate(Date('Y-m-d H:i:s'));
                $sqlLogs->Save($logs);
                return null;
            }
           
            
            //esto es para crear el nombre del usuario
            $campousuario=trim($persona->getNombres());
            $campousuario=$campousuario[0].$persona->getNumero_documento();
            //-guardamos el usuario
            
            $usuario->setUsuario($campousuario);
            $usuario->setClave(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8));
            //$usuario->setClave('123456');
            $usuario->setFecha_creacion($hoy);
            $usuario->setId_persona($persona->getId_persona());
            $usuario->setActivo(1);
            $usuario->setId_tipo_usuario(2);
            try{
                $sqlUsuario->setGuardarUsuario($usuario);
            } catch (Exception $ex) {
                $logs->setDescripcion('ERROR: generarRepresentanteLegal: creacion del USUARIO');
                $logs->setId_servicio(0);
                $logs->setMensaje($ex->getMessage());
                $logs->setObjeto(print_r($usuario,true));
                $logs->setDate(Date('Y-m-d H:i:s'));
                $sqlLogs->Save($logs);
                $sqlPersona->delete($persona);
                return null;
            }
        }
        else
        {
            //es antiguo
            $persona->setId_persona($id_persona);
            $persona = $sqlPersona->getDatosPersonaPorId($persona);
            $usuario->setId_persona($id_persona);
            $usuario=$sqlUsuario->getDatosUsuarioPorIdPersona($usuario);
        }
        
        $perfil = new Perfil();
        $sqlPerfil = new SQLPerfil();
        $perfil->setId_perfil(3);//es pa el RL
        $perfil=$sqlPerfil->getBuscarDescripcionPorId($perfil);
        $perfil->getOpciones();

        $empresa_persona = new EmpresaPersona();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        $empresa_persona->setId_Persona($persona->getId_persona());
        $empresa_persona->setId_Empresa($empresa->getId_empresa());
        $empresa_persona->setId_Perfil(3);
        $empresa_persona->setFecha_Vinculacion($hoy);
        $empresa_persona->setOpciones_persona($perfil->getOpciones());
        $empresa_persona->setActivo(1);
        $empresa_persona->setCargo($cargo);
        try{
            $sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona);
            return $persona->getId_persona().','.$usuario->getClave().','.$campousuario.','.$persona->getEmail();
        } catch (Exception $ex) {
            $logs->setDescripcion('ERROR: generarRepresentanteLegal: registo EMPRESA - PERSONA');
            $logs->setId_servicio(0);
            $logs->setMensaje($ex->getMessage());
            $logs->setObjeto(print_r($empresa_persona,true));
            $logs->setDate(Date('Y-m-d H:i:s'));
            $sqlLogs->Save($logs);
            $sqlPersona->delete($persona);
            $sqlUsuario->delete($usuario);
        }
        return null;
        /*if($sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona)){
            return $persona->getId_persona().','.$usuario->getClave().','.$campousuario.','.$persona->getEmail();
        }else return null;*/
  }
  
  public static function guardarAccesoUsuario($id_usuario){
    $acceso = new Acceso();
    $sqlAcceso = new SQLAcceso();
   $acceso->setId_Usuario($id_usuario);
    $acceso->setFecha_Acceso(date("Y-m-d h:m:s"));
    $acceso->setIp($_SERVER['REMOTE_ADDR']);
   
    $sqlAcceso->setGuardarAcceso($acceso);
  }
  
  public static function fechaConDiayMesLiteral($fecha){
    $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
    $array_fecha = explode("-", $fecha);
    $dia = $dias[date('N', strtotime($fecha))];
    $mes = name_date($array_fecha[1]);
    switch ($mes){
        case '01': $mes_literal="enero"; break;
        case '02': $mes_literal="febrero"; break;
        case '03': $mes_literal="marzo"; break;
        case '04': $mes_literal="abril"; break;
        case '05': $mes_literal="mayo"; break;
        case '06': $mes_literal="junio"; break;
        case '07': $mes_literal="julio"; break;
        case '08': $mes_literal="agosto"; break;
        case '09': $mes_literal="septiembre"; break;
        case '10': $mes_literal="octubre"; break;
        case '11': $mes_literal="noviembre"; break;
        case '12': $mes_literal="diciembre"; break;
    }
    $fecha_transformada = $dia.' '. substr($array_fecha[2],0,2).' de '.$mes_literal.' de '.$array_fecha[0];
    
    return $fecha_transformada;
  }
}