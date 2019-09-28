<?php 
	
	include ('verhoeff.php');
	include ('base64.php');
	include ('allegedrc4.php');
	include ('numeros.php');
	//include ('PHPExcel/IOFactory.php');

	class facturar{
		private $verhoeff;
		private $base64;
		private $allegedrc4;
		 
		public function facturar(){
			
		}         
		public function genQRcode($size, $content){
		
			return '<img src="http://chart.apis.google.com/chart?chs=200x200&cht=qr&chl='.$content.'" height="150" width="150"" />';
				//'http://chart.apis.google.com/chart?chs=80x80&cht=qr&chl='.$texto_qr,140,215,50,0,'PNG'

		}
		public function codControl($fact,$nnit,$fecha_trans,$monto_trans,$llave,$autorizacion){
			$verhoeff=new Verhoeff();
			$base64=new Base64();
			$allegedrc4= new AllegedRC4();		
			$resultado=0;
			//PASO 1
			$resultado+=(($fact.$verhoeff->Procesar($fact).$verhoeff->Procesar($fact.$verhoeff->Procesar($fact))));
			
			$fact=(string)(($fact.$verhoeff->Procesar($fact).$verhoeff->Procesar($fact.$verhoeff->Procesar($fact))));
			$resultado+=(($nnit.$verhoeff->Procesar($nnit).$verhoeff->Procesar($nnit.$verhoeff->Procesar($nnit))));
			$nnit=(string)(($nnit.$verhoeff->Procesar($nnit).$verhoeff->Procesar($nnit.$verhoeff->Procesar($nnit))));
			$resultado+=(($fecha_trans.$verhoeff->Procesar($fecha_trans).$verhoeff->Procesar($fecha_trans.$verhoeff->Procesar($fecha_trans))));
			$fecha_trans=(string)(($fecha_trans.$verhoeff->Procesar($fecha_trans).$verhoeff->Procesar($fecha_trans.$verhoeff->Procesar($fecha_trans))));
			$resultado+=(($monto_trans.$verhoeff->Procesar($monto_trans).$verhoeff->Procesar($monto_trans.$verhoeff->Procesar($monto_trans))));
			$monto_trans=(string)(($monto_trans.$verhoeff->Procesar($monto_trans).$verhoeff->Procesar($monto_trans.$verhoeff->Procesar($monto_trans))));
			
			$v1=$verhoeff->Procesar((string)$resultado);
			$v2=$verhoeff->Procesar((string)$resultado.$v1);
			$v3=$verhoeff->Procesar((string)$resultado.$v1.$v2);
			$v4=$verhoeff->Procesar((string)$resultado.$v1.$v2.$v3);
			$v5=$verhoeff->Procesar((string)$resultado.$v1.$v2.$v3.$v4);
			$dv=(((((int)$v1)*10+((int)$v2))*10+((int)$v3))*10+((int)$v4))*10+((int)$v5);
			$l=array(((int)$v1)+1,((int)$v2)+1,((int)$v3)+1,((int)$v4)+1,((int)$v5)+1);
			
			//PASO 2

			$autorizacion1=$autorizacion.substr($llave,0,($dv/10000%10+1)); 
			$fact1=$fact.substr($llave,($dv/10000%10+1),($dv/1000%10+1));	
			$nnit1=$nnit.substr($llave,($dv/10000%10+1)+($dv/1000%10+1),($dv/100%10+1)); 
			$fecha_trans1=$fecha_trans.substr($llave,($dv/10000%10+1)+($dv/1000%10+1)+($dv/100%10+1),($dv/10%10+1)); 
			$monto_trans1=$monto_trans.substr($llave,($dv/10000%10+1)+($dv/1000%10+1)+($dv/100%10+1)+($dv/10%10+1),($dv/1%10+1)); 
			$concat1=$autorizacion1.$fact1.$nnit1.$fecha_trans1.$monto_trans1; 

			$variable="".(string)$l[0].(string)($l[1]-1).(string)($l[2]-1).(string)($l[3]-1).(string)($l[4]-1);

			$llave_dv=$llave.($l[0]-1).''.($l[1]-1).''.($l[2]-1).''.($l[3]-1).''.($l[4]-1);

			$paso3= $allegedrc4->Procesar($concat1, $llave_dv);
			$sp1=0; 
			$sp2=0; 
			$sp3=0; 
			$sp4=0; 
			$sp5=0; 
			$cont=1;
			for($i=0; $i<strlen($paso3); $i++){
				
				if($cont>5)
					$cont=1;
				if($cont==1)
					$sp1+=$allegedrc4->ObtenerASCII($paso3[$i]);
				if($cont==2)
					$sp2+=$allegedrc4->ObtenerASCII($paso3[$i]);
				if($cont==3)
					$sp3+=$allegedrc4->ObtenerASCII($paso3[$i]);
				if($cont==4)
					$sp4+=$allegedrc4->ObtenerASCII($paso3[$i]);
				if($cont==5)
					$sp5+=$allegedrc4->ObtenerASCII($paso3[$i]);
				$cont++;
			}
			
			$st=(int)((($sp1+$sp2+$sp3+$sp4+$sp5)*$sp1) / ($dv/10000%10+1));
			$st+=(int)((($sp1+$sp2+$sp3+$sp4+$sp5)*$sp2) / ($dv/1000%10+1));
			$st+=(int)((($sp1+$sp2+$sp3+$sp4+$sp5)*$sp3) / ($dv/100%10+1));
			$st+=(int)((($sp1+$sp2+$sp3+$sp4+$sp5)*$sp4) / ($dv/10%10+1));
			$st+=(int)((($sp1+$sp2+$sp3+$sp4+$sp5)*$sp5) / ($dv/1%10+1));
			
			$paso5=$base64->Procesar($st);
			$paso6=$allegedrc4->Procesar($paso5,$llave_dv);
			$res_final="";
			$x=1;
			for($i=0; $i<strlen($paso6) ; $i++){
				$res_final=$res_final.$paso6[$i];
				if($x==2)
					$res_final.='-';
				$x++;
				if($x>2)
					$x=1;
			}
			return substr($res_final,0,strlen($res_final)-1);
		}
		
//*************************************************************************************************************************************//
//**********************************************METODOS PARA PRUEBA DE CODIGO DE CONTROL***********************************************//
//*************************************************************************************************************************************//
		public function generarFactura($row,$fact,$nnit,$fecha_trans,$monto,$llave,$autorizacion,$codigo_control_prueba){
			
			$resultado = $this->codControl(trim($fact),trim($nnit),$fecha_trans,(string)(round($monto)),$llave,$autorizacion);	
			//if($resultado!==$codigo_control_prueba){
				/*list($dia, $mes, $año) = split('/', $fecha_trans);
					
					if(strlen($dia)==4)
					$fecha_trans=$dia."".$mes."".$año;
					
					if(strlen($dia)==2)
					$fecha_trans=$año."".$mes."".$dia;*/
					
				ECHO $row. '  --> '.$resultado; 
				ECHO $resultado===$codigo_control_prueba? ' ------ OK ------ ':' ------ NO ------ ';
				ECHO $codigo_control_prueba .'<BR>';
			//}
			return $resultado;
		}
		public function phpExcel($mostrar_info_facturas,$codigo_qr,$literal){
			$inputFileName = '5000Casos.xls';

			try {
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);

			} catch(Exception $e) {
				die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
			}
			$sheet = $objPHPExcel->getSheet(0); 
			$highestRow = $sheet->getHighestRow(); 
			$highestColumn = $sheet->getHighestColumn();
			ECHO '<br> CODIGO GENERADO.....VS .....CODIGO PRUEBA<br>';
	
			for ($row = 0; $row <= 4999; $row++){ 
				
					$fact=$objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3, 6+$row)->getFormattedValue();
					$nnit_cliente=$objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4,6+$row)->getFormattedValue();
					list($dia, $mes, $año) = split('/', $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5,6+$row)->getFormattedValue());
					
					if(strlen($dia)==4)
					$fecha_trans=$dia."".$mes."".$año;
					
					if(strlen($dia)==2)
					$fecha_trans=$año."".$mes."".$dia;
					
					$monto1= str_replace(",", "", $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, 6+$row)->getFormattedValue());
					$monto=round($monto1);
					$monto_trans=(string)$monto;
					$llave=$objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7,6+$row)->getFormattedValue();
					$autorizacion=$objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2, 6+$row)->getFormattedValue();
					$codigo_control_prueba=$objPHPExcel->getActiveSheet()->getCellByColumnAndRow(12,6+$row)->getFormattedValue();
					
					$this->generarFactura($row+1,$fact,$nnit_cliente,$fecha_trans,$monto_trans,$llave,$autorizacion,$codigo_control_prueba);
					
					$nit_emisor='1665979';
					if(strlen($dia)==4)
						$fecha_emision=$año."/".$mes."/".$dia;
					
					if(strlen($dia)==2)
						$fecha_emision=$dia."/".$mes."/".$año;
					if($codigo_qr)
						echo $this->genQRcode(50,$nit_emisor.'|'.$fact.'|'.$autorizacion.'|'.$fecha_emision.'|'.(float)$monto.'|'.(float)$monto.'|'.$this->codControl($fact,$nnit_cliente,$fecha_trans,$monto_trans,$llave,$autorizacion).'|'.$nnit_cliente.'|0|0|0|0').'<br>';
					if($mostrar_info_facturas){
						echo 'Factura :'.$fact.'<br>';
						echo 'Nit :'.$nnit_cliente.'<br>';
						echo 'Fecha :'.$fecha_trans.'<br>';
						echo 'Monto :'.$monto_trans.'<br>';
						echo 'Llave :'.$llave.'<br>';
						echo 'Autorizacion :'.$autorizacion.'<br>';
					}
					if($literal)
						echo numtoletras($monto_trans).'<br>';
					echo '------------------------------------------------------------------------------------------------------------<br>';
			}
		}
	}
	
	
?>
