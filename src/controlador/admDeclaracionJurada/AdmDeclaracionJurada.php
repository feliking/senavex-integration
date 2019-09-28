<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 23-09-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');
include_once(PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');

include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');
include_once(PATH_TABLA . DS . 'DdjjAcuerdo.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'DetalleArancel.php');
include_once(PATH_TABLA . DS . 'UnidadMedida.php');
include_once(PATH_TABLA . DS . 'ServicioExportador.php');
include_once(PATH_TABLA . DS . 'CriterioOrigen.php');
include_once(PATH_TABLA . DS . 'InsumosNacionales.php');
include_once(PATH_TABLA . DS . 'InsumosImportados.php');
include_once(PATH_TABLA . DS . 'Comercializador.php');
include_once(PATH_TABLA . DS . 'EstadoDdjj.php');
include_once(PATH_TABLA . DS . 'Asesoramiento.php');
include_once(PATH_TABLA . DS . 'AsesoramientoHistorico.php');
include_once(PATH_TABLA . DS . 'Servicio.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'Fabrica.php');
include_once(PATH_TABLA . DS . 'SistemaColas.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'ObservacionesDdjj.php');

include_once(PATH_MODELO . DS . 'SQLDeclaracionJurada.php');
include_once(PATH_MODELO . DS . 'SQLDdjjAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLDetalleArancel.php');
include_once(PATH_MODELO . DS . 'SQLUnidadMedida.php');
include_once(PATH_MODELO . DS . 'SQLInsumosNacionales.php');
include_once(PATH_MODELO . DS . 'SQLInsumosImportados.php');
include_once(PATH_MODELO . DS . 'SQLComercializador.php');
include_once(PATH_MODELO . DS . 'SQLAsesoramiento.php');
include_once(PATH_MODELO . DS . 'SQLAsesoramientoHistorico.php');
include_once(PATH_MODELO . DS . 'SQLServicio.php');
include_once(PATH_MODELO . DS . 'SQLServicioExportador.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');
include_once(PATH_MODELO . DS . 'SQLFabrica.php');
include_once(PATH_MODELO . DS . 'SQLSistemaColas.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLObservacionesDdjj.php');

class AdmDeclaracionJurada extends Principal {
  public function AdmDeclaracionJurada() 
  {
    $vista = Principal::getVistaInstance();
    
    $declaracion_jurada = new DeclaracionJurada();
    $acuerdo = new Acuerdo();
    $detalle_arancel = new DetalleArancel();
    $unidad_medida = new UnidadMedida();
    $insumos_nacionales = new InsumosNacionales();
    $insumos_importados = new InsumosImportados();
    $comercializador = new Comercializador();
    $ddjj_acuerdo = new DdjjAcuerdo();
    $estado_ddjj = new EstadoDdjj();
    $servicio_exportador = new ServicioExportador();
    $asesoramiento = new Asesoramiento();
    $asesoramiento_historico = new AsesoramientoHistorico();
    $servicio = new Servicio();
    $sistema_colas = new SistemaColas();
    $pais = new Pais();
    $fabrica = new Fabrica();
    $persona = new Persona();
    $observaciones_ddjj = new ObservacionesDdjj();
    
    $sqlDeclaracionJurada = new SQLDeclaracionJurada();
    $sqlAcuerdo = new SQLAcuerdo();
    $sqlDetalleArancel = new SQLDetalleArancel();
    $sqlUnidadMedida = new SQLUnidadMedida();
    $sqlInsumosNacionales = new SQLInsumosNacionales();
    $sqlInsumosImportados = new SQLInsumosImportados();
    $sqlComercializador = new SQLComercializador();
    $sqlDdjjAcuerdo = new SQLDdjjAcuerdo();
    $sqlAsesoramiento = new SQLAsesoramiento();
    $sqlAsesoramientoHistorico = new SQLAsesoramientoHistorico();
    $sqlServicio = new SQLServicio();
    $sqlServicioExportador = new SQLServicioExportador();
    $sqlSistemaColas = new SQLSistemaColas();
    $sqlPais = new SQLPais();
    $sqlFabrica = new SQLFabrica();
    $sqlPersona = new SQLPersona();
    $sqlObservacionesDdjj = new SQLObservacionesDdjj();
    
    $datosAcuerdo = $sqlAcuerdo->getListarAcuerdo($acuerdo);
    $datosUnidadMedida = $sqlUnidadMedida->getListarUnidadMedida($unidad_medida);

    if($_REQUEST['tarea']=='listarDeclaracionesVigentes'){
        $declaracion_jurada->setId_Empresa($_SESSION["id_empresa"]);
        $declaracion_jurada->setId_estado_ddjj(1);
        $resultado = $sqlDeclaracionJurada->getListarDeclaracionesPorEstado($declaracion_jurada);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $detalle_arancel->setId_detalle_arancel($datos->getId_detalle_arancel());
            $detalle_arancel = $sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
            
            $strJson .= '{"id_ddjj":"' . $datos->getId_ddjj() .
                    '","correlativo_ddjj":"' . $datos->getCorrelativo_ddjj() .
                    '","descripcion_comercial":"' . $datos->getDescripcion_comercial() .
                    '","detalle_arancel":"' . $detalle_arancel->getCodigo() .
                    '","caracteristicas":"' . $datos->getCaracteristicas() .
                    '","fecha_registro":"' . substr($datos->getFecha_registro(), 0, 11) .
                    '","proceso_productivo":"' . $datos->getProceso_productivo() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if($_REQUEST['tarea']=='listarDeclaracionesPasadas'){
        $declaracion_jurada->setId_Empresa($_SESSION["id_empresa"]);
        $declaracion_jurada->setId_estado_ddjj(2);
        $resultado = $sqlDeclaracionJurada->getListarDeclaracionesPorEstado($declaracion_jurada);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $detalle_arancel->setId_detalle_arancel($datos->getId_detalle_arancel());
            $detalle_arancel = $sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
            
            $strJson .= '{"id_ddjj":"' . $datos->getId_ddjj() .
                    '","correlativo_ddjj":"' . $datos->getCorrelativo_ddjj() .
                    '","descripcion_comercial":"' . $datos->getDescripcion_comercial() .
                    '","detalle_arancel":"' . $detalle_arancel->getCodigo() .
                    '","caracteristicas":"' . $datos->getCaracteristicas() .
                    '","fecha_registro":"' . substr($datos->getFecha_registro(), 0, 11) .
                    '","proceso_productivo":"' . $datos->getProceso_productivo() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if($_REQUEST['tarea']=='listarDeclaracionesEnRevision'){
        $declaracion_jurada->setId_Empresa($_SESSION["id_empresa"]);
        $declaracion_jurada->setId_estado_ddjj(3);
        $resultado = $sqlDeclaracionJurada->getListarDeclaracionesPorEstado($declaracion_jurada);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_ddjj":"' . $datos->getId_ddjj() .
                    '","descripcion_comercial":"' . $datos->getDescripcion_comercial() .
                    '","detalle_arancel":"' . $datos->getId_detalle_arancel() .
                    '","caracteristicas":"' . $datos->getCaracteristicas() .
                    '","fecha_registro":"' . substr($datos->getFecha_registro(), 0, 11) .
                    '","proceso_productivo":"' . $datos->getProceso_productivo() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }    
    
    if($_REQUEST['tarea']=='listarDeclaracionesEnviadas'){
        $declaracion_jurada->setId_Empresa($_SESSION["id_empresa"]);
        $declaracion_jurada->setId_estado_ddjj(0);
        $resultado = $sqlDeclaracionJurada->getListarDeclaracionesPorEstado($declaracion_jurada);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $detalle_arancel->setId_detalle_arancel($datos->getId_detalle_arancel());
            $detalle_arancel = $sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
            
            $strJson .= '{"id_ddjj":"' . $datos->getId_ddjj() .
                    '","descripcion_comercial":"' . $datos->getDescripcion_comercial() .
                    '","detalle_arancel":"' . $detalle_arancel->getCodigo() .
                    '","caracteristicas":"' . $datos->getCaracteristicas() .
                    '","fecha_registro":"' . substr($datos->getFecha_registro(), 0, 11) .
                    '","proceso_productivo":"' . $datos->getProceso_productivo() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if($_REQUEST['tarea']=='listarDeclaracionesConAsesoramiento'){
        $declaracion_jurada->setId_Empresa($_SESSION["id_empresa"]);
        $declaracion_jurada->setId_estado_ddjj(4);
        $resultado = $sqlDeclaracionJurada->getListarDeclaracionesPorEstado($declaracion_jurada);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $strJson .= '{"id_ddjj":"' . $datos->getId_ddjj() .
                    '","descripcion_comercial":"' . $datos->getDescripcion_comercial() .
                    '","detalle_arancel":"' . $datos->getId_detalle_arancel() .
                    '","caracteristicas":"' . $datos->getCaracteristicas() .
                    '","fecha_registro":"' . substr($datos->getFecha_registro(), 0, 11) .
                    '","proceso_productivo":"' . $datos->getProceso_productivo() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if($_REQUEST['tarea']=='listarDeclaracionesParaAprobar'){
        $declaracion_jurada->setId_Empresa($_SESSION["id_empresa"]);
        $declaracion_jurada->setId_estado_ddjj(6);
        $resultado = $sqlDeclaracionJurada->getListarDeclaracionesPorEstado($declaracion_jurada);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $detalle_arancel->setId_detalle_arancel($datos->getId_detalle_arancel());
            $detalle_arancel = $sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
            
            $strJson .= '{"id_ddjj":"' . $datos->getId_ddjj() .
                    '","descripcion_comercial":"' . $datos->getDescripcion_comercial() .
                    '","detalle_arancel":"' . $detalle_arancel->getCodigo() .
                    '","caracteristicas":"' . $datos->getCaracteristicas() .
                    '","fecha_registro":"' . substr($datos->getFecha_registro(), 0, 11) .
                    '","proceso_productivo":"' . $datos->getProceso_productivo() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if($_REQUEST['tarea']=='listarDeclaracionesRechazadas'){
        $declaracion_jurada->setId_Empresa($_SESSION["id_empresa"]);
        $declaracion_jurada->setId_estado_ddjj(5);
        $resultado = $sqlDeclaracionJurada->getListarDeclaracionesPorEstado($declaracion_jurada);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $detalle_arancel->setId_detalle_arancel($datos->getId_detalle_arancel());
            $detalle_arancel = $sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
            
            $strJson .= '{"id_ddjj":"' . $datos->getId_ddjj() .
                    '","descripcion_comercial":"' . $datos->getDescripcion_comercial() .
                    '","detalle_arancel":"' . $detalle_arancel->getCodigo() .
                    '","caracteristicas":"' . $datos->getCaracteristicas() .
                    '","fecha_registro":"' . substr($datos->getFecha_registro(), 0, 11) .
                    '","proceso_productivo":"' . $datos->getProceso_productivo() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if($_REQUEST['tarea']=='listarDeclaracionesParaCorregir'){
        $declaracion_jurada->setId_Empresa($_SESSION["id_empresa"]);
        $declaracion_jurada->setId_estado_ddjj(7);
        $resultado = $sqlDeclaracionJurada->getListarDeclaracionesPorEstado($declaracion_jurada);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $detalle_arancel->setId_detalle_arancel($datos->getId_detalle_arancel());
            $detalle_arancel = $sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
            
            $strJson .= '{"id_ddjj":"' . $datos->getId_ddjj() .
                    '","descripcion_comercial":"' . $datos->getDescripcion_comercial() .
                    '","detalle_arancel":"' . $detalle_arancel->getCodigo() .
                    '","caracteristicas":"' . $datos->getCaracteristicas() .
                    '","fecha_registro":"' . substr($datos->getFecha_registro(), 0, 11) .
                    '","proceso_productivo":"' . $datos->getProceso_productivo() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    //************************ Guardar la declaracion jurada nueva ************************///
    if($_REQUEST['tarea']=='guardarDeclaracionJurada'){
        $lista_acuerdos = $_REQUEST["lista_acuerdos"];
        //var_dump($lista_acuerdos);
        $hoy=date("Y-m-d");
        $declaracion_jurada->setId_Empresa($_SESSION["id_empresa"]);
        $declaracion_jurada->setId_Persona($_SESSION["id_persona"]);
        $declaracion_jurada->setId_estado_ddjj(0);
        
        //Generar el Servicio Exportador para la DDJJ
        $serv_export = AdmSistemaColas::generarServicioExportadorParaDdjj($_SESSION["id_persona"],0,$_SESSION["id_empresa"]);
        $declaracion_jurada->setId_Servicio_Exportador($serv_export);
        
        $declaracion_jurada->setId_fabrica($_REQUEST["combo_fabricas"]);
        $declaracion_jurada->setDescripcion_Comercial($_REQUEST["denominacion_comercial"]);
        $declaracion_jurada->setNombre_tecnico($_REQUEST["nombre_tecnico"]);
        $declaracion_jurada->setCaracteristicas($_REQUEST["caracteristicas"]);
        $declaracion_jurada->setAplicacion($_REQUEST["aplicacion"]);
        
        //Verificar si el campo de Clasificacion Arancelaria esta vacío
        if($_REQUEST["combonandina"]==''){
            $declaracion_jurada->setId_Detalle_Arancel(0);
        }else{
            $declaracion_jurada->setId_Detalle_Arancel($_REQUEST["combonandina"]);
        }
        
        //Verificar si el campo de Unidad de Medida esta vacío
        if($_REQUEST["unidadmedida"]==''){
            $declaracion_jurada->setId_Unidad_Medida(0);
        }else{
            $declaracion_jurada->setId_Unidad_Medida($_REQUEST["unidadmedida"]);
        }
        
        //Verificar si el campo de Otros Costos esta vacío
        if($_REQUEST["otros_costos"]==''){
            $declaracion_jurada->setOtros_Costos(0);
        }else{
            $declaracion_jurada->setOtros_Costos($_REQUEST["otros_costos"]);
        }

        $declaracion_jurada->setProduccion_mensual($_REQUEST["produccion_mensual"]);
        $declaracion_jurada->setProceso_Productivo($_REQUEST["procesoproductivo"]);
        $declaracion_jurada->setFecha_Registro($hoy);
        
        //Guardar la lista de elaboración Incentivo
        $lista_elaboracion = $this->listaElaboracionIncentivo($_REQUEST["lista_elaboracion"]);
        $declaracion_jurada->setElaboracion_Incentivo($lista_elaboracion);
        
        //Recuperar la tabla de insumos nacionales
        $nacionales = $_REQUEST["tabla_nac"];
        
        //Recuperar la tabla de insumos importados y colocar por defecto a false
        $importados = $_REQUEST["tabla_import"];
        $declaracion_jurada->setInsumos_importados(FALSE);
        
        //Recuperar la tabla de comercializadores y colocar por defecto a false
        $comerc = $_REQUEST["tabla_comerc"];
        $declaracion_jurada->setComercializador(FALSE);
        
        if($sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada)){
            //Recuperar el ID de la declaracion recien insertada
            $datDdjj = $sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
            
            //Iniciar variables para sumar la cantidad de acuerdos y costos para la DDJJ
            $cantidad_ddjj = 0;
            $suma_costo_ddjj = 0;
            
            //Sacar el costo de las declaraciones juradas (3 para DDJJ)
            $servicio->setId_servicio(3);
            $servicio = $sqlServicio->getBuscarServicioPorId($servicio);
            $costo_ddjj = $servicio->getCosto();
            
            //Guardar los Insumos Nacionales
            $this->guardarInsumosNacionales($nacionales,$datDdjj->getId_ddjj());
            
            //Verificar y Guardar los Insumos Importados
            if($_REQUEST["check_insumosimportados"]==TRUE){
                $this->guardarInsumosImportados($importados, $datDdjj->getId_ddjj());
                $datDdjj->setInsumos_importados(TRUE);
            }
            
            //Verificar y Guardar los Comercializadores
            if($_REQUEST["check_comercializador"]==TRUE){
                $this->guardarComercializadores($comerc, $datDdjj->getId_ddjj());
                $datDdjj->setComercializador(TRUE);
            }
            
            //Verificar para cada acuerdo si guarda en la tabla
            if(in_array('can',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(1);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                $ddjj_acuerdo->setSubpartida(0);

                //***** Establecer si se dá el criterio de origen ****
                if($_REQUEST["criterio_origen_can"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_can"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda CAN";
                }else{
                    echo "No guarda CAN";
                }
            }
            if(in_array('ace22',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(3);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                $ddjj_acuerdo->setSubpartida($_REQUEST["naladisa96"]);

                //***** Establecer si se dá el criterio de origen ****
                if($_REQUEST["criterio_origen_ace22"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_ace22"]);
                }
                
                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda Ace22";
                }else{
                    echo "No guarda Ace22";
                }
            }
            if(in_array('ace47',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(4);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                $ddjj_acuerdo->setSubpartida($_REQUEST["naladisa2007"]);

                if($_REQUEST["criterio_origen_ace47"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_ace47"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda ACE47";
                }else{
                    echo "No guarda ACE47";
                }
            }
            if(in_array('arpar4',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(6);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                if(empty($_REQUEST["naladi83"])){
                    $ddjj_acuerdo->setSubpartida(0);
                }else{
                    $ddjj_acuerdo->setSubpartida($_REQUEST["naladi83"]);
                }

                if($_REQUEST["criterio_origen_arpar4"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_arpar4"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda ARPAR4";
                }else{
                    echo "No guarda ARPAR4";
                }
            }
            if(in_array('aapag',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(7);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                $ddjj_acuerdo->setSubpartida($_REQUEST["naladisa91"]);

                if($_REQUEST["criterio_origen_aapag"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_aapag"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda AAPAG";
                }else{
                    echo "No guarda AAPAG";
                }
            }
            if(in_array('mercosur',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(2);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(180);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                $ddjj_acuerdo->setSubpartida($_REQUEST["naladisa93"]);

                if($_REQUEST["criterio_origen_mercosur"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_mercosur"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda MERCOSUR";
                }else{
                    echo "No guarda MERCOSUR";
                }
            }
            if(in_array('venezuela',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(5);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(180);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_venezuela"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_venezuela"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda VENEZUELA";
                }else{
                    echo "No guarda VENEZUELA";
                }
            }
            if(in_array('arampanama',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(19);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                if(empty($_REQUEST["naladisa2007"])){
                    $ddjj_acuerdo->setSubpartida(0);
                }else{
                    $ddjj_acuerdo->setSubpartida($_REQUEST["naladisa2007"]);
                }

                if($_REQUEST["criterio_origen_arampanama"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_venezuela"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda ARAM PANAMÁ";
                }else{
                    echo "No guarda ARAM PANAMÁ";
                }
            }
            
            //************** SISTEMA GENERAL PREFERENCIAL *******
            if(in_array('canada',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(8);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpcanada"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpcanada"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP CANADA";
                }else{
                    echo "No guarda SGP CANADA";
                }
            }
            if(in_array('suiza',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(9);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpsuiza"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpsuiza"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP SUIZA";
                }else{
                    echo "No guarda SGP SUIZA";
                }
            }
            if(in_array('noruega',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(10);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpnoruega"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpnoruega"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP NORUEGA";
                }else{
                    echo "No guarda SGP NORUEGA";
                }
            }
            if(in_array('japon',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(11);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpjapon"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpjapon"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP JAPON";
                }else{
                    echo "No guarda SGP JAPON";
                }
            }
            if(in_array('zelanda',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(12);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpzelanda"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpzelanda"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP NUEVA ZELANDA";
                }else{
                    echo "No guarda SGP NUEVA ZELANDA";
                }
            }
            if(in_array('rusia',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(13);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgprusia"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgprusia"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP RUSIA";
                }else{
                    echo "No guarda SGP RUSIA";
                }
            }
            if(in_array('turquia',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(14);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpturquia"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpturquia"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP TURQUIA";
                }else{
                    echo "No guarda SGP TURQUIA";
                }
            }
            if(in_array('bielorrusia',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(15);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpbielorrusia"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpbielorrusia"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP BIELORRUSIA";
                }else{
                    echo "No guarda SGP BIELORRUSIA";
                }
            }
            if(in_array('ue',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(16);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpue"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpue"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP UE";
                }else{
                    echo "No guarda SGP UE";
                }
            }
            if(in_array('eeuu',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(17);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpeeuu"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpeeuu"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP EEUU";
                }else{
                    echo "No guarda SGP EEUU";
                }
            }
            if(in_array('tp',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(18);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgptp"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgptp"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda TERCEROS PAISES";
                }else{
                    echo "No guarda TERCEROS PAISES";
                }
            }
            
            //Guardar si hay cambios en algun dato de la ddjj
            $sqlDeclaracionJurada->setGuardarDdjj($datDdjj);
            
            /****** Generar la Cola para el Asistente ******/
            $asist_senavex = AdmSistemaColas::generarColaParaDdjj($serv_export,$cantidad_ddjj);

            /****** Actualizar el valor del servicio exportador *****/
            $servicio_exportador->setId_servicio_exportador($serv_export);
            $servicio_exportador=$sqlServicioExportador->getBuscarServicioExportadorPorId($servicio_exportador);
            $servicio_exportador->setCosto_Actual($suma_costo_ddjj);
            $sqlServicioExportador->setGuardarServicioExportador($servicio_exportador);
            
            //Envío de Correos
            $correos=AdmCorreo::obtenerCorreosEmpresa($_SESSION['id_empresa']);
            $correos=explode(',',$correos);
            $persona->setId_persona($_SESSION["id_persona"]);
            $persona=$sqlPersona->getDatosPersonaPorId($persona);
            $nombre_persona=$persona->getNombres().' '.$persona->getPaterno().' '. $persona->getMaterno();
            if(trim($correos[0])==trim($correos[1]))
            {
                AdmCorreo::enviarCorreo($correos[0],$datDdjj->empresa->getRazon_social(),$nombre_persona,'','',31);
            }
            else
            {
                AdmCorreo::enviarCorreo($correos[0],$datDdjj->empresa->getRazon_social(),$nombre_persona,'','',31);
                AdmCorreo::enviarCorreo($correos[1],$datDdjj->empresa->getRazon_social(),$nombre_persona,'','',31);
            }
            echo "Se guardó la DDJJ";
        }else{
            echo "No se guardó la DDJJ";
        }     
        exit;
    }
    
    //******* ASESORAMIENTO ********//
    if($_REQUEST['tarea']=='pedirAsesoramiento'){
        $lista_acuerdos = $_REQUEST["lista_acuerdos"];
        
        $hoy=date("Y-m-d");
        $declaracion_jurada->setId_Empresa($_SESSION["id_empresa"]);
        $declaracion_jurada->setId_Persona($_SESSION["id_persona"]);
        $declaracion_jurada->setId_estado_ddjj(4);
        
        //Generar el Servicio Exportador para la DDJJ
        $serv_export = AdmSistemaColas::generarServicioExportadorParaDdjj($_SESSION["id_persona"],0,$_SESSION["id_empresa"]);
        $declaracion_jurada->setId_Servicio_Exportador($serv_export);

        //Verificar si el campo de Fabricas esta vacío
        if($_REQUEST["combo_fabricas"]==''){
            $declaracion_jurada->setId_fabrica(0);
        }else{
            $declaracion_jurada->setId_fabrica($_REQUEST["combo_fabricas"]);
        }
        $declaracion_jurada->setDescripcion_Comercial($_REQUEST["denominacion_comercial"]);
        $declaracion_jurada->setNombre_tecnico($_REQUEST["nombre_tecnico"]);
        $declaracion_jurada->setCaracteristicas($_REQUEST["caracteristicas"]);
        $declaracion_jurada->setAplicacion($_REQUEST["aplicacion"]);
        
        //Verificar si el campo de Clasificacion Arancelaria esta vacío
        if($_REQUEST["combonandina"]==''){
            $declaracion_jurada->setId_Detalle_Arancel(0);
        }else{
            $declaracion_jurada->setId_Detalle_Arancel($_REQUEST["combonandina"]);
        }
        
        //Verificar si el campo de Unidad de Medida esta vacío
        if($_REQUEST["unidadmedida"]==''){
            $declaracion_jurada->setId_Unidad_Medida(0);
        }else{
            $declaracion_jurada->setId_Unidad_Medida($_REQUEST["unidadmedida"]);
        }
        
        $declaracion_jurada->setOtros_Costos(0);
        $declaracion_jurada->setProduccion_mensual(0);
        $declaracion_jurada->setProceso_Productivo($_REQUEST["procesoproductivo"]);
        $declaracion_jurada->setFecha_Registro($hoy);
        
        //Guardar la lista de elaboración Incentivo
        if(!empty($_REQUEST["lista_elaboracion"])){
            $lista_elaboracion = $this->listaElaboracionIncentivo($_REQUEST["lista_elaboracion"]);
            $declaracion_jurada->setElaboracion_Incentivo($lista_elaboracion);
        }else{
            $declaracion_jurada->setElaboracion_Incentivo(0);
        }
        //Recuperar la tabla de insumos nacionales
        $nacionales = $_REQUEST["tabla_nac"];
        
        //Recuperar la tabla de insumos importados y colocar por defecto a false
        $importados = $_REQUEST["tabla_import"];
        $declaracion_jurada->setInsumos_importados(FALSE);
        
        //Recuperar la tabla de comercializadores y colocar por defecto a false
        $comerc = $_REQUEST["tabla_comerc"];
        $declaracion_jurada->setComercializador(FALSE);
        //var_dump($declaracion_jurada); exit;
        if($sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada)){
            //Recuperar el ID de la declaracion recien insertada
            $datDdjj = $sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
            
            //Iniciar variables para sumar la cantidad de acuerdos y costos para la DDJJ
            $cantidad_ddjj = 0;
            $suma_costo_ddjj = 0;
            
            //Sacar el costo de las declaraciones juradas (3 para DDJJ)
            $servicio->setId_servicio(3);
            $servicio = $sqlServicio->getBuscarServicioPorId($servicio);
            $costo_ddjj = $servicio->getCosto();
            
            //Guardar los Insumos Nacionales
            if(!empty($nacionales)){
               $this->guardarInsumosNacionales($nacionales,$datDdjj->getId_ddjj());
            }
            
            //Verificar y Guardar los Insumos Importados
            if($_REQUEST["check_insumosimportados"]==TRUE){
                $this->guardarInsumosImportados($importados, $datDdjj->getId_ddjj());
                $datDdjj->setInsumos_importados(TRUE);
            }
            
            //Verificar y Guardar los Comercializadores
            if($_REQUEST["check_comercializador"]==TRUE){
                $this->guardarComercializadores($comerc, $datDdjj->getId_ddjj());
                $datDdjj->setComercializador(TRUE);
            }
            
            //Verificar para cada acuerdo si guarda en la tabla
            if(in_array('can',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(1);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_fob"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                }
                $ddjj_acuerdo->setSubpartida(0);

                //***** Establecer si se dá el criterio de origen ****
                if($_REQUEST["criterio_origen_can"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_can"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda CAN";
                }else{
                    echo "No guarda CAN";
                }
            }
            if(in_array('ace22',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(3);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_fob"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                }
                if(empty($_REQUEST["naladisa96"])){
                    $ddjj_acuerdo->setSubpartida(0);
                }else{
                    $ddjj_acuerdo->setSubpartida($_REQUEST["naladisa96"]);
                }

                //***** Establecer si se dá el criterio de origen ****
                if($_REQUEST["criterio_origen_ace22"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_ace22"]);
                }
                
                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda Ace22";
                }else{
                    echo "No guarda Ace22";
                }
            }
            if(in_array('ace47',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(4);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_fob"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                }
                if(empty($_REQUEST["naladisa2007"])){
                    $ddjj_acuerdo->setSubpartida(0);
                }else{
                    $ddjj_acuerdo->setSubpartida($_REQUEST["naladisa2007"]);
                }

                if($_REQUEST["criterio_origen_ace47"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_ace47"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda ACE47";
                }else{
                    echo "No guarda ACE47";
                }
            }
            if(in_array('arpar4',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(6);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_fob"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                }
                if(empty($_REQUEST["naladi83"])){
                    $ddjj_acuerdo->setSubpartida(0);
                }else{
                    $ddjj_acuerdo->setSubpartida($_REQUEST["naladi83"]);
                }

                if($_REQUEST["criterio_origen_arpar4"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_arpar4"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda ARPAR4";
                }else{
                    echo "No guarda ARPAR4";
                }
            }
            if(in_array('aapag',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(7);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_fob"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                }
                if(empty($_REQUEST["naladisa91"])){
                    $ddjj_acuerdo->setSubpartida(0);
                }else{
                    $ddjj_acuerdo->setSubpartida($_REQUEST["naladisa91"]);
                }

                if($_REQUEST["criterio_origen_aapag"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_aapag"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda AAPAG";
                }else{
                    echo "No guarda AAPAG";
                }
            }
            if(in_array('mercosur',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(2);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(180);
                if($_REQUEST["valor_fob"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                }
                if(empty($_REQUEST["naladisa93"])){
                    $ddjj_acuerdo->setSubpartida(0);
                }else{
                    $ddjj_acuerdo->setSubpartida($_REQUEST["naladisa93"]);
                }

                if($_REQUEST["criterio_origen_mercosur"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_mercosur"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda MERCOSUR";
                }else{
                    echo "No guarda MERCOSUR";
                }
            }
            if(in_array('venezuela',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(5);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(180);
                if($_REQUEST["valor_fob"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                }
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_venezuela"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_venezuela"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda VENEZUELA";
                }else{
                    echo "No guarda VENEZUELA";
                }
            }
            if(in_array('arampanama',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(19);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_fob"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                }
                if(empty($_REQUEST["naladisa2007"])){
                    $ddjj_acuerdo->setSubpartida(0);
                }else{
                    $ddjj_acuerdo->setSubpartida($_REQUEST["naladisa2007"]);
                }

                if($_REQUEST["criterio_origen_arampanama"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_venezuela"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda ARAM PANAMÁ";
                }else{
                    echo "No guarda ARAM PANAMÁ";
                }
            }
            
            //************** SISTEMA GENERAL PREFERENCIAL *******
            if(in_array('canada',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(8);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_exwork"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                }
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpcanada"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpcanada"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP CANADA";
                }else{
                    echo "No guarda SGP CANADA";
                }
            }
            if(in_array('suiza',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(9);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_exwork"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                }
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpsuiza"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpsuiza"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP SUIZA";
                }else{
                    echo "No guarda SGP SUIZA";
                }
            }
            if(in_array('noruega',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(10);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_exwork"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                }
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpnoruega"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpnoruega"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP NORUEGA";
                }else{
                    echo "No guarda SGP NORUEGA";
                }
            }
            if(in_array('japon',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(11);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_exwork"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                }
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpjapon"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpjapon"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP JAPON";
                }else{
                    echo "No guarda SGP JAPON";
                }
            }
            if(in_array('zelanda',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(12);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_exwork"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                }
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpzelanda"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpzelanda"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP NUEVA ZELANDA";
                }else{
                    echo "No guarda SGP NUEVA ZELANDA";
                }
            }
            if(in_array('rusia',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(13);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_exwork"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                }
                $ddjj_acuerdo->setSubpartida(0);

                if($_REQUEST["criterio_origen_sgprusia"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgprusia"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP RUSIA";
                }else{
                    echo "No guarda SGP RUSIA";
                }
            }
            if(in_array('turquia',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(14);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_exwork"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                }
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpturquia"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpturquia"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP TURQUIA";
                }else{
                    echo "No guarda SGP TURQUIA";
                }
            }
            if(in_array('bielorrusia',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(15);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_exwork"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                }
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpbielorrusia"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpbielorrusia"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP BIELORRUSIA";
                }else{
                    echo "No guarda SGP BIELORRUSIA";
                }
            }
            if(in_array('ue',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(16);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_exwork"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                }
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpue"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpue"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP UE";
                }else{
                    echo "No guarda SGP UE";
                }
            }
            if(in_array('eeuu',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(17);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_exwork"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                }
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgpeeuu"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgpeeuu"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda SGP EEUU";
                }else{
                    echo "No guarda SGP EEUU";
                }
            }
            if(in_array('tp',$lista_acuerdos)){
                //Destruir y crear la variable para generar nuevos registros en la tabla ddjj_acuerdo
                unset($ddjj_acuerdo);
                $ddjj_acuerdo = new DdjjAcuerdo();
                
                $ddjj_acuerdo->setId_ddjj($datDdjj->getId_ddjj());
                $ddjj_acuerdo->setId_Acuerdo(18);
                $ddjj_acuerdo->setId_estado_ddjj(0);
                $ddjj_acuerdo->setVigencia(730);
                if($_REQUEST["valor_exwork"]==''){
                    $ddjj_acuerdo->setValor_Mercancia(0);
                }else{
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                }
                $ddjj_acuerdo->setSubpartida(0);
                
                if($_REQUEST["criterio_origen_sgptp"]==''){
                    $ddjj_acuerdo->setId_Criterio_Origen(0);
                }else{
                    $ddjj_acuerdo->setId_Criterio_Origen($_REQUEST["criterio_origen_sgptp"]);
                }

                if($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo)){
                    $cantidad_ddjj++;
                    $suma_costo_ddjj = $suma_costo_ddjj + $costo_ddjj;
                    echo "guarda TERCEROS PAISES";
                }else{
                    echo "No guarda TERCEROS PAISES";
                }
            }
            
            /****** Generar la Cola para el Asistente ******/
            $asist_senavex = AdmSistemaColas::generarColaParaDdjj($serv_export,$cantidad_ddjj);
            
            /****** Generar el asesoramiento ******/
            $asesoramiento->setId_Persona($_SESSION["id_persona"]);
            $asesoramiento->setId_Empresa($_SESSION["id_empresa"]);
            $asesoramiento->setId_Asistente_Senavex($asist_senavex);
            $asesoramiento->setEstado(0);
            $asesoramiento->setFecha_Inicio($hoy);
            $asesoramiento->setId_Servicio_Exportador($serv_export);
            
            if($sqlAsesoramiento->setGuardarAsesoramiento($asesoramiento)){
                $datAsesoramiento = $sqlAsesoramiento->getBuscarAsesoramientoPorId($asesoramiento);
                //echo "entra";
                $asesorarddjj = $_REQUEST["asesorarddjj"];
                //var_dump($asesorarddjj);
                //Inicializar variable para el inicio del Asesoramiento
                $observaciones_exportador = "Solicito Asesoramiento en:";
                
                if(in_array('arancel',$asesorarddjj)){
                    $observaciones_exportador .= " Clasificación Arancelaria,";
                }
                if(in_array('procesoproductivo',$asesorarddjj)){
                    $observaciones_exportador .= " Proceso Productivo,";
                }
                if(in_array('insumos',$asesorarddjj)){
                    $observaciones_exportador .= " Insumos Nacionales/Importados,";
                }
                
                $observaciones_exportador = substr($observaciones_exportador, 0, strlen($observaciones_exportador) - 1);
                $observaciones_exportador .= ". La Pregunta es: ".$_REQUEST["observaciones"];
                
                $asesoramiento_historico->setId_Asesoramiento($datAsesoramiento->getId_Asesoramiento());
                $asesoramiento_historico->setObservaciones_Exportador($observaciones_exportador);
                $asesoramiento_historico->setFecha_Observacion($hoy);
                $asesoramiento_historico->setEstado(FALSE);
                
                $sqlAsesoramientoHistorico->setGuardarAsesoramientoHistorico($asesoramiento_historico);
            }
            
            //Envío de Correos
            $correos=AdmCorreo::obtenerCorreosEmpresa($_SESSION['id_empresa']);
            $correos=explode(',',$correos);
            $persona->setId_persona($_SESSION["id_persona"]);
            $persona=$sqlPersona->getDatosPersonaPorId($persona);
            $nombre_persona=$persona->getNombres().' '.$persona->getPaterno().' '. $persona->getMaterno();
            if(trim($correos[0])==trim($correos[1]))
            {
                AdmCorreo::enviarCorreo($correos[0],$datDdjj->empresa->getRazon_social(),$nombre_persona,'','',32);
            }
            else
            {
                AdmCorreo::enviarCorreo($correos[0],$datDdjj->empresa->getRazon_social(),$nombre_persona,'','',32);
                AdmCorreo::enviarCorreo($correos[1],$datDdjj->empresa->getRazon_social(),$nombre_persona,'','',32);
            }

        }else{
            echo "No se guardó la DDJJ";
        }
        exit;
    }

    if($_REQUEST['tarea']=='prueba'){
        //AdmSistemaColas::generarColaParaDdjj(26,4);
    }
    
    if($_REQUEST['tarea']=='editarDeclaracionJurada'){
        $declaracion_jurada->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
        
        //Sacar el detalle de la clasificación arancelaria
        $detalle_arancel->setId_detalle_arancel($declaracion_jurada->getId_Detalle_Arancel());
        $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
        
        $insumos_nacionales->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $insumos_nacionales = $sqlInsumosNacionales->getBuscarInsumosPorDdjj($insumos_nacionales);

        $insumos_importados->setId_DDJJ($_REQUEST["id_declaracion_jurada"]);
        $insumos_importados = $sqlInsumosImportados->getBuscarInsumosPorDdjj($insumos_importados);
        
        $comercializador->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $comercializador = $sqlComercializador->getBuscarComercializadorPorDdjj($comercializador);

        $unidad_medida->setId_Unidad_Medida($declaracion_jurada->getId_Unidad_Medida());
        $unidad_medida = $sqlUnidadMedida->getBuscarDescripcionPorId($unidad_medida);

        $fabrica->setId_empresa($_SESSION["id_empresa"]);
        $fabrica=$sqlFabrica->getListarFabricasporEmpresa($fabrica);

        //Asignar Valores para el tpl
        $vista->assign('detalle_arancel', $detalle_arancel);
        $vista->assign('unidad_medida', $unidad_medida);
        $vista->assign('fabrica', $fabrica);
        
        //Para combos en las tablas
        unset($unidad_medida);
        $unidad_medida = new UnidadMedida();
        $umedida=$sqlUnidadMedida->getListarUnidadMedida($unidad_medida);
        $pais=$sqlPais->getListarPais($pais);
        $acuerdo=$sqlAcuerdo->getListarAcuerdo($acuerdo);
        
        $vista->assign('unidadmedida', $umedida);
        $vista->assign('pais', $pais);
        $vista->assign('acuerdo', $acuerdo);
        
        //Verificar si existen las tablas
        if ($insumos_nacionales != NULL){
            //echo "Hay insumos Nacionales<br>";
            $vista->assign('insnac', 1);
            $vista->assign('insumosnacionales', $insumos_nacionales);
        }else{
            $vista->assign('insnac', 0);
        }
        if ($insumos_importados != NULL){
            //echo "Hay insumos Importados<br>";
            $vista->assign('insimp', 1);
            $vista->assign('insumosimportados', $insumos_importados);
        }else{
            $vista->assign('insimp', 0);
        }
        if ($comercializador != NULL){
            //echo "Hay Comercializadores<br>";
            $vista->assign('comerc', 1);
            $vista->assign('comercializador', $comercializador);
        }else{
            $vista->assign('comerc', 0);
        }

        $ddjj_acuerdo->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $ddjj_acuerdo=$sqlDdjjAcuerdo->getListarAcuerdosPorDdjj($ddjj_acuerdo);
        $fob = 0; $exwork=0; $contar_fob=0; $contar_exwork=0; $contar_naladisa2007=0;
        $aparece_naladisa93=0;
        $aparece_naladisa96=0;
        $aparece_naladisa2007=0;
        $aparece_naladisa91=0;
        $aparece_naladi83=0;
        foreach ($ddjj_acuerdo as $ac){
            if ($ac->acuerdo->getId_tipo_valor_internacional()==1){
                $apareceFob = 1;
                $fob = $ac->getValor_Mercancia();
                $contar_fob++;
                if(($ac->getId_Acuerdo()==4)||($ac->getId_Acuerdo()==19)){
                    $contar_naladisa2007++;
                    $aparece_naladisa2007=1;
                    
                }
                if($ac->getId_Acuerdo()==2){
                    $aparece_naladisa93=1;
                }
                if($ac->getId_Acuerdo()==3){
                    $aparece_naladisa96=1;
                }
                if($ac->getId_Acuerdo()==7){
                    $aparece_naladisa91=1;
                }
                if($ac->getId_Acuerdo()==6){
                    $aparece_naladi83=1;
                }
            }else{
                $apareceExWork = 1;
                $exwork = $ac->getValor_Mercancia();
                $contar_exwork++;
            }                
        }
        $vista->assign('contar_fob', $contar_fob);
        $vista->assign('contar_exwork', $contar_exwork);
        $vista->assign('contar_naladisa2007', $contar_naladisa2007);
        $vista->assign('aparece_naladisa93', $aparece_naladisa93);
        $vista->assign('aparece_naladisa96', $aparece_naladisa96);
        $vista->assign('aparece_naladisa2007', $aparece_naladisa2007);
        $vista->assign('aparece_naladisa91', $aparece_naladisa91);
        $vista->assign('aparece_naladi83', $aparece_naladi83);

        $elaboracion = explode(";", $declaracion_jurada->getElaboracion_Incentivo());
        $elab_0=0;
        $elab_1=0;
        $elab_2=0;
        $elab_3=0;
        $elab_4=0;
        $elab_otro='';
        foreach ($elaboracion as $elab){
            if ($elab==0) $elab_0=1;
            if ($elab==1) $elab_1=1;
            if ($elab==2) $elab_2=1;
            if ($elab==3) $elab_3=1;
            if ($elab==4){
                $elab_4=1;
                $elab_otro = array_pop($elaboracion);
            }
        }
        $vista->assign('elab_0', $elab_0);
        $vista->assign('elab_1', $elab_1);
        $vista->assign('elab_2', $elab_2);
        $vista->assign('elab_3', $elab_3);
        $vista->assign('elab_4', $elab_4);
        $vista->assign('elab_otro', $elab_otro);
        
        if($declaracion_jurada->getId_estado_ddjj()==4){
            $asesoramiento->setId_Servicio_Exportador($declaracion_jurada->getId_Servicio_Exportador());
            $asesoramiento=$sqlAsesoramiento->getBuscarAsesoramientoPorServicioExportador($asesoramiento);
            $asesoramiento_historico->setId_Asesoramiento($asesoramiento->getId_Asesoramiento());
            $asesoramiento_historico=$sqlAsesoramientoHistorico->getBuscarPorIdAsesoramiento($asesoramiento_historico);
            $vista->assign('asesoramiento', $asesoramiento);
            $vista->assign('historico_asesoramiento', $asesoramiento_historico);
        }
        
        $vista->assign('apareceFob', $apareceFob);
        $vista->assign('apareceExWork', $apareceExWork);
        $vista->assign('fob', $fob);
        $vista->assign('exwork', $exwork);
        $vista->assign('acuerdos', $ddjj_acuerdo);
        $vista->assign('ddjj', $declaracion_jurada);
        $vista->display("declaracionJurada/EditarDeclaracionJurada.tpl");
        exit;
    }

    if($_REQUEST['tarea']=='corregirDeclaracionJurada'){
        $declaracion_jurada->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
        
        //Sacar el detalle de la clasificación arancelaria
        $detalle_arancel->setId_detalle_arancel($declaracion_jurada->getId_Detalle_Arancel());
        $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
        
        $insumos_nacionales->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $insumos_nacionales = $sqlInsumosNacionales->getBuscarInsumosPorDdjj($insumos_nacionales);

        $insumos_importados->setId_DDJJ($_REQUEST["id_declaracion_jurada"]);
        $insumos_importados = $sqlInsumosImportados->getBuscarInsumosPorDdjj($insumos_importados);
        
        $comercializador->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $comercializador = $sqlComercializador->getBuscarComercializadorPorDdjj($comercializador);

        $unidad_medida->setId_Unidad_Medida($declaracion_jurada->getId_Unidad_Medida());
        $unidad_medida = $sqlUnidadMedida->getBuscarDescripcionPorId($unidad_medida);

        $fabrica->setId_empresa($_SESSION["id_empresa"]);
        $fabrica=$sqlFabrica->getListarFabricasporEmpresa($fabrica);

        //Asignar Valores para el tpl
        $vista->assign('detalle_arancel', $detalle_arancel);
        $vista->assign('unidad_medida', $unidad_medida);
        $vista->assign('fabrica', $fabrica);
        
        //Para combos en las tablas
        unset($unidad_medida);
        $unidad_medida = new UnidadMedida();
        $umedida=$sqlUnidadMedida->getListarUnidadMedida($unidad_medida);
        $pais=$sqlPais->getListarPais($pais);
        $acuerdo=$sqlAcuerdo->getListarAcuerdo($acuerdo);
        
        $vista->assign('unidadmedida', $umedida);
        $vista->assign('pais', $pais);
        $vista->assign('acuerdo', $acuerdo);
        
        //Verificar si existen las tablas
        if ($insumos_nacionales != NULL){
            //echo "Hay insumos Nacionales<br>";
            $vista->assign('insnac', 1);
            $vista->assign('insumosnacionales', $insumos_nacionales);
        }else{
            $vista->assign('insnac', 0);
        }
        if ($insumos_importados != NULL){
            //echo "Hay insumos Importados<br>";
            $vista->assign('insimp', 1);
            $vista->assign('insumosimportados', $insumos_importados);
        }else{
            $vista->assign('insimp', 0);
        }
        if ($comercializador != NULL){
            //echo "Hay Comercializadores<br>";
            $vista->assign('comerc', 1);
            $vista->assign('comercializador', $comercializador);
        }else{
            $vista->assign('comerc', 0);
        }

        $ddjj_acuerdo->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $ddjj_acuerdo=$sqlDdjjAcuerdo->getListarAcuerdosPorDdjj($ddjj_acuerdo);
        $fob = 0; $exwork=0; $contar_fob=0; $contar_exwork=0; $contar_naladisa2007=0;
        $aparece_naladisa93=0;
        $aparece_naladisa96=0;
        $aparece_naladisa2007=0;
        $aparece_naladisa91=0;
        $aparece_naladi83=0;
        foreach ($ddjj_acuerdo as $ac){
            if ($ac->acuerdo->getId_tipo_valor_internacional()==1){
                $apareceFob = 1;
                $fob = $ac->getValor_Mercancia();
                $contar_fob++;
                if(($ac->getId_Acuerdo()==4)||($ac->getId_Acuerdo()==19)){
                    $contar_naladisa2007++;
                    $aparece_naladisa2007=1;
                    $codigo_naladisa2007 = $ac->getSubpartida();
                    $vista->assign('codigo_naladisa2007', $codigo_naladisa2007);
                }
                if($ac->getId_Acuerdo()==2){
                    $aparece_naladisa93=1;
                    $codigo_naladisa93 = $ac->getSubpartida();
                    $vista->assign('codigo_naladisa93', $codigo_naladisa93);
                }
                if($ac->getId_Acuerdo()==3){
                    $aparece_naladisa96=1;
                    $codigo_naladisa96 = $ac->getSubpartida();
                    $vista->assign('codigo_naladisa96', $codigo_naladisa96);
                }
                if($ac->getId_Acuerdo()==7){
                    $aparece_naladisa91=1;
                    $codigo_naladisa91 = $ac->getSubpartida();
                    $vista->assign('codigo_naladisa91', $codigo_naladisa91);
                }
                if($ac->getId_Acuerdo()==6){
                    $aparece_naladi83=1;
                    $codigo_naladi83 = $ac->getSubpartida();
                    $vista->assign('codigo_naladi83', $codigo_naladi83);
                }
            }else{
                $apareceExWork = 1;
                $exwork = $ac->getValor_Mercancia();
                $contar_exwork++;
            }                
        }
        $vista->assign('contar_fob', $contar_fob);
        $vista->assign('contar_exwork', $contar_exwork);
        $vista->assign('contar_naladisa2007', $contar_naladisa2007);
        $vista->assign('aparece_naladisa93', $aparece_naladisa93);
        $vista->assign('aparece_naladisa96', $aparece_naladisa96);
        $vista->assign('aparece_naladisa2007', $aparece_naladisa2007);
        $vista->assign('aparece_naladisa91', $aparece_naladisa91);
        $vista->assign('aparece_naladi83', $aparece_naladi83);

        $elaboracion = explode(";", $declaracion_jurada->getElaboracion_Incentivo());
        $elab_0=0;
        $elab_1=0;
        $elab_2=0;
        $elab_3=0;
        $elab_4=0;
        $elab_otro='';
        foreach ($elaboracion as $elab){
            if ($elab==0) $elab_0=1;
            if ($elab==1) $elab_1=1;
            if ($elab==2) $elab_2=1;
            if ($elab==3) $elab_3=1;
            if ($elab==4){
                $elab_4=1;
                $elab_otro = array_pop($elaboracion);
            }
        }
        $vista->assign('elab_0', $elab_0);
        $vista->assign('elab_1', $elab_1);
        $vista->assign('elab_2', $elab_2);
        $vista->assign('elab_3', $elab_3);
        $vista->assign('elab_4', $elab_4);
        $vista->assign('elab_otro', $elab_otro);
        
        if($declaracion_jurada->getId_estado_ddjj()==4){
            $asesoramiento->setId_Servicio_Exportador($declaracion_jurada->getId_Servicio_Exportador());
            $asesoramiento=$sqlAsesoramiento->getBuscarAsesoramientoPorServicioExportador($asesoramiento);
            $asesoramiento_historico->setId_Asesoramiento($asesoramiento->getId_Asesoramiento());
            $asesoramiento_historico=$sqlAsesoramientoHistorico->getBuscarPorIdAsesoramiento($asesoramiento_historico);
            $vista->assign('asesoramiento', $asesoramiento);
            $vista->assign('historico_asesoramiento', $asesoramiento_historico);
        }
        
        //Historial de Correcciones
        if($declaracion_jurada->getRevisado()=='TRUE'){
            $observaciones_ddjj->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
            $observaciones_ddjj = $sqlObservacionesDdjj->getListarObservacionesDdjj($observaciones_ddjj);
            $vista->assign('observaciones_ddjj', $observaciones_ddjj);
        }
        $vista->assign('apareceFob', $apareceFob);
        $vista->assign('apareceExWork', $apareceExWork);
        $vista->assign('fob', $fob);
        $vista->assign('exwork', $exwork);
        $vista->assign('acuerdos', $ddjj_acuerdo);
        $vista->assign('ddjj', $declaracion_jurada);
        $vista->display("declaracionJurada/CorregirDeclaracionJurada.tpl");
        exit;
    }
    
    if($_REQUEST['tarea']=='clonarDeclaracionJurada'){
        $declaracion_jurada->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);

        //Sacar el detalle de la clasificación arancelaria
        $detalle_arancel->setId_detalle_arancel($declaracion_jurada->getId_Detalle_Arancel());
        $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
        
        $insumos_nacionales->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $insumos_nacionales = $sqlInsumosNacionales->getBuscarInsumosPorDdjj($insumos_nacionales);

        $insumos_importados->setId_DDJJ($_REQUEST["id_declaracion_jurada"]);
        $insumos_importados = $sqlInsumosImportados->getBuscarInsumosPorDdjj($insumos_importados);
        
        $comercializador->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $comercializador = $sqlComercializador->getBuscarComercializadorPorDdjj($comercializador);

        $unidad_medida->setId_Unidad_Medida($declaracion_jurada->getId_Unidad_Medida());
        $unidad_medida = $sqlUnidadMedida->getBuscarDescripcionPorId($unidad_medida);

        $fabrica->setId_empresa($_SESSION["id_empresa"]);
        $fabrica=$sqlFabrica->getListarFabricasporEmpresa($fabrica);
        
        //Asignar Valores para el tpl
        $vista->assign('detalle_arancel', $detalle_arancel);
        $vista->assign('unidad_medida', $unidad_medida);
        $vista->assign('fabrica', $fabrica);
        
        //Para combos en las tablas
        unset($unidad_medida);
        $unidad_medida = new UnidadMedida();
        $umedida=$sqlUnidadMedida->getListarUnidadMedida($unidad_medida);
        $pais=$sqlPais->getListarPais($pais);
        $acuerdo=$sqlAcuerdo->getListarAcuerdo($acuerdo);
        
        $vista->assign('unidadmedida', $umedida);
        $vista->assign('pais', $pais);
        $vista->assign('acuerdo', $acuerdo);
        
        //Verificar si existen las tablas
        if ($insumos_nacionales != NULL){
            //echo "Hay insumos Nacionales<br>";
            $vista->assign('insnac', 1);
            $vista->assign('insumosnacionales', $insumos_nacionales);
        }else{
            $vista->assign('insnac', 0);
        }
        if ($insumos_importados != NULL){
            //echo "Hay insumos Importados<br>";
            $vista->assign('insimp', 1);
            $vista->assign('insumosimportados', $insumos_importados);
        }else{
            $vista->assign('insimp', 0);
        }
        if ($comercializador != NULL){
            //echo "Hay Comercializadores<br>";
            $vista->assign('comerc', 1);
            $vista->assign('comercializador', $comercializador);
        }else{
            $vista->assign('comerc', 0);
        }

        $ddjj_acuerdo->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $ddjj_acuerdo=$sqlDdjjAcuerdo->getListarAcuerdosPorDdjj($ddjj_acuerdo);
        $fob = 0; $exwork=0; $contar_fob=0; $contar_exwork=0; $contar_naladisa2007=0;
        $aparece_naladisa93=0;
        $aparece_naladisa96=0;
        $aparece_naladisa2007=0;
        $aparece_naladisa91=0;
        $aparece_naladi83=0;
        foreach ($ddjj_acuerdo as $ac){
            if ($ac->acuerdo->getId_tipo_valor_internacional()==1){
                $apareceFob = 1;
                $fob = $ac->getValor_Mercancia();
                $contar_fob++;
                if(($ac->getId_Acuerdo()==4)||($ac->getId_Acuerdo()==19)){
                    $contar_naladisa2007++;
                    $aparece_naladisa2007=1;
                    $codigo_naladisa2007 = $ac->getSubpartida();
                    $vista->assign('codigo_naladisa2007', $codigo_naladisa2007);
                }
                if($ac->getId_Acuerdo()==2){
                    $aparece_naladisa93=1;
                    $codigo_naladisa93 = $ac->getSubpartida();
                    $vista->assign('codigo_naladisa93', $codigo_naladisa93);
                }
                if($ac->getId_Acuerdo()==3){
                    $aparece_naladisa96=1;
                    $codigo_naladisa96 = $ac->getSubpartida();
                    $vista->assign('codigo_naladisa96', $codigo_naladisa96);
                }
                if($ac->getId_Acuerdo()==7){
                    $aparece_naladisa91=1;
                    $codigo_naladisa91 = $ac->getSubpartida();
                    $vista->assign('codigo_naladisa91', $codigo_naladisa91);
                }
                if($ac->getId_Acuerdo()==6){
                    $aparece_naladi83=1;
                    $codigo_naladi83 = $ac->getSubpartida();
                    $vista->assign('codigo_naladi83', $codigo_naladi83);
                }
            }else{
                $apareceExWork = 1;
                $exwork = $ac->getValor_Mercancia();
                $contar_exwork++;
            }                
        }
        /* Para Calcular precio de DDJJ
         * $total_ddjj = count($ddjj_acuerdo);
        $servicio->setId_servicio(3);
        $servicio=$sqlServicio->getBuscarServicioPorId($servicio);
        $total_pagar = $total_ddjj * $servicio->getCosto();
        $vista->assign('total_pagar', $total_pagar);*/
        $vista->assign('contar_fob', $contar_fob);
        $vista->assign('contar_exwork', $contar_exwork);
        $vista->assign('contar_naladisa2007', $contar_naladisa2007);
        $vista->assign('aparece_naladisa93', $aparece_naladisa93);
        $vista->assign('aparece_naladisa96', $aparece_naladisa96);
        $vista->assign('aparece_naladisa2007', $aparece_naladisa2007);
        $vista->assign('aparece_naladisa91', $aparece_naladisa91);
        $vista->assign('aparece_naladi83', $aparece_naladi83);
        
        $elaboracion = explode(";", $declaracion_jurada->getElaboracion_Incentivo());
        $elab_0=0;
        $elab_1=0;
        $elab_2=0;
        $elab_3=0;
        $elab_4=0;
        $elab_otro='';
        foreach ($elaboracion as $elab){
            if ($elab==0) $elab_0=1;
            if ($elab==1) $elab_1=1;
            if ($elab==2) $elab_2=1;
            if ($elab==3) $elab_3=1;
            if ($elab==4){
                $elab_4=1;
                $elab_otro = array_pop($elaboracion);
            }
        }
        $vista->assign('elab_0', $elab_0);
        $vista->assign('elab_1', $elab_1);
        $vista->assign('elab_2', $elab_2);
        $vista->assign('elab_3', $elab_3);
        $vista->assign('elab_4', $elab_4);
        $vista->assign('elab_otro', $elab_otro);
        
        if($declaracion_jurada->getId_estado_ddjj()==4){
            $asesoramiento->setId_Servicio_Exportador($declaracion_jurada->getId_Servicio_Exportador());
            $asesoramiento=$sqlAsesoramiento->getBuscarAsesoramientoPorServicioExportador($asesoramiento);
            $asesoramiento_historico->setId_Asesoramiento($asesoramiento->getId_Asesoramiento());
            $asesoramiento_historico=$sqlAsesoramientoHistorico->getBuscarPorIdAsesoramiento($asesoramiento_historico);
            $vista->assign('asesoramiento', $asesoramiento);
            $vista->assign('historico_asesoramiento', $asesoramiento_historico);
        }
        
        $vista->assign('apareceFob', $apareceFob);
        $vista->assign('apareceExWork', $apareceExWork);
        $vista->assign('fob', $fob);
        $vista->assign('exwork', $exwork);
        $vista->assign('acuerdos', $ddjj_acuerdo);
        $vista->assign('ddjj', $declaracion_jurada);
        $vista->display("declaracionJurada/ClonarDeclaracionJurada.tpl");
        exit;
    }

    
    if($_REQUEST['tarea']=='actualizarDeclaracionJurada'){
        $hoy=date("Y-m-d H:i:s");
        $id_ddjj=$_REQUEST["id_declaracion_jurada"];
        $declaracion_jurada->setId_ddjj($id_ddjj);
        $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
        
        $declaracion_jurada->setId_estado_ddjj(0);
        $serv_export = $declaracion_jurada->getId_Servicio_Exportador();
        $declaracion_jurada->setId_fabrica($_REQUEST["combo_fabricas"]);
        
        if($_REQUEST["corregir"]=='1'){
            $declaracion_jurada->setDescripcion_Comercial($_REQUEST["denominacion_comercial"]);
            $declaracion_jurada->setCaracteristicas($_REQUEST["caracteristicas"]);
            $declaracion_jurada->setNombre_tecnico($_REQUEST["nombre_tecnico"]);
            $declaracion_jurada->setAplicacion($_REQUEST["aplicacion"]);
            //$declaracion_jurada->setRevisado(TRUE);
            //Guardar los comentarios para que tome en cuenta el certificador
            if(trim($_REQUEST["comentario_general"])!=''){
                $observaciones_ddjj->setObservaciones_generales(trim($_REQUEST["comentario_general"]));
                $observaciones_ddjj->setFecha_observacion($hoy);
                $observaciones_ddjj->setId_tipo_usuario($_SESSION["tipo_usuario"]);
                $observaciones_ddjj->setId_ddjj($id_ddjj);
                if($sqlObservacionesDdjj->setGuardarObservacionesDdjj($observaciones_ddjj)){
                    echo "Guarda Observacion";
                }else{
                    echo "No guarda observacion";
                }
            }
        }
        
        //Verificar si el campo de Clasificacion Arancelaria esta vacío
        if($_REQUEST["combonandina"]==''){
            $declaracion_jurada->setId_Detalle_Arancel(0);
        }else{
            $declaracion_jurada->setId_Detalle_Arancel($_REQUEST["combonandina"]);
        }
        
        //Verificar si el campo de Unidad de Medida esta vacío
        if($_REQUEST["unidadmedida"]==''){
            $declaracion_jurada->setId_Unidad_Medida(0);
        }else{
            $declaracion_jurada->setId_Unidad_Medida($_REQUEST["unidadmedida"]);
        }
        
        //Verificar si el campo de Otros Costos esta vacío
        if($_REQUEST["otros_costos"]==''){
            $declaracion_jurada->setOtros_Costos(0);
        }else{
            $declaracion_jurada->setOtros_Costos($_REQUEST["otros_costos"]);
        }

        $declaracion_jurada->setProduccion_mensual($_REQUEST["produccion_mensual"]);
        $declaracion_jurada->setProceso_Productivo($_REQUEST["procesoproductivo"]);
        
        //Guardar la lista de elaboración Incentivo
        $lista_elaboracion = $this->listaElaboracionIncentivo($_REQUEST["lista_elaboracion"]);
        $declaracion_jurada->setElaboracion_Incentivo($lista_elaboracion);
        
        //Recuperar la tabla de insumos nacionales
        $nacionales = $_REQUEST["tabla_nac"];
        
        //Recuperar la tabla de insumos importados y colocar por defecto a false
        $importados = $_REQUEST["tabla_import"];
        $declaracion_jurada->setInsumos_importados(FALSE);
        
        //Recuperar la tabla de comercializadores y colocar por defecto a false
        $comerc = $_REQUEST["tabla_comerc"];
        $declaracion_jurada->setComercializador(FALSE);
        
        //if($sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada)){
        //Recuperar el ID de la declaracion
        //$datDdjj = $_REQUEST["id_declaracion_jurada"];

        //Borrar primero lo que habia y Guardar los Insumos Nacionales
        $insumos_nacionales->setId_ddjj($id_ddjj);
        $sqlInsumosNacionales->setEliminarInsumosNacionalesPorDdjj($insumos_nacionales);
        $this->guardarInsumosNacionales($nacionales,$id_ddjj);
        //Verificar y Guardar los Insumos Importados
        if($_REQUEST["check_insumosimportados"]==TRUE){
            $this->guardarInsumosImportados($importados, $id_ddjj);
            $datDdjj->setInsumos_importados(TRUE);
        }

        //Verificar y Guardar los Comercializadores
        if($_REQUEST["check_comercializador"]==TRUE){
            $this->guardarComercializadores($comerc, $id_ddjj);
            $datDdjj->setComercializador(TRUE);
        }

        //Listar todos los acuerdos asociados a la ddjj
        $ddjj_acuerdo->setId_ddjj($id_ddjj);
        $resultado=$sqlDdjjAcuerdo->getListarAcuerdosPorDdjj($ddjj_acuerdo);
        foreach ($resultado as $acuerdos){
            unset($ddjj_acuerdo);
            $ddjj_acuerdo = new DdjjAcuerdo();

            switch($acuerdos->acuerdo->getId_tipo_valor_internacional()){
                case 1:
                    $ddjj_acuerdo->setId_ddjj_acuerdo($acuerdos->getId_ddjj_acuerdo());
                    $ddjj_acuerdo=$sqlDdjjAcuerdo->getListarDdjjAcuerdosPorId($ddjj_acuerdo);
                    if($_REQUEST["valor_fob"]!=''){
                        $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_fob"]);
                    }
                    //echo "1-".$acuerdos->acuerdo->getSigla().$acuerdos->getId_ddjj_acuerdo()."<br>";
                    $sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo);
                    break;
                case 2: 
                    $ddjj_acuerdo->setId_ddjj_acuerdo($acuerdos->getId_ddjj_acuerdo());
                    $ddjj_acuerdo=$sqlDdjjAcuerdo->getListarDdjjAcuerdosPorId($ddjj_acuerdo);
                    $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                    if($_REQUEST["valor_exwork"]!=''){
                        $ddjj_acuerdo->setValor_Mercancia($_REQUEST["valor_exwork"]);
                    }
                    //echo "2-".$acuerdos->acuerdo->getSigla().$acuerdos->getId_ddjj_acuerdo()."<br>";
                    $sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo);
                    break;
            }
            //$sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ddjj_acuerdo);
        }
        //var_dump($declaracion_jurada);
        $sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada);
        exit;
    }
    
    /******* Mostrar la Declaración jurada al Exportador *****/
    if($_REQUEST['tarea']=='mostrardeclaracion'){
        $declaracion_jurada->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
        
        //Sacar el detalle de la clasificación arancelaria
        $detalle_arancel->setId_detalle_arancel($declaracion_jurada->getId_Detalle_Arancel());
        $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
        
        $insumos_nacionales->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $insumos_nacionales = $sqlInsumosNacionales->getBuscarInsumosPorDdjj($insumos_nacionales);

        $insumos_importados->setId_DDJJ($_REQUEST["id_declaracion_jurada"]);
        $insumos_importados = $sqlInsumosImportados->getBuscarInsumosPorDdjj($insumos_importados);
        
        $comercializador->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $comercializador = $sqlComercializador->getBuscarComercializadorPorDdjj($comercializador);

        $unidad_medida->setId_Unidad_Medida($declaracion_jurada->getId_Unidad_Medida());
        $unidad_medida = $sqlUnidadMedida->getBuscarDescripcionPorId($unidad_medida);

        //Asignar Valores para el tpl
        $vista->assign('detalle_arancel', $detalle_arancel);
        $vista->assign('unidad_medida', $unidad_medida);
        
        //Verificar si existen las tablas
        if ($insumos_nacionales != NULL){
            //echo "Hay insumos Nacionales<br>";
            $vista->assign('insnac', 1);
            $vista->assign('insumosnacionales', $insumos_nacionales);
        }else{
            $vista->assign('insnac', 0);
        }
        
        if ($insumos_importados != NULL){
            //echo "Hay insumos Importados<br>";
            $vista->assign('insimp', 1);
            $vista->assign('insumosimportados', $insumos_importados);
        }else{
            $vista->assign('insimp', 0);
        }
        
        if ($comercializador != NULL){
            //echo "Hay Comercializadores<br>";
            $vista->assign('comerc', 1);
            $vista->assign('comercializador', $comercializador);
        }else{
            $vista->assign('comerc', 0);
        }

        $ddjj_acuerdo->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $ddjj_acuerdo=$sqlDdjjAcuerdo->getListarAcuerdosPorDdjj($ddjj_acuerdo);
        
        $fob = 0; $exwork=0;
        foreach ($ddjj_acuerdo as $ac){
            if ($ac->acuerdo->getId_tipo_valor_internacional()==1){
                $fob = $ac->getValor_Mercancia();
            }else{
                $exwork = $ac->getValor_Mercancia();
            }
            unset($detalle_arancel);
            $detalle_arancel = new DetalleArancel();
            
            if ($ac->getId_acuerdo()==2){
                if($ac->getSubpartida()==0){
                    $naladisa93 = 'Sin Naladisa 93';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladisa93 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladisa93', $naladisa93);
            }
            if ($ac->getId_acuerdo()==3){
                if($ac->getSubpartida()==0){
                    $naladisa96 = 'Sin Naladisa 96';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladisa96 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladisa96', $naladisa96);
            }
            if(($ac->getId_acuerdo()==4)||($ac->getId_acuerdo()==19)){
                if($ac->getSubpartida()==0){
                    $naladisa2007 = 'Sin Naladisa 2007';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladisa2007 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladisa2007', $naladisa2007);
            }
            if ($ac->getId_acuerdo()==7){
                if($ac->getSubpartida()==0){
                    $naladisa91 = 'Sin Naladisa 91';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladisa91 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladisa91', $naladisa91);
            }
            if ($ac->getId_acuerdo()==6){
                if($ac->getSubpartida()==0){
                    $naladi83 = 'Sin Naladi 83';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladi83 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladi83', $naladi83);
            }
        }
        $vista->assign('acuerdos', $ddjj_acuerdo);
        $vista->assign('fob', $fob);
        $vista->assign('exwork', $exwork);
        $vista->assign('ddjj', $declaracion_jurada);
        
        //Preguntamos si es con asesoramiento o es normal
        if($declaracion_jurada->getId_estado_ddjj()==4){
            $asesoramiento->setId_Servicio_Exportador($declaracion_jurada->getId_Servicio_Exportador());
            $asesoramiento=$sqlAsesoramiento->getBuscarAsesoramientoPorServicioExportador($asesoramiento);
            
            $asesoramiento_historico->setId_Asesoramiento($asesoramiento->getId_Asesoramiento());
            $asesoramiento_historico=$sqlAsesoramientoHistorico->getBuscarPorIdAsesoramiento($asesoramiento_historico);
            
            $vista->assign('asesoramiento', $asesoramiento);
            $vista->assign('historico_asesoramiento', $asesoramiento_historico);
        }
        
        $vista->display("declaracionJurada/MostrarDeclaracionJurada.tpl");
        exit;
    }
    
    /******* Mostrar la Declaración jurada al Exportador *****/
    if($_REQUEST['tarea']=='mostrarDdjjParaAprobacion'){
        $declaracion_jurada->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
        
        //Sacar el detalle de la clasificación arancelaria
        $detalle_arancel->setId_detalle_arancel($declaracion_jurada->getId_Detalle_Arancel());
        $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
        
        $insumos_nacionales->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $insumos_nacionales = $sqlInsumosNacionales->getBuscarInsumosPorDdjj($insumos_nacionales);
        
        $insumos_importados->setId_DDJJ($_REQUEST["id_declaracion_jurada"]);
        $insumos_importados = $sqlInsumosImportados->getBuscarInsumosPorDdjj($insumos_importados);

        $comercializador->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $comercializador = $sqlComercializador->getBuscarComercializadorPorDdjj($comercializador);

        $unidad_medida->setId_Unidad_Medida($declaracion_jurada->getId_Unidad_Medida());
        $unidad_medida = $sqlUnidadMedida->getBuscarDescripcionPorId($unidad_medida);

        //Asignar Valores para el tpl
        $vista->assign('detalle_arancel', $detalle_arancel);
        $vista->assign('unidad_medida', $unidad_medida);
        
        //Verificar si existen las tablas
        if ($insumos_nacionales != NULL){
            //echo "Hay insumos Nacionales<br>";
            $vista->assign('insnac', 1);
            $vista->assign('insumosnacionales', $insumos_nacionales);
        }else{
            $vista->assign('insnac', 0);
        }
        
        if ($insumos_importados != NULL){
            //echo "Hay insumos Importados<br>";
            $vista->assign('insimp', 1);
            $vista->assign('insumosimportados', $insumos_importados);
        }else{
            $vista->assign('insimp', 0);
        }
        
        if ($comercializador != NULL){
            //echo "Hay Comercializadores<br>";
            $vista->assign('comerc', 1);
            $vista->assign('comercializador', $comercializador);
        }else{
            $vista->assign('comerc', 0);
        }

        $ddjj_acuerdo->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $ddjj_acuerdo=$sqlDdjjAcuerdo->getListarAcuerdosPorDdjj($ddjj_acuerdo);
        
        $fob = 0; $exwork=0;
        foreach ($ddjj_acuerdo as $ac){
            if ($ac->acuerdo->getId_tipo_valor_internacional()==1){
                $fob = $ac->getValor_Mercancia();
            }else{
                $exwork = $ac->getValor_Mercancia();
            }
            unset($detalle_arancel);
            $detalle_arancel = new DetalleArancel();
            
            if ($ac->getId_acuerdo()==2){
                if($ac->getSubpartida()==0){
                    $naladisa93 = 'Sin Naladisa 93';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladisa93 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladisa93', $naladisa93);
            }
            if ($ac->getId_acuerdo()==3){
                if($ac->getSubpartida()==0){
                    $naladisa96 = 'Sin Naladisa 96';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladisa96 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladisa96', $naladisa96);
            }
            if(($ac->getId_acuerdo()==4)||($ac->getId_acuerdo()==19)){
                if($ac->getSubpartida()==0){
                    $naladisa2007 = 'Sin Naladisa 2007';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladisa2007 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladisa2007', $naladisa2007);
            }
            if ($ac->getId_acuerdo()==7){
                if($ac->getSubpartida()==0){
                    $naladisa91 = 'Sin Naladisa 91';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladisa91 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladisa91', $naladisa91);
            }
            if ($ac->getId_acuerdo()==6){
                if($ac->getSubpartida()==0){
                    $naladi83 = 'Sin Naladi 83';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladi83 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladi83', $naladi83);
            }
        }
        $vista->assign('acuerdos', $ddjj_acuerdo);
        $vista->assign('fob', $fob);
        $vista->assign('exwork', $exwork);
        $vista->assign('ddjj', $declaracion_jurada);
        
        //Preguntamos si es con asesoramiento o es normal
        if($declaracion_jurada->getId_estado_ddjj()==4){
            $asesoramiento->setId_Servicio_Exportador($declaracion_jurada->getId_Servicio_Exportador());
            $asesoramiento=$sqlAsesoramiento->getBuscarAsesoramientoPorServicioExportador($asesoramiento);
            
            $asesoramiento_historico->setId_Asesoramiento($asesoramiento->getId_Asesoramiento());
            $asesoramiento_historico=$sqlAsesoramientoHistorico->getBuscarPorIdAsesoramiento($asesoramiento_historico);
            
            $vista->assign('asesoramiento', $asesoramiento);
            $vista->assign('historico_asesoramiento', $asesoramiento_historico);
        }
        
        $vista->display("declaracionJurada/MostrarDdjjParaAprobacion.tpl");
        exit;
    }
    
    if($_REQUEST['tarea']=='aprobarDdjj')
    {
        $declaracion_jurada->setId_ddjj($_REQUEST["id_ddjj"]);
        $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
        $correlativo_ddjj = $sqlDeclaracionJurada->getDesignarCorrelativoDDJJ($declaracion_jurada);
        $declaracion_jurada->setId_estado_ddjj(1);
        $declaracion_jurada->setCorrelativo_ddjj($correlativo_ddjj[0]['max']+1);
        
        if($sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada)){
            echo "Aprobado";
        }else{
            echo "No se actualizo";
        }
        
        exit;
    }

    if($_REQUEST['tarea']=='rechazarDdjj')
    {
        $hoy=date("Y-m-d H:i:s");
        $declaracion_jurada->setId_ddjj($_REQUEST["id_ddjj"]);
        $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
        if($_REQUEST["devolver"]==1){
            $declaracion_jurada->setId_estado_ddjj(7);
            $declaracion_jurada->setRevisado('TRUE');
            //Guardar las observaciones para que corrija
            $observaciones_ddjj->setObservaciones_generales($_REQUEST["observacion_general"]);
            $observaciones_ddjj->setFecha_observacion($hoy);
            $observaciones_ddjj->setId_tipo_usuario($_SESSION["tipo_usuario"]);
            $observaciones_ddjj->setId_ddjj($_REQUEST["id_ddjj"]);
            if($sqlObservacionesDdjj->setGuardarObservacionesDdjj($observaciones_ddjj)){
                echo "Guarda Observacion";
            }else{
                echo "No guarda observacion";
            }
        }else{
            $declaracion_jurada->setId_estado_ddjj(5);
        }
        
        //$declaracion_jurada->setObservacion_general($_REQUEST["observacion_general"]);
        //Envío de Correos
        $correos=AdmCorreo::obtenerCorreosEmpresa($declaracion_jurada->getId_Empresa());
        $correos=explode(',',$correos);
        if(trim($correos[0])==trim($correos[1]))
        {
            AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->getRazon_social(),'','','',33);
        }
        else
        {
            AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->getRazon_social(),'','','',33);
            AdmCorreo::enviarCorreo($correos[1],$declaracion_jurada->empresa->getRazon_social(),'','','',33);
        }
        
        if($sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada)){
            echo "Devuelto o Rechazado";
        }else{
            echo "No se actualizo";
        }
        
        //Actualizar el estado del Servicio Exportador a TRUE
        $servicio_exportador->setId_servicio_exportador($declaracion_jurada->getId_Servicio_Exportador());
        $servicio_exportador=$sqlServicioExportador->getBuscarServicioExportadorPorId($servicio_exportador);
        $servicio_exportador->setEstado(TRUE);
        $sqlServicioExportador->setGuardarServicioExportador($servicio_exportador);
        //Actualizar el Sistema de Colas para eliminar el registro que ya esta revisado
        $sistema_colas->setId_Servicio_Exportador($declaracion_jurada->getId_Servicio_Exportador());
        $sistema_colas=$sqlSistemaColas->getBuscarColaPorServicioExportador($sistema_colas);
        if($_REQUEST["devolver"]==1){
            $sistema_colas->setAtendido(1);
        }else{
            $sistema_colas->setAtendido(2);
        }
        $sqlSistemaColas->setGuardarSistemaColas($sistema_colas);
        exit;
    }

    //Vistas a los TPLs para el Exportador
    if($_REQUEST['tarea']=='altadeclaracionjurada')
    {
        $unidad_medida=$sqlUnidadMedida->getListarUnidadMedida($unidad_medida);
        $pais=$sqlPais->getListarPais($pais);
        $acuerdo=$sqlAcuerdo->getListarAcuerdo($acuerdo);
        
        $vista->assign('unidadmedida', $unidad_medida);
        $vista->assign('pais', $pais);
        $vista->assign('acuerdo', $acuerdo);
        $vista->display("declaracionJurada/AltaDeclaracionJurada.tpl");
        exit;
    }
/*
    if($_REQUEST['tarea']=='declaracionesJuradasPasadas')
    {
        $vista->display("declaracionJurada/DeclaracionesJuradasPasadas.tpl");
        exit;
    }

    if($_REQUEST['tarea']=='declaracionesJuradasEnviadas')
    {
        $vista->display("declaracionJurada/DeclaracionesJuradasEnviadas.tpl");
        exit;
    }

    if($_REQUEST['tarea']=='declaracionesJuradasRechazadas')
    {
        $vista->display("declaracionJurada/DeclaracionesJuradasRechazadas.tpl");
        exit;
    }

    if($_REQUEST['tarea']=='declaracionesJuradasEnRevision')
    {
        $vista->display("declaracionJurada/DeclaracionesJuradasEnRevision.tpl");
        exit;
    }
    
    if($_REQUEST['tarea']=='declaracionesJuradasConAsesoramiento')
    {
        $vista->display("declaracionJurada/DeclaracionesJuradasConAsesoramiento.tpl");
        exit;
    }
    
    if($_REQUEST['tarea']=='declaracionesJuradasParaAprobar')
    {
        $vista->display("declaracionJurada/declaracionesJuradasParaAprobar.tpl");
        exit;
    }
 */
    /********** CONTROLADORES PARA EL CERTIFICADOR ***********/
    if($_REQUEST['tarea']=='listarRevisionDeclaracionJurada')
    {
        $vista->display("declaracionJurada/ListarRevisionDeclaracionJurada.tpl");
        exit;
    }

    if($_REQUEST['tarea']=='listarRevisionDeclaraciones')
    {
        $certif = $_SESSION["id_persona"];
        //Listar las DDJJ por persona a revisar
        $resultado = $sqlDeclaracionJurada->getListarDeclaracionesParaRevisar($declaracion_jurada,$certif);
        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        
        $longitud = sizeof($resultado);

        for($i=0; $i<$longitud; $i++){
            $strJson .= '{"id_ddjj":"' . $resultado[$i]["id_ddjj"] .
                    '","descripcion_comercial":"' . $resultado[$i]["descripcion_comercial"] .
                    '","detalle_arancel":"' . $resultado[$i]["arancel"] .
                    '","caracteristicas":"' . $resultado[$i]["caracteristicas"] .
                    '","fecha_registro":"' . substr($resultado[$i]["fecha_registro"], 0, 11) .
                    '","estadoddjj":"' . $resultado[$i]["estadoddjj"] . '"},';

            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    //Revisar la DDJJ enviada con todos los datos
    if($_REQUEST['tarea']=='revisarDeclaracionJurada')
    {
        $declaracion_jurada->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
        
        //Sacar el detalle de la clasificación arancelaria
        $detalle_arancel->setId_detalle_arancel($declaracion_jurada->getId_Detalle_Arancel());
        $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
        
        $insumos_nacionales->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $insumos_nacionales = $sqlInsumosNacionales->getBuscarInsumosPorDdjj($insumos_nacionales);
        
        $insumos_importados->setId_DDJJ($_REQUEST["id_declaracion_jurada"]);
        $insumos_importados = $sqlInsumosImportados->getBuscarInsumosPorDdjj($insumos_importados);
        
        $comercializador->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $comercializador = $sqlComercializador->getBuscarComercializadorPorDdjj($comercializador);

        $unidad_medida->setId_Unidad_Medida($declaracion_jurada->getId_Unidad_Medida());
        $unidad_medida = $sqlUnidadMedida->getBuscarDescripcionPorId($unidad_medida);

        
        //Asignar Valores para el tpl
        $vista->assign('detalle_arancel', $detalle_arancel);
        $vista->assign('unidad_medida', $unidad_medida);
        
        //Verificar si existen las tablas
        if ($insumos_nacionales != NULL){
            //echo "Hay insumos Nacionales<br>";
            $vista->assign('insnac', 1);
            $vista->assign('insumosnacionales', $insumos_nacionales);
        }else{
            $vista->assign('insnac', 0);
        }
        
        if ($insumos_importados != NULL){
            //echo "Hay insumos Importados<br>";
            $vista->assign('insimp', 1);
            $vista->assign('insumosimportados', $insumos_importados);
        }else{
            $vista->assign('insimp', 0);
        }
        
        if ($comercializador != NULL){
            //echo "Hay Comercializadores<br>";
            $vista->assign('comerc', 1);
            $vista->assign('comercializador', $comercializador);
        }else{
            $vista->assign('comerc', 0);
        }

        $ddjj_acuerdo->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $ddjj_acuerdo=$sqlDdjjAcuerdo->getListarAcuerdosPorDdjj($ddjj_acuerdo);
        
        $fob = 0; $exwork=0;
        foreach ($ddjj_acuerdo as $ac){
            if ($ac->acuerdo->getId_tipo_valor_internacional()==1){
                $fob = $ac->getValor_Mercancia();
            }else{
                $exwork = $ac->getValor_Mercancia();
            }
            unset($detalle_arancel);
            $detalle_arancel = new DetalleArancel();
            
            if ($ac->getId_acuerdo()==2){
                if($ac->getSubpartida()==0){
                    $naladisa93 = 'Sin Naladisa 93';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladisa93 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladisa93', $naladisa93);
            }
            if ($ac->getId_acuerdo()==3){
                if($ac->getSubpartida()==0){
                    $naladisa96 = 'Sin Naladisa 96';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladisa96 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladisa96', $naladisa96);
            }
            if(($ac->getId_acuerdo()==4)||($ac->getId_acuerdo()==19)){
                if($ac->getSubpartida()==0){
                    $naladisa2007 = 'Sin Naladisa 2007';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladisa2007 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladisa2007', $naladisa2007);
            }
            if ($ac->getId_acuerdo()==7){
                if($ac->getSubpartida()==0){
                    $naladisa91 = 'Sin Naladisa 91';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladisa91 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladisa91', $naladisa91);
            }
            if ($ac->getId_acuerdo()==6){
                if($ac->getSubpartida()==0){
                    $naladi83 = 'Sin Naladi 83';
                }else{
                    $detalle_arancel->setId_detalle_arancel($ac->getSubpartida());
                    $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                    $naladi83 = $detalle_arancel->getCodigo()." - ".$detalle_arancel->getDescripcion();
                }
                $vista->assign('naladi83', $naladi83);
            }
        }
        $vista->assign('acuerdos', $ddjj_acuerdo);
        $vista->assign('fob', $fob);
        $vista->assign('exwork', $exwork);
        $vista->assign('ddjj', $declaracion_jurada);
        
        //Historial de Correcciones
        if($declaracion_jurada->getRevisado()=='TRUE'){
            $observaciones_ddjj->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
            $observaciones_ddjj = $sqlObservacionesDdjj->getListarObservacionesDdjj($observaciones_ddjj);
            $vista->assign('observaciones_ddjj', $observaciones_ddjj);
        }
        
        //Preguntamos si es con asesoramiento o es normal
        if($declaracion_jurada->getId_estado_ddjj()==4){
            $asesoramiento->setId_Servicio_Exportador($declaracion_jurada->getId_Servicio_Exportador());
            $asesoramiento=$sqlAsesoramiento->getBuscarAsesoramientoPorServicioExportador($asesoramiento);
            
            $asesoramiento_historico->setId_Asesoramiento($asesoramiento->getId_Asesoramiento());
            $asesoramiento_historico=$sqlAsesoramientoHistorico->getBuscarPorIdAsesoramiento($asesoramiento_historico);
            
            $vista->assign('asesoramiento', $asesoramiento);
            $vista->assign('historico_asesoramiento', $asesoramiento_historico);
            $vista->display("declaracionJurada/RevisarDdjjConAsesoramiento.tpl");
        }
        // En caso de que sea una DDJJ enviada directamente
        else{
            $vista->display("declaracionJurada/RevisarDdjj.tpl");
        }
        exit;
    }

    //Revisar la DDJJ enviada con todos los datos
    if($_REQUEST['tarea']=='aceptarDeclaracionJurada')
    {
        $declaracion_jurada->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
        
        $ddjj_acuerdo->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $ddjj_acuerdo=$sqlDdjjAcuerdo->getListarAcuerdosPorDdjj($ddjj_acuerdo);
        
        //Variable para saber si hay por lo menos un acuerdo aprobado en la ddjj
        $acuerdo_aprobado = 0;
        
        //Hacer un recorrido de los acuerdos
        foreach ($ddjj_acuerdo as $ac){
            $hoy = date('Y-m-d H:i:s');
            $var = $ac->getId_Acuerdo();
            
            //Variables auxiliares para beneficio,cumple y observaciones
            $ben = "beneficio_".$var;
            $cum = "cumple_".$var;
            $obs = "observ_".$var;
            $criterio = $this->colocarCriterioOrigen($var);
            
            $ac->setBeneficio($_REQUEST[$ben]);
            $ac->setCumple($_REQUEST[$cum]);
            $ac->setObservaciones($_REQUEST[$obs]);
            $ac->setId_Criterio_Origen($criterio);
            $ac->setFecha_Revision($hoy);
            
            if(($_REQUEST[$ben]==1)AND($_REQUEST[$cum]==1)){
                $ac->setId_estado_ddjj(1);
                $ac->setFecha_aprobacion($hoy);
                
                //Calcular la vigencia del Acuerdo
                $fecha= new DateTime($hoy);
                $aumentar_dias = 'P'.$ac->getVigencia().'D';
                $fecha->add(new DateInterval($aumentar_dias));
                $ac->setFecha_fin($fecha->format('Y-m-d'));
                //Cambiar el valor de variable de acuerdos para la ddjj general
                $acuerdo_aprobado = 1;
            }else{
                $ac->setId_estado_ddjj(5);
            }
            if ($sqlDdjjAcuerdo->setGuardarDdjjAcuerdo($ac)){
                echo "Guardó";
            }else{
                echo "No guardó ";
            }         
        }
        //Actualizar el estado del Servicio Exportador a TRUE
        $servicio_exportador->setId_servicio_exportador($declaracion_jurada->getId_Servicio_Exportador());
        $servicio_exportador=$sqlServicioExportador->getBuscarServicioExportadorPorId($servicio_exportador);
        $servicio_exportador->setEstado(TRUE);
        $sqlServicioExportador->setGuardarServicioExportador($servicio_exportador);
        //Actualizar el Sistema de Colas para eliminar el registro que ya esta revisado
        $sistema_colas->setId_Servicio_Exportador($declaracion_jurada->getId_Servicio_Exportador());
        $sistema_colas=$sqlSistemaColas->getBuscarColaPorServicioExportador($sistema_colas);
        $sistema_colas->setAtendido(1);
        $sqlSistemaColas->setGuardarSistemaColas($sistema_colas);
        
        if($acuerdo_aprobado==1){
            $declaracion_jurada->setId_estado_ddjj(6);
        }else{
            $declaracion_jurada->setId_estado_ddjj(5);
        }
        $declaracion_jurada->setFecha_Revision($hoy);
        
        //Envío de Correos
        $correos=AdmCorreo::obtenerCorreosEmpresa($declaracion_jurada->getId_Empresa());
        $correos=explode(',',$correos);
        if(trim($correos[0])==trim($correos[1]))
        {
            AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->getRazon_social(),'','','',33);
        }
        else
        {
            AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->getRazon_social(),'','','',33);
            AdmCorreo::enviarCorreo($correos[1],$declaracion_jurada->empresa->getRazon_social(),'','','',33);
        }
        
        //Guardar la DDJJ con las actualizaciones
        $sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada);

        exit;
    }

    if($_REQUEST['tarea']=='enviarRespuestaAsesoramiento')
    {
        $hoy = date('Y-m-d H:i:s');
        $declaracion_jurada->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
        
        $asesoramiento->setId_Servicio_Exportador($declaracion_jurada->getId_Servicio_Exportador());
        $asesoramiento=$sqlAsesoramiento->getBuscarAsesoramientoPorServicioExportador($asesoramiento);
        
        $asesoramiento_historico->setId_Asesoramiento($asesoramiento->getId_Asesoramiento());
        $asesoramiento_historico=$sqlAsesoramientoHistorico->getBuscarUltimoPorIdAsesoramientoParaRespuesta($asesoramiento_historico);
        
        $asesoramiento_historico->setRespuesta_Asistente($_REQUEST["observ"]);
        $asesoramiento_historico->setFecha_Respuesta($hoy);
        $asesoramiento_historico->setEstado(TRUE);

        $sqlAsesoramientoHistorico->setGuardarAsesoramientoHistorico($asesoramiento_historico);

        exit;
    }

    if($_REQUEST['tarea']=='enviarPreguntaAsesoramiento')
    {
        $hoy = date('Y-m-d H:i:s');
        $declaracion_jurada->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
        
        $asesoramiento->setId_Servicio_Exportador($declaracion_jurada->getId_Servicio_Exportador());
        $asesoramiento=$sqlAsesoramiento->getBuscarAsesoramientoPorServicioExportador($asesoramiento);

        $asesoramiento_historico->setId_Asesoramiento($asesoramiento->getId_Asesoramiento());
        $asesoramiento_historico->setObservaciones_Exportador($_REQUEST["masobservaciones"]);
        $asesoramiento_historico->setFecha_Observacion($hoy);
        $asesoramiento_historico->setEstado(FALSE);

        $sqlAsesoramientoHistorico->setGuardarAsesoramientoHistorico($asesoramiento_historico);

        exit;
    }
    
    if($_REQUEST['tarea']=='listarDeclaracionesVigentesConCriterioOrigen'){
        $ddjj_acuerdo->setId_Acuerdo($_REQUEST["id_acuerdo"]);
        $ddjj_acuerdo->setId_estado_ddjj(1);
        
        $resultado = $sqlDdjjAcuerdo->getListarDDJJAcuerdoVigentesConDatosDDJJ($ddjj_acuerdo);
        $selected = ',"selected":true';
        
        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
            $detalle_arancel->setId_detalle_arancel($datos->declaracion_jurada->getId_detalle_arancel());
            $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
            
            $strJson .= '{"id_ddjj_acuerdo":"' . $datos->getId_ddjj_acuerdo() .
                    '","id_ddjj":"' . $datos->getId_ddjj() .
                    '","descripcion_comercial":"' . $datos->declaracion_jurada->getDescripcion_comercial() .
                    '","clasificacion_arancelaria":"' . $detalle_arancel->getCodigo() .
                    '","criterio_origen":"' . $datos->criterio_origen->getDescripcion() .
                    '","fecha_inicio":"' .$datos->getFecha_aprobacion() .
                    '","fecha_fin":"' . $datos->getFecha_fin() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    $vista->display("declaracionJurada/DeclaracionesJuradas.tpl");
  }

  //****** FUNCIONES PARA LAS DDJJ **********************//
  public static function guardarInsumosNacionales($nacionales,$id_ddjj){
    $insumos_nacionales = new InsumosNacionales();
    $sqlInsumosNacionales = new SQLInsumosNacionales();
    
    $filas_nac = explode(",", $nacionales);

    foreach ($filas_nac as $filas) {
        $valor_nac = explode(";", $filas);
        
        unset($insumos_nacionales);
        $insumos_nacionales = new InsumosNacionales();
        
        $insumos_nacionales->setId_ddjj($id_ddjj);
        $insumos_nacionales->setDescripcion($valor_nac[0]);
        $insumos_nacionales->setNombre_Fabricante($valor_nac[1]);
        $insumos_nacionales->setTelefono_Fabricante($valor_nac[2]);
        $insumos_nacionales->setValor($valor_nac[3]);
        $sqlInsumosNacionales->setGuardarInsumosNacionales($insumos_nacionales);
    }
  }
  
  public static function guardarInsumosImportados($importados,$id_ddjj){
    $insumos_importados = new InsumosImportados();
    $sqlInsumosImportados = new SQLInsumosImportados();
    $pais = new Pais();
    $sqlPais = new SQLPais();
    $unidad_medida = new UnidadMedida();
    $sqlUnidadMedida = new SQLUnidadMedida();
    $acuerdo = new Acuerdo();
    $sqlAcuerdo = new SQLAcuerdo();
    
    $filas_imp = explode(",", $importados);

    foreach ($filas_imp as $filas) {
        $valor_imp = explode(";", $filas);
        
        unset($insumos_importados);
        unset($pais);
        unset($acuerdo);
        $insumos_importados = new InsumosImportados();
        $pais = new Pais();
        $acuerdo = new Acuerdo();
        
        $insumos_importados->setId_DDJJ($id_ddjj);
        $insumos_importados->setDescripcion($valor_imp[0]);
        $insumos_importados->setId_Detalle_Arancel($valor_imp[1]);
        
        $pais->setNombre($valor_imp[2]);
        $pa = $sqlPais->getBuscarIdPorNombrePais($pais);
        $insumos_importados->setId_Pais($pa->getId_pais());
        
        $insumos_importados->setRazon_Social_Productor($valor_imp[3]);
        
        if($valor_imp[4]=="SI"){
            $insumos_importados->setTiene_Certificado_Origen(TRUE);
        }
        else {
            $insumos_importados->setTiene_Certificado_Origen(FALSE);
        }
        
        $acuerdo->setDescripcion($valor_imp[5]);
        $ac = $sqlAcuerdo->getBuscarIdporNombreAcuerdo($acuerdo);
        $insumos_importados->setId_Acuerdo($ac->getId_Acuerdo());
        
        $insumos_importados->setCantidad($valor_imp[6]);
        
        $unidad_medida->setDescripcion($valor_imp[7]);
        $um = $sqlUnidadMedida->getBuscarIdPorDescripcion($unidad_medida);
        $insumos_importados->setId_unidad_medida($um->getId_Unidad_Medida());

        $insumos_importados->setValor($valor_imp[8]);
        $sqlInsumosImportados->setGuardarInsumosImportados($insumos_importados);
    } 
  }
  
  public static function guardarComercializadores($comerc,$id_ddjj){
    $comercializador = new Comercializador();
    $sqlComercializador = new SQLComercializador();
    $unidad_medida = new UnidadMedida();
    $sqlUnidadMedida = new SQLUnidadMedida();
    
    $filas_com = explode(",", $comerc);

    foreach ($filas_com as $filas) {
        $valor_com = explode(";", $filas);
        
        unset($comercializador);
        unset($unidad_medida);
        $comercializador = new Comercializador();
        $unidad_medida = new UnidadMedida();
        
        $comercializador->setId_ddjj($id_ddjj);
        $comercializador->setRazon_social($valor_com[0]);
        $comercializador->setCi_nit($valor_com[1]);
        $comercializador->setDomicilio_legal($valor_com[2]);
        $comercializador->setRepresentante_legal($valor_com[3]);
        $comercializador->setDireccion_fabrica($valor_com[4]);
        $comercializador->setTelefono($valor_com[5]);
        $comercializador->setPrecio_venta($valor_com[6]);
        
        $unidad_medida->setDescripcion($valor_com[7]);
        $um = $sqlUnidadMedida->getBuscarIdPorDescripcion($unidad_medida);
        $comercializador->setId_unidad_medida($um->getId_Unidad_Medida());
        
        $comercializador->setProduccion_mensual($valor_com[8]);
        
        $sqlComercializador->setGuardarComercializador($comercializador);
    } 
  }
  
  public static function listaElaboracionIncentivo($lista_elaboracion){
    $cadena='';
    if(in_array('ninguno',$lista_elaboracion)){
        $cadena=$cadena.'0;';
    }
    if(in_array('zonafranca',$lista_elaboracion)){
        $cadena=$cadena.'1;';
    }
    if(in_array('cedeims',$lista_elaboracion)){
        $cadena=$cadena.'2;';
    }
    if(in_array('ritex',$lista_elaboracion)){
        $cadena=$cadena.'3;';
    }
    if(in_array('otros',$lista_elaboracion)){
        $otro = $_REQUEST["elaboracion_detalle"];
        $cadena=$cadena.'4;'.$otro.';';
    }
    $cadena = substr($cadena, 0, strlen($cadena) - 1);
    return $cadena;
  }
  
  public static function colocarCriterioOrigen($var){
    $criterio='';
    if($var==1){
        $criterio=$_REQUEST["co_can"];
        echo "Criterio de co_can";
    }
    if($var==2){
        $criterio=$_REQUEST["co_mercosur"];
        echo "Criterio de co_mercosur";
    }
    if($var==3){
        $criterio=$_REQUEST["co_ace22"];
        echo "Criterio de CAN";
    }
    if($var==4){
        $criterio=$_REQUEST["co_ace47"];
        echo "Criterio de co_ace47";
    }
    if($var==5){
        $criterio=$_REQUEST["co_venezuela"];
        echo "Criterio de co_venezuela";
    }
    if($var==6){
        $criterio=$_REQUEST["co_arpar4"];
        echo "Criterio de co_arpar4";
    }
    if($var==7){
        $criterio=$_REQUEST["co_aapag"];
        echo "Criterio de co_aapag";
    }
    if($var==8){
        $criterio=$_REQUEST["co_sgpcanada"];
        echo "Criterio de co_sgpcanada";
    }
    if($var==9){
        $criterio=$_REQUEST["co_sgpsuiza"];
        echo "Criterio de co_sgpsuiza";
    }
    if($var==10){
        $criterio=$_REQUEST["co_sgpnoruega"];
        echo "Criterio de co_sgpnoruega";
    }
    if($var==11){
        $criterio=$_REQUEST["co_sgpjapon"];
        echo "Criterio de co_sgpjapon";
    }
    if($var==12){
        $criterio=$_REQUEST["co_sgpzelanda"];
        echo "Criterio de co_sgpzelanda";
    }
    if($var==13){
        $criterio=$_REQUEST["co_sgprusia"];
        echo "Criterio de co_sgprusia";
    }
    if($var==14){
        $criterio=$_REQUEST["co_sgpturquia"];
        echo "Criterio de co_sgpturquia";
    }
    if($var==15){
        $criterio=$_REQUEST["co_sgpbielorrusia"];
        echo "Criterio de co_sgpbielorrusia";
    }
    if($var==16){
        $criterio=$_REQUEST["co_sgpue"];
        echo "Criterio de co_sgpue";
    }
    if($var==17){
        $criterio=$_REQUEST["co_sgpeeuu"];
        echo "Criterio de co_sgpeeuu";
    }
    if($var==18){
        $criterio=$_REQUEST["co_sgptp"];
        echo "Criterio de co_sgptp";
    }
    if($var==19){
        $criterio=$_REQUEST["co_arampanama"];
        echo "Criterio de co_arampanama";
    }
    return $criterio;
  }
}

