<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLPais.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPais {
    
    public function getListarPais(Pais $pais) {
        return $pais->findAll();
    }
    public function getListarPaisSinNinguno(Pais $pais) {
        return $pais->findAll('id_pais > 0 order by nombre asc');
    }
    public function getBuscarDescripcionPorId(Pais $pais) {
        return $pais->finder()->find('id_pais = ?', $pais->getId_pais());
    }
    
    public function getBuscarIdPorNombrePais(Pais $pais) {
        return $pais->finder()->find('nombre = ?', $pais->getNombre());
    }
    /*public function getConsulta(Pais $pais, $condiciones, $order){
        $criteria = new TActiveRecordCriteria;
	$criteria->setCondition($condiciones);
        if(!empty($order)){
            $criteria->OrdersBy[$order] = 'desc';
        }
	return $pais->finder()->findAll($criteria);
    }*/
}