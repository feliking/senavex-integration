<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class InsumosFacturaNoDosificada extends Db {
    
    const TABLE = 'insumos_factura_no_dosificada';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_insumos_factura_no_dosificada;
    private $id_factura_no_dosificada;
    private $peso_neto;
    private $peso_bruto;
    private $cantidad;
    private $descripcion;
    private $precio;
    private $id_insumos_factura;
    private $utilizado;
    private $unidad_medida;
    private $precio_unitario;
    private $id_ddjj;
    
    public function setId_insumos_factura_no_dosificada($id_insumos_factura_no_dosificada) {
        $this->id_insumos_factura_no_dosificada = $id_insumos_factura_no_dosificada;
    }
    public function getId_insumos_factura_no_dosificada() {
        return $this->id_insumos_factura_no_dosificada;
    }
    public function setId_factura_no_dosificada($id_factura_no_dosificada) {
        $this->id_factura_no_dosificada = $id_factura_no_dosificada;
    }
    public function getId_factura_no_dosificada() {
        return $this->id_factura_no_dosificada;
    }
    public function setPeso_neto($peso_neto) {
        $this->peso_neto = $peso_neto;
    }
    public function getPeso_neto() {
        return $this->peso_neto;
    }
    public function setPeso_bruto($peso_bruto) {
        $this->peso_bruto= $peso_bruto;
    }
    public function getPeso_bruto() {
        return $this->peso_bruto;
    }
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    public function getCantidad() {
        return $this->cantidad;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setPrecio($precio) {
        $this->precio = $precio;
    }
    public function getPrecio() {
        return $this->precio;
    }
    public function setId_insumos_factura($id_insumos_factura) {
        $this->id_insumos_factura = $id_insumos_factura;
    }
    public function getId_insumos_factura() {
        return $this->id_insumos_factura;
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
    public function setPrecio_unitario($precio_unitario) {
        $this->precio_unitario = $precio_unitario;
    }
    public function getPrecio_unitario() {
        return $this->precio_unitario;
    }
    public function setId_ddjj($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_ddjj() {
        return $this->id_ddjj;
    }
}

?>
