<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class EmpresaHistorico extends Db {
    
    const TABLE = 'empresa_historico';
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_empresa_historico;
    private $id_empresa;
    private $razon_social;
    private $nombre_comercial;
    private $nit;
    private $matricula_fundempresa;
    private $idtipo_empresa;
    private $idactividad_economica;
    private $idcategoria_empresa;
    private $iddepartamento_procedencia;
    private $ciudad;
    private $direccion;
    private $numero_contacto;
    private $fax;
    private $pagina_web;
    private $email;
    private $email_secundario;
    private $menor_cuantia;
    private $nim;
    private $testimonio_constitucion;
    private $norma_creacion_empresa_publica;
    private $idrubro_exportaciones;
    private $ruex;
    private $fecha_renovacion_ruex;
    private $datos_categoria_empresa;
    private $id_modificacion_empresa_relevancia;
    private $id_representante_legal;
    private $fecha_asignacion_ruex;
    private $direccionfiscal;
    private $oea;
    private $frecuente;
    
    public function setId_empresa_historico($id_empresa_historico) {
        $this->id_empresa_historico = $id_empresa_historico;
    }
    public function getId_empresa_historico() {
        return $this->id_empresa_historico;
    }
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
        $this->nit = $nit;
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
        $this->email = $email;
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
    public function setFecha_renovacion_ruex($fecha_renovacion_ruex) {
        $this->fecha_renovacion_ruex = $fecha_renovacion_ruex;
    }
    public function getFecha_renovacion_ruex() {
        return $this->fecha_renovacion_ruex;
    }
    public function setDatos_categoria_empresa($datos_categoria_empresa) {
        $this->datos_categoria_empresa = $datos_categoria_empresa;
    }
    public function getDatos_categoria_empresa() {
        return $this->datos_categoria_empresa;
    }
    public function setFecha_modificacion($fecha_modificacion) {
        $this->fecha_modificacion = $fecha_modificacion;
    }
    public function getFecha_modificacion() {
        return $this->fecha_modificacion;
    }
    public function setId_modificacion_empresa_relevancia($id_modificacion_empresa_relevancia) {
        $this->id_modificacion_empresa_relevancia = $id_modificacion_empresa_relevancia;
    }
    public function getId_modificacion_empresa_relevancia() {
        return $this->id_modificacion_empresa_relevancia;
    }
    public function setId_representante_legal($id_representante_legal) {
        $this->id_representante_legal = $id_representante_legal;
    }
    public function getId_representante_legal() {
        return $this->id_representante_legal;
    }
    public function setFecha_asignacion_ruex($fecha_asignacion_ruex) {
        $this->fecha_asignacion_ruex = $fecha_asignacion_ruex;
    }
    public function getFecha_asignacion_ruex() {
        return $this->fecha_renovacion_ruex;
    }
    
    public function setDireccionfiscal($direccionfiscal) {
        $this->direccionfiscal = $direccionfiscal;
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
}

?>
