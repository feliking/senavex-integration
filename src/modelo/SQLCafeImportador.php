<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeImportador {
    
    
    public function getCafeImportadorPorID(CafeImportador $cafeImportador) {
        return $cafeImportador->finder()->find('id_cafe_importador = ?', $cafeImportador->getId_cafe_importador());
    }
    
    public function getLista(CafeImportador $cafeImportador){
        return $cafeImportador->finder()->findAll();
    }
    
    /******** *********/
     public function getListarCafeImportador(CafeImportador $cafeImportador) {
        return $cafeImportador->findAll();
    }
   
}