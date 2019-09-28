<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeSistemaArmonizado {
    
    public function Save(CafeSistemaArmonizado $cafeSistemaArmonizado){
        return $cafeSistemaArmonizado->save();
    }
    public function getCafeSistemaArmonizadoPorID(CafeSistemaArmonizado $cafeSistemaArmonizado) {
        return $cafeSistemaArmonizado->finder()->find('id_cafe_sistema_armonizado = ?', $cafeSistemaArmonizado->getId_cafe_sistema_armonizado());
    }
    
    public function getListCafeSistemaArmonizado(CafeSistemaArmonizado $cafeSistemaArmonizado) {
        return $cafeSistemaArmonizado->findAll();
    }
    
    /******** Estadisticas *********/
    
    public function getListarCafeSistemaArmonizado(CafeSistemaArmonizado $cafeSistemaArmonizado) {
        return $cafeSistemaArmonizado->findAll();
    }

}