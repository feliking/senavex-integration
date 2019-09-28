<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLRubroExportaciones.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLRubroExportaciones {
    
    public function getListarRubroExportaciones(RubroExportaciones $rubro_exportaciones) {
        return $rubro_exportaciones->findAll('order by id_rubro_exportaciones');
    }
    
    public function getBuscarRubroPorId(RubroExportaciones $rubro_exportaciones) {
        return $rubro_exportaciones->finder()->find('id_rubro_exportaciones = ?', $rubro_exportaciones->getId_rubro_exportaciones());
    }
}