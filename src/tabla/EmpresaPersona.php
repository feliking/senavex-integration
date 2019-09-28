<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class EmpresaPersona extends Db {
        
    const TABLE = 'empresa_persona';
    
    public static $RELATIONS = array
    (
        'persona'=>array(self::BELONGS_TO,'Persona','id_persona'),
        'perfil'=>array(self::BELONGS_TO,'Perfil','id_perfil'),
        'empresa'=>array(self::BELONGS_TO,'Empresa','id_empresa'),
    );
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_empresa_persona;
    private $id_persona;
    private $id_empresa;
    private $id_perfil;
    private $fecha_vinculacion;
    private $fecha_baja;
    private $ultima_modificacion;
    private $activo; //0 baja 1 activo 2 vagacion
    private $opciones_persona;
    private $nro_poder;
    private $cargo;
    private $id_regional;
    private $testimonio_poder_representante;
    private $testimonio_poder_apoderado;
    private $vencimiento_poder_apoderado;
    
    public function setId_empresa_persona($id_empresa_persona) {
        $this->id_empresa_persona = $id_empresa_persona;
    }
    public function getId_empresa_persona() {
        return $this->id_empresa_persona;
    }

    public function setId_Persona($id_persona) {
        $this->id_persona = $id_persona;
    }
    public function getId_Persona() {
        return $this->id_persona;
    }
    
    public function setId_Empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getId_Empresa() {
        return $this->id_empresa;
    }

    public function setId_Perfil($id_perfil) {
        $this->id_perfil = $id_perfil;
    }
    public function getId_Perfil() {
        return $this->id_perfil;
    }
    
    public function setFecha_Vinculacion($fecha_vinculacion) {
        $this->fecha_vinculacion = $fecha_vinculacion;
    }
    public function getFecha_Vinculacion() {
        return $this->fecha_vinculacion;
    }

    public function setFecha_Baja($fecha_baja) {
        $this->fecha_baja = $fecha_baja;
    }
    public function getFecha_Baja() {
        return $this->fecha_baja;
    }

    public function setUltima_Modificacion($ultima_modificacion) {
        $this->ultima_modificacion = $ultima_modificacion;
    }
    public function getUltima_Modificacion() {
        return $this->ultima_modificacion;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }
    public function getActivo() {
        return $this->activo;
    }
    
    public function setOpciones_persona($opciones_persona) {
        $this->opciones_persona = $opciones_persona;
    }
    public function getOpciones_persona() {
        return $this->opciones_persona;
    }
    
    public function getNro_poder(){
        return $this->nro_poder;
    }
    public function setNro_poder($nro_poder){
        $this->nro_poder=$nro_poder;
    }

    public function getTestimonio_poder_representante(){
        return $this->testimonio_poder_representante;
    }

    public function setTestimonio_poder_representante($testimonio_poder_representante){
        $this->testimonio_poder_representante = $testimonio_poder_representante;
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

    function getCargo() {
        return $this->cargo;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }
    function getId_regional() {
        return $this->id_regional;
    }

    function setId_regional($id_regional) {
        $this->id_regional = $id_regional;
    }



}
?>
