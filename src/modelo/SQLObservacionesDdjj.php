<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLObservacionesDdjj.php v1.0 21/07/2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2015 Servicio Nacional de Verificación de Exportaciones
 */

class SQLObservacionesDdjj {
    
    public function getListarObservacionesDdjj(ObservacionesDdjj $observaciones_ddjj) {
        if($observaciones_ddjj->getId_ddjj()!=''){
            $salida= $observaciones_ddjj->finder()->findAll('id_ddjj = '.$observaciones_ddjj->getId_ddjj().' ORDER BY fecha_observacion ASC');
        }else{
            $salida= $observaciones_ddjj->findAll();
        }
        return $salida;
    }
   
    public function setGuardarObservacionesDdjj(ObservacionesDdjj $observaciones_ddjj) {
        return $observaciones_ddjj->save();
    }
    
   
}