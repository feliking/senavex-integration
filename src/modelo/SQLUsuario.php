<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 26/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLUsuario {
    
    //Consultas del Usuario Temporal
    public function getVerificaUsuarioTemporal(UsuarioTemporal $usuario_temp){
        $criteria = new TActiveRecordCriteria;
	$criteria->setCondition("usuario = '" . $usuario_temp->getUsuario()."'");
	return $usuario_temp->finder()->count($criteria);
    }
    public function getLoginUsuarioTemp(UsuarioTemporal $usuario_temp) {               
        return $usuario_temp->finder()->find('usuario = ? AND clave = ?', array($usuario_temp->getUsuario(), $usuario_temp->getClave()));
    }
    public function setGuardarUsuarioTemp(UsuarioTemporal $usuario_temp) {  
		 return $usuario_temp->save();		
    }
    public function getVerificaEmail(UsuarioTemporal $usuario_temp){
        $criteria = new TActiveRecordCriteria;
	$criteria->setCondition("email = '" . $usuario_temp->getEmail()."' and estado>'0'");
	return $usuario_temp->finder()->count($criteria);
    }
    public function getUsuarioTemporalPorId(UsuarioTemporal $usuario_temp) { 
        return $usuario_temp->finder()->find('id_usuario_temporal = ?', $usuario_temp->getId_usuario_temporal());
    }
    //Consultas del Usuario
    public function getVerificaUsuario(Usuario $usuario){
        return $usuario->finder()->count('usuario = ?', $usuario->getUsuario());
    }
    public function getLoginUsuario(Usuario $usuario) {
        return $usuario->finder()->find('usuario = ? AND clave = ? ', array($usuario->getUsuario(), $usuario->getClave()));
    }
    
    public function setGuardarUsuario(Usuario $usuario) {
        return $usuario->save();
    }
    
    public function getDatosUsuarioPorId(Usuario $usuario) { 
        return $usuario->finder()->find('id_usuario = ?', $usuario->getId_usuario());
    }
    public function getDatosUsuarioPorIdPersona(Usuario $usuario) { 
        return $usuario->finder()->find('id_persona = ?', $usuario->getId_persona());
    }
    public function getListaDatosUsuarioPorIdPersona(Usuario $usuario) { 
        return $usuario->finder()->findAll('id_persona = ? ', $usuario->getId_persona());
    }
}