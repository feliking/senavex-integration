<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class CafeOrganizacion extends Db {
        
    const TABLE = 'cafe_organizacion';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
   
    private $id_cafe_organizacion;
    private $sigla;
    private $descripcion;

    function getId_cafe_organizacion() {
        return $this->id_cafe_organizacion;
    }

    function getSigla() {
        return $this->sigla;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_cafe_organizacion($id_cafe_organizacion) {
        $this->id_cafe_organizacion = $id_cafe_organizacion;
    }

    function setSigla($sigla) {
        $this->sigla = $sigla;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}

?>
