<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeposito.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDepositoHistorial {
    
    public function Save(DepositoHistorial $depositoHistorial){
        return $depositoHistorial->save();
    }
    public function getDepositoHistorial(DepositoHistorial $depositoHistorial){
        return $depositoHistorial->finder()->find('id_deposito = ? and id_persona = ?', array($depositoHistorial->getId_deposito(),$depositoHistorial->getId_persona()));
    }
     public function getDepositoHistorialPorDeposito(DepositoHistorial $depositoHistorial){
        return $depositoHistorial->finder()->find('id_deposito = ?', $depositoHistorial->getId_deposito());
    }
}