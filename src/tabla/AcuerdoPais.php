<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class AcuerdoPais extends Db {
    
    const TABLE = 'acuerdo_pais';
    
    public $acuerdo = array();
    public $pais = array();
    
    public static $RELATIONS = array
    (
        'acuerdo' => array(self:: BELONGS_TO, 'Acuerdo', 'id_acuerdo'),
        'pais' => array(self:: BELONGS_TO, 'Pais', 'id_pais')
    );
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_acuerdo_pais;
    private $id_acuerdo;
    private $id_pais;
    
    public function setId_acuerdo_pais($id_acuerdo_pais) {
        $this->id_acuerdo_pais = $id_acuerdo_pais;
    }
    public function getId_acuerdo_pais() {
        return $this->id_acuerdo_pais;
    }

    public function setId_acuerdo($id_acuerdo) {
        $this->id_acuerdo = $id_acuerdo;
    }
    public function getId_acuerdo() {
        return $this->id_acuerdo;
    }

    public function setId_pais($id_pais) {
        $this->id_pais = $id_pais;
    }
    public function getId_pais() {
        return $this->id_pais;
    }
    
}

?>
