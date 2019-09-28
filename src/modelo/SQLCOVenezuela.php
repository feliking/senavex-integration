<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLCOVenezuela.php v1.0 23/02/2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2015 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCOVenezuela {
    
    public function getListarCertificadosVenezuelaPorCO(COVenezuela $co_venezuela) {
        return $co_venezuela->finder()->with_medio_transporte()->find('id_certificado_origen = ? ', array($co_venezuela->getId_certificado_origen()));
    }
    
    public function setGuardarCertificadoVenezuela(COVenezuela $co_venezuela){
        return $co_venezuela->save();
    }
    
    public function getBuscarCOVenezuelaPorId(COVenezuela $co_venezuela) {
        return $co_venezuela->finder()->findbyPk($co_venezuela->getId_co_venezuela());
    }

    public function getDesignarCorrelativoVenezuela(COVenezuela $co_venezuela) {
        $sql = "Select MAX(correlativo_venezuela) as maximo FROM co_venezuela";
        $connection = $co_venezuela->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}