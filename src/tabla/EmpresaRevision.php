<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class EmpresaRevision extends Db {
    
    const TABLE = 'empresa_revision';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_empresa_revision;
    private $id_empresa;
    private $razon_social;
    private $nombre_comercial;
    private $nit;
    private $matricula_fundempresa;
    private $idtipo_empresa;
    private $idactividad_economica;
    private $idcategoria_empresa;
    private $direccion;
    private $email;
    private $email_secundario;
    private $menor_cuantia;
    private $estado;
    private $fecha_asignacion_ruex;
    private $fecha_renovacion_ruex;
    private $ruex;
    private $formato_imagen;
    private $idrubro_exportaciones;
    private $fecha_registro;
    private $observaciones;
    private $datos_categoria_empresa;
    private $vigencia;
    private $ico;
    private $id_representante_legal;
    private $oea;
    private $frecuente;
    private $certificacionnit;
    private $tituloco;
    private $id_servicio_exportador;
    private $codigo_seguridad;
    private $afiliaciones;
    private $descripcion_empresa;
    private $date_inicio_operaciones;
    private $date_fundacion;
    private $coordenada_long;
    private $coordenada_lat;
    private $fecha_modificacion;
    
    function getId_empresa_revision() {
        return $this->id_empresa_revision;
    }

    function getId_empresa() {
        return $this->id_empresa;
    }

    function getRazon_social() {
        return $this->razon_social;
    }

    function getNombre_comercial() {
        return $this->nombre_comercial;
    }

    function getNit() {
        return $this->nit;
    }

    function getMatricula_fundempresa() {
        return $this->matricula_fundempresa;
    }

    function getIdtipo_empresa() {
        return $this->idtipo_empresa;
    }

    function getIdactividad_economica() {
        return $this->idactividad_economica;
    }

    function getIdcategoria_empresa() {
        return $this->idcategoria_empresa;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getEmail() {
        return $this->email;
    }

    function getEmail_secundario() {
        return $this->email_secundario;
    }

    function getMenor_cuantia() {
        return $this->menor_cuantia;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha_asignacion_ruex() {
        return $this->fecha_asignacion_ruex;
    }

    function getFecha_renovacion_ruex() {
        return $this->fecha_renovacion_ruex;
    }

    function getRuex() {
        return $this->ruex;
    }

    function getFormato_imagen() {
        return $this->formato_imagen;
    }

    function getIdrubro_exportaciones() {
        return $this->idrubro_exportaciones;
    }

    function getFecha_registro() {
        return $this->fecha_registro;
    }

    function getObservaciones() {
        return $this->observaciones;
    }

    function getDatos_categoria_empresa() {
        return $this->datos_categoria_empresa;
    }

    function getVigencia() {
        return $this->vigencia;
    }

    function getIco() {
        return $this->ico;
    }

    function getId_representante_legal() {
        return $this->id_representante_legal;
    }

    function getOea() {
        return $this->oea;
    }

    function getFrecuente() {
        return $this->frecuente;
    }

    function getCertificacionnit() {
        return $this->certificacionnit;
    }

    function getTituloco() {
        return $this->tituloco;
    }

    function getId_servicio_exportador() {
        return $this->id_servicio_exportador;
    }

    function getCodigo_seguridad() {
        return $this->codigo_seguridad;
    }

    function getAfiliaciones() {
        return $this->afiliaciones;
    }

    function getDescripcion_empresa() {
        return $this->descripcion_empresa;
    }

    function getDate_inicio_operaciones() {
        return $this->date_inicio_operaciones;
    }

    function getDate_fundacion() {
        return $this->date_fundacion;
    }

    function getCoordenada_long() {
        return $this->coordenada_long;
    }

    function getCoordenada_lat() {
        return $this->coordenada_lat;
    }

    function getFecha_modificacion() {
        return $this->fecha_modificacion;
    }

    function setId_empresa_revision($id_empresa_revision) {
        $this->id_empresa_revision = $id_empresa_revision;
    }

    function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    function setRazon_social($razon_social) {
        $this->razon_social = $razon_social;
    }

    function setNombre_comercial($nombre_comercial) {
        $this->nombre_comercial = $nombre_comercial;
    }

    function setNit($nit) {
        $this->nit = $nit;
    }

    function setMatricula_fundempresa($matricula_fundempresa) {
        $this->matricula_fundempresa = $matricula_fundempresa;
    }

    function setIdtipo_empresa($idtipo_empresa) {
        $this->idtipo_empresa = $idtipo_empresa;
    }

    function setIdactividad_economica($idactividad_economica) {
        $this->idactividad_economica = $idactividad_economica;
    }

    function setIdcategoria_empresa($idcategoria_empresa) {
        $this->idcategoria_empresa = $idcategoria_empresa;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEmail_secundario($email_secundario) {
        $this->email_secundario = $email_secundario;
    }

    function setMenor_cuantia($menor_cuantia) {
        $this->menor_cuantia = $menor_cuantia;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha_asignacion_ruex($fecha_asignacion_ruex) {
        $this->fecha_asignacion_ruex = $fecha_asignacion_ruex;
    }

    function setFecha_renovacion_ruex($fecha_renovacion_ruex) {
        $this->fecha_renovacion_ruex = $fecha_renovacion_ruex;
    }

    function setRuex($ruex) {
        $this->ruex = $ruex;
    }

    function setFormato_imagen($formato_imagen) {
        $this->formato_imagen = $formato_imagen;
    }

    function setIdrubro_exportaciones($idrubro_exportaciones) {
        $this->idrubro_exportaciones = $idrubro_exportaciones;
    }

    function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }

    function setDatos_categoria_empresa($datos_categoria_empresa) {
        $this->datos_categoria_empresa = $datos_categoria_empresa;
    }

    function setVigencia($vigencia) {
        $this->vigencia = $vigencia;
    }

    function setIco($ico) {
        $this->ico = $ico;
    }

    function setId_representante_legal($id_representante_legal) {
        $this->id_representante_legal = $id_representante_legal;
    }

    function setOea($oea) {
        $this->oea = $oea;
    }

    function setFrecuente($frecuente) {
        $this->frecuente = $frecuente;
    }

    function setCertificacionnit($certificacionnit) {
        $this->certificacionnit = $certificacionnit;
    }

    function setTituloco($tituloco) {
        $this->tituloco = $tituloco;
    }

    function setId_servicio_exportador($id_servicio_exportador) {
        $this->id_servicio_exportador = $id_servicio_exportador;
    }

    function setCodigo_seguridad($codigo_seguridad) {
        $this->codigo_seguridad = $codigo_seguridad;
    }

    function setAfiliaciones($afiliaciones) {
        $this->afiliaciones = $afiliaciones;
    }

    function setDescripcion_empresa($descripcion_empresa) {
        $this->descripcion_empresa = $descripcion_empresa;
    }

    function setDate_inicio_operaciones($date_inicio_operaciones) {
        $this->date_inicio_operaciones = $date_inicio_operaciones;
    }

    function setDate_fundacion($date_fundacion) {
        $this->date_fundacion = $date_fundacion;
    }

    function setCoordenada_long($coordenada_long) {
        $this->coordenada_long = $coordenada_long;
    }

    function setCoordenada_lat($coordenada_lat) {
        $this->coordenada_lat = $coordenada_lat;
    }

    function setFecha_modificacion($fecha_modificacion) {
        $this->fecha_modificacion = $fecha_modificacion;
    }

}
?>
