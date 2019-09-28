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
class FacturaSenavexLoteCO extends Db {
    
    const TABLE = 'factura_senavex_lote_co';

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
    
    private $id_factura_senavex_lote_co;
    private $rango_inicial;
    private $rango_final;
    private $vendido;
    private $id_servicio;
    private $registro;

    function getId_factura_senavex_lote_co() {
        return $this->id_factura_senavex_lote_co;
    }

    function getRango_inicial() {
        return $this->rango_inicial;
    }

    function getRango_final() {
        return $this->rango_final;
    }

    function getVendido() {
        return $this->vendido;
    }

    function getId_servicio() {
        return $this->id_servicio;
    }

    function getRegistro() {
        return $this->registro;
    }

    function setId_factura_senavex_lote_co($id_factura_senavex_lote_co) {
        $this->id_factura_senavex_lote_co = $id_factura_senavex_lote_co;
    }

    function setRango_inicial($rango_inicial) {
        $this->rango_inicial = $rango_inicial;
    }

    function setRango_final($rango_fiinal) {
        $this->rango_final = $rango_fiinal;
    }

    function setVendido($vendido) {
        $this->vendido = $vendido;
    }

    function setId_servicio($id_servicio) {
        $this->id_servicio = $id_servicio;
    }

    function setRegistro($registro) {
        $this->registro = $registro;
    }



}
?>
