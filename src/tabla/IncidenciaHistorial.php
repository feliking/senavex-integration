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
class IncidenciaHistorial extends Db {
    
    const TABLE = 'incidencia_historial';
    

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_incidencia_historial;
    private $id_categoria;
    private $id_estado;
    private $id_tecnico;
    private $id_persona;
    private $descripcion;
    private $fecha;
    private $ticket;

    function getId_incidencia_historial() {
        return $this->id_incidencia_historial;
    }

    function getId_categoria() {
        return $this->id_categoria;
    }

    function getId_estado() {
        return $this->id_estado;
    }

    function getId_tecnico() {
        return $this->id_tecnico;
    }

    function getId_persona() {
        return $this->id_persona;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getTicket() {
        return $this->ticket;
    }

    function setId_incidencia_historial($id_incidencia_historial) {
        $this->id_incidencia_historial = $id_incidencia_historial;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    function setId_estado($id_estado) {
        $this->id_estado = $id_estado;
    }

    function setId_tecnico($id_tecnico) {
        $this->id_tecnico = $id_tecnico;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setTicket($ticket) {
        $this->ticket = $ticket;
    }
}
?>
