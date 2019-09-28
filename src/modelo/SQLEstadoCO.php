<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEstadoCO {
    
    public function getListarEstadoCO(EstadoCO $estadoCO) {
        return $estadoCO->findAll();
    }
    
    public function getBuscarDescripcion(EstadoCO $estadoCO) {
        return $estadoCO->finder()->find('id_estado_co = ?', $estadoCO->getId_estado_co());
    }
    public function getConsulta(EstadoCO $estadoCO, $condiciones, $order){
        $criteria = new TActiveRecordCriteria;
	$criteria->setCondition($condiciones);
        if(!empty($order)){
            $criteria->OrdersBy[$order] = 'desc';
        }
	return $estadoCO->finder()->findAll($criteria);
    }
}