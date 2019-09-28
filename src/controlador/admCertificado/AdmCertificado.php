<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     AdmInsumos.php v1.0 23-09-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');
include_once(PATH_CONTROLADOR . DS . 'admEmpresa' . DS . 'AdmEmpresa.php');
include_once(PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');

include_once(PATH_TABLA . DS . 'CertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');
include_once(PATH_TABLA . DS . 'EstadoDdjj.php');
include_once(PATH_TABLA . DS . 'DetalleArancel.php');
include_once(PATH_TABLA . DS . 'Factura.php');
include_once(PATH_TABLA . DS . 'FacturaNoDosificada.php');
include_once(PATH_TABLA . DS . 'FacturaTercerOperador.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'AcuerdoPais.php');
include_once(PATH_TABLA . DS . 'MedioTransporte.php');
include_once(PATH_TABLA . DS . 'EstadoCO.php');
include_once(PATH_TABLA . DS . 'EscalaCO.php');
include_once(PATH_TABLA . DS . 'COAladi.php');
include_once(PATH_TABLA . DS . 'COAladiDdjjFactura.php');
include_once(PATH_TABLA . DS . 'COMercosur.php');
include_once(PATH_TABLA . DS . 'COMercosurDdjjFactura.php');
include_once(PATH_TABLA . DS . 'COSgp.php');
include_once(PATH_TABLA . DS . 'COSgpDdjjFactura.php');
include_once(PATH_TABLA . DS . 'COVenezuela.php');
include_once(PATH_TABLA . DS . 'COVenezuelaDdjjFactura.php');
include_once(PATH_TABLA . DS . 'COTp.php');
include_once(PATH_TABLA . DS . 'COTpDdjjFactura.php');
include_once(PATH_TABLA . DS . 'ServicioExportador.php');
include_once(PATH_TABLA . DS . 'SistemaColas.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'InsumosFactura.php');
include_once(PATH_TABLA . DS . 'InsumosFacturaNoDosificada.php');
include_once(PATH_TABLA . DS . 'UnidadMedida.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'DatosTercerOperador.php');
include_once(PATH_TABLA . DS . 'AnulacionCo.php');
include_once(PATH_TABLA . DS . 'DetalleArancel.php');

include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLTipoCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLDeclaracionJurada.php');
include_once(PATH_MODELO . DS . 'SQLDetalleArancel.php');
include_once(PATH_MODELO . DS . 'SQLFactura.php');
include_once(PATH_MODELO . DS . 'SQLFacturaNoDosificada.php');
include_once(PATH_MODELO . DS . 'SQLFacturaTercerOperador.php');
include_once(PATH_MODELO . DS . 'SQLAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');
include_once(PATH_MODELO . DS . 'SQLAcuerdoPais.php');
include_once(PATH_MODELO . DS . 'SQLEscalaCO.php');
include_once(PATH_MODELO . DS . 'SQLCOAladi.php');
include_once(PATH_MODELO . DS . 'SQLCOAladiDdjjFactura.php');
include_once(PATH_MODELO . DS . 'SQLCOMercosur.php');
include_once(PATH_MODELO . DS . 'SQLCOMercosurDdjjFactura.php');
include_once(PATH_MODELO . DS . 'SQLCOSgp.php');
include_once(PATH_MODELO . DS . 'SQLCOSgpDdjjFactura.php');
include_once(PATH_MODELO . DS . 'SQLCOTp.php');
include_once(PATH_MODELO . DS . 'SQLCOTpDdjjFactura.php');
include_once(PATH_MODELO . DS . 'SQLCOVenezuela.php');
include_once(PATH_MODELO . DS . 'SQLCOVenezuelaDdjjFactura.php');
include_once(PATH_MODELO . DS . 'SQLServicioExportador.php');
include_once(PATH_MODELO . DS . 'SQLSistemaColas.php');
include_once(PATH_MODELO . DS . 'SQLInsumosFactura.php');
include_once(PATH_MODELO . DS . 'SQLInsumosFacturaNoDosificada.php');
include_once(PATH_MODELO . DS . 'SQLUnidadMedida.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLDatosTercerOperador.php');
include_once(PATH_MODELO . DS . 'SQLAnulacionCo.php');
include_once(PATH_MODELO . DS . 'SQLDetalleArancel.php');

class AdmCertificado extends Principal {

  public function AdmCertificado() {

    $vista = Principal::getVistaInstance();

    $certificado_origen = new CertificadoOrigen();
    $tipo_co = new TipoCertificadoOrigen();
    $declaracion_jurada = new DeclaracionJurada();
    $factura = new Factura();
    $facturanodosificada = new FacturaNoDosificada();
    $factura_tercer_operador = new FacturaTercerOperador();
    $estado_co =  new EstadoCO();
    $pais = new Pais();
    $acuerdo = new Acuerdo();
    $acuerdo_pais = new AcuerdoPais();
    $escala_co = new EscalaCO();
    $co_aladi = new COAladi();
    $co_aladiddjjfactura = new COAladiDdjjFactura();
    $co_sgp = new COSgp();
    $co_sgpddjjfactura = new COSgpDdjjFactura();
    $co_tp = new COTp();
    $co_tpddjjfactura = new COTpDdjjFactura();
    $co_mercosur = new COMercosur();
    $co_mercosurddjjfactura = new COMercosurDdjjFactura();
    $co_venezuela = new COVenezuela();
    $co_venezueladdjjfactura = new COVenezuelaDdjjFactura();
    $servicio_exportador = new ServicioExportador();
    $sistema_colas = new SistemaColas();
    $insumos_factura = new InsumosFactura();
    $insumos_factura_no_dosificada = new InsumosFacturaNoDosificada();
    $unidad_medida = new UnidadMedida();
    $empresa = new Empresa();
    $empresa_persona = new EmpresaPersona();
    $datos_tercer_operador = new DatosTercerOperador();
    $anulacion_co = new AnulacionCo();
    $detalle_arancel = new DetalleArancel();

    $sqlCertificadoOrigen = new SQLCertificadoOrigen();
    $sqlTipoCO = new SQLTipoCertificadoOrigen();
    $sqlDeclaracionJurada = new SQLDeclaracionJurada();
    $sqlFactura = new SQLFactura();
    $sqlFacturaNoDosificada = new SQLFacturaNoDosificada();
    $sqlFacturaTercerOperador = new SQLFacturaTercerOperador();
    $sqlPais = new SQLPais();
    $sqlAcuerdo = new SQLAcuerdo();
    $sqlAcuerdoPais = new SQLAcuerdoPais();
    $sqlEscalaCO = new SQLEscalaCO();
    $sqlCOAladi = new SQLCOAladi();
    $sqlCOAladiDdjjFactura = new SQLCOAladiDdjjFactura();
    $sqlCOSgp = new SQLCOSgp();
    $sqlCOSgpDdjjFactura = new SQLCOSgpDdjjFactura();
    $sqlCOTp = new SQLCOTp();
    $sqlCOTpDdjjFactura = new SQLCOTpDdjjFactura();
    $sqlCOMercosur = new SQLCOMercosur();
    $sqlCOMercosurDdjjFactura = new SQLCOMercosurDdjjFactura();
    $sqlCOVenezuela = new SQLCOVenezuela();
    $sqlCOVenezuelaDdjjFactura = new SQLCOVenezuelaDdjjFactura();
    $sqlServicioExportador = new SQLServicioExportador();
    $sqlSistemaColas = new SQLSistemaColas();
    $sqlInsumosFactura = new SQLInsumosFactura();
    $sqlInsumosFacturaNoDosificada = new SQLInsumosFacturaNoDosificada();
    $sqlUnidadMedida = new SQLUnidadMedida();
    $sqlEmpresa = new SQLEmpresa();
    $sqlEmpresaPersona = new SQLEmpresaPersona();
    $sqlDatosTercerOperador = new SQLDatosTercerOperador();
    $sqlAnulacionCo = new SQLAnulacionCo();
    $sqlDetalleArancel = new SQLDetalleArancel();
    
    //******** CONTROLADORES PARA FUNCIONES DEL EXPORTADOR **********
    //Listar los Certificados de Origen a nivel general
    if($_REQUEST['tarea']=='prueba'){
        $reflect = new ReflectionClass('CertificadoOrigen');
        $propsPrivates = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
       
//        echo '<br>=====================PROPIEDADES PRIVADAS DE LA CLASE '.$reflect->getName().'==================================';
//        foreach ($propsPrivates as $propierties) {
//            echo '<br>'.$propierties->getName().' ==== ';
//            $propierties->setAccessible(true);
//            echo  $propierties->getValue($reflect).'<br>';
//
//        }
//
//        echo '<br>========================PROPIEDADES PUBLICAS DE LA CLASE '.$reflect->getName().'===============================';
//        //$reflect = new ReflectionClass(CertificadoOrigen);
//        $propsPublics = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
//
//        foreach ($propsPublics as $propierties) {
//            echo '<br>'.$propierties->getName().' ==== ';
//            $propierties->setAccessible(true);
//            echo  $propierties->getValue($reflect).'<br>';
//
//        }
//
//        echo '<br>====================CONSTANTES DE LA CLASE '.$reflect->getName().'===================================';
//
//        //$reflect = new ReflectionClass($certificado_origen);
//        $const = $reflect->getConstants();
//        print('<pre>'.print_r($const,true).'</pre>');
//        /*foreach ($const as $constantes) {
//            echo '<br>'.$constantes->getName().' ==== ';
//            echo  $constantes->getValue($certificado_origen).'<br>';
//        }*/
//        echo '<br>====================METODOS DE LA CLASE '.$reflect->getName().'===================================';
//
//        //$reflect = new ReflectionClass($certificado_origen);
//        
//        //print('<pre>'.print_r($reflect->getMethods(),true).'</pre>');
//        
//        /*echo '<br>====================ACCEDIENDO A LA TABLA co_aladi ===================================';
//        $reflect = new ReflectionClass('COMercosur');
//        $propsPrivates = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
//        foreach ($propsPrivates as $propierties) {
//            echo '<br>'.$propierties->getName().' ==== ';
//            $propierties->setAccessible(true);
//            echo  $propierties->getValue($reflect).'<br>';
//
//        }*/
    }
    if($_REQUEST['tarea']=='listarCertificadosOrigenVigentes'){
        $certificado_origen->setId_empresa($_SESSION["id_empresa"]);
        $certificado_origen->setId_estado_co(1);
        $resultado = $sqlCertificadoOrigen->getListarCertificadoOrigenPorEstado($certificado_origen);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            //Verificar los C.O. tipo ALADI
            if($datos->getId_tipo_co()==1){
                $co_aladi->setId_certificado_origen($datos->getId_certificado_origen());
                $resultado2= $sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);
                $correlativos = $resultado2->getCorrelativo_aladi();
            }
            if($datos->getId_tipo_co()==2){
                $co_mercosur->setId_certificado_origen($datos->getId_certificado_origen());
                $resultado2= $sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);
                $correlativos = $resultado2->getCorrelativo_mercosur();
            }
            if($datos->getId_tipo_co()==3){
                $co_sgp->setId_certificado_origen($datos->getId_certificado_origen());
                $resultado2= $sqlCOSgp->getListarCertificadosSgpPorCO($co_sgp);
                $correlativos = $resultado2->getCorrelativo_sgp();
            }
            if($datos->getId_tipo_co()==4){
                $co_venezuela->setId_certificado_origen($datos->getId_certificado_origen());
                $resultado2= $sqlCOVenezuela->getListarCertificadosVenezuelaPorCO($co_venezuela);
                $correlativos = $resultado2->getCorrelativo_venezuela();
            }
            if($datos->getId_tipo_co()==5){
                $co_tp->setId_certificado_origen($datos->getId_certificado_origen());
                $resultado2= $sqlCOTp->getListarCertificadosTpPorCO($co_tp);
                $correlativos = $resultado2->getCorrelativo_tp();
            }
            
            $strJson .= '{"id_certificado_origen":"' . $datos->getId_certificado_origen() .
                    '","tipo_co":"' . $datos->tipo_co->getAbreviatura() .
                    '","correlativo":"' . $correlativos .
                    '","acuerdo":"' . $datos->acuerdo->getSigla() .
                    '","pais":"' . $datos->pais->getNombre() .
                    '","fecha_emision":"' . substr($datos->getFecha_emision(), 0, 11) .
                    '","fecha_fin":"' . substr($datos->getFecha_fin(), 0, 11) . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }

    if($_REQUEST['tarea']=='listarCertificadosOrigenEnviados'){
        $certificado_origen->setId_empresa($_SESSION["id_empresa"]);
        $certificado_origen->setId_estado_co(2);
        $resultado = $sqlCertificadoOrigen->getListarCertificadoOrigenPorEstado($certificado_origen);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            
            $strJson .= '{"id_certificado_origen":"' . $datos->getId_certificado_origen() .
                    '","tipo_co":"' . $datos->tipo_co->getAbreviatura() .
                    '","acuerdo":"' . $datos->acuerdo->getSigla() .
                    '","pais":"' . $datos->pais->getNombre() .
                    '","fecha_llenado":"' . substr($datos->getFecha_llenado(), 0, 11) .
                    '","valor_fob_total":"' . $datos->getValor_fob_total() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }

    if($_REQUEST['tarea']=='listarCertificadosOrigenRechazados'){
        $certificado_origen->setId_empresa($_SESSION["id_empresa"]);
        $certificado_origen->setId_estado_co(3);
        $resultado = $sqlCertificadoOrigen->getListarCertificadoOrigenPorEstado($certificado_origen);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            
            $strJson .= '{"id_certificado_origen":"' . $datos->getId_certificado_origen() .
                    '","tipo_co":"' . $datos->tipo_co->getAbreviatura() .
                    '","acuerdo":"' . $datos->acuerdo->getSigla() .
                    '","pais":"' . $datos->pais->getNombre() .
                    '","fecha_llenado":"' . substr($datos->getFecha_llenado(), 0, 11) .
                    '","valor_fob_total":"' . $datos->getValor_fob_total() .
                    '","observaciones":"' . $datos->getObservaciones_certificador() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if($_REQUEST['tarea']=='listarCertificadosOrigenPasados'){
        $certificado_origen->setId_empresa($_SESSION["id_empresa"]);
        $certificado_origen->setId_estado_co(4);
        $resultado = $sqlCertificadoOrigen->getListarCertificadoOrigenPorEstado($certificado_origen);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            
            $strJson .= '{"id_certificado_origen":"' . $datos->getId_certificado_origen() .
                    '","tipo_co":"' . $datos->tipo_co->getAbreviatura() .
                    '","acuerdo":"' . $datos->acuerdo->getSigla() .
                    '","pais":"' . $datos->pais->getNombre() .
                    '","fecha_llenado":"' . substr($datos->getFecha_llenado(), 0, 11) .
                    '","valor_fob_total":"' . $datos->getValor_fob_total() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }

    if($_REQUEST['tarea']=='listarCertificadosOrigenAnulados'){
        $certificado_origen->setId_empresa($_SESSION["id_empresa"]);
        $certificado_origen->setId_estado_co(5);
        $resultado = $sqlCertificadoOrigen->getListarCertificadoOrigenPorEstado($certificado_origen);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            
            $strJson .= '{"id_certificado_origen":"' . $datos->getId_certificado_origen() .
                    '","tipo_co":"' . $datos->tipo_co->getAbreviatura() .
                    '","acuerdo":"' . $datos->acuerdo->getSigla() .
                    '","pais":"' . $datos->pais->getNombre() .
                    '","fecha_llenado":"' . substr($datos->getFecha_llenado(), 0, 11) .
                    '","valor_fob_total":"' . $datos->getValor_fob_total() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }

    if($_REQUEST['tarea']=='listarCertificadosOrigenParaCorreccion'){
        $certificado_origen->setId_empresa($_SESSION["id_empresa"]);
        $certificado_origen->setId_estado_co(6);
        $resultado = $sqlCertificadoOrigen->getListarCertificadoOrigenPorEstado($certificado_origen);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            
            $strJson .= '{"id_certificado_origen":"' . $datos->getId_certificado_origen() .
                    '","tipo_co":"' . $datos->tipo_co->getAbreviatura() .
                    '","acuerdo":"' . $datos->acuerdo->getSigla() .
                    '","pais":"' . $datos->pais->getNombre() .
                    '","fecha_llenado":"' . substr($datos->getFecha_llenado(), 0, 11) .
                    '","observaciones":"' . $datos->getObservaciones_certificador() .
                    '","valor_fob_total":"' . $datos->getValor_fob_total() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    //////////// Mostrar los datos del Certificado de Origen ///////////////
    if($_REQUEST['tarea']=='mostrarCertificado')
    {
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
                $detalle_sgp=$sqlCOSgpDdjjFactura->getListarDdjjFacturasPorCoSgp($co_sgpddjjfactura,$certificado_origen->getId_acuerdo());
                
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
        if($_REQUEST["anular"]==1){
            $anular=1;
        }
        $vista->assign("anular",$anular);
        $vista->assign("co",$certificado_origen);
        $vista->display("certificadoOrigen/MostrarTodoCertificadoOrigen.tpl");
        exit;
    }
    
    /////////// Registrar un Nuevo Certificado de Origen /////////////////////
    if($_REQUEST['tarea']=='nuevoCertificadoOrigen')
    {
        $tipo_co=$sqlTipoCO->getListarTipoCertificadoOrigen($tipo_co);
        $pais=$sqlPais->getListarPais($pais);
        $acuerdo=$sqlAcuerdo->getListarAcuerdo($acuerdo);
        $acuerdo_pais=$sqlAcuerdoPais->getListarAcuerdoPais($acuerdo_pais);
        $factura_tercer_operador->setId_Empresa($_SESSION["id_empresa"]);
        $factura_tercer_operador=$sqlFacturaTercerOperador->getListarFacturasTercerOperadorPorEmpresaNoUtilizado($factura_tercer_operador);
        
        //Facturas Bolivianas para el caso de Mercosur
        $factura->setId_Empresa($_SESSION['id_empresa']);
        $factura->setId_Acuerdo(2);
        $resultado=$sqlFactura->getListarFacturasVigentesPorEmpresayAcuerdo($factura);
        $facturanodosificada->setId_Empresa($_SESSION['id_empresa']);
        $facturanodosificada->setId_Acuerdo(2);
        $resultado2=$sqlFacturaNoDosificada->getListarFacturasVigentesPorEmpresayAcuerdo($facturanodosificada);
        
        $vista->assign('tipo_co', $tipo_co);
        $vista->assign('pais', $pais);
        $vista->assign('acuerdo', $acuerdo);
        $vista->assign('acuerdo_pais', $acuerdo_pais);
        $vista->assign('factura_tercer_operador', $factura_tercer_operador);
        $vista->assign('factura_boliviana_dosificada', $resultado);
        $vista->assign('factura_boliviana_no_dosificada', $resultado2);
        $vista->display("certificadoOrigen/NuevoCertificadoOrigen.tpl");
        exit;
    }
    
    //************ CONTROLADORES PARA EL CERTIFICADOR
    if($_REQUEST['tarea']=='listarRevisionCertificadosOrigen'){
        $vista->display("certificadoOrigen/listarRevisionCertificadosOrigen.tpl");
        exit;
    }
    
    if($_REQUEST['tarea']=='listarRevisionCertificados'){
        //$certificado_origen->setId_estado_co(2);
        $resultado = $sqlCertificadoOrigen->getListarCertificadosParaRevisar($certificado_origen, $_SESSION["id_persona"]);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        /*
        $longitud = sizeof($resultado);
        for($i=0; $i<$longitud; $i++){
            $strJson .= '{"id_certificado_origen":"' . $resultado[$i]["id_certificado_origen"] .
                    '","tipo_co":"' . $resultado[$i]["tipoco"] .
                    '","empresa":"' . $resultado[$i]["empresa"] .
                    '","pais":"' . $resultado[$i]["nombre_pais"] .
                    '","fecha_llenado":"' . substr($resultado[$i]["fecha_llenado"], 0, 11) . '"},';
            $selected='';
        }
        */
        foreach ($resultado as $datos){
            $strJson .= '{"id_certificado_origen":"' . $datos->getId_certificado_origen() .
                    '","tipo_co":"' . $datos->tipo_co->getAbreviatura() .
                    '","estado_co":"' . $datos->estado_co->getDescripcion() .
                    '","empresa":"' . $datos->empresa->getRazon_Social() .
                    '","pais":"' . $datos->pais->getNombre() .
                    '","valor_fob":"' . $datos->getValor_fob_total() .
                    '","fecha_llenado":"' . substr($datos->getFecha_llenado(), 0, 11) . '"},';
            $selected='';
        }
        
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    //Guardar Datos para el Certificado de Origen ALADI
    if($_REQUEST['tarea']=='guardarCOAladi'){
        $hoy = date("Y-m-d H:i:s");

        //Recuperar la tabla enviada en JSON y formatearla en Array u Objeto
        $tabla_aladi = $_REQUEST["tabla_aladi"];
        $tabla_aladi = json_decode($tabla_aladi, true);
        //Calcular el Valor FOB de todo el certificado
        $valor_fob_total = 0;
        foreach ($tabla_aladi as $valor){
            $valor_fob_total += $valor["total"];
        }
        
        //Verificar la escala de precios para sacar el total
        $escala_co->setId_tipo_co(1);
        $escala_co=$sqlEscalaCO->getListarEscalaPorCO($escala_co);

        foreach ($escala_co as $escala){
            if(($escala->getMonto_fob_inicial()<$valor_fob_total)&&($escala->getMonto_fob_final()>$valor_fob_total)){
                $costo = $escala->getImporte();
            }
        }
        
        //Generar el Servicio Exportador para el Certificado de Origen
        $serv_export = AdmSistemaColas::generarServicioExportadorParaCO($_SESSION["id_persona"],$costo,$_SESSION["id_empresa"],$valor_fob_total);

        //Guardar los Datos en la Tabla CertificadoOrigen
        $certificado_origen->setId_acuerdo($_REQUEST["id_acuerdo"]);
        $certificado_origen->setId_pais($_REQUEST["id_pais"]);
        $certificado_origen->setFecha_llenado($hoy);
        $certificado_origen->setValor_fob_total($valor_fob_total);
        $certificado_origen->setId_estado_co(2);
        $certificado_origen->setId_empresa($_SESSION["id_empresa"]);
        $certificado_origen->setId_persona($_SESSION["id_persona"]);
        $certificado_origen->setId_tipo_co(1);
        $certificado_origen->setId_regional($_REQUEST["id_regional"]);
        $certificado_origen->setId_servicio_exportador($serv_export);
        
        if($_REQUEST["fechaexportacion"]!=''){
            $certificado_origen->setFecha_exportacion($_REQUEST["fechaexportacion"]);
        }
        
        //Verificar la vigencia y colocar en la tupla
        $tipo_co->setId_tipo_co(1);
        $tipo_co=$sqlTipoCO->getBuscarTipoCertificadoPorId($tipo_co);
        $certificado_origen->setVigencia($tipo_co->getVigencia());
        
        if($sqlCertificadoOrigen->setGuardarCertificadoOrigen($certificado_origen)){
            //Recuperar el ID del CertificadoOrigen
            $datCO = $sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
            
            //Guardar en la tabla COAladi
            $co_aladi->setId_certificado_origen($datCO->getId_certificado_origen());
            if($_REQUEST["observacionesaladi"]!=''){
                $co_aladi->setObservaciones($_REQUEST["observacionesaladi"]);
            }
            if($_REQUEST["check_factterceroperadoraladi"]==TRUE){
                $datos_tercer_operador->setId_certificado_origen($datCO->getId_certificado_origen());
                $datos_tercer_operador->setNombre($_REQUEST["empresaterceroperadoraladi"]);
                $datos_tercer_operador->setDireccion($_REQUEST["direccionterceroperadoraladi"]);
                $datos_tercer_operador->setCiudad($_REQUEST["ciudadterceroperadoraladi"]);
                $datos_tercer_operador->setPais($_REQUEST["paisterceroperadoraladi"]);
                $datos_tercer_operador->setNumero_factura($_REQUEST["factterceroperadoraladi"]);
                if($sqlDatosTercerOperador->setGuardarDatosTercerOperador($datos_tercer_operador)){
                    echo "guardo tercer op. aladi";
                    $datTercerOp = $sqlDatosTercerOperador->getBuscarDatosTercerOperadorPorId($datos_tercer_operador);
                    $co_aladi->setId_datos_tercer_operador($datTercerOp->getId_datos_tercer_operador());
                }
            }else{
                $co_aladi->setId_datos_tercer_operador(0);
            }
            
            if($sqlCOAladi->setGuardarCertificadoAladi($co_aladi)){
                $datCOAladi = $sqlCOAladi->getBuscarCOAladiPorId($co_aladi);
                //Guardar las Ddjj y Facturas para el COAladi
                $this->guardarCOAladiDdjjFactura($tabla_aladi, $datCOAladi->getId_co_aladi());
            }else{
                echo "No se guardó el COAladi";
            }
            //$asist_senavex = AdmSistemaColas::generarColaParaCO($serv_export);
            
            echo "Se guardó el CO";
        }else{
            echo "No se guardó el CertificadoOrigen";
        }
        exit;
    }
    
    //Guardar Datos para el Certificado de Origen SGP
    if($_REQUEST['tarea']=='guardarCOSgp'){
        $hoy = date("Y-m-d H:i:s");
        
        //Recuperar la tabla enviada en JSON y formatearla en Array u Objeto
        $tabla_sgp = $_REQUEST["tabla_sgp"];
        $tabla_sgp = json_decode($tabla_sgp, true);
        //Calcular el Valor FOB de todo el certificado
        $valor_fob_total = 0;
        foreach ($tabla_sgp as $valor){
            $valor_fob_total += $valor["total"];
        }
        
        //Verificar la escala de precios para sacar el total
        $escala_co->setId_tipo_co(3);
        $escala_co=$sqlEscalaCO->getListarEscalaPorCO($escala_co);

        foreach ($escala_co as $escala){
            if(($escala->getMonto_fob_inicial()<$valor_fob_total)&&($escala->getMonto_fob_final()>$valor_fob_total)){
                $costo = $escala->getImporte();
            }
        }
        
        //Generar el Servicio Exportador para el Certificado de Origen
        $serv_export = AdmSistemaColas::generarServicioExportadorParaCO($_SESSION["id_persona"],$costo,$_SESSION["id_empresa"],$valor_fob_total);

        //Guardar los Datos en la Tabla CertificadoOrigen
        $certificado_origen->setId_acuerdo($_REQUEST["id_acuerdo"]);
        $certificado_origen->setId_pais($_REQUEST["id_pais"]);
        $certificado_origen->setFecha_llenado($hoy);
        $certificado_origen->setValor_fob_total($valor_fob_total);
        $certificado_origen->setId_estado_co(2);
        $certificado_origen->setId_empresa($_SESSION["id_empresa"]);
        $certificado_origen->setId_persona($_SESSION["id_persona"]);
        $certificado_origen->setId_tipo_co(3);
        $certificado_origen->setId_regional($_REQUEST["id_regional"]);
        $certificado_origen->setId_servicio_exportador($serv_export);
        
        if($_REQUEST["fechaexportacion"]!=''){
            $certificado_origen->setFecha_exportacion($_REQUEST["fechaexportacion"]);
        }
        
        //Verificar la vigencia y colocar en la tupla
        $tipo_co->setId_tipo_co(3);
        $tipo_co=$sqlTipoCO->getBuscarTipoCertificadoPorId($tipo_co);
        $certificado_origen->setVigencia($tipo_co->getVigencia());
        
        if($sqlCertificadoOrigen->setGuardarCertificadoOrigen($certificado_origen)){
            //Recuperar el ID del CertificadoOrigen
            $datCO = $sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
            
            //Guardar en la tabla COSgp
            $co_sgp->setId_certificado_origen($datCO->getId_certificado_origen());
            $co_sgp->setNombre_consignatario($_REQUEST["nombreconsignatario"]);
            $co_sgp->setDireccion_consignatario($_REQUEST["direccionconsignatario"]);
            $co_sgp->setId_pais_consignatario($_REQUEST["paisconsignatario"]);
            $co_sgp->setId_medio_transporte($_REQUEST["combomediotransportesgp"]);
            $co_sgp->setRuta($_REQUEST["rutasgp"]);
            $co_sgp->setId_pais_productor($_REQUEST["combopaisproductorsgp"]);
            if($_REQUEST["observacionessgp"]!=''){
                $co_sgp->setObservaciones($_REQUEST["observacionessgp"]);
            }
            
            if($sqlCOSgp->setGuardarCertificadoSgp($co_sgp)){
                $datCOSgp = $sqlCOSgp->getBuscarCOSgpPorId($co_sgp);
                //Guardar las Ddjj y Facturas para el COAladi
                $this->guardarCOSgpDdjjFactura($tabla_sgp, $datCOSgp->getId_co_sgp());
            }else{
                echo "No se guardó el COSgp";
            }
            //$asist_senavex = AdmSistemaColas::generarColaParaCO($serv_export);
            
            echo "Se guardó el CO";
        }else{
            echo "No se guardó el CertificadoOrigen";
        }
        exit;
    }
    
    //Guardar Datos para el Certificado de Origen TP
    if($_REQUEST['tarea']=='guardarCOTp'){
        $hoy = date("Y-m-d H:i:s");
        
        //Recuperar la tabla enviada en JSON y formatearla en Array u Objeto
        $tabla_tp = $_REQUEST["tabla_tp"];
        $tabla_tp = json_decode($tabla_tp, true);
        //Calcular el Valor FOB de todo el certificado
        $valor_fob_total = 0;
        foreach ($tabla_tp as $valor){
            $valor_fob_total += $valor["total"];
        }
        
        //Verificar la escala de precios para sacar el total
        $escala_co->setId_tipo_co(5);
        $escala_co=$sqlEscalaCO->getListarEscalaPorCO($escala_co);

        foreach ($escala_co as $escala){
            if(($escala->getMonto_fob_inicial()<$valor_fob_total)&&($escala->getMonto_fob_final()>$valor_fob_total)){
                $costo = $escala->getImporte();
            }
        }
        
        //Generar el Servicio Exportador para el Certificado de Origen
        $serv_export = AdmSistemaColas::generarServicioExportadorParaCO($_SESSION["id_persona"],$costo,$_SESSION["id_empresa"],$valor_fob_total);

        //Guardar los Datos en la Tabla CertificadoOrigen
        $certificado_origen->setId_acuerdo($_REQUEST["id_acuerdo"]);
        $certificado_origen->setId_pais($_REQUEST["id_pais"]);
        $certificado_origen->setFecha_llenado($hoy);
        $certificado_origen->setValor_fob_total($valor_fob_total);
        $certificado_origen->setId_estado_co(2);
        $certificado_origen->setId_empresa($_SESSION["id_empresa"]);
        $certificado_origen->setId_persona($_SESSION["id_persona"]);
        $certificado_origen->setId_tipo_co(5);
        $certificado_origen->setId_regional($_REQUEST["id_regional"]);
        $certificado_origen->setId_servicio_exportador($serv_export);
        
        if($_REQUEST["fechaexportacion"]!=''){
            $certificado_origen->setFecha_exportacion($_REQUEST["fechaexportacion"]);
        }

        //Verificar la vigencia y colocar en la tupla
        $tipo_co->setId_tipo_co(5);
        $tipo_co=$sqlTipoCO->getBuscarTipoCertificadoPorId($tipo_co);
        $certificado_origen->setVigencia($tipo_co->getVigencia());
        
        if($sqlCertificadoOrigen->setGuardarCertificadoOrigen($certificado_origen)){
            //Recuperar el ID del CertificadoOrigen
            $datCO = $sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
            
            //Guardar en la tabla COTp
            $co_tp->setId_certificado_origen($datCO->getId_certificado_origen());
            $co_tp->setNombre_consignatario($_REQUEST["nombreconsignatario"]);
            $co_tp->setDireccion_consignatario($_REQUEST["direccionconsignatario"]);
            $co_tp->setId_pais_consignatario($_REQUEST["paisconsignatario"]);
            $co_tp->setId_medio_transporte($_REQUEST["combomediotransportetp"]);
            $co_tp->setRuta($_REQUEST["rutatp"]);
            if($_REQUEST["observacionestp"]!=''){
                $co_tp->setObservaciones($_REQUEST["observacionestp"]);
            }
            
            //Colocar Si hay Tercer Operador
            if($_REQUEST["check_factterceroperadortp"]==TRUE){
                $datos_tercer_operador->setId_certificado_origen($datCO->getId_certificado_origen());
                $datos_tercer_operador->setNombre($_REQUEST["empresaterceroperadortp"]);
                $datos_tercer_operador->setDireccion($_REQUEST["direccionterceroperadortp"]);
                $datos_tercer_operador->setCiudad($_REQUEST["ciudadterceroperadortp"]);
                $datos_tercer_operador->setPais($_REQUEST["paisterceroperadortp"]);
                $datos_tercer_operador->setNumero_factura($_REQUEST["factterceroperadortp"]);
                if($sqlDatosTercerOperador->setGuardarDatosTercerOperador($datos_tercer_operador)){
                    $datTercerOp = $sqlDatosTercerOperador->getBuscarDatosTercerOperadorPorId($datos_tercer_operador);
                    $co_tp->setId_datos_tercer_operador($datTercerOp->getId_datos_tercer_operador());
                }
            }else{
                $co_tp->setId_datos_tercer_operador(0);
            }
            //Fin Tercer Operador
            
            if($sqlCOTp->setGuardarCertificadoTp($co_tp)){
                $datCOTp = $sqlCOTp->getBuscarCOTpPorId($co_tp);
                //Guardar las Ddjj y Facturas para el COAladi
                $this->guardarCOTpDdjjFactura($tabla_tp, $datCOTp->getId_co_tp());
            }else{
                echo "No se guardó el COTp";
            }
            //$asist_senavex = AdmSistemaColas::generarColaParaCO($serv_export);
            
            echo "Se guardó el CO";
        }else{
            echo "No se guardó el CertificadoOrigen";
        }
        exit;
    }
    
    //Guardar Datos para el Certificado de Origen MERCOSUR
    if($_REQUEST['tarea']=='guardarCOMercosur'){
        $hoy = date("Y-m-d H:i:s");
        $tipo_desglose = $_REQUEST["tipo_desglose"];
        //Recuperar la tabla enviada en JSON y formatearla en Array u Objeto
        $tabla_mercosur = $_REQUEST["tabla_mercosur"];
        $tabla_mercosur = json_decode($tabla_mercosur, true);
        //Calcular el Valor FOB de todo el certificado
        $valor_fob_total = 0;
        foreach ($tabla_mercosur as $valor){
            $valor_fob_total += $valor["total"];
        }
        
        //Verificar la escala de precios para sacar el total
        $escala_co->setId_tipo_co(2);
        $escala_co=$sqlEscalaCO->getListarEscalaPorCO($escala_co);

        foreach ($escala_co as $escala){
            if(($escala->getMonto_fob_inicial()<$valor_fob_total)&&($escala->getMonto_fob_final()>$valor_fob_total)){
                $costo = $escala->getImporte();
            }
        }
        
        //Generar el Servicio Exportador para el Certificado de Origen
        $serv_export = AdmSistemaColas::generarServicioExportadorParaCO($_SESSION["id_persona"],$costo,$_SESSION["id_empresa"],$valor_fob_total);

        //Guardar los Datos en la Tabla CertificadoOrigen
        $certificado_origen->setId_acuerdo($_REQUEST["id_acuerdo"]);
        $certificado_origen->setId_pais($_REQUEST["id_pais"]);
        $certificado_origen->setFecha_llenado($hoy);
        $certificado_origen->setValor_fob_total($valor_fob_total);
        $certificado_origen->setId_estado_co(2);
        $certificado_origen->setId_empresa($_SESSION["id_empresa"]);
        $certificado_origen->setId_persona($_SESSION["id_persona"]);
        $certificado_origen->setId_tipo_co(2);
        $certificado_origen->setId_regional($_REQUEST["id_regional"]);
        $certificado_origen->setId_servicio_exportador($serv_export);
        
        if($_REQUEST["fechaexportacion"]!=''){
            $certificado_origen->setFecha_exportacion($_REQUEST["fechaexportacion"]);
        }

        //Verificar la vigencia y colocar en la tupla
        $tipo_co->setId_tipo_co(2);
        $tipo_co=$sqlTipoCO->getBuscarTipoCertificadoPorId($tipo_co);
        $certificado_origen->setVigencia($tipo_co->getVigencia());
        
        if($sqlCertificadoOrigen->setGuardarCertificadoOrigen($certificado_origen)){
            //Recuperar el ID del CertificadoOrigen
            $datCO = $sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
            
            //Guardar en la tabla COMercosur
            $co_mercosur->setId_certificado_origen($datCO->getId_certificado_origen());
            $co_mercosur->setNombre_importador($_REQUEST["nombreimportador"]);
            $co_mercosur->setDireccion_importador($_REQUEST["direccionimportador"]);
            $co_mercosur->setId_pais_importador($_REQUEST["paisimportador"]);
            $co_mercosur->setNombre_consignatario($_REQUEST["nombreconsignatario"]);
            $co_mercosur->setDireccion_consignatario($_REQUEST["direccionconsignatario"]);
            $co_mercosur->setId_pais_consignatario($_REQUEST["paisconsignatario"]);
            $co_mercosur->setId_medio_transporte($_REQUEST["combomediotransportemercosur"]);
            $co_mercosur->setPuerto_lugar_embarque($_REQUEST["embarquemercosur"]);
            if($_REQUEST["observacionesmercosur"]!=''){
                $co_mercosur->setObservaciones($_REQUEST["observacionesmercosur"]);
            }
            
            //Colocar Si hay Tercer Operador
            if($_REQUEST["check_factterceroperadormercosur"]==TRUE){
                $datos_tercer_operador->setId_certificado_origen($datCO->getId_certificado_origen());
                $datos_tercer_operador->setNombre($_REQUEST["empresaterceroperadortp"]);
                $datos_tercer_operador->setDireccion($_REQUEST["direccionterceroperadortp"]);
                $datos_tercer_operador->setCiudad($_REQUEST["ciudadterceroperadortp"]);
                $datos_tercer_operador->setPais($_REQUEST["paisterceroperadortp"]);
                $datos_tercer_operador->setNumero_factura($_REQUEST["factterceroperadortp"]);
                if($sqlDatosTercerOperador->setGuardarDatosTercerOperador($datos_tercer_operador)){
                    $datTercerOp = $sqlDatosTercerOperador->getBuscarDatosTercerOperadorPorId($datos_tercer_operador);
                    $co_mercosur->setId_datos_tercer_operador($datTercerOp->getId_datos_tercer_operador());
                }
            }else{
                $co_mercosur->setId_datos_tercer_operador(0);
            }
            //Fin Tercer Operador
            
            if($sqlCOMercosur->setGuardarCertificadoMercosur($co_mercosur)){
                $datCOMercosur = $sqlCOMercosur->getBuscarCOMercosurPorId($co_mercosur);
                //Guardar las Ddjj y Facturas para el COAladi
                $this->guardarCOMercosurDdjjFactura($tabla_mercosur, $datCOMercosur->getId_co_mercosur(),$tipo_desglose);
            }else{
                echo "No se guardó el COMercosur";
            }
            //$asist_senavex = AdmSistemaColas::generarColaParaCO($serv_export);
            
            echo "Se guardó el CO";
        }else{
            echo "No se guardó el CertificadoOrigen";
        }
        exit;
    }

    //Guardar Datos para el Certificado de Origen VENEZUELA
    if($_REQUEST['tarea']=='guardarCOVenezuela'){
        $hoy = date("Y-m-d H:i:s");
        $tipo_desglose = $_REQUEST["tipo_desglose"];
        //echo $tipo_desglose."<br>";
        //Recuperar la tabla enviada en JSON y formatearla en Array u Objeto
        $tabla_venezuela = $_REQUEST["tabla_venezuela"];
        $tabla_venezuela = json_decode($tabla_venezuela, true);
        //Calcular el Valor FOB de todo el certificado
        $valor_fob_total = 0;
        
        foreach ($tabla_venezuela as $valor){
            $valor_fob_total += $valor["total"];
        }
        
        //Verificar la escala de precios para sacar el total
        $escala_co->setId_tipo_co(4);
        $escala_co=$sqlEscalaCO->getListarEscalaPorCO($escala_co);

        foreach ($escala_co as $escala){
            if(($escala->getMonto_fob_inicial()<$valor_fob_total)&&($escala->getMonto_fob_final()>$valor_fob_total)){
                $costo = $escala->getImporte();
            }
        }
        
        //Generar el Servicio Exportador para el Certificado de Origen
        $serv_export = AdmSistemaColas::generarServicioExportadorParaCO($_SESSION["id_persona"],$costo,$_SESSION["id_empresa"],$valor_fob_total);

        //Guardar los Datos en la Tabla CertificadoOrigen
        $certificado_origen->setId_acuerdo($_REQUEST["id_acuerdo"]);
        $certificado_origen->setId_pais($_REQUEST["id_pais"]);
        $certificado_origen->setFecha_llenado($hoy);
        $certificado_origen->setValor_fob_total($valor_fob_total);
        $certificado_origen->setId_estado_co(2);
        $certificado_origen->setId_empresa($_SESSION["id_empresa"]);
        $certificado_origen->setId_persona($_SESSION["id_persona"]);
        $certificado_origen->setId_tipo_co(4);
        $certificado_origen->setId_regional($_REQUEST["id_regional"]);
        $certificado_origen->setId_servicio_exportador($serv_export);
        
        if($_REQUEST["fechaexportacion"]!=''){
            $certificado_origen->setFecha_exportacion($_REQUEST["fechaexportacion"]);
        }

        //Verificar la vigencia y colocar en la tupla
        $tipo_co->setId_tipo_co(4);
        $tipo_co=$sqlTipoCO->getBuscarTipoCertificadoPorId($tipo_co);
        $certificado_origen->setVigencia($tipo_co->getVigencia());
        
        if($sqlCertificadoOrigen->setGuardarCertificadoOrigen($certificado_origen)){
            //Recuperar el ID del CertificadoOrigen
            $datCO = $sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
            
            //Guardar en la tabla COVenezuela
            $co_venezuela->setId_certificado_origen($datCO->getId_certificado_origen());
            $co_venezuela->setNombre_importador($_REQUEST["nombreimportador"]);
            $co_venezuela->setDireccion_importador($_REQUEST["direccionimportador"]);
            $co_venezuela->setId_pais_importador($_REQUEST["paisimportador"]);
            $co_venezuela->setId_medio_transporte($_REQUEST["combomediotransportevenezuela"]);
            $co_venezuela->setPuerto_lugar_embarque($_REQUEST["embarquevenezuela"]);
            if($_REQUEST["observacionesvenezuela"]!=''){
                $co_venezuela->setObservaciones($_REQUEST["observacionesvenezuela"]);
            }
            //Colocar Si hay Tercer Operador
            if($_REQUEST["check_factterceroperadorvenezuela"]==TRUE){
                $datos_tercer_operador->setId_certificado_origen($datCO->getId_certificado_origen());
                $datos_tercer_operador->setNombre($_REQUEST["empresaterceroperadorvenezuela"]);
                $datos_tercer_operador->setDireccion($_REQUEST["direccionterceroperadorvenezuela"]);
                $datos_tercer_operador->setCiudad($_REQUEST["ciudadterceroperadorvenezuela"]);
                $datos_tercer_operador->setPais($_REQUEST["paisterceroperadorvenezuela"]);
                $datos_tercer_operador->setNumero_factura($_REQUEST["factterceroperadorvenezuela"]);
                if($sqlDatosTercerOperador->setGuardarDatosTercerOperador($datos_tercer_operador)){
                    $datTercerOp = $sqlDatosTercerOperador->getBuscarDatosTercerOperadorPorId($datos_tercer_operador);
                    $co_venezuela->setId_datos_tercer_operador($datTercerOp->getId_datos_tercer_operador());
                }
            }else{
                $co_venezuela->setId_datos_tercer_operador(0);
            }
            //Fin Tercer Operador
            
            if($sqlCOVenezuela->setGuardarCertificadoVenezuela($co_venezuela)){
                $datCOVenezuela = $sqlCOVenezuela->getBuscarCOVenezuelaPorId($co_venezuela);
                //Guardar las Ddjj y Facturas para el COVenezuela
                $this->guardarCOVenezuelaDdjjFactura($tabla_venezuela, $datCOVenezuela->getId_co_venezuela(), $tipo_desglose);
            }else{
                echo "No se guardó el COVenezuela";
            }
            //$asist_senavex = AdmSistemaColas::generarColaParaCO($serv_export);
            
            echo "Se guardó el CO";
        }else{
            echo "No se guardó el CertificadoOrigen";
        }
        exit;
    }

    // Realizar la revisión del Certificado de Origen
    if($_REQUEST['tarea']=='revisarCertificadoOrigen'){
        $certificado_origen->setId_certificado_origen($_REQUEST["id_certificado_origen"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        
        //$tipocertificado = $certificado_origen->getId_tipo_co();
        switch ($certificado_origen->getId_tipo_co()){
            case '1':
                $co_aladi->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_aladi=$sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);
                
                if($co_aladi->getId_datos_tercer_operador()!=0){
                    $datos_tercer_operador->setId_datos_tercer_operador($co_aladi->getId_datos_tercer_operador());
                    $datos_tercer_operador=$sqlDatosTercerOperador->getBuscarDatosTercerOperadorPorId($datos_tercer_operador);
                    $vista->assign("datos_tercer_operador",$datos_tercer_operador);
                }
                
                $co_aladiddjjfactura->setId_co_aladi($co_aladi->getId_co_aladi());
                $detalle_aladi=$sqlCOAladiDdjjFactura->getListarDdjjFacturasPorCoAladi($co_aladiddjjfactura);

                $vista->assign("co_aladi",$co_aladi);
                $vista->assign("detalle_aladi",$detalle_aladi);
                $vista->assign("co_aladiddjjfactura",$co_aladiddjjfactura);
                break;
            
            case '2':
                $co_mercosur->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_mercosur=$sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);
                //var_dump($co_mercosur);
                if($co_mercosur->getId_datos_tercer_operador()!=0){
                    $datos_tercer_operador->setId_datos_tercer_operador($co_mercosur->getId_datos_tercer_operador());
                    $datos_tercer_operador=$sqlDatosTercerOperador->getBuscarDatosTercerOperadorPorId($datos_tercer_operador);
                    $vista->assign("datos_tercer_operador",$datos_tercer_operador);
                }
                
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
                $detalle_sgp=$sqlCOSgpDdjjFactura->getListarDdjjFacturasPorCoSgp($co_sgpddjjfactura,$certificado_origen->getId_acuerdo());

                $vista->assign("co_sgp",$co_sgp);
                $vista->assign("detalle_sgp",$detalle_sgp);
                $vista->assign("co_sgpddjjfactura",$co_sgpddjjfactura);
                break;

            case '4':
                $co_venezuela->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_venezuela=$sqlCOVenezuela->getListarCertificadosVenezuelaPorCO($co_venezuela);
                
                if($co_venezuela->getId_datos_tercer_operador()!=0){
                    $datos_tercer_operador->setId_datos_tercer_operador($co_venezuela->getId_datos_tercer_operador());
                    $datos_tercer_operador=$sqlDatosTercerOperador->getBuscarDatosTercerOperadorPorId($datos_tercer_operador);
                    $vista->assign("datos_tercer_operador",$datos_tercer_operador);
                }

                $co_venezueladdjjfactura->setId_co_venezuela($co_venezuela->getId_co_venezuela());
                $detalle_venezuela=$sqlCOVenezuelaDdjjFactura->getListarDdjjFacturasPorCoVenezuela($co_venezueladdjjfactura);

                $vista->assign("co_venezuela",$co_venezuela);
                $vista->assign("detalle_venezuela",$detalle_venezuela);
                $vista->assign("co_venezueladdjjfactura",$co_venezueladdjjfactura);
                break;

            case '5':
                $co_tp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_tp=$sqlCOTp->getListarCertificadosTpPorCO($co_tp);
                
                if($co_tp->getId_datos_tercer_operador()!=0){
                    $datos_tercer_operador->setId_datos_tercer_operador($co_tp->getId_datos_tercer_operador());
                    $datos_tercer_operador=$sqlDatosTercerOperador->getBuscarDatosTercerOperadorPorId($datos_tercer_operador);
                    $vista->assign("datos_tercer_operador",$datos_tercer_operador);
                }

                $co_tpddjjfactura->setId_co_tp($co_tp->getId_co_tp());
                $detalle_tp=$sqlCOTpDdjjFactura->getListarDdjjFacturasPorCoTp($co_tpddjjfactura);

                $vista->assign("co_tp",$co_tp);
                $vista->assign("detalle_tp",$detalle_tp);
                $vista->assign("co_tpddjjfactura",$co_tpddjjfactura);
                break;
        }
        
        //var_dump($certificado_origen);
        
        $vista->assign("co",$certificado_origen);
        $vista->display("certificadoOrigen/RevisarTodoCertificadoOrigen.tpl");
        exit;
    }
    
    // Realizar la revisión del Certificado de Origen
    if($_REQUEST['tarea']=='aprobarCertificadoOrigen'){
        $hoy = date("Y-m-d H:i:s");
        $certificado_origen->setId_certificado_origen($_REQUEST["id_certificado_origen"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        
        switch ($certificado_origen->getId_tipo_co()){
            case '1':
                //Designar el correlativo para asignación de numeración.
                $correlativo = $sqlCOAladi->getDesignarCorrelativoAladi($co_aladi);

                $co_aladi->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_aladi=$sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);
                $co_aladi->setCorrelativo_aladi($correlativo[0]["maximo"]+1);
                
                //Actualizar las facturas ya utilizadas
                $co_aladiddjjfactura->setId_co_aladi($co_aladi->getId_co_aladi());
                $co_aladiddjjfactura=$sqlCOAladiDdjjFactura->getBuscarCOAladiDdjjFacturaPorCoAladi($co_aladiddjjfactura);
                foreach ($co_aladiddjjfactura as $fact){
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        $factura->setId_estado_factura(3);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        $facturanodosificada->setId_estado_factura(3);
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                
                if($sqlCOAladi->setGuardarCertificadoAladi($co_aladi)){
                    echo "Se guardó el COAladi";
                }else{
                    echo "No se guardó el COAladi";
                }
                break;
            
            case '2':
                //Designar el correlativo para asignación de numeración.
                $correlativo = $sqlCOMercosur->getDesignarCorrelativoMercosur($co_mercosur);

                $co_mercosur->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_mercosur=$sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);
                $co_mercosur->setCorrelativo_mercosur($correlativo[0]["maximo"]+1);
                
                //Actualizar las facturas ya utilizadas
                $co_mercosurddjjfactura->setId_co_mercosur($co_mercosur->getId_co_mercosur());
                $co_mercosurddjjfactura=$sqlCOMercosurDdjjFactura->getBuscarCOMercosurDdjjFacturaPorCoMercosur($co_mercosurddjjfactura);
                foreach ($co_mercosurddjjfactura as $fact){
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        $factura->setId_estado_factura(3);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        $facturanodosificada->setId_estado_factura(3);
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                //Actualizar la factura de Tercer operador si se utiliza
                if($co_mercosur->getId_tercer_operador()!=0){
                    $factura_tercer_operador->setId_factura_tercer_operador($co_mercosur->getId_tercer_operador());
                    $factura_tercer_operador=$sqlFacturaTercerOperador->getFacturaPorID($factura_tercer_operador);
                    $factura_tercer_operador->setId_estado_factura(3);
                    $sqlFacturaTercerOperador->setGuardarFactura($factura_tercer_operador);
                }
                
                if($sqlCOMercosur->setGuardarCertificadoMercosur($co_mercosur)){
                    echo "Se guardó el COMercosur";
                }else{
                    echo "No se guardó el COMercosur";
                }
                break;
            
            case '3':
                //Designar el correlativo para asignación de numeración.
                $correlativo = $sqlCOSgp->getDesignarCorrelativoSgp($co_sgp);

                $co_sgp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_sgp=$sqlCOSgp->getListarCertificadosSgpPorCO($co_sgp);
                $co_sgp->setCorrelativo_sgp($correlativo[0]["maximo"]+1);
                
                //Actualizar las facturas ya utilizadas
                $co_sgpddjjfactura->setId_co_sgp($co_sgp->getId_co_sgp());
                $co_sgpddjjfactura=$sqlCOSgpDdjjFactura->getBuscarCOSgpDdjjFacturaPorCoSgp($co_sgpddjjfactura);
                foreach ($co_sgpddjjfactura as $fact){
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        $factura->setId_estado_factura(3);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        $facturanodosificada->setId_estado_factura(3);
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }

                if($_REQUEST["usooficialtp"]!=''){
                    $co_sgp->setUso_oficial($_REQUEST["usooficialsgp"]);
                }

                if($sqlCOSgp->setGuardarCertificadoSgp($co_sgp)){
                    echo "Se guardó el COSgp";
                }else{
                    echo "No se guardó el COSgp";
                }
                break;

            case '4':
                //Designar el correlativo para asignación de numeración.
                $correlativo = $sqlCOVenezuela->getDesignarCorrelativoVenezuela($co_venezuela);

                $co_venezuela->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_venezuela=$sqlCOVenezuela->getListarCertificadosVenezuelaPorCO($co_venezuela);
                $co_venezuela->setCorrelativo_venezuela($correlativo[0]["maximo"]+1);
                
                //Actualizar las facturas ya utilizadas
                $co_venezueladdjjfactura->setId_co_venezuela($co_venezuela->getId_co_venezuela());
                $co_venezueladdjjfactura=$sqlCOVenezuelaDdjjFactura->getBuscarCOVenezuelaDdjjFacturaPorCoVenezuela($co_venezueladdjjfactura);
                foreach ($co_venezueladdjjfactura as $fact){
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        $factura->setId_estado_factura(3);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        $facturanodosificada->setId_estado_factura(3);
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                //Actualizar la factura de Tercer operador si se utiliza
                if($co_venezuela->getId_tercer_operador()!=0){
                    $factura_tercer_operador->setId_factura_tercer_operador($co_venezuela->getId_tercer_operador());
                    $factura_tercer_operador=$sqlFacturaTercerOperador->getFacturaPorID($factura_tercer_operador);
                    $factura_tercer_operador->setId_estado_factura(3);
                    $sqlFacturaTercerOperador->setGuardarFactura($facturaterceroperador);
                }

                if($sqlCOVenezuela->setGuardarCertificadoVenezuela($co_venezuela)){
                    echo "Se guardó el COVenezuela";
                }else{
                    echo "No se guardó el COVenezuela";
                }
                break;

            case '5':
                //Designar el correlativo para asignación de numeración.
                $correlativo = $sqlCOTp->getDesignarCorrelativoTp($co_tp);

                $co_tp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_tp=$sqlCOTp->getListarCertificadosTpPorCO($co_tp);
                $co_tp->setCorrelativo_tp($correlativo[0]["maximo"]+1);
                
                //Actualizar las facturas ya utilizadas
                $co_tpddjjfactura->setId_co_tp($co_tp->getId_co_tp());
                $co_tpddjjfactura=$sqlCOTpDdjjFactura->getBuscarCOTpDdjjFacturaPorCoTp($co_tpddjjfactura);
                foreach ($co_tpddjjfactura as $fact){
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        $factura->setId_estado_factura(3);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        $facturanodosificada->setId_estado_factura(3);
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                //Actualizar la factura de Tercer operador si se utiliza
                if($co_tp->getId_tercer_operador()!=0){
                    $factura_tercer_operador->setId_factura_tercer_operador($co_tp->getId_tercer_operador());
                    $factura_tercer_operador=$sqlFacturaTercerOperador->getFacturaPorID($factura_tercer_operador);
                    $factura_tercer_operador->setId_estado_factura(3);
                    $sqlFacturaTercerOperador->setGuardarFactura($facturaterceroperador);
                }

                if($_REQUEST["usooficialtp"]!=''){
                    $co_tp->setUso_oficial($_REQUEST["usooficialtp"]);
                }
                if($sqlCOTp->setGuardarCertificadoTp($co_tp)){
                    echo "Se guardó el COTp";
                }else{
                    echo "No se guardó el COTp";
                }
                break;
        }
        
        //Actualizar el Servicio Exportador y el Sistema de Colas
        $servicio_exportador->setId_servicio_exportador($certificado_origen->getId_servicio_exportador());
        $servicio_exportador=$sqlServicioExportador->getBuscarServicioExportadorPorId($servicio_exportador);
        $servicio_exportador->setEstado(TRUE);
        $sqlServicioExportador->setGuardarServicioExportador($servicio_exportador);
        /*
        //Actualizar el Sistema de Colas
        $sistema_colas->setId_Servicio_Exportador($certificado_origen->getId_servicio_exportador());
        $sistema_colas=$sqlSistemaColas->getBuscarColaPorServicioExportador($sistema_colas);
        $sistema_colas->setAtendido(2);
        $sqlSistemaColas->setGuardarSistemaColas($sistema_colas);
        */
        //Actualizar el Certificado de Origen
        $certificado_origen->setId_estado_co(1);
        $certificado_origen->setFecha_revision($hoy);
        $certificado_origen->setFecha_emision($hoy);
        $certificado_origen->setEntregado(TRUE);
        
        //Calcular la vigencia del Certificado de Origen
        $fecha= new DateTime($hoy);
        $aumentar_dias = 'P'.$certificado_origen->getVigencia().'D';
        $fecha->add(new DateInterval($aumentar_dias));
        $certificado_origen->setFecha_fin($fecha->format('Y-m-d'));
        if($_REQUEST["observacionesgenerales"]!=''){
            $certificado_origen->setObservaciones_certificador($_REQUEST["observacionesgenerales"]);
        }
        
        if($sqlCertificadoOrigen->setGuardarCertificadoOrigen($certificado_origen)){
            echo "1";
        }else{
            echo "0";
        }
        exit;
    }

    // Realizar la revisión del Certificado de Origen
    if($_REQUEST['tarea']=='rechazarCertificadoOrigen'){
        $hoy = date("Y-m-d H:i:s");
        $certificado_origen->setId_certificado_origen($_REQUEST["id_certificado_origen"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        /*
        //Actualizar el Sistema de Colas colocandolo en Revisión
        $sistema_colas->setId_Servicio_Exportador($certificado_origen->getId_servicio_exportador());
        $sistema_colas=$sqlSistemaColas->getBuscarColaPorServicioExportador($sistema_colas);
        $sistema_colas->setAtendido(1);
        $sqlSistemaColas->setGuardarSistemaColas($sistema_colas);
        */
        //Actualizar el Certificado de Origen
        $certificado_origen->setId_estado_co(3);
        $certificado_origen->setFecha_revision($hoy);
        $certificado_origen->setObservaciones_certificador($_REQUEST["observacionesgenerales"]);
        
        switch ($certificado_origen->getId_tipo_co()){
            case '1':
                //Recuperamos el co_aladi.
                $co_aladi->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_aladi=$sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);
                //Actualizar las facturas ya utilizadas
                $co_aladiddjjfactura->setId_co_aladi($co_aladi->getId_co_aladi());
                $co_aladiddjjfactura=$sqlCOAladiDdjjFactura->getBuscarCOAladiDdjjFacturaPorCoAladi($co_aladiddjjfactura);

                foreach ($co_aladiddjjfactura as $fact){
                    //var_dump($fact);
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        //var_dump($factura); exit;
                        $factura->setId_estado_factura(1);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        if($anular==0){
                            $facturanodosificada->setId_estado_factura(1);
                        }else{
                            $facturanodosificada->setId_estado_factura(4);
                            
                            $insumos_factura_no_dosificada->setId_factura_no_dosificada($fact->id_factura);
                            $insumos_factura_no_dosificada=$sqlInsumosFacturaNoDosificada->getListarInsumosPorFactura($insumos_factura_no_dosificada);

                            foreach ($insumos_factura_no_dosificada as $insumo){
                                $insumos_factura->setId_insumos_factura($insumo->id_insumos_factura);
                                $insumos_factura=$sqlInsumosFactura->getInsumosPorId($insumos_factura);
                                $cantidad = $insumo->cantidad;
                                $saldo = $insumos_factura->getSaldo();
                                
                                $insumos_factura->setSaldo($saldo+$insumo->cantidad);
                                $insumos_factura->setUtilizado(FALSE);
                                $sqlInsumosFactura->setGuardarInsumosFactura($insumos_factura);
                            }
                        }
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                break;
            case '2':
                //Recuperamos el $co_mercosur.
                $co_mercosur->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_mercosur=$sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);
                //Actualizar las facturas ya utilizadas
                $co_mercosurddjjfactura->setId_co_mercosur($co_mercosur->getId_co_mercosur());
                $co_mercosurddjjfactura=$sqlCOMercosurDdjjFactura->getBuscarCOMercosurDdjjFacturaPorCoMercosur($co_mercosurddjjfactura);
                foreach ($co_mercosurddjjfactura as $fact){
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        //var_dump($factura); exit;
                        $factura->setId_estado_factura(1);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        if($anular==0){
                            $facturanodosificada->setId_estado_factura(1);
                        }else{
                            $facturanodosificada->setId_estado_factura(4);
                            
                            $insumos_factura_no_dosificada->setId_factura_no_dosificada($fact->id_factura);
                            $insumos_factura_no_dosificada=$sqlInsumosFacturaNoDosificada->getListarInsumosPorFactura($insumos_factura_no_dosificada);

                            foreach ($insumos_factura_no_dosificada as $insumo){
                                $insumos_factura->setId_insumos_factura($insumo->id_insumos_factura);
                                $insumos_factura=$sqlInsumosFactura->getInsumosPorId($insumos_factura);
                                $cantidad = $insumo->cantidad;
                                $saldo = $insumos_factura->getSaldo();
                                
                                $insumos_factura->setSaldo($saldo+$insumo->cantidad);
                                $insumos_factura->setUtilizado(FALSE);
                                $sqlInsumosFactura->setGuardarInsumosFactura($insumos_factura);
                            }
                        }
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                //Actualizar la factura de Tercer operador si se utiliza
                if($co_mercosur->getId_tercer_operador()!=0){
                    $factura_tercer_operador->setId_factura_tercer_operador($co_mercosur->getId_tercer_operador());
                    $factura_tercer_operador=$sqlFacturaTercerOperador->getFacturaPorID($factura_tercer_operador);
                    $factura_tercer_operador->setId_estado_factura(1);
                    $sqlFacturaTercerOperador->setGuardarFactura($facturaterceroperador);
                }
                break;
            
            case '3':
                //Recuperamos el $co_sgp.
                $co_sgp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_sgp=$sqlCOSgp->getListarCertificadosSgpPorCO($co_sgp);
                //Actualizar las facturas ya utilizadas
                $co_sgpddjjfactura->setId_co_sgp($co_sgp->getId_co_sgp());
                $co_sgpddjjfactura=$sqlCOSgpDdjjFactura->getBuscarCOSgpDdjjFacturaPorCoSgp($co_sgpddjjfactura);
                foreach ($co_sgpddjjfactura as $fact){
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        //var_dump($factura); exit;
                        $factura->setId_estado_factura(1);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        if($anular==0){
                            $facturanodosificada->setId_estado_factura(1);
                        }else{
                            $facturanodosificada->setId_estado_factura(4);
                            
                            $insumos_factura_no_dosificada->setId_factura_no_dosificada($fact->id_factura);
                            $insumos_factura_no_dosificada=$sqlInsumosFacturaNoDosificada->getListarInsumosPorFactura($insumos_factura_no_dosificada);

                            foreach ($insumos_factura_no_dosificada as $insumo){
                                $insumos_factura->setId_insumos_factura($insumo->id_insumos_factura);
                                $insumos_factura=$sqlInsumosFactura->getInsumosPorId($insumos_factura);
                                $cantidad = $insumo->cantidad;
                                $saldo = $insumos_factura->getSaldo();
                                
                                $insumos_factura->setSaldo($saldo+$insumo->cantidad);
                                $insumos_factura->setUtilizado(FALSE);
                                $sqlInsumosFactura->setGuardarInsumosFactura($insumos_factura);
                            }
                        }
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                break;

            case '4':
                //Recuperamos el $co_venezuela.
                $co_venezuela->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_venezuela=$sqlCOVenezuela->getListarCertificadosVenezuelaPorCO($co_venezuela);
                //Actualizar las facturas ya utilizadas
                $co_venezueladdjjfactura->setId_co_venezuela($co_venezuela->getId_co_venezuela());
                $co_venezueladdjjfactura=$sqlCOVenezuelaDdjjFactura->getBuscarCOVenezuelaDdjjFacturaPorCoVenezuela($co_venezueladdjjfactura);
                foreach ($co_venezueladdjjfactura as $fact){
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        //var_dump($factura); exit;
                        $factura->setId_estado_factura(1);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        if($anular==0){
                            $facturanodosificada->setId_estado_factura(1);
                        }else{
                            $facturanodosificada->setId_estado_factura(4);
                            
                            $insumos_factura_no_dosificada->setId_factura_no_dosificada($fact->id_factura);
                            $insumos_factura_no_dosificada=$sqlInsumosFacturaNoDosificada->getListarInsumosPorFactura($insumos_factura_no_dosificada);

                            foreach ($insumos_factura_no_dosificada as $insumo){
                                $insumos_factura->setId_insumos_factura($insumo->id_insumos_factura);
                                $insumos_factura=$sqlInsumosFactura->getInsumosPorId($insumos_factura);
                                $cantidad = $insumo->cantidad;
                                $saldo = $insumos_factura->getSaldo();
                                
                                $insumos_factura->setSaldo($saldo+$insumo->cantidad);
                                $insumos_factura->setUtilizado(FALSE);
                                $sqlInsumosFactura->setGuardarInsumosFactura($insumos_factura);
                            }
                        }
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                //Actualizar la factura de Tercer operador si se utiliza
                if($co_venezuela->getId_tercer_operador()!=0){
                    $factura_tercer_operador->setId_factura_tercer_operador($co_venezuela->getId_tercer_operador());
                    $factura_tercer_operador=$sqlFacturaTercerOperador->getFacturaPorID($factura_tercer_operador);
                    $factura_tercer_operador->setId_estado_factura(FALSE);
                    $sqlFacturaTercerOperador->setGuardarFactura($facturaterceroperador);
                }
                break;

            case '5':
                //Recuperamos el $co_tp.
                $co_tp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_tp=$sqlCOTp->getListarCertificadosTpPorCO($co_tp);
                //Actualizar las facturas ya utilizadas
                $co_tpddjjfactura->setId_co_tp($co_tp->getId_co_tp());
                $co_tpddjjfactura=$sqlCOTpDdjjFactura->getBuscarCOTpDdjjFacturaPorCoTp($co_tpddjjfactura);
                foreach ($co_tpddjjfactura as $fact){
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        //var_dump($factura); exit;
                        $factura->setId_estado_factura(1);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        if($anular==0){
                            $facturanodosificada->setId_estado_factura(1);
                        }else{
                            $facturanodosificada->setId_estado_factura(4);
                            
                            $insumos_factura_no_dosificada->setId_factura_no_dosificada($fact->id_factura);
                            $insumos_factura_no_dosificada=$sqlInsumosFacturaNoDosificada->getListarInsumosPorFactura($insumos_factura_no_dosificada);

                            foreach ($insumos_factura_no_dosificada as $insumo){
                                $insumos_factura->setId_insumos_factura($insumo->id_insumos_factura);
                                $insumos_factura=$sqlInsumosFactura->getInsumosPorId($insumos_factura);
                                $cantidad = $insumo->cantidad;
                                $saldo = $insumos_factura->getSaldo();
                                
                                $insumos_factura->setSaldo($saldo+$insumo->cantidad);
                                $insumos_factura->setUtilizado(FALSE);
                                $sqlInsumosFactura->setGuardarInsumosFactura($insumos_factura);
                            }
                        }
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                //Actualizar la factura de Tercer operador si se utiliza
                if($co_tp->getId_tercer_operador()!=0){
                    $factura_tercer_operador->setId_factura_tercer_operador($co_tp->getId_tercer_operador());
                    $factura_tercer_operador=$sqlFacturaTercerOperador->getFacturaPorID($factura_tercer_operador);
                    $factura_tercer_operador->setId_estado_factura(FALSE);
                    $sqlFacturaTercerOperador->setGuardarFactura($facturaterceroperador);
                }
                break;
        }
        
        if($sqlCertificadoOrigen->setGuardarCertificadoOrigen($certificado_origen)){
            echo "1";
        }else{
            echo "0";
        }
        exit;
    }

    // Realizar la Anulación del Certificado de Origen
    if($_REQUEST['tarea']=='anularCertificadoOrigen'){
        $hoy = date("Y-m-d H:i:s");
        //$anular = $_REQUEST["anular"];
        $certificado_origen->setId_certificado_origen($_REQUEST["id_certificado_origen"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        //echo $anular;
        /*
        switch ($certificado_origen->getId_tipo_co()){
            case '1':
                //Recuperamos el co_aladi.
                $co_aladi->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_aladi=$sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);
                //Actualizar las facturas ya utilizadas
                $co_aladiddjjfactura->setId_co_aladi($co_aladi->getId_co_aladi());
                $co_aladiddjjfactura=$sqlCOAladiDdjjFactura->getBuscarCOAladiDdjjFacturaPorCoAladi($co_aladiddjjfactura);

                foreach ($co_aladiddjjfactura as $fact){
                    //var_dump($fact);
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        //var_dump($factura); exit;
                        $factura->setId_estado_factura(1);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        if($anular==0){
                            $facturanodosificada->setId_estado_factura(1);
                        }else{
                            $facturanodosificada->setId_estado_factura(4);
                            
                            $insumos_factura_no_dosificada->setId_factura_no_dosificada($fact->id_factura);
                            $insumos_factura_no_dosificada=$sqlInsumosFacturaNoDosificada->getListarInsumosPorFactura($insumos_factura_no_dosificada);

                            foreach ($insumos_factura_no_dosificada as $insumo){
                                $insumos_factura->setId_insumos_factura($insumo->id_insumos_factura);
                                $insumos_factura=$sqlInsumosFactura->getInsumosPorId($insumos_factura);
                                $cantidad = $insumo->cantidad;
                                $saldo = $insumos_factura->getSaldo();
                                
                                $insumos_factura->setSaldo($saldo+$insumo->cantidad);
                                $insumos_factura->setUtilizado(FALSE);
                                $sqlInsumosFactura->setGuardarInsumosFactura($insumos_factura);
                            }
                        }
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                break;
            case '2':
                //Recuperamos el $co_mercosur.
                $co_mercosur->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_mercosur=$sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);
                //Actualizar las facturas ya utilizadas
                $co_mercosurddjjfactura->setId_co_mercosur($co_mercosur->getId_co_mercosur());
                $co_mercosurddjjfactura=$sqlCOMercosurDdjjFactura->getBuscarCOMercosurDdjjFacturaPorCoMercosur($co_mercosurddjjfactura);
                foreach ($co_mercosurddjjfactura as $fact){
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        //var_dump($factura); exit;
                        $factura->setId_estado_factura(1);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        if($anular==0){
                            $facturanodosificada->setId_estado_factura(1);
                        }else{
                            $facturanodosificada->setId_estado_factura(4);
                            
                            $insumos_factura_no_dosificada->setId_factura_no_dosificada($fact->id_factura);
                            $insumos_factura_no_dosificada=$sqlInsumosFacturaNoDosificada->getListarInsumosPorFactura($insumos_factura_no_dosificada);

                            foreach ($insumos_factura_no_dosificada as $insumo){
                                $insumos_factura->setId_insumos_factura($insumo->id_insumos_factura);
                                $insumos_factura=$sqlInsumosFactura->getInsumosPorId($insumos_factura);
                                $cantidad = $insumo->cantidad;
                                $saldo = $insumos_factura->getSaldo();
                                
                                $insumos_factura->setSaldo($saldo+$insumo->cantidad);
                                $insumos_factura->setUtilizado(FALSE);
                                $sqlInsumosFactura->setGuardarInsumosFactura($insumos_factura);
                            }
                        }
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                //Actualizar la factura de Tercer operador si se utiliza
                if($co_mercosur->getId_tercer_operador()!=0){
                    $factura_tercer_operador->setId_factura_tercer_operador($co_mercosur->getId_tercer_operador());
                    $factura_tercer_operador=$sqlFacturaTercerOperador->getFacturaPorID($factura_tercer_operador);
                    $factura_tercer_operador->setId_estado_factura(1);
                    $sqlFacturaTercerOperador->setGuardarFactura($facturaterceroperador);
                }
                break;
            
            case '3':
                //Recuperamos el $co_sgp.
                $co_sgp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_sgp=$sqlCOSgp->getListarCertificadosSgpPorCO($co_sgp);
                //Actualizar las facturas ya utilizadas
                $co_sgpddjjfactura->setId_co_sgp($co_sgp->getId_co_sgp());
                $co_sgpddjjfactura=$sqlCOSgpDdjjFactura->getBuscarCOSgpDdjjFacturaPorCoSgp($co_sgpddjjfactura);
                foreach ($co_sgpddjjfactura as $fact){
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        //var_dump($factura); exit;
                        $factura->setId_estado_factura(1);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        if($anular==0){
                            $facturanodosificada->setId_estado_factura(1);
                        }else{
                            $facturanodosificada->setId_estado_factura(4);
                            
                            $insumos_factura_no_dosificada->setId_factura_no_dosificada($fact->id_factura);
                            $insumos_factura_no_dosificada=$sqlInsumosFacturaNoDosificada->getListarInsumosPorFactura($insumos_factura_no_dosificada);

                            foreach ($insumos_factura_no_dosificada as $insumo){
                                $insumos_factura->setId_insumos_factura($insumo->id_insumos_factura);
                                $insumos_factura=$sqlInsumosFactura->getInsumosPorId($insumos_factura);
                                $cantidad = $insumo->cantidad;
                                $saldo = $insumos_factura->getSaldo();
                                
                                $insumos_factura->setSaldo($saldo+$insumo->cantidad);
                                $insumos_factura->setUtilizado(FALSE);
                                $sqlInsumosFactura->setGuardarInsumosFactura($insumos_factura);
                            }
                        }
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                break;

            case '4':
                //Recuperamos el $co_venezuela.
                $co_venezuela->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_venezuela=$sqlCOVenezuela->getListarCertificadosVenezuelaPorCO($co_venezuela);
                //Actualizar las facturas ya utilizadas
                $co_venezueladdjjfactura->setId_co_venezuela($co_venezuela->getId_co_venezuela());
                $co_venezueladdjjfactura=$sqlCOVenezuelaDdjjFactura->getBuscarCOVenezuelaDdjjFacturaPorCoVenezuela($co_venezueladdjjfactura);
                foreach ($co_venezueladdjjfactura as $fact){
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        //var_dump($factura); exit;
                        $factura->setId_estado_factura(1);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        if($anular==0){
                            $facturanodosificada->setId_estado_factura(1);
                        }else{
                            $facturanodosificada->setId_estado_factura(4);
                            
                            $insumos_factura_no_dosificada->setId_factura_no_dosificada($fact->id_factura);
                            $insumos_factura_no_dosificada=$sqlInsumosFacturaNoDosificada->getListarInsumosPorFactura($insumos_factura_no_dosificada);

                            foreach ($insumos_factura_no_dosificada as $insumo){
                                $insumos_factura->setId_insumos_factura($insumo->id_insumos_factura);
                                $insumos_factura=$sqlInsumosFactura->getInsumosPorId($insumos_factura);
                                $cantidad = $insumo->cantidad;
                                $saldo = $insumos_factura->getSaldo();
                                
                                $insumos_factura->setSaldo($saldo+$insumo->cantidad);
                                $insumos_factura->setUtilizado(FALSE);
                                $sqlInsumosFactura->setGuardarInsumosFactura($insumos_factura);
                            }
                        }
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                //Actualizar la factura de Tercer operador si se utiliza
                if($co_venezuela->getId_tercer_operador()!=0){
                    $factura_tercer_operador->setId_factura_tercer_operador($co_venezuela->getId_tercer_operador());
                    $factura_tercer_operador=$sqlFacturaTercerOperador->getFacturaPorID($factura_tercer_operador);
                    $factura_tercer_operador->setId_estado_factura(FALSE);
                    $sqlFacturaTercerOperador->setGuardarFactura($facturaterceroperador);
                }
                break;

            case '5':
                //Recuperamos el $co_tp.
                $co_tp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_tp=$sqlCOTp->getListarCertificadosTpPorCO($co_tp);
                //Actualizar las facturas ya utilizadas
                $co_tpddjjfactura->setId_co_tp($co_tp->getId_co_tp());
                $co_tpddjjfactura=$sqlCOTpDdjjFactura->getBuscarCOTpDdjjFacturaPorCoTp($co_tpddjjfactura);
                foreach ($co_tpddjjfactura as $fact){
                    if($fact->id_tipo_factura==1){
                        $factura->setId_factura($fact->id_factura);
                        $factura=$sqlFactura->getFacturaPorID($factura);
                        //var_dump($factura); exit;
                        $factura->setId_estado_factura(1);
                        $sqlFactura->setGuardarFactura($factura);
                    }
                    if($fact->id_tipo_factura==2){
                        $facturanodosificada->setId_factura_no_dosificada($fact->id_factura);
                        $facturanodosificada=$sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                        if($anular==0){
                            $facturanodosificada->setId_estado_factura(1);
                        }else{
                            $facturanodosificada->setId_estado_factura(4);
                            
                            $insumos_factura_no_dosificada->setId_factura_no_dosificada($fact->id_factura);
                            $insumos_factura_no_dosificada=$sqlInsumosFacturaNoDosificada->getListarInsumosPorFactura($insumos_factura_no_dosificada);

                            foreach ($insumos_factura_no_dosificada as $insumo){
                                $insumos_factura->setId_insumos_factura($insumo->id_insumos_factura);
                                $insumos_factura=$sqlInsumosFactura->getInsumosPorId($insumos_factura);
                                $cantidad = $insumo->cantidad;
                                $saldo = $insumos_factura->getSaldo();
                                
                                $insumos_factura->setSaldo($saldo+$insumo->cantidad);
                                $insumos_factura->setUtilizado(FALSE);
                                $sqlInsumosFactura->setGuardarInsumosFactura($insumos_factura);
                            }
                        }
                        $sqlFacturaNoDosificada->setGuardarFactura($facturanodosificada);
                    }
                }
                //Actualizar la factura de Tercer operador si se utiliza
                if($co_tp->getId_tercer_operador()!=0){
                    $factura_tercer_operador->setId_factura_tercer_operador($co_tp->getId_tercer_operador());
                    $factura_tercer_operador=$sqlFacturaTercerOperador->getFacturaPorID($factura_tercer_operador);
                    $factura_tercer_operador->setId_estado_factura(FALSE);
                    $sqlFacturaTercerOperador->setGuardarFactura($facturaterceroperador);
                }
                break;
        }
        */
        $certificado_origen->setId_estado_co(5);
        if($sqlCertificadoOrigen->setGuardarCertificadoOrigen($certificado_origen)){
            $anulacion_co->setId_certificado_origen($_REQUEST["id_certificado_origen"]);
            $anulacion_co->setId_motivo_anulacion($_REQUEST["motivo_anulacion"]);
            $sqlAnulacionCo->setGuardarAnulacionCo($anulacion_co);
            
            echo "Se Eliminó el Certificado de Origen";
        }else{
            echo "No Se Eliminó el Certificado de Origen";
        }
        exit;
    }
    
    //Listar los Certificados de Origen Para su Entrega
    if($_REQUEST['tarea']=='entregaCertificado')
    {
        $vista->display("certificadoOrigen/EntregarCertificadosOrigen.tpl");
        exit;
    }
    if($_REQUEST['tarea']=='listarEntregaCertificados'){
        $certificado_origen->setId_estado_co(1);
        $certificado_origen->setEntregado(FALSE);
        $resultado = $sqlCertificadoOrigen->getListarCertificadosOrigenNoEntregados($certificado_origen);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            
            $strJson .= '{"id_certificado_origen":"' . $datos->getId_certificado_origen() .
                    '","tipo_co":"' . $datos->tipo_co->getAbreviatura() .
                    '","acuerdo":"' . $datos->acuerdo->getSigla() .
                    '","pais":"' . $datos->pais->getNombre() .
                    '","fecha_llenado":"' . substr($datos->getFecha_llenado(), 0, 11) .
                    '","valor_fob_total":"' . $datos->getValor_fob_total() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    //Listar los Certificados de Origen Para su Edición y Corrección
    if($_REQUEST['tarea']=='editarCertificadoOrigen'){
        $certificado_origen->setId_certificado_origen($_REQUEST["id_certificado_origen"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        
        switch ($certificado_origen->getId_tipo_co()){
            case '1':
                $co_aladi->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_aladi=$sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);
                
                $co_aladiddjjfactura->setId_co_aladi($co_aladi->getId_co_aladi());
                $detalle_aladi=$sqlCOAladiDdjjFactura->getListarDdjjFacturasPorCoAladi($co_aladiddjjfactura);

                if($co_aladi->getId_datos_tercer_operador()!=0){
                    $datos_tercer_operador->setId_datos_tercer_operador($co_aladi->getId_datos_tercer_operador());
                    $datos_tercer_operador=$sqlDatosTercerOperador->getBuscarDatosTercerOperadorPorId($datos_tercer_operador);
                    $vista->assign("dto",$datos_tercer_operador);
                }
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
                $detalle_sgp=$sqlCOSgpDdjjFactura->getListarDdjjFacturasPorCoSgp($co_sgpddjjfactura,$certificado_origen->getId_acuerdo());
                
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

        //var_dump($certificado_origen);
        $vista->assign("co",$certificado_origen);
        $vista->display("certificadoOrigen/EditarCertificadoOrigen.tpl");
        exit;
    }
    
    if($_REQUEST['tarea']=='devolverCertificadoOrigen'){
        $hoy = date("Y-m-d H:i:s");
        $certificado_origen->setId_certificado_origen($_REQUEST["id_certificado_origen"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        
        $certificado_origen->setId_estado_co(6);
        $certificado_origen->setFecha_revision($hoy);
        $certificado_origen->setRevisado(TRUE);
        $certificado_origen->setObservaciones_certificador($_REQUEST["observacionesgenerales"]);
        
        if($sqlCertificadoOrigen->setGuardarCertificadoOrigen($certificado_origen)){
            echo "devuelto";
        }else{
            echo "No Devuelto";
        }
    }
    
    if($_REQUEST['tarea']=='asignarNumeroCertificadoOrigen'){
        $hoy = date("Y-m-d H:i:s");
        $certificado_origen->setId_certificado_origen($_REQUEST["id_certificado_origen"]);
        $certificado_origen=$sqlCertificadoOrigen->getBuscarCertificadoOrigenPorId($certificado_origen);
        
        switch ($certificado_origen->getId_tipo_co()){
            case '1':
                //Designar el correlativo para asignación de numeración.
                $correlativo = $sqlCOAladi->getDesignarCorrelativoAladi($co_aladi);

                $co_aladi->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_aladi=$sqlCOAladi->getListarCertificadosAladiPorCO($co_aladi);
                $co_aladi->setCorrelativo_aladi($correlativo[0]["maximo"]+1);
                
                if($sqlCOAladi->setGuardarCertificadoAladi($co_aladi)){
                    echo "Se guardó el correlativo COAladi";
                }else{
                    echo "No se guardó el correlativo COAladi";
                }
                break;
            
            case '2':
                //Designar el correlativo para asignación de numeración.
                $correlativo = $sqlCOMercosur->getDesignarCorrelativoMercosur($co_mercosur);

                $co_mercosur->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_mercosur=$sqlCOMercosur->getListarCertificadosMercosurPorCO($co_mercosur);
                $co_mercosur->setCorrelativo_mercosur($correlativo[0]["maximo"]+1);

                if($sqlCOMercosur->setGuardarCertificadoMercosur($co_mercosur)){
                    echo "Se guardó el COMercosur";
                }else{
                    echo "No se guardó el COMercosur";
                }
                break;
            
            case '3':
                //Designar el correlativo para asignación de numeración.
                $correlativo = $sqlCOSgp->getDesignarCorrelativoSgp($co_sgp);

                $co_sgp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_sgp=$sqlCOSgp->getListarCertificadosSgpPorCO($co_sgp);
                $co_sgp->setCorrelativo_sgp($correlativo[0]["maximo"]+1);

                if($_REQUEST["usooficialtp"]!=''){
                    $co_sgp->setUso_oficial($_REQUEST["usooficialsgp"]);
                }
                if($sqlCOSgp->setGuardarCertificadoSgp($co_sgp)){
                    echo "Se guardó el COSgp";
                }else{
                    echo "No se guardó el COSgp";
                }
                break;

            case '4':
                //Designar el correlativo para asignación de numeración.
                $correlativo = $sqlCOVenezuela->getDesignarCorrelativoVenezuela($co_venezuela);

                $co_venezuela->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_venezuela=$sqlCOVenezuela->getListarCertificadosVenezuelaPorCO($co_venezuela);
                $co_venezuela->setCorrelativo_venezuela($correlativo[0]["maximo"]+1);

                if($sqlCOVenezuela->setGuardarCertificadoVenezuela($co_venezuela)){
                    echo "Se guardó el COVenezuela";
                }else{
                    echo "No se guardó el COVenezuela";
                }
                break;

            case '5':
                //Designar el correlativo para asignación de numeración.
                $correlativo = $sqlCOTp->getDesignarCorrelativoTp($co_tp);

                $co_tp->setId_certificado_origen($certificado_origen->getId_certificado_origen());
                $co_tp=$sqlCOTp->getListarCertificadosTpPorCO($co_tp);
                $co_tp->setCorrelativo_tp($correlativo[0]["maximo"]+1);

                if($_REQUEST["usooficialtp"]!=''){
                    $co_tp->setUso_oficial($_REQUEST["usooficialtp"]);
                }
                if($sqlCOTp->setGuardarCertificadoTp($co_tp)){
                    echo "Se guardó el COTp";
                }else{
                    echo "No se guardó el COTp";
                }
                break;
        }
        
        $certificado_origen->setId_estado_co(1);
        $certificado_origen->setFecha_revision($hoy);
        $certificado_origen->setFecha_emision($hoy);
        $certificado_origen->setEntregado(TRUE);
        
        //Calcular la vigencia del Certificado de Origen
        $fecha= new DateTime($hoy);
        $aumentar_dias = 'P'.$certificado_origen->getVigencia().'D';
        $fecha->add(new DateInterval($aumentar_dias));
        $certificado_origen->setFecha_fin($fecha->format('Y-m-d'));
        if($_REQUEST["observacionesgenerales"]!=''){
            $certificado_origen->setObservaciones_certificador($_REQUEST["observacionesgenerales"]);
        }
        
        if($sqlCertificadoOrigen->setGuardarCertificadoOrigen($certificado_origen)){
            echo "1";
        }else{
            echo "0";
        }
        exit;
    }
    
    if($_REQUEST['tarea']=='cargarTablaAladi'){
        $co_aladiddjjfactura->setId_co_aladi($_REQUEST["id_co_aladi"]);
        $co_aladiddjjfactura = $sqlCOAladiDdjjFactura->getBuscarCOAladiDdjjFacturaPorCoAladi($co_aladiddjjfactura);

        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($co_aladiddjjfactura as $datos){
            $declaracion_jurada->setId_ddjj($datos->getId_ddjj());
            $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
            $detalle_arancel->setId_detalle_arancel($declaracion_jurada->getId_Detalle_Arancel());
            $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
            
            if($datos->getId_tipo_factura()==1){
                $factura->setId_factura($datos->getId_factura());
                $factura = $sqlFactura->getFacturaPorID($factura);
                $num_fac=$factura->getNumero_Factura();
                $fec_emi=$factura->getFecha_emision();
            }else{
                $facturanodosificada->setId_factura_no_dosificada($datos->getId_factura());
                $facturanodosificada = $sqlFacturaNoDosificada->getFacturaPorID($facturanodosificada);
                $num_fac=$facturanodosificada->getNumero_factura();
                $fec_emi=$facturanodosificada->getFecha_emision();
            }
            $strJson .= '{"id_ddjj":"' . $datos->getId_ddjj() .
                    '","clasificacion_arancelaria":"' . $detalle_arancel->getCodigo() .
                    '","descripcion_comercial":"' . $datos->getDenominacion_mercaderia() .
                    '","id_factura":"' . $datos->getId_factura() .
                    '","tipo_factura":"' . $datos->getId_tipo_factura() .
                    '","numero_factura":"' . $num_fac .
                    '","id_insumos_factura":"' . "" .
                    '","insumos":"' . "" .
                    '","total":"' . $datos->getTotal() .
                    '","fecha_emision":"' . $fec_emi .
                    '","tipo_desglose":"' . $datos->getId_tipo_desglose() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    /*
    //////////// Mostrar los datos del Certificado de Origen ///////////////
    if($_REQUEST['tarea']=='mostrarCertificadoParaEntrega')
    {
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
                $detalle_sgp=$sqlCOSgpDdjjFactura->getListarDdjjFacturasPorCoSgp($co_sgpddjjfactura,$certificado_origen->getId_acuerdo());
                
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
        
        $personal=  AdmPersona::listarPersonasPorEmpresa($certificado_origen->getId_empresa());
        $vista->assign('personal', $personal);
        $vista->assign("co",$certificado_origen);
        $vista->display("certificadoOrigen/MostrarCertificadoOrigenParaEntrega.tpl");
        exit;
    }
    */

    //Calcular el Pago para la vista
    if($_REQUEST['tarea']=='calcularPago'){
        //Recuperar la tabla enviada en JSON y formatearla en Array u Objeto
        $total = $_REQUEST["total"];
        //Verificar la escala de precios para sacar el total
        $escala_co->setId_tipo_co($_REQUEST["id_tipo_certificado"]);
        $escala_co=$sqlEscalaCO->getListarEscalaPorCO($escala_co);

        foreach ($escala_co as $escala){
            if(($escala->getMonto_fob_inicial()<$total)&&($escala->getMonto_fob_final()>$total)){
                $costo = $escala->getImporte();
            }
        }
        echo $costo;
        exit;
    }
    
    $vista->display("certificadoOrigen/CertificadosOrigen.tpl");
  }
  
  public static function guardarCOAladiDdjjFactura($tabla_aladi,$id_co_aladi){
    $co_aladiddjjfactura = new COAladiDdjjFactura();
    $sqlCOAladiDDjjFactura = new SQLCOAladiDdjjFactura();
    $factura = new Factura();
    $sqlFactura = new SQLFactura();
    $factura_no_dosificada = new FacturaNoDosificada();
    $sqlFacturaNoDosificada = new SQLFacturaNoDosificada();
    
    $num_orden = 0;
    foreach ($tabla_aladi as $valor) {
        unset($co_aladiddjjfactura);
        $co_aladiddjjfactura = new COAladiDdjjFactura();
        
        $num_orden++;
        $co_aladiddjjfactura->setId_co_aladi($id_co_aladi);
        $co_aladiddjjfactura->setId_ddjj($valor["id_ddjj"]);
        $co_aladiddjjfactura->setId_factura($valor["id_factura"]);
        $co_aladiddjjfactura->setId_tipo_factura($valor["tipo_factura"]);
        $co_aladiddjjfactura->setNumero_orden($num_orden);
        $co_aladiddjjfactura->setDenominacion_mercaderia($valor["descripcion_comercial"]);
        $co_aladiddjjfactura->setId_tipo_desglose($valor["tipo_desglose"]);
        $co_aladiddjjfactura->setTotal($valor["total"]);
        $sqlCOAladiDDjjFactura->setGuardarCOAladiDdjjFactura($co_aladiddjjfactura);
        
        if($valor["tipo_factura"]==1){
            unset($factura);
            $factura = new Factura();
            
            $factura->setId_factura($valor["id_factura"]);
            $factura=$sqlFactura->getFacturaPorID($factura);
            $factura->setId_estado_factura(2);
            $sqlFactura->setGuardarFactura($factura);
        }
        if($valor["tipo_factura"]==2){
            unset($factura_no_dosificada);
            $factura_no_dosificada = new FacturaNoDosificada();
            
            $factura_no_dosificada->setId_factura_no_dosificada($valor["id_factura"]);
            $factura_no_dosificada=$sqlFacturaNoDosificada->getFacturaPorID($factura_no_dosificada);
            $factura_no_dosificada->setId_estado_factura(2);
            $sqlFacturaNoDosificada->setGuardarFactura($factura_no_dosificada);
        }
    } 
  }
  public static function guardarCOSgpDdjjFactura($tabla_sgp,$id_co_sgp){
    $co_sgpddjjfactura = new COSgpDdjjFactura();
    $sqlCOSgpDDjjFactura = new SQLCOSgpDdjjFactura();
    $factura = new Factura();
    $sqlFactura = new SQLFactura();
    $factura_no_dosificada = new FacturaNoDosificada();
    $sqlFacturaNoDosificada = new SQLFacturaNoDosificada();

    $num_orden = 0;
    foreach ($tabla_sgp as $valor) {
        unset($co_sgpddjjfactura);
        $co_sgpddjjfactura = new COSgpDdjjFactura();
        
        $num_orden++;
        $co_sgpddjjfactura->setId_co_sgp($id_co_sgp);
        $co_sgpddjjfactura->setId_ddjj($valor["id_ddjj"]);
        $co_sgpddjjfactura->setId_factura($valor["id_factura"]);
        $co_sgpddjjfactura->setId_tipo_factura($valor["tipo_factura"]);
        $co_sgpddjjfactura->setNumero_orden($num_orden);
        $co_sgpddjjfactura->setMarcas_paquetes($valor["marcapaquete"]);
        $co_sgpddjjfactura->setDenominacion_mercaderia($valor["descripcion_comercial"]);
        $co_sgpddjjfactura->setId_tipo_desglose($valor["tipo_desglose"]);
        $co_sgpddjjfactura->setCantidad($valor["cantidad"]);
        $co_sgpddjjfactura->setId_unidad_medida($valor["id_unidad_medida"]);
        $sqlCOSgpDDjjFactura->setGuardarCOSgpDdjjFactura($co_sgpddjjfactura);
        
        if($valor["tipo_factura"]==1){
            unset($factura);
            $factura = new Factura();
            
            $factura->setId_factura($valor["id_factura"]);
            $factura=$sqlFactura->getFacturaPorID($factura);
            $factura->setId_estado_factura(2);
            $sqlFactura->setGuardarFactura($factura);
        }
        if($valor["tipo_factura"]==2){
            unset($factura_no_dosificada);
            $factura_no_dosificada = new FacturaNoDosificada();
            
            $factura_no_dosificada->setId_factura_no_dosificada($valor["id_factura"]);
            $factura_no_dosificada=$sqlFacturaNoDosificada->getFacturaPorID($factura_no_dosificada);
            $factura_no_dosificada->setId_estado_factura(2);
            $sqlFacturaNoDosificada->setGuardarFactura($factura_no_dosificada);
        }

    } 
  }
  public static function guardarCOTpDdjjFactura($tabla_tp,$id_co_tp){
    $co_tpddjjfactura = new COTpDdjjFactura();
    $declaracion_jurada = new DeclaracionJurada();
    $detalle_arancel = new DetalleArancel();
    $sqlCOTpDDjjFactura = new SQLCOTpDdjjFactura();
    $sqlDdjj = new SQLDeclaracionJurada();
    $sqlDetalleArancel = new SQLDetalleArancel();
    $factura = new Factura();
    $sqlFactura = new SQLFactura();
    $factura_no_dosificada = new FacturaNoDosificada();
    $sqlFacturaNoDosificada = new SQLFacturaNoDosificada();

    $num_orden = 0;
    foreach ($tabla_tp as $valor) {
        unset($co_tpddjjfactura);
        unset($declaracion_jurada);
        unset($detalle_arancel);
        $co_tpddjjfactura = new COTpDdjjFactura();
        $declaracion_jurada = new DeclaracionJurada();
        $detalle_arancel = new DetalleArancel();
        
        $num_orden++;
        $co_tpddjjfactura->setId_co_tp($id_co_tp);
        $co_tpddjjfactura->setId_ddjj($valor["id_ddjj"]);
        $co_tpddjjfactura->setId_factura($valor["id_factura"]);
        $co_tpddjjfactura->setId_tipo_factura($valor["tipo_factura"]);
        $co_tpddjjfactura->setNumero_orden($num_orden);
        $co_tpddjjfactura->setDenominacion_mercaderia($valor["descripcion_comercial"]);
        $co_tpddjjfactura->setId_tipo_desglose($valor["tipo_desglose"]);
        
        //Colocar el Código Armonizado en 6 dígitos
        $declaracion_jurada->setId_ddjj($valor["id_ddjj"]);
        $declaracion_jurada=$sqlDdjj->getBuscarDeclaracionPorId($declaracion_jurada);
        $detalle_arancel->setId_detalle_arancel($declaracion_jurada->getId_Detalle_Arancel());
        $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
        
        $co_tpddjjfactura->setCodigo_armonizado(substr($detalle_arancel->getCodigo(), 0, 6));
        $sqlCOTpDDjjFactura->setGuardarCOTpDdjjFactura($co_tpddjjfactura);
        
        if($valor["tipo_factura"]==1){
            unset($factura);
            $factura = new Factura();
            
            $factura->setId_factura($valor["id_factura"]);
            $factura=$sqlFactura->getFacturaPorID($factura);
            $factura->setId_estado_factura(2);
            $sqlFactura->setGuardarFactura($factura);
        }
        if($valor["tipo_factura"]==2){
            unset($factura_no_dosificada);
            $factura_no_dosificada = new FacturaNoDosificada();
            
            $factura_no_dosificada->setId_factura_no_dosificada($valor["id_factura"]);
            $factura_no_dosificada=$sqlFacturaNoDosificada->getFacturaPorID($factura_no_dosificada);
            $factura_no_dosificada->setId_estado_factura(2);
            $sqlFacturaNoDosificada->setGuardarFactura($factura_no_dosificada);
        }
    } 
  }
  public static function guardarCOMercosurDdjjFactura($tabla_mercosur,$id_co_mercosur,$tipo_desglose){
    $co_mercosurddjjfactura = new COMercosurDdjjFactura();
    $sqlCOMercosurDDjjFactura = new SQLCOMercosurDdjjFactura();
    $factura = new Factura();
    $sqlFactura = new SQLFactura();
    $factura_no_dosificada = new FacturaNoDosificada();
    $sqlFacturaNoDosificada = new SQLFacturaNoDosificada();

    $num_orden = 0;
    foreach ($tabla_mercosur as $valor) {
        unset($co_mercosurddjjfactura);
        $co_mercosurddjjfactura = new COMercosurDdjjFactura();
        
        $num_orden++;
        $co_mercosurddjjfactura->setId_co_mercosur($id_co_mercosur);
        $co_mercosurddjjfactura->setId_ddjj($valor["id_ddjj"]);
        $co_mercosurddjjfactura->setId_factura($valor["id_factura"]);
        $co_mercosurddjjfactura->setId_tipo_factura($valor["tipo_factura"]);
        $co_mercosurddjjfactura->setNumero_orden($num_orden);
        $co_mercosurddjjfactura->setDenominacion_mercaderia($valor["descripcion_comercial"]);
        $co_mercosurddjjfactura->setValor_fob($valor["total"]);
        $co_mercosurddjjfactura->setId_tipo_desglose($valor["tipo_desglose"]);
        //Desglose por DDJJ
        if($tipo_desglose==1){
            $insumos = explode(";", $valor["insumos"]);
            //$total_insumos = count($insumos);
            $umedida = '';
            //Sumar la cantidad/peso total para exportar
            $cantidad=0;
            foreach ($insumos as $ins) {
                $detalle_ins = explode("|", $ins["insumos"]);
                $cantidad =+ $detalle_ins[3];
                $umedida = $detalle_ins[4];
            }
            $co_mercosurddjjfactura->setPeso_cantidad($cantidad);
            $co_mercosurddjjfactura->setUnidad_medida($umedida);
        }
        //Desglose por Factura
        if($tipo_desglose==2){
            $detalle_insumos = explode("|", $valor["insumos"]);
            $co_mercosurddjjfactura->setPeso_cantidad($detalle_insumos[3]);
            $co_mercosurddjjfactura->setUnidad_medida($detalle_insumos[4]);
        }
        
        $sqlCOMercosurDDjjFactura->setGuardarCOMercosurDdjjFactura($co_mercosurddjjfactura);
        
        //Actualizar el estado de las facturas
        if($valor["tipo_factura"]==1){
            unset($factura);
            $factura = new Factura();
            
            $factura->setId_factura($valor["id_factura"]);
            $factura=$sqlFactura->getFacturaPorID($factura);
            $factura->setId_estado_factura(2);
            $sqlFactura->setGuardarFactura($factura);
        }
        if($valor["tipo_factura"]==2){
            unset($factura_no_dosificada);
            $factura_no_dosificada = new FacturaNoDosificada();
            
            $factura_no_dosificada->setId_factura_no_dosificada($valor["id_factura"]);
            $factura_no_dosificada=$sqlFacturaNoDosificada->getFacturaPorID($factura_no_dosificada);
            $factura_no_dosificada->setId_estado_factura(2);
            $sqlFacturaNoDosificada->setGuardarFactura($factura_no_dosificada);
        }
    } 
  }
  
  public static function guardarCOVenezuelaDdjjFactura($tabla_venezuela,$id_co_venezuela, $tipo_desglose){
    $co_venezueladdjjfactura = new COVenezuelaDdjjFactura();
    $sqlCOVenezuelaDDjjFactura = new SQLCOVenezuelaDdjjFactura();
    $factura = new Factura();
    $sqlFactura = new SQLFactura();
    $factura_no_dosificada = new FacturaNoDosificada();
    $sqlFacturaNoDosificada = new SQLFacturaNoDosificada();

    $num_orden = 0;
    foreach ($tabla_venezuela as $valor) {
        unset($co_venezueladdjjfactura);
        $co_venezueladdjjfactura = new COVenezuelaDdjjFactura();
        
        $num_orden++;
        $co_venezueladdjjfactura->setId_co_venezuela($id_co_venezuela);
        $co_venezueladdjjfactura->setId_ddjj($valor["id_ddjj"]);
        $co_venezueladdjjfactura->setId_factura($valor["id_factura"]);
        $co_venezueladdjjfactura->setId_tipo_factura($valor["tipo_factura"]);
        $co_venezueladdjjfactura->setNumero_orden($num_orden);
        $co_venezueladdjjfactura->setDenominacion_mercaderia($valor["descripcion_comercial"]);
        $co_venezueladdjjfactura->setValor_fob($valor["total"]);
        $co_venezueladdjjfactura->setId_tipo_desglose($valor["tipo_desglose"]);
        //Desglose por DDJJ
        if($tipo_desglose==1){
            $insumos = explode(";", $valor["insumos"]);
            //var_dump($insumos);
            $total_insumos = count($insumos);
            $umedida = '';
            //Sumar la cantidad/peso total para exportar
            $cantidad=0;
            //$longitud = count($insumos);
            for($i=0; $i<$total_insumos; $i++){
                $detalle_ins = explode("|", $insumos[$i]);
                //var_dump($detalle_ins);
                $cantidad = $cantidad + $detalle_ins[3];
                $umedida = $detalle_ins[4];
            }

            $co_venezueladdjjfactura->setPeso_cantidad($cantidad);
            $co_venezueladdjjfactura->setUnidad_medida($umedida);
        }
        //Desglose por Factura
        if($tipo_desglose==2){
            $detalle_insumos = explode("|", $valor["insumos"]);
            $co_venezueladdjjfactura->setPeso_cantidad($detalle_insumos[3]);
            $co_venezueladdjjfactura->setUnidad_medida($detalle_insumos[4]);
        }
        
        $sqlCOVenezuelaDDjjFactura->setGuardarCOVenezuelaDdjjFactura($co_venezueladdjjfactura);
        
        if($valor["tipo_factura"]==1){
            unset($factura);
            $factura = new Factura();
            
            $factura->setId_factura($valor["id_factura"]);
            $factura=$sqlFactura->getFacturaPorID($factura);
            $factura->setId_estado_factura(2);
            $sqlFactura->setGuardarFactura($factura);
        }
        if($valor["tipo_factura"]==2){
            unset($factura_no_dosificada);
            $factura_no_dosificada = new FacturaNoDosificada();
            
            $factura_no_dosificada->setId_factura_no_dosificada($valor["id_factura"]);
            $factura_no_dosificada=$sqlFacturaNoDosificada->getFacturaPorID($factura_no_dosificada);
            $factura_no_dosificada->setId_estado_factura(2);
            $sqlFacturaNoDosificada->setGuardarFactura($factura_no_dosificada);
        }
    } 
  }
  
}