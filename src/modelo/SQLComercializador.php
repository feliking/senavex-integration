<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLInsumosImportados.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLComercializador {
    
    public function getBuscarComercializadorPorDdjj(Comercializador $comercializador) {
        return $comercializador->finder()->findAll('id_ddjj = '.$comercializador->getId_ddjj());
    }
    
    public function setGuardarComercializador(Comercializador $comercializador){
        return $comercializador->save();
    }

}