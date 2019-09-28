<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeposito.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCorrelativoruex {
    
    public function setGuardarCorrelativoRuex(CorrelativoRuex $correlativoruex){
        $correlativo=(int)$correlativoruex->getCorrelativo_ruex();
        $correlativo++;
        $correlativoruex->setCorrelativo_ruex((string)$correlativo);        
        return $correlativoruex->save();
    }
    
    public function getCorrelativoRuex(CorrelativoRuex $correlativoruex) {
         return $correlativoruex->finder()->find('id_correlativo = 1');
    }
}