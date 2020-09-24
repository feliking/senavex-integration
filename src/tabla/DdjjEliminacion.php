<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class DdjjEliminacion extends Db {
        
    const TABLE = 'ddjj_eliminacion';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_ddjj_eliminacion;
    private $id_ddjj;
    private $id_persona;
    private $fecha_eliminacion;
    private $justificacion;
    private $motivo;
    
    function getId_ddjj_eliminacion(){
        return $this->id_ddjj_eliminacion;
    }
    function setId_ddjj_eliminacion($id_ddjj_eliminacion){
        $this->id_ddjj_eliminacion=$id_ddjj_eliminacion;
    }
    function getId_ddjj(){
        return $this->id_ddjj;
    }
    function setId_ddjj($id_ddjj){
        $this->id_ddjj=$id_ddjj;
    }
    function getId_persona(){
        return $this->id_persona;
    }
    function setId_persona($id_persona){
        $this->id_persona=$id_persona;
    }
    function getFecha_eliminacion(){
        return $this->fecha_eliminacion;
    }
    function setFecha_eliminacion($fecha_eliminacion){
        $this->fecha_eliminacion=$fecha_eliminacion;
    }
    function getJustificacion(){
        return $this->justificacion;
    }
    function setJustificacion($justificacion){
        $this->justificacion=$justificacion;
    }
    function getMotivo() {
        return $this->motivo;
    }

    function setMotivo($motivo) {
        $this->motivo = $motivo;
    }
}
?>
