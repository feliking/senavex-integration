<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeMedioTransporte {
    
    public function getCafeMedioTransportePorID(CafeMedioTransporte $cafeMedioTransporte) {
        return $cafeMedioTransporte->finder()->find('id_cafe_medio_transporte = ?', $cafeMedioTransporte->getId_cafe_medio_transporte());
    }
    
    public function getListCafeMedioTransporte(CafeMedioTransporte $cafeMedioTransporte) {
        return $cafeMedioTransporte->finder()->findAll();
    }
}