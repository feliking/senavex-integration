<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFacturaSenavexManualDetalle {
    public function Save(FacturaSenavexManualDetalle $facturaSenavexManualDetalle){
        return $facturaSenavexManualDetalle->save(); 
    }
    public function getFacturaDetallePorID(FacturaSenavexManualDetalle $facturaSenavexManualDetalle) {
        return $facturaSenavexManualDetalle->find('id_factura_senavex_manual_detalle = ?', $facturaSenavexManualDetalle->getId_factura_senavex_manual_detalle());
    }
    public function getListFacturaDetallePorIdFactura(FacturaSenavexManualDetalle $facturaSenavexManualDetalle) {
        return $facturaSenavexManualDetalle->findAll('id_factura_senavex_manual  = ?', $facturaSenavexManualDetalle->getId_factura_senavex_manual());
    }
    public function getListFacturaDetallePorServicioFechaDetallado(FacturaSenavexManualDetalle $facturaSenavexManualDetalle,$id_regional, $fecha_ini, $fecha_fin){
        $sql =  
            "SELECT fsm.numero_factura, fsm.numero_recibo, fsm.fecha_emision, s.descripcion, fse.ruex, fse.nombre, fsmd.cantidad, fsmds.nro_ctrl_1,fsmds.nro_ctrl_2, s.costo * fsmd.cantidad as total FROM "
                ."factura_senavex_manual fsm, "
                ."factura_senavex_manual_detalle fsmd, "
                ."factura_senavex_manual_detalle_servicio fsmds, "
                ."factura_senavex_empresa fse, "
                ."servicio s "
            ."WHERE "
                ."fse.id_factura_senavex_empresa = fsm.id_empresa AND "
                ."fsmd.id_factura_senavex_manual_detalle = fsmds.id_factura_senavex_manual_detalle AND "
                ."fsmd.id_servicio = s.id_servicio AND "
                .($id_regional != 11 ? "fsm.id_regional = ".$id_regional. " AND " : "")
                ."fsmd.id_factura_senavex_manual = fsm.id_factura_senavex_manual AND "
                ."fsm.numero_factura > 0 AND "
                ."fsm.fecha_emision BETWEEN '".$fecha_ini." 00:00:00' AND '".$fecha_fin." 23:59:59' AND "
                ."fsm.estado != 1  AND fsm.estado != 3 AND fsm.estado != 4 AND fsm.estado != 6 AND fsm.estado != 7";
        
        $connection = $facturaSenavexManualDetalle->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
    public function getListFacturaDetallePorServicioFecha(FacturaSenavexManualDetalle $facturaSenavexManualDetalle,$id_regional, $fecha_ini, $fecha_fin, $id_tipo){
        //return $facturaSenavexManualDetalle->findAll('  = ?', $facturaSenavexManualDetalle->());
        $sql =  
            'SELECT * FROM '
                .'factura_senavex_manual fsm, '
                .'factura_senavex_manual_detalle fsmd '
                .'WHERE '
                .'fsmd.id_factura_senavex_manual = fsm.id_factura_senavex_manual AND '
                . ($id_regional != 11 ? "fsm.id_regional = ".$id_regional. " AND " : "")
                . ($id_tipo > 0 ? "fsm.id_tipo = ".$id_tipo. " AND " : "")
                .'fsm.numero_factura>0 AND '
                . "fsm.fecha_emision BETWEEN '".$fecha_ini." 00:00:00' AND '".$fecha_fin." 23:59:59' AND "
                ."( fsm.estado = 2 or fsm.estado=5 ) and "
                ."( "
                    ."fsmd.id_servicio in (select s.id_servicio from servicio s where s.id_servicio = ".$facturaSenavexManualDetalle->getId_servicio(). ") or "
                    ."fsmd.id_servicio in (select se.id_servicio_exportador from servicio_exportador se where se.id_servicio = ".$facturaSenavexManualDetalle->getId_servicio(). ") "
                .") ";
        $connection = $facturaSenavexManualDetalle->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }    
}