<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEvento.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEvento {
    
    public function getListarEvento(Evento $evento) {
        return $evento->findAll();
    }
    
    public function getBuscarDescripcionPorId(Evento $evento) {
        return $evento->finder()->find('id_evento = ?', $evento->getId_evento());
    }
}