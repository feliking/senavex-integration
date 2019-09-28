<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class TipoCorreo extends Db {
        
    const TABLE = 'tipo_correo';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_tipo_correo;
    private $asunto;
    
    public function setId_tipo_correo($id_tipo_correo) {
        $this->id_tipo_correo = $id_tipo_correo;
    }
    public function getId_tipo_correo() {
        return $this->id_tipo_correo;
    }

    public function setAsunto($asunto) {
        $this->asunto = $asunto;
    }
    public function getAsunto() {
        return $this->asunto;
    }
    
}

?>
