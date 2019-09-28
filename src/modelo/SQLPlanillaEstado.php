<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLPlanillaEstado {
    
    public function getListarEstado(PlanillaEstado $planillaestado) {
        return $planillaestado->findAll();
    }
    
    public function getBuscarDescripcion(PlanillaEstado $planillaestado) {
        return $planillaestado->finder()->find('id_planilla_estado = ?', $planillaestado->getId_planilla_estado());
    }
}