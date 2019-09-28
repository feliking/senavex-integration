<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Cafe Pais|cf_ps|F **/
class PlanillaDDJJDel extends Db {
        
    const TABLE = 'planilla_ddjj_del';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    private $id_planilla_ddjj_del;
    private $id_planilla_ddjj;
    private $id_ddjj_acuerdos;
    private $usuario;
    private $motivo;
    private $fecha_registro;
    private $fecha_baja;
    private $estado;
    
    

    function getId_planilla_ddjj_del() {
        return $this->id_planilla_ddjj_del;
    }

    function getId_planilla_ddjj() {
        return $this->id_planilla_ddjj;
    }

    function getId_ddjj_acuerdos() {
        return $this->id_ddjj_acuerdos;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getMotivo() {
        return $this->motivo;
    }

    function getFecha_registro() {
        return $this->fecha_registro;
    }

    function getFecha_baja() {
        return $this->fecha_baja;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId_planilla_ddjj_del($id_planilla_ddjj_del) {
        $this->id_planilla_ddjj_del = $id_planilla_ddjj_del;
    }

    function setId_planilla_ddjj($id_planilla_ddjj) {
        $this->id_planilla_ddjj = $id_planilla_ddjj;
    }

    function setId_ddjj_acuerdos($id_ddjj_acuerdos) {
        $this->id_ddjj_acuerdos = $id_ddjj_acuerdos;
    }
    
    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setMotivo($motivo) {
        $this->motivo = $motivo;
    }

    function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    function setFecha_baja($fecha_baja) {
        $this->fecha_baja = $fecha_baja;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }





}

?>
