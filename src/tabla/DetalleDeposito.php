<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class DetalleDeposito extends Db {
    
    const TABLE = 'detalle_deposito';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_detalle_deposito;
    private $id_proforma;
    private $id_deposito;
    
    function getId_detalle_deposito() {
        return $this->id_detalle_deposito;
    }

    function getId_deposito() {
        return $this->id_deposito;
    }

    function getId_proforma() {
        return $this->id_proforma;
    }

    function setId_detalle_deposito($id_detalle_deposito) {
        $this->id_detalle_deposito = $id_detalle_deposito;
    }

    function setId_deposito($id_deposito) {
        $this->id_deposito = $id_deposito;
    }

    function setId_proforma($id_proforma) {
        $this->id_proforma = $id_proforma;
    }


    
}