<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLServicio.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLServicio {
    
    public function getListarServicio(Servicio $servicio) {
        return $servicio->findAll();
    }
    
    public function getBuscarServicioPorId(Servicio $servicio) {
        return $servicio->finder()->find('id_servicio = ?', $servicio->getId_servicio());
    }
    
    public function setGuardarServicio(Servicio $servicio){
      return $servicio->save();
    }
     
    public function getListaServiciosPorCategoria(Servicio $servicio){ 
        return $servicio->finder()->findall('id_categoria_servicio in ('.$servicio->getId_Categoria_Servicio().') order by id_servicio asc');
    }
     
    public function getListaCertificados(Servicio $servicio){
        return $servicio->finder()->findall('id_servicio in (11,12,13,14,16) order by id_servicio asc');
    }
    
    public function getServicioPorDescripcion(Servicio $servicio){ //obtener un servicio especifico
        return $servicio->finder()->find('descripcion = ?',$servicio->getDescripcion());
    }
}