<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaSenavexPersona {
    
    public function Save(FacturaSenavexPersona $facturaSenavexPersona){
        return $facturaSenavexPersona->save(); 
    }
    public function getPersonaPorEmpresa(FacturaSenavexPersona $facturaSenavexPersona){
        return $facturaSenavexPersona->finder()->findAll('id_factura_senavex_empresa = ?', $facturaSenavexPersona->getId_factura_senavex_empresa());
    }
    
    public function getPersonaPorCI(FacturaSenavexPersona $facturaSenavexPersona){
        return $facturaSenavexPersona->finder()->find('ci = ?', $facturaSenavexPersona->getCi());
    }
    public function getPersonaPorID(FacturaSenavexPersona $facturaSenavexPersona){
        return $facturaSenavexPersona->finder()->find('id_factura_senavex_persona = ?', $facturaSenavexPersona->getId_factura_senavex_persona());
    }
    
}