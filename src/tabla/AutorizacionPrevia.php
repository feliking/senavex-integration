<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class AutorizacionPrevia extends Db {
        
    const TABLE = 'autorizacion_previa';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
private $id_autorizacion_previa;
private $id_pais_origen;
private $id_pais_procedencia;
private $id_departamento_destino;
private $origen_recursos;
private $entidad_bancaria;
private $numero_cuenta;
private $tipo_cuenta;
private $tipo_cambio;
private $persona_autorizada;
private $fecha_registro;
private $fecha_revision;
private $fecha_resultado;
private $estado;
private $id_empresa_importador;
private $observaciones;
private $id_usuario_aprob;
private $cantidad_total;
private $peso_total;
private $valor_total;
private $nro_serie;
private $id_comite_api;




function setId_autorizacion_previa($id_autorizacion_previa) { $this->id_autorizacion_previa = $id_autorizacion_previa; }
function getId_autorizacion_previa() { return $this->id_autorizacion_previa; }
function setId_pais_origen($id_pais_origen) { $this->id_pais_origen = $id_pais_origen; }
function getId_pais_origen() { return $this->id_pais_origen; }
function setId_pais_procedencia($id_pais_procedencia) { $this->id_pais_procedencia = $id_pais_procedencia; }
function getId_pais_procedencia() { return $this->id_pais_procedencia; }
function setId_departamento_destino($id_departamento_destino) { $this->id_departamento_destino = $id_departamento_destino; }
function getId_departamento_destino() { return $this->id_departamento_destino; }
function setOrigen_recursos($origen_recursos) { $this->origen_recursos = $origen_recursos; }
function getOrigen_recursos() { return $this->origen_recursos; }
function setEntidad_bancaria($entidad_bancaria) { $this->entidad_bancaria = $entidad_bancaria; }
function getEntidad_bancaria() { return $this->entidad_bancaria; }
function setNumero_cuenta($numero_cuenta) { $this->numero_cuenta = $numero_cuenta; }
function getNumero_cuenta() { return $this->numero_cuenta; }
function setTipo_cuenta($tipo_cuenta) { $this->tipo_cuenta = $tipo_cuenta; }
function getTipo_cuenta() { return $this->tipo_cuenta; }
function setTipo_cambio($tipo_cambio) { $this->tipo_cambio = $tipo_cambio; }
function getTipo_cambio() { return $this->tipo_cambio; }
function setPersona_autorizada($persona_autorizada) { $this->persona_autorizada = $persona_autorizada; }
function getPersona_autorizada() { return $this->persona_autorizada; }
function setFecha_registro($fecha_registro) { $this->fecha_registro = $fecha_registro; }
function getFecha_registro() { return $this->fecha_registro; }
function setFecha_revision($fecha_revision) { $this->fecha_revision = $fecha_revision; }
function getFecha_revision() { return $this->fecha_revision; }
function setFecha_resultado($fecha_resultado) { $this->fecha_resultado = $fecha_resultado; }
function getFecha_resultado() { return $this->fecha_resultado; }
function setEstado($estado) { $this->estado = $estado; }
function getEstado() { return $this->estado; }
function setId_empresa_importador($id_empresa_importador) { $this->id_empresa_importador = $id_empresa_importador; }
function getId_empresa_importador() { return $this->id_empresa_importador; }
function setObservaciones($observaciones) { $this->observaciones = $observaciones; }
function getObservaciones() { return $this->observaciones; }
function setId_usuario_aprob($id_usuario_aprob) { $this->id_usuario_aprob = $id_usuario_aprob; }
function getId_usuario_aprob() { return $this->id_usuario_aprob; }
function setCantidad_total($cantidad_total) { $this->cantidad_total = $cantidad_total; }
function getCantidad_total() { return $this->cantidad_total; }
function setPeso_total($peso_total) { $this->peso_total = $peso_total; }
function getPeso_total() { return $this->peso_total; }
function setValor_total($valor_total) { $this->valor_total = $valor_total; }
function getValor_total() { return $this->valor_total; }
function setNro_serie($nro_serie) { $this->nro_serie = $nro_serie; }
function getNro_serie() { return $this->nro_serie; }
function setId_comite_api($id_comite_api) { $this->id_comite_api = $id_comite_api; }
function getId_comite_api() { return $this->id_comite_api; }


    
}

?>
