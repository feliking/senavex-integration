<?php
class PDF extends FPDF
{	
    
    function Header()
    {	
    }
    function CodigoQR($id_empresa){
        $empresa = new Empresa();
        $sqlEmpresa = new SQLEmpresa();

        $empresa->setId_empresa($id_empresa);
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
        $this->Image('../styles/img/BGRUEX.jpg', 0, 0, $this->w, $this->h);
        $this->SetFillColor(211,211,211);
        $this->RoundedRect(163, 67, 45, 10, 2, '1234', 'FD');
        $this->RoundedRect(9, 71, 30, 8, 2, '1234', 'D');
        $this->SetFont('Arial','B',14);
        $this->Ln(30);
        $this->Ln(6);
        $this->Ln(11);
        $this->SetFont('Arial','B',32);
        $this->Cell(35,10,'',0,0);
        $this->SetFont('Arial','B',22);
        $this->SetXY(163, 67);
        $this->Cell(45,10,'Nro: '.$empresa->getRuex(),0,1,'C');
        
        $this->SetFont('Arial','',7);
        $this->SetXY(9, 71);
        $this->Cell(30,4,'S-SNV/SERV/P 301 F01',0,1,'L');
        $this->SetXY(9, 75);
        $this->Cell(30,4,'Version 3',0,1,'C');
        $this->SetXY(30, 77);
        //-----------codigoQR-----------
        if($empresa->getEstado()=='0' || $empresa->getEstado()=='1' ||$empresa->getEstado()=='3' ||$empresa->getEstado()=='6' ||$empresa->getEstado()=='9')
        {
            $codigo='RUEX Pendiente:';
        }
        else
        {
            $codigo='RUEX valido:';
        }
        if($empresa->getCodigo_seguridad()==''){
            $seguridad=substr(str_shuffle("0123456789"), 0, 3).$empresa->getEstado().$empresa->getId_empresa().substr(str_shuffle("0123456789"), 0, 3);
            $empresa->setCodigo_seguridad($seguridad);
            $sqlEmpresa->GuardarEmpresa($empresa);
        } 

        $codigo.=''.$empresa->getRuex().' Fecha de Emision:'.$empresa->getFecha_asignacion_ruex().' Valido Hasta:'.$empresa->getFecha_renovacion_ruex().' Nit:'.$empresa->getNit();//.' Codigo de Seguridad:'.$empresa->getCodigo_seguridad();
        $codigo.=' http://vortex.senavex.gob.bo/ruex.php?ruex='.$empresa->getRuex().'&datos='.$empresa->getCodigo_seguridad();
        $qrcode = new QRcode(utf8_encode($codigo));
        $qrcode->disableBorder();
        $qrcode->displayFPDF($this ,36, 200, 40); 
    }
    function Footer()
    {
        // Posición: a 1,5 cm del final
        //$this->SetY(-15);
        // Arial italic 8
       // $this->SetFont('Arial','',12);
        // Número de página
       // $this->Cell(0,10,'www.vortex.senavex.gob.bo',0,0,'C');
    }
    function RoundedRect($x, $y, $w, $h, $r, $corners = '1234', $style = '')
	{
		$k = $this->k;
		$hp = $this->h;
		if($style=='F')
			$op='f';
		elseif($style=='FD' || $style=='DF')
			$op='B';
		else
			$op='S';
		$MyArc = 4/3 * (sqrt(2) - 1);
		$this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));

		$xc = $x+$w-$r;
		$yc = $y+$r;
		$this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));
		if (strpos($corners, '2')===false)
			$this->_out(sprintf('%.2F %.2F l', ($x+$w)*$k,($hp-$y)*$k ));
		else
			$this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);

		$xc = $x+$w-$r;
		$yc = $y+$h-$r;
		$this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
		if (strpos($corners, '3')===false)
			$this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-($y+$h))*$k));
		else
			$this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);

		$xc = $x+$r;
		$yc = $y+$h-$r;
		$this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
		if (strpos($corners, '4')===false)
			$this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-($y+$h))*$k));
		else
			$this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);

		$xc = $x+$r ;
		$yc = $y+$r;
		$this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
		if (strpos($corners, '1')===false)
		{
			$this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$y)*$k ));
			$this->_out(sprintf('%.2F %.2F l',($x+$r)*$k,($hp-$y)*$k ));
		}
		else
			$this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
		$this->_out($op);
                
	}

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
            $h = $this->h;
            $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
                    $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }
}

function pdfbase64 ($ruex){
    
header ('Content-type: text/html; charset=iso-8859-1'); 
header('Content-Transfer-Encoding: base64');
define('_ACCESO', 1);
include_once('../config/Config.php');
include_once('../src/Aplicacion.php');
require_once('../lib/fpdf/fpdf.php');
require_once('../lib/fpdf/fpdf.php');

////////////////////////////////////////-----------------------esto es para sacar la empresa-------------------------------------------------
include_once(PATH_BASE . DS . 'lib' . DS . 'qrcode'. DS .'qrcode.class.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Ciudad.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLRubroExportaciones.php');
include_once(PATH_TABLA . DS . 'RubroExportaciones.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLCiudad.php');


$empresa = new Empresa();
$sqlEmpresa = new SQLEmpresa();
$empresa->setRuex($ruex);

$empresa=$sqlEmpresa->getEmpresaPorRuex($empresa);
$id_empresa=$empresa->getId_empresa();
//----------para la fecha de renovacion
$fecha_renovacion_a= explode("-", $empresa->getFecha_renovacion_ruex());
$fecha_renovacion=$fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0];
$fecha_asignacion_a= explode("-", $empresa->getFecha_asignacion_ruex());
$fecha_asignacion=$fecha_asignacion_a[2].'/'.$fecha_asignacion_a[1].'/'.$fecha_asignacion_a[0];


//aca verificamos si es una persona o es un representante legal
$persona = new Persona();
$sqlPersona= new SQLPersona();

$persona->setId_persona($empresa->getId_representante_legal());
$persona=$sqlPersona->getDatosPersonaPorId($persona);
//------------para el rubro de exportaciones---------------------------
$rubro_exportaciones = new RubroExportaciones();
$sqlRubro_exportaciones = new SQLRubroExportaciones();
$rubros=explode(",",$empresa->getIdrubro_exportaciones());
////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------------

$pdf = new PDF('P','mm','Letter');
$pdf->AddPage();
$pdf->CodigoQR($id_empresa);
$pdf->SetMargins(8,10,8);
$pdf->SetFillColor(211,211,211);
$pdf->RoundedRect(8,82, 200, 10, 2, '12', 'F');
$pdf->RoundedRect(8,82, 200, 110, 2, '1234', 'D');
$pdf->SetFont('Arial','B',12);
$pdf->Ln(5);
$pdf->MultiCell(0,10,'DATOS GENERALES DEL EXPORTADOR','B','C');
$pdf->Ln(3);
//razon social
$pdf->SetXY(15, 96);
$pdf->SetFont('Arial','B',10);
//$pdf->RoundedRect(43,95, 162, 7, 2, '1234', 'F');
$pdf->Cell(45,6,utf8_decode('Razón Social'),0,0,'L'); 
$pdf->SetFont('Arial','',11);
$pdf->Cell(5,6,':',0,0,'L');
//$pdf->Cell(140,6,utf8_decode($empresa->getRazon_social()),0,0,'L');
$pdf->MultiCell(140,4,utf8_decode($empresa->getRazon_social()),'','L');
//$pdf->Cell(0,6,':',0,1);
//nombre comercial
$pdf->SetFont('Arial','B',10);
//$pdf->RoundedRect(43,107, 162, 7, 2, '1234', 'F');
$pdf->SetXY(15, 107);
//$pdf->Cell(45,6,utf8_decode(''),1,0,'L'); 
//$pdf->SetXY(15, 108);
$pdf->Cell(45,6,utf8_decode('Nombre Comercial'),0,0,'L'); 
$pdf->SetFont('Arial','',11);
//$pdf->SetXY(55, 107);
$pdf->Cell(5,6,':',0,0,'L');
//$pdf->Cell(140,6,utf8_decode($empresa->getNombre_comercial()),0,0,'L');
if(strlen($empresa->getNombre_comercial())>50){
    $pdf->SetFont('Arial','',9);
}else{
    $pdf->SetFont('Arial','',11);
}
$pdf->MultiCell(140,5,utf8_decode($empresa->getNombre_comercial()),'','L');


$pdf->SetXY(15, 117);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(45,6,utf8_decode('NIT/CI'),0,0,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Cell(50,6,utf8_decode($empresa->getNit()),0,0,'L');


//$pdf->RoundedRect(43,126, 50, 7, 2, '1234', 'F');
$pdf->SetXY(15, 127);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,utf8_decode('Matricula de Comercio'),0,0,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(5,6,':',0,0,'L');

if($empresa->getIdTipo_Empresa()==10 || $empresa->getIdTipo_Empresa()==17){
    $te='NO APLICA';
}else{
    $te=utf8_decode($empresa->getMatricula_fundempresa());
}
$pdf->Cell(50,6,$te,0,0,'L');

if($empresa->getOea()!=''){
    $pdf->SetXY(8, 137);
    $pdf->SetFont('Arial','B',11);
    $pdf->SetTextColor(255,100,100); 
    $pdf->Cell(200,6,utf8_decode('OPERADOR ECONOMICO AUTORIZADO'),1,0,'C');
    $pdf->SetTextColor(0);
}

$pdf->RoundedRect(8,143, 200, 8, 2, '', 'F');
$pdf->setXY(10, 140);
$pdf->SetFont('Arial','B',11);
$pdf->Ln(3);
$pdf->MultiCell(0,8,'VIGENCIA DEL RUEX',1,'C');
$pdf->Ln(3);

$pdf->SetXY(15, 154);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(45,6,utf8_decode('Vigencia'),0,0,'L'); 
$pdf->SetFont('Arial','',11);
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Cell(35,6,utf8_decode($empresa->getVigencia()),0,0,'L');

$pdf->SetXY(15, 165);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(45,6,utf8_decode('Desde'),0,0,'L'); 
$pdf->SetFont('Arial','',11);
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Cell(35,6,utf8_decode($fecha_asignacion),0,0,'L');

$pdf->SetXY(15, 174);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(45,6,utf8_decode('Hasta'),0,0,'L'); 
$pdf->SetFont('Arial','',11);
$pdf->Cell(5,6,':',0,0,'L'); 
$pdf->Cell(35,6,utf8_decode($fecha_renovacion),0,0,'L');

$pdf->SetFont('Arial','',8);
$y=3;

//-------------esto es para la firma y admision---------------------------
$empresa->setId_empresa($id_empresa);
$empresa=$sqlEmpresa->getEmpresaPorID($empresa);
$pdf->setXY(12,240);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(85,4,utf8_decode('Código de seguridad : '.$empresa->getCodigo_seguridad()),0,0,'C');
$pdf->setXY(36,244);
//$pdf->Ln(20);
$pdf->SetFont('Arial','B',9);
//$pdf->Cell(129,4,'',0,0);
if($empresa->getEstado()=='0' || $empresa->getEstado()=='1' ||$empresa->getEstado()=='3' ||$empresa->getEstado()=='6' ||$empresa->getEstado()=='9')
{
    $pdf->Cell(40,4,utf8_decode('RUEX PENDIENTE'),0,1,'C');
}
else
{
    $pdf->Cell(40,4,utf8_decode('RUEX VALIDADO '),0,1,'C');
}
$pdf->setXY(12,248);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(85,4,utf8_decode('SERVICIO NACIONAL DE VERIFICACIÓN DE EXPORTACIONES'),0,0,'C');
$doc = $pdf->Output('', 'S');
$pdflisto = chunk_split(base64_encode($doc));
return $pdflisto;

}
?>
