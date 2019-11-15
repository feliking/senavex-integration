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
///////////////// adicionado la tabla y el modelo de autorizacion ////////////////
include_once(PATH_MODELO . DS . 'SQLAutorizacionPrevia.php');
include_once(PATH_TABLA . DS . 'AutorizacionPrevia.php');
///////////////// adicionado la tabla y el modelo de pais ////////////////
include_once(PATH_MODELO . DS . 'SQLPais.php');
include_once(PATH_TABLA . DS . 'Pais.php');
///////////////// adicionado la tabla y el modelo de departamento ////////////////
include_once(PATH_MODELO . DS . 'SQLDepartamento.php');
include_once(PATH_TABLA . DS . 'Departamento.php');
///////////////// adicionado la tabla y el modelo de AUTORIZACION PREVIA DETALLE ////////////////
include_once(PATH_MODELO . DS . 'SQLAutorizacionPreviaDetalle.php');
include_once(PATH_TABLA . DS . 'AutorizacionPreviaDetalle.php');



//DATOS PARA LA AUTORIZACION PREVIA
$autorizacionPrevia = new AutorizacionPrevia();
$sqlAutorizacionPrevia= new SQLAutorizacionPrevia();
$id_autorizacion_previa=$_REQUEST['qkeeCer']-7851;
$autorizacionPrevia->setId_autorizacion_previa((isset($_REQUEST['qkeeCer'])?$_REQUEST['qkeeCer']-7851:$_SESSION['id_autorizacionPrevia']));
$autorizacionPrevia=$sqlAutorizacionPrevia->getAutorizacionPorId($autorizacionPrevia);

/////////////////////////// DATOS PARA EMPRESA////////////
$empresaImportador = new EmpresaImportador();
$sqlEmpresaImportador = new SQLEmpresaImportador();
//$id_empresaImportador=$_REQUEST['id_empresa'];
//$empresaImportador->setId_empresa_importador((isset($_REQUEST['id_empresa'])?$_REQUEST['id_empresa']:$_SESSION['id_empresa']));
$empresaImportador->setId_empresa_importador($autorizacionPrevia->getId_empresa_importador());
$empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);

//----------para la fecha de renovacion
$fecha_renovacion_a= explode("-", $empresaImportador->getFecha_renovacion_rui());
$fecha_renovacion=$fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0];
$fecha_asignacion_a= explode("-", $empresaImportador->getFecha_asignacion_rui());
$fecha_asignacion=$fecha_asignacion_a[2].'/'.$fecha_asignacion_a[1].'/'.$fecha_asignacion_a[0];

//aca verificamos si es una persona o es un representante legal
$persona = new Persona();
$sqlPersona= new SQLPersona();
$persona->setId_persona($empresaImportador->getId_representante_legal());
$persona=$sqlPersona->getDatosPersonaPorId($persona);

//DATOS PARA OBTENER EL PAIS DE ORIGEN
$pais = new Pais();
$sqlPais= new SQLPais();
$paises=explode(",",$autorizacionPrevia->getId_pais_origen());

//DATOS PARA OBTENER DEPARTAMENTO ORIGEN
$departamento = new Departamento();
$sqlDepartamento= new SQLDepartamento();
//$departamento->setId_pais($autorizacionPrevia->getId_departamento_destino());
$departamentos=explode(",",$autorizacionPrevia->getId_departamento_destino());
//$departamento=$sqlDepartamento->getBuscarDepartamentoPorId($departamento);

///////////////////////////autorizacion previa detalle /////////////////////
$autorizacionPreviaDetalle = new AutorizacionPreviaDetalle();
$sqlAautorizacionPreviaDetalle = new SQLAutorizacionPreviaDetalle();
//$autorizacionPreviaDetalles=$autorizacionPrevia->getId_autorizacion_previa();
$autorizacionPreviaDetalle->setId_autorizacion_previa($autorizacionPrevia->getId_autorizacion_previa());
$autorizacionPreviaDetalles=$sqlAautorizacionPreviaDetalle->getAutorizacionPreviaDetallexIDAutorizacionPrevia($autorizacionPreviaDetalle);


//$autorizacionPreviaDetalle=$sqlAautorizacionPreviaDetalle->getListarAPDxAutorizacionPrevia($autorizacionPrevia->getId_autorizacion_previa());


////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------------

class PDF extends FPDF
{   
    var $widths;
    var $aligns;
    function Header()
   {
        // Logo
        $this->Image('styles/img/10.png', 10,8,33 );
        //$this->Image('img/AutorizacionPrevia/10.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        //$this->Cell(10,10,'Marko',0,0,'L');
        // Salto de línea
        $this->Ln(20);
    }

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->SetFont('Times','',5);
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
   function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);      
        $this->SetFont('Arial','B',6);        
        $this->Cell(0,10,utf8_decode('Servicio Nacional de Verificación de Exportaciones '),0,0,'L');
        
         $this->SetY(-15);       
        $this->SetFont('Arial','B',6);
        $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().' de {nb}'),'T',0,'R');
    }
}

$pdf = new PDF('P','mm','Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',4);

//----API--
//--------------
$pdf->SetXY(20, 30);
$pdf->SetFont('Times','B',10);
$pdf->Cell(185,6,utf8_decode('API - 19/010/'.$autorizacionPrevia->getNro_serie()),2,0,'R'); 



////////////// CABECERA 1////////////////////////
$pdf->SetXY(10, 40);
//$pdf->SetFillColor(10,100,100);
//$pdf->SetTextColor(85,107,47); 


$pdf->SetFont('Times','B',10);
$pdf->Cell(165,6,utf8_decode('I. DESCRIPCIÓN IMPORTACIÓN'),0,0,'C'); 
////////////// TITULO --- NOMBRE O RAZON SOCIAL ////////////////////////
$pdf->SetXY(10, 46);
$pdf->SetFont('Times','B',8);
$pdf->Cell(130,4,utf8_decode('NOMBRE O RAZÓN SOCIAL DEL IMPORTADOR'),1,0,'C');
//variable 
$pdf->SetXY(10, 50);
$pdf->SetFont('Times','',8);
$pdf->Cell(130,4,utf8_decode($empresaImportador->getRazon_social()),1,0,'C'); 
////////////// TITULO --- NIT ////////////////////////
$pdf->SetXY(140, 46);
$pdf->SetFont('Times','B',8);
$pdf->Cell(35,4,utf8_decode('NIT'),1,0,'C');
//variable
$pdf->SetXY(140, 50);
$pdf->SetFont('Times','',8);
$pdf->Cell(35,4,utf8_decode($empresaImportador->getNit()),1,0,'C'); 

////////////////////////////// CABECERA 2////////////////////////
$pdf->SetXY(10, 58);
$pdf->SetFont('Times','B',10);
$pdf->Cell(165,6,utf8_decode('II. MERCANCIA AUTORIZADA'),1,0,'C'); 
///////////////////////TITULO//////////////
$pdf->SetXY(175, 58);
$pdf->SetFont('Times','B',5);
$pdf->Cell(15,6,utf8_decode('Tipo de Divisa'),1,0,'C'); 
///////////////////////TITULO//////////////
$pdf->SetXY(190, 58);
$pdf->SetFont('Times','B',5);
$pdf->Cell(15,6,utf8_decode('Tipo de Cambio'),1,0,'C'); 
///////////////////////TITULO//////////////


$pdf->SetXY(10, 64);
$pdf->SetFont('Times','B',6);
$pdf->Cell(105,4,utf8_decode('TOTALES'),1,0,'C');
////////////// TITULO --- total cantidad ////////////////////////
$pdf->SetXY(115, 64);
$pdf->SetFont('Times','B',5);
$pdf->Cell(12,4,utf8_decode($autorizacionPrevia->getCantidad_total()),1,0,'R');
////////////// TITULO --- total peso bruto ////////////////////////
$pdf->SetXY(127, 64);
$pdf->SetFont('Times','',5);
$pdf->Cell(12,4,'',0,0,'C');
////////////// TITULO --- valor total ////////////////////////
$pdf->SetXY(139, 64);
$pdf->SetFont('Times','B',5);
$pdf->Cell(12,4,utf8_decode($autorizacionPrevia->getPeso_total()),1,0,'R');
////////////// TITULO --- totales ////////////////////////
$pdf->SetXY(151, 64);
$pdf->SetFont('Arial','',4);
$pdf->Cell(12,4,'',0,0,'C');
////////////// TITULO --- totales ////////////////////////
$pdf->SetXY(163, 64);
$pdf->SetFont('Times','B',5);
$pdf->Cell(12,4,utf8_decode($autorizacionPrevia->getValor_total()),1,0,'R');

////////////// vacio 1 ////////////////////////
$pdf->SetXY(175, 64);
$pdf->SetFont('Arial','',4);
$pdf->Cell(15,4,'',1,0,'R');
////////////// vacio 2 ////////////////////////
$pdf->SetXY(190, 64);
$pdf->SetFont('Arial','',4);
$pdf->Cell(15,4,'',1,0,'R');

////////////////////////////// SUB CABECERA 2///////////////////////////
/////////////////////////////////nro////////////////////////////////////
$pdf->SetXY(10, 68);
$pdf->SetFont('Times','B',5);
$pdf->Cell(7,5,utf8_decode('Nº'),1,0,'C');
//////////////////////////////////// nandina /////////////////////////////
$pdf->SetXY(17, 68);
$pdf->SetFont('Times','B',5);
$pdf->Cell(18,5,utf8_decode('SUBPARTIDA'),1,0,'C');
//////////////////////////////////// descripcion arancelaria/////////////////////////////
$pdf->SetXY(35, 68);
$pdf->SetFont('Times','B',5);
$pdf->Cell(40,5,utf8_decode('DESCRIPCIÓN ARANCELARIA'),1,0,'C');
//////////////////////////////////// descripcion comercial /////////////////////////////
$pdf->SetXY(75, 68);
$pdf->SetFont('Times','B',5);
$pdf->Cell(40,5,utf8_decode('DESCRIPCIÓN COMERCIAL'),1,0,'C');
//////////////////////////////////// cantidad /////////////////////////////
$pdf->SetXY(115, 68);
$pdf->SetFont('Times','B',5);
$pdf->Cell(12,5,utf8_decode('CANTIDAD'),1,0,'C');
//////////////////////////////////// unidad de medida /////////////////////////////
$pdf->SetXY(127, 68);
$pdf->SetFont('Times','B',4);
$pdf->MultiCell(12,2.5,utf8_decode('UNIDAD DE MEDIDA'),1,'C');
//////////////////////////////////// peso bruto /////////////////////////////
$pdf->SetXY(139, 68);
$pdf->SetFont('Times','B',4);
$pdf->MultiCell(12,2.5,utf8_decode('PESO BRUTO (Kg.)'),1,'C');
//////////////////////////////////// precio unitario /////////////////////////////
$pdf->SetXY(151, 68);
$pdf->SetFont('Times','B',4);
$pdf->MultiCell(12,1.66,utf8_decode('PRECIO UNITARIO ($us)'),1,'C');
//////////////////////////////////// valor total /////////////////////////////
$pdf->SetXY(163, 68);
$pdf->SetFont('Times','B',4);
$pdf->MultiCell(12,2.5,utf8_decode('VALOR TOTAL ($us)'),1,'C');
//////////////////////////////////// valor total /////////////////////////////
$pdf->SetXY(175, 68);
$pdf->SetFont('Times','B',4);
$pdf->MultiCell(15,2.5,utf8_decode('PRECIO UNITARIO'),1,'C');
//////////////////////////////////// valor total /////////////////////////////
$pdf->SetXY(190, 68);
$pdf->SetFont('Times','B',5);
$pdf->MultiCell(15,5,utf8_decode('VALOR TOTAL'),1,'C');


////////////////////////////// SUB CABECERA 2//////////////////////////////////////


/////////////Table //////////////////////
$pdf->SetWidths(array(7,18,40,40,12,12,12,12,12,15,15));
srand(microtime()*1000000);
$num = 1;

foreach ($autorizacionPreviaDetalles as &$autorizacionPrevDet) { 
    $pdf->Row(array($num,utf8_decode($autorizacionPrevDet->getCodigo_nandina()),utf8_decode($autorizacionPrevDet->getDescripcion_arancelaria()),utf8_decode($autorizacionPrevDet->getDescripcion_comercial()), utf8_decode($autorizacionPrevDet->getCantidad()),utf8_decode($autorizacionPrevDet->getUnidad_medida()),utf8_decode($autorizacionPrevDet->getPeso()),utf8_decode($autorizacionPrevDet->getPrecio_unitario_fob()),utf8_decode($autorizacionPrevDet->getFob()),utf8_decode($autorizacionPrevDet->getPrecio_unitario_fob_divisa()),utf8_decode($autorizacionPrevDet->getValor_fob_total_divisa())));
    $num= $num+1;
}

$pdf->Output();
?>