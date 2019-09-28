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
class FacturaSenavexEmpresaImport extends Db {
    
    const TABLE = 'factura_senavex_empresa_import';

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
    private $id_factura_senavex_empresa_import;
    /** CP|TXT|Nombre de la Empresa para Facturar|0|F|T|-|-|20|F **/
    private $nombre;
    /** CP|NUMERIC|NIT|0|F|F|-|F|20|F **/
    private $nit;
    private $id_departamento;
    private $id_categoria_empresa;
    
    
    function getId_factura_senavex_empresa_import() {
        return $this->id_factura_senavex_empresa_import;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getNit() {
        return $this->nit;
    }

    function setId_factura_senavex_empresa_import($id_factura_senavex_empresa_import) {
        $this->id_factura_senavex_empresa_import = $id_factura_senavex_empresa_import;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setNit($nit) {
        $this->nit = $nit;
    }

    function getId_departamento(){
        return $this->id_departamento;
    }

    function setId_departamento($id_departamento){
        $this->id_departamento = $id_departamento;
    }

    function getId_categoria_empresa(){
        return $this->id_categoria_empresa;
    }

    function setId_categoria_empresa($id_categoria_empresa){
        $this->id_categoria_empresa = $id_categoria_empresa;
    }
 
}
?>
