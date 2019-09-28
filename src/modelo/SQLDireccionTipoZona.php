<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDireccionTipoZona {
    
    public function save(Direccion $direccionTipoZona) {
        return $direccionTipoZona->save();
    }
    
    public function getDireccionTipoZonaByID(DireccionTipoZona $direccionTipoZona) {
        return $direccionTipoZona->finder()->findbyPk($direccionTipoZona->getId_direccion_tipo_zona());
    }
    
    public function getListDireccionTipoZona(DireccionTipoZona $direccionTipoZona) {
        return $direccionTipoZona->finder()->findAll();
    }
    

}