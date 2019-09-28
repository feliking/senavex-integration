<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLServicio.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLSGCRuex {
    
    public function getSGC(SGCRuex $sgcruex) {
        return $sgcruex->findAll();
    }
    
    public function getSGCRuexPorId(SGCRuex $sgcruex) {
        return $sgcruex->finder()->find('id_sgc_ruex = ?', $sgcruex->getId_sgc_ruex());
    }
    
    public function getSGCRuexPorEmpresa(SGCRuex $sgcruex) {
        return $sgcruex->finder()->find('id_empresa = ?', $sgcruex->getId_empresa());
    }
     
    public function getSGCRuexPorEmpresaRevisado(SGCRuex $sgcruex) {
        return $sgcruex->finder()->find('id_empresa = ? AND revisado = ?', array($sgcruex->getId_empresa(), $sgcruex->getRevisado()));
    }
    
    public function getListSGCRuexPorEmpresa(SGCRuex $sgcruex) {
        return $sgcruex->finder()->findAll('id_empresa = ? order by id_sgc_ruex desc', $sgcruex->getId_empresa());
    }
    
    public function setGuardarSGCRuex(SGCRuex $sgcruex){
      return $sgcruex->save();
    }
    
    public function getListSGCRuexPorEmpresaRevisado(SGCRuex $sgcruex) {
        return $sgcruex->finder()->findAll('id_empresa = ? AND revisado = ?', array($sgcruex->getId_empresa(), $sgcruex->getRevisado()));
    }
    
}