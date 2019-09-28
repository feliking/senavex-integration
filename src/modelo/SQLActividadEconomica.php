<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLActividadEconomica.php v1.0 02/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLActividadEconomica {
    
    public function getListarActividadEconomica(ActividadEconomica $actividad_economica) {
        return $actividad_economica->findAll();
    }
    
    public function getBuscarDescripcionPorId(ActividadEconomica $actividad_economica) {
        return $actividad_economica->finder()->find('id_actividad_economica = ?', $actividad_economica->getId_actividad_economica());
    }
}