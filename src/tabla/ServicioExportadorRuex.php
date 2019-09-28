<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class ServicioExportadorRuex extends Db {
        
    const TABLE = 'servicio_exportador_ruex';

    public static $RELATIONS = array
    (
        'sistema_colas'=>array(self::HAS_MANY,'SistemaColas','id_servicio_exportador'),
        'empresa_temporal'=>array(self::BELONGS_TO,'EmpresaTemporal','id_empresa_temporal'),
    );
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_servicio_exportador_ruex;
    private $id_servicio_exportador;
    private $id_usuario_temporal;
    private $id_empresa_temporal;
    
    public function setId_servicio_exportador_ruex($id_servicio_exportador_ruex) {
        $this->id_servicio_exportador_ruex = $id_servicio_exportador_ruex;
    }
    public function getId_servicio_exportador_ruex() {
        return $this->id_servicio_exportador_ruex;
    }

    public function setId_servicio_exportador($id_servicio_exportador) {
        $this->id_servicio_exportador = $id_servicio_exportador;
    }
    public function getId_servicio_exportador() {
        return $this->id_servicio_exportador;
    }

    public function setId_usuario_temporal($id_usuario_temporal) {
        $this->id_usuario_temporal = $id_usuario_temporal;
    }
    public function getId_usuario_temporal() {
        return $this->id_usuario_temporal;
    }
    
    public function setId_empresa_temporal($id_empresa_temporal) {
        $this->id_empresa_temporal = $id_empresa_temporal;
    }
    public function getId_empresa_temporal() {
        return $this->id_empresa_temporal;
    }
    
}

?>
