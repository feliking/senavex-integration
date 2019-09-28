<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 01-11-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'Arancel.php');
include_once(PATH_TABLA . DS . 'DetalleArancel.php');
include_once(PATH_TABLA . DS . 'Capitulos.php');

include_once(PATH_MODELO . DS . 'SQLArancel.php');
include_once(PATH_MODELO . DS . 'SQLDetalleArancel.php');
include_once(PATH_MODELO . DS . 'SQLCapitulos.php');

class AdmArancel extends Principal {

  public function AdmArancel() {

    $vista = Principal::getVistaInstance();

    $arancel = new Arancel();
    $detalle_arancel = new DetalleArancel();
    $capitulos = new Capitulos();
    
    $sqlArancel = new SQLArancel();
    $sqlDetalleArancel = new SQLDetalleArancel();
    $sqlCapitulos = new SQLCapitulos();

    if ($_REQUEST['tarea'] == 'listarCapitulos') {
        $resultado = $sqlCapitulos->getListarCapitulos($capitulos);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_capitulo":"' . $datos->getId_capitulo() .
                    '","capitulo":"' . $datos->getCapitulo() .
                    '","nombre_capitulo":"' . $datos->getNombre_capitulo() .
                    '","descripcion_total":"' . $datos->getCapitulo().' - '.$datos->getNombre_capitulo() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if ($_REQUEST['tarea'] == 'listarArancelBoliviano') {
        $detalle_arancel->setId_Arancel(1);
        $resultado = $sqlDetalleArancel->getListarDetallePorArancel($detalle_arancel);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_detalle_arancel":"' . $datos->getId_detalle_arancel() .
                    '","descripcion_total":"' . $datos->getCodigo()." - ". $datos->getDescripcion() .
                    '","codigo":"' . $datos->getCodigo() .
                    '","id_capitulo":"' . $datos->getId_capitulo() .
                    '","descripcion":"' . $datos->getDescripcion() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if ($_REQUEST['tarea'] == 'listarNaladisa') {
        $detalle_arancel->setId_Arancel($_REQUEST['id_arancel']);
        $resultado = $sqlDetalleArancel->getListarDetallePorArancel($detalle_arancel);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_detalle_arancel":"' . $datos->getId_detalle_arancel() .
                    '","descripcion_total":"' . $datos->getCodigo()." - ". $datos->getDescripcion() .
                    '","codigo":"' . $datos->getCodigo() .
                    '","id_capitulo":"' . $datos->getId_capitulo() .
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