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
class FacturaContingenciaAutorizacion extends Db {
    
    const TABLE = 'factura_contingencia_autorizacion';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_factura_contingencia_autorizacion;
    private $numero_autorizacion;
    private $estado;
    private $fecha_registro;
    private $fecha_limite;
    private $id_regional;
    private $id_asistente;
    private $irango;
    private $frango;
    private $utilizados;
    
    function getId_factura_contingencia_autorizacion() {
        return $this->id_factura_contingencia_autorizacion;
    }

    function getNumero_autorizacion() {
        return $this->numero_autorizacion;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha_registro() {
        return $this->fecha_registro;
    }

    function getFecha_limite() {
        return $this->fecha_limite;
    }

    function getId_regional() {
        return $this->id_regional;
    }

    function getId_asistente() {
        return $this->id_asistente;
    }

    function setId_factura_contingencia_autorizacion($id_factura_contingencia_autorizacion) {
        $this->id_factura_contingencia_autorizacion = $id_factura_contingencia_autorizacion;
    }

    function setNumero_autorizacion($numero_autorizacion) {
        $this->numero_autorizacion = $numero_autorizacion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    function setFecha_limite($fecha_limite) {
        $this->fecha_limite = $fecha_limite;
    }

    function setId_regional($id_regional) {
        $this->id_regional = $id_regional;
    }

    function setId_asistente($id_asistente) {
        $this->id_asistente = $id_asistente;
    }
    function getIrango() {
        return $this->irango;
    }

    function getFrango() {
        return $this->frango;
    }

    function setIrango($irango) {
        $this->irango = $irango;
    }

    function setFrango($frango) {
        $this->frango = $frango;
    }
    
    function getUtilizados() {
        return $this->utilizados;
    }

    function setUtilizados($utilizados) {
        $this->utilizados = $utilizados;
    }


}
?>
