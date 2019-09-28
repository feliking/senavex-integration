<?php
session_start();
/* Controlar el acceso de los usuarios*/
define('_ACCESO','1');

//******************************** Datos del Certificado de Origen *********************************
include_once('../../../config/Config.php');
require_once(PATH_LIB . DS . 'fpdf'. DS .'fpdf.php');

include_once(PATH_TABLA . DS . 'CertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'COMercosur.php');
include_once(PATH_TABLA . DS . 'COMercosurDdjjFactura.php');
include_once(PATH_TABLA . DS . 'EstadoCO.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'CriterioOrigen.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'FacturaTercerOperador.php');
include_once(PATH_TABLA . DS . 'MedioTransporte.php');
include_once(PATH_TABLA . DS . 'Factura.php');
include_once(PATH_TABLA . DS . 'FacturaNoDosificada.php');
include_once(PATH_TABLA . DS . 'UnidadMedida.php');
include_once(PATH_TABLA . DS . 'DdjjAcuerdo.php');
include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');

include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLCOMercosur.php');
include_once(PATH_MODELO . DS . 'SQLCOMercosurDdjjFactura.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLCriterioOrigen.php');
include_once(PATH_MODELO . DS . 'SQLRegional.php');
include_once(PATH_MODELO . DS . 'SQLFacturaTercerOperador.php');
include_once(PATH_MODELO . DS . 'SQLFactura.php');
include_once(PATH_MODELO . DS . 'SQLFacturaNoDosificada.php');
include_once(PATH_MODELO . DS . 'SQLUnidadMedida.php');
include_once(PATH_MODELO . DS . 'SQLDdjjAcuerdo.php');

$certificado_origen = new CertificadoOrigen();
$co_mercosur = new COMercosur();
$co_mercosurddjjfactura = new COMercosurDdjjFactura();
$criterio_origen = new CriterioOrigen();
$empresa = new Empresa();
$unidad_medida = new UnidadMedida();
$ddjj_acuerdo = new DdjjAcuerdo();

$sqlCertificadoOrigen = new SQLCertificadoOrigen();
$sqlCOMercosur = new SQLCOMercosur();
$sqlCOMercosurDdjjFactura = new SQLCOMercosurDdjjFactura();
$sqlCriterioOrigen = new SQLCriterioOrigen();
$sqlEmpresa = new SQLEmpresa();
$sqlUnidadMedida = new SQLUnidadMedida();
$sqlDdjjAcuerdo = new SQLDdjjAcuerdo();

$certificado_origen->setId_certificado_origen($_REQUEST["co"]);
$certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
//print_r($certificado_origen->regional);
$co_mercosur->setId_certificado_origen($certificado_origen->getId_certificado_origen());
$co_mercosur=$sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);

$co_mercosurddjjfactura->setId_co_mercosur($co_mercosur->getId_co_mercosur());
$detalle_mercosur=$sqlCOMercosurDdjjFactura->getListarDdjjFacturasPorCoMercosur($co_mercosurddjjfactura);

$empresa->setId_empresa($_SESSION["id_empresa"]);
$empresa=$sqlEmpresa->getEmpresaPorID($empresa);

$elegir_acuerdo = $certificado_origen->getId_acuerdo();
$criterio_origen->setId_Acuerdo($elegir_acuerdo);
$criterio_origen = $sqlCriterioOrigen->getListarCriterioPorAcuerdo($criterio_origen);
//************* CLASE DEL CERTIFICADO PDF
class PDF extends FPDF
{	
    function Header()
    {	
        $certificado_origen = new CertificadoOrigen();
        $co_mercosur = new COMercosur();
        $sqlCertificadoOrigen = new SQLCertificadoOrigen();
        $sqlCOMercosur = new SQLCOMercosur();

        $certificado_origen->setId_certificado_origen($_REQUEST["co"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        $co_mercosur->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_mercosur=$sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);
        
        $this->Ln();
        $this->Cell(110,4,'',0,0,'C');
        $this->Ln();
        $this->Cell(110,4,'',0,0,'C');
        $this->Ln(8);
        $this->Cell(0,4,'',0,0,'C');
        $this->Ln(7);
        $this->Cell(0,4,'',0,0,'C');
        $this->Ln();
        $this->Cell(0,4,'',0,0,'C');
        $this->Ln();
        
        //Primera Fila
        $this->SetFont('Times','B',8);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->SetFont('Times','B',8);
        $this->Cell(0,7,'',0,0,'L',0);
        $this->Ln();
        $this->Cell(3,7,'',0,0,'L',0);
        $this->Cell(40,4,'',0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(67,7,'',0,0,'L',0);
        $this->Cell(2,7,'',0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(35,4,'',0,0,'L',0);
        $this->SetFont('Times','B',12);
        $this->Cell(40,7,utf8_decode($co_mercosur->getCorrelativo_mercosur()),0,0,'C',0);
        $this->Ln();
    }
    
    function Footer()
    {
        $certificado_origen = new CertificadoOrigen();
        $co_mercosur = new COMercosur();
        $sqlCertificadoOrigen = new SQLCertificadoOrigen();
        $sqlCOMercosur = new SQLCOMercosur();

        $certificado_origen->setId_certificado_origen($_REQUEST["co"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        $co_mercosur->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_mercosur=$sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);

        // Posición: a 7.3 cm del final
        $this->SetY(-73);
        $this->SetFont('Times','B',10);
        $this->Cell(200,6,'',0,0,'C');
        $this->Ln();
        $this->Cell(0,6,'',0,0,'R');
        $this->Ln();
        $this->SetFont('Times','',8);
        $this->Cell(0,5,'',0,0,'R');
        $this->Ln();
        $this->Cell(8,5,'',0,0,'R');
        $this->Ln();
        $this->Cell(0,5,'',0,0,'R');
        $this->Ln();
        $this->Cell(0,5,'',0,0,'R');
        $this->Ln(14);
        $this->Cell(106,5,'',0,0,'L');
        $this->SetFont('Times','B',9);
        $this->Cell(20,5,'',0,0,'L');
        $this->SetFont('Times','',9);
        $fecha_emi = fechaConDiayMesLiteral($certificado_origen->getFecha_emision());
        $this->Cell(70,5,utf8_decode($fecha_emi),0,0,'L');
    }
}

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
$pdf=new PDF('P','mm','A4');

$pdf->AliasNbPages();
$pdf->SetMargins(7,5,5);
$pdf->SetAutoPageBreak(true,0);
$pdf->AddPage();

$pdf->Output();
$db->Close();
$pdf->close();

?>