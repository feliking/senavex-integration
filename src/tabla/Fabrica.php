<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Fabrica|fab|6 **/
class Fabrica extends Db {
        
    const TABLE = 'fabrica';

    public static $RELATIONS = array
    (
        'empresa'=>array(self::BELONGS_TO,'Empresa','id_empresa'),
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

    /** PK|INT|ID Fabrica|0|F|F|-|-|10|F **/
    private $id_fabrica;

    /** FK|INT|ID Fabrica|0|F|F|-|-|25|F **/
    private $id_empresa;

    /** CP|TXT|Ciudad|0|F|F|-|-|20|F **/
    private $ciudad;

    /** CP|TXT|Direccion|0|F|T|-|-|30|F **/
    private $direccion;

    /** CP|TXT|Numero de Contacto|0|F|F|-|-|20|F **/
    private $numero_contacto;

    /** CP|TXT|Persona de Contacto|0|F|F|-|-|25|F **/
    private $persona_contacto;

    private $id_direccion;


    public function setId_fabrica($id_fabrica) {
        $this->id_fabrica = $id_fabrica;
    }
    public function getId_fabrica() {
        return $this->id_fabrica;
    }

    public function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function getId_empresa() {
        return $this->id_empresa;
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

    public function setNumero_contacto($numero_contacto) {
        $this->numero_contacto = $numero_contacto;
    }
    public function getNumero_contacto() {
        return $this->numero_contacto;
    }

    public function setPersona_contacto($persona_contacto) {
        $this->persona_contacto = $persona_contacto;
    }
    public function getPersona_contacto() {
        return $this->persona_contacto;
    }
    public function setId_direccion($id_direccion) {
        $this->id_direccion = $id_direccion;
    }
    public function getId_direccion() {
        return $this->id_direccion;
    }


}

?>
