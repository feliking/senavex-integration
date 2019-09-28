<?php
session_start();
/* Controlar el acceso de los usuarios*/
define('_ACCESO','1');

//******************************** Datos del Certificado de Origen *********************************
include_once('../../../config/Config.php');
require_once(PATH_LIB . DS . 'fpdf'. DS .'fpdf.php');

include_once(PATH_TABLA . DS . 'CertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'COSgp.php');
include_once(PATH_TABLA . DS . 'COSgpDdjjFactura.php');
include_once(PATH_TABLA . DS . 'EstadoCO.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'MedioTransporte.php');
include_once(PATH_TABLA . DS . 'Pais.php');

include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLCOSgp.php');

$certificado_origen = new CertificadoOrigen();
$co_sgp = new COSgp();
$sqlCertificadoOrigen = new SQLCertificadoOrigen();
$sqlCOSgp = new SQLCOSgp();

$certificado_origen->setId_certificado_origen($_REQUEST["co"]);
$certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
$co_sgp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
$co_sgp=$sqlCOSgp->getListarCertificadosSgpPorCO($co_sgp);

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
$pdf->SetMargins(13,6,8);
$pdf->SetAutoPageBreak(true,5);
$pdf->AddPage();

//************************** INICIO DEL ARMADO DEL PDF *************************
//$pdf->Image(PATH_STYLES.DS.'img/pdf/certificado/certificado_tp2.jpg',110,10,90,65);
$x=$pdf->GetX();
$y=$pdf->GetY();
//Primera Fila
$pdf->SetFont('Times','',8);
$pdf->Cell(100,5,'',0,0,'L',0);
$pdf->Ln();
$pdf->Cell(125,5,'',0,0,'L',0);
$pdf->SetFont('Times','B',14);
$pdf->Cell(50,5,utf8_decode($co_sgp->getCorrelativo_sgp()),0,0,'L',0);

//Segunda Fila

//Tercera Fila

// CUARTA FILA

// QUINTA FILA
$pdf->SetXY(13,248);
$pdf->SetFont('Times','',9);
$pdf->Cell(180,4,'',0,0,'L',0);
$pdf->Ln(21);
$pdf->Cell(180,4,'',0,0,'L',0);
$pdf->Ln(9);
$fecha_emision = fechaConDiayMesLiteral($certificado_origen->getFecha_emision());
$pdf->SetFont('Times','',7);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(88,4,utf8_decode($certificado_origen->regional->getCiudad().', '.$fecha_emision),0,0,'C',0);

$pdf->Output();
$db->Close();
$pdf->close();

?>