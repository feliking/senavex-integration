<?php
$user = 'postgres';
$passwd = 'enex.2015';
$db = 'senavex_sico';
$port = 2121;
$host = '10.240.230.229';
$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());
echo "Conexion exitosa <hr>";
?>
