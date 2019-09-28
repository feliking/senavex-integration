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
class Incidencia extends Db {
    
    const TABLE = 'incidencia';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_incidencia;
    private $id_categoria;
    private $id_estado;
    private $id_tecnico;
    private $id_persona;
    private $titulo;
    private $descripcion;
    private $fecha;
    private $ticket;
    
    function getId_incidencia() {
        return $this->id_incidencia;
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

    function getTitulo() {
        return $this->titulo;
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

    function setId_incidencia($id_incidencia) {
        $this->id_incidencia = $id_incidencia;
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

    function setTitulo($titulo) {
        $this->titulo = $titulo;
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
