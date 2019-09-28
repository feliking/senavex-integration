<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class AnulacionCo extends Db {
    
    const TABLE = 'anulacion_co';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_anulacion_co;
    private $id_certificado_origen;
    private $id_motivo_anulacion;
    
    public function setId_anulacion_co($id_anulacion_co) {
        $this->id_anulacion_co = $id_anulacion_co;
    }
    public function getId_anulacion_co() {
        return $this->id_anulacion_co;
    }

    public function setId_certificado_origen($id_certificado_origen) {
        $this->id_certificado_origen = $id_certificado_origen;
    }
    public function getId_certificado_origen() {
        return $this->id_certificado_origen;
    }
    
    public function setId_motivo_anulacion($id_motivo_anulacion) {
        $this->id_motivo_anulacion= $id_motivo_anulacion;
    }
    public function getId_motivo_anulacion() {
        return $this->id_motivo_anulacion;
    }
    
}

?>
