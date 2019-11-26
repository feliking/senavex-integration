<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Acuerdo|acu|F **/
class Direccion extends Db {
    
    const TABLE = 'direccion';
    
    public $direccion_tipo = array();
    public $direccion_tipo_calle= array();
    public $direccion_tipo_zona= array();
    public $direccion_ubicacion_edificio= array();
    
    public static $RELATIONS = array
    (
        'direccion_tipo' => array(self:: BELONGS_TO, 'DireccionTipo', 'id_direccion_tipo'),
        'direccion_tipo_calle' => array(self:: BELONGS_TO, 'DireccionTipoCalle', 'id_direccion_tipo_calle'),
        'direccion_tipo_zona' => array(self:: BELONGS_TO, 'DireccionTipoZona', 'id_direccion_tipo_zona'),
        'direccion_ubicacion_edificio' => array(self:: BELONGS_TO, 'DireccionUbicacionEdificio', 'id_direccion_ubicacion_edificio'),
    );
    
    /**
     * @return TActiveRecord active record finder instance
     */
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_direccion;
    private $id_direccion_tipo;
    private $id_direccion_tipo_calle;
    private $nombre_direccion_tipo_calle;
    private $numero_domicilio;
    private $nombre_edificio;
    private $piso;
    private $id_direccion_tipo_ubicacion_edificio;
    private $numero_dpto_oficina;
    private $id_direccion_tipo_zona;
    private $nombre_zona_barrio;
    private $id_departamento;
    private $id_municipio;
    private $telefono_fijo;
    private $telefono_celular;
    private $telefono_fax;
    private $email;
    private $direccion_descriptiva;

    function getId_direccion() {
        return $this->id_direccion;
    }

    function getId_direccion_tipo() {
        return $this->id_direccion_tipo;
    }

    function getId_direccion_tipo_calle() {
        return $this->id_direccion_tipo_calle;
    }

    function getNombre_direccion_tipo_calle() {
        return $this->nombre_direccion_tipo_calle;
    }

    function getNumero_domicilio() {
        return $this->numero_domicilio;
    }

    function getNombre_edificio() {
        return $this->nombre_edificio;
    }

    function getPiso() {
        return $this->piso;
    }

    function getId_direccion_tipo_ubicacion_edificio() {
        return $this->id_direccion_tipo_ubicacion_edificio;
    }

    function getNumero_dpto_oficina() {
        return $this->numero_dpto_oficina;
    }

    function getId_direccion_tipo_zona() {
        return $this->id_direccion_tipo_zona;
    }

    function getNombre_zona_barrio() {
        return $this->nombre_zona_barrio;
    }

    function getId_departamento() {
        return $this->id_departamento;
    }

    function getId_municipio() {
        return $this->id_municipio;
    }

    function getTelefono_fijo() {
        return $this->telefono_fijo;
    }

    function getTelefono_celular() {
        return $this->telefono_celular;
    }

    function getTelefono_fax() {
        return $this->telefono_fax;
    }

    function getEmail() {
        return $this->email;
    }

    function setId_direccion($id_direccion) {
        $this->id_direccion = $id_direccion;
    }

    function setId_direccion_tipo($id_direccion_tipo) {
        $this->id_direccion_tipo = $id_direccion_tipo;
    }

    function setId_direccion_tipo_calle($id_direccion_tipo_calle) {
        $this->id_direccion_tipo_calle = $id_direccion_tipo_calle;
    }

    function setNombre_direccion_tipo_calle($nombre_direccion_tipo_calle) {
        $this->nombre_direccion_tipo_calle = $nombre_direccion_tipo_calle;
    }

    function setNumero_domicilio($numero_domicilio) {
        $this->numero_domicilio = $numero_domicilio;
    }

    function setNombre_edificio($nombre_edificio) {
        $this->nombre_edificio = $nombre_edificio;
    }

    function setPiso($piso) {
        $this->piso = $piso;
    }

    function setId_direccion_tipo_ubicacion_edificio($id_direccion_tipo_ubicacion_edificio) {
        $this->id_direccion_tipo_ubicacion_edificio = $id_direccion_tipo_ubicacion_edificio;
    }

    function setNumero_dpto_oficina($numero_dpto_oficina) {
        $this->numero_dpto_oficina = $numero_dpto_oficina;
    }

    function setId_direccion_tipo_zona($id_direccion_tipo_zona) {
        $this->id_direccion_tipo_zona = $id_direccion_tipo_zona;
    }

    function setNombre_zona_barrio($nombre_zona_barrio) {
        $this->nombre_zona_barrio = $nombre_zona_barrio;
    }

    function setId_departamento($id_departamento) {
        $this->id_departamento = $id_departamento;
    }

    function setId_municipio($id_municipio) {
        $this->id_municipio = $id_municipio;
    }

    function setTelefono_fijo($telefono_fijo) {
        $this->telefono_fijo = $telefono_fijo;
    }

    function setTelefono_celular($telefono_celular) {
        $this->telefono_celular = $telefono_celular;
    }

    function setTelefono_fax($telefono_fax) {
        $this->telefono_fax = $telefono_fax;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getDireccion_descriptiva() {
        return $this->direccion_descriptiva;
    }

    function setDireccion_descriptiva($direccion_descriptiva) {
        $this->direccion_descriptiva = $direccion_descriptiva;
    }

    public function jsonSerialize()
    {
        return [
          'id_direccion_tipo' => $this->id_direccion_tipo,
          'id_direccion_tipo_calle' => $this->id_direccion_tipo_calle,
          'nombre_direccion_tipo_calle' => $this->nombre_direccion_tipo_calle,
          'numero_domicilio' => $this->numero_domicilio,
          'nombre_edificio' => $this->nombre_edificio,
          'piso' => $this->piso,
          'id_direccion_tipo_ubicacion_edificio' => $this->id_direccion_tipo_ubicacion_edificio,
          'numero_dpto_oficina' => $this->numero_dpto_oficina,
          'id_direccion_tipo_zona' => $this->id_direccion_tipo_zona,
          'nombre_zona_barrio' => $this->nombre_zona_barrio,
          'id_departamento' => $this->id_departamento,
          'id_municipio' => $this->id_municipio,
          'telefono_fijo' => $this->telefono_fijo,
          'telefono_celular' => $this->telefono_celular,
          'telefono_fax' => $this->telefono_fax,
          'email' => $this->email,
          'direccion_descriptiva' => $this->direccion_descriptiva,

        ];
    }

}

?>
