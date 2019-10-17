<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class VerVerificacion extends Db {

    const TABLE = 'ver_verificacion';


    public $estado = array();
    public $regional = array();
    public $ddjj = array();

    public static $RELATIONS = array
    (
        'estado'=>array(self:: BELONGS_TO, 'VerEstadoVerificacion','id_ver_estado_verificacion'),
        'regional'=>array(self:: BELONGS_TO, 'Regional','id_regional'),
        'ddjj'=>array(self:: BELONGS_TO, 'DeclaracionJurada','id_ddjj'),
        'empresa'=>array(self:: BELONGS_TO, 'Empresa','id_empresa'),
    );



    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_ver_verificacion;
    private $id_ddjj;
    private $id_regional;
    private $id_formula;
    private $id_admision;
    private $fecha_creacion;
    private $id_persona_creacion; // la persona que creo la verificacion , vacio si el sistema la creo
    private $nivel; //nivel que saco en la formula
    private $resultado;/// resultado que saco en la formula
    private $verificacion_estricta;// si detendra el flujo de la declaracion jurada
    private $verificacion_personal;// si a sido creado o modificado por una persona y no por el sistema
    private $justificacion_personal;// justificaion de la persona, motivo por el que creo o modifico la verificacion
    private $id_ver_estado_verificacion;//estado de la verificacion literal opciones: para asignar, aprobado, eliminado, rechazado, asignado
    private $id_persona_verificacion;//persona que realizo o realizara la varificacion
    private $fecha_asignacion_verificacion;//la fecha en que se asigno la verificacion
    private $fecha_verificacion;//fecha en que se se concluyo la verificacion
    private $id_empresa;
    private $informe;
    private $id_persona_elimino;
    private $fecha_eliminacion;
    private $resumen;
    private $conclusion_ddjj;
    private $justificacion;//justificacion de la persona que elimino la verificacion

    function getId_ver_verificacion(){
        return $this->id_ver_verificacion;
    }
    function setId_ver_verificacion($id_ver_verificacion){
        $this->id_ver_verificacion=$id_ver_verificacion;
    }
    function getId_ddjj(){
        return $this->id_ddjj;
    }
    function setId_ddjj($id_ddjj){
        $this->id_ddjj=$id_ddjj;
    }
    function getId_regional(){
        return $this->id_regional;
    }
    function setId_regional($id_regional){
        $this->id_regional=$id_regional;
    }
    function getId_formula(){
        return $this->id_formula;
    }
    function setId_formula($id_formula){
        $this->id_formula=$id_formula;
    }
    function getId_admision(){
        return $this->id_admision;
    }
    function setId_admision($id_admision){
        $this->id_admision=$id_admision;
    }
    function getFecha_creacion(){
        return $this->fecha_creacion;
    }
    function setFecha_creacion($fecha_creacion){
        $this->fecha_creacion=$fecha_creacion;
    }
    function getId_persona_creacion(){
        return $this->id_persona_creacion;
    }
    function setId_persona_creacion($id_persona_creacion){
        $this->id_persona_creacion=$id_persona_creacion;
    }
    function getNivel(){
        return $this->nivel;
    }
    function setNivel($nivel){
        $this->nivel=$nivel;
    }
    function getResultado(){
        return $this->resultado;
    }
    function setResultado($resultado){
        $this->resultado=$resultado;
    }
    function getVerificacion_estricta(){
        return $this->verificacion_estricta;
    }
    function setVerificacion_estricta($verificacion_estricta){
        $this->verificacion_estricta=$verificacion_estricta;
    }
    function getVerificacion_personal(){
        return $this->verificacion_personal;
    }
    function setVerificacion_personal($verificacion_personal){
        $this->verificacion_personal=$verificacion_personal;
    }
    function getJustificacion_personal(){
        return $this->justificacion_personal;
    }
    function setJustificacion_personal($justificacion_personal){
        $this->justificacion_personal=$justificacion_personal;
    }
    function getId_ver_estado_verificacion(){
        return $this->id_ver_estado_verificacion;
    }
    function setId_ver_estado_verificacion($id_ver_estado_verificacion){
        $this->id_ver_estado_verificacion=$id_ver_estado_verificacion;
    }
    function getId_persona_verificacion(){
        return $this->id_persona_verificacion;
    }
    function setId_persona_verificacion($id_persona_verificacion){
        $this->id_persona_verificacion=$id_persona_verificacion;
    }
    function getFecha_asignacion_verificacion(){
        return $this->fecha_asignacion_verificacion;
    }
    function setFecha_asignacion_verificacion($fecha_asignacion_verificacion){
        $this->fecha_asignacion_verificacion=$fecha_asignacion_verificacion;
    }
    function getFecha_verificacion(){
        return $this->fecha_verificacion;
    }
    function setFecha_verificacion($fecha_verificacion){
        $this->fecha_verificacion=$fecha_verificacion;
    }
    function getId_empresa(){
        return $this->id_empresa;
    }
    function setId_empresa($id_empresa){
        $this->id_empresa=$id_empresa;
    }
    function getInforme(){
        return $this->informe;
    }
    function setInforme($informe){
        $this->informe=$informe;
    }
    function getId_persona_elimino(){
        return $this->id_persona_elimino;
    }
    function setId_persona_elimino($id_persona_elimino){
        $this->id_persona_elimino=$id_persona_elimino;
    }
    function getFecha_eliminacion(){
        return $this->fecha_eliminacion;
    }
    function setFecha_eliminacion($fecha_eliminacion){
        $this->fecha_eliminacion=$fecha_eliminacion;
    }
    function getResumen(){
        return $this->resumen;
    }
    function setResumen($resumen){
        $this->resumen=$resumen;
    }
    function getConclusion_ddjj(){
        return $this->conclusion_ddjj;
    }
    function setConclusion_ddjj($conclusion_ddjj){
        $this->conclusion_ddjj=$conclusion_ddjj;
    }
    function getJustificacion(){
        return $this->justificacion;
    }
    function setJustificacion($justificacion){
        $this->justificacion=$justificacion;
    }
}

?>
