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
class VerificacionRuex extends Db {
    
    const TABLE = 'verificacion_ruex';
    

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_verificacion_ruex; 
    private $ruex;
    private $razon_social; 
    private $regional;
    private $ultima_fecha_renovacion;
    private $estado;

    function getId_verificacion_ruex() {
        return $this->id_verificacion_ruex;
    }

    function getRuex() {
        return $this->ruex;
    }

    function getRazon_social() {
        return $this->razon_social;
    }

    function getRegional() {
        return $this->regional;
    }

    function getUltima_fecha_renovacion() {
        return $this->ultima_fecha_renovacion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId_verificacion_ruex($id_verificacion_ruex) {
        $this->id_verificacion_ruex = $id_verificacion_ruex;
    }

    function setRuex($ruex) {
        $this->ruex = $ruex;
    }

    function setRazon_social($razon_social) {
        $this->razon_social = $razon_social;
    }

    function setRegional($regional) {
        $this->regional = $regional;
    }

    function setUltima_fecha_renovacion($ultima_fecha_renovacion) {
        $this->ultima_fecha_renovacion = $ultima_fecha_renovacion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }




}
?>
