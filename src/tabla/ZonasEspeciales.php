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
    private $criterio_valor;

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
    public function getCriterio_valor(){
        return $this->criterio_valor;
    }
    function setCriterio_valor($criterio_valor){
        $this->criterio_valor=$criterio_valor;
    }
}
?>
