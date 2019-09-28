<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPlanillaCO {
    
    public function save(PlanillaCO $planillaCO){
        return $planillaCO->save();
    }
    
    public function getListarEstado(PlanillaCO $planillaCO) {
        return $planillaCO->findAll();
    }
    
    public function getPlanillaCO(PlanillaCO $planillaCO){
        return $planillaCO->finder()->find("id_planilla_co = ?", $planillaCO->getId_planilla_co());
    }
    
    public function getPlanillaPorFolderEmpresa(PlanillaCO $planillaCO) {
        return $planillaCO->finder()->find('numero_folder = ? and id_empresa = ?', array($planillaCO->getId_planilla_co(),$planillaCO->getId_empresa()));
    }
    
    public function getCOPorNumeroE(PlanillaCO $planillaCO) {
        return $planillaCO->finder()->find('numero_folder = ? and id_empresa = ?', array($planillaCO->getId_planilla_co(),$planillaCO->getId_empresa()));
    }
    
    public function getListarPlanillaCOporFolder(PlanillaCO $planillaCO) {
        return $planillaCO->finder()->findAll('numero_folder = ? and id_regional = ?', array($planillaCO->getNumero_folder(), $planillaCO->getId_regional()));
    }
}