<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaSenavexDetalle {
    public function Save(FacturaSenavexDetalle $facturaSenavexDetalle){
        return $facturaSenavexDetalle->save(); 
    }
    public function getFacturaDetallePorID(FacturaSenavexDetalle $facturaSenavexDetalle) {
        return $facturaSenavexDetalle->find('id_factura_senavex_detalle = ?', $facturaSenavexDetalle->getId_factura_senavex_detalle());
    }
    public function getListFacturaDetallePorIdFactura(FacturaSenavexDetalle $facturaSenavexDetalle) {
        return $facturaSenavexDetalle->findAll('id_factura_senavex_manual  = ?', $facturaSenavexDetalle->getId_factura_senavex_manual());
    }
//    public function getBuscarDescripcionPorId(FacturaSenavexManual $facturaSenavexManual) {
//        return $facturaSenavexManual->finder()->find('id_pais = ?', $facturaSenavexManual->getId_pais());
//    }
}