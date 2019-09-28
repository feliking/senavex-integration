<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDeclaracionJurada {
    
    public function getListarDeclaracionesPorEstado(DeclaracionJurada $declaracion_jurada) {
        return $declaracion_jurada->finder()->findAll('id_estado_ddjj = ? AND id_empresa = ?', array($declaracion_jurada->getId_estado_ddjj(), $declaracion_jurada->getId_Empresa()));
    }
    
    public function getListarDeclaracionesPorEstadoyCumple(DeclaracionJurada $declaracion_jurada) {
        return $declaracion_jurada->finder()->with_empresa()->findAll('id_estado_ddjj=? AND id_empresa=? AND cumple=?', array($declaracion_jurada->getId_estado_ddjj(), $declaracion_jurada->getId_Empresa(), $declaracion_jurada->getCumple()));
    }

    public function getBuscarDeclaracionPorId(DeclaracionJurada $declaracion_jurada) {
        return $declaracion_jurada->finder()->with_estado_ddjj()->with_empresa()->findbyPk($declaracion_jurada->getId_ddjj());
    }

    public function getDesignarCorrelativoDDJJ(DeclaracionJurada $declaracion_jurada) {
        $sql = "Select MAX(correlativo_ddjj) FROM declaracion_jurada WHERE id_empresa=".$declaracion_jurada->getId_Empresa();
        $connection = $declaracion_jurada->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }

    public function setGuardarDdjj(DeclaracionJurada $declaracion_jurada){
        return $declaracion_jurada->save();
    }
    
    public function getListarDeclaracionesParaRevisar(DeclaracionJurada $declaracion_jurada, $certif){
        $sql = "SELECT dj.*,ed.descripcion as estadoddjj, da.codigo as arancel
                FROM servicio_exportador se JOIN declaracion_jurada dj ON(se.id_servicio_exportador=dj.id_servicio_exportador)
                JOIN sistema_colas sc ON(se.id_servicio_exportador=sc.id_servicio_exportador)
                JOIN estado_ddjj ed on(dj.id_estado_ddjj=ed.id_estado_ddjj)
                JOIN detalle_arancel da on(dj.id_detalle_arancel=da.id_detalle_arancel)
                WHERE sc.id_asistente=".$certif." AND atendido<2 AND se.id_servicio=3 and dj.id_estado_ddjj in(0,4)
                ORDER BY dj.fecha_registro ASC";
        $connection = $declaracion_jurada->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }

    public function getDeclaracionJuradaPorServicioExportador(DeclaracionJurada $declaracion_jurada){
        return $declaracion_jurada->finder()->find('id_servicio_exportador = ?',$declaracion_jurada->getId_Servicio_Exportador());   
    }
    public function getListaDeclarcionesJuradasPorSerivicioExportador(DeclaracionJurada $declaracion_jurada){
        return $declaracion_jurada->finder()->findAll('id_servicio_exportador = ?',$declaracion_jurada->getId_Servicio_Exportador());
    }

}