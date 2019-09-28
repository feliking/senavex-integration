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
class IncidenciaTipo extends Db {
    
    const TABLE = 'incidencia_tipo';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_incidencia_tipo;
    private $descripcion;
    
    function getId_incidencia_tipo() {
        return $this->id_incidencia_tipo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_incidencia_tipo($id_incidencia_tipo) {
        $this->id_incidencia_tipo = $id_incidencia_tipo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
?>
