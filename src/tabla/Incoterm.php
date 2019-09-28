<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Incoterm extends Db {
    
    const TABLE = 'incoterm';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_incoterm;
    private $sigla;
    private $titulo;
    private $descripcion;

    
    public function setId_incoterm($id_incoterm) {
        $this->id_incoterm = $id_incoterm;
    }
    public function getId_incoterm() {
        return $this->id_incoterm;
    }
    public function setSigla($sigla) {
        $this->sigla = $sigla;
    }
    public function getSigla() {
        return $this->sigla;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    public function getTitulo() {
        return $this->titulo;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
}
?>
