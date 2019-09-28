<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/** CS|Tipo de Documento de Identidad|2 **/
class TipoDocumentoIdentidad extends Db {
        
    const TABLE = 'tipo_documentoidentidad';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    /** 1 llave primaria, foranea o campo (PK,FK,CP) | 
     *  2 tipo de campo(DATE,INT,FLOAT,TXT,BOOL) |
     *  3 Nombre para mostrar |
     *  4 grupos que pueden ver el atributo(0,1,2,3,5..) |
     *  5 se muestra el atributo en la vista (TRUE=T,FALSE=F)|
     *  6 el atributo almacena una descripcion (TRUE,FALSE) |
     *  7 nombre de la tabla,si es FK el atributo
     *  8 es un campo Required (TRUE,FALSE)
     *  9 texto para el aviso required 
     * **/
    
    /** PK|INT|ID Tipo de Documento de Identidad|0|F|F|-|F|- **/
    private $id_tipo_documentoidentidad;
    /** CP|TXT|Descripcion|0|F|T|-|F|- **/
    private $descripcion;
    /** CP|TXT|Documento Habilitado|0|F|T|-|F|- **/
    private $habilitado;
    
    public function setId_tipo_documentoidentidad($id_tipo_documentoidentidad) {
        $this->id_tipo_documentoidentidad = $id_tipo_documentoidentidad;
    }
    public function getId_tipo_documentoidentidad() {
        return $this->id_tipo_documentoidentidad;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    function getHabilitado() {
        return $this->habilitado;
    }

    function setHabilitado($habilitado) {
        $this->habilitado = $habilitado;
    }


}

?>
