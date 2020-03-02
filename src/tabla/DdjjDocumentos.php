<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class DdjjDocumentos extends Db {
        
    const TABLE = 'ddjj_documentos';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_ddjj_documentos;
    private $id_ddjj;
    private $nombre;
    private $formato;
    private $title;
    private $fecha_creacion;
    private $size;

    public function setId_ddjj_documentos($id_ddjj_documentos) {
        $this->id_ddjj_documentos = $id_ddjj_documentos;
    }
    public function getId_ddjj_documentos() {
        return $this->id_ddjj_documentos;
    }

    public function setId_ddjj($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_ddjj() {
        return $this->id_ddjj;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setFormato($formato) {
        $this->formato = $formato;
    }
    public function getFormato() {
        return $this->formato;
    }
    public function setFecha_Creacion($fecha_creacion) {
        $this->fecha_creacion= $fecha_creacion;
    }
    public function getFecha_Creacion() {
        return $this->fecha_creacion;
    }
    public function setSize($size) {
        $this->size= $size;
    }
    public function getSize() {
        return $this->size;
    }
}

?>
