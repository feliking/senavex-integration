<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class VerVariable extends Db {
    
    const TABLE = 'ver_variable';


    public $valores_booleanos = array();
    public $valores_rangos = array();

    public static $RELATIONS = array
    (
        'valores_booleanos'=>array(self:: HAS_MANY, 'VerVariableValor','id_ver_variable'),
        'valores_rangos'=>array(self:: HAS_MANY, 'VerRango','id_ver_variable')
    );


    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_ver_variable;
    private $variable;
    private $descripcion;
    private $ayuda;
    private $id_ver_tipo_variable;
    private $tabla_modelo;
    private $modulo_dep;
    private $estado;
    
    function getId_ver_variable() {
        return $this->id_ver_variable;
    }
    function setId_ver_variable($id_ver_variable) {
        $this->id_ver_variable = $id_ver_variable;
    }

    function getVariable() {
        return $this->variable;
    }
    function setVariable($variable) {
        $this->variable = $variable;
    }


    function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function getAyuda(){
        return $this->ayuda;
    }
    function setAyuda($ayuda){
        $this->ayuda=$ayuda;
    }
    
    function getId_ver_tipo_variable(){
        return $this->id_ver_tipo_variable;
    }
    function setId_ver_tipo_variable($id_ver_tipo_variable){
        $this->id_ver_tipo_variable=$id_ver_tipo_variable;
    }
    
    function getTabla_modelo(){
        return $this->tabla_modelo;
    }
    function setTabla_modelo($tabla_modelo){
        $this->tabla_modelo=$tabla_modelo;
    }   
    
    function getModulo_dep(){
        return $this->modulo_dep;
    }
    function setModulo_dep($modulo_dep){
        $this->modulo_dep=$modulo_dep;
    }
    
    function getEstado(){
        return $this->estado;
    }
    function setEstado($estado){
        $this->estado=$estado;
    }
}
?>
