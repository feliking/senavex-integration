<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEmpresaTemporal {
    public function getDatosEmpresaTemporalPorID(EmpresaTemporal $empresa_temporal) {
        return $empresa_temporal->finder()->find('id_empresa_temporal = ?', $empresa_temporal->getId_empresa_temporal());
    }  
    public function getVerificaCorreoInstitucional(EmpresaTemporal $empresa_temporal){
        $criteria = new TActiveRecordCriteria;
	$criteria->setCondition("email = '" . $empresa_temporal->getEmail()."'");
	return $empresa_temporal->finder()->count($criteria);
    }
    
    
    public function getListarEmpresaTemporal(EmpresaTemporal $empresa_temporal) {
        return $empresa_temporal->finder()->findAll('id_empresa_temporal = ?', $empresa_temporal->getId_empresa_temporal());
    }
    
    public function getListarEmpresasTemporalesAdmitidas(EmpresaTemporal $empresa_temporal) {
        return $empresa_temporal->finder()->findAll('id_estado_empresa_temporal = ?', $empresa_temporal->getId_estado_empresa_temporal());
    }
    
    
}