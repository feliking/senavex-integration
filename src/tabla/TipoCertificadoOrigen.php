<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/** CS|Tipo de certificado de Origen|t_co|5 **/
class TipoCertificadoOrigen extends Db {
        
    const TABLE = 'tipo_co';

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
    
    /** PK|INT|id Tipo C.O.|0|F|F|-|-|0|F **/
    private $id_tipo_co;
    /** CP|TXT|T_C_Descripcion|0|F|F|-|-|30|F **/
    private $descripcion;
    /** CP|TXT|Abreviatura|0|F|T|-|-|10|F **/
    public $abreviatura;
    /** CP|DATE|Vigencia|0|F|F|-|-|17|F **/
    private $vigencia;
    /** CP|TXT|Estado|0|F|F|-|-|15|F **/
    private $estado;
    
    public function setId_tipo_co($id_tipo_co) {
        $this->id_tipo_co = $id_tipo_co;
    }
    public function getId_tipo_co() {
        return $this->id_tipo_co;
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
    
    public function setVigencia($vigencia) {
        $this->vigencia = $vigencia;
    }
    public function getVigencia() {
        return $this->vigencia;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }
    
}

?>
