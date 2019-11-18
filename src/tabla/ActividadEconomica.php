<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class ActividadEconomica extends Db {
        
    const TABLE = 'actividad_economica';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_actividad_economica;
    private $descripcion;
    private $criterio_valor;
    
    public function setId_actividad_economica($id_actividad_economica) {
        $this->id_actividad_economica = $id_actividad_economica;
    }
    public function getId_actividad_economica() {
        return $this->id_actividad_economica;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setCriterio_valor($criterio_valor) {
        $this->criterio_valor = $criterio_valor;
    }
    public function getCriterio_valor() {
        return $this->criterio_valor;
    }
    
}

?>
