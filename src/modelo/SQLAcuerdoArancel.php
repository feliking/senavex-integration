<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAcuerdoPais.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLAcuerdoArancel {
    
    public function getListarAcuerdoArancel(AcuerdoArancel $acuerdo_arancel) {
        return $acuerdo_arancel->findAll();
    }
    public function getByAcuerdo(AcuerdoArancel $acuerdo_arancel) {
        return $acuerdo_arancel->finder()->findAll('id_acuerdo=?',$acuerdo_arancel->getId_acuerdo());
    }
    public function getByArancel(AcuerdoArancel $acuerdo_arancel) {
        return $acuerdo_arancel->findAll('id_arancel=? AND activo=?',$acuerdo_arancel->getId_arancel(),true);
    }
    public function desactivateArancel(AcuerdoArancel $acuerdo_arancel) {
        $sql='update acuerdo_arancel set activo=FALSE WHERE id_arancel='.$acuerdo_arancel->getId_arancel();
        $connection = $acuerdo_arancel->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $command->query();
    }
}