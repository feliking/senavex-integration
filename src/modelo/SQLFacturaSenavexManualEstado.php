<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaSenavexManualEstado {
    public function Save(FacturaSenavexManualEstado $facturaSenavexManualEstado){
        return $facturaSenavexManualEstado->save(); 
    }
    public function getFacturaManualPorID(FacturaSenavexManualEstado $facturaSenavexManualEstado) {
        return $facturaSenavexManualEstado->find('id_factura_senavex_manual_estado = ?', $facturaSenavexManualEstado->getId_factura_senavex_manual_estado());
    }
    public function listEstados(FacturaSenavexManualEstado $facturaSenavexManualEstado){
        return $facturaSenavexManualEstado->findAll(); 
    }
    public function listEstadosPorTipoFactura(FacturaSenavexManualEstado $facturaSenavexManualEstado){
        return $facturaSenavexManualEstado->findAll("id_factura_senavex_manual_estado >= ? and id_factura_senavex_manual_estado <= ?",array($facturaSenavexManualEstado->getId_factura_senavex_manual_estado(),$facturaSenavexManualEstado->getDescripcion())); 
    }
//    public function getBuscarDescripcionPorId(FacturaSenavexManual $facturaSenavexManual) {
//        return $facturaSenavexManual->finder()->find('id_pais = ?', $facturaSenavexManual->getId_pais());
//    }
}