<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeCEspecial {
    function getListaCafeCEspecial(CafeCEspecial $cafeCEspecial){
        return $cafeCEspecial->finder()->findAll();
    }
    
    /********** Estadisticas ************/
    public function getListarCafeCEspecial(CafeCEspecial $cafeCEspecial) {
        return $cafeCEspecial->findAll();
    }
}