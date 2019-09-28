<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEmpresaRevision {
    
    public function save(EmpresaRevision $empresarevision){
        return $empresarevision->save();
    }
    public function getEmpresaPorID(EmpresaRevision $empresarevision){
        return $empresarevision->finder()->find('id_empresa_revision = ?', $empresarevision->getId_empresa_revision());
    }
    public function getRegistrosPorIdEmpresa(EmpresaRevision $empresarevision){
       return $empresarevision->finder()->findAll('id_empresa = ? order by id_empresa_revision desc', $empresarevision->getId_empresa());
    }
   
}