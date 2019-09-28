<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAsesoramiento.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLAsesoramiento {
    
    public function getListarAsesoramiento(Asesoramiento $asesoramiento) {
        return $asesoramiento->findAll();
    }
    
    public function getBuscarAsesoramientoPorId(Asesoramiento $asesoramiento) {
        return $asesoramiento->finder()->find('id_asesoramiento = ?', $asesoramiento->getId_asesoramiento());
    }
    
    public function setGuardarAsesoramiento(Asesoramiento $asesoramiento){
        return $asesoramiento->save();
    }
    
    public function getListarHistoricoAsesoramiento(AsesoramientoHistorico $asesoramiento_historico){
        $criteria = new TActiveRecordCriteria();
        $criteria->setCondition("id_asesoramiento=".$asesoramiento_historico);
        $criteria->setOrdersBy("fecha_observacion");
        return $asesoramiento_historico->findAll($criteria);
    }
    
    public function getBuscarAsesoramientoPorServicioExportador(Asesoramiento $asesoramiento) {
        return $asesoramiento->finder()->find('id_servicio_exportador = ?', $asesoramiento->getId_Servicio_Exportador());
    }
    

}