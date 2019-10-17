<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class InsumosNacionales extends Db {

    const TABLE = 'insumos_nacionales';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_insumos_nacionales;
    private $id_ddjj;
    private $descripcion;
    private $nombre_fabricante;
    private $telefono_fabricante;
    private $valor;
    private $sobrevalor;
    private $nombre_tecnico;
    private $subpartida;
    private $ci;
    private $unidad_medida;

    public function setId_insumos_nacionales($id_insumos_nacionales) {
        $this->id_insumos_nacionales = $id_insumos_nacionales;
    }
    public function getId_insumos_nacionales() {
        return $this->id_insumos_nacionales;
    }

    public function setId_ddjj($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_ddjj() {
        return $this->id_ddjj;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setNombre_Fabricante($nombre_fabricante) {
        $this->nombre_fabricante = $nombre_fabricante;
    }
    public function getNombre_Fabricante() {
        return $this->nombre_fabricante;
    }

    public function setTelefono_Fabricante($telefono_fabricante) {
        $this->telefono_fabricante = $telefono_fabricante;
    }
    public function getTelefono_Fabricante() {
        return $this->telefono_fabricante;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }
    public function getValor() {
        return $this->valor;
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
    public function setSubpartida($subpartida) {
        $this->subpartida = $subpartida;
    }
    public function getSubpartida() {
        return $this->subpartida;
    }
    public function setCi($ci) {
        $this->ci = $ci;
    }
    public function getCi() {
        return $this->ci;
    }
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    public function getCantidad() {
        return $this->cantidad;
    }
    public function setUnidad_Medida($unidad_medida) {
        $this->unidad_medida = $unidad_medida;
    }
    public function getUnidad_Medida() {
        return $this->unidad_medida;
    }
}

?>
