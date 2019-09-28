<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class AusenciaAsistente extends Db {
        
    const TABLE = 'ausencia_asistente';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    public static $RELATIONS = array
    (
        'persona' => array(self:: BELONGS_TO, 'Persona', 'id_persona'),
        'tipoausencia' => array(self:: BELONGS_TO, 'TipoAusencia', 'id_tipo_ausencia')
    );

    private $id_ausencia_asistente;
    private $id_persona;
    private $id_persona_firma;
    private $motivo;
    private $fecha_desde;
    private $fecha_hasta;
    private $fecha_cancelar;
    private $estado;    //0 baja 1 activo 2 cancelado
    private $id_tipo_ausencia;    
    
    public function setId_ausencia_asistente($id_ausencia_asistente) {
        $this->id_ausencia_asistente = $id_ausencia_asistente;
    }
    public function getId_ausencia_asistente() {
        return $this->id_ausencia_asistente;
    }
    public function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }
    public function getId_persona() {
        return $this->id_persona;
    }
    public function setId_persona_firma($id_persona_firma) {
        $this->id_persona_firma = $id_persona_firma;
    }
    public function getId_persona_firma() {
        return $this->id_persona_firma;
    }
    public function setMotivo($motivo) {
        $this->motivo = $motivo;
    }
    public function getMotivo() {
        return $this->motivo;
    }
    public function setFecha_desde($fecha_desde) {
        $this->fecha_desde = $fecha_desde;
    }
    public function getFecha_desde() {
        return $this->fecha_desde;
    }
    public function setFecha_hasta($fecha_hasta) {
        $this->fecha_hasta = $fecha_hasta;
    }
    public function getFecha_hasta() {
        return $this->fecha_hasta;
    }
    public function setFecha_cancelar($fecha_cancelar) {
        $this->fecha_cancelar = $fecha_cancelar;
    }
    public function getFecha_cancelar() {
        return $this->fecha_cancelar;
    } 
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }
    public function setId_tipo_ausencia($id_tipo_ausencia) {
        $this->id_tipo_ausencia = $id_tipo_ausencia;
    }
    public function getId_tipo_ausencia() {
        return $this->id_tipo_ausencia;
    }
}

?>
