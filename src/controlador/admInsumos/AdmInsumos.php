<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     AdmInsumos.php v1.0 23-09-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'InsumosNacionales.php');
include_once(PATH_TABLA . DS . 'InsumosImportados.php');
include_once(PATH_TABLA . DS . 'Comercializador.php');
include_once(PATH_TABLA . DS . 'UnidadMedida.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_MODELO . DS . 'SQLInsumosNacionales.php');
include_once(PATH_MODELO . DS . 'SQLInsumosImportados.php');
include_once(PATH_MODELO . DS . 'SQLComercializador.php');

class AdmInsumos extends Principal {

  public function AdmInsumos() {

    $vista = Principal::getVistaInstance();

    $insumos_nacionales = new InsumosNacionales();
    $insumos_importados = new InsumosImportados();
    $comercializador =  new Comercializador();

    $sqlInsumosNacionales = new SQLInsumosNacionales();
    $sqlInsumosImportados = new SQLInsumosImportados();
    $sqlComercializador = new SQLComercializador();
    
    if($_REQUEST['tarea']=='listarInsumosNacionales'){
        $insumos_nacionales->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $resultado = $sqlInsumosNacionales->getBuscarInsumosPorDdjj($insumos_nacionales);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_insumos_nacionales":"' . $datos->getId_insumos_nacionales() .
                    '","descripcion":"' . $datos->getDescripcion() .
                    '","fabricante":"' . $datos->getNombre_Fabricante() .
                    '","telefono":"' . $datos->getTelefono_Fabricante() .
                    '","valor":"' . $datos->getValor() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if($_REQUEST['tarea']=='listarInsumosImportados'){
        $insumos_importados->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $resultado = $sqlInsumosImportados->getBuscarInsumosPorDdjj($insumos_importados);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_insumos_importados":"' . $datos->getId_insumos_importados() .
                    '","descripcion":"' . $datos->getDescripcion() .
                    '","nandina":"' . $datos->getId_Detalle_Arancel() .
                    '","pais":"' . $datos->getId_Pais() .
                    '","productor":"' . $datos->getRazon_Social_Productor() .
                    '","cuenta_co":"' . $datos->getTiene_Certificado_Origen() .
                    '","acuerdo":"' . $datos->getId_Acuerdo() .
                    '","valor":"' . $datos->getValor() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if($_REQUEST['tarea']=='listarComercializadores'){
        $comercializador->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $resultado = $sqlComercializador->getBuscarComercializadorPorDdjj($comercializador);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_comercializador":"' . $datos->getId_comercializador() .
                    '","razon_social":"' . $datos->getRazon_social() .
                    '","ci_nit":"' . $datos->getCi_nit() .
                    '","domicilio":"' . $datos->getDomicilio_legal() .
                    '","representante_legal":"' . $datos->getRepresentante_legal() .
                    '","direccion_fabrica":"' . $datos->getDireccion_fabrica() .
                    '","telefono":"' . $datos->getTelefono() .
                    '","precio_venta":"' . $datos->getPrecio_venta() .
                    '","unidad_medida":"' . $datos->getId_unidad_medida() .
                    '","produccion_mensual":"' . $datos->getProduccion_mensual() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }

  }
  
}