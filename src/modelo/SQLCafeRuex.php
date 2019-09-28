<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeRuex {
    
     public function Save(CafeRuex $cafeRuex){
        return $cafeRuex->save();
    }
    public function getCafeRuexPorID(CafeRuex $cafeRuex){
        return $cafeRuex->finder()->find('id_cafe_ruex = ?', $cafeRuex->getId_cafe_ruex());
    }
     public function getCafeRuexPorRUEX(CafeRuex $cafeRuex){
        return $cafeRuex->finder()->find('id_ruex = ?', $cafeRuex->getId_ruex());
    }
}