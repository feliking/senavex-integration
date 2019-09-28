<?php

defined('_ACCESO') or die('Acceso restringido');
include_once(PATH_BASE . DS . 'lib' . DS . 'phpqrcode'. DS .'qrlib.php');
//include('../lib/full/qrlib.php'); 

class CodigoQr  {
  public function CodigoQr() 
  {
    QRcode::png('es un qr');
  }
}