<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 26/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaSenavex {
    
    public function Save(FacturaSenavex $factura_senavex){
        return $factura_senavex->save();
    }
    
    public function getFacturaSenavex(FacturaSenavex $factura_senavex){
        return $factura_senavex->finder()->find('id_factura_senavex = ?', $factura_senavex->getId_factura_senavex());
    }
    public function  getFacturaSenavexPorCodigoProceso(FacturaSenavex $factura_senavex){
        return $factura_senavex->finder()->find('codigo_proceso = ?', $factura_senavex->getCodigo_proceso());
    }
    public function getListaFacturaSenavex(FacturaSenavex $factura_senavex){
        return $factura_senavex->finder()->findAll();
    }
    public function getListaFacturas_sinImprimir(FacturaSenavex $factura_senavex){
        return $factura_senavex->finder()->findAll('impreso = ?',$factura_senavex->getImpreso());
    } 
    public function getListaFacturaSenavexPorEmpresaMes(FacturaSenavex $factura_senavex){
        return $factura_senavex->finder()->find('id_empresa = ?',$factura_senavex->getId_Empresa());
    }
    
    
}