<?php
class SQLAusenciaAsistente{
    public function getAusenciaAsistentePorID(AusenciaAsistente $ausenciaasistente){
        return $ausenciaasistente->finder()->with_persona()->with_tipoausencia()->find('id_ausencia_asistente = ?', $ausenciaasistente->getId_ausencia_asistente());
    }
    public function getAusenciaAsistente(AusenciaAsistente $ausenciaasistente){
        return $ausenciaasistente->finder()->with_persona()->with_tipoausencia()->findAll('estado=true');
    }
    public function getAusenciaAsistentePorIdPersona(AusenciaAsistente $ausenciaasistente){
        return $ausenciaasistente->finder()->find('id_persona = ? and estado=true', $ausenciaasistente->getId_persona());
    }
    public function setGuardarAusenciaAsistente(AusenciaAsistente $ausenciaasistente){
        return $ausenciaasistente->save();
    }
}