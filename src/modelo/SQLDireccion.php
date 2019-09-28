<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDireccion {
    
    public function save(Direccion $direccion) {
        return $direccion->save();
    }
    
    public function getDireccionByID(Direccion $direccion) {
        return $direccion->finder()->findbyPk($direccion->getId_direccion());
    }

    //funcion para relacionar el campo id direccion desde text a una variable integer
    public function getDireccionxID(Direccion $direccion)
    {
        return $direccion->finder()->find('id_direccion = ?', $direccion->getId_direccion());
    }
    
    public function delete(Direccion $direccion){
        return $direccion->finder()->delete();
    }
   
}