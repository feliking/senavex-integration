<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Servicio extends Db {
        
    const TABLE = 'servicio';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_servicio;
    private $descripcion;
    private $costo;
    private $id_categoria_servicio;
    private $codigo;
    private $abreviacion;
    
    public function setId_servicio($id_servicio) {
        $this->id_servicio = $id_servicio;
    }
    public function getId_servicio() {
        return $this->id_servicio;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
    public function setCosto($costo) {
        $this->costo = $costo;
    }
    public function getCosto() {
        return $this->costo;
    }

    public function setId_Categoria_Servicio($id_categoria_servicio) {
        $this->id_categoria_servicio = $id_categoria_servicio;
    }
    public function getId_Categoria_Servicio() {
        return $this->id_categoria_servicio;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    
    function getAbreviacion() {
        return $this->abreviacion;
    }

    function setAbreviacion($abreviacion) {
        $this->abreviacion = $abreviacion;
    }




}

?>
