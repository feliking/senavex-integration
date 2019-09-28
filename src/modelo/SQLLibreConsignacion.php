<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLLibreConsignacion.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLLibreConsignacion {
    
    public function getListarLibreConsignacionPorEmpresa(LibreConsignacion $libre_consignacion) {
        return $libre_consignacion->finder()->findAll('id_empresa = ?', $libre_consignacion->getId_Empresa());
    }
}