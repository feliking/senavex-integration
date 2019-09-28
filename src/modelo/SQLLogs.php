<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeposito.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLLogs {
    
    public function Save(Logs $logs){
        return $logs->save();
    }
    
    public function getLogById(Logs $logs) {
        return $logs->finder()->findAllByPks($logs);
    }
    
    public function getListLogsByDate(Logs $logs){
        return $logs->finder()->findAll('date = ?',$logs->getDate());
    }
    
}