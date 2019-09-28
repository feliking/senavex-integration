<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Deposito extends Db {
        
    const TABLE = 'deposito';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_deposito;
    private $id_persona;
    private $id_empresa;
    private $codigo_deposito;
    private $fecha_deposito;
    private $estado;
    private $monto;
    private $id_factura;
    private $descripcion;
    
    public function setId_deposito($id_deposito) {
        $this->id_deposito = $id_deposito;
    }
    public function getId_deposito() {
        return $this->id_deposito;
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

    public function setCodigo_Deposito($codigo_deposito) {
        $this->codigo_deposito = $codigo_deposito;
    }
    public function getCodigo_Deposito() {
        return $this->codigo_deposito;
    }

    public function setFecha_Deposito($fecha_deposito) {
        $this->fecha_deposito = $fecha_deposito;
    }
    public function getFecha_Deposito() {
        return $this->fecha_deposito;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }
    
    public function getMonto() {
        return $this->monto;
    }

    public function setMonto($monto) {
        $this->monto = $monto;
    }
    function getId_factura() {
        return $this->id_factura;
    }

    function setId_factura($id_factura) {
        $this->id_factura = $id_factura;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}

?>
