<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLCOTp.php v1.0 23/02/2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2015 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCOTp {
    
    public function getListarCertificadosTpPorCO(COTp $co_tp) {
        return $co_tp->finder()->with_medio_transporte()->find('id_certificado_origen = ? ', array($co_tp->getId_certificado_origen()));
    }
    
    public function setGuardarCertificadoTp(COTp $co_tp){
        return $co_tp->save();
    }
    
    public function getBuscarCOTpPorId(COTp $co_tp) {
        return $co_tp->finder()->findbyPk($co_tp->getId_co_tp());
    }

    public function getDesignarCorrelativoTp(COTp $co_tp) {
        $sql = "Select MAX(correlativo_tp) as maximo FROM co_tp";
        $connection = $co_tp->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}