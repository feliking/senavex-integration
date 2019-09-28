<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class CafePaisDestino extends Db {
        
    const TABLE = 'cafe_pais_destino';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
   
    private $id_cafe_pais_destino;
    private $descripcion;
    private $clave_oic;
    
    function getId_cafe_pais_destino() {
        return $this->id_cafe_pais_destino;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getClave_oic() {
        return $this->clave_oic;
    }

    function setId_cafe_pais_destino($id_cafe_pais_destino) {
        $this->id_cafe_pais_destino = $id_cafe_pais_destino;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setClave_oic($clave_oic) {
        $this->clave_oic = $clave_oic;
    }
}

?>
