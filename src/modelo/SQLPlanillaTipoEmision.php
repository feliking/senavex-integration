<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPlanillaTipoEmision {
    
    public function getListarTipoEmision(PlanillaTipoEmision $planilla_tipo_emision) {
        return $planilla_tipo_emision->findAll();
    }
    
    public function getListarTipoEmisionPorPlanillaTipo(PlanillaTipoEmision $planilla_tipo_emision) {
        return $planilla_tipo_emision->findAll("id_planilla_tipo = ?", $planilla_tipo_emision->getId_planilla_tipo());
    }
    
    public function getBuscar(PlanillaTipoEmision $planilla_tipo_emision) {
        return $planilla_tipo_emision->finder()->find('id_planilla_tipo_emision = ?', $planilla_tipo_emision->getId_planilla_tipo_emision());
    }
}