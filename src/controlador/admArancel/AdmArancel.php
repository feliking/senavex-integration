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
include_once(PATH_TABLA . DS . 'AcuerdoArancel.php');
include_once(PATH_TABLA . DS . 'Partida.php');

include_once(PATH_MODELO . DS . 'SQLArancel.php');
include_once(PATH_MODELO . DS . 'SQLDetalleArancel.php');
include_once(PATH_MODELO . DS . 'SQLAcuerdoArancel.php');
include_once(PATH_MODELO . DS . 'SQLPartida.php');
include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');

class AdmArancel extends Principal {

  public function AdmArancel() {
    if($_REQUEST['tarea'] == 'searchPartida') {
      $partida = new Partida();
      $sqlPartida = new SQLPartida();

      if($_REQUEST['id_arancel']){
        $partida->setId_arancel($_REQUEST['id_arancel']);
      } else {
        $sqlArancel = new SQLArancel();
        $arancel = new Arancel();
        $arancel = $sqlArancel->getArancelVigente($arancel);
        $partida->setId_arancel($arancel->getId_arancel());
      }


      $resultado = $sqlPartida->searchPartidaByArancel($partida,$_REQUEST['term']);
      echo json_encode($resultado);
    }

    $vista = Principal::getVistaInstance();

    $arancel = new Arancel();
    $acuerdo_arnacel = new AcuerdoArancel();
    $detalle_arancel = new DetalleArancel();
    $partida = new Partida();

    $sqlArancel = new SQLArancel();
    $sqlDetalleArancel = new SQLDetalleArancel();
    $sqlPartida = new SQLPartida();
    $sqlAcuerdoArancel = new SQLAcuerdoArancel();

      if ($_REQUEST['tarea'] == 'aranceles') {
          $vista->display("admAranceles/Aranceles.tpl");
      }
      if ($_REQUEST['tarea'] == 'listarAranceles') {
          $resultado = $sqlArancel->getAllNoDefault($arancel);
          $strJson = '';
          echo '[';
          foreach ($resultado as $datos) {
              $strJson .= '{"id_arancel":"' . $datos->getId_arancel() .
                  '","denominacion":"' . $datos->getDenominacion() .
                  '","gestion_publicacion":"' . $datos->getGestion_publicacion() .
                  '","activo":"' . ($datos->getActivo()?'Activo':'Desactivado') .
                  '","activo_boolean":"' . $datos->getActivo() .
                  '","editable":"' . $this->checkArancel($datos->getId_arancel()) . '"},';
          }
          $strJson = substr($strJson, 0, strlen($strJson) - 1);
          echo $strJson . ']';
      }
      if ($_REQUEST['tarea'] == 'listarArancelBoliviano') {
          $detalle_arancel->setId_Arancel(1);
          $resultado = $sqlDetalleArancel->getListarDetallePorArancel($detalle_arancel);
          $selected = ',"selected":true';

          $strJson = '';
          echo '[';
          foreach ($resultado as $datos) {
              $strJson .= '{"id_detalle_arancel":"' . $datos->getId_detalle_arancel() .
                  '","descripcion_total":"' . $datos->getCodigo() . " - " . $datos->getDescripcion() .
                  '","codigo":"' . $datos->getCodigo() .
                  '","id_capitulo":"' . $datos->getId_capitulo() .
                  '","descripcion":"' . $datos->getDescripcion() . '"},';
              $selected = '';
          }

          $strJson = substr($strJson, 0, strlen($strJson) - 1);
          echo $strJson;
          echo ']';
          exit;
      }
      if ($_REQUEST['tarea'] == 'formArancel') {
          if($_REQUEST['id_arancel']){
              $arancel->setId_arancel($_REQUEST['id_arancel']);
              $arancel = $sqlArancel->getBuscarArancelPorId($arancel);
              $partida->setId_arancel($arancel->getId_arancel());
              $partidas = $sqlPartida->getPartidaArancel($partida);

              //puede reducir el timpo de renderisacion de los aranceles
              foreach($partidas as &$partida){
                  $partida->setReo(preg_replace( "/\r|\n/", "", $partida->getReo()));
                  $partida->setDenominacion(preg_replace( "/\r|\n/", "", $partida->getDenominacion()));
              }


              $vista->assign('arancel',$arancel);
              $vista->assign('id',$arancel->getId_arancel());
              $vista->assign('partidas',$partidas);
          }
          $vista->display("admAranceles/FormArancel.tpl");
      }

      if ($_REQUEST['tarea'] == 'listarNaladisa') {
          $detalle_arancel->setId_Arancel($_REQUEST['id_arancel']);
          $resultado = $sqlDetalleArancel->getListarDetallePorArancel($detalle_arancel);
          $selected = ',"selected":true';

          $strJson = '';
          echo '[';
          foreach ($resultado as $datos) {
              $strJson .= '{"id_detalle_arancel":"' . $datos->getId_detalle_arancel() .
                  '","descripcion_total":"' . $datos->getCodigo() . " - " . $datos->getDescripcion() .
                  '","codigo":"' . $datos->getCodigo() .
                  '","id_capitulo":"' . $datos->getId_capitulo() .
                  '","descripcion":"' . $datos->getDescripcion() . '"},';
              $selected = '';
          }

          $strJson = substr($strJson, 0, strlen($strJson) - 1);
          echo $strJson;
          echo ']';
          exit;
      }

      if($_REQUEST['tarea'] == 'saveArancel'){
          $funcionesGenerales = new FuncionesGenerales();
          if($_REQUEST['id_arancel']){
              $arancel->setId_arancel($_REQUEST['id_arancel']);
              $arancel = $sqlArancel->getBuscarArancelPorId($arancel);
          }
          $arancel->setDenominacion($_REQUEST['arancelDenominacion']);
          $arancel->setGestion_Publicacion($_REQUEST['arancelGestion']);
          $arancel->setActivo(TRUE);
          if($_REQUEST['arancelVigente'] == 'on'){
              $sqlArancel->resetActivo($arancel);
              $arancel->setVigente(TRUE);
          }
          else $arancel->setVigente(FALSE);
          if($arancel->save()) {
              if($_REQUEST['newFile']=='true') $this->deletePartidas($arancel->getId_arancel());
              $partidas = json_decode($_REQUEST['partidas']);
              foreach ($partidas as $object) {
                  if($object->partida!='' || $object->denominacion!=''){
                      $partida = new Partida();
                      if($object->id_partida){
                          $partida->setId_partida($object->id_partida);
                          $partida = $sqlPartida->getById($partida);
                          $partida->setActivo(true);
                      }
                      $partida->setId_arancel($arancel->getId_arancel());
                      $partida->setPartida($object->partida);
                      $partida->setDenominacion($funcionesGenerales->validateStringArancel($object->denominacion));
                      $partida->setReo($funcionesGenerales->validateStringArancel($object->reo));
                      $partida->setUnidad_medida($funcionesGenerales->validateStringArancel($object->unidad_medida ));
                      $partida->setCriterio_valor($funcionesGenerales->validateNumberArancel($object->criterio_valor));
                      $partida->setActivo(TRUE);
//                      if(property_exists($object,'columna1'))$partida->setColumna1((string)str_replace('"', '\"', $object->columna1));
//                      if(property_exists($object,'columna2'))$partida->setColumna2((string)str_replace('"', '\"', $object->columna2));
//                      if(property_exists($object,'columna3'))$partida->setColumna3((string)str_replace('"', '\"', $object->columna3));
//                      if(property_exists($object,'columna4'))$partida->setColumna4((string)str_replace('"', '\"', $object->columna4));

                      $partida->save();
                  }
              }
              echo '{"status":"1","message":"El arancel se guardo correctamente."}';
          }
          else echo '{"status":"0","message":"Error al guardar el arancel."}';
      }
      if($_REQUEST['tarea'] == 'desactivarArancel'){
          $arancel->setId_arancel($_REQUEST['id_arancel']);
          $arancel = $sqlArancel->getBuscarArancelPorId($arancel);
//          $this->deletePartidas($arancel->getId_arancel());
          $arancel->setActivo(false);
          $acuerdo_arnacel->setId_arancel($_REQUEST['id_arancel']);
          $sqlAcuerdoArancel->desactivateArancel($acuerdo_arnacel);
          $arancel->save();
          echo '{"status":"1","message":"El arancel se elimino correctamente."}';
      }
      if($_REQUEST['tarea'] == 'deletePartida'){
          $partida = new Partida();
          $partida->setId_partida($_REQUEST['id_partida']);
          $partida = $sqlPartida->getById($partida);
          $partida->setActivo(false);
          $partida->save();
      }
      if($_REQUEST['tarea'] == 'arancel'){
          $arancel->setId_arancel($_REQUEST['id_arancel']);
          $arancel = $sqlArancel->getBuscarArancelPorId($arancel);
          $partida = new Partida();
          $SQLPartida = new SQLPartida();
          $partida->setId_arancel($arancel->getId_arancel());
          $partidas = $SQLPartida->getPartidaArancel($partida);

          $vista->assign('arancel',$arancel);
          $vista->assign('partidas',$partidas);
          $vista->display("admAranceles/Arancel.tpl");
      }
  }

    ///-----------------verifica si un arancel esta siendoutilizado por un acuerdo OJO este metodo ya ne se esta llamando
    public function checkArancel($id_arancel)
    {
        $acuerdoarancel = new AcuerdoArancel();
        $sqlacuerdoarancel = new SQLAcuerdoArancel();
        $acuerdoarancel->setId_arancel($id_arancel);
        $acuerdos= $sqlacuerdoarancel->getByArancel($acuerdoarancel);
        return (count($acuerdos)==0?true:false);
    }
    ///Elimina partidas
    public function deletePartidas($id_arancel)
    {
        $partida = new Partida();
        $partida->setId_arancel($id_arancel);
        $sqlPartida = new SQLPartida();
        $sqlPartida->deletePartidaByArancel($partida);
    }
    public static function getPartida($id_partida){
      $partida = new Partida();
      $sqlPartida = new SQLPartida();
      $partida->setId_partida($id_partida);
      return $sqlPartida->getById($partida);
    }

}