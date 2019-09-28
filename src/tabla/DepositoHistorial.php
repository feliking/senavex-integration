<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class DepositoHistorial extends Db {
        
    const TABLE = 'deposito_historial';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_deposito_historial;
    private $id_deposito;
    private $id_persona;
    private $fecha_revision;
    private $estado;
    
    function getId_deposito_historial() {
        return $this->id_deposito_historial;
    }

    function getId_deposito() {
        return $this->id_deposito;
    }

    function getId_persona() {
        return $this->id_persona;
    }

    function getFecha_revision() {
        return $this->fecha_revision;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId_deposito_historial($id_deposito_historial) {
        $this->id_deposito_historial = $id_deposito_historial;
    }

    function setId_deposito($id_deposito) {
        $this->id_deposito = $id_deposito;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

    function setFecha_revision($fecha_revision) {
        $this->fecha_revision = $fecha_revision;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}

?>
