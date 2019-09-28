<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLFactura.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaTercerOperador {
    public function getFacturaPorID(FacturaTercerOperador $facturaterceroperador){
        return $facturaterceroperador->finder()->find('id_factura_tercer_operador = ?', $facturaterceroperador->getId_factura_tercer_operador());
    }
    public function getFacturaInsumosPorID(FacturaTercerOperador $facturaterceroperador){
        return $facturaterceroperador->finder()->with_insumosfacturaterceroperador()->find('id_factura_tercer_operador = ?', $facturaterceroperador->getId_factura_tercer_operador());
    }
    public function getFacturaEmpresaInsumoPorID(FacturaTercerOperador $facturaterceroperador){
        return $facturaterceroperador->finder()->with_empresa()->with_insumosfacturaterceroperador()->find('id_factura_tercer_operador = ?', $facturaterceroperador->getId_factura_tercer_operador());
    }
    public function getListarFacturasPorEmpresa(FacturaTercerOperador $facturaterceroperador) {
        return $facturaterceroperador->finder()->findAll('id_empresa = ?', $facturaterceroperador->getId_Empresa());
    }
    public function getListarFacturasTercerOperadorPorEmpresaNoUtilizado(FacturaTercerOperador $facturaterceroperador) {
        return $facturaterceroperador->finder()->findAll('id_empresa = ? AND id_estado_factura=1', $facturaterceroperador->getId_Empresa());
    }
    public function getListarFacturasTercerOperadorPorEmpresaUtilizado(FacturaTercerOperador $facturaterceroperador) {
        return $facturaterceroperador->finder()->findAll('id_empresa = ? AND id_estado_factura=3', $facturaterceroperador->getId_Empresa());
    }
    public function getListarFacturasTercerOperadorPorEmpresaEnEspera(FacturaTercerOperador $facturaterceroperador) {
        return $facturaterceroperador->finder()->findAll('id_empresa = ? AND id_estado_factura=2', $facturaterceroperador->getId_Empresa());
    }
    public function setGuardarFactura(FacturaTercerOperador $facturaterceroperador){
       return $facturaterceroperador->save();
    }
}