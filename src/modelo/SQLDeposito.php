<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeposito.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDeposito {
    
    public function Save(Deposito $deposito){
        return $deposito->save();
    }
    
    public function getListarDepositoPorEmpresa(Deposito $deposito) {
        return $deposito->finder()->findAll('id_empresa = ?', $deposito->getId_Empresa());
    }

    public function getListarDepositoPorFecha(Deposito $deposito) {
        return $deposito->finder()->findAll('fecha_deposito = ?', $deposito->getFecha_Deposito());
    }
    
    public function getListarDepositoPorFactura(Deposito $deposito) {
        return $deposito->finder()->findAll('id_factura = ?', $deposito->getId_factura());
    }
    
    public function getListarDepositoPorCodigo(Deposito $deposito) {
        return $deposito->finder()->findAll('codigo_deposito = ? AND codigo_deposito != \'0\' AND fecha_deposito > \'2018-07-01\' ', $deposito->getCodigo_Deposito());
    }
    
    public function getDeposito(Deposito $deposito){
        return $deposito->finder()->find('id_deposito = ?', $deposito->getId_deposito());
    }
    
    public function getDepositoEstado(Deposito $deposito){
        return $deposito->finder()->find('id_deposito = ? and estado = ?', array($deposito->getId_deposito()), $deposito->getEstado());
    }
    
    public function getFIFO(Deposito $deposito){
        $sql ="SELECT * FROM deposito where estado= ? ORDER BY fecha_deposito asc LIMIT 2";
        return $deposito->finder()->findAllBySql($sql,$deposito->getEstado());
    }
    public function getListFIFO(Deposito $deposito){
        $sql ="SELECT * FROM deposito where estado= ? ORDER BY fecha_deposito asc LIMIT 10";
        return $deposito->finder()->findAllBySql($sql,$deposito->getEstado());
    }
    public function getListRuexDepositos(Deposito $deposito){
        $sql ="SELECT * FROM deposito where id_empresa = ? and estado= ? ORDER BY fecha_deposito";
        return $deposito->finder()->findAllBySql($sql,array($deposito->getId_Empresa(),$deposito->getEstado()));
    }
    
    
    
}