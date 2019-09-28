<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeOrganizacion {
   
    public function getCafeOrganizacionPorID(CafeOrganizacion $cafeOrganizacion) {
        return $cafeOrganizacion->finder()->findAll('id_cafe_organizacion = ?', $cafeOrganizacion->getId_cafe_organizacion());
    }
    
    public function getListCafeOrganizacion(CafeOrganizacion $cafeOrganizacion) {
        return $cafeOrganizacion->finder()->findAll();
    }
}