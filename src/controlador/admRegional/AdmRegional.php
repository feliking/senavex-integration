<?php
/**
/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');


include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_MODELO . DS . 'SQLRegional.php');

class AdmRegional extends Principal {

  public function AdmRegional() {

    $vista = Principal::getVistaInstance();
    
    $regional = new Regional();
    $sqlRegional = new SQLRegional();
    
    if($_REQUEST['tarea']=='listarRegionales'){
        $resultado = $sqlRegional->getListarRegionales($regional);
        //var_dump($resultado); exit;
        
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_regional":"' . $datos->getId_regional() .
                    '","ciudad":"' . $datos->getCiudad() .
                    '","direccion":"' . $datos->getDireccion() .
                    '","activo":"' . $datos->getActivo() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
  }      
}