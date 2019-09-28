<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeCaracteristicasEspeciales {
    
    public function getCafeCaracteristicasEspecialesxID(CafeCaracteristicasEspeciales $cafeCaracteristicasEspeciales) {
        return $cafeCaracteristicasEspeciales->finder()->find('id_cafe_caracteristicas_especiales = ?', $cafeCaracteristicasEspeciales->getId_cafe_caracteristicas_especiales());
    }
    
    function getListaCafeCaracteristicasEspeciales(CafeCaracteristicasEspeciales $cafeCaracteristicasEspeciales){
        return $cafeCaracteristicasEspeciales->finder()->findAll();
    }
}