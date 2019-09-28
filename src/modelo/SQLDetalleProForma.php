<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 26/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDetalleProForma {
    
    public function Save(DetalleProforma $detalle_proforma){
        return $detalle_proforma->save();
    }
    
    public function getListaDetallePorProforma(DetalleProforma $detalle_proforma){
        return $detalle_proforma->finder()->findAll('id_proforma = ?', $detalle_proforma->getId_proforma());
    }
    
}