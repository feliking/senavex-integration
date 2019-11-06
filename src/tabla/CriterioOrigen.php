<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class CriterioOrigen extends Db implements JsonSerializable {
        
    const TABLE = 'criterio_origen';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_criterio_origen;
    private $id_acuerdo;
    private $descripcion;
    private $literal;
    private $parrafo;
    private $orden;
    private $activo;
    private $criterio_valor;


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

    public function setParrafo($parrafo) {
        $this->parrafo = $parrafo;
    }
    public function getParrafo() {
        return $this->parrafo;
    }
    public function setOrden($orden) {
        $this->orden = $orden;
    }
    public function getOrden() {
        return $this->orden;
    }
    public function setActivo($activo) {
        $this->activo = $activo;
    }
    public function getActivo() {
        return $this->activo;
    }
    public function getCriterio_Valor(){
        return $this->criterio_valor;
    }
    function setCriterio_Valor($criterio_valor){
        $this->criterio_valor=$criterio_valor;
    }

    public function jsonSerialize() {
        return [
          'id_criterio_origen' => $this->id_criterio_origen,
          'id_acuerdo' => $this->id_acuerdo,
          'descripcion' => $this->descripcion,
          'literal' => $this->literal,
          'parrafo' => $this->parrafo,
          'orden' => $this->orden,
        ];
    }
}

?>
