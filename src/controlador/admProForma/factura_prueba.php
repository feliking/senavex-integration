<?php 
	
	include_once ('verhoeff.php');
	include_once ('base64.php');
	include_once ('allegedrc4.php');
	class facturar{
		public function facturar(){
		}
	}
	$verhoeff=new Verhoeff();
	$base64=new Base64();
	$allegedrc4= new AllegedRC4();
	//7904006306693|876814|1665979|20080519|35958,6|zZ7Z]xssKqkEf_6K9uH(EcV+%x+u[Cca9T%+_$kiLjT8(zr3T9b5Fx2xG-D+_EBS|27773|7904006306693zZ787681455Z]xssKqk166597949Ef_6K9uH2008051967(EcV+%x+3595999u[Cc|15847127|ySxN|
	
	//7B-F3-48-A8|
	$fact="876814";
	$nnit="1665979";
	$fecha_trans='20080519';
	$monto=round(35958.6);
	$monto_trans=(string)$monto;
	//$suma='420925371702';
	$llave='zZ7Z]xssKqkEf_6K9uH(EcV+%x+u[Cca9T%+_$kiLjT8(zr3T9b5Fx2xG-D+_EBS';
	$autorizacion="7904006306693";
	
	
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

	/*echo 'autorizacion ='.$autorizacion1.'<br>';
	echo 'fact1 ='.$fact1.'<br>';
	echo 'nnit1 ='.$nnit1.'<br>';
	echo 'fecha trans1 ='.$fecha_trans1.'<br>';
	echo 'monto_trans1 ='.$monto_trans1.'<br>';*/
		
	$concat1=$autorizacion1.$fact1.$nnit1.$fecha_trans1.$monto_trans1;
	//echo '290400110079rCB7Sv4150312X24189179011589d)5k7N2007070201%3a250031b8<br>';
	//echo $concat1.'<br>';
		
	$llave_dv=$llave.(string)$dv;
	//echo $llave_dv;
		
	//echo RellenaCero('b').'<br>';*/
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
	echo 'Verhoeff : '.$dv.'<br>';
	echo 'Base64 : '.$paso5.'<br>';
	echo 'AllegedRC4 : '.$paso6.'<br>';
	echo substr($res_final,0,strlen($res_final)-1).'<br>';
	echo '<br>';
	echo 'control : 7B-F3-48-A8';
	

?>
