<?php
include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Bitacora_ws extends Db {
    const TABLE = 'bitacora_ws';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
  private $id_bitacora_ws;
  private $id_entidades_ws;
  private $metodo;
  private $respuesta;
  private $usuario;
  private $tipo_usuario;
  private $fecha_registro;
  private $estado;
  private $id_empresa;  

    public function getId_bitacora_ws() {
        return $this->id_bitacora_ws;
    }

    public function getId_entidades_ws() {
        return $this->id_entidades_ws;
    }

    public function getMetodo() {
        return $this->metodo;
    }

    public function getRespuesta() {
        return $this->respuesta;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getTipo_usuario() {
        return $this->tipo_usuario;
    }

    public function getFecha_registro() {
        return $this->fecha_registro;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId_bitacora_ws($id_bitacora_ws) {
        $this->id_bitacora_ws = $id_bitacora_ws;
    }

    public function setId_entidades_ws($id_entidades_ws) {
        $this->id_entidades_ws = $id_entidades_ws;
    }

    public function setMetodo($metodo) {
        $this->metodo = $metodo;
    }

    public function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setTipo_usuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }

    public function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
}
?>