<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLTipoEmpresa.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLTipoEmpresa {
    
    public function getListarTipoEmpresa(TipoEmpresa $tipo_empresa) {
        return $tipo_empresa->findAll();
    }
    
    public function getBuscarDescripcionPorId(TipoEmpresa $tipo_empresa) {
        return $tipo_empresa->finder()->find('id_tipo_empresa = ?', $tipo_empresa->getId_tipo_empresa());
    }
}