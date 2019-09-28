<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class DetalleProForma extends Db {
    
    const TABLE = 'detalle_proforma';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    private $id_proforma;
    private $id_servicio_exportador;
    
    function getId_proforma() {
        return $this->id_proforma;
    }

    function getId_servicio_exportador() {
        return $this->id_servicio_exportador;
    }

    function setId_proforma($id_proforma) {
        $this->id_proforma = $id_proforma;
    }

    function setId_servicio_exportador($id_servicio_exportador) {
        $this->id_servicio_exportador = $id_servicio_exportador;
    }




    
}