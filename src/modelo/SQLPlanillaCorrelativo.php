<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPlanillaCorrelativo {
    
    public function save(PlanillaCorrelativo $planillacorrelativo) {
        return $planillacorrelativo->save();
    }
    
    public function getPlanillaCorrelativo(PlanillaCorrelativo $planillacorrelativo) {
        return $planillacorrelativo->finder()->find('id_planilla_correlativo = ?', $planillacorrelativo->getId_planilla_correlativo());
    }
    
    public function getPlanillaCorrelativoPorRegionalEstadoTipo(PlanillaCorrelativo $planillacorrelativo) {
        return $planillacorrelativo->finder()->find("id_regional = ? and estado = ? and tipo = ?", array($planillacorrelativo->getId_regional(), $planillacorrelativo->getEstado(), $planillacorrelativo->getTipo()));
    }
    
}