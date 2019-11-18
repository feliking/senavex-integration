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
    if($_REQUEST['tarea']=='empresaAdmitidaRechazada')//enviamos correos de admisi&oacute;n de emrpesas
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
    if($_REQUEST['tarea']=='empresaRegistroObservada')//enviamos correos de admisi&oacute;n de emrpesas
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
    
    if($_REQUEST['tarea']=='empresaAdmitida2')//enviamos correos de admisi&oacute;n de emrpesas
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
    
    if($_REQUEST['tarea']=='empresaAdmitida')//enviamos correos de admisi&oacute;n de emrpesas
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
    if($_REQUEST['tarea']=='empresaRuex')//enviamos correos de admisi&oacute;n de emrpesas
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
    if($_REQUEST['tarea']=='empresaAdmitidaModificacion')//enviamos correos de admisi&oacute;n de emrpesas
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
    if($_REQUEST['tarea']=='empresaModificacionExitosa')//enviamos correos de admisi&oacute;n de emrpesas
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
    if($_REQUEST['tarea']=='empresaModificacionRechazada')//enviamos correos de admisi&oacute;n de emrpesas
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
    if($_REQUEST['tarea']=='envioDeclaracionJurada')//enviamos correos de envio de Declaraci&oacute;n Jurada
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
    public static function enviarCorreo($parametro1,$parametro2,$parametro3,$parametro4,$parametro5,$tipo)//paramtrados utilizados como se vea conveniente
    {
        $tipocorreo = new TipoCorreo();
        $sqltipocorreo = new SQLTipoCorreo();
        $tipocorreo->setId_tipo_correo($tipo);
        $tipocorreo=$sqltipocorreo->getBuscarTipoCorreoPorId($tipocorreo);
        //-------------------------------Variables
        
        $asunto = 'Plataforma Virtual del Senavex - '.$tipocorreo->getAsunto();
        $remitente = EMAIL;
        
        $mensaje = '';
        //-----------------for sending an attachment of contract---------------
        if($tipo==5 || $tipo==14)
        {
            $eol = PHP_EOL;
            $filename = "Contrato-Senavex.pdf";
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
            $headers .= "Reply-To: ".$remitente."\r\n"; //La direcci&oacute;n por defecto si se responde el email enviado.
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n"; //La codificaci&oacute;n del email.           
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
                            Con tu perfil podr&acutes:
                                <br/>
                                <br/>
                                - Habilitar Usuarios.<br/>
                                - Registrar y Firmar Documentos de Exportaci&oacute;n, relacionados con el SENAVEX (DDJJs, Facturas Comerciales de Exportaci&oacute;n, Certificados de Origen, etc.).<br/>
                                - Autorizaci&oacute;n para realizar tr&aacute;mites.<br/>
                                - Renovar o modificar los datos de su RUEX.<br/>
                                - Firmar los t&eacute;rminos y condiciones de uso de la plataforma.<br/>
                                - Configurar tus datos personales,(Usuario, Contrase&ntilde;a)<br/>
                                - Subir su firma. <br/>
                                <br/>
                            
                            <br/>
                            <br/>
                            Atentamente<br/>
                        <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                         </p>';
                break;
            case 2:         
                $para = $parametro1;//correo
                $mensaje .='<p style=\"height:100px;color:black;\">
                            <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                            <br/><br/>
                                Te informamos que has tenido un exitoso registro.
                                <br/>
                                Aqui tienes el acceso a tu cuenta:<br/>
                                <br/>
                                <br/>
                                <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO:'.'T-'.$parametro3.'</span></center><br/><br/>
                                <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A:'.$parametro4.'</span></center><br/>
                                <br/>
                                <br/>
                                No olvides que tienes 5 dias para registrar a tu empresa.<br/>
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
                    Te informamos que se te asign&oacute; el perfil de Representante Legal en la empresa <b>"'.$parametro3.'"</b>.
                    <br/>
                    Con tu perfil podr&acutes:
                        <br/>
                        <br/>
                        - Habilitar Usuarios.<br/>
                        - Registrar y Firmar Documentos de Exportaci&oacute;n, relacionados con el SENAVEX (DDJJs, Facturas Comerciales de Exportaci&oacute;n, Certificados de Origen, etc.).<br/>
                        - Autorizaci&oacute;n para realizar tr&aacute;mites.<br/>
                        - Renovar o modificar los datos de su RUEX.<br/>
                        - Firmar los t&eacute;rminos y condiciones de uso de la plataforma.<br/>
                        - Configurar tus datos personales,(Usuario, Contrase&ntilde;a)<br/>
                        - Subir su firma. <br/>
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
            case 4:         
                $para = $parametro1;//correo
                $mensaje .= 
                '<p style=\"height:100px;color:black;\">
                    <b> Damos una cordial bienvenida a la empresa <b>"'.$parametro2.'"</b> registrada exitosamente en nuestra plataforma virtual 
                    <br/><br/>
                        Le informamos que en su registro podr&acute:
                        <br/>
                        <br/>
                        - Asignar a su personal (Representante Legal, Recojo de Tr&aacute;mites, etc).<br/>
                        - Modificar los datos de su empresa.<br/>
                        - Renovar su RUEX.<br/>
                        <br/>
                        Aqui tiene el acceso a su cuenta:<br/>
                        <br/>
                        <br/>
                        <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO:'.$parametro3.'</span></center><br/><br/>
                        <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A:'.$parametro4.'</span></center><br/>
                        <br/>
                        <br/>
                        Le informamos que tambi&eacute;n se a creado un representante legal o apoderado de la empresa, el cual se ha enviado al correo del Representante legal.<br/>
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
                                          Le informamos que su empresa "'. $parametro2.'" ha sido admitida en nuestra plataforma para completar su registro, deber&aacute; aproximarse a cualquiera de nuestras oficinas a nivel nacional con los siguientes documentos:
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
                          Felicidades!!,le informamos que su empresa "'. $parametro2.'" ha presentado los documentos solicitados.
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
                    Te informamos que se te asign&oacute; el perfil de Habilitado para Firmas en la empresa <b>"'.$parametro3.'"</b>.
                    <br/>
                    Con tu perfil podr&acutes:
                        <br/>
                        <br/>
                        - Registrar y Firmar Documentos de Exportaci&oacute;n, relacionados con el SENAVEX (DDJJs, Facturas Comerciales de Exportaci&oacute;n, Certificados de Origen, etc.).<br/>
                        - Autorizaci&oacute;n para realizar tr&aacute;mites.<br/>
                        - Configurar tus datos personales,(Usuario, Contrase&ntilde;a)<br/>
                        - Subir su firma. <br/>
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
                    Te informamos que se te asign&oacute; el perfil de Apoderado en la empresa <b>"'.$parametro3.'"</b>.
                    <br/>
                    Con tu perfil podr&acutes:
                        <br/>
                        <br/>
                        - Registrar y Firmar Documentos de Exportaci&oacute;n, relacionados con el SENAVEX (DDJJs, Facturas Comerciales de Exportaci&oacute;n, Certificados de Origen, etc.).<br/>
                        - Autorizaci&oacute;n para realizar tr&aacute;mites.<br/>
                        - Configurar tus datos personales,(Usuario, Contrase&ntildea)<br/>
                        - Subir su firma. <br/>
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
                            Con tu perfil podr&acutes:
                                <br/>
                                <br/>
                                - Registrar y Firmar Documentos de Exportaci&oacute;n, relacionados con el SENAVEX (DDJJs, Facturas Comerciales de Exportaci&oacute;n, Certificados de Origen, etc.).<br/>
                                - Autorizaci&oacute;n para realizar tr&aacute;mites.<br/>
                                - Configurar tus datos personales,(Usuario, Contrase&ntilde;a)<br/>
                                - Subir su firma. <br/>
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
                            Te informamos que se te asign&oacute; el perfil de Apoderado en la empresa <b>"'.$parametro3.'"</b>.
                            <br/>
                            Con tu perfil podr&acutes:
                                <br/>
                                <br/>
                                - Registrar y Firmar Documentos de Exportaci&oacute;n, relacionados con el SENAVEX (DDJJs, Facturas Comerciales de Exportaci&oacute;n, Certificados de Origen, etc.).<br/>
                                - Autorizaci&oacute;n para realizar tr&aacute;mites.<br/>
                                - Configurar tus datos personales,(Usuario, Contrase&ntilde;a)<br/>
                                - Subir su firma. <br/>
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
                            Le informamos que su empresa "'. $parametro2.'" ha sido asiganda para una nueva revisi&oacute;n de datos.
                            Ingese a su Empresa y modifique sus datos, Agradecemos su colaboraci&oacute;n
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
                            Puede ingresar a nuestra plataforma para revisar.<br/>
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
                    Te informamos que se te asign&oacute; el perfil de Admisnitrador en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que se te asign&oacute; el perfil de Analista de Declaraciones Juradas en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que se te asign&oacute; el perfil de Analista de RUEX en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que se te asign&oacute; el perfil de Administraci&oacute;n de personal en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que se te asign&oacute; el perfil de Analista de Certificados de Origen en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que se te asign&oacute; el perfil de Analista General en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que se te asign&oacute; el perfil de Administraci&oacute;n de facturas en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que se te asign&oacute; el perfil de Admisnitrador en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que se te asign&oacute; el perfil de Analista de Declaraciones Juradas en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que se te asign&oacute; el perfil de Analista de RUEX en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que se te asign&oacute;el perfil de Administraci&oacute;n de personal en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que se te asign&oacute;el perfil de Analista de Certificados de Origen en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que se te asign&oacute;el perfil de Analista General en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que se te asign&oacute;el perfil de Administraci&oacute;n de facturas en la plataforma del SENAVEX.
                    <br/>
                    Con tu perfil podr&acutes:
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
                    Te informamos que '.$parametro3.' ha enviado una Declaraci&oacute;n jurada de forma directa en la plataforma del SENAVEX.
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
                    Te informamos que '.$parametro3.' ha enviado una Solicitud de Asesoramiento para Declaraci&oacute;n jurada en la plataforma del SENAVEX.
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
                    Te pin transaccional para completar tu firma digital es:
                  
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
                <b>'.$parametro2.', </b>
                <br/><br/>
                    Te informamos que ha sido revisada una Declaraci&oacute;n Jurada la cual entro en vigencia, por favor cancelar la Declaración en un plazo de 15 dias.
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break; 
            case 34:
                $para = $parametro1;//correo
                $mensaje .=
                '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.',</b>
                <br/><br/>
                    Le informamos que su DDJJ ha sido rechazada en la plataforma virtual del SENAVEX. Por lo que, debe revisar y analizar dichas observaciones.
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
            case 37:
                $para = $parametro1;//correo
                $mensaje .='<p style=\"height:100px;color:black;\">
                            <b>'.$parametro2.', Has Solicitado el restablecimiento de tu contrase&ntilde;a. </b>
                            <br/><br/>
                                Aqui tienes el acceso a tu cuenta:<br/>
                                <br/>
                                <br/>
                                <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> USUARIO:'.$parametro3.'</span></center><br/><br/>
                                <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> CONTRASE&Ntilde;A:'.$parametro4.'</span></center><br/>
                                <br/>
                                <br/>
                                Te recomendamos cambiar tu contrase&ntilde;a desde el men&uacute; configuraci&oacute;n.<br/>
                                Atentamente<br/>
                            <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                        </p>';
                break;
            case 38:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te asign&oacute; el perfil de Tramitador en la empresa <b>"'.$parametro3.'"</b>.
                    <br/>
                    Con tu perfil podr&acutes:
                        <br/>
                        <br/>
                        - Presentar y Recoger documentaci&oacute;n pertinente a la empresa
                        - Configurar tus datos personales,(Usuario, Contrase&ntilde;a)<br/>
                        - Subir su firma. <br/>
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
            case 40:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te asign&oacute; el perfil de Tramitador en la empresa <b>"'.$parametro3.'"</b>.
                    <br/>
                    Con tu perfil podr&acutes:
                        <br/>
                        <br/>
                        - Presentar y Recoger documentaci&oacute;n pertinente a la empresa
                        - Configurar tus datos personales,(Usuario, Contrase&ntilde;a)<br/>
                        - Subir su firma. <br/>
                        <br/>
                    Aqui tienes el acceso a tu cuenta:<br/>
                    <br/>
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;
            //para APIS
            case 41:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', te damos la bienvenida a nuestra plataforma virtual </b>
                <br/><br/>
                    Te informamos que se te asign&oacute; el perfil de Administraci&oacute;n de la empresa '.$parametro3.' en la plataforma del SENAVEX.
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
                case 42:         
                $para = $parametro1;//correo
                $mensaje .=
                        '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.'</b><br/>
                 <b>De mi consideración:</b>
                <br/><br/>
                    Mediante la presente, invitamos a su persona a pasar por la oficina central  del SENAVEX para recoger la documentación y la notificación del RECHAZO de su Registro Único de Importador RUI-SENAVEX de la empresa '.$parametro3.', a partir del día de mañana en los horarios establecidos por la institución.
                    <br/>
                    Motivo del rechazo:<br/>
                    <br/>
                    <br/>
                    <center><span style="background-color:white;border-radius:10px;padding:10px;color:black;">'.$parametro4.'</span><br/>
                    <br/>
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>    
                 </p>';
                break;
          case 50:
            $para = $parametro1;
            $mensaje .=
              '<p style=\"height:100px;color:black;\">
                <b>Estimado Usuario </b>
                <br/> Le informamos que la declaracion jurada para el producto "'.$parametro2.'" a sido rechazada , por el siguiente motivo:
                <br/>'.$parametro3.'
                <br/> Por favor registre la Declaracion Jurada nuevamente con las correcciones pertinentes.
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>
                 </p><br/>';
            break;
          case 51:
            $para = $parametro1;
            $mensaje .=
              '<p style=\"height:100px;color:black;\">
                <b>Estimado Administrador</b>
                <br/> Te informamos que el sistema a creado la visita de verificación Nro. "'.$parametro2.'" asegurate de que este asignada a algun personal.<br>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>
                 </p><br/>';
            break;
          case 52:
            $para = $parametro1;//correo
            $mensaje .=
              '<p style=\"height:100px;color:black;\">
                <b>'.$parametro2.', </b>
                <br/><br/>
                    Te informamos que entro tu Declaraci&oacute;n Jurada fue facturada satisfactoriamente.
                    <br/>
                    Saludos<br/>
                <b>Servicio Nacional de Verificaci&oacute;n de Exportaciones </b>
                 </p>';
            break;
          case 53: // Se modifico la Declaracion Jurada
            $para = $parametro1;//correo
            $vista = Principal::getVistaInstance();
            $vista->assign('nombre',$parametro2);
            $vista->assign('codigo',$parametro4->getCorrelativo_ddjj());
            $mensaje .= $vista->fetch("correos/reasignarCorreo.tpl");

            break;
          case 54: // ddjj a visita de verificacion
            $para = $parametro1;//correo
            $vista = Principal::getVistaInstance();
            $vista->assign('nombre',$parametro2);
            $mensaje .= $vista->fetch("correos/visitaVerificacionCorreo.tpl");

            break;
        }
        
        $mensaje .='<a href="http://vortex.senavex.gob.bo/index.php">http://vortex.senavex.gob.bo</a>';
        $mensaje .= '</div></body></html>';
        //--------for the ttchmetn-----------
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