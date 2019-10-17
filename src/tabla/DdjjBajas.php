<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class DdjjBajas extends Db {
        
    const TABLE = 'ddjj_bajas_causas';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_ddjj_bajas_causas;
    private $denominacion;
    private $estado;
    private $permisos;

    function getId_ddjj_bajas_causas() {
        return $this->id_ddjj_bajas_causas;
    }

    function getDenominacion() {
        return $this->denominacion;
    }

    function getEstado() {
        return $this->estado;
    }

    function getPermisos() {
        return $this->permisos;
    }

    function setId_ddjj_bajas_causas($id_ddjj_bajas_causas) {
        $this->id_ddjj_bajas_causas = $id_ddjj_bajas_causas;
    }

    function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setPermisos($permisos) {
        $this->permisos = $permisos;
    }


}

?>
