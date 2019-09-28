<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Estado DDJJ|e_ddjj|F **/
class EstadoDdjj extends Db {
        
    const TABLE = 'estado_ddjj';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    /** 
    *  1 llave primaria, foranea o campo (PK,FK,CP) | 
    *  2 tipo de campo(DATE,INT,FLOAT,TXT,BOOL,NUMERIC) |
    *  3 Nombre para mostrar |
    *  4 grupos que pueden ver el atributo(0,1,2,3,5..) |
    *  5 se muestra el atributo en la vista (TRUE=T,FALSE=F)|
    *  6 el atributo almacena una descripcion (TRUE,FALSE) |
    *  7 texto required ( '-' si no tiene texto para mostrar)
    *  8 los valores de esta variable dependen de otra
    *  9 size 
    *  10 visible en el reporte (TRUE, FALSE)
    * **/
    
    /** PK|INT|Id Estado DDJJ|0|F|F|-|-|10|F **/
    private $id_estado_ddjj;
    /** CP|TXT|Estado_DDJJ|0|F|T|-|-|20|T **/
    private $descripcion;
    
    public function setId_estado_ddjj($id_estado_ddjj) {
        $this->id_estado_ddjj = $id_estado_ddjj;
    }
    public function getId_estado_ddjj() {
        return $this->id_estado_ddjj;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
}

?>
