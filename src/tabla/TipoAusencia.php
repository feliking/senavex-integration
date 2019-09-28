<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class TipoAusencia extends Db {
        
    const TABLE = 'tipo_ausencia';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_tipo_ausencia;
    private $descripcion;
    
    public function setId_tipo_ausencia($id_tipo_ausencia) {
        $this->id_tipo_ausencia = $id_tipo_ausencia;
    }
    public function getId_tipo_ausencia() {
        return $this->id_tipo_ausencia;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
}

?>
