<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaSenavexEmpresaImport {
    
    public function Save(FacturaSenavexEmpresaImport $facturaSenavexEmpresaImport){
        return $facturaSenavexEmpresaImport->save(); 
    }

    public function getEmpresa(FacturaSenavexEmpresaImport $facturaSenavexEmpresaImport){
        return $facturaSenavexEmpresaImport->finder()->find('id_factura_senavex_empresa_import = ?', $facturaSenavexEmpresaImport->getId_factura_senavex_empresa_import());
    }

    public function getEmpresaPorNIT(FacturaSenavexEmpresaImport $facturaSenavexEmpresaImport){
        return $facturaSenavexEmpresaImport->finder()->find('nit = ?', $facturaSenavexEmpresaImport->getNit());
    }
    
}