<?php
session_start();
/* Controlar el acceso de los usuarios*/
define('_ACCESO','1');

//******************************** Datos del Certificado de Origen *********************************
include_once('../../../config/Config.php');
require_once(PATH_LIB . DS . 'fpdf'. DS .'fpdf.php');

include_once(PATH_TABLA . DS . 'CertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'COAladi.php');
include_once(PATH_TABLA . DS . 'EstadoCO.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'DdjjAcuerdo.php');
include_once(PATH_TABLA . DS . 'CriterioOrigen.php');
include_once(PATH_TABLA . DS . 'Regional.php');

include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLCOAladi.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLDdjjAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLCriterioOrigen.php');
include_once(PATH_MODELO . DS . 'SQLDatosTercerOperador.php');

$certificado_origen = new CertificadoOrigen();
$co_aladi = new COAladi();
$sqlCertificadoOrigen = new SQLCertificadoOrigen();
$sqlCOAladi = new SQLCOAladi();

$certificado_origen->setId_certificado_origen($_REQUEST["co"]);
$certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);

$co_aladi->setId_certificado_origen($certificado_origen->getId_certificado_origen());
$co_aladi=$sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);

//************* CLASE DEL CERTIFICADO PDF
class PDF extends FPDF
{	
    function Header()
    {	
        $certificado_origen = new CertificadoOrigen();
        $co_aladi = new COAladi();
        $sqlCertificadoOrigen = new SQLCertificadoOrigen();
        $sqlCOAladi = new SQLCOAladi();

        $certificado_origen->setId_certificado_origen($_REQUEST["co"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);

        $co_aladi->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_aladi=$sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);
        
        $this->SetFont('Times','B',10);
        $this->Ln(10);
        $this->Cell(190,4,'',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','B',14);
        $this->Cell(150,6,'',0,0,'C');
        $this->Cell(40,6,utf8_decode('N°: '.$co_aladi->getCorrelativo_aladi()),0,0,'C');
    }
    function Footer()
    {
        $certificado_origen = new CertificadoOrigen();
        $co_aladi = new COAladi();

        $sqlCertificadoOrigen = new SQLCertificadoOrigen();
        $sqlCOAladi = new SQLCOAladi();
        
        $certificado_origen->setId_certificado_origen($_REQUEST["co"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);

        $co_aladi->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_aladi=$sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);
        
        // Posición: a cms del final
        $this->SetY(-122);
        //$this->SetXY(15,175);
        $x=$this->GetX();
        $y=$this->GetY();
        //$this->Rect($x, $y, 180, 20, 'D');
        $this->SetFont('Times','',9);
        $this->Cell(180,5,'',0,0,'L',0);
        $this->Ln();
        $this->Cell(180,7,'',0,0,'L',0);
        $this->Ln();
        $this->Cell(180,7,'',0,0,'L',0);
        
        $this->SetFont('Times','',10);
        $this->Ln(10);
        $this->MultiCell(180,5,'',0,'J',0);

        $fecha_actual = date("d-m-Y");
        $this->SetXY(15,220);
        $x=$this->GetX();
        $y=$this->GetY();
        //$this->Rect($x, $y, 180, 45, 'D');
        $this->SetFont('Times','B',10);
        $this->Cell(180,7,'',0,0,'C',0);
        $this->Ln(10);
        $this->SetFont('Times','',9);
        $this->Cell(180,7,utf8_decode('  Certifico la veracidad de la presente declaración, que sello y firmo en la ciudad de '
                .$certificado_origen->regional->getCiudad().' - BOLIVIA  a los '. $fecha_actual),0,0,'J',0);
        $this->Ln(25);
        $this->Cell(110,7,'',0,0,'C',0);
        $this->Cell(70,7,'',0,0,'C',0);
        $this->Ln(12);
    }
}

//Instanciation of inherited class
$pdf=new PDF('P','mm','A4');

$pdf->AliasNbPages();
$pdf->SetMargins(15,15,15);
$pdf->SetAutoPageBreak(true,5);
$pdf->AddPage();

$pdf->Output();
$db->Close();
$pdf->close();

?>