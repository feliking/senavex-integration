<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class IcoCafe extends Db {
    
    const TABLE = 'ico_cafe';
    
    public static $RELATIONS = array
    (
        'empresa'=>array(self::BELONGS_TO,'Empresa','id_empresa')
    );

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_ico_cafe;
    private $id_empresa;
    private $ico;
    private $lote;
    
    public function setId_ico_cafe($id_ico_cafe) {
        $this->id_ico_cafe = $id_ico_cafe;
    }
    public function getId_ico_cafe() {
        return $this->id_ico_cafe;
    } 
    public function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getId_empresa() {
        return $this->id_empresa;
    } 
    public function setIco($ico) {
        $this->ico = $ico;
    }
    public function getIco() {
        return $this->ico;
    } 
    public function setLote($lote) {
        $this->lote = $lote;
    }
    public function getLote() {
        return $this->lote;
    }    
}
?>
