<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');
defined('_ACCESO') or die('Acceso restringido');

class TipoAcuerdo extends Db {
        
    const TABLE = 'tipo_acuerdo';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    private $id_tipo_acuerdo;
    private $descripcion;
    
    public function setId_tipo_acuerdo($id_tipo_acuerdo) {
        $this->id_tipo_acuerdo = $id_tipo_acuerdo;
    }

    public function getId_tipo_acuerdo() {
        return $this->id_tipo_acuerdo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
}

?>
