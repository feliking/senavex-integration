<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class TipoValorInternacional extends Db {
        
    const TABLE = 'tipo_valor_internacional';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_tipo_valor_internacional;
    private $descripcion;
    private $abreviatura;
    
    public function setId_tipo_valor_internacional($id_tipo_valor_internacional) {
        $this->id_tipo_valor_internacional = $id_tipo_valor_internacional;
    }
    public function getId_tipo_valor_internacional() {
        return $this->id_tipo_valor_internacional;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
    public function setAbreviatura($abreviatura) {
        $this->abreviatura = $abreviatura;
    }
    public function getAbreviatura() {
        return $this->abreviatura;
    }
    
}

?>
