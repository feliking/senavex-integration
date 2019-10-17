<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class CriterioOrigen extends Db implements JsonSerializable {
        
    const TABLE = 'planilla_criterio_origen';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_criterio_origen;
    private $id_acuerdo;
    private $descripcion;
    private $literal;
    private $obligatorio;
    
    public function setId_criterio_origen($id_criterio_origen) {
        $this->id_criterio_origen = $id_criterio_origen;
    }
    public function getId_criterio_origen() {
        return $this->id_criterio_origen;
    }

    public function setId_Acuerdo($id_acuerdo) {
        $this->id_acuerdo = $id_acuerdo;
    }
    public function getId_Acuerdo() {
        return $this->id_acuerdo;
    }
    
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
    public function setLiteral($literal) {
        $this->literal = $literal;
    }
    public function getLiteral() {
        return $this->literal;
    }
    function getObligatorio() {
        return $this->obligatorio;
    }

    function setObligatorio($obligatorio) {
        $this->obligatorio = $obligatorio;
    }

    public function jsonSerialize() {
        return [
          'id_criterio_origen' => $this->id_acuerdo,
          'id_acuerdo' => $this->id_criterio_origen,
          'descripcion' => $this->descripcion,
          'literal' => $this->literal,
          'obligatorios' => $this->obligatorio
        ];
    }
}

?>
