<?php

//defined('_ACCESO') or die('Acceso restringido');
require(PATH_BASE . DS . 'lib' . DS . 'fpdf' . DS . 'tfpdf.php');

class ReportePDF extends tFPDF
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
    function Cabecera()
    {
        //global $title;
        //$txt = file_get_contents($file);
        $this->SetFont('Times','',12);
        $this->SetFillColor(176,176,176);
        $this->RoundedRect(3, 30, 290, 8, 5, '12', 'DF');

        $this->SetFillColor(255);
        $this->RoundedRect(3, 38, 290, 160, 5, '', 'DF');
        $this->SetFillColor(176,176,176);
        $this->RoundedRect(3, 191 , 290, 10, 5, '34', 'DF');
       // $this->RoundedRect(130, 35, 65, 25, 5, '1234', 'DF');

        $this->subHeader_institucion();
       // $this->subHeader_Factura($senavex_nit,$senavex_factura,$senavex_autorizacion);
        $this->subHeader_Titulo();
    }
    function subHeader_institucion()
    {
        $this->Image("styles/img/factura/logo_bolivia.gif" , 30 ,4, 30 , 20,'GIF'); 
        $this->Image('styles/img/factura/senavex-logo.jpg' , 29 ,24, 32 , 5,'JPG');
    }
    function subHeader_Factura($senavex_nit,$senavex_factura,$senavex_autorizacion)
    {
        //$this->Image('logos-calidad.jpg' , 120 ,12, 80 , 18,'JPG');
        $this->SetXY(50,38);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(20,5,'NIT :',0,0,'L');
        $this->Cell(28,5,$senavex_nit.' ',0,0,'L');

        $this->SetXY(135,46);
        $this->SetFont('Times', 'B', 16);
        $this->Cell(28,4,utf8_decode('N° Factura :'),0,0,'L');
        $this->SetTextColor(255,100,100);
        $this->Cell(30,4,$senavex_factura.' ',0,0,'R');
        $this->SetTextColor(80);

        $this->SetXY(135,54);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(28,4,utf8_decode('N° Autorización : '),0,0,'C');
        $this->SetFont('Times', '', 10);
        $this->Cell(30,4,$senavex_autorizacion.' ',0,0,'C');

        $this->SetXY(141,61);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(40,4,utf8_decode('Servicios Exportación'),0,0,'C');
    }
    function subHeader_Titulo()
    {
        $this->SetXY(130,20);
        $this->SetFont('Times', 'B', 22);
        $this->Cell(35,8,'REPORTE',0,0,'L');
    }

    function Pie()
    {
        /*$this->setY(230);
        $this->SetFont('Arial','b',10);
        $this->Cell(50,4,utf8_decode('Código de Control: '),0,0,'R');
        $this->Cell(20,4," ".'',0,0,'L');  

        $this->Ln(10);
        $this->Cell(59,4,utf8_decode('Fecha Limite de Emisión:'),0,0,'R');
        $this->Cell(30,4," ".'',0,0,'L');

        $this->setY(268);
        $this->SetFont('Arial','b',8);
        $this->Cell(190,4,utf8_decode('"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS, EL USO ILÍCITO DE ÉSTA SERÁ SANCIONADO DE ACUERDO A LEY"'),0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','',7);
        $this->Cell(190,4,utf8_decode('Ley N°453: "En caso de incumplimiento a lo ofertado o convenido, el proveedor debe reparar o sustituir el servício"'),0,0,'C');*/
    }
    function Body($titulos,$size,$contenido)
    {
        $this->Datos_Empresa();
        $this->Detalle_Factura($titulos,$size,$contenido);
    }
    function Datos_Empresa()
    {
        $this->SetXY(15,83);

//        $this->SetFont('Arial', '', 11);
//        $this->Cell(30,4,'Fecha : ',0,0,'C');
//        $this->Cell(60,4,utf8_decode(' '),0,0,'L');
//        $this->Cell(20,4,'NIT : ',0,0,'C');
//        $this->Cell(60,4,' ' ,0,0,'L');
//        $this->Ln(8);
//        $this->Cell(35,4,utf8_decode('SEÑOR(ES) : '),0,0,'C');
//        $this->Cell(150,4,utf8_decode(' ' ),0,0,'L');

//        $this->SetXY(40,84);
//        $this->Cell(60,4,'..............................',0,0,'L');
//        $this->SetXY(122,84);
//        $this->Cell(60,4,'.....................................',0,0,'L');
//        $this->SetXY(40,92);
//        $this->Cell(150,4,'............................................................................................................................................',0,0,'L');
    }
    function Detalle_Factura($titulos,$size,$contenido)
    {
        array_unshift($titulos,'Nro');
        array_unshift($size,10);
        $contador=1;
        
        foreach($contenido as $fila){
            array_unshift($fila,$contador);
            $contador=$contador+1;
            $contenedor[count($contenedor)]=$fila;
        }
        $this->Cabecera_Detalle_Factura($titulos,$size);
        $this->Body_Detalle_Factura($contenedor,$size);
       // $this->Pie_Detalle_Factura($literal,$numeral);
    }
    function Cabecera_Detalle_Factura($titulos,$size)
    {
//        $this->SetXY(4,31);
        $this->SetTextColor(255,255,255);
        $this->SetFont('Times','',9);
        $count=4;
        for($i=0; $i<count($titulos); $i++){
//            $this->Cell($size[$i],4,utf8_decode($titulos[$i]),0,0,'C');
            $this->SetFont('Times','',8);
            $this->SetXY($count,30);
//            echo utf8_decode($titulos[$i])." | ";
            $this->MultiCell($size[$i], 4,utf8_decode($titulos[$i]),0,'C',false);
            $count=$count+$size[$i]+1;
            
            $this->SetFont('Times','',20);
            $this->SetXY($count,32);
            $this->Cell(1,4,'|','',0,'C',true);
        }
//        echo "<br>";
    }
    function Body_Detalle_Factura($contenido,$size)
    {
        
        $this->SetTextColor(80);
//        $w = array(97, 26, 24, 30);
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(69,69,69);
        $this->SetFont('Times','',10);

        $fill = false;
        $count=0;
//        print('<pre>'.print_r($data,true).'</pre>');
        
        foreach($contenido as $row){	
            $this->SetXY(5,39+$count);
            $this->SetDrawColor(255);
            
            if($fill==true){
                        $this->SetFillColor(224,235,255);
                }else{ 
                        $this->SetFillColor(240,240,240);
                }
            $this->SetTextColor(69,69,69);
            $size_count=0;
            $tam=0;
            foreach ($row as $rw) {
                $this->SetXY(5+$tam,39+$count);
                $this->SetTextColor(69,69,69);
                $this->SetFont('Times','',8);
                
//                echo utf8_decode($rw)." | ";
                $this->MultiCell($size[$size_count], 4,utf8_decode($rw),0,'C',true);
//                $this->Cell($size[$size_count],4,utf8_decode($rw),'',0,'C',true);
                $tam+=$size[$size_count]+1;
                $this->SetXY(5+$tam,39+$count);
                $this->SetTextColor(255,255,255);
                $this->SetFont('Times','',8);
//                $this->Cell(1,4,'|','',0,'C',true);
                
                $size_count=$size_count+1;
            }
//             echo "<br>";
            $fill = !$fill;
            $count=$count+4;
//            $this->Cell($w[1],6,""/*$row[1]*/,'',0,'C',true);
//            $this->Cell($w[2],6,""/*$row[2]*/,'LR',0,'C',true);
//            $this->Cell($w[3],6,utf8_decode($row[1]),'',0,'C',true);
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

class CierreGral extends tFPDF
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
    function Cabecera($regional,$fecha_ini,$fecha_fin, $numFacturas)
    {
        $this->SetAutoPageBreak('true',1);
        $this->SetFont('Times','',12);
        $this->SetFillColor(176,176,176);
        //$this->RoundedRect(3, 30, 290, 8, 5, '12', 'DF');

        $this->SetFillColor(255);
//        $this->RoundedRect(3, 38, 210, 160, 5, '', 'DF');
        $this->SetFillColor(176,176,176);
        //$this->RoundedRect(3, 191 , 290, 10, 5, '34', 'DF');
        
        $this->Image('styles/img/institucion/vortex2.png',15,12,40,17);
        $this->SetXY(5,15);
        $this->SetFont('Times', 'B', 9);
        $this->Cell(205,5,utf8_decode('SERVICIO NACIONAL DE VERIFICACIÓN DE EXPORTACIONES'),0,0,'C');
        
        $this->SetXY(5,22);
        $this->SetFont('Times', 'B', 14);
        $this->Cell(205,5,utf8_decode('REGIONAL | '.$regional),0,0,'C');
        
        $this->SetXY(5,30);
        $this->SetFont('Times', '', 18);
        $this->Cell(205,7,utf8_decode('CIERRE GENERAL DE VENTA DE VALORES Y SERVICIOS'),0,0,'C');
        
        $this->SetXY(5,40);
        $this->SetFont('Times', 'B', 9);
        $this->Cell(50,3,'Total Facturas: '.$numFacturas,0,0,'R');
        $this->Cell(110,3,utf8_decode('Del  '.date_format(date_create($fecha_ini),'d/m/Y').'    -    Al  '.date_format(date_create($fecha_fin),'d/m/Y')),0,0,'C');
        
        $this->SetXY(3,48);
        $this->SetFont('Times', 'B', 9);
        
        $this->Cell(15,5,'',0,0,'C');
        $this->Cell(87,5,utf8_decode('VALOR / SERVICIO'),1,0,'C');
        $this->Cell(23,5,utf8_decode('CTD'),1,0,'C');
        $this->Cell(23,5,utf8_decode('DEL'),1,0,'C');
        $this->Cell(23,5,utf8_decode('AL'),1,0,'C');
        $this->Cell(27,5,utf8_decode('TOTAL'),1,0,'C');
        
    }
    function Body($array){
        $this->SetFont('Times', '', 9);
        $total_valor = 0;
        $total_cantidad = 0;
        for ($index = 0; $index < count($array); $index++) {
            $this->SetXY(3,53 + ($index * 5));
            $this->Cell(15,5,'',0,0,'C');
            $this->Cell(87,5,utf8_decode($array[$index][0]),1,0,'L');
            $this->Cell(23,5,$array[$index][1],1,0,'R');
            $this->Cell(23,5,$array[$index][2],1,0,'R');
            $this->Cell(23,5,$array[$index][3],1,0,'R');
            $this->Cell(27,5,number_format($array[$index][4], 2, '.', ','),1,0,'R');
            $total_cantidad=$total_cantidad+$array[$index][1];
            $total_valor=$total_valor+$array[$index][4];
        }
        $this->SetFont('Times','B', 11);
        $this->Ln(6);
        $this->Cell(8,5,'',0,0,'C');
        $this->Cell(87,5,'TOTALES',1,0,'L');
        $this->Cell(23,5,$total_cantidad,1,0,'R');
        $this->Cell(46,5,'',1,0,'R');
        $this->Cell(27,5,number_format($total_valor, 2, '.', ','),1,0,'R');
    }
}

class CierreDetallado extends tFPDF
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
    function Cabecera($regional,$fecha_ini,$fecha_fin)
    {
        $this->SetAutoPageBreak('true',1);
        $this->SetFont('Times','',12);
        $this->SetFillColor(176,176,176);
        //$this->RoundedRect(3, 30, 290, 8, 5, '12', 'DF');

        $this->SetFillColor(255);
//        $this->RoundedRect(3, 38, 210, 160, 5, '', 'DF');
        $this->SetFillColor(176,176,176);
        //$this->RoundedRect(3, 191 , 290, 10, 5, '34', 'DF');
        
        $this->Image('styles/img/institucion/vortex2.png',15,12,40,17);
        $this->SetXY(5,15);
        $this->SetFont('Times', 'B', 9);
        $this->Cell(270,5,utf8_decode('SERVICIO NACIONAL DE VERIFICACIÓN DE EXPORTACIONES'),0,0,'C');
        
        $this->SetXY(5,22);
        $this->SetFont('Times', 'B', 14);
        $this->Cell(270,5,utf8_decode('REGIONAL | '.$regional),0,0,'C');
        
        $this->SetXY(5,30);
        $this->SetFont('Times', '', 18);
        $this->Cell(270,7,utf8_decode('CIERRE DETALLADO DE VENTA DE VALORES Y SERVICIOS'),0,0,'C');
        
        $this->SetXY(5,40);
        $this->SetFont('Times', 'B', 9);
        $this->Cell(270,3,utf8_decode('Del  '.date_format(date_create($fecha_ini),'d/m/Y').'    -    Al  '.date_format(date_create($fecha_fin),'d/m/Y')),0,0,'C');
        
        $this->SetXY(3,48);
        $this->SetFont('Times', 'B', 8);
        
        $this->Cell(5,5,'',0,0,'C');
     
        $this->Cell(15,5,'FECHA',1,0,'C');
        $this->Cell(15,5,utf8_decode('FACTURA'),1,0,'C');
        $this->Cell(15,5,utf8_decode('TIPO'),1,0,'C');
        
        $this->Cell(60,5,'SERVICIO',1,0,'C');
        $this->Cell(13,5,'RUEX',1,0,'C');
        $this->Cell(70,5,'EMPRESA',1,0,'C');
        $this->Cell(11,5,'CTD',1,0,'C');
        $this->Cell(15,5,'DEL',1,0,'C');
        $this->Cell(15,5,'AL',1,0,'C');
        $this->Cell(23,5,'TOTAL',1,0,'C');
    }

    function Body($array, $total){
        $this->SetFont('Times', '', 8);
        $total_valor = 0;
        $total_cantidad = 0;
        
        for ($index = 0; $index < count($array); $index++) {
            $this->SetXY(3,53 + ($index * 5));
            $this->Cell(5,5,'',0,0,'C');
            //$this->Cell(87,5,utf8_decode($array[$index][0]),1,0,'L');
            $phpdate = strtotime( $array[$index]['fecha_emision'] );
            $mysqldate = date( 'd-m-Y', $phpdate );
            $this->Cell(15,5,$mysqldate,1,0,'C');
            $this->Cell(15,5,$array[$index]['numero_factura']=='-1' ? '-':$array[$index]['numero_factura'],1,0,'C');
            $this->SetFont('Times', '', 5);
            $this->Cell(15,5,$array[$index]['tipo'],1,0,'C');
             $this->SetFont('Times', '', 8);
            $this->Cell(60,5,utf8_decode($array[$index]['descripcion']),1,0,'L');
            $this->Cell(13,5,$array[$index]['ruex'],1,0,'C');
            
            if(strlen($array[$index]['nombre'])>54){
                $this->SetFont('Times', '', 5);
                $this->MultiCell(70, 2,utf8_decode($array[$index]['nombre']) ,0,'L',false);
                $this->Line(120, 58 + ($index * 5), 200, 58 + ($index * 5));
            }else {
                $this->SetFont('Times', '', 6);
                $this->MultiCell(70, 5,utf8_decode($array[$index]['nombre']) ,1,'L',false);
            }
            
            
            $this->SetFont('Times', '', 8);
//            $this->Cell(43,5,,1,0,'R');
            $this->SetXY(196,53 + ($index * 5));
            $this->Cell(11,5,$array[$index]['cantidad'],1,0,'R');
            $this->Cell(15,5,$array[$index]['nro_ctrl_1'],1,0,'R');
            $this->Cell(15,5,$array[$index]['nro_ctrl_2'],1,0,'R');
            $this->Cell(23,5,number_format($array[$index]['total'], 2, '.', ','),1,0,'R');
            //$this->Cell(27,5,number_format($array[$index][4], 2, '.', ','),1,0,'R');
            $total_cantidad=$total_cantidad+$array[$index]['cantidad'];
            $total_valor=$total_valor+$array[$index]['total'];
        }
        if(count($total)>0){
            $this->SetFont('Times','B', 11);
            $this->SetXY(8,53 + ($index * 5) + 1);
    //        $this->Cell(3,5,'',0,0,'C');
            $this->Cell(188,5,'TOTAL',1,0,'L');
            $this->Cell(11,5,$total[0],1,0,'R');
            $this->Cell(30,5,'',1,0,'R');
            $this->Cell(23,5,number_format($total[1], 2, '.', ','),1,0,'R');
        }
    }
}
?>	