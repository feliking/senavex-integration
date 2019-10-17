<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLRegional {
    
    public function getListarRegional(Regional $regional){
        return $regional->finder()->findAll('activo=TRUE order by ciudad asc');
    }
    public function getListarRegionales(Regional $regional, $nacional) {
        return $regional->finder()->findAll('activo=TRUE '.($nacional==true? '':'and id_regional!=11 '). ' order by ciudad asc');
    }
   
    public function getBuscarRegionalPorId(Regional $regional) {
        return $regional->finder()->find('id_regional='.$regional->getId_regional());
    }
  public function getBuscarRegionalPorDepto(Regional $regional) {
    return $regional->finder()->find('id_departamento='.$regional->getId_departamento());
  }
      
}