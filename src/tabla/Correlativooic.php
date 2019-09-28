<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Correlativooic extends Db {
        
    const TABLE = 'correlativooic';
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_correlativooic;
    private $correlativooic;
    
    public function setCorrelativooic($correlativooic) {
        $this->correlativooic = $correlativooic;
    }
    public function getCorrelativooic() {
        return $this->correlativooic;
    }
    public function setId_correlativooic($id_correlativooic) {
        $this->id_correlativooic = $id_correlativooic;
    }
    public function getId_correlativooic() {
        return $this->id_correlativooic;
    }
}
?>
