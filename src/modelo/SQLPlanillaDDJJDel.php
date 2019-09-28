<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPlanillaDDJJDel {
    
    public function save(PlanillaDDJJDel $planilladdjjdel) {
        return $planilladdjjdel->save();
    }
    
    public function getListarPlanillaDDJJ(PlanillaDDJJDel $planilladdjjdel) {
        return $planilladdjjdel->findAll();
    }
   
}