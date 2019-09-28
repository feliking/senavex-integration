<?php


include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class FacturaSenavex extends Db {
    
    const TABLE = 'factura_senavex';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_factura_senavex; 
    private $numero_factura;
    private $numero_autorizacion;
    private $fecha_emision;
    private $fecha_limite;
    private $total;
    
    private $id_empresa;
    private $codigo_proceso;
    private $codigo_control;
    private $codigo_qr;
    private $impreso;
    private $id_proforma;
    
    function getId_factura_senavex() {
        return $this->id_factura_senavex;
    }

    function getNumero_factura() {
        return $this->numero_factura;
    }

    function getNumero_autorizacion() {
        return $this->numero_autorizacion;
    }

    function getFecha_emision() {
        return $this->fecha_emision;
    }

    function getFecha_limite() {
        return $this->fecha_limite;
    }

    function getTotal() {
        return $this->total;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function getCodigo_proceso() {
        return $this->codigo_proceso;
    }

    function getCodigo_control() {
        return $this->codigo_control;
    }

    function getCodigo_qr() {
        return $this->codigo_qr;
    }

    function getImpreso() {
        return $this->impreso;
    }

    function getId_proforma() {
        return $this->id_proforma;
    }

    function setId_factura_senavex($id_factura_senavex) {
        $this->id_factura_senavex = $id_factura_senavex;
    }

    function setNumero_factura($numero_factura) {
        $this->numero_factura = $numero_factura;
    }

    function setNumero_autorizacion($numero_autorizacion) {
        $this->numero_autorizacion = $numero_autorizacion;
    }

    function setFecha_emision($fecha_emision) {
        $this->fecha_emision = $fecha_emision;
    }

    function setFecha_limite($fecha_limite) {
        $this->fecha_limite = $fecha_limite;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    function setCodigo_proceso($codigo_proceso) {
        $this->codigo_proceso = $codigo_proceso;
    }

    function setCodigo_control($codigo_control) {
        $this->codigo_control = $codigo_control;
    }

    function setCodigo_qr($codigo_qr) {
        $this->codigo_qr = $codigo_qr;
    }

    function setImpreso($impreso) {
        $this->impreso = $impreso;
    }

    function setId_proforma($id_proforma) {
        $this->id_proforma = $id_proforma;
    }


}


