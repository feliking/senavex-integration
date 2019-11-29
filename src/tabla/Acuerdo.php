<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Acuerdo|acu|F **/
class Acuerdo extends Db {

    const TABLE = 'acuerdo';

    public $tipo_co = array();
    public $tipo_valor_internacional = array();
    public $acuerdo_arancel = array();
    public $criterio_origen = array();

    public static $RELATIONS = array
    (
      'tipo_co' => array(self:: BELONGS_TO, 'TipoCertificadoOrigen', 'id_tipo_co'),
      'tipo_valor_internacional' => array(self:: BELONGS_TO, 'TipoValorInternacional', 'id_tipo_valor_internacional'),
      'tipo_acuerdo' => array(self::BELONGS_TO,'TipoAcuerdo','id_tipo_acuerdo'),
      'estado_acuerdo' => array(self::BELONGS_TO,'EstadoAcuerdo','id_estado_acuerdo'),
      'acuerdo_arancel' => array(self::HAS_MANY,'AcuerdoArancel','id_acuerdo'),
      'criterio_origen' => array(self::HAS_MANY,'CriterioOrigen','id_acuerdo')
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

    /** PK|INT|Id Acuerdo|0|F|F|-|-|6|F **/
    private $id_acuerdo;

    /** CP|TXT|A_Descripcion|0|F|F|-|-|20|T **/
    private $descripcion;

    /** CP|TXT|Sigla|0|F|T|-|-|10|T **/
    private $sigla;

    /** CP|TXT|Estado|0|F|F|-|-|15|T **/
    private $estado;


    /** CP|DATE|Vigencia DDJJ|0|F|F|-|-|17|F **/
    private $vigencia_ddjj;


    /** FK|INT|Tipo de Valor Internacional|0|F|F|-|-|0|F **/
    private $id_tipo_valor_internacional;

    /** FK|INT|Tipo de C.O.|0|F|F|-|-|0|F **/
    private $id_tipo_co;

    private $fecha_creacion;

    private $fecha_baja;

    private $id_tipo_acuerdo;

    private $id_estado_acuerdo;


    public function setId_Acuerdo($id_acuerdo) {
        $this->id_acuerdo = $id_acuerdo;
    }
    public function getId_Acuerdo() {
        return $this->id_acuerdo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setSigla($sigla) {
        $this->sigla = $sigla;
    }
    public function getSigla() {
        return $this->sigla;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setVigencia_ddjj($vigencia_ddjj) {
        $this->vigencia_ddjj = $vigencia_ddjj;
    }
    public function getVigencia_ddjj() {
        return $this->vigencia_ddjj;
    }

    public function setId_tipo_valor_internacional($id_tipo_valor_internacional) {
        $this->id_tipo_valor_internacional = $id_tipo_valor_internacional;
    }
    public function getId_tipo_valor_internacional() {
        return $this->id_tipo_valor_internacional;
    }

    public function setId_tipo_co($id_tipo_co) {
        $this->id_tipo_co = $id_tipo_co;
    }
    public function getId_tipo_co() {
        return $this->id_tipo_co;
    }

    public function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }
    public function getFecha_creacion() {
        return $this->fecha_creacion;
    }
    public function setFecha_baja($fecha_baja) {
        $this->fecha_baja = $fecha_baja;
    }
    public function getFecha_baja() {
        return $this->fecha_baja;
    }
    public function setId_tipo_acuerdo($id_tipo_acuerdo) {
        $this->id_tipo_acuerdo = $id_tipo_acuerdo;
    }
    public function getId_tipo_acuerdo() {
        return $this->id_tipo_acuerdo;
    }
    public function setId_estado_acuerdo($id_estado_acuerdo) {
        $this->id_estado_acuerdo = $id_estado_acuerdo;
    }
    public function getId_estado_acuerdo() {
        return $this->id_estado_acuerdo;
    }

}

?>
