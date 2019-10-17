<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class BloqueoEmpresa extends Db {
    
    const TABLE = 'bloqueo_empresa';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    public $acuerdo = array();

    public static $RELATIONS = array
    (
        'acuerdo' => array(self:: BELONGS_TO, 'Acuerdo', 'id_acuerdo')
    );

    private $id_bloqueo;
    private $fecha_bloqueo;
    private $fecha_alta;
    private $id_empresa;
    private $id_persona;
    private $estado;
    private $motivo;
    private $id_persona_alta;
    private $motivo_alta;
    private $estado_empresa_anterior;
    private $id_acuerdo;
    private $tipo_bloqueo;

    public function setId_bloqueo($id_bloqueo) {
        $this->id_bloqueo = $id_bloqueo;
    }
    public function getId_bloqueo() {
        return $this->id_bloqueo;
    }
    public function setFecha_bloqueo($fecha_bloqueo) {
        $this->fecha_bloqueo = $fecha_bloqueo;
    }
    public function getFecha_bloqueo() {
        return $this->fecha_bloqueo;
    }
    public function setFecha_desbloqueo($fecha_desbloqueo) {
        $this->fecha_desbloqueo = $fecha_desbloqueo;
    }
    public function getFecha_desbloqueo() {
        return $this->fecha_desbloqueo;
    }
    public function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getId_empresa() {
        return $this->id_empresa;
    }
    public function getId_persona() {
        return $this->id_persona;
    }
    public function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }
    public function getEstado() {
        return $this->estado;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function setMotivo($motivo) {
        $this->motivo = $motivo;
    }
    public function getMotivo() {
        return $this->motivo;
    }
    public function setId_persona_alta($id_persona_alta) {
        $this->id_persona_alta = $id_persona_alta;
    } 
    public function getId_persona_alta() {
        return $this->id_persona_alta;
    }
    public function setMotivo_alta($motivo_alta) {
        $this->motivo_alta = $motivo_alta;
    }
    public function getMotivo_alta() {
        return $this->motivo_alta;
    }
    public function setEstado_empresa_anterior($estado_empresa_anterior) {
        $this->estado_empresa_anterior = $estado_empresa_anterior;
    }
    public function getEstado_empresa_anterior() {
        return $this->estado_empresa_anterior;
    }
    function getId_acuerdo(){
        return $this->id_acuerdo;
    }
    function setId_acuerdo($id_acuerdo){
        $this->id_acuerdo=$id_acuerdo;
    }
    function getTipo_bloqueo(){
        return $this->tipo_bloqueo;
    }
    function setTipo_bloqueo($tipo_bloqueo){
        $this->tipo_bloqueo=$tipo_bloqueo;
    }
}
?>
