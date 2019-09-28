<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Capitulos extends Db {
    
    const TABLE = 'capitulos';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_capitulo;
    private $capitulo;
    private $nombre_capitulo;
    
    public function setId_capitulo($id_capitulo) {
        $this->id_capitulo = $id_capitulo;
    }
    public function getId_capitulo() {
        return $this->id_capitulo;
    }

    public function setCapitulo($capitulo) {
        $this->capitulo = $capitulo;
    }
    public function getCapitulo() {
        return $this->capitulo;
    }
    
    public function setNombre_capitulo($nombre_capitulo) {
        $this->nombre_capitulo= $nombre_capitulo;
    }
    public function getNombre_capitulo() {
        return $this->nombre_capitulo;
    }

}

?>
