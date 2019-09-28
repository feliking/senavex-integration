<?php
session_start();
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     index.php v1.0 19-06-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/**
 * Define la variable _ACCESO con el valor de 1 para controlar
 * el acceso en todos los modulos del administrador
 */
define('_ACCESO', 1);
/**
 * Incluimos el archivo de configuracion y el archivo de la clase que enruta 
 * los modulos del sistema
 * */
error_reporting(E_ALL & ~E_NOTICE);
include_once('../config/Config.php');

include_once(PATH_SRC . DS . 'Aplicacion.php');

$aplicacion = new Aplicacion();
$aplicacion->getOpcion();

?>