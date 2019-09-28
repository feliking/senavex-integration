<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLIncidenciaCategoria {
    
    
    
    public function save(IncidenciaCategoria $indicencia_categoria) {
        return $indicencia_categoria->save();
    }
    
    public function getIncidenciaCategoriaById(IncidenciaCategoria $indicencia_categoria) {
        return $indicencia_categoria->finder()->findbyPk($indicencia_categoria->getId_incidencia());
    }
    
    public function getIncidenciaCategoriaTipo(IncidenciaCategoria $indicencia_categoria){
        return $indicencia_categoria->finder()->findAll('id_incidencia_tipo = ?', $indicencia_categoria->getId_incidencia_tipo());
    }
    
    public function getListIncidenciaCategoria(IncidenciaCategoria $indicencia_categoria) {
        return $indicencia_categoria->finder()->findAll();
    }

}