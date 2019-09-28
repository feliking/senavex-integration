<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaSenavexManualCorrelativo {
    public function Save(FacturaSenavexManualCorrelativo $facturaSenavexManualCorrelativo){
        return $facturaSenavexManualCorrelativo->save(); 
    }
    public function getCorrelativo(FacturaSenavexManualCorrelativo $facturaSenavexManualCorrelativo) {
        return $facturaSenavexManualCorrelativo->find('id_factura_senavex_manual_correlativo = ?', $facturaSenavexManualCorrelativo->getId_factura_senavex_manual_correlativo());
    }

    public function getCorrelativoActivo(FacturaSenavexManualCorrelativo $facturaSenavexManualCorrelativo){
        return $facturaSenavexManualCorrelativo->find('activo= ?', $facturaSenavexManualCorrelativo->getActivo());
    }
}