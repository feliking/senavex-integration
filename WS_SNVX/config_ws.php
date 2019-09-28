<?php
define('BD_SERVIDOR', '107.178.208.220');
define('BD_NOMBRE', 'vortex_final');
define('BD_USUARIO', 'postgres');
define('BD_PASSWORD', 'enex.2015');

//putenv("7f28b7caf66849dd8bd967a534d15e14");
putenv("secret=7f28b7caf66849dd8bd967a534d15e14");

$db = new PDO('pgsql:host=' . BD_SERVIDOR . ';dbname=' . BD_NOMBRE, BD_USUARIO, BD_PASSWORD);

?>