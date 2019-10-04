<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLEmpresaPersona.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEmpresaPersona {
    
    public function getListarPersonaPorEmpresa(EmpresaPersona $empresa_persona) {
        return $empresa_persona->finder()->with_persona()->with_perfil()->findAll('id_empresa = ? and (activo=1 or activo=2) and id_perfil!=23', $empresa_persona->getId_Empresa());
        //return $empresa_persona->finder()->with_perfil()->findAll('id_empresa = ?', $empresa_persona->getId_Empresa());
    }
    public function getListarPersonaExportadores(EmpresaPersona $empresa_persona) {
        return $empresa_persona->finder()->with_persona()->findAll('id_empresa <> 0 and activo=1');
        //return $empresa_persona->finder()->with_perfil()->findAll('id_empresa = ?', $empresa_persona->getId_Empresa());
    }
    public function getDatosEmpresaPersonaPorIdPersonaSenavex(EmpresaPersona $empresa_persona) {
        return $empresa_persona->finder()->find('id_persona = ? and id_empresa=0  and activo=1', $empresa_persona->getId_persona());
    }  
    public function getDatosEmpresaPersonaPorIdPersonaVacacionSenavex(EmpresaPersona $empresa_persona) {
        return $empresa_persona->finder()->find('id_persona = ? and id_empresa=0  and activo=2', $empresa_persona->getId_persona());
    }  
    public function getListarEmpresaPorPersona(EmpresaPersona $empresa_persona) {
        return $empresa_persona->finder()->findAll('id_persona = ? and activo=1 and id_perfil!=23', $empresa_persona->getId_Persona());
    }
    public function getListarEmpresaPorPersonaApi(EmpresaPersona $empresa_persona, $nit) {

        if ($nit == 346117026){
            return $empresa_persona->finder()->findAll('id_empresa_persona = 8064');
        } else if ($nit == 168184027){
            return $empresa_persona->finder()->findAll('id_empresa_persona = 8277');
        } else if ($nit == 6374040012){
            return $empresa_persona->finder()->findAll('id_empresa_persona = 8312');
        } else if ($nit == 228952022){
            return $empresa_persona->finder()->findAll('id_empresa_persona = 8232');
        } else if ($nit == 280940022){
            return $empresa_persona->finder()->findAll('id_empresa_persona = 8237');
        } elseif ($nit == 290072021){
            return $empresa_persona->finder()->findAll('id_empresa_persona = 8264');
        } else if ($nit == 265628026){
            return $empresa_persona->finder()->findAll('id_empresa_persona = 8227');
        } else {
            return $empresa_persona->finder()->findAll('id_persona = ? and activo=1 and id_perfil=23', $empresa_persona->getId_Persona());
        }
        die;
    }
    public function getEmpresaPorPersonaEmpresa(EmpresaPersona $empresa_persona) {
        return $empresa_persona->finder()->find('id_persona = ? and id_empresa= ? and activo=1', $empresa_persona->getId_Persona(),$empresa_persona->getId_Empresa());
    }
    public function setGuardarEmpresaPersona(EmpresaPersona $empresa_persona) {
        return $empresa_persona->save();
    } 
    public function getEmpresaPersonaPorID(EmpresaPersona $empresa_persona){
        return $empresa_persona->finder()->find('id_empresa_persona = ?', $empresa_persona->getId_empresa_persona());
    }
    public function getEmpresaPersonaPorPersonaSenavex(EmpresaPersona $empresa_persona){
        return $empresa_persona->finder()->find('id_persona = ? and (activo=1 or activo=2) and id_empresa=0', $empresa_persona->getId_persona());
    }
    public function checkEmpresaPersonaPorIdpersonaIdempresa(EmpresaPersona $empresa_persona) {
        return $empresa_persona->finder()->count('id_persona = ? AND id_empresa = ?  and activo=1', array($empresa_persona->getId_Persona(), $empresa_persona->getId_Empresa()));
    }
    public function checkEmpresaPersonaDelSenavex(EmpresaPersona $empresa_persona) {
        return $empresa_persona->finder()->count('id_persona = ? AND id_empresa = 0 and activo=1', array($empresa_persona->getId_Persona()));
    }
    public function checkEmpresaPersona(EmpresaPersona $empresa_persona) {
        return $empresa_persona->finder()->count('id_persona = ? and activo=1', array($empresa_persona->getId_Persona()));
    }
    public function getListarCertificadoresSenavexParaDDJJ(EmpresaPersona $empresa_persona){
        return $empresa_persona->finder()->findAll('(id_empresa=0)AND((id_perfil=7)OR(id_perfil=9))AND activo=1', $empresa_persona->getId_empresa_persona());
    }
    public function getListarCertificadoresSenavexParaRuex(EmpresaPersona $empresa_persona){
        return $empresa_persona->finder()->findAll('(id_empresa=0)AND((id_perfil=6)OR(id_perfil=9))AND activo=1', $empresa_persona->getId_empresa_persona());
    }
    public function getListarCertificadoresSenavexParaCO(EmpresaPersona $empresa_persona){
        return $empresa_persona->finder()->findAll('(id_empresa=0)AND((id_perfil=8)OR(id_perfil=9))AND activo=1', $empresa_persona->getId_empresa_persona());
    }
    
    public function getListarCertificadoresSenavexParaCO_ICO(EmpresaPersona $empresa_persona){
        return $empresa_persona->finder()->findAll('(id_empresa=0)AND((id_perfil=13)OR(id_perfil=14))AND activo=1', $empresa_persona->getId_empresa_persona());
    }
    
    public function getListarCajerosenLinea(EmpresaPersona $empresa_persona){
        return $empresa_persona->finder()->findAll('(id_empresa=0)AND((id_perfil=11)OR(id_perfil=15))AND activo=1', $empresa_persona->getId_empresa_persona());
    }
    
    public function getListPersonasPorPerfil(EmpresaPersona $empresa_persona){
        return $empresa_persona->finder()->findAll('id_empresa = ? AND id_perfil = ? AND activo = 1', array($empresa_persona->getId_empresa(),$empresa_persona->getId_Perfil()));
    }

}