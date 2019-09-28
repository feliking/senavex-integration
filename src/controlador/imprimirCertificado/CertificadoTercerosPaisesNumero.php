<?php
session_start();
/* Controlar el acceso de los usuarios*/
define('_ACCESO','1');

//******************************** Datos del Certificado de Origen *********************************
include_once('../../../config/Config.php');
//include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
require_once(PATH_LIB . DS . 'fpdf'. DS .'fpdf.php');

include_once(PATH_TABLA . DS . 'CertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'COTp.php');
include_once(PATH_TABLA . DS . 'COTpDdjjFactura.php');
include_once(PATH_TABLA . DS . 'EstadoCO.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'MedioTransporte.php');
include_once(PATH_TABLA . DS . 'DatosTercerOperador.php');

include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLCOTp.php');
include_once(PATH_MODELO . DS . 'SQLCOTpDdjjFactura.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLDatosTercerOperador.php');

$certificado_origen = new CertificadoOrigen();
$co_tp = new COTp();
$co_tpddjjfactura = new COTpDdjjFactura();
$empresa = new Empresa();

$sqlCertificadoOrigen = new SQLCertificadoOrigen();
$sqlCOTp = new SQLCOTp();
$sqlCOTpDdjjFactura = new SQLCOTpDdjjFactura();
$sqlEmpresa = new SQLEmpresa();

$certificado_origen->setId_certificado_origen($_REQUEST["co"]);
$certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
//print_r($certificado_origen->regional);

$co_tp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
$co_tp=$sqlCOTp->getListarCertificadosTpPorCO($co_tp);

$co_tpddjjfactura->setId_co_tp($co_tp->getId_co_tp());
$detalle_tp=$sqlCOTpDdjjFactura->getListarDdjjFacturasPorCoTp($co_tpddjjfactura);

$empresa->setId_empresa($_SESSION["id_empresa"]);
$empresa=$sqlEmpresa->getEmpresaPorID($empresa);

function fechaConDiayMesLiteral($fecha){
    $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
    
    $fecha = substr($fecha,0,11);
    $array_fecha = explode("-", $fecha);
    $fecha = $array_fecha[2]."/".$array_fecha[1]."/".$array_fecha[0];
    
    $dia = $dias[date('N', strtotime($fecha))];
    $mes = $array_fecha[1];
    switch ($mes){
        case '01': $mes_literal="enero"; break;
        case '02': $mes_literal="febrero"; break;
        case '03': $mes_literal="marzo"; break;
        case '04': $mes_literal="abril"; break;
        case '05': $mes_literal="mayo"; break;
        case '06': $mes_literal="junio"; break;
        case '07': $mes_literal="julio"; break;
        case '08': $mes_literal="agosto"; break;
        case '09': $mes_literal="septiembre"; break;
        case '10': $mes_literal="octubre"; break;
        case '11': $mes_literal="noviembre"; break;
        case '12': $mes_literal="diciembre"; break;
    }
    $fecha_transformada = $dia.' '. $array_fecha[2].' de '.$mes_literal.' de '.$array_fecha[0];
    return $fecha_transformada;
}

//Instanciation of inherited class
$pdf=new FPDF('P','mm','A4');

$pdf->AliasNbPages();
$pdf->SetMargins(7,5,7);
$pdf->SetAutoPageBreak(true,0);
$pdf->AddPage();

//************************** INICIO DEL ARMADO DEL PDF *************************
//$pdf->Image(PATH_STYLES.DS.'img/pdf/certificado/certificado_tp2.jpg',110,10,90,65);
$x=$pdf->GetX();
$y=$pdf->GetY();

//Primera Fila
//$pdf->Rect($x, $y, 100, 35, 'D');
$pdf->SetFont('Times','B',10);
$pdf->Cell(100,5,'',0,0,'L',0);
$pdf->Ln();
$pdf->Cell(145,5,'',0,0,'L',0);
$pdf->SetFont('Times','B',14);
$pdf->Cell(45,5,utf8_decode("N° ".$co_tp->getCorrelativo_tp()),0,0,'L',0);

// SEXTA FILA
$pdf->SetXY(7,272);
$fecha = fechaConDiayMesLiteral($certificado_origen->getFecha_emision());
$pdf->SetFont('Times','',7);
$pdf->Cell(100,4,'',0,0,'L',0);
//$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(100,4,utf8_decode($certificado_origen->regional->getCiudad().', '.$fecha),0,0,'C',0);

$pdf->Output();
$db->Close();
$pdf->close();

?>