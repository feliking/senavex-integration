<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLCOSgp.php v1.0 23/02/2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2015 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCOSgp {
    
    public function getListarCertificadosSgpPorCO(COSgp $co_sgp) {
        return $co_sgp->finder()->with_medio_transporte()->find('id_certificado_origen = ? ', array($co_sgp->getId_certificado_origen()));
    }
    
    public function setGuardarCertificadoSgp(COSgp $co_sgp){
        return $co_sgp->save();
    }
    
    public function getBuscarCOSgpPorId(COSgp $co_sgp) {
        return $co_sgp->finder()->findbyPk($co_sgp->getId_co_sgp());
    }

    public function getDesignarCorrelativoSgp(COSgp $co_sgp) {
        $sql = "Select MAX(correlativo_sgp) as maximo FROM co_sgp";
        $connection = $co_sgp->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}