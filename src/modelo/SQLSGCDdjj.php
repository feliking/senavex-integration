<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLServicio.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLSGCDdjj {
    public function getSGC(SGCDdjj $SGCDdjj) {
        return $SGCDdjj->findAll();
    }
    public function getSGCDdjjPorId(SGCDdjj $SGCDdjj) {
        return $SGCDdjj->finder()->find('id_sgc_ddjj = ?', $SGCDdjj->getId_sgc_ddjj());
    }
  public function getSGCDdjjEstadoyDdjj(SGCDdjj $SGCDdjj) {
    return $SGCDdjj->finder()->findAll('id_ddjj = ? AND estado = ?', [$SGCDdjj->getId_ddjj(),$SGCDdjj->getEstado()]);
  }
    public function getSGCDdjjPorEmpresa(SGCDdjj $sgcddjj) {
        return $sgcddjj->finder()->find('id_empresa = ?', $sgcddjj->getId_empresa());
    }
    public function getListSGCDdjjPorEmpresa(SGCDdjj $sgcddjj) {
        return $sgcddjj->finder()->findAll('id_empresa = ? order by id_sgc_ddjj desc', $sgcddjj->getId_empresa());
    }
    public function setGuardarSGCDdjj(SGCDdjj $SGCDdjj){
      return $SGCDdjj->save();
    }
}