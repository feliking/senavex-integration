<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLArancel.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEmpresaImportador {
    
    public function getListar(EmpresaImportador $empresai) {
        return $empresai->findAll();
    }

    public function getEmpresaPorId(EmpresaImportador $empresai) {
        return $empresai->finder()->find('id_empresa_importador = ?', $empresai->getId_empresa_importador());
    }  

    public function Save(EmpresaImportador $empresai)
    {
        return $empresai->save();
    }
        public function getListarEmpresasApiPorFechaDescendenteEstados(EmpresaImportador $empresai, $estados){
        $criteria = new TActiveRecordCriteria;
	$criteria->setCondition("id_empresa_importador<>0 AND estado in (" . $estados. " )");
        $criteria->OrdersBy['fecha_asignacion_rui'] = 'desc';
	return $empresai->finder()->findAll($criteria);
    }
    public function getEmpresaApiPorID(EmpresaImportador $empresai){
        return $empresai->finder()->find('id_empresa_importador = ?', $empresai->getId_empresa_importador());
    }

    public function getEmpresaPorNIT(EmpresaImportador $empresai){
        return $empresai->finder()->find('nit = ? and estado <> 17 and estado <> 18 ', $empresai->getNit());
    }

    public function getEmpresaPorNitMatricula(EmpresaImportador $empresai){
        return $empresai->finder()->find("nit = ? and matricula_fundempresa = ? and estado = 1 ",  array($empresai->getNit(),$empresai->getMatricula_fundempresa()));
    }

}
