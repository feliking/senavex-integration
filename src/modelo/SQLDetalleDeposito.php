<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 26/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDetalleDeposito {
    
    public function Save(DetalleDeposito $detalle_deposito){
        return $detalle_deposito->save();
    }
    
    public function getDetalleDeposito(DetalleDeposito $detalle_deposito){
        return $detalle_deposito->finder()->find('id_detalle_deposito = ?', $detalle_deposito->getId_detalle_deposito());
    }
    
    public function getDetallePorDeposito(DetalleDeposito $detalle_deposito){
        return $detalle_deposito->finder()->find('id_deposito = ?', $detalle_deposito->getId_deposito());
    }
    
    public function getDetallePorProforma(DetalleDeposito $detalle_deposito){
        return $detalle_deposito->finder()->findAll('id_proforma = ?', $detalle_deposito->getId_proforma());
    }
    
}