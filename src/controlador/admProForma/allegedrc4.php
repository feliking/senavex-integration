<?php

	class AllegedRC4
	{
		public function AllegedRC4(){}
		
		function ObtenerASCII($cadena)
		{
			return (int)ord($cadena);
		}
		function RellenaCero($cadena){
			$text=$cadena;
			
			if(strlen($text)==1){
				$text='0'.$text;
			}
			return $text;
		}
		function Procesar($mensaje , $key){
			$x=0;
			$y=0;
			$Index1=0;
			$Index2=0;
			$NMen=0;
			$MensajeCifrado="";
			$State=array();
			
			for ($i=0 ; $i<256 ; $i++){
				$State[$i]=$i;
			}
			for ($i=0 ; $i<256 ; $i++){
				$Index2=(($this->ObtenerASCII($key[$Index1]))+$State[$i]+$Index2) % 256;
				$aux=(int)$State[$i];
				$State[$i]=$State[$Index2];
				$State[$Index2]=$aux;
				$Index1=($Index1 + 1) % strlen($key);
			} 
			
			for ($i=0 ; $i<strlen($mensaje) ; $i++){
				$x=($x + 1) % 256;
				$y=($State[$x] + $y) % 256;
				$aux=(int)$State[$x];
				$State[$x]=$State[$y];
				$State[$y]=$aux;
				
				$data1=$this->ObtenerASCII($mensaje[$i]);
				$data2=$State[($State[$x] + $State[$y]) % 256];
				
				
				$NMen=$data1 ^ $data2 ;
				$MensajeCifrado = $MensajeCifrado.$this->RellenaCero(dechex($NMen));
				
			}
			//echo 'allegedrc4 '.strtoupper(substr($MensajeCifrado,0,strlen($MensajeCifrado))).'<br>';
			return strtoupper(substr($MensajeCifrado,0,strlen($MensajeCifrado)));
		}
	}
		
	/*$b=	new AllegedRC4();
		
		
		
		echo $b->Procesar('290400110079rCB7Sv4150312X24189179011589d)5k7N2007070201%3a250031b8', '9rCB7Sv4X29d)5k7N%3ab89p-3(5[A71621').'<br>';
		echo $f='69DD0A42536C9900C4AE6484726C122ABDBF95D80A4BA403FB7834B3EC2A88595E2149A3D965923BA4547B42B9528AAE7B8CFB9996BA2B58516913057C9D791B6B748A<br>';
		
		
		echo $b->Procesar('d3Ir6','sesamo').'<br>';
		echo $b->Procesar('piWCp','Aa1-bb2-Cc3-Dd4').'<br>';
		echo $b->Procesar('IUKYo','XBCPY-GKGX4-PGK44-8B632-X9P33').'<br>';
		echo 'ñ"¡123';*/
?>
