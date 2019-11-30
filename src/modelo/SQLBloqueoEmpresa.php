<?php
class SQLBloqueoEmpresa{
  public function getBloqueoEmpresaPorID(BloqueoEmpresa $bloqueoempresa,$parameters=FALSE){
    if($parameters){
      $bloqueos = $bloqueoempresa
        ->finder()
        ->with_acuerdo()
        ->find('id_bloqueo = ?', $bloqueoempresa->getId_bloqueo());
    }else{
      $bloqueos = $bloqueoempresa
        ->finder()
        ->find('id_bloqueo = ?', $bloqueoempresa->getId_bloqueo());
    }
    return $bloqueos;
  }
  public function getBloqueoEmpresaPorIdEmpresa(BloqueoEmpresa $bloqueoempresa){
    return $bloqueoempresa->finder()->find('id_empresa = ? and estado=true', $bloqueoempresa->getId_empresa());
  }
  public function setGuardarBloqueoEmpresa(BloqueoEmpresa $bloqueoempresa){

    return $bloqueoempresa->save();
  }
  public function getBloqueoEmpresaPorIdEmpresaAcuerdo(BloqueoEmpresa $bloqueoempresa){
    return $bloqueoempresa
      ->finder()
      ->with_acuerdo()
      ->find('id_empresa = ? and estado=true and tipo_bloqueo=2', $bloqueoempresa->getId_empresa());
  }
}