<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Regional|reg|4 **/
class Regional extends Db {

    const TABLE = 'regional';

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
    
    /** PK|INT|id Regional|0|F|F|-|-|10|F **/
    private $id_regional;
    private $ciudad;
    private $direccion;
    private $activo;
    private $sucursal;
    private $id_departamento;
    private $zona;
    private $certificados;

    function getId_regional() {
        return $this->id_regional;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getActivo() {
        return $this->activo;
    }

    function getSucursal() {
        return $this->sucursal;
    }

    function getId_departamento() {
        return $this->id_departamento;
    }

    function getZona() {
        return $this->zona;
    }

    function getCertificados() {
        return $this->certificados;
    }

    function setId_regional($id_regional) {
        $this->id_regional = $id_regional;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function setSucursal($sucursal) {
        $this->sucursal = $sucursal;
    }

    function setId_departamento($id_departamento) {
        $this->id_departamento = $id_departamento;
    }

    function setZona($zona) {
        $this->zona = $zona;
    }

    function setCertificados($certificados) {
        $this->certificados = $certificados;
    }



}

?>
