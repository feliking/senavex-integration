<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLTipoDocumentoIdentidad.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLTipoDocumentoIdentidad {
    
    public function getListarTipoDocumentoIdentidad(TipoDocumentoIdentidad $tipo_documento_identidad) {
        return $tipo_documento_identidad->findAll("habilitado=TRUE");
    }
    
    public function getBuscarDescripcionPorId(TipoDocumentoIdentidad $tipo_documento_identidad) {
        return $tipo_documento_identidad->finder()->find('id_tipo_documentoidentidad = ?', $tipo_documento_identidad->getId_tipo_documentoidentidad());
    }
}