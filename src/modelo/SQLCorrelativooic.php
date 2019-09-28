<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeposito.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCorrelativooic {
    
    public function setGuardarCorrelativooic(Correlativooic $correlativooic){
        $correlativo=(int)$correlativooic->getCorrelativooic();
        $correlativo++;
        $correlativooic->setCorrelativooic((string)$correlativo);
        return $correlativooic->save();
    }
    
    public function getCorrelativooic(Correlativooic $correlativooic) {
         return $correlativooic->finder()->find('id_correlativooic = 1');
    }
}