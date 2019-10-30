<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Departamento extends Db {
        
    const TABLE = 'departamento';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_departamento;
    private $nombre;
    private $sigla;
    private $criterio_valor;
    
    public function setId_departamento($id_departamento) {
        $this->id_departamento = $id_departamento;
    }
    public function getId_departamento() {
        return $this->id_departamento;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setSigla($sigla) {
        $this->sigla = $sigla;
    }
    public function getSigla() {
        return $this->sigla;
    }
    public function getCriterio_valor(){
        return $this->criterio_valor;
    }
    function setCriterio_valor($criterio_valor){
        $this->criterio_valor=$criterio_valor;
    }
    
}

?>
