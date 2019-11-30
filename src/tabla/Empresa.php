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
class Empresa extends Db {
    
    const TABLE = 'empresa';
    
    public static $RELATIONS = array
    (
        'usuariotemporal'=>array(self::BELONGS_TO,'UsuarioTemporal','id_usuario_temporal'),
        'estadoempresas'=>array(self::BELONGS_TO,'EstadoEmpresas','estado')
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
    
    /** PK|INT|Id Empresa|0|F|F|-|-|0|F **/
    public $id_empresa;
    /** CP|TXT|Razon_Social|0|F|T|-|-|20|F **/
    private $razon_social;
    /** CP|TXT|Nombre_Comercial|0|F|F|-|-|20|F **/
    private $nombre_comercial;
    /** CP|NUMERIC|NIT|0|F|F|-|F|20|F **/
    private $nit;
    /** CP|NUMERIC|Matricula_de_Fundempresa|0|F|F|-|-|20|F **/
    private $matricula_fundempresa;
    /** FK|INT|Tipo de Empresa|0|F|F|Seleccione tipo de Empresa|-|20|F **/
    private $idtipo_empresa;
    /** FK|INT|Actividad Economica|0|F|F|Seleccione Una Actividad|-|20|F **/
    private $idactividad_economica;
    /** FK|INT|Categoria de Empresa|0|F|F|Seleccione una Categoria|-|20|F **/
    private $idcategoria_empresa;
    /** FK|INT|Departamento de Procedencia|0|F|F|Seleccione Departamento|-|20|F **/
    private $iddepartamento_procedencia;
    /** CP|TXT|Ciudad|0|F|F|-|-|20|F **/
    private $ciudad;
    /** CP|TXT|Direccion|0|F|F|-|-|20|F **/
    private $direccion;
    /** CP|TXT|Numero de Contacto|0|F|F|-|-|20|F **/
    private $numero_contacto;
    /** CP|TXT|FAX|0|F|F|-|-|20|F **/
    private $fax;
    /** CP|TXT|Pagina Web|0|F|F|-|-|20|F **/
    private $pagina_web;
    /** CP|TXT|Email|0|F|F|-|-|20|F **/
    private $email;
    /** CP|TXT|Email Secundario|0|F|F|-|-|20|F **/
    private $email_secundario;
    /** CP|TXT|RUEX de menor Cuantia|0|F|F|-|-|20|F **/
    private $menor_cuantia;
    /** CP|TXT|NIM|0|F|F|-|-|20|F **/
    private $nim;
    /** CP|TXT|Testimonio de Constitucion|0|F|F|-|-|20|F **/
    private $testimonio_constitucion;
    /** CP|TXT|Norma de Creacion de Empresa Publica|0|F|F|-|-|20|F **/
    private $norma_creacion_empresa_publica;
    /** FK|INT|RUBRO EXPORTADOR|0|F|F|-|-|20|F **/
    private $idrubro_exportaciones;
    /** CP|TXT|RUEX|0|F|F|-|-|20|F **/
    private $ruex;
    /** FK|INT|id Usuario Temporal|0|F|F|-|-|20|F **/
    private $id_usuario_temporal;
    /** CP|TXT|Estado|0|F|F|-|-|20|F **/
    private $estado;
    /** CP|DATE|Fecha de Asignacion del RUEX|0|F|F|-|-|20|F **/
    private $fecha_asignacion_ruex;
    /** CP|DATE|Fecha de Renovacion del RUEX|0|F|F|-|-|20|F **/
    private $fecha_renovacion_ruex;
    /** FK|INT|Usuario Root|0|F|F|-|-|20|F **/
    private $id_usuario_root;
    /** CP|TXT|FFormato de la Imagen|0|F|F|-|-|-|F **/
    private $formato_imagen;
    /** CP|DATE|Fecha de Registro|0|F|F|-|-|-|F **/
    private $fecha_registro;
    /** CP|TXT|Observaciones|0|F|F|-|-|-|F **/
    private $observaciones;
    /** CP|TXT|Datos de categoria de Empresa|0|F|F|-|-|-|F **/
    private $datos_categoria_empresa;
    /** CP|DATE|Vigencia|0|F|F|-|F|-|F **/
    private $vigencia;
    /** CP|TXT|Numero ICO|0|F|F|-|F|-|F **/
    private $ico;
    /** FK|INT|Representante Legal|0|F|F|-|F|-|F **/
    private $id_representante_legal;
    /** CP|TXT|Direccion Fiscal|0|F|F|-|-|-|F **/
    private $direccionfiscal;
    /** CP|TXT|OEA|0|F|F|-|-|-|F **/
    private $oea;
    /** CP|TXT|Frecuente|0|F|F|-|-|-|F **/
    private $frecuente;
    /** CP|TXT|Certificacion NIT|0|F|F|-|-|-|F **/
    private $certificacionnit;
    /** CP|TXT|Titulo C.O.|0|F|F|-|-|-|F **/
    private $tituloco;
    
    /** CP|TXT|Titulo C.O.|0|F|F|-|-|-|F **/
    private $descripcion_empresa;
    /** CP|TXT|Año de Fundacion|0|F|F|-|-|-|F **/
    private $date_fundacion;
    /** CP|TXT|Año de Inicio de Operaciones|0|F|F|-|-|-|F **/
    private $date_inicio_operaciones;
    /** CP|TXT|Municipio|0|F|F|-|-|-|F **/
    private $municipio;
    /** CP|TXT|Zona / Barrio|0|F|F|-|-|-|F **/
    private $zona_barrio;
    /** CP|TXT|Coordenada Latitud|0|F|F|-|-|-|F **/
    private $coordenada_lat;
    /** CP|TXT|coordenada Lonigutd|0|F|F|-|-|-|F **/
    private $coordenada_long;
    /** CP|TXT|Afiliaciones|0|F|F|-|-|-|F **/
    private $afiliaciones;
    /** CP|TXT|Numero de RUEX|0|F|F|-|-|-|F **/
    private $nro_ruex;
    /** FK|INT|-|0|F|F|ServicioExportador|-|20|F **/
    private $id_servicio_exportador;
    /** FK|INT|-|0|F|F|Codigo de Seguridad|-|20|F **/
    private $codigo_seguridad;
    private $encuesta;
    private $ultima_revision;


    public function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getId_empresa() {
        return $this->id_empresa;
    }

    public function setRazon_Social($razon_social) {
        $this->razon_social = $razon_social;
    }
    public function getRazon_Social() {
        return $this->razon_social;
    }
    
    public function setNombre_Comercial($nombre_comercial) {
        $this->nombre_comercial = $nombre_comercial;
    }
    public function getNombre_Comercial() {
        return $this->nombre_comercial;
    }

    public function setNit($nit) {
        $this->nit = trim($nit);
    }
    public function getNit() {
        return $this->nit;
    }

    public function setMatricula_Fundempresa($matricula_fundempresa) {
        $this->matricula_fundempresa = $matricula_fundempresa;
    }
    public function getMatricula_Fundempresa() {
        return $this->matricula_fundempresa;
    }

    public function setIdTipo_Empresa($idtipo_empresa) {
        $this->idtipo_empresa = $idtipo_empresa;
    }
    public function getIdTipo_Empresa() {
        return $this->idtipo_empresa;
    }

    public function setIdActividad_Economica($idactividad_economica) {
        $this->idactividad_economica = $idactividad_economica;
    }
    public function getIdActividad_Economica() {
        return $this->idactividad_economica;
    }

    public function setIdCategoria_Empresa($idcategoria_empresa) {
        $this->idcategoria_empresa = $idcategoria_empresa;
    }
    public function getIdCategoria_Empresa() {
        return $this->idcategoria_empresa;
    }

    public function setIdDepartamento_Procedencia($iddepartamento_procedencia) {
        $this->iddepartamento_procedencia = $iddepartamento_procedencia;
    }
    public function getIdDepartamento_Procedencia() {
        return $this->iddepartamento_procedencia;
    }

    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }
    public function getCiudad() {
        return $this->ciudad;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function getDireccion() {
        return $this->direccion;
    }

    public function setNumero_Contacto($numero_contacto) {
        $this->numero_contacto = $numero_contacto;
    }
    public function getNumero_Contacto() {
        return $this->numero_contacto;
    }

    public function setFax($fax) {
        $this->fax = $fax;
    }
    public function getFax() {
        return $this->fax;
    }

    public function setPagina_Web($pagina_web) {
        $this->pagina_web = $pagina_web;
    }
    public function getPagina_Web() {
        return $this->pagina_web;
    }

    public function setEmail($email) {
        $this->email = trim($email);
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail_Secundario($email_secundario) {
        $this->email_secundario = $email_secundario;
    }
    public function getEmail_Secundario() {
        return $this->email_secundario;
    }

    public function setMenor_Cuantia($menor_cuantia) {
        $this->menor_cuantia = $menor_cuantia;
    }
    public function getMenor_Cuantia() {
        return $this->menor_cuantia;
    }

    public function setNim($nim) {
        $this->nim = $nim;
    }
    public function getNim() {
        return $this->nim;
    }

    public function setTestimonio_Constitucion($testimonio_constitucion) {
        $this->testimonio_constitucion = $testimonio_constitucion;
    }
    public function getTestimonio_Constitucion() {
        return $this->testimonio_constitucion;
    }

    public function setNorma_Creacion_Empresa_Publica($norma_creacion_empresa_publica) {
        $this->norma_creacion_empresa_publica = $norma_creacion_empresa_publica;
    }
    public function getNorma_Creacion_Empresa_Publica() {
        return $this->norma_creacion_empresa_publica;
    }

    public function setIdRubro_Exportaciones($idrubro_exportaciones) {
        $this->idrubro_exportaciones = $idrubro_exportaciones;
    }
    public function getIdRubro_Exportaciones() {
        return $this->idrubro_exportaciones;
    }

    public function setRuex($ruex) {
        $this->ruex = $ruex;
    }
    public function getRuex() {
        return $this->ruex;
    }

    public function setId_Usuario_Temporal($id_usuario_temporal) {
        $this->id_usuario_temporal = $id_usuario_temporal;
    }
    public function getId_Usuario_Temporal() {
        return $this->id_usuario_temporal;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setFecha_asignacion_ruex($fecha_asignacion_ruex) {
        $this->fecha_asignacion_ruex = $fecha_asignacion_ruex;
    }
    public function getFecha_asignacion_ruex() {
        return $this->fecha_asignacion_ruex;
    }

    public function setFecha_renovacion_ruex($fecha_renovacion_ruex) {
        $this->fecha_renovacion_ruex = $fecha_renovacion_ruex;
    }
    public function getFecha_renovacion_ruex() {
        return $this->fecha_renovacion_ruex;
    }

    public function setId_usuario_root($id_usuario_root) {
        $this->id_usuario_root = $id_usuario_root;
    }
    public function getId_usuario_root() {
        return $this->id_usuario_root;
    }
    public function setFormato_imagen($formato_imagen) {
        $this->formato_imagen = $formato_imagen;
    }
    public function getFormato_imagen() {
        return $this->formato_imagen;
    }
    public function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }
    public function getFecha_registro() {
        return $this->fecha_registro;
    }
    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
    public function getObservaciones() {
        return $this->observaciones;
    }
    public function setDatos_categoria_empresa($datos_categoria_empresa) {
        $this->datos_categoria_empresa = $datos_categoria_empresa;
    }
    public function getDatos_categoria_empresa() {
        return $this->datos_categoria_empresa;
    }
    public function setVigencia($vigencia) {
        $this->vigencia = $vigencia;
    }
    public function getVigencia() {
        return $this->vigencia;
    }
    public function setIco($ico) {
        $this->ico = $ico;
    }
    public function getIco() {
        return $this->ico;
    }
    public function setId_representante_legal($id_representante_legal) {
        $this->id_representante_legal = $id_representante_legal;
    }
    public function getId_representante_legal() {
        return $this->id_representante_legal;
    }
    
    public function setDireccionfiscal($direccionfiscal) {
        $this->direccionfiscal =$direccionfiscal;
    }
    public function getDireccionfiscal() {
        return $this->direccionfiscal;
    }
    public function setOea($oea) {
        $this->oea = $oea;
    }
    public function getOea() {
        return $this->oea;
    }
    public function setFrecuente($frecuente) {
        $this->frecuente = $frecuente;
    }
    public function getFrecuente() {
        return $this->frecuente;
    }
    public function setCertificacionnit($certificacionnit) {
        $this->certificacionnit = $certificacionnit;
    }
    public function getCertificacionnit() {
        return $this->certificacionnit;
    }
    public function setTituloco($tituloco) {
        $this->tituloco = $tituloco;
    }
    public function getTituloco() {
        return $this->tituloco;
    }
    static function getRELATIONS() {
        return self::$RELATIONS;
    }

    function getDescripcion_empresa() {
        return $this->descripcion_empresa;
    }

    function getDate_fundacion() {
        return $this->date_fundacion;
    }

    function getDate_inicio_operaciones() {
        return $this->date_inicio_operaciones;
    }

    function getMunicipio() {
        return $this->municipio;
    }

    function getZona_barrio() {
        return $this->zona_barrio;
    }

    function getCoordenada_lat() {
        return $this->coordenada_lat;
    }

    function getCoordenada_long() {
        return $this->coordenada_long;
    }

    function getAfiliaciones() {
        return $this->afiliaciones;
    }

    function getNro_ruex() {
        return $this->nro_ruex;
    }

    static function setRELATIONS($RELATIONS) {
        self::$RELATIONS = $RELATIONS;
    }

    function setDescripcion_empresa($descripcion_empresa) {
        $this->descripcion_empresa = $descripcion_empresa;
    }

    function setDate_fundacion($date_fundacion) {
        $this->date_fundacion = $date_fundacion;
    }

    function setDate_inicio_operaciones($date_inicio_operaciones) {
        $this->date_inicio_operaciones = $date_inicio_operaciones;
    }

    function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    function setZona_barrio($zona_barrio) {
        $this->zona_barrio = $zona_barrio;
    }

    function setCoordenada_lat($coordenada_lat) {
        $this->coordenada_lat = $coordenada_lat;
    }

    function setCoordenada_long($coordenada_long) {
        $this->coordenada_long = $coordenada_long;
    }

    function setAfiliaciones($afiliaciones) {
        $this->afiliaciones = $afiliaciones;
    }

    function setNro_ruex($nro_ruex) {
        $this->nro_ruex = $nro_ruex;
    }

    function getId_servicio_exportador() {
        return $this->id_servicio_exportador;
    }

    function setId_servicio_exportador($id_servicio_exportador) {
        $this->id_servicio_exportador = $id_servicio_exportador;
    }

    function getCodigo_seguridad() {
        return $this->codigo_seguridad;
    }

    function setCodigo_seguridad($codigo_seguridad) {
        $this->codigo_seguridad = $codigo_seguridad;
    }
function getEncuesta() {
        return $this->encuesta;
    }

    function setEncuesta($encuesta) {
        $this->encuesta = $encuesta;
    }
    function getUltima_revision(){
        return $this->ultima_revision;
    }
    function setUltima_revision($ultima_revision){
        $this->ultima_revision=$ultima_revision;
    }
}
?>
