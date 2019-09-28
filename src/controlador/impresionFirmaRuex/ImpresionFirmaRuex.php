<?php
session_start();
ini_set ('error_reporting', E_ALL);
global $id_empresa;
global $id_persona;
global $formail;
$id_empresa=$_REQUEST['sdfercw'];
$id_persona=$_REQUEST['tredrt'];
$formail=false;
include 'FpdfContrato.php';

?>