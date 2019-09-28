<?php
session_start();
/* Controlar el acceso de los usuarios*/
define('_ACCESO','1');

//******************************** Datos del Certificado de Origen *********************************
include_once('../../../config/Config.php');
require_once(PATH_LIB . DS . 'fpdf'. DS .'fpdf.php');

include_once(PATH_TABLA . DS . 'CertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'COVenezuela.php');
include_once(PATH_TABLA . DS . 'COVenezuelaDdjjFactura.php');
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
include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');
include_once(PATH_TABLA . DS . 'DdjjAcuerdo.php');

include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLCOVenezuela.php');

$certificado_origen = new CertificadoOrigen();
$co_venezuela = new COVenezuela();
$co_venezueladdjjfactura = new COVenezuelaDdjjFactura();
$criterio_origen = new CriterioOrigen();
$empresa = new Empresa();
$unidad_medida = new UnidadMedida();
$factura = new Factura();
$facturaNoDosificada = new FacturaNoDosificada();

$sqlCertificadoOrigen = new SQLCertificadoOrigen();
$sqlCOVenezuela = new SQLCOVenezuela();

//************* CLASE DEL CERTIFICADO PDF
class PDF extends FPDF
{	
    function Header()
    {	
        $certificado_origen = new CertificadoOrigen();
        $co_venezuela = new COVenezuela();
        $sqlCertificadoOrigen = new SQLCertificadoOrigen();
        $sqlCOVenezuela = new SQLCOVenezuela();

        $certificado_origen->setId_certificado_origen($_REQUEST["co"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        $co_venezuela->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_venezuela=$sqlCOVenezuela->getListarCertificadosVenezuelaPorCO($co_venezuela);

        $this->SetFont('Times','B',10);
        $this->Ln(2);
        $this->Cell(0,4,'',0,0,'C');
        $this->Ln(7);
        $this->Cell(164,4,utf8_decode(''),0,0,'C');
        $this->Cell(35,4,utf8_decode($co_venezuela->getCorrelativo_venezuela()),0,0,'L');
    }
    
    function Footer()
    {
        $certificado_origen = new CertificadoOrigen();
        $sqlCertificadoOrigen = new SQLCertificadoOrigen();
        
        $certificado_origen->setId_certificado_origen($_REQUEST["co"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);

        //Undécima fila
        $this->SetXY(7,251);
        $this->SetFont('Times','B',9);
        $this->Cell(16,5,'',0,0,'L',0);
        $fecha_emision = fechaConDiayMesLiteral($certificado_origen->getFecha_emision());
        $this->Cell(74,5,utf8_decode($fecha_emision),0,0,'L',0);
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
$pdf->SetAutoPageBreak(true,5);
$pdf->AddPage();

$pdf->Output();
$db->Close();
$pdf->close();

?>