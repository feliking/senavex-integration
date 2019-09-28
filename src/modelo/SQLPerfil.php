<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLPerfil.php v1.0 v1.0 29/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPerfil {
    
    public function getListarPerfil(Perfil $perfil) {
        return $perfil->findAll();
    }
    public function getListarPerfilPorTipo(Perfil $perfil) {
        return $perfil->finder()->findAll('tipo = ?', $perfil->getTipo());
    }
    
    public function getPerfilPorID(Perfil $perfil) {
        return $perfil->finder()->find('id_perfil = ?', $perfil->getId_perfil());
    }
    
    public function getBuscarDescripcionPorId(Perfil $perfil) {
        return $perfil->finder()->find('id_perfil = ?', $perfil->getId_perfil());
    }
    
    public function save(Perfil $perfil){
        return $perfil->save();
    }
}