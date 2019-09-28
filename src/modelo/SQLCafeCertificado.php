<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeCertificado {
    
    
    public function Save(CafeCertificado $cafeCertificado){
        return $cafeCertificado->save();
    }
    public function getCafeCertificadoPorID(CafeCertificado $cafeCertificado){
        return $cafeCertificado->finder()->find('id_cafe_certificado = ?', $cafeCertificado->getId_cafe_certificado());
    }
    public function getListCafeCertificadoPorICO(CafeCertificado $cafeCertificado){
        return $cafeCertificado->finder()->findAll('id_cafe_ico = ?', $cafeCertificado->getId_cafe_ico());
    }
    public function getListCafeCertificadoPorIdBorrador(CafeCertificado $cafeCertificado){
        return $cafeCertificado->finder()->findAll('id_cafe_borrador = ?', $cafeCertificado->getId_cafe_borrador());
    }
}