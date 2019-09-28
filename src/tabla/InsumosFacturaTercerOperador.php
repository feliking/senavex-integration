<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class InsumosFacturaTercerOperador extends Db {
    
    const TABLE = 'insumos_factura_tercer_operador';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    public static $RELATIONS = array
    (
        'factura_tercer_operador'=>array(self::BELONGS_TO,'FacturaTercerOperador','id_factura_tercer_operador')
    );
    private $id_insumos_factura_tercer_operador;
    private $id_factura_tercer_operador;
    private $cantidad;
    private $descripcion;
    private $utilizado;
    private $unidad_medida;
    private $precio_unitario;
    
    public function setId_insumos_factura_tercer_operador($id_insumos_factura_tercer_operador) {
        $this->id_insumos_factura_tercer_operador = $id_insumos_factura_tercer_operador;
    }
    public function getId_insumos_factura_tercer_operador() {
        return $this->id_insumos_factura_tercer_operador;
    }
    public function setId_factura_tercer_operador($id_factura_tercer_operador) {
        $this->id_factura_tercer_operador = $id_factura_tercer_operador;
    }
    public function getId_factura_tercer_operador() {
        return $this->id_factura_tercer_operador;
    }   
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    public function getCantidad() {
        return $this->cantidad;
    }    
    public function setUtilizado($utilizado) {
        $this->utilizado = $utilizado;
    }
    public function getUtilizado() {
        return $this->utilizado;
    }
    public function setUnidad_medida($unidad_medida) {
        $this->unidad_medida = $unidad_medida;
    }
    public function getUnidad_medida() {
        return $this->unidad_medida;
    }    
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setPrecio_unitario($precio_unitario) {
        $this->precio_unitario = $precio_unitario;
    }
    public function getPrecio_unitario() {
        return $this->precio_unitario;
    }
}

?>
