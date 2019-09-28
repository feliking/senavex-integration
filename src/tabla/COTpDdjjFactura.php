<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CD|Certificado 3TP DDJJ Fact|co_tp_ddjj_fac|F **/
class COTpDdjjFactura extends Db {
        
    const TABLE = 'co_tpddjjfactura';

    //public $certificado_origen = array();
    
    public static $RELATIONS = array
    (
        'co_tp' => array(self:: BELONGS_TO, 'COTp', 'id_co_tp'),
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
    
    /** PK|INT|CO_TPDDJJFACTURA|0|F|F|-|-|10|F **/
    private $id_co_tpddjjfactura;
    /** PK|INT|CO_COTP|0|F|F|-|-|10|F **/
    private $id_co_tp;
    /** FK|INT|DDJJ|0|F|F|-|-|10|F **/
    private $id_ddjj;
    /** FK|INT|Factura|0|F|F|-|-|10|F **/
    private $id_factura;
    /** FK|INT|Tipo de Factura|0|T|F|Seleccione un tipo de Factura|-|10|F **/
    private $id_tipo_factura;
    /** CP|INT|Numero de Orden|0|F|F|-|-|10|F **/
    private $numero_orden;
    /** CP|TXT|Codigo Armonizado|0|T|F|-|-|10|F **/
    private $codigo_armonizado;
    /** CP|TXT|Denominacion de la Mercaderia|0|F|F|-|-|10|F **/
    private $denominacion_mercaderia;
    /** FK|INT|Tipo de Desglose|0|F|F|T|-|10|F **/
    private $id_tipo_desglose;
    
    public function setId_co_tpddjjfactura($id_co_tpddjjfactura) {
        $this->id_co_tpddjjfactura = $id_co_tpddjjfactura;
    }
    public function getId_co_tpddjjfactura() {
        return $this->id_co_tpddjjfactura;
    }

    public function setId_co_tp($id_co_tp) {
        $this->id_co_tp = $id_co_tp;
    }
    public function getId_co_tp() {
        return $this->id_co_tp;
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

    public function setCodigo_armonizado($codigo_armonizado) {
        $this->codigo_armonizado = $codigo_armonizado;
    }
    public function getCodigo_armonizado() {
        return $this->codigo_armonizado;
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

}

?>
