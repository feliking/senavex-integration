<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class DdjjAcuerdo extends Db {
        
    const TABLE = 'ddjj_acuerdo';

    //public $servicio_exportador = array();
    //public $unidad_medida = array();
    
    public static $RELATIONS = array
    (
        'acuerdo' => array(self:: BELONGS_TO, 'Acuerdo', 'id_acuerdo'),
        'declaracion_jurada' => array(self:: BELONGS_TO, 'DeclaracionJurada', 'id_ddjj'),
        'criterio_origen' => array(self:: BELONGS_TO, 'CriterioOrigen', 'id_criterio_origen'),
    );
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_ddjj_acuerdo;
    private $id_ddjj;
    private $id_acuerdo;
    private $id_estado_ddjj;
    private $vigencia;
    private $id_criterio_origen;
    private $beneficio;
    private $cumple;
    private $observaciones;
    private $fecha_revision;
    private $valor_mercancia;
    private $fecha_aprobacion;
    private $fecha_fin;
    private $subpartida;
    
    public function setId_ddjj_acuerdo($id_ddjj_acuerdo) {
        $this->id_ddjj_acuerdo = $id_ddjj_acuerdo;
    }
    public function getId_ddjj_acuerdo() {
        return $this->id_ddjj_acuerdo;
    }

    public function setId_ddjj($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_ddjj() {
        return $this->id_ddjj;
    }

    public function setId_Acuerdo($id_acuerdo) {
        $this->id_acuerdo = $id_acuerdo;
    }
    public function getId_Acuerdo() {
        return $this->id_acuerdo;
    }
    
    public function setId_estado_ddjj($id_estado_ddjj) {
        $this->id_estado_ddjj = $id_estado_ddjj;
    }
    public function getId_estado_ddjj() {
        return $this->id_estado_ddjj;
    }
    
    public function setVigencia($vigencia) {
        $this->vigencia = $vigencia;
    }
    public function getVigencia() {
        return $this->vigencia;
    }
    
    public function setId_Criterio_Origen($id_criterio_origen) {
        $this->id_criterio_origen = $id_criterio_origen;
    }
    public function getId_Criterio_Origen() {
        return $this->id_criterio_origen;
    }
    
    public function setBeneficio($beneficio) {
        $this->beneficio = $beneficio;
    }
    public function getBeneficio() {
        return $this->beneficio;
    }
    
    public function setCumple($cumple) {
        $this->cumple = $cumple;
    }
    public function getCumple() {
        return $this->cumple;
    }

    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
    public function getObservaciones() {
        return $this->observaciones;
    }
    
    public function setFecha_Revision($fecha_revision) {
        $this->fecha_revision= $fecha_revision;
    }
    public function getFecha_Revision() {
        return $this->fecha_revision;
    }

    public function setValor_Mercancia($valor_mercancia) {
        $this->valor_mercancia = $valor_mercancia;
    }
    public function getValor_Mercancia() {
        return $this->valor_mercancia;
    }
    public function setFecha_aprobacion($fecha_aprobacion) {
        $this->fecha_aprobacion= $fecha_aprobacion;
    }
    public function getFecha_aprobacion() {
        return $this->fecha_aprobacion;
    }

    public function setFecha_fin($fecha_fin) {
        $this->fecha_fin= $fecha_fin;
    }
    public function getFecha_fin() {
        return $this->fecha_fin;
    }

    public function setSubpartida($subpartida) {
        $this->subpartida= $subpartida;
    }
    public function getSubpartida() {
        return $this->subpartida;
    }
}

?>
