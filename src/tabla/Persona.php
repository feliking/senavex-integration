<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/** CS|Persona|per|20 **/
class Persona extends Db {
        
    const TABLE = 'persona';
    
    public $pais_origen = array();
    
    public static $RELATIONS = array
    (
        'pais_origen' => array(self:: BELONGS_TO, 'Pais', 'id_pais'),
        'tipo_documento' => array(self:: BELONGS_TO, 'TipoDocumentoIdentidad', 'id_tipo_documentoidentidad')
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
    
    /** PK|INT|Id Persona|0|F|F|-|-|12|F **/
    private $id_persona;
    
    /** FK|INT|Id Digital|0|F|F|-|-|12|F **/
    private $id_digital;
    
    /** CP|TXT|Persona_Nombres|0|F|T|-|-|20|F **/
    private $nombres;
    
    /** CP|TXT|Persona_Paterno|0|F|F|-|-|15|F **/
    private $paterno;
    
    /** CP|TXT|Persona_Materno|0|F|F|-|-|15|F **/
    private $materno;
    
    /** FK|INT|Tipo Documento de Identidad|0|F|F|Seleccione un Tipo|-|17|F **/
    private $id_tipo_documento;
    
    /** CP|TXT|Numero de Documento|0|F|F|-|-|25|F **/
    private $numero_documento;
    
    /** CP|TXT|Numero de Contacto|0|F|F|-|-|17|F **/
    private $numero_contacto;
    
    /** CP|TXT|Numero de Contacto Alternativo|0|F|F|-|-|17|F **/
    private $numero_contacto2;
    
    /** CP|TXT|e-mail|0|F|F|-|-|25|F **/
    private $email;
    
    /** FK|INT|Pais de Origen|0|F|F|Seleccione un pais de Origen|-|17|F **/
    private $id_pais_origen;
    
    /** FK|INT|Departamento|0|F|F|Departamento|-|17|F **/
    private $id_departemento;
    
    /** CP|TXT|Ciudad|0|F|F|-|-|20|F **/
    private $ciudad;
    
    /** CP|TXT|Direccion|0|F|F|-|-|20|F **/
    private $direccion;
    
    /** CP|DATE|Fecha de Creacion|0|T|F|Ingrese fecha de Creacion|-|17|F **/
    private $fecha_creacion;
    
    /** CP|Date|Fecha Ultima Modificacion|0|T|F|Ingrese Fecha estimada|-|17|F **/
    private $ultima_modificacion;
    
    /** FK|INT|ID Usuario de creacion|0|F|F|-|-|17|F **/
    private $id_usuario_creacion;
    
    /** CP|DATE|Estado|0|F|F|-|-|17|F **/
    private $estado;

    /** CP|DATE|Estado|0|F|F|-|-|17|F **/
    private $apellido_casada;
    
    /** CP|DATE|Estado|0|F|F|-|-|17|F **/
    private $nacionalidad;

    /** CP|DATE|Fecha de Creacion|0|T|F|Ingrese fecha de Creacion|-|17|F **/
    private $vencimiento_documento;
    
    /** CP|TXT|Formato Imagen|0|F|F|-|-|20|F **/
    private $formato_imagen;
    
    /** CP|BOOL|Género|0|F|F|Seleccione Genero|-|10|F **/
    private $genero;//true hombre, false mujer
    
    /** CP|TXT|Firma|0|F|F|-|-|20|F **/
    private $firma;
    
    /** CP|TXT|expedido|0|F|F|-|-|20|F **/
    private $expedido;
    
    public function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }
    public function getId_persona() {
        return $this->id_persona;
    }
    public function setId_digital($id_digital) {
        $this->id_digital= $id_digital;
    }
    public function getId_digital() {
        return $this->id_digital;
    }
    public function setNombres($nombres) {
        $this->nombres = trim($nombres);
    }
    public function getNombres() {
        return $this->nombres;
    }
    public function setPaterno($paterno) {
        $this->paterno = trim($paterno);
    }
    public function getPaterno() {
        return $this->paterno;
    }
    public function setMaterno($materno) {
        $this->materno = trim($materno);
    }
    public function getMaterno() {
        return $this->materno;
    }
    public function setId_tipo_documento($id_tipo_documento) {
        $this->id_tipo_documento = $id_tipo_documento;
    }
    public function getId_tipo_documento() {
        return $this->id_tipo_documento;
    }
    public function setNumero_documento($numero_documento) {
        $this->numero_documento = trim($numero_documento);
    }
    public function getNumero_documento() {
        return $this->numero_documento;
    }
    public function setNumero_contacto($numero_contacto) {
        $this->numero_contacto = trim($numero_contacto);
    }
    public function getNumero_contacto() {
        return $this->numero_contacto;
    }
    public function setEmail($email) {
        $this->email = trim($email);
    }
    public function getEmail() {
        return $this->email;
    }
    public function setId_pais_origen($id_pais_origen) {
        $this->id_pais_origen = $id_pais_origen;
    }
    public function getId_pais_origen() {
        return $this->id_pais_origen;
    }
    public function setId_departamento($id_departamento) {
        $this->id_departamento = $id_departamento;
    }
    public function getId_departamento() {
        return $this->id_departamento;
    }
    public function setCiudad($ciudad) {
        $this->ciudad = trim($ciudad);
    }
    public function getCiudad() {
        return $this->ciudad;
    }
    public function setDireccion($direccion) {
        $this->direccion = trim($direccion);
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }
    public function getFecha_creacion() {
        return $this->fecha_creacion;
    }
    public function setUltima_modificacion($ultima_modificacion) {
        $this->ultima_modificacion = $ultima_modificacion;
    }
    public function getUltima_modificacion() {
        return $this->ultima_modificacion;
    }
    public function setId_usuario_creacion($id_usuario_creacion) {
        $this->id_usuario_creacion = $id_usuario_creacion;
    }
    public function getId_usuario_creacion() {
        return $this->id_usuario_creacion;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function getApellido_casada(){
        return $this->apellido_casada;
    }

    public function setApellido_casada($apellido_casada){
        $this->apellido_casada = $apellido_casada;
    }

    public function getNacionalidad(){
        return $this->nacionalidad;
    }

    public function setNacionalidad($nacionalidad){
        $this->nacionalidad = $nacionalidad;
    }

    public function getVencimiento_documento(){
        return $this->vencimiento_documento;
    }

    public function setVencimiento_documento($vencimiento_documento){
        $this->vencimiento_documento = $vencimiento_documento;
    }

    public function setFormato_imagen($formato_imagen) {
        $this->formato_imagen = $formato_imagen;
    }
    public function getFormato_imagen() {
        return $this->formato_imagen;
    }
    public function setGenero($genero) {
        $this->genero = $genero;
    }
    public function getGenero() {
        return $this->genero;
    }
    public function setFirma($firma) {
        $this->firma = $firma;
    }
    public function getFirma() {
        return $this->firma;
    }
    function getNumero_contacto2() {
        return $this->numero_contacto2;
    }

    function getId_departemento() {
        return $this->id_departemento;
    }

    function setNumero_contacto2($numero_contacto2) {
        $this->numero_contacto2 = $numero_contacto2;
    }

    function setId_departemento($id_departemento) {
        $this->id_departemento = $id_departemento;
    }

    function getPais_origen() {
        return $this->pais_origen;
    }

    function setPais_origen($pais_origen) {
        $this->pais_origen = $pais_origen;
    }

    function getExpedido() {
        return $this->expedido;
    }

    function setExpedido($expedido) {
        $this->expedido = $expedido;
    }
}

?>
