<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDeclaracionJuradaZonasEspeciales {
    
    public function getById(DeclaracionJuradaZonasEspeciales $declaracion_jurada_zonas_especiales) {
        return $declaracion_jurada_zonas_especiales->finder()->find('id_declaracion_jurada_zonas_especiales=?',$declaracion_jurada_zonas_especiales->getId_declaracion_jurada_zonas_especiales());
    }

    public function setGuardarDeclaracionJuradaZonasEspeciales(DeclaracionJuradaZonasEspeciales $declaracion_jurada_zonas_especiales){
        return $declaracion_jurada_zonas_especiales->save();
    }

    public function getByDdjjDeclaracionJuradaZonasEspeciales(DeclaracionJuradaZonasEspeciales $declaracion_jurada_zonas_especiales){
        return $declaracion_jurada_zonas_especiales->finder()->findAll('id_ddjj=?',$declaracion_jurada_zonas_especiales->getId_ddjj());
    }
    public function setEliminarZonasPorDdjj(DeclaracionJuradaZonasEspeciales $declaracionJuradaZonasEspeciales){
        return $declaracionJuradaZonasEspeciales->deleteAll('id_ddjj = '.$declaracionJuradaZonasEspeciales->getId_ddjj());
    }

}