<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CD|Certificado ALADI|co_a|T **/
class COAladi extends Db {
        
    const TABLE = 'co_aladi';

    public $certificado_origen = array();
    
    
    public static $RELATIONS = array
    (
        'certificado_origen' => array(self:: HAS_MANY, 'CertificadoOrigen', 'id_certificado_origen'),
        //'datos_tercer_operador' =>array(self:: HAS_MANY, 'DatosTercerOperador','id_datos_tercer_operador'),
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
   
    /** PK|INT|C.O. Aladi|0|F|F|-|-|10|T **/
    private $id_co_aladi;
    
    /** FK|INT|Certificado de Origen|0|F|F|-|-|10|F **/
    private $id_certificado_origen;
    
    /** CP|INT|Correlativo del Aladi|0|F|F|-|-|10|T **/
    private $correlativo_aladi;
    
    /** CP|TXT|Observaciones|0|T|F|-|-|10|F **/
    private $observaciones;
    
    /** FK|INT|Datos del Tercer Operador|0|F|F|Selecciona 3er Operador|-|10|F **/
    private $id_datos_tercer_operador;
    
    /** CP|INT|Hojas|0|F|F|-|-|10|F **/
    private $hojas;
    
    /** CP|INT|Rango|0|F|F|-|-|10|F **/
    private $rango;
    
    public function setId_co_aladi($id_co_aladi) {
        $this->id_co_aladi = $id_co_aladi;
    }
    public function getId_co_aladi() {
        return $this->id_co_aladi;
    }

    public function setId_certificado_origen($id_certificado_origen) {
        $this->id_certificado_origen = $id_certificado_origen;
    }
    public function getId_certificado_origen() {
        return $this->id_certificado_origen;
    }

    public function setCorrelativo_aladi($correlativo_aladi) {
        $this->correlativo_aladi = $correlativo_aladi;
    }
    public function getCorrelativo_aladi() {
        return $this->correlativo_aladi;
    }
    
    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
    public function getObservaciones() {
        return $this->observaciones;
    }
    
    public function setId_datos_tercer_operador($id_datos_tercer_operador) {
        $this->id_datos_tercer_operador = $id_datos_tercer_operador;
    }
    public function getId_datos_tercer_operador() {
        return $this->id_datos_tercer_operador;
    }
    
    public function setHojas($hojas) {
        $this->hojas = $hojas;
    }
    public function getHojas() {
        return $this->hojas;
    }
    
    public function setRango($rango) {
        $this->rango = $rango;
    }
    public function getRango() {
        return $this->rango;
    }
    
}

?>
