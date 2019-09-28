<?php
session_start();
/* Controlar el acceso de los usuarios*/
define('_ACCESO','1');

//******************************** Datos del Certificado de Origen *********************************
include_once('../../../config/Config.php');
//include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
require_once(PATH_LIB . DS . 'fpdf'. DS .'fpdf.php');

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
$pdf->Cell(45,5,'',0,0,'L',0);
$pdf->Ln(7);
$pdf->SetFont('Times','',9);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(95,5,'',0,'L',0);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(95,5,'',0,'L',0);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(95,5,'',0,'L',0);
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
$pdf->MultiCell(95,5,'',0,'L',0);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(95,5,'',0,'L',0);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(95,5,'',0,'L',0);
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
$pdf->MultiCell(95,5,'',0,'L',0);
$pdf->SetXY($x+95,$y);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(93,5,'',0,'J',0);
$pdf->Cell(5,5,'',0,0,'L',0);
$pdf->MultiCell(95,5,'',0,'L',0);

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

// QUINTA FILA
$pdf->SetXY(7,200);
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->Rect($x, $y, 198, 18, 'D');

$pdf->MultiCell(198,5,utf8_decode('OBSERVACIONES: '),0,'J',0);

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
$pdf->Cell(95,4,'',0,0,'C',0);
$pdf->Ln();
$pdf->SetFont('Times','',10);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(95,4,utf8_decode('PAÍS DE DESTINO'),0,0,'C',0);
$pdf->Ln();
$pdf->SetFont('Times','',9);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(95,4,utf8_decode('COUNTRY OF DESTINATION'),0,0,'C',0);
$pdf->Ln(9);

$pdf->SetFont('Times','',7);
$pdf->Cell(5,4,'',0,0,'L',0);
$pdf->Cell(95,4,'',0,0,'R',0);
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