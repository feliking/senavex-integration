<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     imprimirCertificados.php v1.0 02-03-2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2015 Servicio Nacional de Verificación de Exportaciones
 */
//session_start();
/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'CertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'EstadoCO.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');

include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');

class ImprimirCertificado extends Principal {

  public function ImprimirCertificado() {
    $certificado_origen = new CertificadoOrigen();
    $sqlCertificadoOrigen = new SQLCertificadoOrigen();

    if ($_REQUEST['tarea'] == 'imprimirCertificadoOrigen') {
        $certificado_origen->setId_certificado_origen($_REQUEST["id_certificado_origen"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        
        switch ($certificado_origen->getId_tipo_co()){
            case '1':
                header ("Location: src/controlador/imprimirCertificado/CertificadoAladi.php?co=".$certificado_origen->getId_certificado_origen());
                break;
            case '2':
                header ("Location: src/controlador/imprimirCertificado/CertificadoMercosur.php?co=".$certificado_origen->getId_certificado_origen());
                break;
            case '3':
                header ("Location: src/controlador/imprimirCertificado/CertificadoSgp.php?co=".$certificado_origen->getId_certificado_origen());
                break;
            case '4':
                header ("Location: src/controlador/imprimirCertificado/CertificadoVenezuela.php?co=".$certificado_origen->getId_certificado_origen());
                break;
            case '5':
                header ("Location: src/controlador/imprimirCertificado/CertificadoTercerosPaises.php?co=".$certificado_origen->getId_certificado_origen());
                break;
        }
        exit;
    }
    
    if ($_REQUEST['tarea'] == 'imprimirCertificadoOrigenExportador') {
        $certificado_origen->setId_certificado_origen($_REQUEST["id_certificado_origen"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        
        switch ($certificado_origen->getId_tipo_co()){
            case '1':
                header ("Location: src/controlador/imprimirCertificado/CertificadoAladiExportador.php?co=".$certificado_origen->getId_certificado_origen());
                break;
            case '2':
                header ("Location: src/controlador/imprimirCertificado/CertificadoMercosurExportador.php?co=".$certificado_origen->getId_certificado_origen());
                break;
            case '3':
                header ("Location: src/controlador/imprimirCertificado/CertificadoSgpExportador.php?co=".$certificado_origen->getId_certificado_origen());
                break;
            case '4':
                header ("Location: src/controlador/imprimirCertificado/CertificadoVenezuelaExportador.php?co=".$certificado_origen->getId_certificado_origen());
                break;
            case '5':
                header ("Location: src/controlador/imprimirCertificado/CertificadoTercerosPaisesExportador.php?co=".$certificado_origen->getId_certificado_origen());
                break;
        }
        exit;
    }
    
    if ($_REQUEST['tarea'] == 'imprimirCertificadoOrigenNumero') {
        $certificado_origen->setId_certificado_origen($_REQUEST["id_certificado_origen"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        
        switch ($certificado_origen->getId_tipo_co()){
            case '1':
                header ("Location: src/controlador/imprimirCertificado/CertificadoAladiNumero.php?co=".$certificado_origen->getId_certificado_origen());
                break;
            case '2':
                header ("Location: src/controlador/imprimirCertificado/CertificadoMercosurNumero.php?co=".$certificado_origen->getId_certificado_origen());
                break;
            case '3':
                header ("Location: src/controlador/imprimirCertificado/CertificadoSgpNumero.php?co=".$certificado_origen->getId_certificado_origen());
                break;
            case '4':
                header ("Location: src/controlador/imprimirCertificado/CertificadoVenezuelaNumero.php?co=".$certificado_origen->getId_certificado_origen());
                break;
            case '5':
                header ("Location: src/controlador/imprimirCertificado/CertificadoTercerosPaisesNumero.php?co=".$certificado_origen->getId_certificado_origen());
                break;
        }
        exit;
    }
    
    if ($_REQUEST['tarea'] == 'imprimirCertificadoOrigenBlanco') {
        $certificado_origen->setId_certificado_origen($_REQUEST["id_certificado_origen"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        
        switch ($certificado_origen->getId_tipo_co()){
            case '1':
                header ("Location: src/controlador/imprimirCertificado/CertificadoAladiBlanco.php");
                break;
            case '2':
                header ("Location: src/controlador/imprimirCertificado/CertificadoMercosurBlanco.php");
                break;
            case '3':
                header ("Location: src/controlador/imprimirCertificado/CertificadoSgpBlanco.php");
                break;
            case '4':
                header ("Location: src/controlador/imprimirCertificado/CertificadoVenezuelaBlanco.php");
                break;
            case '5':
                header ("Location: src/controlador/imprimirCertificado/CertificadoTercerosPaisesBlanco.php");
                break;
        }
        exit;
    }
  }
}


?>