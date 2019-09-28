<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/** CD|Observaciones DDJJ|5 **/
class ObservacionesDdjj extends Db {
        
    const TABLE = 'observaciones_ddjj';

    public static $RELATIONS = array
    (
        'id_ddjj'=>array(self::BELONGS_TO,'DeclaracionJurada','id_ddjj'),
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
     *  7 texto para mostrar en el textbox ( '-' si no tiene texto para mostrar)
     *  8 es un campo Required (TRUE,FALSE)
     *  9 texto para el aviso required 
     * **/
    
    /** PK|INT|Id Observaciones DDJJ|0|F|F|-|F|- **/
    private $id_observaciones_ddjj;
    /** CP|TXT|Observaciones Generales|0|F|T|-|F|- **/
    private $observaciones_generales;
    /** CP|Date|Fecha Observacion|0|F|F|-|F|- **/
    private $fecha_observacion;
    /** FK|INT|Fecha Observacion|0|F|F|-|F|- **/
    private $id_tipo_usuario;
    /** FK|INT|Declaracion Jurada|0|F|F|-|F|- **/
    private $id_ddjj;
    
    public function setId_observaciones_ddjj($id_observaciones_ddjj) {
        $this->id_observaciones_ddjj = $id_observaciones_ddjj;
    }
    public function getId_observaciones_ddjj() {
        return $this->id_observaciones_ddjj;
    }

    public function setObservaciones_generales($observaciones_generales) {
        $this->observaciones_generales = $observaciones_generales;
    }
    public function getObservaciones_generales() {
        return $this->observaciones_generales;
    }
    
    public function setFecha_observacion($fecha_observacion) {
        $this->fecha_observacion = $fecha_observacion;
    }
    public function getFecha_observacion() {
        return $this->fecha_observacion;
    }
    
    public function setId_tipo_usuario($id_tipo_usuario) {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }
    public function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }
    
    public function setId_ddjj($id_ddjj) {
        $this->id_ddjj = $id_ddjj;
    }
    public function getId_ddjj() {
        return $this->id_ddjj;
    }
    
}

?>
