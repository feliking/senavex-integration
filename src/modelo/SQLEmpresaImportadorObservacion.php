<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLArancel.php v1.0 21/08/2019
 * @autor       Laura Quisbert Bustamante
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEmpresaImportadorObservacion {
    
    public function getListar(EmpresaImportadorObservacion $empresaImportadorObservacion) {
        return $empresaImportadorObservacion->findAll();
    }
    public function Save(EmpresaImportadorObservacion $empresaImportadorObservacion)
    {
        return $empresaImportadorObservacion->save();
    }
}