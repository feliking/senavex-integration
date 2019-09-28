<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class CafeRuex extends Db {
        
    const TABLE = 'cafe_ruex';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
 

    private $id_cafe_ruex;
    private $id_ruex;
    private $habilitado;

    function getId_cafe_ruex() {
        return $this->id_cafe_ruex;
    }

    function getId_ruex() {
        return $this->id_ruex;
    }

    function getHabilitado() {
        return $this->habilitado;
    }

    function setId_cafe_ruex($id_cafe_ruex) {
        $this->id_cafe_ruex = $id_cafe_ruex;
    }

    function setId_ruex($id_ruex) {
        $this->id_ruex = $id_ruex;
    }

    function setHabilitado($habilitado) {
        $this->habilitado = $habilitado;
    }


}

?>
