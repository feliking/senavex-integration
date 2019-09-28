<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class CorrelativoRuex extends Db {
        
    const TABLE = 'correlativo_ruex';
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_correlativo;
    private $correlativo_ruex;
    
    public function setId_correlativo($id_correlativo) {
        $this->id_correlativo = $id_correlativo;
    }
    public function getId_correlativo() {
        return $this->id_correlativo;
    }
    public function setCorrelativo_ruex($correlativo_ruex) {
        $this->correlativo_ruex = $correlativo_ruex;
    }
    public function getCorrelativo_ruex() {
        return $this->correlativo_ruex;
    }
}
?>
