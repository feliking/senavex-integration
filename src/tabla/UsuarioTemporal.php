<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class UsuarioTemporal extends Db {
        
    const TABLE = 'usuario_temporal';
    /* 
    public static $RELATIONS = array
    (
        'seguridad.persona' => array(self:: BELONGS_TO, 'Persona', 'id'),
        'seguridad.rol' => array(self:: HAS_MANY,'Rol', 'id')
    );
*/
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_usuario_temporal;
    private $usuario;
    private $clave;
    private $nombres;
    private $ci;
    private $fechanacimiento;
    private $estado;
    private $email;  
    private $bienvenida; 
    private $fecha_creacion; 
    private $telf; 
    
    public function setId_usuario_temporal($id_usuario_temporal) {
        $this->id_usuario_temporal = $id_usuario_temporal;
    }

    public function getId_usuario_temporal() {
        return $this->id_usuario_temporal;
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
    
    public function setNombres($nombres) {
        $this->nombres = trim($nombres);
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function setCi($ci) {
        $this->ci = trim($ci);
    }

    public function getCi() {
        return $this->ci;
    }

    public function setFechanacimiento($fechanacimiento) {
        $this->fechanacimiento= $fechanacimiento;
    }

    public function getFechanacimiento() {
        return $this->fechanacimiento;
    }

    public function setEstado($estado) {
        $this->estado= $estado;
    }

    public function getEstado() {
        return $this->estado;
    }
    
    public function setEmail($email) {
        $this->email = trim($email);
    }

    public function getEmail() {
        return $this->email;
    }
    
    public function setBienvenida($bienvenida) {
        $this->bienvenida = $bienvenida;
    }

    public function getBienvenida() {
        return $this->bienvenida;
    }
   public function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function getFecha_creacion() {
        return $this->fecha_creacion;
    }
    public function setTelf($telf) {
        $this->telf = $telf;
    }

    public function getTelf() {
        return $this->telf;
    }

}

?>
