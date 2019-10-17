<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 01-11-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'Arancel.php');
include_once(PATH_TABLA . DS . 'DetalleArancel.php');
include_once(PATH_TABLA . DS . 'CriterioOrigen.php');
include_once(PATH_TABLA . DS . 'AcuerdoPais.php');
include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'Pais.php');

include_once(PATH_MODELO . DS . 'SQLAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLArancel.php');
include_once(PATH_MODELO . DS . 'SQLDetalleArancel.php');
include_once(PATH_MODELO . DS . 'SQLCriterioOrigen.php');
include_once(PATH_MODELO . DS . 'SQLAcuerdoPais.php');

class AdmAcuerdo extends Principal {

  public function AdmAcuerdo() {

    $vista = Principal::getVistaInstance();

    $acuerdo = new Acuerdo();
    $arancel = new Arancel();
    $detalle_arancel = new DetalleArancel();
    $criterio_origen = new CriterioOrigen();
    $acuerdo_pais = new AcuerdoPais();
    
    $sqlAcuerdo = new SQLAcuerdo();
    $sqlArancel = new SQLArancel();
    $sqlDetalleArancel = new SQLDetalleArancel();
    $sqlCriterioOrigen = new SQLCriterioOrigen();
    $sqlAcuerdoPais = new SQLAcuerdoPais();
    //$datosArancel = $sqlArancel->getListarArancel($arancel);

    if ($_REQUEST['tarea'] == 'listarAcuerdos') {
        $resultado = $sqlAcuerdo->getListarAcuerdo($acuerdo);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_acuerdo":"' . $datos->getId_Acuerdo() .
                    '","descripcion":"' . $datos->getDescripcion() .
                    '","sigla":"' . $datos->getSigla() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }

    if($_REQUEST['tarea']=='guardarAcuerdo'){
        $hoy = date("Y-m-d h:m:s");
        $acuerdo->setDescripcion(mb_strtoupper($_REQUEST['descripcion']));
        $acuerdo->setSigla(mb_strtoupper($_REQUEST['sigla']));
        $acuerdo->setEstado(TRUE);
        $acuerdo->setId_Arancel($_REQUEST['id_arancel']);
        
        if($sqlPersona->setGuardarAcuerdo($acuerdo)){
            echo '{"suceso":"0","msg":"Datos guardados correctamente"}';
        }else{
            echo '{"suceso":"1","msg":"Problemas al guardar los datos del acuerdo"}';
        }
    }

    if ($_REQUEST['tarea'] == 'listarCriterioOrigen') {
        $criterio_origen->setId_Acuerdo($_REQUEST["id_acuerdo"]);
        $resultado = $sqlCriterioOrigen->getListarCriterioPorAcuerdo($criterio_origen);
        
        //var_dump($resultado); exit;
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_criterio_origen":"' . $datos->getId_criterio_origen() .
                    '","descripcion":"' . $datos->getDescripcion() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }

    if ($_REQUEST['tarea'] == 'listarAcuerdosConTipoCertificado') {
        $resultado = $sqlAcuerdo->getListarAcuerdoPorTipoCertificado($acuerdo);
        
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_acuerdo":"' . $datos->getId_acuerdo() .
                    '","id_tipo_co":"' . $datos->getId_tipo_co() .
                    '","descripcion_total":"Certificado ' . $datos->tipo_co->getAbreviatura() . ' - Acuerdo '. $datos->getSigla() .'"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if ($_REQUEST['tarea'] == 'listarPaisesPorAcuerdo') {
        $acuerdo_pais->setId_Acuerdo($_REQUEST["id_acuerdo"]);
        $resultado = $sqlAcuerdoPais->getListarPaisesPorAcuerdo($acuerdo_pais);
        
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_acuerdo_pais":"' . $datos->getId_acuerdo_pais() .
                    '","id_pais":"' . $datos->getId_pais() .
                    '","pais":"' . $datos->pais->getNombre() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if ($_REQUEST['tarea'] == 'listarPaisesConAcuerdo') {
        $resultado = $sqlAcuerdoPais->getListarAcuerdoConPaises($acuerdo_pais);
        
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_acuerdo_pais":"' . $datos->getId_acuerdo_pais() .
                    '","id_acuerdo":"' . $datos->getId_acuerdo() .
                    '","id_pais":"' . $datos->getId_pais() .
                    '","pais":"' . $datos->pais->getNombre() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if ($_REQUEST['tarea'] == 'listarDatosAcuerdo') {
        $acuerdo->setId_Acuerdo($_REQUEST["id_acuerdo"]);
        $acuerdo = $sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
        
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        //foreach ($acuerdo as $datos){
            $strJson .= '{"id_acuerdo":"' . $acuerdo->getId_Acuerdo() .
                    '","descripcion":"' . $acuerdo->getDescripcion() .
                    '","sigla":"' . $acuerdo->getSigla() .
                    '","id_arancel":"' . $acuerdo->getId_arancel() .
                    '","vigencia_ddjj":"' . $acuerdo->getVigencia_ddjj() .
                    '","id_tipo_valor_internacional":"' . $acuerdo->getId_tipo_valor_internacional() .
                    '","id_tipo_co":"' . $acuerdo->getId_tipo_co() . '"},';
            $selected='';
        //}

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    if ($_REQUEST['tarea'] == 'normas') {
      $criterios = $this->getCriteriosPorAcuerdo($_REQUEST['id_acuerdo']);
      echo json_encode($criterios);
      exit;
    }

  }
  function getCriteriosPorAcuerdo($id_acuerdo) {
    $criterio_origen = new CriterioOrigen();
    $sqlCriterioOrigen = new SQLCriterioOrigen();
    $criterio_origen->setId_Acuerdo($id_acuerdo);
    return $sqlCriterioOrigen->getListarCriterioPorAcuerdo($criterio_origen);
  }

}