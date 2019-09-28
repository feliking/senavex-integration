<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class DepositoTipo extends Db {
        
    const TABLE = 'deposito_tipo';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_deposito_tipo;
    private $descripcion;
    private $habilitado;
    
    function getId_deposito_tipo() {
        return $this->id_deposito_tipo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getHabilitado() {
        return $this->habilitado;
    }

    function setId_deposito_tipo($id_deposito_tipo) {
        $this->id_deposito_tipo = $id_deposito_tipo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setHabilitado($habilitado) {
        $this->habilitado = $habilitado;
    }


}

?>
