<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAutorizacionPreviaDetalle.php v1.0 29/08/2019
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLAutorizacionPreviaDetalle {
    
    
    public function SaveAutDetalle(AutorizacionPreviaDetalle $autorizacionPreviaDetalle){
        return $autorizacionPreviaDetalle->save();
    }

    public function getListar(AutorizacionPreviaDetalle $autorizacionPreviaDetalle) {
        return $autorizacionPreviaDetalle->findAll();
    }

    public function getAutorizacionDetallePorId(AutorizacionPreviaDetalle $autorizacionPreviaDetalle) {
        return $autorizacionPreviaDetalle->findAll('id_autorizacion_previa = ?', $autorizacionPreviaDetalle->getId_autorizacion_previa());
    }  

    // public function getListarAprobadas(AutorizacionPreviaDetalle $autorizacionPreviaDetalle) {
    //     return $autorizacionPreviaDetalle->findAll('estado = 1 order by id_autorizacion_previa asc ');
    // }

    public function getAutorizacionPreviaDetallexIDAutorizacionPrevia(AutorizacionPreviaDetalle $autorizacionPreviaDetalle){
        return $autorizacionPreviaDetalle->finder()->findAll('id_autorizacion_previa = ?', $autorizacionPreviaDetalle->getId_autorizacion_previa());
    }
}