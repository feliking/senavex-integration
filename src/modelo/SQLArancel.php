<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLArancel.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLArancel {

  public function getListarArancel(Arancel $arancel) {
//        return $arancel->findAll('activo=?',true);
    return $arancel->findAll();
  }
  public function getListarNoVigente(Arancel $arancel) {
    return $arancel->findAll('vigente=? AND id_arancel!=?' ,false,0);
//        return $arancel->findAll();
  }
  public function getArancelVigente(Arancel $arancel) {
    return $arancel->finder()->find('vigente=?',true);
  }
  public function getAllNoDefault(Arancel $arancel) {
    return $arancel->findAll('id_arancel!=? and activo=true' ,0);
  }
  public function getBuscarArancelPorId(Arancel $arancel) {
    return $arancel->finder()->find('id_arancel = ?', $arancel->getId_arancel());
  }

  public function getIdsArancel(Arancel $arancel){
    $sql='SELECT id_arancel FROM arancel WHERE activo=true';
    $connection = $arancel->getDbConnection();
    $connection->Active = true;
    $command = $connection->createCommand($sql);
    $dataReader = $command->query();
    $rows = $dataReader->readAll();
    $array = [];
    foreach ($rows as $key=>$val){
      array_push($array, $val['id_arancel']);
    }
    return $array;
  }
  public function resetActivo(Arancel $arancel){
    $sql='update arancel set vigente=FALSE';
    $connection = $arancel->getDbConnection();
    $connection->Active = true;
    $command = $connection->createCommand($sql);
    $command->query();
  }
}