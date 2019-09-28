<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLInsumosImportados.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLInsumosImportados {
    
    public function getBuscarInsumosPorDdjj(InsumosImportados $insumos_importados) {
        return $insumos_importados->finder()->with_pais()->with_acuerdo()->with_unidad_medida()->findAll('id_ddjj = '.$insumos_importados->getId_DDJJ());
    }
    
    public function setGuardarInsumosImportados(InsumosImportados $insumos_importados){
        return $insumos_importados->save();
    }

}