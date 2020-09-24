<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');
include_once( PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class InsumosImportados extends Db {

    const TABLE = 'insumos_importados';

    public static $RELATIONS = array
    (
      'declaracion_jurada' => array(self:: BELONGS_TO, 'DeclaracionJurada', 'id_ddjj'),
      'pais' => array(self:: BELONGS_TO, 'Pais', 'id_pais'),
      'acuerdo' => array(self:: BELONGS_TO, 'Acuerdo', 'id_acuerdo'),
      'unidad_medida' => array(self:: BELONGS_TO, 'UnidadMedida', 'id_unidad_medida')
    );

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_insumos_importados;
    private $id_ddjj;
    private $descripcion;
    private $id_detalle_arancel;
    private $id_pais;
    private $razon_social_productor;
    private $tiene_certificado_origen;
    private $id_acuerdo;
    private $id_unidad_medida;
    private $valor;
    private $sobrevalor;
    private $nombre_tecnico;
    private $cantidad;


    public function setId_insumos_importados($id_insumos_importados) {
        $this->id_insumos_importados = $id_insumos_importados;
    }
    public function getId_insumos_importados() {
        return $this->id_insumos_importados;
    }

    public function setId_DDJJ($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_DDJJ() {
        return $this->id_ddjj;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setId_Detalle_Arancel($id_detalle_arancel) {
        $this->id_detalle_arancel = $id_detalle_arancel;
    }
    public function getId_Detalle_Arancel() {
        return $this->id_detalle_arancel;
    }

    public function setId_Pais($id_pais) {
        $this->id_pais = $id_pais;
    }
    public function getId_Pais() {
        return $this->id_pais;
    }

    public function setRazon_Social_Productor($razon_social_productor) {
        $this->razon_social_productor = $razon_social_productor;
    }
    public function getRazon_Social_Productor() {
        return $this->razon_social_productor;
    }

    public function setTiene_Certificado_Origen($tiene_certificado_origen) {
        $this->tiene_certificado_origen = $tiene_certificado_origen;
    }
    public function getTiene_Certificado_Origen() {
        return $this->tiene_certificado_origen;
    }

    public function setId_Acuerdo($id_acuerdo) {
        $this->id_acuerdo = $id_acuerdo;
    }
    public function getId_Acuerdo() {
        return $this->id_acuerdo;
    }

    public function setId_unidad_medida($id_unidad_medida) {
        $this->id_unidad_medida = $id_unidad_medida;
    }
    public function getId_unidad_medida() {
        return $this->id_unidad_medida;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }
    public function getValor() {
        return $this->valor;
    }
    public function getValorFormat() {
        return FuncionesGenerales::getNumberFormat($this->valor);
    }

    public function setSobrevalor($sobrevalor) {
        $this->sobrevalor = $sobrevalor;
    }
    public function getSobrevalor() {
        return $this->sobrevalor;
    }
    public function setNombre_Tecnico($nombre_tecnico) {
        $this->nombre_tecnico = $nombre_tecnico;
    }
    public function getNombre_Tecnico() {
        return $this->nombre_tecnico;
    }
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    public function getCantidad() {
        return $this->cantidad;
    }
}

?>
