<?php

class SQLInsumosFacturaTercerOperador {
     public function setGuardarInsumosFactura(InsumosFacturaTercerOperador $insumosfacturaterceroperador){
        return $insumosfacturaterceroperador->save();
    }
    public function setEliminarInsumosFactura(InsumosFacturaTercerOperador $insumosfacturaterceroperador){
        return $insumosfacturaterceroperador->delete();
    }
    public function getInsumosPorId(InsumosFacturaTercerOperador $insumosfacturaterceroperador) {
        return $insumosfacturaterceroperador->finder()->find('id_insumos_factura_tercer_operador = ?', $insumosfacturaterceroperador->getId_insumos_factura_tercer_operador());
    }
    public function getListarInsumosPorFactura(InsumosFacturaTercerOperador $insumosfacturaterceroperador) {
        return $insumosfacturaterceroperador->finder()->findAll('id_factura_tercer_operador = ?', $insumosfacturaterceroperador->getId_factura_tercer_operador());
    }
}