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
class Municipio extends Db {
    
    const TABLE = 'municipio';
    

    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }
    
    private $id_municipio;
    private $descripcion;
    private $id_departamento;
    private $criterio_valor;

    function getId_municipio() {
        return $this->id_municipio;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getId_departamento() {
        return $this->id_departamento;
    }

    function setId_municipio($id_municipio) {
        $this->id_municipio = $id_municipio;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setId_departamento($id_departamento) {
        $this->id_departamento = $id_departamento;
    }

    function getCriterio_valor(){
        return $this->criterio_valor;
    }
    function setCriterio_valor($criterio_valor){
        $this->criterio_valor=$criterio_valor;
    }
}
?>
