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
  public function getIdsTipoValorInternacional(TipoValorInternacional $tipoValorInternacional){
    $sql='SELECT id_tipo_valor_internacional FROM tipo_valor_internacional';
    $connection = $tipoValorInternacional->getDbConnection();
    $connection->Active = true;
    $command = $connection->createCommand($sql);
    $dataReader = $command->query();
    $rows = $dataReader->readAll();
    $array = [];
    foreach ($rows as $key=>$val){
      array_push($array, $val['id_tipo_valor_internacional']);
    }
    return $array;
  }
}