<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Cafe Pais|cf_ps|F **/
class CafePais extends Db {
        
    const TABLE = 'cafe_pais';

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
    
    /** PK|INT|Id Cafe Certificado|0|F|F|-|F|- **/
    private $id_cafe_pais;
    
    /** CP|TXT|Pais|0|F|T|-|-|20|F **/
    private $nombre;
    
    /** CP|INT|Clave OIC|0|F|F|-|-|10|F **/
    private $clave_oic;
    
    /** CP|INT|Clave UE|0|F|F|-|-|10|F **/
    private $clave_ue;
    
    /** CP|INT|Clave ISO|0|F|F|-|-|10|F **/
    private $clave_iso;
    
    /** CP|TXT|Anexo|0|F|F|-|-|10|F **/
    private $anexo;
    
    function getId_cafe_pais() {
        return $this->id_cafe_pais;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getClave_oic() {
        return $this->clave_oic;
    }

    function getClave_ue() {
        return $this->clave_ue;
    }

    function getClave_iso() {
        return $this->clave_iso;
    }

    function getAnexo() {
        return $this->anexo;
    }

    function setId_cafe_pais($id_cafe_pais) {
        $this->id_cafe_pais = $id_cafe_pais;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setClave_oic($clave_oic) {
        $this->clave_oic = $clave_oic;
    }

    function setClave_ue($clave_ue) {
        $this->clave_ue = $clave_ue;
    }

    function setClave_iso($clave_iso) {
        $this->clave_iso = $clave_iso;
    }

    function setAnexo($anexo) {
        $this->anexo = $anexo;
    }


}

?>
