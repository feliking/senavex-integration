<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEscalaCO {
    
    public function getListarEscalaPorCO(EscalaCO $escala_co) {
        return $escala_co->finder()->findAll('id_tipo_co = ? AND estado=TRUE', $escala_co->getId_tipo_co());
    }
   
}