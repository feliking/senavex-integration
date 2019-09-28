<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Inventario extends Db {
    
    const TABLE = 'producto';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_inventario;
    private $id_factura;
    private $fecha_emision;
    private $puerto_embarque;
    private $puerto_destino;
    private $id_empresa;
    private $utilizado;
    
    public function setId_inventario($id_inventario) {
        $this->id_inventario = $id_inventario;
    }
    public function getId_inventario() {
        return $this->id_inventario;
    }

    public function setNumeroLibreConsignacion($numero_libre_consignacion) {
        $this->numero_libre_consignacion = $numero_libre_consignacion;
    }
    public function getNumeroLibreconsignacion() {
        return $this->numero_factura;
    }
    
    public function setFechaEmision($fecha_emision) {
        $this->fecha_emision = $fecha_emision;
    }
    public function getFechaEmision() {
        return $this->fecha_emision;
    }

    public function setPuertoEmbarque($puerto_embarque) {
        $this->puerto_embarque = $puerto_embarque;
    }
    public function getPuertoEmbarque() {
        return $this->puerto_embarque;
    }

    public function setPuertoDestino($puerto_destino) {
        $this->puerto_destino = $puerto_destino;
    }
    public function getPuertoDestino() {
        return $this->puerto_destino;
    }

    public function setIdEmpresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getIdEmpresa() {
        return $this->id_empresa;
    }

    public function setUtilizado($utilizado) {
        $this->utilizado = $utilizado;
    }
    public function getUtilizado() {
        return $this->utilizado;
    }

}

?>
