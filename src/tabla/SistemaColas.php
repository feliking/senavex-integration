<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class SistemaColas extends Db {
        
    const TABLE = 'sistema_colas';
    
    public static $RELATIONS = array
    (
        'servicio_exportador'=>array(self::BELONGS_TO,'ServicioExportador','id_servicio_exportador'),
        'servicio_exportador_ruex'=>array(self::BELONGS_TO,'ServicioExportadorRuex','id_servicio_exportador'),
    );
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_cola;
    private $id_servicio_exportador;
    private $id_asistente;
    private $valoracion;
    private $atendido;
    
    public function setId_Cola($id_cola) {
        $this->id_cola = $id_cola;
    }
    public function getId_Cola() {
        return $this->id_cola;
    }

    public function setId_Servicio_Exportador($id_servicio_exportador) {
        $this->id_servicio_exportador = $id_servicio_exportador;
    }
    public function getId_Servicio_Exportador() {
        return $this->id_servicio_exportador;
    }

    public function setId_Asistente($id_asistente) {
        $this->id_asistente = $id_asistente;
    }
    public function getId_Asistente() {
        return $this->id_asistente;
    }
    
    public function setValoracion($valoracion) {
        $this->valoracion = $valoracion;
    }
    public function getValoracion() {
        return $this->valoracion;
    }
    
    public function setAtendido($atendido) {
        $this->atendido = $atendido;
    }
    public function getAtendido() {
        return $this->atendido;
    }
   
    
}

?>
