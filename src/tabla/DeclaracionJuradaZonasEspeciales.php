<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class DeclaracionJuradaZonasEspeciales extends Db {
    
    const TABLE = 'declaracion_jurada_zonas_especiales';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    public $id_declaracion_jurada_zonas_especiales;
    public $id_ddjj;
    public $id_zonas_especiales;


    public function setId_declaracion_jurada_zonas_especiales($id_declaracion_jurada_zonas_especiales) {
        $this->id_declaracion_jurada_zonas_especiales = $id_declaracion_jurada_zonas_especiales;
    }
    public function getId_declaracion_jurada_zonas_especiales() {
        return $this->id_declaracion_jurada_zonas_especiales;
    }
    public function setId_ddjj($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_ddjj() {
        return $this->id_ddjj;
    }
    public function setId_zonas_especiales($id_zonas_especiales) {
        $this->id_zonas_especiales = $id_zonas_especiales;
    }
    public function getId_zonas_especiales() {
        return $this->id_zonas_especiales;
    }
}
?>
