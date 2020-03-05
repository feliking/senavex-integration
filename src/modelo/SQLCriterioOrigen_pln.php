<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLCriterioOrigen.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCriterioOrigen_pln {

    public function getListarCriterioOrigen(CriterioOrigen_pln $criterio_origen) {
        return $criterio_origen->findAll(" order by literal");
    }

    public function getBuscarDescripcionPorId(CriterioOrigen_pln $criterio_origen) {
        return $criterio_origen->finder()->find('id_criterio_origen = ?', $criterio_origen->getId_criterio_origen());
    }

    public function getObligatorio(CriterioOrigen_pln $criterio_origen) {
        return $criterio_origen->finder()->find('id_acuerdo = ? and obligatorio = ? ', array($criterio_origen->getId_Acuerdo(), $criterio_origen->getObligatorio()));
    }

    public function getListarCriterioPorAcuerdo(CriterioOrigen_pln $criterio_origen) {
        return $criterio_origen->finder()->findAll('id_acuerdo = ?', $criterio_origen->getId_Acuerdo());
    }

}