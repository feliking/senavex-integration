<?php 
	class Base64{
		function Base64(){
			
		}
		
		public function Procesar($numero){
			$num=(int)$numero;
			$diccionario=array( '0','1','2','3','4','5','6','7','8','9',
								'A','B','C','D','E','F','G','H','I','J',
								'K','L','M','N','O','P','Q','R','S','T',
								'U','V','W','X','Y','Z','a','b','c','d',
								'e','f','g','h','i','j','k','l','m','n',
								'o','p','q','r','s','t','u','v','w','x',
								'y','z','+','/');
							
			$cociente=1; $resto=0;
			$palabra="";
		
			while ($cociente >= 1)
			{
				$cociente = $num / 64;
				$resto = $num % 64;
				$palabra=$diccionario[$resto].$palabra;
				$num=$cociente;
				
				//echo '<br>diccionario['.$resto.'] :'.$diccionario[$resto];
				/*echo '<br>cociente = '.$cociente .' => '.'numero('.$num.')/64';
				echo '<br>resto = '. $resto.' => '.'numero('.$num.') % 64';
				echo '<br>palabra = '.$palabra.' => $diccionario[$resto] ('.$diccionario[$resto].').$palabra('.$palabra.')';
				echo '<br><br>';*/
			}
			//echo "base 64 ".$palabra.'<br>';
			
			return $palabra;
		}
	}
	
	/*$b=new Base64();
	echo '-------------------------------------------------------------';
	echo '<br>'.$b->Procesar(15847127).'---> ySxN <br>';
	echo '-------------------------------------------------------------';
	echo '<br><br><br>';
	echo '<br>'.$b->Procesar(23846491).'---> 1QzvR <br>';
	echo '-------------------------------------------------------------';
	//echo '<br>'.$b->Procesar(32906820).'---> 1zXv4 <br>';
	echo '-------------------------------------------------------------';
	//echo '<br>'.$b->Procesar(14654427).'---> tvlR <br>';
	echo '-------------------------------------------------------------';
*/

?>
