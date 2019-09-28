<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class AsesoramientoHistorico extends Db {
        
    const TABLE = 'asesoramiento_historico';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_asesoramiento_historico;
    private $id_asesoramiento;
    private $observaciones_exportador;
    private $respuesta_asistente;
    private $fecha_observacion;
    private $fecha_respuesta;
    private $estado;
    
    public function setId_Asesoramiento_Historico($id_asesoramiento_historico) {
        $this->id_asesoramiento_historico = $id_asesoramiento_historico;
    }
    public function getId_Asesoramiento_Historico() {
        return $this->id_asesoramiento_historico;
    }

    public function setId_Asesoramiento($id_asesoramiento) {
        $this->id_asesoramiento = $id_asesoramiento;
    }
    public function getId_Asesoramiento() {
        return $this->id_asesoramiento;
    }

    public function setObservaciones_Exportador($observaciones_exportador) {
        $this->observaciones_exportador = $observaciones_exportador;
    }
    public function getObservaciones_Exportador() {
        return $this->observaciones_exportador;
    }
    
    public function setRespuesta_Asistente($respuesta_asistente) {
        $this->respuesta_asistente = $respuesta_asistente;
    }
    public function getRespuesta_Asistente() {
        return $this->respuesta_asistente;
    }

    public function setFecha_Observacion($fecha_observacion) {
        $this->fecha_observacion = $fecha_observacion;
    }
    public function getFecha_Observacion() {
        return $this->fecha_observacion;
    }
    
    public function setFecha_Respuesta($fecha_respuesta) {
        $this->fecha_respuesta = $fecha_respuesta;
    }
    public function getFecha_Respuesta() {
        return $this->fecha_respuesta;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }
    
}

?>
