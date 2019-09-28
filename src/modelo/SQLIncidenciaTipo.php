<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLIncidenciaTipo {
    
    public function getIncidenciaTipoById(IncidenciaTipo $indicencia_tipo) {
        return $indicencia_tipo->finder()->findbyPk($indicencia_tipo->getId_incidencia_tipo());
    }

}