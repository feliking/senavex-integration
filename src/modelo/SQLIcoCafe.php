<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeposito.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLIcoCafe {
    public function setGuardarIcoCafe(IcoCafe $icocafe){
        return $icocafe->save();
    }
    public function setEliminarIcoCafe(IcoCafe $icocafe){
        return $icocafe->delete();
    }
    public function getIcoCafePorId(IcoCafe $icocafe) {
        return $icocafe->finder()->find('id_ico_cafe = ?', $icocafe->getId_ico_cafe());
    }
    public function getIcoCafePorIdEmpresa(IcoCafe $icocafe) {
        return $icocafe->finder()->find('id_empresa = ?', $icocafe->getId_empresa());
    }
}