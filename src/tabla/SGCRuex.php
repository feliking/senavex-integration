<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/** CS|SGC RUEX|ps|3 **/
class SGCRuex extends Db {
        
    const TABLE = 'sgc_ruex';

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
    
    private $id_sgc_ruex;
    private $fecha_inicio_revision;
    private $fecha_fin_revision;
    private $id_estado;
    private $observaciones;
    private $id_empresa;
    private $id_asistente;
    private $id_regional;
    private $revisado;
    
    function getId_sgc_ruex() {
        return $this->id_sgc_ruex;
    }

    function getFecha_inicio_revision() {
        return $this->fecha_inicio_revision;
    }

    function getFecha_fin_revision() {
        return $this->fecha_fin_revision;
    }

    function getId_estado() {
        return $this->id_estado;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function setId_sgc_ruex($id_sgc_ruex) {
        $this->id_sgc_ruex = $id_sgc_ruex;
    }

    function setFecha_inicio_revision($fecha_inicio_revision) {
        $this->fecha_inicio_revision = $fecha_inicio_revision;
    }

    function setFecha_fin_revision($fecha_fin_revision) {
        $this->fecha_fin_revision = $fecha_fin_revision;
    }

    function setId_estado($id_estado) {
        $this->id_estado = $id_estado;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    function getId_asistente() {
        return $this->id_asistente;
    }

    function setId_asistente($id_asistente) {
        $this->id_asistente = $id_asistente;
    }
    
    function getId_regional() {
        return $this->id_regional;
    }

    function setId_regional($id_regional) {
        $this->id_regional = $id_regional;
    }
    function getRevisado() {
        return $this->revisado;
    }

    function setRevisado($revisado) {
        $this->revisado = $revisado;
    }




}
?>
