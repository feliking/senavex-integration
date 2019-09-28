<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class ServicioExportador extends Db {
        
    const TABLE = 'servicio_exportador';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_servicio_exportador;
    private $id_servicio;
    private $codigo_proceso;
    private $fecha_servicio;
    private $id_persona;
    private $estado;
    private $costo_actual;
    private $id_empresa;
    private $facturado;
    
    public function setId_servicio_exportador($id_servicio_exportador) {
        $this->id_servicio_exportador = $id_servicio_exportador;
    }
    public function getId_servicio_exportador() {
        return $this->id_servicio_exportador;
    }

    public function setId_Servicio($id_servicio) {
        $this->id_servicio = $id_servicio;
    }
    public function getId_Servicio() {
        return $this->id_servicio;
    }
    
    public function setCodigo_Proceso($codigo_proceso) {
        $this->codigo_proceso = $codigo_proceso;
    }
    public function getCodigo_Proceso() {
        return $this->codigo_proceso;
    }

    public function setFecha_Servicio($fecha_servicio) {
        $this->fecha_servicio = $fecha_servicio;
    }
    public function getFecha_Servicio() {
        return $this->fecha_servicio;
    }

    public function setId_Persona($id_persona) {
        $this->id_persona = $id_persona;
    }
    public function getId_Persona() {
        return $this->id_persona;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setCosto_Actual($costo_actual) {
        $this->costo_actual = $costo_actual;
    }
    public function getCosto_Actual() {
        return $this->costo_actual;
    }
    
    public function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getId_empresa() {
        return $this->id_empresa;
    }

    public function setFacturado($facturado) {
        $this->facturado = $facturado;
    }
    public function getFacturado() {
        return $this->facturado;
    }
}

?>
