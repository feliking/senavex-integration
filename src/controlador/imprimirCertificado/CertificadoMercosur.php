<?php
session_start();
/* Controlar el acceso de los usuarios*/
define('_ACCESO','1');

//******************************** Datos del Certificado de Origen *********************************
include_once('../../../config/Config.php');
require_once(PATH_LIB . DS . 'fpdf'. DS .'fpdf.php');

include_once(PATH_TABLA . DS . 'CertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'COMercosur.php');
include_once(PATH_TABLA . DS . 'COMercosurDdjjFactura.php');
include_once(PATH_TABLA . DS . 'EstadoCO.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'CriterioOrigen.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'FacturaTercerOperador.php');
include_once(PATH_TABLA . DS . 'MedioTransporte.php');
include_once(PATH_TABLA . DS . 'Factura.php');
include_once(PATH_TABLA . DS . 'FacturaNoDosificada.php');
include_once(PATH_TABLA . DS . 'UnidadMedida.php');
include_once(PATH_TABLA . DS . 'DdjjAcuerdo.php');
include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');
include_once(PATH_TABLA . DS . 'DatosTercerOperador.php');

include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLCOMercosur.php');
include_once(PATH_MODELO . DS . 'SQLCOMercosurDdjjFactura.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLCriterioOrigen.php');
include_once(PATH_MODELO . DS . 'SQLRegional.php');
include_once(PATH_MODELO . DS . 'SQLFacturaTercerOperador.php');
include_once(PATH_MODELO . DS . 'SQLFactura.php');
include_once(PATH_MODELO . DS . 'SQLFacturaNoDosificada.php');
include_once(PATH_MODELO . DS . 'SQLUnidadMedida.php');
include_once(PATH_MODELO . DS . 'SQLDdjjAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLDatosTercerOperador.php');

$certificado_origen = new CertificadoOrigen();
$co_mercosur = new COMercosur();
$co_mercosurddjjfactura = new COMercosurDdjjFactura();
$criterio_origen = new CriterioOrigen();
$empresa = new Empresa();
$unidad_medida = new UnidadMedida();
$ddjj_acuerdo = new DdjjAcuerdo();

$sqlCertificadoOrigen = new SQLCertificadoOrigen();
$sqlCOMercosur = new SQLCOMercosur();
$sqlCOMercosurDdjjFactura = new SQLCOMercosurDdjjFactura();
$sqlCriterioOrigen = new SQLCriterioOrigen();
$sqlEmpresa = new SQLEmpresa();
$sqlUnidadMedida = new SQLUnidadMedida();
$sqlDdjjAcuerdo = new SQLDdjjAcuerdo();

$certificado_origen->setId_certificado_origen($_REQUEST["co"]);
$certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
//print_r($certificado_origen->regional);
$co_mercosur->setId_certificado_origen($certificado_origen->getId_certificado_origen());
$co_mercosur=$sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);

$co_mercosurddjjfactura->setId_co_mercosur($co_mercosur->getId_co_mercosur());
$detalle_mercosur=$sqlCOMercosurDdjjFactura->getListarDdjjFacturasPorCoMercosur($co_mercosurddjjfactura);

$empresa->setId_empresa($_SESSION["id_empresa"]);
$empresa=$sqlEmpresa->getEmpresaPorID($empresa);

$elegir_acuerdo = $certificado_origen->getId_acuerdo();
$criterio_origen->setId_Acuerdo($elegir_acuerdo);
$criterio_origen = $sqlCriterioOrigen->getListarCriterioPorAcuerdo($criterio_origen);
//************* CLASE DEL CERTIFICADO PDF
class PDF extends FPDF
{	
    function Header()
    {	
        $certificado_origen = new CertificadoOrigen();
        $co_mercosur = new COMercosur();
        $co_mercosurddjjfactura = new COMercosurDdjjFactura();
        $regional = new Regional();
        $empresa = new Empresa();
        $factura = new Factura();
        $facturaNoDosificada = new FacturaNoDosificada();

        $sqlCertificadoOrigen = new SQLCertificadoOrigen();
        $sqlCOMercosur = new SQLCOMercosur();
        $sqlCOMercosurDdjjFactura = new SQLCOMercosurDdjjFactura();
        $sqlCriterioOrigen = new SQLCriterioOrigen();
        $sqlEmpresa = new SQLEmpresa();
        $sqlRegional = new SQLRegional();
        $sqlFactura = new SQLFactura();
        $sqlFacturaNoDosificada = new SQLFacturaNoDosificada();

        $certificado_origen->setId_certificado_origen($_REQUEST["co"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        //print_r($certificado_origen->regional);
        $co_mercosur->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_mercosur=$sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);

        $co_mercosurddjjfactura->setId_co_mercosur($co_mercosur->getId_co_mercosur());
        $detalle_mercosur=$sqlCOMercosurDdjjFactura->getListarDdjjFacturasPorCoMercosur($co_mercosurddjjfactura);

        $empresa->setId_empresa($_SESSION["id_empresa"]);
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
        
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
        $this->Cell(67,7,utf8_decode($empresa->getRazon_Social()),0,0,'L',0);
        $this->Rect($x+110, $y, 90, 14, 'D');
        $this->Cell(2,7,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(35,7,utf8_decode('Identificación del Número'),0,0,'L',0);
        $this->Ln();
        $this->Cell(3,7,utf8_decode(''),0,0,'L',0);
        $this->Cell(40,4,utf8_decode('(Nombre, Dirección, País)'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(67,7,utf8_decode($empresa->getDireccion().' - BOLIVIA'),0,0,'L',0);
        $this->Cell(2,7,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(35,4,utf8_decode('(Número)'),0,0,'L',0);
        $this->SetFont('Times','B',12);
        $this->Cell(40,7,utf8_decode($co_mercosur->getCorrelativo_mercosur()),0,0,'C',0);
        $this->Ln();
        
        //Segunda Fila
        $this->SetFont('Times','B',8);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 110, 14, 'D');
        $this->Cell(3,7,utf8_decode('2.'),0,0,'L',0);
        $this->Cell(40,7,utf8_decode('Importador'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(67,7,utf8_decode($co_mercosur->getNombre_importador()),0,0,'L',0);
        $this->Rect($x+110, $y, 90, 28, 'D');
        $this->Cell(2,7,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(35,7,utf8_decode('Nombre de la Entidad Emisota del Certificado'),0,0,'L',0);
        $this->Ln();
        $this->Cell(3,7,utf8_decode(''),0,0,'L',0);
        $this->Cell(40,4,utf8_decode('(Nombre, Dirección, País)'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(67,7,utf8_decode($co_mercosur->getDireccion_importador().' - '. $co_mercosur->getId_pais_importador()),0,0,'L',0);
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
        $this->Cell(67,7,utf8_decode($co_mercosur->getNombre_consignatario()),0,0,'L',0);
        $this->Cell(2,7,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(15,7,utf8_decode('Dirección:'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(73,7,utf8_decode($certificado_origen->regional->getDireccion()),0,0,'L',0);
        $this->Ln();
        $this->SetFont('Times','B',8);
        $this->Cell(3,7,utf8_decode(''),0,0,'L',0);
        $this->Cell(40,4,utf8_decode('(Nombre, País)'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(67,7,utf8_decode($co_mercosur->getId_pais_consignatario()),0,0,'L',0);
        $this->Cell(2,7,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(15,7,utf8_decode('Ciudad:'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(30,7,utf8_decode($certificado_origen->regional->getCiudad()),0,0,'L',0);
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
        $this->Cell(67,5,utf8_decode($co_mercosur->getPuerto_lugar_embarque()),0,0,'L',0);
        $this->Cell(2,5,utf8_decode(''),0,0,'L',0);
        $this->Cell(10,5,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(70,5,utf8_decode($certificado_origen->pais->getNombre()),0,0,'L',0);
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
        $this->Cell(67,5,utf8_decode($co_mercosur->medio_transporte->getDescripcion()),0,0,'L',0);
        $this->Cell(2,5,utf8_decode(''),0,0,'L',0);
        $this->SetFont('Times','B',8);
        
        $num_factura = 0;
        $fecha_factura = 0;
        //var_dump($detalle_mercosur[0]['id_tipo_factura']);
        $fac=$detalle_mercosur[0];
        
        if($fac['id_tipo_factura']==1){
            $factura->setId_factura($fac['id_factura']);
            $factura=$sqlFactura->getFacturaPorID($factura);
            $num_factura = $factura->getNumero_Factura();
            $fecha_factura = $factura->getFecha_Emision();
        }
        if($fac['id_tipo_factura']==2){
            $facturaNoDosificada->setId_factura_no_dosificada($fac['id_factura']);
            $facturaNoDosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturaNoDosificada);
            $num_factura = $facturaNoDosificada->getNumero_Factura();
            $fecha_factura = $facturaNoDosificada->getFecha_Emision();
        }
        
        $this->Cell(15,5,utf8_decode('Número:'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(30,5,utf8_decode($num_factura),0,0,'L',0);
        $this->SetFont('Times','B',8);
        $this->Cell(15,5,utf8_decode('Fecha:'),0,0,'L',0);
        $this->SetFont('Times','',8);
        $this->Cell(30,5,utf8_decode($fecha_factura),0,0,'L',0);
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
        $certificado_origen = new CertificadoOrigen();
        $co_mercosur = new COMercosur();
        $sqlCertificadoOrigen = new SQLCertificadoOrigen();
        $sqlCOMercosur = new SQLCOMercosur();

        $certificado_origen->setId_certificado_origen($_REQUEST["co"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);

        $co_mercosur->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_mercosur=$sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);

        // Posición: a 8.8 cm del final
        $this->SetY(-88);

        //$this->SetXY(7,209);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 200, 15, 'D');
        $this->SetFont('Times','B',8);
        $this->Cell(2,5,utf8_decode(''),0,0,'C',0);
        $mensaje='';
        
        if($co_mercosur->getId_datos_tercer_operador()!=0){
            $datos_tercer_operador= new DatosTercerOperador();
            $sqlDatosTercerOperador = new SQLDatosTercerOperador();
            $datos_tercer_operador->setId_datos_tercer_operador($co_mercosur->getId_datos_tercer_operador());
            $datos_tercer_operador=$sqlDatosTercerOperador->getBuscarDatosTercerOperadorPorId($datos_tercer_operador);
            
            $mensaje='Las mercancías descritas en el presente Certificado, serán facturadas por la empresa '.$datos_tercer_operador->getNombre().', domiciliada en '.$datos_tercer_operador->getDireccion().', Ciudad '.$datos_tercer_operador->getCiudad().' - '.$datos_tercer_operador->getPais().'. ';
        }
        $observ=$mensaje.$co_mercosur->getObservaciones();

        $this->Cell(198,5,utf8_decode('14. Observaciones'),0,0,'L',0);
        $this->Ln();
        $this->SetFont('Times','',7);
        $this->Cell(4,10,utf8_decode(''),0,0,'C',0);
        $this->MultiCell(194,5,utf8_decode($observ),0,'J',0);

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
        $fecha_llenado = fechaConDiayMesLiteral($certificado_origen->getFecha_llenado());
        $this->Cell(70,5,utf8_decode($fecha_llenado),0,0,'L');
        $this->Cell(8,5,utf8_decode(''),0,0,'R');
        $this->SetFont('Times','B',9);
        $this->Cell(20,5,utf8_decode('FECHA'),0,0,'L');
        $this->SetFont('Times','',9);
        $fecha_emi = fechaConDiayMesLiteral($certificado_origen->getFecha_emision());
        $this->Cell(70,5,utf8_decode($fecha_emi),0,0,'L');
        $this->Ln(17);
        $this->SetFont('Times','B',9);
        $this->Cell(12,5,utf8_decode(''),0,0,'R');
        $this->Cell(84,5,utf8_decode('Sello y Firma'),0,0,'C');
        $this->Cell(8,5,utf8_decode(''),0,0,'R');
        $this->Cell(90,5,utf8_decode('Sello y Firma'),0,0,'C');
    }
    
    //Funcion para construir las tablas de las normas de origen en varias hojas
    function construir_tabla_normas_origen(){
        $certificado_origen = new CertificadoOrigen();
        $co_mercosur = new COMercosur();
        $sqlCertificadoOrigen = new SQLCertificadoOrigen();
        $sqlCOMercosur = new SQLCOMercosur();

        $certificado_origen->setId_certificado_origen($_REQUEST["co"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);

        $co_mercosur->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_mercosur=$sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);

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
    
    //Funcion para construir las tablas de las normas de origen en varias hojas
    function desglosar_normas_origen($cadena_normas,$cadena_orden,$criterio_origen){
        $sqlCriterioOrigen = new SQLCriterioOrigen();

        $norma=explode("|",$cadena_normas);
        $orden=explode(",", $cadena_orden);
        
        $longitud_orden = count($orden);
        
        $primer_criterio = $norma[0];
        $primer_orden = $orden[0];
        $ultimo_orden = $orden[$longitud_orden-1];

        $bandera=0;
        for($i=0;$i<$longitud_orden;$i++){
            if($primer_criterio!=$norma[$i]){
                $bandera=1;
            }
        }
        
        //Si bandera es 0 todos tienen el mismo criterio de origen
        if($bandera==0){
            $this->SetXY(7,187);
            $x=$this->GetX();
            $y=$this->GetY();
            //Si primer_orden y ultimo_orden son iguales entonces solo hay un elemento
            if($primer_orden==$ultimo_orden){
                $this->Cell(16,4,utf8_decode($primer_orden),0,0,'C',0);
            }else{
                $this->Cell(16,4,utf8_decode($primer_orden."-".$ultimo_orden),0,0,'C',0);
            }
            $this->Cell(5,4,'',0,0,'C',0);
            
            unset($criterio_origen);
            $criterio_origen = new CriterioOrigen();
            
            $criterio_origen->setId_criterio_origen($primer_criterio);
            $criterio_origen=$sqlCriterioOrigen->getBuscarDescripcionPorId($criterio_origen);
            
            $this->Cell(179,4,utf8_decode($criterio_origen->getDescripcion()),0,0,'L',0);
        //Sino hay que hacer un recorrido para ir desglosando por numero
        }else{
            $cantidad_criterios = count($criterio_origen);
            
            $cadena_criterios = array();
            $i=0;
            foreach($criterio_origen as $crit){
                $cadena_criterios[$i][0] = $crit->getId_criterio_origen();
                $cadena_criterios[$i][1] = $crit->getDescripcion();
                $cadena_criterios[$i][2] = '';
                $i++;
            }
            
            for($j=0;$j<$longitud_orden;$j++){
                for($k=0; $k<$cantidad_criterios;$k++){
                    if($cadena_criterios[$k][0]==$norma[$j]){
                       $cadena_criterios[$k][2] = $cadena_criterios[$k][2].$orden[$j].","; 
                    }
                }
            }
            
            $this->SetXY(7,187);
            $x=$this->GetX();
            $y=$this->GetY();
            for($k=0; $k<$cantidad_criterios;$k++){
                $cadena_criterios[$k][2] = substr($cadena_criterios[$k][2], 0, strlen($cadena_criterios[$k][2]) - 1);
                
                if($cadena_criterios[$k][2]!=''){
                    $contenido_cadena_criterios = explode(",", $cadena_criterios[$k][2]);
                    $longitud_contenido_cadena_criterios = count($contenido_cadena_criterios);
                    
                    switch(TRUE){
                        
                        case ($longitud_contenido_cadena_criterios<5):
                                $imprimir_orden = '';
                                for($l=0;$l<$longitud_contenido_cadena_criterios;$l++){
                                    $imprimir_orden = $imprimir_orden.$contenido_cadena_criterios[$l].",";
                                }
                                $imprimir_orden = substr($imprimir_orden, 0, strlen($imprimir_orden) - 1);

                                $this->Cell(16,4,utf8_decode($imprimir_orden),0,0,'C',0);
                                $this->Cell(5,4,'',0,0,'C',0);

                                unset($criterio_origen);
                                $criterio_origen = new CriterioOrigen();

                                $criterio_origen->setId_criterio_origen($cadena_criterios[$k][0]);
                                $criterio_origen=$sqlCriterioOrigen->getBuscarDescripcionPorId($criterio_origen);

                                $this->Cell(179,4,utf8_decode($criterio_origen->getDescripcion()),0,0,'L',0);
                                $this->Ln();
                            break;
                        case ($longitud_contenido_cadena_criterios<9):
                                //Primera FILA
                                $imprimir_orden = '';
                                for($l=0;$l<4;$l++){
                                    $imprimir_orden = $imprimir_orden.$contenido_cadena_criterios[$l].",";
                                }
                                $imprimir_orden = substr($imprimir_orden, 0, strlen($imprimir_orden) - 1);

                                $this->Cell(16,4,utf8_decode($imprimir_orden),0,0,'C',0);
                                $this->Cell(5,4,'',0,0,'C',0);

                                unset($criterio_origen);
                                $criterio_origen = new CriterioOrigen();

                                $criterio_origen->setId_criterio_origen($cadena_criterios[$k][0]);
                                $criterio_origen=$sqlCriterioOrigen->getBuscarDescripcionPorId($criterio_origen);

                                $this->Cell(179,4,utf8_decode($criterio_origen->getDescripcion()),0,0,'L',0);
                                $this->Ln();
                                
                                //Segunda FILA
                                $imprimir_orden = '';
                                for($l=4;$l<$longitud_contenido_cadena_criterios;$l++){
                                    $imprimir_orden = $imprimir_orden.$contenido_cadena_criterios[$l].",";
                                }
                                $imprimir_orden = substr($imprimir_orden, 0, strlen($imprimir_orden) - 1);

                                $this->Cell(16,4,utf8_decode($imprimir_orden),0,0,'C',0);
                                $this->Cell(5,4,'',0,0,'C',0);

                                unset($criterio_origen);
                                $criterio_origen = new CriterioOrigen();

                                $criterio_origen->setId_criterio_origen($cadena_criterios[$k][0]);
                                $criterio_origen=$sqlCriterioOrigen->getBuscarDescripcionPorId($criterio_origen);

                                $this->Cell(179,4,utf8_decode($criterio_origen->getDescripcion()),0,0,'L',0);
                                $this->Ln();
                                
                            break;
                        case ($longitud_contenido_cadena_criterios<13):
                                //Primera FILA
                                $imprimir_orden = '';
                                for($l=0;$l<4;$l++){
                                    $imprimir_orden = $imprimir_orden.$contenido_cadena_criterios[$l].",";
                                }
                                $imprimir_orden = substr($imprimir_orden, 0, strlen($imprimir_orden) - 1);

                                $this->Cell(16,4,utf8_decode($imprimir_orden),0,0,'C',0);
                                $this->Cell(5,4,'',0,0,'C',0);

                                unset($criterio_origen);
                                $criterio_origen = new CriterioOrigen();

                                $criterio_origen->setId_criterio_origen($cadena_criterios[$k][0]);
                                $criterio_origen=$sqlCriterioOrigen->getBuscarDescripcionPorId($criterio_origen);

                                $this->Cell(179,4,utf8_decode($criterio_origen->getDescripcion()),0,0,'L',0);
                                $this->Ln();
                                
                                //Segunda FILA
                                $imprimir_orden = '';
                                for($l=4;$l<8;$l++){
                                    $imprimir_orden = $imprimir_orden.$contenido_cadena_criterios[$l].",";
                                }
                                $imprimir_orden = substr($imprimir_orden, 0, strlen($imprimir_orden) - 1);

                                $this->Cell(16,4,utf8_decode($imprimir_orden),0,0,'C',0);
                                $this->Cell(5,4,'',0,0,'C',0);

                                unset($criterio_origen);
                                $criterio_origen = new CriterioOrigen();

                                $criterio_origen->setId_criterio_origen($cadena_criterios[$k][0]);
                                $criterio_origen=$sqlCriterioOrigen->getBuscarDescripcionPorId($criterio_origen);

                                $this->Cell(179,4,utf8_decode($criterio_origen->getDescripcion()),0,0,'L',0);
                                $this->Ln();
                                
                                //Tercera FILA
                                $imprimir_orden = '';
                                for($l=8;$l<$longitud_contenido_cadena_criterios;$l++){
                                    $imprimir_orden = $imprimir_orden.$contenido_cadena_criterios[$l].",";
                                }
                                $imprimir_orden = substr($imprimir_orden, 0, strlen($imprimir_orden) - 1);

                                $this->Cell(16,4,utf8_decode($imprimir_orden),0,0,'C',0);
                                $this->Cell(5,4,'',0,0,'C',0);

                                unset($criterio_origen);
                                $criterio_origen = new CriterioOrigen();

                                $criterio_origen->setId_criterio_origen($cadena_criterios[$k][0]);
                                $criterio_origen=$sqlCriterioOrigen->getBuscarDescripcionPorId($criterio_origen);

                                $this->Cell(179,4,utf8_decode($criterio_origen->getDescripcion()),0,0,'L',0);
                                $this->Ln();
                            break;
                    }
                    
                }
                
            }
        }
    }
}

function fechaConDiayMesLiteral($fecha){
    $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
    
    $fecha = substr($fecha,0,11);
    $array_fecha = explode("-", $fecha);
    $fecha = $array_fecha[2]."/".$array_fecha[1]."/".$array_fecha[0];
    
    $dia = $dias[date('N', strtotime($fecha))];
    $mes = $array_fecha[1];
    switch ($mes){
        case '01': $mes_literal="enero"; break;
        case '02': $mes_literal="febrero"; break;
        case '03': $mes_literal="marzo"; break;
        case '04': $mes_literal="abril"; break;
        case '05': $mes_literal="mayo"; break;
        case '06': $mes_literal="junio"; break;
        case '07': $mes_literal="julio"; break;
        case '08': $mes_literal="agosto"; break;
        case '09': $mes_literal="septiembre"; break;
        case '10': $mes_literal="octubre"; break;
        case '11': $mes_literal="noviembre"; break;
        case '12': $mes_literal="diciembre"; break;
    }
    $fecha_transformada = $dia.' '. $array_fecha[2].' de '.$mes_literal.' de '.$array_fecha[0];
    return $fecha_transformada;
}

//Instanciation of inherited class
$pdf=new PDF('P','mm','A4');

$pdf->AliasNbPages();
$pdf->SetMargins(7,5,5);
$pdf->SetAutoPageBreak(true,0);
$pdf->AddPage();

//************************** INICIO DEL ARMADO DEL PDF *************************
$hojas = array();

$numero_hoja = 1;
$contador = 0;
$filas=0;
$aux=1;
//Limite Máximo de filas en un certificado
$tope_filas=7;
//Cantidad de filas en una hoja, esto se ira sumando
$cantidad_filas = 0;

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

$cadena_normas='';
$cadena_orden='';
foreach($detalle_mercosur as $row){
    $contador++;

    $cadena='';
    
    $long = strlen($row['denominacion_mercaderia']);
    //echo "Longitud ".$row['numero_orden'].": ".$long."<br>";
    if($long>60){
        if($long>120){
            if($long>180){
                if($long>240){
                    $filas=5;
                }else{
                    $filas=4;
                }
            }else{
                $filas=3;
            }
        }else{
            $filas=2;
        }
    }else{
        $filas=1;
    }
    
    $cantidad_filas=$cantidad_filas+$filas;
    
    if($cantidad_filas>$tope_filas){
        $numero_hoja++;
        $cantidad_filas=0;
        $cantidad_filas=$cantidad_filas+$filas;
    }
    //echo $numero_hoja.'-'.$cantidad_filas."<br>";
    unset($unidad_medida);
    $unidad_medida = new UnidadMedida();
    $unidad_medida->setId_Unidad_Medida($row['unidad_medida']);
    $unidad_medida=$sqlUnidadMedida->getBuscarDescripcionPorId($unidad_medida);
    $peso_cant=$row['peso_cantidad'].' '.$unidad_medida->getAbreviatura();
    
    unset($ddjj_acuerdo);
    $ddjj_acuerdo = new DdjjAcuerdo();
    $ddjj_acuerdo->setId_ddjj($row['id_ddjj']);
    $ddjj_acuerdo->setId_Acuerdo($elegir_acuerdo);
    $ddjj_acuerdo=$sqlDdjjAcuerdo->getListarDDJJAcuerdoPorDDJJyAcuerdo($ddjj_acuerdo);
    
    $cadena=$filas.'|'.$row['numero_orden'].'|'.$row['clasif_arancelaria'].'|'.$row['denominacion_mercaderia'].'|'.$peso_cant.'|'.$row['valor_fob'].'|'.$ddjj_acuerdo->getId_Criterio_Origen();
    
    $hojas[$contador][0]=$numero_hoja;
    $hojas[$contador][1]=$cadena;
    
    if($numero_hoja<>$aux){
        //Para array de Normas
        $cadena_normas = substr($cadena_normas, 0, strlen($cadena_normas) - 1);
        $cadena_orden = substr($cadena_orden, 0, strlen($cadena_orden) - 1);
        
        $pdf->desglosar_normas_origen($cadena_normas,$cadena_orden,$criterio_origen);

        $cadena_normas='';
        $cadena_normas = $cadena_normas.$ddjj_acuerdo->getId_Criterio_Origen()."|";
        $cadena_orden='';
        $cadena_orden=$cadena_orden.$row['numero_orden'].",";
        
        $pdf->AddPage();
        $aux=$numero_hoja;
        //Colocar funcion para construir tabla de normas de origen
        $pdf->construir_tabla_normas_origen();
        $pdf->SetXY(7,109);
        $x=$pdf->GetX();
        $y=$pdf->GetY();
        $pdf->Rect($x, $y, 16, 70, 'D');
        $pdf->Rect($x, $y, 37, 70, 'D');
        $pdf->Rect($x, $y, 147, 70, 'D');
        $pdf->Rect($x, $y, 174, 70, 'D');
        $pdf->Rect($x, $y, 200, 70, 'D');
    }else{
        //Para ir almacenando los valores de los arrays
        $cadena_orden=$cadena_orden.$row['numero_orden'].",";
        $cadena_normas = $cadena_normas.$ddjj_acuerdo->getId_Criterio_Origen()."|";
    }
    
    $pdf->Cell(16,5,utf8_decode($row['numero_orden']),0,0,'C',0);
    $pdf->Cell(21,5,utf8_decode($row['clasif_arancelaria']),0,0,'C',0);
    $pdf->Cell(5,5,'',0,0,'C',0);
    $x=$pdf->GetX();
    $y=$pdf->GetY();
    switch($filas){
        case 1: $pdf->Cell(102,5,utf8_decode($row['denominacion_mercaderia']),0,0,'L',0);
            break;
        default:$pdf->MultiCell(102,5,utf8_decode($row['denominacion_mercaderia']),0,'L',0);
                $pdf->SetXY($x+102,$y);
            break;
    }
    $pdf->Cell(30,5,utf8_decode($peso_cant),0,0,'R',0);
    $pdf->Cell(26,5,utf8_decode($row['valor_fob']),0,0,'R',0);
    switch($filas){
        case 1: $pdf->Ln();
            break;
        case 2:$pdf->Ln(10);
            break;
    }
}

$cadena_normas = substr($cadena_normas, 0, strlen($cadena_normas) - 1);
$cadena_orden = substr($cadena_orden, 0, strlen($cadena_orden) - 1);

$pdf->desglosar_normas_origen($cadena_normas,$cadena_orden,$criterio_origen);

$pdf->Output();
$db->Close();
$pdf->close();

?>