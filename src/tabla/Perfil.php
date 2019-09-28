<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Perfil extends Db {
        
    const TABLE = 'perfil';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_perfil;
    private $descripcion;   
    private $tipo;
    private $opciones;
    private $habilitado;
    
    public function setId_perfil($id_perfil) {
        $this->id_perfil = $id_perfil;
    }

    public function getId_perfil() {
        return $this->id_perfil;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getTipo() {
        return $this->tipo;
    }
    public function setOpciones($opciones) {
        $this->opciones = $opciones;
    }

    public function getOpciones() {
        return $this->opciones;
    }
    function getHabilitado() {
        return $this->habilitado;
    }

    function setHabilitado($habilitado) {
        $this->habilitado = $habilitado;
    }


}

?>
