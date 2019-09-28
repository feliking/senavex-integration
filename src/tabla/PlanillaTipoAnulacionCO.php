<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');
/** CS|Regional|reg|4 **/
class PlanillaTipoAnulacionCO extends Db {

    const TABLE = 'planilla_tipo_anulacion_co';

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_planilla_tipo_anulacion_co;
    private $descripcion;

    function getId_planilla_tipo_anulacion_co() {
        return $this->id_planilla_tipo_anulacion_co;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_planilla_tipo_anulacion_co($id_planilla_tipo_anulacion_co) {
        $this->id_planilla_tipo_anulacion_co = $id_planilla_tipo_anulacion_co;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}

?>
