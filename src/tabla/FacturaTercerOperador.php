<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class FacturaTercerOperador extends Db {
    
    const TABLE = 'factura_tercer_operador';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    public static $RELATIONS = array
    (
        'empresa'=>array(self::BELONGS_TO,'Empresa','id_empresa'),
        'insumosfacturaterceroperador'=>array(self::HAS_MANY,'InsumosFacturaTercerOperador','id_factura_tercer_operador'),
        'incoterm'=>array(self::BELONGS_TO,'Incoterm','id_incoterm')
    );
    private $id_factura_tercer_operador;
    private $numero_factura;
    private $fecha_emision;
    private $id_empresa;
    private $importador;
    private $direccion_importador;
    private $pais_importador;
    private $id_estado_factura;
    private $id_incoterm;
    private $razon_social;
    
    public function setId_factura_tercer_operador($id_factura_tercer_operador) {
        $this->id_factura_tercer_operador = $id_factura_tercer_operador;
    }
    public function getId_factura_tercer_operador() {
        return $this->id_factura_tercer_operador;
    }

    public function setNumero_Factura($numero_factura) {
        $this->numero_factura = $numero_factura;
    }
    public function getNumero_Factura() {
        return $this->numero_factura;
    }
    public function setFecha_Emision($fecha_emision) {
        $this->fecha_emision = $fecha_emision;
    }
    public function getFecha_Emision() {
        return $this->fecha_emision;
    }

    public function setId_Empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getId_Empresa() {
        return $this->id_empresa;
    }
    public function setImportador($importador) {
        $this->importador = $importador;
    }
    public function getImportador() {
        return $this->importador;
    }
    public function setDireccion_importador($direccion_importador) {
        $this->direccion_importador = $direccion_importador;
    }
    public function getDireccion_importador() {
        return $this->direccion_importador;
    }
    public function setPais_importador($pais_importador) {
        $this->pais_importador = $pais_importador;
    }
    public function getPais_importador() {
        return $this->pais_importador;
    }
    public function setId_estado_factura($id_estado_factura) {
        $this->id_estado_factura = $id_estado_factura;
    }
    public function getId_estado_factura() {
        return $this->id_estado_factura;
    }
    public function setId_incoterm($id_incoterm) {
        $this->id_incoterm = $id_incoterm;
    }
    public function getId_incoterm() {
        return $this->id_incoterm;
    }
    public function setRazon_social($razon_social) {
        $this->razon_social = $razon_social;
    }
    public function getRazon_social() {
        return $this->razon_social;
    }
}
?>
