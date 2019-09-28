<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class LibreConsignacion extends Db {
    
    const TABLE = 'libre_consignacion';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_libre_consignacion;
    private $numero_libre_consignacion;
    private $fecha_emision;
    private $puerto_embarque;
    private $puerto_destino;
    private $id_empresa;
    private $utilizado;
    
    public function setId_libre_consignacion($id_libre_consignacion) {
        $this->id_libre_consignacion = $id_libre_consignacion;
    }
    public function getId_libre_consignacion() {
        return $this->id_libre_consignacion;
    }

    public function setNumero_Libre_Consignacion($numero_libre_consignacion) {
        $this->numero_libre_consignacion = $numero_libre_consignacion;
    }
    public function getNumero_Libre_Consignacion() {
        return $this->numero_factura;
    }
    
    public function setFecha_Emision($fecha_emision) {
        $this->fecha_emision = $fecha_emision;
    }
    public function getFecha_Emision() {
        return $this->fecha_emision;
    }

    public function setPuerto_Embarque($puerto_embarque) {
        $this->puerto_embarque = $puerto_embarque;
    }
    public function getPuerto_Embarque() {
        return $this->puerto_embarque;
    }

    public function setPuerto_Destino($puerto_destino) {
        $this->puerto_destino = $puerto_destino;
    }
    public function getPuerto_Destino() {
        return $this->puerto_destino;
    }

    public function setId_Empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getId_Empresa() {
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
