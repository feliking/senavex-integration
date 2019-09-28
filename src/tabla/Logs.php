<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Logs extends Db {
        
    const TABLE = 'logs';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_logs;
    private $id_servicio;
    private $date;
    private $descripcion;
    private $mensaje;
    private $objeto;
    
    function getId_logs() {
        return $this->id_logs;
    }

    function getId_servicio() {
        return $this->id_servicio;
    }

    function getDate() {
        return $this->date;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function getObjeto() {
        return $this->objeto;
    }

    function setId_logs($id_logs) {
        $this->id_logs = $id_logs;
    }

    function setId_servicio($id_servicio) {
        $this->id_servicio = $id_servicio;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    function setObjeto($objeto) {
        $this->objeto = $objeto;
    }
    
}

?>
