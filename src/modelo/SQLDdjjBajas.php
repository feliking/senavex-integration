<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDdjjBajas {
    public function getbyId(DdjjBajas $ddjj_bajas) {
        return $ddjj_bajas->finder()->find('id_ddjj_bajas_causas = '.$ddjj_bajas->getId_ddjj_bajas_causas());
    }
    public function getbyPermiso(DdjjBajas $ddjj_bajas) {
        return $ddjj_bajas->finder()->find('permisos = '.$ddjj_bajas->getPermisos());
    }
}