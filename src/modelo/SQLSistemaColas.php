<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLSistemaColas.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLSistemaColas {
    
    public function getListarColaAsistenteGeneral(SistemaColas $sistema_colas) {
        return $sistema_colas->finder()->find('id_asistente = ? AND atendido < 2', $sistema_colas->getId_Asistente());
    }
    
    public function getListarColaAsistenteRuex(SistemaColas $sistema_colas) {
        $criteria = new TActiveRecordCriteria;
        $criteria->setCondition("id_asistente = ".$sistema_colas->getId_Asistente()." AND atendido < 2");
        return $sistema_colas->finder()->with_servicio_exportador()->findAll($criteria);
    }

    public function getListarColaAsistentePorServicio(SistemaColas $sistema_colas, $servicio_prestado) {
        $sql ="Select sc.* from sistema_colas sc join servicio_exportador se on (sc.id_servicio_exportador=se.id_servicio_exportador) "
                . "where id_asistente=".$sistema_colas->getId_Asistente()." AND atendido<2 AND se.id_servicio=".$servicio_prestado;
        return $sistema_colas->finder()->findAllBySql($sql);
    }

    public function getListarColaAsistentePorTemporales(SistemaColas $sistema_colas) {
       /* $sql ="Select sc.*,e.*, ut.* from servicio_exportador se join sistema_colas sc on (se.id_servicio_exportador=sc.id_servicio_exportador) "
                . "join empresa e on(se.id_empresa=e.id_empresa) join usuario_temporal ut on(e.id_usuario_temporal=ut.id_usuario_temporal)"
                . "where sc.id_asistente=".$sistema_colas->getId_Asistente()." AND sc.atendido<2 and e.estado=0 and se.id_servicio=1";*/
        $sql ="Select sc.*,e.* from servicio_exportador se join sistema_colas sc on (se.id_servicio_exportador=sc.id_servicio_exportador) "
                . "join empresa e on(se.id_empresa=e.id_empresa)"
                . "where sc.id_asistente=".$sistema_colas->getId_Asistente()." AND sc.atendido<2 and e.estado=0 and se.id_servicio=1";
        $connection = $sistema_colas->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        
        return $rows;
    }
    public function getListarColaAsistentePorTemporalesModificacion(SistemaColas $sistema_colas) {
        
        $sql ="Select sc.*,e.*, me.* from servicio_exportador se join sistema_colas sc on (se.id_servicio_exportador=sc.id_servicio_exportador) "
                . "join empresa e on(se.id_empresa=e.id_empresa) join modificacion_empresa_relevancia me on(se.id_servicio_exportador=me.id_servicio_exportador)"
                . "where id_asistente=".$sistema_colas->getId_Asistente()."  and (se.id_servicio=4 or se.id_servicio=10) and me.estado=0";

        $connection = $sistema_colas->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        
        return $rows;
    }
    
    public function getListarColaAsistentePorDdjj(SistemaColas $sistema_colas) {
        $sql = "SELECT dj.*,ed.descripcion as estadoddjj, da.codigo as arancel
                FROM servicio_exportador se JOIN declaracion_jurada dj ON(se.id_servicio_exportador=dj.id_servicio_exportador)
                JOIN sistema_colas sc ON(se.id_servicio_exportador=sc.id_servicio_exportador)
                JOIN estado_ddjj ed on(dj.id_estado_ddjj=ed.id_estado_ddjj)
                JOIN detalle_arancel da on(dj.id_detalle_arancel=da.id_detalle_arancel)
                WHERE sc.id_asistente=".$sistema_colas->getId_Asistente()." AND atendido<2 AND se.id_servicio=3";
        $connection = $sistema_colas->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
    
    public function getListarColaAsistenteDeclaracionJurada(SistemaColas $sistema_colas) {
        return $sistema_colas->finder()->findAll('id_asistente = ?', $sistema_colas->getId_Asistente());
    }

    /*
    public function setGuardarColaAsistente(SistemaColas $sistema_colas){
        return $sistema_colas->save();
    }*/
     public function getSumarColaAsistenteGeneral(SistemaColas $sistema_colas,$asist) {
        $sql = "SELECT SUM(valoracion) as suma FROM sistema_colas where id_asistente=".$asist." and atendido=0";

        $connection = $sistema_colas->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
        
        //return $sistema_colas->finder()->findBySql($sql);
    }
    public function setGuardarSistemaColas(SistemaColas $sistema_colas){
        return $sistema_colas->save();
    }
    public function getBuscarColaPorServicioExportadorAll(SistemaColas $sistema_colas) {
        return $sistema_colas->finder()->findAll("id_servicio_exportador = ? ",$sistema_colas->getId_Servicio_Exportador());
    }
    public function getBuscarColaPorServicioExportador(SistemaColas $sistema_colas) {
        return $sistema_colas->finder()->find("id_servicio_exportador = ?",$sistema_colas->getId_Servicio_Exportador());
    }
    public function getbyServicioExportadorIdAsistente(SistemaColas $sistema_colas) {
        return $sistema_colas->finder()->find("id_servicio_exportador = ? and atendido=0",$sistema_colas->getId_Servicio_Exportador());
    }
    public function getListarColasAsistente(SistemaColas $sistema_colas) {
        return $sistema_colas->finder()->findAll('id_asistente = ? AND atendido < 2', $sistema_colas->getId_Asistente());
    }
    public function getListarColaAsistentePorICO(SistemaColas $sistema_colas){
        $sql='select * from cafe_borrador where id_estado='.$sistema_colas->getAtendido().' and id_servicio_exportador in
	(select id_servicio_exportador from servicio_exportador where id_servicio_exportador in
		(select id_servicio_exportador from sistema_colas where atendido<2 and id_asistente='.$sistema_colas->getId_Asistente().'))';
//        print('<pre>'.print_r($sql,true).'<pre>');
        $connection = $sistema_colas->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
		
    }
}