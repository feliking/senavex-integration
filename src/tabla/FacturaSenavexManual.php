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
class FacturaSenavexManual extends Db {
    
    const TABLE = 'factura_senavex_manual';

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
    
    private $id_factura_senavex_manual;
    private $id_empresa;
    private $id_persona;
    private $total;
    private $codigo_control;
    private $codigo_qr;
    private $fecha_emision;
    private $fecha_limite;
    private $numero_factura;
    private $id_asistente;
    private $id_regional;
    private $estado;
    private $descripcion;
    private $numero_recibo;
    private $numero_autorizacion;
    private $vortex;
    private $id_tipo;
    
    function getId_factura_senavex_manual() {
        return $this->id_factura_senavex_manual;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function getId_persona() {
        return $this->id_persona;
    }

    function getTotal() {
        return $this->total;
    }

    function getCodigo_control() {
        return $this->codigo_control;
    }

    function getCodigo_qr() {
        return $this->codigo_qr;
    }

    function getFecha_emision() {
        return $this->fecha_emision;
    }

    function getFecha_limite() {
        return $this->fecha_limite;
    }

    function getNumero_factura() {
        return $this->numero_factura;
    }

    function getId_asistente() {
        return $this->id_asistente;
    }

    function getId_regional() {
        return $this->id_regional;
    }

    function getEstado() {
        return $this->estado;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getNumero_recibo() {
        return $this->numero_recibo;
    }

    function setId_factura_senavex_manual($id_factura_senavex_manual) {
        $this->id_factura_senavex_manual = $id_factura_senavex_manual;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setCodigo_control($codigo_control) {
        $this->codigo_control = $codigo_control;
    }

    function setCodigo_qr($codigo_qr) {
        $this->codigo_qr = $codigo_qr;
    }

    function setFecha_emision($fecha_emision) {
        $this->fecha_emision = $fecha_emision;
    }

    function setFecha_limite($fecha_limite) {
        $this->fecha_limite = $fecha_limite;
    }

    function setNumero_factura($numero_factura) {
        $this->numero_factura = $numero_factura;
    }

    function setId_asistente($id_asistente) {
        $this->id_asistente = $id_asistente;
    }

    function setId_regional($id_regional) {
        $this->id_regional = $id_regional;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setNumero_recibo($numero_recibo) {
        $this->numero_recibo = $numero_recibo;
    }

    function getNumero_autorizacion() {
        return $this->numero_autorizacion;
    }

    function setNumero_autorizacion($numero_autorizacion) {
        $this->numero_autorizacion = $numero_autorizacion;
    }

    function getVortex() {
        return $this->vortex;
    }

    function setVortex($vortex) {
        $this->vortex = $vortex;
    }

    function getId_tipo(){
        return $this->id_tipo;
    }

    function setId_tipo($id_tipo){
        $this->id_tipo = $id_tipo;
    }

}
?>
