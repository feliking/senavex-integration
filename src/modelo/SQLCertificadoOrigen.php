<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLDeclaracionJurada.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCertificadoOrigen {
    
    public function getListarCertificadoOrigenPorEstado(CertificadoOrigen $certificado_origen) {
        return $certificado_origen->finder()->with_tipo_co()->with_acuerdo()->with_pais()->findAll('id_estado_co = ? AND id_empresa = ?', array($certificado_origen->getId_estado_co(), $certificado_origen->getId_empresa()));
    }
    
    public function getBuscarCertificadoOrigenPorId(CertificadoOrigen $certificado_origen) {
        return $certificado_origen->finder()->with_tipo_co()->with_acuerdo()->with_pais()->with_empresa()->with_estado_co()->with_regional()->findbyPk($certificado_origen->getId_certificado_origen());
    }

    public function setGuardarCertificadoOrigen(CertificadoOrigen $certificado_origen){
        return $certificado_origen->save();
    }
    
    public function getListarCertificadosParaRevisar(CertificadoOrigen $certificado_origen) {
        return $certificado_origen->finder()->with_tipo_co()->with_acuerdo()->with_pais()->with_empresa()->with_estado_co()->findAll('id_estado_co=2 OR id_estado_co=7 ORDER BY fecha_llenado');
    }
    
    /*
    public function getListarCertificadosParaRevisar(CertificadoOrigen $certificado_origen, $certif){
        $sql = "SELECT co.*,ec.descripcion as estadoco, pa.nombre as nombre_pais, e.razon_social as empresa, tco.abreviatura as tipoco
                FROM servicio_exportador se JOIN certificado_origen co ON(se.id_servicio_exportador=co.id_servicio_exportador)
                JOIN sistema_colas sc ON(se.id_servicio_exportador=sc.id_servicio_exportador)
                JOIN estado_co ec on(co.id_estado_co=ec.id_estado_co)
                JOIN pais pa on(co.id_pais=pa.id_pais)
                JOIN empresa e on(co.id_empresa=e.id_empresa)
                JOIN tipo_co tco on(co.id_tipo_co=tco.id_tipo_co)
                WHERE sc.id_asistente=".$certif." AND atendido=0 AND se.id_servicio=5";
        $connection = $certificado_origen->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
    */
    public function getListarCertificadosOrigenNoEntregados(CertificadoOrigen $certificado_origen) {
        return $certificado_origen->finder()->with_tipo_co()->with_acuerdo()->with_pais()->findAll('id_estado_co = ? AND entregado = FALSE', array($certificado_origen->getId_estado_co()));
    }
    
    
    
    /*** adicionado para la facturacion ***/
    public function getCertificadoOrigenPorServicioExportador(CertificadoOrigen $certificado_origen) {
        return $certificado_origen->finder()->with_tipo_co()->with_pais()->find('id_servicio_exportador = ?',$certificado_origen->getId_servicio_exportador());
    }
    
    public function getConsulta(CertificadoOrigen $certificado_origen, $condiciones, $order){
        $criteria = new TActiveRecordCriteria;
	$criteria->setCondition($condiciones);
        if(!empty($order)){
            $criteria->OrdersBy[$order] = 'desc';
        }
	return $certificado_origen->finder()->findAll($criteria);
    }
    
    public function getConsultaAnidada($atributos,$tablas,$condiciones,$order){
        //$sql = "select cp.nombre, cpu.descripcion from cafe_pais cp, cafe_puerto cpu";
        $SELECT ="SELECT ".( empty($atributos)? "*": $atributos )." ";
        $FROM = " FROM ".$tablas;
        $WHERE = (empty($condiciones)? "":" WHERE ".$condiciones);
        $ORDER = (empty($order)? "":" ORDER BY ".$order);
        
        $sql=$SELECT.$FROM.$WHERE.$ORDER;
        $certificado_origen=new CertificadoOrigen();
        $connection = $certificado_origen->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}