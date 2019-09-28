<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Tipo Empresa|ti_emp|F **/
class TipoEmpresa extends Db {
        
    const TABLE = 'tipo_empresa';

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
    
    
     /** PK|INT|Id tipo empresa|0|F|F|-|-|10|F **/
    private $id_tipo_empresa;
     /** CP|TXT|Tipo de Empresa|0|F|F|-|-|20|F **/
    private $descripcion;
     /** CP|TXT|Tipo de Empresa|0|F|T|-|-|17|F **/
    private $abreviatura;
     /** CP|TXT|Requisitos|0|F|F|-|-|10|F **/
    private $grupo_requisitos;
    
    public function setId_tipo_empresa($id_tipo_empresa) {
        $this->id_tipo_empresa = $id_tipo_empresa;
    }
    public function getId_tipo_empresa() {
        return $this->id_tipo_empresa;
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
    public function setGrupo_requisitos($grupo_requisitos) {
        $this->grupo_requisitos = $grupo_requisitos;
    }
    public function getGrupo_requisitos() {
        return $this->grupo_requisitos;
    }
    
}

?>
