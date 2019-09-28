<?php
session_start();
/* Controlar el acceso de los usuarios*/
define('_ACCESO','1');

//******************************** Datos del Certificado de Origen *********************************
include_once('../../../config/Config.php');
require_once(PATH_LIB . DS . 'fpdf'. DS .'fpdf.php');

include_once(PATH_TABLA . DS . 'CertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'COVenezuela.php');
include_once(PATH_TABLA . DS . 'COVenezuelaDdjjFactura.php');
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
include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');
include_once(PATH_TABLA . DS . 'DdjjAcuerdo.php');
include_once(PATH_TABLA . DS . 'DatosTercerOperador.php');

include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLCOVenezuela.php');
include_once(PATH_MODELO . DS . 'SQLCOVenezuelaDdjjFactura.php');
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
$co_venezuela = new COVenezuela();
$co_venezueladdjjfactura = new COVenezuelaDdjjFactura();
$criterio_origen = new CriterioOrigen();
$empresa = new Empresa();
$unidad_medida = new UnidadMedida();
$factura = new Factura();
$facturaNoDosificada = new FacturaNoDosificada();

$sqlCertificadoOrigen = new SQLCertificadoOrigen();
$sqlCOVenezuela = new SQLCOVenezuela();
$sqlCOVenezuelaDdjjFactura = new SQLCOVenezuelaDdjjFactura();
$sqlCriterioOrigen = new SQLCriterioOrigen();
$sqlEmpresa = new SQLEmpresa();
$sqlUnidadMedida = new SQLUnidadMedida();
$sqlFactura = new SQLFactura();
$sqlFacturaNoDosificada = new SQLFacturaNoDosificada();
$sqlDdjjAcuerdo = new SQLDdjjAcuerdo();
        
$certificado_origen->setId_certificado_origen($_REQUEST["co"]);
$certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
//print_r($certificado_origen->regional);
$co_venezuela->setId_certificado_origen($certificado_origen->getId_certificado_origen());
$co_venezuela=$sqlCOVenezuela->getListarCertificadosVenezuelaPorCO($co_venezuela);

$co_venezueladdjjfactura->setId_co_venezuela($co_venezuela->getId_co_venezuela());
$detalle_venezuela=$sqlCOVenezuelaDdjjFactura->getListarDdjjFacturasPorCoVenezuela($co_venezueladdjjfactura);

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
        $co_venezuela = new COVenezuela();
        $co_venezueladdjjfactura = new COVenezuelaDdjjFactura();
        $factura = new Factura();
        $facturaNoDosificada = new FacturaNoDosificada();

        $sqlCertificadoOrigen = new SQLCertificadoOrigen();
        $sqlCOVenezuela = new SQLCOVenezuela();
        $sqlCOVenezuelaDdjjFactura = new SQLCOVenezuelaDdjjFactura();
        $sqlCriterioOrigen = new SQLCriterioOrigen();
        $sqlFactura = new SQLFactura();
        $sqlFacturaNoDosificada = new SQLFacturaNoDosificada();

        $certificado_origen->setId_certificado_origen($_REQUEST["co"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);

        $co_venezuela->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_venezuela=$sqlCOVenezuela->getListarCertificadosVenezuelaPorCO($co_venezuela);

        $co_venezueladdjjfactura->setId_co_venezuela($co_venezuela->getId_co_venezuela());
        $detalle_venezuela=$sqlCOVenezuelaDdjjFactura->getListarDdjjFacturasPorCoVenezuela($co_venezueladdjjfactura);

        //Cell(width, height, text, border, position-next-cell, alignment);
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
        $this->Cell(50,4,utf8_decode('BOLIVIA'),0,0,'L');
        $this->SetFont('Times','B',9);
        $this->Cell(50,4,utf8_decode('(2) PAIS IMPORTADOR:'),0,0,'L');
        $this->SetFont('Times','',9);
        $this->Cell(50,4,utf8_decode($certificado_origen->pais->getNombre()),0,0,'L');
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

        $num_factura = 0;
        $fecha_factura = 0;
        $fac=$detalle_venezuela[0];

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

        $this->SetFont('Times','',8.5);
        $this->MultiCell(0,5,utf8_decode('          DECLARAMOS que las mercancías indicadas en el presente formulario, correspondientes a la Factura Comercial N° '.$num_factura.
                ' de Fecha  '.date("d/m/Y", strtotime($fecha_factura)).'  cumplen con lo establecido en las Normas de Origen del presente Acuerdo de Complementariedad Económica y Productiva de conformidad con el siguiente desglose'),0,'J',0);


    }
    
    function Footer()
    {
        $certificado_origen = new CertificadoOrigen();
        $co_venezuela = new COVenezuela();
        $empresa = new Empresa();
        
        $sqlCertificadoOrigen = new SQLCertificadoOrigen();
        $sqlCOVenezuela = new SQLCOVenezuela();
        $sqlEmpresa = new SQLEmpresa();
        
        $certificado_origen->setId_certificado_origen($_REQUEST["co"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);

        $co_venezuela->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_venezuela=$sqlCOVenezuela->getListarCertificadosVenezuelaPorCO($co_venezuela);

        $empresa->setId_empresa($_SESSION["id_empresa"]);
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);

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
        $this->MultiCell(95,8,utf8_decode($empresa->getRazon_Social()),0,'J',0);
        //Segunda fila
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 120, 8, 'D');
        $this->Cell(25,4,utf8_decode('11.2 Dirección :'),0,0,'L',0);
        $this->MultiCell(95,8,utf8_decode($empresa->getDireccion()),0,'J',0);
        //Tercera Fila
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 120, 4, 'D');
        $this->Cell(25,4,utf8_decode('11.3 Fecha :'),0,0,'L',0);
        $this->Cell(25,4,utf8_decode(date("d/m/Y", strtotime($certificado_origen->getFecha_llenado()))),0,0,'L',0);
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
        $this->MultiCell(95,8,utf8_decode($co_venezuela->getNombre_importador()),0,'J',0);
        //Sexta fila
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 120, 8, 'D');
        $this->Cell(25,4,utf8_decode('13.2 Dirección :'),0,0,'L',0);
        $this->MultiCell(95,8,utf8_decode($co_venezuela->getDireccion_importador()),0,'J',0);
        //Septima fila
        $this->Cell(120,5,utf8_decode('(14) Medio de Transporte:  '.$co_venezuela->medio_transporte->getDescripcion()),1,0,'L',0);
        $this->Ln();
        //Octava fila
        $this->Cell(120,5,utf8_decode('(15) Puerto o Lugar de Embraque:  '.$co_venezuela->getPuerto_lugar_embarque()),1,0,'L',0);
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
        $mensaje='';
        if($co_venezuela->getId_datos_tercer_operador()!=0){
            $datos_tercer_operador= new DatosTercerOperador();
            $sqlDatosTercerOperador = new SQLDatosTercerOperador();
            $datos_tercer_operador->setId_datos_tercer_operador($co_aladi->getId_datos_tercer_operador());
            $datos_tercer_operador=$sqlDatosTercerOperador->getBuscarDatosTercerOperadorPorId($datos_tercer_operador);
            $mensaje='Las mercancías descritas en el presente Certificado, serán facturadas por la empresa '.$datos_tercer_operador->getNombre().', domiciliada en '.$datos_tercer_operador->getDireccion().', Ciudad '.$datos_tercer_operador->getCiudad().' - '.$datos_tercer_operador->getPais().'. ';
        }
        $observ=$mensaje.$co_venezuela->getObservaciones();
        $this->MultiCell(198,4,utf8_decode($observ),0,'J',0);
        
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
        $this->Cell(90,5,utf8_decode($certificado_origen->regional->getCiudad().' - BOLIVIA'),0,0,'C',0);
        $this->Ln(12);
        $this->SetFont('Times','B',9);
        //$fecha_emision = fechaConDiayMesLiteral($certificado_origen->getFecha_emision());
        $this->Cell(90,5,utf8_decode('En fecha:'),0,0,'L',0);
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
            $this->SetXY(7,122);
            $x=$this->GetX();
            $y=$this->GetY();
            //Si primer_orden y ultimo_orden son iguales entonces solo hay un elemento
            if($primer_orden==$ultimo_orden){
                $this->Cell(14,4,utf8_decode($primer_orden),0,0,'C',0);
            }else{
                $this->Cell(14,4,utf8_decode($primer_orden."-".$ultimo_orden),0,0,'C',0);
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
            
            $this->SetXY(7,122);
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

                                $this->Cell(14,4,utf8_decode($imprimir_orden),0,0,'C',0);
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

                                $this->Cell(14,4,utf8_decode($imprimir_orden),0,0,'C',0);
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

                                $this->Cell(14,4,utf8_decode($imprimir_orden),0,0,'C',0);
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

                                $this->Cell(14,4,utf8_decode($imprimir_orden),0,0,'C',0);
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

                                $this->Cell(14,4,utf8_decode($imprimir_orden),0,0,'C',0);
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

                                $this->Cell(14,4,utf8_decode($imprimir_orden),0,0,'C',0);
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
$pdf->SetAutoPageBreak(true,5);
$pdf->AddPage();

//************************** INICIO DEL ARMADO DEL PDF *************************
$hojas = array();

$numero_hoja = 1;
$contador = 0;
$filas=0;
$aux=1;
//Limite Máximo de filas en un certificado
$tope_filas=10;
//Cantidad de filas en una hoja, esto se ira sumando
$cantidad_filas = 0;

//Para la primera vez se debe construir la tabla
$pdf->construir_tabla_normas_origen();

$pdf->SetXY(7,44);

$cadena_normas='';
$cadena_orden='';

foreach($detalle_venezuela as $row){
    $contador++;
    $cadena='';
    $long = strlen($row['denominacion_mercaderia']);
    //echo "Longitud ".$row['numero_orden'].": ".$long."<br>";
    if($long>65){
        if($long>130){
            if($long>195){
                if($long>260){
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
    }else{
        //Para ir almacenando los valores de los arrays
        $cadena_orden=$cadena_orden.$row['numero_orden'].",";
        $cadena_normas = $cadena_normas.$ddjj_acuerdo->getId_Criterio_Origen()."|";
    }
    
    $pdf->Cell(14,5,utf8_decode($row['numero_orden']),0,0,'C',0);
    $pdf->Cell(20,5,utf8_decode($row['clasif_arancelaria']),0,0,'C',0);
    $x=$pdf->GetX();
    $y=$pdf->GetY();
    switch($filas){
        case 1: $pdf->Cell(112,5,utf8_decode($row['denominacion_mercaderia']),0,0,'L',0);
            break;
        default:$pdf->MultiCell(112,5,utf8_decode($row['denominacion_mercaderia']),0,'L',0);
                $pdf->SetXY($x+112,$y);
            break;
    }
    $pdf->Cell(25,5,utf8_decode($peso_cant),0,0,'R',0);
    $pdf->Cell(25,5,utf8_decode($row['valor_fob']),0,0,'R',0);
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

/*
$pdf->SetXY(7,42);
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->Rect($x, $y, 14, 55, 'D');
$pdf->Rect($x, $y, 34, 55, 'D');
$pdf->Rect($x, $y, 146, 55, 'D');
$pdf->Rect($x, $y, 173, 55, 'D');
$pdf->Rect($x, $y, 198, 55, 'D');
$pdf->SetFont('Times','',8);
 * 
*/

/*
foreach($detalle_venezuela as $row){
    $x=$pdf->GetX();
    $y=$pdf->GetY();
    $pdf->Cell(14,5,utf8_decode($row['numero_orden']),0,0,'C',0);
    $pdf->Cell(20,5,utf8_decode($row['clasif_arancelaria']),0,0,'C',0);
    $pdf->MultiCell(112,5,utf8_decode($row['denominacion_mercaderia']),0,'L',0);
    $pdf->SetXY($x+146,$y);
    
    unset($unidad_medida);
    $unidad_medida = new UnidadMedida();
    $unidad_medida->setId_Unidad_Medida($row['unidad_medida']);
    $unidad_medida=$sqlUnidadMedida->getBuscarDescripcionPorId($unidad_medida);
    //var_dump($unidad_medida);
    $pdf->Cell(25,5,utf8_decode($row['peso_cantidad'].' '.$unidad_medida->getAbreviatura()),0,0,'R',0);
    //$pdf->Cell(27,5,utf8_decode($row['peso_cantidad']),0,0,'R',0);
    $pdf->Cell(25,5,utf8_decode($row['valor_fob']),0,0,'R',0);
    $pdf->Ln();
}
 */
/*
$pdf->SetFont('Times','B',9);
$pdf->SetXY(7,97);
$pdf->Cell(0,5,utf8_decode('(8) DECLARACIÓN DE ORIGEN'),0,0,'C',0);
$pdf->Ln();

$num_factura = 0;
$fecha_factura = 0;
$fac=$detalle_venezuela[0];

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

$pdf->SetFont('Times','',8.5);
$pdf->MultiCell(0,5,utf8_decode('          DECLARAMOS que las mercancías indicadas en el presente formulario, correspondientes a la Factura Comercial N° '.$num_factura.
        ' de Fecha  '.date("d/m/Y", strtotime($fecha_factura)).'  cumplen con lo establecido en las Normas de Origen del presente Acuerdo de Complementariedad Económica y Productiva de conformidad con el siguiente desglose'),0,'J',0);

*/
/*
$pdf->SetFont('Times','B',8);
$pdf->SetXY(7,114);
$x=$pdf->GetX();
$y=$pdf->GetY();
$pdf->Rect($x, $y, 14, 30, 'D');
$pdf->Rect($x, $y, 198, 30, 'D');
// NORMAS DE ORIGEN
$pdf->MultiCell(14,4,utf8_decode('(9) No. de Orden'),1,'C',0);
$pdf->SetXY($x+14,$y);
$pdf->Cell(184,8,utf8_decode('(10). Normas'),1,0,'C',0);
$pdf->SetFont('Times','',8);
*/
$pdf->Output();
$db->Close();
$pdf->close();

?>