<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Acuerdo|acu|F **/
class Acuerdo_pln extends Db {

    const TABLE = 'planilla_acuerdo';

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

    /** PK|INT|Id Acuerdo|0|F|F|-|-|6|F **/
    private $id_acuerdo;

    /** CP|TXT|A_Descripcion|0|F|F|-|-|20|T **/
    private $descripcion;

    /** CP|TXT|Sigla|0|F|T|-|-|10|T **/
    private $sigla;

    /** CP|TXT|Estado|0|F|F|-|-|15|T **/
    private $estado;

    /** FK|INT|Arancel|0|F|F|Seleccione Arancel|-|20|F **/
    private $id_arancel;

    /** CP|DATE|Vigencia DDJJ|0|F|F|-|-|17|F **/
    private $vigencia_ddjj;

    /** FK|INT|Tipo de Valor Internacional|0|F|F|-|-|0|F **/
    private $id_tipo_valor_internacional;

    /** FK|INT|Tipo de C.O.|0|F|F|-|-|0|F **/
    private $id_tipo_co;

    /** FK|INT|Tipo de C.O.|0|F|F|-|-|0|F **/
    private $id_tipo_ddjj;


    public function setId_Acuerdo($id_acuerdo) {
        $this->id_acuerdo = $id_acuerdo;
    }
    public function getId_Acuerdo() {
        return $this->id_acuerdo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setSigla($sigla) {
        $this->sigla = $sigla;
    }
    public function getSigla() {
        return $this->sigla;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setId_Arancel($id_arancel) {
        $this->id_arancel = $id_arancel;
    }
    public function getId_Arancel() {
        return $this->id_arancel;
    }

    public function setVigencia_ddjj($vigencia_ddjj) {
        $this->vigencia_ddjj = $vigencia_ddjj;
    }
    public function getVigencia_ddjj() {
        return $this->vigencia_ddjj;
    }

    public function setId_tipo_valor_internacional($id_tipo_valor_internacional) {
        $this->id_tipo_valor_internacional = $id_tipo_valor_internacional;
    }
    public function getId_tipo_valor_internacional() {
        return $this->id_tipo_valor_internacional;
    }

    public function setId_tipo_co($id_tipo_co) {
        $this->id_tipo_co = $id_tipo_co;
    }
    public function getId_tipo_co() {
        return $this->id_tipo_co;
    }

    public function getId_tipo_ddjj(){
        return $this->id_tipo_ddjj;
    }

    public function setId_tipo_ddjj($id_tipo_ddjj){
        $this->id_tipo_ddjj = $id_tipo_ddjj;
    }

}

?>
