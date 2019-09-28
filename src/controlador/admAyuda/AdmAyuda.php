<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 01-11-2014
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

class AdmAyuda extends Principal {

  public function AdmAyuda() {
    $vista = Principal::getVistaInstance();
    $vista->display("ayuda/".$_REQUEST['tarea'].".tpl");
    exit;
  }
}