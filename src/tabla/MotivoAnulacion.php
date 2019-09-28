<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class MotivoAnulacion extends Db {
        
    const TABLE = 'motivo_anulacion';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_motivo_anulacion;
    private $descripcion;
    
    public function setId_motivo_anulacion($id_motivo_anulacion) {
        $this->id_motivo_anulacion = $id_motivo_anulacion;
    }
    public function getId_motivo_anulacion() {
        return $this->id_motivo_anulacion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
}

?>
