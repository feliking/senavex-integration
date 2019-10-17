<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class VerVariableValor extends Db {
    
    const TABLE = 'ver_variable_valor';


    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_ver_variable_valor;
    private $id_ver_variable;
    private $valor;
    private $descripcion;
    private $flag;
    
    function getId_ver_variable_valor(){
        return $this->id_ver_variable_valor;
    }
    function setId_ver_variable_valor($id_ver_variable_valor){
        $this->id_ver_variable_valor=$id_ver_variable_valor;
    }
    
    function getId_ver_variable() {
        return $this->id_ver_variable;
    }
    function setId_ver_variable($id_ver_variable) {
        $this->id_ver_variable = $id_ver_variable;
    }
    
    function getValor(){
        return $this->valor;
    }
    function setValor($valor){
        $this->valor=$valor;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    function getFlag(){
        return $this->flag;
    }
    function setFlag($flag){
        $this->flag=$flag;
    }

}
?>
