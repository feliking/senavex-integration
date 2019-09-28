<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLActividadEconomica.php v1.0 02/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLAcuerdo {
    
    public function getListarAcuerdo(Acuerdo $acuerdo) {
        return $acuerdo->findAll('estado = TRUE');
    }
    
    public function getBuscarAcuerdoPorId(Acuerdo $acuerdo) {
        return $acuerdo->finder()->findByPk($acuerdo->getId_Acuerdo());
    }

    public function getBuscarIdporNombreAcuerdo(Acuerdo $acuerdo) {
        return $acuerdo->finder()->find('descripcion = ?', $acuerdo->getDescripcion());
    }

    public function getListarAcuerdoPorTipoCertificado(Acuerdo $acuerdo) {
        return $acuerdo->finder()->with_tipo_co()->findAll('id_acuerdo > 0');
    }
    public function getConsulta(Acuerdo $acuerdo, $condiciones, $order){
        $criteria = new TActiveRecordCriteria;
	$criteria->setCondition($condiciones);
        if(!empty($order)){
            $criteria->OrdersBy[$order] = 'desc';
        }
	return $acuerdo->finder()->findAll($criteria);
    }

    public function getListarAcuerdoPorTipo(Acuerdo $acuerdo) {
        return $acuerdo->findAll('estado = TRUE and id_tipo_co = ?',$acuerdo->getId_tipo_co());
    }

    public function getListarAcuerdoPorTipoDdjj(Acuerdo $acuerdo) {
        return $acuerdo->findAll('estado = TRUE and id_tipo_ddjj = ?',$acuerdo->getId_tipo_co());
    }

}