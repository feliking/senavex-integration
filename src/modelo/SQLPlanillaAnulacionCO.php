<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLPais.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPlanillaAnulacionCO {
    
    public function save(PlanillaAnulacionCO $planillaAnulacionCO) {
        return $planillaAnulacionCO->save();
    }
   
    public function getPlanillaAnulacionCO(PlanillaAnulacionCO $planillaAnulacionCO) {
        return $planillaAnulacionCO->finder()->find('id_planilla_anulacion_co = ?', $planillaAnulacionCO->getId_pais());
    }
    
    public function getListarPlanillaAnulacionCO_Tipo_Fecha(PlanillaAnulacionCO $planillaAnulacionCO, $fecha_fin) {
        
        $sql = 
            "SELECT ".
                "paco.id_planilla_anulacion_co, ".
                "paco.nro_control, ".
                "s.descripcion as tipo_co, ".
                "e.ruex, ".
                "e.razon_social, ".
                "r.ciudad, ".
                "paco.observacion as observacion, ".
                "paco.fecha_registro,  ".
                "ptaco.descripcion as tipo_anulacion_co, ".
                "CONCAT(p.nombres, ' ', p.paterno, ' ', p.materno) as certificador ".
            "FROM ".
                "planilla_anulacion_co paco, ".
                "planilla_tipo_anulacion_co ptaco, ".
                "servicio s, ".
                "empresa e, ".
                "persona p, ".
                "regional r ".
            "WHERE ".
                "paco.id_planilla_tipo_anulacion_co = ptaco.id_planilla_tipo_anulacion_co and ".
                "paco.id_empresa = e.id_empresa and ".
		"paco.estado_anulacion_co = TRUE and  ".
                "paco.id_regional = r.id_regional and ".
                "paco.id_tipo_co = s.id_servicio and ".
                "paco.id_certificador = p.id_persona and ". 
                ($planillaAnulacionCO->getId_regional()!=11? "paco.id_regional = " . $planillaAnulacionCO->getId_regional() . " and ": "" ) .
                "paco.fecha_registro between '" .$planillaAnulacionCO->getFecha_registro() ." 00:00:00 ' and '". $fecha_fin ." 23:59:59'";
//        print('<pre>'.print_r($sql,true).'</pre>');
        return $this->getConsultaSQL($sql);
    }
     public function getConsultaSQL($sql){
        $empresa=new Empresa();
        $connection = $empresa->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}