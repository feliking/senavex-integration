<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/** CS|Pais|ps|3 **/
class Pais extends Db {
        
    const TABLE = 'pais';

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
    
    /** PK|INT|Pais|0|F|F|-|-|6|F **/
    private $id_pais;
    
    /** CP|TXT|Pais_Nombre|0|F|T|-|-|6|F **/
    private $nombre;
    
    /** CP|TXT|Cogido Pais|0|F|F|-|-|6|F **/
    private $codigo_pais;
    
    public function setId_pais($id_pais) {
        $this->id_pais = $id_pais;
    }
    public function getId_pais() {
        return $this->id_pais;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setCodigo_Pais($codigo_pais) {
        $this->codigo_pais = $codigo_pais;
    }
    public function getCodigo_Pais() {
        return $this->codigo_pais;
    }
    
}

?>
