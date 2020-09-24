<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class RetrasoDdjj extends Db {
    
    const TABLE = 'retraso_ddjj';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_retraso_ddjj;
    private $id_asistente;
    private $fecha_limite_revision;
    private $fecha_registro;
    private $fecha_retraso;
    private $id_ddjj;

    public function setId_retraso_ddjj($id_retraso_ddjj) {
        $this->id_retraso_ddjj = $id_retraso_ddjj;
    }
    public function getId_retraso_ddjj() {
        return $this->id_retraso_ddjj;
    }

    public function setId_Asistente($id_asistente){
        $this->id_asistente = $id_asistente;
    }
    public function getId_Asistente() {
        return $this->id_asistente;
    }
    
    public function setFecha_Limite_Revision($fecha_limite_revision) {
        $this->fecha_limite_revision= $fecha_limite_revision;
    }
    public function getFecha_Limite_Revision() {
        return $this->fecha_limite_revision;
    }

    public function setFecha_Registro($fecha_registro) {
        $this->fecha_registro= $fecha_registro;
    }
    public function getFecha_Registro() {
        return $this->fecha_registro;
    }

    public function setFecha_Retraso($fecha_retraso) {
        $this->fecha_retraso = $fecha_retraso;
    }
    public function getFecha_Retraso() {
        return $this->fecha_retraso;
    }
    public function setId_ddjj($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_ddjj() {
        return $this->id_ddjj;
    }
    
}

?>
