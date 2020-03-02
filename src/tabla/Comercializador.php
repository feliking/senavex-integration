<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Comercializador extends Db {

    const TABLE = 'comercializador';

    public static $RELATIONS = array
    (
      'unidad_medida' => array(self:: BELONGS_TO, 'UnidadMedida', 'id_unidad_medida'),
    );

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_comercializador;
    private $id_ddjj;
    private $razon_social;
    private $ci_nit;
    private $domicilio_legal;
    private $representante_legal;
    private $direccion_fabrica;
    private $telefono;
    private $precio_venta;
    private $id_unidad_medida;
    private $produccion_mensual;

    public function setId_comercializador($id_comercializador) {
        $this->id_comercializador = $id_comercializador;
    }
    public function getId_comercializador() {
        return $this->id_comercializador;
    }

    public function setId_ddjj($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_ddjj() {
        return $this->id_ddjj;
    }

    public function setRazon_social($razon_social) {
        $this->razon_social = $razon_social;
    }
    public function getRazon_social() {
        return $this->razon_social;
    }

    public function setCi_nit($ci_nit) {
        $this->ci_nit = $ci_nit;
    }
    public function getCi_nit() {
        return $this->ci_nit;
    }

    public function setDomicilio_legal($domicilio_legal) {
        $this->domicilio_legal = $domicilio_legal;
    }
    public function getDomicilio_legal() {
        return $this->domicilio_legal;
    }

    public function setRepresentante_legal($representante_legal) {
        $this->representante_legal = $representante_legal;
    }
    public function getRepresentante_legal() {
        return $this->representante_legal;
    }

    public function setDireccion_fabrica($direccion_fabrica) {
        $this->direccion_fabrica = $direccion_fabrica;
    }
    public function getDireccion_fabrica() {
        return $this->direccion_fabrica;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    public function getTelefono() {
        return $this->telefono;
    }

    public function setPrecio_venta($precio_venta) {
        $this->precio_venta = $precio_venta;
    }
    public function getPrecio_venta() {
        return $this->precio_venta;
    }

    public function setId_unidad_medida($id_unidad_medida) {
        $this->id_unidad_medida = $id_unidad_medida;
    }
    public function getId_unidad_medida() {
        return $this->id_unidad_medida;
    }

    public function setProduccion_mensual($produccion_mensual) {
        $this->produccion_mensual = $produccion_mensual;
    }
    public function getProduccion_mensual() {
        return $this->produccion_mensual;
    }

}

?>
