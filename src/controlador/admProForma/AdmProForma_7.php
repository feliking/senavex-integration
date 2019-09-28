<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 23-09-2014
 * @autor       Marcelo Ivo Sanabria RIbera
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');
 

include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavex.php');
include_once(PATH_MODELO . DS . 'SQLProForma.php');
include_once(PATH_MODELO . DS . 'SQLServicio.php');
include_once(PATH_MODELO . DS . 'SQLServicioExportador.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLDeclaracionJurada.php');
include_once(PATH_MODELO . DS . 'SQLAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLDetalleProForma.php');
include_once(PATH_MODELO . DS . 'SQLDetalleDeposito.php');
include_once(PATH_MODELO . DS . 'SQLDeposito.php');
include_once(PATH_MODELO . DS . 'SQLDdjjAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLTipoCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');

include_once(PATH_MODELO . DS . 'SQLFacturaSenavexPersona.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManual.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManualCorrelativo.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManualEstado.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManualDetalle.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManualDetalleServicio.php');
include_once(PATH_MODELO . DS . 'SQLFacturaContingenciaAutorizacion.php');
include_once(PATH_MODELO . DS . 'SQLLogs.php');

include_once(PATH_MODELO . DS . 'SQLRegional.php');

include_once(PATH_TABLA . DS . 'DdjjAcuerdo.php');
include_once(PATH_TABLA . DS . 'FacturaSenavex.php');
include_once(PATH_TABLA . DS . 'ProForma.php');
include_once(PATH_TABLA . DS . 'ServicioExportador.php');
include_once(PATH_TABLA . DS . 'Servicio.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'ProForma.php');
include_once(PATH_TABLA . DS . 'DetalleProForma.php');
include_once(PATH_TABLA . DS . 'Deposito.php');
include_once(PATH_TABLA . DS . 'DetalleDeposito.php');
include_once(PATH_TABLA . DS . 'CertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'Pais.php');

include_once(PATH_TABLA . DS . 'FacturaSenavexPersona.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexEmpresa.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManual.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManualCorrelativo.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManualEstado.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManualDetalle.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManualDetalleServicio.php');
include_once(PATH_TABLA . DS . 'FacturaContingenciaAutorizacion.php');
include_once(PATH_TABLA . DS . 'Logs.php');


include_once(PATH_TABLA . DS . 'Regional.php');

include_once('facturar.php');
include_once('imprimir.php');
//include_once('imprimir_factura_manual.php');
include_once('numeros.php');
class AdmProForma extends Principal {
    
    
    public function AdmProForma(){
        
        $vista = Principal::getVistaInstance();

        $proForma=new ProForma();
        $sqlProForma= new SQLProForma();
        
        $servicioExportador = new ServicioExportador();
        $servicio = new Servicio();
        $persona = new Persona();
        
        $sqlPersona = new SQLPersona();
        $sqlServicioExportador = new SQLServicioExportador();
        $sqlServicio = new SQLServicio();
        $detalleProforma=new DetalleProForma();
        $sqlDetalleProforma = new SQLDetalleProForma();
        
        $ddjj=new DeclaracionJurada();
        $sqlDDJJ=new SQLDeclaracionJurada();
        if($_REQUEST['tarea']=='verFacturas')
        {
            exit;
        }
        if($_REQUEST['tarea']=='listarProformas')
        {
            //$proForma->setId_empresa(2);
            $proForma->setId_empresa($_SESSION['id_empresa']);
            $proForma->setFacturado(0);
            $listaProformas=$sqlProForma->getListaProformasNoFacturadas($proForma);
            $vista->assign("listaProformas",$listaProformas);
            $vista->display("ProForma/verProFormas.tpl");
            exit;
        }
        if($_REQUEST['tarea']=='listar_facturas1')
        {
            $vista->display("FacturaSenavex/FacturasEmpresas.tpl");
            exit;
        }
        if($_REQUEST['tarea']=='list_facturas')
        {
            $facturaSenavex=new FacturaSenavex();
            $sqlFacturaSenavex=new SQLFacturaSenavex();
            $facturaSenavex->getNumero_factura();
            $empresa=new Empresa();
            
            $sqlEmpresa=new SQLEmpresa();
                
            $facturaSenavex->setImpreso(0);
            
            $salida='[';
            $list=$sqlFacturaSenavex->getListaFacturas_sinImprimir($facturaSenavex);
            //print('<pre>'.print_r($list,true).'</pre>');
            for ($index = 0; $index < count($list); $index++) 
            {
                $facturaSenavex=$list[$index];
                
                $empresa->setId_empresa($facturaSenavex->getId_empresa());
                $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
                $empresa->getNombre_Comercial();
                
                 $salida.='{"id_factura":"'.$facturaSenavex->getId_factura_senavex().'",'
                        . '"nro_factura":"'.$facturaSenavex->getNumero_factura().'",'
                        . '"nro_ruex":"'.$empresa->getRuex().'",'
                        . '"empresa":"'.$empresa->getNombre_Comercial().'",'
                        . '"monto":"'.$facturaSenavex->getTotal().'"},';
            }
            $salida = substr($salida, 0, strlen($salida) - 1);
            echo $salida.']';
            exit;
        }
        if($_REQUEST['tarea']=='buscar_factura')
        {
            $vista->display("ProForma/facturas.tpl");
            exit;
        }
        
         if($_REQUEST['tarea']=='listar_tipo_co'){
            $servicio = new Servicio();
            $sqlServicio = new SQLServicio();
            $listar = $sqlServicio->getListaCertificados($servicio);
            echo '[';
            foreach ($listar as $value){
                 $strJson.= '{"id_tipo":"'.$value->getId_servicio() . 
                            '", "descripcion":"'.$value->getDescripcion().'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        
        if($_REQUEST['tarea']=='VerificadorCO'){
            $vista->display("ProForma/verificadorCO.tpl");
            exit;
        }
        
        if($_REQUEST['tarea']=='verificarCO'){
            $fsmds = new FacturaSenavexManualDetalleServicio();
            $sql_fsmds = new SQLFacturaSenavexManualDetalleServicio();
            
            $fsmds->setFob($_REQUEST['tipo']);
            $fsmds->setNro_ctrl_1($_REQUEST['nro_ctrl']);
            
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
                
                $razon_social= '';
                $ruex = '';
                $nit = '';

                if($fsm->getVortex()==0){
                    $fsme = new FacturaSenavexEmpresa();
                    $sql_fsme = new SQLFacturaSenavexEmpresa();
                    $fsme->setId_factura_senavex_empresa($fsm->getId_empresa());
                    $fsme = $sql_fsme->getEmpresa($fsme);
                    $razon_social = $fsme->getNombre();
                    $nit = $fsme->getNit();
                    $ruex = $fsme->getRuex();
                }else{
                    $empresa = new Empresa();
                    $sql_empresa = new SQLEmpresa();
                    $empresa->setId_empresa($fsm->getId_empresa());
                    $empresa = $sql_empresa->getEmpresaPorID($empresa);
                    $razon_social = $empresa->getRazon_Social();
                    $nit = $empresa->getNit();
                    $ruex = $empresa->getRuex();
                }
                
                $servicio = new Servicio();
                $sql_servicio = new SQLServicio();
                
                $servicio->setId_servicio($fsmd->getId_servicio());
                $servicio = $sql_servicio->getBuscarServicioPorId($servicio);
                
                $dtime = strtotime($fsm->getFecha_emision());
                $newformat = date('d-m-Y',$dtime);
                
                $ttime = strtotime($fsm->getFecha_emision());
                $newtformat = date('H:i:s',$ttime);
                $dias = $this->dias_transcurridos($fsm->getFecha_emision(), date("Y-m-d H:i"));
                
                echo '[{"suceso":"1" ,"empresa":"'.$razon_social.'", "ruex":"'.$ruex.'", "nit":"'.$nit.'", "factura":"'.$fsm->getNumero_factura().'", "fecha":"'.$newformat.'", "hora":"'.$newtformat.'", "cantidad":"'.$fsmd->getCantidad().'", "nro_ctrl":"'.$_REQUEST['nro_ctrl'].'", "rango1":"'.$fsmds->getNro_ctrl_1().'","rango2":"'.$fsmds->getNro_ctrl_2().'", "tipo":"'.$servicio->getDescripcion().'", "dias":"'.$dias.'"}]';
            }else{
                echo '[{"suceso":"0" , "nro_ctrl":"'.$_REQUEST['nro_ctrl'].'"}]';
            }
            exit;
        }
        
        if($_REQUEST['tarea']=='verProforma')
        {
            /*$empresa=new Empresa();
            $sqlEmpresa=new SQLEmpresa();
            
            $empresa->setRuex($_POST['ruex']);
            $empresa=$sqlEmpresa->getEmpresaPorRUEX($empresa);*/
            //$proForma->setId_empresa($_SESSION['id_empresa']); 
            //print('<pre>'.print_r($_REQUEST,true).'<pre>');
            $proForma->setId_proforma($_REQUEST['id_proforma']);
            
            //$proForma->setFacturado(0);
            $proForma=$sqlProForma->getProForma($proForma);
            
            $array_proforma[0]=$proForma->getId_proforma();
            $array_proforma[1]=$proForma->getTotal();
            $array_proforma[2]=$proForma->getFecha();
            
            $detalleProforma->setId_proforma($proForma->getId_proforma());
            $lista=$sqlDetalleProforma->getListaDetallePorProforma($detalleProforma);
            //print('<pre>'.print_r($proForma,true).'<pre>');
            
            foreach ($lista as $value) {
                
                $s_exp=new ServicioExportador();
                $s_exp->setId_servicio_exportador($value->getId_servicio_exportador());
                $s_exp=$sqlServicioExportador->getBuscarServicioExportadorPorId($s_exp);
//                print('<pre>'.print_r($s_exp,true).'</pre>');
                
                $servicio->setId_servicio($s_exp->getId_Servicio());
                $servicio=$sqlServicio->getBuscarServicioPorId($servicio);
                
                
                $aux=array();
                $aux[1]='';
                if($s_exp->getId_servicio()==5 || $s_exp->getId_servicio()==6 )
                {
                    $co=new CertificadoOrigen();
                    $sqlCO=new SQLCertificadoOrigen();
                    $co->setId_servicio_exportador($s_exp->getId_servicio_exportador());
                    $co=$sqlCO->getCertificadoOrigenPorServicioExportador($co);
                    //print('<pre>'.print_r($co->id_tipo_co,true).'</pre>');  // 1**********************revisar ****************1//
                    
                    $tipo_co = new TipoCertificadoOrigen();
                    $tipo_co -> setId_tipo_co($co->id_tipo_co);
                    $sqlTipo_co = new SQLTipoCertificadoOrigen();
                    $tipo_co = $sqlTipo_co->getBuscarTipoCertificadoPorId($tipo_co);
                    
                    $pais = new Pais();
                    $pais->setId_pais($co->id_pais);
                    $sqlPais = new SQLPais();
                    $pais=$sqlPais->getBuscarDescripcionPorId($pais);
                    $aux[1]=$pais->nombre;
                    $array_acuerdo[count($array_acuerdo)]=$tipo_co->abreviatura;
                    $aux[2]=$array_acuerdo;
                    //print('<pre>'.print_r($aux,true).'</pre>');
                } 
                
                if($s_exp->getId_servicio()==3)
                {
                    $ddjj->setId_Servicio_Exportador($s_exp->getId_servicio_exportador());
                    $ddjj=$sqlDDJJ->getDeclaracionJuradaPorServicioExportador($ddjj);
                    
                    $array_acuerdo=array();
                    $ddjjAcuerdo= new DdjjAcuerdo();
                    $sqlDDjjAcuerdo=new SQLDdjjAcuerdo();
                    
                    $ddjjAcuerdo->setId_ddjj($ddjj->getId_ddjj());
                    $lista_ddjj_acuerdo=$sqlDDjjAcuerdo->getListarAcuerdosPorDdjj($ddjjAcuerdo);
                    //print('<pre>'.print_r($ddjj,true).'</pre>');
                    foreach ($lista_ddjj_acuerdo as $_ddjj) 
                    {
                        $acuerdo=new Acuerdo();
                        $sqlAcuerdo=new SQLAcuerdo();

                        $acuerdo->setId_Acuerdo($_ddjj->getId_Acuerdo());
                        $acuerdo=$sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
                        $array_acuerdo[count($array_acuerdo)]=$acuerdo->getSigla();
                    }
                    
                    $aux[1]=$ddjj->getDescripcion_Comercial();
                    $aux[2]=$array_acuerdo;
                }
                $aux[0]=$servicio->getDescripcion();
                $aux[3]=$s_exp->getCosto_Actual();
                $aux2[count($aux2)]=$aux;
               
            }
            $array_proforma[count($array_proforma)]=$aux2;

            $vista->assign('array_proforma',$array_proforma);
            $vista->assign("id_proforma",$_REQUEST['id_proforma']);
            $vista->display("ProForma/ProForma.tpl");
            exit;
        }
        if($_REQUEST['tarea']=='Proforma_deuda')
        {
            $empresa=new Empresa();
            $sqlEmpresa=new SQLEmpresa();
            $empresa->setId_empresa($_SESSION['id_empresa']);
            $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
            
            if(count($empresa)>0)
            {
                $proForma->setId_empresa($empresa->getId_empresa());
                $proForma->setFacturado(0);
                $listaProf=$sqlProForma->getListaProformasNoFacturadas($proForma);

                $servicioExportador->setId_empresa($empresa->getId_empresa());
                $servicioExportador->setFacturado(0);
                $lista=$sqlServicioExportador->getServiciosSinFacturar($servicioExportador);

                if(count($listaProf)==0 && count($lista)==0)
                {
                    //$vista->assign('id_persona',$_SESSION['id_persona']);
                    //$vista->assign("id_empresa",$empresa->getId_empresa());
                    //$vista->assign("id_proforma",$proForma->getId_proforma());
                    $vista->assign("titulo",'Sin Facturas Pendientes');
                    $vista->assign("aviso",'Sr Exportador, Usted no tiene Facturas pendientes. :) ');
                    $vista->display("avisos/aviso.tpl");
                }
                else
                {
                    //print('<pre>'.print_r($listaProf,true).'<pre>');
                    if(count($listaProf)>0 )
                    {
                        $prof=$listaProf[0];
                        $detalleDeposito=new DetalleDeposito();
                        $sqlDetalleDeposito=new SQLDetalleDeposito();
                        $detalleDeposito->setId_proforma($listaProf[0]->getId_proforma());
                        $listaDetallesDepositos=$sqlDetalleDeposito->getDetallePorProforma($detalleDeposito);
                        $total=0;
                        //print('<pre>'.print_r($listaDetallesDepositos,true).'<pre>');
                        $revisar=0;
                        foreach ($listaDetallesDepositos as $value) 
                        {
                            
                            $d=new Deposito();
                            $sqlDeposito=new SQLDeposito();
                            $d->setId_deposito($value->getId_deposito());
                            $d=$sqlDeposito->getDeposito($d);
                           // print('<pre>'.print_r($d,true).'<pre>');
                            if($d->getEstado()== 1)
                                $total=$total+$d->getMonto();
                            if($d->getEstado()== 0)
                                $revisar=$revisar+$d->getMonto();
                            if($d->getEstado()== 2)
                                $rechazado.= $d->getCodigo_Deposito(). ', ';
                        }
                        //echo 'proforma->total('.$prof->getTotal().')>$total('.$total.')';
                        if($prof->getTotal()>$total)
                        {
                            $vista->assign('id_persona',$_SESSION['id_persona']);
                            $vista->assign('id_empresa',$_SESSION['id_empresa']);
                            $vista->assign("id_proforma",$prof->getId_proforma());
                            $vista->assign("titulo",'Facturas Pendiente');
                            $vista->assign("aviso",'la Empresa '.$empresa->getNombre_Comercial().' con RUEX # :'.$empresa->getRuex().', Usted Posee  una factura pendiente de Bs '.$prof->getTotal().'. <br>Monto Depositos aprobados Bs '.$total.'. <br>saldo a cancelar de Bs '.($prof->getTotal()-$total). ($revisar==0 ? '':' <br>Monto Depositos en revision Bs '.$revisar));
                            $vista->display("ProForma/aviso.tpl");
                        }
                        else
                        {
                            $vista->assign("titulo",'Depositos en Revision');
                            $vista->assign("aviso",'Sr Exportador, Usted ya realizo todos los depositos, espere la validacion de los mismo.');
                            $vista->display("avisos/aviso.tpl");
                        }
                    }
                    else
                    {
                        $total=0;
                        $habilitados=0;
                        $inhabilitados=0;

                        if(count($lista)>0){
                            $array1=array();
                            foreach ($lista as $s_ex) {
                                $array1[0]=$s_ex->getId_servicio_exportador();
                                $array1[1]=$s_ex->getCosto_actual();
                                $array1[2]=$s_ex->getEstado();
                                $array1[3]=$s_ex->getFecha_servicio();

                                $servicio->setId_servicio($s_ex->getId_servicio());
                                $servicio = $sqlServicio->getBuscarServicioPorId($servicio);
                                $array1[4]=$servicio->getDescripcion();
                                //$array1[5]=$s_ex->getId_servicio();
                                $estado=1;
                                $acuerdos=array();
                                $emp='------';
                                $array1[6]=$emp;
                                if($s_ex->getId_servicio()==1) //
                                {

                                }
                                if($s_ex->getId_servicio()==2) //
                                {

                                }
                                
                                $array_acuerdo=array();
                                if($s_ex->getId_servicio()==5 || $s_ex->getId_servicio()==6 ) //
                                {
                                    //print('<pre>'.print_r($s_ex,true).'</pre>');
                                    $co=new CertificadoOrigen();
                                    $sqlCO=new SQLCertificadoOrigen();
                                    $co->setId_servicio_exportador($s_ex->getId_servicio_exportador());
                                    $co=$sqlCO->getCertificadoOrigenPorServicioExportador($co);
                                    //print('<pre>'.print_r($co->pais->nombre,true).'</pre>');
                                    $array1[6]=$co->pais->nombre;
                                   // $array_acuerdo[count($array_acuerdo)]=$co->tipo_co->getAbreviatura();
                                    //$aux[2]=$array_acuerdo;
                                }
                                if($s_ex->getId_servicio()==3) //si es ddjj
                                {
                                    $estado=1;
                                    $ddjj = new DeclaracionJurada();
                                    $sqlDDJJ = new SQLDeclaracionJurada();

                                    $acuerdo=new Acuerdo();
                                    $sqlAcuerdo=new SQLAcuerdo();
                                    //echo $s_ex->getId_servicio_exportador();
                                    $ddjj->setId_Servicio_Exportador($s_ex->getId_servicio_exportador());
                                    $ddjj=$sqlDDJJ->getDeclaracionJuradaPorServicioExportador($ddjj);


                                    //print('<pre>'.print_r($ddjj,true).'</pre>');

                                    $ddjjAcuerdo= new DdjjAcuerdo();
                                    $sqlDDjjAcuerdo=new SQLDdjjAcuerdo();

                                    $ddjjAcuerdo->setId_ddjj($ddjj->getId_ddjj());
                                    $lista_ddjj_acuerdo=$sqlDDjjAcuerdo->getListarAcuerdosPorDdjj($ddjjAcuerdo);

                                   // print('<br> LISTA DE ACUERDOS <br>');
                                    //print('<pre>'.print_r($lista_ddjj_acuerdo,true).'</pre>');
                                    foreach ($lista_ddjj_acuerdo as $_ddjj) 
                                    {
                                        //print('<pre>'.print_r($_ddjj,true).'</pre>');
                                        $acuerdob=new Acuerdo();
                                        $sqlAcuerdo=new SQLAcuerdo();


                                        $acuerdob->setId_Acuerdo($_ddjj->getId_Acuerdo());
                                        $acuerdob=$sqlAcuerdo->getBuscarAcuerdoPorId($acuerdob);

                                        $array_acuerdo[count($array_acuerdo)]=$acuerdob->getSigla();
                                        //print('<pre>'.print_r($array_acuerdo,true).'</pre>');
                                    }


                                   // foreach ($listaDDJJ as $value) {

                                        $array1[6]=$ddjj->getDescripcion_Comercial();
                                        //$acuerdo->setId_Acuerdo($value->getId_Acuerdo());
                                        //$acuerdo=$sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
                                        //print('<pre>'.print_r($value,true).'</pre>');
                                        //$acuerdos[count($acuerdos)]=$acuerdo->getSigla();
                                        //echo '<br>  estado de la declaracion ='.$ddjj->getId_estado_ddjj();
                                        if($ddjj->getId_estado_ddjj()!=1 && $ddjj->getId_estado_ddjj()!=3 && $ddjj->getId_estado_ddjj()!=6){
                                            $estado=0;
                                             //print('<pre>'.print_r($estado,true).'</pre>');
                                             //echo 'entro';
                                            //$inhabilitados+=1;
                                            //break;

                                        }
                                       // $habilitados+=1;

                                  //  }

                                    //print('<pre>'.print_r($array1[6],true).'</pre>');
                                }

                                if($estado==1)
                                {

                                    $total=$total+$array1[1];
                                    $array1[5]=$array_acuerdo;
                                    $array[count($array)]=$array1;
                                }
                            }
                            $vista->assign('id_persona',$_SESSION['id_persona']);
                            $vista->assign('id_empresa',$empresa->getId_empresa());
                            //$vista->assign("id_proforma",$proForma->getId_proforma());
                            $vista->assign("total",$total);
                            $vista->assign("listaServicios",$array);
                            $vista->display("ProForma/ProformaServicios.tpl");
                        }
                    }
                }
            }  
            else
            {
                $vista->assign("titulo",'EMPRESA FANTASMA');
                $vista->assign("aviso",'No se encuentra ninguna empresa con el RUEX Nro: '.$_REQUEST['ruex']);
                $vista->display("avisos/aviso.tpl");
            }
            exit;
        }
        if($_REQUEST['tarea']=='facturar')
        {
            $proForma->setId_empresa($_REQUEST['id_empresa']);
            $proForma->setFacturado(0);
            $proForma->setFecha(date("Y-m-d H:i"));
            $proForma->setTotal($_REQUEST['total']);
            $sqlProForma->Save($proForma);
            
            foreach ($_REQUEST['servicios'] as $value) 
            {
                $servicioExportadorb=new ServicioExportador();
                $servicioExportadorb->setId_servicio_exportador($value);
                $servicioExportadorb=$sqlServicioExportador->getBuscarServicioExportadorPorId($servicioExportadorb);
                $servicioExportadorb->setFacturado(1);
                $sqlServicioExportador->Save($servicioExportadorb);

                $detalleProforma=new DetalleProForma();
                $sqlDetalleProforma=new SQLDetalleProForma();
                $detalleProforma->setId_proforma($proForma->getId_proforma());
                $detalleProforma->setId_servicio_exportador($servicioExportadorb->getId_servicio_exportador());
                $sqlDetalleProforma->Save($detalleProforma);
            }
            echo $proForma->getId_proforma();
            exit;
            /*$vista->assign("id_persona",$_SESSION['id_persona']);
            $vista->assign("id_empresa",$_REQUEST['id_empresa']);
            $vista->assign("id_proforma",$proForma->getId_proforma());
            $vista->display("deposito/deposito.tpl");*/
        }
        if($_REQUEST['tarea']=='generarProforma')
        {
            
            //$proForma->setId_empresa($_SESSION['id_empresa']);
            $proForma->setId_empresa($_REQUEST['id_empresa']);
            $proForma->setFacturado(0);
            $listaProf=$sqlProForma->getListaProformasNoFacturadas($proForma);
            
            $servicioExportadorb=new ServicioExportador();
            $servicioExportadorb->setId_empresa($_REQUEST['id_empresa']);
            $servicioExportadorb->setFacturado(0);
            
            $lista_servicios=$sqlServicioExportador->getServiciosSinFacturar($servicioExportadorb);

            //print('<pre>'.print_r($lista_servicios).'</pre>');
            $total=0;
            
            $proForma_servicios=array();
            
            foreach($lista_servicios as $proForma_servicio){
                $estado=1;
                //var_dump($proForma_servicio);
                if($proForma_servicio->getId_servicio()==1){
                }
                if($proForma_servicio->getId_servicio()==2){
                }
                if($proForma_servicio->getId_servicio()==3){
                    
                    $ddjj = new DeclaracionJurada();
                    $sqlDDJJ = new SQLDeclaracionJurada();

                    $ddjj->setId_Servicio_Exportador($proForma_servicio->getId_servicio_exportador());
                    $ddjj=$sqlDDJJ->getDeclaracionJuradaPorServicioExportador($ddjj);
                    
                    
                    //$listaDDJJ=$sqlDDJJ->getListaDeclarcionesJuradasPorSerivicioExportador($ddjj);
                    //foreach ($listaDDJJ as $value) {
                    // print('<pre>'.print_r($ddjj,true).'</pre>');
                        if($ddjj->getId_estado_ddjj()!=1 && $ddjj->getId_estado_ddjj()!=3 && $ddjj->getId_estado_ddjj()!=6){
                            $estado=0;
                            break;
                            //echo 'break';
                        }
                    //}
                }
                if($estado==1){
                    $total=$total+$proForma_servicio->getCosto_actual();
                    //print('<pre>'.print_r($proForma_servicio,true).'</pre>');
                    $proforma_servicios[count($proforma_servicios)]=$proForma_servicio;
                }
            }
            
            $proForma->setFacturado(0);
            $proForma->setFecha(date("Y-m-d H:i"));
            
            //$proForma->setId_empresa(2);
            $proForma->setId_empresa($_REQUEST['id_empresa']);
            $proForma->setTotal($total);
            $sqlProForma->Save($proForma);
          
            foreach ($proforma_servicios as $prof_ser) {
               
                $servicioExportadorc=new ServicioExportador();
               //echo $prof_ser->getId_servicio_exportador().'<br>';
                $servicioExportadorc->setId_servicio_exportador($prof_ser->getId_servicio_exportador());
                $servicioExportadorc=$sqlServicioExportador->getBuscarServicioExportadorPorId($servicioExportadorc);
               //var_dump($servicioExportadorc);
                $servicioExportadorc->setFacturado(1);
               // print('<pre>'.print_r($prof_ser).'</pre>');
                $sqlServicioExportador->Save($servicioExportadorc);
                
                $detalleProforma=new DetalleProForma();
                $sqlDetalleProforma=new SQLDetalleProForma();
                
                $detalleProforma->setId_proforma($proForma->getId_proforma());
                $detalleProforma->setId_servicio_exportador($prof_ser->getId_servicio_exportador());
                $sqlDetalleProforma->Save($detalleProforma);
            }
           echo '[{"total":"'.$proForma->getTotal().'"}]';
           exit;
            /*$vista->assign("titulo",'FACTURA PROFORMA N°'.$proForma->getId_proforma());
            $vista->assign("aviso",'Sr Exportador, Usted debe realizar un deposito de :'.$total. " Bs, a la cuenta 1-0000003433658 del Banco Union ");
            $vista->display("avisos/aviso.tpl");*/
        }
        if($_REQUEST['tarea']=='imprimirPDF')
        {
           // print('<pre>'.print_r($_SESSION,true).'</pre>');
            //print('<pre>'.print_r($_REQUEST,true).'</pre>');
            $proForma=new $proForma();
            $sqlProForma=new SQLProForma();
            
            $facturaSenavex=new FacturaSenavex();
            $sqlfacturaSenavex=new SQLFacturaSenavex();
            
            $facturaSenavex->setId_factura_senavex($_REQUEST['id_factura']);
            $facturaSenavex=$sqlfacturaSenavex->getFacturaSenavex($facturaSenavex);
            
            
            $detalleProforma=new DetalleProForma();
            $sqlDetalleProForma=new SQLDetalleProForma();
            //print('<pre>'.print_r($facturaSenavex,true).'</pre>');
            $proForma->setId_proforma($facturaSenavex->getId_proforma());
            $proForma=$sqlProForma->getProForma($proForma);
            //print('<pre>'.print_r($proForma,true).'</pre>');
            
            $empresa = new Empresa();
            $empresa->setId_empresa($facturaSenavex->getId_empresa());
            $sqlEmpresa = new SQLEmpresa();
            $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
            //print('<pre>'.print_r($empresa,true).'</pre>');
             
            $detalleProforma->setId_proforma($facturaSenavex->getId_proforma());
            $lista=$sqlDetalleProForma->getListaDetallePorProforma($detalleProforma);
            //print('<pre>'.print_r($lista,true).'</pre>');

            $listaServicios = array();
            $listaCantidad = array();
            $listaPrecios = array();
            $listaPreciosTotal =array();
            
            foreach ($lista as $proforma_servicio) {
                
                
                $s_exportador=new ServicioExportador();
                $sqlServicioExportador=new SQLServicioExportador();
                
                $s_exportador->setId_servicio_exportador($proforma_servicio->getId_servicio_exportador());
                $s_exportador=$sqlServicioExportador->getBuscarServicioExportadorPorId($s_exportador);
                
                //print('<pre>'.print_r($s_exportador,true).'</pre>');
                
                $servicio=new Servicio();
                $sqlServicio=new SQLServicio();
                
                $servicio->setId_servicio($s_exportador->getId_Servicio());
                $servicio=$sqlServicio->getBuscarServicioPorId($servicio);
                //print('<pre>'.print_r($s_exportador,true).'</pre>');
                /*if($s_exportador->getId_Servicio()==1){ //empresa temporal
                    
                }
                if($s_exportador->getId_Servicio()==2){ //Aprobacion Documentos RUEX
                    
                }
                if($s_exportador->getId_Servicio()==4){ //empresa temporal
                    
                }
                if($s_exportador->getId_Servicio()==5){ //empresa temporal
                    
                }
                if($s_exportador->getId_Servicio()==5 || $s_exportador->getId_Servicio()==6){

                }*/
                
                if($s_exportador->getId_Servicio()!=3 && $s_exportador->getId_Servicio()!=5 && $s_exportador->getId_Servicio()!=6 ){
                    $listaServicios[$s_exportador->getId_servicio()]=$servicio->getDescripcion();
                    $listaCantidad[$s_exportador->getId_servicio()]+=1;
                    $listaPrecios[$s_exportador->getId_servicio()]=$servicio->getCosto();
                    $listaPreciosTotal[$s_exportador->getId_servicio()]=$listaPreciosTotal[$s_exportador->getId_servicio()]+$servicio->getCosto();
                }
                if($s_exportador->getId_Servicio()==5 || $s_exportador->getId_Servicio()==6){
                    $co=new CertificadoOrigen();
                    $sqlCO=new SQLCertificadoOrigen();
                    $co->setId_servicio_exportador($s_exportador->getId_servicio_exportador());
                    $co=$sqlCO->getCertificadoOrigenPorServicioExportador($co);
                    
                    
                    /*$aux[1]=$co->pais->getNombre();
                    $array_acuerdo[count($array_acuerdo)]=$co->tipo_co->getAbreviatura();
                    $aux[2]=$array_acuerdo;*/
                    
                    $index=$s_exportador->getId_servicio()*10+$co->tipo_co->getId_tipo_co();
                    //print('<pre>'.print_r($index,true).'</pre>');
                    $listaServicios[$index]=$servicio->getDescripcion(). ' '.$co->tipo_co->getAbreviatura();
                    $listaCantidad[$index]=$listaCantidad[$index]+0+1;
                    $listaPrecios[$index]=$servicio->getCosto();
                    $listaPreciosTotal[$index]=$listaPreciosTotal[$index]+$servicio->getCosto();
                }
                if($s_exportador->getId_Servicio()==3){ //Revisión Declaración Jurada
                    $ddjj=new DeclaracionJurada();
                    $sqlDDJJ=new SQLDeclaracionJurada();
                    $ddjj->setId_Servicio_Exportador($s_exportador->getId_servicio_exportador());
                    $ddjj=$sqlDDJJ->getDeclaracionJuradaPorServicioExportador($ddjj);

                    $array_acuerdo=array();
                    $ddjjAcuerdo= new DdjjAcuerdo();
                    $sqlDDjjAcuerdo=new SQLDdjjAcuerdo();

                    $ddjjAcuerdo->setId_ddjj($ddjj->getId_ddjj());
                    $lista_ddjj_acuerdo=$sqlDDjjAcuerdo->getListarAcuerdosPorDdjj($ddjjAcuerdo);
                    //print('<pre>'.print_r($ddjj,true).'</pre>');
                    foreach ($lista_ddjj_acuerdo as $_ddjj) 
                    {
                        $acuerdo=new Acuerdo();
                        $sqlAcuerdo=new SQLAcuerdo();
                        $acuerdo->setId_Acuerdo($_ddjj->getId_Acuerdo());
                        $acuerdo=$sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
                       // $array_acuerdo[count($array_acuerdo)]=$acuerdo->getSigla();

                        $servicio->setId_servicio($s_exportador->getId_Servicio());
                        $servicio=$sqlServicio->getBuscarServicioPorId($servicio);
//                        print('<pre>'.print_r('id servicio ='.$s_exportador->getId_servicio()." -- Id Acuerdo=".$acuerdo->getId_Acuerdo(). ' -- id Servicio exportador='.$s_exportador->getId_servicio_exportador(). ' -- costo servicio='.$servicio->getCosto(),true).'</pre>');
                        $listaServicios[$s_exportador->getId_servicio()*10+$acuerdo->getId_Acuerdo()]=$servicio->getDescripcion() .' '. $acuerdo->getSigla();
                        $listaCantidad[$s_exportador->getId_servicio()*10+$acuerdo->getId_Acuerdo()]=$listaCantidad[$s_exportador->getId_servicio()*10+$acuerdo->getId_Acuerdo()]+0+1;
                        $listaPrecios[$s_exportador->getId_servicio()*10+$acuerdo->getId_Acuerdo()]=$servicio->getCosto();
                        
                        $listaPreciosTotal[$s_exportador->getId_servicio()*10+$acuerdo->getId_Acuerdo()]=
                        $listaPreciosTotal[$s_exportador->getId_servicio()*10+$acuerdo->getId_Acuerdo()]+$servicio->getCosto();
                    }
                }
            }
//            print('<pre>'.print_r($listaServicios,true).'</pre>');
//            print('<pre>'.print_r($listaCantidad,true).'</pre>');
//            print('<pre>'.print_r($listaPrecios,true).'</pre>');
//            print('<pre>'.print_r($listaPreciosTotal,true).'</pre>');
            $pdf = new PDF();
            $pdf->AddPage();
            $literal=numtoletras($facturaSenavex->getTotal());
            $pdf->Cabecera($facturaSenavex->getCodigo_qr(),NIT,$facturaSenavex->getId_factura_senavex(),$autorizacion);
            //$pdf->Body($empresa->getNit(),$empresa->getRazon_Social(),$facturaSenavex->getFecha_emision(),$listaServicios,$literal,$facturaSenavex->getTotal());
            $pdf->Body($empresa->getNit(),$empresa->getRazon_Social(),$facturaSenavex->getFecha_emision(),$listaServicios,$listaCantidad,$listaPrecios,$listaPreciosTotal,$literal,$facturaSenavex->getTotal());
            $pdf->Pie($facturaSenavex->getCodigo_control(),$facturaSenavex->getFecha_limite());
            $pdf->Output(date('d-m-y').'-factura'.'.pdf','I');
            exit;
        }
        if($_REQUEST['tarea']=='factura_manual')
        {
            //print('<pre>'.print_r($_SESSION,true).'</pre>');
            $regional = new Regional();
            $sqlRegional = new SQLRegional();
            $listaRegionales = $sqlRegional->getListarRegionales($regional,false);
            
            
            $servicio=new Servicio();
            $sqlServicio=new SQLServicio();
            $servicio->setId_Categoria_Servicio(6);
            $lista=$sqlServicio->getListaServiciosPorCategoria($servicio);
            //$fmsucursal = $_SESSION['id_empresa_persona'];
            $ep=new EmpresaPersona();
            $sqlep = new SQLEmpresaPersona();
            $ep->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $ep=$sqlep->getEmpresaPersonaPorID($ep);
            $fmsucursal = $ep->getId_regional();
            $regional->setId_regional($fmsucursal);
            $regional=$sqlRegional->getBuscarRegionalPorId($regional);
//            print('<pre>'.print_r($this->loadServicios($_REQUEST['']),true).'</pre>');
            
            $fsmc = new FacturaSenavexManualCorrelativo();
            $fsmc->setActivo(1);
            $sql_fsmc = new SQLFacturaSenavexManualCorrelativo();
            $fsmc = $sql_fsmc->getCorrelativoActivo($fsmc);
            
            $date1 = new DateTime("now");
            $date2 = DateTime::createFromFormat('Y-m-d', $fsmc->getFecha_fin());
            $dias_dosificacion = intval(date_diff($date1,$date2)->format('%a')) * (date_diff($date1,$date2)->format('%R')=='-'? -1: 1);
           
            $vista->assign('dias_dosificacion', $dias_dosificacion);
            $vista->assign('servicios',$lista); 
            $vista->assign('listaRegionales',$listaRegionales);
            $vista->assign('fmsucursal',$fmsucursal);
            $vista->assign('fmsucursalnombre',$regional->getCiudad());
            $vista->display("ProForma/factura_manual.tpl");
            exit;
             
        }
        if($_REQUEST['tarea']=='precio_servicio'){
            $servicio=new Servicio();
            $sqlServicio=new SQLServicio();
            $servicio->setId_servicio($_REQUEST['id_servicio']);
            $servicio= $sqlServicio->getBuscarServicioPorId($servicio);
            echo $servicio->getCosto();
            exit;
        }
        if($_REQUEST['tarea']=='registroEmpresaPersona')
        {
            $vista->display("ProForma/factura_registroEmpresaPersona.tpl");
            exit;
        }
        
        if($_REQUEST['tarea']=='factura_senavex_persona'){
            $facturaSenavexPersona=new FacturaSenavexPersona();
            $sqlfacturaSenavexPersona = new SQLFacturaSenavexPersona();
            $facturaSenavexPersona->setCi($_REQUEST['ci']);
            $facturaSenavexPersona=$sqlfacturaSenavexPersona->getPersonaPorCI($facturaSenavexPersona);
            if(empty($facturaSenavexPersona)==true){
                echo '-1';
                //print('<pre>'.print_r($_REQUEST,true).'</pre>');
            }else{
                echo '[';
                echo '{"id":"'.$facturaSenavexPersona->getId_factura_senavex_persona().'",'
                    .'"ci":"'.$facturaSenavexPersona->getCi().'",'
                    .'"nombre":"'.$facturaSenavexPersona->getNombres().' '.$facturaSenavexPersona->getApellido_paterno().' '.$facturaSenavexPersona->getApellido_materno().'"}';
                echo ']';
            }
            exit;
        }
        if($_REQUEST['tarea']=='factura_senavex_empresa'){
            $facturaSenavexEmpresa=new FacturaSenavexEmpresa();
            $sqlFacturaSenavexEmpresa = new SQLFacturaSenavexEmpresa();
            $facturaSenavexEmpresa->setNit($_REQUEST['nit']);
            $facturaSenavexEmpresa=$sqlFacturaSenavexEmpresa->getEmpresaPorNIT($facturaSenavexEmpresa);
            //print('<pre>'.print_r($_REQUEST,true).'</pre>'); 
            if(empty($facturaSenavexEmpresa)==true){
                echo '-1';
            }else{
                echo '[';
                echo '{"id":"'.$facturaSenavexEmpresa->getId_factura_senavex_empresa().'",'
                    .'"nombre":"'.$facturaSenavexEmpresa->getNombre().'"}';
                echo ']';
            }
            exit;
        }

        if($_REQUEST['tarea']=='prueba'){
            print('<pre>'.print_r($_REQUEST,true).'</pre>');
            exit();
        }
        if($_REQUEST['tarea']=='generar_factura_manual'){
           
            $swrecibo=false;
            $swfactura=false;
            $lista=array_keys($_REQUEST);
            $facturaSenavexManual = new FacturaSenavexManual();
            $sqlFacturaSenavexManual = new SQLFacturaSenavexManual();
            $facturaSenavexManual->setEstado(2);
            $facturaSenavexManual->setFecha_emision(date('Y-m-d H:i:s')); 
           // $facturaSenavexManual->setFecha_limite(date('Y-m-d', strtotime("+60 days")));
            $facturaSenavexManual->setId_asistente($_SESSION['id_persona']);
            $facturaSenavexManual->setId_regional($_REQUEST['fmsucursal']);
            //$facturaSenavexManual->setNumero_autorizacion(AUTORIZACION);
            if($_REQUEST['vortex']==1){
                $facturaSenavexManual->setId_empresa($_REQUEST['empresa_id']);
                $facturaSenavexManual->setId_persona($_REQUEST['ci_combo']);
            }else{
                $empresa_x = $this->getEmpresa($_REQUEST['nit']);
                $persona_x = $this->getPersona($_REQUEST['ci']);

                $facturaSenavexManual->setId_empresa($empresa_x->getId_factura_senavex_empresa());
                $facturaSenavexManual->setId_persona($persona_x->getId_factura_senavex_persona());
            }
            $facturaSenavexManual->setVortex($_REQUEST['vortex']);
            $facturaSenavexManual->setTotal($_REQUEST['total_facturar']);
            $facturaSenavexManual->setNumero_factura(-1);
            $facturaSenavexManual->setNumero_recibo(-1);
            $sqlFacturaSenavexManual->Save($facturaSenavexManual);
            $id_factura_senavex_manual = $facturaSenavexManual->getId_factura_senavex_manual(); 

            
            $suma=0;
            for ($index = 3; $index < count($lista); $index++) {
                $val = explode("-", $lista[$index]);
                $num = explode("_",$val[1]);
                $id_servicio = $_REQUEST['servicio-'.$num[0]];
                $deposito = explode('-',$lista[$index]);
                if($deposito[0]=='numero'){
                    $fmDeposito = new Deposito();
                    $sqlfmDeposito = new SQLDeposito();
                    $fmDeposito->setEstado(0);
                    if($_REQUEST['vortex']==1){
                        $fmDeposito->setId_Empresa($facturaSenavexManual->getId_empresa());
                        $fmDeposito->setId_Persona($facturaSenavexManual->getId_persona());
                    }else{
                        $fmDeposito->setId_Empresa($empresa_x->getId_factura_senavex_empresa());
                        $fmDeposito->setId_Persona($persona_x->getId_factura_senavex_persona());
                    }
                    $fmDeposito->setCodigo_Deposito($_REQUEST[$lista[$index]]);
                    $index++;
                    $fmDeposito->setFecha_Deposito($_REQUEST[$lista[$index]]);
                    $index++;
                    $fmDeposito->setMonto($_REQUEST[$lista[$index]]);
                    $index++;                    
                    if($_REQUEST[$lista[$index]]=='on'){
                        $index++;
                        $index++;
                        $fmDeposito->setDescripcion($_REQUEST[$lista[$index]]);
                        $fmDeposito->setEstado(4);
                    }
                    $fmDeposito->setId_factura($id_factura_senavex_manual);
                    try {
                        $sqlfmDeposito->Save($fmDeposito);
                    } catch (Exception $ex) {
                        return '-1:Error con el deposito';
                    }
                }
//                print('<pre>'.print_r('['.$index.']'.$lista[$index].' = '.$_REQUEST[$lista[$index]], true).'</pre>');
                if($val[0]=='serexp'){
//                    print('<pre>'.print_r('entro a serexp', true).'</pre>');
//                    print('<pre>'.print_r('['.$index.']'.$lista[$index].' = '.$_REQUEST[$lista[$index]], true).'</pre>');
                    $facturaSenavexManual->setVortex(1);
                    $sqlFacturaSenavexManual->Save($facturaSenavexManual);
                    
                    $sqlServicioExportador = new SQLServicioExportador();
                    $servicioExportador = new ServicioExportador();
                    $servicioExportador->setId_servicio_exportador($val[1]);
                    $servicioExportador = $sqlServicioExportador->getBuscarServicioExportadorPorId($servicioExportador);
                    $servicioExportador->setFacturado(1);
                    $sqlServicioExportador->Save($servicioExportador);
                    $sqlFacturaSenavexManualDetalle = new SQLFacturaSenavexManualDetalle();
                    $facturaSenavexManualDetalle = new FacturaSenavexManualDetalle();
                    $facturaSenavexManualDetalle->setId_servicio($servicioExportador->getId_servicio_exportador());
                    $facturaSenavexManualDetalle->setCantidad(1);
                    $facturaSenavexManualDetalle->setVortex(1);
                    $facturaSenavexManualDetalle->setPrecio($servicioExportador->getCosto_Actual());
                    $facturaSenavexManualDetalle->setId_factura_senavex_manual($id_factura_senavex_manual);
                    $sqlFacturaSenavexManualDetalle->Save($facturaSenavexManualDetalle);
                    $swfactura=true;
                    continue;
                }
                //if(false){ 
                if($val[0]=='servicio' && count($num)==1){
//                    print('<pre>'.print_r('['.$index.']'.$lista[$index].' = '.$_REQUEST[$lista[$index]], true).'</pre>');
                    $cantidad = $_REQUEST['cantidad-tipo_campo-'.$num[0]];
                    $servicio = $this->getServicio($id_servicio); 
                    $facturaSenavexManualDetalle = new FacturaSenavexManualDetalle();
                    $sqlFacturaSenavexManualDetalle = new SQLFacturaSenavexManualDetalle();
                    $facturaSenavexManualDetalle->setId_servicio($id_servicio);
                    $facturaSenavexManualDetalle->setCantidad($cantidad);
                    $facturaSenavexManualDetalle->setPrecio($servicio->getCosto());
                    $facturaSenavexManualDetalle->setVortex(0);
                    $facturaSenavexManualDetalle->setId_factura_senavex_manual($id_factura_senavex_manual);
                    $sqlFacturaSenavexManualDetalle->Save($facturaSenavexManualDetalle);
                    $sqlFacturaSenavexManualDetalleServicio = new SQLFacturaSenavexManualDetalleServicio();
                    $facturaSenavexManualDetalleServicio = new FacturaSenavexManualDetalleServicio();
                    $facturaSenavexManualDetalleServicio->setId_factura_senavex_manual_detalle($facturaSenavexManualDetalle->getId_factura_senavex_manual_detalle());
                    
                    if($id_servicio >= 11 && $id_servicio <= 16){ //Venta
                        $swfactura=true;
                        $index+= 2;
                        $index1 = $index;
                        $var1= explode("-", $lista[$index]);
                        while($var1[0]=='cantidadventa'){
                            $icontrol = $_REQUEST['icontrol-'.$var1[1].'-'.$var1[2]];
                            $fcontrol = $_REQUEST['fcontrol-'.$var1[1].'-'.$var1[2]];
                            $diferencia = intval($fcontrol) - intval($icontrol);
                            $cantidadDif = $cantidad - $diferencia - 1;
                            if($cantidadDif>0){
                                $facturaSenavexManualDetalle->setCantidad($cantidadDif);
                                $sqlFacturaSenavexManualDetalle->Save($facturaSenavexManualDetalle);
                            }
                            
                            $facturaSenavexManualDetalleServicio = new FacturaSenavexManualDetalleServicio();
                            $facturaSenavexManualDetalleServicio->setId_factura_senavex_manual_detalle($facturaSenavexManualDetalle->getId_factura_senavex_manual_detalle());
                            $facturaSenavexManualDetalleServicio->setNro_ctrl_1($icontrol);
                            $facturaSenavexManualDetalleServicio->setNro_ctrl_2($fcontrol);
                            $sqlFacturaSenavexManualDetalleServicio->save($facturaSenavexManualDetalleServicio);
                            $index+=3;
                            $var1= explode("-", $lista[$index]);
                        
                            if( $var1[0]=='cantidadventa'){
                                $facturaSenavexManualDetalle = new FacturaSenavexManualDetalle();
                                $facturaSenavexManualDetalle->setPrecio($servicio->getCosto());
                                $facturaSenavexManualDetalle->setVortex(0);
                                $facturaSenavexManualDetalle->setId_factura_senavex_manual($id_factura_senavex_manual);
                                $facturaSenavexManualDetalle->setId_servicio($id_servicio);
                            }
                        }
                    }
                    
                    if($id_servicio >= 22 && $id_servicio <= 52){//Emision
//                        print('<pre>'.print_r('['.$index.']'.$lista[$index].' = '.$_REQUEST[$lista[$index]], true).'</pre>');
                        $swfactura=true;
                        $index+= 2;
                        $index1 = $index;
                        for ($index = $index1 ; $index < ($index1 + $cantidad * 2) ; $index+=2) {
                            $var1= explode("-", $lista[$index]);
                            $fobemision = $_REQUEST['fobemision-'.$var1[1].'-'.$var1[2]];
                            $control_e = $_REQUEST['controlemision-'.$var1[1].'-'.$var1[2]];
                            $facturaSenavexManualDetalleServicio = new FacturaSenavexManualDetalleServicio();
                            $facturaSenavexManualDetalleServicio->setId_factura_senavex_manual_detalle($facturaSenavexManualDetalle->getId_factura_senavex_manual_detalle());
                            $facturaSenavexManualDetalleServicio->setFob($fobemision);
                            $facturaSenavexManualDetalleServicio->setNro_ctrl_1($control_e);
                            $sqlFacturaSenavexManualDetalleServicio->save($facturaSenavexManualDetalleServicio);
                        }
                    }
                    if($id_servicio >= 53 && $id_servicio <= 58){//Venta unica - reposicion
                        $swrecibo=true;
                        $index+=2;
                        $var1= explode("-", $lista[$index]);
                        $icontrol = $_REQUEST['icontrol-'.$var1[1].'-'.$var1[2]];
                        $index++;
                        $fcontrol = $_REQUEST['fcontrol-'.$var1[1].'-'.$var1[2]]; 
                        $index++;
                        $tipoerror =  $_REQUEST['tipoerror-'.$var1[1].'-'.$var1[2]];
                        $facturaSenavexManualDetalleServicio->setNro_ctrl_1($icontrol);
                        $facturaSenavexManualDetalleServicio->setNro_ctrl_2($fcontrol);
                        $facturaSenavexManualDetalleServicio->setReposicion_razon($tipoerror);
                        $sqlFacturaSenavexManualDetalleServicio->save($facturaSenavexManualDetalleServicio); 
                    }
                    if(($id_servicio >= 59 && $id_servicio <= 60) || $id_servicio == 4){//sin subcampos
                        $swfactura=true;
                        $index+=2;
                    }
                    if($id_servicio >= 61 && $id_servicio <= 72 && $id_servicio!=67){//cantidad
                        $swfactura=true;
                        $index+=2;
                        $facturaSenavexManualDetalle->setCantidad($_REQUEST[$lista[$index]]);
                        $sqlFacturaSenavexManualDetalle->Save($facturaSenavexManualDetalle);
                    }
                    if($id_servicio == 67){//centro publico
                        $swfactura=true;
                        $index+= 2;
                        $index1 = $index;
                        for ($indexx = $index1 ; $indexx < ($index1 + ($cantidad * 4)) ; $indexx+=4) {
                            $var1= explode("-", $lista[$indexx+1]);
                            $hora=($_REQUEST['hora-'.$var1[1].'-'.$var1[2]]) * 60;
                            $minuto=($_REQUEST['minuto-'.$var1[1].'-'.$var1[2]]) * 15 + 15;
                            $facturaSenavexManualDetalleServicio->setMinutos($hora + $minuto);
                            $sqlFacturaSenavexManualDetalleServicio->save($facturaSenavexManualDetalleServicio);
                        }
                    }
                } 
            }
            $fecha=substr($facturaSenavexManual->getFecha_emision(), 0, 10);
            if($_REQUEST['vortex']==1){
                $empresa = new Empresa();
                $sqlEmpresa = new SQLEmpresa();
                $empresa->setId_empresa($_REQUEST['empresa_id']);
                $empresa = $sqlEmpresa->getEmpresaPorID($empresa);
                $nit = $empresa->getNit();
            }else{
                $nit=$_REQUEST['nit'];
            }
            $total=$_REQUEST['total_facturar'];
            $fact = $facturaSenavexManual->getNumero_factura();
            
            $facturar = new facturar();
            $fcorrelativo=new FacturaSenavexManualCorrelativo();
            $sqlFCorrelativo = new SQLFacturaSenavexManualCorrelativo();
            
            if($swfactura){
               if($_REQUEST['chx_fmcontingencia']!='on'){
                    //$fcorrelativo->setId_factura_senavex_manual_correlativo(1);
                    $fcorrelativo->setActivo(1);
                    $fcorrelativo = $sqlFCorrelativo->getCorrelativoActivo($fcorrelativo);
                    $fcorrelativo->setCorrelativo($fcorrelativo->getCorrelativo()+1);
                    $sqlFCorrelativo->Save($fcorrelativo);
                    $facturaSenavexManual->setNumero_factura($fcorrelativo->getCorrelativo());
                    $fact = $facturaSenavexManual->getNumero_factura();
                    $key = $fcorrelativo->getLlave();
                    $autorizacion = $fcorrelativo->getAutorizacion();
                    $facturaSenavexManual->setNumero_autorizacion($autorizacion);
                    $facturaSenavexManual->setFecha_limite($fcorrelativo->getFecha_fin());
                }else{
                    $facturaSenavexManual->setNumero_factura($_REQUEST['fmc_nro']);
                    $facturaSenavexManual->setFecha_emision($_REQUEST['fmc_fecha']);
                    $facturaSenavexManual->setFecha_limite($_REQUEST['fmc_fecha_limite']);
                    $facturaSenavexManual->setNumero_autorizacion($_REQUEST['fmc_autorizacion']);
                    $facturaSenavexManual->setEstado(5);
                }
            }
            if($swrecibo){
                $fcorrelativo->setId_factura_senavex_manual_correlativo(2);
                $fcorrelativo = $sqlFCorrelativo->getCorrelativo($fcorrelativo);
                $fcorrelativo->setCorrelativo($fcorrelativo->getCorrelativo()+1);
                $sqlFCorrelativo->Save($fcorrelativo);
                $facturaSenavexManual->setNumero_recibo($fcorrelativo->getCorrelativo());
               
            }
            if($_REQUEST['chx_fmcontingencia']!='on'){
                $time = strtotime($fecha);
                $newformat = date('Ymd',$time);
                $facturaSenavexManual->setCodigo_control($facturar->codControl((string)$fact,(string)$nit,(string)$newformat,(string)(round($total)),(string)$key,(string)$autorizacion));
                $facturaSenavexManual->setCodigo_qr(NIT.'|'.$fact.'|'.$autorizacion.'|'.$fecha.'|'.$total.'|'.$total.'|'. $facturaSenavexManual->getCodigo_control().'|'.$nit.'|'. 0.0 .'|'. 0.0 . '|'. 0.0. '|'. 0.0 );
            }
            $sqlFacturaSenavexManual->Save($facturaSenavexManual);
            //$this->verFactura($facturaSenavexManual->getId_factura_senavex_manual());
            echo $facturaSenavexManual->getId_factura_senavex_manual();
            exit;
           // $this->verFactura(48);
        }
        if($_REQUEST['tarea']=='listar_facturas'){
            $estado=empty($_REQUEST['estado']) ? 2 : $_REQUEST['estado'];
            $fmEstado = new FacturaSenavexManualEstado();
            $sqlfmEstado = new SQLFacturaSenavexManualEstado();
            
            $factura_recibo=empty($_REQUEST['factura_recibo']) ? 0 : $_REQUEST['factura_recibo'];
            $vista->assign('factura_recibo',$factura_recibo);
            $vista->assign("listaEstados",$sqlfmEstado->listEstados($fmEstado));
            $vista->assign("estado",$estado);
            $vista->display("ProForma/factura_manual_lista.tpl");
            exit;
        }
        if($_REQUEST['tarea']=='list_factura_manual'){
            $estado=empty($_REQUEST['estado']) ? 2 : $_REQUEST['estado'];
            $factura_recibo=empty($_REQUEST['factura_recibo']) ? 0 : $_REQUEST['factura_recibo'];
//            print('<pre>'.print_r($_REQUEST,true).'</pre>');
            $sqlFacturaSenavexManual = new SQLFacturaSenavexManual();
            $facturaSenavexManual = new FacturaSenavexManual();
            $facturaSenavexManual->setEstado($estado);
            
            $empresa_persona = new EmpresaPersona();
            $sqlEmpresa_persona = new SQLEmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $empresa_persona=$sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
            
            $facturaSenavexManual->setId_regional($empresa_persona->getId_regional());
            
            $fcorrelativo=new FacturaSenavexManualCorrelativo();
            $sqlFCorrelativo = new SQLFacturaSenavexManualCorrelativo();
            $fcorrelativo->setActivo(1);
            $fcorrelativo = $sqlFCorrelativo->getCorrelativoActivo($fcorrelativo);
            $facturaSenavexManual->setNumero_autorizacion($fcorrelativo->getAutorizacion());
            if($factura_recibo==0){
                $lista = $sqlFacturaSenavexManual->ListFacturaManualEstadoAutorizacion($facturaSenavexManual, $fcorrelativo->getFecha_inicio(), $fcorrelativo->getFecha_fin());
            }else {
                $lista = $sqlFacturaSenavexManual->ListReciboManualEstadoAutorizacion($facturaSenavexManual);
            }
            
           // print('<pre>'.print_r($lista,true).'</pre>');exit;
            $strJson = '';
            echo '[';
            foreach ($lista as $value){
//                print('<pre>'.print_r($value,true).'</pre>');
                $fmempresa = new FacturaSenavexEmpresa();
                if($value->getVortex()==1){
                    $empresa = new Empresa();
                    $sqlEmpresa= new SQLEmpresa();
                    $empresa->setId_empresa($value->getId_empresa());
                    $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
                    $fmempresa->setNombre($empresa->getRazon_Social());
                }else{
                    $sqlfmEmpresa = new SQLFacturaSenavexEmpresa();
                    $fmempresa->setId_factura_senavex_empresa($value->getId_empresa());
                    $fmempresa= $sqlfmEmpresa->getEmpresa($fmempresa);
                }
////                print('<pre>'.print_r($empresa,true).'</pre>');exit;
                $strJson .= '{"id_factura":"' . $value->getId_factura_senavex_manual() .
                 '","nro_factura":"' . ($factura_recibo==0 ? $value->getNumero_factura() : $value->getNumero_recibo()) .
                 '","nombre":"' . $fmempresa->getNombre().
                 '","fecha_emision":"' . substr( $value->getFecha_emision(), 0, 10 ) .
                 '","estado":"' . $value->getEstado() .
                 '","total":"' . $value->getTotal() . '"},';
                
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='cambiar_estado_factura'){
            try {
                $facturaSenavexManual = new FacturaSenavexManual();
                $sqlFacturaSenavexManual = new SQLFacturaSenavexManual();
                $facturaSenavexManual->setId_factura_senavex_manual($_REQUEST['id_factura']);
                $facturaSenavexManual=$sqlFacturaSenavexManual->getFacturaManualPorID($facturaSenavexManual);
                $facturaSenavexManual->setEstado($_REQUEST['estado']);
                $facturaSenavexManual->setDescripcion($_REQUEST['cambio_descripcion']);
                $sqlFacturaSenavexManual->Save($facturaSenavexManual);
                echo $facturaSenavexManual->getId_factura_senavex_manual();
            } catch (Exception $exc) {
                echo '-1';
            }
            exit;
            
        }
        if($_REQUEST['tarea']=='mostrar_factura_manual'){
            $this->verFactura($_REQUEST['id_factura'],$_REQUEST['estado']);
            exit;
        }
        if($_REQUEST['tarea']=='editar_factura_manual'){
            
            $facturaSenavexManual = new FacturaSenavexManual();
            $sqlFacturaSenavexManual = new SQLFacturaSenavexManual();
            $facturaSenavexManual->setId_factura_senavex_manual($_REQUEST['id_factura']);
            $facturaSenavexManual=$sqlFacturaSenavexManual->getFacturaManualPorID($facturaSenavexManual);
            $fact =$facturaSenavexManual->getNumero_factura();

            $regional = new Regional();
            $sqlRegional = new SQLRegional();
            $regional->setId_regional($facturaSenavexManual->getId_regional());
            $regional = $sqlRegional->getBuscarRegionalPorId($regional);

            $sucursal='SUCURSAL - '.$regional->getSucursal().'|'.$regional->getDireccion().'|(Zona '.$regional->getZona().')|'.$regional->getCiudad().' - Bolivia';
            // obtenemos la empresa
            
            $facturaSenavexEmpresa = new FacturaSenavexEmpresa();
            $sqlFacturaSenavexEmpresa = new SQLFacturaSenavexEmpresa();
            if($facturaSenavexManual->getVortex()==1){
                $empresa = new Empresa();
                $empresa->setId_empresa($facturaSenavexManual->getId_empresa());
                $sqlEmpresa= new SQLEmpresa();
                $empresa = $sqlEmpresa->getEmpresaPorID($empresa);
                $facturaSenavexEmpresa->setNombre($empresa->getRazon_Social());
                $facturaSenavexEmpresa->setRuex($empresa->getRuex());
                $facturaSenavexEmpresa->setNit($empresa->getNit());
            }else{
                $facturaSenavexEmpresa->setId_factura_senavex_empresa($facturaSenavexManual->getId_empresa());
                $facturaSenavexEmpresa=$sqlFacturaSenavexEmpresa->getEmpresa($facturaSenavexEmpresa);
            }
            $facturaSenavexManualDetalle = new FacturaSenavexManualDetalle();
            $sqlFacturaSenavexManualDetalle = new SQLFacturaSenavexManualDetalle();
            $facturaSenavexManualDetalle->setId_factura_senavex_manual($_REQUEST['id_factura']);
            // obtenemos el detalle de la factura
            $lista=$sqlFacturaSenavexManualDetalle->getListFacturaDetallePorIdFactura($facturaSenavexManualDetalle);
            

            $listaServicios=array();
            $cantidad_servicio=array();
            $precio_servicio=array();
            $listaPreciosTotal=array();
            $total=0;
            foreach ($lista as $value) {
                $sqlServicio=new SQLServicio();
                $servicio=new Servicio();
                //if($value->getPrecio()>0){
                if($value->getVortex()==1){
                    $servicioExportador = new ServicioExportador();
                    $servicioExportador->setId_servicio_exportador($value->getId_servicio());
                    $sqlServicioExportador = new SQLServicioExportador();
                    $servicioExportador = $sqlServicioExportador->getBuscarServicioExportadorPorId($servicioExportador);
                    $servicio->setId_servicio($servicioExportador->getId_servicio());
                }else{
                    $servicio->setId_servicio($value->getId_servicio());
                }
                    $servicio=$sqlServicio->getBuscarServicioPorId($servicio);
                //print('<pre>'.print_r($servicio->getDescripcion(),true).'</pre>');
                $listaServicios[$value->getId_servicio()]=$servicio->getDescripcion();
                $cantidad_servicio[$value->getId_servicio()]=$cantidad_servicio[$value->getId_servicio()]+$value->getCantidad();
                $precio_servicio[$value->getId_servicio()]=$value->getPrecio();
                $listaPreciosTotal[$value->getId_servicio()]=$listaPreciosTotal[$value->getId_servicio()]+ ($value->getCantidad() * $value->getPrecio());
                $total+=$value->getCantidad() * $value->getPrecio();
               // }
            }
            $fsmEstado = new FacturaSenavexManualEstado();
            $SQLfsmEstado = new SQLFacturaSenavexManualEstado();
            //$lisEstados = $SQLfsmEstado->listEstados($fsmEstado);
            if($facturaSenavexManual->getEstado() < 5){
                $fsmEstado->setId_factura_senavex_manual_estado(0);
                $fsmEstado->setDescripcion(4);
            }else{
                $fsmEstado->setId_factura_senavex_manual_estado(5);
                $fsmEstado->setDescripcion(7);
            }
            $lisEstados = $SQLfsmEstado->listEstadosPorTipoFactura($fsmEstado);
            
            $fsmEstado->setId_factura_senavex_manual_estado($facturaSenavexManual->getEstado());
            $fsmEstado = $SQLfsmEstado->getFacturaManualPorID($fsmEstado);

            $vista->assign("estado",$fsmEstado->getDescripcion());
            $vista->assign("fmEstados",$lisEstados);
            $vista->assign("facturasm",$facturaSenavexManual);
            $vista->assign("fmEmpresa",$facturaSenavexEmpresa);
            $vista->assign('dservicios',$listaServicios);
            $vista->assign('dcantidad_servicios',$cantidad_servicio);
            $vista->assign('dprecio_servicios',$precio_servicio);
            $vista->assign('dlista_precios',$listaPreciosTotal);
            $vista->assign('literal',numtoletras($total));
            
            $vista->display("ProForma/editar_factura.tpl");
            exit;
        }
//***************************FACTURA AUTOMATICA**********************************//
        if($_REQUEST['tarea']=='listar_ruexs'){
            $empresa = new Empresa();
            $empresa->setEstado(2);
            $sqlEmpresa = new SQLEmpresa();
            $listar = $sqlEmpresa->getListarEmpresasEstado($empresa);
            echo '[';
            //$strJson = '{"id_empresa":"-1", "descripcion":"NINGUNO"}';
            foreach ($listar as $value){
                 $strJson.= '{"id_empresa":"'.$value->getId_empresa() . 
                            '", "descripcion":"'.$value->getRuex().' - '.$value->getRazon_social().'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='verServicios'){
            return $this->loadServicios($_REQUEST['id_empresa']);
            exit();
        }
        if($_REQUEST['tarea']=='verCertificadosVendidosFactura'){
            $fsmd = new FacturaSenavexManualDetalle();
            $fsmd->setId_factura_senavex_manual($_REQUEST['id_factura']);
            $sqlFSMD = new SQLFacturaSenavexManualDetalle();
            $lista = $sqlFSMD->getListFacturaDetallePorIdFactura($fsmd);
            
            $strJson = '';
            echo '[';
            
            $sqlFSMDS = new SQLFacturaSenavexManualDetalleServicio();
            $sqlServicio = new SQLServicio();
            foreach ($lista as $value){
                $fsmds = new FacturaSenavexManualDetalleServicio();
                $fsmds->setId_factura_senavex_manual_detalle($value->getId_factura_senavex_manual_detalle());
                $fsmds = $sqlFSMDS->getListFacturaDetallePorDetalle($fsmds);
               
                if($fsmds!=null && !empty($fsmds)){
                    $serv = new Servicio();
                    $serv->setId_servicio($value->getId_servicio());
                    $serv = $sqlServicio->getBuscarServicioPorId($serv);
                    
                    $strJson .= '{"servicio":"' . $serv->getDescripcion() .
                     '","FOB":"' . $fsmds[0]->getFob() .
                     '","del":"' . $fsmds[0]->getNro_ctrl_1() .
                     '","al":"' .$fsmds[0]->getNro_ctrl_2() . '"},';
                }

            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='verificar_autorizacion_contingencia'){
            $fac = new FacturaContingenciaAutorizacion();
            $sqlFCA = new SQLFacturaContingenciaAutorizacion();
            $fac->setId_regional($_REQUEST['id_regional']);
            $fac->setNumero_autorizacion($_REQUEST['num_autorizacion']);
            $list_autorizacion = $sqlFCA->ExisteAutorizacion($fac);
            echo '[';
            echo '{"suceso":"'.count($list_autorizacion).'"}';
            echo ']';
            exit;
        }
        
        if($_REQUEST['tarea']=='verificar_factura_contingencia'){
            echo '1';
            $facturaContingenciaAutorizacion = new FacturaContingenciaAutorizacion();
            $sqlFacturaContingenciaAutorizacion = new SQLFacturaContingenciaAutorizacion();
            $facturaContingenciaAutorizacion->setId_regional($_REQUEST['id_regional']);
            $facturaContingenciaAutorizacion->setEstado(1);
            $facturaContingenciaAutorizacion = $sqlFacturaContingenciaAutorizacion->getAutorizacionPorRegionalEstado($facturaContingenciaAutorizacion);
            
            $fsm = new FacturaSenavexManual();
            $sqlFSM = new SQLFacturaSenavexManual();
            $fsm->setNumero_factura($_REQUEST['numero_factura']);
            $fsm->setNumero_autorizacion($facturaContingenciaAutorizacion->getNumero_autorizacion());
            $list_num_fact = $sqlFSM->ExisteNumeroFactura($fsm);
            
            echo '[';
            echo '{"suceso":"'.count($list_num_fact).'"}';
            echo ']';
            exit;
        }
        
        if($_REQUEST['tarea']=='verificar_certificado'){
            $fsmds = new FacturaSenavexManualDetalleServicio();
            $sqlFSMDS = new SQLFacturaSenavexManualDetalleServicio();
            $fsmds->setNro_ctrl_1($_REQUEST['certificado']);
            $fsmds->setNro_ctrl_2($_REQUEST['acuerdo']);
            $list_ventas = $sqlFSMDS->certificadoVendido($fsmds);
            echo '[';
            echo '{"suceso":"'.count($list_ventas).'"}';
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='ver_registro_contingencia'){
            //print('<pre>'.print_r($_SESSION,true).'</pre>');
            $ep = new EmpresaPersona();
            $sqlEP = new SQLEmpresaPersona();
            
            $vista->assign("nacional", $ep->getId_regional()==11? 1: 0);
            $vista->display("ProForma/contingencia.tpl");
            exit;
        }
        if($_REQUEST['tarea']=='list_regional'){
            $regional = new Regional();
            $sqlRegional = new SQLRegional();
            $lista = $sqlRegional->getListarRegionales($regional, false);
            
            $strJson = '';
            echo '[';
            foreach ($lista as $value){
                $strJson .= '{"id_regional":"' . $value->getId_regional() .
                 '","descripcion":"' . $value->getCiudad() . '"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='registrarContingencia'){
            $swresultado = '-1';
            $descripcion = '';
            $fca = new FacturaContingenciaAutorizacion();
            $sqlFCA = new SQLFacturaContingenciaAutorizacion();
            
            $fca->setEstado(1);
            $fca->setFecha_registro(date('d-m-Y'));
            $fca->setFecha_limite($_REQUEST['datepicker_limite']);
            $fca->setId_regional($_REQUEST['regional_contingencia']);
            $fca->setId_asistente($_SESSION['id_persona']);
            $fca->setNumero_autorizacion($_REQUEST['num_autorizacion']);
            $fca->setIrango($_REQUEST['irango']);
            $fca->setFrango($_REQUEST['frango']);
            $fca->setUtilizados(intval($_REQUEST['frango']) - intval($_REQUEST['irango']));
            try{
                $sqlFCA->Save($fca);
                $swresultado = $fca->getId_factura_contingencia_autorizacion();
                $descripcion = $fca->getFecha_registro();
            } catch (Exception $ex){
                //print('<pre>'.print_r($ex,true).'</pre>');
                $logs = new Logs();
                $sqlLogs = new SQLLogs();
                $logs->setId_servicio(0);
                $logs->setDescripcion('ERROR: Registrar contingencia');
                $logs->setMensaje($ex->getMessage());
                $logs->setObjeto(print_r($fca,true));
                $logs->setDate(Date('Y-m-d H:i:s'));
                $sqlLogs->Save($logs);
                $swresultado = '-1';
                $descripcion = $logs->getDescripcion();
            }
            echo '[{"id":"'.$swresultado.'","descripcion":"'.$logs->getDescripcion().'"}]';
            exit;
        }
    }
    private function getServicio($id_servicio){
        $servicio = new Servicio();
        $sqlServicio = new SQLServicio();
        $servicio->setId_servicio($id_servicio);
        return $sqlServicio->getBuscarServicioPorId($servicio);
    }
    private function getEmpresa($nit){
        $facturaSenavexEmpresa = new FacturaSenavexEmpresa();
        $sqlFacturaSenavexEmpresa = new SQLFacturaSenavexEmpresa();
        $facturaSenavexEmpresa->setNit($nit);
        return $sqlFacturaSenavexEmpresa->getEmpresaPorNIT($facturaSenavexEmpresa);
    }
    private function getPersona($ci){
        $facturaSenavexPersona = new FacturaSenavexPersona();
        $sqlFacturaSenavexPersona = new SQLFacturaSenavexPersona();
        $facturaSenavexPersona->setCi($ci);
        return $sqlFacturaSenavexPersona->getPersonaPorCI($facturaSenavexPersona);
    }
    private function verFactura($id_factura_senavex_manual,$estado){
        // obtenemos la factura
        
        // obtenemos la factura
        $facturaSenavexManual = new FacturaSenavexManual();
        $sqlFacturaSenavexManual = new SQLFacturaSenavexManual();
        $facturaSenavexManual->setId_factura_senavex_manual($id_factura_senavex_manual);
        $facturaSenavexManual=$sqlFacturaSenavexManual->getFacturaManualPorID($facturaSenavexManual);
        
        $fact =$facturaSenavexManual->getNumero_factura();
       
        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        $regional->setId_regional($facturaSenavexManual->getId_regional());
        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        $certificados = explode(',', $regional->getCertificados());
        $sucursal='SUCURSAL - '.$regional->getSucursal().'|'.$regional->getDireccion().'|(Zona '.$regional->getZona().')|'.$regional->getCiudad().' - Bolivia';
         
        // obtenemos la empresa
        $facturaSenavexEmpresa = new FacturaSenavexEmpresa();
        $sqlFacturaSenavexEmpresa = new SQLFacturaSenavexEmpresa();
        if($facturaSenavexManual->getVortex()==1){
            $empresa = new Empresa();
            $empresa->setId_empresa($facturaSenavexManual->getId_empresa());
            $sqlEmpresa = new SQLEmpresa();
            $empresa = $sqlEmpresa->getEmpresaPorID($empresa);
            $facturaSenavexEmpresa->setId_factura_senavex_empresa($facturaSenavexManual->getId_empresa());
            $facturaSenavexEmpresa->setNit($empresa->getNit());
            $facturaSenavexEmpresa->setNombre($empresa->getRazon_social());
        }else{
    
            $facturaSenavexEmpresa->setId_factura_senavex_empresa($facturaSenavexManual->getId_empresa());
            $facturaSenavexEmpresa=$sqlFacturaSenavexEmpresa->getEmpresa($facturaSenavexEmpresa);
        }
        
        
        // obtenemos el detalle de la factura
        $facturaSenavexManualDetalle = new FacturaSenavexManualDetalle();
        $sqlFacturaSenavexManualDetalle = new SQLFacturaSenavexManualDetalle();
        $facturaSenavexManualDetalle->setId_factura_senavex_manual($id_factura_senavex_manual);
        $lista=$sqlFacturaSenavexManualDetalle->getListFacturaDetallePorIdFactura($facturaSenavexManualDetalle);


        $listaServicios=array();
        $cantidad_servicio=array();
        $precio_servicio=array();
        $listaPreciosTotal=array();
        
        $reciboServicios = array();
        $reciboServicioDetalle = array();
        
        $total=0;

        $pdf = new FM_PDF();
        
        $aux = explode('-',substr($facturaSenavexManual->getFecha_emision(), 0, 10 ));
        $fecha_emision = $aux[2].'/'.$aux[1].'/'.$aux[0];

        $aux = explode('-',substr($facturaSenavexManual->getFecha_limite(), 0, 10 ));
        $fecha_limite = $aux[2].'/'.$aux[1].'/'.$aux[0];
       
           
        foreach ($lista as $value) {
            $sqlServicio=new SQLServicio();
            $servicio=new Servicio();
            //print('<pre>'.print_r($value,true).'</pre>');
            if($value->getVortex()==1){
                $servicioExportador = new ServicioExportador();
                $sqlServicioExportador = new SQLServicioExportador();
                $servicioExportador->setId_servicio_exportador($value->getId_servicio());
                $servicioExportador = $sqlServicioExportador->getBuscarServicioExportadorPorId($servicioExportador);
                $value->setId_servicio($servicioExportador->getId_Servicio());
                $servicio->setId_servicio($servicioExportador->getId_Servicio());
            }else{
                $servicio->setId_servicio($value->getId_servicio());
            }
            $servicio=$sqlServicio->getBuscarServicioPorId($servicio);
            if($value->getPrecio()>0)
            {
                $listaServicios[$value->getId_servicio()]=$servicio->getDescripcion();
                $cantidad_servicio[$value->getId_servicio()]=$cantidad_servicio[$value->getId_servicio()]+$value->getCantidad();
                $precio_servicio[$value->getId_servicio()]=floatval($value->getPrecio());
                $listaPreciosTotal[$value->getId_servicio()]=floatval($listaPreciosTotal[$value->getId_servicio()]) + floatval(($value->getCantidad() * $value->getPrecio()));
                $total+=$value->getCantidad() * $value->getPrecio();
            }
            else
            {
                $reciboServicios[count($reciboServicios)]=$servicio->getDescripcion();
                
                if($servicio->getId_servicio()>= 53 && $servicio->getId_servicio()<= 58){
                    $facturaSenavexManualDetalleServicio = new FacturaSenavexManualDetalleServicio();
                    $facturaSenavexManualDetalleServicio->setId_factura_senavex_manual_detalle($value->getId_factura_senavex_manual_detalle());
                    $sqlFacturaSenavexManualDetalleServicio = new SQLFacturaSenavexManualDetalleServicio();
                    $facturaSenavexManualDetalleServicio= $sqlFacturaSenavexManualDetalleServicio->getListFacturaDetallePorDetalle($facturaSenavexManualDetalleServicio)[0];
                    $reciboServicioDetalle[count($reciboServicioDetalle)]='N° Control Repuesto: '.$facturaSenavexManualDetalleServicio->getNro_ctrl_1().'  -   N° Control a Reponer: '.$facturaSenavexManualDetalleServicio->getNro_ctrl_2();
                }
            }
        }
       
        if(count($listaServicios)>0)
        {
            $nit = $facturaSenavexEmpresa->getNit();
            $empresa_nombre = $facturaSenavexEmpresa->getNombre();
            $literal =  numtoletras($total);
            $qr = $facturaSenavexManual->getCodigo_qr();
            $codigo_control=$facturaSenavexManual->getCodigo_control();
            $autorizacion = $facturaSenavexManual->getNumero_autorizacion();
            $pdf->AddPage("L",'Letter');
            $pdf->setX1(6);
            $pdf->setX2(129);
            $pdf->Cabecera('ORIGINAL', $sucursal, $qr, NIT, $fact, $autorizacion,$certificados);
            $pdf->Body($nit, $empresa_nombre,$fecha_emision, $listaServicios, $cantidad_servicio, $precio_servicio, $listaPreciosTotal, $literal, $total);
            $pdf->Pie($codigo_control, $fecha_limite);
            if($estado == 1){
                $pdf->waterMark('A N U L A D O',60);
            }
            $pdf->delimitadorVertical(140);

            $pdf->setX1(145);
            $pdf->setX2(129);
            $pdf->Cabecera(   'COPIA', $sucursal, $qr, NIT, $fact, $autorizacion,$certificados);
            $pdf->Body($nit, $empresa_nombre,$fecha_emision , $listaServicios, $cantidad_servicio, $precio_servicio, $listaPreciosTotal, $literal, $total);
            $pdf->Pie($codigo_control, $fecha_limite);
            if($estado == 1){
                $pdf->WaterMark('A N U L A D O',60);
            }
        }
        if($facturaSenavexManual->getNumero_recibo()>0)
        {
            $pdf->AddPage("P",'Letter');
            
//            print('EN MANTENIMIENTO... ESPERE UN MOMENTO PORFAVOR');
            $persona = new Persona();
            $sqlPersona = new SQLPersona();
            $persona->setId_persona($facturaSenavexManual->getId_asistente());
            $persona=$sqlPersona->getDatosPersonaPorId($persona);
            
            $facturaSenavexPersona=new FacturaSenavexPersona();
            
            if($facturaSenavexManual->getVortex()==1){
                $persona1 = new Persona();
                $empresa1 = new Empresa();
                $sqlPersona = new SQLPersona();
                $sqlEmpresa = new SQLEmpresa();
                $empresa_persona1 =new EmpresaPersona();
                $sqlEmpresaPersona = new SQLEmpresaPersona();
                $empresa_persona1->setId_empresa_persona($facturaSenavexManual->getId_persona());
                $empresa_persona1= $sqlEmpresaPersona->getEmpresaPersonaPorID($empresa_persona1);
                
                $persona1->setId_persona($empresa_persona1->getId_persona());
                $empresa1->setId_empresa($facturaSenavexManual->getId_empresa());
                
                $persona1 = $sqlPersona->getDatosPersonaPorId($persona1);
                $empresa1 = $sqlEmpresa->getEmpresaPorID($empresa1);
//                print('<pre>'.print_r($persona1,true).'</pre>');
//                print('<pre>'.print_r($empresa1,true).'</pre>');
                $facturaSenavexPersona->setNombres($persona1->getNombres());
                $facturaSenavexPersona->setApellido_paterno($persona1->getPaterno());
                $facturaSenavexPersona->setApellido_materno($persona1->getMaterno());
                
                $facturaSenavexEmpresa->setNombre($empresa1->getRazon_Social());
                $facturaSenavexEmpresa->setRuex($empresa1->getRuex());
                
            }else{
                $sqlFacturaSenavexPersona = new SQLFacturaSenavexPersona();
                $facturaSenavexPersona->setId_factura_senavex_persona($facturaSenavexManual->getId_persona());
                $facturaSenavexPersona=$sqlFacturaSenavexPersona->getPersonaPorID($facturaSenavexPersona);
            }
            
            $pdf->setY1(5);
            $pdf->Cabecera_Recibo($regional->getCiudad(), $facturaSenavexManual->getNumero_recibo(), $fecha_emision);
            $pdf->Body_Recibo("Original",$reciboServicios, $reciboServicioDetalle, $persona->getNombres().' '.$persona->getPaterno().' '.$persona->getMaterno(),$facturaSenavexPersona->getNombres().' '.$facturaSenavexPersona->getApellido_paterno().' '.$facturaSenavexPersona->getApellido_materno(), $facturaSenavexEmpresa->getNombre().' - '.$facturaSenavexEmpresa->getRuex());
            
            $pdf->delimitadorHorizontal(140);
            
            $pdf->setY1(145);
            $pdf->Cabecera_Recibo($regional->getCiudad(), $facturaSenavexManual->getNumero_recibo(), $fecha_emision);
            $pdf->Body_Recibo("Copia", $reciboServicios, $reciboServicioDetalle, $persona->getNombres().' '.$persona->getPaterno().' '.$persona->getMaterno(),$facturaSenavexPersona->getNombres().' '.$facturaSenavexPersona->getApellido_paterno().' '.$facturaSenavexPersona->getApellido_materno(), $facturaSenavexEmpresa->getNombre().' - '.$facturaSenavexEmpresa->getRuex());
            
        }
        $pdf->Output(date('d-m-Y').'-factura'.'.pdf','I');
    }
    
    /*******************INTEGRACION FACTURA MANUAL & FACTURA AUTOMATICA ************************/
    private function loadServicios($id_empresa){
        
        $empresa=new Empresa();
        $sqlEmpresa=new SQLEmpresa();
        $empresa->setId_empresa($id_empresa);
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);

        $proForma = new ProForma();
        $sqlProForma = new SQLProForma();

        $servicioExportador = new ServicioExportador();
        $sqlServicioExportador = new SQLServicioExportador();

        $servicioExportador->setId_empresa($id_empresa);
        $servicioExportador->setFacturado(0);
        $servicioExportador->setCosto_Actual(1);
        //print('<pre>'.print_r($sqlServicioExportador->getServiciosPorEmpresa($servicioExportador),true).'</pre>');
        $list_servExp = $sqlServicioExportador->getServiciosPorEmpresa($servicioExportador);

        $servicio = new Servicio();
        $sqlServicio = new SQLServicio();
        
        $strJson = '';
        echo '[';
        if(count($list_servExp)>0){
            foreach ($list_servExp as $value){
                $servicio = new Servicio();
                $sqlServicio = new SQLServicio();
                $servicio->setId_servicio($value->getId_servicio());
                $servicio = $sqlServicio->getBuscarServicioPorId($servicio);
                $strJson .= '{"id_servicio_exportador":"' . $value->getId_servicio_exportador() .
                 '","id_empresa":"' . $empresa->getId_empresa() .
                 '","fecha_servexp":"' . $value->getFecha_Servicio() .
                 '","razon_social":"' . strtoupper($empresa->getRazon_social()) .
                 '","costo_actual":"' . $value->getCosto_Actual() .
                 '","nombre_servicio":"' . $servicio->getDescripcion() .
                 '","fecha_servicio":"' . $value->getFecha_servicio() .
                 '","costo_actual":"' . $value->getCosto_actual() . '"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
        }
        echo ']';
        exit;
    }
    function dias_transcurridos($fecha_i,$fecha_f)
    {
        $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
        $dias = abs($dias); $dias = floor($dias);		
        return $dias;
    }
}

// B5960168 12345678