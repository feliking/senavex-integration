<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Descripcion del Cafe|cf_dscr|F **/
class CafeDescripcion extends Db {
        
    const TABLE = 'cafe_descripcion';

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
    
    /** PK|INT|Id Cafe Descripcion|0|F|F|-|-|10|F **/
    private $id_cafe_descripcion;
    
    /** CP|TXT|Descripcion_del_cafe|0|F|T|-|-|10|F **/
    private $descripcion;
  
    function getId_cafe_descripcion() {
        return $this->id_cafe_descripcion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_cafe_descripcion($id_cafe_descripcion) {
        $this->id_cafe_descripcion = $id_cafe_descripcion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }




}

?>
