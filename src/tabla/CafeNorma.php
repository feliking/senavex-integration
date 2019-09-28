<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/** CS|Cafe_Norma|cf_n|F **/
class CafeNorma extends Db {
        
    const TABLE = 'cafe_norma';

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
    
    /** PK|INT|Id Cafe Norma|0|F|F|-|-|10|F **/
    private $id_cafe_norma;
    
    /** CP|TXT|Cafe_Norma|0|F|T|-|-|10|F **/
    private $descripcion;
    
    /** CP|TXT|Sigla|0|F|F|-|-|10|F **/
    private $sigla;
    
    
    function getId_cafe_norma() {
        return $this->id_cafe_norma;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getSigla() {
        return $this->sigla;
    }

    function setId_cafe_norma($id_cafe_norma) {
        $this->id_cafe_norma = $id_cafe_norma;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setSigla($sigla) {
        $this->sigla = $sigla;
    }
}

?>
