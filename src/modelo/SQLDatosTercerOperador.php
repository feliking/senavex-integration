<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeposito.php v1.0 16/05/2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2015 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDatosTercerOperador {
    
    public function setGuardarDatosTercerOperador(DatosTercerOperador $datos_tercer_operador){
        return $datos_tercer_operador->save();
    }
    
    public function getBuscarDatosTercerOperadorPorId(DatosTercerOperador $datos_tercer_operador) {
        return $datos_tercer_operador->finder()->find('id_datos_tercer_operador = ?', $datos_tercer_operador->getId_datos_tercer_operador());
    }

    /*
    public function getFIFO(Deposito $deposito){
        $sql ="SELECT * FROM deposito where estado= ? ORDER BY fecha_deposito asc LIMIT 2";
        return $deposito->finder()->findAllBySql($sql,$deposito->getEstado());
    }
    */
    
    
}