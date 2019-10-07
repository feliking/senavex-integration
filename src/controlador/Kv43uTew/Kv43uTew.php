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
    
    function Header()
    {   
    }
    function CodigoQR($id_autorizacion_previa){
        
        $autorizacionPrevia = new AutorizacionPrevia();
        $sqlAutorizacionPrevia= new SQLAutorizacionPrevia();
        $id_autorizacion_previa=$_REQUEST['qkeeCer'];
        $autorizacionPrevia->setId_autorizacion_previa((isset($_REQUEST['qkeeCer'])?$_REQUEST['qkeeCer']:$_SESSION['id_autorizacionPrevia']));
        $autorizacionPrevia=$sqlAutorizacionPrevia->getAutorizacionPorId($autorizacionPrevia);

        $empresaImportador = new EmpresaImportador();
        $sqlEmpresaImportador = new SQLEmpresaImportador();
        //$id_empresaImportador=$_REQUEST['id_empresa'];
        //$empresaImportador->setId_empresa_importador((isset($_REQUEST['id_empresa'])?$_REQUEST['id_empresa']:$_SESSION['id_empresa']));
        $empresaImportador->setId_empresa_importador($autorizacionPrevia->getId_empresa_importador());
        $empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
        //aca verificamos si es una persona o es un representante legal
        
 
        ///////////////////////////////////////////////////////////////////////////////
        
        $persona = new Persona();
        $sqlPersona= new SQLPersona();
        $persona->setId_persona($empresaImportador->getId_representante_legal());
        $persona=$sqlPersona->getDatosPersonaPorId($persona);           
        
         
       
        //-----------codigoQR-----------
        if($empresaImportador->getEstado()=='0' || $empresaImportador->getEstado()=='1' ||$empresaImportador->getEstado()=='3' ||$empresaImportador->getEstado()=='6' ||$empresaImportador->getEstado()=='9')
        {
            $codigo='RUI Pendiente:';
        }
        else
        {
            $codigo='RUI valido:';
        }


        $codigo.=' -EMPRESA:'.$empresaImportador->getRazon_social().' -NIT: '.$empresaImportador->getNit().' -REPRESENTANTE LEGAL: '.$persona->getNombres().' '.$persona->getPaterno().' '.$persona->getMaterno().' -CANTIDAD: '.$autorizacionPrevia->getCantidad_total().' -PESO: '.$autorizacionPrevia->getPeso_total().' -VALOR FOB: '.$autorizacionPrevia->getValor_total().' -NRO FOJAS: '.$nro_fojas.' -FECHA DE EMISION: 07/10/19 -FECHA DE VENCIMIENTO: 06/12/19';//.' Codigo de Seguridad:'.$empresaImportador->getCodigo_seguridad();
        //$codigo.=utf8_decode(' Fecha de impresión:').date("Y-m-d");
        //$codigo.=' http://vortex.senavex.gob.bo/ruex.php?datos='.$empresaImportador->getCodigo_seguridad();
        $codigo.=' http://vortex.senavex.gob.bo/rui.php?rui='.$empresaImportador->getRui();
        $qrcode = new QRcode(utf8_encode($codigo));
        $qrcode->disableBorder();
        $qrcode->displayFPDF($this ,36, 200, 40); 
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
   

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
            $h = $this->h;
            $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
                    $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }
}

$pdf = new PDF('P','mm','Letter');
$pdf->AddPage();

//----API--
//--------------
$pdf->SetXY(20, 20);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(175,6,utf8_decode('API - 19/009/'.$autorizacionPrevia->getCorrelativo()),2,0,'R'); 

////////////// CABECERA 1////////////////////////
$pdf->SetXY(20, 40);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(140,6,utf8_decode('I. DESCRIPCION IMPORTACION'),1,0,'C'); 
////////////// TITULO --- NOMBRE O RAZON SOCIAL ////////////////////////
$pdf->SetXY(20, 46);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(120,4,utf8_decode('NOMBRE O RAZON SOCIAL DEL IMPORTADOR'),1,0,'C');
//variable 
$pdf->SetXY(20, 50);
$pdf->SetFont('Arial','',6);
$pdf->Cell(120,4,utf8_decode($empresaImportador->getRazon_social()),1,0,'C'); 
////////////// TITULO --- NIT ////////////////////////
$pdf->SetXY(140, 46);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(20,4,utf8_decode('NIT'),1,0,'C');
//variable
$pdf->SetXY(140, 50);
$pdf->SetFont('Arial','',6);
$pdf->Cell(20,4,utf8_decode($empresaImportador->getNit()),1,0,'C'); 

////////////////////////////// CABECERA 2////////////////////////
$pdf->SetXY(20, 58);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(140,6,utf8_decode('II. MERCANCIA AUTORIZADA'),1,0,'C'); 
////////////// TITULO --- totales ////////////////////////
$pdf->SetXY(20, 64);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(80,4,utf8_decode('TOTALES'),1,0,'C');
////////////// TITULO --- total cantidad ////////////////////////
$pdf->SetXY(100, 64);
$pdf->SetFont('Arial','',4);
$pdf->Cell(12,4,utf8_decode($autorizacionPrevia->getCantidad_total()),1,0,'R');
////////////// TITULO --- total peso bruto ////////////////////////
$pdf->SetXY(112, 64);
$pdf->SetFont('Arial','',4);
$pdf->Cell(12,4,'',0,0,'C');
////////////// TITULO --- valor total ////////////////////////
$pdf->SetXY(124, 64);
$pdf->SetFont('Arial','',4);
$pdf->Cell(12,4,utf8_decode($autorizacionPrevia->getPeso_total()),1,0,'R');
////////////// TITULO --- totales ////////////////////////
$pdf->SetXY(136, 64);
$pdf->SetFont('Arial','',4);
$pdf->Cell(12,4,'',0,0,'C');
////////////// TITULO --- totales ////////////////////////
$pdf->SetXY(148, 64);
$pdf->SetFont('Arial','',4);
$pdf->Cell(12,4,utf8_decode($autorizacionPrevia->getValor_total()),1,0,'R');

////////////////////////////// SUB CABECERA 2///////////////////////////
/////////////////////////////////nro////////////////////////////////////
$pdf->SetXY(20, 68);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(10,5,utf8_decode('Nº'),1,0,'C');
//////////////////////////////////// nandina /////////////////////////////
$pdf->SetXY(30, 68);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(14,5,utf8_decode('SUBPARTIDA'),1,0,'C');
//////////////////////////////////// descripcion arancelaria/////////////////////////////
$pdf->SetXY(44, 68);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(28,5,utf8_decode('DESCRIPCION ARANCELARIA'),1,0,'C');
//////////////////////////////////// descripcion comercial /////////////////////////////
$pdf->SetXY(72, 68);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(28,5,utf8_decode('DESCRIPCION COMERCIAL'),1,0,'C');
//////////////////////////////////// cantidad /////////////////////////////
$pdf->SetXY(100, 68);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(12,5,utf8_decode('CANTIDAD'),1,0,'C');
//////////////////////////////////// unidad de medida /////////////////////////////
$pdf->SetXY(112, 68);
$pdf->SetFont('Arial','B',4);
$pdf->MultiCell(12,2.5,utf8_decode('UNIDAD DE MEDIDA'),1,'C');
//////////////////////////////////// peso bruto /////////////////////////////
$pdf->SetXY(124, 68);
$pdf->SetFont('Arial','B',4);
$pdf->MultiCell(12,2.5,utf8_decode('PESO BRUTO (Kg.)'),1,'C');
//////////////////////////////////// precio unitario /////////////////////////////
$pdf->SetXY(136, 68);
$pdf->SetFont('Arial','B',4);
$pdf->MultiCell(12,1.66,utf8_decode('PRECIO UNITARIO ($us)'),1,'C');
//////////////////////////////////// valor total /////////////////////////////
$pdf->SetXY(148, 68);
$pdf->SetFont('Arial','B',4);
$pdf->MultiCell(12,2.5,utf8_decode('VALOR TOTAL ($us)'),1,'C');

////////////////////////////// SUB CABECERA 2//////////////////////////////////////
//////////////////////////////// LLENADO DE DATOS /////////////////////////////////

/////////////////////////////////nro////////////////////////////////////
$pdf->SetXY(20, 73);
$pdf->SetFont('Arial','',4);
$num = 1;
foreach ($autorizacionPreviaDetalles as &$autorizacionPrevDet) { 
    $pdf->Cell(10,5,$num,1,2,'C');  
    $num= $num+1;
}
//////////////////////////////////// nandina /////////////////////////////
$pdf->SetXY(30, 73);
$pdf->SetFont('Arial','',4);
foreach ($autorizacionPreviaDetalles as &$autorizacionPrevDet) { 
    $pdf->Cell(14,5,utf8_decode($autorizacionPrevDet->getCodigo_nandina()),1,2,'C');
    echo $autorizacionPreviaDetalle->getCodigo_nandina();
}
//////////////////////////////////// descripcion arancelaria/////////////////////////////
$pdf->SetXY(44, 73);
$pdf->SetFont('Arial','',4);
foreach ($autorizacionPreviaDetalles as &$autorizacionPrevDet) { 
    $pdf->Cell(28,5,utf8_decode($autorizacionPrevDet->getDescripcion_arancelaria()),1,2,'C');
}
//////////////////////////////////// descripcion comercial /////////////////////////////
$pdf->SetXY(72, 73);
$pdf->SetFont('Arial','',4);
foreach ($autorizacionPreviaDetalles as &$autorizacionPrevDet) { 
    $pdf->Cell(28,5,utf8_decode($autorizacionPrevDet->getDescripcion_comercial()),1,2,'C');
}
//////////////////////////////////// cantidad /////////////////////////////
$pdf->SetXY(100, 73);
$pdf->SetFont('Arial','',4);
foreach ($autorizacionPreviaDetalles as &$autorizacionPrevDet) { 
    $pdf->Cell(12,5,utf8_decode($autorizacionPrevDet->getCantidad()),1,2,'C');
}
//////////////////////////////////// unidad de medida /////////////////////////////
$pdf->SetXY(112, 73);
$pdf->SetFont('Arial','',4);
foreach ($autorizacionPreviaDetalles as &$autorizacionPrevDet) { 
    $pdf->Cell(12,5,utf8_decode($autorizacionPrevDet->getUnidad_medida()),1,2,'C');
}
//////////////////////////////////// peso bruto /////////////////////////////
$pdf->SetXY(124, 73);
$pdf->SetFont('Arial','',4);
foreach ($autorizacionPreviaDetalles as &$autorizacionPrevDet) { 
    $pdf->Cell(12,5,utf8_decode($autorizacionPrevDet->getPeso()),1,2,'C');
}
//////////////////////////////////// precio unitario /////////////////////////////
$pdf->SetXY(136, 73);
$pdf->SetFont('Arial','',4);
foreach ($autorizacionPreviaDetalles as &$autorizacionPrevDet) { 
    $pdf->Cell(12,5,utf8_decode($autorizacionPrevDet->getPrecio_unitario_fob()),1,2,'C');
}
//////////////////////////////////// valor total /////////////////////////////
$pdf->SetXY(148, 73);
$pdf->SetFont('Arial','',4);
foreach ($autorizacionPreviaDetalles as &$autorizacionPrevDet) { 
    $pdf->Cell(12,5,utf8_decode($autorizacionPrevDet->getFob()),1,2,'C');
}


///////////////////////////////// FIN DE LLENADO DE DATOS ////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////// MENU ///////////////////////////
///////////////////////////////// tipo de divisas ////////////////////////////////////
$pdf->SetXY(165, 58);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(15,6,utf8_decode('Tipo de Divisa'),1,2,'C');

///////////////////////////////// tipo de divisas ////////////////////////////////////
$pdf->SetXY(180, 58);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(15,6,utf8_decode('Tipo de Cambio'),1,2,'C'); 
//////////////////////////////////ESPACIO EN BLANCO //////////////////////////////////////
//////////////////////////////////espacio en blanco divisas //////////////////////////////////////
$pdf->SetXY(165, 64);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,4,'',1,0,'C'); 
//////////////////////////////////espacio en blanco tipo cambio //////////////////////////////////////
$pdf->SetXY(180, 64);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,4,'',1,0,'C'); 
//////////////////////////////////TITULOS MENU //////////////////////////////////////
//////////////////////////////////titulo divisas //////////////////////////////////////
$pdf->SetXY(165, 68);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(15,5,'PRECIO UNITARIO',1,0,'C'); 
//////////////////////////////////titulo tipo cambio //////////////////////////////////////
$pdf->SetXY(180, 68);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(15,5,'VALOR TOTAL',1,0,'C'); 


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////TITULOS MENU //////////////////////////////////////
//////////////////////////////////LLENADO DE DATOS //////////////////////////////////////
$pdf->SetXY(165, 73);
$pdf->SetFont('Arial','B',4);
foreach ($autorizacionPreviaDetalles as &$autorizacionPrevDet) { 
    $pdf->Cell(15,5,utf8_decode($autorizacionPrevDet->getValor_fob_total_divisa()),1,2,'C'); 
}

//////////////////////////////////titulo tipo cambio //////////////////////////////////////
$pdf->SetXY(180, 73);
$pdf->SetFont('Arial','B',4);
foreach ($autorizacionPreviaDetalles as &$autorizacionPrevDet) { 
    $pdf->Cell(15,5,utf8_decode($autorizacionPrevDet->getPrecio_unitario_fob_divisa()),1,2,'C');
}
 
////////////////////////////////////////////FIN LLENADO DE DATOS////////////////////////////////////////////////


$pdf->Output();
?>