<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Asesoramiento extends Db {
        
    const TABLE = 'asesoramiento';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_asesoramiento;
    private $id_persona;
    private $id_empresa;
    private $id_asistente_senavex;
    private $estado;
    private $fecha_inicio;
    private $fecha_fin;
    private $fecha_fin_atencion;
    private $id_servicio_exportador;
    
    public function setId_asesoramiento($id_asesoramiento) {
        $this->id_asesoramiento = $id_asesoramiento;
    }
    public function getId_asesoramiento() {
        return $this->id_asesoramiento;
    }

    public function setId_Persona($id_persona) {
        $this->id_persona= $id_persona;
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

    public function setId_Asistente_Senavex($id_asistente_senavex) {
        $this->id_asistente_senavex = $id_asistente_senavex;
    }
    public function getId_Asistente_Senavex() {
        return $this->id_asistente_senavex;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setFecha_Inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }
    public function getFecha_Inicio() {
        return $this->fecha_inicio;
    }
    
    public function setFecha_Fin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }
    public function getFecha_Fin() {
        return $this->fecha_fin;
    }

    public function setFecha_Fin_Atencion($fecha_fin_atencion) {
        $this->fecha_fin_atencion = $fecha_fin_atencion;
    }
    public function getFecha_Fin_Atencion() {
        return $this->fecha_fin_atencion;
    }

    public function setId_Servicio_Exportador($id_servicio_exportador) {
        $this->id_servicio_exportador = $id_servicio_exportador;
    }
    public function getId_Servicio_Exportador() {
        return $this->id_servicio_exportador;
    }
    
}

?>
