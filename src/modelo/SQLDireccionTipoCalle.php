<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDireccionTipoCalle {
    
    public function save(DireccionTipoCalle $direccionTipoCalle) {
        return $direccionTipoCalle->save();
    }
    
    public function getDireccionTipoCalleByID(DireccionTipoCalle $direccionTipoCalle) {
        return $direccionTipoCalle->finder()->findbyPk($direccionTipoCalle->getId_direccion_tipo_calle());
    }
    
    public function getListDireccionTipoCalle(DireccionTipoCalle $direccionTipoCalle) {
        return $direccionTipoCalle->finder()->findAll();
    }

}