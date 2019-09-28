<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLRequisitosModificacion {
   
    public function getRequisitosPorId(RequisitosRuex $requisitosruex) {
        return $requisitosruex->finder()->find('id_requisitos_modificacion = ? ', $requisitosruex->getId_requisitos_ruex());
        
    }
    public function getRequisitosModificacionPorId(RequisitosModificacion $requisistosmodificacion) {
        return $requisistosmodificacion->finder()->find('id_requisitos_modificacion = ?', $requisistosmodificacion->getId_requisitos_modificacion());
    }  
      
}