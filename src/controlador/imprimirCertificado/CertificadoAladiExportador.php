<?php
session_start();
/* Controlar el acceso de los usuarios*/
define('_ACCESO','1');

//******************************** Datos del Certificado de Origen *********************************
include_once('../../../config/Config.php');
require_once(PATH_LIB . DS . 'fpdf'. DS .'fpdf.php');

include_once(PATH_TABLA . DS . 'CertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'COAladi.php');
include_once(PATH_TABLA . DS . 'COAladiDdjjFactura.php');
include_once(PATH_TABLA . DS . 'EstadoCO.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'DdjjAcuerdo.php');
include_once(PATH_TABLA . DS . 'CriterioOrigen.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');
include_once(PATH_TABLA . DS . 'DatosTercerOperador.php');

include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLCOAladi.php');
include_once(PATH_MODELO . DS . 'SQLCOAladiDdjjFactura.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLDdjjAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLCriterioOrigen.php');
include_once(PATH_MODELO . DS . 'SQLDatosTercerOperador.php');

$certificado_origen = new CertificadoOrigen();
$co_aladi = new COAladi();
$co_aladiddjjfactura = new COAladiDdjjFactura();
$ddjj_acuerdo = new DdjjAcuerdo();
$criterio_origen = new CriterioOrigen();

$sqlCertificadoOrigen = new SQLCertificadoOrigen();
$sqlCOAladi = new SQLCOAladi();
$sqlCOAladiDdjjFactura = new SQLCOAladiDdjjFactura();
$sqlCriterioOrigen = new SQLCriterioOrigen();
$sqlDdjjAcuerdo = new SQLDdjjAcuerdo();

$certificado_origen->setId_certificado_origen($_REQUEST["co"]);
$certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);

$co_aladi->setId_certificado_origen($certificado_origen->getId_certificado_origen());
$co_aladi=$sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);

$co_aladiddjjfactura->setId_co_aladi($co_aladi->getId_co_aladi());
$detalle_aladi=$sqlCOAladiDdjjFactura->getListarDdjjFacturasPorCoAladi($co_aladiddjjfactura);

$elegir_acuerdo = $certificado_origen->getId_acuerdo();
$criterio_origen->setId_Acuerdo($elegir_acuerdo);
$criterio_origen = $sqlCriterioOrigen->getListarCriterioPorAcuerdo($criterio_origen);

//************* CLASE DEL CERTIFICADO PDF
class PDF extends FPDF
{	
    function Header()
    {	
        $certificado_origen = new CertificadoOrigen();
        $co_aladi = new COAladi();
        $co_aladiddjjfactura = new COAladiDdjjFactura();
        $sqlCertificadoOrigen = new SQLCertificadoOrigen();
        $sqlCOAladi = new SQLCOAladi();
        $sqlCOAladiDdjjFactura = new SQLCOAladiDdjjFactura();

        $certificado_origen->setId_certificado_origen($_REQUEST["co"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);

        $co_aladi->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_aladi=$sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);
        
        $co_aladiddjjfactura->setId_co_aladi($co_aladi->getId_co_aladi());
        $fact=$sqlCOAladiDdjjFactura->getListarFacturasConDistinctPorCoAladi($co_aladiddjjfactura);
        
        //Cell(width, height, text, border, position-next-cell, alignment);
        $this->Image(PATH_STYLES.DS.'img/pdf/ruex/logo_mdp.jpg',7,7,60,25);
        $this->SetFont('Times','B',10);
        $this->Ln(10);
        $this->Cell(150,4,'',0,0,'C');
        $this->Cell(40,4,utf8_decode('CERTIFICADO'),0,0,'C');
        $this->Ln();
        $this->SetFont('Times','B',14);
        $this->Cell(150,6,'',0,0,'C');
        $this->Cell(40,6,utf8_decode(''),0,0,'C');
        $this->Ln(10);
        $this->SetFont('Times','B',12);
        $this->Cell(0,4,utf8_decode('CERTIFICADO DE ORIGEN'),0,0,'C');
        $this->Ln();
        $this->Cell(0,4,utf8_decode('ASOCIACIÓN LATINOAMERICANA DE INTEGRACIÓN'),0,0,'C');
        $this->Ln(11);
        $this->SetFont('Times','',11);
        $this->Cell(40,4,utf8_decode('PAÍS EXPORTADOR'),0,0,'L');
        $this->Cell(45,4,utf8_decode('BOLIVIA'),0,0,'C');
        $this->Cell(40,4,utf8_decode('PAÍS IMPORTADOR'),0,0,'L');
        $this->Cell(45,4,utf8_decode($certificado_origen->pais->getNombre()),0,0,'C');
        $this->Ln(8);
        
        $this->SetFont('Times','',10);
        $x=$this->GetX();
        $y=$this->GetY();

        $this->Rect($x, $y, 20, 50, 'D');
        $this->Rect($x, $y, 55, 50, 'D');
        $this->Rect($x, $y, 180, 50, 'D');

        $this->MultiCell(20,5,utf8_decode('N° DE ORDEN (1)'),1,'C',0);
        $this->SetXY($x+20,$y);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->MultiCell(35,5,utf8_decode('CLASIFICACIÓN ARANCELARIA'),1,'C',0);
        $this->SetXY($x+35,$y);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->MultiCell(125,10,utf8_decode('DENOMINACIÓN DE LAS MERCADERÍAS'),1,'C',0);

        //Mercaderias

        $x=$this->GetX();
        $y=$this->GetY();
        $this->SetFont('Times','B',10);
        $this->SetXY(15,113);
        // DECLARACIÓN DE ORIGEN
        $this->Cell(0,5,utf8_decode('DECLARACIÓN DE ORIGEN'),0,0,'C',0);
        if($co_aladi->getFactura_tercer_operador()==0){
            $numero_facturas='';
            foreach($fact as $facturas){
                $numero_facturas=$numero_facturas.$facturas->getId_factura().",";
            }
            $numero_facturas = substr($numero_facturas, 0, strlen($numero_facturas) - 1);;
        }else{
            $numero_facturas = $co_aladi->getFactura_tercer_operador();
        }
        
        $this->SetFont('Times','',10);
        $this->Ln();
        $this->MultiCell(0,5,utf8_decode(' DECLARAMOS que las mercaderías indicadas en el presente formulario, correspondiente a la Factura Comercial '
                . 'N° '.$numero_facturas.' reconoce lo establecido en las normas de origen del Acuerdo (2)   '. $certificado_origen->acuerdo->getSigla() .'   de conformidad con el siguiente desglose:'),0,'J',0);
        
    }
    function Footer()
    {
        $certificado_origen = new CertificadoOrigen();
        $co_aladi = new COAladi();

        $sqlCertificadoOrigen = new SQLCertificadoOrigen();
        $sqlCOAladi = new SQLCOAladi();
        
        $certificado_origen->setId_certificado_origen($_REQUEST["co"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);

        $co_aladi->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_aladi=$sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);

        
        // Posición: a cms del final
        $this->SetY(-122);
        //$this->SetXY(15,175);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 180, 20, 'D');
        $this->SetFont('Times','',9);
        $this->Cell(180,5,utf8_decode('Declaro Bajo juramento, en cumplimiento de las normas de origen, que los datos consignados son fidedignos.'),0,0,'L',0);
        $this->Ln();
        $f = fechaConDiayMesLiteral($certificado_origen->getFecha_llenado());
        $this->Cell(180,7,utf8_decode('Fecha: '.$f),0,0,'L',0);
        $this->Ln();
        $this->Cell(180,7,utf8_decode('Razón Social, sello y firma del exportador o productor:'),0,0,'L',0);
        
        $mensaje='';
        //OBSERVACIONES
        if($co_aladi->getId_datos_tercer_operador()!=0){
            $datos_tercer_operador= new DatosTercerOperador();
            $sqlDatosTercerOperador = new SQLDatosTercerOperador();
            $datos_tercer_operador->setId_datos_tercer_operador($co_aladi->getId_datos_tercer_operador());
            $datos_tercer_operador=$sqlDatosTercerOperador->getBuscarDatosTercerOperadorPorId($datos_tercer_operador);
            $ac = $certificado_origen->getId_acuerdo();
            switch ($ac){
                case 1: $mensaje='Las mercancías descritas en el presente Certificado, serán comercializadas y facturadas por la empresa '.$datos_tercer_operador->getNombre().', domiciliada en '.$datos_tercer_operador->getDireccion().', Ciudad '.$datos_tercer_operador->getCiudad().' País '.$datos_tercer_operador->getPais().'. ';
                case 4: $mensaje='Las mercancías serán facturadas por la empresa '.$datos_tercer_operador->getNombre().', domiciliada en '.$datos_tercer_operador->getDireccion().', Ciudad '.$datos_tercer_operador->getCiudad().', País '.$datos_tercer_operador->getPais().', con la factura N° '.$datos_tercer_operador->getNumero_factura().'. ';
                default: $mensaje='Las mercancías objeto de la presente Declaración serán facturadas por la empresa '.$datos_tercer_operador->getNombre().', domiciliada en '.$datos_tercer_operador->getDireccion().', Ciudad '.$datos_tercer_operador->getCiudad().' País '.$datos_tercer_operador->getPais().'. ';
            }
        }
        $observ=$mensaje.$co_aladi->getObservaciones();
        
        $this->SetFont('Times','',10);
        $this->Ln(10);
        $this->MultiCell(180,5,utf8_decode('OBSERVACIONES: '.$observ),0,'J',0);

        $fecha_actual = date("d-m-Y");
        $this->SetXY(15,220);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 180, 45, 'D');
        $this->SetFont('Times','B',10);
        $this->Cell(180,7,utf8_decode('CERTIFICACIÓN DE ORIGEN'),0,0,'C',0);
        $this->Ln(10);
        $this->SetFont('Times','',9);
        $this->Cell(180,7,utf8_decode(''),0,0,'J',0);
        $this->Ln(25);
        $this->Cell(110,7,'',0,0,'C',0);
        $this->Cell(70,7,utf8_decode('Nombre, Sello y firma Entidad Certificadora'),0,0,'C',0);
        $this->Ln(12);
        
        
        $this->SetFont('Times','B',8);
        $this->Cell(12,3,utf8_decode('NOTAS'),0,0,'L');
        $this->SetFont('Times','',8);
        $this->Cell(5,3,utf8_decode('(1)'),0,0,'L');
        $this->Cell(180,3,utf8_decode('Esta columna indica el orden en que se individualizan las mercaderías comprendidas enb el presente certificado.'),0,0,'L');
        $this->Ln();
        $this->Cell(12,3,utf8_decode(''),0,0,'L');
        $this->Cell(5,3,utf8_decode(''),0,0,'L');
        $this->Cell(180,3,utf8_decode('En caso de ser insuficiente los números de orden, se continuará la individualización de las mercaderías en ejemplares suplementarios de este'),0,0,'L');
        $this->Ln();
        $this->Cell(12,3,utf8_decode(''),0,0,'L');
        $this->Cell(5,3,utf8_decode(''),0,0,'L');
        $this->Cell(180,3,utf8_decode('certificado, numerados correlativamente.'),0,0,'L');
        $this->Ln(5);
        $this->Cell(12,3,utf8_decode(''),0,0,'L');
        $this->Cell(5,3,utf8_decode('(2)'),0,0,'L');
        $this->Cell(180,3,utf8_decode('Especificar si se trata de un Acuerdo de Alcance regional o de alcance parcial, indicando número de registro.'),0,0,'L');
        $this->Ln(5);
        $this->Cell(12,3,utf8_decode(''),0,0,'L');
        $this->Cell(5,3,utf8_decode('(3)'),0,0,'L');
        $this->Cell(180,3,utf8_decode('En esta columna se indicará la norma de origen con que cumple cada mercadería individualizada por su número de orden.'),0,0,'L');
        $this->Ln(5);
        $this->Cell(12,3,utf8_decode(''),0,0,'L');
        $this->Cell(5,3,utf8_decode(''),0,0,'L');
        $this->Cell(180,3,utf8_decode('El formulario no podrá presentar raspaduras, tachaduras o enmiendas.'),0,0,'L');
    }
    
    //Funcion para construir las tablas de las normas de origen en varias hojas
    function construir_tabla_normas_origen(){
        $this->SetXY(15,135);
        $this->SetFont('Times','B',10);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->MultiCell(20,5,utf8_decode('N° DE ORDEN (1)'),1,'C',0);
        $this->SetXY($x+20,$y);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->MultiCell(160,10,utf8_decode('NORMAS (3)'),1,'C',0);

        $this->SetFont('Times','',9);
        $x=$this->GetX();
        $y=$this->GetY();
        $this->Rect($x, $y, 20, 30, 'D');
        $this->SetXY($x+35,$y);
        $this->Rect($x, $y, 180, 30, 'D');
        //La sgte hoja empezar las mercaderias desde aqui
        $this->SetXY(15,72);
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
            $this->SetXY(15,146);
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
            
            $this->SetXY(15,146);
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
$pdf->SetMargins(15,15,15);
$pdf->SetAutoPageBreak(true,5);
$pdf->AddPage();

//************************** INICIO DEL ARMADO DEL PDF *************************
$hojas = array();

$numero_hoja = 1;
$contador = 0;
$filas=0;
$aux=1;
//Limite Máximo de filas en un certificado
$tope_filas=8;
//Cantidad de filas en una hoja, esto se ira sumando
$cantidad_filas = 0;

//Para la primera vez se debe construir la tabla
$pdf->construir_tabla_normas_origen();

$pdf->SetXY(15,72);

$cadena_normas='';
$cadena_orden='';

foreach($detalle_aladi as $row){
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
    
    unset($ddjj_acuerdo);
    $ddjj_acuerdo = new DdjjAcuerdo();
    $ddjj_acuerdo->setId_ddjj($row['id_ddjj']);
    $ddjj_acuerdo->setId_Acuerdo($elegir_acuerdo);
    $ddjj_acuerdo=$sqlDdjjAcuerdo->getListarDDJJAcuerdoPorDDJJyAcuerdo($ddjj_acuerdo);
    
    $cadena=$filas.'|'.$row['numero_orden'].'|'.$row['clasif_arancelaria'].'|'.$row['denominacion_mercaderia'].'|'.$ddjj_acuerdo->getId_Criterio_Origen();
    
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
    
    $pdf->Cell(20,5,utf8_decode($row['numero_orden']),0,0,'C',0);
    $pdf->Cell(35,5,utf8_decode($row['clasif_arancelaria']),0,0,'C',0);
    $x=$pdf->GetX();
    $y=$pdf->GetY();
    switch($filas){
        case 1: $pdf->Cell(125,5,utf8_decode($row['denominacion_mercaderia']),0,0,'L',0);
            break;
        default:$pdf->MultiCell(125,5,utf8_decode($row['denominacion_mercaderia']),0,'L',0);
                $pdf->SetXY($x+125,$y);
            break;
    }
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