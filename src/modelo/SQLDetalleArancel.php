<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDetalleArancel.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDetalleArancel {
    
    /*public function getListarDetallePorArancel(DetalleArancel $detalle_arancel) {
        return $detalle_arancel->finder()->with_capitulos()->findAll('id_arancel = ? AND activo=TRUE ORDER BY codigo', $detalle_arancel->getId_Arancel());
    }
    
    public function getBuscarDescripcionPorId(DetalleArancel $detalle_arancel) {
        return $detalle_arancel->finder()->find('id_detalle_arancel = ?', $detalle_arancel->getId_detalle_arancel());
    }*/
    ///*
    /// public function getBuscarDetallePorArancel(DetalleArancel $detalle_arancel,$busca) {
    //    $sql="SELECT id_detalle_arancel, codigo, descripcion FROM detalle_arancel where id_arancel=1 AND activo=TRUE AND ((codigo ilike '%".$busca."%')OR(descripcion ilike '%".$busca."%'))";
    //   return $detalle_arancel->finder()->with_capitulos()->findAllBySql($sql);
    //}
    //*/
    /*public function getBuscarDetallePorArancel(DetalleArancel $detalle_arancel,$busca) {
        return $detalle_arancel->finder()->with_capitulos()->findAll();
    }
    
    
    public function getBuscarDetallePorCodigo(DetalleArancel $detalle_arancel, $nandina, $arancel_pedido) {
        return $detalle_arancel->finder()->find('codigo = ? AND id_arancel = ?', array($nandina,$arancel_pedido));
    }*/
    public function save(DetalleArancel $detalle_arancel){
        $sql = "INSERT INTO planilla_detalle_arancel (id_detalle_arancel, id_arancel, codigo, descripcion, activo) VALUES (".$detalle_arancel->getId_detalle_arancel().",".$detalle_arancel->getId_Arancel().",'".$detalle_arancel->getCodigo()."','".$detalle_arancel->getDescripcion()."', true);";
        print("<pre>".print_r($sql,true)."</pre>");
        return $this->getConsultaSQL($sql);
        //return $detalle_arancel->save();
    }
    
    public function getListarDetallePorArancel(DetalleArancel $detalle_arancel) {
        return $detalle_arancel->finder()->with_capitulos()->findAll('id_arancel = ? AND activo=TRUE ORDER BY codigo', $detalle_arancel->getId_Arancel());
    }
    
    public function getBuscarDescripcionPorId(DetalleArancel $detalle_arancel) {
        return $detalle_arancel->finder()->find('id_detalle_arancel = ?', $detalle_arancel->getId_detalle_arancel());
    }
    /*
    public function getBuscarDetallePorArancel(DetalleArancel $detalle_arancel,$busca) {
        $sql="SELECT id_detalle_arancel, codigo, descripcion FROM detalle_arancel where id_arancel=1 AND activo=TRUE AND ((codigo ilike '%".$busca."%')OR(descripcion ilike '%".$busca."%'))";
        return $detalle_arancel->finder()->with_capitulos()->findAllBySql($sql);
    }
    */
    public function getBuscarDetallePorArancel(DetalleArancel $detalle_arancel, $busca) {
        return $detalle_arancel->finder()->with_capitulos()->findAll();
    }
    
    
    public function getBuscarDetallePorCodigo(DetalleArancel $detalle_arancel, $nandina, $arancel_pedido) {
        return $detalle_arancel->finder()->find('codigo = ? AND id_arancel = ?', array($nandina,$arancel_pedido));
    }
    
    public function listArancel(DetalleArancel $detalle_arancel){
        $sql = "select * from planilla_detalle_arancel where codigo like '".$detalle_arancel->getCodigo()."%' and activo is true and id_arancel = ".$detalle_arancel->getId_Arancel(). " order by codigo";
//        print("<pre>".print_r($sql,true)."</pre>");
        return $this->getConsultaSQL($sql);
    }
    public function getConsultaSQL($sql){
        $detalle_arancel=new DetalleArancel();
        $connection = $detalle_arancel->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }

}