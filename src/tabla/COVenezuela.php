<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CD|Certificado Venezuela|co_v|T **/
class COVenezuela extends Db {
        
    const TABLE = 'co_venezuela';

    public $certificado_origen = array();
    public $medio_transporte = array();
    
    public static $RELATIONS = array
    (
        'certificado_origen' => array(self:: BELONGS_TO, 'CertificadoOrigen', 'id_certificado_origen'),
        'medio_transporte' => array(self:: BELONGS_TO, 'MedioTransporte', 'id_medio_transporte'),
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
    
    /** PK|INT|CO_Venezuela|0|F|F|-|-|10|F **/
    private $id_co_venezuela;
    /** FK|INT|Certificado de Origen|0|F|F|-|-|10|F **/
    private $id_certificado_origen;
    /** CP|INT|Correlativo|0|F|F|-|-|10|F **/
    private $correlativo_venezuela;
    /** CP|TXT|Nombre del Importador|0|F|F|-|-|10|F **/
    private $nombre_importador;
    /** CP|TXT|Direccion del Importador|0|F|F|-|-|10|F **/
    private $direccion_importador;
    /** FK|INT|Pais del Importador|0|T|F|Seleccione Pais Importador|-|10|F **/
    private $id_pais_importador;
    /** FK|INT|Medio de Transporte|0|T|F|Seleccione Medio de Transporte|-|10|F **/
    private $id_medio_transporte;
    /** CP|TXT|Puerto y lugar de Embarque|0|T|F|-|-|10|F **/
    private $puerto_lugar_embarque;
    /** FK|INT|Datos del Tercer Operador|0|F|F|-|-|10|F **/
    private $id_datos_tercer_operador;
    /** CP|TXT|Observaciones|0|F|F|-|-|10|F **/
    private $observaciones;
    
    public function setId_co_venezuela($id_co_venezuela) {
        $this->id_co_venezuela = $id_co_venezuela;
    }
    public function getId_co_venezuela() {
        return $this->id_co_venezuela;
    }

    public function setId_certificado_origen($id_certificado_origen) {
        $this->id_certificado_origen = $id_certificado_origen;
    }
    public function getId_certificado_origen() {
        return $this->id_certificado_origen;
    }

    public function setCorrelativo_venezuela($correlativo_venezuela) {
        $this->correlativo_venezuela = $correlativo_venezuela;
    }
    public function getCorrelativo_venezuela() {
        return $this->correlativo_venezuela;
    }
    
    public function setNombre_importador($nombre_importador) {
        $this->nombre_importador = $nombre_importador;
    }
    public function getNombre_importador() {
        return $this->nombre_importador;
    }
    
    public function setDireccion_importador($direccion_importador) {
        $this->direccion_importador = $direccion_importador;
    }
    public function getDireccion_importador() {
        return $this->direccion_importador;
    }
    
    public function setId_pais_importador($id_pais_importador) {
        $this->id_pais_importador = $id_pais_importador;
    }
    public function getId_pais_importador() {
        return $this->id_pais_importador;
    }
    
    public function setId_medio_transporte($id_medio_transporte) {
        $this->id_medio_transporte = $id_medio_transporte;
    }
    public function getId_medio_transporte() {
        return $this->id_medio_transporte;
    }
    
    public function setPuerto_lugar_embarque($puerto_lugar_embarque) {
        $this->puerto_lugar_embarque = $puerto_lugar_embarque;
    }
    public function getPuerto_lugar_embarque() {
        return $this->puerto_lugar_embarque;
    }
    
    public function setId_datos_tercer_operador($id_datos_tercer_operador) {
        $this->id_datos_tercer_operador = $id_datos_tercer_operador;
    }
    public function getId_datos_tercer_operador() {
        return $this->id_datos_tercer_operador;
    }
    
    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
    public function getObservaciones() {
        return $this->observaciones;
    }
    
}

?>
