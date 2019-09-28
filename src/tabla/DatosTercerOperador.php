<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class DatosTercerOperador extends Db {
        
    const TABLE = 'datos_tercer_operador';

    public $certificado_origen = array();
    
    public static $RELATIONS = array
    (
        'certificado_origen' => array(self:: BELONGS_TO, 'CertificadoOrigen', 'id_certificado_origen')
    );
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_datos_tercer_operador;
    private $id_certificado_origen;
    private $nombre;
    private $direccion;
    private $ciudad;
    private $pais;
    private $numero_factura;
    
    public function setId_datos_tercer_operador($id_datos_tercer_operador) {
        $this->id_datos_tercer_operador = $id_datos_tercer_operador;
    }
    public function getId_datos_tercer_operador() {
        return $this->id_datos_tercer_operador;
    }

    public function setId_certificado_origen($id_certificado_origen) {
        $this->nombre = $id_certificado_origen;
    }
    public function getId_certificado_origen() {
        return $this->id_certificado_origen;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    
    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }
    public function getCiudad() {
        return $this->ciudad;
    }
    
    public function setPais($pais) {
        $this->pais = $pais;
    }
    public function getPais() {
        return $this->pais;
    }
    
    public function setNumero_factura($numero_factura) {
        $this->numero_factura = $numero_factura;
    }
    public function getNumero_factura() {
        return $this->numero_factura;
    }
    
}

?>