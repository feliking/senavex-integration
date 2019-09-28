<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLCOMercosur.php v1.0 23/02/2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2015 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCOMercosur {
    
    public function getListarCertificadosMercosurPorCO(COMercosur $co_mercosur) {
        return $co_mercosur->finder()->with_medio_transporte()->find('id_certificado_origen = ? ', array($co_mercosur->getId_certificado_origen()));
    }
    
    public function setGuardarCertificadoMercosur(COMercosur $co_mercosur){
        return $co_mercosur->save();
    }
    
    public function getBuscarCOMercosurPorId(COMercosur $co_mercosur) {
        return $co_mercosur->finder()->findbyPk($co_mercosur->getId_co_mercosur());
    }

    public function getDesignarCorrelativoMercosur(COMercosur $co_mercosur) {
        $sql = "Select MAX(correlativo_mercosur) as maximo FROM co_mercosur";
        $connection = $co_mercosur->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}