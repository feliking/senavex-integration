<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLModificacionEmpresaRelevancia {
    public function getModificacionEmpresaRelevanciaPorID(ModificacionEmpresaRelevancia $modificacion_empresa_relevancia){
        return $modificacion_empresa_relevancia->finder()->find('id_modificacion_empresa_relevancia = ?', $modificacion_empresa_relevancia->getId_modificacion_empresa_relevancia());
    }
    public function getModificacionEmpresaRelevanciaPorId_Empresa(ModificacionEmpresaRelevancia $modificacion_empresa_relevancia){
        return $modificacion_empresa_relevancia->finder()->find('id_empresa = ? and (estado=0 or estado=1) and id_servicio_exportador=0', $modificacion_empresa_relevancia->getId_empresa());
    }
    public function setGuardarModificacionEmpresaRelevancia(ModificacionEmpresaRelevancia $modificacion_empresa_relevancia){
        return $modificacion_empresa_relevancia->save();
    }
    public function getModificacionEmpresaRelevanciaSolicitud(ModificacionEmpresaRelevancia $modificacion_empresa_relevancia){
        return $modificacion_empresa_relevancia->finder()->count('id_empresa = ? and estado=0', $modificacion_empresa_relevancia->getId_empresa());
    }
    public function getListarEmpresasAdmitidas(ModificacionEmpresaRelevancia $modificacion_empresa_relevancia){
        return $modificacion_empresa_relevancia->finder()->findall('estado=1');
    }
}