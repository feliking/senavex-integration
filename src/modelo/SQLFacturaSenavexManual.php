<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaSenavexManual {
    public function Save(FacturaSenavexManual $facturaSenavexManual){
        return $facturaSenavexManual->save(); 
    }
    public function getFacturaManualPorID(FacturaSenavexManual $facturaSenavexManual) {
        return $facturaSenavexManual->find('id_factura_senavex_manual = ?', $facturaSenavexManual->getId_factura_senavex_manual());
    }
    public function ListFacturaManualEstado(FacturaSenavexManual $facturaSenavexManual){
        return $facturaSenavexManual->findAll('numero_factura > 0 and estado = ? '.($facturaSenavexManual->getId_regional()==11? '': ' AND id_regional = '.$facturaSenavexManual->getId_regional()).' order by id_factura_senavex_manual desc', $facturaSenavexManual->getEstado());
    }
    public function ListFacturaManualEstadoAutorizacion(FacturaSenavexManual $facturaSenavexManual, $fecha_ini, $fecha_fin){
        return $facturaSenavexManual->findAll("numero_factura > 0 and estado = ? and ( fecha_emision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' ) ".($facturaSenavexManual->getId_regional()==11? '': ' AND id_regional = '.$facturaSenavexManual->getId_regional()).' order by id_factura_senavex_manual desc', $facturaSenavexManual->getEstado());
    }
    public function ListReciboManualEstado(FacturaSenavexManual $facturaSenavexManual){
        return $facturaSenavexManual->findAll('numero_recibo > 0 and estado = ? '.($facturaSenavexManual->getId_regional()==11? '': 'AND id_regional = '.$facturaSenavexManual->getId_regional()).' order by id_factura_senavex_manual desc', $facturaSenavexManual->getEstado());
    }
    public function ListReciboManualEstadoAutorizacion(FacturaSenavexManual $facturaSenavexManual){
        //return $facturaSenavexManual->findAll('numero_recibo > 0 and estado = ? and numero_autorizacion = ? '.($facturaSenavexManual->getId_regional()==11? '': 'AND id_regional = '.$facturaSenavexManual->getId_regional()).' order by id_factura_senavex_manual desc', array($facturaSenavexManual->getEstado(), $facturaSenavexManual->getNumero_autorizacion()));
        return $facturaSenavexManual->findAll('numero_recibo > 0 and estado = ? '.($facturaSenavexManual->getId_regional()==11? '': 'AND id_regional = '.$facturaSenavexManual->getId_regional()).' order by id_factura_senavex_manual desc', array($facturaSenavexManual->getEstado()));
    }
    public function ListFacturaManualFecha(FacturaSenavexManual $facturaSenavexManual, $fecha_ini, $fecha_fin, $id_tipo){      
        return $facturaSenavexManual->findAll("numero_factura >0 ".($facturaSenavexManual->getId_regional()==11? '': 'AND id_regional = '.$facturaSenavexManual->getId_regional())." AND estado = ".$facturaSenavexManual->getEstado()." ".($id_tipo < 0? '': 'AND id_tipo = '.$id_tipo)." AND fecha_emision BETWEEN '".$fecha_ini." 00:00:00' AND '".$fecha_fin." 23:59:59' order by fecha_emision asc");
    }
    public function ListFacturaManualFecha2(FacturaSenavexManual $facturaSenavexManual, $fecha_ini, $fecha_fin, $id_tipo){                                                                          
        return $facturaSenavexManual->findAll("numero_factura >0 ".($facturaSenavexManual->getId_regional()==11? '': 'AND id_regional = '.$facturaSenavexManual->getId_regional())." ".($id_tipo < 0? '': 'AND id_tipo = '.$id_tipo)." AND estado = ".$facturaSenavexManual->getEstado()." AND fecha_emision BETWEEN '".$fecha_ini." 00:00:00' AND '".$fecha_fin." 23:59:59' order by fecha_emision asc");
    }
}