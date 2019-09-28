<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Cafe Pais|cf_ps|F **/
class PlanillaCO extends Db {
        
    const TABLE = 'planilla_co';

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

    private $id_planilla_co;
    private $id_empresa;
    private $nro_control;
    private $id_asistente_recepcion;
    private $id_planilla_tipo_emision;
    private $id_estado;
    private $fecha_sellado;
    private $id_criterio;
    private $id_tipo_co;
    private $id_pais;
    private $id_regional;
    private $fecha_entrega;
    private $nro_emision;
    private $fecha_recepcion;
    private $observacion_registro;
    private $observacion_revision;
    private $fecha_revision;
    private $id_asistente_revision;
    private $id_asistente_entrega;
    private $numero_folder;
    private $id_acuerdo;

    function getId_planilla_co() {
        return $this->id_planilla_co;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function getNro_control() {
        return $this->nro_control;
    }

    function getId_asistente_recepcion() {
        return $this->id_asistente_recepcion;
    }

    function getId_planilla_tipo_emision() {
        return $this->id_planilla_tipo_emision;
    }

    function getId_estado() {
        return $this->id_estado;
    }

    function getFecha_sellado() {
        return $this->fecha_sellado;
    }

    function getId_criterio() {
        return $this->id_criterio;
    }

    function getId_tipo_co() {
        return $this->id_tipo_co;
    }

    function getId_pais() {
        return $this->id_pais;
    }

    function getId_regional() {
        return $this->id_regional;
    }

    function getFecha_entrega() {
        return $this->fecha_entrega;
    }

    function getNro_emision() {
        return $this->nro_emision;
    }

    function getFecha_recepcion() {
        return $this->fecha_recepcion;
    }

    function getObservacion_registro() {
        return $this->observacion_registro;
    }

    function getObservacion_revision() {
        return $this->observacion_revision;
    }

    function getFecha_revision() {
        return $this->fecha_revision;
    }

    function getId_asistente_revision() {
        return $this->id_asistente_revision;
    }

    function getId_asistente_entrega() {
        return $this->id_asistente_entrega;
    }

    function getNumero_folder() {
        return $this->numero_folder;
    }

    function getId_acuerdo() {
        return $this->id_acuerdo;
    }

    function setId_planilla_co($id_planilla_co) {
        $this->id_planilla_co = $id_planilla_co;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    function setNro_control($nro_control) {
        $this->nro_control = $nro_control;
    }

    function setId_asistente_recepcion($id_asistente_recepcion) {
        $this->id_asistente_recepcion = $id_asistente_recepcion;
    }

    function setId_planilla_tipo_emision($id_planilla_tipo_emision) {
        $this->id_planilla_tipo_emision = $id_planilla_tipo_emision;
    }

    function setId_estado($id_estado) {
        $this->id_estado = $id_estado;
    }

    function setFecha_sellado($fecha_sellado) {
        $this->fecha_sellado = $fecha_sellado;
    }

    function setId_criterio($id_criterio) {
        $this->id_criterio = $id_criterio;
    }

    function setId_tipo_co($id_tipo_co) {
        $this->id_tipo_co = $id_tipo_co;
    }

    function setId_pais($id_pais) {
        $this->id_pais = $id_pais;
    }

    function setId_regional($id_regional) {
        $this->id_regional = $id_regional;
    }

    function setFecha_entrega($fecha_entrega) {
        $this->fecha_entrega = $fecha_entrega;
    }

    function setNro_emision($nro_emision) {
        $this->nro_emision = $nro_emision;
    }

    function setFecha_recepcion($fecha_recepcion) {
        $this->fecha_recepcion = $fecha_recepcion;
    }

    function setObservacion_registro($observacion_registro) {
        $this->observacion_registro = $observacion_registro;
    }

    function setObservacion_revision($observacion_revision) {
        $this->observacion_revision = $observacion_revision;
    }

    function setFecha_revision($fecha_revision) {
        $this->fecha_revision = $fecha_revision;
    }

    function setId_asistente_revision($id_asistente_revision) {
        $this->id_asistente_revision = $id_asistente_revision;
    }

    function setId_asistente_entrega($id_asistente_entrega) {
        $this->id_asistente_entrega = $id_asistente_entrega;
    }

    function setNumero_folder($numero_folder) {
        $this->numero_folder = $numero_folder;
    }

    function setId_acuerdo($id_acuerdo) {
        $this->id_acuerdo = $id_acuerdo;
    }


}

?>
