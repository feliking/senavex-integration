<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Cafe_Estado|cf_e|F **/
class CafeEstado extends Db {
        
    const TABLE = 'cafe_estado';

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
    
    /** PK|INT|Id Cafe Estado|0|F|F|-|-|10|F **/
    private $id_cafe_estado;
    
    /** CP|TXT|Café Estado|0|F|T|-|-|20|F **/
    private $descripcion;
    function getId_cafe_estado() {
        return $this->id_cafe_estado;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_cafe_estado($id_cafe_estado) {
        $this->id_cafe_estado = $id_cafe_estado;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}

?>
