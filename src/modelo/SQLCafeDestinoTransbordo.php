<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeDestinoTransbordo {
    
    public function Save(CafeDestinoTransbordo $cafeDestinoTransbordo){
        return $cafeDestinoTransbordo->save();
    }
    
    public function getCafePaisDestinoPorID(CafeDestinoTransbordo $cafeDestinoTransbordo) {
        return $cafeDestinoTransbordo->finder()->find('id_cafe_pais_destino_transbordo = ?', $cafeDestinoTransbordo->getId_cafe_pais_destino_transbordo());
    }
    
    public function getListCafeDestinoTransbordo(CafeDestinoTransbordo $cafeDestinoTransbordo) {
        return $cafeDestinoTransbordo->finder()->findAll();
    }
    
}