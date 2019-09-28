<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLInsumosNacionales.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLInsumosNacionales {
    
    public function getBuscarInsumosPorDdjj(InsumosNacionales $insumos_nacionales) {
        return $insumos_nacionales->finder()->findAll('id_ddjj = '.$insumos_nacionales->getId_DDJJ());
    }
    
    public function setGuardarInsumosNacionales(InsumosNacionales $insumos_nacionales){
        return $insumos_nacionales->save();
    }
    
    public function setEliminarInsumosNacionalesPorDdjj(InsumosNacionales $insumos_nacionales){
        return $insumos_nacionales->deleteAll('id_ddjj = '.$insumos_nacionales->getId_DDJJ());
    }
}