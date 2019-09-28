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
class FacturaSenavexManualDetalle extends Db {
    
    const TABLE = 'factura_senavex_manual_detalle';
    
    public static $RELATIONS = array
    (
        'factura_senavex_manual' => array(self:: BELONGS_TO, 'FacturaSenavexManual', 'id_factura_senavex_manual'),
        '$servicio' => array(self:: BELONGS_TO, 'Servicio', 'id_servicio')
    );
    
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
    
    private $id_factura_senavex_manual_detalle;
    private $id_factura_senavex_manual;
    private $id_servicio;
    private $cantidad;
    private $precio;
    private $vortex;
    
    function getId_factura_senavex_manual_detalle() {
        return $this->id_factura_senavex_manual_detalle;
    }

    function getId_factura_senavex_manual() {
        return $this->id_factura_senavex_manual;
    }

    function getId_servicio() {
        return $this->id_servicio;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setId_factura_senavex_manual_detalle($id_factura_senavex_manual_detalle) {
        $this->id_factura_senavex_manual_detalle = $id_factura_senavex_manual_detalle;
    }

    function setId_factura_senavex_manual($id_factura_senavex_manual) {
        $this->id_factura_senavex_manual = $id_factura_senavex_manual;
    }

    function setId_servicio($id_servicio) {
        $this->id_servicio = $id_servicio;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }
    
    function getVortex() {
        return $this->vortex;
    }

    function setVortex($vortex) {
        $this->vortex = $vortex;
    }



}
?>
