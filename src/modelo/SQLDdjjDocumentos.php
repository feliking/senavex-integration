<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDdjjDocumentos {
    public function getbyId(DdjjDocumentos $ddjj_documentos) {
        return $ddjj_documentos->finder()->find('id_ddjj_documentos = '.$ddjj_documentos->getId_ddjj_documentos());
    }
}