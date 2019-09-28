<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLServicioExportador.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLServicioExportadorRuex {
    
    public function getBuscarPorServicio(ServicioExportador $servicio_exportador) {
        return $servicio_exportador->finder()->find('id_servicio = ?', $servicio_exportador->getId_Servicio());
    }
    public function getBuscarServicioRuex(ServicioExportador $servicio_exportador) {
        return $servicio_exportador->finder()->find('id_empresa = ? and id_persona=0 and estado is false', $servicio_exportador->getId_empresa());
    }
    public function setGuardarServicioExportadorRuex(ServicioExportadorRuex $servicio_exportador_ruex){
        return $servicio_exportador_ruex->save();
    }
}