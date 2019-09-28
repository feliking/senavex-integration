<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Cafe Pais|cf_ps|F **/
class PlanillaDDJJAcuerdo extends Db {
        
    const TABLE = 'planilla_ddjj_acuerdo';

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

    private $id_planilla_ddjj_acuerdo;
    private $id_planilla_ddjj;
    private $id_arancel;
    private $id_detalle_arancel;
    private $id_acuerdo;
    private $id_criterio;
    private $complemento;
    private $observacion;
    
    function getId_planilla_ddjj_acuerdo() {
        return $this->id_planilla_ddjj_acuerdo;
    }

    function getId_planilla_ddjj() {
        return $this->id_planilla_ddjj;
    }

    function getId_arancel() {
        return $this->id_arancel;
    }

    function getId_detalle_arancel() {
        return $this->id_detalle_arancel;
    }

    function getId_acuerdo() {
        return $this->id_acuerdo;
    }

    function getId_criterio() {
        return $this->id_criterio;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function setId_planilla_ddjj_acuerdo($id_planilla_ddjj_acuerdo) {
        $this->id_planilla_ddjj_acuerdo = $id_planilla_ddjj_acuerdo;
    }

    function setId_planilla_ddjj($id_planilla_ddjj) {
        $this->id_planilla_ddjj = $id_planilla_ddjj;
    }

    function setId_arancel($id_arancel) {
        $this->id_arancel = $id_arancel;
    }

    function setId_detalle_arancel($id_detalle_arancel) {
        $this->id_detalle_arancel = $id_detalle_arancel;
    }

    function setId_acuerdo($id_acuerdo) {
        $this->id_acuerdo = $id_acuerdo;
    }

    function setId_criterio($id_criterio) {
        $this->id_criterio = $id_criterio;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

}

?>
