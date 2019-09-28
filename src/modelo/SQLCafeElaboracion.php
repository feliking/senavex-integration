<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeElaboracion {
    
    public function getCafeElaboracionPorID(CafeElaboracion $cafeElaboracion) {
        return $cafeElaboracion->finder()->find('id_cafe_elaboracion = ?', $cafeElaboracion->getId_cafe_elaboracion());
    }
    public function getListCafeElaboracion(CafeElaboracion $cafeElaboracion) {
        return $cafeElaboracion->finder()->findAll();
    }
  
    /******* Estadisticas *********/
    public function getListarCafeElaboracion(CafeElaboracion $cafeElaboracion,$tipo_elaboracion) {
        return $cafeElaboracion->findAll('superior='.$tipo_elaboracion);
    }
}