<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Arancel extends Db {
        
//    const TABLE = 'planilla_arancel';
//
//    public static function finder($className=__CLASS__) {
//        return parent::finder($className);
//    }
//
//    private $id_arancel;
//    private $denominacion;
//    private $gestion_publicacion;
//    private $activo;
//
//    public function setId_arancel($id_arancel) {
//        $this->id_arancel = $id_arancel;
//    }
//    public function getId_arancel() {
//        return $this->id_arancel;
//    }
//
//    public function setDenominacion($denominacion) {
//        $this->denominacion = $denominacion;
//    }
//    public function getDenominacion() {
//        return $this->denominacion;
//    }
//
//    public function setGestion_Publicacion($gestion_poublicacion) {
//        $this->gestion_publicacion = $gestion_poublicacion;
//    }
//    public function getGestion_Publicacion() {
//        return $this->gestion_publicacion;
//    }
//
//    public function setActivo($activo) {
//        $this->activo = $activo;
//    }
//    public function getActivo() {
//        return $this->activo;
//    }
//

    const TABLE = 'arancel';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_arancel;
    private $denominacion;
    private $gestion_publicacion;
    private $activo;
    private $vigente;
    private $cantidad_digitos;

    public function setId_arancel($id_arancel) {
        $this->id_arancel = $id_arancel;
    }
    public function getId_arancel() {
        return $this->id_arancel;
    }

    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }
    public function getDenominacion() {
        return $this->denominacion;
    }

    public function setGestion_Publicacion($gestion_poublicacion) {
        $this->gestion_publicacion = $gestion_poublicacion;
    }
    public function getGestion_Publicacion() {
        return $this->gestion_publicacion;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }
    public function getActivo() {
        return $this->activo;
    }
    public function setVigente($vigente) {
        $this->vigente = $vigente;
    }
    public function getVigente() {
        return $this->vigente;
    }
    public function setCantidad_Digitos($cantidad_digitos) {
        $this->cantidad_digitos = $cantidad_digitos;
    }
    public function getCantidad_Digitos() {
        return $this->cantidad_digitos;
    }

}

?>
