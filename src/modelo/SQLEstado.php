<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEstado {
    
    public function getListarEstado(Estado $estado) {
        return $estado->findAll();
    }
    
    public function getBuscarDescripcion(Estado $estado) {
        return $estado->finder()->find('id_estado = ?', $estado->getId_estado());
    }
}