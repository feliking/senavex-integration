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
//include_once(PATH_TABLA . DS . 'CriterioOrigen.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'MedioTransporte.php');
include_once(PATH_TABLA . DS . 'Pais.php');

include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLCOSgp.php');
include_once(PATH_MODELO . DS . 'SQLCOSgpDdjjFactura.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
//include_once(PATH_MODELO . DS . 'SQLCriterioOrigen.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');

$certificado_origen = new CertificadoOrigen();
$co_sgp = new COSgp();
$co_sgpddjjfactura = new COSgpDdjjFactura();
//$criterio_origen = new CriterioOrigen();
$empresa = new Empresa();
$pais = new Pais();

$sqlCertificadoOrigen = new SQLCertificadoOrigen();
$sqlCOSgp = new SQLCOSgp();
$sqlCOSgpDdjjFactura = new SQLCOSgpDdjjFactura();
//$sqlCriterioOrigen = new SQLCriterioOrigen();
$sqlEmpresa = new SQLEmpresa();
$sqlPais = new SQLPais();

$certificado_origen->setId_certificado_origen($_REQUEST["co"]);
$certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
//print_r($certificado_origen->regional);

$co_sgp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
$co_sgp=$sqlCOSgp->getListarCertificadosSgpPorCO($co_sgp);

$co_sgpddjjfactura->setId_co_sgp($co_sgp->getId_co_sgp());
$detalle_sgp=$sqlCOSgpDdjjFactura->getListarDdjjFacturasPorCoSgp($co_sgpddjjfactura, $certificado_origen->getId_acuerdo());

$empresa->setId_empresa($_SESSION["id_empresa"]);
$empresa=$sqlEmpresa->getEmpresaPorID($empresa);
//var_dump($empresa);

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
//$pdf->Rect($x, $y, 95, 26, 'D');
//$pdf->Rect($x, $y, 190, 53, 'D');
$pdf->SetFont('Times','',8);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->Cell(95,5,'',0,0,'L',0);
$pdf->Ln();
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->Cell(95,5,'',0,0,'L',0);

$pdf->SetFont('Times','B',14);
$pdf->Cell(25,5,'',0,0,'L',0);
$pdf->Cell(50,5,utf8_decode($co_sgp->getCorrelativo_sgp()),0,0,'L',0);
$pdf->Ln(3);
$pdf->SetFont('Times','',7);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->MultiCell(85,4,utf8_decode($empresa->getRazon_social()),0,'L',0);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->MultiCell(85,4,utf8_decode($empresa->getDireccion()),0,'L',0);
$pdf->Cell(5,4,'',0,0,'L',0);
//$pdf->MultiCell(85,4,utf8_decode('TELF. '.$empresa->getNumero_contacto()),0,'L',0);
//$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->MultiCell(85,4,utf8_decode($empresa->getCiudad().' - BOLIVIA'),0,'L',0);

//Segunda Fila
//$pdf->Rect($x, $y, 95, 53, 'D');
$pdf->SetXY(20,36);
$pdf->SetFont('Times','',7);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(85,4,'',0,0,'L',0);
$pdf->Ln();
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(85,4,'',0,0,'L',0);
$pdf->Ln(3);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->MultiCell(85,4,utf8_decode($co_sgp->getNombre_consignatario()),0,'L',0);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->MultiCell(85,4,utf8_decode($co_sgp->getDireccion_consignatario()),0,'L',0);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->MultiCell(85,4,utf8_decode($co_sgp->getId_pais_consignatario()),0,'L',0);
$pdf->Ln(4);
//Tercera Fila
$x=$pdf->GetX();
$y=$pdf->GetY();
//$pdf->Rect($x, $y, 95,51, 'D');
//$pdf->Rect($x, $y, 190,51, 'D');
$pdf->SetFont('Times','',8);
$pdf->Ln(15);

$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->MultiCell(95,5,utf8_decode($co_sgp->medio_transporte->getDescripcion()),0,'C',0);
$pdf->SetXY($x+95,$y);
$pdf->MultiCell(93,5,utf8_decode($co_sgp->getUso_oficial()),0,'C',0);
$pdf->Ln();
$pdf->MultiCell(95,5,utf8_decode($co_sgp->getRuta()),0,'C',0);

// CUARTA FILA
$pdf->SetXY(13,110);
$x=$pdf->GetX();
$y=$pdf->GetY();
//$pdf->Rect($x, $y, 13, 122, 'D');
//$pdf->Rect($x, $y, 37, 122, 'D');
//$pdf->Rect($x, $y, 118, 122, 'D');
//$pdf->Rect($x, $y, 142, 122, 'D');
//$pdf->Rect($x, $y, 166, 122, 'D');
//$pdf->Rect($x, $y, 190, 122, 'D');
$pdf->SetFont('Times','',10);
$pdf->Ln(20);
foreach($detalle_sgp as $row){
    $pdf->Cell(13,4,utf8_decode($row['numero_orden']),0,0,'C',0);
    $pdf->Cell(3,4,'',0,0,'C',0);
    $x=$pdf->GetX();
    $y=$pdf->GetY();
    $pdf->MultiCell(21,4,utf8_decode($row['marcas_paquetes'].' PAQUETES'),0,'C',0);
    $pdf->SetXY($x+24,$y);
    $pdf->Cell(4,4,'',0,0,'C',0);
    $x=$pdf->GetX();
    $y=$pdf->GetY();
    $pdf->MultiCell(74,4,utf8_decode($row['denominacion_mercaderia']),0,'L',0);
    $pdf->SetXY($x+74,$y);
    $pdf->Cell(4,4,'',0,0,'L',0);
    $pdf->Cell(20,4,utf8_decode($row['criterio']),0,0,'C',0);
    $x=$pdf->GetX();
    $y=$pdf->GetY();
    $pdf->MultiCell(24,4,utf8_decode($row['peso_bruto'].' Kg.'),0,'L',0);
    $pdf->SetXY($x+24,$y);
    $pdf->Cell(3,4,'',0,0,'L',0);
    $pdf->MultiCell(20,4,utf8_decode('N° '.$row['numero_factura'].' '.date("d/m/Y", strtotime($row['fecha_emision']))),0,'L',0);
    $pdf->Ln();
}

// QUINTA FILA
$pdf->SetXY(13,232);
$x=$pdf->GetX();
$y=$pdf->GetY();
//$pdf->Rect($x, $y, 95, 60, 'D');
//$pdf->Rect($x, $y, 190, 60, 'D');
$pais->setId_pais($co_sgp->getId_pais_productor());
$pais=$sqlPais->getBuscarDescripcionPorId($pais);

$pdf->SetXY(13,248);
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->SetFont('Times','',9);
$pdf->Cell(120,4,'',0,0,'L',0);
$pdf->Cell(60,4,utf8_decode($pais->getNombre()),0,0,'C',0);
$pdf->Ln(21);
$pdf->Cell(120,4,'',0,0,'L',0);
$pdf->Cell(60,4,utf8_decode($certificado_origen->pais->getNombre()),0,0,'C',0);
$pdf->Ln(9);
$fecha_emision = fechaConDiayMesLiteral($certificado_origen->getFecha_emision());
$fecha_llenado = fechaConDiayMesLiteral($certificado_origen->getFecha_llenado());
$pdf->SetFont('Times','',7);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(88,4,utf8_decode($certificado_origen->regional->getCiudad().', '.$fecha_emision),0,0,'C',0);
$pdf->Cell(10,4,'',0,0,'L',0);
$pdf->Cell(85,4,utf8_decode($certificado_origen->regional->getCiudad().', '.$fecha_llenado),0,0,'C',0);
/*
$pdf->SetFont('Times','',8);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(95,4,utf8_decode('Lugar y fecha, firma autorizada'),0,0,'L',0);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(93,4,utf8_decode('Lugar y fecha, firma y sello de la autoridad certificante'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(95,4,utf8_decode('Place and date, authorized signature'),0,0,'L',0);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(93,4,utf8_decode('Place and date, signature and stamp of certifiying authority'),0,0,'L',0);
$pdf->Ln();
*/
$pdf->Output();
$db->Close();
$pdf->close();

?>