<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPlanillaCOReemplazos {
    
    public function save(PlanillaCOReemplazos $planillaCOReemplazos) {
        return $planillaCOReemplazos->save();
    }
    

    public function getListarPlanillaCOReemplazos(PlanillaCOReemplazos $planillaCOReemplazos) {
        return $planillaCOReemplazos->findAll("id_planilla_co = ? ", $planillaCOReemplazos->getId_planilla_co());
    }
    
    public function getPlanillaDDJJ(PlanillaCOReemplazos $planillaCOReemplazos){
        return $planillaCOReemplazos->finder()->find("id_planilla_co_reemplazos = ?", $planillaCOReemplazos->getId_planilla_co_reemplazos());
    }
    
   
}