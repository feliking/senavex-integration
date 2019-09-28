<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeDescripcion {
    
    public function Save(CafeDescripcion $cafeDescripcion){
        return $cafeDescripcion->save();
    }
    public function getCafeDescripcionPorID(CafeDescripcion $cafeDescripcion) {
        return $cafeDescripcion->finder()->find('id_cafe_descripcion = ?', $cafeDescripcion->getId_cafe_descripcion());
    }
    
    public function getListCafeDescripcion(CafeDescripcion $cafeDescripcion) {
        return $cafeDescripcion->findAll();
    }
    
    
    /********* Estadisticas *********/
    public function getListarCafeDescripcion(CafeDescripcion $cafeDescripcion) {
        return $cafeDescripcion->findAll();
    }

}