<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class CorrelativoRui extends Db {
        
    const TABLE = 'correlativo_rui';
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_correlativo_rui;
    private $correlativo_rui;
    
    function getId_correlativo_rui() {
        return $this->id_correlativo_rui;
    }

    function getCorrelativo_rui() {
        return $this->correlativo_rui;
    }

    function setId_correlativo_rui($id_correlativo_rui) {
        $this->id_correlativo_rui = $id_correlativo_rui;
    }

    function setCorrelativo_rui($correlativo_rui) {
        $this->correlativo_rui = $correlativo_rui;
    }


}
?>
