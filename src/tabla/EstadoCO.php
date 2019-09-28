<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Estado de Certificados de Origen|e_co|F **/
class EstadoCO extends Db {
        
    const TABLE = 'estado_co';

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
    
    /** PK|INT|Estado C.O.|0|F|F|-|-||F **/
    private $id_estado_co;
    /** CP|TXT|Estado_CO_Descripcion|0|F|T|-|-|30|F **/
    private $descripcion;
    
    public function setId_estado_co($id_estado_co) {
        $this->id_estado_co = $id_estado_co;
    }
    public function getId_estado_co() {
        return $this->id_estado_co;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
}

?>
