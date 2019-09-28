<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeposito.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCorrelativorui {
    
    public function setGuardarCorrelativoRui(CorrelativoRui $correlativorui){
        $correlativo=(int)$correlativorui->getCorrelativo_rui();
        $correlativo++;
        $correlativorui->setCorrelativo_rui((string)$correlativo);        
        return $correlativorui->save();
    }
    
    public function getCorrelativoRui(CorrelativoRui $correlativorui) {
         return $correlativorui->finder()->find('id_correlativo_rui = 1');
    }
}