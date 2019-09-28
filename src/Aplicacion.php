<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Aplicacion.php v1.0 19-06-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_BASE . DS . 'config' . DS . 'Vista.php');
include_once(PATH_CONTROLADOR . DS . 'Principal.php');

class Aplicacion {
    /* instancia conexion a base de datos */
    private $db = null;
    /* variable de la vista */
    private $vista = null;
    
    /*** constructor ***/
    public function Aplicacion() {
        $this->vista = new Vista();
    }

    public function getOpcion() {
         
       
                
	if ($_SESSION["rol"] == '') {
            include_once( PATH_CONTROLADOR . DS . 'login' . DS . 'Login.php');
            $login = new Login();
            exit;
        }
        //Hacer un buscador del Controlador Correspondiente
        $clase = ucfirst($_REQUEST["opcion"]);
        $archivo_modulo = PATH_CONTROLADOR . DS . $_REQUEST["opcion"] . DS . $clase . '.php';
    
        //var_dump($archivo_modulo);
        
        if (file_exists($archivo_modulo)) {           
            include_once($archivo_modulo);
            $controlador = new $clase();
        } else {
            $principal = new Principal();
            $principal->getInicio();
        }
    }

}

?>