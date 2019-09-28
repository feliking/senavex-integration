<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class EstadoFactura extends Db {
        
    const TABLE = 'estado_factura';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_estado_factura;
    private $descripcion;
    
    public function setId_estado_factura($id_estado_factura) {
        $this->id_estado_factura = $id_estado_factura;
    }
    public function getId_estado_factura() {
        return $this->id_estado_factura;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    
}

?>
