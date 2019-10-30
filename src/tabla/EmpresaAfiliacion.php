<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/** 
 *  1 tipo de clase
 *  2 nombre de Empresa
 *  3 Abreviacion del Nombre
 *  4 visible TRUE, False (T , F)
 */

/** CS|Empresa|emp|T **/
class EmpresaAfiliacion extends Db {
    
    const TABLE = 'empresa_afiliacion';
    

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    public $id_empresa_afiliacion;
    public $descripcion;
    public $criterio_valor;
    
    function getId_empresa_afiliacion() {
        return $this->id_empresa_afiliacion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_empresa_afiliacino($id_empresa_municipios) {
        $this->id_empresa_afiliacion = $id_empresa_municipios;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


    function getCriterio_valor(){
        return $this->criterio_valor;
    }
    function setCriterio_valor($criterio_valor){
        $this->criterio_valor=$criterio_valor;
    }

}
?>
