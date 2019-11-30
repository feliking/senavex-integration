<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class VerRango extends Db {
    
    const TABLE = 'ver_rango';


    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_ver_rango;
    private $id_ver_variable;
    private $max;
    private $min;
    private $valor;
    private $estado;
    
    function getId_ver_rango(){
        return $this->id_ver_rango;
    }
    function setId_ver_rango($id_ver_rango){
        $this->id_ver_rango=$id_ver_rango;
    }
    function getId_ver_variable(){
        return $this->id_ver_variable;
    }
    function setId_ver_variable($id_ver_variable){
        $this->id_ver_variable=$id_ver_variable;
    }
    function getMax(){
        return $this->max;
    }
    function setMax($max){
        $this->max=$max;
    }
    function getMin(){
        return $this->min;
    }
    function setMin($min){
        $this->min=$min;
    }
    function getValor(){
        return $this->valor;
    }
    function setValor($valor){
        $this->valor=$valor;
    }
    function getEstado(){
        return $this->estado;
    }
    function setEstado($estado){
        $this->estado=$estado;
    }
}

?>
