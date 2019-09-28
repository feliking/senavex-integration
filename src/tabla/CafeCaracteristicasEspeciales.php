<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class CafeCaracteristicasEspeciales extends Db {
        
    const TABLE = 'cafe_caracteristicas_especiales';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    private $id_cafe_caracteristicas_especiales;
    private $descripcion;
  
    function getId_cafe_caracteristicas_especiales() {
        return $this->id_cafe_caracteristicas_especiales;
    }


    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_cafe_caracteristicas_especiales($id_cafe_caracteristicas_especiales) {
        $this->id_cafe_caracteristicas_especiales = $id_cafe_caracteristicas_especiales;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }



}

?>
