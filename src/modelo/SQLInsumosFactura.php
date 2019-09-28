<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLInsumosImportados.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLInsumosFactura {
    public function setGuardarInsumosFactura(InsumosFactura $insumosfactura){
        return $insumosfactura->save();
    }
    public function setEliminarInsumosFactura(InsumosFactura $insumosfactura){
        return $insumosfactura->delete();
    }
    public function getInsumosPorId(InsumosFactura $insumosfactura) {
        return $insumosfactura->finder()->find('id_insumos_factura = ?', $insumosfactura->getId_insumos_factura());
    }
    public function getListarInsumosPorFactura(InsumosFactura $insumosfactura) {
        return $insumosfactura->finder()->findAll('id_factura = ?', $insumosfactura->getId_factura());
    }
    public function getListarInsumosPorFacturaConSaldo(InsumosFactura $insumosfactura) {
        return $insumosfactura->finder()->findAll('id_factura = ? and utilizado is false and saldo>0', $insumosfactura->getId_factura());
    }
    public function getListarInsumosPorFacturaSaldo(InsumosFactura $insumosfactura) {
        return $insumosfactura->finder()->findAll('id_factura = ?', $insumosfactura->getId_factura());
    }
    public function getListarInsumosVigentesPorFactura(InsumosFactura $insumosfactura) {
        return $insumosfactura->finder()->findAll('id_factura = ? and utilizado=FALSE and id_ddjj<>0', $insumosfactura->getId_factura());
    }
    public function getListarInsumosVigentes(InsumosFactura $insumosfactura) {
        return $insumosfactura->finder()->findAll('utilizado=FALSE');
    }
    public function getListarDDjjPorFacturaEnInsumos(InsumosFactura $insumosfactura) {
        $sql = "Select distinct(id_ddjj) from insumos_factura where id_factura=".$insumosfactura->getId_factura()." AND utilizado=FALSE AND id_ddjj<>0";
        return $insumosfactura->finder()->findAllBySql($sql);
    }    
}