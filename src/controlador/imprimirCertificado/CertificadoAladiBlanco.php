<?php
session_start();
/* Controlar el acceso de los usuarios*/
define('_ACCESO','1');

//******************************** Datos del Certificado de Origen *********************************
include_once('../../../config/Config.php');
require_once(PATH_LIB . DS . 'fpdf'. DS .'fpdf.php');

//************* CLASE DEL CERTIFICADO PDF
class PDF extends FPDF
{	
    function Header()
    {	
        //Cell(width, height, text, border, position-next-cell, alignment);
        $this->Image(PATH_STYLES.DS.'img/pdf/ruex/logo_mdp.jpg',7,7,60,25);
        $this->SetFont('Times','B',10);
        $this->Ln(10);
        $this->Cell(150,4,'',0,0,'C');
        $this->Cell(40,4,utf8_decode('CERTIFICADO'),0,0,'C');
        $this->Ln();
        $this->SetFont('Times','B',14);
        $this->Cell(150,6,'',0,0,'C');
        $this->Cell(40,6,utf8_decode('N°:'),0,0,'C');
        $this->Ln(10);
        $this->SetFont('Times','B',12);
        $this->Cell(0,4,utf8_decode('CERTIFICADO DE ORIGEN'),0,0,'C');
        $this->Ln();
        $this->Cell(0,4,utf8_decode('ASOCIACIÓN LATINOAMERICANA DE INTEGRACIÓN'),0,0,'C');
        $this->Ln(11);
        $this->SetFont('Times','',11);
        $this->Cell(40,4,utf8_decode('PAÍS EXPORTADOR'),0,0,'L');
        $this->Cell(45,4,'',0,0,'C');
        $this->Cell(40,4,utf8_decode('PAÍS IMPORTADOR'),0,0,'L');
        $this->Cell(45,4,'',0,0,'C');
        $this->Ln(8);
        
        $this->SetFont('Times','',10);
        $x=$this->GetX();
        $y=$this->GetY();

        $this->Rect($x, $y, 20, 50, 'D');
        $this->Rect($x, $y, 55, 50, 'D');
        $this->Rect($x, $y, 180, 50, 'D');

        $this->MultiCell(20,5,utf8_decode('N° DE ORDEN (1)'),1,'C',0);
        $this->SetXY($x+20,$y);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->MultiCell(35,5,utf8_decode('CLASIFICACIÓN ARANCELARIA'),1,'C',0);
        $this->SetXY($x+35,$y);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->MultiCell(125,10,utf8_decode('DENOMINACIÓN DE LAS MERCADERÍAS'),1,'C',0);

        //Mercaderias
        $x=$this->GetX();
        $y=$this->GetY();
        $this->SetFont('Times','B',10);
        $this->SetXY(15,113);
        // DECLARACIÓN DE ORIGEN
        $this->Cell(0,5,utf8_decode('DECLARACIÓN DE ORIGEN'),0,0,'C',0);
        $this->SetFont('Times','',10);
        $this->Ln();
        $this->MultiCell(0,5,utf8_decode(' DECLARAMOS que las mercaderías indicadas en el presente formulario, correspondiente a la Factura Comercial '
                . 'N°       reconoce lo establecido en las normas de origen del Acuerdo (2)             de conformidad con el siguiente desglose:'),0,'J',0);
        
    }
    function Footer()
    {
        // Posición: a cms del final
        $this->SetY(-122);
        //$this->SetXY(15,175);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 180, 20, 'D');
        $this->SetFont('Times','',9);
        $this->Cell(180,5,utf8_decode('Declaro Bajo juramento, en cumplimiento de las normas de origen, que los datos consignados son fidedignos.'),0,0,'L',0);
        $this->Ln();
        $this->Cell(180,7,utf8_decode('Fecha: '),0,0,'L',0);
        $this->Ln();
        $this->Cell(180,7,utf8_decode('Razón Social, sello y firma del exportador o productor:'),0,0,'L',0);
        
        $mensaje='';
        //OBSERVACIONES
        $this->SetFont('Times','',10);
        $this->Ln(10);
        $this->MultiCell(180,5,utf8_decode('OBSERVACIONES: '),0,'J',0);

        $fecha_actual = date("d-m-Y");
        $this->SetXY(15,220);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 180, 45, 'D');
        $this->SetFont('Times','B',10);
        $this->Cell(180,7,utf8_decode('CERTIFICACIÓN DE ORIGEN'),0,0,'C',0);
        $this->Ln(10);
        $this->SetFont('Times','',9);
        $this->Cell(180,7,utf8_decode('  Certifico la veracidad de la presente declaración, que sello y firmo en la ciudad de '
                .'               - BOLIVIA  a los '),0,0,'J',0);
        $this->Ln(25);
        $this->Cell(110,7,'',0,0,'C',0);
        $this->Cell(70,7,utf8_decode('Nombre, Sello y firma Entidad Certificadora'),0,0,'C',0);
        $this->Ln(12);
        
        
        $this->SetFont('Times','B',8);
        $this->Cell(12,3,utf8_decode('NOTAS'),0,0,'L');
        $this->SetFont('Times','',8);
        $this->Cell(5,3,utf8_decode('(1)'),0,0,'L');
        $this->Cell(180,3,utf8_decode('Esta columna indica el orden en que se individualizan las mercaderías comprendidas enb el presente certificado.'),0,0,'L');
        $this->Ln();
        $this->Cell(12,3,utf8_decode(''),0,0,'L');
        $this->Cell(5,3,utf8_decode(''),0,0,'L');
        $this->Cell(180,3,utf8_decode('En caso de ser insuficiente los números de orden, se continuará la individualización de las mercaderías en ejemplares suplementarios de este'),0,0,'L');
        $this->Ln();
        $this->Cell(12,3,utf8_decode(''),0,0,'L');
        $this->Cell(5,3,utf8_decode(''),0,0,'L');
        $this->Cell(180,3,utf8_decode('certificado, numerados correlativamente.'),0,0,'L');
        $this->Ln(5);
        $this->Cell(12,3,utf8_decode(''),0,0,'L');
        $this->Cell(5,3,utf8_decode('(2)'),0,0,'L');
        $this->Cell(180,3,utf8_decode('Especificar si se trata de un Acuerdo de Alcance regional o de alcance parcial, indicando número de registro.'),0,0,'L');
        $this->Ln(5);
        $this->Cell(12,3,utf8_decode(''),0,0,'L');
        $this->Cell(5,3,utf8_decode('(3)'),0,0,'L');
        $this->Cell(180,3,utf8_decode('En esta columna se indicará la norma de origen con que cumple cada mercadería individualizada por su número de orden.'),0,0,'L');
        $this->Ln(5);
        $this->Cell(12,3,utf8_decode(''),0,0,'L');
        $this->Cell(5,3,utf8_decode(''),0,0,'L');
        $this->Cell(180,3,utf8_decode('El formulario no podrá presentar raspaduras, tachaduras o enmiendas.'),0,0,'L');
    }
    
    //Funcion para construir las tablas de las normas de origen en varias hojas
    function construir_tabla_normas_origen(){
        $this->SetXY(15,135);
        $this->SetFont('Times','B',10);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->MultiCell(20,5,utf8_decode('N° DE ORDEN (1)'),1,'C',0);
        $this->SetXY($x+20,$y);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->MultiCell(160,10,utf8_decode('NORMAS (3)'),1,'C',0);

        $this->SetFont('Times','',9);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 20, 30, 'D');
        $this->SetXY($x+35,$y);
        $this->Rect($x, $y, 180, 30, 'D');
        //La sgte hoja empezar las mercaderias desde aqui
        $this->SetXY(15,72);
    }
}

//Instanciation of inherited class
$pdf=new PDF('P','mm','A4');

$pdf->AliasNbPages();
$pdf->SetMargins(15,15,15);
$pdf->SetAutoPageBreak(true,5);
$pdf->AddPage();

//************************** INICIO DEL ARMADO DEL PDF *************************
$pdf->construir_tabla_normas_origen();

$pdf->Output();
$db->Close();
$pdf->close();

?>