<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Evento extends Db {
        
    const TABLE = 'seguridad.evento';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_evento;
    private $descripcion;
    
    public function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }
    public function getId_evento() {
        return $this->id_evento;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
}

?>
