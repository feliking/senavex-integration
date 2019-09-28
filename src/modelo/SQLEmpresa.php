<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLEmpresa {
    public function GuardarEmpresa(Empresa $empresa){
        return $empresa->save(); 
    }
    public function getListarEmpresa(Empresa $empresa){
        return $empresa->findAll();
    }
    public function getEmpresaPorID(Empresa $empresa){
        return $empresa->finder()->find('id_empresa = ?', $empresa->getId_empresa());
    }
    public function getEmpresaPorNIT(Empresa $empresa){
        return $empresa->finder()->find('nit = ?', $empresa->getNit());
    }
    public function getEmpresaPorEstado(Empresa $empresa){
        return $empresa->finder()->findAll('estado = ?', $empresa->getEstado());
    }
    public function getEmpresaPorIdUsuarioRoot(Empresa $empresa){
       return $empresa->finder()->find('id_usuario_root = ?', $empresa->getId_usuario_root());
    }
    public function getEmpresaPorIdUsuarioTemp(Empresa $empresa){
       return $empresa->finder()->find('id_usuario_temporal = ?', $empresa->getId_Usuario_Temporal());
    }
    public function getListarEmpresasAdmitidas(Empresa $empresa)
    {
       //return $empresa->finder()->findAll('estado = 1 or estado=4 or estado=6');
       return $empresa->finder()->findAll('estado = 0 or estado = 1' );
    }
    public function getListarEmpresasObservadas(Empresa $empresa){
        return $empresa->finder()->findAll('estado = 9' );
    }
    public function getListarEmpresaPorFechaDescendente(Empresa $empresa){
        $criteria = new TActiveRecordCriteria;
	$criteria->setCondition("id_empresa<>0 AND (estado=2)");
        $criteria->OrdersBy['fecha_asignacion_ruex'] = 'desc';
	return $empresa->finder()->findAll($criteria);
    }
    public function getListarEmpresaPorFechaDescendenteComilla(Empresa $empresa){
        $sql = "select * from empresa where id_empresa<>0 AND (estado=2) order by fecha_asignacion_ruex desc";
        $connection = $empresa->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
    
    public function getListarEmpresasPorFechaDescendenteEstados(Empresa $empresa, $estados){
        $criteria = new TActiveRecordCriteria;
	$criteria->setCondition("id_empresa<>0 AND estado in (" . $estados. " )");
        $criteria->OrdersBy['fecha_asignacion_ruex'] = 'desc';
	return $empresa->finder()->findAll($criteria);
    }
    public function setGuardarEmpresa(Empresa $empresa){
        return $empresa->save();
    }
    public function setEliminarEmpresa(Empresa $empresa){
        return $empresa->delete();
    }
    public function getListarEmpresas(Empresa $empresa)
    {
       return $empresa->finder()->with_estadoempresas()->findAll('estado = 0 or estado = 1 or estado = 2 or estado = 3 or estado=4 or estado=6 or estado=10');
    }
    public function getListarEmpresasEstado(Empresa $empresa)
    {
       return $empresa->finder()->findAll('estado = ?', $empresa->getEstado());
    }
    public function getDatosTipoEmpresa(TipoEmpresa $tipo_empresa){
        $sql = "select * from tipo_empresa order by abreviatura";
        $connection = $tipo_empresa->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
    public function getDatosCategoriaEmpresa(CategoriaEmpresa $categoria_empresa){
        $sql = "select * from categoria_empresa";
        $connection = $categoria_empresa->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    } 
    public function getDatosActividadEconomica(ActividadEconomica $actividad_economica){
        $sql = "select * from actividad_economica";
        $connection = $actividad_economica->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
    public function getDatosDepartamento(Departamento $departamento){
        $sql = "select * from departamento";
        $connection = $departamento->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
    public function getDatosRubroExportaciones(RubroExportaciones $rubro_exportaciones){
        $sql = "select * from rubro_exportaciones";
        $connection = $rubro_exportaciones->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
    public function getConsulta(Empresa $empresa, $condiciones, $order){
        $criteria = new TActiveRecordCriteria;
	$criteria->setCondition($condiciones);
        if(!empty($order)){
            $criteria->OrdersBy[$order] = 'desc';
        }
	return $empresa->finder()->findAll($criteria);
    }
    public function getListarMunicipios(EmpresaMunicipio $empresaMunicipio){
        return $empresaMunicipio->finder()->findAll();
    }
    public function getListarAfiliaciones(EmpresaAfiliacion $empresaAfiliacion){
        return $empresaAfiliacion->finder()->findAll();
    }
    public function getEmpresaPorCodigoSeguridad(Empresa $empresa){
        return $empresa->finder()->find('codigo_seguridad= ?', $empresa->getCodigo_seguridad());
    }
    
    public function getEmpresaPorCodigoRUEX_Seguridad(Empresa $empresa){
        return $empresa->finder()->find('codigo_seguridad = ? AND ruex = ?', array( $empresa->getCodigo_seguridad(), $empresa->getRuex() ) );
    }
    public function getListarEmpresaActiva(Empresa $empresa){
        return $empresa->finder()->findAll('estado = 2' );
    }
    public function getListarEmpresaActiva_VCIE(Empresa $empresa){
        return $empresa->finder()->findAll('estado = 2 or estado = 4 or estado = 13 or estado = 6 or estado = 14' );
    }
    public function searchEmpresaByRuex(Empresa $empresa,$search){
       $sql="SELECT ruex FROM empresa WHERE  CAST(ruex AS TEXT) LIKE '%".$search."%';";
       $connection = $empresa->getDbConnection();
       $connection->Active = true;
       $command = $connection->createCommand($sql);
       $dataReader = $command->query();
       $rows = $dataReader->readAll();
       return $rows;
   }

   public function getEmpresaPorRuex(Empresa $empresa){
       return $empresa->finder()->find('ruex = ?', $empresa->getRuex());
   } 

}