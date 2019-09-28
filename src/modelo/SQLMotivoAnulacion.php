<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLMotivoAnulacion.php v1.0 10/08/2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2015 Servicio Nacional de Verificación de Exportaciones
 */

class SQLMotivoAnulacion {
    
    public function getListarMotivoAnulacion(MotivoAnulacion $motivo_anulacion) {
        return $motivo_anulacion->findAll('ORDER by id_motivo_anulacion');
    }
    
}