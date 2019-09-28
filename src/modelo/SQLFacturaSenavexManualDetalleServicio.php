<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaSenavexManualDetalleServicio {
    
    public function Save(FacturaSenavexManualDetalleServicio $facturaSenavexManualDetalleServicio){
        return $facturaSenavexManualDetalleServicio->save(); 
    }
    
    public function getFacturaDetallePorID(FacturaSenavexManualDetalleServicio $facturaSenavexManualDetalleServicio) {
        return $facturaSenavexManualDetalleServicio->find('id_factura_senavex_manual_detalle_servicio = ?', $facturaSenavexManualDetalleServicio->getId_factura_senavex_manual_detalle_servicio());
    }

    public function getListFacturaDetallePorDetalle(FacturaSenavexManualDetalleServicio $facturaSenavexManualDetalleServicio) {
        return $facturaSenavexManualDetalleServicio->findAll('id_factura_senavex_manual_detalle  = ?', $facturaSenavexManualDetalleServicio->getId_factura_senavex_manual_detalle());
    }
    
    public function getFacturaDetallePorDetalle(FacturaSenavexManualDetalleServicio $facturaSenavexManualDetalleServicio) {
        return $facturaSenavexManualDetalleServicio->find('id_factura_senavex_manual_detalle  = ?', $facturaSenavexManualDetalleServicio->getId_factura_senavex_manual_detalle());
    }
    
//    public function getBuscarDescripcionPorId(FacturaSenavexManual $facturaSenavexManual) {
//        return $facturaSenavexManual->finder()->find('id_pais = ?', $facturaSenavexManual->getId_pais());
//    }
    public function verificarCO(FacturaSenavexManualDetalleServicio $facturaSenavexManualDetalleServicio){
        $sql =  "select ".
            "fsmds.id_factura_senavex_manual_detalle_servicio ".
            "from ".
            "factura_senavex_manual_detalle_servicio fsmds, ".
            "factura_senavex_manual_detalle fsmd, ".
            "factura_senavex_manual fsm ".
            "where ".
            "fsm.id_factura_senavex_manual = fsmd.id_factura_senavex_manual AND (fsm.estado= 2 OR fsm.estado= 5) AND ".
            "fsmd.id_factura_senavex_manual_detalle = fsmds.id_factura_senavex_manual_detalle  AND  ".
            "fsmd.id_servicio = " . $facturaSenavexManualDetalleServicio->getFob() . " and ".
            $facturaSenavexManualDetalleServicio->getNro_ctrl_1() ." between fsmds.nro_ctrl_1 AND fsmds.nro_ctrl_2";
        return $this->getConsultaSQL($sql);
    }

//verificando las reposiciones
    public function verificarCO1(FacturaSenavexManualDetalleServicio $facturaSenavexManualDetalleServicio){
        $sql =  "select ".
            "fsmds.id_factura_senavex_manual_detalle_servicio ".
            "from ".
            "factura_senavex_manual_detalle_servicio fsmds, ".
            "factura_senavex_manual_detalle fsmd, ".
            "factura_senavex_manual fsm ".
            "where ".
            "fsm.id_factura_senavex_manual = fsmd.id_factura_senavex_manual AND ".
            "fsmd.id_factura_senavex_manual_detalle = fsmds.id_factura_senavex_manual_detalle  AND  ".
            "fsmd.id_servicio = " . ($facturaSenavexManualDetalleServicio->getFob() + 42) . " and ".
            $facturaSenavexManualDetalleServicio->getNro_ctrl_1() ." = (CASE WHEN fsmds.nro_ctrl_1 > fsmds.nro_ctrl_2 THEN fsmds.nro_ctrl_1 ELSE fsmds.nro_ctrl_2 END)";
        return $this->getConsultaSQL($sql);
    }
    public function certificadoVendido(FacturaSenavexManualDetalleServicio $facturaSenavexManualDetalleServicio){
        $sql =  
            "select ".
                "fsmds.id_factura_senavex_manual_detalle_servicio ".
            "from ".
                "factura_senavex_manual_detalle_servicio fsmds, ".
                "factura_senavex_manual_detalle fsmd ".
                "factura_senavex_manual fsm".
            "where ".
                "(fsm.estado = 2 OR fsm.estado = 5) AND fsm.id_factura_senavex_manual = fsmd.id_factura_senavex_manual AND ".
                "fsmd.id_factura_senavex_manual_detalle = fsmds.id_factura_senavex_manual_detalle AND ".
                "fsmd.id_servicio = ".$facturaSenavexManualDetalleServicio->getNro_ctrl_2()." AND ".
                $facturaSenavexManualDetalleServicio->getNro_ctrl_1()." between fsmds.nro_ctrl_1 AND fsmds.nro_ctrl_2";
            return $this->getConsultaSQL($sql);
    }
    
    private function getConsultaSQL($sql){
        $fsmds=new FacturaSenavexManualDetalleServicio();
        $connection = $fsmds->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}