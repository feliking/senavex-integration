<?php

defined('_ACCESO') or die('Acceso restringido');


include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');


include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLCafeCertificado.php');
include_once(PATH_MODELO . DS . 'SQLCafeCaracteristicasEspeciales.php');
include_once(PATH_MODELO . DS . 'SQLCafeCEspecial.php');
include_once(PATH_MODELO . DS . 'SQLCafeBorrador.php');
include_once(PATH_MODELO . DS . 'SQLCafeDescripcion.php');
include_once(PATH_MODELO . DS . 'SQLCafeDestinoTransbordo.php');
include_once(PATH_MODELO . DS . 'SQLCafeElaboracion.php');
include_once(PATH_MODELO . DS . 'SQLCafeImportador.php');
include_once(PATH_MODELO . DS . 'SQLCafeMedioTransporte.php');
include_once(PATH_MODELO . DS . 'SQLCafeMoneda.php');
include_once(PATH_MODELO . DS . 'SQLCafeNorma.php');
include_once(PATH_MODELO . DS . 'SQLCafeOrganizacion.php');
include_once(PATH_MODELO . DS . 'SQLCafePais.php');
include_once(PATH_MODELO . DS . 'SQLCafePuerto.php');
include_once(PATH_MODELO . DS . 'SQLCafeICO.php');
include_once(PATH_MODELO . DS . 'SQLCafeSistemaArmonizado.php');
include_once(PATH_MODELO . DS . 'SQLCafeTipoEmbalaje.php');
include_once(PATH_MODELO . DS . 'SQLCafeUnidadMedida.php');
include_once(PATH_MODELO . DS . 'SQLServicio.php');
include_once(PATH_MODELO . DS . 'SQLServicioExportador.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLDeclaracionJurada.php');

include_once(PATH_TABLA . DS . 'CafeCertificado.php');
include_once(PATH_TABLA . DS . 'CafeCaracteristicasEspeciales.php');
include_once(PATH_TABLA . DS . 'CafeCEspecial.php');
include_once(PATH_TABLA . DS . 'CafeBorrador.php');
include_once(PATH_TABLA . DS . 'CafeDescripcion.php');
include_once(PATH_TABLA . DS . 'CafeDestinoTransbordo.php');
include_once(PATH_TABLA . DS . 'CafeElaboracion.php');
include_once(PATH_TABLA . DS . 'CafeImportador.php');
include_once(PATH_TABLA . DS . 'CafeMedioTransporte.php');
include_once(PATH_TABLA . DS . 'CafeMoneda.php');
include_once(PATH_TABLA . DS . 'CafeNorma.php');
include_once(PATH_TABLA . DS . 'CafeOrganizacion.php');
include_once(PATH_TABLA . DS . 'CafePais.php');
include_once(PATH_TABLA . DS . 'CafePuerto.php');
include_once(PATH_TABLA . DS . 'CafeICO.php');
include_once(PATH_TABLA . DS . 'CafeSistemaArmonizado.php');
include_once(PATH_TABLA . DS . 'CafeTipoEmbalaje.php');
include_once(PATH_TABLA . DS . 'CafeUnidadMedida.php');
include_once(PATH_TABLA . DS . 'Servicio.php');
include_once(PATH_TABLA . DS . 'ServicioExportador.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');

include_once "certificadoCafe.php";
include_once('reciboCafe.php');
include_once('numeros_cafe.php');

class AdmCafe extends Principal {
    public function AdmCafe() 
    {
        $vista = Principal::getVistaInstance();
        if($_REQUEST['tarea']=='do_cafe')
        {
            $cafeBorrador=new CafeBorrador();
            $sqlCafeBorrador=new SQLCafeBorrador();
            $declaracionJurada=new DeclaracionJurada();
            $tpl="do_cafe.tpl";
            
            if(empty($_REQUEST['id_cafe'])==false){
                $cafeBorrador=new CafeBorrador();
                $sqlCafeBorrador=new SQLCafeBorrador();
                $cafeBorrador->setId_cafe_certificado($_REQUEST['id_cafe']);
                $cafeBorrador=$sqlCafeBorrador->getCafeCertificadoPorID($cafeBorrador);
                //print('<pre>'.print_r($_REQUEST,true).'</pre>');
                $tpl="redo_cafe.tpl";
                $vista->assign('cafeBorrador',$cafeBorrador);
            }
            $vista->assign('revision',$_REQUEST['revision']);
            $vista->assign("lista_paises_I",$this->listaPaises_I());
            $vista->assign("lista_paises_II",$this->listaPaises_II());
            $vista->assign("lista_puerto",$this->listaPuertoEmbarque());
            
            $vista->assign("lista_importador",$this->listaImportador());
            $vista->assign("lista_medio_transporte",$this->listaMedioTransporte());
            $vista->assign("lista_tipo_embalaje",$this->listaTipoEmbalaje());
            $vista->assign("lista_descripcion",$this->listaDescripcion());
            $vista->assign("lista_sistemaarmonizado",$this->listaSistemaArmonizado());
            $vista->assign("lista_cespeciales",$this->listaCEspeciales());
            //$vista->display("admCafe/AdmCafe.tpl");
            $vista->display("admCafe/".$tpl);
            exit();
            
            
        }
        if($_REQUEST['tarea']=='check_cafe')
        {
            $cafeBorrador=new CafeBorrador();
            $sqlCafeBorrador=new SQLCafeBorrador();
            $cafeBorrador->setId_cafe_certificado($_REQUEST['id_cafe']);
            $cafeBorrador=$sqlCafeBorrador->getCafeCertificadoPorID($cafeBorrador);
            
            $cafeImportador=new CafeImportador();
            $sqlCafeImportador=new SQLCafeImportador();
            $cafeImportador->setId_cafe_importador($cafeBorrador->getCafe_importador());
            $cafeImportador=$sqlCafeImportador->getCafeImportadorPorID($cafeImportador);
            
            $oic[0]=$cafeImportador->getNombre();
            
            $oic[1]=$cafeBorrador->getDireccion_notificaciones();
            
            $cafePais=new CafePais();
            $sqlCafePais=new SQLCafePais();
            $cafePais->setId_cafe_pais(30);
            $cafePais=$sqlCafePais->getCafePaisPorID($cafePais);
            $oic[2]=$cafePais->getNombre();
            $clave_oic=$cafePais->getClave_oic();
            $cafePuerto=new CafePuerto();
            $sqlCafePuerto=new SQLCafePuerto();
            $cafePuerto->setId_cafe_puerto($cafeBorrador->getId_puerto());
            $cafePuerto=$sqlCafePuerto->getCafePuertoPorID($cafePuerto);
            $oic[3]=$cafePuerto->getDescripcion();
            
            $cafePais->setId_cafe_pais(30);
            $cafePais=$sqlCafePais->getCafePaisPorID($cafePais);
            $oic[4]=$cafePais->getNombre();
            
            $oic[5]=$cafeBorrador->getFecha_exportacion();
            
            $cafeDestinoT=new CafeDestinoTransbordo();
            $sqlCafeDestinoT=new SQLCafeDestinoTransbordo();
            
            $cafePais->setId_cafe_pais($cafeBorrador->getId_pais_destino());
            $cafePais=$sqlCafePais->getCafePaisPorID($cafePais);
            $oic[6]=$cafePais->getNombre();
            
            $cafePais->setId_cafe_pais($cafeBorrador->getId_pais_transbordo());
            $cafePais=$sqlCafePais->getCafePaisPorID($cafePais);
            //print('<pre>'.print_r($cafeBorrador,true).'</pre>');
            $oic[7]=$cafePais->getNombre();
            
            $cafeMedioTransporte=new CafeMedioTransporte();
            $sqlCafeMedioTransporte=new SQLCafeMedioTransporte();
            $cafeMedioTransporte->setId_cafe_medio_transporte($cafeBorrador->getId_medio_transporte());
            $cafeMedioTransporte=$sqlCafeMedioTransporte->getCafeMedioTransportePorID($cafeMedioTransporte);
            $oic[8]=$cafeMedioTransporte->getDescripcion();
            $oic[9]=$clave_oic.' / '.$cafeBorrador->getId_exportador_ruex().' / '.$cafeBorrador->getMarca_oic();
            $oic[10]=$cafeBorrador->getOtras_marcas_oic();
            
            $cafeTipoEmbalaje=new CafeTipoEmbalaje();
            $sqlCafeTipoEmbalaje=new SQLCafeTipoEmbalaje();
            $cafeTipoEmbalaje->setId_cafe_tipo_embalaje($cafeBorrador->getId_tipo_embalaje());
            $cafeTipoEmbalaje=$sqlCafeTipoEmbalaje->getCafeTipoEmbalajePorID($cafeTipoEmbalaje);
            
            $oic[11]=$cafeTipoEmbalaje->getDescripcion();
            $oic[12]=$cafeBorrador->getPeso_neto();
            
            $cafeUnidadMedida=new CafeUnidadMedida();
            $sqlCafeUnidadMedida=new SQLCafeUnidadMedida();
            $cafeUnidadMedida->setId_cafe_unidad_medida($cafeBorrador->getId_unidad_medida());
            $cafeUnidadMedida=$sqlCafeUnidadMedida->getCafeUnidadMedidaPorID($cafeUnidadMedida);
            $oic[13]=$cafeUnidadMedida->getDescripcion();
            
            $cafeDescripcion=new CafeDescripcion();
            $sqlCafeDescripcion=new SQLCafeDescripcion();
            $cafeDescripcion->setId_cafe_descripcion($cafeBorrador->getId_cafe_descripcion());
            $cafeDescripcion=$sqlCafeDescripcion->getCafeDescripcionPorID($cafeDescripcion);
            $oic[14]=$cafeDescripcion->getDescripcion();
            $oic[15]=$cafeBorrador->getDescafeinado()==1? 'SI':'NO';
            
            $cafeElaboracion=new CafeElaboracion();
            $sqlCafeElaboracion=new SQLCafeElaboracion();
            
            $cafeElaboracion->setId_cafe_elaboracion($cafeBorrador->getOrganico());
            $cafeElaboracion=$sqlCafeElaboracion->getCafeElaboracionPorID($cafeElaboracion);
            $oic[16]=$cafeElaboracion->getDescripcion();
            
            $cafeElaboracion->setId_cafe_elaboracion($cafeBorrador->getCafe_verde());
            $cafeElaboracion=$sqlCafeElaboracion->getCafeElaboracionPorID($cafeElaboracion);
            $oic[17]=$cafeElaboracion!=null? $cafeElaboracion->getDescripcion():"";
            
            $cafeElaboracion=new CafeElaboracion();
            $cafeElaboracion->setId_cafe_elaboracion($cafeBorrador->getCafe_soluble());
            $cafeElaboracion=$sqlCafeElaboracion->getCafeElaboracionPorID($cafeElaboracion);
            
            $oic[18]=$cafeElaboracion!=null? $cafeElaboracion->getDescripcion():"";
            
            $cafeNorma=new CafeNorma();
            $sqlCafeNorma=new SQLCafeNorma();
            
            $cafeNorma->setId_cafe_norma($cafeBorrador->getId_norma_calidad());
            $cafeNorma=$sqlCafeNorma->getCafeNormaPorID($cafeNorma);
            $oic[19]=$cafeNorma->getDescripcion();
            
            $cafeCaracteristicasEspeciales=new CafeCaracteristicasEspeciales();
            $sqlCafeCaracteristicasEspeciales=new SQLCafeCaracteristicasEspeciales();
            
            $cafeCaracteristicasEspeciales->setId_cafe_caracteristicas_especiales($cafeBorrador->getId_caracteristica_especial());
            $cafeCaracteristicasEspeciales=$sqlCafeCaracteristicasEspeciales->getCafeCaracteristicasEspecialesxID($cafeCaracteristicasEspeciales);
            $oic[20]=$cafeCaracteristicasEspeciales->getDescripcion();
            
            $cafeSistemaArmonizado=new CafeSistemaArmonizado();
            $SQLCafeSistemaArmonizado=new SQLCafeSistemaArmonizado();
            $cafeSistemaArmonizado->setId_cafe_sistema_armonizado($cafeBorrador->getId_sistema_armonizado());
            $cafeSistemaArmonizado=$SQLCafeSistemaArmonizado->getCafeSistemaArmonizadoPorID($cafeSistemaArmonizado);
            $oic[21]=$cafeSistemaArmonizado->getDescripcion();
            
            $oic[22]=$cafeBorrador->getValor_fob();
            
            $cafeMoneda=new CafeMoneda();
            $SQLCafeMoneda = new SQLCafeMoneda();
            $cafeMoneda->setId_cafe_moneda($cafeBorrador->getId_moneda());
            $cafeMoneda=$SQLCafeMoneda->getCafeMonedaPorID($cafeMoneda);
            $oic[23]=$cafeMoneda->getDescripcion();
            $oic[24]=$cafeBorrador->getInformacion_adicional();
            $oic[25]=$cafeBorrador->getTipo_cambio();
            $vista->assign('revision',$_REQUEST['revision']);
            $vista->assign('imprimir',$_REQUEST['imprimir']);
            $vista->assign("oic",$oic);
            //$vista->assign("id_empresa",$_SESSION['id_empresa']);
            $vista->assign("id_cafe",$cafeBorrador->getId_cafe_certificado());
            //$vista->assign("cafeBorrador",$cafeBorrador);
            $vista->display("admCafe/check_cafe.tpl");
            exit();
        }
        if($_REQUEST['tarea']=='validate_cafe')
        {
            //print('<pre>'.print_r($_REQUEST,true).'<pre>');
            
            $cafeBorrador=new CafeBorrador();
            $sqlCafeBorrador=new SQLCafeBorrador();

            $cafeBorrador->setId_cafe_certificado($_REQUEST['id_cafe']);
            $cafeBorrador=$sqlCafeBorrador->getCafeCertificadoPorID($cafeBorrador);
            
            //print('<pre>'.print_r($cafeBorrador,true).'<pre>');
            
            if($_REQUEST['validado']=='1')
            {
                $cafeBorrador->setEstado(1);

                $cafeCertificado=new CafeCertificado();
                $sqlCafeCertificado=new SQLCafeCertificado();

                $cafeCertificado->setId_cafe_borrador($cafeBorrador->getId_cafe_certificado());
                $cafeCertificado->setId_cafe_ico($cafeBorrador->getId_exportador_ruex());
                $sqlCafeCertificado->Save($cafeCertificado);
                
                $cafeBorrador->setNro_serial($cafeCertificado->getId_cafe_certificado());

                $servicioExportador=new ServicioExportador();
                $sqlServicioExportador=new SQLServicioExportador();
                $servicioExportador->setId_servicio_exportador($cafeBorrador->getId_servicio_exportador());
                $servicioExportador=$sqlServicioExportador->getBuscarServicioExportadorPorId($servicioExportador);
                $servicioExportador->setFacturado(5);
                $sqlServicioExportador->Save($servicioExportador);
                
                $sqlCafeBorrador->Save($cafeBorrador);
                
//                print('<pre>'.print_r($cafeCertificado,true).'<pre>');
            }
            else
            {
                $cafeBorrador->setEstado(2);
                $cafeBorrador->setNotificacion($_REQUEST['motivo_rechazo']);
                $sqlCafeBorrador->Save($cafeBorrador);
            }
        }
        if($_REQUEST['tarea']=='save_cafe')
        {
            
            $cafeBorrador=new CafeBorrador();
            $sqlcafeBorrador=new SQLCafeBorrador();
             
            $servicioExportador=new ServicioExportador();
            $sqlServicioExportador=new SQLServicioExportador();
            
          
            
//             print('<pre>'.print_r($exito,true).'</pre>');
            $cafeICO=new CafeICO();
            $sqlCafeICO=new SQLCafeICO();
            $cafeICO->setId_empresa($_SESSION['id_empresa']);
           
            $cafeICO=$sqlCafeICO->getCafeICO_Empresa($cafeICO);
            
            if(empty($_REQUEST['id_cafe'])==false){
                $cafeBorrador->setId_cafe_certificado($_REQUEST['id_cafe']);
                $cafeBorrador=$sqlCafeBorrador->getCafeCertificadoPorID($cafeBorrador);
            }
  
            //$cafeBorrador->setId_cafe_certificado($_REQUEST['id_cafe']);
            $cafeBorrador->setNro_factura($_REQUEST['nrofactura']);
            $cafeBorrador->setAutorizacion($_REQUEST['nroautorizacion']);
            $cafeBorrador->setId_exportador_ruex($cafeICO->getId_ico_cafe());

            $cafeImportador=new CafeImportador();
            $sqlCafeImportador=new SQLCafeImportador();
            $cafeImportador->setId_cafe_importador($_REQUEST["idimportador"]);
            $cafeImportador=$sqlCafeImportador->getCafeImportadorPorID($cafeImportador);
            if($cafeImportador!=null){
                $cafeBorrador->setCafe_importador($cafeImportador->getId_cafe_importador());
            }
            else{
                $cafeImportador=new CafeImportador();
                $cafeImportador->setNombre($_REQUEST["idimportador_input"]);
                $sqlCafeImportador->Save($cafeImportador);
            }
            $cafeBorrador->setId_pais(30);
            $cafeBorrador->setId_puerto($_REQUEST["idpuerto"]);
            $cafeBorrador->setId_pais_productor(30);
            $cafeBorrador->setId_pais_destino($_REQUEST["idpaisdestino"]);
            $cafeBorrador->setDireccion_notificaciones($_REQUEST["dir_notyn"]);

            if(!empty($_REQUEST["fecha_exp"]))
                $cafeBorrador->setFecha_exportacion($_REQUEST["fecha_exp"]);
            $cafeBorrador->setId_pais_transbordo($_REQUEST["idpaistransbordo"]);
            $cafeBorrador->setId_medio_transporte($_REQUEST["idmediotransporte"]);
            $cafeBorrador->setOtras_marcas_oic($_REQUEST["otras_marcas"]);
            $cafeBorrador->setId_tipo_embalaje($_REQUEST["cargados"]);

            $cafeBorrador->setPeso_neto($_REQUEST["peso_neto"]);
            $cafeBorrador->setId_unidad_medida($_REQUEST["u_peso"]);
            $cafeBorrador->setId_cafe_descripcion($_REQUEST["iddescripcion"]);
            $cafeBorrador->setDescafeinado($_REQUEST["decafeinado"]);
            $cafeBorrador->setOrganico($_REQUEST["organico"]);

            $cafeBorrador->setCafe_verde($_REQUEST["cafe_v"]);
            $cafeBorrador->setCafe_soluble($_REQUEST["cafe_s"]);
            $cafeBorrador->setId_norma_calidad($_REQUEST["normas"]);
            $cafeBorrador->setId_caracteristica_especial($_REQUEST["idcespecial"]);
            $cafeBorrador->setId_sistema_armonizado($_REQUEST["idsistemaarmonizado"]);

            $cafeBorrador->setValor_fob($_REQUEST["v_fob"]);
            $cafeBorrador->setId_moneda($_REQUEST["idmoneda"]);
            $cafeBorrador->setInformacion_adicional($_REQUEST["info_adicional"]);
            $cafeBorrador->setMarca_oic($this->getNroLote($cafeBorrador->getId_exportador_ruex())+1);
            $cafeBorrador->setTipo_cambio($_REQUEST['t_cambio']);
            $cafeBorrador->setNotificacion($_REQUEST['notificacion']);
            $cafeBorrador->setFecha_emision(date('Y-m-d H:i'));
            $cafeBorrador->setEstado(0);
            
            $peso_neto=$_REQUEST["peso_neto"];
           
            if($_REQUEST["u_peso"] == 2)
                $peso_neto=$peso_neto * 0.4535923;
            $sacos=$peso_neto/60;
            $costo=$sacos*0.20*6.96;
            function getId_cafe_certificado() {
        return $this->id_cafe_certificado;
    }
  
    
            $ser_exp = AdmSistemaColas::RegistrarServicioExportadorParaICO($_SESSION['id_cafe'], $cafeBorrador->getId_servicio_exportador(), $_SESSION['id_persona'], $_SESSION['id_empresa'], $costo);
            if($ser_exp != null){
                AdmSistemaColas::generarColaParaICO($ser_exp);
//                print('cola generada<br>');
//                print($ser_exp==NULL? 'NULL':$ser_exp);
                $cafeBorrador->setId_servicio_exportador($ser_exp);
//                print('servicio exportador adicionado a la tabla cafeBorrador<br>');
//                print('<pre>'.print_r($cafeBorrador,true).'</pre>');
                $sqlcafeBorrador->Save($cafeBorrador);
//                print('Registro Exitoso');
                echo('[{"suceso":"0"}]');
            }
            else{
                echo('[{"suceso":"1"}]');
            }
            /* if(emp ty($_SESSION['id_cafe'])){  

                $servicioExportador->setId_Persona($_SESSION['id_persona']);
                $servicioExportador->setId_empresa($_SESSION['id_empresa']);
                $servicioExportador->setCosto_Actual($costo);
                $servicioExportador->setFecha_Servicio(date('d-m-Y H:i:s'));
                $servicioExportador->setEstado(FALSE);
                $servicioExportador->setId_Servicio(7);
            }else{

                $servicioExportador->setId_servicio_exportador($cafeBorrador->getId_servicio_exportador());
                $servicioExportador=$sqlServicioExportador->getBuscarServicioExportadorPorId($servicioExportador);
            }
            $servicioExportador->setFacturado(4);
            $sqlServicioExportador->Save($servicioExportador);
            */
            //$vista->display("admCafe/AdmCafe.tpl");*/
            
            exit();
        }
        if($_REQUEST['tarea']=='listar_cafe')
        {
            
            $vista->assign('estado',$_REQUEST['estado']);
            $vista->assign('vista',$_REQUEST['vista']);
            if($_SESSION['id_empresa']==0)
            {   //echo $_SESSION['id_persona'];
//                $aux= AdmSistemaColas::getListarICOporAsistente($_SESSION['id_persona']);
//                print('<pre>'.print_r($aux,true).'</pre>');
                print('id persona ='.$_SESSION['id_persona'].'<br> estado ='.$_REQUEST['estado']);
                $vista->display('admCafe/listar_certificados_cafe.tpl');
                // $vista->display('admCafe/listar_certificador_cafe.tpl');
//                $vista->display('admCafe/certificador_cafe.tpl');
            }else{
 
                $cafeICO=new CafeICO();
                $sqlCafeICO=new SQLCafeICO();
                $cafeICO->setId_empresa($_SESSION['id_empresa']);
                $cafeICO=$sqlCafeICO->getCafeICO_Empresa($cafeICO);
//                print('id empresa ='.$cafeICO->getId_ico_cafe().'<br> estado ='.$_REQUEST['estado']);
                $vista->display('admCafe/listar_certificados_cafe.tpl');
//                $vista->display('admCafe/certificados_cafe.tpl');
            }
        }
        if($_REQUEST['tarea']=='list_cafe')
        {
            if($_SESSION['id_empresa']!=0)
            {
                $cafeICO=new CafeICO();
                $sqlCafeICO=new SQLCafeICO();
                $cafeICO->setId_empresa($_SESSION['id_empresa']);
                $cafeICO=$sqlCafeICO->getCafeICO_Empresa($cafeICO);
                print('<pre>'.print_r('id_persona='.$_SESSION['id_persona'].' estado='.$_REQUEST['estado'],true).'</pre>');
//                echo $certificados=$this->listarCertificados($cafeICO->getId_ico_cafe(), empty($_REQUEST['estado'])?0:intval($_REQUEST['estado']));
                print('<pre>'.print_r($certificados=$this->listarCertificados($cafeICO->getId_ico_cafe(), empty($_REQUEST['estado'])?0:intval($_REQUEST['estado'])),true).'</pre>');
                //print('<pre>'.print_r($this->listarCertificados($cafeICO->getId_ico_cafe(), empty($_REQUEST['estado'])?0:intval($_REQUEST['estado'])),true).'</pre>');
            }
            else
            {
                print('<pre>'.print_r('id_persona='.$_SESSION['id_persona'].' estado='.$_REQUEST['estado'],true).'</pre>');
                //echo $certificados=$this->listarCertificados(null, empty($_REQUEST['estado'])?0:intval($_REQUEST['estado']));
                print('<pre>'.print_r($certificados=$this->listarCertificados($_SESSION['id_session'],  empty($_REQUEST['estado'])?0:intval($_REQUEST['estado'])),true).'</pre>');
            }
            exit();
        }
        if($_REQUEST['tarea']=='buscar_cafe')
        {
            $vista->assign('lista_empresa',$this->listaEmpresa());
            $vista->display('admCafe/buscar_cafe.tpl');
            exit();
        }
        if($_REQUEST['tarea']=='buscar_personas')
        {
            
            $listapersona=$this->listaPersona($_POST['empresa']);
            //print('<pre>'.print_r($listapersona,true).'</pre>');
            $salida = '[';
            for ($index = 0; $index < count($listapersona)-1; $index++) {
                $persona=new Persona();
                $sqlPersona=new SQLPersona();
                $persona->setId_persona($listapersona[$index]->getId_Persona());
                $persona=$sqlPersona->getDatosPersonaPorId($persona);
                $salida.= '{ \"persona\" : \"'.$persona->getNombres().' '.$persona->getPaterno().' '.$persona->getMaterno().'\" },';
            }
            if(count($listapersona)>0){
                $persona=new Persona();
                $sqlPersona=new SQLPersona();
                $persona->setId_persona($listapersona[$index]->getId_Persona());
                $persona=$sqlPersona->getDatosPersonaPorId($persona);
                $salida.= '{ \"persona\" : \"'.$persona->getNombres().' '.$persona->getPaterno().' '.$persona->getMaterno().'\" }';
            }
            $salida.= ']';
            echo $salida;
            exit();
        }
        if($_REQUEST['tarea']=='mostrar_empresas')
        {
            $empresa=new Empresa();
            $sqlEmpresa=new SQLEmpresa();
            $empresa->setNombre_Comercial($_POST['texto']);
           
            $lista_empresa=$sqlEmpresa->getListarEmpresasAdmitidasSimilares($empresa);
            foreach ($lista_empresa as $value) {
                $array[count($array)]=$value->getRazon_Social();
            }
            echo json_encode($array);
            exit;
           
        }
        if($_REQUEST['tarea']=='print_cafe')
        {
            
            $cafeBorrador=new CafeBorrador();
            $sqlCafeBorrador=new SQLCafeBorrador();
            $cafeBorrador->setId_cafe_certificado($_REQUEST['id_cafe']);
            $cafeBorrador=$sqlCafeBorrador->getCafeCertificadoPorID($cafeBorrador);
            $cafeBorrador->setEstado(3);
            $sqlCafeBorrador->Save($cafeBorrador);
            if($cafeBorrador!=NULL){
                    
                    $pdf=new PDF('P','mm',array(210,308));
                    $pdf->AddPage();
                    $cafeImportador=new CafeImportador();
                    $sqlCafeImportador=new SQLCafeImportador();
                    $cafeImportador->setId_cafe_importador($cafeBorrador->getCafe_importador());
                    $cafeImportador=$sqlCafeImportador->getCafeImportadorPorID($cafeImportador);
                    $oic[0]=$cafeImportador->getNombre();
                    $oic[1]=$cafeBorrador->getId_exportador_ruex(); //$_SESSION['id_empresa'];
                    //$this->A1($exportador_nombre,$codigo_exportador1);
                    
                    $oic[2]=$cafeBorrador->getDireccion_notificaciones();
                    //$this->A2($dir_noty);
                    //$this->A3();
                    $cafePais=new CafePais();
                    $sqlCafePais=new SQLCafePais();
                    
                    $cafePais->setId_cafe_pais($cafeBorrador->getId_pais());
                    $cafePais=$sqlCafePais->getCafePaisPorID($cafePais);
                    
                    $oic[3]=$cafePais->getClave_oic();
                    $oic[4]=$cafeBorrador->getId_puerto();
                    $oic[5]=$cafeBorrador->getNro_serial();
                    //$this->A4($codigo_pais1,$codigo_puerto1,$nro_serie);
                    
                    
                    
                    $cafePais->setId_cafe_pais(30);
                    $cafePais=$sqlCafePais->getCafePaisPorID($cafePais);
                    
                    $oic[6]=$cafePais->getNombre();
                    $oic[7]=$cafePais->getClave_oic();                    
                    //$this->A5($pais_productor,$codigo_pais2);
                    
                    $cafePais->setId_cafe_pais($cafeBorrador->getId_pais_destino());
                    $cafePais=$sqlCafePais->getCafePaisPorID($cafePais);
                    $oic[8]=$cafePais->getNombre();
                    $oic[9]=$cafePais->getClave_oic();
                    //$this->A6($pais_destino,$codigo_pais3);
                    
                    $oic[10]=$cafeBorrador->getFecha_exportacion();
                    //$this->A7($fecha);
                    
                    $cafePais->setId_cafe_pais($cafeBorrador->getId_pais_transbordo());
                    $cafePais=$sqlCafePais->getCafePaisPorID($cafePais);
                    
                    $oic[11]=$cafePais->getNombre();
                    $oic[12]=$cafePais->getClave_oic();
                    
                    /*$cafeDestino=new CafeDestinoTransbordo();
                    $cafeDestino->setId_cafe_pais_destino_transbordo($cafeBorrador->getId_pais_transbordo());
                    $sqlCafeDestino=new SQLCafeDestinoTransbordo();
                    $cafeDestino=$sqlCafeDestino->getCafePaisDestinoPorID($cafeDestino);
                    $oic[11]=$cafeDestino->getDescripcion();
                    $oic[12]=$cafeDestino->getCodigo_pais();*/
                    //$this->A8($pais_transbordo,$codigo_pais4);
                    
                    $cafeMedioTransporte=new CafeMedioTransporte();
                    $cafeMedioTransporte->setId_cafe_medio_transporte($cafeBorrador->getId_medio_transporte());
                    $sqlCafeMedioTransporte=new SQLCafeMedioTransporte();
                    $cafeMedioTransporte=$sqlCafeMedioTransporte->getCafeMedioTransportePorID($cafeMedioTransporte);
                    
                    $oic[13]=$cafeMedioTransporte->getDescripcion();
                    $oic[14]=$cafeMedioTransporte->getCodigo();
                    //$this->A9($medio_transporte, $codigo_medio_transporte);
                    
                    $oic[15]=$oic[3];
                    $oic[16]=$oic[1];
                    $oic[17]=$this->getNroLote($oic[1]);
                    $oic[18]=$cafeBorrador->getOtras_marcas_oic();
                    //$this->A10($codigo_pais, $codigo_exportador2, $num_lote, $otras_marks);

                    $oic[19]=$cafeBorrador->getId_tipo_embalaje();
                    //$this->A11($selec_cargado);
                    
                    $oic[20]=$cafeBorrador->getPeso_neto();
                    //$this->A12($peso_neto);
                    
                    $oic[21]=$cafeBorrador->getId_unidad_medida();
                    //$this->A13($selec_peso);

                    $oic[22]=$cafeBorrador->getId_cafe_descripcion();
                    //$this->A14($select_descripcion);
                    
                    $oic[23]=$cafeBorrador->getDescafeinado();
                    $oic[24]=$cafeBorrador->getOrganico();
                    $oic[25]=$cafeBorrador->getCafe_verde();
                    $oic[26]=$cafeBorrador->getCafe_soluble();
                    //$this->A15($descafeinado,$organico,$cafe_verde,$cafe_soluble);
                    //$this->A16();
                    
                    $oic[27]=$cafeBorrador->getId_norma_calidad();
                    $cafeCaracteristicasEspeciales=new CafeCaracteristicasEspeciales();
                    $cafeCaracteristicasEspeciales->setId_cafe_caracteristicas_especiales($cafeBorrador->getId_caracteristica_especial());
                    
                    $sqlCafeCaracteristicasEspeciales=new SQLCafeCaracteristicasEspeciales();
                    $cafeCaracteristicasEspeciales=$sqlCafeCaracteristicasEspeciales->getCafeCaracteristicasEspecialesxID($cafeCaracteristicasEspeciales);
                    $oic[28]=$cafeCaracteristicasEspeciales->getDescripcion();
                    
                    $cafeSistemaArmonizado = new CafeSistemaArmonizado();
                    $cafeSistemaArmonizado->setId_cafe_sistema_armonizado($cafeBorrador->getId_sistema_armonizado());
                    $sqlCafeSistemaArmonizado = new SQLCafeSistemaArmonizado();
                    $cafeSistemaArmonizado=$sqlCafeSistemaArmonizado->getCafeSistemaArmonizadoPorID($cafeSistemaArmonizado);
                    $oic[29]=$cafeSistemaArmonizado->getCodigo();
                    
                    $oic[30]=$cafeBorrador->getValor_fob();
                    $oic[31]=$cafeBorrador->getId_moneda();
                    $oic[32]=$inf_adicional;
                    //
                    //print('<pre>'.print_r($oic,true).'</pre>');
                    $pdf->Cuerpo($oic);
                    //$filename = "factura-senavex-".$facturaSenavex->getId_factura_senavex()."-".$facturaSenavex->getFecha_emision()."test.pdf";
                    //$pdf->Output("OIC-", "I");
                    $pdf->Output(date('d-m-y').' Lote-'.$oic[17].'.pdf','I');
            }
            //$vista->display("admCafe/certificado.tpl");
            exit();
        }
        if($_REQUEST['tarea']=='show_recibo')
        {
            $servicioExportador=new ServicioExportador();
            $sqlServicioExportador=new SQLServicioExportador();
            
            $servicioExportador->setFacturado(5);
            $servicioExportador->setId_empresa($_REQUEST['id_empresa']);
            
            $lista=$sqlServicioExportador->getServiciosSinFacturar($servicioExportador);
            $int=0;
            
            foreach ($lista as $value) {
                $servicio=new Servicio();
                $sqlServicio=new SQLServicio();
                $servicio->setId_servicio($value->getId_Servicio());
                $servicio=$sqlServicio->getBuscarServicioPorId($servicio);
                
                $array_descripcion[$value->getId_Servicio()]=$servicio->getDescripcion();
                $array_precio[$value->getId_Servicio()]=$array_precio[$value->getId_Servicio()]+$value->getCosto_Actual();
            }
        }
        if($_REQUEST['tarea']=='guardarImportador')
        {
            $cafeImportador=new CafeImportador();
            $sqlCafeImportador=new SQLCafeImportador();
            $cafeImportador->setNombre($_REQUEST['nimportador']);
            
            if($sqlCafeImportador->Save($cafeImportador)){
                echo 1;
            }else{
                echo 0;
            }
            exit;
        }
        if($_REQUEST['tarea']=='print_recibo')
        {
           
        }
        if($_REQUEST['tarea']=='listarPaises')
        {
            $resultado = $this->listaPaises_I();
            $selected = ',"selected":true';

            $strJson = '';
            echo '[';
            foreach ($resultado as $datos){
                $strJson .= '{"clave_oic":"' . $datos->getId_cafe_pais() .
                        '","nombre":"' . $datos->getNombre() . '"},';
                $selected='';
            }

            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='cargarPuertos')
        {
           // print('<pre>'.print_r($_REQUEST,true).'</pre>');

            $lista=$this->listarPuertos($_REQUEST['pais']);
            $cafePuerto=new CafePuerto();
           
            $strJson='';
            echo '[';
            foreach ($lista as $value) {
                $cafePuerto=$value;
                $strJson.='{'
                        . '"id_cafe_puerto":"'.$cafePuerto->getId_cafe_puerto().'",'
                        . '"descripcion":"'.$cafePuerto->getDescripcion().'"'
                        . '},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit();
                //$lista=$this->listarPuertos($_REQUEST['id_pais']);
        
        }
    }
    private function listarPuertos($pais)
    {
        $cafePuerto=new CafePuerto();
        $sqlCafePuerto=new SQLCafePuerto();
        $cafePuerto->setClave_oic($pais);
        return $sqlCafePuerto->getListCafePuertoPorClave_oic($cafePuerto);
    }
    private function listarCertificados($ico,$estado)
    {
        $cafeBorrador=new CafeBorrador();
        $sqlcafeBorrador=new SQLCafeBorrador();
        $cafeBorrador->setEstado($estado);
        $cafeBorrador->setId_exportador_ruex($ico);
        $lista = $sqlcafeBorrador->getListarColaAsistentePorICO($cafeBorrador);
//        $lista = $sqlcafeBorrador->getListCafeCertificadoPorEstado($cafeBorrador);
        //print('<pre>'.print_r($lista,true).'</pre>');
        return $lista;
        /*$salida='';
        $cafeICO=new CafeICO();
        $sqlCafeICO=new SQLCafeICO();
        
        $cafePais=new CafePais();
        $sqlCafePais=new SQLCafePais();
        
        $cafeImportador=new CafeImportador();
        $sqlCafeImportador=new SQLCafeImportador();
//        print('<pre>'.print_r($lista,true).'</pre>');
        for ($index = 0; $index < count($lista)-1; $index++)
        {
            $cafeBorrador=$lista[$index];
           
            $cafeICO->setId_ico_cafe($cafeBorrador->getId_exportador_ruex());
            $cafeICO=$sqlCafeICO->getCafeICOxID($cafeICO);
            //print('<pre>'.print_r($cafeBorrador,true).'</pre>');
            $cafePais->setId_cafe_pais($cafeBorrador->getId_pais_destino());
            $cafePais=$sqlCafePais->getCafePaisPorID($cafePais);
            
            $cafeImportador->setId_cafe_importador($cafeBorrador->getCafe_importador());
            $cafeImportador=$sqlCafeImportador->getCafeImportadorPorID($cafeImportador);
            
            
            $salida.='{"id_certificado":"'.$cafeBorrador->getId_cafe_certificado().
                    '","nro_ruex":"'.$cafeICO->getId_empresa().
                    '","nro_factura":"'.$cafeBorrador->getNro_factura().
                    '","nombre_importador":"'.$cafeImportador->getNombre().
                    '","pais_destino":"'.$cafePais->getNombre().
                    '","valor_fob":"'.$cafeBorrador->getValor_fob().'"},';
            
        }
        if(count($lista)>0)
        {
            $cafeBorrador=$lista[count($lista)-1];
          
            $cafeICO->setId_ico_cafe($cafeBorrador->getId_exportador_ruex());
            $cafeICO=$sqlCafeICO->getCafeICOxID($cafeICO);
            //print('<pre>'.print_r($cafeBorrador,true).'</pre>');
            $cafePais->setId_cafe_pais($cafeBorrador->getId_pais_destino());
            $cafePais=$sqlCafePais->getCafePaisPorID($cafePais);
            
            $cafeImportador->setId_cafe_importador($cafeBorrador->getCafe_importador());
            $cafeImportador=$sqlCafeImportador->getCafeImportadorPorID($cafeImportador);
            
            
            $salida.='{"id_certificado":"'.$cafeBorrador->getId_cafe_certificado().
                    '","nro_ruex":"'.$cafeICO->getId_empresa().
                    '","nro_factura":"'.$cafeBorrador->getNro_factura().
                    '","nombre_importador":"'.$cafeImportador->getNombre().
                    '","pais_destino":"'.$cafePais->getNombre().
                    '","valor_fob":"'.$cafeBorrador->getValor_fob().'"}';
        }
        return '['.$salida.']';*/
    }
    private function listaPersona($empresa)
    {
        $empresaPersona=new EmpresaPersona();
        $sqlEmpresaPersona=new SQLEmpresaPersona();  
        $empresaPersona->setId_Empresa($empresa);
        $lista_personas=$sqlEmpresaPersona->getListarPersonaEmpresa($empresaPersona);
        return $lista_personas;
    }
    private function listaEmpresa()
    {
        $empresa=new Empresa();
        $sqlEmpresa=new SQLEmpresa();
           
        $lista_empresa=$sqlEmpresa->getListarEmpresasAdmitidas($empresa);
        return $lista_empresa;
    }
    private function getNroLote($id_ico_cafe)
    {
        $cafeBorrador = new CafeBorrador();
        $sqlCafeBorrador = new SQLCafeBorrador();
        
        $cafeBorrador->setId_exportador_ruex($id_ico_cafe);
        return $sqlCafeBorrador->getNumeroCertificados($cafeBorrador, date("Y"));
        //return 1;
    }
    private function getPDF($id_ruex)
    {
        $cafeBorrador = new CafeBorrador();
        $sqlCafeBorrador = new SQLCafeBorrador();
        $cafeBorrador->setId_exportador_ruex($id_ruex);
        $lifo=$sqlCafeBorrador->getLastOIC($cafeBorrador);
        if(count($lifo)>0){
            return $lifo[0];
        }
        return null;
    }
    private function listaImportador()
    {
        $cafeImportador = new CafeImportador();
        $sqlCafeImportador = new SQLCafeImportador();
        return $sqlCafeImportador->getLista($cafeImportador);
    }
    private function listaPuertoEmbarque()
    {
        $cafePuerto = new CafePuerto();
        $sqlCafePuerto = new SQLCafePuerto();
        return $sqlCafePuerto->getListCafePuerto($cafePuerto);
    }
    private function listaPaises_I()
    {
        $cafePais = new CafePais();
        $sqlCafePais = new SQLCafePais();
        $lista=$sqlCafePais->getListCafePais($cafePais);
        unset($lista[0]);
        return $lista;
    }
    private function listaPaises_II()
    {
        $cafePais = new CafePais();
        $sqlCafePais = new SQLCafePais();
        $lista1=$sqlCafePais->getListCafePais($cafePais);
        /*$cafePais=new CafePais();
        $cafePais->setId_cafe_pais(0);
        $cafePais->setNombre('NINGUNO');
        $cafePais->setClave_oic(0);
        $cafePais->setClave_iso(0);
        $cafePais->setClave_ue('0');
        $lista2[0]=$cafePais;
        return array_merge($lista2,$lista1);*/
        return $lista1;
    }
    private function listaMedioTransporte()
    {
        $cafeMedioTransporte = new CafeMedioTransporte();
        $sqlCafeMedioTransporte = new SQLCafeMedioTransporte();
        $lista=$sqlCafeMedioTransporte->getListCafeMedioTransporte($cafeMedioTransporte);
        return $lista;
    }
    private function listaTipoEmbalaje()
    {
        $cafeTipoEmbalaje = new CafeTipoEmbalaje();
        $sqlCafeTipoEmbalaje = new SQLCafeTipoEmbalaje();
        $lista=$sqlCafeTipoEmbalaje->getListCafeTipoEmbalaje($cafeTipoEmbalaje);
        return $lista;
    }
    private function listaUnidadMedida()
    {
        $cafeUnidadMedida = new CafeUnidadMedida();
        $sqlCafeUnidadMedida = new SQLCafeUnidadMedida();
        $lista=$sqlCafeUnidadMedida->getListCafeUnidadMedida($cafeUnidadMedida);
        return $lista;
    }
    private function listaDescripcion()
    {
        $cafeDescripcion = new CafeDescripcion();
        $sqlCafeDescripcion = new SQLCafeDescripcion();
        $lista=$sqlCafeDescripcion->getListCafeDescripcion($cafeDescripcion);
        return $lista;
    }
    private function listaElaboracion()
    {
        $cafeElaboracion = new CafeElaboracion();
        $sqlCafeElaboracion = new SQLCafeElaboracion();
        $lista=$sqlCafeElaboracion->getListCafeElaboracion($cafeElaboracion);
        return $lista;
    }
    private function listaNorma()
    {
        $cafeNorma = new CafeNorma();
        $sqlCafeNorma = new SQLCafeNorma();
        $lista=$sqlCafeNorma->getListCafeNorma($cafeNorma);
        return $lista;
    }
    private function listaSistemaArmonizado()
    {
        $cafeSistemaArmonizado = new CafeSistemaArmonizado();
        $sqlCafeSistemaArmonizado = new SQLCafeSistemaArmonizado();
        $lista = $sqlCafeSistemaArmonizado->getListCafeSistemaArmonizado($cafeSistemaArmonizado);
        return $lista;
    }
    private function listaCEspeciales()
    {
        $cafeCEspecial = new CafeCEspecial();
        $sqlCafeCEspecial = new SQLCafeCEspecial();
        $lista = $sqlCafeCEspecial->getListaCafeCEspecial($cafeCEspecial);
        return $lista;
    }
    private function listaMoneda()
    {
        $cafeMoneda = new CafeMoneda();
        $sqlCafeMoneda = new SQLCafeMoneda();
        $lista = $sqlCafeMoneda->getListaCafeMoneda($cafeMoneda);
        return $lista;
    }
    private function EliminarNULL(CafeBorrador $cafeBorrador){
        $cafeBorrador->setId_cafe_certificado($cafeBorrador->getId_cafe_certificado()==NULL? '':$cafeBorrador->getId_cafe_certificado());
    }
}