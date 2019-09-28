<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Medio_de_transporte|ps|3 **/
class MedioTransporte extends Db {
        
    const TABLE = 'medio_transporte';

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
    
    /** PK|INT|id Medio trasnporte|0|F|F|-|-|10|F **/
    private $id_medio_transporte;
    
    /** PK|INT|Medio_de_transporte|0|F|T|-|-|10|F **/
    private $descripcion;
    
    public function setId_medio_transporte($id_medio_transporte) {
        $this->id_medio_transporte = $id_medio_transporte;
    }
    public function getId_medio_transporte() {
        return $this->id_medio_transporte;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
}

?>
