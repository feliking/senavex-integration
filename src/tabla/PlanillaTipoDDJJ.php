<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Regional|reg|4 **/
class PlanillaTipoDDJJ extends Db {

    const TABLE = 'planilla_tipo_ddjj';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_planilla_tipo_ddjj;
    private $descripcion;
    private $abreviatura;

    public function getId_planilla_tipo_ddjj(){
        return $this->id_planilla_tipo_ddjj;
    }

    public function setId_planilla_tipo_ddjj($id_planilla_tipo_ddjj){
        $this->id_planilla_tipo_ddjj = $id_planilla_tipo_ddjj;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getAbreviatura(){
        return $this->abreviatura;
    }

    public function setAbreviatura($abreviatura){
        $this->abreviatura = $abreviatura;
    }

}

?>
