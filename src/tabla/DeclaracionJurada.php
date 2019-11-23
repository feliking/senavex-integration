<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');
include_once( PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/**
 *  1 tipo de clase
 *  2 nombre de Empresa
 *  3 Abreviacion del Nombre
 *  4 visible TRUE, False (T , F)
 */

/** CP|Declaracion Jurada|d_j|T **/
class DeclaracionJurada extends Db {

    const TABLE = 'declaracion_jurada';

    public $acuerdo = array();
    public $empresa = array();
    public $persona = array();
    public $estado_ddjj = array();
    public $unidad_medida = array();
    public $observaciones_ddjj = array();
    public $comercializadores = array();
    public $insumosnacionales = array();
    public $insumosimportados = array();
    public $ddjjdocumentos = array();
    public $zonasespeciales = array();
    public $partida = array();
    public $arancel = array();
    public $direccion = array();
    public $regional = array();

    public static $RELATIONS = array
    (
        //'elaboracion_incentivo' => array(self:: BELONGS_TO, 'ElaboracionIncentivo', 'id_elaboracion_incentivo'),
      'acuerdo' => array(self:: BELONGS_TO, 'Acuerdo', 'id_acuerdo'),
      'empresa' => array(self:: BELONGS_TO, 'Empresa', 'id_empresa'),
      'persona' => array(self:: BELONGS_TO, 'Persona', 'id_persona'),
      'direccion' => array(self:: BELONGS_TO, 'Direccion', 'id_direccion'),
        //'servicio_exportador' => array(self:: BELONGS_TO, 'ServicioExportador', 'id_servicio_exportador'),
      'estado_ddjj' => array(self:: BELONGS_TO, 'EstadoDdjj', 'id_estado_ddjj'),
      'observaciones_ddjj'=>array(self:: HAS_MANY, 'ObservacionesDdjj','id_ddjj'),
      'comercializadores'=>array(self:: HAS_MANY, 'Comercializador','id_ddjj'),
      'insumosnacionales'=>array(self:: HAS_MANY, 'InsumosNacionales','id_ddjj'),
      'insumosimportados'=>array(self:: HAS_MANY, 'InsumosImportados','id_ddjj'),
      'zonasespeciales'=>array(self:: HAS_MANY, 'DeclaracionJuradaZonasEspeciales','id_ddjj'),
      'ddjjdocumentos'=>array(self:: HAS_MANY, 'DdjjDocumentos','id_ddjj'),
      'partida'=>array(self:: BELONGS_TO, 'Partida','id_partida'),
      'arancel'=>array(self:: HAS_MANY, 'Arancel','id_arancel'),
      'regional' => array(self:: BELONGS_TO, 'Regional', 'id_regional'),
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

    /** PK|INT|ID DDJJ|0|F|F|-|-|10|T **/
    private $id_ddjj;
    /** FK|INT|Empresa|0|T|F|Seleccione una Empresa|-|20|T **/
    private $id_empresa;
    /** FK|INT|Persona|0|T|F|Seleccione Una persona|-|20|T **/
    private $id_persona;
    /** FK|INT|Estado DDJJ|0|T|F|Seleccione una Persona|-|20|T **/
    private $id_estado_ddjj;
    /** FK|INT|-|0|F|F|ServicioExportador|-|20|F **/
    private $id_servicio_exportador;
    /** CP|TXT|Descripcion Comercial|0|F|T|-|-|10|F **/
    private $denominacion_comercial;
    /** CP|TXT|Caracteristicas|0|F|F|-|-|10|F **/
    private $caracteristicas;
    /** FK|INT|Detalle Arancel|0|F|F|-|-|20|F **/
    private $id_unidad_medida;
    /** CP|TXT|Proceso Productivo|0|F|F|-|-|10|F **/
    private $proceso_productivo;
    /** CP|DATE|Fecha de Registro|0|T|F|Ingresar fecha de registro|-|19|T **/
    private $fecha_registro;
    /** CP|DATE|Fecha de Revisión|0|T|F|Ingresar fecha de revisión|-|19|T **/
    private $fecha_revision;
    /** CP|TXT|Insumos Importados|0|F|F|-|-|10|F **/
    private $comercializador;
    /** CP|TXT|Nombre Tecnico|0|F|F|-|-|10|F **/
    private $nombre_tecnico;
    /** CP|TXT|Aplicacion|0|F|F|-|-|10|F **/
    private $aplicacion;
    /** CP|TXT|Produccion Mensual|0|F|F|-|-|10|F **/
    private $produccion_mensual;
    /** FK|INT|Fabrica|0|F|F|Seleccionar una Fábrica|-|25|T**/
    private $id_direccion;
    /** CP|TXT|Observaciones Generales|0|F|F|-|-|10|F **/
    private $observacion_general;
    /** CP|BOOL|Revisado|0|T|F|-|-|10|F **/
    private $revisado;
    /** FK|INT|Obsercaciones DDJJ|0|T|F|seleccionar una Obsercación|-|10|F **/
    private $id_acuerdo;
    private $id_observaciones_ddjj;
    private $valor_mano_obra;
    private $sobrevalor_mano_obra;
    private $valor_total_insumosnacional;
    private $sobrevalor_total_insumosnacional;
    private $valor_total_insumosimportados;
    private $sobrevalor_total_insumosimportados;
    private $fecha_vencimiento;
    private $fecha_vigencia;
    private $vigencia;
    private $detalle_otros;
    private $codigo;
    private $se_beneficia;
    private $cumple;
    private $id_criterios;
    private $id_arancel;
    private $correlativo_ddjj;
    private $id_partida;
    private $id_partidas_acuerdo;
    private $reo;
    private $observacion_ddjj;
    private $muestra;
    private $id_asistente;
    private $valor_fob;
    private $sobrevalor_fob;
    private $valor_exw;
    private $sobrevalor_exw;
    private $valor_frontera;
    private $sobrevalor_frontera;
    private $fecha_limite_revision;
    private $fecha_limite_cancelacion;
    private $id_regional;
    private $complemento;
    private $revisado_uco;
    private $aprobado_uco;


    public function setId_ddjj($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_ddjj() {
        return $this->id_ddjj;
    }

    public function setId_Empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getId_Empresa() {
        return $this->id_empresa;
    }

    public function setId_Persona($id_persona) {
        $this->id_persona = $id_persona;
    }
    public function getId_Persona() {
        return $this->id_persona;
    }

    public function setId_estado_ddjj($id_estado_ddjj) {
        $this->id_estado_ddjj = $id_estado_ddjj;
    }
    public function getId_estado_ddjj() {
        return $this->id_estado_ddjj;
    }
    public function setId_Servicio_Exportador($id_servicio_exportador) {
        $this->id_servicio_exportador = $id_servicio_exportador;
    }
    public function getId_Servicio_Exportador() {
        return $this->id_servicio_exportador;
    }

    public function setDenominacion_Comercial($denominacion_comercial) {
        $this->denominacion_comercial = $denominacion_comercial;
    }
    public function getDenominacion_Comercial() {
        return $this->denominacion_comercial;
    }

    public function setCaracteristicas($caracteristicas) {
        $this->caracteristicas = $caracteristicas;
    }
    public function getCaracteristicas() {
        return $this->caracteristicas;
    }

    public function setId_Unidad_Medida($id_unidad_medida) {
        $this->id_unidad_medida = $id_unidad_medida;
    }
    public function getId_Unidad_Medida() {
        return $this->id_unidad_medida;
    }

    public function setProceso_Productivo($proceso_productivo) {
        $this->proceso_productivo = $proceso_productivo;
    }
    public function getProceso_Productivo() {
        return $this->proceso_productivo;
    }

    public function setFecha_Registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }
    public function getFecha_Registro() {
        return $this->fecha_registro;
    }

    public function setFecha_Revision($fecha_revision) {
        $this->fecha_revision= $fecha_revision;
    }
    public function getFecha_Revision() {
        return $this->fecha_revision;
    }

    public function setComercializador($comercializador) {
        $this->comercializador = $comercializador;
    }
    public function getComercializador() {
        return $this->comercializador;
    }

    public function setNombre_tecnico($nombre_tecnico) {
        $this->nombre_tecnico = $nombre_tecnico;
    }
    public function getNombre_tecnico() {
        return $this->nombre_tecnico;
    }

    public function setAplicacion($aplicacion) {
        $this->aplicacion = $aplicacion;
    }
    public function getAplicacion() {
        return $this->aplicacion;
    }

    public function setProduccion_mensual($produccion_mensual) {
        $this->produccion_mensual = $produccion_mensual;
    }
    public function getProduccion_mensual() {
        return $this->produccion_mensual;
    }

    public function setId_direccion($id_direccion) {
        $this->id_direccion = $id_direccion;
    }
    public function getId_direccion() {
        return $this->id_direccion;
    }

    public function setObservacion_general($observacion_general) {
        $this->observacion_general = $observacion_general;
    }
    public function getObservacion_general() {
        return $this->observacion_general;
    }

    public function setRevisado($revisado) {
        $this->revisado = $revisado;
    }
    public function getRevisado() {
        return $this->revisado;
    }
    public function setId_acuerdo($id_acuerdo) {
        $this->id_acuerdo = $id_acuerdo;
    }
    public function getId_acuerdo() {
        return $this->id_acuerdo;
    }
    public function setId_observaciones_ddjj($id_observaciones_ddjj) {
        $this->id_observaciones_ddjj = $id_observaciones_ddjj;
    }
    public function getId_observaciones_ddjj() {
        return $this->id_observaciones_ddjj;
    }
    public function setValor_mano_obra($valor_mano_obra) {
        $this->valor_mano_obra = $valor_mano_obra;
    }
    public function getValor_mano_obra() {
        return $this->valor_mano_obra;
    }
    public function setSobrevalor_mano_obra($sobrevalor_mano_obra) {
        $this->sobrevalor_mano_obra = $sobrevalor_mano_obra;
    }
    public function getSobrevalor_mano_obra() {
        return $this->sobrevalor_mano_obra;
    }
    public function setValor_total_insumosnacional($valor_total_insumosnacional) {
        $this->valor_total_insumosnacional = $valor_total_insumosnacional;
    }
    public function getValor_total_insumosnacional() {
        return $this->valor_total_insumosnacional;
    }
    public function setSobrevalor_total_insumosnacional($sobrevalor_total_insumosnacional) {
        $this->sobrevalor_total_insumosnacional = $sobrevalor_total_insumosnacional;
    }
    public function getSobrevalor_total_insumosnacional() {
        return $this->sobrevalor_total_insumosnacional;
    }
    public function setValor_total_insumosimportados($valor_total_insumosimportados) {
        $this->valor_total_insumosimportados = $valor_total_insumosimportados;
    }
    public function getValor_total_insumosimportados() {
        return $this->valor_total_insumosimportados;
    }
    public function setSobrevalor_total_insumosimportados($sobrevalor_total_insumosimportados) {
        $this->sobrevalor_total_insumosimportados = $sobrevalor_total_insumosimportados;
    }
    public function getSobrevalor_total_insumosimportados() {
        return $this->sobrevalor_total_insumosimportados;
    }
    public function setFecha_vencimiento($fecha_vencimiento) {
        $this->fecha_vencimiento = $fecha_vencimiento;
    }
    public function getFecha_vencimiento() {
        return $this->fecha_vencimiento;
    }
    public function setFecha_vigencia($fecha_vigencia) {
        $this->fecha_vigencia = $fecha_vigencia;
    }
    public function getFecha_vigencia() {
        return $this->fecha_vigencia;
    }
    public function setVigencia($vigencia) {
        $this->vigencia = $vigencia;
    }
    public function getVigencia() {
        return $this->vigencia;
    }
    public function setDetalle_otros($detalle_otros) {
        $this->detalle_otros = $detalle_otros;
    }
    public function getDetalle_otros() {
        return $this->detalle_otros;
    }
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    public function getCodigo() {
        return $this->codigo;
    }
    public function setSe_beneficia($se_beneficia) {
        $this->se_beneficia = $se_beneficia;
    }
    public function getSe_beneficia() {
        return $this->se_beneficia;
    }
    public function setCumple($cumple) {
        $this->cumple = $cumple;
    }
    public function getCumple() {
        return $this->cumple;
    }
    public function setId_criterios($id_criterios) {
        $this->id_criterios = $id_criterios;
    }
    public function getId_criterios() {
        return $this->id_criterios;
    }
    public function setCorrelativo_ddjj($correlativo_ddjj) {
        $this->correlativo_ddjj = $correlativo_ddjj;
    }
    public function getCorrelativo_ddjj() {
        return $this->correlativo_ddjj;
    }
    public function setId_arancel($id_arancel) {
        $this->id_arancel = $id_arancel;
    }
    public function getId_arancel() {
        return $this->id_arancel;
    }
    public function setId_partida($id_partida) {
        $this->id_partida = $id_partida;
    }
    public function getId_partida() {
        return $this->id_partida;
    }
    public function setId_partidas_acuerdo($id_partidas_acuerdo) {
        $this->id_partidas_acuerdo = $id_partidas_acuerdo;
    }
    public function getId_partidas_acuerdo() {
        return $this->id_partidas_acuerdo;
    }
    public function setReo($reo) {
        $this->reo = $reo;
    }
    public function getReo() {
        return $this->reo;
    }
    public function setObservacion_ddjj($observacion_ddjj) {
        $this->observacion_ddjj = $observacion_ddjj;
    }
    public function getObservacion_ddjj() {
        return $this->observacion_ddjj;
    }
    public function setMuestra($muestra) {
        $this->muestra = $muestra;
    }
    public function getMuestra() {
        return $this->muestra;
    }
    public function setId_asistente($id_asistente) {
        $this->id_asistente = $id_asistente;
    }
    public function getId_asistente() {
        return $this->id_asistente;
    }
    public function setValor_fob($valor_fob) {
        $this->valor_fob = $valor_fob;
    }
    public function getValor_fob() {
        return $this->valor_fob;
    }
    public function setSobrevalor_fob($sobrevalor_fob) {
        $this->sobrevalor_fob = $sobrevalor_fob;
    }
    public function getSobrevalor_fob() {
        return $this->sobrevalor_fob;
    }
    public function getSobrevalor_fob_numeric() {
        return FuncionesGenerales::getNumberFormat($this->sobrevalor_fob);
    }
    public function setValor_exw($valor_exw) {
        $this->valor_exw = $valor_exw;
    }
    public function getValor_exw() {
        return $this->valor_exw;
    }
    public function getValor_exw_numeric() {
        return FuncionesGenerales::getNumberFormat($this->valor_exw);
    }
    public function setSobrevalor_exw($sobrevalor_exw) {
        $this->sobrevalor_exw = $sobrevalor_exw;
    }
    public function getSobrevalor_exw() {
        return $this->sobrevalor_exw;
    }
    public function setValor_frontera($valor_frontera) {
        $this->valor_frontera = $valor_frontera;
    }
    public function getValor_frontera() {
        return $this->valor_frontera;
    }
    public function setSobrevalor_frontera($sobrevalor_frontera) {
        $this->sobrevalor_frontera = $sobrevalor_frontera;
    }
    public function getSobrevalor_frontera() {
        return $this->sobrevalor_frontera;
    }
    public function setFecha_limite_revision($fecha_limite_revision) {
        $this->fecha_limite_revision = $fecha_limite_revision;
    }
    public function getFecha_limite_revision() {
        return $this->fecha_limite_revision;
    }
    public function setFecha_limite_cancelacion($fecha_limite_cancelacion) {
        $this->fecha_limite_cancelacion = $fecha_limite_cancelacion;
    }
    public function getFecha_limite_cancelacion() {
        return $this->fecha_limite_cancelacion;
    }
    public function getId_regional(){
        return $this->id_regional;
    }
    public function setId_regional($id_regional){
        $this->id_regional=$id_regional;
    }
    public function getComplemento(){
        return $this->complemento;
    }
    public function setComplemento($complemento){
        $this->complemento=$complemento;
    }
    function getRevisado_uco() {
        return $this->revisado_uco;
    }

    function getAprobado_uco() {
        return $this->aprobado_uco;
    }

    function setRevisado_uco($revisado_uco) {
        $this->revisado_uco = $revisado_uco;
    }

    function setAprobado_uco($aprobado_uco) {
        $this->aprobado_uco = $aprobado_uco;
    }

}

?>
