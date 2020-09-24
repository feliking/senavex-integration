<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLArancel.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPartida
{

    public function getPartidaArancel(Partida $partida)
    {
        return $partida->findAll('id_arancel=? AND activo=?', $partida->getId_arancel(),true);
    }
    public function getById(Partida $partida) {
        return $partida->finder()->find('id_partida = ?', $partida->getId_partida());
    }
    public function getPartida(Partida $partida) {
        return $partida->finder()->find('id_arancel = ? AND partida = ? AND activo = true', $partida->getId_arancel(),$partida->getPartida());
    }
    public function deletePartidaByArancel(Partida $partida){
        $sql='update partida set activo=false where id_arancel='.$partida->getId_arancel();
        $connection = $partida->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $command->query();
    }
    public function searchPartidaByArancel(Partida $partida,$search){
        $sql="SELECT * FROM partida WHERE  id_arancel=".$partida->getId_arancel()." AND activo = true AND partida % '".$search."' ORDER BY partida asc;";
        $connection = $partida->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}