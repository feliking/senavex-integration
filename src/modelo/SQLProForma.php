<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 26/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLProForma {
    //registrar 
    //buscar x empresa
     
    //consultas Factura Senavex
    public function Save(ProForma $proforma){
        return $proforma->save();
    }
    
    public function getProForma(ProForma $proforma){
        return $proforma->finder()->find('id_proforma = ?', $proforma->getId_proforma());
    }
    public function getProforma_NoFacturada(ProForma $proforma){
        return $proforma->finder()->find('id_empresa = ? and facturado= ?',array($proforma->getId_empresa(),$proforma->getFacturado()));
    }
    public function getListaProformasNoFacturadas(ProForma $proforma){
        return $proforma->finder()->findAll('id_empresa = ? AND facturado = ?',array($proforma->getId_empresa(),$proforma->getFacturado()));
    }        
    public function getListaFacturaSenavexPorEmpresaMes(ProForma $proforma){
        return $proforma->finder()->find('id_empresa = ?',$proforma->getId_empresa());
    }
    public function getListFIFO(ProForma $proforma){
        $sql ="SELECT * FROM proforma where faturado= ? ORDER BY fecha_servicio asc LIMIT 5";
        return $proforma->finder()->findAllBySql($sql,$proforma->getFacturado());
    }
   
}