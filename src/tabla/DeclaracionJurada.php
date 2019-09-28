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

/** CP|Declaracion Jurada|d_j|T **/
class DeclaracionJurada extends Db {
        
    const TABLE = 'declaracion_jurada';

    public $empresa = array();
    public $persona = array();
    //public $servicio_exportador = array();
    public $estado_ddjj = array();
    public $unidad_medida = array();
    public $observaciones_ddjj = array();
    
    public static $RELATIONS = array
    (
        //'elaboracion_incentivo' => array(self:: BELONGS_TO, 'ElaboracionIncentivo', 'id_elaboracion_incentivo'),
        'empresa' => array(self:: BELONGS_TO, 'Empresa', 'id_empresa'),
        'persona' => array(self:: BELONGS_TO, 'Persona', 'id_persona'),
        //'servicio_exportador' => array(self:: BELONGS_TO, 'ServicioExportador', 'id_servicio_exportador'),
        'estado_ddjj' => array(self:: BELONGS_TO, 'EstadoDdjj', 'id_estado_ddjj'),
        'unidad_medida' => array(self:: BELONGS_TO, 'UnidadMedida', 'id_unidad_medida'),
        'observaciones_ddjj'=>array(self:: BELONGS_TO, 'ObservacionesDdjj','id_observaciones_ddjj')
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
    private $descripcion_comercial;
    /** CP|TXT|Caracteristicas|0|F|F|-|-|10|F **/
    private $caracteristicas;
    /** FK|INT|Detalle Arancel|0|F|F|-|-|20|F **/
    private $id_detalle_arancel;
    /** FK|INT|Unidad de Medida|0|T|F|Seleccione Una unidad de Medida|-|20|T **/
    private $id_unidad_medida;
    /** CP|TXT|Otros Costos|0|F|F|-|-|10|F **/
    private $otros_costos;
    /** CP|TXT|Elaboracion Incentivo|0|F|F|-|-|10|F **/
    private $elaboracion_incentivo;
    /** CP|TXT|Proceso Productivo|0|F|F|-|-|10|F **/
    private $proceso_productivo;
    /** CP|DATE|Fecha de Registro|0|T|F|Ingresar fecha de registro|-|19|T **/
    private $fecha_registro;
    /** CP|DATE|Fecha de Revisión|0|T|F|Ingresar fecha de revisión|-|19|T **/
    private $fecha_revision;
    /** CP|TXT|Insumos Importados|0|F|F|-|-|10|F **/
    private $insumos_importados;
    /** CP|BOOL|Es Comercializador?|0|T|F|-|-|10|F **/
    private $comercializador;
    /** CP|TXT|Nombre Tecnico|0|F|F|-|-|10|F **/
    private $nombre_tecnico;
    /** CP|TXT|Aplicacion|0|F|F|-|-|10|F **/
    private $aplicacion;
    /** CP|TXT|Produccion Mensual|0|F|F|-|-|10|F **/
    private $produccion_mensual;
    /** FK|INT|Fabrica|0|F|F|Seleccionar una Fábrica|-|25|T**/
    private $id_fabrica;
    /** CP|TXT|Observaciones Generales|0|F|F|-|-|10|F **/
    private $observacion_general;
    /** CP|INT|Correlativo DDJJ|0|F|F|-|-|10|F **/
    private $correlativo_ddjj;
    /** CP|BOOL|Revisado|0|T|F|-|-|10|F **/
    private $revisado;
    /** FK|INT|Obsercaciones DDJJ|0|T|F|seleccionar una Obsercación|-|10|F **/
    private $id_observaciones_ddjj;
    
    
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
    
    public function setDescripcion_Comercial($descripcion_comercial) {
        $this->descripcion_comercial = $descripcion_comercial;
    }
    public function getDescripcion_Comercial() {
        return $this->descripcion_comercial;
    }
    
    public function setCaracteristicas($caracteristicas) {
        $this->caracteristicas = $caracteristicas;
    }
    public function getCaracteristicas() {
        return $this->caracteristicas;
    }
    
    public function setId_Detalle_Arancel($id_detalle_arancel) {
        $this->id_detalle_arancel = $id_detalle_arancel;
    }
    public function getId_Detalle_Arancel() {
        return $this->id_detalle_arancel;
    }
    
    public function setId_Unidad_Medida($id_unidad_medida) {
        $this->id_unidad_medida = $id_unidad_medida;
    }
    public function getId_Unidad_Medida() {
        return $this->id_unidad_medida;
    }
    
    public function setOtros_Costos($otros_costos) {
        $this->otros_costos = $otros_costos;
    }
    public function getOtros_Costos() {
        return $this->otros_costos;
    }
    
    public function setElaboracion_Incentivo($elaboracion_incentivo) {
        $this->elaboracion_incentivo = $elaboracion_incentivo;
    }
    public function getElaboracion_Incentivo() {
        return $this->elaboracion_incentivo;
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

    public function setInsumos_importados($insumos_importados) {
        $this->insumos_importados = $insumos_importados;
    }
    public function getInsumos_importados() {
        return $this->insumos_importados;
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
    
    public function setId_fabrica($id_fabrica) {
        $this->id_fabrica = $id_fabrica;
    }
    public function getId_fabrica() {
        return $this->id_fabrica;
    }

    public function setObservacion_general($observacion_general) {
        $this->observacion_general = $observacion_general;
    }
    public function getObservacion_general() {
        return $this->observacion_general;
    }
    
    public function setCorrelativo_ddjj($correlativo_ddjj) {
        $this->correlativo_ddjj = $correlativo_ddjj;
    }
    public function getCorrelativo_ddjj() {
        return $this->correlativo_ddjj;
    }

    public function setRevisado($revisado) {
        $this->revisado = $revisado;
    }
    public function getRevisado() {
        return $this->revisado;
    }

    public function setId_observaciones_ddjj($id_observaciones_ddjj) {
        $this->id_observaciones_ddjj = $id_observaciones_ddjj;
    }
    public function getId_observaciones_ddjj() {
        return $this->id_observaciones_ddjj;
    }
    
}

?>
