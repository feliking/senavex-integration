<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class DetalleArancel extends Db {
        
    const TABLE = 'planilla_detalle_arancel';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_detalle_arancel;
    private $id_arancel;
    private $codigo;
    private $descripcion;
    private $codigo_padre;
    private $activo;
    private $id_capitulo;
    
    public function setId_detalle_arancel($id_detalle_arancel) {
        $this->id_detalle_arancel = $id_detalle_arancel;
    }
    public function getId_detalle_arancel() {
        return $this->id_detalle_arancel;
    }

    public function setId_Arancel($id_arancel) {
        $this->id_arancel = $id_arancel;
    }
    public function getId_Arancel() {
        return $this->id_arancel;
    }
    
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    public function getCodigo() {
        return $this->codigo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setCodigo_Padre($codigo_padre) {
        $this->codigo_padre = $codigo_padre;
    }
    public function getCodigo_Padre() {
        return $this->codigo_padre;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }
    public function getActivo() {
        return $this->activo;
    }

    public function setId_capitulo($id_capitulo) {
        $this->id_capitulo = $id_capitulo;
    }
    public function getId_capitulo() {
        return $this->id_capitulo;
    }

}

?>
