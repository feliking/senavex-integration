<?php

//defined('_ACCESO') or die('Acceso restringido');
require(PATH_BASE . DS . 'lib' . DS . 'fpdf' . DS . 'tfpdf.php');

class PDF extends tFPDF
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
    function qr($text,$size,$x,$y,$w,$h,$tipo)
    {
        $this->Image('http://chart.apis.google.com/chart?chs='.$size.'x'.$size.'&cht=qr&chl='.$text,$x,$y,$w,$h,$tipo);
    }

    function SetCol($col)
    {
        $this->col = $col;
        $x = 10+$col*66;
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }

    function Cabecera($texto_qr,$senavex_nit,$senavex_factura,$senavex_autorizacion)
    {
        //global $title;
        //$txt = file_get_contents($file);
        $this->SetFont('Times','',12);
        //$this->MultiCell(60,5,$txt);
       // $this->Image('http://chart.apis.google.com/chart?chs=40x40&cht=qr&chl='.$texto_qr,140,215,40,0,'PNG');
        $this->Image('http://chart.apis.google.com/chart?chs=50x50&cht=qr&chl='.$texto_qr,140,215,40,0,'PNG');
        $this->SetFillColor(176,176,176);
        $this->RoundedRect(10, 100, 190, 8, 5, '12', 'DF');

        $this->SetFillColor(255);
        $this->RoundedRect(10, 108, 190, 105, 5, '', 'DF');
        $this->RoundedRect(10, 210, 190, 10, 5, '34', 'DF');
        $this->RoundedRect(130, 35, 65, 25, 5, '1234', 'DF');

        $this->subHeader_institucion();
        $this->subHeader_Factura($senavex_nit,$senavex_factura,$senavex_autorizacion);
        $this->subHeader_Titulo();
    }
    function subHeader_institucion()
    {
        $this->Image("styles/img/factura/logo_bolivia.gif" , 30 ,8, 25 , 20,'GIF');
        $this->SetTextColor(80);
        $this->Ln(17);
        $this->SetFont('Arial', '', 7);
        $this->Cell(65,4,'Estado Plurinacional',0,0,'C');
        $this->Ln(3);
        $this->Cell(65,4,'de Bolivia',0,0,'C');
        $this->Ln(3);
        $this->Cell(65,4,'Ministerio de Desarrollo Productivo y Economia Plural',0,0,'C');
        $this->Image('styles/img/factura/senavex-logo.jpg' , 10 ,38, 65 , 10,'JPG');
        $this->Ln(14);
        $this->Cell(65,4,utf8_decode('Matriz: Av. Camacho N° 1488 Z. Central'),0,0,'C');
        $this->Cell(60,4,'',0,0,'C');
        $this->Ln(3);
        $this->Cell(65,4,utf8_decode('Teléfono: 2372055 - La Paz-Bolivia'),0,0,'C');
    }

    function subHeader_Factura($senavex_nit,$senavex_factura,$senavex_autorizacion)
    {
        //$this->Image('styles/img/factura/logos-calidad.jpg' , 120 ,12, 80 , 18,'JPG');
        $this->SetXY(135,38);
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
        $this->Cell(40,4,utf8_decode('SERVICIOS'),0,0,'C');
    }

    function subHeader_Titulo()
    {
        $this->SetXY(85,70);
        $this->SetFont('Times', 'B', 20);
        $this->Cell(35,8,'FACTURA',0,0,'L');
    }

    function Pie($codigo_control, $fecha_limite)
    {
        $this->setY(230);
        $this->SetFont('Arial','b',10);
        $this->Cell(50,4,utf8_decode('Código de Control: '),0,0,'R');
        $this->Cell(20,4,$codigo_control.'',0,0,'L');  

        $this->Ln(10);
        $this->Cell(59,4,utf8_decode('Fecha Limite de Emisión:'),0,0,'R');
        $this->Cell(30,4,$fecha_limite.'',0,0,'L');

        $this->setY(268);
        $this->SetFont('Arial','b',8);
        $this->Cell(190,4,utf8_decode('"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS, EL USO ILÍCITO DE ÉSTA SERÁ SANCIONADO DE ACUERDO A LEY"'),0,0,'C');
        $this->Ln();
        $this->SetFont('Arial','',7);
        $this->Cell(190,4,utf8_decode('Ley N°453: "En caso de incumplimiento a lo ofertado o convenido, el proveedor debe reparar o sustituir el servício"'),0,0,'C');
    }
    
    function Body($empresa_nit, $empresa_nombre, $fecha_emision, $listaServicios,$listaCantidad,$listaPrecios,$listaPreciosTotal, $literal, $numeral)
    {
        $this->Datos_Empresa($empresa_nit, $empresa_nombre, $fecha_emision);
        $this->Detalle_Factura($listaServicios,$listaCantidad,$listaPrecios,$listaPreciosTotal, $literal,$numeral);
    }
    function Datos_Empresa($empresa_nit, $empresa_nombre, $fecha_emision)
    {
        $this->SetXY(15,83);

        $this->SetFont('Arial', '', 11);
        $this->Cell(30,4,'Fecha : ',0,0,'C');
        $this->Cell(60,4,utf8_decode($fecha_emision.''),0,0,'L');
        $this->Cell(20,4,'NIT : ',0,0,'C');
        $this->Cell(60,4,$empresa_nit.' ' ,0,0,'L');
        $this->Ln(8);
        $this->Cell(35,4,utf8_decode('SEÑOR(ES) : '),0,0,'C');
        $this->Cell(150,4,utf8_decode($empresa_nombre.' ' ),0,0,'L');

        $this->SetXY(40,84);
        $this->Cell(60,4,'..............................',0,0,'L');
        $this->SetXY(122,84);
        $this->Cell(60,4,'.....................................',0,0,'L');
        $this->SetXY(40,92);
        $this->Cell(150,4,'............................................................................................................................................',0,0,'L');
    }
    function Detalle_Factura( $listaServicios,$listaCantidad,$listaPrecios,$listaPreciosTotal, $literal, $numeral)
    {
        $this->Cabecera_Detalle_Factura();
        $this->Body_Detalle_Factura($listaServicios,$listaCantidad,$listaPrecios,$listaPreciosTotal);
        $this->Pie_Detalle_Factura($literal,$numeral);
    }
    function Cabecera_Detalle_Factura()
    {
        $this->SetXY(15,102);
        $this->SetTextColor(255,255,255);
        
        $this->SetFont('Times', 'b', 16);
        $this->Cell(95,4,'DETALLE',0,0,'C');
        $this->SetFont('Arial', 'b', 18);
        $this->Cell(5,4,'|',0,0,'C');

        $this->SetFont('Times', 'b', 11);
        $this->Cell(20,4,'CANTIDAD',0,0,'C');
        $this->SetFont('Arial', 'b', 18);
        $this->Cell(5,4,'|',0,0,'C');

        $this->SetFont('Times', 'b', 11);
        $this->Cell(20,4,'PRECIO/U',0,0,'C');
        $this->SetFont('Arial', 'b', 18);
        $this->Cell(5,4,'|',0,0,'C');
        $this->SetFont('Times', 'b', 11);
        $this->Cell(25,4,'SUBTOTAL',0,0,'C');
    }
    function Body_Detalle_Factura($listaServicios,$listaCantidad,$listaPrecios,$listaPreciosTotal)
    {
        $this->SetTextColor(80);
        $w = array(97, 26, 24, 30);
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

            $this->Cell($w[0],6,utf8_decode($row),'LR',0,'L',true);

            $fill = !$fill;
        }
        $count=0;
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
        }
        $count=0;
        $fill = false;
        foreach($listaPrecios as $row){	
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
            $this->Cell($w[3],6, sprintf('%0.2f', $row),'LR',0,'C',true);

            $fill = !$fill;
        }
    }
    function Pie_Detalle_Factura($literal,$numeral)
    {
        $this->SetXY(15,213);
        $this->SetTextColor(56,56,56);
        $this->SetFont('Times', 'b', 9);
        $this->Cell(10,4,'Son:',0,0,'C');
        $this->Cell(120,4, utf8_decode($literal),0,0,'C');
        $this->SetFont('Arial', '', 18);
        $this->Cell(10,4,'|',0,0,'C');

        $this->SetFont('Times', 'b', 12);
        $this->Cell(10,4,'  TOTAL Bs',0,0,'C');
        $this->Cell(30,4,$numeral.' ',0,0,'C');

        $this->SetXY(25,214);
        $this->SetFont('Times', 'b', 8);
        $this->Cell(120,4,'......................................................................................................................................................................',0,0,'C');
        $this->Cell(20,4,'',0,0,'C');
        $this->Cell(30,4,'......................',0,0,'C');
    }
}

class FM_PDF extends tFPDF
{
    private $x1=0; private $x2=0;
    private $y1=0; private $y2=0;
    private $ciudad="";
    function getX1() { return $this->x1; }
    function getX2() { return $this->x2; }
    function setX1($x1) { $this->x1 = $x1; }
    function setX2($x2) { $this->x2 = $x2; }
    function getY1() { return $this->y1; }
    function getY2() { return $this->y2; }
    function setY1($y1) { $this->y1 = $y1; }
    function setY2($y2) { $this->y2 = $y2; }

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
    function qr($text,$size,$x,$y,$w,$h,$tipo)
    {
        $this->Image('http://chart.apis.google.com/chart?chs='.$size.'x'.$size.'&cht=qr&chl='.$text,$x,$y,$w,$h,$tipo);
    }
   
    function Rotate($angle,$x=-1,$y=-1) { 

        if($x==-1) 
            $x=$this->x; 
        if($y==-1) 
            $y=$this->y; 
        if($this->angle!=0) 
            $this->_out('Q'); 
        $this->angle=$angle; 
        if($angle!=0) 

        { 
            $angle*=M_PI/180; 
            $c=cos($angle); 
            $s=sin($angle); 
            $cx=$x*$this->k; 
            $cy=($this->h-$y)*$this->k; 
             
            $this->_out(sprintf('q %.5f %.5f %.5f %.5f %.2f %.2f cm 1 0 0 1 %.2f %.2f cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy)); 
        } 
    } 

    function SetCol($col)
    {
        $this->col = $col;
        $x = 10+$col*66;
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }
    function delimitadorVertical($x){
        for ($index = 0; $index <220 ; $index+=4){
            $this->Line($x,$index,$x,$index+3);
        }
    }
    function Cabecera($original,$sucursal,$texto_qr,$senavex_nit,$senavex_factura,$senavex_autorizacion,$certificados)
    {
        $this->SetAutoPageBreak('true',1);
//        $this->SetFillColor(255);
        //global $title;
        //$txt = file_get_contents($file);
        $this->SetFont('Arial','',8);
        //$this->MultiCell(60,5,$txt);
       // $this->Image('http://chart.apis.google.com/chart?chs=40x40&cht=qr&chl='.$texto_qr,140,215,40,0,'PNG');
        if(!empty($texto_qr)){
            $this->Image('http://chart.apis.google.com/chart?chs=50x50&cht=qr&chl='.$texto_qr,$this->getX1()+74,170,40,0,'PNG');
        }
        //detalle cabecera
//        $this->SetFillColor(176,176,176);
        $this->SetFillColor(35,35,35);
        $this->RoundedRect($this->getX1(), 65, $this->getX2(), 9, 5, '12', 'DF');
        
        //detalle cuerpo
        $this->SetFillColor(255);
        $this->RoundedRect($this->getX1(), 73, $this->getX2(), 94, 5, '', 'DF');
        
        //detalle pie
//        $this->RoundedRect($this->getX1(), 140, $this->getX2(), 10, 5, '34', 'DF');
        
        //nro factura
        $this->RoundedRect($this->getX1()+87, 25, 40, 18, 2, '1234', 'DF');
        
        $this->subHeader_institucion($sucursal,$certificados);
        $this->subHeader_Factura($original,$senavex_nit,$senavex_factura,$senavex_autorizacion);
        $this->subHeader_Titulo();
    }
    function subHeader_institucion($sucursal,$certificados)
    {
        //logo vortex
        $this->Image("styles/img/institucion/vortex.png" , $this->getX1() ,4, 40 , 25,'PNG');
        
        //servicio nacional de verificaciones
        $this->Image("styles/img/institucion/snvx.png" , $this->getX1()+1 ,25, 35 , 3,'PNG');
        
        // logo ministerio
        $this->Image("styles/img/institucion/logo-min.png" , $this->getX1()+37 ,5, 50 , 13,'PNG');
        
        for ($index1 = 0; $index1 < count($certificados); $index1++) {
            
            //logo ibnorca
            if($certificados[$index1]==1)
            $this->Image("styles/img/institucion/ibnorca.jpg" , $this->getX1()+93 ,13, 8 , 10,'JPG');

            if($certificados[$index1]==2)
            //logo afaq
            $this->Image("styles/img/institucion/afaq.png" , $this->getX1()+103 ,13, 10 , 10,'PNG');

            if($certificados[$index1]==3)
            //logo IQNet
            $this->Image("styles/img/institucion/IQNet.png" , $this->getX1()+113 ,12, 11 , 11,'PNG');
        }
       
        
       
        $this->SetFont('Arial', '', 6);
        $this->SetXY($this->getX1(),28);
        $this->Cell(36,3,utf8_decode('Central: Av. Camacho N° 1488 Z. Central'),0,0,'C');
       
        $this->SetXY($this->getX1(),31);
        $this->Cell(36,3,utf8_decode('Teléfono: 2372055 La Paz - Bolivia'),0,0,'C');
        
       
        $datos=  explode("|", $sucursal);
        for ($index = 0; $index < count($datos); $index++) {
            $this->SetXY($this->getX1(),34+($index*3));
            $this->Cell(36,3,utf8_decode($datos[$index]),0,0,'C');
        }
        $this->ciudad = explode("-", $datos[count($datos)-1])[0];
    }
    function subHeader_Titulo()
    {
        $this->SetXY($this->getX1()+50,35);
        $this->SetFont('Arial', 'B', 17);
        $this->Cell(35,8,'FACTURA',0,0,'L');
    }

    function subHeader_Factura($original,$senavex_nit,$senavex_factura,$senavex_autorizacion)
    {
        $this->SetTextColor(0);
        $this->SetXY($this->getX1()+92,26);
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(7,3,'NIT :',0,0,'L');
        $this->Cell(28,3,$senavex_nit.' ',0,0,'L');

        $this->SetXY($this->getX1()+100,29);
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(15,3,utf8_decode('N° Factura :'),0,0,'C');
//        $this->SetTextColor(255,100,100);
        $this->SetTextColor(0);
        $this->SetFont('Times', 'B', 15);
        $this->SetXY($this->getX1()+100,32);
        for ($index = 0; $index < 9 - strlen($senavex_factura); $index++) {
            $senavex_factura='0'.$senavex_factura;
        }
        $this->Cell(20,5,$senavex_factura.' ',0,0,'R');
//        $this->SetTextColor(80);
        $this->SetTextColor(0);
        $this->SetXY($this->getX1()+89,39);
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(19,4,utf8_decode('N° Autorización : '),0,0,'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(20,4,$senavex_autorizacion.' ',0,0,'C');
        
        $this->SetXY($this->getX1()+92,44);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(30,4,utf8_decode($original).' ',0,0,'C');
        $this->SetXY($this->getX1()+105,52);
        $this->SetFont('Arial', 'B', 7);
        $this->MultiCell(25,3,utf8_decode('Administración del gobierno central'),0,'L',false);
        //$this->Cell(20,8,utf8_decode('Administración del gobierno central'),1,0,'C');
        

    }

    function Pie($codigo_control, $fecha_limite)
    {
        $this->SetXY($this->getX1()+13,169); 
        $this->Cell(100,4,'..........................................................................................................',0,0,'L');
        
        $this->SetXY($this->getX1()+5,175); 
        $this->Cell(37,4,utf8_decode('Fecha Límite de Emisión'),0,0,'C');
        $this->SetXY($this->getX1()+5,178); 
        $this->Cell(37,4,utf8_decode($fecha_limite),0,0,'C');
        if(!empty($codigo_control)){
            $this->SetXY($this->getX1()+5,185); 
            $this->Cell(37,4,utf8_decode('Código de control: '),0,0,'C');
            $this->SetXY($this->getX1()+5,188); 
            $this->Cell(37,4,utf8_decode($codigo_control),0,0,'C');
        }

        $this->SetFont('Times', 'b', 6);
        $this->SetXY($this->getX1(),205);
        $this->Cell(130,3,utf8_decode('"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS. EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY"'),0,0,'C');
        $this->SetXY($this->getX1(),208);
        $this->Cell(130,3,utf8_decode('Ley No. 453: Están prohibidas las prácticas comerciales abusivas. tienes derecho a denunciarlas'),0,0,'C');
    }
    
    function Body($empresa_nit, $empresa_nombre, $fecha_emision, $listaServicios,$listaCantidad,$listaPrecios,$listaPreciosTotal, $literal, $numeral)
    {
        //$this->SetTextColor(0);
        $this->Datos_Empresa($empresa_nit, $empresa_nombre, $fecha_emision);
        $this->Detalle_Factura($listaServicios,$listaCantidad,$listaPrecios,$listaPreciosTotal, $literal,$numeral);
    }
    function Datos_Empresa($empresa_nit, $empresa_nombre, $fecha_emision)
    {
        $this->SetTextColor(0);
        $this->SetFont('Arial', 'B', 9);
        $this->SetXY($this->getX1()+3,55);
        $this->Cell(19,4,utf8_decode($this->ciudad).',',0,0,'C');
        $this->Cell(25,4,utf8_decode($fecha_emision),0,0,'C');
        
        $this->SetXY($this->getX1()+55,55);
        $this->Cell(15,4,utf8_decode('NIT/C.I.'),0,0,'C');
        $this->SetXY($this->getX1()+70,55);
        $this->Cell(30,4,utf8_decode($empresa_nit),0,0,'C');

        $this->SetXY($this->getX1()+3,60);
        $this->Cell(15,4,utf8_decode('Señor(ES): '),0,0,'C');
        $this->SetXY($this->getX1()+20,60);
        if(strlen($empresa_nombre)>50){
            $this->SetFont('Arial', 'B', 6);
        }
        $this->Cell(105,4,utf8_decode($empresa_nombre),0,0,'C');
        $this->SetFont('Arial', 'B', 9);
        
        $this->SetTextColor(80);
        $this->SetXY($this->getX1()+22,56);
        $this->Cell(30,4,utf8_decode('............................'),0,0,'C');
        
        $this->SetXY($this->getX1()+70,56);
        $this->Cell(30,4,utf8_decode('..................................'),0,0,'C');
        
        $this->SetXY($this->getX1()+20,61);
        $this->Cell(105,4,utf8_decode('......................................................................................................................'),0,0,'C');
         $this->SetTextColor(0);

    }
    function Detalle_Factura( $listaServicios,$listaCantidad,$listaPrecios,$listaPreciosTotal, $literal, $numeral)
    {   
        $this->SetTextColor(0);
        $this->Cabecera_Detalle_Factura();
        $this->Body_Detalle_Factura($listaServicios,$listaCantidad,$listaPrecios,$listaPreciosTotal);
        $this->Pie_Detalle_Factura($literal,$numeral);
    }
    function Cabecera_Detalle_Factura()
    {
        $this->SetXY($this->getX1()+3,67);
        $this->SetTextColor(255,255,255);
        
        $this->SetFont('Times', 'b', 8);
        $this->Cell(10,4,'CANT.',0,0,'C');
        $this->SetFont('Arial', 'b', 20);
        $this->Cell(5,4,'|',0,0,'C');

        $this->SetFont('Times', 'b', 8);
        $this->Cell(70,4,'CONCEPTO',0,0,'C');
        $this->SetFont('Arial', 'b', 20);
        $this->Cell(5,4,'|',0,0,'C');

        $this->SetFont('Times', 'b', 7);
        $this->MultiCell(15,3,utf8_decode('PRECIO UNITARIO'),0,'C',false);
        
        $this->SetXY($this->getX1()+108,67);
        $this->SetFont('Arial', 'b',20);
        $this->Cell(5,4,'|',0,0,'C');
        $this->SetFont('Times', 'b', 7);
        $this->Cell(15,4,'SUBTOTAL',0,0,'C');
        $this->SetTextColor(0);
    }
    function Body_Detalle_Factura($listaServicios,$listaCantidad,$listaPrecios,$listaPreciosTotal)
    {
        $this->SetTextColor(0);
        $w = array(15, 97, 20, 18);
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(69,69,69);
        $this->SetFont('Times','',10);

        $fill = false;
        $count=0;
        $this->SetDrawColor(255);
        foreach ($listaCantidad as $value) {
            $this->SetXY($this->getX1()+1,74+$count);
            $count=$count+6;
            if($fill==true){
                    $this->SetFillColor(224,235,255);
            }else{ 
                    $this->SetFillColor(240,240,240);
            }
            $this->SetTextColor(0);
            $this->Cell($w[0],6,$value,'LR',0,'C',true);
            $fill = !$fill;
        }
        $count=0;
        $fill = false;
        foreach ($listaServicios as $value) {
            $this->SetXY($this->getX1()+15,74+$count);
            $count=$count+6;
            if($fill==true){
                    $this->SetFillColor(224,235,255);
            }else{ 
                    $this->SetFillColor(240,240,240);
            }
            $this->SetTextColor(0);

            $this->Cell($w[1],6,utf8_decode($value)=='Revision Empresa Temporal'? 'RUEX | Sociedades Comerciales':utf8_decode($value),'LR',0,'L',true);

            $fill = !$fill;
        }
        $count=0;
        $fill = false;
        foreach($listaPrecios as $row){	
            $this->SetXY($this->getX1()+90,74+$count);
            $this->SetDrawColor(255);
            $count=$count+6;
            if($fill==true){
                    $this->SetFillColor(224,235,255);
            }else{ 
                    $this->SetFillColor(240,240,240);
            }
            $this->SetTextColor(0);
            $this->Cell($w[2],6,intval($row).'.00','LR',0,'R',true);
            $fill = !$fill;
        }
        $count=0;
        $fill = false;
        foreach($listaPreciosTotal as $row){	
            $this->SetXY($this->getX1()+110,74+$count);
            $this->SetDrawColor(255);
            $count=$count+6;
            if($fill==true){
                    $this->SetFillColor(224,235,255);
            }else{ 
                    $this->SetFillColor(240,240,240);
            }
            $this->SetTextColor(0);
            $this->Cell($w[3],6,intval($row).'.00','LR',0,'R',true);
            $fill = !$fill;
        }
        $this->SetDrawColor(0);
    }
    function Pie_Detalle_Factura($literal,$numeral)
    {
        $this->Line($this->getX1(), 162,$this->getX1()+129, 162);
        $this->SetFillColor(35,35,35);
        $this->RoundedRect($this->getX1()+95, 162, 15, 5,0, '', 'DF');
        $this->SetXY($this->getX1()+95,162);
        $this->SetFont('Times', 'b', 7);
        $this->SetTextColor(255);
        $this->Cell(15,4,'TOTAL Bs.',0,0,'C');
        $this->SetTextColor(0);
        $this->SetFillColor(255);
        $this->SetFont('Times', 'b', 11);
        $this->Cell(18,4,$numeral.'.00',0,0,'R');
        $this->SetXY($this->getX1(),169);
        $this->SetFont('Times', 'b', 9);
        $this->Cell(10,3,'Son:',0,0,'C');
        $this->Cell(90,3, utf8_decode($literal),0,0,'C');
        $this->Cell(15,3, utf8_decode('Bolivianos'),0,0,'C');
    }
    function WaterMark($txt, $angle){
        $this->SetAlpha(0.8);
        $this->SetFont('Arial','B',80);
        $this->SetTextColor(216,31,42);
        $this->SetXY($this->getX1()+40,145);
        $this->Rotate($angle);
        $this->Cell(90,3, utf8_decode($txt),0,0,'C');
        $this->Rotate(0);
        $this->SetTextColor(0);
        $this->SetAlpha(1);
    }
    
    //para texto transparente
    var $extgstates = array();
    function SetAlpha($alpha, $bm='Normal')
    {
        $gs = $this->AddExtGState(array('ca'=>$alpha, 'CA'=>$alpha, 'BM'=>'/'.$bm));
        $this->SetExtGState($gs);
    }

    function AddExtGState($parms)
    {
        $n = count($this->extgstates)+1;
        $this->extgstates[$n]['parms'] = $parms;
        return $n;
    }

    function SetExtGState($gs)
    {
        $this->_out(sprintf('/GS%d gs', $gs));
    }

    function _enddoc()
    {
        if(!empty($this->extgstates) && $this->PDFVersion<'1.4')
            $this->PDFVersion='1.4';
        parent::_enddoc();
    }

    function _putextgstates()
    {
        for ($i = 1; $i <= count($this->extgstates); $i++)
        {
            $this->_newobj();
            $this->extgstates[$i]['n'] = $this->n;
            $this->_out('<</Type /ExtGState');
            $parms = $this->extgstates[$i]['parms'];
            $this->_out(sprintf('/ca %.3F', $parms['ca']));
            $this->_out(sprintf('/CA %.3F', $parms['CA']));
            $this->_out('/BM '.$parms['BM']);
            $this->_out('>>');
            $this->_out('endobj');
        }
    }

    function _putresourcedict()
    {
        parent::_putresourcedict();
        $this->_out('/ExtGState <<');
        foreach($this->extgstates as $k=>$extgstate)
            $this->_out('/GS'.$k.' '.$extgstate['n'].' 0 R');
        $this->_out('>>');
    }

    function _putresources()
    {
        $this->_putextgstates();
        parent::_putresources();
    }
    /**************************************************************************/
    /****************            RECIBOS             **************************/
    /**************************************************************************/
    function Cabecera_Recibo($sucursal,$nro_deposito,$fecha)
    {
        $this->SetAutoPageBreak('true',1);
        $this->SetFont('Arial','',8);
        
        $this->SetFillColor(211,211,211);
        //$this->RoundedRect(10, $this->getY1()+10, 50, 8, 2, '1234', 'DF');
        $this->RoundedRect(160, $this->getY1()+15, 50, 8, 2, '1234', 'DF');
        $this->SetFont('Arial', '', 10);
       //s $this->SetXY(10,$this->getY1()+12);
        //$this->Cell(50,3,utf8_decode('SNV/SERV/P 303 F01'),1,0,'C');
       
        
        $this->SetXY(162,$this->getY1()+17);
        for ($index = 0; $index < 9 - strlen($nro_deposito); $index++) {
            $nro_deposito='0'.$nro_deposito;
        }
        $this->Cell(47,4,utf8_decode('N° '.$nro_deposito),0,0,'C');
        
        
        
        $this->SetTextColor(0);
        $this->SetXY(1,$this->getY1());
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(213,3,utf8_decode('SERVICIO NACIONAL DE VERIFICACIÓN DE EXPORTACIONES'),0,0,'C');
        $this->SetXY(1,$this->getY1()+4);
        $this->Cell(213,3,utf8_decode('SENAVEX'),0,0,'C');
        
        $this->SetXY(1,$this->getY1()+15);
        $this->SetFont('Arial', '', 14);
        $this->Cell(213,5,utf8_decode('RECIBO OFICIAL'),0,0,'C');
        
        $this->SetXY(1,$this->getY1()+21);
        $this->SetFont('Arial', '', 10);
        $this->Cell(213,3,utf8_decode('(SIN DERECHO A CRÉDITO FISCAL)'),0,0,'C');
        
        $this->SetXY(5,$this->getY1()+25);
        $this->SetFont('Arial', '', 9);
        $this->Cell(100,3,utf8_decode('REGIONAL | '.$sucursal.'         fecha: '.$fecha),0,0,'L');
        
        
    }
    function Body_Recibo($original, $servicios, $detalle, $asistente, $cliente, $empresa){
        $this->SetFillColor(255);
        $this->RoundedRect(4, $this->getY1()+30, 205, 90, 2, '', 'DF');
        
        $this->SetXY(7,$this->getY1()+33);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(25,4,utf8_decode('Se emite el presente Recibo por concepto de: '),0,0,'L');
        
        $this->SetFont('Arial', '', 9);
        $this->SetXY(7,$this->getY1()+100);
        $this->Cell(50,4,utf8_decode('Entregado por:'),0,0,'C');
        $this->SetXY(7,$this->getY1()+104);
//        $this->Cell(50,4,utf8_decode($asistente),0,0,'C');
        $this->SetFont('Arial', '', 8);
        $this->MultiCell(70,3,utf8_decode($asistente));
        $this->SetXY(7,$this->getY1()+108);
        $this->Cell(50,4,utf8_decode('SENAVEX'),0,0,'C');
        
        $this->SetXY(150,$this->getY1()+100);
        $this->SetFont('Arial', '', 9);
        $this->Cell(50,4,utf8_decode('Recepcionado por:'),0,0,'C');
        $this->SetXY(150,$this->getY1()+104);
        $this->SetFont('Arial', '', 8);
        $this->Cell(50,4,utf8_decode($cliente),0,0,'C');
        $this->SetXY(150,$this->getY1()+108);
        $this->Cell(50,4,utf8_decode($empresa),0,0,'C');
        
         $this->SetXY(7,$this->getY1()+114);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(150,4,utf8_decode('NOTA: Al firmar este recibo oficial se da conformidad al servicio prestado'),0,0,'L');
        
        
        $this->SetFont('Arial', '', 10);
        $count=0;
        $fill = false;
        for ($index = 0; $index < count($servicios); $index++) {
        //foreach($servicios as $row){	
            $this->SetXY(15,$this->getY1()+38+$count);
            $this->SetDrawColor(255);
            $count=$count+6;
            if($fill==true){
                    $this->SetFillColor(224,235,255);
            }else{ 
                    $this->SetFillColor(240,240,240);
            }
            $this->SetTextColor(69,69,69);
            $this->Cell($w[2],6,utf8_decode($servicios[$index].'       '.$detalle[$index]),'LR',0,'L',true);
            $fill = !$fill;
        }
        
        $this->SetAlpha(0.5);
        $this->SetFont('Arial','B',100);
        $this->SetTextColor(240,240,240);
        $this->SetXY(1,$this->getY1()+70);
        
        $this->Cell(210,3, utf8_decode('senavex'),0,0,'C');
        
        $this->SetTextColor(0);
        $this->SetAlpha(1);
        
        $this->SetDrawColor(0);
        $this->SetXY(5,$this->getY1()+122);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(25,4,utf8_decode($original),0,0,'L');
        
    }
    function delimitadorHorizontal($y){
        for ($index = 0; $index <210 ; $index+=4){
            $this->Line($index,$y,  $index+3, $y);
        }
    }
}

?>	