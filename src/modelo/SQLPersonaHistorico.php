<?php

class SQLPersonaHistorico {
    
    public function getDatosPersonaHistoricoPorId(PersonaHistorico $persona_historico) {
        return $persona_historico->finder()->find('id_persona_historico = ?', $persona_historico->getId_persona_historico());
    }  
    public function getDatosPersonaHistoricoPorNumeroDocumento(PersonaHistorico $persona_historico) {
        return $persona_historico->finder()->find('numero_documento = ? AND id_tipo_documento=?', array($persona_historico->getNumero_documento(),$persona_historico->getId_tipo_documento()));
    }
    
    public function setGuardarPersonaHistorico(PersonaHIstorico $persona_historico){
        return $persona_historico->save();
    }
}
