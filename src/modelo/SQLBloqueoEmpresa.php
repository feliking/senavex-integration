<?php
class SQLBloqueoEmpresa{
    public function getBloqueoEmpresaPorID(BloqueoEmpresa $bloqueoempresa){
        return $bloqueoempresa->finder()->find('id_bloqueo = ?', $bloqueoempresa->getId_bloqueo());
    }
    public function getBloqueoEmpresaPorIdEmpresa(BloqueoEmpresa $bloqueoempresa){
        return $bloqueoempresa->finder()->find('id_empresa = ? and estado=true', $bloqueoempresa->getId_empresa());
    }
    public function setGuardarBloqueoEmpresa(BloqueoEmpresa $bloqueoempresa){
        return $bloqueoempresa->save();
    }
}