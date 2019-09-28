<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLTipoDocumentoIdentidad.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLTipoCertificadoOrigen {
    
    public function getListarTipoCertificadoOrigen(TipoCertificadoOrigen $tipo_co) {
        return $tipo_co->finder()->findAll('estado = TRUE');
    }
    
    public function getBuscarTipoCertificadoPorId(TipoCertificadoOrigen $tipo_co) {
        return $tipo_co->finder()->findbyPk($tipo_co->getId_tipo_co());
    }

}