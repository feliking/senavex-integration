<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class CafeDestinoTransbordo extends Db {
        
    const TABLE = 'cafe_pais_destino_transbordo';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
   
    private $id_cafe_pais_destino_transbordo;
    private $codigo_pais;
    private $descripcion;
    private $clave_ue;
    private $clave_iso;

    function getId_cafe_pais_destino_transbordo() {
        return $this->id_cafe_pais_destino_transbordo;
    }

    function getCodigo_pais() {
        return $this->codigo_pais;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getClave_ue() {
        return $this->clave_ue;
    }

    function getClave_iso() {
        return $this->clave_iso;
    }

    function setId_cafe_pais_destino_transbordo($id_cafe_pais_destino_transbordo) {
        $this->id_cafe_pais_destino_transbordo = $id_cafe_pais_destino_transbordo;
    }

    function setCodigo_pais($codigo_pais) {
        $this->codigo_pais = $codigo_pais;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setClave_ue($clave_ue) {
        $this->clave_ue = $clave_ue;
    }

    function setClave_iso($clave_iso) {
        $this->clave_iso = $clave_iso;
    }


}

?>
