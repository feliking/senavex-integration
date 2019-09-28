<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class ElaboracionIncentivoOtro extends Db {
        
    const TABLE = 'elaboracion_incentivo_otro';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_ddjj;
    private $detalle;
    
    public function setId_DDJJ($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_DDJJ() {
        return $this->id_ddjj;
    }

    public function setDetalle($detalle) {
        $this->detalle = $detalle;
    }
    public function getDetalle() {
        return $this->detalle;
    }
    
}

?>
