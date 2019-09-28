<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/** 
 *  1 tipo de clase
 *  2 nombre de Empresa
 *  3 Abreviacion del Nombre
 *  4 visible TRUE, False (T , F)
 */

/** CS|Empresa|emp|T **/
class FacturaSenavexManualCorrelativo extends Db {
    
    const TABLE = 'factura_senavex_manual_correlativo';
    
 
    
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
    
    private $id_factura_senavex_manual_correlativo;
    private $correlativo;
    private $descripcion;
    private $autorizacion;
    private $llave;
    private $fecha_inicio;
    private $fecha_fin;
    private $activo;
    
    function getId_factura_senavex_manual_correlativo() {
        return $this->id_factura_senavex_manual_correlativo;
    }

    function getCorrelativo() {
        return $this->correlativo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getAutorizacion() {
        return $this->autorizacion;
    }

    function getLlave() {
        return $this->llave;
    }

    function getFecha_inicio() {
        return $this->fecha_inicio;
    }

    function getFecha_fin() {
        return $this->fecha_fin;
    }

    function setId_factura_senavex_manual_correlativo($id_factura_senavex_manual_correlativo) {
        $this->id_factura_senavex_manual_correlativo = $id_factura_senavex_manual_correlativo;
    }

    function setCorrelativo($correlativo) {
        $this->correlativo = $correlativo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setAutorizacion($autorizacion) {
        $this->autorizacion = $autorizacion;
    }

    function setLlave($llave) {
        $this->llave = $llave;
    }

    function setFecha_inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    function setFecha_fin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }
    
    function getActivo() {
        return $this->activo;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }



}
?>
