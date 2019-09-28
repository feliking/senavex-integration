<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/** 
 *  1 tipo de clase
 *  2 nombre de Empresa
 *  3 Abreviacion del Nombre
 *  4 visible TRUE, False (T , F)
 */

/** CS|Empresa|emp|T **/
class Ciudad extends Db {
    
    const TABLE = 'ciudad';
    

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_ciudad;
    private $descripcion;
    private $id_municipio;
    
    function getId_ciudad() {
        return $this->id_ciudad;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getId_municipio() {
        return $this->id_municipio;
    }

    function setId_ciudad($id_ciudad) {
        $this->id_ciudad = $id_ciudad;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setId_municipio($id_municipio) {
        $this->id_municipio = $id_municipio;
    }



}
?>
