<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class VerJustificacion extends Db {

    const TABLE = 'ver_justificacion';


    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_ver_justificacion;
    private $justificacion;
    private $id_ver_verificacion;
    private $id_ddjj;
    private $fecha_justificacion;
    private $id_persona;

    function getId_ver_justificacion(){
        return $this->id_ver_justificacion;
    }
    function setId_ver_justificacion($id_ver_justificacion){
        $this->id_ver_justificacion=$id_ver_justificacion;
    }       
    function getJustificacion(){
        return $this->justificacion;
    }
    function setJustificacion($justificacion){
        $this->justificacion=$justificacion;
    }
    function getId_ver_verificacion(){
        return $this->id_ver_verificacion;
    }
    function setId_ver_verificacion($id_ver_verificacion){
        $this->id_ver_verificacion=$id_ver_verificacion;
    }
    function getId_ddjj(){
        return $this->id_ddjj;
    }
    function setId_ddjj($id_ddjj){
        $this->id_ddjj=$id_ddjj;
    }
    function getFecha_justificacion(){
        return $this->fecha_justificacion;
    }
    function setFecha_justificacion($fecha_justificacion){
        $this->fecha_justificacion=$fecha_justificacion;
    }
    function getId_persona(){
        return $this->id_persona;
    }
    function setId_persona($id_persona){
        $this->id_persona=$id_persona;
    }
}
?>
