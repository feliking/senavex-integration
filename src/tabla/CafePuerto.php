<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Cafe_Puerto|cf_p|F **/
class CafePuerto extends Db {
        
    const TABLE = 'cafe_puerto';
    
    public $cafe_pais = array();
    public static $RELATIONS = array
    (
        'cafe_pais' => array(self:: BELONGS_TO, 'CafePais', 'id_cafe_pais'),
    );
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    /** 1 llave primaria, foranea o campo (PK,FK,CP) | 
     *  2 tipo de campo(DATE,INT,FLOAT,TXT,BOOL) |
     *  3 Nombre para mostrar |
     *  4 grupos que pueden ver el atributo(0,1,2,3,5..) |
     *  5 se muestra el atributo en la vista (TRUE=T,FALSE=F)|
     *  6 el atributo almacena una descripcion (TRUE,FALSE) |
     *  7 texto required ( '-' si no tiene texto para mostrar)
     *  8 los valores de esta variable dependen de otra
     *  9 size 
     *  10 visible en el reporte (TRUE, FALSE)
     * **/
    
    /** PK|INT|Id Cafe Puerto|0|F|F|-|-|10|F **/
    private $id_cafe_puerto;
    /** CP|TXT|Nombre_Puerto|0|F|T|-|-|10|F **/
    private $descripcion;
    /** CP|INT|Codigo del Puerto|0|F|F|-|-|10|F **/
    private $codigo_puerto;
    /** CP|INT|Clave OIC|0|F|F|-|-|10|F **/
    private $clave_oic;

    function getCafe_pais() {
        return $this->cafe_pais;
    }

    static function getRELATIONS() {
        return self::$RELATIONS;
    }

    function getId_cafe_puerto() {
        return $this->id_cafe_puerto;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCodigo_puerto() {
        return $this->codigo_puerto;
    }

    function getClave_oic() {
        return $this->clave_oic;
    }

    function setCafe_pais($cafe_pais) {
        $this->cafe_pais = $cafe_pais;
    }

    static function setRELATIONS($RELATIONS) {
        self::$RELATIONS = $RELATIONS;
    }

    function setId_cafe_puerto($id_cafe_puerto) {
        $this->id_cafe_puerto = $id_cafe_puerto;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setCodigo_puerto($codigo_puerto) {
        $this->codigo_puerto = $codigo_puerto;
    }

    function setClave_oic($clave_oic) {
        $this->clave_oic = $clave_oic;
    }


}

?>
