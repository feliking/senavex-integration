<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Regional|reg|4 **/
class PlanillaAnulacionCO extends Db {

    const TABLE = 'planilla_anulacion_co';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_planilla_anulacion_co;
    private $nro_control;
    private $id_tipo_co;
    private $id_empresa;
    private $id_regional;
    private $id_planilla_tipo_anulacion_co;
    private $observacion;
    private $fecha_registro;
    private $id_certificador;
    private $estado_anulacion_co;

    

    function getId_planilla_anulacion_co() {
        return $this->id_planilla_anulacion_co;
    }

    function getNro_control() {
        return $this->nro_control;
    }

    function getId_tipo_co() {
        return $this->id_tipo_co;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function getId_regional() {
        return $this->id_regional;
    }

    function getId_planilla_tipo_anulacion_co() {
        return $this->id_planilla_tipo_anulacion_co;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function getFecha_registro() {
        return $this->fecha_registro;
    }

    function getId_certificador() {
        return $this->id_certificador;
    }

    function setId_planilla_anulacion_co($id_planilla_anulacion_co) {
        $this->id_planilla_anulacion_co = $id_planilla_anulacion_co;
    }

    function setNro_control($nro_control) {
        $this->nro_control = $nro_control;
    }

    function setId_tipo_co($id_tipo_co) {
        $this->id_tipo_co = $id_tipo_co;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    function setId_regional($id_regional) {
        $this->id_regional = $id_regional;
    }

    function setId_planilla_tipo_anulacion_co($id_planilla_tipo_anulacion_co) {
        $this->id_planilla_tipo_anulacion_co = $id_planilla_tipo_anulacion_co;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    function setId_certificador($id_certificador) {
        $this->id_certificador = $id_certificador;
    }

    function getEstado_anulacion_co() {
        return $this->estado_anulacion_co;
    }

    function setEstado_anulacion_co($estado_anulacion_co) {
        $this->Estado_anulacion_co = $estado_anulacion_co;
    }


}

?>
