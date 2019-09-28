<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Cafe Pais|cf_ps|F **/
class PlanillaDDJJ extends Db {
        
    const TABLE = 'planilla_ddjj';

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
   
    private $id_planilla_ddjj;
    private $numero_ddjj;
    private $numero_folder;
    private $id_empresa;
    private $id_asistente_registro;
    private $fecha_registro;
    private $fecha_vencimiento;
    private $fecha_entrega;
    private $id_estado;
    private $id_nandina;
    private $descripcion;
    private $id_tipo;
    private $id_regional;
    private $observacion;
    private $fecha_baja;
    private $id_actualizacion_ddjj;
    private $fecha_revision;
    private $id_asistente_revision;
    private $id_asistente_entrega;
    private $id_tipo_planilla;
    private $antiguo_ruex;
    
    function getId_planilla_ddjj() {
        return $this->id_planilla_ddjj;
    }

    function getNumero_ddjj() {
        return $this->numero_ddjj;
    }

    function getNumero_folder() {
        return $this->numero_folder;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function getId_asistente_registro() {
        return $this->id_asistente_registro;
    }

    function getFecha_registro() {
        return $this->fecha_registro;
    }

    function getFecha_vencimiento() {
        return $this->fecha_vencimiento;
    }

    function getFecha_entrega() {
        return $this->fecha_entrega;
    }

    function getId_estado() {
        return $this->id_estado;
    }

    function getId_nandina() {
        return $this->id_nandina;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getId_tipo() {
        return $this->id_tipo;
    }

    function getId_regional() {
        return $this->id_regional;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function getFecha_baja() {
        return $this->fecha_baja;
    }

    function getId_actualizacion_ddjj() {
        return $this->id_actualizacion_ddjj;
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

    function setId_planilla_ddjj($id_planilla_ddjj) {
        $this->id_planilla_ddjj = $id_planilla_ddjj;
    }

    function setNumero_ddjj($numero_ddjj) {
        $this->numero_ddjj = $numero_ddjj;
    }

    function setNumero_folder($numero_folder) {
        $this->numero_folder = $numero_folder;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    function setId_asistente_registro($id_asistente_registro) {
        $this->id_asistente_registro = $id_asistente_registro;
    }

    function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    function setFecha_vencimiento($fecha_vencimiento) {
        $this->fecha_vencimiento = $fecha_vencimiento;
    }

    function setFecha_entrega($fecha_entrega) {
        $this->fecha_entrega = $fecha_entrega;
    }

    function setId_estado($id_estado) {
        $this->id_estado = $id_estado;
    }

    function setId_nandina($id_nandina) {
        $this->id_nandina = $id_nandina;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setId_tipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }

    function setId_regional($id_regional) {
        $this->id_regional = $id_regional;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function setFecha_baja($fecha_baja) {
        $this->fecha_baja = $fecha_baja;
    }

    function setId_actualizacion_ddjj($id_actualizacion_ddjj) {
        $this->id_actualizacion_ddjj = $id_actualizacion_ddjj;
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
    function getId_tipo_planilla() {
        return $this->id_tipo_planilla;
    }

    function setId_tipo_planilla($id_tipo_planilla) {
        $this->id_tipo_planilla = $id_tipo_planilla;
    }

    function getAntiguo_ruex() {
        return $this->antiguo_ruex;
    }

    function setAntiguo_ruex($antiguo_ruex) {
        $this->antiguo_ruex = $antiguo_ruex;
    }


}

?>
