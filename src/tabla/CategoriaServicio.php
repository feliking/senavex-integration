<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class CategoriaServicio extends Db {
        
    const TABLE = 'categoria_servicio';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_categoria_servicio;
    private $descripcion;
    
    public function setId_categoria_servicio($id_categoria_servicio) {
        $this->id_categoria_servicio = $id_categoria_servicio;
    }
    public function getId_categoria_servicio() {
        return $this->id_categoria_servicio;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
}

?>
