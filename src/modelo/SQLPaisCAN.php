<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLPais.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPaisCAN {
    
    public function getListarPais(PaisCAN $pais_can) {
        return $pais_can->findAll();
    }
    
    public function getBuscarDescripcionPorId(PaisCAN $pais_can) {
        return $pais_can->finder()->find('id_pais_can = ?', $pais_can->getId_pais_can());
    }
    
}