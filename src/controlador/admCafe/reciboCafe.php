<?php

//defined('_ACCESO') or die('Acceso restringido');
require_once(PATH_BASE . DS . 'lib' . DS . 'fpdf' . DS . 'tfpdf.php');

class reciboPDF extends tFPDF
{
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

    function Cabecera($nro_recibo)
    {
        $this->SetFont('Times','',12);
       
        $this->SetFillColor(176,176,176);
        $this->RoundedRect(10, 100, 190, 8, 5, '12', 'DF');

        $this->SetFillColor(255);
        $this->RoundedRect(10, 108, 190, 105, 5, '', 'DF');
        $this->RoundedRect(10, 210, 190, 10, 5, '34', 'DF');
        $this->RoundedRect(130, 40, 65, 15, 5, '1234', 'DF');

        $this->subHeader_institucion();
        $this->subHeader_Factura($nro_recibo);
        $this->subHeader_Titulo();
    }
    function subHeader_institucion()
    {
        $this->Image("escudo_bolivia.jpg" , 23 ,6, 40 , 22,'JPG');
        $this->SetTextColor(80);
        $this->Ln(17);
        $this->SetFont('Arial', '', 7);
        $this->Cell(65,4,'Estado Plurinacional',0,0,'C');
        $this->Ln(3);
        $this->Cell(65,4,'de Bolivia',0,0,'C');
        $this->Ln(3);
        $this->Cell(65,4,'Ministerio de Desarrollo Productivo y Economia Plural',0,0,'C');
        $this->Image('senavex-logo.jpg' , 10 ,38, 65 , 10,'JPG');
        $this->Ln(14);
        $this->Cell(65,4,utf8_decode('Matriz: Av. Camacho N° 1488 Z. Central'),0,0,'C');
        $this->Cell(60,4,'',0,0,'C');
        $this->Ln(3);
        $this->Cell(65,4,utf8_decode('Teléfono: 2372055 - La Paz-Bolivia'),0,0,'C');
    }

    function subHeader_Factura($nro_recibo)
    {
        //$this->Image('logos-calidad.jpg' , 120 ,12, 80 , 18,'JPG');
        /*$this->SetXY(135,38);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(20,5,'NIT :',0,0,'L');
        $this->Cell(28,5,' ',0,0,'L');*/

        $this->SetXY(135,46);
        $this->SetFont('Times', 'B', 16);
        $this->Cell(28,4,utf8_decode('N° Recibo :'),0,0,'L');
        $this->SetTextColor(255,100,100);
        $this->Cell(30,4,$nro_recibo,0,0,'C');
        $this->SetTextColor(80);

        /*$this->SetXY(135,54);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(28,4,utf8_decode('N° Autorización : '),0,0,'C');
        $this->SetFont('Times', '', 10);
        $this->Cell(30,4,' ',0,0,'C');*/

        /*$this->SetXY(141,61);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(40,4,utf8_decode('SERVICIOS'),0,0,'C');*/
    }

    function subHeader_Titulo()
    {
        $this->SetXY(1,65);
        $this->SetFont('Times', 'B', 20);
        $this->Cell(210,8,'RECIBO OFICIAL',0,0,'C');
		
		$this->SetXY(1,70);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(210,8,'(SIN DERECHO A CREDITO FISCAL)',0,0,'C');
    }
    function Pie($persona1, $persona2, $ci)
    {
        $this->setXY(20,250);
        $this->SetFont('Arial','b',10);
        $this->Cell(80,4,utf8_decode('Entregado Por:'),0,0,'C');
		$this->setXY(20,254);
		$this->MultiCell(80, 4,utf8_decode($persona1) ,0,'C',false);
		$this->setXY(20,258);
		$this->MultiCell(80, 4,'SENAVEX' ,0,'C',false);
		
		$this->setXY(110,250);
        $this->SetFont('Arial','b',10);
        $this->Cell(80,4,utf8_decode('Recepcionado Por:'),0,0,'C');
		$this->setXY(110,254);
		$this->MultiCell(80, 4,utf8_decode($persona2) ,0,'C',false);
		$this->setXY(110,258);
		$this->MultiCell(80, 4,utf8_decode($ci) ,0,'C',false);
        

        $this->setY(270);
        $this->SetFont('Arial','b',8);
        $this->Cell(190,4,utf8_decode('"Al momento de firmar el cliente da su conformidad por el servicio y el cobro de este"'),0,0,'C');
        /*$this->Ln();
        $this->SetFont('Arial','',7);
        $this->Cell(190,4,utf8_decode('Ley N°453: "En caso de incumplimiento a lo ofertado o convenido, el proveedor debe reparar o sustituir el servício"'),0,0,'C');*/
    }
    function Body( $empresa_nombre, $fecha_emision, $listaServicios,$listaCantidad,$listaPreciosTotal, $literal, $numeral)
    {
        $this->Datos_Empresa( $empresa_nombre, $fecha_emision);
        $this->Detalle_Factura($listaServicios,$listaCantidad,$listaPreciosTotal, $literal,$numeral);
    }
    function Datos_Empresa( $empresa_nombre, $fecha_emision)
    {
        $this->SetXY(15,83);

        $this->SetFont('Arial', '', 11);
        $this->Cell(30,4,'Fecha : ',0,0,'C');
        $this->Cell(60,4,utf8_decode($fecha_emision.''),0,0,'L');
        /*$this->Cell(20,4,'NIT : ',0,0,'C');
        $this->Cell(60,4,$empresa_nit.' ' ,0,0,'L');*/
        $this->Ln(8);
        $this->Cell(35,4,utf8_decode('SE HA RECIBO DE: '),0,0,'C');
        $this->Cell(150,4,utf8_decode($empresa_nombre.' ' ),0,0,'L');

        $this->SetXY(40,84);
        $this->Cell(60,4,'..............................',0,0,'L');
        //$this->SetXY(122,84);
        //$this->Cell(60,4,'.....................................',0,0,'L');
        $this->SetXY(40,92);
        $this->Cell(150,4,'............................................................................................................................................',0,0,'L');
    }
    function Detalle_Factura( $listaServicios,$listaCantidad,$listaPreciosTotal, $literal, $numeral)
    {
        $this->Cabecera_Detalle_Factura();
        $this->Body_Detalle_Factura($listaServicios,$listaCantidad,$listaPreciosTotal);
        $this->Pie_Detalle_Factura($literal,$numeral);
    }
    function Cabecera_Detalle_Factura()
    {
        $this->SetXY(15,102);
        $this->SetTextColor(255,255,255);
        
        $this->SetFont('Times', 'b', 16);
        $this->Cell(95,4,'DETALLE',0,0,'C');
        $this->SetFont('Arial', 'b', 18);
        $this->Cell(5,4,'',0,0,'C');

        $this->SetFont('Times', 'b', 11);
        $this->Cell(20,4,'',0,0,'');
        $this->SetFont('Arial', 'b', 18);
        $this->Cell(5,4,'|',0,0,'');

        $this->SetFont('Times', 'b', 11);
        $this->Cell(20,4,'CANTIDAD',0,0,'C');
        $this->SetFont('Arial', 'b', 18);
        $this->Cell(5,4,'|',0,0,'C');
        $this->SetFont('Times', 'b', 11);
        $this->Cell(25,4,'SUBTOTAL',0,0,'C');
    }
    function Body_Detalle_Factura($listaServicios,$listaCantidad,$listaPreciosTotal)
    {
        $this->SetTextColor(80);
        $w = array(125, 26, 24, 30);
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(69,69,69);
        $this->SetFont('Times','',10);

        $fill = false;
        $count=0;
        foreach($listaServicios as $row){	
            $this->SetXY(15,110+$count);
            $this->SetDrawColor(255);
            $count=$count+6;
            if($fill==true){
                    $this->SetFillColor(224,235,255);
            }else{ 
                    $this->SetFillColor(240,240,240);
            }
            $this->SetTextColor(69,69,69);

            $this->Cell($w[0],6,utf8_decode($row),'LR',1,'',true);

            $fill = !$fill;
        }
        /*$count=0;
        $fill = false;
        foreach($listaCantidad as $row){	
            $this->SetXY(112,110+$count);
            $this->SetDrawColor(255);
            $count=$count+6;
            if($fill==true){
                    $this->SetFillColor(224,235,255);
            }else{ 
                    $this->SetFillColor(240,240,240);
            }
            $this->SetTextColor(69,69,69);
            $this->Cell($w[1],6,$row,'LR',0,'C',true);
            $fill = !$fill;
        }*/
        $count=0;
        $fill = false;
        foreach($listaCantidad as $row){	
             $this->SetXY(138,110+$count);
            $this->SetDrawColor(255);
            $count=$count+6;
            if($fill==true){
                    $this->SetFillColor(224,235,255);
            }else{ 
                    $this->SetFillColor(240,240,240);
            }
            $this->SetTextColor(69,69,69);
            $this->Cell($w[2],6,$row,'LR',0,'C',true);
            $fill = !$fill;
        }
        $count=0;
        $fill = false;
        foreach($listaPreciosTotal as $row){	
            $this->SetXY(162,110+$count);
            $this->SetDrawColor(255);
            $count=$count+6;
            if($fill==true){
                    $this->SetFillColor(224,235,255);
            }else{ 
                    $this->SetFillColor(240,240,240);
            }
            $this->SetTextColor(69,69,69);
            $this->Cell($w[3],6,$row,'LR',0,'C',true);

            $fill = !$fill;
        }
    }
    function Pie_Detalle_Factura($literal,$numeral)
    {
        $this->SetXY(15,213);
        $this->SetTextColor(56,56,56);
        $this->SetFont('Times', 'b', 7);
        $this->Cell(10,4,'Son:',0,0,'C');
        $this->Cell(120,4, utf8_decode($literal.' 00/100 Bolivianos'),0,0,'C');
        $this->SetFont('Arial', '', 18);
        $this->Cell(10,4,'|',0,0,'C');

        $this->SetFont('Times', 'b', 12);
        $this->Cell(10,4,'TOTAL Bs',0,0,'C');
        $this->Cell(30,4,$numeral.' ',0,0,'C');

        $this->SetXY(25,214);
        $this->SetFont('Times', 'b', 8);
        $this->Cell(120,4,'......................................................................................................................................................................',0,0,'C');
        $this->Cell(20,4,'',0,0,'C');
        $this->Cell(30,4,'......................',0,0,'C');
    }
}
	/*$recibo=new PDF();
	$recibo->AddPage();
	
	$literal=numtoletras(12313);
	$recibo->Cabecera(21);
	//$pdf->Body($empresa->getNit(),$empresa->getRazon_Social(),$facturaSenavex->getFecha_emision(),$listaServicios,$literal,$facturaSenavex->getTotal());
	$array1=[1,2,3,4];
	$array2=[1,2,3,4];
	$array3=[1,2,3,4];
	$array4=[1,2,3,4];
	$recibo->Body('senavex','17/04/15',$array1,$array2,$array4,"1654654654",52);
	$recibo->Pie("sdfiusadiufy",'17/04/2015',123);
	$recibo->Output();*/
?>	