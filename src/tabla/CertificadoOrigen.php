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

/** CP|Certificado de Origen|c_o|T **/
class CertificadoOrigen extends Db {
        
    const TABLE = 'certificado_origen';

    public $acuerdo = array();
    public $pais = array();
    public $empresa = array();
    public $estado_co = array();
    public $tipo_co = array();
    public $regional = array();
    public $persona = array();
    
    public static $RELATIONS = array
    (
        'acuerdo' => array(self:: BELONGS_TO, 'Acuerdo', 'id_acuerdo'),
        'pais' => array(self:: BELONGS_TO, 'Pais', 'id_pais'),
        'empresa' => array(self:: BELONGS_TO, 'Empresa', 'id_empresa'),
        'estado_co' => array(self:: BELONGS_TO, 'EstadoCO', 'id_estado_co'),
        'tipo_co' => array(self:: BELONGS_TO, 'TipoCertificadoOrigen', 'id_tipo_co'),
        'regional' => array(self:: BELONGS_TO, 'Regional', 'id_regional'),
        'persona' => array(self:: BELONGS_TO, 'Persona', 'id_persona')
    );
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    
    /** 1 llave primaria, foranea o campo (PK,FK,CP) | 
     *  2 tipo de campo(DATE,INT,FLOAT,TXT,BOOL,NUMERIC) |
     *  3 Nombre para mostrar |
     *  4 grupos que pueden ver el atributo(0,1,2,3,5..) |
     *  5 se muestra el atributo en la vista (TRUE=T,FALSE=F)|
     *  6 el atributo almacena una descripcion (TRUE,FALSE) |
     *  7 texto required ( '-' si no tiene texto para mostrar)
     *  8 los valores de esta variable dependen de otra
     *  9 size 
     *  10 visible en el reporte (TRUE, FALSE)
     * **/
    
    /** 1|2|3|4|5|6|7|8|9|10 **/
    
    /** PK|INT|Nro C.O.|0|F|F|-|-|10|T **/
    private $id_certificado_origen;
    
    /** FK|INT|Acuerdo|0|T|F|Seleccione Un Acuerdo|-|17|T **/
    private $id_acuerdo;
    
    /** FK|INT|Pais|0|T|F|Seleccione un Pais|-|25|T **/
    public $id_pais;
    
    /** FK|INT|Persona|0|T|F|Seleccione una Persona|-|30|T **/
    private $id_persona;
    
    /** FK|INT|Empresa|0|T|F|Seleccione una Empresa|-|30|T **/
    private $id_empresa;
    
    /** CP|NUMERIC|Vigencia del C.O.|0|T|F|Fecha Vigencia|-|10|T **/
    private $vigencia;
    
    /** FK|INT|Estado|0|T|F|Estado del C.O|-|17|T **/
    private $id_estado_co;
    
    /** CP|DATE|Fecha de llenado|0|T|F|Fecha de Llenado de C.O.|-|17|T **/
    private $fecha_llenado;
    
    /** CP|DATE|Fecha de revisión|0|T|F|Fecha de revisión del C.O.|-|17|F **/
    private $fecha_revision;
    
    /** CP|DATE|Fecha de Emisión|0|T|F|Fecha de Emisión del C.O.|-|17|T **/
    private $fecha_emision;
    
    /** CP|DATE|Fecha Fin|0|T|F|Fecha de Fin del C.O.|-|17|F **/
    private $fecha_fin;
    
    /** CP|NUMERIC|Valor Fob|0|T|F|Valor FOB|-|17|T **/
    private $valor_fob_total;
    
    /** FK|INT|Tipo de C.O.|0|T|F|Seleccione Tipo de C.O.|-|17|T **/
    public $id_tipo_co;
    
    /** FK|INT|Regional|0|T|F|Seleccione una Regional|-|23|T **/
    private $id_regional;
    
    /** FK|INT|-|0|F|F|-|-|6|F **/
    private $id_servicio_exportador;
    
    /** CP|TXT|Observaciones del Certificador|0|F|F|-|-|20|F **/
    private $observaciones_certificador;
    
    /** CP|BOOL|Entregado|0|F|F|-|-|6|F **/
    private $entregado;
    
    /** CP|DATE|Fecha Exportación|0|T|F|Ingrese fecha de Exportación|-|17|T **/
    private $fecha_exportacion;
    
    /** CP|BOOL|Revisado|0|F|F|-|-|6|F **/
    private $revisado;
    
    public function setId_certificado_origen($id_certificado_origen) {
        $this->id_certificado_origen = $id_certificado_origen;
    }
    public function getId_certificado_origen() {
        return $this->id_certificado_origen;
    }

    public function setId_acuerdo($id_acuerdo) {
        $this->id_acuerdo = $id_acuerdo;
    }
    public function getId_acuerdo() {
        return $this->id_acuerdo;
    }
    
    public function setId_pais($id_pais) {
        $this->id_pais = $id_pais;
    }
    public function getId_pais() {
        return $this->id_pais;
    }
    
    public function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }
    public function getId_persona() {
        return $this->id_persona;
    }
    
    public function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getId_empresa() {
        return $this->id_empresa;
    }

    public function setVigencia($vigencia) {
        $this->vigencia = $vigencia;
    }
    public function getVigencia() {
        return $this->vigencia;
    }

    public function setId_estado_co($id_estado_co) {
        $this->id_estado_co = $id_estado_co;
    }
    public function getId_estado_co() {
        return $this->id_estado_co;
    }

    public function setFecha_llenado($fecha_llenado) {
        $this->fecha_llenado = $fecha_llenado;
    }
    public function getFecha_llenado() {
        return $this->fecha_llenado;
    }

    public function setFecha_revision($fecha_revision) {
        $this->fecha_revision = $fecha_revision;
    }
    public function getFecha_revision() {
        return $this->fecha_revision;
    }

    public function setFecha_emision($fecha_emision) {
        $this->fecha_emision = $fecha_emision;
    }
    public function getFecha_emision() {
        return $this->fecha_emision;
    }

    public function setFecha_fin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }
    public function getFecha_fin() {
        return $this->fecha_fin;
    }

    public function setValor_fob_total($valor_fob_total) {
        $this->valor_fob_total = $valor_fob_total;
    }
    public function getValor_fob_total() {
        return $this->valor_fob_total;
    }

    public function setId_tipo_co($id_tipo_co) {
        $this->id_tipo_co = $id_tipo_co;
    }
    public function getId_tipo_co() {
        return $this->id_tipo_co;
    }

    public function setId_regional($id_regional) {
        $this->id_regional = $id_regional;
    }
    public function getId_regional() {
        return $this->id_regional;
    }

    public function setId_servicio_exportador($id_servicio_exportador) {
        $this->id_servicio_exportador = $id_servicio_exportador;
    }
    public function getId_servicio_exportador() {
        return $this->id_servicio_exportador;
    }

    public function setObservaciones_certificador($observaciones_certificador) {
        $this->observaciones_certificador = $observaciones_certificador;
    }
    public function getObservaciones_certificador() {
        return $this->observaciones_certificador;
    }

    public function setEntregado($entregado) {
        $this->entregado = $entregado;
    }
    public function getEntregado() {
        return $this->entregado;
    }
    
    public function setFecha_exportacion($fecha_exportacion) {
        $this->fecha_exportacion = $fecha_exportacion;
    }
    public function getFecha_exportacion() {
        return $this->fecha_exportacion;
    }

    public function setRevisado($revisado) {
        $this->revisado = $revisado;
    }
    public function getRevisado() {
        return $this->revisado;
    }
}

?>
