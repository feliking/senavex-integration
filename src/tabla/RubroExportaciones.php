<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class RubroExportaciones extends Db {
        
    const TABLE = 'rubro_exportaciones';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_rubro_exportaciones;
    private $descripcion;
    
    public function setId_rubro_exportaciones($id_rubro_exportaciones) {
        $this->id_rubro_exportaciones = $id_rubro_exportaciones;
    }
    public function getId_rubro_exportaciones() {
        return $this->id_rubro_exportaciones;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }

    
}

?>
