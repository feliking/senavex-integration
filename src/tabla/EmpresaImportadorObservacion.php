<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class EmpresaImportadorObservacion extends Db {
    
    const TABLE = 'empresa_importador_observaciones';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_empresa_importador_observaciones;
    private $fecha_observacion;
    private $observacion;
    private $id_empresa_importador;
    private $id_usuario_observacion;
    
    function getId_empresa_importador_observaciones() {
        return $this->id_empresa_importador_observaciones;
    }

    function getFecha_observacion() {
        return $this->fecha_observacion;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function getId_empresa_importador() {
        return $this->id_empresa_importador;
    }

    function getId_usuario_observacion() {
        return $this->id_usuario_observacion;
    }

    function setId_empresa_importador_observaciones($id_empresa_importador_observaciones) {
        $this->id_empresa_importador_observaciones = $id_empresa_importador_observaciones;
    }

    function setFecha_observacion($fecha_observacion) {
        $this->fecha_observacion = $fecha_observacion;
    }

    function setObservacion($observacion) {
        $this->observacion = $observacion;
    }

    function setId_empresa_importador($id_empresa_importador) {
        $this->id_empresa_importador = $id_empresa_importador;
    }

    function setId_usuario_observacion($id_usuario_observacion) {
        $this->id_usuario_observacion = $id_usuario_observacion;
    }    
}

?>
