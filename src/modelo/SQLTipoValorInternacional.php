<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLTipoValorInternacional.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLTipoValorInternacional {
    
    public function getListarTipoValorInternacional(TipoValorInternacional $tipo_valor_internacional) {
        return $tipo_valor_internacional->findAll();
    }
    
    public function getBuscarDescripcionPorId(TipoValorInternacional $tipo_valor_internacional) {
        return $tipo_valor_internacional->finder()->find('id_tipo_valor_internacional = ?', $tipo_valor_internacional->getId_tipo_valor_internacional());
    }
}