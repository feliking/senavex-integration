<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CD|Certificado Mercosur|co_mec|F **/
class COMercosur extends Db {
        
    const TABLE = 'co_mercosur';

    public $certificado_origen = array();
    public $medio_transporte = array();
    
    public static $RELATIONS = array
    (
        'certificado_origen' => array(self:: BELONGS_TO, 'CertificadoOrigen', 'id_certificado_origen'),
        'medio_transporte' => array(self:: BELONGS_TO, 'MedioTransporte', 'id_medio_transporte'),
        'pais_importador' => array(self:: BELONGS_TO, 'Pais', 'id_pais'),
        'pais_consignatario' => array(self:: BELONGS_TO, 'Pais', 'id_pais'),
    );
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    /** 1 llave primaria, foranea o campo (PK,FK,CP) | 
     *  2 tipo de campo(DATE,INT,FLOAT,TXT,BOOL) |
     *  3 Nombre para mostrar |
     *  4 grupos que pueden ver el atributo(0,1,2,3,5..) |
     *  5 se muestra el atributo en la vista (TRUE=T,FALSE=F)|
     *  6 el atributo almacena una descripcion (TRUE,FALSE) |
     *  7 texto required ( '-' si no tiene texto para mostrar)
     *  8 los valores de esta variable dependen de otra
     *  9 size 
     *  10 visible en el reporte (TRUE, FALSE)
     * **/
    
    /** PK|INT|CO MERCOSUR|0|F|F|-|-|10|F **/
    private $id_co_mercosur;
    
    /** FK|INT|Certificado de Origen|0|F|F|-|-|10|F **/
    private $id_certificado_origen;
    
    /** CP|INT|Correlativo|0|F|F|-|-|10|F **/
    private $correlativo_mercosur;
    
    /** CP|TXT|Nombre del Importador|0|F|F|-|-|10|F **/
    private $nombre_importador;
    /** CP|TXT|Direccion del Importador|0|F|F|-|-|10|F **/
    private $direccion_importador;
    /** FK|INT|Pais del Importador|0|T|F|Selecciones pais del importador|-|20|T **/
    private $id_pais_importador;
    /** CP|TXT|nombre_consignatario|0|F|F|-|-|10|F **/
    private $nombre_consignatario;
    /** CP|TXT|direccion_consignatario|0|F|F|-|-|10|F **/
    private $direccion_consignatario;
    /** FK|INT|Pais Consignatario|0|T|F|Seleccione Pais Consignatario|-|20|T **/
    private $id_pais_consignatario;
    /** CP|TXT|Puerto embarque|0|T|F|Seleccione Puerto de Embarque|-|20|T **/
    private $puerto_lugar_embarque;
    /** FK|INT|Medio transporte|0|F|F|Seleccione Medio de Transporte|-|17|T **/
    private $id_medio_transporte;
    /** FK|INT|datos_tercer_operador|0|F|F|-|-|10|F **/
    private $id_datos_tercer_operador;
    /** CP|TXT|Observaciones|0|F|F|-|-|10|F **/
    private $observaciones;
    
    public function setId_co_mercosur($id_co_mercosur) {
        $this->id_co_mercosur = $id_co_mercosur;
    }
    public function getId_co_mercosur() {
        return $this->id_co_mercosur;
    }

    public function setId_certificado_origen($id_certificado_origen) {
        $this->id_certificado_origen = $id_certificado_origen;
    }
    public function getId_certificado_origen() {
        return $this->id_certificado_origen;
    }

    public function setCorrelativo_mercosur($correlativo_mercosur) {
        $this->correlativo_mercosur = $correlativo_mercosur;
    }
    public function getCorrelativo_mercosur() {
        return $this->correlativo_mercosur;
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
    
    public function setNombre_consignatario($nombre_consignatario) {
        $this->nombre_consignatario = $nombre_consignatario;
    }
    public function getNombre_consignatario() {
        return $this->nombre_consignatario;
    }
    
    public function setDireccion_consignatario($direccion_consignatario) {
        $this->direccion_consignatario = $direccion_consignatario;
    }
    public function getDireccion_consignatario() {
        return $this->direccion_consignatario;
    }
    
    public function setId_pais_consignatario($id_pais_consignatario) {
        $this->id_pais_consignatario = $id_pais_consignatario;
    }
    public function getId_pais_consignatario() {
        return $this->id_pais_consignatario;
    }
    
    public function setPuerto_lugar_embarque($puerto_lugar_embarque) {
        $this->puerto_lugar_embarque = $puerto_lugar_embarque;
    }
    public function getPuerto_lugar_embarque() {
        return $this->puerto_lugar_embarque;
    }
    
    public function setId_medio_transporte($id_medio_transporte) {
        $this->id_medio_transporte = $id_medio_transporte;
    }
    public function getId_medio_transporte() {
        return $this->id_medio_transporte;
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
