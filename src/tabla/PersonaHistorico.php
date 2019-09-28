<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class PersonaHistorico extends Db {
        
    const TABLE = 'persona_historico';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    private $id_persona_historico;
    private $id_persona;
    private $nombres;
    private $paterno;
    private $materno;
    private $id_tipo_documento;
    private $numero_documento;
    private $numero_contacto;
    private $email;
    private $id_pais_origen;
    private $id_departemento;
    private $ciudad;
    private $direccion;
    private $fecha_creacion;
    private $fecha_modificacion;
    private $genero;//true hombre, false mujer
    
    public function setId_persona_historico($id_persona_historico) {
        $this->id_persona_historico = $id_persona_historico;
    }
    public function getId_persona_historico() {
        return $this->id_persona_historico;
    }
    public function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }
    public function getId_persona() {
        return $this->id_persona;
    }
    public function setId_digital($id_digital) {
        $this->id_digital= $id_digital;
    }
    public function getId_digital() {
        return $this->id_digital;
    }
    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }
    public function getNombres() {
        return $this->nombres;
    }
    public function setPaterno($paterno) {
        $this->paterno = $paterno;
    }
    public function getPaterno() {
        return $this->paterno;
    }
    public function setMaterno($materno) {
        $this->materno = $materno;
    }
    public function getMaterno() {
        return $this->materno;
    }
    public function setId_tipo_documento($id_tipo_documento) {
        $this->id_tipo_documento = $id_tipo_documento;
    }
    public function getId_tipo_documento() {
        return $this->id_tipo_documento;
    }
    public function setNumero_documento($numero_documento) {
        $this->numero_documento = $numero_documento;
    }
    public function getNumero_documento() {
        return $this->numero_documento;
    }
    public function setNumero_contacto($numero_contacto) {
        $this->numero_contacto = $numero_contacto;
    }
    public function getNumero_contacto() {
        return $this->numero_contacto;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setId_pais_origen($id_pais_origen) {
        $this->id_pais_origen = $id_pais_origen;
    }
    public function getId_pais_origen() {
        return $this->id_pais_origen;
    }
    public function setId_departamento($id_departamento) {
        $this->id_departamento = $id_departamento;
    }
    public function getId_departamento() {
        return $this->id_departamento;
    }
    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }
    public function getCiudad() {
        return $this->ciudad;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }
    public function getFecha_creacion() {
        return $this->fecha_creacion;
    }
    public function setFecha_modificacion($fecha_modificacion) {
        $this->fecha_modificacion = $fecha_modificacion;
    }
    public function getFecha_modificacion() {
        return $this->fecha_modificacion;
    }
    public function setGenero($genero) {
        $this->genero = $genero;
    }
    public function getGenero() {
        return $this->genero;
    }
}

?>
