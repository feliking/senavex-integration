<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeICO {
    
    public function Save(CafeICO $cafeICO)
    {
        return $cafeICO->save();
    }

    public function getCafeICOxID(CafeICO $cafeICO)
    {
        return $cafeICO->finder()->find('id_ico_cafe = ?', $cafeICO->getId_ico_cafe());
    }

    public function getCafeICO_Empresa(CafeICO $cafeICO)
    {
        return $cafeICO->finder()->find('id_empresa = ?', $cafeICO->getId_empresa());
    }

    public function ExisteICO(CafeICO $cafeICO){
        return $cafeICO->finder()->findAll('id_empresa = ?', $cafeICO->getId_empresa());
    }

    public function setEliminarCafeIco(CafeIco $cafeICO){
        return $cafeICO->delete();
    }
}