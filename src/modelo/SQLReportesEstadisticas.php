<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLUsuario.php v1.0 24/09/2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLReportesEstadisticas {
    
    public function getConsultaAnidada($select, $from, $where, $order){
        $sql =  " SELECT ".(empty($select)? "*":$select)." ".
                " FROM ".$from." ".
                (empty($where)? "":" WHERE ".$where)." ".
                (empty($order)? "":" ORDER BY ".$order);
//        return $sql;
        
        $certificado_origen=new CertificadoOrigen();
        $connection = $certificado_origen->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
    public function recaudaciones($id_regional, $estado, $fecha_ini, $fecha_fin, $id_tipo){
        $sql =  
        "select "
	."fsmd.id_factura_senavex_manual_detalle, "
	."r.id_regional, "
	."r.ciudad, "
	."fsmd.cantidad, "
	."fsmd.precio, "
	."fsmd.cantidad * fsmd.precio as total "
        ."from "
                ."regional r, "
                ."factura_senavex_manual fsm, "
                ."factura_senavex_manual_detalle fsmd "
        ."where "
                ."fsm.id_regional = r.id_regional and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."fsm.id_factura_senavex_manual = fsmd.id_factura_senavex_manual and "
                ."(fsm.estado = 2 or fsm.estado = 5) and  fsm.numero_factura > 0 and "
		.($id_tipo < 0? '':(' fsm.id_tipo = '.$id_tipo.' and '))
                ."fsm.fecha_emision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ."(fsmd.id_servicio in (select s.id_servicio from servicio s) or "
                ."fsmd.id_servicio in (select se.id_servicio_exportador from servicio_exportador se)) order by fsm.fecha_emision asc";
        return $this->getConsultaSQL($sql);
    }
    public function anulados($id_regional, $fecha_ini, $fecha_fin, $estado){
        $sql = "select "
                    ." fsm.id_factura_senavex_manual,"
                    ." r.ciudad, "
                    ." fsm.fecha_emision, "
                    ." fsm.numero_factura, "
                    ." fsm.descripcion "
                ." from "
                    ." regional r, "
                    ." factura_senavex_manual fsm "
                ." where "
                    ." fsm.id_regional = r.id_regional and "
                    .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                    ." fsm.numero_factura > 0 and "
                    ." fsm.estado = ".$estado." and  "
                    ." fsm.fecha_emision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' "
                    ." order by fsm.numero_factura asc ";
        return $this->getConsultaSQL($sql);
    }
    public function conciliacion($id_regional, $fecha_ini, $fecha_fin, $estado, $id_tipo){
        $sql = "select r.ciudad, fsm.fecha_emision, fsm.numero_factura, fsm.total, d.fecha_deposito, d.codigo_deposito, d.monto, d.descripcion, fsm.id_tipo , CONCAT(pe.nombres, ' ', pe.paterno, ' ', pe.materno) as asistente "
                . 'from regional r, factura_senavex_manual fsm, deposito d, persona pe '
                .' where fsm.id_regional = r.id_regional and fsm.id_asistente = pe.id_persona and '
                .' fsm.estado = '.$estado.' and '
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                .' fsm.id_factura_senavex_manual = d.id_factura and '
                .($id_tipo < 0? '':(' fsm.id_tipo = '.$id_tipo.' and '))
                ." fsm.fecha_emision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                .' fsm.numero_factura>0 order by fecha_emision asc ';
        return $this->getConsultaSQL($sql);
    }
    public function conciliacion_r($id_regional, $fecha_ini, $fecha_fin){

        $sql = 'select count(d.id_deposito) from regional r, factura_senavex_manual fsm, deposito d '
                .' where fsm.id_regional = r.id_regional and '
                ." fsm.estado in (2, 5) and d.codigo_deposito <> '0' and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                .' fsm.id_factura_senavex_manual = d.id_factura and '
                ." fsm.fecha_emision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                .' fsm.numero_factura>0 ';

        return $this->getConsultaSQL($sql);
    }
    public function reporte_1($id_regional, $fecha_ini, $fecha_fin){
        $sql = "SELECT fsm.fecha_emision, "
                    ."fsm.numero_factura, "
                    ."fsm.numero_autorizacion, "
                    ."fsme.id_factura_senavex_manual_estado, "
                    ."fsme.descripcion, "
                    ."fse.nit, "
                    ."fse.nombre, "
                    ."fsm.total, "
                    ."fsm.codigo_control, "
                    ."r.ciudad "
            ." FROM factura_senavex_manual fsm,"
                    ."factura_senavex_manual_estado fsme,"
                    ."factura_senavex_empresa fse, "
                    ."regional r "
            .'WHERE fsm.numero_factura>0 and '
                    .'fsm.estado = fsme.id_factura_senavex_manual_estado and '
                    .'fsm.id_empresa = fse.id_factura_senavex_empresa and '
                    ."fsm.fecha_emision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                    .'fsm.id_regional = r.id_regional '
                    .($id_regional == 11? '':(' and r.id_regional = '.$id_regional))
                    .' order by fsm.numero_factura asc';
        return $this->getConsultaSQL($sql);
    }
    public function reporte_2($id_regional, $fecha_ini, $fecha_fin, $id_tipo){
        $sql = "SELECT fsm.fecha_emision, "
                    ."fsm.numero_factura, "
                    ."fsm.numero_autorizacion, "
                    ."fsme.id_factura_senavex_manual_estado, "
                    ."fsme.descripcion, "
                    ."fsm.total, "
                    ."fsm.codigo_control, "
                    ."r.ciudad, "
                    ."fsm.id_empresa, "
                    ."fsm.vortex, "
		    ."fsm.id_tipo "
            ." FROM factura_senavex_manual fsm,"
                    ."factura_senavex_manual_estado fsme,"
                    ."regional r "
            .'WHERE fsm.numero_factura>0 and '
                    .'fsm.estado = fsme.id_factura_senavex_manual_estado and '
                    ."fsm.fecha_emision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                    .'fsm.id_regional = r.id_regional '
                    .($id_regional == 11? '':(' and r.id_regional = '.$id_regional))
                    .($id_tipo < 0? '':(' and fsm.id_tipo = '.$id_tipo))
                    .' order by fsm.fecha_emision asc';
        return $this->getConsultaSQL($sql);
    }

    public function libro_r($id_regional, $fecha_ini, $fecha_fin){
        $sql = "SELECT count(*) FROM factura_senavex_manual fsm,"
                    ."factura_senavex_manual_estado fsme,"
                    ."regional r "
            .'WHERE fsm.numero_factura>0 and '
                    .'fsm.estado = fsme.id_factura_senavex_manual_estado and '
                    ."fsm.fecha_emision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                    .'fsm.id_regional = r.id_regional '
                    .($id_regional == 11? '':(' and r.id_regional = '.$id_regional));
        return $this->getConsultaSQL($sql);
    }
    public function libro_anulados_r($id_regional, $fecha_ini, $fecha_fin){
        $sql = "SELECT count(*) FROM factura_senavex_manual fsm,"
                    ."factura_senavex_manual_estado fsme,"
                    ."regional r "
            .'WHERE fsm.numero_factura>0 and '
                    .'fsm.estado = fsme.id_factura_senavex_manual_estado and fsme.id_factura_senavex_manual_estado in (1,6) and '
                    ."fsm.fecha_emision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                    .'fsm.id_regional = r.id_regional '
                    .($id_regional == 11? '':(' and r.id_regional = '.$id_regional));
        return $this->getConsultaSQL($sql);
    }

    public function sgc_ruex($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select "
                . "s_r.id_sgc_ruex, "
                . "e.razon_social, "
                . "e.nit,"
                . "e.ruex, "
                . "ee.descripcion as estado, "
                . "CONCAT(p.nombres, ' ', p.paterno, ' ', p.materno) as asistente, "
                . "s_r.fecha_inicio_revision, "
                . "s_r.fecha_fin_revision, "
                . "s_r.observaciones, "
                . "r.ciudad, "
                . "CONCAT(p2.nombres, ' ', p2.paterno, ' ', p2.materno) as rep_legal, "
                . "p2.genero, "
                . "s_r.revisado "
            ." from "
                ." empresa e, "
                ." sgc_ruex s_r, "
                ." regional r, "
                ." empresa_persona ep, "
                ." persona p, "
                ." persona p2, "
                ." estado_empresas ee "
            ."where "
                ."s_r.id_empresa = e.id_empresa and e.estado!=13 and s_r.revisado in (1, 2) and "
                ."ee.estado = s_r.id_estado and "
                ."s_r.id_asistente = ep.id_empresa_persona and ep.id_persona = p.id_persona and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."s_r.fecha_inicio_revision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ."e.id_representante_legal = p2.id_persona and "
                ."s_r.id_regional = r.id_regional order by s_r.id_sgc_ruex asc ";
            return $this->getConsultaSQL($sql);
    }
    public function sgc_ruex_r($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select count(*) from "
                ." empresa e, "
                ." sgc_ruex s_r, "
                ." regional r, "
                ." empresa_persona ep, "
                ." persona p, "
                ." persona p2, "
                ." estado_empresas ee "
            ."where "
                ."s_r.id_empresa = e.id_empresa and e.estado!=13 and s_r.revisado in (1, 2) and "
                ."ee.estado = s_r.id_estado and "
                ."s_r.id_asistente = ep.id_empresa_persona and ep.id_persona = p.id_persona and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."s_r.fecha_inicio_revision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ."e.id_representante_legal = p2.id_persona and "
                ."s_r.id_regional = r.id_regional ";
            return $this->getConsultaSQL($sql);
    }
    public function sgc_ruex_aprobado_r($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select count(*) from "
                ." empresa e, "
                ." sgc_ruex s_r, "
                ." regional r, "
                ." empresa_persona ep, "
                ." persona p, "
                ." persona p2, "
                ." estado_empresas ee "
            ."where "
                ."s_r.id_empresa = e.id_empresa and e.estado!=13 and s_r.revisado = 1 and "
                ."ee.estado = s_r.id_estado and "
                ."s_r.id_asistente = ep.id_empresa_persona and ep.id_persona = p.id_persona and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."s_r.fecha_inicio_revision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ."e.id_representante_legal = p2.id_persona and "
                ."s_r.id_regional = r.id_regional ";
            return $this->getConsultaSQL($sql);
    }
    public function sgc_ruex_rechazado_r($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select count(*) from "
                ." empresa e, "
                ." sgc_ruex s_r, "
                ." regional r, "
                ." empresa_persona ep, "
                ." persona p, "
                ." persona p2, "
                ." estado_empresas ee "
            ."where "
                ."s_r.id_empresa = e.id_empresa and e.estado!=13 and s_r.revisado = 2 and "
                ."ee.estado = s_r.id_estado and "
                ."s_r.id_asistente = ep.id_empresa_persona and ep.id_persona = p.id_persona and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."s_r.fecha_inicio_revision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ."e.id_representante_legal = p2.id_persona and "
                ."s_r.id_regional = r.id_regional ";
            return $this->getConsultaSQL($sql);
    }

    public function fob_peso_cantidad($fecha_ini, $fecha_fin, $code){

        $sql = "select count(*) as total, sum(pco_dj.fob) as fob, sum(pco_dj.pneto) as pneto FROM planilla_co pco, servicio s, planilla_ddjj pdj, planilla_co_ddjj pco_dj, planilla_detalle_arancel pda, 
planilla_criterio_origen pc, planilla_estado pe, planilla_tipo_emision pte, empresa e, pais p, persona per, planilla_acuerdo pac, regional r 
WHERE pco.id_planilla_tipo_emision = pte.id_planilla_tipo_emision and pe.id_planilla_estado in (1) and pco.id_estado = pe.id_planilla_estado 
and pco.id_tipo_co = s.id_servicio and pco.id_planilla_co = pco_dj.id_planilla_co and pco_dj.id_planilla_ddjj = pdj.id_planilla_ddjj 
and pdj.id_nandina = pda.id_detalle_arancel and pco_dj.id_criterio = pc.id_criterio_origen and pco.id_empresa = e.id_empresa and p.id_pais = pco.id_pais 
and pac.id_acuerdo = pco.id_acuerdo and pco.id_asistente_revision = per.id_persona and pco.id_regional = r.id_regional 
and substring(pda.codigo from 1 for ". strlen($code) .") = '". $code ."' and pco.fecha_revision between '".$fecha_ini." 00:00:00' and '". $fecha_fin ." 23:59:59' ";
// echo $sql;  die;
        return $this->getConsultaSQL($sql);
    }
    public function fob_peso_cantidad2($fecha_ini, $fecha_fin, $code1, $code2){

        $sql = "select count(*) as total, sum(pco_dj.fob) as fob, sum(pco_dj.pneto) as pneto FROM planilla_co pco, servicio s, planilla_ddjj pdj, planilla_co_ddjj pco_dj, planilla_detalle_arancel pda, 
planilla_criterio_origen pc, planilla_estado pe, planilla_tipo_emision pte, empresa e, pais p, persona per, planilla_acuerdo pac, regional r 
WHERE pco.id_planilla_tipo_emision = pte.id_planilla_tipo_emision and pe.id_planilla_estado in (1) and pco.id_estado = pe.id_planilla_estado 
and pco.id_tipo_co = s.id_servicio and pco.id_planilla_co = pco_dj.id_planilla_co and pco_dj.id_planilla_ddjj = pdj.id_planilla_ddjj 
and pdj.id_nandina = pda.id_detalle_arancel and pco_dj.id_criterio = pc.id_criterio_origen and pco.id_empresa = e.id_empresa and p.id_pais = pco.id_pais 
and pac.id_acuerdo = pco.id_acuerdo and pco.id_asistente_revision = per.id_persona and pco.id_regional = r.id_regional 
and (substring(pda.codigo from 1 for ". strlen($code1) .") = '". $code1 ."' or substring(pda.codigo from 1 for ". strlen($code2) .") = '". $code2 ."' ) and pco.fecha_revision between '".$fecha_ini." 00:00:00' and '". $fecha_fin ." 23:59:59' ";

        return $this->getConsultaSQL($sql);
    }
    public function fob_peso_cantidad3($fecha_ini, $fecha_fin, $code1, $code2, $code3){

        $sql = "select count(*) as total, sum(pco_dj.fob) as fob, sum(pco_dj.pneto) as pneto FROM planilla_co pco, servicio s, planilla_ddjj pdj, planilla_co_ddjj pco_dj, planilla_detalle_arancel pda, 
planilla_criterio_origen pc, planilla_estado pe, planilla_tipo_emision pte, empresa e, pais p, persona per, planilla_acuerdo pac, regional r 
WHERE pco.id_planilla_tipo_emision = pte.id_planilla_tipo_emision and pe.id_planilla_estado in (1) and pco.id_estado = pe.id_planilla_estado 
and pco.id_tipo_co = s.id_servicio and pco.id_planilla_co = pco_dj.id_planilla_co and pco_dj.id_planilla_ddjj = pdj.id_planilla_ddjj 
and pdj.id_nandina = pda.id_detalle_arancel and pco_dj.id_criterio = pc.id_criterio_origen and pco.id_empresa = e.id_empresa and p.id_pais = pco.id_pais 
and pac.id_acuerdo = pco.id_acuerdo and pco.id_asistente_revision = per.id_persona and pco.id_regional = r.id_regional 
and (substring(pda.codigo from 1 for ". strlen($code1) .") = '". $code1 ."' or substring(pda.codigo from 1 for ". strlen($code2) .") = '". $code2 ."' or substring(pda.codigo from 1 for ". strlen($code3) .") = '". $code3 ."'  ) and pco.fecha_revision between '".$fecha_ini." 00:00:00' and '". $fecha_fin ." 23:59:59' ";

        return $this->getConsultaSQL($sql);
    }

    public function sgc_repuesto_r($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select count(*) from factura_senavex_manual f, factura_senavex_manual_detalle fd where f.id_factura_senavex_manual = fd.id_factura_senavex_manual 
            and fd.id_servicio IN(53,54,55,56,58)  and f.estado in (2,5) and "
                .($id_regional == 11? '':(' f.id_regional = '.$id_regional.' and '))
                ."f.fecha_emision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and f.numero_recibo > 0 ";
            return $this->getConsultaSQL($sql);
    }

    public function sgc_ddjj($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select e.razon_social, e.nit, e.ruex, p.fecha_registro, ee.descripcion as estado, CONCAT(pe.nombres, ' ', pe.paterno, ' ', pe.materno) as asistente,
p.fecha_revision, p.observacion, r.ciudad
from planilla_ddjj p, empresa e, planilla_estado ee, persona pe, regional r
where p.id_empresa = e.id_empresa and p.id_estado = ee.id_planilla_estado and p.id_asistente_revision = pe.id_persona and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."p.fecha_revision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ." p.id_regional = r.id_regional order by r.ciudad, p.fecha_registro ";
            return $this->getConsultaSQL($sql);
    }

    public function seguimiento_ddjj($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select p.numero_folder, pac.sigla, e.ruex, e.razon_social, e.nit, p.fecha_registro, pe.descripcion, ee.descripcion as estado, p.fecha_revision, r.ciudad, p.numero_ddjj, p.fecha_entrega 
 from planilla_ddjj p left join planilla_ddjj_acuerdo pa on (pa.id_planilla_ddjj = p.id_planilla_ddjj) left join planilla_acuerdo pac on (pac.id_acuerdo = pa.id_acuerdo), empresa e,  planilla_tipo_emision pe , planilla_estado ee, regional r where p.id_empresa = e.id_empresa and p.id_estado = ee.id_planilla_estado and p.id_tipo = pe.id_planilla_tipo_emision and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."p.fecha_registro between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ." p.id_regional = r.id_regional order by r.ciudad, p.fecha_registro ";
                // echo $sql; die;
            return $this->getConsultaSQL($sql);
    }

    public function sgc_ddjj_r($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select count(*) from planilla_ddjj p, empresa e, planilla_estado ee, persona pe, regional r
where p.id_empresa = e.id_empresa and p.id_estado = ee.id_planilla_estado and p.id_asistente_revision = pe.id_persona and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."p.fecha_revision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ." p.id_regional = r.id_regional ";
            return $this->getConsultaSQL($sql);
    }

    public function seguimiento_co($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "Select p.numero_folder, p.nro_control, pl.sigla as acuerdo, e.ruex, e.razon_social, p.fecha_recepcion , ee.descripcion as estado, p.fecha_revision , r.ciudad, pt.descripcion as emision, p.id_tipo_co, p.fecha_entrega 
From planilla_co p left join planilla_tipo_emision pt on (p.id_planilla_tipo_emision = pt.id_planilla_tipo_emision), empresa e, planilla_estado ee, regional r, planilla_acuerdo pl Where p.id_empresa = e.id_empresa and p.id_estado = ee.id_planilla_estado and p.id_acuerdo = pl.id_acuerdo and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."p.fecha_recepcion between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ." p.id_regional = r.id_regional order by r.ciudad, p.fecha_recepcion ";
                // echo $sql;  die;
            return $this->getConsultaSQL($sql);
    }

    public function sgc_ddjj_aprobado_r($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select count(*) from planilla_ddjj p, empresa e, planilla_estado ee, persona pe, regional r
where p.id_empresa = e.id_empresa and p.id_estado = ee.id_planilla_estado and p.id_asistente_revision = pe.id_persona and p.id_estado = 1 and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."p.fecha_revision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ." p.id_regional = r.id_regional ";
            return $this->getConsultaSQL($sql);
    }

    public function sgc_co($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select p.nro_control, pl.sigla as acuerdo, e.razon_social, e.nit, e.ruex, p.fecha_recepcion , ee.descripcion as estado, CONCAT(pe.nombres, ' ', pe.paterno, ' ', pe.materno) as asistente,
p.fecha_revision , p.observacion_revision, r.ciudad
from planilla_co p, empresa e, planilla_estado ee, persona pe, regional r, planilla_acuerdo pl
where p.id_empresa = e.id_empresa and p.id_estado = ee.id_planilla_estado and p.id_acuerdo = pl.id_acuerdo and p.id_asistente_revision = pe.id_persona and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."p.fecha_revision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ." p.id_regional = r.id_regional order by r.ciudad, p.fecha_recepcion ";
            return $this->getConsultaSQL($sql);
    }

    public function sgc_co_r($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select count(*) from planilla_co p, empresa e, planilla_estado ee, persona pe, regional r, planilla_acuerdo pl
where p.id_empresa = e.id_empresa and p.id_estado = ee.id_planilla_estado and p.id_acuerdo = pl.id_acuerdo and p.id_asistente_revision = pe.id_persona and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."p.fecha_revision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ." p.id_regional = r.id_regional ";
            return $this->getConsultaSQL($sql);
    }

    public function sgc_co_rechazado_r($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select count(*) from planilla_co p, empresa e, planilla_estado ee, persona pe, regional r, planilla_acuerdo pl
where p.id_empresa = e.id_empresa and p.id_estado = ee.id_planilla_estado and p.id_acuerdo = pl.id_acuerdo and p.id_asistente_revision = pe.id_persona and ee.id_planilla_estado = 2 and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."p.fecha_revision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ." p.id_regional = r.id_regional ";
            return $this->getConsultaSQL($sql);
    }

    public function sgc_co_aprobado_r($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select count(*) from planilla_co p, empresa e, planilla_estado ee, persona pe, regional r, planilla_acuerdo pl
where p.id_empresa = e.id_empresa and p.id_estado = ee.id_planilla_estado and p.id_acuerdo = pl.id_acuerdo and p.id_asistente_revision = pe.id_persona and ee.id_planilla_estado = 1 and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."p.fecha_revision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ." p.id_regional = r.id_regional ";
            return $this->getConsultaSQL($sql);
    }

    public function getEmpresasNuevas($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            ' select sr.fecha_fin_revision, e.razon_social, e.nit, e.ruex, e.idrubro_exportaciones from sgc_ruex sr, empresa e
where sr.id_estado = 9 and sr.revisado = 1 and sr.id_empresa = e.id_empresa '
                ."and sr.fecha_fin_revision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' ";
            return $this->getConsultaSQL($sql);
    }
    
    public function getReporteDesglose($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            'select d.*, d.fecha_venta::date as f_ini, d.fecha_emision::date f_fin, f.numero_factura, s.abreviacion, r.ciudad from desglose_venta d, factura_senavex_manual f, servicio s, regional r
            where d.id_factura = f.id_factura_senavex_manual and d.id_servicio = s.id_servicio and '
                .($id_regional == 11? '':(' d.id_regional = '.$id_regional.' and '))
                ."d.fecha_venta between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' and "
                ." d.id_regional = r.id_regional and d.fecha_emision is not null order by r.ciudad, d.fecha_venta ";
            return $this->getConsultaSQL($sql);
    }

    public function getReporteEmisiones($id_regional, $fecha_ini, $fecha_fin){
         $sql =  
            "select "
                ."pco.id_regional, "
                ."pco.nro_emision, "
                ."pco.fecha_sellado, "
                ."pco.fecha_revision, "
                ."pco.nro_control,"
                ."s.id_servicio, "
                ."s.abreviacion as tipoco, "
                ."pda.codigo, "
                ."pco_dj.descripcion_comercial as ddjj, "
                ."pdj.id_planilla_ddjj, "
                ."pc.id_criterio_origen, "
                ."pco_dj.fob,"
                ."pco_dj.pneto, "
                ."pco_dj.factura, "
                ."pc.descripcion as criterio, "
                ."e.ruex, "
                ."pdj.numero_ddjj, "
                ."e.razon_social, "
                ."p.codigo_pais, "
                ."p.nombre as pais, "
                ."CONCAT(per.nombres, ' ', per.paterno, ' ', per.materno) as certificador, "
                ."pte.descripcion as tipoemision, "
                ."pco.observacion_revision, "
                ."pco_dj.observacion, "
                ."r.ciudad, "
                ."pac.sigla, "
                ."ce.descripcion as categoria_empresa, "
                ."pe.descripcion "
            ."from "
                ."planilla_co pco, "
                ."servicio s, "
                ."planilla_ddjj pdj, "
                ."planilla_co_ddjj pco_dj, "
                ."planilla_detalle_arancel pda, "
                ."planilla_criterio_origen pc, "
                ."planilla_estado pe, "
                ."planilla_tipo_emision pte, "
                ."empresa e, "
                ."pais p, "
                ."persona per, "
                ."planilla_acuerdo pac, "
                ."categoria_empresa ce, "
                ."regional r "
            ."where "
                ."pco.id_planilla_tipo_emision = pte.id_planilla_tipo_emision and "
                ."pe.id_planilla_estado in (1,2) and "
                ."pco.id_estado = pe.id_planilla_estado and "
                ."pco.id_tipo_co = s.id_servicio and "
                ."pco.id_planilla_co = pco_dj.id_planilla_co and "
                ."pco_dj.id_planilla_ddjj = pdj.id_planilla_ddjj and "
                ."pdj.id_nandina = pda.id_detalle_arancel and "
                ."pco_dj.id_criterio = pc.id_criterio_origen and "
                ."pco.id_empresa = e.id_empresa and "
                ."e.idcategoria_empresa = ce.id_categoria_empresa and "
                ."p.id_pais = pco.id_pais and "
                ."pac.id_acuerdo = pco.id_acuerdo and "
                ."pco.id_asistente_revision = per.id_persona and " 
                ."pco.id_regional = r.id_regional and "
                .($id_regional == 11? '':(' r.id_regional = '.$id_regional.' and '))
                ."pco.fecha_revision between '".$fecha_ini." 00:00:00' and '".$fecha_fin." 23:59:59' ORDER BY pco.id_regional, pco.fecha_revision, pco.nro_control ";
        // print("<pre>".print_r($sql, true)."</pre>");  die;
            return $this->getConsultaSQL($sql);
    }

    public function getComplementos($id_planilla_ddjj, $id_criterio){
         $sql =  'select pdja.complemento from planilla_ddjj pdj, planilla_ddjj_acuerdo pdja, empresa e
where pdj.id_planilla_ddjj = pdja.id_planilla_ddjj and pdj.id_empresa = e.id_empresa and pdj.id_planilla_ddjj = '.$id_planilla_ddjj.' and pdja.id_criterio = '.$id_criterio;
            return $this->getConsultaSQL($sql);
    }

    public function getConsultaSQL($sql){
        $empresa=new Empresa();
        $connection = $empresa->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}