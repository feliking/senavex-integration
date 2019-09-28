<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class RequisitosRuex extends Db {
        
    const TABLE = 'requisitos_ruex';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    private $id_requisitos_ruex;
    private $descripcion;
    private $grupo;
    private $estado;
    
    public function setId_requisitos_ruex($id_requisitos_ruex) {
        $this->id_requisitos_ruex = $id_requisitos_ruex;
    }
    public function getId_requisitos_ruex() {
        return $this->id_requisitos_ruex;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }
    
}

?>
