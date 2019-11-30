<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLActividadEconomica.php v1.0 02/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLAcuerdo {
    
    public function getListarAcuerdo(Acuerdo $acuerdo) {
        return $acuerdo->findAll('estado = TRUE');
    }
    public function getBuscarAcuerdoPorId(Acuerdo $acuerdo) {
        return $acuerdo->finder()->findByPk($acuerdo->getId_Acuerdo());
    }
    public function getByIdArguments(Acuerdo $acuerdo) {
        return $acuerdo->finder()
            ->with_tipo_valor_internacional()
            ->with_tipo_acuerdo()
            ->with_tipo_co()
            ->with_estado_acuerdo()
            ->with_acuerdo_arancel()
            ->with_criterio_origen()
            ->findByPk($acuerdo->getId_Acuerdo());
    }

    public function getBuscarIdporNombreAcuerdo(Acuerdo $acuerdo) {
        return $acuerdo->finder()->find('descripcion = ?', $acuerdo->getDescripcion());
    }

    public function getListarAcuerdoPorTipoCertificado(Acuerdo $acuerdo) {
        return $acuerdo->finder()->with_tipo_co()->with_factura()->findAll('id_acuerdo > 0');
    }
    public function getListarAcuerdoPorTipoCertificado_factura(Acuerdo $acuerdo, $id_empresa) {
               $sql='SELECT distinct co.id_tipo_co , co.abreviatura, a.id_acuerdo, a.sigla
                    FROM acuerdo a inner join tipo_co co on co.id_tipo_co=a.id_tipo_co
                    inner join ( select * from factura f where id_empresa='.$id_empresa.' union select * from factura_no_dosificada fnd where id_empresa='.$id_empresa  .') fac on fac.id_acuerdo=a.id_acuerdo';
        $connection = $acuerdo->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
    public function getAcuerdoSinNinguno(Acuerdo $acuerdo,$with_arguments,$id_restringido=FALSE) {
        $query = 'id_acuerdo != 0 AND id_estado_acuerdo = 1';
        if($id_restringido){
            $query .=' AND id_acuerdo != '.$id_restringido;
        }

        $criteria = new TActiveRecordCriteria;
        $criteria->setCondition($query);
        if($with_arguments)
            return $acuerdo->finder()
                ->with_estado_acuerdo()
                ->with_tipo_acuerdo()
                ->with_acuerdo_arancel()
                ->with_tipo_valor_internacional()
                ->findAll($criteria);
        else  return $acuerdo->finder()->findAll($criteria);
    }

    public function getConsulta(Acuerdo $acuerdo, $condiciones, $order){
        $criteria = new TActiveRecordCriteria;
        $criteria->setCondition($condiciones);
        if(!empty($order)){
            $criteria->OrdersBy[$order] = 'desc';
        }
        return $acuerdo->finder()->findAll($criteria);
    }

    public function getListarAcuerdoPorTipo(Acuerdo $acuerdo) {
        return $acuerdo->findAll('estado = TRUE and id_tipo_co = ?',$acuerdo->getId_tipo_co());
    }

    public function getListarAcuerdoPorTipoDdjj(Acuerdo $acuerdo) {
        return $acuerdo->findAll('estado = TRUE and id_tipo_ddjj = ?',$acuerdo->getId_tipo_co());
    }

}