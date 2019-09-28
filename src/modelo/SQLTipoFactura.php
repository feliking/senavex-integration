<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLTipoEmpresa.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLTipoFactura {
    
    public function getListarTipoFactura(TipoFactura $tipo_factura) {
        return $tipo_factura->findAll();
    }
}