<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Cafe Pais|cf_ps|F **/
class PlanillaCorrelativo extends Db {
        
    const TABLE = 'planilla_correlativo';

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
    
    private $id_planilla_correlativo;
    private $correlativo;
    private $tipo;
    private $estado;
    private $id_regional;
    private $fecha_registro;

    function getId_planilla_correlativo() {
        return $this->id_planilla_correlativo;
    }

    function getCorrelativo() {
        return $this->correlativo;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getEstado() {
        return $this->estado;
    }

    function getId_regional() {
        return $this->id_regional;
    }

    function getFecha_registro() {
        return $this->fecha_registro;
    }

    function setId_planilla_correlativo($id_planilla_correlativo) {
        $this->id_planilla_correlativo = $id_planilla_correlativo;
    }

    function setCorrelativo($correlativo) {
        $this->correlativo = $correlativo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setId_regional($id_regional) {
        $this->id_regional = $id_regional;
    }

    function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

}

?>
