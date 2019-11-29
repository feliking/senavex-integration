<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class ComiteApi extends Db {
        
    const TABLE = 'comite_api';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
 

    private $id_comite_api;
    private $id_estado_comite;
    private $fecha_inicio;
    private $fecha_fin;
    private $id_usuario_registro;
    private $fecha_creacion_registro;
    private $nro_comite;
    private $fecha_emision;

    function setId_comite_api($id_comite_api) { $this->id_comite_api = $id_comite_api; }
    function getId_comite_api() { return $this->id_comite_api; }
    function setId_estado_comite($id_estado_comite) { $this->id_estado_comite = $id_estado_comite; }
    function getId_estado_comite() { return $this->id_estado_comite; }
    function setFecha_inicio($fecha_inicio) { $this->fecha_inicio = $fecha_inicio; }
    function getFecha_inicio() { return $this->fecha_inicio; }
    function setFecha_fin($fecha_fin) { $this->fecha_fin = $fecha_fin; }
    function getFecha_fin() { return $this->fecha_fin; }
    function setId_usuario_registro($id_usuario_registro) { $this->id_usuario_registro = $id_usuario_registro; }
    function getId_usuario_registro() { return $this->id_usuario_registro; }
    function setFecha_creacion_registro($fecha_creacion_registro) { $this->fecha_creacion_registro = $fecha_creacion_registro; }
    function getFecha_creacion_registro() { return $this->fecha_creacion_registro; }
    function setNro_comite($nro_comite) { $this->nro_comite = $nro_comite; }
    function getNro_comite() { return $this->nro_comite; }
    function setFecha_emision($fecha_emision) { $this->fecha_emision = $fecha_emision; }
    function getFecha_emision() { return $this->fecha_emision; }


}

?>
