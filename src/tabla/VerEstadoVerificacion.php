<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class VerEstadoVerificacion extends Db {

    const TABLE = 'ver_estado_verificacion';


    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_ver_estado_verificacion;
    private $denominacion;
    
    function getId_ver_estado_verificacion(){
        return $this->id_ver_estado_verificacion;
    }
    function setId_ver_estado_verificacion($id_ver_estado_verificacion){
        $this->id_ver_estado_verificacion=$id_ver_estado_verificacion;
    }   
    function getDenominacion(){
        return $this->denominacion;
    }
    function setDenominacion($denominacion){
        $this->denominacion=$denominacion;
    }
}

?>
