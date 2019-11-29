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

}

?>
