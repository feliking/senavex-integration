<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCapitulos {
    
    public function getListarCapitulos(Capitulos $capitulos) {
        return $capitulos->findAll('id_capitulo>0 ORDER BY id_capitulo');
    }
    
    public function getBuscarCapitulosPorId(Capitulos $capitulos) {
        return $capitulos->finder()->find('id_capitulo = ?', $capitulos->getId_capitulo());
    }
}