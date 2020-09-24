<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');
defined('_ACCESO') or die('Acceso restringido');

class EstadoAcuerdo extends Db {
        
    const TABLE = 'estado_acuerdo';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_estado_acuerdo;
    
    private $descripcion;
    
    public function setId_estado_acuerdo($id_estado_acuerdo) {
        $this->id_estado_acuerdo = $id_estado_acuerdo;
    }

    public function getId_estado_acuerdo() {
        return $this->id_estado_acuerdo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
}
?>
