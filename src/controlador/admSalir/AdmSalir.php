<?php

defined('_ACCESO') or die('Acceso restringido');


class AdmSalir extends Principal {

  public function AdmSalir() {
    session_destroy();  
     header("Location: index.php");
  }
}
?>