<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class VerAdmision extends Db {

    const TABLE = 'ver_admision';


    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_ver_admision;
    private $max;
    private $min;
    private $valor;
    private $nivel;
    private $verificacion;
    private $verificacion_estricta;
    private $estado;

    function getId_ver_admision(){
        return $this->id_ver_admision;
    }
    function setId_ver_admision($id_ver_admision){
        $this->id_ver_admision=$id_ver_admision;
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
    function getNivel(){
        return $this->nivel;
    }
    function setNivel($nivel){
        $this->nivel=$nivel;
    }
    function getVerificacion(){
        return $this->verificacion;
    }
    function setVerificacion($verificacion){
        $this->verificacion=$verificacion;
    }
    function getVerificacion_estricta(){
        return $this->verificacion_estricta;
    }
    function setVerificacion_estricta($verificacion_estricta){
        $this->verificacion_estricta=$verificacion_estricta;
    }
    function getEstado(){
        return $this->estado;
    }
    function setEstado($estado){
        $this->estado=$estado;
    }
}

?>
