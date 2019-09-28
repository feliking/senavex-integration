<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDepartamento.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDepartamento {
    
    public function getListarDepartamento(Departamento $departamento) {
        return $departamento->findAll();
    }
    
    public function getBuscarDepartamentoPorId(Departamento $departamento) {
        return $departamento->finder()->find('id_departamento = ? order by nombre asc ', $departamento->getId_departamento());
    }   
}