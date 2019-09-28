<?php

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
include_once(PATH_TABLA . DS . 'TipoEmpresa.php');
include_once(PATH_TABLA . DS . 'RequisitosRuex.php');
include_once(PATH_TABLA . DS . 'RequisitosModificacion.php');
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
include_once(PATH_MODELO . DS . 'SQLTipoEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLRequisitosRuex.php');
include_once(PATH_MODELO . DS . 'SQLRequisitosModificacion.php');

class AdmCorreo extends Principal {

  public function AdmCorreo()
  {
    if($_REQUEST['tarea']=='empresaAdmitidaRechazada')//enviamos correos de admisión de emrpesas
    {
        $correos=$this->obtenerCorreosEmpresa($_REQUEST['id_empresa']);
        $correos=explode( ',', $correos);
        $empresa= new Empresa();
        $sqlempresa= new SQLEmpresa();
        $empresa->setId_empresa($_REQUEST['id_empresa']);
        $empresa=$sqlempresa->getEmpresaPorID($empresa);
        if(trim($correos[0])==trim($correos[1]))
        {
            $this->enviarCorreo($correos[0],$empresa->getRazon_social(),'','','',12);
        }
        else
        {
            $this->enviarCorreo($correos[0].','.$correos[1],$empresa->getRazon_social(),'','','',12);
        }
        exit;
    }
    if($_REQUEST['tarea']=='empresaRegistroObservada')//enviamos correos de admisión de emrpesas
    {
        $correos=$this->obtenerCorreosEmpresa($_REQUEST['id_empresa']);
        $correos=explode( ',', $correos);
        $empresa= new Empresa();
        $sqlempresa= new SQLEmpresa();
        $empresa->setId_empresa($_REQUEST['id_empresa']);
        $empresa=$sqlempresa->getEmpresaPorID($empresa);
        if(trim($correos[0])==trim($correos[1]))
        {
            $this->enviarCorreo($correos[0],$empresa->getRazon_social(),$_REQUEST['observacion'],'','',11);
        }
        else
        {
            $this->enviarCorreo($correos[0].','.$correos[1],$empresa->getRazon_social(),$_REQUEST['observacion'],'','',11);
        }
        exit;
    }
    if($_REQUEST['tarea']=='empresaAdmitida')//enviamos correos de admisión de emrpesas
    {
        $correos=$this->obtenerCorreosEmpresa($_REQUEST['id_empresa']);
        $correos=explode( ',', $correos);
        $empresa= new Empresa();
        $sqlempresa= new SQLEmpresa();
        $empresa->setId_empresa($_REQUEST['id_empresa']);
        $empresa=$sqlempresa->getEmpresaPorID($empresa);
        
        global $id_empresa;
        global $id_persona;
        global $formail;
        $id_empresa=$empresa->getId_empresa();
        $id_persona=$empresa->getId_representante_legal();
        $formail=true;
        include PATH_CONTROLADOR . DS . 'impresionFirmaRuex' . DS . 'FpdfContrato.php';  
        $requisitos=$this->obtenerRequisitosEmpresa($empresa);
        
        if(trim($correos[0])==trim($correos[1]))
        {
            $this->enviarCorreo($correos[0],$empresa->getRazon_social(),$requisitos,'',$pdfdoc,5);
        }
        else
        {
            $this->enviarCorreo($correos[0].','.$correos[1],$empresa->getRazon_social(),$requisitos,'',$pdfdoc,5);
        }
        exit;
    }
    if($_REQUEST['tarea']=='empresaAdmitida2')//enviamos correos de admisión de emrpesas
    {
        
        $empresa= new Empresa();
        $sqlempresa= new SQLEmpresa();
        $empresa->setNit($_REQUEST['nit']);
        $empresa=$sqlempresa->getEmpresaPorNIT($empresa);
        
        $correos=$this->obtenerCorreosEmpresa($empresa->getId_empresa());
        $correos=explode( ',', $correos);
        
        
        global $id_empresa;
        global $id_persona;
        global $formail;
        $id_empresa=$empresa->getId_empresa();
        $id_persona=$empresa->getId_representante_legal();
        $formail=true;
        include PATH_CONTROLADOR . DS . 'impresionFirmaRuex' . DS . 'FpdfContrato.php';  
        $requisitos=$this->obtenerRequisitosEmpresa($empresa);
        
        if(trim($correos[0])==trim($correos[1]))
        {
            $this->enviarCorreo($correos[0],$empresa->getRazon_social(),$requisitos,'',$pdfdoc,5);
        }
        else
        {
            $this->enviarCorreo($correos[0].','.$correos[1],$empresa->getRazon_social(),$requisitos,'',$pdfdoc,5);
        }
        exit;
    }
    
     if($_REQUEST['tarea']=='empresaRuex')//enviamos correos de admisión de emrpesas
    {
        $correos=$this->obtenerCorreosEmpresa($_REQUEST['id_empresa']);
        $correos=explode( ',', $correos);
        $empresa= new Empresa();
        $sqlempresa= new SQLEmpresa();
        $empresa->setId_empresa($_REQUEST['id_empresa']);
        $empresa=$sqlempresa->getEmpresaPorID($empresa);
        $fecha_renovacion_a= explode("-", $empresa->getFecha_renovacion_ruex());
        $empresa->setFecha_renovacion_ruex($fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0]);
        
        if(trim($correos[0])==trim($correos[1]))
        {
            $this->enviarCorreo($correos[0],$empresa->getRazon_social(),$empresa->getRuex(),$empresa->getVigencia(),$empresa->getFecha_renovacion_ruex(),6);
        }
        else
        {
            $this->enviarCorreo($correos[0].','.$correos[1],$empresa->getRazon_social(),$empresa->getRuex(),$empresa->getVigencia(),$empresa->getFecha_renovacion_ruex(),6);
        }
        exit;
    }
    if($_REQUEST['tarea']=='empresaModificacionObservada')//enviamos correos de modificacion observada
    {
        $correos=$this->obtenerCorreosEmpresa($_REQUEST['id_empresa']);
        $correos=explode( ',', $correos);
        $empresa= new Empresa();
        $sqlempresa= new SQLEmpresa();
        $empresa->setId_empresa($_REQUEST['id_empresa']);
        $empresa=$sqlempresa->getEmpresaPorID($empresa);
        if(trim($correos[0])==trim($correos[1]))
        {
            $this->enviarCorreo($correos[0],$empresa->getRazon_social(),$_REQUEST['observacion'],'','',13);
        }
        else
        {
            $this->enviarCorreo($correos[0].','.$correos[1],$empresa->getRazon_social(),$_REQUEST['observacion'],'','',13);
        }
        exit;
    }
    if($_REQUEST['tarea']=='empresaAdmitidaModificacion')//enviamos correos de admisión de emrpesas
    {    
        $empresa= new Empresa();
        $sqlempresa= new SQLEmpresa();
        $empresa->setId_empresa($_REQUEST['id_empresa']);
        $empresa=$sqlempresa->getEmpresaPorID($empresa);
        $requisitos=$this->obtenerRequisitosModificacionEmpresa($_REQUEST['modificaciones'],$empresa);
        
        global $id_empresa;
        global $id_persona;
        global $formail;
        $id_empresa=$empresa->getId_empresa();
        $id_persona=$empresa->getId_representante_legal();
        $formail=true;
        include PATH_CONTROLADOR . DS . 'impresionFirmaRuex' . DS . 'FpdfContrato.php';  
        
        
        $correos=$this->obtenerCorreosEmpresa($_REQUEST['id_empresa']);
        $correos=explode( ',', $correos);
        $empresa= new Empresa();
        $sqlempresa= new SQLEmpresa();
        $empresa->setId_empresa($_REQUEST['id_empresa']);
        $empresa=$sqlempresa->getEmpresaPorID($empresa);
        if(trim($correos[0])==trim($correos[1]))
        {
            $this->enviarCorreo($correos[0],$empresa->getRazon_social(),$requisitos,'',$pdfdoc,14);
        }
        else
        {
            $this->enviarCorreo($correos[0].','.$correos[1],$empresa->getRazon_social(),$requisitos,'',$pdfdoc,14);
        }
        exit;
    }
    if($_REQUEST['tarea']=='empresaModificacionExitosa')//enviamos correos de admisión de emrpesas
    {
        $correos=$this->obtenerCorreosEmpresa($_REQUEST['id_empresa']);
        $correos=explode( ',', $correos);
        $empresa= new Empresa();
        $sqlempresa= new SQLEmpresa();
        $empresa->setId_empresa($_REQUEST['id_empresa']);
        $empresa=$sqlempresa->getEmpresaPorID($empresa);
        if(trim($correos[0])==trim($correos[1]))
        {
            $this->enviarCorreo($correos[0],$empresa->getRazon_social(),'','','',16);
        }
        else
        {
            $this->enviarCorreo($correos[0].','.$correos[1],$empresa->getRazon_social(),'','','',16);
        }
        exit;
    }
    if($_REQUEST['tarea']=='empresaModificacionRechazada')//enviamos correos de admisión de emrpesas
    {
        $correos=$this->obtenerCorreosEmpresa($_REQUEST['id_empresa']);
        $correos=explode( ',', $correos);
        $empresa= new Empresa();
        $sqlempresa= new SQLEmpresa();
        $empresa->setId_empresa($_REQUEST['id_empresa']);
        $empresa=$sqlempresa->getEmpresaPorID($empresa);
        if(trim($correos[0])==trim($correos[1]))
        {
            $this->enviarCorreo($correos[0],$empresa->getRazon_social(),'','','',15);
        }
        else
        {
            $this->enviarCorreo($correos[0].','.$correos[1],$empresa->getRazon_social(),'','','',15);
        }
        exit;
    }
    if($_REQUEST['tarea']=='envioDeclaracionJurada')//enviamos correos de envio de Declaración Jurada
    {
        $correos=$this->obtenerCorreosEmpresa($_REQUEST['id_empresa']);
        $correos=explode(',',$correos);
        $empresa= new Empresa();
        $sqlempresa= new SQLEmpresa();
        $empresa->setId_empresa($_REQUEST['id_empresa']);
        $empresa=$sqlempresa->getEmpresaPorID($empresa);
        if(trim($correos[0])==trim($correos[1]))
        {
            $this->enviarCorreo($correos[0],$empresa->getRazon_social(),'','','',31);
        }
        else
        {
            $this->enviarCorreo($correos[0].','.$correos[1],$empresa->getRazon_social(),'','','',31);
        }
        exit;
    }   
  }
  
  //Función para el envío de correos
  public static function enviarCorreo($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$tipo)//paramtrados utilizados como se vea conveniente
    {
        $tipocorreo = new TipoCorreo();
        $sqltipocorreo = new SQLTipoCorreo();
        $tipocorreo->setId_tipo_correo($tipo);
        $tipocorreo=$sqltipocorreo->getBuscarTipoCorreoPorId($tipocorreo);
        //-------------------------------Variables
        
        $asunto = 'Plataforma Virtual del Senavex - '.$tipocorreo->getAsunto();
        $remitente = "soporte@senavex.gob.bo"; //Aquí va la dirección de quien envía el email.
        
        
        //-----------------for sending an attachment of contract---------------
        if($tipo==5 || $tipo==14)
        {
            $eol = PHP_EOL;
            $filename = "Documento-Senavex.pdf";
            $attachment = chunk_split(base64_encode($parametro5));

            $separator = md5(time());

            // main header
            $headers  = "From: ".$remitente.$eol;
            $headers .= "MIME-Version: 1.0".$eol; 
            $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

            // no more headers after this, we start the body! //
            $mensaje.= "Content-Transfer-Encoding: 7bit".$eol.$eol;
            $mensaje.= "This is a MIME encoded message.".$eol;

            // message
            $mensaje .= "--".$separator.$eol;
            $mensaje .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
            $mensaje .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
        }
        else
        {
             //Cabecera de la funcion mail()
            $headers = "From: ".$remitente." \r\n";
            $headers .= "Reply-To: ".$remitente."\r\n"; //La dirección por defecto si se responde el email enviado.
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n"; //La codificación del email.           
        }
         //-------------------mensaje
        $mensaje .= '<html><body><img src="http://vortex.senavex.gob.bo/styles/img/logo_intro.png" height="70px">'
                . '<div  style="background-color:#d3d3d3;border-radius:10px;padding:10px;color:black;">';
        //-----------------for message--------------
        switch ($tipo) {
            case 1:
                $persona= new Persona();
                $sqlpersona= new SQLPersona();
                $empresa= new Empresa();
                $sqlempresa= new SQLEmpresa();
                
                $persona->setId_persona($parametro1);
                $persona=$sqlpersona->getDatosPersonaPorId($persona);
                
                $empresa->setId_empresa($parametro2);
                $empresa=$sqlempresa->getEmpresaPorID($empresa);
                
                $para = $persona->getEmail();//correo
                $mensaje .='<p style=\"height:100px;color:black;\">
                        <b>Saludos, '.$persona->getNombres().' </b>
                        <br/><br/>
                            Te informamos que se te asign&oacute; el perfil de Representante Legal en la empresa <b>"'.$empresa->getRazon_social().'"</b>.
                            <br/>
                            Con tu perfil podr&aacute;s:
                                <br/>
                                <br/>
                                - Habilitar Usuarios.<br/>
                                - Registrar y Firmar Documentos de Exportaci&oacuten, relacionados con el SENAVEX (DDJJs, Facturas Comerciales de Exportaci&oacute;n, Certificados de Origen, etc.).<br/>
                                - Autorizaci&oacute;n para realizar tr&aacute;mites.<br/>
                                - Renovar o modificar los datos de su RUEX.<br/>
                                - Firmar los t&eacute;rminos y condiciones de uso de la plataforma.<br/>
                                - Configurar tus datos personales,(Usuario, Contraseña)<br/>
                                <br/>
                            <br/>
                            <br/>
                            Saludos<br/>
                        <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                        </p>';
                break;
            case 2:         
                $para = $parametro1;//correo
                $mensaje .='<p style=\"height:100px;color:black;\">
                            <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                            <br/><br/>
                                Te informamos que tuvo un exitoso registro.
                                <br/>
                                Aqui tienes el acceso a tu cuenta:<br/>
                                <br/>
                                <br/>
                                <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO:'.'T-'.$parametro3.'</span></center><br/><br/>
                                <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A:'.$parametro4.'</span></center><br/>
                                <br/>
                                <br/>
                                No olvides que tienes cinco (5) d&iacute;as para registrar a tu empresa.<br/>
                                Atentamente<br/>
                            <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                        </p>';
                break;
            case 3:
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                            Te informamos que se te asign&oacute; el perfil de Representante Legal en la empresa <b>"'.$empresa->getRazon_social().'"</b>.
                            <br/>
                            Con tu perfil podr&aacute;s:
                                <br/>
                                <br/>
                                - Habilitar Usuarios.<br/>
                                - Registrar y Firmar Documentos de Exportaci&oacuten, relacionados con el SENAVEX (DDJJs, Facturas Comerciales de Exportaci&oacute;n, Certificados de Origen, etc.).<br/>
                                - Autorizaci&oacute;n para realizar tr&aacute;mites.<br/>
                                - Renovar o modificar los datos de su RUEX.<br/>
                                - Firmar los t&eacute;rminos y condiciones de uso de la plataforma.<br/>
                                - Configurar tus datos personales,(Usuario, Contraseña)<br/>
                            <br/>
                    Aqu&iacute; tienes el acceso a tu cuenta:<br/>
                    <br/>
                    <br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO: '.$parametro4.'</span></center><br/><br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A: '.$parametro5.'</span></center><br/>
                    <br/>
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;
            case 4:
                $para = $parametro1;//correo
                $mensaje .= 
                '<p style=\"height:100px;color:black;\">
                    <b> Damos una cordial bienvenida a la empresa <b>"'.$parametro2.'"</b> registrada exitosamente en nuestra plataforma virtual 
                    <br/><br/>
                        Le informamos que en su registro podra:
                        <br/>
                        <br/>
                        - Asignar a su personal (Representante Legal, Recojo de Tramites, etc).<br/>
                        - Modificar los datos de su empresa.<br/>
                        - Renovar su RUEX.<br/>
                        <br/>
                        Aqu&iacute; tiene el acceso a su cuenta:<br/>
                        <br/>
                        <br/>
                        <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO: '.$parametro3.'</span></center><br/><br/>
                        <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A: '.$parametro4.'</span></center><br/>
                        <br/>
                        <br/>
                        Le informamos que tambi&eacute;n se cre&oacute; un Representante Legal de la empresa, el cual se ha enviado al correo del Representante legal.<br/>
                        <br/>
                        Saludos<br/>
                    <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                </p>';
                break;
            case 5:    
                $para = $parametro1;
                $mensaje .= '<p style=\"height:100px;color:black;\">
                              <b> Saludos</b> 
                              <br/><br/>
                                  Le informamos que su empresa "'. $parametro2.'", ha sido admitida en nuestra plataforma para completar su registro, deber&aacute; aproximarse a cualquiera de nuestras oficinas a nivel nacional con los siguientes documentos:
                                  <br/><br/>'
                                  .$parametro3.
                                  '<br/> <br/>
                                  Atentamente<br/>
                              <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                          </p>';               
                break;
            case 6:         
              $para = $parametro1;//correo
              $mensaje .= '<p style=\"height:100px;color:black;\">
                      <b> Saludos</b> 
                      <br/><br/>
                          Felicidades!!,le informamos que su empresa "'. $parametro2.'" ha presentado los documentos solicitados y por lo tanto HABILITADA en el SENAVEX.
                          Su numero de ruex es el:
                           <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> RUEX: '.$parametro3.'</span></center><br/><br/>
                          Y cuenta con una vigencia de: "'. $parametro4.'",que terminara en fecha: '. $parametro5.'.                            
                          <br/> <br/>
                          Atentamente<br/>
                      <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                  </p>';
              break;
            case 7:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Habilitado para Firmas en la empresa <b>"'.$parametro3.'"</b>.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                            - Registrar y Firmar Documentos de Exportaci&oacuten, relacionados con el SENAVEX (DDJJs, Facturas Comerciales de Exportaci&oacute;n, Certificados de Origen, etc.).<br/>
                            - Autorizaci&oacute;n para realizar tr&aacute;mites.<br/>
                            - Configurar tus datos personales,(Usuario, Contraseña)<br/>
                        <br/>
                    Aqui tienes el acceso a tu cuenta:<br/>
                    <br/>
                    <br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO:'.$parametro4.'</span></center><br/><br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A:'.$parametro5.'</span></center><br/>
                    <br/>
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;
            case 8:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Apoderado en la empresa <b>"'.$parametro3.'"</b>.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Registrar y Firmar Documentos de Exportaci&oacuten, relacionados con el SENAVEX (DDJJs, Facturas Comerciales de Exportaci&oacute;n, Certificados de Origen, etc.).<br/>
                        - Autorizaci&oacute;n para realizar tr&aacute;mites.<br/>
                        - Configurar tus datos personales,(Usuario, Contraseña)<br/>
                        <br/>
                    Aqui tienes el acceso a tu cuenta:<br/>
                    <br/>
                    <br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO:'.$parametro4.'</span></center><br/><br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A:'.$parametro5.'</span></center><br/>
                    <br/>
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;
            case 9:
                $para = $parametro1;//correo
                $mensaje .='<p style=\"height:100px;color:black;\">
                        <b>Saludos, '.$parametro2.' </b>
                        <br/><br/>
                            Te informamos que se te ha habilitado para firmas en la empresa <b>"'.$parametro3.'"</b>.
                            <br/>
                            Con tu perfil podras:
                                <br/>
                                <br/>
                                - Registrar y Firmar Documentos de Exportaci&oacuten, relacionados con el SENAVEX (DDJJs, Facturas Comerciales de Exportaci&oacute;n, Certificados de Origen, etc.).<br/>
                                - Autorizaci&oacute;n para realizar tr&aacute;mites.<br/>
                                - Configurar tus datos personales,(Usuario, Contraseña)<br/>
                                <br/>
                            
                            <br/>
                            <br/>
                            Atentamente<br/>
                        <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                         </p>';
                break;
            case 10:                
                $para = $parametro1;//correo
                $mensaje .='<p style=\"height:100px;color:black;\">
                        <b>Saludos, '.$parametro2.' </b>
                        <br/><br/>
                            Te informamos que se te ha asignado el perfil de Apoderado en la empresa <b>"'.$parametro3.'"</b>.
                            <br/>
                            Con tu perfil podras:
                                <br/>
                                <br/>
                                - Registrar y Firmar Documentos de Exportaci&oacuten, relacionados con el SENAVEX (DDJJs, Facturas Comerciales de Exportaci&oacute;n, Certificados de Origen, etc.).<br/>
                                - Autorizaci&oacute;n para realizar tr&aacute;mites.<br/>
                                - Configurar tus datos personales,(Usuario, Contraseña)<br/>
                                <br/>
                            <br/>
                            <br/>
                            Atentamente<br/>
                        <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                         </p>';
                break;
             case 11:         
                $para = $parametro1;//correo
                $mensaje .= $parametro3.'<br/><br/>';
                break;
            case 12:                
                 $para = $parametro1;//correo
                $mensaje .= '<p style=\"height:100px;color:black;\">
                        <b> Saludos</b> 
                        <br/><br/>
                            Le informamos que su empresa "'. $parametro2.'" ha sido asignada para una nueva revisión de datos.
                            Ingrese con los accesos del Representate Legal a su Empresa y modifique sus datos, Agradecemos su colaboraci&oacute;n
                            <br/>
                            <br/> <br/>
                            Atentamente<br/>
                        <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                    </p>';
                break;
             case 13:         
                $para = $parametro1;//correo
                $mensaje .= $parametro3.'<br/><br/>';
                break;
             case 14:         
                $para = $parametro1;//correo
                $mensaje .= '<p style=\"height:100px;color:black;\">
                        <b> Saludos</b> 
                        <br/><br/>
                            Le informamos que la modificaci&oacute;n de su empresa "'. $parametro2.'" ha sido revisada satisfactoriamente, debera aproximarse a cualquiera de nuestras oficinas a nivel nacional con los siguientes documentos.
                           <br/><br/>'
                            .$parametro3.
                            '<br/> <br/>
                            Atentamente<br/>
                        <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                    </p>';
                break;
            case 15:         
                $para = $parametro1;//correo
                $mensaje .= '<p style=\"height:100px;color:black;\">
                        <b> Saludos</b> 
                        <br/><br/>
                            Le informamos que la modificaci&oacute;n de su empresa "'. $parametro2.'" ha sido Rechazada.
                            <br/>
                            <br/>Si desea cambiar sus datos, por favor envie una nueva modificaci&oacute;n en la plataforma.
                            <br/>
                            <br/> <br/>
                            Atentamente<br/>
                        <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                    </p>';
                break;
            case 16:         
                $para = $parametro1;//correo
                $mensaje .= '<p style=\"height:100px;color:black;\">
                        <b> Saludos</b> 
                        <br/><br/>
                            Le informamos que la modificaci&oacute;n/renovaci&oacute;n de su empresa "'. $parametro2.'" ha sido culminada satisfactoriamente.
                            <br/>
                            Puede ingresar a nuestra plataforma para revisar sus datos y vigencia.<br/>
                            Atentamente<br/>
                        <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                    </p>';
                break;
            //---------------------senavex-------------------------------------
            case 17:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Administrador en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Asignar Personal.<br/>
                        - Modificar/eliminar Personal<br/>
                        - Bloquear Empresas<br/>
                        <br/>
                    Aqui tienes el acceso a tu cuenta:<br/>
                    <br/>
                    <br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO:'.$parametro4.'</span></center><br/><br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A:'.$parametro5.'</span></center><br/>
                    <br/>
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;
            case 18:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Analista de Declaraciones Juradas en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Revisar Declaraciones Juradas.<br/>
                        - Brindar Asesoramiento en linea a Exportadores sobre las DDJJ.<br/>
                        <br/>
                    Aqui tienes el acceso a tu cuenta:<br/>
                    <br/>
                    <br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO:'.$parametro4.'</span></center><br/><br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A:'.$parametro5.'</span></center><br/>
                    <br/>
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;
            case 19:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Analista de RUEX en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Revisar Registros de Empresas.<br/>
                        - Revisar Modificaciones/renovaciones de RUEX.<br/>
                        - Validar RUEX.<br/>
                        - Consultar empresas con RUEX.<br/>
                        <br/>
                    Aqui tienes el acceso a tu cuenta:<br/>
                    <br/>
                    <br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO:'.$parametro4.'</span></center><br/><br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A:'.$parametro5.'</span></center><br/>
                    <br/>
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;
            case 20:         
                $para = $parametro1;//correo
                $mensaje .=
                '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Administraci&oacute;n de personal en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Asignar Personal.<br/>
                        - Modificar/eliminar Personal<br/>
                        - Administrar Permisos y Licencias del Personal.<br/>
                        <br/>
                    Aqui tienes el acceso a tu cuenta:<br/>
                    <br/>
                    <br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO:'.$parametro4.'</span></center><br/><br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A:'.$parametro5.'</span></center><br/>
                    <br/>
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;   
            case 21:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Analista de Certificados de Origen en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Revisar Certificados de Origen.<br/>
                        - Aprobar Certificados de Origen.<br/>
                        <br/>
                    Aqui tienes el acceso a tu cuenta:<br/>
                    <br/>
                    <br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO:'.$parametro4.'</span></center><br/><br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A:'.$parametro5.'</span></center><br/>
                    <br/>
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;   
            case 22:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Analista General en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Revisar Registros de Empresas.<br/>
                        - Revisar Modificaciones/renovaciones de RUEX.<br/>
                        - Validar RUEX.<br/>
                        - Consultar empresas con RUEX.<br/>
                        - Revisar Declaraciones Juradas.<br/>
                        - Brindar Asesoramiento en linea a Exportadores sobre las DDJJ.<br/>
                        - Revisar Certificados de Origen.<br/>
                        - Aprobar Certificados de Origen.<br/>
                        <br/>
                    Aqui tienes el acceso a tu cuenta:<br/>
                    <br/>
                    <br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO:'.$parametro4.'</span></center><br/><br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A:'.$parametro5.'</span></center><br/>
                    <br/>
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;   
            case 23:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Administración de facturas en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Revisar Depositos de los exportadores.<br/>
                        - Emitir Facturas.<br/>
                        <br/>
                    Aqui tienes el acceso a tu cuenta:<br/>
                    <br/>
                    <br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO:'.$parametro4.'</span></center><br/><br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A:'.$parametro5.'</span></center><br/>
                    <br/>
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break; 
            case 24:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Admisnitrador en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Asignar Personal.<br/>
                        - Modificar/eliminar Personal<br/>
                        - Bloquear Empresas<br/>
                        <br/>                   
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;
            case 25:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Analista de Declaraciones Juradas en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Revisar Declaraciones Juradas.<br/>
                        - Brindar Asesoramiento en linea a Exportadores sobre las DDJJ.<br/>
                        <br/>                                   
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;
             case 26:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Analista de RUEX en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Revisar Registros de Empresas.<br/>
                        - Revisar Modificaciones/renovaciones de RUEX.<br/>
                        - Validar RUEX.<br/>
                        - Consultar empresas con RUEX.<br/>
                        <br/>                   
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;
            case 27:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Administraci&oacute;n de personal en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Asignar Personal.<br/>
                        - Modificar/eliminar Personal<br/>
                        - Administrar Permisos y Licencias del Personal.<br/>
                        <br/>
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;   
             case 28:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Analista de Certificados de Origen en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Revisar Certificados de Origen.<br/>
                        - Aprobar Certificados de Origen.<br/>
                        <br/>                  
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;  
            case 29:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Analista General en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Revisar Registros de Empresas.<br/>
                        - Revisar Modificaciones/renovaciones de RUEX.<br/>
                        - Validar RUEX.<br/>
                        - Consultar empresas con RUEX.<br/>
                        - Revisar Declaraciones Juradas.<br/>
                        - Brindar Asesoramiento en linea a Exportadores sobre las DDJJ.<br/>
                        - Revisar Certificados de Origen.<br/>
                        - Aprobar Certificados de Origen.<br/>
                        <br/>                  
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break; 
            case 30:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te ha asignado el perfil de Administración de facturas en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podras:
                        <br/>
                        <br/>
                        - Revisar Depositos de los exportadores.<br/>
                        - Emitir Facturas.<br/>
                        <br/>                   
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;
            
            //********************* DECLARACIONES JURADAS **********************
            case 31:         
                $para = $parametro1;//correo
                $mensaje .=
                '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que '.$parametro3.' ha enviado una Declaración jurada de forma directa en la plataforma del SENAVEX.
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;
            case 32:
                $para = $parametro1;//correo
                $mensaje .=
                '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que '.$parametro3.' ha enviado una Solicitud de Asesoramiento para Declaración jurada en la plataforma del SENAVEX.
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break; 

            case 35:
                $persona= new Persona();
                $sqlpersona= new SQLPersona();
                $empresa= new Empresa();
                $sqlempresa= new SQLEmpresa();
                
                $persona->setId_persona($parametro1);
                $persona=$sqlpersona->getDatosPersonaPorId($persona);
                
                $empresa->setId_empresa($parametro2);
                $empresa=$sqlempresa->getEmpresaPorID($empresa);
                
                $para = $persona->getEmail();//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$persona->getNombres().' , saludos. </b>
                <br/><br/>
                    Tu pin transaccional para completar tu firma digital es:
                    <br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> PIN:'.$parametro3.'</span></center><br/><br/>
                    <br/>
                    <br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break; 

            case 33:
                $para = $parametro1;//correo
                $mensaje .=
                '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que ha sido revisada una Declaración Jurada para que pueda aprobarla en la plataforma del SENAVEX.
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break; 
            case 34:
                $para = $parametro1;//correo
                $mensaje .=
                '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que sido RECHAZADA una Declaración Jurada en la plataforma del SENAVEX. Se le insinúa revisar y realizar las correcciones si en caso se requiere.
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break; 
            case 36:
                $para = $parametro1;//correo
                $mensaje .=
                '<p style=\"height:100px;color:black;\">
                <b>Estimado Usuario </b>
                <br/>'.$parametro2.'<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p><br/>';
                break; 
        }
        
        $mensaje .='<a href="http://vortex.senavex.gob.bo/index.php">http://vortex.senavex.gob.bo</a>';
        $mensaje .= '</div></body></html>';
        //--------for the attachment---------
        if($tipo==5 || $tipo==14)
        {
            $mensaje .=$eol;    
            // attachment
            $mensaje .= "--".$separator.$eol;
            $mensaje .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
            $mensaje .= "Content-Transfer-Encoding: base64".$eol;
            $mensaje .= "Content-Disposition: attachment".$eol.$eol;
            $mensaje .= $attachment.$eol;
            $mensaje .= "--".$separator."--";
        }      

        //Mandamos el email.
        if(mail($para, utf8_decode($asunto), utf8_decode($mensaje), $headers))
        {
            return true;
        }
        else
        {
            return false;
        }
        //-----------------------------

  }
    public static function obtenerCorreosEmpresa($id_empresa){//te devuelve el correo de la empresa y de su rl principal
        $persona = new Persona();
        $sqlPersona = new SQLPersona();
        $empresa= new Empresa();
        $sqlempresa= new SQLEmpresa();

        $empresa->setId_empresa($id_empresa);
        $empresa=$sqlempresa->getEmpresaPorID($empresa);
        $persona->setId_persona($empresa->getId_representante_legal());
        $persona=$sqlPersona->getDatosPersonaPorId($persona);

        return $empresa->getEmail().','.$persona->getEmail();
    }
    public static function obtenerRequisitosEmpresa($empresa)
    {
        $requisitos='';
        $sqlrequisitosruex =new SQLRequisitosRuex();
        if(!is_null($empresa->getIdTipo_Empresa()))
        {
            $tipoempresa=new TipoEmpresa();
            $sqltipoempresa=new SQLTipoEmpresa();
            $tipoempresa->setId_tipo_empresa($empresa->getIdTipo_Empresa());
            $tipoempresa=$sqltipoempresa->getBuscarDescripcionPorId($tipoempresa);
            $arrayrequisitos= explode(",", $tipoempresa->getGrupo_requisitos());
            foreach ($arrayrequisitos as $requisito) {
               $requisitosruex =new RequisitosRuex();
               $requisitosruex->setId_requisitos_ruex($requisito);
               $requisitosruex=$sqlrequisitosruex->getRequisitosPorId($requisitosruex);
               if(!is_null($requisitosruex)) $requisitos.='- '.$requisitosruex->getDescripcion().'<br/>';
            }
        }
        if($empresa->getMenor_cuantia())//persona natural
        {
            $requisitosruex =new RequisitosRuex();
            $requisitosruex->setId_requisitos_ruex(1);
            $requisitosruex=$sqlrequisitosruex->getRequisitosPorId($requisitosruex);
            if(!is_null($requisitosruex)) $requisitos.='- '.$requisitosruex->getDescripcion().'<br/>';
            $requisitosruex =new RequisitosRuex();
            $requisitosruex->setId_requisitos_ruex(2);
            $requisitosruex=$sqlrequisitosruex->getRequisitosPorId($requisitosruex);
            if(!is_null($requisitosruex)) $requisitos.='- '.$requisitosruex->getDescripcion().'<br/>';
        }
        $requisitosruex =new RequisitosRuex();//poder tercera persona
        $requisitosruex->setId_requisitos_ruex(19);
        $requisitosruex=$sqlrequisitosruex->getRequisitosPorId($requisitosruex);
        if(!is_null($requisitosruex)) $requisitos.='- '.$requisitosruex->getDescripcion().'<br/>';
        if(!is_null($empresa->getOea()))//oea
        {
            $requisitosruex =new RequisitosRuex();
            $requisitosruex->setId_requisitos_ruex(20);
            $requisitosruex=$sqlrequisitosruex->getRequisitosPorId($requisitosruex);
            if(!is_null($requisitosruex)) $requisitos.='- '.$requisitosruex->getDescripcion().'<br/>';
        }
        if(!is_null($empresa->getNim()))//nim
        {
            $requisitosruex =new RequisitosRuex();
            $requisitosruex->setId_requisitos_ruex(21);
            $requisitosruex=$sqlrequisitosruex->getRequisitosPorId($requisitosruex);
            if(!is_null($requisitosruex)) $requisitos.='- '.$requisitosruex->getDescripcion().'<br/>';
        }
        return $requisitos;
    }
    public static function obtenerRequisitosModificacionEmpresa($modificaciones, $empresa)
    {        
        $requisitos='';
        $modificaciones=explode(',',$modificaciones);
        $sqlrequisitosruex =new SQLRequisitosRuex();
        $sqlrequisitosmodificacion =new SQLRequisitosModificacion();
        $requisitosruex =new RequisitosRuex();
        $id_requisitos='';
               
        foreach($modificaciones as $modificacion)
        {
            if($modificacion=='13') //de no habitual a habitual
            {   
                $tipoempresa=new TipoEmpresa();
                $sqltipoempresa=new SQLTipoEmpresa();
                $tipoempresa->setId_tipo_empresa($empresa->getIdTipo_Empresa());
                $tipoempresa=$sqltipoempresa->getBuscarDescripcionPorId($tipoempresa);
                $id_requisitos.= $tipoempresa->getGrupo_requisitos().',';
            }
            else
            {
                $requisitosmodificacion =new RequisitosModificacion();
                $requisitosmodificacion->setId_requisitos_modificacion($modificacion);
                $requisitosmodificacion=$sqlrequisitosmodificacion->getRequisitosModificacionPorId($requisitosmodificacion);         
                if($requisitosmodificacion->getId_requisitos()!=''){$id_requisitos.=$requisitosmodificacion->getId_requisitos().',';}
            }
        }       
        $id_requisitos=array_unique(explode(',',rtrim($id_requisitos, ",")));
        
        foreach ($id_requisitos as $requisito) {
           $requisitosruex =new RequisitosRuex();
           $requisitosruex->setId_requisitos_ruex($requisito);
           $requisitosruex=$sqlrequisitosruex->getRequisitosPorId($requisitosruex);
           if(!is_null($requisitosruex)) $requisitos.='- '.$requisitosruex->getDescripcion().'<br/>';
        }
        return $requisitos;
    }
}