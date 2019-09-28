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

/** CP|Cafe Certificado|cf_br|T **/
class CafeBorrador extends Db {
        
    const TABLE = 'cafe_borrador';
    
    public $pais = array();//
    public $puerto = array();//
    public $pais_productor = array();
    public $pais_destino = array();
    public $pais_transbordo = array();
    public $medio_transporte = array();
    public $tipo_embalaje = array();
    public $unidad_medida = array();
    public $cafe_descripcion = array();
    public $norma_calidad = array();
    public $caracteristica_especial = array();
    public $sistema_armonizado = array();
    public $moneda = array();
    public $cafe_importador = array();
    
    public $organico = array();
    public $cafe_verde = array();
    public $cafe_soluble = array();
    public $descafeinado = array();
    
    public $estado = array();
    
    public static $RELATIONS = array
    (
        'pais' => array(self:: BELONGS_TO, 'CafePais', 'id_cafe_pais'),
        'puerto' => array(self:: BELONGS_TO, 'CafePuerto', 'id_cafe_puerto'),
        'pais_productor' => array(self:: BELONGS_TO, 'CafePais', 'id_cafe_pais'),
        'pais_destino' => array(self:: BELONGS_TO, 'CafePais', 'id_cafe_pais'),
        'pais_transbordo' => array(self:: BELONGS_TO, 'CafePais', 'id_cafe_pais'),
        'medio_transporte' => array(self:: BELONGS_TO, 'CafeMedioTransporte', 'id_cafe_medio_transporte'),
        'tipo_embalaje' => array(self:: BELONGS_TO, 'CafeTipoEmbalaje', 'id_cafe_tipo_embalaje'),
        'unidad_medida' => array(self:: BELONGS_TO, 'CafeUnidadMedida', 'id_cafe_unidad_medida'),
        'cafe_descripcion' => array(self:: BELONGS_TO, 'CafeDescripcion', 'id_cafe_descripcion'),
        'norma_calidad' => array(self:: BELONGS_TO, 'CafeNorma', 'id_cafe_norma'),
        'caracteristica_especial' => array(self:: BELONGS_TO, 'CafeCEspecial', 'id_cafe_cespecial'),
        'sistema_armonizado' => array(self:: BELONGS_TO, 'CafeSistemaArmonizado', 'id_cafe_sistema_armonizado'),
        'moneda' => array(self:: BELONGS_TO, 'CafeMoneda', 'id_cafe_moneda'),
        'cafe_importador' => array(self:: BELONGS_TO, 'CafeImportador', 'id_cafe_importador'),
        
        'organico' => array(self:: BELONGS_TO, 'CafeElaboracion', 'id_cafe_elaboracion'),
        'cafe_verde' => array(self:: BELONGS_TO, 'CafeElaboracion', 'id_cafe_elaboracion'),
        'cafe_soluble' => array(self:: BELONGS_TO, 'CafeElaboracion', 'id_cafe_elaboracion'),
        'descafeinado' => array(self:: BELONGS_TO, 'CafeElaboracion', 'id_cafe_elaboracion'),
        
        'estado' => array(self:: BELONGS_TO, 'CafeEstado', 'id_cafe_estado'),
    );
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    /** 1 llave primaria, foranea o campo (PK,FK,CP) | 
     *  2 tipo de campo(DATE,INT,FLOAT,TXT,BOOL) |
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
    
    /** PK|INT|Id Cafe Certificado|0|F|F|-|-|10|T **/
    private $id_cafe_certificado;
    
    /** FK|INT|Id Exportador Ruex|0|F|F|-|-|10|F **/
    private $id_exportador_ruex;
    
    /** CP|TXT|Direccion para Notificaciones|0|F|F|-|-|10|F **/
    private $direccion_notificaciones;
    
    /** CP|NUMERIC|Nro Interno|0|F|F|-|-|10|T **/
    private $nro_interno ; 
    
    /** FK|INT|Pais|0|T|F|Seleccione un Pais|-|15|T **/
    private $id_pais ;//
    
    /** FK|INT|Puerto|0|T|F|Seleccione un Puerto|-|15|T **/
    private $id_puerto ;//
    
    /** CP|NUMERIC|Nro Serial|0|F|F|-|-|10|F **/
    private $nro_serial ;
    
    /** FK|INT|Pais Productor|0|T|F|Seleccione un Pais Productor|-|10|F **/
    private $id_pais_productor ;//
    
    /** FK|INT|Pais Destino|0|T|F|Seleccione un Pais de Destino|-|12|T **/
    private $id_pais_destino ;//
    
    /** CP|DATE|Fecha de Exportacion|0|T|F|Ingrese Fecha de Exportación|-|17|T **/
    private $fecha_exportacion ;
    
    /** FK|INT|Pais de Transbordo|0|T|F|Seleccione el Pais de Transbordo|-|15|T **/
    private $id_pais_transbordo ;//
    
    /** FK|INT|Medio de Transporte|0|F|T|Seleccione un Medio de Transporte|-|15|T **/
    private $id_medio_transporte ;//
    
    /** CP|TXT|Marcas OIC|0|F|F|-|-|15|T **/
    private $marca_oic  ;
    
    /** CP|TXT|Otras Marcas OIC|0|F|F|-|-|-|0 **/
    private $otras_marcas_oic ;
    
    /** FK|INT|Tipo de Embalaje|0|T|F|Seleccione un tipode Embalaje|-|12|T **/
    private $id_tipo_embalaje ;//
    
    /** CP|NUMERIC|Peso Neto|0|T|F|Ingrese Peso Neto|-|20|T **/
    private $peso_neto ;
    
    /** FK|INT|Unidad de Medida|0|T|F|Seleccione Unidad de Medida|-|10|T **/
    private $id_unidad_medida ;//
    
    /** FK|INT|Cafe Descripcion|0|F|F|Seleccione una Descripcion|-|10|F **/
    private $id_cafe_descripcion ;//
    
    /** FK|INT|Norma de Calidad|0|T|F|Seleccione una Norma de Calidad|-|10|F **/
    private $id_norma_calidad ;//
    
    /** FK|INT|Caracteristica Especial|0|T|F|Seleccione una Caracteristica Especial|-|20|T **/
    private $id_caracteristica_especial ;//
    
    /** FK|INT|Sistema Armonizado|0|T|F|Seleccione Sistema Armonizado|-|30|T **/
    private $id_sistema_armonizado ;//
    
    /** CP|NUMERIC|Valor FOB|0|T|F|Ingrese Valor FOB|-|20|T **/
    private $valor_fob ;
    
    /** FK|INT|Moneda|0|T|F|Seleccione Moneda|-|10|F **/
    private $id_moneda ;
    
    /** CP|TXT|Informacion Adicional|0|F|F|-|-|0|F **/
    private $informacion_adicional ;
    
    /** FK|INT|Cafe Importador|0|T|T|-|-|0|F **/
    public $id_cafe_importador ;
    
    /** FK|INT|Cafe Organico|0|T|F|Seleccione Tipo de Cafe Organico|CafeElaboracion_2|0|F **/
    public $id_organico ;
    
    /** FK|INT|Cafe Verde|0|T|F|Seleccione Tipo de Cafe Organico Verde|CafeElaboracion_5|0|F **/
    public $id_cafe_verde ;
    
    /** FK|INT|Cafe Soluble|0|T|F|Seleccione Tipo de Cafe Organico Soluble|CafeElaboracion_8|0|F **/
    public $id_cafe_soluble ;
    
    /** FK|INT|Cafe Descafeinado|0|T|F|Seleccione Tipo de Cafe Organico Descafeinado|CafeElaboracion_0|0|F **/
    public $id_descafeinado ;
    
    /** FK|INT|Estado del Café|0|T|F|Seleccione Estado|-|0|F **/
    public $id_estado ;
    
    /** CP|TXT|Notificación|0|F|F|Ingrese Notificación|-|0|F **/
    public $notificacion ;
    
    /** FK|INT|Id Servicio Exportador|0|F|F|-|-|0|F **/
    public $id_servicio_exportador ;
    
    /** CP|NUMERIC|Nro de Factura|0|T|F|Ingrese Numero de Factura|-|0|F **/
    private $nro_factura ;
    
    /** CP|TXT|Nro de Autorizacion|0|F|F|-|-|0|F **/
    private $autorizacion ;
    
    /** CP|INT|Tipo de Cambio|0|F|F|-|-|0|F **/
    private $tipo_cambio ;
    
    /** CP|DATE|Fecha de Emisión|0|T|F|Ingrese Fecha de Emisión|-|17|T **/
    private $fecha_emision ;
    
    
    function getId_cafe_certificado() {
        return $this->id_cafe_certificado;
    }
    
    function getId_exportador_ruex() {
        return $this->id_exportador_ruex;
    }

    function getDireccion_notificaciones() {
        return $this->direccion_notificaciones;
    }

    function getNro_interno() {
        return $this->nro_interno;
    }

    function getId_pais() {
        return $this->id_pais;
    }

    function getId_puerto() {
        return $this->id_puerto;
    }

    function getNro_serial() {
        return $this->nro_serial;
    }

    function getId_pais_productor() {
        return $this->id_pais_productor;
    }

    function getId_pais_destino() {
        return $this->id_pais_destino;
    }

    function getFecha_exportacion() {
        return $this->fecha_exportacion;
    }

    function getId_pais_transbordo() {
        return $this->id_pais_transbordo;
    }

    function getId_medio_transporte() {
        return $this->id_medio_transporte;
    }

    function getMarca_oic() {
        return $this->marca_oic;
    }

    function getOtras_marcas_oic() {
        return $this->otras_marcas_oic;
    }

    function getId_tipo_embalaje() {
        return $this->id_tipo_embalaje;
    }

    function getPeso_neto() {
        return $this->peso_neto;
    }

    function getId_unidad_medida() {
        return $this->id_unidad_medida;
    }

    function getId_cafe_descripcion() {
        return $this->id_cafe_descripcion;
    }

    function getId_norma_calidad() {
        return $this->id_norma_calidad;
    }

    function getId_caracteristica_especial() {
        return $this->id_caracteristica_especial;
    }

    function getId_sistema_armonizado() {
        return $this->id_sistema_armonizado;
    }

    function getValor_fob() {
        return $this->valor_fob;
    }

    function getId_moneda() {
        return $this->id_moneda;
    }

    function getInformacion_adicional() {
        return $this->informacion_adicional;
    }

    function getCafe_importador() {
        return $this->id_cafe_importador;
    }

    function getOrganico() {
        return $this->id_organico;
    }

    function getCafe_verde() {
        return $this->id_cafe_verde;
    }

    function getCafe_soluble() {
        return $this->id_cafe_soluble;
    }

    function getDescafeinado() {
        return $this->id_descafeinado;
    }

    function getEstado() {
        return $this->id_estado;
    }

    function getNotificacion() {
        return $this->notificacion;
    }

    function getId_servicio_exportador() {
        return $this->id_servicio_exportador;
    }

    function getNro_factura() {
        return $this->nro_factura;
    }

    function getAutorizacion() {
        return $this->autorizacion;
    }

    function setId_cafe_certificado($id_cafe_certificado) {
        $this->id_cafe_certificado = $id_cafe_certificado;
    }

    function setId_exportador_ruex($id_exportador_ruex) {
        $this->id_exportador_ruex = $id_exportador_ruex;
    }

    function setDireccion_notificaciones($direccion_notificaciones) {
        $this->direccion_notificaciones = $direccion_notificaciones;
    }

    function setNro_interno($nro_interno) {
        $this->nro_interno = $nro_interno;
    }

    function setId_pais($id_pais) {
        $this->id_pais = $id_pais;
    }

    function setId_puerto($id_puerto) {
        $this->id_puerto = $id_puerto;
    }

    function setNro_serial($nro_serial) {
        $this->nro_serial = $nro_serial;
    }

    function setId_pais_productor($id_pais_productor) {
        $this->id_pais_productor = $id_pais_productor;
    }

    function setId_pais_destino($id_pais_destino) {
        $this->id_pais_destino = $id_pais_destino;
    }

    function setFecha_exportacion($fecha_exportacion) {
        $this->fecha_exportacion = $fecha_exportacion;
    }

    function setId_pais_transbordo($id_pais_transbordo) {
        $this->id_pais_transbordo = $id_pais_transbordo;
    }

    function setId_medio_transporte($id_medio_transporte) {
        $this->id_medio_transporte = $id_medio_transporte;
    }

    function setMarca_oic($marca_oic) {
        $this->marca_oic = $marca_oic;
    }

    function setOtras_marcas_oic($otras_marcas_oic) {
        $this->otras_marcas_oic = $otras_marcas_oic;
    }

    function setId_tipo_embalaje($id_tipo_embalaje) {
        $this->id_tipo_embalaje = $id_tipo_embalaje;
    }

    function setPeso_neto($peso_neto) {
        $this->peso_neto = $peso_neto;
    }

    function setId_unidad_medida($id_unidad_medida) {
        $this->id_unidad_medida = $id_unidad_medida;
    }

    function setId_cafe_descripcion($id_cafe_descripcion) {
        $this->id_cafe_descripcion = $id_cafe_descripcion;
    }

    function setId_norma_calidad($id_norma_calidad) {
        $this->id_norma_calidad = $id_norma_calidad;
    }

    function setId_caracteristica_especial($id_caracteristica_especial) {
        $this->id_caracteristica_especial = $id_caracteristica_especial;
    }

    function setId_sistema_armonizado($id_sistema_armonizado) {
        $this->id_sistema_armonizado = $id_sistema_armonizado;
    }

    function setValor_fob($valor_fob) {
        $this->valor_fob = $valor_fob;
    }

    function setId_moneda($id_moneda) {
        $this->id_moneda = $id_moneda;
    }

    function setInformacion_adicional($informacion_adicional) {
        $this->informacion_adicional = $informacion_adicional;
    }

    function setCafe_importador($cafe_importador) {
        $this->id_cafe_importador = $cafe_importador;
    }

    function setOrganico($organico) {
        $this->id_organico = $organico;
    }

    function setCafe_verde($cafe_verde) {
        $this->id_cafe_verde = $cafe_verde;
    }

    function setCafe_soluble($cafe_soluble) {
        $this->id_cafe_soluble = $cafe_soluble;
    }

    function setDescafeinado($descafeinado) {
        $this->id_descafeinado = $descafeinado;
    }

    function setEstado($estado) {
        $this->id_estado = $estado;
    }

    function setNotificacion($notificacion) {
        $this->notificacion = $notificacion;
    }

    function setId_servicio_exportador($id_servicio_exportador) {
        $this->id_servicio_exportador = $id_servicio_exportador;
    }

    function setNro_factura($nro_factura) {
        $this->nro_factura = $nro_factura;
    }

    function setAutorizacion($autorizacion) {
        $this->autorizacion = $autorizacion;
    }
    function getTipo_cambio() {
        return $this->tipo_cambio;
    }

    function setTipo_cambio($tipo_cambio) {
        $this->tipo_cambio = $tipo_cambio;
    }
    function getFecha_emision() {
        return $this->fecha_emision;
    }

    function setFecha_emision($fecha_emision) {
        $this->fecha_emision = $fecha_emision;
    }




}

?>
