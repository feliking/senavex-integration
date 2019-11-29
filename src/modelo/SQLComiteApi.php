<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 29/11/2019
 * @autor       Eddy Quintanilla Chinche
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLComiteApi {
    
    public function Guardar(ComiteApi $comite_api){
        return $comite_api->save();
    }
    public function getComitePorID(ComiteApi $comite_api){
        return $comite_api->finder()->find('id_comite_api = ?', $comite_api->getId_comite_api());
    }
    public function getListarComite(ComiteApi $comite_api) {
        return $comite_api->findAll('order by nro_comite asc');
    }
    
    public function getListarComitePorEstadp(ComiteApi $comite_api) {
        return $comite_api->finder()->findAll('id_estado_comite = ? order by nro_comite asc ', $comite_api->getId_estado_comite());
    }
}