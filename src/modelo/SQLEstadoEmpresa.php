<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEstadoEmpresa {
    public function getEstadosEmpresas(EstadoEmpresas $estadoEmpresas,$estado_bloqueo=NULL){
        $query = '';
        if(!is_null($estado_bloqueo)){
            if(is_array($estado_bloqueo)){
                foreach ($estado_bloqueo as $estado) {
                    $query .= (isset($and)?' AND ':'').'estado != '.$estado;
                    $and = 'AND';
                }

            }else{
                $query = 'estado != '.$estado_bloqueo;
            }
        }
        return $estadoEmpresas->findAll($query);
    }
//    public function getEmpresaPorID(Empresa $empresa){
//        return $empresa->finder()->find('id_empresa = ?', $empresa->getId_empresa());
//    }

}