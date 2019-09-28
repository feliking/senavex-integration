<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class CafeICO extends Db {
        
    const TABLE = 'cafe_ico';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_ico_cafe;
    private $id_empresa;
    private $ico;
    private $lote;
    
    function getId_ico_cafe() {
        return $this->id_ico_cafe;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function getIco() {
        return $this->ico;
    }

    function getLote() {
        return $this->lote;
    }

    function setId_ico_cafe($id_ico_cafe) {
        $this->id_ico_cafe = $id_ico_cafe;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    function setIco($ico) {
        $this->ico = $ico;
    }

    function setLote($lote) {
        $this->lote = $lote;
    }


}

?>
