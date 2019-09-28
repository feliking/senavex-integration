<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLTipoEmpresa.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLTipoCorreo {
    
    public function getListarTipoCorreo(TipoCorreo $tipo_correo) {
        return $tipo_correo->findAll();
    }
    
    public function getBuscarTipoCorreoPorId(TipoCorreo $tipo_correo) {
        return $tipo_correo->finder()->find('id_tipo_correo = ?', $tipo_correo->getId_tipo_correo());
    }
}