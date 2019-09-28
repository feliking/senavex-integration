<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Cafe Tipo Embajale|cf_te|2 **/
class CafeTipoEmbalaje extends Db {
        
    const TABLE = 'cafe_tipo_embalaje';

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
    /** PK|INT|id Tipo de Embalaje|0|F|F|-|-|10|F **/
    private $id_cafe_tipo_embalaje;
    
    /** CP|TXT|Tipo_de_Embalaje|0|F|T|-|-|20|F **/
    private $descripcion;
    
    function getId_cafe_tipo_embalaje() {
        return $this->id_cafe_tipo_embalaje;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_cafe_tipo_embalaje($id_cafe_tipo_embalaje) {
        $this->id_cafe_tipo_embalaje = $id_cafe_tipo_embalaje;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}

?>
