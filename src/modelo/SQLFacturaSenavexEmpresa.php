<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaSenavexEmpresa {
    
    public function Save(FacturaSenavexEmpresa $facturaSenavexEmpresa){
        return $facturaSenavexEmpresa->save(); 
    }

    public function getEmpresa(FacturaSenavexEmpresa $facturaSenavexEmpresa){
        return $facturaSenavexEmpresa->finder()->find('id_factura_senavex_empresa = ?', $facturaSenavexEmpresa->getId_factura_senavex_empresa());
    }

    public function getEmpresaPorNIT(FacturaSenavexEmpresa $facturaSenavexEmpresa){
        return $facturaSenavexEmpresa->finder()->find('nit = ?', $facturaSenavexEmpresa->getNit());
    }
    
}