<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLTipoEmpresa.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLTipoAusencia {
    
    public function getListarTipoAusencia(TipoAusencia $tipo_ausencia) {
        return $tipo_ausencia->findAll();
    }
    
    public function getBuscarDescripcionPorId(TipoAusencia $tipo_ausencia) {
        return $tipo_ausencia->finder()->find('id_tipo_ausencia = ?', $tipo_ausencia->getId_tipo_ausencia());
    }
}