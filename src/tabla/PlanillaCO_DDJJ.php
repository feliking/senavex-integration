<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Cafe Pais|cf_ps|F **/
class PlanillaCO_DDJJ extends Db {
        
    const TABLE = 'planilla_co_ddjj';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
 
    private $id_planilla_co_ddjj;
    private $id_planilla_co;
    private $id_planilla_ddjj;
    private $vortex;
    private $id_criterio;
    private $fob;
    private $factura;
    private $pneto;
    private $unidad;
    private $descripcion_comercial;
    private $observacion;
    
    function getId_planilla_co_ddjj() {
        return $this->id_planilla_co_ddjj;
    }

    function getId_planilla_co() {
        return $this->id_planilla_co;
    }

    function getId_planilla_ddjj() {
        return $this->id_planilla_ddjj;
    }

    function getVortex() {
        return $this->vortex;
    }

    function getId_criterio() {
        return $this->id_criterio;
    }

    function getFob() {
        return $this->fob;
    }

    function getFactura() {
        return $this->factura;
    }

    function getPneto() {
        return $this->pneto;
    }

    function getUnidad() {
        return $this->unidad;
    }

    function getDescripcion_comercial() {
        return $this->descripcion_comercial;
    }

    function setId_planilla_co_ddjj($id_planilla_co_ddjj) {
        $this->id_planilla_co_ddjj = $id_planilla_co_ddjj;
    }

    function setId_planilla_co($id_planilla_co) {
        $this->id_planilla_co = $id_planilla_co;
    }

    function setId_planilla_ddjj($id_planilla_ddjj) {
        $this->id_planilla_ddjj = $id_planilla_ddjj;
    }

    function setVortex($vortex) {
        $this->vortex = $vortex;
    }

    function setId_criterio($id_criterio) {
        $this->id_criterio = $id_criterio;
    }

    function setFob($fob) {
        $this->fob = $fob;
    }

    function setFactura($factura) {
        $this->factura = $factura;
    }

    function setPneto($pneto) {
        $this->pneto = $pneto;
    }

    function setUnidad($unidad) {
        $this->unidad = $unidad;
    }

    function setDescripcion_comercial($descripcion_comercial) {
        $this->descripcion_comercial = $descripcion_comercial;
    }
    
    function getObservacion(){
        return $this->observacion;
    }

    function setObservacion($observacion){
        $this->observacion = $observacion;
    }
    
}

?>
