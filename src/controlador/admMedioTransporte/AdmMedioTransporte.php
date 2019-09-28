<?php
/**
/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');


include_once(PATH_TABLA . DS . 'MedioTransporte.php');
include_once(PATH_MODELO . DS . 'SQLMedioTransporte.php');

class AdmMedioTransporte extends Principal {

  public function AdmMedioTransporte() {

    $vista = Principal::getVistaInstance();
    
    $medio_transporte = new MedioTransporte();
    $sqlMedioTransporte = new SQLMedioTransporte();
    
    if($_REQUEST['tarea']=='listarMedioTransporte'){
        $resultado = $sqlMedioTransporte->getListarMedioTransporte($medio_transporte);
        //var_dump($resultado); exit;
        
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_medio_transporte":"' . $datos->getId_medio_transporte() .
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