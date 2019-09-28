<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAsesoramientoHistorico.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLAsesoramientoHistorico {
    
    public function getBuscarAsesoramientoPorId(AsesoramientoHistorico $asesoramiento_historico) {
        return $asesoramiento_historico->finder()->find('id_asesoramiento = ?', $asesoramiento_historico->getId_Asesoramiento());
    }
    
    public function getBuscarPorIdAsesoramiento(AsesoramientoHistorico $asesoramiento_historico) {
        return $asesoramiento_historico->finder()->findAll('id_asesoramiento = ?', $asesoramiento_historico->getId_Asesoramiento());
    }

    public function getBuscarUltimoPorIdAsesoramientoParaRespuesta(AsesoramientoHistorico $asesoramiento_historico) {
        return $asesoramiento_historico->finder()->find('estado=FALSE AND id_asesoramiento = ?', $asesoramiento_historico->getId_Asesoramiento());
    }

    public function setGuardarAsesoramientoHistorico(AsesoramientoHistorico $asesoramiento_historico) {
        return $asesoramiento_historico->save();
    }

}