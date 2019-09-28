<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPlanillaDDJJAcuerdo {
    
    public function save(PlanillaDDJJAcuerdo $planilladdjjacuerdo) {
        return $planilladdjjacuerdo->save();
    }
    
    public function getListarPlanillaDDJJAcuerdo(PlanillaDDJJAcuerdo $planilladdjjacuerdo){
        return $planilladdjjacuerdo->findAll();
    }
    
    public function getListarAcuerdoPorPlanillaDDJJ(PlanillaDDJJAcuerdo $planilladdjjacuerdo){
        return $planilladdjjacuerdo->findAll("id_planilla_ddjj = ?", $planilladdjjacuerdo->getId_planilla_ddjj());
    }
    
    public function getPlanillaDDJJAcuerdo(PlanillaDDJJAcuerdo $planilladdjjacuerdo){
        return $planilladdjjacuerdo->finder()->find("id_planilla_ddjj_acuerdo = ?", $planilladdjjacuerdo->getId_planilla_ddjj_acuerdo());
    }
    
    public function getConsultaSQL($sql){
        $planilladdjj=new PlanillaDDJJ();
        $connection = $planilladdjj->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}