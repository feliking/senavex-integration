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
class IncidenciaEstado extends Db {
    
    const TABLE = 'incidencia_estado';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_incidencia_estado;
    private $descripcion;
    
    function getId_incidencia_estado() {
        return $this->id_incidencia_estado;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_incidencia_estado($id_incidencia_estado) {
        $this->id_incidencia_estado = $id_incidencia_estado;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
?>
