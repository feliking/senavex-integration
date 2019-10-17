<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */
class SQLDeclaracionJurada {

  public function getListarDeclaracionesPorEstado(DeclaracionJurada $declaracion_jurada) {
    return $declaracion_jurada->finder()->findAll('id_estado_ddjj = ? AND id_empresa = ?', array($declaracion_jurada->getId_estado_ddjj(), $declaracion_jurada->getId_Empresa()));
  }

  public function getListarDeclaracionesConMuestra(DeclaracionJurada $declaracion_jurada) {
    return $declaracion_jurada->finder()->findAll('id_estado_ddjj = ? AND id_empresa = ?  AND id_acuerdo = ? AND muestra = true', array($declaracion_jurada->getId_estado_ddjj(), $declaracion_jurada->getId_Empresa(), $declaracion_jurada->getId_acuerdo()));
  }

  public function getListarDdjjObjectsEstado(DeclaracionJurada $declaracion_jurada,$perfil_uco) {
    $condition = $perfil_uco?'id_estado_ddjj = ?':'id_estado_ddjj = ? AND id_empresa = '.$declaracion_jurada->getId_Empresa();
    return $declaracion_jurada->finder()->with_acuerdo()->findAll($condition, $declaracion_jurada->getId_estado_ddjj());
  }
  public function getListarDeclaracionesPorEstadoyCumple(DeclaracionJurada $declaracion_jurada) {
    return $declaracion_jurada->finder()->with_empresa()->findAll('id_estado_ddjj=? AND id_empresa=? AND cumple=?', array($declaracion_jurada->getId_estado_ddjj(), $declaracion_jurada->getId_Empresa(), $declaracion_jurada->getCumple()));
  }
  public function getById(DeclaracionJurada $declaracion_jurada) {
    return $declaracion_jurada->finder()->findbyPk($declaracion_jurada->getId_ddjj());
  }
  public function getByIdServicioExportador(DeclaracionJurada $declaracion_jurada,$id_servicio_exportador) {
    return $declaracion_jurada->finder()->findAll('id_servicio_exportador=?', array($id_servicio_exportador));
  }
  public function getBuscarDeclaracionPorId(DeclaracionJurada $declaracion_jurada) {
    return $declaracion_jurada->finder()
      ->with_comercializadores()
      ->with_acuerdo()
      ->with_insumosnacionales()
      ->with_insumosimportados()
      ->with_zonasespeciales()
      ->with_observaciones_ddjj()
      ->with_ddjjdocumentos()
      ->with_estado_ddjj()
      ->with_empresa()
      ->with_partida()
      ->findbyPk($declaracion_jurada->getId_ddjj());
  }
  public function getBuscarDeclaracionPorIdEmpresa(DeclaracionJurada $declaracion_jurada) {
    return $declaracion_jurada->finder()
      ->with_acuerdo()
      ->with_estado_ddjj()
      ->with_empresa()
      ->with_partida()
      ->findbyPk($declaracion_jurada->getId_ddjj());
  }
  public function getBuscarDeclaracionPorId_CO(DeclaracionJurada $declaracion_jurada) {
    return $declaracion_jurada->finder()
      ->findbyPk($declaracion_jurada->getId_ddjj());
  }
  public function getDesignarCorrelativoDDJJ(DeclaracionJurada $declaracion_jurada) {
    $sql = "Select MAX(correlativo_ddjj) FROM declaracion_jurada WHERE id_empresa=".$declaracion_jurada->getId_Empresa();
    $connection = $declaracion_jurada->getDbConnection();
    $connection->Active = true;
    $command = $connection->createCommand($sql);
    $dataReader = $command->query();
    $rows = $dataReader->readAll();
    return $rows;
  }

  public function setGuardarDdjj(DeclaracionJurada $declaracion_jurada){
    try{
      $id = $declaracion_jurada->save();
      return $id;
    } catch (Exception $e) {
      echo "<pre>";
      var_dump($e);
      echo "</pre>";
      echo '<br>Caught exception: ';
    }

  }

  public function getListarDeclaracionesParaRevisar(DeclaracionJurada $declaracion_jurada, $certif){
    $sql = "SELECT dj.*,ed.descripcion as estadoddjj
                FROM servicio_exportador se JOIN declaracion_jurada dj ON(se.id_servicio_exportador=dj.id_servicio_exportador)
                JOIN sistema_colas sc ON(se.id_servicio_exportador=sc.id_servicio_exportador)
                JOIN estado_ddjj ed on(dj.id_estado_ddjj=ed.id_estado_ddjj)
                WHERE sc.id_asistente=".$certif." AND sc.atendido=0 AND se.id_servicio=3 and dj.id_estado_ddjj =0";
    $connection = $declaracion_jurada->getDbConnection();
    $connection->Active = true;
    $command = $connection->createCommand($sql);
    $dataReader = $command->query();
    $rows = $dataReader->readAll();
    return $rows;
  }

  public function getDeclaracionJuradaPorServicioExportador(DeclaracionJurada $declaracion_jurada){
    return $declaracion_jurada->finder()->find('id_servicio_exportador = ?',$declaracion_jurada->getId_Servicio_Exportador());
  }
  public function getListaDeclarcionesJuradasPorSerivicioExportador(DeclaracionJurada $declaracion_jurada){
    return $declaracion_jurada->finder()->findAll('id_servicio_exportador = ?',$declaracion_jurada->getId_Servicio_Exportador());
  }
  public function getByAcuerdo(DeclaracionJurada $declaracion_jurada){
    return $declaracion_jurada->finder()->findAll('id_acuerdo = ?',$declaracion_jurada->getId_acuerdo());
  }
  public function getByEstado(DeclaracionJurada $declaracion_jurada) {
    return $declaracion_jurada->finder()->findAll('id_estado_ddjj = ?' ,$declaracion_jurada->getId_estado_ddjj());
  }
  public function getAcuerdosDDJJByEstado(DeclaracionJurada $declaracion_jurada){
    $sql = "SELECT DISTINCT ac.id_acuerdo, ac.descripcion as acuerdoddjj FROM acuerdo ac JOIN declaracion_jurada dj 
        ON(dj.id_acuerdo=ac.id_acuerdo) WHERE dj.id_empresa=".$declaracion_jurada->getId_Empresa()." and dj.id_estado_ddjj =1";
    $connection = $declaracion_jurada->getDbConnection();
    $connection->Active = true;
    $command = $connection->createCommand($sql);
    $dataReader = $command->query();
    $rows = $dataReader->readAll();
    return $rows;
  }

  public function getAcuerdoDDJJRepetidoByEstado(DeclaracionJurada $declaracion_jurada){
    $sql = "SELECT ac.id_acuerdo, ac.descripcion as acuerdoddjj, dj.muestra FROM acuerdo ac JOIN declaracion_jurada dj 
        ON(dj.id_acuerdo=ac.id_acuerdo) WHERE dj.id_empresa=".$declaracion_jurada->getId_Empresa()." and dj.id_estado_ddjj =1";
    $connection = $declaracion_jurada->getDbConnection();
    $connection->Active = true;
    $command = $connection->createCommand($sql);
    $dataReader = $command->query();
    $rows = $dataReader->readAll();
    return $rows;
  }

  public function getMuestrasDDJJRepetidoByEstado(DeclaracionJurada $declaracion_jurada){
    $sql = "SELECT ac.id_acuerdo, ac.descripcion as acuerdoddjj, dj.muestra FROM acuerdo ac JOIN declaracion_jurada dj 
        ON(dj.id_acuerdo=ac.id_acuerdo) WHERE dj.id_empresa=".$declaracion_jurada->getId_Empresa()." and dj.id_acuerdo = ".$declaracion_jurada->getId_acuerdo()." and dj.id_estado_ddjj =1";
    $connection = $declaracion_jurada->getDbConnection();
    $connection->Active = true;
    $command = $connection->createCommand($sql);
    $dataReader = $command->query();
    $rows = $dataReader->readAll();
    return $rows;
  }

  public function  getDDJJByAcuerdoByEstado(DeclaracionJurada $declaracion_jurada,$acuerdo){
    //return $declaracion_jurada->finder()->findAll();
    $sql = "SELECT dj.id_ddjj, dj.id_empresa,dj.id_estado_ddjj, dj.denominacion_comercial, dj.id_partida, p.partida 
  FROM declaracion_jurada dj inner join partida p on (dj.id_partida= p.id_partida) where dj.id_empresa=".$declaracion_jurada->getId_Empresa(). " and dj.id_estado_ddjj=1 and muestra=".$declaracion_jurada->getMuestra()." and dj.id_acuerdo=".$acuerdo.";";
    $connection = $declaracion_jurada->getDbConnection();
    $connection->Active = true;
    $command = $connection->createCommand($sql);
    $dataReader = $command->query();
    $rows = $dataReader->readAll();
    return $rows;
  }

  public function  getDDJJByAcuerdoByEstadoNatural(DeclaracionJurada $declaracion_jurada,$acuerdo){
    $sql = "SELECT dj.id_ddjj, dj.id_empresa,dj.id_estado_ddjj, dj.denominacion_comercial, dj.id_partida, p.partida FROM declaracion_jurada dj inner join partida p on (dj.id_partida= p.id_partida) where dj.id_empresa=".$declaracion_jurada->getId_Empresa(). " and dj.id_estado_ddjj=1 and dj.id_acuerdo=".$acuerdo.";";
    $connection = $declaracion_jurada->getDbConnection();
    $connection->Active = true;
    $command = $connection->createCommand($sql);
    $dataReader = $command->query();
    $rows = $dataReader->readAll();
    return $rows;
  }
}