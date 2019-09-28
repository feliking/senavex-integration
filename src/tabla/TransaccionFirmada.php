<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class TransaccionFirmada extends Db {
    
    const TABLE = 'transaccion_firmada';
    /*
    public static $RELATIONS = array
    (
        'seguridad.evento' => array(self:: BELONGS_TO, 'Evento', 'id_evento'),
        'seguridad.persona' => array(self:: BELONGS_TO, 'Persona', 'id_persona'),
        'ddjj.empresa' => array(self:: BELONGS_TO, 'Empresa', 'id_empresa')
    );
    */
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_transaccion_firmada;
    private $id_evento;
    private $pin;
    private $id_persona;
    private $id_empresa;
    private $estado;
    private $fecha_solicitud_transaccion;
    private $fecha_confirmacion_transaccion;
    
    public function setId_transaccion_firmada($id_transaccion_firmada) {
        $this->id_transaccion_firmada = $id_transaccion_firmada;
    }
    public function getId_transaccion_firmada() {
        return $this->id_transaccion_firmada;
    }
    
    public function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }
    public function getId_evento() {
        return $this->id_evento;
    }
    
    public function setPin($pin) {
        $this->pin = $pin;
    }
    public function getPin() {
        return $this->pin;
    }
    
    public function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }
    public function getId_persona() {
        return $this->id_persona;
    }
    
    public function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getId_empresa() {
        return $this->id_empresa;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }
    
    public function setFecha_solicitud_transaccion($fecha_solicitud_transaccion) {
        $this->fecha_solicitud_transaccion = $fecha_solicitud_transaccion;
    }
    public function getFecha_solicitud_transaccion() {
        return $this->fecha_solicitud_transaccion;
    }
    
    public function setFecha_confirmacion_transaccion($fecha_confirmacion_transaccion) {
        $this->fecha_confirmacion_transaccion = $fecha_confirmacion_transaccion;
    }
    public function getFecha_confirmacion_transaccion() {
        return $this->fecha_confirmacion_transaccion;
    }
    
}

?>
