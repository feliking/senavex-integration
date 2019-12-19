<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 01-11-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_CONTROLADOR . DS .'admDeclaracionJurada'. DS .'AdmDeclaracionJurada.php');

include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'TipoAcuerdo.php');
include_once(PATH_TABLA . DS . 'EstadoAcuerdo.php');
include_once(PATH_TABLA . DS . 'Arancel.php');
include_once(PATH_TABLA . DS . 'DetalleArancel.php');
include_once(PATH_TABLA . DS . 'CriterioOrigen.php');
include_once(PATH_TABLA . DS . 'AcuerdoPais.php');
include_once(PATH_TABLA . DS . 'AcuerdoArancel.php');
include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'TipoValorInternacional.php');
include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');
include_once(PATH_TABLA . DS . 'Pais.php');

include_once(PATH_MODELO . DS . 'SQLAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLTipoAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLEstadoAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLArancel.php');
include_once(PATH_MODELO . DS . 'SQLDetalleArancel.php');
include_once(PATH_MODELO . DS . 'SQLCriterioOrigen.php');
include_once(PATH_MODELO . DS . 'SQLAcuerdoPais.php');
include_once(PATH_MODELO . DS . 'SQLTipoValorInternacional.php');
include_once(PATH_MODELO . DS . 'SQLTipoCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLAcuerdoArancel.php');
include_once(PATH_MODELO . DS . 'SQLDeclaracionJurada.php');

include_once( PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FormValidation.php');

class AdmAcuerdo extends Principal {

  public function AdmAcuerdo() {

    $vista = Principal::getVistaInstance();

    $acuerdo = new Acuerdo();
    $arancel = new Arancel();
    $estado_acuerdo = new EstadoAcuerdo();
    $tipoAcuerdo = new TipoAcuerdo();
    $detalle_arancel = new DetalleArancel();
    $criterio_origen = new CriterioOrigen();
    $acuerdo_pais = new AcuerdoPais();
    $tipo_valor_internacional = new TipoValorInternacional();
    $acuerdo_arancel = new AcuerdoArancel();
    $tipo_certificado_origen = new TipoCertificadoOrigen();
    
    $sqlAcuerdo = new SQLAcuerdo();
    $sqlTipoAcuerdo = new SQLTipoAcuerdo();
    $sqlArancel = new SQLArancel();
    $sqlEstadoAcuerdo = new SQLEstadoAcuerdo();
    $sqlDetalleArancel = new SQLDetalleArancel();
    $sqlCriterioOrigen = new SQLCriterioOrigen();
    $sqlAcuerdoPais = new SQLAcuerdoPais();
    $formValidation = new FormValidation();
    $sqlTipoValorInternacional = new SQLTipoValorInternacional();
    $sqlAcuerdoArancel = new SQLAcuerdoArancel();
    $sqlTipoCertificadoOrigen = new SQLTipoCertificadoOrigen();

    //$datosArancel = $sqlArancel->getListarArancel($arancel);

    if($_REQUEST['tarea'] == 'saveAcuerdo'){
            $today = date("Y-m-d h:m:s");
            $noesUsado = $this->checkAcuerdo($_REQUEST['id_acuerdo']);

            if($_REQUEST['id_acuerdo'] && $noesUsado){
                $acuerdo->setId_Acuerdo($_REQUEST['id_acuerdo']);
                $acuerdo = $sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
            }

            $acuerdo->setDescripcion(mb_strtoupper($formValidation->text($_REQUEST['acuerdoDescripcion'])));
            $acuerdo->setSigla(mb_strtoupper($formValidation->text($_REQUEST['acuerdoSigla'])));
            $acuerdo->setEstado(TRUE);
            $acuerdo->setVigencia_ddjj($formValidation->number($_REQUEST['acuerdoVigenciaDdjj']));
            $acuerdo->setId_tipo_valor_internacional($formValidation->is_inArray($_REQUEST['acuerdoValorInternacional'],$sqlTipoValorInternacional->getIdsTipoValorInternacional($tipo_valor_internacional)));
            $acuerdo->setFecha_creacion($today);
            $acuerdo->setId_tipo_co($_REQUEST['tipoco']);
            $acuerdo->setId_tipo_acuerdo($formValidation->is_inArray($_REQUEST['acuerdoTipo'],$sqlTipoAcuerdo->getIdsTipoAcuerdo($tipoAcuerdo)));
            //setting aggrement to "vigente"
            $acuerdo->setId_estado_acuerdo(1);

            if($acuerdo->save())
            {
                if($_REQUEST['acuerdoArancelArray']!='null')//TODO maybe cofilcts with server
                {
                    if($_REQUEST['id_acuerdo'] && $this->checkAcuerdo($_REQUEST['id_acuerdo']))  $this->deleteArancel($_REQUEST['id_acuerdo']);
                    $aranceles =explode(',',$_REQUEST['acuerdoArancelArray']);
                    foreach($aranceles as $id_arancel){
                        $acuerdo_arancel->setId_arancel($id_arancel);
                        $acuerdo_arancel->setId_acuerdo($acuerdo->getId_Acuerdo());
                        $acuerdo_arancel->setActivo(true);
                        $acuerdo_arancel->save();
                        $acuerdo_arancel = new AcuerdoArancel();

                        $arancel->setId_arancel($id_arancel);
                        $arancel = $sqlArancel->getBuscarArancelPorId($arancel);
                        $arancel->setActivo(TRUE);
                        $arancel->save();
                    }
                }
                if($_REQUEST['criterioOrigenData']!='null')
                {
//                    if($_REQUEST['id_acuerdo'] && $this->checkAcuerdo($_REQUEST['id_acuerdo']))  $this->deleteCriterio($_REQUEST['id_acuerdo']);
                    $criterios =json_decode($_REQUEST['criterioOrigenData']);
                    foreach($criterios as $object){
                        if($object->id_criterio_origen!=null) {
                            $criterio_origen->setId_criterio_origen($object->id_criterio_origen);
                            $criterio_origen = $sqlCriterioOrigen->getBuscarDescripcionPorId($criterio_origen);
                        }
                        $criterio_origen->setId_Acuerdo($acuerdo->getId_Acuerdo());
                        $criterio_origen->setDescripcion($object->descripcion);
                        $criterio_origen->setParrafo($object->parrafo);
                        $criterio_origen->setOrden($object->orden);
                        $criterio_origen->setActivo(TRUE);
                        $criterio_origen->save();
                        $criterio_origen = new CriterioOrigen();
                    }
                }
                //anular acuerdo si es edicion
                if($_REQUEST['id_acuerdo'] && !$noesUsado) $this->anularAcuerdo($_REQUEST['id_acuerdo']);

                echo '{"status":"1","message":"El acuerdo se cuardo satisfactoriamente."}';
            }
            else echo '{"status":"0","message":"Error al guardar el acuerdo."}';
        }
    if($_REQUEST['tarea'] == 'formAcuerdo'){

      $tipoAcuerdos = $sqlTipoAcuerdo->getListarTipoAcuerdo($tipoAcuerdo);
      $aranceles = $sqlArancel->getAllNoDefault($arancel);
      $valorInternacional = $sqlTipoValorInternacional->getListarTipoValorInternacional($tipo_valor_internacional);
//            if($_REQUEST['id_acuerdo'] && $this->checkAcuerdo($_REQUEST['id_acuerdo']))  $vista->assign('acuerdo',$this->getAcuerdo($_REQUEST['id_acuerdo']));

      if($_REQUEST['id_acuerdo'] ) {
        $acuerdo = $this->getAcuerdo($_REQUEST['id_acuerdo']);
        $vista->assign('acuerdo',$acuerdo);
      }
      $tipoCerfificadosOrigen=$sqlTipoCertificadoOrigen->getListarTipoCertificadoOrigen($tipo_certificado_origen);

      $vista->assign('tipoCertificadosOrigen',$tipoCerfificadosOrigen);
      $vista->assign('valores',$valorInternacional);
      $vista->assign('tipoAcuerdos',$tipoAcuerdos);
      $vista->assign('aranceles',$aranceles);
      $vista->assign('id','acuerdo');
      $vista->display("admAcuerdo/FormAcuerdo.tpl");
    }
    if($_REQUEST['tarea'] == 'acuerdos') {
        $estado_acuerdo= new EstadoAcuerdo();
        $estados = $sqlEstadoAcuerdo->getAll($estado_acuerdo);

        $vista->assign('estados',$estados);
        $vista->display("admAcuerdo/Acuerdos.tpl");
    }
    if($_REQUEST['tarea'] == 'acuerdo'){
        $acuerdo->setId_Acuerdo($_REQUEST['id_acuerdo']);
        if($_REQUEST['id_acuerdo'] && $this->checkAcuerdo($_REQUEST['id_acuerdo']))  $vista->assign('editable',true);
        $acuerdo = $this->getAcuerdo($_REQUEST['id_acuerdo']);
        $aranceles=[];
        foreach($acuerdo->acuerdo_arancel as $object)
        {
            if($object->activo){
                $arancel->setId_arancel($object->id_arancel);
                $arancel = $sqlArancel->getBuscarArancelPorId($arancel);
                array_push($aranceles, $arancel);
                $arancel = new Arancel();
            }
        }
        $vista->assign('acuerdo',$acuerdo);
        $vista->assign('aranceles',$aranceles);
        $vista->display('admAcuerdo/Acuerdo.tpl');
    }
    if($_REQUEST['tarea'] == 'anularAcuerdo'){
        if($this->anularAcuerdo($_REQUEST['id_acuerdo'])){
            echo '{"status":"1","message":"El acuerdo se modifico satisfactoriamente."}';
        }
        else{
            echo '{"status":"0","message":"Error, no se pudo completar la accion"}';
        }
    }

    if($_REQUEST['tarea'] == 'listarAcuerdosSinNinguno'){
        $resultado=$sqlAcuerdo->getAcuerdoSinNinguno($acuerdo,true);
        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_acuerdo":"' . $datos->getId_Acuerdo() .
                '","descripcion":"' . $datos->getDescripcion() .
                '","sigla":"' . $datos->getSigla() .
                '","tipo_acuerdo":"' . $datos->tipo_acuerdo->getDescripcion() .
                '","editable":"' . $this->checkAcuerdo($datos->getId_Acuerdo()) .
                '","id_estado_acuerdo":"' . $datos->getId_estado_acuerdo() .
                '","estado_acuerdo":"' . $datos->estado_acuerdo->getDescripcion() . '"},';
        }
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson.']';
    }
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

      echo json_encode($resultado);
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
    if($_REQUEST['tarea']=='deleteCriterioOrigen'){
      if($_REQUEST['id_criterio_origen']){
        $criterio_origen->setId_criterio_origen($_REQUEST['id_criterio_origen']);
        $criterio_origen = $sqlCriterioOrigen->getBuscarDescripcionPorId($criterio_origen);
        $criterio_origen->setActivo(false);
        $criterio_origen->save();
      }
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
  ///verifica si un acuerdo esta siendo utilizado por una declaracion jurada actualmente no se esta llamando a este metodo
  public function checkAcuerdo($id_acuerdo)
  {
    $ddjj = new DeclaracionJurada();
    $sqlddjj = new SQLDeclaracionJurada();
    $ddjj->setId_acuerdo($id_acuerdo);
    $acuerdos= $sqlddjj->getByAcuerdo($ddjj);
    return (count($acuerdos)==0?true:false);
  }
  public function getAcuerdo($id_acuerdo)
  {
    $acuerdo = new Acuerdo();
    $sqlacuerdo= new SQLAcuerdo();
    $acuerdo->setId_acuerdo($id_acuerdo);
    $acuerdo= $sqlacuerdo->getByIdArguments($acuerdo);
    return $acuerdo;
  }
  public function deleteArancel($id_acuerdo)
  {
    $arancel = new AcuerdoArancel();
    $sqlAcuerdoArancel = new SQLAcuerdoArancel();
    $arancel->setId_acuerdo($id_acuerdo);
    $acuerdos = $sqlAcuerdoArancel->getByAcuerdo($arancel);
    foreach($acuerdos as $object) $object->delete();
  }
  public function deleteCriterio($id_acuerdo)
  {
    $criterio = new CriterioOrigen();
    $sqlCriterioOrigen = new SQLCriterioOrigen();
    $criterio->setId_acuerdo($id_acuerdo);
    $criterios = $sqlCriterioOrigen->getListarCriterioPorAcuerdo($criterio);
    foreach($criterios as $object) $object->delete();
  }
  public function anularAcuerdo($id_acuerdo){
    $acuerdo = new Acuerdo();
    $sqlAcuerdo = new SQLAcuerdo();
    $acuerdo->setId_Acuerdo($id_acuerdo);
    $acuerdo = $sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
    $acuerdo->setId_estado_acuerdo(2);
    return $acuerdo->save();
  }
  public function setIdAcuerdoToReviewDDJJ($id_acuerdo_antiguo,$id_acuerdo){
    $ddjj = new DeclaracionJurada();
    $sqlddjj = new SQLDeclaracionJurada();
    $ddjj->setId_acuerdo($id_acuerdo_antiguo);
    $ddjj->setId_estado_ddjj(AdmDeclaracionJurada::DDJJ_REVISAR);
    $ddjjs= $sqlddjj->getByAcuerdoYEstado($ddjj);
    foreach ($ddjjs as $dj) {
      $dj->setId_acuerdo($id_acuerdo);
      $dj->save();
    }
  }
}