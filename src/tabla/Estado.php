<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Estado extends Db {
        
    const TABLE = 'estado_empresas';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_estado;
    public $descripcion;
    
    public function setId_estado($id_estado) {
        $this->id_estado = $id_estado;
    }
    public function getId_estado() {
        return $this->id_estado;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
}

?>
