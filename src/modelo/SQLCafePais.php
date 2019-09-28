<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafePais {
    public function getCafePaisPorID(CafePais $cafePais) {
        return $cafePais->finder()->find('id_cafe_pais = ?', $cafePais->getId_cafe_pais());
    }
    public function getCafePaisPorClaveOIC(CafePais $cafePais){
        return $cafePais->finder()->find('clave_oic = ?', $cafePais->getClave_oic());
    }
    public function getListCafePais(CafePais $cafePais) {
        return $cafePais->finder()->findAll();
    }
    
    
    /****** Estadisticas ******/
    public function getListarCafePais(CafePais $cafePais) {
        return $cafePais->findAll();
    }
    

}