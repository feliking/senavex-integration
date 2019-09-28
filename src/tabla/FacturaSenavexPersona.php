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
class FacturaSenavexPersona extends Db {
    
    const TABLE = 'factura_senavex_persona';
    
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
    
    /** PK|INT|Id Empresa|0|F|F|-|-|0|F **/
    private $id_factura_senavex_persona;
    /** CP|INT|Nro de Documento de Identidad|0|F|F|-|-|0|F **/
    private $ci;
    /** CP|INT|Nombres|0|F|F|-|-|0|F **/
    private $nombres;
    /** CP|INT|Apellido Paterno|0|F|F|-|-|0|F **/
    private $apellido_paterno;
    /** CP|INT|Apellido Materno|0|F|F|-|-|0|F **/
    private $apellido_materno;
    /** FK|INT|factura senavex empresa|0|F|F|-|-|0|F **/
    private $id_factura_senavex_empresa;
    
    function getId_factura_senavex_persona() {
        return $this->id_factura_senavex_persona;
    }

    function getCi() {
        return $this->ci;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellido_paterno() {
        return $this->apellido_paterno;
    }

    function getApellido_materno() {
        return $this->apellido_materno;
    }

    function getId_factura_senavex_empresa() {
        return $this->id_factura_senavex_empresa;
    }

    function setId_factura_senavex_persona($id_factura_senavex_persona) {
        $this->id_factura_senavex_persona = $id_factura_senavex_persona;
    }

    function setCi($ci) {
        $this->ci = $ci;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellido_paterno($apellido_paterno) {
        $this->apellido_paterno = $apellido_paterno;
    }

    function setApellido_materno($apellido_materno) {
        $this->apellido_materno = $apellido_materno;
    }

    function setId_factura_senavex_empresa($id_factura_senavex_empresa) {
        $this->id_factura_senavex_empresa = $id_factura_senavex_empresa;
    }



}
?>
