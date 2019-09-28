<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLArancel.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLArancel {
    
    public function getListarArancel(Arancel $arancel) {
        return $arancel->findAll();
    }
    
    public function getBuscarArancelPorId(Arancel $arancel) {
        return $arancel->finder()->find('id_arancel = ?', $arancel->getId_arancel());
    }
}