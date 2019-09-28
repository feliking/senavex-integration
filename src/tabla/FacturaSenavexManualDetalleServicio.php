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
class FacturaSenavexManualDetalleServicio extends Db {
    
    const TABLE = 'factura_senavex_manual_detalle_servicio';

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

    private $id_factura_senavex_manual_detalle_servicio;
    private $id_factura_senavex_manual_detalle;
    private $fob;
    private $nro_ctrl_1;
    private $nro_ctrl_2;
    private $minutos;
    private $reposicion_razon;
    function getId_factura_senavex_manual_detalle_servicio() {
        return $this->id_factura_senavex_manual_detalle_servicio;
    }

    function getId_factura_senavex_manual_detalle() {
        return $this->id_factura_senavex_manual_detalle;
    }

    function getFob() {
        return $this->fob;
    }

    function getNro_ctrl_1() {
        return $this->nro_ctrl_1;
    }

    function getNro_ctrl_2() {
        return $this->nro_ctrl_2;
    }

    function getMinutos() {
        return $this->minutos;
    }

    function setId_factura_senavex_manual_detalle_servicio($id_factura_senavex_manual_detalle_servicio) {
        $this->id_factura_senavex_manual_detalle_servicio = $id_factura_senavex_manual_detalle_servicio;
    }

    function setId_factura_senavex_manual_detalle($id_factura_senavex_manual_detalle) {
        $this->id_factura_senavex_manual_detalle = $id_factura_senavex_manual_detalle;
    }

    function setFob($fob) {
        $this->fob = $fob;
    }

    function setNro_ctrl_1($nro_ctrl_1) {
        $this->nro_ctrl_1 = $nro_ctrl_1;
    }

    function setNro_ctrl_2($nro_ctrl_2) {
        $this->nro_ctrl_2 = $nro_ctrl_2;
    }

    function setMinutos($minutos) {
        $this->minutos = $minutos;
    }
    function getReposicion_razon() {
        return $this->reposicion_razon;
    }

    function setReposicion_razon($reposicion_razon) {
        $this->reposicion_razon = $reposicion_razon;
    }

        /*function __construct($id_factura_senavex_manual_detalle_servicio, $id_factura_senavex_manual_detalle, $fob, $nro_ctrl_1, $nro_ctrl_2, $minutos) {
        if($id_factura_senavex_manual_detalle_servicio!="" && $id_factura_senavex_manual_detalle_servicio!=null)
            $this->id_factura_senavex_manual_detalle_servicio = $id_factura_senavex_manual_detalle_servicio;
        if($id_factura_senavex_manual_detalle!="" && $id_factura_senavex_manual_detalle!=null)
            $this->id_factura_senavex_manual_detalle = $id_factura_senavex_manual_detalle;
        if($fob!='' && $fob!=null)
            $this->fob = $fob;
        if($nro_ctrl_1!='' && $nro_ctrl_1!=null)
            $this->nro_ctrl_1 = $nro_ctrl_1;
        if($nro_ctrl_2!='' && $nro_ctrl_2!=null)
            $this->nro_ctrl_2 = $nro_ctrl_2;
        if($minutos!='' && $minutos!=null)
            $this->minutos = $minutos;
    }*/


}
?>
