<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafePuerto {
    
    public function Save(CafePuerto $cafePuerto){
        return $cafePuerto->save();
    }
    
    public function getCafePuertoPorID(CafePuerto $cafePuerto) {
        return $cafePuerto->finder()->find('id_cafe_puerto = ?', $cafePuerto->getId_cafe_puerto());
    }
    
    public function getListCafePuerto(CafePuerto $cafePuerto) {
        return $cafePuerto->finder()->findAll();
    }
    
    public function getListCafePuertoPorPais(CafePuerto $cafePuerto) {
        return $cafePuerto->finder()->findAll("id_pais = ?",$cafePuerto->getId_pais());
    }
    public function getListCafePuertoPorClave_oic(CafePuerto $cafePuerto) {
        return $cafePuerto->finder()->findAll("clave_oic = ?",$cafePuerto->getClave_oic());
    }
    /****** Estadisticas *******/
    public function getListarCafePuerto(CafePuerto $cafePuerto) {
        return $cafePuerto->findAll();
    }
    public function getListarCafePuertoPorCafePais(CafePuerto $cafePuerto) {
        return $cafePuerto->finder()->findAll("id_pais = ?",$cafePuerto->getId_pais());
    }
}