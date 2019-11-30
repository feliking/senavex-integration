<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEstadoAcuerdo {
    
    public function getAll(EstadoAcuerdo $estado) {
        return $estado->findAll();
    }
    
    public function getDescripcion(EstadoAcuerdo $estado) {
        return $estado->finder()->find('id_estado_acuerdo = ?', $estado->getId_estado_acuerdo());
    }
}