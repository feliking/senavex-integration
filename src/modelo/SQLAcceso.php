<?php

class SQLAcceso {
    
    public function getBuscarPorFechaAcceso(Acceso $acceso) {
        return $acceso->finder()->find('fecha_acceso = ?', $acceso->getFechaAcceso());
    }
    
    public function getBuscarAccesoPorUsuario(Acceso $acceso) {
        return $acceso->finder()->find('id_usuario = ?', $acceso->getId_Usuario());
    }
    public function setGuardarAcceso(Acceso $acceso){        
        return $acceso->save();
    }
    
}