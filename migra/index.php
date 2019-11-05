<!DOCTYPE html>
<html>
<head>
	<title>title</title>
</head>
<body>
<h1> Exportar a PostgreSQL</h1>
<?php

if(isset($_POST['SubmitButton'])){ //check if form was submitted


	 
	  /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/

	require_once 'PHPExcel/Classes/PHPExcel.php';


	$user = "postgres";
	$password = "123456";
	$dbname = "vortex_02";
	$port = "5432";
	$host = "localhost";

	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

	$conexion = pg_connect($cadenaConexion) or die("Error en la Conexión: ".pg_last_error());
	echo "<h3 style='color: green'>Conexion Exitosa PHP - PostgreSQL</h3><br>";

	for ($i = 10764; $i <= 10771; $i++){
		// $archivo = $_FILES['archivo']['tmp_name'];
		$archivo = "file/".$i.".xlsx";
		$j= $i - 10000;
	if (is_file( $archivo )){
		$inputFileType = PHPExcel_IOFactory::identify($archivo);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($archivo);
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		for ($row = 11; $highestRow; $row++){
		    $subpartida = $sheet->getCell("C".$row)->getCalculatedValue();
		    if ($subpartida == '') break; //
		    $desc_arancelaria = $sheet->getCell("D".$row)->getCalculatedValue();
		    $desc_comercial = $sheet->getCell("E".$row)->getCalculatedValue();
		    $desc_comercial = str_replace("'", " ", $desc_comercial);

		    $cantidad = $sheet->getCell("F".$row)->getCalculatedValue();
			$unidad_medida = $sheet->getCell("G".$row)->getCalculatedValue();
			$peso_bruto = $sheet->getCell("H".$row)->getCalculatedValue();

		    $precio_unitario = $sheet->getCell("I".$row)->getCalculatedValue();
		    $valor_total = $sheet->getCell("J".$row)->getCalculatedValue();

		   $precio_unitario_fob_divisa = $sheet->getCell("L".$row)->getCalculatedValue();
		   
		   $valor_fob_total_divisa = $sheet->getCell("M".$row)->getCalculatedValue();

		   if($unidad_medida == 'u') $unidad_medida = 1;
		   else $unidad_medida = 2;
			//    $valor_fob_total_divisa = $sheet->getCell("M".$row)->getCalculatedValue();
			if(!$precio_unitario_fob_divisa && !$valor_fob_total_divisa && $peso_bruto) {
			    $sql = "
				INSERT INTO public.autorizacion_previa_detalle( 
					codigo_nandina, 
					descripcion_arancelaria, 
					descripcion_comercial, 
					cantidad, 
					unidad_medida, 
					peso, 
					precio_unitario_fob, 
					fob, 
					id_autorizacion_previa)
					VALUES (
					    '$subpartida', 
					    '$desc_arancelaria', 
					    '$desc_comercial',
					    ".$cantidad.", 
					    ".$unidad_medida.", 
					    ".$peso_bruto.", 
					    ".$precio_unitario.", 
					    ".$valor_total.",
					    ".$j.");
				        ";
				        // echo 1;
				        pg_query($conexion, $sql);
			} else if (!$precio_unitario_fob_divisa && !$valor_fob_total_divisa && !$peso_bruto) {
			    $sql = "
				INSERT INTO public.autorizacion_previa_detalle(
					codigo_nandina, 
					descripcion_arancelaria, 
					descripcion_comercial, 
					cantidad, 
					unidad_medida,
					precio_unitario_fob, 
					fob, 
					id_autorizacion_previa)
					VALUES (
					    '$subpartida', 
					    '$desc_arancelaria', 
					    '$desc_comercial',
					    ".$cantidad.", 
					    ".$unidad_medida.",
					    ".$precio_unitario.", 
					    ".$valor_total.",
					    ".$j.");
				        ";
				        // echo 2;
				        pg_query($conexion, $sql);
			} else if ($precio_unitario_fob_divisa && $valor_fob_total_divisa && !$peso_bruto) {
			    $sql = "
				INSERT INTO public.autorizacion_previa_detalle(
					codigo_nandina, 
					descripcion_arancelaria, 
					descripcion_comercial, 
					cantidad, 
					unidad_medida,
					precio_unitario_fob, 
					fob, 
					valor_fob_total_divisa, 
					precio_unitario_fob_divisa, 
					id_autorizacion_previa)
					VALUES (
					    '$subpartida', 
					    '$desc_arancelaria', 
					    '$desc_comercial',
					    ".$cantidad.", 
					    ".$unidad_medida.", 
					    ".$precio_unitario.", 
					    ".$valor_total.",
					    ".$precio_unitario_fob_divisa.", 
					    ".$valor_fob_total_divisa.", 
					    ".$j.");
				        ";
				        pg_query($conexion, $sql);
			} else if (!$precio_unitario_fob_divisa && $valor_fob_total_divisa) {
			    $sql = "
				INSERT INTO public.autorizacion_previa_detalle(
					codigo_nandina, 
					descripcion_arancelaria, 
					descripcion_comercial, 
					cantidad, 
					unidad_medida, 
					peso, 
					precio_unitario_fob, 
					fob, 
					valor_fob_total_divisa, 
					id_autorizacion_previa)
					VALUES (
					    '$subpartida', 
					    '$desc_arancelaria', 
					    '$desc_comercial',
					    ".$cantidad.", 
					    ".$unidad_medida.", 
					    ".$peso_bruto.", 
					    ".$precio_unitario.", 
					    ".$valor_total.",
					    ".$valor_fob_total_divisa.", 
					    ".$j.");
				        ";
				        pg_query($conexion, $sql);
			} else if ($precio_unitario_fob_divisa && !$valor_fob_total_divisa) {
			    $sql = "
				INSERT INTO public.autorizacion_previa_detalle(
					codigo_nandina, 
					descripcion_arancelaria, 
					descripcion_comercial, 
					cantidad, 
					unidad_medida, 
					peso, 
					precio_unitario_fob, 
					fob,
					precio_unitario_fob_divisa, 
					id_autorizacion_previa)
					VALUES (
					    '$subpartida', 
					    '$desc_arancelaria', 
					    '$desc_comercial',
					    ".$cantidad.", 
					    ".$unidad_medida.", 
					    ".$peso_bruto.", 
					    ".$precio_unitario.", 
					    ".$valor_total.",
					    ".$precio_unitario_fob_divisa.",
					    ".$j.");
				        ";
				        pg_query($conexion, $sql);
			} else if ($precio_unitario_fob_divisa && $valor_fob_total_divisa) {
			    $sql = "
				INSERT INTO public.autorizacion_previa_detalle(
					codigo_nandina, 
					descripcion_arancelaria, 
					descripcion_comercial, 
					cantidad, 
					unidad_medida, 
					peso, 
					precio_unitario_fob, 
					fob, 
					valor_fob_total_divisa, 
					precio_unitario_fob_divisa, 
					id_autorizacion_previa)
					VALUES (
					    '$subpartida', 
					    '$desc_arancelaria', 
					    '$desc_comercial',
					    ".$cantidad.", 
					    ".$unidad_medida.", 
					    ".$peso_bruto.", 
					    ".$precio_unitario.", 
					    ".$valor_total.",
					    ".$precio_unitario_fob_divisa.", 
					    ".$valor_fob_total_divisa.", 
					    ".$j.");
				        ";
				        pg_query($conexion, $sql);
			} 

		}//enf for exce

	} // end if

	} //end for carpetas
		// pg_close($conexion);
} 
?>

Seleccione el archivo a subir
<form action="" method="post">

          migrar

            <input type="submit"  name="SubmitButton" value="Subir archivo"></input>

</form>

</body>
</html>
