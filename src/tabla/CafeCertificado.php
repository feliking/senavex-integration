<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Cafe Certificado|cf_cert|F **/
class CafeCertificado extends Db {
        
    const TABLE = 'cafe_certificado';

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
    
    private $id_cafe_certificado;
    private $id_cafe_borrador;
    private $id_cafe_ico;
    
    function getId_cafe_certificado() {
        return $this->id_cafe_certificado;
    }

    function getId_cafe_borrador() {
        return $this->id_cafe_borrador;
    }

    function getId_cafe_ico() {
        return $this->id_cafe_ico;
    }

    function setId_cafe_certificado($id_cafe_certificado) {
        $this->id_cafe_certificado = $id_cafe_certificado;
    }

    function setId_cafe_borrador($id_cafe_borrador) {
        $this->id_cafe_borrador = $id_cafe_borrador;
    }

    function setId_cafe_ico($id_cafe_ico) {
        $this->id_cafe_ico = $id_cafe_ico;
    }


}

?>
