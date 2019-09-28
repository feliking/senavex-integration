<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class FacturaNoDosificada extends Db {
    
    const TABLE = 'factura_no_dosificada';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    public static $RELATIONS = array
    (
        'empresa'=>array(self::BELONGS_TO,'Empresa','id_empresa'),
        'insumosfacturanodosificada'=>array(self::HAS_MANY,'InsumosFacturaNoDosificada','id_factura_no_dosificada'),
        'incoterm'=>array(self::BELONGS_TO,'Incoterm','id_incoterm'),
        'pais'=>array(self::BELONGS_TO,'Pais','id_pais')
    );
    private $id_factura_no_dosificada;
    private $numero_factura;
    private $fecha_emision;
    private $puerto_embarque;
    private $id_pais;
    private $id_empresa;
    private $id_factura;
    private $id_incoterm;
    private $total_incoterm;
    private $total_productos;
    private $peso_neto;
    private $peso_bruto;
    private $importador;
    private $direccion_importador;
    private $pais_importador;
    private $consignatario;
    private $direccion_consignatario;
    private $pais_consignatario;
    private $flete;
    private $id_estado_factura;
    private $id_acuerdo;
    

    public function setId_factura_no_dosificada($id_factura_no_dosificada) {
        $this->id_factura_no_dosificada = $id_factura_no_dosificada;
    }
    public function getId_factura_no_dosificada() {
        return $this->id_factura_no_dosificada;
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

    public function setPuerto_Embarque($puerto_embarque) {
        $this->puerto_embarque = $puerto_embarque;
    }
    public function getPuerto_Embarque() {
        return $this->puerto_embarque;
    }

    public function setId_pais($id_pais) {
        $this->id_pais = $id_pais;
    }
    public function getId_pais() {
        return $this->id_pais;
    }
    
    public function setId_Empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getId_Empresa() {
        return $this->id_empresa;
    }

    public function setId_factura($id_factura) {
        $this->id_factura = $id_factura;
    }
    public function getId_factura() {
        return $this->id_factura;
    }
    function setId_incoterm($id_incoterm) {
        $this->id_incoterm = $id_incoterm;
    }
    public function getId_incoterm() {
        return $this->id_incoterm;
    }
    public function setTotal_incoterm($total_incoterm) {
        $this->total_incoterm = $total_incoterm;
    }
    public function getTotal_incoterm() {
        return $this->total_incoterm;
    }
    public function setTotal_productos($total_productos) {
        $this->total_productos = $total_productos;
    }
    public function getTotal_productos() {
        return $this->total_productos;
    }
    public function setPeso_neto($peso_neto) {
        $this->peso_neto = $peso_neto;
    }
    public function getPeso_neto() {
        return $this->peso_neto;
    }
    public function setPeso_bruto($peso_bruto) {
        $this->peso_bruto = $peso_bruto;
    }
    public function getPeso_bruto() {
        return $this->peso_bruto;
    }
    public function setId_estado_factura($id_estado_factura) {
        $this->id_estado_factura = $id_estado_factura;
    }
    public function getId_estado_factura() {
        return $this->id_estado_factura;
    }

    public function getImportador() {
        return $this->importador;
    }
    public function setImportador($importador) {
        $this->importador = $importador;
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
    public function setFlete($flete) {
        $this->flete = $flete;
    }
    public function getFlete() {
        return $this->flete;
    }
    public function getConsignatario() {
        return $this->consignatario;
    }
    public function setConsignatario($consignatario) {
        $this->consignatario = $consignatario;
    }
    public function setDireccion_consignatario($direccion_consignatario) {
        $this->direccion_consignatario = $direccion_consignatario;
    }
    public function getDireccion_consignatario() {
        return $this->direccion_consignatario;
    }
    public function setPais_consignatario($pais_consignatario) {
        $this->pais_consignatario = $pais_consignatario;
    }
    public function getPais_consignatario() {
        return $this->pais_consignatario;
    }
    public function setId_acuerdo($id_acuerdo) {
        $this->id_acuerdo = $id_acuerdo;
    }
    public function getId_acuerdo() {
        return $this->id_acuerdo;
    }
}
?>
