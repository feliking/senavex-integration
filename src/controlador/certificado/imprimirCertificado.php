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

include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');

$certificado_origen = new CertificadoOrigen();
$sqlCertificadoOrigen = new SQLCertificadoOrigen();

$certificado_origen->setId_certificado_origen($_REQUEST["id_certificado_origen"]);
$certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);

switch ($certificado_origen->getId_tipo_co()){
    case '1':
        $co_aladi->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_aladi=$sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);

        $co_aladiddjjfactura->setId_co_aladi($co_aladi->getId_co_aladi());
        $detalle_aladi=$sqlCOAladiDdjjFactura->getListarDdjjFacturasPorCoAladi($co_aladiddjjfactura);

        $vista->assign("co_aladi",$co_aladi);
        $vista->assign("detalle_aladi",$detalle_aladi);
        $vista->assign("co_aladiddjjfactura",$co_aladiddjjfactura);
        break;

    case '2':
        $co_mercosur->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_mercosur=$sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);

        $co_mercosurddjjfactura->setId_co_mercosur($co_mercosur->getId_co_mercosur());
        $detalle_mercosur=$sqlCOMercosurDdjjFactura->getListarDdjjFacturasPorCoMercosur($co_mercosurddjjfactura);

        $vista->assign("co_mercosur",$co_mercosur);
        $vista->assign("detalle_mercosur",$detalle_mercosur);
        $vista->assign("co_mercosurddjjfactura",$co_mercosurddjjfactura);
        break;

    case '3':
        $co_sgp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_sgp=$sqlCOSgp->getListarCertificadosSgpPorCO($co_sgp);

        $co_sgpddjjfactura->setId_co_sgp($co_sgp->getId_co_sgp());
        $detalle_sgp=$sqlCOSgpDdjjFactura->getListarDdjjFacturasPorCoSgp($co_sgpddjjfactura);

        $vista->assign("co_sgp",$co_sgp);
        $vista->assign("detalle_sgp",$detalle_sgp);
        $vista->assign("co_sgpddjjfactura",$co_sgpddjjfactura);
        break;

    case '4':
        $co_venezuela->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_venezuela=$sqlCOVenezuela->getListarCertificadosVenezuelaPorCO($co_venezuela);

        $co_venezueladdjjfactura->setId_co_venezuela($co_venezuela->getId_co_venezuela());
        $detalle_venezuela=$sqlCOVenezuelaDdjjFactura->getListarDdjjFacturasPorCoVenezuela($co_venezueladdjjfactura);

        $vista->assign("co_venezuela",$co_venezuela);
        $vista->assign("detalle_venezuela",$detalle_venezuela);
        $vista->assign("co_venezueladdjjfactura",$co_venezueladdjjfactura);
        break;

    case '5':
        $co_tp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
        $co_tp=$sqlCOTp->getListarCertificadosTpPorCO($co_tp);

        $co_tpddjjfactura->setId_co_tp($co_tp->getId_co_tp());
        $detalle_tp=$sqlCOTpDdjjFactura->getListarDdjjFacturasPorCoTp($co_tpddjjfactura);

        $vista->assign("co_tp",$co_tp);
        $vista->assign("detalle_tp",$detalle_tp);
        $vista->assign("co_tpddjjfactura",$co_tpddjjfactura);
        break;
}


?>