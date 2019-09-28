<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 01/08/2017
 * @autor       José Alfredo Arroyo Santa Cruz 
 * @autor       Eddy Quintanilla
 * @copyright	Copyright (C) 2017 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPlanillaTipoDDJJ {
    
    public function getListarTipoDDJJ(PlanillaTipoDDJJ $planilla_tipo_ddjj) {
        return $planilla_tipo_ddjj->findAll();
    }
    
    
    public function getBuscar(PlanillaTipoDDJJ $planilla_tipo_ddjj) {
        return $planilla_tipo_ddjj->finder()->find('id_planilla_tipo_ddjj = ?', $planilla_tipo_ddjj->getId_planilla_tipo_ddjj());
    }
}