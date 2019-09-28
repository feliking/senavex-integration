<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class EmpresaTemporal extends Db {
    
    const TABLE = 'empresa_temporal';

    public static $RELATIONS = array
    (
        'usuario_temporal' => array(self:: BELONGS_TO, 'UsuarioTemporal', 'id_usuario_temporal'),
        'estado_empresa_temporal' => array(self:: BELONGS_TO, 'EstadoEmpresaTemporal', 'id_estado_empresa_temporal')
    );
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_empresa_temporal;
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
    private $id_usuario_temporal;
    private $observaciones;
    private $id_estado_empresa_temporal;
    private $fecha_admision;
    private $probolivia;
    
    public function setId_empresa_temporal($id_empresa_temporal) {
        $this->id_empresa_temporal = $id_empresa_temporal;
    }
    public function getId_empresa_temporal() {
        return $this->id_empresa_temporal;
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
    public function getnim() {
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

    public function setIdRubro_Exportaciones($id_rubro_exportaciones) {
        $this->idrubro_exportaciones = $id_rubro_exportaciones;
    }
    public function getIdRubro_Exportaciones() {
        return $this->idrubro_exportaciones;
    }

    public function setId_Usuario_Temporal($id_usuario_temporal) {
        $this->id_usuario_temporal = $id_usuario_temporal;
    }
    public function getId_Usuario_Temporal() {
        return $this->id_usuario_temporal;
    }
    
    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
    public function getObservaciones() {
        return $this->observaciones;
    }

    public function setId_estado_empresa_temporal($id_estado_empresa_temporal) {
        $this->id_estado_empresa_temporal = $id_estado_empresa_temporal;
    }
    public function getId_estado_empresa_temporal() {
        return $this->id_estado_empresa_temporal;
    }

    public function setFecha_admision($fecha_admision) {
        $this->fecha_admision = $fecha_admision;
    }
    public function getFecha_admision() {
        return $this->fecha_admision;
    }
    public function setProbolivia($probolivia) {
        $this->probolivia = $probolivia;
    }
    public function getProbolivia() {
        return $this->probolivia;
    }


}
?>
