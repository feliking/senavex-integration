<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUnidadMedida.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLUnidadMedida {
    
    public function getListarUnidadMedida(UnidadMedida $unidad_medida) {
        return $unidad_medida->findAll('id_unidad_medida>0');
    }
    
    public function getBuscarDescripcionPorId(UnidadMedida $unidad_medida) {
        return $unidad_medida->finder()->find('id_unidad_medida = ?', $unidad_medida->getId_Unidad_Medida());
    }

    public function getBuscarIdPorDescripcion(UnidadMedida $unidad_medida) {
        return $unidad_medida->finder()->find('descripcion = ?', $unidad_medida->getDescripcion());
    }
}