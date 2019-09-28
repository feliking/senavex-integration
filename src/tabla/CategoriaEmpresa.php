<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class CategoriaEmpresa extends Db {
        
    const TABLE = 'categoria_empresa';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_categoria_empresa;
    private $descripcion;
    
    public function setId_categoria_empresa($id_categoria_empresa) {
        $this->id_categoria_empresa = $id_categoria_empresa;
    }
    public function getId_categoria_empresa() {
        return $this->id_categoria_empresa;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
}

?>
