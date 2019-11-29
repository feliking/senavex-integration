<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class ZonasEspeciales extends Db {

    const TABLE = 'zonas_especiales';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    public $id_zonas_especiales;
    private $denominacion;

    public function setId_zonas_especiales($id_zonas_especiales) {
        $this->id_zonas_especiales = $id_zonas_especiales;
    }
    public function getId_zonas_especiales() {
        return $this->id_zonas_especiales;
    }
    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }
    public function getDenominacion() {
        return $this->denominacion;
    }
}
?>
