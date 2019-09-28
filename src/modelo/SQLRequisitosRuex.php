<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLRequisitosRuex {
   
    public function getRequisitosPorId(RequisitosRuex $requisitosruex) {
        return $requisitosruex->finder()->find('id_requisitos_ruex = ? and estado=true', $requisitosruex->getId_requisitos_ruex());
        
    }
      
}