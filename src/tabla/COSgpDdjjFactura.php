<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CD|Certificado SGP DDJJ Factura|co_sgp_ddjj_fac|F **/
class COSgpDdjjFactura extends Db {
        
    const TABLE = 'co_sgpddjjfactura';

    //public $certificado_origen = array();
    
    public static $RELATIONS = array
    (
        'co_sgp' => array(self:: BELONGS_TO, 'COSgp', 'id_co_sgp'),
        'declaracion_jurada' => array(self:: BELONGS_TO, 'DeclaracionJurada', 'id_ddjj'),
        'factura' => array(self:: BELONGS_TO, 'Factura', 'id_factura'),
        'tipo_factura' => array(self:: BELONGS_TO, 'TipoFactura', 'id_tipo_factura'),
    );
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    /** 
    *  1 llave primaria, foranea o campo (PK,FK,CP) | 
    *  2 tipo de campo(DATE,INT,FLOAT,TXT,BOOL,NUMERIC) |
    *  3 Nombre para mostrar |
    *  4 grupos que pueden ver el atributo(0,1,2,3,5..) |
    *  5 se muestra el atributo en la vista (TRUE=T,FALSE=F)|
    *  6 el atributo almacena una descripcion (TRUE,FALSE) |
    *  7 texto required ( '-' si no tiene texto para mostrar)
    *  8 los valores de esta variable dependen de otra
    *  9 size 
    *  10 visible en el reporte (TRUE, FALSE)
    * **/
    
    /** PK|INT|CO_SGP-DDJJ-FACTURA|0|F|F|-|-|10|F **/
    private $id_co_sgpddjjfactura;
    /** FK|INT|CO_SGP|0|F|F|-|-|10|F **/
    private $id_co_sgp;
    /** FK|INT|DDJJ|0|F|F|-|-|10|F **/
    private $id_ddjj;
    /** FK|INT|Factura|0|F|F|-|-|10|F **/
    private $id_factura;
    /** FK|INT|Tipo de Factura|0|T|F|Escoja un tipo de Factura|-|17|F **/
    private $id_tipo_factura;
    /** CP|TXT|Numero de Orden|0|F|F|-|-|10|F **/
    private $numero_orden;
    /** CP|TXT|Marcas en los paquetes|0|F|F|-|-|10|F **/
    private $marcas_paquetes;
    /** CP|TXT|Denominacion de la mercaderia|0|F|F|-|-|10|F **/
    private $denominacion_mercaderia;
    /** FK|INT|Tipo de Desglose|0|F|F|-|-|10|F **/
    private $id_tipo_desglose;
    /** CP|INT|Cantidad|0|T|F|-|-|10|F **/
    private $cantidad;
    /** CP|TXT|Unidad de Medida|0|T|F|-|-|10|F **/
    private $id_unidad_medida;
    
    public function setId_co_sgpddjjfactura($id_co_sgpddjjfactura) {
        $this->id_co_sgpddjjfactura = $id_co_sgpddjjfactura;
    }
    public function getId_co_sgpddjjfactura() {
        return $this->id_co_sgpddjjfactura;
    }

    public function setId_co_sgp($id_co_sgp) {
        $this->id_co_sgp = $id_co_sgp;
    }
    public function getId_co_sgp() {
        return $this->id_co_sgp;
    }

    public function setId_ddjj($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_ddjj() {
        return $this->id_ddjj;
    }

    public function setId_factura($id_factura) {
        $this->id_factura = $id_factura;
    }
    public function getId_factura() {
        return $this->id_factura;
    }
    
    public function setId_tipo_factura($id_tipo_factura) {
        $this->id_tipo_factura = $id_tipo_factura;
    }
    public function getId_tipo_factura() {
        return $this->id_tipo_factura;
    }
    
    public function setNumero_orden($numero_orden) {
        $this->numero_orden = $numero_orden;
    }
    public function getNumero_orden() {
        return $this->numero_orden;
    }

    public function setMarcas_paquetes($marcas_paquetes) {
        $this->marcas_paquetes = $marcas_paquetes;
    }
    public function getMarcas_paquetes() {
        return $this->marcas_paquetes;
    }
    
    public function setDenominacion_mercaderia($denominacion_mercaderia) {
        $this->denominacion_mercaderia = $denominacion_mercaderia;
    }
    public function getDenominacion_mercaderia() {
        return $this->denominacion_mercaderia;
    }

    public function setId_tipo_desglose($id_tipo_desglose) {
        $this->id_tipo_desglose = $id_tipo_desglose;
    }
    public function getId_tipo_desglose() {
        return $this->id_tipo_desglose;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    public function getCantidad() {
        return $this->cantidad;
    }

    public function setId_unidad_medida($id_unidad_medida) {
        $this->id_unidad_medida = $id_unidad_medida;
    }
    public function getId_unidad_medida() {
        return $this->id_unidad_medida;
    }

}

?>
