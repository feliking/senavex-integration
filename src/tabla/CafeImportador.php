<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/** CS|Cafe Importador|cf_imp|F **/
class CafeImportador extends Db {
        
    const TABLE = 'cafe_importador';

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
    
    /** PK|INT|Id Cafe Importador|0|F|F|-|F|- **/
    private $id_cafe_importador;
    
    /** CP|TXT|Nombre|0|F|T|-|F|- **/
    private $nombre;
    
    /** CP|TXT|Direccion|0|F|F|-|F|- **/
    private $direccion;
    
    function getId_cafe_importador() {
        return $this->id_cafe_importador;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function setId_cafe_importador($id_cafe_importador) {
        $this->id_cafe_importador = $id_cafe_importador;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }




}

?>
