<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEstado.php v1.0 19/06/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLFabrica {

  public function getListarFabricasporEmpresa(Fabrica $fabrica) {
    return $fabrica->finder()->findAll('id_empresa=?', $fabrica->getId_empresa());
  }
  public function getByDireccion(Fabrica $fabrica) {
    return $fabrica->finder()->find('id_direccion=?', $fabrica->getId_direccion());
  }

  public function setGuardarFabrica(Fabrica $fabrica) {
    return $fabrica->save();
  }
  public function getListarFabrica(Fabrica $fabrica) {
    return $fabrica->findAll();
  }

}