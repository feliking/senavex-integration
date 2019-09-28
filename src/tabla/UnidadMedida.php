<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Unidad de Medida|uni_m|F **/
class UnidadMedida extends Db {
        
    const TABLE = 'unidad_medida';

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
    
    /** PK|INT|Id Unidad de Medida|0|F|F|-|-|10|F **/
    private $id_unidad_medida;
    /** CP|TXT|Unidad_Medida|0|F|F|-|-|10|F **/
    private $descripcion;
    /** CP|TXT|Abreviatura|0|F|T|-|-|17|F **/
    private $abreviatura;
    
    public function setId_Unidad_Medida($id_unidad_medida) {
        $this->id_unidad_medida = $id_unidad_medida;
    }
    public function getId_Unidad_Medida() {
        return $this->id_unidad_medida;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
    public function setAbreviatura($abreviatura) {
        $this->abreviatura = $abreviatura;
    }
    public function getAbreviatura() {
        return $this->abreviatura;
    }
    
}

?>
