<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaContingenciaAutorizacion {
    
    public function Save(FacturaContingenciaAutorizacion $facturaContingenciaAutorizacion){
        return $facturaContingenciaAutorizacion->save();
    }
    public function getFacturaContingenciaAutorizacionPorID(FacturaContingenciaAutorizacion $facturaContingenciaAutorizacion){
        return $facturaContingenciaAutorizacion->finder()->find('Id_factura_contingencia_autorizacion = ?', $facturaContingenciaAutorizacion->getId_factura_contingencia_autorizacion());
    }
    
    public function getAutorizacionPorRegionalEstado(FacturaContingenciaAutorizacion $facturaContingenciaAutorizacion){
        return $facturaContingenciaAutorizacion->finder()->find( 'id_regional = ? AND estado = ?', array( $facturaContingenciaAutorizacion->getId_regional(), $facturaContingenciaAutorizacion->getEstado()) );
    }
    public function ExisteAutorizacion(FacturaContingenciaAutorizacion $facturaContingenciaAutorizacion) {
        return $facturaContingenciaAutorizacion->finder()->findAll( 'numero_autorizacion = ? AND id_regional = ?', array( $facturaContingenciaAutorizacion->getNumero_autorizacion(), $facturaContingenciaAutorizacion->getId_regional()) );
    }
}