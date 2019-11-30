<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class SGCDdjj extends Db {
        
    const TABLE = 'sgc_ddjj';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_sgc_ddjj;
    private $fecha_inicio_revision;
    private $fecha_fin_revision;
    private $estado;
    private $observaciones;
    private $id_empresa;
    private $id_ddjj;
    private $id_certificador;
    private $id_regional;
    
    function getId_sgc_ddjj() {
        return $this->id_sgc_ddjj;
    }
    function setId_sgc_ddjj($id_sgc_ddjj) {
        $this->id_sgc_ddjj = $id_sgc_ddjj;
    }

    function getFecha_inicio_revision() {
        return $this->fecha_inicio_revision;
    }
    function setFecha_inicio_revision($fecha_inicio_revision) {
        $this->fecha_inicio_revision = $fecha_inicio_revision;
    }
    function getFecha_fin_revision() {
        return $this->fecha_fin_revision;
    }
    function setFecha_fin_revision($fecha_fin_revision) {
        $this->fecha_fin_revision = $fecha_fin_revision;
    }
    function getEstado() {
        return $this->estado;
    }
    function setEstado($estado) {
        return $this->estado = $estado;
    }

    function getObservaciones() {
        return $this->observaciones;
    }
    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
    function getId_empresa() {
        return $this->id_empresa;
    }
    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    function getId_ddjj() {
        return $this->id_ddjj;
    }
    function setId_ddjj($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    function getId_certificador() {
        return $this->id_certificador;
    }

    function setId_certificador($id_certificador) {
        $this->id_certificador = $id_certificador;
    }
    
    function getId_regional() {
        return $this->id_regional;
    }
    function setId_regional($id_regional) {
        $this->id_regional = $id_regional;
    }
}
?>
