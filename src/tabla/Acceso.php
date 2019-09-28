<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Acceso extends Db {
    
    const TABLE = 'acceso';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_acceso;
    private $id_usuario;
    private $fecha_acceso;
    private $ip;
    
    public function setId_acceso($id_acceso) {
        $this->id_acceso = $id_acceso;
    }
    public function getId_acceso() {
        return $this->id_acceso;
    }

    public function setId_Usuario($idusuario) {
        $this->id_usuario = $idusuario;
    }
    public function getId_Usuario() {
        return $this->id_usuario;
    }
    
    public function setFecha_Acceso($fecha_acceso) {
        $this->fecha_acceso= $fecha_acceso;
    }
    public function getFecha_Acceso() {
        return $this->fecha_acceso;
    }

    public function setIp($ip) {
        $this->ip = $ip;
    }
    public function getIp() {
        return $this->ip;
    }
    
}

?>
