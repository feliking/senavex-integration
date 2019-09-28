<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLMotivoAnulacion.php v1.0 10/08/2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2015 Servicio Nacional de Verificación de Exportaciones
 */

class SQLAnulacionCo {
    
    public function getListarAnulacionPorCo(AnulacionCo $anulacion_co) {
        return $anulacion_co->findAll('id_certificado_origen='.$anulacion_co->getId_certificado_origen());
    }
    
    public function setGuardarAnulacionCo(AnulacionCo $anulacion_co){
        return $anulacion_co->save();
    }
}