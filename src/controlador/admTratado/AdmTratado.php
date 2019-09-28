<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 01-11-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'TipovalorInternacional.php');
include_once(PATH_TABLA . DS . 'Tratado.php');
include_once(PATH_MODELO . DS . 'SQLTipoValorInternacional.php');
include_once(PATH_MODELO . DS . 'SQLTratado.php');

class AdmTratado extends Principal {

  public function AdmTratado() {

    $vista = Principal::getVistaInstance();

    $tratado = new Tratado();
    $tipoValorInternacional = new TipoValorInternacional();
    $sqlTratado = new SQLTratado();
    $sqlTipoValorInternacional = new SQLTipoValorInternacional();
    
    $datosArancel = $sqlArancel->getListarArancel($arancel);
    $datosTratado = $sqlTratado->getListarTratado($tratado);

    if($_POST['tarea']=='verificarCorreo'){
        $persona->setEmail($_REQUEST["email"]);
        $resultado = $sqlPersona->getDatosPersonaPorEmail($persona);
        if ($resultado=='0'){
            echo '0';
        }
        else {
            echo '1';
        }
        exit;
    }
    
    if($_POST['tarea']=='verificarNumeroDocumento'){
        $persona->setNumero_documento($_REQUEST["numero_documento"]);
        $persona->setId_tipo_documento($_REQUEST["tipo_documento"]);
        $resultado = $sqlPersona->getDatosPersonaPorNumeroDocumento($persona);
        if ($resultado=='0'){
            echo '0';
        }
        else {
            echo '1';
        }
        exit;
    }
    
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
    
    if($_REQUEST['tarea']=='editarAcuerdo'){
        $acuerdo->setId_acuerdo($_REQUEST['id_acuerdo']);
        $datAcuerdo = $sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
        $vista->assign('datAcuerdo', $datAcuerdo);
        $vista->display('admAcuerdo/AdmAcuerdoEditar.tpl');
        exit;
    }
    
    if ($_REQUEST['tarea'] == 'actualizarAcuerdo') {
        $hoy = date("Y-m-d h:m:s");
        
        $acuerdo->setId_Tratado($_REQUEST['id_tratado']);
        $acuerdo->setDescripcion(mb_strtoupper($_REQUEST['descripcion']));
        $acuerdo->setSigla(mb_strtoupper($_REQUEST['sigla']));
        $acuerdo->setEstado($_REQUEST['estado']);
        $acuerdo->setId_Arancel($_REQUEST['id_arancel']);

        if ($sqlAcuerdo->setGuardarAcuerdo($acuerdo)) {
            echo '{"success":true,"msg":"Los datos del acuerdo se actualizaron correctamente"}';
        }else{
            echo '{"success":false,"msg":"Problemas al actualizar los datos del acuerdo"}';
        }
        exit;
    }
    
  }

}