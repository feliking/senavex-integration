<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 01-11-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
//include_once(PATH_TABLA . DS . 'Tratado.php');
include_once(PATH_MODELO . DS . 'SQLTipoCertificadoOrigen.php');
//include_once(PATH_MODELO . DS . 'SQLTratado.php');

class AdmTipoCertificado extends Principal {

  public function AdmTipoCertificado() {

    $vista = Principal::getVistaInstance();

    //$tratado = new Tratado();
    $tipo_co = new TipoCertificadoOrigen();
    //$sqlTratado = new SQLTratado();
    $sqlTipoCertificado = new SQLTipoCertificadoOrigen();

    if($_REQUEST['tarea']=='listarTipoCertificado'){
        $resultado = $sqlTipoCertificado->getListarTipoCertificadoOrigen($tipo_co);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_tipo_co":"' . $datos->getId_tipo_co() .
                    '","descripcion":"' . $datos->getDescripcion() .
                    '","abreviatura_descripcion":"Certificado ' . $datos->getAbreviatura()." - ". $datos->getDescripcion() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    /*
    if($_REQUEST['tarea']=='guardarAcuerdo'){
        $hoy = date("Y-m-d h:m:s");
        print_r($_SESSION); exit;
        
        $acuerdo->setId_Tratado($_REQUEST['id_tratado']);
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
    */
  }

}