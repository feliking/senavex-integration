<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class EstadoEmpresas extends Db {
        
    const TABLE = 'estado_empresas';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $estado;
    private $descripcion;
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
}
?>
