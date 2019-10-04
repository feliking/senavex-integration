<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAutorizacionPrevia.php v1.0 29/08/2019
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLAutorizacionPrevia {
    
    
    public function Save(AutorizacionPrevia $autorizacionPrevia){
        return $autorizacionPrevia->save();
    }

    public function getListar(AutorizacionPrevia $autorizacionPrevia) {
        return $autorizacionPrevia->findAll();
    }

    public function getAutorizacionPorId(AutorizacionPrevia $autorizacionPrevia) {
        return $autorizacionPrevia->finder()->find('id_autorizacion_previa = ?', $autorizacionPrevia->getId_autorizacion_previa());
    }  

    public function getListarAPxEmpresa(AutorizacionPrevia $autorizacionPrevia) {
        return $autorizacionPrevia->findAll('id_empresa_importador = ? order by id_autorizacion_previa desc ', $autorizacionPrevia->getId_empresa_importador());
    }

    public function getListarAprobadas(AutorizacionPrevia $autorizacionPrevia) {
        return $autorizacionPrevia->findAll('estado = 1 order by id_autorizacion_previa asc ');
    }
}