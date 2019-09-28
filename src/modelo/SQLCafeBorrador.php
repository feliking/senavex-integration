<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLAuditoriaEventos.php v1.0 06/10/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCafeBorrador {
    
    
    public function Save(CafeBorrador $cafeBorrador){
        return $cafeBorrador->save();
    }
    public function getCafeCertificadoPorID(CafeBorrador $cafeBorrador){
        return $cafeBorrador->finder()->find('id_cafe_certificado = ?', $cafeBorrador->getId_cafe_certificado());
    }
    public function getListCafeCertificadoPorRUEX(CafeBorrador $cafeBorrador){
        return $cafeBorrador->finder()->findAll('id_exportador_ruex = ?', $cafeBorrador->getId_exportador_ruex());
    }
    public function getNumeroCertificados(CafeBorrador $cafeBorrador,$año){
        $sql ="SELECT count(*) FROM cafe_borrador where id_exportador_ruex = ? and fecha_exportacion between '01/09/".($año-1)."' and '".$año."/10/30'";
        //return $cafeCertificado->finder()->findAllBySql($sql,$cafeCertificado->getId_exportador_ruex());
        return $cafeBorrador->finder()->count("id_exportador_ruex = ? and fecha_exportacion between '01/09/".($año-1)."' and '".$año."/10/30'",$cafeBorrador->getId_exportador_ruex());
    }
    public function getLastOIC(CafeBorrador $cafeBorrador){
        $sql ="SELECT * FROM cafe_borrador where id_exportador_ruex = ? and id_estado = 1 ORDER BY id_cafe_certificado desc LIMIT 2";
        return $cafeBorrador->finder()->findAllBySql($sql,$cafeBorrador->getId_exportador_ruex());
    }
    
    public function getListCafeCertificadoPorEstado(CafeBorrador $cafeBorrador){
        
        if($cafeBorrador->getId_exportador_ruex()==null){
           $sql ="SELECT * FROM cafe_borrador where id_estado = ?";
           $lista = $cafeBorrador->finder()->findAllBySql($sql,$cafeBorrador->getEstado());
        }
        else
        {
           $sql ="SELECT * FROM cafe_borrador where id_exportador_ruex = ? and id_estado = ?";
           $lista = $cafeBorrador->finder()->findAllBySql($sql,array($cafeBorrador->getId_exportador_ruex(),$cafeBorrador->getEstado()));
        }
        return $lista;
    }
    public function getListarColaAsistentePorICO(CafeBorrador $cafeBorrador){
        $sql='select * from cafe_borrador where id_estado='.$cafeBorrador->getEstado().' and id_servicio_exportador in
	(select id_servicio_exportador from servicio_exportador where id_servicio_exportador in
		(select id_servicio_exportador from sistema_colas where atendido<2 and id_asistente='.$cafeBorrador->getId_exportador_ruex().'))';
//        print('<pre>'.print_r($sql,true).'<pre>');
        return $cafeBorrador->finder()->findAllBySql($sql);		
    }
   /*****public function getListarDepositoPorEmpresa(Deposito $deposito) {
        return $deposito->finder()->findAll('id_empresa = ?', $deposito->getId_Empresa());
   /* }

    public function getListarDepositoPorFecha(Deposito $deposito) {
        return $deposito->finder()->findAll('fecha_deposito = ?', $deposito->getFecha_Deposito());
    }
    
    public function getDeposito(Deposito $deposito){
        return $deposito->finder()->find('id_deposito = ?', $deposito->getId_deposito());
    }
    
    public function getFIFO(Deposito $deposito){
        $sql ="SELECT * FROM deposito where estado= ? ORDER BY fecha_deposito asc LIMIT 2";
        return $deposito->finder()->findAllBySql($sql,$deposito->getEstado());
    }*/
}