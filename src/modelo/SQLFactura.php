<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLFactura.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFactura {
    public function getFacturaPorID(Factura $factura){
        return $factura->finder()->find('id_factura = ?', $factura->getId_factura());
    }
    public function getFacturaInsumosPorID(Factura $factura){
        return $factura->finder()->with_insumosfactura()->find('id_factura = ?', $factura->getId_factura());
    }
    public function getFacturaEmpresaInsumoPorID(Factura $factura){
        return $factura->finder()->with_empresa()->with_insumosfactura()->with_incoterm()->find('id_factura = ?', $factura->getId_factura());
    }
    public function getListarFacturasPorEmpresa(Factura $factura) {
        return $factura->finder()->findAll('id_empresa = ? ', $factura->getId_Empresa());
    }
    public function getListarFacturasPorEmpresaNumAutorizacion(Factura $factura) {
        return $factura->finder()->count('id_empresa = ? and numero_autorizacion = ? and numero_factura = ?', array($factura->getId_Empresa(),$factura->getNumero_Autorizacion(),$factura->getNumero_Factura()));
   }
    public function getListarFacturasPorEmpresaNoUtilizado(Factura $factura) {
        return $factura->finder()->findAll('id_empresa = ? and  (id_estado_factura=1 or id_estado_factura=5)', $factura->getId_Empresa());
    }
    public function getListarFacturasPorEmpresaUtilizado(Factura $factura) {
        return $factura->finder()->findAll('id_empresa = ? and id_estado_factura=3', $factura->getId_Empresa());
    }
    public function getListarFacturasPorEmpresaEnEspera(Factura $factura) {
        return $factura->finder()->findAll('id_empresa = ? and id_estado_factura=2', $factura->getId_Empresa());
    }
    public function setGuardarFactura(Factura $factura){
        return $factura->save();
    }
    public function getListarFacturasVigentesPorEmpresa(Factura $factura) {
        return $factura->finder()->findAll('id_empresa = ? AND id_estado_factura=1', $factura->getId_Empresa());
    }
    public function getListarFacturasVigentesPorEmpresayAcuerdo(Factura $factura) {
        return $factura->finder()->findAll('id_empresa = ? AND id_acuerdo = ? AND id_estado_factura=1', array($factura->getId_Empresa(),$factura->getId_acuerdo()));
    }

}