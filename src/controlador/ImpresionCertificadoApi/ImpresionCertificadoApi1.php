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
include_once(PATH_MODELO . DS . 'SQLAutorizacionPreviaDetalle.php');
include_once(PATH_TABLA . DS . 'AutorizacionPreviaDetalle.php');
///////////////// adicionado la tabla y el modelo de pais ////////////////
include_once(PATH_MODELO . DS . 'SQLPais.php');
include_once(PATH_TABLA . DS . 'Pais.php');
///////////////// adicionado la tabla y el modelo de departamento ////////////////
include_once(PATH_MODELO . DS . 'SQLDepartamento.php');
include_once(PATH_TABLA . DS . 'Departamento.php');
include_once(PATH_TABLA . DS . 'ComiteApi.php');
include_once(PATH_MODELO . DS . 'SQLComiteApi.php');




//DATOS PARA LA AUTORIZACION PREVIA
$autorizacionPrevia = new AutorizacionPrevia();
$sqlAutorizacionPrevia= new SQLAutorizacionPrevia();
$id_autorizacion_previa=$_REQUEST['id_autorizacionPrevia'];
$autorizacionPrevia->setId_autorizacion_previa((isset($_REQUEST['id_autorizacionPrevia'])?$_REQUEST['id_autorizacionPrevia']:$_SESSION['id_autorizacionPrevia']));
$autorizacionPrevia=$sqlAutorizacionPrevia->getAutorizacionPorId($autorizacionPrevia);

/////////////////////////// DATOS PARA EMPRESA////////////
$empresaImportador = new EmpresaImportador();
$sqlEmpresaImportador = new SQLEmpresaImportador();

$autorizacionPreviaDetalle = new AutorizacionPreviaDetalle();
$sqlAutorizacionPreviaDetalle = new SQLAutorizacionPreviaDetalle();

$autorizacionPreviaDetalle->setId_autorizacion_previa($_REQUEST['id_autorizacionPrevia']);
$autorizacionPreviaDetalle=$sqlAutorizacionPreviaDetalle->getAutorizacionDetallePorId($autorizacionPreviaDetalle);

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

$nro_registros = count($autorizacionPreviaDetalle); 
///////////////////////////// para el nro de fojas/////////////////
$nro_fojas=$nro_registros;
// $empresaImportador->setId_empresa_importador((isset($_REQUEST['nro_fojas'])?$_REQUEST['nro_fojas']:$_SESSION['nro_fojas']));

//------------para el rubro de exportaciones---------------------------
$rubro_exportaciones = new RubroExportaciones();
$sqlRubro_exportaciones = new SQLRubroExportaciones();
$rubros=explode(",",$empresaImportador->getIdrubro_exportaciones());

$comiteApi = new ComiteApi();
$sqlComiteApi = new SQLComiteApi();
$comiteApi->setId_comite_api($autorizacionPrevia->getId_comite_api());
$comiteApi = $sqlComiteApi->getComitePorID($comiteApi);

////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------------

class PDF extends FPDF
{   
    
    function Header()
    {   
    }
    function CodigoQR($id_autorizacion_previa){
        
        $autorizacionPrevia = new AutorizacionPrevia();
        $sqlAutorizacionPrevia= new SQLAutorizacionPrevia();
        $id_autorizacion_previa=$_REQUEST['id_autorizacionPrevia'];
        $autorizacionPrevia->setId_autorizacion_previa((isset($_REQUEST['id_autorizacionPrevia'])?$_REQUEST['id_autorizacionPrevia']:$_SESSION['id_autorizacionPrevia']));
        $autorizacionPrevia=$sqlAutorizacionPrevia->getAutorizacionPorId($autorizacionPrevia);

        $empresaImportador = new EmpresaImportador();
        $sqlEmpresaImportador = new SQLEmpresaImportador();
        //$id_empresaImportador=$_REQUEST['id_empresa'];
        //$empresaImportador->setId_empresa_importador((isset($_REQUEST['id_empresa'])?$_REQUEST['id_empresa']:$_SESSION['id_empresa']));
        $empresaImportador->setId_empresa_importador($autorizacionPrevia->getId_empresa_importador());
        $empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
        $autorizacionPreviaDetalle = new AutorizacionPreviaDetalle();

        $sqlAutorizacionPreviaDetalle = new SQLAutorizacionPreviaDetalle();
        $autorizacionPreviaDetalle->setId_autorizacion_previa($_REQUEST['id_autorizacionPrevia']);
        $autorizacionPreviaDetalle=$sqlAutorizacionPreviaDetalle->getAutorizacionDetallePorId($autorizacionPreviaDetalle);
        $nro_registros = count($autorizacionPreviaDetalle);

        $comiteApi = new ComiteApi();
        $sqlComiteApi = new SQLComiteApi();
        $comiteApi->setId_comite_api($autorizacionPrevia->getId_comite_api());
        $comiteApi = $sqlComiteApi->getComitePorID($comiteApi);


        $persona = new Persona();
        $sqlPersona= new SQLPersona();
        $persona->setId_persona($empresaImportador->getId_representante_legal());
        $persona=$sqlPersona->getDatosPersonaPorId($persona);
        $nro_fojas=$nro_registros;
        
        $gestion = substr($comiteApi->getFecha_fin(), 2,2);

        //RUI$this->RoundedRect(9, 71, 30, 8, 2, '1234', 'D');
        //$this->Image('styles/img/institucion/logo-min.png',7,10,75,25);
        //$this->Image('styles/img/institucion/vortex2.png',140,7,70,30);
        ////////// NRO CERTIFICADO///////////////
        $this->SetFont('Arial','B',12);
        $this->SetXY(162, 52);
        $this->Cell(45,10,'API-'.$gestion.'/'.$comiteApi->getNro_comite().'/'.$autorizacionPrevia->getNro_serie(),0,1,'C');     
        $this->SetFont('Arial','B',22);
        $this->SetXY(163, 50);
      
        //////////////////////////TITULO//////////////////
        
        $this->SetFont('Arial','B',15);
        $this->SetXY(140, 24);
        $this->Ln(38);
        $this->Cell(0,10,utf8_decode('AUTORIZACIÓN PREVIA DE IMPORTACIÓN'),0,0,'C');
        $this->SetFont('Arial','',10);
        // $this->SetXY(120, 58);
        $this->Ln(10);
        $this->Cell(12,10,' ',0,0,'C');
        $this->MultiCell(170,5,utf8_decode('En el marco de lo dispuesto en el Art. 118 parágrafo I del Reglamento a la Ley General de Aduanas aprobado mediante Decreto Supremo No. 25870 de fecha 11 de agosto de 2000, Decreto Supremo No. 2752 de fecha 1 de mayo de 2016 que aprueba la emisión de Autorizaciones Previas de Importación, Decreto Supremo No. 4010 de fecha 14 de agosto de 2019 que sustituye el Anexo del Decreto Supremo Nº 2752, y otras afines; el SENAVEX procede a la Emisión de Autorización Previa de Importación de acuerdo al siguiente detalle: '),0,'J');
        //$this->Ln(5);
       
        //-----------codigoQR-----------
        if($empresaImportador->getEstado()=='0' || $empresaImportador->getEstado()=='1' ||$empresaImportador->getEstado()=='3' ||$empresaImportador->getEstado()=='6' ||$empresaImportador->getEstado()=='9')
        {
            $codigo='RUI Pendiente:';
        }
        else
        {
            $codigo='RUI valido:';
        }

        $date = $comiteApi->getFecha_emision();
        $mod_date = strtotime($date."+ 60 days");
        $date_registro = strtotime($date);


        $codigo.=' -EMPRESA:'.$empresaImportador->getRazon_social().' -NIT: '.$empresaImportador->getNit().' -REPRESENTANTE LEGAL: '.$persona->getNombres().' '.$persona->getPaterno().' '.$persona->getMaterno().' -CANTIDAD: '.$autorizacionPrevia->getCantidad_total().' -PESO: '.$autorizacionPrevia->getPeso_total().' -VALOR FOB: '.$autorizacionPrevia->getValor_total().' -NRO ITEMS: '.$nro_fojas.' -FECHA DE EMISION: '.date("d/m/y",$date_registro).' -FECHA DE VENCIMIENTO: '.date("d/m/y",$mod_date);//.' Codigo de Seguridad:'.$empresaImportador->getCodigo_seguridad();
        //$codigo.=utf8_decode(' Fecha de impresión:').date("Y-m-d");
        //$codigo.=' http://vortex.senavex.gob.bo/ruex.php?datos='.$empresaImportador->getCodigo_seguridad();
        $aleato = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15);
        $numerocombinado = 7851 +$_REQUEST['id_autorizacionPrevia'];

        $codigo.='      http://vortex.senavex.gob.bo/index.php?opcion=Kv43uTew&'.$aleato.'&qkeeCer='.$numerocombinado;
        $qrcode = new QRcode(utf8_encode($codigo));
        $qrcode->disableBorder();
        $qrcode->displayFPDF($this ,30, 241, 30); 
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
}

$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$pdf->CodigoQR($autorizacionPrevia->getId_empresa_importador());


$pdf->SetXY(22, 112);
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(45,6,utf8_decode('DESCRIPCIÓN DEL IMPORTADOR'),0,0,'L'); 
////////////// EMPRESA ////////////////////////
$pdf->SetXY(22, 118);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,utf8_decode('Empresa'),0,0,'L'); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,6,':',0,0,'L');
$y = 6;
if(strlen($empresaImportador->getRazon_social()) >48)
    {
        $pdf->SetFont('Arial','',7);
        $y=6;
    }
    if(strlen($empresaImportador->getRazon_social()) >85)
    {
        $pdf->SetFont('Arial','',6);
        $y=5;
    }
$pdf->MultiCell(140,$y,utf8_decode($empresaImportador->getRazon_social()),'','L');
$pdf->SetFont('Arial','',10);

// $pdf->Cell(140,6,utf8_decode($empresaImportador->getRazon_social()),0,0,'L');

////////////// NIT ////////////////////////
$pdf->SetXY(22, 124);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,utf8_decode('NIT'),0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Cell(50,6,utf8_decode($empresaImportador->getNit()),0,0,'L');
////////////// REPRESENTACION LEGAL ////////////////////////
$pdf->SetXY(22, 130);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,utf8_decode('Representante Legal'),0,0,'L'); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,6,':',0,0,'L');
$pdf->MultiCell(140,6,utf8_decode($persona->getNombres().' '.$persona->getPaterno().' '.$persona->getMaterno()),'','L');
$pdf->SetFont('Arial','B',10);

$pdf->SetXY(22, 139);
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(45,6,utf8_decode('MERCANCIA AUTORIZADA'),0,0,'L'); 
///////////// PARA CANTIDAD U/2U /////////////////////////
$pdf->SetXY(22, 145);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,utf8_decode('Cantidad'),0,0,'L'); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,6,':',0,0,'L');
$pdf->MultiCell(120,6,utf8_decode(round($autorizacionPrevia->getCantidad_total())),'','L');
$pdf->SetFont('Arial','B',10);
/////////// PARA PESO NETO KG ///////////////////////
$pdf->SetXY(22, 151);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,utf8_decode('Peso'),0,0,'L'); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,6,':',0,0,'L');
$pdf->MultiCell(140,6,utf8_decode(round($autorizacionPrevia->getPeso_total(),2)).' Kg.','','L');
$pdf->SetFont('Arial','B',10);
/////////// PARA VALOR FOB $US ///////////////////////
$pdf->SetXY(22, 157);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,utf8_decode('Valor FOB'),0,0,'L'); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,6,':',0,0,'L');
$pdf->MultiCell(140,6,utf8_decode(round($autorizacionPrevia->getValor_total(),2)).' $us','','L');
$pdf->SetFont('Arial','B',10);

/////////// NRO ITEMS///////////////////////
$pdf->SetXY(22, 163);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,utf8_decode('N° de Ítems autorizados'),0,0,'L'); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Cell(40,6,utf8_decode($nro_fojas),0,1,'L');
$pdf->SetFont('Arial','',10);


/////////// PAIS DE ORIGEN///////////////////////
$pdf->SetXY(22, 169);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,utf8_decode('País de origen'),0,0,'L'); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,6,':',0,0,'L');
$y=6;
    if(count($paises)>5)
    {
        $pdf->SetFont('Arial','',7);
        $y=5;
    }
    if(count($paises)>7)
    {
        $pdf->SetFont('Arial','',7);
        $y=4.5;
    }
    if(count($paises)>9)
    {
        $pdf->SetFont('Arial','',6);
        $y=4;
    }
    if(count($paises)>12)
    {
        $pdf->SetFont('Arial','',6);
        $y=3;
    }
$tot_pais = count($paises);
$arrayPais='';
foreach ($paises as &$paiss) { 
    $pais->setId_pais($paiss);
    $pais=$sqlPais->getBuscarDescripcionPorId($pais);    
    $paiss=$pais->getNombre();
    if ($paiss == $tot_pais-1)
        $arrayPais.= $pais->getNombre(); 
    else      
       $arrayPais.= $pais->getNombre().', ';    
}
$pdf->MultiCell(120,$y,utf8_decode(strtoupper($arrayPais)),'','L');
$pdf->SetFont('Arial','',10);
/////////// DEPARTAMENTO DESTINO///////////////////////
$pdf->SetXY(22, 175);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,utf8_decode('Departamento destino'),0,0,'L'); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,6,':',0,0,'L');
$y=6;
    if(count($departamentos)>5)
    {
        $pdf->SetFont('Arial','',7);
        $y=6;
    }
   
    if(count($departamentos)>7)
    {
        $pdf->SetFont('Arial','',7);
        $y=4;
    }
   
$tot = count($departamentos);
$arrayDepartamento='';
foreach ($departamentos as &$depto) {
    $departamento->setId_departamento($depto);
    $departamento=$sqlDepartamento->getBuscarDepartamentoPorId($departamento);
    $depto=$departamento->getNombre();
    if ($depto == $tot-1)
        $arrayDepartamento.= $departamento->getNombre(); 
    else      
       $arrayDepartamento.= $departamento->getNombre().', '; 
}
$pdf->MultiCell(120,$y,utf8_decode($arrayDepartamento),'','L');
$pdf->SetFont('Arial','B',10);
 

/////////// DEPARTAMENTO DESTINO///////////////////////
$pdf->SetXY(22, 181);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,utf8_decode('Fecha de emisión   '),0,0,'L'); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,6,':',0,0,'L');

$date = $comiteApi->getFecha_emision();
//$date = $autorizacionPrevia->getFecha_registro();
$date_registro = strtotime($date);
$pdf->MultiCell(140,6,date("d/m/y",$date_registro),'','L');
$pdf->SetFont('Arial','',10);
/////////// DEPARTAMENTO DESTINO///////////////////////
$pdf->SetXY(22, 187);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,6,utf8_decode('Fecha de vencimiento   '),0,0,'L'); 
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,6,':',0,0,'L');
//$date = $autorizacionPrevia->getFecha_registro();
$mod_date = strtotime($date."+ 60 days");
$pdf->MultiCell(140,6,date("d/m/y",$mod_date),'','L');
$pdf->SetFont('Arial','',8);
/////////// LEYENDA NOTA ACLARATORIA///////////////////////
$pdf->SetXY(22, 194);
$pdf->SetFont('Arial','',7);
$pdf->Cell(45,6,utf8_decode('Nota Aclaratoria: La Autorización Previa de Importación no acredita que estas mercancías sean aptas para su uso y/o consumo.'),0,0,'L'); 
// $pdf->SetFont('Arial','',7);
// $pdf->Cell(5,6,':',0,0,'L');
// $pdf->MultiCell(120,6,'La Autorización Previa de Importación no acredita que estas mercancías sean aptas para su uso y/o consumo.','','L');

//-------------esto es para la firma y admision---------------------------
$empresaImportador->setId_empresa_importador($autorizacionPrevia->getId_empresa_importador());
$empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
$pdf->setXY(12,237);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(40,4,utf8_decode('V.01'),0,1,'C');
$pdf->setXY(36,272);
//$pdf->Ln(20);
$pdf->SetFont('Arial','B',6);
//$pdf->Cell(129,4,'',0,0);
// if($empresaImportador->getEstado()=='0' || $empresaImportador->getEstado()=='1' ||$empresaImportador->getEstado()=='3' ||$empresaImportador->getEstado()=='6' ||$empresaImportador->getEstado()=='9')
// {
//     $pdf->Cell(40,4,utf8_decode('RUI-SENAVEX PENDIENTE'),0,1,'C');
// }
// else
// {
//     $pdf->Cell(30,4,utf8_decode('AUTORIZACIÓN PREVIA DE IMPORTACIÓN'),0,1,'C');
// }
//$pdf->Cell(107,4,'',0,0);

$pdf->setXY(12,248);
$pdf->SetFont('Arial','B',8);
$pdf->Output();
?>
