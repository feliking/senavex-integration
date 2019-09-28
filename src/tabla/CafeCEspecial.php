<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/** CS|Caracteristica Especial del Cafe|cf_ce|2 **/
class CafeCEspecial extends Db {
        
    const TABLE = 'cafe_cespecial';

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
    
    /** PK|INT|Id Cafe Caracteristica Especial|0|F|F|-|F|10|F **/
    private $id_cafe_cespecial;
    
    /** CP|TXT|Descripcion|0|F|T|-|F|40|T **/
    private $descripcion;
    
    function getId_cafe_cespecial() {
        return $this->id_cafe_cespecial;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_cafe_cespecial($id_cafe_cespecial) {
        $this->id_cafe_cespecial = $id_cafe_cespecial;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}

?>
