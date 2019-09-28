<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEvento.php v1.0 31/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLTransaccionFirmada {
    
    public function setGuardarTransaccion(TransaccionFirmada $transaccionFirmada){
        return $transaccionFirmada->save();
    }
    
    public function getDatosTransaccionPorId(TransaccionFirmada $transaccionFirmada) {
        return $transaccionFirmada->finder()->find('id_transaccion_firmada = ?', $transaccionFirmada->getId_transaccion_firmada());
    }  
    
    public function setEliminarTransaccion(TransaccionFirmada $transaccionFirmada){
        return $transaccionFirmada->deleteByPk($transaccionFirmada->getId_transaccion_firmada());
    }

    public function setVerificarPin(TransaccionFirmada $transaccionFirmada){
        return $transaccionFirmada->finder()->find('id_transaccion_firmada = ? and pin = ?', $transaccionFirmada->getId_transaccion_firmada(),$transaccionFirmada->getPin());
    }
    
}