<?php
/**
 * @sistema     Sistema de Certificación de Origen - VORTEX
 * @version     SQLPerfilOpciones.php v1.0 v1.0 29/09/2014
 * @autor       Marcelo Ivo Sanabria Ribera
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPerfilOpciones {
    
    public function Save(PerfilOpciones $perfilOpciones){
        return $perfilOpciones->save();
    }
    public function getPerfilOpciones(PerfilOpciones $perfilOpciones){
        return $perfilOpciones->finder()->find('id_perfil_opciones = ?', $perfilOpciones->getId_perfil_opciones());
    }
    public function getPerfilOpcionesByOpcion(PerfilOpciones $perfilOpciones){
        return $perfilOpciones->findAll('opcion = ?', $perfilOpciones->getOpcion());
    }
    public function getListaPerfilOpciones(PerfilOpciones $perfilOpciones){
        return $perfilOpciones->findAll('activo = true order by opcion asc');
    }
}