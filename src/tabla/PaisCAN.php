<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class PaisCAN extends Db {
        
    const TABLE = 'pais_can';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_pais_can;
    private $nombre;
    private $codigo_pais;
    
    public function setId_pais_can($id_pais_can) {
        $this->id_pais_can = $id_pais_can;
    }
    public function getId_pais_can() {
        return $this->id_pais_can;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setCodigo_Pais($codigo_pais) {
        $this->codigo_pais = $codigo_pais;
    }
    public function getCodigo_Pais() {
        return $this->codigo_pais;
    }
    
}

?>
