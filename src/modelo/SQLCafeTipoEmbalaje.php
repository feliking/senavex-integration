<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeTipoEmbalaje {
    
    public function Save(CafeTipoEmbalaje $cafeTipoEmbalaje){
        return $cafeTipoEmbalaje->save();
    }
    public function getCafeTipoEmbalajePorID(CafeTipoEmbalaje $cafeTipoEmbalaje) {
        return $cafeTipoEmbalaje->finder()->find('id_cafe_tipo_embalaje = ?', $cafeTipoEmbalaje->getId_cafe_tipo_embalaje());
    }
    
    public function getListCafeTipoEmbalaje(CafeTipoEmbalaje $cafeTipoEmbalaje) {
        return $cafeTipoEmbalaje->findAll();
    }
    
    /***** Estadisticas ******/
    public function getListarCafeTipoEmbalaje(CafeTipoEmbalaje $cafeTipoEmbalaje) {
        return $cafeTipoEmbalaje->findAll();
    }

}