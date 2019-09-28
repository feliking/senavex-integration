<?php

class SQLInsumosFacturaNoDosificada {
     public function setGuardarInsumosFacturaNoDosificada (InsumosFacturaNoDosificada $insumosfacturanodosificada){
        return $insumosfacturanodosificada->save();
    }
    public function setEliminarInsumosFacturaNoDosificada(InsumosFacturaNoDosificada $insumosfacturanodosificada){
        return $insumosfacturanodosificada->delete();
    }
    public function getInsumosPorId(InsumosFacturaNoDosificada $insumosfacturanodosificada) {
        return $insumosfacturanodosificada->finder()->find('id_insumos_factura_no_dosificada = ?', $insumosfacturanodosificada->getId_insumos_factura_no_dosificada());
    }
    public function getListarInsumosPorFactura(InsumosFacturaNoDosificada $insumosfacturanodosificada) {
        return $insumosfacturanodosificada->finder()->findAll('id_factura_no_dosificada = ?', $insumosfacturanodosificada->getId_factura_no_dosificada());
    }
    public function getListarInsumosVigentesPorFactura(InsumosFacturaNoDosificada $insumosfacturanodosificada) {
        return $insumosfacturanodosificada->finder()->findAll('id_factura_no_dosificada = ? and utilizado=FALSE and id_ddjj<>0', $insumosfacturanodosificada->getId_factura_no_dosificada());
    }
    public function getListarDDjjPorFacturaEnInsumos(InsumosFacturaNoDosificada $insumosfacturanodosificada) {
        $sql = "Select distinct(id_ddjj) from insumos_factura_no_dosificada where id_factura_no_dosificada=".$insumosfacturanodosificada->getId_factura_no_dosificada()." AND utilizado=FALSE AND id_ddjj<>0";
        return $insumosfacturanodosificada->finder()->findAllBySql($sql);
    }    

}