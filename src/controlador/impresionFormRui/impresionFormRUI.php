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
include_once(PATH_TABLA . DS . 'Direccion.php');
include_once(PATH_TABLA . DS . 'DireccionTipo.php');
include_once(PATH_TABLA . DS . 'DireccionTipoCalle.php');
include_once(PATH_TABLA . DS . 'DireccionTipoZona.php');
include_once(PATH_TABLA . DS . 'DireccionUbicacionEdificio.php');
include_once(PATH_TABLA . DS . 'Municipio.php');
include_once(PATH_TABLA . DS . 'Departamento.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'TipoDocumentoIdentidad.php');


include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLRubroExportaciones.php');
include_once(PATH_TABLA . DS . 'RubroExportaciones.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLCiudad.php');
include_once(PATH_MODELO . DS . 'SQLDireccion.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaImportador.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipo.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoCalle.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoZona.php');
include_once(PATH_MODELO . DS . 'SQLDireccionUbicacionEdificio.php');
include_once(PATH_MODELO . DS . 'SQLMunicipio.php');
include_once(PATH_MODELO . DS . 'SQLDepartamento.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');
include_once(PATH_MODELO . DS . 'SQLTipoDocumentoIdentidad.php');

//include_once(PATH_CONTROLADOR . DS . 'admFacturaSenavex'.DS.'facturar.php');
//include_once(PATH_CONTROLADOR . DS . 'admFacturaSenavex'.DS.'numeros.php');
$empresaImportador = new EmpresaImportador();
$sqlEmpresaImportador = new SQLEmpresaImportador();
$id_empresaImportador=$_REQUEST['id_empresa'];
$empresaImportador->setId_empresa_importador((isset($_REQUEST['id_empresa'])?$_REQUEST['id_empresa']:$_SESSION['id_empresa']));
$empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
//----------para la fecha de renovacion
//$fecha_renovacion_a= explode("-", $empresaImportador->getFecha_renovacion_rui());
//$fecha_renovacion=$fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0];
//$fecha_asignacion_a= explode("-", $empresaImportador->getFecha_asignacion_rui());
//$fecha_asignacion=$fecha_asignacion_a[2].'/'.$fecha_asignacion_a[1].'/'.$fecha_asignacion_a[0];
$sqldireccion= new SQLDireccion();
$sqlmunicipio= new SQLMunicipio();
$sqldepartamento = new SQLDepartamento();
$sqltipozona = new SQLDireccionTipoZona();
$sqltipocalle = new SQLDireccionTipoCalle();
$sqlDireccionUbicacionEdificio = new SQLDireccionUbicacionEdificio();
$sqlPersona= new SQLPersona();
$sqlPais= new SQLPais();
$sqlTipodoc= new SQLTipoDocumentoIdentidad();

$direccion= new Direccion();
$direccion = new Direccion();
$direccion->setId_direccion($empresaImportador->getId_direccion());
$direccion = $sqldireccion->getDireccionByID($direccion);
$municipio= new Municipio();
$municipio->setId_municipio($direccion->getId_municipio());
$municipio = $sqlmunicipio->getMunicipioPorID($municipio);
$departamento = new Departamento();
$departamento->setId_departamento($direccion->getId_departamento());
$departamento = $sqldepartamento->getBuscarDepartamentoPorId($departamento);
$tipozona= new DireccionTipoZona();
$tipozona->setId_direccion_tipo_zona($direccion->getId_direccion_tipo_zona());
$tipozona = $sqltipozona->getDireccionTipoZonaByID($tipozona);
$tipocalle= new DireccionTipoCalle();
$tipocalle->setId_direccion_tipo_calle($direccion->getId_direccion_tipo_calle());
$tipocalle = $sqltipocalle->getDireccionTipoCalleByID($tipocalle);
if($direccion->getId_direccion_tipo_ubicacion_edificio()!=null){
$direccionUbicacionEdificio = new DireccionUbicacionEdificio();
$direccionUbicacionEdificio->setId_direccion_ubicacion_edificio($direccion->getId_direccion_tipo_ubicacion_edificio());
$direccionUbicacionEdificio = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificio);
$direccionUbicacionEdificion=$direccionUbicacionEdificio->getDescripcion();
}
else{
$direccionUbicacionEdificion='';
}
//aca verificamos si es una persona o es un representante legal
$rrll = new Persona();
$tipodocr= new TipoDocumentoIdentidad();
$expedidor = new Departamento();
$direccionr = new Direccion();
$municipior= new Municipio();
$departamentor = new Departamento();
$tipozonar= new DireccionTipoZona();
$tipocaller= new DireccionTipoCalle();
$direccionUbicacionEdificior = new DireccionUbicacionEdificio();
$paisr = new Pais();
$direccionUbicacionEdificionr='';
$rrll->setId_persona($empresaImportador->getId_representante_legal());
$rrll=$sqlPersona->getDatosPersonaPorId($rrll);
$tipodocr->setId_tipo_documentoidentidad($rrll->getId_tipo_documento());
$tipodocr = $sqlTipodoc->getBuscarDescripcionPorId($tipodocr);
$expedidor->setId_departamento($rrll->getExpedido());
$expedidor = $sqldepartamento->getBuscarDepartamentoPorId($expedidor);
if ((!is_numeric($rrll->getDireccion())) ) { }
else{
    $direccionr->setId_direccion($rrll->getDireccion());
    $direccionr = $sqldireccion->getDireccionByID($direccionr);    
    $municipior->setId_municipio($direccionr->getId_municipio());
    $municipior = $sqlmunicipio->getMunicipioPorID($municipior);   
    $departamentor->setId_departamento($direccionr->getId_departamento());
    $departamentor = $sqldepartamento->getBuscarDepartamentoPorId($departamentor);
    $tipozonar->setId_direccion_tipo_zona($direccionr->getId_direccion_tipo_zona());
    $tipozonar = $sqltipozona->getDireccionTipoZonaByID($tipozonar);   
    $tipocaller->setId_direccion_tipo_calle($direccionr->getId_direccion_tipo_calle());
    $tipocaller = $sqltipocalle->getDireccionTipoCalleByID($tipocaller);
    $direccionUbicacionEdificionr='';
    if($direccionr->getId_direccion_tipo_ubicacion_edificio()!=''){
        $direccionUbicacionEdificior->setId_direccion_ubicacion_edificio($direccionr->getId_direccion_tipo_ubicacion_edificio());
        $direccionUbicacionEdificior = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificior);
        $direccionUbicacionEdificionr=$direccionUbicacionEdificior->getDescripcion();
    }
    else{
        $direccionUbicacionEdificionr='';
    }
}
$paisr->setId_pais($rrll->getId_pais_origen());
$paisr = $sqlPais->getBuscarDescripcionPorId($paisr);


// datos del apoderado
$apoderado = new Persona();
$expedidoa = new Departamento();
$tipodoca= new TipoDocumentoIdentidad();
$expedidoa = new Departamento();
$direcciona = new Direccion();
$municipioa= new Municipio();
$departamentoa = new Departamento();
$tipozonaa= new DireccionTipoZona();
$tipocallea= new DireccionTipoCalle();
$direccionUbicacionEdificiona ='';
$paisa = new Pais();
$direccionUbicacionEdificioa = new DireccionUbicacionEdificio();


if($empresaImportador->getId_apoderado()!=''){
$apoderado->setId_persona($empresaImportador->getId_apoderado());
$apoderado=$sqlPersona->getDatosPersonaPorId($apoderado);
$tipodoca->setId_tipo_documentoidentidad($apoderado->getId_tipo_documento());
$tipodoca = $sqlTipodoc->getBuscarDescripcionPorId($tipodocr);
$expedidoa->setId_departamento($apoderado->getExpedido());
$expedidoa = $sqldepartamento->getBuscarDepartamentoPorId($expedidoa);
if (!is_numeric($apoderado->getDireccion())) { }
else{
    $direcciona->setId_direccion($apoderado->getDireccion());
    $direcciona = $sqldireccion->getDireccionByID($direcciona);
    $municipioa->setId_municipio($direcciona->getId_municipio());
    $municipioa = $sqlmunicipio->getMunicipioPorID($municipioa);
    $departamentoa->setId_departamento($direcciona->getId_departamento());
    $departamentoa = $sqldepartamento->getBuscarDepartamentoPorId($departamentoa);
    $tipozonaa->setId_direccion_tipo_zona($direcciona->getId_direccion_tipo_zona());
    $tipozonaa = $sqltipozona->getDireccionTipoZonaByID($tipozonaa);
    $tipocallea->setId_direccion_tipo_calle($direcciona->getId_direccion_tipo_calle());
    $tipocallea = $sqltipocalle->getDireccionTipoCalleByID($tipocallea);
    if($direcciona->getId_direccion_tipo_ubicacion_edificio()!=''){
    $direccionUbicacionEdificioa->setId_direccion_ubicacion_edificio($direcciona->getId_direccion_tipo_ubicacion_edificio());
    $direccionUbicacionEdificioa = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificioa);
    $direccionUbicacionEdificiona=$direccionUbicacionEdificioa->getDescripcion();
    }else{
    $direccionUbicacionEdificiona='';
    }
}    
$paisa->setId_pais($apoderado->getId_pais_origen());
$paisa = $sqlPais->getBuscarDescripcionPorId($paisa);
}

//------------para el rubro de exportaciones---------------------------

////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------------

class PDF extends FPDF
{	
    
    function Header()
    {	
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

    function SetDash($black=false, $white=false)
    {
        if($black and $white)
            $s=sprintf('[%.3f %.3f] 0 d', $black*$this->k, $white*$this->k);
        else
            $s='[] 0 d';
        $this->_out($s);
    }
}


$pdf = new PDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetMargins(8,10,8);
$pdf->SetFillColor(211,211,211);
$pdf->RoundedRect(8,5, 200, 17, 2, '20', 'F');
$pdf->RoundedRect(8,5, 200, 265, 2, '1234', 'D');
$pdf->SetFont('Arial','B',12);
$pdf->Ln(1);
$pdf->MultiCell(0,3,utf8_decode('FORMULARIO DE REGISTRO ÚNICO DE IMPORTADORES'),'B','C');
$pdf->Ln(1);




$pdf->RoundedRect(8,88, 200, 8, 2, '', 'F');
$pdf->setXY(10, 11);
$pdf->SetFillColor(211,211,210);
$pdf->SetFont('Arial','B',9);
$pdf->Ln(3);
$pdf->MultiCell(0,8,'DATOS DE LA EMPRESA',1,'B');
$pdf->Ln(3);
//Fila 1
$pdf->SetXY(9, 25);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Razón Social'),0,0,'L'); 
$pdf->SetXY(35, 25);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($empresaImportador->getRazon_social()),0,0,'L'); 
//Fila 2
$pdf->SetXY(9, 30);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Registro de Operador (Aduana):'),0,0,'L'); 
$pdf->SetXY(45, 30);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($empresaImportador->getPadron_importador()),0,0,'L'); 
$pdf->SetXY(75, 30);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nº de Identificación Tributaria'),0,0,'L'); 
$pdf->SetXY(110, 30);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($empresaImportador->getNit()),0,0,'L'); 
$pdf->SetXY(135, 30);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nº Testimonio de Constitución'),0,0,'L'); 
$pdf->SetXY(170, 30);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($empresaImportador->getTestimonio_constitucion()),0,0,'L'); 

//Fila 3
$pdf->SetXY(9, 35);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nº Patente Municipal'),0,0,'L'); 
$pdf->SetXY(45, 35);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($empresaImportador->getPatente_municipal()),0,0,'L'); 
$pdf->SetXY(75, 35);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nº Matrícula de Comercio'),0,0,'L'); 
$pdf->SetXY(110, 35);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($empresaImportador->getMatricula_fundempresa()),0,0,'L'); 
$pdf->SetXY(135, 35);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Fecha Vencimiento Matrícula de Comercio'),0,0,'L'); 
$pdf->SetXY(185, 35);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($empresaImportador->getVencimiento_fundempresa()),0,0,'L'); 
//Fila 4
$pdf->SetXY(9, 40);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Empresa Unipersonal'),0,0,'L'); 
$pdf->SetXY(45, 40);
$pdf->SetFont('Arial','I',6);
if($empresaImportador->getUnipersonal()){
$pdf->Cell(45,6,utf8_decode('SI'),0,0,'L'); 
}else{
$pdf->Cell(45,6,utf8_decode('NO'),0,0,'L');   
}
// TITULO
$pdf->RoundedRect(8,48, 200, 8, 2, '', 'F');
$pdf->setXY(10, 45);
$pdf->SetFont('Arial','B',9);
$pdf->Ln(3);
$pdf->MultiCell(0,8,utf8_decode('LOCALIZACIÓN DE LA EMPRESA'),1,'B');
$pdf->Ln(3);
//Fila 1
$pdf->SetXY(9, 60);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Calle/Av./Plaza/Otro'),0,0,'L'); 
$pdf->SetXY(30, 60);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($tipocalle->getDescripcion()),0,0,'L'); 
$pdf->SetXY(50, 60);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nombre Calle/Av./Plaza/Otro'),0,0,'L'); 
$pdf->SetXY(80, 60);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccion->getNombre_direccion_tipo_calle()),0,0,'L'); 
$pdf->SetXY(145, 60);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Núm. de Domicilio'),0,0,'L');
$pdf->SetXY(170, 60);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccion->getNumero_domicilio()),0,0,'L');
//Fila 2
$pdf->SetXY(9, 65);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nombre del Edificio'),0,0,'L'); 
$pdf->SetXY(30, 65);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccion->getNombre_edificio()),0,0,'L'); 
$pdf->SetXY(60, 65);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Piso'),0,0,'L'); 
$pdf->SetXY(70, 65);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccion->getPiso()),0,0,'L'); 
$pdf->SetXY(95, 65);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Dpto/Oficina/Local'),0,0,'L');
$pdf->SetXY(120, 65);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccionUbicacionEdificion),0,0,'L');
$pdf->SetXY(145, 65);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Núm. Dpto/Oficina/Local'),0,0,'L');
$pdf->SetXY(180, 65);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccion->getNumero_dpto_oficina()),0,0,'L');
//Fila 3
$pdf->SetXY(9, 70);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Zona/Barrio/Otro'),0,0,'L'); 
$pdf->SetXY(30, 70);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($tipozona->getDescripcion()),0,0,'L'); 
$pdf->SetXY(50, 70);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nombre Zona/Barrio/Otro'),0,0,'L'); 
$pdf->SetXY(80, 70);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccion->getNombre_zona_barrio()),0,0,'L'); 
$pdf->SetXY(145, 70);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Departamento'),0,0,'L');
$pdf->SetXY(170, 70);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($departamento->getNombre()),0,0,'L');
//Fila 4
$pdf->SetXY(9, 75);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Municipio'),0,0,'L'); 
$pdf->SetXY(30, 75);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($municipio->getDescripcion()),0,0,'L'); 
$pdf->SetXY(50, 75);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Teléfono Fijo'),0,0,'L'); 
$pdf->SetXY(70, 75);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccion->getTelefono_fijo()),0,0,'L'); 
$pdf->SetXY(95, 75);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Teléfono Celular'),0,0,'L');
$pdf->SetXY(120, 75);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccion->getTelefono_celular()),0,0,'L');
$pdf->SetXY(145, 75);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Teléfono Fax'),0,0,'L');
$pdf->SetXY(170, 75);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccion->getTelefono_fax()),0,0,'L');
//Fila 5
$pdf->SetXY(9, 80);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Dirección Descriptiva'),0,0,'L'); 
$pdf->SetXY(50, 80);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccion->getDireccion_descriptiva()),0,0,'L'); 
// TITULO
$pdf->RoundedRect(8,88, 200, 8, 2, '', 'F');
$pdf->setXY(10, 85);
$pdf->SetFont('Arial','B',9);
$pdf->Ln(3);
$pdf->MultiCell(0,8,utf8_decode('INFORMACIÓN DEL PROPIETARIO O REPRESENTANTE LEGAL'),1,'B');
$pdf->Ln(3);
//Fila 1
$pdf->SetXY(9, 100);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nombres'),0,0,'L'); 
$pdf->SetXY(25, 100);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($rrll->getNombres()),0,0,'L'); 
$pdf->SetXY(75, 100);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Primer Apellido'),0,0,'L'); 
$pdf->SetXY(100, 100);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($rrll->getPaterno()),0,0,'L'); 
$pdf->SetXY(135, 100);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Segundo Apellido'),0,0,'L'); 
$pdf->SetXY(160, 100);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($rrll->getMaterno()),0,0,'L'); 
//Fila 2
$pdf->SetXY(9, 105);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nacionalidad'),0,0,'L'); 
$pdf->SetXY(30, 105);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($paisr->getNombre()),0,0,'L'); 
$pdf->SetXY(50, 105);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Tipo Documento de Identidad'),0,0,'L'); 
$pdf->SetXY(85, 105);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($tipodocr->getDescripcion()),0,0,'L'); 
$pdf->SetXY(110, 105);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nº Documento de Identidad'),0,0,'L');
$pdf->SetXY(140, 105);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($rrll->getNumero_documento()),0,0,'L');
$pdf->SetXY(160, 105);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Expedido'),0,0,'L');
$pdf->SetXY(175, 105);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($expedidor->getSigla()),0,0,'L');
//Fila 3
$pdf->SetXY(9, 110);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nº Testimonio o Poder'),0,0,'L'); 
$pdf->SetXY(35, 110);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($empresaImportador->getTestimonio_poder_representante()),0,0,'L'); 
$pdf->SetXY(55, 110);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Fecha de Vencimiento Carnet de Identidad'),0,0,'L'); 
$pdf->SetXY(100, 110);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($rrll->getVencimiento_documento()),0,0,'L'); 
$pdf->SetXY(115, 110);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Correo Electrónico del Rep. Legal'),0,0,'L'); 
$pdf->SetXY(155, 110);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($rrll->getEmail()),0,0,'L'); 
$pdf->SetXY(9, 115);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(45,6,utf8_decode('Dirección del Propietario o Representante Legal'),0,0,'L'); 
//Fila 1
$pdf->SetXY(9, 120);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Calle/Av./Plaza/Otro'),0,0,'L'); 
$pdf->SetXY(30, 120);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($tipocaller->getDescripcion()),0,0,'L'); 
$pdf->SetXY(50, 120);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nombre Calle/Av./Plaza/Otro'),0,0,'L'); 
$pdf->SetXY(80, 120);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccionr->getNombre_direccion_tipo_calle()),0,0,'L'); 
$pdf->SetXY(145, 120);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Núm. de Domicilio'),0,0,'L');
$pdf->SetXY(170, 120);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccionr->getNumero_domicilio()),0,0,'L');
//Fila 2
$pdf->SetXY(9, 125);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nombre del Edificio'),0,0,'L'); 
$pdf->SetXY(30, 125);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccionr->getNombre_edificio()),0,0,'L'); 
$pdf->SetXY(60, 125);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Piso'),0,0,'L'); 
$pdf->SetXY(70, 125);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccionr->getPiso()),0,0,'L'); 
$pdf->SetXY(95, 125);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Dpto/Oficina/Local'),0,0,'L');
$pdf->SetXY(120, 125);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccionUbicacionEdificionr),0,0,'L');
$pdf->SetXY(145, 125);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Núm. Dpto/Oficina/Local'),0,0,'L');
$pdf->SetXY(180, 125);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccionr->getNumero_dpto_oficina()),0,0,'L');
//Fila 3
$pdf->SetXY(9, 130);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Zona/Barrio/Otro'),0,0,'L'); 
$pdf->SetXY(30, 130);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($tipozonar->getDescripcion()),0,0,'L'); 
$pdf->SetXY(50, 130);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nombre Zona/Barrio/Otro'),0,0,'L'); 
$pdf->SetXY(80, 130);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccionr->getNombre_zona_barrio()),0,0,'L'); 
$pdf->SetXY(145, 130);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Departamento'),0,0,'L');
$pdf->SetXY(170, 130);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($departamentor->getNombre()),0,0,'L');
//Fila 4
$pdf->SetXY(9, 135);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Municipio'),0,0,'L'); 
$pdf->SetXY(30, 135);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($municipior->getDescripcion()),0,0,'L'); 
$pdf->SetXY(50, 135);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Teléfono Fijo'),0,0,'L'); 
$pdf->SetXY(70, 135);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccionr->getTelefono_fijo()),0,0,'L'); 
$pdf->SetXY(95, 135);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Teléfono Celular'),0,0,'L');
$pdf->SetXY(120, 135);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccionr->getTelefono_celular()),0,0,'L');
$pdf->SetXY(145, 135);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Teléfono Fax'),0,0,'L');
$pdf->SetXY(170, 135);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccionr->getTelefono_fax()),0,0,'L');
//Fila 5
$pdf->SetXY(9, 140);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Dirección Descriptiva'),0,0,'L'); 
$pdf->SetXY(50, 140);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccionr->getDireccion_descriptiva()),0,0,'L'); 

$pdf->RoundedRect(8,148, 200, 8, 2, '', 'F');
$pdf->setXY(10, 145);
$pdf->SetFont('Arial','B',9);
$pdf->Ln(3);
$pdf->MultiCell(0,8,'DATOS DEL APODERADO',1,'B');
$pdf->Ln(3);

//Fila 1
$pdf->SetXY(9, 160);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nombres'),0,0,'L'); 
$pdf->SetXY(25, 160);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($apoderado->getNombres()),0,0,'L'); 
$pdf->SetXY(75, 160);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Primer Apellido'),0,0,'L'); 
$pdf->SetXY(100, 160);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($apoderado->getPaterno()),0,0,'L'); 
$pdf->SetXY(135, 160);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Segundo Apellido'),0,0,'L'); 
$pdf->SetXY(160, 160);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($apoderado->getMaterno()),0,0,'L'); 
//Fila 2
$pdf->SetXY(9, 165);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nacionalidad'),0,0,'L'); 
$pdf->SetXY(30, 165);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($paisa->getNombre()),0,0,'L'); 
$pdf->SetXY(50, 165);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Tipo Documento de Identidad'),0,0,'L'); 
$pdf->SetXY(85, 165);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($tipodoca->getDescripcion()),0,0,'L'); 
$pdf->SetXY(110, 165);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nº Documento de Identidad'),0,0,'L');
$pdf->SetXY(140, 165);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($apoderado->getNumero_documento()),0,0,'L');
$pdf->SetXY(160, 165);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Expedido'),0,0,'L');
$pdf->SetXY(175, 165);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($expedidoa->getSigla()),0,0,'L');
//Fila 3
$pdf->SetXY(9, 170);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nº Testimonio o Poder'),0,0,'L'); 
$pdf->SetXY(35, 170);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($empresaImportador->getTestimonio_poder_apoderado()),0,0,'L'); 
$pdf->SetXY(55, 170);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Fecha de Vencimiento Carnet de Identidad'),0,0,'L'); 
$pdf->SetXY(100, 170);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($apoderado->getVencimiento_documento()),0,0,'L'); 
$pdf->SetXY(115, 170);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Correo Electrónico del Apoderado'),0,0,'L'); 
$pdf->SetXY(155, 170);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($apoderado->getEmail()),0,0,'L'); 
//Fila 4
$pdf->SetXY(9, 175);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Fecha de Vencimiento del testimonio o poder'),0,0,'L'); 
$pdf->SetXY(60, 175);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($empresaImportador->getVencimiento_poder_apoderado()),0,0,'L'); 
// tituloooooo
$pdf->SetXY(9, 180);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(45,6,utf8_decode('Dirección del Apoderado'),0,0,'L'); 



//Fila 1
$pdf->SetXY(9, 185);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Calle/Av./Plaza/Otro'),0,0,'L'); 
$pdf->SetXY(30, 185);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($tipocallea->getDescripcion()),0,0,'L'); 
$pdf->SetXY(50, 185);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nombre Calle/Av./Plaza/Otro'),0,0,'L'); 
$pdf->SetXY(80, 185);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direcciona->getNombre_direccion_tipo_calle()),0,0,'L'); 
$pdf->SetXY(145, 185);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Núm. de Domicilio'),0,0,'L');
$pdf->SetXY(170, 185);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direcciona->getNumero_domicilio()),0,0,'L');
//Fila 2
$pdf->SetXY(9, 190);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nombre del Edificio'),0,0,'L'); 
$pdf->SetXY(30, 190);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direcciona->getNombre_edificio()),0,0,'L'); 
$pdf->SetXY(60, 190);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Piso'),0,0,'L'); 
$pdf->SetXY(70, 190);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direcciona->getPiso()),0,0,'L'); 
$pdf->SetXY(95, 190);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Dpto/Oficina/Local'),0,0,'L');
$pdf->SetXY(120, 190);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direccionUbicacionEdificioa->getDescripcion()),0,0,'L');
$pdf->SetXY(145, 190);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Núm. Dpto/Oficina/Local'),0,0,'L');
$pdf->SetXY(180, 190);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direcciona->getNumero_dpto_oficina()),0,0,'L');
//Fila 3
$pdf->SetXY(9, 195);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Zona/Barrio/Otro'),0,0,'L'); 
$pdf->SetXY(30, 195);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($tipozonaa->getDescripcion()),0,0,'L'); 
$pdf->SetXY(50, 195);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Nombre Zona/Barrio/Otro'),0,0,'L'); 
$pdf->SetXY(80, 195);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direcciona->getNombre_zona_barrio()),0,0,'L'); 
$pdf->SetXY(145, 195);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Departamento'),0,0,'L');
$pdf->SetXY(170, 195);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($departamentoa->getNombre()),0,0,'L');
//Fila 4
$pdf->SetXY(9, 200);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Municipio'),0,0,'L'); 
$pdf->SetXY(30, 200);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($municipioa->getDescripcion()),0,0,'L'); 
$pdf->SetXY(60, 200);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Teléfono Fijo'),0,0,'L'); 
$pdf->SetXY(80, 200);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direcciona->getTelefono_fijo()),0,0,'L'); 
$pdf->SetXY(105, 200);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Teléfono Celular'),0,0,'L');
$pdf->SetXY(130, 200);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direcciona->getTelefono_celular()),0,0,'L');
$pdf->SetXY(155, 200);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Teléfono Fax'),0,0,'L');
$pdf->SetXY(170, 200);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direcciona->getTelefono_fax()),0,0,'L');
//Fila 5
$pdf->SetXY(9, 205);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(45,6,utf8_decode('Dirección Descriptiva'),0,0,'L'); 
$pdf->SetXY(50, 205);
$pdf->SetFont('Arial','I',6);
$pdf->Cell(45,6,utf8_decode($direcciona->getDireccion_descriptiva()),0,0,'L'); 


$pdf->RoundedRect(8,213, 200, 8, 2, '', 'F');
$pdf->setXY(10, 210);
$pdf->SetFont('Arial','B',9);
$pdf->Ln(3);
$pdf->MultiCell(0,8,'FIRMA',1,'B');
$pdf->Ln(3);
$pdf->RoundedRect(70,223, 70, 30, 2, '1234', 'D');
$pdf->SetXY(100, 248);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(45,6,utf8_decode('Firma'),0,0,'L'); 
$pdf->SetXY(20, 253);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(45,6,utf8_decode('Aclaración de Firma'),0,0,'L'); 
$pdf->SetDash(1,1);
$pdf->Line(51,260,200,260);
$pdf->Output();
?>