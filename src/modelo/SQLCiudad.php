<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCiudad {
    
    public function Save(Ciudad $ciudad){
        return $ciudad->save();
    }
    public function getCiudadPorID(Ciudad $ciudad){
        return $ciudad->finder()->find('id_ciudad = ?', $ciudad->getId_ciudad());
    }
    public function getListarCiudad(Ciudad $ciudad) {
        return $ciudad->findAll('order by descripcion asc');
    }
    
    public function getListarCiudadesPorMunicipio(Ciudad $ciudad) {
        return $ciudad->finder()->findAll('id_municipio = ? order by descripcion asc ', $ciudad->getId_municipio());
    }
}