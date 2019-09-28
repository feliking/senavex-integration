<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CD|Certificado SGP|co_s|T **/
class COSgp extends Db {
        
    const TABLE = 'co_sgp';

    public $certificado_origen = array();
    public $medio_transporte = array();
    
    public static $RELATIONS = array
    (
        'certificado_origen' => array(self:: BELONGS_TO, 'CertificadoOrigen', 'id_certificado_origen'),
        'pais_consignatario' => array(self:: BELONGS_TO, 'Pais', 'id_pais'),
        'medio_transporte' => array(self:: BELONGS_TO, 'MedioTransporte', 'id_medio_transporte'),
        'pais_productor' => array(self:: BELONGS_TO, 'Pais', 'id_pais'),
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
    
    /** PK|INT|CO_SGP|0|F|F|-|-|10|F **/
    private $id_co_sgp;
    /** FK|INT|Certificado de Origen|0|F|F|-|-|10|F **/
    private $id_certificado_origen;
    /** CP|INT|Correltativo|0|F|F|-|-|10|F **/
    private $correlativo_sgp;
    /** CP|TXT|Nombre de Consignatario|0|F|F|-|-|10|F **/
    private $nombre_consignatario;
    /** CP|TXT|Direccion Consignatario|0|F|F|-|-|10|F **/
    private $direccion_consignatario;
    
    /** FK|INT|Pais Consignatario|0|T|F|Seleccione un Pais|-|20|F **/
    private $id_pais_consignatario;
    
    /** FK|INT|Medio de Transporte|0|T|F|Seleccione un Medio de Transporte|-|20|F **/
    private $id_medio_transporte;
    
    /** CP|TXT|Ruta|0|F|F|-|-|10|F **/
    private $ruta;
    /** CP|TXT|Uso Oficial|0|F|F|-|-|10|F **/
    private $uso_oficial;
    /** FK|INT|Pais Productor|0|T|F|Seleccione un Pais del productor|-|20|F **/
    private $id_pais_productor;
    /** FK|TXT|Pbservaciones|0|F|F|-|-|10|F **/
    private $observaciones;
    
    public function setId_co_sgp($id_co_sgp) {
        $this->id_co_sgp = $id_co_sgp;
    }
    public function getId_co_sgp() {
        return $this->id_co_sgp;
    }

    public function setId_certificado_origen($id_certificado_origen) {
        $this->id_certificado_origen = $id_certificado_origen;
    }
    public function getId_certificado_origen() {
        return $this->id_certificado_origen;
    }

    public function setCorrelativo_sgp($correlativo_sgp) {
        $this->correlativo_sgp = $correlativo_sgp;
    }
    public function getCorrelativo_sgp() {
        return $this->correlativo_sgp;
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
    
    public function setId_medio_transporte($id_medio_transporte) {
        $this->id_medio_transporte = $id_medio_transporte;
    }
    public function getId_medio_transporte() {
        return $this->id_medio_transporte;
    }
    
    public function setRuta($ruta) {
        $this->ruta = $ruta;
    }
    public function getRuta() {
        return $this->ruta;
    }
    
    public function setUso_oficial($uso_oficial) {
        $this->uso_oficial = $uso_oficial;
    }
    public function getUso_oficial() {
        return $this->uso_oficial;
    }
    
    public function setId_pais_productor($id_pais_productor) {
        $this->id_pais_productor = $id_pais_productor;
    }
    public function getId_pais_productor() {
        return $this->id_pais_productor;
    }
    
    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
    public function getObservaciones() {
        return $this->observaciones;
    }
    
}

?>
