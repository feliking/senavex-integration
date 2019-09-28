<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLDdjjAcuerdo {
    
    public function getListarAcuerdosPorDdjj(DdjjAcuerdo $ddjj_acuerdo) {
        return $ddjj_acuerdo->finder()->with_acuerdo()->findAll('id_ddjj = '.$ddjj_acuerdo->getId_ddjj());
    }
    public function getListarAcuerdosPorDdjjVigentes(DdjjAcuerdo $ddjj_acuerdo) {
        return $ddjj_acuerdo->finder()->findAll('id_ddjj = '.$ddjj_acuerdo->getId_ddjj().'and id_estado_ddjj=1');
    }
    public function getListarDdjjAcuerdosPorId(DdjjAcuerdo $ddjj_acuerdo) {
        return $ddjj_acuerdo->finder()->find('id_ddjj_acuerdo = '.$ddjj_acuerdo->getId_ddjj_acuerdo());
    }
    
    /*
    public function getListarDeclaracionesPorEstadoyCumple(DeclaracionJurada $declaracion_jurada) {
        return $declaracion_jurada->finder()->with_empresa()->findAll('id_estado_ddjj=? AND id_empresa=? AND cumple=?', array($declaracion_jurada->getId_estado_ddjj(), $declaracion_jurada->getId_Empresa(), $declaracion_jurada->getCumple()));
    }

    public function getBuscarDeclaracionPorId(DeclaracionJurada $declaracion_jurada) {
        return $declaracion_jurada->finder()->findbyPk($declaracion_jurada->getId_ddjj());
    }
*/
    public function getListarDDJJAcuerdoVigentesConDatosDDJJ(DdjjAcuerdo $ddjj_acuerdo) {
        return $ddjj_acuerdo->finder()->with_declaracion_jurada()->with_criterio_origen()->findAll('id_estado_ddjj=? AND id_acuerdo=?', array($ddjj_acuerdo->getId_estado_ddjj(), $ddjj_acuerdo->getId_Acuerdo()));
    }

    public function setGuardarDdjjAcuerdo(DdjjAcuerdo $ddjj_acuerdo){
        return $ddjj_acuerdo->save();
    }

    public function getListarDDJJAcuerdoPorDDJJyAcuerdo(DdjjAcuerdo $ddjj_acuerdo) {
        return $ddjj_acuerdo->finder()->with_declaracion_jurada()->with_criterio_origen()->find('id_ddjj=? AND id_acuerdo=?', array($ddjj_acuerdo->getId_ddjj(), $ddjj_acuerdo->getId_Acuerdo()));
    }

}