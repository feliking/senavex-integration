<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDireccionUbicacionEdificio {
    
    public function save(DireccionUbicacionEdificio $direccionUbicacionEdificio) {
        return $direccionUbicacionEdificio->save();
    }
    
    public function getDireccionUbicacionEdificioByID(DireccionUbicacionEdificio $direccionUbicacionEdificio) {
        return $direccionUbicacionEdificio->finder()->findbyPk($direccionUbicacionEdificio->getId_direccion_ubicacion_edificio());
    }
    
    public function getListDireccionUbicacionEdificio(DireccionUbicacionEdificio $direccionUbicacionEdificio) {
        return $direccionUbicacionEdificio->finder()->findAll();
    }
}