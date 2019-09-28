<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');


class EmpresaImportador extends Db {
    
    const TABLE = 'empresa_importador';
    

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_empresa_importador;
    private $padron_importador;
    private $razon_social;
    private $nit;
    private $testimonio_constitucion;
    private $rui;
    private $patente_municipal;
    private $matricula_fundempresa;
    private $vencimiento_fundempresa;
    private $unipersonal;
    private $nacionalidad;
    private $id_direccion;
    private $estado;
    private $fecha_asignacion_rui;
    private $fecha_renovacion_rui;
    private $fecha_registro;
    private $observaciones;
    private $id_representante_legal;
    private $testimonio_poder_representante;
    private $id_apoderado;
    private $testimonio_poder_apoderado;
    private $vencimiento_poder_apoderado;
    private $id_usuario_aprob;
    
    public function getId_empresa_importador(){
        return $this->id_empresa_importador;
    }

    public function setId_empresa_importador($id_empresa_importador){
        $this->id_empresa_importador = $id_empresa_importador;
    }

    public function getPadron_importador(){
        return $this->padron_importador;
    }

    public function setPadron_importador($padron_importador){
        $this->padron_importador = $padron_importador;
    }

    public function getRazon_social(){
        return $this->razon_social;
    }

    public function setRazon_social($razon_social){
        $this->razon_social = $razon_social;
    }

    public function getNit(){
        return $this->nit;
    }

    public function setNit($nit){
        $this->nit = $nit;
    }

    public function getTestimonio_constitucion(){
        return $this->testimonio_constitucion;
    }

    public function setTestimonio_constitucion($testimonio_constitucion){
        $this->testimonio_constitucion = $testimonio_constitucion;
    }

    public function getRui(){
        return $this->rui;
    }

    public function setRui($rui){
        $this->rui = $rui;
    }

    public function getPatente_municipal(){
        return $this->patente_municipal;
    }

    public function setPatente_municipal($patente_municipal){
        $this->patente_municipal = $patente_municipal;
    }

    public function getMatricula_fundempresa(){
        return $this->matricula_fundempresa;
    }

    public function setMatricula_fundempresa($matricula_fundempresa){
        $this->matricula_fundempresa = $matricula_fundempresa;
    }

    public function getVencimiento_fundempresa(){
        return $this->vencimiento_fundempresa;
    }

    public function setVencimiento_fundempresa($vencimiento_fundempresa){
        $this->vencimiento_fundempresa = $vencimiento_fundempresa;
    }

    public function getUnipersonal(){
        return $this->unipersonal;
    }

    public function setUnipersonal($unipersonal){
        $this->unipersonal = $unipersonal;
    }

    public function getNacionalidad(){
        return $this->nacionalidad;
    }

    public function setNacionalidad($nacionalidad){
        $this->nacionalidad = $nacionalidad;
    }

    public function getId_direccion(){
        return $this->id_direccion;
    }

    public function setId_direccion($id_direccion){
        $this->id_direccion = $id_direccion;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getFecha_asignacion_rui(){
        return $this->fecha_asignacion_rui;
    }

    public function setFecha_asignacion_rui($fecha_asignacion_rui){
        $this->fecha_asignacion_rui = $fecha_asignacion_rui;
    }

    public function getFecha_renovacion_rui(){
        return $this->fecha_renovacion_rui;
    }

    public function setFecha_renovacion_rui($fecha_renovacion_rui){
        $this->fecha_renovacion_rui = $fecha_renovacion_rui;
    }

    public function getFecha_registro(){
        return $this->fecha_registro;
    }

    public function setFecha_registro($fecha_registro){
        $this->fecha_registro = $fecha_registro;
    }

    public function getObservaciones(){
        return $this->observaciones;
    }

    public function setObservaciones($observaciones){
        $this->observaciones = $observaciones;
    }

    public function getId_representante_legal(){
        return $this->id_representante_legal;
    }

    public function setId_representante_legal($id_representante_legal){
        $this->id_representante_legal = $id_representante_legal;
    }

    public function getTestimonio_poder_representante(){
        return $this->testimonio_poder_representante;
    }

    public function setTestimonio_poder_representante($testimonio_poder_representante){
        $this->testimonio_poder_representante = $testimonio_poder_representante;
    }

    public function getId_apoderado(){
        return $this->id_apoderado;
    }

    public function setId_apoderado($id_apoderado){
        $this->id_apoderado = $id_apoderado;
    }

    public function getTestimonio_poder_apoderado(){
        return $this->testimonio_poder_apoderado;
    }

    public function setTestimonio_poder_apoderado($testimonio_poder_apoderado){
        $this->testimonio_poder_apoderado = $testimonio_poder_apoderado;
    }

    public function getVencimiento_poder_apoderado(){
        return $this->vencimiento_poder_apoderado;
    }

    public function setVencimiento_poder_apoderado($vencimiento_poder_apoderado){
        $this->vencimiento_poder_apoderado = $vencimiento_poder_apoderado;
    }
    function getId_usuario_aprob() {
        return $this->id_usuario_aprob;
    }

    function setId_usuario_aprob($id_usuario_aprob) {
        $this->id_usuario_aprob = $id_usuario_aprob;
    }

}
?>
