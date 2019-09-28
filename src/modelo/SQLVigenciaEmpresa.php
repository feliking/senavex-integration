<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLCategoriaEmpresa.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLVigenciaEmpresa {
    
    public function getListarVigenciaEmpresa(VigenciaEmpresa $vigencia_empresa) {
        return $vigencia_empresa->findAll();
    }
    
    public function getBuscarDescripcionPorId(VigenciaEmpresa $vigencia_empresa) {
        return $vigencia_empresa->finder()->find('id_vigencia_empresa = ?', $vigencia_empresa->getId_Vigencia_empresa());
    }
}