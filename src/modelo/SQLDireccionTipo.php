<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDireccionTipo {
    
    public function save(DireccionTipo $direccionTipo) {
        return $direccionTipo->save();
    }
    
    public function getDireccionTipoByID(DireccionTipo $direccionTipo) {
        return $direccionTipo->finder()->findbyPk($direccionTipo->getId_direccion_tipo());
    }
    
    public function getListDireccionTipo(DireccionTipo $direccionTipo) {
        return $direccionTipo->finder()->findAll();
    }
    

}