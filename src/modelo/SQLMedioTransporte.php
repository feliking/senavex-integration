<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLMedioTransporte.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLMedioTransporte {
    
    public function getListarMedioTransporte(MedioTransporte $medio_transporte) {
        return $medio_transporte->finder()->findAll();
    }
   
}