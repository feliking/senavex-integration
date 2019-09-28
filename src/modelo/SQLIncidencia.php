<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLIncidencia {
    
    
    
    public function save(Incidencia $indicencia) {
        return $indicencia->save();
    }
    
    public function getIncidenciaById(Incidencia $indicencia) {
        return $indicencia->finder()->findbyPk($indicencia->getId_incidencia());
    }
    
    public function getIncidenciaByTicket(Incidencia $incidencia) {
        return $incidencia->finder()->find('ticket = ? ', $incidencia->getTicket());
    }
    
    public function getListIncidencia(Incidencia $indicencia) {
        return $indicencia->finder()->findAll('id_incidencia_estado = ? ', $indicencia->getId_estado());
    }

}