<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEvento.php v1.0 27/12/2018
 * @autor       Eddy Quintanilla 
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaSenavexTipo {
    
    public function getListarFacturaSenavexTipo(FacturaSenavexTipo $facturaSenavexTipo) {
        return $facturaSenavexTipo->findAll();
    }
    
    public function getBuscarFacturaSenavexTipoPorId(FacturaSenavexTipo $facturaSenavexTipo) {
        return $facturaSenavexTipo->finder()->find('id = ?', $facturaSenavexTipo->getId());
    }
}