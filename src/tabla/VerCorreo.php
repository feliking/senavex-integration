<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class VerCorreo extends Db {
    
    const TABLE = 'ver_correo';


    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_ver_correo;
    private $correo;
    
    function getId_ver_correo(){
        return $this->id_ver_correo;
    }
    function setId_ver_correo($id_ver_correo){
        $this->id_ver_correo=$id_ver_correo;
    }
    function getCorreo(){
        return $this->correo;
    }
    function setCorreo($correo){
        $this->correo=$correo;
    }
}

?>
