<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeNorma {
  
    public function getCafeNormaPorID(CafeNorma $cafeNorma) {
        return $cafeNorma->finder()->find('id_cafe_norma = ?', $cafeNorma->getId_cafe_norma());
    }
    public function getListCafeNorma(CafeNorma $cafeNorma) {
        return $cafeNorma->finder()->findAll();
    }
    
    /******* Estadisticas ********/
     public function getListarCafeNorma(CafeNorma $cafeNorma) {
        return $cafeNorma->findAll();
    }
}