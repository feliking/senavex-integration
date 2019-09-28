<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Cafe Unidad Medida|cf_u_m|F **/
class CafeUnidadMedida extends Db {
        
    const TABLE = 'cafe_unidad_medida';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
   
    /** 1 llave primaria, foranea o campo (PK,FK,CP) | 
     *  2 tipo de campo(DATE,INT,FLOAT,TXT,BOOL) |
     *  3 Nombre para mostrar |
     *  4 grupos que pueden ver el atributo(0,1,2,3,5..) |
     *  5 se muestra el atributo en la vista (TRUE=T,FALSE=F)|
     *  6 el atributo almacena una descripcion (TRUE,FALSE) |
     *  7 texto para mostrar en el textbox ( '-' si no tiene texto para mostrar) o aviso required
     *  8 es un campo Required (TRUE,FALSE)
     *  9 los valores de esta variable dependen de otra
     * **/
    
    /** PK|INT|Id Cafe Unidad de Medida|0|F|F|-|-|10|F **/
    private $id_cafe_unidad_medida;
    /** CP|TXT|Unidad_de_Medida|0|F|T|-|-|10|F **/
    private $descripcion;
    /** CP|TXT|Sigla|0|F|F|-|-|10|F **/
    private $sigla;
    
    function getId_cafe_unidad_medida() {
        return $this->id_cafe_unidad_medida;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_cafe_unidad_medida($id_cafe_unidad_medida) {
        $this->id_cafe_unidad_medida = $id_cafe_unidad_medida;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function getSigla() {
        return $this->sigla;
    }

    function setSigla($sigla) {
        $this->sigla = $sigla;
    }




}

?>
