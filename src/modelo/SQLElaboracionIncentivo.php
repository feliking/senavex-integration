<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLElaboracionIncentivo.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLElaboracionIncentivo {
    
    public function getListarElaboracionIncentivo(ElaboracionIncentivo $elaboracion_incentivo) {
        return $elaboracion_incentivo->findAll();
    }
    
    public function getBuscarDescripcionPorId(ElaboracionIncentivo $elaboracion_incentivo) {
        return $elaboracion_incentivo->finder()->find('id_elaboracion_incentivo = ?', $elaboracion_incentivo->getId_elaboracion_incentivo());
    }
}