<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');


defined('_ACCESO') or die('Acceso restringido');

class PerfilOpciones extends Db {
        
    const TABLE = 'perfil_opciones';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_perfil_opciones;
    private $opcion;
    private $descripcion;
    private $habilitado;
    private $activo;
    
    function getId_perfil_opciones() {
        return $this->id_perfil_opciones;
    }

    function getOpcion() {
        return $this->opcion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getHabilitado() {
        return $this->habilitado;
    }

    function getActivo() {
        return $this->activo;
    }

    function setId_perfil_opciones($id_perfil_opciones) {
        $this->id_perfil_opciones = $id_perfil_opciones;
    }

    function setOpcion($opcion) {
        $this->opcion = $opcion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setHabilitado($habilitado) {
        $this->habilitado = $habilitado;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }



}

?>
