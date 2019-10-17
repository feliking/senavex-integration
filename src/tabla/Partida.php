<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Partida extends Db {

    public $arancel = '';
    public $gestion = '';
    const TABLE = 'partida';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_partida;
    private $id_arancel;
    private $partida;
    private $denominacion;
    private $reo;
    private $unidad_medida;
    private $activo;
    private $criterio_valor;
    private $columna1;
    private $columna2;
    private $columna3;
    private $columna4;

    public function setId_partida($id_partida) {
        $this->id_partida = $id_partida;
    }
    public function getId_partida() {
        return $this->id_partida;
    }
    public function setId_arancel($id_arancel) {
        $this->id_arancel = $id_arancel;
    }
    public function getId_arancel() {
        return $this->id_arancel;
    }
    public function setPartida($partida) {
        $this->partida = $partida;
    }
    public function getPartida() {
        return $this->partida;
    }
    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }
    public function getDenominacion() {
        return $this->denominacion;
    }
    public function setReo($reo) {
        $this->reo = $reo;
    }
    public function getReo() {
        return $this->reo;
    }
    public function setUnidad_medida($unidad_medida) {
        $this->unidad_medida= $unidad_medida;
    }
    public function getUnidad_medida() {
        return $this->unidad_medida;
    }
    public function setActivo($activo) {
        $this->activo = $activo;
    }
    public function getActivo() {
        return $this->activo;
    }
    public function getCriterio_valor(){
        return $this->criterio_valor;
    }
    function setCriterio_valor($criterio_valor){
        $this->criterio_valor=$criterio_valor;
    }
    public function setColumna1($columna1) {
        $this->columna1 = $columna1;
    }
    public function getColumna1() {
        return $this->columna1;
    }
    public function setColumna2($columna2) {
        $this->columna2 = $columna2;
    }
    public function getColumna2() {
        return $this->columna2;
    }
    public function setColumna3($columna3) {
        $this->columna3 = $columna3;
    }
    public function getColumna3() {
        return $this->columna3;
    }
    public function setColumna4($columna4) {
        $this->columna4 = $columna4;
    }
    public function getColumna4() {
        return $this->columna4;
    }
}

?>
