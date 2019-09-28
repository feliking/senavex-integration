<?php

//defined('_ACCESO') or die('Acceso restringido');
require(PATH_BASE . DS . 'lib' . DS . 'fpdf' . DS . 'tfpdf.php');

class PDF extends tFPDF
{
        function Cuerpo($oic){
                $this->Rect( 10, 10, 200, 277 ,"D");
                $this->Line(110,  10, 110,  140);
                $this->SetXY(120,17);
                $this->SetFont('Arial', 'b', 10);
                $this->Cell(50,5,utf8_decode('Certificado de origen '),0,0,'L');

                $this->Image("styles/img/cafe/oic-logo.png" , 170 ,14, 13 , 10,'png');
                //$this->Image("styles/img/factura/logo_bolivia.gif" , 30 ,8, 25 , 20,'GIF');
                $this->SetXY(132,25);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(50,5,utf8_decode('INTERNACIONAL                   COFFEE   ORGANIZATION '),0,0,'L');

                $this->SetXY(117,28);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(50,5,utf8_decode('ORGANIZACION INTERNACIONAL  DEL CAFE'),0,0,'L');

                $this->SetXY(117,31);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(50,5,utf8_decode('ORGANIZAÇAO  INTERNACIONAL   DO CAFE'),0,0,'L');

                $this->SetXY(117,34);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(50,5,utf8_decode('ORGANISATION INTERNATIONALE  DU CAFE'),0,0,'L');
                
                $exportador_nombre=$oic[0];
                $codigo_exportador1=$oic[1];
                $this->A1($exportador_nombre,$codigo_exportador1);
                
                $dir_noty=$oic[2];
                $this->A2($dir_noty);
                $this->A3();
                
                $codigo_pais1=$oic[3];
                $codigo_puerto1=$oic[4];
                $nro_serie=$oic[5];
                $this->A4($codigo_pais1,$codigo_puerto1,$nro_serie);
                
                $pais_productor=$oic[6];
                $codigo_pais2=$oic[7];
                $this->A5($pais_productor,$codigo_pais2);
                
                $pais_destino=$oic[8];
                $codigo_pais3=$oic[9];
                $this->A6($pais_destino,$codigo_pais3);
                
                $fecha=$oic[10];
                $this->A7($fecha);
                
                $pais_transbordo=$oic[11];
                $codigo_pais4=$oic[12];
                $this->A8($pais_transbordo,$codigo_pais4);
                
                $medio_transporte=$oic[13];
                $codigo_medio_transporte=$oic[14];
                $this->A9($medio_transporte, $codigo_medio_transporte);
                
                $codigo_pais=$oic[15];
                $codigo_exportador2=$oic[16];
                $num_lote=$oic[17];
                $otras_marks=$oic[18];
                $this->A10($codigo_pais, $codigo_exportador2, $num_lote, $otras_marks);
                
                $selec_cargado=$oic[19];
                $this->A11($selec_cargado);
                
                $peso_neto=$oic[20];
                $this->A12($peso_neto);
                
                $selec_peso=$oic[21];
                $this->A13($selec_peso);
                
                $select_descripcion=$oic[22];
                $this->A14($select_descripcion);
                
                $descafeinado=$oic[23];
                $organico=$oic[24];
                $cafe_verde=$oic[25];
                $cafe_soluble=$oic[26];
                $this->A15($descafeinado,$organico,$cafe_verde,$cafe_soluble);
                
                $this->A16();
                
                $selec_norma=$oic[27];
                $carac_esp=$oic[28];
                $cod_armonizado=$oic[29];
                $valor_fob=$oic[30];
                $moneda=$oic[31];
                $inf_adicional=$oic[32];
                
                $this->A17($selec_norma,$carac_esp,$cod_armonizado,$valor_fob,$moneda,$inf_adicional); 
        }
        function A1($exportador_nombre,$codigo){
            
                $this->Line(10,  40, 210,  40);
                $this->Rect( 70, 30, 7, 7 ,"D");
                $this->Rect( 78, 30, 7, 7 ,"D");
                $this->Rect( 86, 30, 7, 7 ,"D");
                $this->Rect( 94, 30, 7, 7 ,"D");

                $this->SetXY(13,13);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(50,5,'1. Exportador/Expedidor (nombre/clave)',0,0,'L');

                $this->SetXY(15,16);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(50,5,'Exporter/Consignor (name/code)',0,0,'L');

                $this->SetXY(15,22);
                $this->SetFont('Arial', '', 7);
                //texto
                $this->MultiCell(85,4,utf8_decode($exportador_nombre),0,'L',false);

                $p1=$codigo % 10;
		$codigo=$codigo/10;
		$p2=$codigo % 10;
                $codigo=$codigo/10;
                $p3=$codigo % 10;
                $codigo=$codigo/10;
                $p4=$codigo % 10;
                $codigo=$codigo/10;
                
                //celda 1
                $this->SetXY(71,31);
                $this->SetFont('Arial', '', 10);
                $this->Cell(50,5,$p4,0,0,'L');
                //celda 2

                $this->SetXY(79,31);
                $this->SetFont('Arial', '', 10);
                $this->Cell(50,5,$p3,0,0,'L');
                //celda 3

                $this->SetXY(87,31);
                $this->SetFont('Arial', '', 10);
                $this->Cell(50,5,$p2,0,0,'L');
                //celda 4

                $this->SetXY(95,31);
                $this->SetFont('Arial', '', 10);
                $this->Cell(50,5,$p1,0,0,'L');
        }
        function A2($dir_noty){
                $this->Line(10, 85, 210,  85);
                $this->SetXY(13,41);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(50,5,utf8_decode('2. Dirección para notificaciones'),0,0,'L');

                $this->SetXY(15,44);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(50,5,'Notify address',0,0,'L');



                $this->SetXY(13,55);
                $this->SetFont('Arial', '', 7);
                //texto
                $this->MultiCell(90, 5,utf8_decode($dir_noty) ,0,'L',false);

        }
        function A3(){
                $this->Line(110,55,210,55);
                $this->SetXY(112,41);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(50,5,utf8_decode('3. Número de referencia Interno'),0,0,'L');

                $this->SetXY(114,44);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(50,5,'Internal reference No.');

                // texto
                $this->SetXY(113,47);
                $this->SetFont('Arial', '', 7);
                $this->Cell(60, 5, '',0,0,'L');
        }
        function A4($codigo_pais,$codigo_puerto,$nro_serie){
                $this->Line(110,69,210,69);

                for ($index = 55; $index <69 ; $index+=3){
                        //A4a
                        $this->Line(142,$index+1,142,$index);
                        //A4b
                        $this->Line(175 ,$index+1,175,$index);
                }
                $this->A4a($codigo_pais);
                $this->A4b($codigo_puerto);
                $this->A4c($nro_serie);

        }
        function A4a($codigo_pais){
                $this->Rect( 116, 63, 5, 5 ,"D");
                $this->Rect( 124, 63, 5, 5 ,"D");
                $this->Rect( 132, 63, 5, 5 ,"D");
                $this->SetXY(112,55);
                
               
                $this->SetFont('Arial', 'b', 5.5);
                $this->Cell(20,5,utf8_decode('4a. Clave de país:'),0,0,'L');
                
                
                $p1=$codigo_pais % 10;
                $codigo_pais = $codigo_pais / 10;
                $p2=$codigo_pais % 10;
                $codigo_pais = $codigo_pais / 10;
                $p3=$codigo_pais % 10;
                $codigo_pais = $codigo_pais / 10;
                
                $this->SetXY(113,57);
                $this->SetFont('Arial', 'b', 5.5);
                $this->Cell(20,5,'Country code:',0,0,'L');
                //celda 1

                $this->SetXY(117,63);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p3,0,0,'L');
                //celda 2

                $this->SetXY(125,63);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p2,0,0,'L');
                //celda 3

                $this->SetXY(133,63);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p1,0,0,'L');
        }
        function A4b($codigo_puerto){
                $this->Rect( 150, 63, 5, 5 ,"D");
                $this->Rect( 159, 63, 5, 5 ,"D");

                $this->SetXY(142,55);
                $this->SetFont('Arial', 'b', 5.5);
                $this->Cell(20,5,'4a. Clave de puerto de embarque:',0,0,'L');

                $this->SetXY(143,57);
                $this->SetFont('Arial', 'b', 5.5);
                $this->Cell(20,5,'Port of shipment code:',0,0,'L');

                $p1=$codigo_puerto % 10;
                $codigo_puerto = $codigo_puerto / 10;
                $p2=$codigo_puerto % 10;
                $codigo_puerto = $codigo_puerto / 10;
                
                //celda 1
                $this->SetXY(150, 63);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p2,0,0,'L');

                //celda 2
                $this->SetXY(159, 63);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p1,0,0,'L');
        }
        function A4c($nro_serie){
                $this->Rect( 177, 63, 5, 5 ,"D");
                $this->Rect( 183, 63, 5, 5 ,"D");
                $this->Rect( 189, 63, 5, 5 ,"D");
                $this->Rect( 195, 63, 5, 5 ,"D");
                $this->Rect( 201, 63, 5, 5 ,"D");

                $this->SetXY(176,55);
                $this->SetFont('Arial', 'b', 5.5);
                $this->Cell(20,5,'4c. No. de serie:',0,0,'L');

                $this->SetXY(177,57);
                $this->SetFont('Arial', 'b', 5.5);
                $this->Cell(20,5,'Serial No.:',0,0,'L');

                $p1=$nro_serie % 10;
                $nro_serie=$nro_serie / 10;
                $p2=$nro_serie % 10;
                $nro_serie=$nro_serie / 10;
                $p3=$nro_serie % 10;
                $nro_serie=$nro_serie / 10;
                $p4=$nro_serie % 10;
                $nro_serie=$nro_serie / 10;
                $p5=$nro_serie % 10;
                //celda 1
                $this->SetXY(177, 63);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p5,0,0,'L');

                //celda 2
                $this->SetXY(183, 63);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p4,0,0,'L');

                //celda 3
                $this->SetXY(189, 63);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p3,0,0,'L');

                //celda 4
                $this->SetXY(195, 63);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p2,0,0,'L');

                //celda 5
                $this->SetXY(201, 63);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p1,0,0,'L');
        }
        function A5($pais_productor, $codigo_pais){
                $this->Rect( 187, 79, 5, 5 ,"D");
                $this->Rect( 194, 79, 5, 5 ,"D");
                $this->Rect( 200, 79, 5, 5 ,"D");

                $this->SetXY(113,70);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(20,5,utf8_decode('5. País Productor(nombre/clave)'),0,0,'L');

                $this->SetXY(115,73);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Producing country (name/code)',0,0,'L');
 
                //texto
                $this->SetXY(121,79);
                $this->SetFont('Arial', '', 8);
                $this->Cell(60,5,utf8_decode($pais_productor),0,0,'L');
                
                $p1=$codigo_pais % 10;
                $codigo_pais = $codigo_pais / 10;
                $p2=$codigo_pais % 10;
                $codigo_pais = $codigo_pais / 10;
                $p3=$codigo_pais % 10;
                $codigo_pais = $codigo_pais / 10;
                //celda 1
                $this->SetXY(188,79);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p3,0,0,'L');

                //celda 2
                $this->SetXY(195,79);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p2,0,0,'L');

                //celda 3
                $this->SetXY(201,79);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p1,0,0,'L');
        }
        function A6($pais_destino,$codigo_pais){
                //A6 - A7
                $this->Line(10 ,100,210,100);
                //------------------------------//
                $this->Rect( 83, 93, 5, 5 ,"D");
                $this->Rect( 90, 93, 5, 5 ,"D");
                $this->Rect( 97, 93, 5, 5 ,"D");

                $this->SetXY(13,85);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(20,5,utf8_decode('6. País de destino(nombre/clave)'),0,0,'L');

                $this->SetXY(15,88);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Country of destination (name/code)',0,0,'L');

                //texto
                $this->SetXY(20,93);
                $this->SetFont('Arial', '', 8);
                $this->Cell(60,5,utf8_decode($pais_destino),0,0,'L');

                $p1=$codigo_pais % 10;
                $codigo_pais = $codigo_pais / 10;
                $p2=$codigo_pais % 10;
                $codigo_pais = $codigo_pais / 10;
                $p3=$codigo_pais % 10;
                $codigo_pais = $codigo_pais / 10;
                
                //celda 1
                $this->SetXY(84,93);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p3,0,0,'L');

                //celda 2
                $this->SetXY(91,93);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p2,0,0,'L');

                //celda 3
                $this->SetXY(98,93);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p1,0,0,'L');
        }
        function A7($fecha){
                $this->SetXY(113,85);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(20,5,utf8_decode('7. Fecha de exportación /DD/MM/AA)'),0,0,'L');
                
                $this->SetXY(115,88);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Date of export (DD/MM/YY)',0,0,'L');
                
                //texto
                $this->SetXY(121,93);
                $this->SetFont('Arial', '', 9);
                $this->Cell(30,5,date("d",strtotime($fecha)).' / '.date("m",strtotime($fecha)).' / '.date("y",strtotime($fecha)),0,0,'L');
        }
        function A8($pais_transbordo,$codigo_pais){
                //A8 - A 9	
                $this->Line(10 ,115,210,115);

                $this->Rect( 83, 108, 5, 5 ,"D");
                $this->Rect( 90, 108, 5, 5 ,"D");
                $this->Rect( 97, 108, 5, 5 ,"D");

                $this->SetXY(13,100);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(20,5,utf8_decode('8. Pais de transbordo (nombre/clave)'),0,0,'L');

                $this->SetXY(15,103);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Country of trans-shipment (name/code)',0,0,'L');

                //texto
                $this->SetXY(20,108);
                $this->SetFont('Arial', '', 8);
                $this->Cell(60,5,utf8_decode($pais_transbordo),0,0,'L');

                $p1=$codigo_pais % 10;
                $codigo_pais = $codigo_pais / 10;
                $p2=$codigo_pais % 10;
                $codigo_pais = $codigo_pais / 10;
                $p3=$codigo_pais % 10;
                
                
                //celda 1
                $this->SetXY(84,108);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p3,0,0,'L');

                //celda 2
                $this->SetXY(91,108);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p2,0,0,'L');

                //celda 3
                $this->SetXY(98,108);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p1,0,0,'L');
        }
        function A9($medio_transporte, $codigo_medio_transporte){
                $this->Rect( 187, 108, 5, 5 ,"D");
                $this->Rect( 193, 108, 5, 5 ,"D");
                $this->Rect( 199, 108, 5, 5 ,"D");

                $this->SetXY(113,100);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(20,5,'9. Nombre del medio de transporte (nombre/clave)',0,0,'L');

                $this->SetXY(115,103);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Name of carrier (name/code)',0,0,'L');

                //texto
                $this->SetXY(121,108);
                $this->SetFont('Arial', '', 8);
                $this->Cell(60,5,utf8_decode($medio_transporte),0,0,'L');

                $p1=$codigo_medio_transporte % 10;
                $codigo_medio_transporte = $codigo_medio_transporte / 10;
                $p2=$codigo_medio_transporte % 10;
                $codigo_medio_transporte = $codigo_medio_transporte / 10;
                $p3=$codigo_medio_transporte % 10;

                //celda 1
                $this->SetXY(187,108);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p3,0,0,'L');

                //celda 2
                $this->SetXY(193,108);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p2,0,0,'L');

                //celda 3
                $this->SetXY(199,108);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$p1,0,0,'L');
        }
        function A10($codigo_pais, $codigo_exportador, $num_lote, $otras_marks){
                //A10 - A11
                $this->Line(10 ,140,210,140);

                $this->SetXY(13,115);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(20,5,utf8_decode('10. Marca de identificaciÓn de la OIC /'),0,0,'L');

                $this->SetXY(64,115);
                $this->SetFont('Arial', 'b', 6);
                $this->Cell(20,5,'ICO identification mark',0,0,'L');

                $this->SetXY(13,127);
                $this->SetFont('Arial', '', 8);
                $this->Cell(20,5,'Otras marcas: ',0,0,'L');

                $this->SetXY(13,130);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,'Other marks :',0,0,'L');


                $this->SetXY(40,120);
                $this->SetFont('Arial', '', 9);
                $this->Cell(20,5,'_ _ _ / _ _ _ / _ _ _',0,0,'L');


                // texto otras marcas
                $this->SetXY(34,128);
                $this->SetFont('Arial', '', 8);
                $this->Cell(20,5,utf8_decode($otras_marks),0,0,'L');


                // texto medio
                $this->SetXY(42,120);
                $this->SetFont('Arial', '', 9);
                $this->Cell(7,5,$codigo_pais,0,0,'L');

                $this->SetXY(52,120);
                $this->SetFont('Arial', '', 9);
                $this->Cell(7,5,$codigo_exportador,0,0,'L');

                $this->SetXY(60,120);
                $this->SetFont('Arial', '', 9);
                $this->Cell(9,5,$num_lote,0,0,'L');

        }
        function A11($selec_cargado){
                //A11 - A12 - A13
                $this->Line(110 ,127,210,127);

                $this->SetXY(113,115);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(20,5,'11. Cargados / ',0,0,'L');

                $this->SetXY(133,115);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Shipped in',0,0,'L');
                //--------------- en bolsas ----------------------------
                $this->SetXY(116,119);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(5,5,'En sacos',0,0,'L'); 

                $this->SetXY(116,122);
                $this->SetFont('Arial', '', 7);
                $this->Cell(5,5,'Bags',0,0,'L'); 

                $this->Rect( 129, 120, 5, 5 ,"D");
                //---------------- a granel ---------------------------
                $this->SetXY(137,119);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(5,5,'A granel',0,0,'L'); 

                $this->SetXY(137,122);
                $this->SetFont('Arial', '', 7);
                $this->Cell(5,5,'Bulk',0,0,'L'); 

                $this->Rect( 150, 120, 5, 5 ,"D");
                //------------------ en contenedores-------------------------
                $this->SetXY(157,119);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(5,5,'En Contenedores',0,0,'L'); 

                $this->SetXY(157,122);
                $this->SetFont('Arial', '', 7);
                $this->Cell(5,5,'Containers',0,0,'L'); 

                $this->Rect( 180, 120, 5, 5 ,"D");
                //------------------- otros ------------------------
                $this->SetXY(191,119);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(5,5,'Otros',0,0,'L'); 

                $this->SetXY(191,122);
                $this->SetFont('Arial', '', 7);
                $this->Cell(5,5,'Other',0,0,'L'); 

                $this->Rect( 200, 120, 5, 5 ,"D");
                //-------------------------------------------

                //celda 1
                $this->SetXY(129,120);
                $this->SetFont('Arial', '', 8);
                $this->Cell(20,5,$selec_cargado==1?'X':'',0,0,'L');

                //celda 2
                $this->SetXY(150,120);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$selec_cargado==2?'X':'',0,0,'L'); 

                //celda 3
                $this->SetXY(180,120);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$selec_cargado==3?'X':'',0,0,'L');

                //celda 4
                $this->SetXY(200,120);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$selec_cargado==4?'X':'',0,0,'L');
        }
        function A12($peso_neto){
                $this->Line(155,127,155,140);

                $this->SetXY(113,127);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(20,5,'12. Peso neto de la partida ',0,0,'L');

                $this->SetXY(115,130);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,'Net weight of shipment',0,0,'L');

                //texto
                $this->SetXY(120,135);
                $this->SetFont('Arial', '', 10);
                $this->Cell(25,5,$peso_neto,0,0,'L');

        }
        function A13($selec_peso){
                $this->SetXY(162,127);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(20,5,'13. Unidad de peso ',0,0,'L');

                $this->SetXY(164,130);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Unit of weight',0,0,'L');

                //--------------- KG ----------------------------
                $this->SetXY(163,135);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(5,5,'Kg ',0,0,'L');
                $this->Rect( 170, 135, 4, 4 ,"D");
                //--------------- LIB ---------------------------
                $this->SetXY(180,135);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(5,5,'Lb',0,0,'L'); 
                $this->Rect( 190, 135, 4, 4 ,"D");
                //-----------------------------------------------

                //celda 1
                $this->SetXY(170,135);
                $this->SetFont('Arial', '', 8);
                $this->Cell(20,5,$selec_peso==1?'X':'',0,0,'L');

                //celda 2
                $this->SetXY(190,135);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$selec_peso==2?'X':'',0,0,'L'); 
        }
        function A14($select_descripcion){
                //linea 14
                $this->Line(10 ,153,210,153);

                $this->SetXY(13,141);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(20,5,utf8_decode('14. Descripción del Café (forma, tipo, si procede) / '),0,0,'L');

                $this->SetXY(81,141);
                $this->SetFont('Arial', 'b', 6);
                $this->Cell(20,5,'Descripcion of coffee (form/type, where relevant)',0,0,'L');

                //--------------------- Arabica verde --------------------------
                $this->SetXY(12,145);
                $this->SetFont('Arial', '', 9);
                $this->Cell(20,5,'Arabica verde ',0,0,'L');

                $this->SetXY(12,148);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,'Green Arabica ',0,0,'L');
                $this->Rect( 34, 146, 5, 5 ,"D");

                //--------------------- Robusta verde --------------------------
                $this->SetXY(48,145);
                $this->SetFont('Arial', '', 9);
                $this->Cell(20,5,'Robusta verde ',0,0,'L');

                $this->SetXY(48,148);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,'Green Robusta ',0,0,'L');
                $this->Rect( 71, 146, 5, 5 ,"D");
                //--------------------- Tostado --------------------------
                $this->SetXY(83,145);
                $this->SetFont('Arial', '', 9);
                $this->Cell(20,5,'Tostado ',0,0,'L');

                $this->SetXY(83,148);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,'Roasted',0,0,'L');
                $this->Rect(98, 146, 5, 5 ,"D");
                //--------------------- Soluble --------------------------
                $this->SetXY(115,145);
                $this->SetFont('Arial', '', 9);
                $this->Cell(20,5,'Soluble ',0,0,'L');

                $this->SetXY(115,148);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,'Soluble',0,0,'L');
                $this->Rect(130, 146, 5, 5 ,"D");
                //--------------------- Liquido --------------------------
                $this->SetXY(145,145);
                $this->SetFont('Arial', '', 9);
                $this->Cell(20,5,'Liquido ',0,0,'L');

                $this->SetXY(145,148);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,'Liquid',0,0,'L');
                $this->Rect(160, 146, 5, 5 ,"D");
                //--------------------- otros --------------------------
                $this->SetXY(175,145);
                $this->SetFont('Arial', '', 9);
                $this->Cell(20,5,'Otros',0,0,'L');

                $this->SetXY(175,148);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,'Other',0,0,'L');
                $this->Rect(190, 146, 5, 5 ,"D");

                //--------------------- celda Arabica verde --------------------------
                $this->SetXY(34,146);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$select_descripcion==1?'X':'',0,0,'L');

                //--------------------- celda Arabica verde --------------------------
                $this->SetXY(71	,146);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$select_descripcion==2?'X':'',0,0,'L');

                //--------------------- celda Tostado --------------------------
                $this->SetXY(98	,146);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$select_descripcion==3?'X':'',0,0,'L');

                //--------------------- celda Soluble --------------------------
                $this->SetXY(130,146);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$select_descripcion==4?'X':'',0,0,'L');
                //--------------------- celda Liquido --------------------------
                $this->SetXY(160,146);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$select_descripcion==5?'X':'',0,0,'L');
                //--------------------- celda otros --------------------------
                $this->SetXY(190,146);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$select_descripcion==6?'X':'',0,0,'L');
        }
        function A15($descafeinado,$organico,$cafe_verde,$cafe_soluble){
                $this->Line(10 ,170,210,170);

                $this->SetXY(13,154);
                $this->SetFont('Arial', 'b', 8);
                $this->Cell(20,5,utf8_decode('15. Método de elaboración / '),0,0,'L');

                $this->SetXY(55,154);
                $this->SetFont('Arial', 'b', 6);
                $this->Cell(20,5,'Method of precessing',0,0,'L');

                //--------------------- Descafeinado --------------------------
                $this->SetXY(15,158);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Descafeinado/',0,0,'L');

                $this->SetXY(35,158);
                $this->SetFont('Arial', '', 6);
                $this->Cell(20,5,'Decaffeinated ',0,0,'L');
                $this->Rect( 52, 159, 4, 4 ,"D");
                //--------------------- organico --------------------------
                $this->SetXY(85,158);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Organico/',0,0,'L');

                $this->SetXY(99,158);
                $this->SetFont('Arial', '', 6);
                $this->Cell(20,5,'Organic:',0,0,'L');

                //--------------------- certificado --------------------------
                $this->SetXY(110,158);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Certificado/',0,0,'L');

                $this->SetXY(126,158);
                $this->SetFont('Arial', '', 6);
                $this->Cell(20,5,'Certified',0,0,'L');
                $this->Rect( 137, 159, 4, 4 ,"D");

                //--------------------- No certificado --------------------------
                $this->SetXY(150,158);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'No Certificado/',0,0,'L');

                $this->SetXY(171,158);
                $this->SetFont('Arial', '', 6);
                $this->Cell(20,5,'Uncertified',0,0,'L');
                $this->Rect( 185, 159, 4, 4 ,"D");

                //--------------------- Cafe Verde --------------------------
                $this->SetXY(13,164);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Cafe verde/',0,0,'L');


                $this->SetXY(27,164);
                $this->SetFont('Arial', '', 6);
                $this->Cell(20,5,'Green coffe : ',0,0,'L');
                //--------------------- Cafe Verde - Via seca --------------------------
                $this->SetXY(41,164);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Via seca/',0,0,'L');

                $this->SetXY(52,164);
                $this->SetFont('Arial', '', 6);
                $this->Cell(20,5,'Dry',0,0,'L');
                $this->Rect( 57, 164, 4, 4 ,"D");
                //--------------------- Cafe Verde - Via Humeda --------------------------
                $this->SetXY(65,164);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Via humeda/',0,0,'L');

                $this->SetXY(80,164);
                $this->SetFont('Arial', '', 6);
                $this->Cell(20,5,'Wet',0,0,'L');
                $this->Rect(86, 164, 4, 4 ,"D");
                //--------------------- Cafe Soluble --------------------------
                $this->SetXY(92,164);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Cafe Soluble/',0,0,'L');

                $this->SetXY(108,164);
                $this->SetFont('Arial', '', 6);
                $this->Cell(20,5,'Soluble/coffee:',0,0,'L');

                //--------------------- Cafe Verde - Centrifugado --------------------------
                $this->SetXY(125,164);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Centrifugado/',0,0,'L');

                $this->SetXY(142,164);
                $this->SetFont('Arial', '', 6);
                $this->Cell(20,5,'Spray-dried',0,0,'L');
                $this->Rect(155, 164, 4, 4 ,"D");
                //--------------------- Cafe Verde - Liofilizado --------------------------
                $this->SetXY(163,164);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(20,5,'Liofilizado/',0,0,'L');

                $this->SetXY(177,164);
                $this->SetFont('Arial', '', 6);
                $this->Cell(20,5,'Freeze-dried',0,0,'L');
                $this->Rect(192, 164, 4, 4 ,"D");

                // celda descafeinado 
                $this->SetXY(52,159);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,$descafeinado==1?'X':'',0,0,'L');
                // Certificado

                $this->SetXY(137,159);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,$organico==3?'X':'',0,0,'L');
                // No certificado
                $this->SetXY(185, 159);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,$organico==4?'X':'',0,0,'L');

                // Via seca
                $this->SetXY(57, 164);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,$cafe_verde==6?'X':'',0,0,'L');
                // Via humeda
                $this->SetXY(86, 164);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,$cafe_verde==7?'X':'',0,0,'L');
                // Cafe soluble
                // Centrifugado
                $this->SetXY(155, 164);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,$cafe_soluble==9?'X':'',0,0,'L');
                // Liofilizado
                $this->SetXY(192, 164);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,$cafe_soluble==10?'X':'',0,0,'L');
        }
        function A16(){
        //A16
                $this->Line(10 ,215,210,215);
                $this->Line(110 ,195,110,215);
                $this->A16a();
                $this->A16b();

                $this->SetXY(12,170);
                $this->SetFont('Arial', '', 6.5);
                $this->MultiCell(188,5,utf8_decode('16. POR EL PRESENTE SE CERTIFICA QUE EL CAFÉ ARRIBA DESCRITO FUE PRODUCIDO/BENEFICIADO EN EL PAÍS QUE SE INDICAEN LAS CASILLA 5 Y EXPORTADO EN LA FECHA QUE SEGUIDAMENTE SE HACE CONSTAR. ESTE CERTIFICADO SE EXPIDE EXCLUSIVAMENTE PARA FINES ESTADÍSTICOS DE LA OIC Y NO CONFIERE ORIGEN AL CAFÉ/'),0,'L',false);
                $this->SetXY(12,180);
                $this->SetFont('Arial', '', 5);
                $this->MultiCell(188,5,'                                           IT IS HEREBY CERTIFIED THAT THE COFFEE DESCRIBED ABOVE WAS PRODUCED/PROCESSED IN THE COUNTRY NAMED IN BOX 5 ABOVE AND HAS BEEN EXPORTED ON THE DATE SHOWN BELOW. THIS CERTIFICATE IS INTENDED SOLELY FOR THE STATISTICAL PURPOSES OF THE ICO AND DOES NOT CONFER ORIGIN ON COFFEE',0,'L',false);

        }
        function A16a(){
                $this->SetXY(12,195);
                $this->SetFont('Arial', '', 6.5);
                $this->Cell(20,5,'Fecha / Date',0,0,'L');

                $this->SetXY(12,198);
                $this->SetFont('Arial', '', 6.5);
                $this->Cell(20,5,'Localidad / Place',0,0,'L');

                $this->SetXY(12,207);
                $this->SetFont('Arial', '', 7);
                $this->Cell(40,5,'a. Firma del funcionario de aduanas autorizado y refrendo de la Aduana',0,0,'L');

                $this->SetXY(15,210);
                $this->SetFont('Arial', '', 6);
                $this->Cell(40,5,'Signature of authorized Customs Officer and Catchet of Customs Authority',0,0,'L');
        }
        function A16b(){
                $this->SetXY(113,195);
                $this->SetFont('Arial', '', 6.5);
                $this->Cell(20,5,'Fecha / Date',0,0,'L');

                $this->SetXY(113,198);
                $this->SetFont('Arial', '', 6.5);
                $this->Cell(20,5,'Localidad / Place',0,0,'L');

                $this->SetXY(113,206);
                $this->SetFont('Arial', '', 7);
                $this->MultiCell(90,3,'b. Firma del funcionario autorizado del Organismo Certificante y refrendo del Organismo Certificante',0,'L',false);

                $this->SetXY(113,211);
                $this->SetFont('Arial', '', 6);
                $this->Cell(40,5,'Signature of authorized Customs Officer and Catchet of Customs Authority',0,0,'L');
        }
        function A17($selec_norma,$carac_esp,$cod_armonizado,$valor_fob,$moneda,$inf_adicional){
                //$this->Line(10 ,212,200,212);
                //A17a
                for ($index = 10; $index <210 ; $index+=3){
                //A17a
                        $this->Line($index+1 ,223,$index+3,223);
                //A17b - c - d
                        $this->Line($index+1 ,253,$index+3,253);
                //A17e
                        $this->Line($index+1 ,277,$index+3,277);
                }
                $this->SetXY(13,215);
                $this->SetFont('Arial', '', 8);
                $this->Cell(20,5,utf8_decode('17. Otra información pretinente: ICC Resolución Número 420; Características especiales; Codigo del SA; Valor del embarque (Información Voluntaria)'),0,0,'L');

                $this->SetXY(13,218);
                $this->SetFont('Arial', '', 7.5);
                $this->Cell(20,5,utf8_decode('Other relevant information: ICC Resolution 420; Special characteristics; HS Code; Value of the shipment (Voluntary information)'),0,0,'L');
                $this->A17a($selec_norma);
                $this->A17b($carac_esp);
                $this->A17c($cod_armonizado);
                $this->A17d($valor_fob,$moneda);
                $this->A17e($inf_adicional);
        }
        function A17a($selec_norma){
                $this->SetXY(13,223);
                $this->SetFont('Arial', 'b', 6);
                $this->Cell(80,5,utf8_decode('a. Normas óptimas de calidad del café (ICC Resolución Número 420):'),0,'L',false);

                $this->SetXY(16,226);
                $this->SetFont('Arial', '', 6);
                $this->Cell(80,5,'Quality standards for green coffee (ICC Resolution 420):',0,0,'L');
                //------------------------------- S ------------------------------------//
                $this->SetXY(16,232);
                $this->SetFont('Arial', '', 6);
                $this->Cell(80,5,utf8_decode('"S": Plena Observancia de las normas óptimas sobre defectos y humedad '),0,'L',false);


                $this->SetXY(16,236);
                $this->SetFont('Arial', '', 6);
                $this->Cell(80,5,utf8_decode('"S": Full compliance with the target defect and moisture standars '),0,'L',false);

                //------------------------------- XD ------------------------------------//
                $this->SetXY(107,232);
                $this->SetFont('Arial', '', 6);
                $this->Cell(80,5,utf8_decode('"XD": El café no responde a las normas óptimas sobre defectos'),0,'L',false);

                $this->SetXY(107,236);
                $this->SetFont('Arial', '', 6);
                $this->Cell(80,5,utf8_decode('"XD": Coffee does not conform to the target defect standard'),0,'L',false);

                //------------------------------- XM ------------------------------------//
                $this->SetXY(16,242);
                $this->SetFont('Arial', '', 6);
                $this->Cell(80,5,utf8_decode('"XM": El café no responde a las normas óptimas sobre humedad'),0,'L',false);

                $this->SetXY(16,247);
                $this->SetFont('Arial', '', 6);
                $this->Cell(80,5,utf8_decode('"XM": Coffee does not conform to the target moisture standard'),0,'L',false);

                //------------------------------- XDM ------------------------------------//
                $this->SetXY(107,242);
                $this->SetFont('Arial', '', 6);
                $this->MultiCell(80,3,utf8_decode('"XDM": El café no responde a ninguna de las normas óptimas( ni la referente a defectos ni a la referente a humedad'),0,'L',false);
                $this->SetXY(107,247);
                $this->SetFont('Arial', '', 6);
                $this->Cell(80,5,utf8_decode('"XDM": Coffee does not conform to either standard (target defect and moisture)'),0,'L',false);


                $this->Rect( 96,234, 5, 5 ,"D");
                $this->Rect( 96,244, 5, 5 ,"D");
                $this->Rect( 187,234, 5, 5 ,"D");
                $this->Rect( 187,244, 5, 5 ,"D");

                //celda 1
                $this->SetXY(96,234);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$selec_norma==1? "X":"",0,0,'L');

                //celda 2
                $this->SetXY(187,234);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$selec_norma==2? "X":"",0,0,'L');

                //celda 3
                $this->SetXY(96,244);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$selec_norma==3? "X":"",0,0,'L');

                //celda 4
                $this->SetXY(187,244);
                $this->SetFont('Arial', '', 8);
                $this->Cell(5,5,$selec_norma==4? "X":"",0,0,'L');

        }
        function A17b($carac_esp){
                $this->SetXY(13,253);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(73,5,utf8_decode('b. Características especiales (especifique el nombre o el código):'),0,0,'L');

                $this->SetXY(15,256);
                $this->SetFont('Arial', '', 6);
                $this->Cell(60,5,'Special characteristics (please specify name or code):',0,0,'L');

                // ------------------ TEXTO -------------------------
                $this->SetXY(100,255);
                $this->SetFont('Arial', '', 9);
                $this->Cell(60,5,utf8_decode($carac_esp),0,0,'L');

        }
        function A17c($cod_armonizado){
                $this->SetXY(13,262);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(73,5,utf8_decode('c. Código del Sistema Armonizado (SA):'),0,0,'L');

                $this->SetXY(15,265);
                $this->SetFont('Arial', '', 6);
                $this->Cell(60,5,'Special characteristics (please specify name or code):',0,0,'L');


                // ------------------ TEXTO -------------------------
                $this->SetXY(15,270);
                $this->SetFont('Arial', '', 8);
                $this->Cell(60,5,utf8_decode($cod_armonizado),0,0,'L');
        }
        function A17d($valor_fob,$moneda){
            $this->SetXY(107,262);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(73,5,utf8_decode('d. Valor (FOB) del embarque:'),0,0,'L');


                $this->SetXY(145,262);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(73,5,'_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ',0,0,'L');

                $this->SetXY(110,265);
                $this->SetFont('Arial', '', 6);
                $this->Cell(60,5,'Value (FOB) of the shipment:',0,0,'L');

                //------------- Moneda Nacional --------------------
                $this->Rect(109, 270, 5, 5 ,"D");
                $this->SetXY(114,269);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,'Moneda nacional',0,0,'L');

                $this->SetXY(114,271);
                $this->SetFont('Arial', '', 6);
                $this->Cell(20,5,'National currency',0,0,'L');

                //------------- Dolares EE UU --------------------
                $this->Rect(145, 270, 5, 5 ,"D");
                $this->SetXY(150,269);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,utf8_decode('Dólares EE UU'),0,0,'L');

                $this->SetXY(150,271);
                $this->SetFont('Arial', '', 6);
                $this->Cell(20,5,'US dollars',0,0,'L');

                //------------- euros --------------------
                $this->Rect(180, 270, 5, 5 ,"D");
                $this->SetXY(185,269);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,utf8_decode('Euros'),0,0,'L');

                $this->SetXY(185,271);
                $this->SetFont('Arial', '', 6);
                $this->Cell(20,5,'Euros',0,0,'L');

                //------------- TEXTO ---------------------
                $this->SetXY(145,262);
                $this->SetFont('Arial', '', 8);
                $this->Cell(40,5,$valor_fob,0,0,'L');
                //------------- CELDAS --------------------

                $this->SetXY(109, 270);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,$moneda==1?"X":"",0,0,'L');


                $this->SetXY(145, 270);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,$moneda==2?"X":"",0,0,'L');

                $this->SetXY(180, 270);
                $this->SetFont('Arial', '', 7);
                $this->Cell(20,5,$moneda==3?"X":"",0,0,'L');

        }
        function A17e($inf_adicional){
                $this->SetXY(13,277);
                $this->SetFont('Arial', 'b', 7);
                $this->Cell(31,5,utf8_decode('e. Información adicional / '),0,'L',false);
                $this->SetFont('Arial', '', 6);
                $this->Cell(30,5,'Additional information',0,0,'L');

                $this->SetXY(13,281);
                $this->SetFont('Arial', '', 7);
                $this->MultiCell(185,3,utf8_decode($inf_adicional),0,'L',false);
        }

}
	
/*$pdf = new PDF('P','mm',array(210,308));
$pdf->AddPage();
$pdf->Cuerpo();
//$pdf->Output(date('d-m-y-00001.').'pdf','D');
$pdf->Output();*/
?>	
	