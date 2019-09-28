<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 23-09-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'Usuario.php');
include_once(PATH_TABLA . DS . 'Perfil.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');

include_once(PATH_MODELO . DS . 'SQLUsuario.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLPerfil.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');

class AdmUsuario extends Principal {

  public function AdmUsuario() {

    $vista = Principal::getVistaInstance();

    $usuario = new Usuario();
    $perfil = new Perfil();
    $persona =  new Persona();
    $empresa_persona = new EmpresaPersona();
    $sqlUsuario = new SQLUsuario();
    $sqlPersona = new SQLPersona();
    $sqlPerfil = new SQLPerfil();
    $sqlEmpresaPersona = new SQLEmpresaPersona();
    
    if($_REQUEST['tarea']=='verificarContrasena')
    {
        $usuario->setUsuario($_SESSION["usuario"]);
        $usuario->setClave($_REQUEST["contrasena"]);
        $usuario = $sqlUsuario->getLoginUsuario($usuario);
        if (!empty($usuario)) { 
             echo '[{"suceso":"1","msg":"se encuantra el usuario"}]';
        }
        else
        {
             echo '[{"suceso":"0","msg":"no se encuentra el usuario."}]';
        }
        exit;
    }
    
    if($_POST['tarea']=='verificarUsuario'){
        $usuario->setUsuario($_REQUEST["nuevousuario"]);
        $resultado = $sqlUsuario->getVerificaUsuario($usuario);
        if ($resultado=='0'){
            echo 0;
        }
        else {
            echo 1;
        }
        exit;
    }

    if($_POST['tarea']=='ingresarSistema'){
        $datos_usuario = $this->getLoginUsuario($_REQUEST["usuario"], $_REQUEST["clave"]);
        
        if (!empty($datos_usuario)) { 
            
            $_SESSION["id_usuario_temp"] = $datos_usuario->getId();           
            $_SESSION["usuario_temp"] = $_POST["usuario_temp"];
            $_SESSION["clave_temp"] = md5($_POST["clave_temp"]);
             
             $vista->assign('sw_bienvenida_temporal', $datos_usuario->getBienvenida());
             $vista->assign('id_usuario_temp', $_SESSION["id_usuario_temp"]);
             $vista->assign('usuario_temp',$_SESSION["usuario_temp"]);
             $vista->assign('clave_temp', $_SESSION["clave_temp"]);
             $vista->display("menuPrincipal/Menuprincipal.tpl");
             exit;
          
        } else {
            $vista->assign("mensajelogin", "El Usuario y/o clave son incorrectos.");
            $vista->display("Index.tpl");
            exit;
        }
    }
    
    if($_POST['tarea']=='registrarSistemaTemporal')
    {
        $usuario_temp->setNombres($_REQUEST["nombre"]." ".$_REQUEST["apellidop"]."  ".$_REQUEST["apellidom"]);
        $usuario_temp->setCi($_REQUEST["ci"]);
        $usuario_temp->setFechanacimiento($_REQUEST["fechanacimiento"]);
        $usuario_temp->setEmail($_REQUEST["email"]);
        $usuario_temp->setEstado(0);        
        $usuario_temp->setUsuario($_REQUEST["ci"].$_REQUEST["nombre"][0].$_REQUEST["apellidop"][0]); 
        $clave=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
        $usuario_temp->setClave($clave); 
        $usuario_temp->setEstado(0);    
        
        if( $sqlUsuario->getVerificaEmail($usuario_temp)== 0)
        {
            $sqlUsuario->setGuardarUsuarioTemp($usuario_temp);
            echo '0';
        }else
        {
            echo '1';
        }
       
        /*
            $to      = 'renzocallachavez@gmail.com';
            $subject = 'Fake sendmail test';
            $message = 'If we can read this, it means that our fake Sendmail setup works!';
            $headers = 'From: myemail@egmail.com' . "\r\n" .
                       'Reply-To: myemail@gmail.com' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();

            if(mail($to, $subject, $message, $headers)) {
                echo 'Email sent successfully!';
            } else {
                die('Failure: Email was not sent!');
            }

         */
        //echo  $clave;
        exit;
        
    }

    $vista->assign("mensajelogin"," ");
    $vista->display("Index.tpl");
  }
  
  public function crearUsuarioRoot(){
    $usuario = new Usuario();
    $empresa = new Empresa();
    $sqlUsuario = new SQLUsuario();
    $sqlPersona = new SQLPersona();

    $empresa->setId_empresa($_REQUEST["id_empresa"]);
    
    
  }
}