<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEstadoDdjj {
    
  public function getListarEstadoDdjj(EstadoDdjj $estadoDdjj) {
    return $estadoDdjj->findAll();
  }
  public function getListarEstadoDdjjRevisionCertificador(EstadoDdjj $estadoDdjj, $ids) {
    $iterator = '';
    $i=0;
    $len = count($ids);
    foreach ($ids as $id) {

      $iterator .= 'id_estado_ddjj = '.$id;
      if($i < $len - 1) {
        $iterator .= ' or ';
      }
      $i++;
    }
    return $estadoDdjj->finder()->findAll($iterator);
  }


}