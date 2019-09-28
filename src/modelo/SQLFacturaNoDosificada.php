<?php

class SQLFacturaNoDosificada {
    public function getFacturaPorID(FacturaNoDosificada $facturanodosificada){
        return $facturanodosificada->finder()->find('id_factura_no_dosificada = ?', $facturanodosificada->getId_factura_no_dosificada());
    }
    public function getFacturaInsumosPorID(FacturaNoDosificada $facturanodosificada){
        return $facturanodosificada->finder()->with_insumosfacturanodosificada()->find('id_factura_no_dosificada = ?', $facturanodosificada->getId_factura_no_dosificada());
    }
    public function getFacturaEmpresaInsumoPorID(FacturaNoDosificada $facturanodosificada){
        return $facturanodosificada->finder()->with_empresa()->with_insumosfacturanodosificada()->find('id_factura_no_dosificada = ?', $facturanodosificada->getId_factura_no_dosificada());
    }
    public function getListarFacturasPorEmpresa(FacturaNoDosificada $facturanodosificada) {
        return $facturanodosificada->finder()->findAll('id_empresa = ?', $facturanodosificada->getId_Empresa());
    }
    public function getListarFacturasPorEmpresaNoUtilizado(FacturaNoDosificada $facturanodosificada) {
        return $facturanodosificada->finder()->findAll('id_empresa = ? and id_estado_factura=1', $facturanodosificada->getId_Empresa());
    }
    public function getListarFacturasPorEmpresaUtilizado(FacturaNoDosificada $facturanodosificada) {
        return $facturanodosificada->finder()->findAll('id_empresa = ? and id_estado_factura=3', $facturanodosificada->getId_Empresa());
    }
    public function getListarFacturasPorEmpresaEnEspera(FacturaNoDosificada $facturanodosificada) {
        return $facturanodosificada->finder()->findAll('id_empresa = ? and id_estado_factura=2', $facturanodosificada->getId_Empresa());
    }
    public function getListarFacturasPorEmpresaActivas(FacturaNoDosificada $facturanodosificada) {
        return $facturanodosificada->finder()->findAll('id_empresa = ? and (id_estado_factura=1 or id_estado_factura=2 or id_estado_factura=3)', $facturanodosificada->getId_Empresa());
    }
    public function setGuardarFactura(FacturaNoDosificada $facturanodosificada){
        return $facturanodosificada->save();
    }
    public function getListarFacturasVigentesPorEmpresayAcuerdo(FacturaNoDosificada $facturanodosificada) {
        return $facturanodosificada->finder()->findAll('id_empresa=? AND id_acuerdo=? AND id_estado_factura=1', array($facturanodosificada->getId_Empresa(),$facturanodosificada->getId_acuerdo()));
    }
    public function getListarFacturasVigentesPorEmpresa(FacturaNoDosificada $facturanodosificada) {
        return $facturanodosificada->finder()->findAll('id_empresa = ? AND id_estado_factura=1', $facturanodosificada->getId_Empresa());
    }

}