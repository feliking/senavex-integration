<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class AuditoriaEventos extends Db {
        
    const TABLE = 'auditoria_eventos';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_auditoria_eventos;
    private $id_transaccion_firmada;
    private $id_servicio_exportador;
    private $ip;
    
    public function setId_auditoria_eventos($id_auditoria_eventos) {
        $this->id_auditoria_eventos = $id_auditoria_eventos;
    }
    public function getId_auditoria_eventos() {
        return $this->id_auditoria_eventos;
    }
    public function setId_transaccion_firmada($id_transaccion_firmada) {
        $this->id_transaccion_firmada = $id_transaccion_firmada;
    }
    public function getId_transaccion_firmada() {
        return $this->id_transaccion_firmada;
    }
    public function setId_servicio_exportador($id_servicio_exportador) {
        $this->id_servicio_exportador = $id_servicio_exportador;
    }
    public function getId_servicio_exportador() {
        return $this->id_servicio_exportador;
    }
    public function setIp($ip) {
        $this->ip = $ip;
    }
    public function getIp() {
        return $this->ip;
    }

}

?>
