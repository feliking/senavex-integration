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
        $this->Image(PATH_STYLES.DS.'img/pdf/certificado/certificado_mercosur.jpg',173,2,20,20);
        $this->SetFont('Times','B',10);
        $this->Ln();
        $this->Cell(110,4,utf8_decode('SERVICIO NACIONAL DE VERIFICACIÓN DE EXPORTACIONES'),0,0,'C');
        $this->Ln();
        $this->Cell(110,4,utf8_decode('"SENAVEX"'),0,0,'C');
        $this->Ln(8);
        $this->SetFont('Times','B',16);
        $this->Cell(0,4,utf8_decode('CERTIFICADO DE ORIGEN'),0,0,'C');
        $this->Ln(7);
        $this->SetFont('Times','B',11);
        $this->Cell(0,4,utf8_decode('ACUERDO DE COMPLEMENTACIÓN ECONÓMICA CELEBRADO ENTRE LOS GOBIERNOS'),0,0,'C');
        $this->Ln();
        $this->Cell(0,4,utf8_decode('DE LOS ESTADOS PARTES DEL MERCOSUR Y EL GOBIERNO DE LA REPÚBLICA DE BOLIVIA'),0,0,'C');
        $this->Ln();
        
        //Primera Fila
        $this->SetFont('Times','B',8);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 110, 14, 'D');
        $this->Cell(3,7,utf8_decode('1.'),0,0,'L',0);
        $this->Cell(40,7,utf8_decode('Productor Final o Exportador'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(67,7,'',0,0,'L',0);
        $this->Rect($x+110, $y, 90, 14, 'D');
        $this->Cell(2,7,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(35,7,utf8_decode('Identificación del Número'),0,0,'L',0);
        $this->Ln();
        $this->Cell(3,7,utf8_decode(''),0,0,'L',0);
        $this->Cell(40,4,utf8_decode('(Nombre, Dirección, País)'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(67,7,'',0,0,'L',0);
        $this->Cell(2,7,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(35,4,utf8_decode('(Número)'),0,0,'L',0);
        $this->SetFont('Times','B',12);
        $this->Cell(40,7,'',0,0,'C',0);
        $this->Ln();
        
        //Segunda Fila
        $this->SetFont('Times','B',8);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 110, 14, 'D');
        $this->Cell(3,7,utf8_decode('2.'),0,0,'L',0);
        $this->Cell(40,7,utf8_decode('Importador'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(67,7,'',0,0,'L',0);
        $this->Rect($x+110, $y, 90, 28, 'D');
        $this->Cell(2,7,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(35,7,utf8_decode('Nombre de la Entidad Emisota del Certificado'),0,0,'L',0);
        $this->Ln();
        $this->Cell(3,7,utf8_decode(''),0,0,'L',0);
        $this->Cell(40,4,utf8_decode('(Nombre, Dirección, País)'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(67,7,'',0,0,'L',0);
        $this->Cell(2,7,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(90,7,utf8_decode('SERVICIO NACIONAL DE VERIFICACIÓN DE EXPORTACIONES'),0,0,'C',0);
        $this->Ln();
        
        //Tercera Fila
        $this->SetFont('Times','B',8);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 110, 14, 'D');
        $this->Cell(3,7,utf8_decode('3.'),0,0,'L',0);
        $this->Cell(40,7,utf8_decode('Consignatario'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(67,7,'',0,0,'L',0);
        $this->Cell(2,7,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(15,7,utf8_decode('Dirección:'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(73,7,'',0,0,'L',0);
        $this->Ln();
        $this->SetFont('Times','B',8);
        $this->Cell(3,7,utf8_decode(''),0,0,'L',0);
        $this->Cell(40,4,utf8_decode('(Nombre, País)'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(67,7,'',0,0,'L',0);
        $this->Cell(2,7,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(15,7,utf8_decode('Ciudad:'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(30,7,'',0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(15,7,utf8_decode('País:'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(30,7,utf8_decode('BOLIVIA'),0,0,'L',0);
        $this->Ln();
        
        //Cuarta Fila
        $this->SetFont('Times','B',8);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 110, 10, 'D');
        $this->Cell(3,5,utf8_decode('4.'),0,0,'L',0);
        $this->Cell(107,5,utf8_decode('Puerto o Lugar de Embarque Previsto'),0,0,'L',0);
        $this->Rect($x+110, $y, 90, 10, 'D');
        $this->Cell(2,5,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(70,5,utf8_decode('5. País de Destino de las Mercaderías'),0,0,'L',0);
        $this->Ln();
        $this->Cell(3,5,utf8_decode(''),0,0,'L',0);
        $this->Cell(40,4,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(67,5,'',0,0,'L',0);
        $this->Cell(2,5,utf8_decode(''),0,0,'L',0);
        $this->Cell(10,5,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(70,5,'',0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Ln();
        
        //Quinta Fila
        $this->SetFont('Times','B',8);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 110, 10, 'D');
        $this->Cell(3,5,utf8_decode('6.'),0,0,'L',0);
        $this->Cell(107,5,utf8_decode('Medio de Transporte Previsto'),0,0,'L',0);
        $this->Rect($x+110, $y, 90, 10, 'D');
        $this->Cell(2,5,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(70,5,utf8_decode('7. Factura Comercial'),0,0,'L',0);
        $this->Ln();
        $this->Cell(3,5,utf8_decode(''),0,0,'L',0);
        $this->Cell(40,4,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(67,5,'',0,0,'L',0);
        $this->Cell(2,5,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        
        $this->Cell(15,5,utf8_decode('Número:'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(30,5,'',0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(15,5,utf8_decode('Fecha:'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(30,5,'',0,0,'L',0);
        $this->Ln();
        
        //Mercaderias

        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 16, 10, 'D');
        $this->Rect($x, $y, 37, 10, 'D');
        $this->Rect($x, $y, 147, 10, 'D');
        $this->Rect($x, $y, 174, 10, 'D');
        $this->Rect($x, $y, 200, 10, 'D');
        //$this->Rect($x, $y, 200, 10, 'D');
        $this->SetFont('Times','B',8);
        $this->Cell(2,4,'',0,0,'L',0);
        $this->Cell(12,4,utf8_decode('8. N° de'),0,0,'L',0);
        $this->Cell(4,4,'',0,0,'L',0);
        $this->Cell(18,4,utf8_decode('9. Codigos'),0,0,'L',0);
        $this->Cell(3,4,'',0,0,'L',0);
        $this->Cell(107,4,utf8_decode('10. Denominación de las Mercaderías'),0,0,'C',0);
        $this->Cell(3,4,'',0,0,'L',0);
        $this->Cell(24,4,utf8_decode('11. Peso Líquido'),0,0,'C',0);
        $this->Cell(3,4,'',0,0,'L',0);
        $this->Cell(20,4,utf8_decode('12. Valor FOB en'),0,0,'C',0);
        $this->Ln();
        $this->Cell(2,4,'',0,0,'L',0);
        $this->Cell(12,4,utf8_decode('Orden(A)'),0,0,'L',0);
        $this->Cell(4,4,'',0,0,'L',0);
        $this->Cell(18,4,utf8_decode('NALADISA'),0,0,'L',0);
        $this->Cell(3,4,'',0,0,'L',0);
        $this->Cell(107,4,utf8_decode('(B)'),0,0,'C',0);
        $this->Cell(3,4,'',0,0,'L',0);
        $this->Cell(24,4,utf8_decode('o Cantidad'),0,0,'C',0);
        $this->Cell(3,4,'',0,0,'L',0);
        $this->Cell(20,4,utf8_decode('Dólares($us)'),0,0,'C',0);
        $this->Ln(6);
        
    }
    
    function Footer()
    {
        // Posición: a 8.8 cm del final
        $this->SetY(-88);

        //$this->SetXY(7,209);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 200, 15, 'D');
        $this->SetFont('Times','B',8);
        $this->Cell(2,5,utf8_decode(''),0,0,'C',0);
        $this->Cell(198,5,utf8_decode('14. Observaciones'),0,0,'L',0);
        $this->Ln();
        $this->SetFont('Times','',7);
        $this->Cell(4,10,utf8_decode(''),0,0,'C',0);
        $this->MultiCell(194,5,'',0,'J',0);

        // Posición: a 7.3 cm del final
        $this->SetY(-73);
        $this->SetFont('Times','B',10);
        $this->Cell(200,6,utf8_decode('CERTIFICACIÓN DE ORIGEN'),1,0,'C');
        $this->Ln();
        $x=$this->GetX();
        $y=$this->GetY();
        $this->SetFont('Times','B',8);
        $this->Rect($x, $y, 98, 60, 'D');
        $this->Rect($x, $y, 200, 60, 'D');
        $this->Cell(8,6,utf8_decode('15.'),0,0,'R');
        $this->Cell(90,6,utf8_decode('Declaración del Producto Final o del Exportador'),0,0,'L');
        $this->Cell(8,6,utf8_decode('16.'),0,0,'R');
        $this->Cell(90,6,utf8_decode('Certificación de la Entidad Habilitada:'),0,0,'L');
        $this->Ln();
        $this->SetFont('Times','',8);
        $this->Cell(8,5,utf8_decode('-'),0,0,'R');
        $this->Cell(90,5,utf8_decode('Declaramos que las mercaderías mencionadas en el presente formulario'),0,0,'L');
        $this->Cell(8,5,utf8_decode('-'),0,0,'R');
        $this->Cell(90,5,utf8_decode('Certificamos la veracidad de la declaración que antecede de'),0,0,'L');
        $this->Ln();
        $this->Cell(8,5,utf8_decode(''),0,0,'R');
        $this->Cell(90,5,utf8_decode('fueron producidas en     BOLIVIA'),0,0,'L');
        $this->Cell(8,5,utf8_decode(''),0,0,'R');
        $this->Cell(90,5,utf8_decode('acuerdo a la legislación vigente'),0,0,'L');
        $this->Ln();
        $this->Cell(8,5,utf8_decode(''),0,0,'R');
        $this->Cell(90,5,utf8_decode('y están de acuerdo con las condiciones de origen establecidas en el'),0,0,'L');
        $this->Ln();
        $this->Cell(8,5,utf8_decode(''),0,0,'R');
        $this->Cell(90,5,utf8_decode('Acuerdo       ACE36'),0,0,'L');
        $this->Ln(14);
        $this->Cell(8,5,utf8_decode(''),0,0,'R');
        $this->SetFont('Times','B',9);
        $this->Cell(20,5,utf8_decode('FECHA'),0,0,'L');
        $this->SetFont('Times','',9);

        $this->Cell(70,5,'',0,0,'L');
        $this->Cell(8,5,utf8_decode(''),0,0,'R');
        $this->SetFont('Times','B',9);
        $this->Cell(20,5,utf8_decode('FECHA'),0,0,'L');
        $this->SetFont('Times','',9);

        $this->Cell(70,5,'',0,0,'L');
        $this->Ln(17);
        $this->SetFont('Times','B',9);
        $this->Cell(12,5,utf8_decode(''),0,0,'R');
        $this->Cell(84,5,utf8_decode('Sello y Firma'),0,0,'C');
        $this->Cell(8,5,utf8_decode(''),0,0,'R');
        $this->Cell(90,5,utf8_decode('Sello y Firma'),0,0,'C');
    }
    
    //Funcion para construir las tablas de las normas de origen en varias hojas
    function construir_tabla_normas_origen(){
        $this->SetFont('Times','B',8);
        $this->SetXY(7,179);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 16, 30, 'D');
        $this->Rect($x, $y, 200, 30, 'D');
        // NORMAS DE ORIGEN
        $this->MultiCell(16,4,utf8_decode('N° de Orden'),1,'C',0);
        $this->SetXY($x+16,$y);
        $this->Cell(184,8,utf8_decode('13. Normas de Origen'),1,0,'C',0);
        $this->SetFont('Times','',8);
    }
}

//Instanciation of inherited class
$pdf=new PDF('P','mm','A4');

$pdf->AliasNbPages();
$pdf->SetMargins(7,5,5);
$pdf->SetAutoPageBreak(true,0);
$pdf->AddPage();

//************************** INICIO DEL ARMADO DEL PDF *************************
//Para la primera vez se debe construir la tabla
$pdf->construir_tabla_normas_origen();
$pdf->SetXY(7,104);
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->Rect($x, $y, 16, 75, 'D');
$pdf->Rect($x, $y, 37, 75, 'D');
$pdf->Rect($x, $y, 147, 75, 'D');
$pdf->Rect($x, $y, 174, 75, 'D');
$pdf->Rect($x, $y, 200, 75, 'D');

$pdf->Output();
$db->Close();
$pdf->close();

?>