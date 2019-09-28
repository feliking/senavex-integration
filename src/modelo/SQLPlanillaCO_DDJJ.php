<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPlanillaCO_DDJJ {
    
    public function save(PlanillaCO_DDJJ $planillaCO_DDJJ){
        return $planillaCO_DDJJ->save();
    }
    
    
    public function getPlanillaCO_DDJJporID(PlanillaCO_DDJJ $planillaCO_DDJJ){
        return $planillaCO_DDJJ->finder()->find("id_planilla_co_ddjj = ?", $planillaCO_DDJJ->getId_planilla_co_ddjj());
    }
    
    public function getPlanillaCO_DDJJporCO(PlanillaCO_DDJJ $planillaCO_DDJJ){
        return $planillaCO_DDJJ->finder()->findAll("id_planilla_co = ?", $planillaCO_DDJJ->getId_planilla_co());
    }
}