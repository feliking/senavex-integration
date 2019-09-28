<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class VigenciaEmpresa extends Db {
        
    const TABLE = 'vigencia_empresa';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_vigencia_empresa;
    private $descripcion;
    private $dias;
    
    public function setId_vigencia_empresa($id_vigencia_empresa) {
        $this->id_vigencia_empresa = $id_vigencia_empresa;
    }
    public function getId_vigencia_empresa() {
        return $this->id_vigencia_empresa;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setDias($dias) {
        $this->dias = $dias;
    }
    public function getDias() {
        return $this->dias;
    }
    
}

?>
