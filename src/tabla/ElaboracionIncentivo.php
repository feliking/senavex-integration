<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class ElaboracionIncentivo extends Db {
        
    const TABLE = 'elaboracion_incentivo';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_elaboracion_incentivo;
    private $descripcion;
    
    public function setId_elaboracion_incentivo($id_elaboracion_incentivo) {
        $this->id_elaboracion_incentivo = $id_elaboracion_incentivo;
    }
    public function getId_elaboracion_incentivo() {
        return $this->id_elaboracion_incentivo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
}

?>
