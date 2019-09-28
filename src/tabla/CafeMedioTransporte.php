<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Cafe Medio Transporte|cf_m_t|F **/
class CafeMedioTransporte extends Db {
        
    const TABLE = 'cafe_medio_transporte';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    /** 1 llave primaria, foranea o campo (PK,FK,CP) | 
     *  2 tipo de campo(DATE,INT,FLOAT,TXT,BOOL) |
     *  3 Nombre para mostrar |
     *  4 grupos que pueden ver el atributo(0,1,2,3,5..) |
     *  5 se muestra el atributo en la vista (TRUE=T,FALSE=F)|
     *  6 el atributo almacena una descripcion (TRUE,FALSE) |
     *  7 texto para mostrar en el textbox ( '-' si no tiene texto para mostrar)
     *  8 es un campo Required (TRUE,FALSE)
     *  9 texto para el aviso required 
     * **/
    
    /** PK|INT|Id Cafe medio transporte|0|F|F|-|-|10|F **/
    private $id_cafe_medio_transporte;
    /** CP|TXT|CC_Medio_Transporte|0|F|T|-|-|10|F **/
    private $descripcion;
    /** CP|TXT|codigo|0|F|F|-|-|10|F **/
    private $codigo;

    function getId_cafe_medio_transporte() {
        return $this->id_cafe_medio_transporte;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setId_cafe_medio_transporte($id_cafe_medio_transporte) {
        $this->id_cafe_medio_transporte = $id_cafe_medio_transporte;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }



}

?>
