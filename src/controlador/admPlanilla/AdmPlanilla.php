<?php

defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_LIB . DS . 'PHPExcel' . DS . 'IOFactory.php');
include_once(PATH_LIB . DS . 'PHPExcel' . DS . 'PHPExcel.php');
include_once(PATH_LIB . DS . 'PHPExcel' . DS . 'Writer'. DS . 'Excel2007.php');

include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');

include_once(PATH_MODELO . DS . 'SQLTipoCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaEstado.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaTipoEmision.php');
include_once(PATH_MODELO . DS . 'SQLCriterioOrigen_pln.php');
include_once(PATH_MODELO . DS . 'SQLArancel_pln.php');
include_once(PATH_MODELO . DS . 'SQLDetalleArancel.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaTipoAnulacionCO.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaAnulacionCO.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaCO.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaCOReemplazos.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaCO_DDJJ.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaDDJJ.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaDDJJAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaCorrelativo.php');
include_once(PATH_MODELO . DS . 'SQLAcuerdo_pln.php');
include_once(PATH_MODELO . DS . 'SQLRegional.php');
include_once(PATH_MODELO . DS . 'SQLServicio.php');
include_once(PATH_MODELO . DS . 'SQLUnidadMedida.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaTipoDDJJ.php');

include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManual.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManualCorrelativo.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManualEstado.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManualDetalle.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManualDetalleServicio.php');

include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'PlanillaEstado.php');
include_once(PATH_TABLA . DS . 'PlanillaTipoEmision.php');
include_once(PATH_TABLA . DS . 'CriterioOrigen_pln.php');
include_once(PATH_TABLA . DS . 'Arancel_pln.php');
include_once(PATH_TABLA . DS . 'DetalleArancel.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'PlanillaAnulacionCO.php');
include_once(PATH_TABLA . DS . 'PlanillaTipoAnulacionCO.php');
include_once(PATH_TABLA . DS . 'PlanillaCO.php');
include_once(PATH_TABLA . DS . 'PlanillaCOReemplazos.php');
include_once(PATH_TABLA . DS . 'PlanillaCO_DDJJ.php');
include_once(PATH_TABLA . DS . 'PlanillaDDJJ.php');
include_once(PATH_TABLA . DS . 'PlanillaDDJJAcuerdo.php');
include_once(PATH_TABLA . DS . 'PlanillaCorrelativo.php');
include_once(PATH_TABLA . DS . 'Acuerdo_pln.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'Servicio.php');
include_once(PATH_TABLA . DS . 'UnidadMedida.php');
include_once(PATH_TABLA . DS . 'PlanillaTipoDDJJ.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManual.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManualCorrelativo.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManualEstado.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManualDetalle.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManualDetalleServicio.php');

class AdmPlanilla extends Principal {
    public function AdmPlanilla() 
    {
        $vista = Principal::getVistaInstance();
        if($_REQUEST['tarea']=='show_planilla')
        {
            $vista->display("admPlanilla/planilla.tpl");
            exit();
        }
        if($_REQUEST['tarea']=='show_planilla_co')
        {
            $empresa_persona = new EmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $SQLEmpresa_persona = new SQLEmpresaPersona();
            $empresa_persona = $SQLEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
            $vista->assign("v1", $_REQUEST['v1']? $_REQUEST['v1']: 0);
            $vista->assign("v2", $_REQUEST['v2']? $_REQUEST['v2']: 0);
            $vista->assign("v3", $_REQUEST['v3']? $_REQUEST['v3']: 0);
            $vista->assign("v4", $_REQUEST['v4']? $_REQUEST['v4']: 0);
            $vista->assign("fmsucursal", $empresa_persona->getId_regional());
            $_REQUEST['v1'] = ""; $_REQUEST['v2'] = "";  $_REQUEST['v3'] = "";  $_REQUEST['v4'] = "";
            $vista->display("admPlanilla/planilla_co.tpl");
            exit();
        }
        if($_REQUEST['tarea']=='show_planilla_ddjj')  // cambiar
        {
            $empresa_persona = new EmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $SQLEmpresa_persona = new SQLEmpresaPersona();
            $empresa_persona = $SQLEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
            $vista->assign("fmsucursal", $empresa_persona->getId_regional());
            // $vista->display("admPlanilla/planilla_ddjj.tpl");
            $vista->display("admPlanilla/planilla_ddjj.tpl");
            exit();
        }
        if($_REQUEST['tarea']=='show_anulacion_co')
        {
            $empresa_persona = new EmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $SQLEmpresa_persona = new SQLEmpresaPersona();
            $empresa_persona = $SQLEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
            $vista->assign("fmsucursal", $empresa_persona->getId_regional());
            $vista->display("admPlanilla/planilla_anulacion_co.tpl");
            exit(); 
        }
       
        if($_REQUEST['tarea']=='listar_criterios'){
            $criterio = new CriterioOrigen_pln();
            $sqlCriterio = new SQLCriterioOrigen_pln();
            $id_acuerdo =$_REQUEST['filter']['filters'][0]['value']; // $_REQUEST(filter[filters][0][value])
            $criterio->setId_Acuerdo($id_acuerdo);
            $listar = $sqlCriterio->getListarCriterioPorAcuerdo($criterio);
            echo '[';
            $contador = 1;
            foreach ($listar as $value){
                $strJson.= '{"id":"'.$value->getId_criterio_origen() . 
                            '", "descripcion":"'.str_replace('"',"'",$value->getDescripcion()).'"},';
               
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='listar_tipo_co'){
            $servicio = new Servicio();
            $sqlServicio = new SQLServicio();
            $listar = $sqlServicio->getListaCertificados($servicio);
//            $servicio->getDescripcion()

//            $listar = $sqlTipoCO->getListarTipoCertificadoOrigen($tipoCO); 
            echo '[';
            foreach ($listar as $value){
                //if($value->getAbreviacion()!=""){
                 $strJson.= '{"id_tipo":"'.$value->getId_servicio() . 
                            '", "abreviacion":"'.$value->getAbreviacion() . 
                            '", "descripcion":"'.$value->getDescripcion().'"},';
                //}
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }

        if($_REQUEST['tarea']=='listar_tipo_co_ddjj'){
            $tipo_ddjj = new PlanillaTipoDDJJ();
            $sqlDdjj = new SQLPlanillaTipoDDJJ();
            $listar = $sqlDdjj->getListarTipoDDJJ($tipo_ddjj);

//            $listar = $sqlTipoCO->getListarTipoCertificadoOrigen($tipoCO); 
            echo '[';
            foreach ($listar as $value){
                if($value->getAbreviatura()!=""){
                 $strJson.= '{"id_tipo":"'.$value->getId_planilla_tipo_ddjj() . 
                            '", "abreviacion":"'.$value->getAbreviatura() . 
                            '", "descripcion":"'.$value->getDescripcion().'"},';
                }
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        
        if($_REQUEST['tarea']=='listar_tipo_anulacion_co'){
            $ptaco = new PlanillaTipoAnulacionCO();
            $sqlPtaco = new SQLPlanillaTipoAnulacionCO();
            $listar = $sqlPtaco->getListarPlanillaTipoAnulacionCO($ptaco);
            echo '[';
            foreach ($listar as $value){
                 $strJson.= '{"id":"'.$value->getId_planilla_tipo_anulacion_co() . 
                            '", "descripcion":"'.$value->getDescripcion().'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        
        if($_REQUEST['tarea']=='listar_ruexs'){
            $empresa = new Empresa();
            $empresa->setEstado(2);
            $sqlEmpresa = new SQLEmpresa();
            $listar = $sqlEmpresa->getListarEmpresasEstado($empresa);
            echo '[';
            //$strJson = '{"id_empresa":"-1", "descripcion":"NINGUNO"}';
            foreach ($listar as $value){
                 $strJson.= '{"id_tipo":"'.$value->getId_empresa() . 
                            '", "descripcion":"'.$value->getRuex().'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        
        if($_REQUEST['tarea']=='estado_planilla_co'){
            $planillaestado = new PlanillaEstado();
            $sqlPlanillaEstado = new SQLPlanillaEstado();
            $listar = $sqlPlanillaEstado->getListarEstado($planillaestado);
            echo '[';
            foreach ($listar as $value){
                if($value->getId_planilla_estado()!=0){
                    $strJson.= '{"id":"'.$value->getId_planilla_estado() . 
                            '", "descripcion":"'.$value->getDescripcion().'"},';
                }
            }
                        
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='tipo_emision'){
            $p_te = new PlanillaTipoEmision();
            $sql_p_te = new SQLPlanillaTipoEmision();
            $p_te->setId_planilla_tipo($_REQUEST["id_planilla_tipo"]);
            $listar = $sql_p_te->getListarTipoEmisionPorPlanillaTipo($p_te);
            echo '[';
           
            foreach ($listar as $value){
                 $strJson.= '{"id":"'.$value->getId_planilla_tipo_emision() . 
                            '", "descripcion":"'.$value->getDescripcion().'"},';
            }
                        
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        
        if($_REQUEST['tarea']=='list_tipo_arancel'){
            $arancel = new Arancel_pln();
            $sql_arancel = new SQLArancel_pln();

            $id_acuerdo = $_REQUEST['filter']['filters'][0]['value'];
            // $id_acuerdo = 2;
            $acuerdo = new Acuerdo_pln();
            $sqlAcuerdo = new SQLAcuerdo_pln();
            $acuerdo->setId_acuerdo($id_acuerdo);
            
            $listar1 = $sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
            $id_arancel= $listar1->getId_arancel();
            $arancel->setId_arancel($id_arancel);
            $listar = $sql_arancel->getBuscarArancelPorId($arancel);
            // var_dump($listar->getDenominacion());  die;
            echo '[';
            $strJson.= '{"id":"'.$listar->getId_arancel() . 
                            '", "descripcion":"'.$listar->getDenominacion().'"}.';
                        
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
        }
        
        if($_REQUEST['tarea']=='list_unidades_medidas'){
            $unidad_medida = new UnidadMedida();
            $sqlUnidad_medida = new SQLUnidadMedida();
            
            $listar = $sqlUnidad_medida->getListarUnidadMedida($unidad_medida);
            echo '[';
           
            foreach ($listar as $value){
                 $strJson.= '{"id":"'.$value->getId_Unidad_Medida() . 
                            '", "descripcion":"'.$value->getDescripcion().'"},';
            }
                        
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
        }
        
        if($_REQUEST['tarea']=='list_arancel'){
            $detallearancel = new DetalleArancel();
            $sql_detallearancel = new SQLDetalleArancel();
            
            $detallearancel->setId_Arancel($_REQUEST['arancel']);
            $detallearancel->setCodigo($_REQUEST['filter']['filters'][0]['value']);
//            print("<pre>".print_r($_REQUEST,true)."</pre>");

            if(strlen($_REQUEST['filter']['filters'][0]['value'])>=3)
                $listar = $sql_detallearancel->listArancel($detallearancel);
            
            echo '[';
            $contador = 0;
            $detallado = $_REQUEST['detallado'];
            //print('<pre>'.print_r($listar, true).'</pre>');
            foreach ($listar as $value){
                if($detallado=='1'){
                    $strJson.='{"id":"'.$value["id_detalle_arancel"]  . 
                            '", "descripcion":"'.$value["codigo"]." - ".str_replace('"',"''",$value["descripcion"]).'"},';
                }else{
                    $strJson.='{"id":"'.$value["id_detalle_arancel"]  . 
                            '", "descripcion":"'.$value["codigo"].'"},';
                }
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
        }
//change ed en funcio del tipo de planilla
        if($_REQUEST['tarea']=='list_acuerdo1'){
            $acuerdo = new Acuerdo_pln();
            $sqlAcuerdo = new SQLAcuerdo_pln();
            $tipo_planilla = $_REQUEST['tipo_planilla'];
            $acuerdo->setId_tipo_co($tipo_planilla);
            $listar = $sqlAcuerdo->getListarAcuerdoPorTipoDdjj($acuerdo);
            
            echo '[';
            $contador = 0;
            foreach ($listar as $value){
                 $strJson.='{"id":"'.$value->getId_Acuerdo()  . 
                            '", "descripcion":"'.$value->getSigla() . '"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
        }
//change ed
        if($_REQUEST['tarea']=='list_acuerdo2'){
            $acuerdo = new Acuerdo_pln();
            $sqlAcuerdo = new SQLAcuerdo_pln();
            $tipo_planilla = $_REQUEST['filter']['filters'][0]['value'];
            $acuerdo->setId_tipo_co($tipo_planilla);
            $listar = $sqlAcuerdo->getListarAcuerdoPorTipo($acuerdo);
            
            echo '[';
            $contador = 0;
            foreach ($listar as $value){
                     $strJson.='{"id":"'.$value->getId_Acuerdo()  . 
                            '", "descripcion":"'.$value->getSigla() . '"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
        }

//listado para ddjj
        if($_REQUEST['tarea']=='list_acuerdo3'){
            $acuerdo = new Acuerdo_pln();
            $sqlAcuerdo = new SQLAcuerdo_pln();
            $tipo_planilla = $_REQUEST['filter']['filters'][0]['value'];
            $acuerdo->setId_tipo_co($tipo_planilla);
            $listar = $sqlAcuerdo->getListarAcuerdoPorTipoDdjj($acuerdo);
            
            echo '[';
            $contador = 0;
            foreach ($listar as $value){
                 $strJson.='{"id":"'.$value->getId_Acuerdo()  . 
                            '", "descripcion":"'.$value->getSigla() . '"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
        }
//change ed        
        if($_REQUEST['tarea']=='list_acuerdo'){
            $acuerdo = new Acuerdo_pln();
            $sqlAcuerdo = new SQLAcuerdo_pln();
            $listar = $sqlAcuerdo->getListarAcuerdo($acuerdo);
            
            echo '[';
            $contador = 0;
            foreach ($listar as $value){
                 $strJson.='{"id":"'.$value->getId_Acuerdo()  . 
                            '", "descripcion":"'.$value->getSigla() . '"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
        }
        
        if($_REQUEST['tarea']=='list_regionales'){
            $regional = new Regional();
            $sqlRegional = new SQLRegional();
            $listar = $sqlRegional->getListarRegionales($regional, true);
            
            echo '[';
            $contador = 0;
            foreach ($listar as $value){
                 $strJson.='{"id":"'.$value->getId_regional()  . 
                            '", "descripcion":"'.$value->getCiudad() . '"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
        }
        
        if($_REQUEST['tarea']=='paisDestino'){
            $pais = new Pais();
            $sql_pais= new SQLPais();
            
            $listar = $sql_pais->getListarPais($pais);
            
            echo '[';
            foreach ($listar as $value){
                 $strJson.='{"id":"'.$value->getId_pais() . 
                            '", "descripcion":"'.$value->getNombre().'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
        }
        
        if($_REQUEST['tarea']=='razon_empresa'){
            $empresa = new Empresa();
            $sqlEmpresa = new SQLEmpresa();
            $empresa->setId_empresa($_REQUEST['ruex']);
            $empresa = $sqlEmpresa->getEmpresaPorID($empresa);
            echo $empresa->getRazon_Social();
            exit;
        }

        if($_REQUEST['tarea']=='listar_ddjj'){
            $planillaDDJJ = new PlanillaDDJJ();
            $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
            
            $planillaDDJJ->setId_empresa($_REQUEST['id_empresa']);
            $planillaDDJJ->setId_tipo_planilla($_REQUEST['id_tipo_co']);
            $planillaDDJJ->setId_estado($_REQUEST['id_estado']);
            $planillaDDJJ->setFecha_vencimiento(date("Y-m-d"));
            $listar = $SQLplanillaDDJJ->getListarPlanillaDDJJEmpresaEstadoValida($planillaDDJJ);
           // print("<pre>".print_r($listar,true)."</pre>");  die;
            echo '[';
            foreach ($listar as $value){
                $s = new Servicio();
                $sqlS = new SQLServicio();
                $s->setId_servicio($value['id_tipo_planilla']);
                $s = $sqlS->getBuscarServicioPorId($s);
                $strJson.='{"id":"'.$value['id_planilla_ddjj'] . 
                            '", "descripcion":"'.$value['numero_ddjj'].' - '.($s->getAbreviacion()==''? 'SGT':$s->getAbreviacion()).'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='listar_ddjj_baja'){
            $planillaDDJJ = new PlanillaDDJJ();
            $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
            
            $planillaDDJJ->setId_empresa($_REQUEST['id_empresa']);
            $planillaDDJJ->setId_tipo_planilla($_REQUEST['id_tipo_co']);
            $planillaDDJJ->setId_estado($_REQUEST['id_estado']);
            //print_r($planillaDDJJ);
            //$planillaDDJJ->setFecha_vencimiento(date("Y-m-d"));
            $listar = $SQLplanillaDDJJ->getListarPlanillaDDJJEmpresaEstadoValida_baja($planillaDDJJ);
           // print("<pre>".print_r($listar,true)."</pre>");  die;
            echo '[';
            foreach ($listar as $value){
                $s = new Servicio();
                $sqlS = new SQLServicio();
                $s->setId_servicio($value->getId_tipo_planilla());
                $s = $sqlS->getBuscarServicioPorId($s);
                $strJson.='{"id":"'.$value->getId_planilla_ddjj() . 
                            '", "descripcion":"'.$value->getNumero_ddjj().' - '.($s->getAbreviacion()==''? 'SGT':$s->getAbreviacion()).'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        // if($_REQUEST['tarea']=='listar_ddjj'){
        //     $planillaDDJJ = new PlanillaDDJJ();
        //     $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
            
        //     $planillaDDJJ->setId_empresa($_REQUEST['id_empresa']);
        //     $planillaDDJJ->setId_estado($_REQUEST['id_estado']);
        //     $planillaDDJJ->setFecha_vencimiento(date("Y-m-d"));
        //     $listar = $SQLplanillaDDJJ->getListarPlanillaDDJJEmpresaEstadoValida($planillaDDJJ);
           
        //     echo '[';
        //     foreach ($listar as $value){
        //         $planillaCO = new PlanillaCO();
        //         $SQLplanillaCO = new SQLPlanillaCO();
        //         $planillaCO->setNumero_folder($_REQUEST['folder']);
        //         $planillaCO->setId_regional($_REQUEST['fmsucursal']);
                
        //         $listar1 = $SQLplanillaCO->getListarPlanillaCOporFolder($planillaCO);
        //         // print("<pre>".print_r($listar,true)."</pre>"); 
        //         // echo "EDDY ".$value->getId_tipo_planilla();
        //         //en el siguiente codigo casamos el tipo de co que se crea en el folder con el tipo de co de la declaracion jurada que tiene la empresa
        //         if($value->getId_tipo_planilla() == $listar1[0]->getId_tipo_co() || ($listar1[0]->getId_tipo_co()==14 && $value->getId_tipo_planilla() == 13)){
        //             $s = new Servicio();
        //             $sqlS = new SQLServicio();
        //             $s->setId_servicio($value->getId_tipo_planilla());
        //             $s = $sqlS->getBuscarServicioPorId($s);

        //             $strJson.='{"id":"'.$value->getId_planilla_ddjj() . 
        //                     '", "descripcion":"'.$value->getNumero_ddjj().' - '.($s->getAbreviacion()==''? 'SGT':$s->getAbreviacion()).'"},';
        //         }
        //     }
        //     $strJson = substr($strJson, 0, strlen($strJson) - 1);
        //     echo $strJson;
        //     echo ']';
        //     exit;
        // }
        
        if($_REQUEST['tarea']=='listar_ddjj_actualizacion'){
            $planillaDDJJ = new PlanillaDDJJ();
            $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
            
            $planillaDDJJ->setId_empresa($_REQUEST['id_empresa']);
            $planillaDDJJ->setId_estado($_REQUEST['id_estado']);
            $planillaDDJJ->setFecha_vencimiento(date("Y-m-d"));
            $listar = $SQLplanillaDDJJ->getListarPlanillaDDJJEmpresaEstadoValidaSinVigencia($planillaDDJJ);
//            print("<pre>".print_r($listar,true)."</pre>");
            echo '[';
            foreach ($listar as $value){
                $s = new Servicio();
                $sqlS = new SQLServicio();
                $s->setId_servicio($value["id_tipo_planilla"]);
                $s = $sqlS->getBuscarServicioPorId($s);
                $strJson.='{"id":"'.$value["id_planilla_ddjj"] . 
                            '", "descripcion":"'.$value["numero_ddjj"].' - '.($s->getAbreviacion()==''? 'SGT':$s->getAbreviacion()).'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        
        if($_REQUEST['tarea']=='cargar_datos_ddjj'){
            $planillaDDJJ = new PlanillaDDJJ();
            $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
            
            $planillaDDJJ->setId_planilla_ddjj($_REQUEST['ddjj']);
            $planillaDDJJ = $SQLplanillaDDJJ->getPlanillaDDJJ($planillaDDJJ);
            
            $pda = new DetalleArancel();
            $sqlPDA = new SQLDetalleArancel();
            $pda->setId_detalle_arancel($planillaDDJJ->getId_nandina());
            $pda = $sqlPDA->getBuscarDescripcionPorId($pda);
            echo '[';
                 $strJson.='{"id":"'.$planillaDDJJ->getId_planilla_ddjj() . 
                            '", "codigo":"' . $pda->getCodigo().
                            '", "descripcion":"'.str_replace('"',"''",$planillaDDJJ->getDescripcion()).'"}';
           
            echo $strJson;
            echo ']';
            exit;
        }

        if($_REQUEST['tarea']=='RegistrarCO'){
            
            /*$empresa_persona = new EmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $SQLEmpresa_persona = new SQLEmpresaPersona();
            $empresa_persona = $SQLEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
            */
            
            $fmsucursal = $_REQUEST['fmsucursal'] ;
            $planillaCorrelativo = new PlanillaCorrelativo();
            $sqlPlanillaCorrelativo = new SQLPlanillaCorrelativo();
            
            $planillaCorrelativo->setId_regional($fmsucursal);
            $planillaCorrelativo->setEstado(1);
            $planillaCorrelativo->setTipo(2);
            $planillaCorrelativo = $sqlPlanillaCorrelativo->getPlanillaCorrelativoPorRegionalEstadoTipo($planillaCorrelativo);
            
            $numero_folder = $planillaCorrelativo->getCorrelativo() + 1;
            $planillaCorrelativo->setCorrelativo($numero_folder);
            $sqlPlanillaCorrelativo->save($planillaCorrelativo);
            
            $fecha = date("d-m-Y");
            $date = date("Y-m-d H:i:s");
            $hora = date("H:i:s");
            $lista=array_keys($_REQUEST);

            $sqlPlanillaCO = new SQLPlanillaCO();

	    //ED: codigo  para verificar la existencia de y el plazo de los certificados emitidos  que se quieren registrar para nuevo folder co
            $texto ="<u>OBSERVACIONES</u><br>";
            $sw = 0;
            for ($index = 5; $index < count($lista); $index++) {
                $val = explode("-", $lista[$index]);
                if($val[0]=='nro_control'){
                    $nro_c = $_REQUEST['nro_control-'.$val[1]];
                    $tipo_c = $_REQUEST['tipo-'.$val[1]];

                    $fsmds = new FacturaSenavexManualDetalleServicio();
                    $sql_fsmds = new SQLFacturaSenavexManualDetalleServicio();
                    
                    $fsmds->setFob($tipo_c);
                    $fsmds->setNro_ctrl_1($nro_c);

                    $resultado="";
                    try{
                        $resultado = $sql_fsmds->verificarCO($fsmds);
                    } catch (Exception $e){
                        $resultado="";
                    }

                    if(count($resultado)>0){

                        $fsmds->setId_factura_senavex_manual_detalle_servicio($resultado[0]['id_factura_senavex_manual_detalle_servicio']);
                        $fsmds = $sql_fsmds->getFacturaDetallePorID($fsmds);
                        $fsmd = new FacturaSenavexManualDetalle();
                        $sql_fsmd = new SQLFacturaSenavexManualDetalle();
                        $fsmd->setId_factura_senavex_manual_detalle($fsmds->getId_factura_senavex_manual_detalle());
                        $fsmd = $sql_fsmd->getFacturaDetallePorID($fsmd);
                        $fsm = new FacturaSenavexManual();
                        $sql_fsm = new SQLFacturaSenavexManual();
                        $fsm->setId_factura_senavex_manual($fsmd->getId_factura_senavex_manual());
                        $fsm = $sql_fsm->getFacturaManualPorID($fsm);

                        $dias = $this->dias_transcurridos($fsm->getFecha_emision(), date("Y-m-d H:i"));
                        if($dias > 120){
                            $texto .= "Certificado con número de control ".$nro_c." Fuera de Plazo - ".$dias." días<br>";    $sw = 1;
                        }
                    } else {
                        //ED: en caso que no se haya encontrado puede que se trate de una reposicion
                        $resultado="";

                        try{
                            $resultado = $sql_fsmds->verificarCO1($fsmds);
                        } catch (Exception $e){
                            $resultado="";
                        }

                        if(count($resultado)>0){

                            $fsmds->setId_factura_senavex_manual_detalle_servicio($resultado[0]['id_factura_senavex_manual_detalle_servicio']);
                            $fsmds = $sql_fsmds->getFacturaDetallePorID($fsmds);
                            $fsmd = new FacturaSenavexManualDetalle();
                            $sql_fsmd = new SQLFacturaSenavexManualDetalle();
                            $fsmd->setId_factura_senavex_manual_detalle($fsmds->getId_factura_senavex_manual_detalle());
                            $fsmd = $sql_fsmd->getFacturaDetallePorID($fsmd);
                            $fsm = new FacturaSenavexManual();
                            $sql_fsm = new SQLFacturaSenavexManual();
                            $fsm->setId_factura_senavex_manual($fsmd->getId_factura_senavex_manual());
                            $fsm = $sql_fsm->getFacturaManualPorID($fsm);

                            $dias = $this->dias_transcurridos($fsm->getFecha_emision(), date("Y-m-d H:i"));
                            if($dias > 120){
                                $texto .= "Certificado con número de control ".$nro_c." Fuera de Plazo - ".$dias." días<br>";    $sw = 1;
                            }
                        } else {
                           $texto .= "No se encontro ningún certificado con con número de control:".$nro_c." <br>";   $sw = 1;

                        }
                    }

                }
            }
            if($sw == 1){
                echo '[{"tipo":"5" ,"mensaje":"' . $texto .'"}]';
                exit;
            } else {
                for ($index = 5; $index < count($lista); $index++) {
                    $val = explode("-", $lista[$index]);
                    if($val[0]=='nro_control'){
                        $planillaCO = new PlanillaCO();
                        $planillaCO->setNro_control($_REQUEST['nro_control-'.$val[1]]);
                        $planillaCO->setId_tipo_co($_REQUEST['tipo-'.$val[1]]);
                        $planillaCO->setId_regional($fmsucursal);
                        $planillaCO->setId_asistente_recepcion($_SESSION['id_persona']);
                        $planillaCO->setFecha_recepcion($date);
                        $planillaCO->setId_empresa($_REQUEST['ruex_co']);
                        $planillaCO->setId_estado(0);
                        $planillaCO->setNumero_folder($numero_folder);
                        $planillaCO->setId_acuerdo($_REQUEST['acuerdo-'.$val[1]]);
                        $sqlPlanillaCO->save($planillaCO);
                        
                    }
                }
                echo '[{"tipo":"1" ,"numero_folder":"' . $numero_folder .'", "fecha":"'.$fecha.'", "hora":"'.$hora.'", "aviso":"Registro"}]';
                exit;
            }

        }
        
        if($_REQUEST['tarea']=='cargarCO_DDJJAprobados'){
            echo "[". $this->obtenerCO_DDJJ($_REQUEST['id_empresa']) ."]";
        }
        
        if($_REQUEST['tarea']=='cargarCO_DDJJAprobados_criterios'){
            echo "[". $this->obtenerDetalleDDJJ($_REQUEST['filter']['filters'][0]['value']) ."]";
        }
        
        if($_REQUEST['tarea']=='cargarcriterios'){
            $criterio = new CriterioOrige_pln();
            $sqlCriterio = new SQLCriterioOrigen_pln();
            $listar = $sqlCriterio->getListarCriterioOrigen($criterio);
            $strJson="";
            echo "[";
            foreach ($listar as $value) {
                $descripcion = str_replace('"', '\"', $value->getDescripcion());
                $strJson.='{"id_criterio":"'.$value->getId_criterio_origen() . 
                            '", "descripcion":"'.$descripcion.'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
            
        }
        
        if($_REQUEST['tarea']=='cargarFolderCO'){
            
            /*$empresa_persona = new EmpresaPersona();
            $sql_empresa_persona = new SQLEmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $empresa_persona = $sql_empresa_persona->getEmpresaPersonaPorID($empresa_persona);*/
            
            $planillaCO = new PlanillaCO();
            $SQLplanillaCO = new SQLPlanillaCO();
            
            $planillaCO->setNumero_folder($_REQUEST['folder']);
            $planillaCO->setId_regional($_REQUEST['fmsucursal']);
            $listar = $SQLplanillaCO->getListarPlanillaCOporFolder($planillaCO);
            
            $primero = true;
            echo '[';
            $strJson ="";
           
            
            foreach ($listar as $value){
                
                if($primero){
                    $empresa = new Empresa();
                    $sqlEmpresa = new SQLEmpresa();
                    $empresa->setId_empresa($value->getId_empresa());
                    $empresa = $sqlEmpresa->getEmpresaPorID($empresa);
                    
                    $strJson.='{"id_empresa":"'.$empresa->getId_empresa() . 
                            '", "ruex":"' . $empresa->getRuex() .
                            '", "razon_social":"'.$empresa->getRazon_Social().'"},';
                    
                    $primero = !$primero;
                }
               
                $acuerdo = new Acuerdo_pln();
                $acuerdo->setId_Acuerdo($value->getId_Acuerdo());
                $sqlAcuerdo = new SQLAcuerdo_pln();
                $acuerdo = $sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
                
                $PtipoEmision = new PlanillaTipoEmision();
                $SQLPtipoEmision = new SQLPlanillaTipoEmision();
                if($value->getId_planilla_tipo_emision()!=''){
                    $PtipoEmision->setId_planilla_tipo_emision($value->getId_planilla_tipo_emision());
                    $PtipoEmision = $SQLPtipoEmision->getBuscar($PtipoEmision);
                }
                
                $fecha_recepcion = $value->getFecha_recepcion()!=""? date("d/m/Y", strtotime($value->getFecha_recepcion())) : "";
                $fecha_revision = $value->getFecha_revision()!=""? date("d/m/Y", strtotime($value->getFecha_revision())) : "";
                $fecha_entrega = $value->getFecha_entrega()!=""? date("d/m/Y", strtotime($value->getFecha_entrega())) : "";
                $fecha_sellado = $value->getFecha_sellado()!=""? date("d/m/Y", strtotime($value->getFecha_sellado())) : "";
                 
                $pais = new Pais();
                $sqlPais = new SQLPais();
                $pais->setId_pais($value->getId_pais());
                if($value->getId_pais()!=''){
                    $pais = $sqlPais->getBuscarDescripcionPorId($pais);
                }
                //print('<pre>'.print_r($PtipoEmision, true).'</pre>');
                $planillaEstado = new PlanillaEstado();
                $sqlPlanillaEstado = new SQLPlanillaEstado();
                $planillaEstado->setId_planilla_estado($value->getId_estado());
                $planillaEstado = $sqlPlanillaEstado->getBuscarDescripcion($planillaEstado);
                if($value->getDdjj_descripcion()!='')
                    $value->setId_planilla_ddjj($value->getDdjj_descripcion());
                $abrev = '';
                switch ($value->getId_tipo_co()) {
                    case 11:
                        $abrev = 'AL'; 
                        break;
                    case 12:
                        $abrev = 'MS';
                        break;
                    case 13:
                        $abrev = 'SG';
                        break;
                    case 14:
                        $abrev = 'TP';
                        break;
                    case 15:
                        $abrev = 'MX';
                        break;
                    case 16:
                        $abrev = 'VE';
                        break;
                }
                $abrev_regional = '';
                switch ($_REQUEST['fmsucursal']) {
                    case '1':
                        $abrev_regional = 'LPZ';
                        break;
                    case '2':
                        $abrev_regional = 'EAL';
                        break;
                    case '3':
                        $abrev_regional = 'SCR';
                        break;
                    case '4':
                        $abrev_regional = '';
                        break;
                    case '5':
                        $abrev_regional = 'SCZ';
                        break;
                    case '6':
                        $abrev_regional = 'PTS';
                        break;
                    case '7':
                        $abrev_regional = 'CBB';
                        break;
                    case '8':
                        $abrev_regional = 'ORU';
                        break;
                    case '9':
                        $abrev_regional = 'TRJ';
                        break;
                    case '10':
                        $abrev_regional = 'RBT';
                        break;
                    case '11':
                        $abrev_regional = 'NAL';
                        break;
                }

                $strJson.='{"id_planilla_co":"'.$value->getId_planilla_co() .
                           '", "numero_control":"'.$value->getNro_control().
                           '", "nro_emision":"'.$value->getNro_emision().
                           '", "tipo_emision": "'.$value->getId_planilla_tipo_emision().
                           '", "tipo_emision_descripcion":"'. $PtipoEmision->getDescripcion().
                           '", "estado":"'.$value->getId_estado().
                           '", "estado_descripcion":"'.$planillaEstado->getDescripcion().
                           '", "tipo_co":"'. $value->getId_tipo_co().
                           '", "abrev_co": "'.  $abrev .
                           '", "abrev_regional": "' . $abrev_regional.
                           '", "acuerdo":"'. $acuerdo->getSigla().
                           '", "id_tipo_co":"'. $acuerdo->getId_tipo_co().
                           //'", "id_tipo_ddjj":"'. $acuerdo->getId_tipo_ddjj().
			   '", "id_tipo_ddjj":"'. $acuerdo->getId_Acuerdo().
                           '", "pais":"'. $value->getId_pais().
                           '", "pais_descripcion":"' . $pais->getNombre() .
                           '", "observacion":"'. $value->getObservacion_revision().

                           '", "fecha_registro":"'. $fecha_recepcion.
                           '", "fecha_revision":"'.$fecha_revision.
                           '", "fecha_entrega":"'. $fecha_entrega.
                           '", "fecha_sellado":"'.$fecha_sellado.
                           '", "reemplazos": '. json_encode($this->obtenerCO_Reemplazos($value->getId_planilla_co())) . 
                           ', "ddjjs":'. json_encode($this->obtenerCO_DDJJ($value->getId_planilla_co())) . '},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='revisarFolderCO'){
//            print("<pre>".print_r($_REQUEST, true)."</pre>");
            $fecha_print = date("d-m-Y");
            $date = date("Y-m-d H:i:s");
            $hora = date("H:i:s");
            $numero_folder = $_REQUEST['nro_folder_co'];
            $lista=array_keys($_REQUEST);
            $guardar = false;
            $sqlPlanillaCO = new SQLPlanillaCO();
            $planillaCO = new PlanillaCO();
            $tipo = 2;
            $aviso = 'REVISION DE FOLDER';
            
            for ($index = 5; $index < count($lista); $index++) {
                $sp = explode("-", $lista[$index]);
                if($sp[0]=='id_planilla_co'){
                    $planillaCO = new PlanillaCO();
                    $planillaCO->setId_planilla_co($_REQUEST['id_planilla_co-' . $sp[1]]);
                    $planillaCO = $sqlPlanillaCO->getPlanillaCO($planillaCO);
                    
                    if($planillaCO->getId_estado()==0){
                        $tipo = 2;
                        $aviso = 'FOLDER YA REVISADO';
                        if(isset($_REQUEST['nro_emision-' . $sp[1]])){
                            $planillaCO->setNro_emision($_REQUEST['nro_emision-' . $sp[1]]);
                        }
                        $planillaCO->setId_estado($_REQUEST['estado-' . $sp[1]]); 
                        if(isset($_REQUEST['fecha_sellado-' . $sp[1]]) && $_REQUEST['fecha_sellado-' . $sp[1]]!=""){
                            $fecha = explode("/", $_REQUEST['fecha_sellado-' . $sp[1]]);
                            $planillaCO->setFecha_sellado( $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0]. " 23:59:59" );
                        } 
                        
                        if(isset($_REQUEST['pais-' . $sp[1]])){
                            $planillaCO->setId_pais($_REQUEST['pais-' . $sp[1]]);
                        }
                        $planillaCO->setId_planilla_tipo_emision($_REQUEST['tipo-' . $sp[1]]);
                        
                        $planillaCO->setId_asistente_revision($_SESSION['id_persona']);
                        $planillaCO->setFecha_revision($date);

                        if(isset($_REQUEST['observacion-' . $sp[1]])){
                            $planillaCO->setObservacion_revision($_REQUEST['observacion-' . $sp[1]]);
                        }
                        
                        $sqlPlanillaCO->save($planillaCO); 
                        for($index2 = $index; $index2 <count($lista); $index2++){
                            $sp2 = explode("-", $lista[$index2]);
                            if($sp2[0]=='reemplazo1' && $sp2[1] == $sp[1]){
                                $var1 = $_REQUEST[$lista[$index2]];
                                $index2++;
                                $var2 = $_REQUEST[$lista[$index2]];
                                
                                $pcor = new PlanillaCOReemplazos();
                                $sql_pcor = new SQLPlanillaCOReemplazos();
                                
                                $pcor->setId_planilla_co($planillaCO->getId_planilla_co());
                                $pcor->setNro_control($var1);
                                $pcor->setNro_emision($var2);
                                $sql_pcor->save($pcor);
                            }
                        }
                        for($index2 = $index; $index2 <count($lista); $index2++){
                            $sp2 = explode("-", $lista[$index2]);
                            if($sp2[0]=='ddjj' && $sp2[1] == $sp[1] ){
                                $aux = explode("_", $sp2[2]);
                                if(count($aux)<2){
                                    $planillaDDJJ = new PlanillaDDJJ();
                                    $sqlPlanillaDDJJ = new SQLPlanillaDDJJ();
                                    
                                    $planillaDDJJ->setId_planilla_ddjj($_REQUEST["ddjj-". $sp2[1]."-". $sp2[2]]);

                                    $existe = $sqlPlanillaDDJJ->getExiste($planillaDDJJ);

                                    if(count($existe)>0){
                                        $planillaDDJJ = $sqlPlanillaDDJJ->getPlanillaDDJJ($planillaDDJJ);
                                        $planillaCO_DDJJ = new PlanillaCO_DDJJ();
                                        $sqlPlanillaCO_DDJJ = new SQLPlanillaCO_DDJJ();
                                                
                                        $planillaCO_DDJJ->setId_planilla_co($planillaCO->getId_planilla_co());
                                        $planillaCO_DDJJ->setId_planilla_ddjj($planillaDDJJ->getId_planilla_ddjj());
                                        $planillaCO_DDJJ->setId_criterio($_REQUEST['ddjj_criterio-'. $sp2[1]."-". $sp2[2]]);
                                        $planillaCO_DDJJ->setDescripcion_comercial($_REQUEST['ddjj_descripcion_comercial-'. $sp2[1]."-". $sp2[2]]);
                                        $planillaCO_DDJJ->setObservacion($_REQUEST['ddjj_observacion_ddjj-'. $sp2[1]."-". $sp2[2]]);
//                                        $planillaCO_DDJJ->setFob($_REQUEST["ddjj_fob-". $sp2[1]."-". $sp2[2]]);
                                        $ddjj_fov = str_replace(",", ".", $_REQUEST["ddjj_fob-". $sp2[1]."-". $sp2[2]]);
                                        $planillaCO_DDJJ->setFob(floatval($ddjj_fov));
//                                        $planillaCO_DDJJ->setPneto($_REQUEST["ddjj_pneto-". $sp2[1]."-". $sp2[2]]);
                                        $ddjj_pneto = str_replace(",", ".", $_REQUEST["ddjj_pneto-". $sp2[1]."-". $sp2[2]]);
                                        $planillaCO_DDJJ->setPneto(floatval($ddjj_pneto));
                                        $planillaCO_DDJJ->setFactura($_REQUEST["ddjj_facturas-". $sp2[1]."-". $sp2[2]]);
                                        $planillaCO_DDJJ->setUnidad($_REQUEST["ddjj_unidadm-". $sp2[1]."-". $sp2[2]]);
                                        $planillaCO_DDJJ->setVortex(1);
                                        $sqlPlanillaCO_DDJJ->save($planillaCO_DDJJ);
                                        
                                    }else{
                                        $planillaDDJJ = new PlanillaDDJJ();
                                        $planillaDDJJ->setNumero_ddjj($_REQUEST["ddjj-". $sp2[1]."-". $sp2[2]]);
                                        $planillaDDJJ->setId_estado(3);
                                        $planillaDDJJ->setId_nandina($_REQUEST["ddjj_clasificacion-". $sp2[1]."-". $sp2[2]]);
                                        $planillaDDJJ->setDescripcion($_REQUEST["ddjj_descripcion-". $sp2[1]."-". $sp2[2]]);
                                        $planillaDDJJ->setObservacion($_REQUEST["ddjj_criterio-". $sp2[1]."-". $sp2[2]]);
                                        $sqlPlanillaDDJJ->save($planillaDDJJ);
                                        
                                        $planillaCO_DDJJ = new PlanillaCO_DDJJ();
                                        $sqlPlanillaCO_DDJJ = new SQLPlanillaCO_DDJJ();
                                        
                                        $planillaCO_DDJJ->setId_planilla_co($planillaCO->getId_planilla_co());
                                        $planillaCO_DDJJ->setId_planilla_ddjj($planillaDDJJ->getId_planilla_ddjj());
                                        $ddjj_fov = str_replace(",", ".", $_REQUEST["ddjj_fob-". $sp2[1]."-". $sp2[2]]);
                                        $planillaCO_DDJJ->setFob($ddjj_fov);
                                        $planillaCO_DDJJ->setDescripcion_comercial($_REQUEST['ddjj_descripcion_comercial-'. $sp2[1]."-". $sp2[2]]);
                                        $planillaCO_DDJJ->setObservacion($_REQUEST['ddjj_observacion_ddjj-'. $sp2[1]."-". $sp2[2]]);
                                        $ddjj_pneto = str_replace(",", ".", $_REQUEST["ddjj_pneto-". $sp2[1]."-". $sp2[2]]);
                                        $planillaCO_DDJJ->setPneto($ddjj_pneto);
                                        $planillaCO_DDJJ->setFactura($_REQUEST["ddjj_facturas-". $sp2[1]."-". $sp2[2]]);
                                        $planillaCO_DDJJ->setUnidad($_REQUEST["ddjj_unidadm-". $sp2[1]."-". $sp2[2]]);
                                        $planillaCO_DDJJ->setVortex(0);
                                        $sqlPlanillaCO_DDJJ->save($planillaCO_DDJJ);
                                    }
                                }
                            }
                        }
                    }else{
                        $tipo = 4;
                        $aviso = 'FOLDER YA REVISADO';
                        $dtime = strtotime($planillaCO->getFecha_revision());
                        $fecha_print = date('d-m-Y',$dtime);

                        $date = date("Y-m-d H:i:s", $dtime);
                        $hora = date("H:i:s", $dtime);
                        if($planillaCO->getNro_emision()=='' && $_REQUEST['nro_emision-' . $sp[1]]!='' ){
                            $planillaCO->setNro_emision($_REQUEST['nro_emision-' . $sp[1]]);
                            $sqlPlanillaCO->save($planillaCO); 
                            
                        } 
                    }
                    //$sqlPlanillaCO->save($planillaCO); 
                }
            }
            echo '[{"tipo":"'.$tipo.'" ,"numero_folder":"' . $numero_folder .'", "fecha":"'.$fecha_print.'", "hora":"'.$hora.'", "aviso":"Revisión"}]';
            exit;
        }

       

        if($_REQUEST['tarea']=='RegistrarDDJJ'){
            
            $empresa_persona = new EmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $SQLEmpresa_persona = new SQLEmpresaPersona();
            $empresa_persona = $SQLEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
            
            $planillaDDJJ = new PlanillaDDJJ();
            $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
            $planillaDDJJ->setFecha_registro(date("Y"));

            $planillaDDJJ->setId_empresa($_REQUEST['ruex_ddjj']);
            
            $planillaDDJJ->setId_regional($_REQUEST['fmsucursal']);
  
            $planillaCorrelativo = new PlanillaCorrelativo();
            $sqlPlanillaCorrelativo = new SQLPlanillaCorrelativo();
            
            $planillaCorrelativo->setId_regional($_REQUEST['fmsucursal']);
            $planillaCorrelativo->setEstado(1);
            $planillaCorrelativo->setTipo(1);
            
            $planillaCorrelativo = $sqlPlanillaCorrelativo->getPlanillaCorrelativoPorRegionalEstadoTipo($planillaCorrelativo);
            $numero_folder = $planillaCorrelativo->getCorrelativo() + 1;
            $planillaCorrelativo->setCorrelativo($numero_folder);
            $sqlPlanillaCorrelativo->save($planillaCorrelativo);
            /*$numero_folder = $SQLplanillaDDJJ->getNroFolder($planillaDDJJ);
            $numero_folder = $numero_folder[0]['count'] + 1; */

            $fecha = date("d-m-Y");
            $date = date("Y-m-d H:i:s");
            $hora = date("H:i:s");
            $lista=array_keys($_REQUEST);
            
            for ($index = 5; $index < count($lista); $index++) {
                $val = explode("-", $lista[$index]);
                if($val[0]=="ddjj_tipo"){
                    $val_aux = explode("_", $val[1]);
                    if(count($val_aux)==1){
                        $tipo = $_REQUEST["ddjj_tipo-".$val_aux[0]];
                        $cantidad = $_REQUEST['ddjj_cantidad-'.$val_aux[0]];
                        if($tipo=="5"){
                            for ($index1 = 0; $index1 < $cantidad; $index1++) {
                                $planillaDDJJ = new PlanillaDDJJ();
                                $planillaDDJJ->setFecha_registro($date);
                                $planillaDDJJ->setNumero_folder($numero_folder);
                                $planillaDDJJ->setId_empresa($_REQUEST['ruex_ddjj']);
                                $planillaDDJJ->setId_asistente_registro($_SESSION['id_persona']);
                                $planillaDDJJ->setId_tipo($tipo);
                                $planillaDDJJ->setId_estado(0);
                                $planillaDDJJ->setId_regional($_REQUEST['fmsucursal']);
                                $planillaDDJJ->setId_tipo_planilla($_REQUEST['ddjj_tipo_ddjj-'.$val_aux[0]]);
                                $SQLplanillaDDJJ->save($planillaDDJJ);
//                                print("<pre>".print_r($planillaDDJJ, true)."</pre>");
                            }
                        }
                        if($tipo=="4"){
                            $planillaDDJJ = new PlanillaDDJJ();
                            $planillaDDJJ_clon = new PlanillaDDJJ();
                            
                            $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
                            $planillaDDJJ->setId_planilla_ddjj($cantidad);
//                            print("<pre>".print_r($_REQUEST, true)."</pre>");exit;
                            $planillaDDJJ = $SQLplanillaDDJJ->getPlanillaDDJJ($planillaDDJJ);
                            // $planillaDDJJ->setFecha_baja(date($date));
                            $planillaDDJJ_clon->setNumero_ddjj($planillaDDJJ->getNumero_ddjj());
                            $planillaDDJJ_clon->setFecha_registro($date);
                            $planillaDDJJ_clon->setNumero_folder($numero_folder);
                            $planillaDDJJ_clon->setId_asistente($_SESSION['id_persona']);
                            $planillaDDJJ_clon->setId_empresa($_REQUEST['ruex_ddjj']);
                            $planillaDDJJ_clon->setId_nandina($planillaDDJJ->getId_nandina());
                            $planillaDDJJ_clon->setDescripcion($planillaDDJJ->getDescripcion());
                            $planillaDDJJ_clon->setObservacion($planillaDDJJ->getObservacion());
                            $planillaDDJJ_clon->setId_asistente_registro($_SESSION['id_persona']);
                            $planillaDDJJ_clon->setId_estado(0);
                            $planillaDDJJ_clon->setId_tipo_planilla($planillaDDJJ->getId_tipo_planilla());
                            $planillaDDJJ_clon->setId_tipo($tipo);
                            $planillaDDJJ_clon->setId_regional($_REQUEST['fmsucursal']);
                            $planillaDDJJ_clon->setId_actualizacion_ddjj($planillaDDJJ->getId_planilla_ddjj());
                            $planillaDDJJ_clon->save($planillaDDJJ);
//                            $planillaDDJJ->setId_actualizacion_ddjj($planillaDDJJ_clon->getId_planilla_ddjj());
                            // $SQLplanillaDDJJ->save($planillaDDJJ);
                            $planillaDDJJAcuerdo = new PlanillaDDJJAcuerdo();
                            $sqlPlanillaDDJJAcuerdo = new SQLPlanillaDDJJAcuerdo();
                            $planillaDDJJAcuerdo->setId_planilla_ddjj($planillaDDJJ->getId_planilla_ddjj());
                            $listar_ddjj_acuerdo = $sqlPlanillaDDJJAcuerdo->getListarAcuerdoPorPlanillaDDJJ($planillaDDJJAcuerdo);
                            foreach ($listar_ddjj_acuerdo as $value_acuerdo){
                                $planillaDDJJAcuerdo_acuerdo_clon = new PlanillaDDJJAcuerdo();
                                $planillaDDJJAcuerdo_acuerdo_clon->setId_planilla_ddjj($planillaDDJJ_clon->getId_planilla_ddjj());
                                $planillaDDJJAcuerdo_acuerdo_clon->setId_arancel($value_acuerdo->getId_arancel());
                                $id_arancel = $value_acuerdo->getId_detalle_arancel();
                                $planillaDDJJAcuerdo_acuerdo_clon->setId_detalle_arancel($id_arancel);
                                $planillaDDJJAcuerdo_acuerdo_clon->setId_acuerdo($value_acuerdo->getId_Acuerdo());
                                $planillaDDJJAcuerdo_acuerdo_clon->setId_criterio($value_acuerdo->getId_criterio());
                                $planillaDDJJAcuerdo_acuerdo_clon->setComplemento($value_acuerdo->getComplemento());
                                $sqlPlanillaDDJJAcuerdo->save($planillaDDJJAcuerdo_acuerdo_clon);
                            }
                        }
                    }
                }

            }
            echo '[{"tipo":"1" ,"numero_folder":"' . $numero_folder .'", "fecha":"'.$fecha.'", "hora":"'.$hora.'", "aviso":"Registro"}]';
            exit;
        }


        if($_REQUEST['tarea']=='RegistrarDDJJ_ADD'){  
            $empresa_persona = new EmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $SQLEmpresa_persona = new SQLEmpresaPersona();
            $empresa_persona = $SQLEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);            
            $planillaDDJJ = new PlanillaDDJJ();
            $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
            $planillaDDJJ->setFecha_registro(date("Y"));
            $planillaDDJJ->setId_empresa($_REQUEST['ruex_ddjj']);            
            $planillaDDJJ->setId_regional($_REQUEST['fmsucursal']);
            $numero_folder = '-1';
            $fecha = date("d-m-Y");
            $date = date("Y-m-d H:i:s");
            $hora = date("H:i:s");
            $lista=array_keys($_REQUEST); 
            $val = explode("-", $lista[$index]);

            $fecha = explode('/',$_REQUEST['ddjj_fecha_vencimiento_ddjj-1']);
            $fecha_ven = $fecha[2].'-'.$fecha[1].'-'.$fecha[0].' 23:59:59';


            $fecha = explode('/',$_REQUEST['ddjj_fecha_registro_ddjj-1']);
            $fecha_reg = $fecha[2].'-'.$fecha[1].'-'.$fecha[0].' 23:59:59';
            
            $tipo = $_REQUEST["ddjj_tipo_ddjj-".$val_aux[0]];
            $index1 = 0;
            $planillaDDJJ = new PlanillaDDJJ();
            $planillaDDJJ->setFecha_registro($date);
            $planillaDDJJ->setNumero_folder($numero_folder);
            $planillaDDJJ->setId_empresa($_REQUEST['ruex_ddjj']);
            $planillaDDJJ->setId_asistente_registro($_SESSION['id_persona']);
            $planillaDDJJ->setId_asistente_entrega($_SESSION['id_persona']);
            $planillaDDJJ->setId_asistente_revision($_SESSION['id_persona']);
            $planillaDDJJ->setNumero_ddjj($_REQUEST['ddjj_correlativo-1']);
            $planillaDDJJ->setId_estado(1);
            $planillaDDJJ->setFecha_vencimiento($fecha_ven);
            $planillaDDJJ->setFecha_revision($fecha_reg);
            $planillaDDJJ->setFecha_entrega($fecha_reg);
            $planillaDDJJ->setId_regional($_REQUEST['fmsucursal']);
            $planillaDDJJ->setId_tipo_planilla($_REQUEST['ddjj_tipo_ddjj-1']);
            $planillaDDJJ->setFecha_registro($date);
            $planillaDDJJ->setId_asistente($_SESSION['id_persona']);
            $planillaDDJJ->setId_nandina($_REQUEST['ddjj_nandina-1'.$val[1]]);
            $planillaDDJJ->setDescripcion($_REQUEST['ddjj_descripcion_ddjj-1']);
            $planillaDDJJ->setObservacion($_REQUEST['ddjj_observacion_ddjj-1']);
            $planillaDDJJ->setId_tipo(5);
            /*print_r($planillaDDJJ);*/
            $SQLplanillaDDJJ->save($planillaDDJJ); 
            
            // echo $planillaDDJJ->getId_planilla_ddjj();
            $planillaDDJJAcuerdo = new PlanillaDDJJAcuerdo();
            $sqlPlanillaDDJJAcuerdo = new SQLPlanillaDDJJAcuerdo();
            $planillaDDJJAcuerdo->setId_planilla_ddjj($planillaDDJJ->getId_planilla_ddjj());
            $listar_ddjj_acuerdo = $sqlPlanillaDDJJAcuerdo->getListarAcuerdoPorPlanillaDDJJ($planillaDDJJAcuerdo);
            
            $guardar = false;
            
            //print_r($lista);
            for ($index = 5; $index < count($lista); $index++) {
                $val = explode("-", $lista[$index]);
                
                // print_r ($val);
                if($val[0]=="ddjj_acuerdo_ddjj_id"){
                    $val1 = explode("-", $lista[$index]);
                    //if($guardar && $planillaDDJJ->getId_estado()==1 && $planillaDDJJ->getId_tipo()==5){
                        
                        $sqlPlanilladdjjAcuerdo = new SQLPlanillaDDJJAcuerdo();
                        $planilladdjjAcuerdo = new PlanillaDDJJAcuerdo();
                        $planilladdjjAcuerdo->setId_planilla_ddjj_acuerdo($_REQUEST[''.$val1[1].'-'.$val1[2]]);
                        if($_REQUEST[''.$val1[1].'-'.$val1[2]]!='')
                            $planilladdjjAcuerdo = $sqlPlanilladdjjAcuerdo->getPlanillaDDJJAcuerdo($planilladdjjAcuerdo);
                        $planilladdjjAcuerdo->setId_planilla_ddjj($planillaDDJJ->getId_planilla_ddjj());
                        if( isset($_REQUEST['ddjj_naladisa_ddjj-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_naladisa_ddjj-' . $val1[1] . '-' . $val1[2]]!='' )
                            $planilladdjjAcuerdo->setId_arancel( $_REQUEST['ddjj_naladisa_ddjj-' . $val1[1] . '-' . $val1[2]] );
                        if(  isset($_REQUEST['ddjj_nro_naladisa_ddjj-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_nro_naladisa_ddjj-' . $val1[1] . '-' . $val1[2]]!='' )
                            $planilladdjjAcuerdo->setId_detalle_arancel( $_REQUEST['ddjj_nro_naladisa_ddjj-' . $val1[1] . '-' . $val1[2]]);
                        if(  isset($_REQUEST['ddjj_acuerdo_ddjj-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_acuerdo_ddjj-' . $val1[1] . '-' . $val1[2]]!='' )
                            $planilladdjjAcuerdo->setId_acuerdo( $_REQUEST['ddjj_acuerdo_ddjj-' . $val1[1] . '-' . $val1[2]]);
                        if( isset($_REQUEST['ddjj_criterio_ddjj-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_criterio_ddjj-' . $val1[1] . '-' . $val1[2]]!='' )
                            $planilladdjjAcuerdo->setId_criterio( $_REQUEST['ddjj_criterio_ddjj-' . $val1[1] . '-' . $val1[2]]);
                        if( isset($_REQUEST['ddjj_complemento_ddjj-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_complemento_ddjj-' . $val1[1] . '-' . $val1[2]]!='' )
                            $planilladdjjAcuerdo->setComplemento(str_replace ('"', '\"', $_REQUEST['ddjj_complemento_ddjj-' . $val1[1] . '-' . $val1[2]] ) );
                        if(  isset($_REQUEST['ddjj_observacion_ddjj-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_observacion_ddjj-' . $val1[1] . '-' . $val1[2]]!='' )
                            $planilladdjjAcuerdo->setObservacion( $_REQUEST['ddjj_observacion_ddjj-' . $val1[1] . '-' . $val1[2]] );
                        $sqlPlanilladdjjAcuerdo->save($planilladdjjAcuerdo);
                        /*try{
                            
                            //print_r($planilladdjjAcuerdo);
                            echo "entra";
                        } catch (Exception $e){
                            echo "problemas";
                        }*/
                        
                    //}
                }
            }
            echo '[{"tipo":"1" ,"numero_folder":"' . $numero_folder .'", "fecha":"'.$fecha.'", "hora":"'.$hora.'", "aviso":"Registro"}]';
            exit;
        }

        if($_REQUEST['tarea']=='cargarFolderDDJJ'){
//            print('<pre>'.print_r($_REQUEST, true).'</pre>');
            
            $empresa_persona = new EmpresaPersona();
            $sql_empresa_persona = new SQLEmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $empresa_persona = $sql_empresa_persona->getEmpresaPersonaPorID($empresa_persona);
            
            $planillaDDJJ = new PlanillaDDJJ();
            $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
            $planillaDDJJ->setNumero_folder($_REQUEST['folder']);
            $planillaDDJJ->setId_regional($_REQUEST['fmsucursal']);
            $listar = $SQLplanillaDDJJ->getListarPlanillaDDJJporFolder($planillaDDJJ);
            
            $planillaEstado = new PlanillaEstado();
            $primero = true;
//            $strJson2.='';
//            print('<pre>'.print_r($listar, true).'</pre>');
            echo '[';
            foreach ($listar as $value){
                
                if($primero){
                   
                    $empresa = new Empresa();
                    $sqlEmpresa = new SQLEmpresa();
                    $empresa->setId_empresa($value->getId_empresa());
                    $empresa = $sqlEmpresa->getEmpresaPorID($empresa);
                    $strJson.='{"id_empresa":"'.$empresa->getId_empresa() . 
                            '", "ruex":"' . $empresa->getRuex() .
                            '", "razon_social":"'.$empresa->getRazon_Social().'"},';
                    
                    $primero = !$primero;
                }
                $detallearancel = new DetalleArancel();
                $sql_detallearancel = new SQLDetalleArancel();
                $nandina = "";
                $id_nandina = "";
                $nandina_descripcion ="";
               
                if($value->getId_nandina()!= ""){
                    $detallearancel->setId_detalle_arancel($value->getId_nandina());
                    $detallearancel = $sql_detallearancel->getBuscarDescripcionPorId( $detallearancel );
                    $nandina = $detallearancel->getCodigo();
                    $id_nandina = $detallearancel->getId_detalle_arancel();
                    $nandina_descripcion = $detallearancel->getDescripcion();
                }

                if($value->getId_tipo_planilla()!= ""){
                    $servicio = new Servicio();
                    $sqlServicio = new SQLServicio();
                    $id_servicio = $value->getId_tipo_planilla();
                    $servicio->setId_servicio($id_servicio);
                    $listar = $sqlServicio->getBuscarServicioPorId($servicio);
                    $formulario = $listar->getAbreviacion();
                }
                
               
//                $strJson2 = substr($strJson2, 0, strlen($strJson2) - 1);
                $fecha1 = explode("-", substr($value->getFecha_registro(), 0, strlen($value->getFecha_registro()) - 9));
               
                $fecha2 =  $value->getFecha_vencimiento()!=''? explode("-", substr($value->getFecha_vencimiento(), 0, strlen($value->getFecha_vencimiento()) -9)) : "" ;
                $fecha3 =  $value->getFecha_entrega()!=''? explode("-", substr($value->getFecha_entrega(), 0, strlen($value->getFecha_entrega()) -9)) : "" ;
                $strJson.='{"id":"'.$value->getId_planilla_ddjj() . 
                            '", "numero_ddjj":"'. $value->getNumero_ddjj().
                            '", "descripcion":"'.$value->getDescripcion().
                            '", "id_tipo": "'. $value->getId_tipo().
                            '", "estado":"'.$value->getId_estado().
                            '", "id_nandina": "'.$id_nandina.
                            '", "fecha_registro":"'. ($fecha1!=''? $fecha1[2]."/".$fecha1[1]."/".$fecha1[0] : "" ).
                            '", "fecha_vencimiento":"'.($fecha2!=''? $fecha2[2]."/".$fecha2[1]."/".$fecha2[0] : "" ).
                            '", "fecha_entrega":"'.($fecha3!=''? $fecha3[2]."/".$fecha3[1]."/".$fecha3[0] : "" ).
                            '", "observacion":"'.$value->getObservacion().
                            '", "id_tipo_planilla": "'. $value->getId_tipo_planilla().
                            '", "formulario": "'. $formulario. 
                            '", "nandina":"'.$nandina.
                            '", "nandina_descripcion":"'.$nandina_descripcion.
                            '", "acuerdos":' . json_encode($this->obtenerDetalleDDJJ($value->getId_planilla_ddjj())) .'},';
//                $strJson2.=''; 
//                print('<pre>'.print_r($strJson, true).'</pre>');
            }//FIN DEL FOREACH LISTAR

            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='cargarDDJJ_del'){
            //echo 'lauris'+ $_REQUEST['id_ddjj']+ ' 123456785';
//            print('<pre>'.print_r($_REQUEST, true).'</pre>');
            $id_ddjj_del=$_REQUEST['id_ddjj'];
            $empresa_persona = new EmpresaPersona();
            $sql_empresa_persona = new SQLEmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $empresa_persona = $sql_empresa_persona->getEmpresaPersonaPorID($empresa_persona);
            $planillaDDJJ = new PlanillaDDJJ();
            $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
            $planillaDDJJ->setId_planilla_ddjj($_REQUEST['id_ddjj']);
            $listar = $SQLplanillaDDJJ->getExiste($planillaDDJJ);
            $planillaEstado = new PlanillaEstado();
            $primero = true;
//            $strJson2.='';
//            print('<pre>'.print_r($listar, true).'</pre>');
            //echo($_REQUEST['id_ddjj']);
            echo '[';
            foreach ($listar as $value){
                
                if($primero){
                   
                    $empresa = new Empresa();
                    $sqlEmpresa = new SQLEmpresa();
                    $empresa->setId_empresa($value->getId_empresa());
                    $empresa = $sqlEmpresa->getEmpresaPorID($empresa);
                    $strJson.='{"id_empresa":"'.$empresa->getId_empresa() . 
                            '", "ruex":"' . $empresa->getRuex() .
                            '", "razon_social":"'.$empresa->getRazon_Social().'"},';
                    
                    $primero = !$primero;
                }
                $detallearancel = new DetalleArancel();
                $sql_detallearancel = new SQLDetalleArancel();
                $nandina = "";
                $id_nandina = "";
                $nandina_descripcion ="";
               //echo $value->getId_nandina();
               if($value->getId_nandina()!= ""){
                    $detallearancel->setId_detalle_arancel($value->getId_nandina());
                    $detallearancel = $sql_detallearancel->getBuscarDescripcionPorId( $detallearancel );
                    //print_r($detallearancel);
                    $nandina = $detallearancel->getCodigo();
                    $id_nandina = $detallearancel->getId_detalle_arancel();
                    $nandina_descripcion = $detallearancel->getDescripcion();
                }

                if($value->getId_tipo_planilla()!= ""){
                    $servicio = new Servicio();
                    $sqlServicio = new SQLServicio();
                    $id_servicio = $value->getId_tipo_planilla();
                    $servicio->setId_servicio($id_servicio);
                    $listar = $sqlServicio->getBuscarServicioPorId($servicio);
                    $formulario = $listar->getAbreviacion();
                }
                
               
//                $strJson2 = substr($strJson2, 0, strlen($strJson2) - 1);
                $fecha1 = explode("-", substr($value->getFecha_registro(), 0, strlen($value->getFecha_registro()) - 9));
               
                $fecha2 =  $value->getFecha_vencimiento()!=''? explode("-", substr($value->getFecha_vencimiento(), 0, strlen($value->getFecha_vencimiento()) -9)) : "" ;
                $fecha3 =  $value->getFecha_entrega()!=''? explode("-", substr($value->getFecha_entrega(), 0, strlen($value->getFecha_entrega()) -9)) : "" ;
                $strJson.='{"id":"'.$value->getId_planilla_ddjj() . 
                            '", "numero_ddjj":"'. $value->getNumero_ddjj().
                            '", "descripcion":"'.$value->getDescripcion().
                            '", "id_tipo": "'. $value->getId_tipo().
                            '", "estado":"'.$value->getId_estado().
                            '", "id_nandina": "'.$id_nandina.
                            '", "fecha_registro":"'. ($fecha1!=''? $fecha1[2]."/".$fecha1[1]."/".$fecha1[0] : "" ).
                            '", "fecha_vencimiento":"'.($fecha2!=''? $fecha2[2]."/".$fecha2[1]."/".$fecha2[0] : "" ).
                            '", "fecha_entrega":"'.($fecha3!=''? $fecha3[2]."/".$fecha3[1]."/".$fecha3[0] : "" ).
                            '", "observacion":"'.$value->getObservacion().
                            '", "id_tipo_planilla": "'. $value->getId_tipo_planilla().
                            '", "formulario": "'. $formulario. 
                            '", "nandina":"'.$nandina.
                            '", "nandina_descripcion":"'.$nandina_descripcion.
                            '", "acuerdos":' . json_encode($this->obtenerDetalleDDJJ($value->getId_planilla_ddjj())) .'},';
//                $strJson2.=''; 
//                print('<pre>'.print_r($strJson, true).'</pre>');
            }//FIN DEL FOREACH LISTAR

            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='RevisarDDJJ'){
//            print('<pre>'.print_r($_REQUEST, true).'</pre>');
            $fecha_print = date("d-m-Y");
            $date = date("Y-m-d H:i:s");
            $hora = date("H:i:s");
            $numero_folder = $_REQUEST['nro_folder'];

            $empresa_persona = new EmpresaPersona();
            $sql_empresa_persona = new SQLEmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $empresa_persona = $sql_empresa_persona->getEmpresaPersonaPorID($empresa_persona);
            
            $planillaDDJJ = new PlanillaDDJJ();
            $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
            
            $lista=array_keys($_REQUEST);
            $guardar = false;
            for ($index = 5; $index < count($lista); $index++) {
                $val = explode("-", $lista[$index]);
                
                if($val[0]=='ddjj_id'){
//                    print('<pre>'.print_r($lista[$index]. ' = '.$_REQUEST[$lista[$index]], true).'</pre>');
                    $planillaDDJJ->setId_planilla_ddjj($_REQUEST[$lista[$index]]);
                    $planillaDDJJ = $SQLplanillaDDJJ->getPlanillaDDJJ($planillaDDJJ);
                    
                    if($planillaDDJJ->getId_estado()==0){
                        $planillaDDJJ->setId_estado($_REQUEST["ddjj_estado-".$val[1]]);
                        $planillaDDJJ->setId_asistente_revision($_SESSION['id_persona']);
//                        
                        if($planillaDDJJ->getId_tipo()==5){
                            $planillaDDJJ->setId_nandina($_REQUEST["ddjj_nandina-" . $val[1]]);
                        }
                        if($planillaDDJJ->getId_estado()==1){
                            $fecha = explode("/", $_REQUEST["ddjj_dias_vigencia-" . $val[1]]);
                            // $planillaDDJJ->setFecha_vencimiento(date('Y-m-d', strtotime($date. ' + '.$_REQUEST['ddjj_dias_vigencia-'.$val[1]].' days')));
                            //$planillaDDJJ->setFecha_vencimiento( date('Y-m-d', strtotime("+".$_REQUEST['ddjj_dias_vigencia-'.$val[1]].' days')) );
                            $planillaDDJJ->setFecha_vencimiento( $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0]. " 23:59:59" );
//                            if($planillaDDJJ->getId_tipo_planilla()== 13 || $planillaDDJJ->getId_tipo_planilla()== 14){
//                                $planillaDDJJ->setId_tipo_planilla("13, 14");
//                            }
//                            $numero_ddjj = $SQLplanillaDDJJ->getNroDDJJ($planillaDDJJ);
//                            $planillaDDJJ->setNumero_ddjj(!empty($numero_ddjj[0]['max']) && $numero_ddjj[0]['max']!=""? ($numero_ddjj[0]['max'] + 1) : 1);
                            
                            $tipo = $planillaDDJJ->getId_tipo_planilla();
                            if($planillaDDJJ->getId_tipo_planilla()== 13 || $planillaDDJJ->getId_tipo_planilla()== 14){
//                                $planillaDDJJ->setId_tipo_planilla("13, 14");
                                $tipo = "13, 14";
                            }
                            
                            if($_REQUEST["ddjj_correlativo-" . $val[1]]==''){
                                $pddjj = new PlanillaDDJJ();
                                $pddjj->setId_estado($planillaDDJJ->getId_estado());
                                $pddjj->setId_regional($planillaDDJJ->getId_regional());
                                $pddjj->setId_tipo_planilla($tipo);
                                $pddjj->setId_empresa($planillaDDJJ->getId_empresa());
                                $numero_ddjj = $SQLplanillaDDJJ->getNroDDJJ($pddjj);
//                            print('<pre>'.print_r($numero_ddjj[0]['max'], true).'</pre>');
                            
                                $planillaDDJJ->setNumero_ddjj(!empty($numero_ddjj[0]['max']) && $numero_ddjj[0]['max']!=""? ($numero_ddjj[0]['max'] + 1) : 1);
                            }else {
                                $planillaDDJJ->setNumero_ddjj($_REQUEST["ddjj_correlativo-" . $val[1]]);
                            }
			    if($planillaDDJJ->getId_actualizacion_ddjj()){
                                $planillaDDJJ_ant = new PlanillaDDJJ();
                                $planillaDDJJ_ant->setId_planilla_ddjj($planillaDDJJ->getId_actualizacion_ddjj());
                                $planillaDDJJ_ant = $SQLplanillaDDJJ->getPlanillaDDJJ($planillaDDJJ_ant);
                                $planillaDDJJ_ant->setFecha_baja(date($date));
                                $SQLplanillaDDJJ->save($planillaDDJJ_ant); 
                            }
                        }

                        $planillaDDJJ->setDescripcion($_REQUEST["ddjj_descripcion-" . $val[1]]);
//                        $planillaDDJJ->setId_tipo($_REQUEST['ddjj_actualizacion-' . $val[1]]=='on'? 4:5);
                        $planillaDDJJ->setObservacion($_REQUEST['ddjj_observacion-' . $val[1]]);
                        $planillaDDJJ->setFecha_revision(date("Y-m-d H:i:s"));
                        $planillaDDJJ->setId_asistente_revision($_SESSION['id_persona']);
                       // print('<pre>'.print_r($planillaDDJJ, true).'</pre>');

                        $SQLplanillaDDJJ->save($planillaDDJJ);
                        $guardar = true;
                    }else{
                        $guardar = false;
                    }
                }
                if($val[0]=="ddjj_acuerdo_id"){
//                    print('<pre>'.print_r($lista[$index]. ' = '.$_REQUEST[$lista[$index]], true).'</pre>');
                    $val1 = explode("-", $lista[$index]);
                    if($guardar && $planillaDDJJ->getId_estado()==1 && $planillaDDJJ->getId_tipo()==5){
                        $sqlPlanilladdjjAcuerdo = new SQLPlanillaDDJJAcuerdo();
                        
                        $planilladdjjAcuerdo = new PlanillaDDJJAcuerdo();
                        $planilladdjjAcuerdo->setId_planilla_ddjj_acuerdo($_REQUEST[''.$val1[1].'-'.$val1[2]]);
                        if($_REQUEST[''.$val1[1].'-'.$val1[2]]!='')
                            $planilladdjjAcuerdo = $sqlPlanilladdjjAcuerdo->getPlanillaDDJJAcuerdo($planilladdjjAcuerdo);
                        $planilladdjjAcuerdo->setId_planilla_ddjj($planillaDDJJ->getId_planilla_ddjj());
                        if( isset($_REQUEST['ddjj_naladisa-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_naladisa-' . $val1[1] . '-' . $val1[2]]!='' )
                            $planilladdjjAcuerdo->setId_arancel( $_REQUEST['ddjj_naladisa-' . $val1[1] . '-' . $val1[2]] );
                        if(  isset($_REQUEST['ddjj_nro_naladisa-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_nro_naladisa-' . $val1[1] . '-' . $val1[2]]!='' )
                            $planilladdjjAcuerdo->setId_detalle_arancel( $_REQUEST['ddjj_nro_naladisa-' . $val1[1] . '-' . $val1[2]]);
                        if(  isset($_REQUEST['ddjj_acuerdo-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_acuerdo-' . $val1[1] . '-' . $val1[2]]!='' )
                            $planilladdjjAcuerdo->setId_acuerdo( $_REQUEST['ddjj_acuerdo-' . $val1[1] . '-' . $val1[2]]);
                        if( isset($_REQUEST['ddjj_criterio-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_criterio-' . $val1[1] . '-' . $val1[2]]!='' )
                            $planilladdjjAcuerdo->setId_criterio( $_REQUEST['ddjj_criterio-' . $val1[1] . '-' . $val1[2]]);
                        if( isset($_REQUEST['ddjj_complemento-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_complemento-' . $val1[1] . '-' . $val1[2]]!='' )
                            $planilladdjjAcuerdo->setComplemento(str_replace ('"', '\"', $_REQUEST['ddjj_complemento-' . $val1[1] . '-' . $val1[2]] ) );
                        if(  isset($_REQUEST['ddjj_observacion-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_observacion-' . $val1[1] . '-' . $val1[2]]!='' )
                            $planilladdjjAcuerdo->setObservacion( $_REQUEST['ddjj_observacion-' . $val1[1] . '-' . $val1[2]] );
                        
                        try{
                            $sqlPlanilladdjjAcuerdo->save($planilladdjjAcuerdo);
                        } catch (Exception $e){
                            
                        }
                        
                    } else {
                        if($guardar && $planillaDDJJ->getId_estado()==1 && $planillaDDJJ->getId_tipo()==4)
                        {
                            
                            $sqlPlanilladdjjAcuerdo = new SQLPlanillaDDJJAcuerdo();
                            $planilladdjjAcuerdo = new PlanillaDDJJAcuerdo();
                            
                            
                            if($_REQUEST['id_ddjj_acuerdo-'.$val1[1].'-'.$val1[2]]!=''){
                                $planilladdjjAcuerdo->setId_planilla_ddjj_acuerdo($_REQUEST['id_ddjj_acuerdo-'.$val1[1].'-'.$val1[2]]);
                                $planilladdjjAcuerdo = $sqlPlanilladdjjAcuerdo->getPlanillaDDJJAcuerdo($planilladdjjAcuerdo);
                            }
                            $planilladdjjAcuerdo->setId_planilla_ddjj($planillaDDJJ->getId_planilla_ddjj());
                            if( isset($_REQUEST['ddjj_naladisa-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_naladisa-' . $val1[1] . '-' . $val1[2]]!='' )
                                $planilladdjjAcuerdo->setId_arancel( $_REQUEST['ddjj_naladisa-' . $val1[1] . '-' . $val1[2]] );
                            // if(  isset($_REQUEST['ddjj_nro_naladisa-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_nro_naladisa-' . $val1[1] . '-' . $val1[2]]!='' )
                            //     $planilladdjjAcuerdo->setId_detalle_arancel( $_REQUEST['ddjj_nro_naladisa-' . $val1[1] . '-' . $val1[2]]);
                            if(  isset($_REQUEST['ddjj_acuerdo-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_acuerdo-' . $val1[1] . '-' . $val1[2]]!='' )
                                $planilladdjjAcuerdo->setId_acuerdo( $_REQUEST['ddjj_acuerdo-' . $val1[1] . '-' . $val1[2]]);
                            if( isset($_REQUEST['ddjj_criterio-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_criterio-' . $val1[1] . '-' . $val1[2]]!='' )
                                $planilladdjjAcuerdo->setId_criterio( $_REQUEST['ddjj_criterio-' . $val1[1] . '-' . $val1[2]]);
                            if( isset($_REQUEST['ddjj_complemento-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_complemento-' . $val1[1] . '-' . $val1[2]]!='' )
                                $planilladdjjAcuerdo->setComplemento(str_replace ('"', '\"', $_REQUEST['ddjj_complemento-' . $val1[1] . '-' . $val1[2]] ) );
                            if(  isset($_REQUEST['ddjj_observacion-' . $val1[1] . '-' . $val1[2]]) && $_REQUEST['ddjj_observacion-' . $val1[1] . '-' . $val1[2]]!='' )
                                $planilladdjjAcuerdo->setObservacion( $_REQUEST['ddjj_observacion-' . $val1[1] . '-' . $val1[2]] );

                            try{
                                $sqlPlanilladdjjAcuerdo->save($planilladdjjAcuerdo);
                            } catch (Exception $e){

                            }
                            
                        }
                        
                    }
                } 
            }
            echo '[{"tipo":"2" ,"numero_folder":"' . $numero_folder .'", "fecha":"'.$fecha_print.'", "hora":"'.$hora.'", "aviso":"Revisión"}]';
            exit;
        }
        if($_REQUEST['tarea']=='EntregarDDJJ'){
            
            $date = date("Y-m-d H:i:s");
            $hora = date("H:i:s");
            $numero_folder = $_REQUEST['nro_folder'];
            $fecha_print = date("d-m-Y");
            $SQLPlanillaDDJJ = new SQLPlanillaDDJJ();
//            print('<pre>'.print_r($_SESSION,true).'</pre>');
            $lista=array_keys($_REQUEST);
            $tipo = 3;
            for ($index = 5; $index < count($lista); $index++) {
                $val = explode("-", $lista[$index]);
               
                if($val[0]=='ddjj_id'){
                    $planillaDDJJ = new PlanillaDDJJ();
                    $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
                    
                    $planillaDDJJ->setId_planilla_ddjj($_REQUEST[$lista[$index]]);
                    $planillaDDJJ = $SQLplanillaDDJJ->getPlanillaDDJJ($planillaDDJJ);
//                     print('<pre>'.print_r($_SESSION['id_persona'],true).'</pre>');
                    if(!$planillaDDJJ->getId_asistente_entrega()){
                        $planillaDDJJ->setFecha_entrega($date);
                        $planillaDDJJ->setId_asistente_entrega($_SESSION['id_persona']);
                        $SQLplanillaDDJJ->save($planillaDDJJ);
                        $fecha_print = $date;
                        $tipo = 3;
                    }else{
                        $dtime = strtotime($planillaDDJJ->getFecha_entrega());
                        $fecha_print = date('d-m-Y',$dtime);
                        $hora = date('H:i:s', $dtime);
                        $tipo = 4;
                    }
                     
                    
//                    print('<pre>'.print_r($planillaDDJJ,true).'</pre>');
                }
            }
            echo '[{ "tipo":"'.$tipo.'" ,"numero_folder":"' . $numero_folder .'", "fecha":"'.$fecha_print.'", "hora":"'.$hora.'", "aviso":"Entrega"}]';
            exit;
        }
        if($_REQUEST['tarea']=='EntregarFolderCO'){
            
            $date = date("Y-m-d H:i:s");
            $hora = date("H:i:s");
            $numero_folder = $_REQUEST['nro_folder_co'];
            $fecha_print = date("d-m-Y");
            
            $sqlPlanillaCO = new SQLPlanillaCO();
            
            $lista=array_keys($_REQUEST);
            $tipo = 3;
            
            for ($index = 0; $index < count($lista); $index++) {
                $sp = explode("-", $lista[$index]);
                if($sp[0]=='id_planilla_co'){
                    $planillaCO = new PlanillaCO();
                    $SQLPlanillaCO = new SQLPlanillaCO();
                    $planillaCO->setId_planilla_co($_REQUEST["id_planilla_co-".$sp[1]]);
                    $planillaCO = $sqlPlanillaCO->getPlanillaCO($planillaCO);
                    if(!$planillaCO->getId_asistente_entrega()){
                        $planillaCO->setFecha_entrega($date);
                        $planillaCO->setId_asistente_entrega($_SESSION['id_persona']);
                        $sqlPlanillaCO->save($planillaCO);
                        $fecha_print = $date;
                        $tipo = 3;
                    }else{
                        $dtime = strtotime($planillaCO->getFecha_entrega());
                        $fecha_print = date('d-m-Y',$dtime);
                        $hora = date('H:i:s', $dtime);
                        $tipo = 4;
                    }
                }
            }
            echo '[{ "tipo":"'.$tipo.'" ,"numero_folder":"' . $numero_folder .'", "fecha":"'.$fecha_print.'", "hora":"'.$hora.'", "aviso":"Entrega"}]';
            exit;
        }
        if($_REQUEST['tarea']=='save_planilla_anulacion_co')
        {
            $planillaAnulacion = new PlanillaAnulacionCO();
            $empresa_persona = new EmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $sqlEmpresa_persona = new SQLEmpresaPersona();
            $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
            
            $lista=array_keys($_REQUEST);
            $fecha = date("d-m-Y");
            $date = date("Y-m-d H:i:s");
            $hora = date("H:i:s");
           
            for($index=0; $index<count($lista); $index++){
                $sp = explode("-", $lista[$index]);
                if($sp[0]=='anulacion_co'){
                    $paco = new PlanillaAnulacionCO();
                    $sql_paco = new SQLPlanillaAnulacionCO();

//                    $paco->setFecha_registro($date);
//                    $paco->setFecha_registro(date('Y-m-d', strtotime($_REQUEST['anulacion_fecha-' . $sp[1]])));
                    $fecha_anulacion = explode("/", $_REQUEST['anulacion_fecha-' . $sp[1]]);
                    $paco->setFecha_registro($fecha_anulacion[2].'-'.$fecha_anulacion[1].'-'.$fecha_anulacion[0]);
                    $paco->setNro_control($_REQUEST['anulacion_co-' . $sp[1]]);
                    $paco->setId_empresa($_REQUEST['anulacion_ruex-' . $sp[1]]);
                    $paco->setId_planilla_tipo_anulacion_co($_REQUEST['anulacion_tipo_anulacion-' . $sp[1]]);
                    $paco->setObservacion($_REQUEST['anulacion_descripcion-' . $sp[1]]);
                    $paco->setId_regional($empresa_persona->getId_regional());
                    $paco->setId_tipo_co($_REQUEST['anulacion_tipo_co-' . $sp[1]]);
                    $paco->setId_certificador($_SESSION['id_persona']);
//                     print('<pre>'.print_r($paco,true).'</pre>');
                    $sql_paco->save($paco);
                }
            }
            
            echo '[{"tipo":"1" ,"numero_folder":"", "fecha":"'.$fecha.'", "hora":"'.$hora.'", "aviso":"Registro"}]';
            exit;

        }
        //change ed
        if($_REQUEST['tarea']=='show_planilla_add_ddjj') 
        {
            $empresa_persona = new EmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $SQLEmpresa_persona = new SQLEmpresaPersona();
            $v1= $_REQUEST['v1'];
            $v2= $_REQUEST['v2'];
            $empresa_persona = $SQLEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
            $vista->assign("fmsucursal", $empresa_persona->getId_regional());
            $vista->assign("ie_regional", $v1);
            $vista->assign("ie_ruex", $v2);
            $vista->assign("ie_nombre", $_REQUEST['v3']);
            $vista->assign("ie_folder", $_REQUEST['v4']);
            $vista->display("admPlanilla/planilla_addddjj.tpl");
            exit();
        }
	
	if($_REQUEST['tarea']=='ImpresionDDJJvigente')
        {
            $id= $_REQUEST['id_empresa'];
            $meses = ['','ENERO','FEBRERO','MARZO','ABRIL', 'MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
            $empresa_persona = new EmpresaPersona();
            $sqlEmpresa_persona = new SQLEmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
            $regional = new Regional();
            $sqlRegional = new SQLRegional();
            $regional->setId_regional($empresa_persona->getId_regional());
            
            
            $sqlPlanillaDDJJ = new SQLPlanillaDDJJ();
            $planillaDDJJ = new PlanillaDDJJ();

            $list = $sqlPlanillaDDJJ->getListarDdjjVigentePorEmpresa($id);

            $regional = $sqlRegional->getBuscarRegionalPorId($regional);
            $inputFileName = "styles".DS."documentos".DS."ddjjVigente.xlsx";

            try {
                
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
                $sheet=0;
                $index = 0;
                $row = 8;

                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,5, $regional->getCiudad());
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,5, date('d/m/Y'));
                foreach ($list as $value) {
                     
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,$row + $index, $index + 1);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,$row + $index, $value['ruex']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,$row + $index, $value['razon_social']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,$row + $index, $value['sigla']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,$row + $index, $value['descripcion']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,$row + $index, $value['nandina']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,$row + $index, $value['naladisa']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(7 ,$row + $index, $value['criterio_origen']. ' ' .$value['complemento']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,$row + $index, $value['numero_ddjj']);
                    $fechas = date('d/m/Y',strtotime($value['fecha_revision']));
                    $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(9 ,$row + $index, $dateVal);
                    $fechas = date('d/m/Y',strtotime($value['fecha_vencimiento']));
                    $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(10 ,$row + $index, $dateVal);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(11 ,$row + $index, "");
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(12 ,$row + $index, $value['observacion']);
                    $index++;
                }
                
            $fila = $row + $index -1;
                $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('f8:f'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_CONSECUTES);
                $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('j8:j'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
                $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('k8:k'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
                $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('g8:g'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_CONSECUTE);
                $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('l8:l'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
                $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
                $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
                $objPHPExcel->getProperties()->setTitle("DDJJ DE ORIGEN VIGENTES");
                $objPHPExcel->getProperties()->setSubject("");
                $objPHPExcel->getProperties()->setDescription("DDJJ DE ORIGEN VIGENTES");
                header('Content-Disposition: attachment; filename="ddjj_vigente.xls"');
                $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
                ob_end_clean();
                $objWriter->save('php://output');
            } catch(Exception $e) {
            }
            exit;
        }

        if($_REQUEST['tarea']=='lista_ddjj_vigente')
        {
           
            $sqlPlanillaDDJJ = new SQLPlanillaDDJJ();
            $planillaDDJJ = $sqlPlanillaDDJJ->getListarDdjjVigentePorEmpresa($_REQUEST['id']);
            $json_r = json_encode($planillaDDJJ); 
            echo $json_r;
            exit;
        }

        if($_REQUEST['tarea']=='ddjj_vigente')
        {
            $vista->display("admPlanilla/ddjj_vigentes.tpl");
            exit;
        }

        if($_REQUEST['tarea']=='vistadelddjj')
        {
            $vista->display("admPlanilla/planilla_delddjj.tpl");
            exit;
        }
        if($_REQUEST['tarea']=='RegistrarBajaDDJJ'){
//            print('<pre>'.print_r($_REQUEST, true).'</pre>');
            $fecha_print = date("d-m-Y");
            $date = date("Y-m-d H:i:s");
            $hora = date("H:i:s");
            $cad_acuerdos='';
            $planillaDDJJ = new PlanillaDDJJ();
            $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
            $planillaDDJJAcuerdo = new PlanillaDDJJAcuerdo();
            $planillaDDJJAcuerdo1 = new PlanillaDDJJAcuerdo();
            $sqlPlanillaDDJJAcuerdo = new SQLPlanillaDDJJAcuerdo();
            $lista=array_keys($_REQUEST);                      
            print_r($lista);
            if ($_REQUEST[$lista[10]]=='1'){
                //baja todo una declaracion jurada
                echo $_REQUEST[$lista[5]];    
                $planillaDDJJ->setId_planilla_ddjj($_REQUEST[$lista[5]]);
                $planillaDDJJ = $SQLplanillaDDJJ->getPlanillaDDJJ($planillaDDJJ);
                $planillaDDJJ->setId_estado('4');
                $planillaDDJJ = $SQLplanillaDDJJ->save($planillaDDJJ);
                $planillaDDJJAcuerdo->setId_planilla_ddjj($_REQUEST[$lista[5]]);
                $planillaDDJJAcuerdo = $sqlPlanillaDDJJAcuerdo->getListarAcuerdoPorPlanillaDDJJ($planillaDDJJAcuerdo);
                
                foreach ($planillaDDJJAcuerdo as $value) {
                    $planillaDDJJAcuerdo1 = new PlanillaDDJJAcuerdo();
                    $sqlPlanillaDDJJAcuerdo1 = new SQLPlanillaDDJJAcuerdo();
                    echo $value->getId_planilla_ddjj_Acuerdo_pln();
                    $planillaDDJJAcuerdo1->setId_planilla_ddjj_acuerdo($value->getId_planilla_ddjj_Acuerdo_pln());
                    $planillaDDJJAcuerdo1= $sqlPlanillaDDJJAcuerdo1->getPlanillaDDJJAcuerdo($planillaDDJJAcuerdo1);
                    print_r($planillaDDJJAcuerdo1);
                    $planillaDDJJAcuerdo1->setEstado('1');
                    //$planillaDDJJAcuerdo1 = $sqlPlanillaDDJJAcuerdo1->save($planillaDDJJAcuerdo1);
                    if($sqlPlanillaDDJJAcuerdo1->save($planillaDDJJAcuerdo1)){ 
                        echo 'si se pudo';
                        $cad_acuerdos=$cad_acuerdos.$value->getId_planilla_ddjj_Acuerdo_pln().',';
                    }
                    else{echo 'no si se pudo';}
                }
                
            }else{
                //baja por acuerdos
                $guardar = false;
                for ($index = 14; $index < count($lista); $index++)
                {
                    $val = explode("-", $lista[$index]);
                 
                    if($val[0]=='id_ddjj_acuerdo')
                    {
                        if($_REQUEST['chbx_delete-1-'.$val[2]]=='SI'){
                         //laurex  
                            $planillaDDJJAcuerdo1 = new PlanillaDDJJAcuerdo();
                            $sqlPlanillaDDJJAcuerdo1 = new SQLPlanillaDDJJAcuerdo();
                            $planillaDDJJAcuerdo1->setId_planilla_ddjj_acuerdo($_REQUEST['id_ddjj_acuerdo-1-'.$val[2]]);
                            $planillaDDJJAcuerdo1= $sqlPlanillaDDJJAcuerdo1->getPlanillaDDJJAcuerdo($planillaDDJJAcuerdo1);
                            print_r($_REQUEST['id_ddjj_acuerdo-1-'.$val[2]]);
                            $planillaDDJJAcuerdo1->setEstado('1');
                            //$planillaDDJJAcuerdo1 = $sqlPlanillaDDJJAcuerdo1->save($planillaDDJJAcuerdo1);
                            if($sqlPlanillaDDJJAcuerdo1->save($planillaDDJJAcuerdo1)){ 
                                echo 'si se pudo';
                                $cad_acuerdos=$cad_acuerdos.$_REQUEST['id_ddjj_acuerdo-1-'.$val[2]];
                            }
                            else{echo 'no si se pudo';}
                        }

                    }
                }
            }
            $planillaDDJJDel = new PlanillaDDJJDel();
            $sqlPlanillaDDJJADel= new SQLPlanillaDDJJDel();
            $planillaDDJJDel->setId_planilla_ddjj($_REQUEST[$lista[5]]);
            $planillaDDJJDel->setId_ddjj_acuerdos(trim($cad_acuerdos,','));
            $planillaDDJJDel->setUsuario($_SESSION['id_persona']);
            $planillaDDJJDel->setMotivo($_REQUEST[$lista[13]]);
            $planillaDDJJDel->setFecha_registro($date);
            $planillaDDJJDel->setFecha_baja($_REQUEST[$lista[14]]);
            $planillaDDJJDel->setEstado(TRUE);
            if($sqlPlanillaDDJJADel->save($planillaDDJJDel)){ 
                echo 'si se pudo';
            }
            else{
                echo 'no si se pudo';
            }
            exit;
        }
        

    }
    public function obtenerCO_Reemplazos($id_planilla_co){
        $planillaCOReemplazos = new PlanillaCOReemplazos();
        $planillaCOReemplazos->setId_planilla_co($id_planilla_co);
        
        $sqlPlanillaCO_Reemplazos = new SQLPlanillaCOReemplazos();
        $lista = $sqlPlanillaCO_Reemplazos->getListarPlanillaCOReemplazos($planillaCOReemplazos);
        
        $strJson = '';
//        print('<pre>'.print_r($lista,true).'</pre>');
        foreach ($lista as $value) {
            $strJson.='{"id":"'.$value->getId_planilla_co() . 
                        '", "control":"' . $value->getNro_control() .
                        '", "emision":"' . $value->getNro_emision().'"},';
        }
        return $strJson = substr($strJson, 0, strlen($strJson) - 1);
    }
    public function obtenerCO_DDJJ($id_planilla_co){
        
        $planillaCO_DDJJ = new PlanillaCO_DDJJ();
        $planillaCO_DDJJ->setId_planilla_co($id_planilla_co);
        $sqlPlanillaCO_DDJJ = new SQLPlanillaCO_DDJJ();
        $lista = $sqlPlanillaCO_DDJJ->getPlanillaCO_DDJJporCO($planillaCO_DDJJ);
        
        $strJson = '';
       
        foreach ($lista as $value) {
//            print("<pre>".print_r($value, true)."</pre>");
            $planillaDDJJ = new PlanillaDDJJ();
            $planillaDDJJ->setId_planilla_ddjj($value->getId_planilla_ddjj());
            $SQLplanillaDDJJ = new SQLPlanillaDDJJ();
            $planillaDDJJ = $SQLplanillaDDJJ->getPlanillaDDJJ($planillaDDJJ);
            
            $detalle_arancel = new DetalleArancel();
            $sqlDetalleArancel = new SQLDetalleArancel();
            $criterioOrigen = new CriterioOrigen_pln();
            $sqlCriterioOrigen = new SQLCriterioOrigen_pln();
            $criterio = '';
            
            $unidad_medida = new UnidadMedida();
            $sqlUnidad_medida = new SQLUnidadMedida();
            $unidad_medida->setId_Unidad_Medida($value->getUnidad());
            $unidad_medida = $sqlUnidad_medida->getBuscarDescripcionPorId($unidad_medida);
            //print("<pre>".print_r($value, true)."</pre>");
            if($value->getId_criterio()!=""){
//            if($planillaDDJJ->getId_estado() == 3){
                $criterioOrigen->setId_criterio_origen($value->getId_criterio());
                $criterioOrigen = $sqlCriterioOrigen->getBuscarDescripcionPorId($criterioOrigen);
                $criterio = $criterioOrigen->getDescripcion();
                //print("<pre>".print_r($criterio, true)."</pre>");
            }
            $detalle_arancel->setId_detalle_arancel($planillaDDJJ->getId_nandina());
            $detalle_arancel = $sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
            $strJson.='{"id":"'.$planillaDDJJ->getId_planilla_ddjj() . 
                        '", "ddjj":"' . $planillaDDJJ->getNumero_ddjj() .
                        '", "estado": "'. $planillaDDJJ->getId_estado() . 
                        '", "arancel": "'. str_replace('"', "''", $detalle_arancel->getCodigo() . ' - ' . $detalle_arancel->getDescripcion()) .
                        '", "criterio": "'. str_replace('"', "''", $criterio) .
                        '", "factura": "'. $value->getFactura() .
                        '", "fob": "$ '. floatval($value->getFob()) .
                        '", "pneto": "'. floatval($value->getPneto()) .
                        '", "observacion": "'. $value->getObservacion() .
                        '", "unidadm": "'. $unidad_medida->getDescripcion() .  //$unidad_medida->getAbreviatura() .
                        '", "descripcion_comercial":"'. $value->getDescripcion_comercial() .
                        '", "descripcion":"' . str_replace('"', "''",$planillaDDJJ->getDescripcion()).'"},';
        }
        return $strJson = substr($strJson, 0, strlen($strJson) - 1);

    }

    function dias_transcurridos($fecha_i,$fecha_f)
    {
        $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
        $dias = abs($dias); $dias = floor($dias);       
        return $dias;
    }
    	
    public function obtenerDetalleDDJJ($id_planilla_ddjj){
        //print('<pre>'.print_r($_REQUEST, true).'</pre>');
        $detallearancel = new DetalleArancel();
        $sql_detallearancel = new SQLDetalleArancel();
                
        $planillaDDJJAcuerdo = new PlanillaDDJJAcuerdo();
        $sqlPlanillaDDJJAcuerdo = new SQLPlanillaDDJJAcuerdo();
        $planillaDDJJAcuerdo->setId_planilla_ddjj($id_planilla_ddjj);
        $listar_ddjj_acuerdo = $sqlPlanillaDDJJAcuerdo->getListarAcuerdoPorPlanillaDDJJ($planillaDDJJAcuerdo);
        
        $strJson2.=''; 
        $arancel = '';
        $id_arancel = '';
        $id_criterio = '';
        $criterio_descripcion = '';
//         print("<pre>".print_r("XXXXXXXXXXXXXXXXXXXXXXX", true)."</pre>");
       // print("<pre>".print_r(count($listar_ddjj_acuerdo), true)."</pre>");
       // print("<pre>".print_r("---------", true)."</pre>");
        $index = 1;
        foreach ($listar_ddjj_acuerdo as $value_acuerdo){
//            print("<pre>".print_r($value_acuerdo, true)."</pre>");
            $index++;
                    // print('<pre>'.print_r($value_acuerdo, true).'</pre>');
            if($value_acuerdo->getId_planilla_ddjj_Acuerdo_pln()!= "" && $value_acuerdo->getId_detalle_arancel()!=""){
                $detallearancel->setId_detalle_arancel($value_acuerdo->getId_detalle_arancel());
                $detallearancel = $sql_detallearancel->getBuscarDescripcionPorId( $detallearancel );

                $arancel = $detallearancel->getCodigo();
                $id_arancel = $detallearancel->getId_detalle_arancel();
            }
            
            $acuerdo_descripcion = '';
            if($value_acuerdo->getId_Acuerdo()!=''){
                $acuerdo = new Acuerdo_pln();
                $sqlAcuerdo = new SQLAcuerdo_pln();
                $acuerdo->setId_Acuerdo($value_acuerdo->getId_Acuerdo());
                $acuerdo = $sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
                $acuerdo_descripcion = $acuerdo->getDescripcion();
            }
            if($value_acuerdo->getId_criterio()!=NULL && $value_acuerdo->getId_criterio()!=''){
                $criterio = new CriterioOrigen_pln();
                $criterio->setId_criterio_origen($value_acuerdo->getId_criterio());
                $sqlCriterio = new SQLCriterioOrigen_pln();
                $criterio = $sqlCriterio->getBuscarDescripcionPorId($criterio);
                
                $criterio_descripcion = $criterio->getDescripcion();
            }
            $id_tipo_arancel = '';  
            $tipo_arancel = '';
           
            if($value_acuerdo->getId_arancel()!=''){
                $ar = new Arancel_pln();
                $sql_ar = new SQLArancel_pln();
                $ar->setId_arancel($value_acuerdo->getId_arancel());
                $ar = $sql_ar->getBuscarArancelPorId($ar);
                $id_tipo_arancel = $value_acuerdo->getId_arancel();
                $tipo_arancel = $ar->getDenominacion();
            } else {
                $ar = new Arancel_pln();
                $sql_ar = new SQLArancel_pln();
                $ar->setId_arancel($value_acuerdo->getId_arancel());
                $ar = $sql_ar->getBuscarArancelPorId($ar);
                $id_tipo_arancel = $value_acuerdo->getId_arancel();
                $tipo_arancel = 0;
                $arancel='';
            }
            $strJson2.='{"id_planilla_ddjj_acuerdo":"'.$value_acuerdo->getId_planilla_ddjj_Acuerdo_pln() . 
                    '", "id_tipo_arancel":"'.$id_tipo_arancel.
                    '", "tipo_arancel":"'.$tipo_arancel.
                    '", "id_detalle_arancel":"'.$id_arancel.
                    '", "codigo_arancel":"'.$arancel.
                    '", "id_acuerdo":"'.$value_acuerdo->getId_Acuerdo().
                    '", "acuerdo":"'. str_replace('"',"''",$acuerdo_descripcion) .
                    '", "id_criterio":"'.$value_acuerdo->getId_criterio().
                    '", "complemento":"'.$value_acuerdo->getComplemento().
                    '", "observacion":"'.$value_acuerdo->getObservacion().
                    '", "criterio":"'. str_replace('"',"''",$criterio_descripcion) .'"},';
            
        }
        return $strJson2 = substr($strJson2, 0, strlen($strJson2) - 1);
    }
}