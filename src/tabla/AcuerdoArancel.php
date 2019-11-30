<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Acuerdo|acu|F **/
class AcuerdoArancel extends Db {
    
    const TABLE = 'acuerdo_arancel';

    public $acuerdo = array();
    public $arancel = array();

    public static $RELATIONS = array
    (
        'acuerdo' => array(self:: BELONGS_TO, 'Acuerdo', 'id_acuerdo'),
        'arancel' => array(self:: BELONGS_TO, 'Arancel', 'id_arancel')
    );

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_acuerdo_arancel;
    private $id_acuerdo;
    private $id_arancel;

    public function setId_acuerdo_arancel($id_acuerdo_arancel) {
        $this->id_acuerdo_arancel = $id_acuerdo_arancel;
    }
    public function getId_acuerdo_arancel() {
        return $this->id_acuerdo_arancel;
    }

    public function setId_acuerdo($id_acuerdo) {
        $this->id_acuerdo = $id_acuerdo;
    }
    public function getId_acuerdo() {
        return $this->id_acuerdo;
    }

    public function setId_arancel($id_arancel) {
        $this->id_arancel = $id_arancel;
    }
    public function getId_arancel() {
        return $this->id_arancel;
    }
    public function setActivo($activo) {
        $this->activo = $activo;
    }
    public function getActivo() {
        return $this->activo;
    }
}

?>
