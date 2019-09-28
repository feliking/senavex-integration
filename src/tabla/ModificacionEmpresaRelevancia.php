<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class ModificacionEmpresaRelevancia extends Db {
    
    const TABLE = 'modificacion_empresa_relevancia';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_modificacion_empresa_relevancia;
    private $id_empresa;
    private $observacion;
    private $fecha_solicitud;
    private $estado;//0 registrado 1 admitido 2 done 3rechazado 4aprobado ruex
    private $id_servicio_exportador;
    private $observacion_asistente;
    private $renovacion;
    private $id_empresa_revision;
    private $id_asistente_rechazo;
    
    public function setId_modificacion_empresa_relevancia($id_modificacion_empresa_relevancia) {
        $this->id_modificacion_empresa_relevancia = $id_modificacion_empresa_relevancia;
    }
    public function getId_modificacion_empresa_relevancia() {
        return $this->id_modificacion_empresa_relevancia;
    }
    public function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getId_empresa() {
        return $this->id_empresa;
    }
    public function setObservacion($observacion) {
        $this->observacion = $observacion;
    }
    public function getObservacion() {
        return $this->observacion;
    }
    public function setFecha_solicitud($fecha_solicitud) {
        $this->fecha_solicitud = $fecha_solicitud;
    }
    public function getFecha_solicitud() {
        return $this->fecha_solicitud;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }
    public function setId_servicio_exportador($id_servicio_exportador)
    {
        $this->id_servicio_exportador = $id_servicio_exportador;
    }
    public function getId_servicio_exportador() {
        return $this->id_servicio_exportador;
    }
    public function setObservacion_asistente($observacion_asistente)
    {
        $this->observacion_asistente = $observacion_asistente;
    }
    public function getObservacion_asistente() {
        return $this->observacion_asistente;
    }
    public function setRenovacion($renovacion)
    {
        $this->renovacion = $renovacion;
    }
    public function getRenovacion() {
        return $this->renovacion;
    }
     public function setId_empresa_revision($id_empresa_revision)
    {
        $this->id_empresa_revision= $id_empresa_revision;
    }
    public function getid_empresa_revision() {
        return $this->id_empresa_revision;
    }
    public function setId_asistente_rechazo($id_asistente_rechazo)
    {
        $this->id_asistente_rechazo= $id_asistente_rechazo;
    }
    public function getId_asistente_rechazo() {
        return $this->id_asistente_rechazo;
    }
}

?>
