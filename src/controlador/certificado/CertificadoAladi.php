<?php
session_start();
ini_set ('error_reporting', E_ALL);

require_once('lib/fpdf.php');

class PDF extends FPDF
{	
    //Multiceldas
    var $widths;
    var $aligns;

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

    function Row($data,$fill)
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
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,4,$data[$i],0,$a,$fill);
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

    //ENCABEZADO
    function Header()
    {	
        $this->Image('img/cabecera_fina2.jpg',15,6,250,26);
        $this->SetFont('Arial','B',12);
        $this->Ln(11);
        $this->Cell(0,10,utf8_decode('SERVICIO NACIONAL DE PATRIMONIO DEL ESTADO'),0,0,'C');
        $this->Ln(5);
        $this->Cell(0,10,utf8_decode('SISTEMA CENTRALIZADO Y ADMINISTRATIVO - SICENAD '.date("Y")),0,0,'C');
        $this->SetFont('Arial','B',14);
        $this->Ln(8);
        $this->Cell(0,10,utf8_decode('REPORTE DETALLADO DE HOJAS DE RUTA'),0,0,'C');
        $this->Ln();
    }

    //PIE DE PAGINA
    function Footer()
    {
        $fecha=strftime( "%Y-%m-%d-%H-%M-%S", time()-14400);
        $fecha_creacion_f = split('-',$fecha);
        $fecha_creacion_f[2]=substr($fecha_creacion_f[2], 0, 2);
        $fecha_creacion_str = $fecha_creacion_f[2] . " de " . name_date($fecha_creacion_f[1]). " de " . $fecha_creacion_f[0]. " Hrs.: ". $fecha_creacion_f[3].":".$fecha_creacion_f[4].":".$fecha_creacion_f[5];

        $this->SetY(-15);
        $this->SetFont('Arial','',7);
        $this->Cell(0,10,utf8_decode('Fecha de impresión: '. $fecha_creacion_str),0,0,'L');
        $this->Cell(0,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'R');
    }
    
    //********************* CABECERAS DE LAS TABLAS ************************//
    function cabecera_general(){
        $this->SetFillColor(31,72,124);
        $this->SetTextColor(255);
        $this->SetFont('Arial','B',6);
        $this->Cell(10,14,utf8_decode('N°'),1,0,'C',1);
        $this->Cell(15,14,utf8_decode('Hoja de Ruta'),1,0,'C',1);
        
        $x=$this->GetX();
        $y=$this->GetY();
        $this->MultiCell(18,7,utf8_decode('Fecha Última Derivación'),1,'C',1);
        $this->SetXY($x+18,$y);
        
        $this->Cell(20,14,utf8_decode('Entidad'),1,0,'C',1);
        $this->Cell(20,14,utf8_decode('Remitente'),1,0,'C',1);
        $this->Cell(20,14,utf8_decode('Destinatario'),1,0,'C',1);
        $this->Cell(50,14,utf8_decode('Referencia'),1,0,'C',1);
        $this->Cell(20,14,utf8_decode('Prioridad'),1,0,'C',1);
        $this->Cell(20,14,utf8_decode('Fecha Recepción'),1,0,'C',1);
        $this->Cell(20,14,utf8_decode('Plazo (Días)'),1,0,'C',1);
        
        $x=$this->GetX();
        $y=$this->GetY();
        $this->MultiCell(18,7,utf8_decode('Fecha Límite de Plazo'),1,'C',1);
        $this->SetXY($x+18,$y);
        
        $this->Cell(20,14,utf8_decode('Tipo de Trámite'),1,0,'C',1);
    }
    
}

function name_date($s){
    switch ($s){
        case '01': return "enero"; break;
        case '02': return "febrero"; break;
        case '03': return "marzo"; break;
        case '04': return "abril"; break;
        case '05': return "mayo"; break;
        case '06': return "junio"; break;
        case '07': return "julio"; break;
        case '08': return "agosto"; break;
        case '09': return "septiembre"; break;
        case '10': return "octubre"; break;
        case '11': return "noviembre"; break;
        case '12': return "diciembre"; break;
    }
}

//Instanciation of inherited class
$pdf=new PDF('L','mm','A4');

$pdf->AliasNbPages();
$pdf->SetMargins(4,10,8);
$pdf->SetAutoPageBreak(true,20);
$pdf->AddPage();

/*** Captura de las variables ***/
$plazo = $_GET['plazo'];
$tipotramite = $_GET['tipotramite'];
$tipocorresp = $_GET['tipocorrespondencia'];
$combo_dir = $_GET['combo_direccion'];
$func = $_GET['funcionario'];
$gestion = $_GET['gestion'];

//Inicializando la conexión a la Base de Datos
$db = new PGTools();

//******************************** CONSULTA MAESTRA ********************************//
$sql = "SELECT * FROM tabla";

if($plazo!=0){
    $hoy = date("Y-m-d",time()-14400);
    switch ($plazo){
        case 1: $sql.= " AND d.fecha_plazolimite<'".$hoy."'";
                break;
        case 2: $sql.= " AND d.fecha_plazolimite='".$hoy."'";
                break;
        case 3: $sql.= " AND d.fecha_plazolimite>='".$hoy."'";
                break;
    }
}

if($tipotramite!=0){
    $sql.= " AND d.correspondencia_externa=".$tipotramite;
}

if($tipocorresp!=0){
    switch ($tipocorresp){
        case 1: $sql.= " AND hr.origen<>'N'";
                break;
        case 2: $sql.= " AND hr.origen='N'";
                break;
    }
}

if($combo_dir!=''){
    $sql.= " AND de.entidad ILIKE '%".$combo_dir."%'";
}

if($func!=0){
    $sql.= " AND de.idfuncionario=".$func;
}

$sql.=" ORDER BY de.entidad,d.fecha DESC";
$rs = $db->RecordSet($sql);

//echo $sql;
/************************** INICIO DEL ARMADO DEL PDF *************************/
//Contar la cantidad de Registro que nos devuelve
$cant_registros = $db->TotalRows($rs);

if($cant_registros == 0){
    $pdf->Ln(20);
    $pdf->Cell(0,10,utf8_decode("No Existen Registros para este criterio de búsqueda"),0,0,'C',0);
}else{
    if($plazo==1){
        $pdf->SetWidths(array(10,15,18,20,20,20,50,20,20,20,18,20,15)); // ancho de cada columna
        $pdf->SetAligns(array('C','C','C','C','C','C','C','C','C','C','C','C','C'));
    } else {
        $pdf->SetWidths(array(10,15,18,20,20,20,50,20,20,20,18,20)); // ancho de cada columna
        $pdf->SetAligns(array('C','C','C','C','C','C','C','C','C','C','C','C'));
    }

    $fila = 0;
    while($row = $db->FetchArray($rs)){
        $fila++;
        if($fila==1){
            $cont = 0;
            $direccion = $row["entidad_des"];
            $pdf->SetTextColor(0);
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(0,10,utf8_decode($direccion),0,0,'C',0);
            $pdf->Ln();
            if($plazo==1){
                $pdf->cabecera_conretrasos();
            } else {
                $pdf->cabecera_general();
            }
            $pdf->SetTextColor(0);
            $pdf->SetFont('Arial','B',6);
            $pdf->Ln();
        }

        if($direccion!=$row["entidad_des"]){
            $cont = 0;
            $direccion = $row["entidad_des"];
            $pdf->SetTextColor(0);
            $pdf->SetFont('Arial','B',12);
            $pdf->Ln();
            $pdf->Cell(0,10,utf8_decode($direccion),0,0,'C',0);
            $pdf->Ln();
            if($plazo==1){
                $pdf->cabecera_conretrasos();
            } else {
                $pdf->cabecera_general();
            }
            $pdf->SetTextColor(0);
            $pdf->SetFont('Arial','B',6);
            $pdf->Ln();
        }

        $cont++;
        $hojaderuta = $row["hojaderuta"];
        $ultimaderivacion = date("d/m/Y H:i", strtotime($row["fecha"]));
        $remitente = utf8_decode($row["entidad_rem"]);
        $cargo_rem = utf8_decode($row["remitente"]);
        $destinatario = utf8_decode($row["destinatario"]);
        $referencia = utf8_decode($row["referencia"]);
        $prioridad = utf8_decode($row["descrip_prioridad"]);
        
        if($row["fecha_recepcion"]==''){
            $fecharecepcion = utf8_decode('No recepcionado');
        }else{
            $fecharecepcion = date("d/m/Y H:i", strtotime($row["fecha_recepcion"]));
        }

        if($row["plazo"]==''){
            $plazo = utf8_decode('Sin Plazo');
        }else{
            $plazo_dias = $row["plazo"];
        }

        if($row["fecha_plazolimite"]==''){
            $fechaplazolimite = utf8_decode('Sin Definir');
        }else{
            $fechaplazolimite = date("d/m/Y", strtotime($row["fecha_plazolimite"]));
            $fechaplazo = $row["fecha_plazolimite"];
        }

        $idtramite = $row["idcorresp_externa"];
        if($idtramite==''){
            $tramite = utf8_decode('Sin Clasificación');
        } else{
            $tramite = utf8_decode($row["corresp_externa"]);
        }

        if($plazo==1){
            $retraso = RestarFechasParaDiasHabiles($fechaplazo, date("Y-m-d"), $_SESSION["feriados"]);
            if($retraso==1){
                $var_dias = utf8_decode($retraso." Día");
            }else{
                $var_dias = utf8_decode($retraso." Días");
            }
            $pdf->Row(array($cont,$hojaderuta,$ultimaderivacion,$remitente,$cargo_rem,$destinatario,$referencia,$prioridad,$fecharecepcion,$plazo_dias,$fechaplazolimite,$tramite,$var_dias));
        } else {
            $pdf->Row(array($cont,$hojaderuta,$ultimaderivacion,$remitente,$cargo_rem,$destinatario,$referencia,$prioridad,$fecharecepcion,$plazo_dias,$fechaplazolimite,$tramite));
        }
    }
}


$pdf->Output();
$db->Close();
$pdf->close();

?>