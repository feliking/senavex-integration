<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLCategoriaEmpresa.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCategoriaEmpresa {
    
    public function getListarCategoriaEmpresa(CategoriaEmpresa $categoria_empresa) {
        return $categoria_empresa->findAll();
    }
    
    public function getBuscarDescripcionPorId(CategoriaEmpresa $categoria_empresa) {
        return $categoria_empresa->finder()->find('id_categoria_empresa = ?', $categoria_empresa->getId_Categoria_empresa());
    }
}