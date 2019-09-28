<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLCategoriaServicio.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCategoriaServicio {
    
    public function getListarCategoriaServicio(CategoriaServicio $categoria_servicio) {
        return $categoria_servicio->findAll();
    }
    
    public function getBuscarDescripcionPorId(CategoriaServicio $categoria_servicio) {
        return $categoria_servicio->finder()->find('id_categoria_servicio = ?', $categoria_servicio->getId_categoria_servicio());
    }
}