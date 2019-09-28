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
$pdf->Image(PATH_STYLES.DS.'img/pdf/certificado/certificado_tp2.jpg',110,10,90,65);
$x=$pdf->GetX();
$y=$pdf->GetY();

//Primera Fila
$pdf->Rect($x, $y, 100, 35, 'D');
$pdf->SetFont('Times','B',10);
$pdf->Cell(5,5,'1. ',0,0,'L',0);
$pdf->Cell(95,5,utf8_decode('Nombre del Exportador, dirección, País'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->Cell(95,5,utf8_decode("Exporter's name, address, contry"),0,0,'L',0);
$pdf->Cell(45,5,'',0,0,'L',0);
$pdf->SetFont('Times','B',14);
$pdf->Cell(45,5,utf8_decode("N° ".$co_tp->getCorrelativo_tp()),0,0,'L',0);
$pdf->Ln(7);
$pdf->SetFont('Times','',9);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(95,5,utf8_decode($empresa->getRazon_social()),0,'L',0);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(95,5,utf8_decode($empresa->getDireccion()),0,'L',0);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(95,5,utf8_decode($empresa->getCiudad().' - BOLIVIA'),0,'L',0);
$pdf->Ln();
$pdf->SetXY($x+20,$y);
$pdf->Rect($x, $y, 198, 70, 'D');

//Segunda Fila
$pdf->SetXY($x,$y+35);
$pdf->Rect($x, $y, 100, 70, 'D');
$pdf->SetFont('Times','B',10);
$pdf->Cell(5,5,'2. ',0,0,'L',0);
$pdf->Cell(95,5,utf8_decode('Nombre del Destinatario, dirección, País'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->Cell(95,5,utf8_decode("Consigner's name, address, contry"),0,0,'L',0);
$pdf->Ln(7);
$pdf->SetFont('Times','',9);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(95,5,utf8_decode($co_tp->getNombre_consignatario()),0,'L',0);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(95,5,utf8_decode($co_tp->getDireccion_consignatario()),0,'L',0);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(95,5,utf8_decode($co_tp->getId_pais_consignatario()),0,'L',0);
$pdf->Ln(8);

//Tercera Fila
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->Rect($x, $y, 100, 40, 'D');
$pdf->Rect($x+100, $y, 98, 40, 'D');
$pdf->SetFont('Times','B',10);
$pdf->Cell(5,5,'3. ',0,0,'L',0);
$pdf->Cell(95,5,utf8_decode('Medio de Transporte y Ruta (Si Se conoce)'),0,0,'L',0);
$pdf->Cell(5,5,'4. ',0,0,'L',0);
$pdf->Cell(95,5,utf8_decode('Para uso oficial'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->Cell(95,5,utf8_decode("Means of transport and route (if know)"),0,0,'L',0);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->Cell(95,5,utf8_decode("For official use only"),0,0,'L',0);
$pdf->Ln(7);
$pdf->SetFont('Times','',10);
$pdf->Cell(5,5,'',0,0,'L',0);

$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->MultiCell(95,5,utf8_decode($co_tp->medio_transporte->getDescripcion()),0,'L',0);
$pdf->SetXY($x+95,$y);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(93,5,utf8_decode($co_tp->getUso_oficial()),0,'J',0);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(95,5,utf8_decode($co_tp->getRuta()),0,'L',0);

// CUARTA FILA
$pdf->SetXY(7,115);
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->Rect($x, $y, 21, 85, 'D');
$pdf->Rect($x, $y, 45, 85, 'D');
$pdf->Rect($x, $y, 143, 85, 'D');
$pdf->Rect($x, $y, 174, 85, 'D');
$pdf->Rect($x, $y, 198, 85, 'D');

$pdf->SetFont('Times','',10);
$pdf->Cell(4,4,'5.',0,0,'L',0);
$pdf->Cell(17,4,utf8_decode('Número'),0,0,'L',0);
$pdf->Cell(4,4,'6.',0,0,'L',0);
$pdf->Cell(20,4,utf8_decode('Códigos del'),0,0,'L',0);
$pdf->Cell(4,4,'7.',0,0,'L',0);
$pdf->Cell(94,4,utf8_decode('Número y descripcion de las mercaderías'),0,0,'L',0);
$pdf->Cell(4,4,'8.',0,0,'L',0);
$pdf->Cell(27,4,utf8_decode('Peso bruto u'),0,0,'L',0);
$pdf->Cell(4,4,'9.',0,0,'L',0);
$pdf->Cell(20,4,utf8_decode('Número y'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(17,4,utf8_decode('de item'),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(20,4,utf8_decode('Sistema'),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(94,4,utf8_decode('Number and description of goods'),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(27,4,utf8_decode('otra cantidad'),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(20,4,utf8_decode('fechas de las'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(17,4,utf8_decode('Item'),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(20,4,utf8_decode('Armonizado'),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(94,4,utf8_decode(''),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(27,4,utf8_decode('Gross weigth'),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(20,4,utf8_decode('facturas'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(17,4,utf8_decode('number'),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(20,4,utf8_decode('Harmonized'),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(94,4,utf8_decode(''),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(27,4,utf8_decode('or other quantity'),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(20,4,utf8_decode('Number'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(17,4,utf8_decode(''),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(20,4,utf8_decode('Systema'),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(94,4,utf8_decode(''),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(27,4,utf8_decode(''),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(20,4,utf8_decode('and date of'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(17,4,utf8_decode(''),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(20,4,utf8_decode('Codes'),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(94,4,utf8_decode(''),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(27,4,utf8_decode(''),0,0,'L',0);
$pdf->Cell(4,4,'',0,0,'L',0);
$pdf->Cell(20,4,utf8_decode('invoices'),0,0,'L',0);
$pdf->Ln(6);

if($co_tp->getId_tercer_operador()!=''){
    $xx=$pdf->GetX();
    $yy=$pdf->GetY();
    foreach($detalle_tp as $row){
        $pdf->Cell(21,4,utf8_decode($row['numero_orden']),0,0,'C',0);
        $pdf->Cell(24,4,utf8_decode($row['codigo_armonizado']),0,0,'C',0);
        $pdf->Cell(4,4,'',0,0,'C',0);
        $x=$pdf->GetX();
        $y=$pdf->GetY();
        $pdf->MultiCell(94,4,utf8_decode($row['denominacion_mercaderia']),0,'L',0);
    }
    $facturaterceroperador = new FacturaTercerOperador();
    $sqlTercerOperador = new SQLFacturaTercerOperador();
    
    $facturaterceroperador->setId_factura_tercer_operador($co_tp->getId_tercer_operador());
    $facturaterceroperador = $sqlTercerOperador->getFacturaPorID($facturaterceroperador); 
    $pdf->SetXY($xx+140,$yy);
    $pdf->Cell(4,4,'',0,0,'L',0);
    $pdf->Cell(27,4,utf8_decode($facturaterceroperador->getPeso_Bruto().' Kg.'),0,0,'C',0);
    $pdf->Cell(4,4,'',0,0,'L',0);
    $pdf->MultiCell(20,4,utf8_decode('N°'.$facturaterceroperador->getNumero_factura().' '.date("d/m/Y", strtotime($facturaterceroperador->getFecha_emision()))),0,'L',0);

}else{
    foreach($detalle_tp as $row){
        $pdf->Cell(21,4,utf8_decode($row['numero_orden']),0,0,'C',0);
        $pdf->Cell(24,4,utf8_decode($row['codigo_armonizado']),0,0,'C',0);
        $pdf->Cell(4,4,'',0,0,'C',0);
        $x=$pdf->GetX();
        $y=$pdf->GetY();
        $pdf->MultiCell(94,4,utf8_decode($row['denominacion_mercaderia']),0,'L',0);
        $pdf->SetXY($x+94,$y);
        $pdf->Cell(4,4,'',0,0,'L',0);
        $pdf->Cell(27,4,utf8_decode($row['clasif_arancelaria']),0,0,'C',0);
        $pdf->Cell(4,4,'',0,0,'L',0);
        $pdf->MultiCell(20,4,utf8_decode('N°'.$row['numero_factura'].' '.date("d/m/Y", strtotime($row['fecha_emision']))),0,'L',0);
    }
}

// QUINTA FILA
$pdf->SetXY(7,200);
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->Rect($x, $y, 198, 18, 'D');

$mensaje='';
if($co_tp->getId_datos_tercer_operador()!=0){
    $datos_tercer_operador= new DatosTercerOperador();
    $sqlDatosTercerOperador = new SQLDatosTercerOperador();
    $datos_tercer_operador->setId_datos_tercer_operador($co_tp->getId_datos_tercer_operador());
    $datos_tercer_operador=$sqlDatosTercerOperador->getBuscarDatosTercerOperadorPorId($datos_tercer_operador);
    $mensaje='Las mercancías descritas en el presente Certificado, serán facturadas por la empresa '.$datos_tercer_operador->getNombre().', domiciliada en '.$datos_tercer_operador->getDireccion().', Ciudad '.$datos_tercer_operador->getCiudad().' - '.$datos_tercer_operador->getPais().'. ';
}
$observ=$mensaje.$co_tp->getObservaciones();

$pdf->MultiCell(198,5,utf8_decode('OBSERVACIONES: '.$observ),0,'J',0);

// SEXTA FILA
$pdf->SetXY(7,218);
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->Rect($x, $y, 100, 72, 'D');
$pdf->Rect($x, $y, 198, 72, 'D');
$pdf->Cell(5,5,'10.',0,0,'L',0);
$pdf->Cell(95,5,utf8_decode('DECLARACIÒN DEL EXPORTADOR'),0,0,'L',0);
$pdf->Cell(5,5,'11.',0,0,'L',0);
$pdf->Cell(93,5,utf8_decode('CERTIFICACIÓN'),0,0,'L',0);
$pdf->Ln();
$pdf->SetFont('Times','',9);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(95,4,utf8_decode('DECLARATION OF THE EXPORTER'),0,0,'L',0);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(93,4,utf8_decode('CERTIFICATION'),0,0,'L',0);
$pdf->Ln(7);

$pdf->SetFont('Times','',8);
$pdf->Cell(5,4,'',0,0,'L',0);
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->MultiCell(94,4,utf8_decode('El abajo firmante declara que los detalles e indicaciones que preceden'
        . 'son exactos, que todas las mercaderías han sido producidas en BOLIVIA y van destinadas a:'),0,'J',0);
$pdf->SetXY($x+94,$y);
$pdf->SetFont('Times','',9);
$pdf->Cell(5,4,'',0,0,'L',0);
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->MultiCell(94,4,utf8_decode('De acuerdo al control efectuado, se certifica la veracidad de lo declarado por el exportador'),0,'L',0);
$pdf->Ln(5);

$pdf->SetFont('Times','',8);
$pdf->Cell(5,4,'',0,0,'L',0);
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->MultiCell(94,4,utf8_decode('The undersigned hereby declares that the above details and statements are '
        . 'correct and that all the goods were produced in BOLIVIA and are going to:'),0,'J',0);
$pdf->SetXY($x+94,$y);
$pdf->SetFont('Times','',9);
$pdf->Cell(5,4,'',0,0,'L',0);
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->MultiCell(94,4,utf8_decode('It is a hereby certified, on the basis of control carried out, that the declaration by the exporter is correct'),0,'L',0);
$pdf->Ln(4);

$pdf->SetFont('Times','B',10);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(95,4,utf8_decode($certificado_origen->pais->getNombre()),0,0,'C',0);
$pdf->Ln();
$pdf->SetFont('Times','',10);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(95,4,utf8_decode('PAÍS DE DESTINO'),0,0,'C',0);
$pdf->Ln();
$pdf->SetFont('Times','',9);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(95,4,utf8_decode('COUNTRY OF DESTINATION'),0,0,'C',0);
$pdf->Ln(9);

$fecha = fechaConDiayMesLiteral($certificado_origen->getFecha_llenado());
$pdf->SetFont('Times','',7);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(95,4,utf8_decode($certificado_origen->regional->getCiudad().', '.$fecha),0,0,'R',0);
$pdf->Ln(8);
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

$pdf->Output();
$db->Close();
$pdf->close();

?>