<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPlanillaDDJJ {
    
    public function save(PlanillaDDJJ $planilladdjj) {
        return $planilladdjj->save();
    }
    
    public function getListarPlanillaDDJJ(PlanillaDDJJ $planilladdjj) {
        return $planilladdjj->findAll();
    }
    
    public function getListarPlanillaDDJJEmpresaEstado(PlanillaDDJJ $planilladdjj) {
        return $planilladdjj->findAll("id_estado = ? and id_empresa = ?", array($planilladdjj->getId_estado(), $planilladdjj->getId_empresa()));
    }
    
    public function getListarPlanillaDDJJEmpresaEstadoValida(PlanillaDDJJ $planilladdjj) {    
//        return $planilladdjj->findAll( "id_estado = ".$planilladdjj->getId_estado() ." and id_empresa = ".$planilladdjj->getId_empresa()." and fecha_baja is Null and id_actualizacion_ddjj is Null and fecha_vencimiento>= '".$planilladdjj->getFecha_vencimiento()." 23:59:59'" );
        return $planilladdjj->findAll( "id_estado = ".$planilladdjj->getId_estado() ." and id_empresa = ".$planilladdjj->getId_empresa()." and fecha_baja is Null and fecha_vencimiento>= '".$planilladdjj->getFecha_vencimiento()." 23:59:59'" );
    }
    public function getListarPlanillaDDJJEmpresaEstadoValidaSinVigencia(PlanillaDDJJ $planilladdjj) {    
         $sql =  
            "select ".
                " pdj.* ".
            "from ".
                " planilla_ddjj pdj ".
            " where ".
                " pdj.id_empresa = ".$planilladdjj->getId_empresa()." and pdj.id_estado = ".$planilladdjj->getId_estado()." and pdj.fecha_baja is null and ".
            "( ".
                " pdj.id_tipo_planilla = 12 and '".$planilladdjj->getFecha_vencimiento()." 23:59:59' <= pdj.fecha_vencimiento ".
                " or ".
                " pdj.id_tipo_planilla <> 12 and '".$planilladdjj->getFecha_vencimiento()." 23:59:59' <= pdj.fecha_vencimiento + interval '180' day ".
            ")";
//        print("<pre>".print_r($sql,true)."</pre>");
        $connection = $planilladdjj->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
//        return $planilladdjj->findAll($sql);
    }
    public function getExiste(PlanillaDDJJ $planilladdjj) {
        return $planilladdjj->findAll( "id_planilla_ddjj = ?", $planilladdjj->getId_planilla_ddjj() );
    }
    
    public function getPlanillaDDJJ(PlanillaDDJJ $planillaDDJJ){
        return $planillaDDJJ->finder()->find("id_planilla_ddjj = ?", $planillaDDJJ->getId_planilla_ddjj());
    }

    
    public function getListarPlanillaDDJJporFolder(PlanillaDDJJ $planilladdjj) {
        return $planilladdjj->finder()->findAll('numero_folder = ? and id_regional = ?', array($planilladdjj->getNumero_folder(), $planilladdjj->getId_regional()));
    }
    
    public function getPlanillaporNumeroDDJJ(PlanillaDDJJ $planilladdjj){
        return $planilladdjj->finder()->findAll(
                'id_empresa = ? and numero_ddjj = ? and fecha_baja is Null and id_estado = ?', 
                array(
                    $planilladdjj->getId_empresa(), 
                    $planilladdjj->getNumero_ddjj(),
                    $planilladdjj->getId_estado()
                )
            );
    }
    public function getNroFolder(PlanillaDDJJ $planilladdjj){
        
        $sql = 'select count(*) from planilla_ddjj pddjj where EXTRACT(YEAR FROM pddjj.fecha_registro) = ' . $planilladdjj->getFecha_registro() . '  and id_regional = ' . $planilladdjj->getId_regional();
        return $this->getConsultaSQL($sql);
    }
    
    public function getNroDDJJ(PlanillaDDJJ $planilladdjj){
        $sql = "select max(pddjj.numero_ddjj) from planilla_ddjj pddjj where pddjj.id_tipo_planilla in (".$planilladdjj->getId_tipo_planilla().") and pddjj.fecha_baja is null and id_estado = ".$planilladdjj->getId_estado()." and pddjj.id_regional = ".$planilladdjj->getId_regional()." and pddjj.id_empresa = " . $planilladdjj->getId_empresa();
        return $this->getConsultaSQL($sql);
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
    public function getDDJJ(PlanillaDDJJ $planilladdjj){
        $sql =  
            "SELECT * FROM planilla_ddjj WHERE id_planilla_ddjj = " . $planilladdjj->getId_planilla_ddjj();
        
        $connection = $planilladdjj->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
    public function getListarDdjjOrigen_Tipo_Fecha(PlanillaDDJJ $planillaDDJJ, $fecha_fin) {
        
        $sql = "select pd.descripcion, pd.numero_ddjj, pd.fecha_registro, pd.fecha_vencimiento, pd.fecha_baja, pd.observacion, e.ruex, e.razon_social, pac.descripcion as acuerdo, pd.id_nandina, pde.codigo as nandina, pdee.codigo as naladisa, pco.descripcion as criterio_origen, r.ciudad
from planilla_ddjj pd, empresa e, planilla_acuerdo pac, planilla_ddjj_acuerdo pda left join planilla_detalle_arancel pdee on pda.id_detalle_arancel = pdee.id_detalle_arancel, planilla_criterio_origen pco, planilla_detalle_arancel pde, regional r
where pd.id_empresa = e.id_empresa and r.id_regional = pd.id_regional and pda.id_planilla_ddjj = pd.id_planilla_ddjj and pda.id_acuerdo = pac.id_acuerdo
and pco.id_criterio_origen = pda.id_criterio and pde.id_detalle_arancel = pd.id_nandina and ". 
        ($planillaDDJJ->getId_regional()!=11? "pd.id_regional = " . $planillaDDJJ->getId_regional() . " and ": "" ) .
        "pd.fecha_registro between '" .$planillaDDJJ->getFecha_registro() ." 00:00:00 ' and '". $fecha_fin ." 23:59:59' order by r.ciudad, pd.fecha_registro ";
        return $this->getConsultaSQL($sql);
    }
}