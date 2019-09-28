<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafePuerto {
    public function getCafePuertoPorID(CafePuerto $cafePuerto) {
        return $cafePuerto->finder()->find('id_cafe_puerto = ?', $cafePuerto->getId_cafe_puerto());
    }
    
    public function getListCafePuerto(CafePuerto $cafePuerto) {
        return $cafePuerto->finder()->findAll();
    }
}