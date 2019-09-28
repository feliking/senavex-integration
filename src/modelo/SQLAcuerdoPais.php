<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAcuerdoPais.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLAcuerdoPais {
    
    public function getListarAcuerdoPais(AcuerdoPais $acuerdo_pais) {
        return $acuerdo_pais->findAll();
    }
    
    public function getListarPaisesPorAcuerdo(AcuerdoPais $acuerdo_pais) {
        return $acuerdo_pais->finder()->with_pais()->findAll('id_acuerdo = ? ', array($acuerdo_pais->getId_acuerdo()));
    }
    
    public function getListarAcuerdoConPaises(AcuerdoPais $acuerdo_pais) {
        return $acuerdo_pais->finder()->with_pais()->findAll();
    }
}