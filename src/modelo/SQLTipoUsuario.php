<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 26/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLTipoUsuario {
   
    public function save(TipoUsuario $tipo_usuario) {  
        return $tipo_usuario->save();		
    }

    public function getTipoUsuarioByID(TipoUsuario $tipo_usuario) { 
        return $tipo_usuario->finder()->find('id_tipo_usuario = ?', $tipo_usuario->getId_tipo_usuario());
    }
    
    public function getListaTipoUsuario(TipoUsuario $tipo_usuario){
        return $tipo_usuario->findAll();
    }
}