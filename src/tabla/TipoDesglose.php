<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class TipoDesglose extends Db {
        
    const TABLE = 'tipo_desglose';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_tipo_desglose;
    private $descripcion;
    
    public function setId_tipo_desglose($id_tipo_desglose) {
        $this->id_tipo_desglose = $id_tipo_desglose;
    }
    public function getId_tipo_desglose() {
        return $this->id_tipo_desglose;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
}

?>
