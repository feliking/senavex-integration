<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class VerFormula extends Db {
        
    const TABLE = 'ver_formula';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_ver_formula;
    private $formula;

    private $fecha_alta;
    private $id_persona_alta;
    private $fecha_baja;
    private $id_persona_baja;
    private $estado;
    private $justificativo;
    private $variables;


    public static $RELATIONS = array
    (
        'persona_alta' => array(self:: BELONGS_TO, 'Persona', 'id_persona'),
        'persona_baja' => array(self:: BELONGS_TO, 'Persona', 'id_persona'),
    );




    public function setId_ver_formula($id_ver_formula) {
        $this->id_ver_formula = $id_ver_formula;
    }
    public function getId_ver_formula() {
        return $this->id_ver_formula;
    }

    public function setFormula($formula) {
        $this->formula = $formula;
    }
    public function getFormula() {
        return $this->formula;
    }
    public function setFecha_alta($fecha_alta) {
        $this->fecha_alta = $fecha_alta;
    }
    public function getFecha_alta() {
        return $this->fecha_alta;
    }
    public function setId_persona_alta($id_persona_alta) {
        $this->id_persona_alta = $id_persona_alta;
    }
    public function getId_persona_alta() {
        return $this->id_persona_alta;
    }
    public function setFecha_baja($fecha_baja) {
        $this->fecha_baja = $fecha_baja;
    }
    public function getFecha_baja() {
        return $this->fecha_baja;
    }
    public function setId_persona_baja($id_persona_baja) {
        $this->id_persona_baja = $id_persona_baja;
    }
    public function getId_persona_baja() {
        return $this->id_persona_baja;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }
    
    function getJustificativo(){
        return $this->justificativo;
    }
    function setJustificativo($justificativo){
        $this->justificativo=$justificativo;
    }
    
    function getVariables(){
        return $this->variables;
    }
    function setVariables($variables){
        $this->variables=$variables;
    }
}

?>
