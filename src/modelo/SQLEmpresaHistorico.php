<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEmpresaHistorico {
    public function getEmpresaHistoricoPorID(EmpresaHistorico $empresa_historico){
        return $empresa_historico->finder()->find('id_empresa_historico = ?', $empresa_historico->getId_empresa_historico());
    }
    public function setGuardarEmpresaHistorico(EmpresaHistorico $empresa_historico){
        return $empresa_historico->save();
    }
}