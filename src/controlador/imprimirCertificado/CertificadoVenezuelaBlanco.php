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
        $this->Image(PATH_STYLES.DS.'img/pdf/certificado/certificado_mercosur.jpg',10,2,20,20);
        $this->SetFont('Times','B',10);
        $this->Ln(2);
        $this->Cell(0,4,utf8_decode('CERTIFICADO DE ORIGEN'),0,0,'C');
        $this->Ln(7);
        $this->Cell(130,4,utf8_decode(''),0,0,'C');
        $this->Cell(70,4,utf8_decode('N° del Certificado:      '),0,0,'L');
        $this->Ln(10);
        $this->SetFont('Times','B',9.5);
        $this->Cell(0,4,utf8_decode('ACUERDO DE CCOMERCIO DE LOS PUEBLOS PARA LA COMPLEMENTARIEDAD ECONÓMICA, PRODUCTIVA'),0,0,'C');
        $this->Ln();
        $this->Cell(0,4,utf8_decode('ENTRE EL GOBIERNO DE LA REPÚBLICA BOLIVARIANA DE VENEZUELA Y EL ESTADO PLURINACIONAL DE BOLIVIA'),0,0,'C');
        $this->Ln(5);
        $this->SetFont('Times','B',9);
        $this->Cell(50,4,utf8_decode('(1) PAIS EXPORTADOR:'),0,0,'L');
        $this->SetFont('Times','',9);
        $this->Cell(50,4,'',0,0,'L');
        $this->SetFont('Times','B',9);
        $this->Cell(50,4,utf8_decode('(2) PAIS IMPORTADOR:'),0,0,'L');
        $this->SetFont('Times','',9);
        $this->Cell(50,4,'',0,0,'L');
        $this->Ln(5);
        $this->SetFont('Times','B',8);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->MultiCell(14,3,utf8_decode('(3) No. de Orden'),1,'R',0);
        $this->SetXY($x+14,$y);
        $this->MultiCell(20,3,utf8_decode('(4) Código Arancelario'),1,'C',0);
        $this->SetXY($x+34,$y);
        $this->MultiCell(112,6,utf8_decode('(5) Descripción de las Mercancías'),1,'C',0);
        $this->SetXY($x+146,$y);
        $this->MultiCell(27,3,utf8_decode('  (6) Peso o     Cantidad'),1,'C',0);
        $this->SetXY($x+173,$y);
        $this->MultiCell(25,3,utf8_decode('  (7) Valor FOB    en (US$)'),1,'C',0);
        
        //Tabla de Mercaderias
        $this->SetXY(7,44);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 14, 52, 'D');
        $this->Rect($x, $y, 34, 52, 'D');
        $this->Rect($x, $y, 146, 52, 'D');
        $this->Rect($x, $y, 173, 52, 'D');
        $this->Rect($x, $y, 198, 52, 'D');
        $this->SetFont('Times','',8);
        
        //Declaración de Origen
        $this->SetFont('Times','B',9);
        $this->SetXY(7,97);
        $this->Cell(0,5,utf8_decode('(8) DECLARACIÓN DE ORIGEN'),0,0,'C',0);
        $this->Ln();
        $this->SetFont('Times','',8.5);
        $this->MultiCell(0,5,utf8_decode('          DECLARAMOS que las mercancías indicadas en el presente formulario, correspondientes a la Factura Comercial N°              '.
                ' de Fecha                cumplen con lo establecido en las Normas de Origen del presente Acuerdo de Complementariedad Económica y Productiva de conformidad con el siguiente desglose'),0,'J',0);
    }
    
    function Footer()
    {
        // Posición: a 15 cm del final
        $this->SetY(-152);

        //Primera Fila
        $this->SetFont('Times','B',8);
        $this->Cell(120,5,utf8_decode('(11) EXPORTADOR O PRODUCTOR'),1,0,'L',0);
        $this->Cell(78,5,utf8_decode('(12) Sello y Firma del Productor o Exportador'),1,0,'C',0);
        $this->Ln();
        //Primera fila
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 120, 8, 'D');
        $this->Rect($x+120, $y, 78, 50, 'D');
        $this->SetFont('Times','',8);
        $this->Cell(25,4,utf8_decode('11.1 Razón Social:'),0,0,'L',0);
        $this->MultiCell(95,8,'',0,'J',0);
        //Segunda fila
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 120, 8, 'D');
        $this->Cell(25,4,utf8_decode('11.2 Dirección :'),0,0,'L',0);
        $this->MultiCell(95,8,'',0,'J',0);
        //Tercera Fila
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 120, 4, 'D');
        $this->Cell(25,4,utf8_decode('11.3 Fecha :'),0,0,'L',0);
        $this->Cell(25,4,'',0,0,'L',0);
        $this->Ln();
        //Cuarta Fila
        $this->SetFont('Times','B',8);
        $this->Cell(120,4,utf8_decode('(13) IMPORTADOR'),1,0,'L',0);
        $this->Ln();
        //Quinta Fila
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 120, 8, 'D');
        $this->SetFont('Times','',8);
        $this->Cell(25,4,utf8_decode('13.1 Razón Social:'),0,0,'L',0);
        $this->MultiCell(95,8,'',0,'J',0);
        //Sexta fila
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 120, 8, 'D');
        $this->Cell(25,4,utf8_decode('13.2 Dirección :'),0,0,'L',0);
        $this->MultiCell(95,8,'',0,'J',0);
        //Septima fila
        $this->Cell(120,5,utf8_decode('(14) Medio de Transporte:  '),1,0,'L',0);
        $this->Ln();
        //Octava fila
        $this->Cell(120,5,utf8_decode('(15) Puerto o Lugar de Embraque:  '),1,0,'L',0);
        $this->Ln();
        //Novena fila
        $this->SetFont('Times','B',8);
        $this->Cell(198,5,utf8_decode('(16) OBSERVACIONES'),1,0,'L',0);
        $this->Ln();
        
        //Décima fila OBSERVACIONES
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 198, 16, 'D');
        $this->SetFont('Times','',8);
        $this->MultiCell(198,4,'',0,'J',0);
        
        //Undécima fila
        $this->SetXY(7,222);
        $this->SetFont('Times','B',8.5);
        $this->Cell(90,5,utf8_decode('(17) CERTIFICACIÓN DE ORIGEN'),1,0,'L',0);
        $this->Cell(108,5,utf8_decode('(18) Sello y firma del funcionario habilitado y sello de la Autoridad Competente:'),1,0,'L',0);
        $this->Ln();
        //Duodécima fila
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 90, 30, 'D');
        $this->Rect($x, $y+30, 90, 20, 'D');
        $this->Rect($x+90, $y, 108, 50, 'D');
        $this->SetFont('Times','',9);
        $this->Cell(90,5,utf8_decode('Certifico la veracidad de la presente Declaración, en la ciudad de:'),0,0,'L',0);
        $this->Ln(12);
        $this->SetFont('Times','',12);
        $this->Cell(90,5,utf8_decode('             - BOLIVIA'),0,0,'C',0);
        $this->Ln(12);
        $this->SetFont('Times','B',9);
        $this->Cell(90,5,utf8_decode(' En fecha:   '),0,0,'L',0);
        $this->Ln(6);
        $this->SetFont('Times','B',8);
        $this->Cell(90,5,utf8_decode('(19) Nombre de la Autoridad Competente'),0,0,'L',0);
        $this->Ln(6);
        $this->Cell(15,5,'',0,0,'L',0);
        $this->MultiCell(60,5,utf8_decode('SERVICIO NACIONAL DE VERIFICACIÓN DE EXPORTACIONES'),0,'C',0);
        
        //Pie de Página
        $this->Ln();
        $this->SetFont('Times','B',7);
        $this->Cell(15,3,utf8_decode('Referencias'),0,0,'L',0);
        $this->SetFont('Times','',7);
        $this->Cell(10,3,utf8_decode('(3)'),0,0,'L',0);
        $this->MultiCell(173,3,utf8_decode('Esta columna indica el orden en que se individualizan las mercancías comprendidas en el presente certificado. En caso de ser insuficientes, se continuará la individualización de las mercancías en ejemplares suplementarios de este certificado, numerados correlativamente.'),0,'J',0);
        $this->Cell(15,3,utf8_decode(''),0,0,'L',0);
        $this->Cell(10,3,utf8_decode('(10)'),0,0,'L',0);
        $this->Cell(173,3,utf8_decode('En esta columna se identificará la Norma de Origen que cumple cada mercancía individualizada por su número de orden.'),0,0,'L',0);
        $this->Ln();
        $this->SetFont('Times','B',7);
        $this->Cell(15,3,utf8_decode('Notas'),0,0,'L',0);
        $this->SetFont('Times','',7);
        $this->Cell(10,3,utf8_decode('(a)'),0,0,'L',0);
        $this->Cell(173,3,utf8_decode('El formulario no podrá presentar raspaduras, tachaduras o enmiendas.'),0,0,'L',0);
        $this->Ln();
        $this->Cell(15,3,'',0,0,'L',0);
        $this->Cell(10,3,utf8_decode('(b)'),0,0,'L',0);
        $this->Cell(173,3,utf8_decode('El formulario sólo será válido si todos sus campos, excepto el de "Observaciones", estuvieran debidamente llenos.'),0,0,'L',0);
        
    }
    
    //Funcion para construir las tablas de las normas de origen en varias hojas
    function construir_tabla_normas_origen(){
        $this->SetFont('Times','B',8);
        $this->SetXY(7,114);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 14, 30, 'D');
        $this->Rect($x, $y, 198, 30, 'D');
        // NORMAS DE ORIGEN
        $this->MultiCell(14,4,utf8_decode('(9) No. de Orden'),1,'C',0);
        $this->SetXY($x+14,$y);
        $this->Cell(184,8,utf8_decode('(10). Normas'),1,0,'C',0);
        $this->SetFont('Times','',8);
        //La sgte hoja empezar las mercaderias desde aqui
        $this->SetXY(7,44);
    }
}

//Instanciation of inherited class
$pdf=new PDF('P','mm','A4');

$pdf->AliasNbPages();
$pdf->SetMargins(7,5,5);
$pdf->SetAutoPageBreak(true,5);
$pdf->AddPage();

//************************** INICIO DEL ARMADO DEL PDF *************************
//Para la primera vez se debe construir la tabla
$pdf->construir_tabla_normas_origen();

$pdf->Output();
$db->Close();
$pdf->close();

?>