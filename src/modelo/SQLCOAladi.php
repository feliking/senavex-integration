<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCOAladi {
    
    public function getListarCertificadosAladiPorCO(COAladi $co_aladi) {
        return $co_aladi->finder()->find('id_certificado_origen = ? ', array($co_aladi->getId_certificado_origen()));
    }
    
    public function setGuardarCertificadoAladi(COAladi $co_aladi){
        return $co_aladi->save();
    }
    
    public function getBuscarCOAladiPorId(COAladi $co_aladi) {
        return $co_aladi->finder()->findbyPk($co_aladi->getId_co_aladi());
    }
    
    public function getDesignarCorrelativoAladi(COAladi $co_aladi) {
        $sql = "Select MAX(correlativo_aladi) as maximo FROM co_aladi";
        $connection = $co_aladi->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }

}