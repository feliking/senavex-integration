<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLServicioExportador.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLServicioExportador {
    
    public function Save(ServicioExportador $servicio_exportador){
        return $servicio_exportador->save();
    }
    
    public function getBuscarPorServicio(ServicioExportador $servicio_exportador) {
        return $servicio_exportador->finder()->find('id_servicio_exportador = ?', $servicio_exportador->getId_Servicio());
    }
    public function setGuardarServicioExportador(ServicioExportador $servicio_exportador){
        return $servicio_exportador->save();
    }
    
    public function getBuscarServicioExportadorPorId(ServicioExportador $servicio_exportador) {
        return $servicio_exportador->finder()->find('id_servicio_exportador = ?', $servicio_exportador->getId_servicio_exportador());
    }
    
    public function getServiciosSinFacturar(ServicioExportador $servicio_exportador){
        return $servicio_exportador->finder()->findAll('id_empresa = ? AND facturado = ? AND costo_actual > 0' , array($servicio_exportador->getId_empresa(),$servicio_exportador->getFacturado()));
    }
    
    public function getServiciosPorEmpresa(ServicioExportador $servicio_exportador){
        return $servicio_exportador->finder()->findAll(
            'id_empresa = '.$servicio_exportador->getId_empresa().
            ' AND facturado = '.$servicio_exportador->getFacturado().
            ($servicio_exportador->getCosto_Actual()!='' ? ' AND costo_actual > '.$servicio_exportador->getCosto_Actual() : '' )
            );
    }
    
    public function getBuscarServicioRuex(ServicioExportador $servicio_exportador) {
        return $servicio_exportador->finder()->find('id_empresa = ? and id_persona=0 and estado is false and id_servicio=1', $servicio_exportador->getId_empresa());
    }
    
    public function getBuscarServicioRuexModificacion(ServicioExportador $servicio_exportador) {
        return $servicio_exportador->finder()->find('id_empresa = ? and id_persona=0 and estado is false and id_servicio=4', $servicio_exportador->getId_empresa());
    }
    
    public function getServiciosEmpresaPorFecha(ServicioExportador $servicio_exportador){
        //return $servicio_exportador->finder()->find('id_empresa = '.$servicio_exportador->getId_empresa().' and estado in (?) and fecha_servicio between "'.$servicio_exportador->getFecha_Servicio().' 00:00:00" and "'.$servicio_exportador->getFecha_Servicio().' 23:59:59"', array($servicio_exportador->getId_empresa(), $servicio_exportador->getEstado()));
    }
}