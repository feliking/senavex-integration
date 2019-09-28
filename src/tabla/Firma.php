<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Firma extends Db {
        
    const TABLE = 'firma';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_firma;
    private $id_persona;
    private $fecha;
    private $estado;
    private $id_asistente_elimina;
    
    public function setId_firma($id_firma) {
        $this->id_firma = $id_firma;
    }
    public function getId_firma() {
        return $this->id_firma;
    }

    public function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }
    public function getId_persona() {
        return $this->id_persona;
    }
    
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function getFecha() {
        return $this->fecha;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }
    public function setId_asistente_elimina($id_asistente_elimina) {
        $this->id_asistente_elimina = $id_asistente_elimina;
    }
    public function getId_asistente_elimina() {
        return $this->id_asistente_elimina;
    }
}

?>
