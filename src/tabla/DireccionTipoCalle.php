<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Acuerdo|acu|F **/
class DireccionTipoCalle extends Db {
    
    const TABLE = 'direccion_tipo_calle';
    

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
    
    /** PK|INT|Id Acuerdo|0|F|F|-|-|6|F **/
    private $id_direccion_tipo_calle;
    private $descripcion;
    
    function getId_direccion_tipo_calle() {
        return $this->id_direccion_tipo_calle;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_direccion_tipo_calle($id_direccion_tipo_calle) {
        $this->id_direccion_tipo_calle = $id_direccion_tipo_calle;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }



    
}

?>
