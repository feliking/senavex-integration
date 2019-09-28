<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class RequisitosModificacion extends Db {
        
    const TABLE = 'requisitos_modificacion';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    private $id_requisitos_modificacion;
    private $campo_empresa;
    private $requisitos;
    
    public function setId_requisitos_modificacion($id_requisitos_modificacion) {
        $this->id_requisitos_modificacion = $id_requisitos_modificacion;
    }
    public function getId_requisitos_modificacion() {
        return $this->id_requisitos_modificacion;
    }

    public function setCampo_empresa($campo_empresa) {
        $this->campo_empresa = $campo_empresa;
    }
    public function getCampo_empresa() {
        return $this->campo_empresa;
    }   
    public function setId_requisitos($id_requisitos) {
        $this->id_requisitos = $id_requisitos;
    }
    public function getId_requisitos() {
        return $this->id_requisitos;
    }
}

?>
