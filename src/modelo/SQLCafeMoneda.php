<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeMoneda {
    
    
    public function getCafeMonedaPorID(CafeMoneda $cafeMoneda){
        
       return $cafeMoneda->finder()->find('id_cafe_moneda = ?', $cafeMoneda->getId_cafe_moneda());
    }
     public function getListaCafeMoneda(CafeMoneda $cafeMoneda) {
        return $cafeMoneda->finder()->findAll();
    }
    
    
    /******** Estadisticas ********/
     public function getListarCafeMoneda(CafeMoneda $cafeMoneda) {
        return $cafeMoneda->findAll();
    }
    
   
}