<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLIncidenciaHistorial {
    
    public function save(IncidenciaMensaje $incidenciaMensaje) {
        return $incidenciaMensaje->save();
    }
    
    public function getIncidenciaHistorialById(IncidenciaMensaje $incidenciaMensaje) {
        return $incidenciaMensaje->finder()->findbyPk($incidenciaMensaje->getId_incidencia());
    }
    
    public function getIncidenciaHistorialByTicket(IncidenciaMensaje $incidenciaMensaje) {
        return $indicencia_historial->finder()->find('ticket = ? ', $indicencia_historial->getTicket());
    }
    
    public function getListIncidenciaHistorial(IncidenciaMensaje $indicencia_historial) {
        return $indicencia_historial->finder()->findAll();
    }

}