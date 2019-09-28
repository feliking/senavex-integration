<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLMunicipio {
    
    public function getMunicipioPorID(Municipio $municipio){
         return $municipio->finder()->find('id_municipio = ?', $municipio->getId_municipio());
    }
    
    public function getListarMunicipio(Municipio $municipio) {
        return $municipio->findAll('order by descripcion asc');
    }
    
    public function getListarMunicipiosPorDepartamento(Municipio $municipio) {
        return $municipio->finder()->findAll('id_departamento = ? order by descripcion asc', $municipio->getId_departamento());
    }
}