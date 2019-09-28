<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaSenavexPersonaImport {
    
    public function Save(FacturaSenavexPersonaImport $facturaSenavexPersonaImport){
        return $facturaSenavexPersonaImport->save(); 
    }
    public function getPersonaPorEmpresa(FacturaSenavexPersonaImport $facturaSenavexPersonaImport){
        return $facturaSenavexPersonaImport->finder()->findAll('id_factura_senavex_empresa_import = ?', $facturaSenavexPersonaImport->getId_factura_senavex_empresa_import());
    }
    
    public function getPersonaPorCI(FacturaSenavexPersonaImport $facturaSenavexPersonaImport){
        return $facturaSenavexPersonaImport->finder()->find('ci = ?', $facturaSenavexPersonaImport->getCi());
    }
    public function getPersonaPorID(FacturaSenavexPersonaImport $facturaSenavexPersonaImport){
        return $facturaSenavexPersonaImport->finder()->find('id_factura_senavex_persona_import = ?', $facturaSenavexPersonaImport->getId_factura_senavex_persona_import());
    }
    
}