<?php
session_start();
ini_set ('error_reporting', E_ALL);

require_once('lib/fpdf/fpdf.php');
////////////////////////////////////////-----------------------esto es para sacar la empresa-------------------------------------------------
include_once(PATH_BASE . DS . 'lib' . DS . 'qrcode'. DS .'qrcode.class.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaImportador.php');
include_once(PATH_TABLA . DS . 'EmpresaImportador.php');
include_once(PATH_TABLA . DS . 'Ciudad.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLRubroExportaciones.php');
include_once(PATH_TABLA . DS . 'RubroExportaciones.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLCiudad.php');

include_once(PATH_MODELO . DS . 'SQLEmpresaImportador.php');
//include_once(PATH_CONTROLADOR . DS . 'admFacturaSenavex'.DS.'facturar.php');
//include_once(PATH_CONTROLADOR . DS . 'admFacturaSenavex'.DS.'numeros.php');
//print('<pre>'.print_r($_REQUEST,true).'</pre>');
$empresaImportador = new EmpresaImportador();
$sqlEmpresaImportador = new SQLEmpresaImportador();
$id_empresaImportador=$_REQUEST['id_empresa'];
$empresaImportador->setId_empresa_importador((isset($_REQUEST['id_empresa'])?$_REQUEST['id_empresa']:$_SESSION['id_empresa']));
$empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
//----------para la fecha de renovacion
$fecha_renovacion_a= explode("-", $empresaImportador->getFecha_renovacion_rui());
$fecha_renovacion=$fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0];
$fecha_asignacion_a= explode("-", $empresaImportador->getFecha_asignacion_rui());
$fecha_asignacion=$fecha_asignacion_a[2].'/'.$fecha_asignacion_a[1].'/'.$fecha_asignacion_a[0];



//aca verificamos si es una persona o es un representante legal
$persona = new Persona();
$sqlPersona= new SQLPersona();

/*if($_SESSION["tipo_usuario"] =='2')// es exportador
{
    $empresa_persona = new EmpresaPersona();
    $sqlEmpresaPersona = new SQLEmpresaPersona();

    $empresa_persona->setId_empresa_persona($_SESSION["id_empresa_persona"]);
    $empresa_persona=$sqlEmpresaPersona->getEmpresaPersonaPorID($empresa_persona);
    if($empresa_persona->getId_perfil()=='3')
    {
        $persona->setId_persona($empresa_persona->getId_persona());
    }
    else
    {
        $persona->setId_persona($empresa->getId_representante_legal());
    }
}      
else
{
    $persona->setId_persona($empresa->getId_representante_legal());
}*/
$persona->setId_persona($empresaImportador->getId_representante_legal());
$persona=$sqlPersona->getDatosPersonaPorId($persona);
//------------para el rubro de exportaciones---------------------------
$rubro_exportaciones = new RubroExportaciones();
$sqlRubro_exportaciones = new SQLRubroExportaciones();
$rubros=explode(",",$empresaImportador->getIdrubro_exportaciones());
////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------------

class PDF extends FPDF
{	
    
    function Header()
    {	
    }
    function CodigoQR($id_empresaImportador){
        $empresaImportador = new EmpresaImportador();
        $sqlEmpresaImportador = new SQLEmpresaImportador();

        $empresaImportador->setId_empresa_importador($id_empresaImportador);
        $empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
        //Cell(width, height, text, border, position-next-cell, alignment);
        $this->Image('styles/img/BGRUI.jpg', 0, 0, $this->w, $this->h);
        $this->SetFillColor(211,211,211);
        $this->RoundedRect(163, 67, 45, 10, 2, '1234', 'FD');
        //RUI$this->RoundedRect(9, 71, 30, 8, 2, '1234', 'D');
        //$this->Image('styles/img/institucion/logo-min.png',7,10,75,25);
        //$this->Image('styles/img/institucion/vortex2.png',140,7,70,30);
        $this->SetFont('Arial','B',14);
        $this->Ln(30);
        //$this->Cell(0,10,utf8_decode('SERVICIO NACIONAL DE VERIFICACIÓN DE EXPORTACIONES'),0,0,'C');
        $this->Ln(6);
        //$this->Cell(0,10,utf8_decode('REGISTRO ÚNICO DEL EXPORTADOR'),0,0,'C');
        $this->Ln(11);
        $this->SetFont('Arial','B',32);
        //$this->Cell(118,10,utf8_decode('R U E X'),0,0,'R');
        $this->Cell(35,10,'',0,0);
        $this->SetFont('Arial','B',22);
        $this->SetXY(163, 67);
        $this->Cell(45,10,'Nro: '.$empresaImportador->getRui(),0,1,'C');
        
        //RUI $this->SetFont('Arial','',7);
        //RUI $this->SetXY(9, 71);
        //RUI $this->Cell(30,4,'S-SNV/SERV/P 301 F01',0,1,'L');
        //RUI $this->SetXY(9, 75);
        //RUI $this->Cell(30,4,'Version 3',0,1,'C');
        //RUI $this->SetXY(30, 77);
        //-----------codigoQR-----------
        if($empresaImportador->getEstado()=='0' || $empresaImportador->getEstado()=='1' ||$empresaImportador->getEstado()=='3' ||$empresaImportador->getEstado()=='6' ||$empresaImportador->getEstado()=='9')
        {
            $codigo='RUI Pendiente:';
        }
        else
        {
            $codigo='RUI valido:';
        }

//        $facturar=new facturar();
//        $time1 = strtotime($empresa->getFecha_asignacion_ruex());
//        $newformat1 = date('Ymd',$time1);
//        $time2 = strtotime($empresa->getFecha_registro());
//        $newformat2 = date('Ymd',$time2);
//        $dato1=$empresa->getRuex();
//        $dato2=$newformat1;
//        $dato3=$newformat2;
//        $dato4=$empresa->getRuex();
//        $dato6=$empresa->getMatricula_Fundempresa();
//        $dato5= AUTORIZACION;
//        $seguridadaux=$facturar->codControl(11111, 222222, $newformat1, $newformat2, KEY, AUTORIZACION);
//        $seguridadaux=$facturar->codControl(, ,  ,$empresa->getFecha_registro(), AUTORIZACION);
//        print('<pre>'.print_r($seguridadaux,true).'</pre>');
        $codigo.=''.$empresaImportador->getRui().' Fecha de Emision:'.$empresaImportador->getFecha_asignacion_rui().' Valido Hasta:'.$empresaImportador->getFecha_renovacion_rui().' Nit:'.$empresaImportador->getNit();//.' Codigo de Seguridad:'.$empresaImportador->getCodigo_seguridad();
        //$codigo.=utf8_decode(' Fecha de impresión:').date("Y-m-d");
        //$codigo.=' http://vortex.senavex.gob.bo/ruex.php?datos='.$empresaImportador->getCodigo_seguridad();
        $codigo.=' http://vortex.senavex.gob.bo/rui.php?rui='.$empresaImportador->getRui();
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

$pdf = new PDF('P','mm','Letter');
$pdf->AddPage();
$pdf->CodigoQR($_REQUEST['id_empresa']);
$pdf->SetMargins(8,10,8);
$pdf->SetFillColor(211,211,211);
$pdf->RoundedRect(8,82, 200, 10, 2, '12', 'F');
$pdf->RoundedRect(8,82, 200, 110, 2, '1234', 'D');
$pdf->SetFont('Arial','B',12);
$pdf->Ln(5);
$pdf->MultiCell(0,10,'DATOS GENERALES DEL IMPORTADOR','B','C');
$pdf->Ln(3);
//razon social
$pdf->SetXY(15, 96);
$pdf->SetFont('Arial','B',10);
//$pdf->RoundedRect(43,95, 162, 7, 2, '1234', 'F');
$pdf->Cell(45,6,utf8_decode('Razón Social'),0,0,'L'); 
$pdf->SetFont('Arial','',11);
$pdf->Cell(5,6,':',0,0,'L');
//$pdf->Cell(140,6,utf8_decode($empresaImportador->getRazon_social()),0,0,'L');
$pdf->MultiCell(140,4,utf8_decode($empresaImportador->getRazon_social()),'','L');
//$pdf->Cell(0,6,':',0,1);
//nombre comercial
$pdf->SetFont('Arial','B',10);
//$pdf->RoundedRect(43,107, 162, 7, 2, '1234', 'F');
$pdf->SetXY(15, 107);
//$pdf->Cell(45,6,utf8_decode(''),1,0,'L'); 
//$pdf->SetXY(15, 108);
$pdf->Cell(45,6,utf8_decode('Padrón Importador'),0,0,'L'); 
$pdf->SetFont('Arial','',11);
//$pdf->SetXY(55, 107);
$pdf->Cell(5,6,':',0,0,'L');
//$pdf->Cell(140,6,utf8_decode($empresaImportador->getNombre_comercial()),0,0,'L');
if(strlen($empresaImportador->getNombre_comercial())>50){
    $pdf->SetFont('Arial','',9);
}else{
    $pdf->SetFont('Arial','',11);
}
$pdf->MultiCell(140,5,utf8_decode($empresaImportador->getPadron_importador()),'','L');
//$pdf->Cell(0,8,'',0,1);
//vigencia, fecha de vigencia , nit
/*$pdf->RoundedRect(43,101, 25, 7, 2, '1234', 'F');
$pdf->RoundedRect(105,101, 35, 7, 2, '1234', 'F');*/

//$pdf->RoundedRect(43,117, 50, 7, 2, '1234', 'F');
$pdf->SetXY(15, 117);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(45,6,utf8_decode('NIT/CI'),0,0,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Cell(50,6,utf8_decode($empresaImportador->getNit()),0,0,'L');


//$pdf->RoundedRect(43,126, 50, 7, 2, '1234', 'F');
$pdf->SetXY(15, 127);
//$pdf->SetFont('Arial','B',10);
//$pdf->Cell(45,6,utf8_decode(''),1,0,'L');
//$pdf->SetXY(15, 127);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,utf8_decode('Matrícula de Comercio'),0,0,'L');
$pdf->SetFont('Arial','',11);
$pdf->Cell(5,6,':',0,0,'L');

if($empresaImportador->getIdTipo_EmpresaImportador()==10 || $empresaImportador->getIdTipo_EmpresaImportador()==17){
    $te='NO APLICA';
}else{
    $te=utf8_decode($empresaImportador->getMatricula_fundempresa());
}
$pdf->Cell(50,6,$te,0,0,'L');

if($empresaImportador->getOea()!=''){
    $pdf->SetXY(8, 137);
    $pdf->SetFont('Arial','B',11);
    $pdf->SetTextColor(255,100,100); 
    $pdf->Cell(200,6,utf8_decode('OPERADOR ECONOMICO AUTORIZADO'),1,0,'C');
    $pdf->SetTextColor(0);
}

/*$pdf->Ln(5);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(37,8,utf8_decode('Mat. de Comercio:'),0,0,'R');
$pdf->SetFont('Arial','',11);
$pdf->Cell(35,8,utf8_decode($empresa->getMatricula_fundempresa()),0,0,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(35,8,utf8_decode('Fec. Vigencia:'),0,0,'R');
$pdf->SetFont('Arial','',11);
$pdf->Cell(25,8,utf8_decode($fecha_renovacion),0,0,'C');
$pdf->Cell(0,8,'',0,1);

//matricula comercio
if($empresa->getMatricula_fundempresa()!='')
{
    $pdf->RoundedRect(43,109, 162, 7, 2, '1234', 'F');
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(35,8,utf8_decode('Dirección:'),0,0,'R'); 
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(162,8,utf8_decode($empresa->getDireccionfiscal()),0,0,'C');    
    $pdf->Cell(1,8,'',0,1);
    $pdf->RoundedRect(43,117,40, 7, 2, '1234', 'F');
    $pdf->RoundedRect(111,117,94, 7, 2, '1234', 'F');
    $pdf->RoundedRect(8,128, 200, 8, 2, '', 'F');
    $pdf->RoundedRect(43,139, 94, 7, 2, '1234', 'F');
    $pdf->RoundedRect(161,139, 43, 7, 2, '1234', 'F');
    $pdf->RoundedRect(8,150, 200, 8, 2, '', 'F');
}
else
{
    $pdf->RoundedRect(43,109,40, 7, 2, '1234', 'F');
    $pdf->RoundedRect(111,109,94, 7, 2, '1234', 'F');
    $pdf->RoundedRect(8,120, 200, 8, 2, '', 'F');
    $pdf->RoundedRect(43,131, 94, 7, 2, '1234', 'F');
    $pdf->RoundedRect(161,131, 43, 7, 2, '1234', 'F');
    $pdf->RoundedRect(8,142, 200, 8, 2, '', 'F');
}
//ciudad y direccion}


$pdf->SetFont('Arial','B',11);
$pdf->Cell(35,8,utf8_decode('Ciudad:'),0,0,'R'); 
$pdf->SetFont('Arial','',11);
$ciudad = new Ciudad();
$sqlCiudad = new SQLCiudad();
$ciudad->setId_ciudad($empresa->getCiudad());
$ciudad = $sqlCiudad->getCiudadPorID($ciudad);
$pdf->Cell(40,8,utf8_decode($ciudad->getDescripcion()),0,0,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(28,8,utf8_decode('Nit:'),0,0,'R');
$pdf->Cell(94,8,utf8_decode($empresa->getNit()),0,0,'C');  
$pdf->Cell(0,8,'',0,1);*/
//representante legal
$pdf->RoundedRect(8,143, 200, 8, 2, '', 'F');
$pdf->setXY(10, 140);
$pdf->SetFont('Arial','B',11);
$pdf->Ln(3);
$pdf->MultiCell(0,8,'VIGENCIA DEL RUI-SENAVEX',1,'C');
$pdf->Ln(3);
//mobre y ci

//$pdf->RoundedRect(43,155,35, 7, 2, '1234', 'F');
$pdf->SetXY(15, 154);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(45,6,utf8_decode('Vigencia'),0,0,'L'); 
$pdf->SetFont('Arial','',11);
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Cell(35,6,utf8_decode('1 AÑO'),0,0,'L');

//$pdf->RoundedRect(43,165,35, 7, 2, '1234', 'F');
//$pdf->RoundedRect(113,165,35, 7, 2, '1234', 'F');
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


/*$pdf->Cell(35,8,utf8_decode('Nombre:'),0,0,'R');
$pdf->SetFont('Arial','',11);
$pdf->Cell(94,8,utf8_decode($persona->getNombres().' '.$persona->getPaterno().' '.$persona->getMaterno()),0,0,'C');  
$pdf->SetFont('Arial','B',11);
$pdf->Cell(24,8,utf8_decode('Documento:'),0,0,'R'); 
$pdf->SetFont('Arial','',11);
$pdf->Cell(43,8,utf8_decode($persona->getNumero_documento()),0,0,'C');
$pdf->Cell(0,8,'',0,1);*/
//rubros de exportacion

//$pdf->SetFont('Arial','B',11);
//$pdf->Ln(3);
//$pdf->MultiCell(0,8,utf8_decode('Actividad Principal de Exportación'),1,'C');
//$pdf->Ln(3);
//--------------rubros-------------------------
$pdf->SetFont('Arial','',8);
$y=3;
/*if(count($rubros)>8)
{
    $pdf->SetFont('Arial','',7);
    $y=3;
}
if(count($rubros)>10)
{
    $pdf->SetFont('Arial','',7);
    $y=2.5;
}
if(count($rubros)>12)
{
    $pdf->SetFont('Arial','',6);
    $y=2;
}
if(count($rubros)>15)
{
    $pdf->SetFont('Arial','',6);
    $y=1.6;
}

foreach ($rubros as &$rubro) {
    $rubro_exportaciones->setId_rubro_exportaciones($rubro);
    $rubro_exportaciones=$sqlRubro_exportaciones-> getBuscarRubroPorId($rubro_exportaciones);
    $rubro=explode("-", $rubro_exportaciones->getDescripcion(), 2);
    $pdf->Cell(2,$y,'',0,0);
    $pdf->Cell(2,$y,'-',0,0,'C');
    $pdf->MultiCell(193,$y,utf8_decode($rubro[1]),0);  
    $pdf->Cell(2,$y,'',0,1);
}*/
//---------------------codigo Qr----------------------------------------
//$pdf->SetXY(8, 100);
//$pdf->Cell(0,0.05,'',1,1);
//$pdf->SetFillColor(0,0,0);
//$pdf->RoundedRect(107,215, 0.3, 50, 2, '', 'F');
//-------------esto es para la firma y admision---------------------------
$empresaImportador->setId_empresa_importador($id_empresaImportador);
$empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
$pdf->setXY(12,240);
$pdf->SetFont('Arial','B',6);
//RUI$pdf->Cell(85,4,utf8_decode('Código de seguridad : '.$empresaImportador->getCodigo_seguridad()),0,0,'C');
$pdf->setXY(36,244);
//$pdf->Ln(20);
$pdf->SetFont('Arial','B',9);
//$pdf->Cell(129,4,'',0,0);
if($empresaImportador->getEstado()=='0' || $empresaImportador->getEstado()=='1' ||$empresaImportador->getEstado()=='3' ||$empresaImportador->getEstado()=='6' ||$empresaImportador->getEstado()=='9')
{
    $pdf->Cell(40,4,utf8_decode('RUI-SENAVEX PENDIENTE'),0,1,'C');
}
else
{
    $pdf->Cell(40,4,utf8_decode('RUI-SENAVEX VALIDADO '),0,1,'C');
}
//$pdf->Cell(107,4,'',0,0);

$pdf->setXY(12,248);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(85,4,utf8_decode('SERVICIO NACIONAL DE VERIFICACIÓN DE EXPORTACIONES'),0,0,'C');
$pdf->Output();
?>