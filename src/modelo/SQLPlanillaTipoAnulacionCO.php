<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLPais.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPlanillaTipoAnulacionCO {
    
    public function save(PlanillaTipoAnulacionCO $planillaTipoAnulacionCO) {
        return $planillaTipoAnulacionCO->save();
    }
   
    public function getPlanillaTipoAnulacionCO(PlanillaTipoAnulacionCO $planillaTipoAnulacionCO) {
        return $planillaTipoAnulacionCO->finder()->find('id_planilla_tipo_anulacion_co = ?', $planillaTipoAnulacionCO->getId_pais());
    }
    
    public function getListarPlanillaTipoAnulacionCO(PlanillaTipoAnulacionCO $planillaTipoAnulacionCO) {
        return $planillaTipoAnulacionCO->finder()->findAll();
    }
    
    
}