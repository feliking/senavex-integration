<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class ProForma extends Db {
    
    const TABLE = 'proforma';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_proforma;
    private $facturado;
    private $total;
    private $fecha;
    private $id_empresa;
    private $impreso;
    
    function getId_proforma() {
        return $this->id_proforma;
    }

    function setId_proforma($id_proforma) {
        $this->id_proforma = $id_proforma;
    }

    function getFacturado() {
        return $this->facturado;
    }

    function getTotal() {
        return $this->total;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }
  

    function setFacturado($facturado) {
        $this->facturado = $facturado;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setFecha($fecha_servicio) {
        $this->fecha = $fecha_servicio;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    function getImpreso() {
        return $this->impreso;
    }

    function setImpreso($impreso) {
        $this->impreso = $impreso;
    }


}

