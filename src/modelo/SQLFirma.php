<?php

class SQLFirma {
    
    public function getFirmaPorID(Firma $firma) {
        return $firma->finder()->find('id_firma = ? ', $firma->getId_firma());
    } 
    public function getFirmasPorIdPersona(Firma $firma) {
        return $firma->finder()->findAll('id_persona = ? and estado=true', $firma->getId_persona());
    } 
    public function setGuardarFirma(Firma $firma) {
        return $firma->save();
    }
    public function setEliminarFirma(Firma $firma) {
        return $firma->delete();
    }
    
}