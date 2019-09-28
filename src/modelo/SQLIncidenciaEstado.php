<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLIncidenciaEstado {
    
    public function getIncidenciaEstadoById(IncidenciaEstado $indicencia_estado) {
        return $indicencia_estado->finder()->find('id_incidencia_estado = ? ',$indicencia_estado->getId_incidencia_estado());
    }
    
    public function getListIncidencia(IncidenciaEstado $indicencia_estado) {
        return $indicencia_estado->finder()->findAll();
    }
}