<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class FacturaSenavexTipo extends Db {
        
    const TABLE = 'factura_senavex_tipo';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id;
    private $descripcion;
    
    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getDescripcion(){
        return $this->descripcion;
    }

    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    
}

?>
