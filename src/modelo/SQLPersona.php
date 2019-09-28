<?php
class SQLPersona {
    
    public function getDatosPersonaPorId(Persona $persona) {
        return $persona->finder()->find('id_persona = ?', $persona->getId_persona());
    }  

    public function getDatosPersonaPorNumeroDocumento(Persona $persona) {
        return $persona->finder()->find('numero_documento = ? AND id_tipo_documento=?', array($persona->getNumero_documento(),$persona->getId_tipo_documento()));
    }
    
    public function getDatosPersonaPorEmail(Persona $persona) {
        return $persona->finder()->count('email = ?', $persona->getEmail());
    }
    
    public function setGenerarIdDigital(Persona $persona) {
        //Colocar un algoritmo a buscar
        return $id_digital;
    }
    
    public function setGuardarPersona(Persona $persona){
        return $persona->save();
    }

    public function getBuscarAsistenteParaCola(Persona $persona,$servicio_exportador){
        
        return $persona->save();
    }
    public function getListarPersonasPorEstado(Persona $persona) {
         return $persona->finder()->findAll('estado = ?', $persona->getEstado());
    }
    
    public function getListarPersona(Persona $persona) {
        return $persona->findAll();
    }
    
    public function getPersona_NumeroDocumento_Correo(Persona $persona){
        return $persona->finder()->findAll('numero_documento = ? and email = ?', array($persona->getNumero_documento(),$persona->getEmail()));
    }
    /*public function getConsulta(Persona $persona, $condiciones, $order){
        $criteria = new TActiveRecordCriteria;
	$criteria->setCondition($condiciones);
        if(!empty($order)){
            $criteria->OrdersBy[$order] = 'desc';
        }
	return $persona->finder()->findAll($criteria);
    }*/
}
