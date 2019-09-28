<?php
/**
/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');


include_once(PATH_TABLA . DS . 'UnidadMedida.php');
include_once(PATH_MODELO . DS . 'SQLUnidadMedida.php');

class AdmUnidadMedida extends Principal {

  public function AdmUnidadMedida() {

    $vista = Principal::getVistaInstance();
    
    $unidad_medida = new UnidadMedida();
    $sqlUnidadMedida = new SQLUnidadMedida();

    if($_REQUEST['tarea']=='listarUnidadMedida'){
        $hoy = date("Y-m-d h:m:s"); 
        $resultado=$sqlUnidadMedida->getListarUnidadMedida($unidad_medida);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_unidad_medida":"' . $datos->getId_unidad_medida() .
                    '","descripcion":"' . $datos->getDescripcion() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
  }   
}