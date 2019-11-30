<?php
/*
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Principal.php v1.0 19-06-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */
/* control de acceso */
defined('_ACCESO') or die('Acceso restringido');

class Principal {

  public function getInicio() {
    $vista = self::getVistaInstance();    
     if($_SESSION['rol']=='temporal')
    {
        include_once( PATH_CONTROLADOR . DS . 'admEmpresaTemporal' . DS . 'AdmEmpresaTemporal.php');
            $admEmpresaTemporal = new admEmpresaTemporal();
             
    }
    if($_SESSION['rol']=='REGISTRO_IMPORTADOR')
    {
        include_once( PATH_CONTROLADOR . DS . 'admImportTemporal' . DS . 'AdmImportTemporal.php');
            $AdmImportTemporal = new AdmImportTemporal();
    }
    if($_SESSION['rol']=='root')
    {  
        if($_SESSION["tipo_usuario"] =='1')
        {
            if($_SESSION['id_perfil']=='')
            {
                $vista->display("avisos/sinPerfil.tpl");
            }
            else
            {
                include_once( PATH_CONTROLADOR . DS . 'admPanelPrincipal' . DS . 'AdmPanelPrincipal.php');
                $admEmpresaTemporal = new AdmPanelPrincipal();
            }  
        }
        if($_SESSION["tipo_usuario"] =='2')
        {
            if(isset($_SESSION["id_empresa_persona"]) or $_SESSION["id_empresa_persona"]=='x')
            {
                
                include_once( PATH_CONTROLADOR . DS . 'admPanelPrincipal' . DS . 'AdmPanelPrincipal.php');
                $admEmpresaTemporal = new AdmPanelPrincipal();
            }
            else 
            {
                $vista->display("avisos/sinPerfil.tpl");
            }
        }
        if($_SESSION["tipo_usuario"] =='3')
        {
            include_once( PATH_CONTROLADOR . DS . 'admPanelPrincipal' . DS . 'AdmPanelPrincipal.php');
            $admEmpresaTemporal = new AdmPanelPrincipal();
        }
    }  
  }
  public static function getVistaInstance() {
    $vista = new Vista();
    //Declarar tarea y opcion
    $vista->assign('tarea', $_REQUEST['tarea']);
    $vista->assign('opcion', $_REQUEST['opcion']);
    
    //Declarar las Variables de Sesión para pasarle a la vista
    if($_SESSION['rol']=='temporal');
    {
        $vista->assign('estado_usuario_temp', $_SESSION["estado_usuario_temp"]);
        $vista->assign('sw_bienvenida_temporal', $_SESSION["sw_bienvenida_temporal"]);
        //aqui van la variables de dsesion especificas del temporal
    }
    if($_SESSION['rol']=='root');
    {
        
        $vista->assign('opciones_persona', $_SESSION["opciones_persona"]);
        $vista->assign('tipo_usuario', $_SESSION["tipo_usuario"]);  
        $vista->assign('id_empresa', $_SESSION["id_empresa"]);
        $vista->assign('id_empresa_persona', $_SESSION["id_empresa_persona"]);
        
        if($_SESSION["tipo_usuario"] =='1')
        {
            $vista->assign('id_perfil', $_SESSION["id_perfil"]);
            $vista->assign('perfil', $_SESSION["perfil"]);
            $vista->assign('empresa', $_SESSION["empresa"]);
            $vista->assign('id_persona', $_SESSION["id_persona"]);
        }
        if($_SESSION["tipo_usuario"] =='2')
        {
            $vista->assign('id_perfil', $_SESSION["id_perfil"]);
            $vista->assign('perfil', $_SESSION["perfil"]);
            $vista->assign('empresa', $_SESSION["empresa"]);
            $vista->assign('id_persona', $_SESSION["id_persona"]);
            $vista->assign('ruex', $_SESSION["ruex"]);
            $vista->assign('menor_cuantia', $_SESSION["menor_cuantia"]);
            
        }
        if($_SESSION["tipo_usuario"] =='3')
        {
             $vista->assign('formato_imagen', $_SESSION["formato_imagen"]);
             $vista->assign('ruex', $_SESSION["ruex"]);
        }
    }
    $vista->assign('rol', $_SESSION['rol']);
    $vista->assign('movil', $_SESSION['movil']);
    $vista->assign('nombre', $_SESSION['nombre']);
    $vista->assign('nombrecompleto', $_SESSION["nombrecompleto"]);
    $vista->assign('formato_imagen', $_SESSION["formato_imagen"]);
    $vista->assign('id_usuario', $_SESSION['id_usuario']);
    $vista->assign('usuario', $_SESSION['usuario']);
    $vista->assign('clave', $_SESSION["clave"]);
    $vista->assign('email',$_SESSION["email"]);
    return $vista;
  }
}