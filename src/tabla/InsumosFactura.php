<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class InsumosFactura extends Db {
    
    const TABLE = 'insumos_factura';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    public static $RELATIONS = array
    (
        'factura'=>array(self::BELONGS_TO,'Factura','id_factura')
    );
    private $id_insumos_factura;
    private $id_factura;
    private $cantidad;
    private $descripcion;
    private $precio;
    private $utilizado;
    private $unidad_medida;
    private $precio_unitario;
    private $saldo;
    private $valor_fob;
    private $id_ddjj;
     
    public function setId_insumos_factura($id_insumos_factura) {
        $this->id_insumos_factura = $id_insumos_factura;
    }
    public function getId_insumos_factura() {
        return $this->id_insumos_factura;
    }
    public function setId_factura($id_factura) {
        $this->id_factura = $id_factura;
    }
    public function getId_factura() {
        return $this->id_factura;
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
    public function setSaldo($saldo) {
        $this->saldo = $saldo;
    }
    public function getSaldo() {
        return $this->saldo;
    }
    public function setValor_fob($valor_fob) {
        $this->valor_fob = $valor_fob;
    }
    public function getValor_fob() {
        return $this->valor_fob;
    }
    public function setId_ddjj($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_ddjj() {
        return $this->id_ddjj;
    }
}

?>
