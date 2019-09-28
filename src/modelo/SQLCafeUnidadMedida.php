<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeUnidadMedida {
    
    public function Save(CafeUnidadMedida $cafeUnidadMedida){
        return $cafeUnidadMedida->save();
    }
   
    public function getCafeUnidadMedidaPorID(CafeUnidadMedida $cafeUnidadMedida) {
        return $cafeUnidadMedida->finder()->find('id_cafe_unidad_medida = ?', $cafeUnidadMedida->getId_cafe_unidad_medida());
    }
    
    public function getListCafeUnidadMedida(CafeUnidadMedida $cafeUnidadMedida) {
        return $cafeUnidadMedida->findAll();
    }

    /******** Estadisticas *********/
    public function getListarCafeUnidadMedida(CafeUnidadMedida $cafeUnidadMedida) {
        return $cafeUnidadMedida->findAll();
    }
}