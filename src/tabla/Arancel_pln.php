<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Arancel_pln extends Db {

    const TABLE = 'planilla_arancel';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_arancel;
    private $denominacion;
    private $gestion_publicacion;
    private $activo;

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

}

?>
