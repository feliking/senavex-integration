<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLAuditoriaEventos {
    
    public function getBuscarEventoPorId(AuditoriaEventos $auditoria_eventos) {
        return $auditoria_eventos->finder()->findAll('id_evento = ?', $auditoria_eventos->getId_Evento());
    }
    public function setGuardarAuditoriaEventos(AuditoriaEventos $auditoria_eventos){
        return $auditoria_eventos->save();
    }
}