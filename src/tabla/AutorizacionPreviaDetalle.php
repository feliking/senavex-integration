<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class AutorizacionPreviaDetalle extends Db {
        
    const TABLE = 'autorizacion_previa_detalle';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    


private $id_autorizacion_previa_detalle;
private $codigo_nandina;
private $descripcion_arancelaria;
private $descripcion_comercial;
private $pais_origen;
private $cantidad;
private $unidad_medida;
private $peso;
private $precio_unitario_fob;
private $fob;
private $valor_fob_total_divisa;
private $precio_unitario_fob_divisa;
private $id_autorizacion_previa;

function setId_autorizacion_previa_detalle($id_autorizacion_previa_detalle) { $this->id_autorizacion_previa_detalle = $id_autorizacion_previa_detalle; }
function getId_autorizacion_previa_detalle() { return $this->id_autorizacion_previa_detalle; }
function setCodigo_nandina($codigo_nandina) { $this->codigo_nandina = $codigo_nandina; }
function getCodigo_nandina() { return $this->codigo_nandina; }
function setDescripcion_arancelaria($descripcion_arancelaria) { $this->descripcion_arancelaria = $descripcion_arancelaria; }
function getDescripcion_arancelaria() { return $this->descripcion_arancelaria; }
function setDescripcion_comercial($descripcion_comercial) { $this->descripcion_comercial = $descripcion_comercial; }
function getDescripcion_comercial() { return $this->descripcion_comercial; }
function setPais_origen($pais_origen) { $this->pais_origen = $pais_origen; }
function getPais_origen() { return $this->pais_origen; }
function setCantidad($cantidad) { $this->cantidad = $cantidad; }
function getCantidad() { return $this->cantidad; }
function setUnidad_medida($unidad_medida) { $this->unidad_medida = $unidad_medida; }
function getUnidad_medida() { return $this->unidad_medida; }
function setPeso($peso) { $this->peso = $peso; }
function getPeso() { return $this->peso; }
function setPrecio_unitario_fob($precio_unitario_fob) { $this->precio_unitario_fob = $precio_unitario_fob; }
function getPrecio_unitario_fob() { return $this->precio_unitario_fob; }
function setFob($fob) { $this->fob = $fob; }
function getFob() { return $this->fob; }
function setValor_fob_total_divisa($valor_fob_total_divisa) { $this->valor_fob_total_divisa = $valor_fob_total_divisa; }
function getValor_fob_total_divisa() { return $this->valor_fob_total_divisa; }
function setPrecio_unitario_fob_divisa($precio_unitario_fob_divisa) { $this->precio_unitario_fob_divisa = $precio_unitario_fob_divisa; }
function getPrecio_unitario_fob_divisa() { return $this->precio_unitario_fob_divisa; }
function setId_autorizacion_previa($id_autorizacion_previa) { $this->id_autorizacion_previa = $id_autorizacion_previa; }
function getId_autorizacion_previa() { return $this->id_autorizacion_previa; }


    
}

?>
