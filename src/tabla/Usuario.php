<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class Usuario extends Db {
        
    const TABLE = 'usuario';
    /*
    public $persona = array();
    public $rol = array();
    
    public static $RELATIONS = array
    (
        'seguridad.persona' => array(self:: BELONGS_TO, 'Persona', 'id'),
        'seguridad.rol' => array(self:: HAS_MANY,'Rol', 'id')
    );
*/
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_usuario;
    private $usuario;
    private $clave;
    private $fecha_creacion;
    private $ultima_modificacion;
    private $id_persona;
    private $ultimo_ingreso;
    private $activo;
    private $id_tipo_usuario;
    
    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = trim($usuario);
    }

    public function getUsuario() {
        return $this->usuario;
    }
    
    public function setClave($clave) {
        $this->clave = trim($clave);
    }

    public function getClave() {
        return $this->clave;
    }
    
    public function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    public function setUltima_modificacion($ultima_modificacion) {
        $this->ultima_modificacion = $ultima_modificacion;
    }

    public function getUltima_modificacion() {
        return $this->ultima_modificacion;
    }

    public function setId_persona($id_persona) {
        $this->id_persona= $id_persona;
    }

    public function getId_persona() {
        return $this->id_persona;
    }

    public function setUltimo_ingreso($ultimo_ingreso) {
        $this->ultimo_ingreso= $ultimo_ingreso;
    }

    public function getUltimo_ingreso() {
        return $this->ultimo_ingreso;
    }
    
    public function setActivo($activo) {
        $this->activo = $activo;
    }

    public function getActivo() {
        return $this->activo;
    }
    public function setId_tipo_usuario($id_tipo_usuario) {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }

    public function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }
   

}

?>
