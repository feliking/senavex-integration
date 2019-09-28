<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeposito.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLVerificacionRuex {
    
    public function ActualizarVerificacion(VerificacionRuex $verificacion_ruex){
        return $verificacion_ruex->save();
    }
    
    public function getVerificacionRuex(VerificacionRuex $verificacion_ruex) {
        return $verificacion_ruex->finder()->find('ruex = ?', $verificacion_ruex->getRuex());
    }
    
    public function getListRuex(VerificacionRuex $verificacion_ruex) {
        return $verificacion_ruex->findAll();
    }
    
}