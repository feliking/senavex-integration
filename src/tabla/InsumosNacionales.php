<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class InsumosNacionales extends Db {
        
    const TABLE = 'insumos_nacionales';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_insumos_nacionales;
    private $id_ddjj;
    private $descripcion;
    private $nombre_fabricante;
    private $telefono_fabricante;
    private $valor;
    
    public function setId_insumos_nacionales($id_insumos_nacionales) {
        $this->id_insumos_nacionales = $id_insumos_nacionales;
    }
    public function getId_insumos_nacionales() {
        return $this->id_insumos_nacionales;
    }

    public function setId_ddjj($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_ddjj() {
        return $this->id_ddjj;
    }
    
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
    public function setNombre_Fabricante($nombre_fabricante) {
    $this->nombre_fabricante = $nombre_fabricante;
    }
    public function getNombre_Fabricante() {
        return $this->nombre_fabricante;
    }
    
    public function setTelefono_Fabricante($telefono_fabricante) {
        $this->telefono_fabricante = $telefono_fabricante;
    }
    public function getTelefono_Fabricante() {
        return $this->telefono_fabricante;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }
    public function getValor() {
        return $this->valor;
    }
}

?>
