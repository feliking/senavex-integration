<?php
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');
include_once(PATH_CONTROLADOR . DS . 'admPersona' . DS . 'AdmPersona.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaHistorico.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaRevision.php');
include_once(PATH_MODELO . DS . 'SQLCategoriaEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLDepartamento.php');
include_once(PATH_MODELO . DS . 'SQLRubroExportaciones.php');
include_once(PATH_MODELO . DS . 'SQLTipoEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLActividadEconomica.php');
include_once(PATH_MODELO . DS . 'SQLUsuario.php');
include_once(PATH_MODELO . DS . 'SQLModificacionEmpresaRelevancia.php');
include_once(PATH_MODELO . DS . 'SQLVigenciaEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLServicio.php');
include_once(PATH_MODELO . DS . 'SQLCafeICO.php');
include_once(PATH_MODELO . DS . 'SQLFabrica.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');
include_once(PATH_MODELO . DS . 'SQLCorrelativooic.php');
include_once(PATH_MODELO . DS . 'SQLCorrelativoruex.php');
include_once(PATH_MODELO . DS . 'SQLSistemaColas.php');
include_once(PATH_MODELO . DS . 'SQLCiudad.php');
include_once(PATH_MODELO . DS . 'SQLMunicipio.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLSGCRuex.php');
include_once(PATH_MODELO . DS . 'SQLVerificacionRuex.php');

include_once(PATH_TABLA . DS . 'Servicio.php');
include_once(PATH_TABLA . DS . 'CafeICO.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'EmpresaHistorico.php');
include_once(PATH_TABLA . DS . 'EmpresaRevision.php');
include_once(PATH_TABLA . DS . 'Usuario.php');
include_once(PATH_TABLA . DS . 'CategoriaEmpresa.php');
include_once(PATH_TABLA . DS . 'Departamento.php');
include_once(PATH_TABLA . DS . 'RubroExportaciones.php');
include_once(PATH_TABLA . DS . 'TipoEmpresa.php');
include_once(PATH_TABLA . DS . 'ActividadEconomica.php');
include_once(PATH_TABLA . DS . 'UsuarioTemporal.php');
include_once(PATH_TABLA . DS . 'ModificacionEmpresaRelevancia.php');
include_once(PATH_TABLA . DS . 'VigenciaEmpresa.php');
include_once(PATH_TABLA . DS . 'Fabrica.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'Correlativooic.php');
include_once(PATH_TABLA . DS . 'CorrelativoRuex.php');
include_once(PATH_TABLA . DS . 'SistemaColas.php');
include_once(PATH_TABLA . DS . 'Municipio.php');
include_once(PATH_TABLA . DS . 'Ciudad.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexEmpresa.php');
include_once(PATH_TABLA . DS . 'SGCRuex.php');
include_once(PATH_TABLA . DS . 'VerificacionRuex.php');


include_once( PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');
include_once( PATH_CONTROLADOR . DS . 'admDireccion' . DS . 'AdmDireccion.php');


include_once(PATH_MODELO . DS . 'SQLBitacora_ws.php');
include_once(PATH_TABLA . DS . 'Bitacora_ws.php');


class AdmEmpresa extends Principal {
    public function AdmEmpresa() 
    {
        $vista = Principal::getVistaInstance();

        $empresa = new Empresa();
        $usuariotemporal = new UsuarioTemporal();
        $usuario = new Usuario();
        $fabrica = new Fabrica();
        $sqlUsuario_Temporal = new SQLUsuario();
        $sqlEmpresa = new SQLEmpresa();
        $sqlFabrica = new SQLFabrica();
        $sistema_colas = new SistemaColas();     
        //--------------------esto es para la impresion del ruex----------------------------------------------------
        
        
        if($_REQUEST['tarea']=='VerificarNIT'){
            $emp = new Empresa();
            $sqlEmp = new SQLEmpresa();
            $emp->setNit($_REQUEST['nit']);
            $emp = $sqlEmp->getEmpresaPorNIT($emp);
            if($emp){
                echo '[{"suceso":"1","msg":"Ya existe Empresa con ese NIT, por favor consulte en nuestras oficinas. Gracias!"}]';
            }else{
                echo '[{"suceso":"0","msg":"No Existe Empresa registrada con ese NIT."}]';
            }
            exit;
           // print('<pre>'.print_r($_REQUEST,true).'</pre>');
        }
        if($_REQUEST['tarea']=='verificarRazonSocial'){
            exit;
        }
        if($_REQUEST['tarea']=='prueba'){
            exit;
        }
        if($_REQUEST['tarea']=='miRuex')
        {
            $empresaPersona = new EmpresaPersona();
            $empresaPersona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $sqlEmpresaPersona = new SQLEmpresaPersona();
            $empresaPersona = $sqlEmpresaPersona->getEmpresaPersonaPorID($empresaPersona);
            
            //------------------------------------
            $empresa = $this->AsignarEmpresa($_SESSION["id_empresa"]);
            //------------------------preguntamos si es cafetalera
            $ico = $this->verificaEmpresaIco($empresa);

            if(!empty($ico))
            {
                $vista->assign('ico', $ico);
            }  

            $fecha_renovacion_a= explode("-", $empresa->getFecha_renovacion_ruex());
            $empresa->setFecha_renovacion_ruex($fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0]);
            //-----------------------para sacar los datos del representante legal
//               print($empresa->getId_representante_legal());exit();
            $persona=AdmPersona::asignarPersona($empresa->getId_representante_legal());
            $vista->assign('persona', $persona);

            //---------------preguntamos cual es su estado de modificacion
            $empresad=new Empresa();
            $empresad->setId_empresa($_SESSION['id_empresa']);
            $empresad=$sqlEmpresa->getEmpresaPorID($empresad);
            $tipo_empresa = new TipoEmpresa();
            $actividad_economica = new ActividadEconomica();
            $rubro_exportaciones = new RubroExportaciones();
            $datostipoempresa=$sqlEmpresa->getDatosTipoEmpresa($tipo_empresa);
            $datosactividadeconomica=$sqlEmpresa->getDatosActividadEconomica($actividad_economica);
            //---esto es para enviarle los rubros de exportacion
            $rubro_exportaciones = new RubroExportaciones();
            $sqlRubro_exportaciones = new SQLRubroExportaciones();
            $rubros_exportaciones=$sqlRubro_exportaciones-> getListarRubroExportaciones($rubro_exportaciones);
            //---------------------esto es para todo los funcionarios de esa empresa------------------------
            $personal=  AdmPersona::listarPersonasPorEmpresa($_SESSION['id_empresa']);
            $departamento = new Departamento();
            $datosdepartamento=$sqlEmpresa->getDatosDepartamento($departamento);
            $vista->assign('datosdepartamento', $datosdepartamento);

            //---------------------esto es para la modificacion empresa relevancia------------------------------------
            $vista->assign('personal', $personal);
            $vista->assign('datostipoempresa', $datostipoempresa);
            $vista->assign('datosactividadeconomica', $datosactividadeconomica);
            $vista->assign('rubros_exportaciones', $rubros_exportaciones);
            
            $municipio=new Municipio();
            $sqlMunicipio=new SQLMunicipio();
            $municipio->setId_municipio($empresa->getMunicipio());
            $municipio=$sqlMunicipio->getMunicipioPorID($municipio);

            $ciudad=new Ciudad();
            $sqlCiudad=new SQLCiudad();
            $ciudad->setId_ciudad($empresa->getCiudad());
            $ciudad=$sqlCiudad->getCiudadPorID($ciudad);

            $sgc_ruex = new SGCRuex();
            $sql_sgc_ruex = new SQLSGCRuex();
            $sgc_ruex->setId_empresa($_SESSION['id_empresa']);
            $lista = $sql_sgc_ruex->getListSGCRuexPorEmpresa($sgc_ruex);
            if(count($lista) > 0){
                $observacion = $lista[0]->getObservaciones();
            }else {
                $observacion = '';
            }
            $sgc_ruex = new SGCRuex();
            $sgc_ruex->setId_empresa($_SESSION['id_empresa']);
            $sgc_ruex->setRevisado(0);
            $lista = $sql_sgc_ruex->getListSGCRuexPorEmpresaRevisado($sgc_ruex);
            $fecha_ini = strtotime('2016-09-01 00:00:00');
            $fecha_fin = strtotime('2016-12-31 23:59:59');
            $fecha_registro = strtotime($empresad->getFecha_registro());
            $vista->assign('ver_editor', $empresa->getEstado()==9 || $empresa->getEstado()==14 || $empresa->getEstado()==13? '1':'0');
            $vista->assign('revision', count($lista) > 0? '0' : '1');
//            $vista->assign('cobrar', $empresad->getEstado()==0 || $empresad->getEstado()==9 || $empresad->getEstado()==4? '1' : '0');
            $vista->assign('cobrar', $empresad->getEstado()==2? '0' : '1');
//            $vista->assign('editable', $empresad->getEstado()==0 || $empresad->getEstado()==9 ? '1' : '0');
//            $vista->assign('editable', ($empresad->getEstado()==0 || $empresad->getEstado()==9 || ( $fecha_registro>=$fecha_ini && $fecha_registro<=$fecha_fin && $empresad->getDireccion()==null ) ) ? '1' : '0');
            $vista->assign('editable', ($empresad->getEstado()==0 || $empresad->getEstado()==9) ? '1' : '0');
            
            $titulo = "VALIDACIÓN RUEX";
            if($empresa->getEstado()==4){ 
                $titulo = "VALIDACIÓN MODIFICACIÓN RUEX";
            }
            $mensaje_estado = '';
            if($empresa->getEstado()==9)
                $mensaje_estado = 'Su Registro presenta observaciones, presione Editar para ver las observaciones en la parte inferior del documento';
            if($empresa->getEstado()==6)
                $mensaje_estado = 'Solicitó Renovar su RUEX, puede apersonarse a nuestras oficinas con los documentos para validar su Renovación';
            if($empresa->getEstado()==14)
                $mensaje_estado = 'Su Renovación Presenta Observaciones, presione Editar para ver las observaciones en la parte inferior del documento';
            if($empresa->getEstado()==4)
                $mensaje_estado = 'Solicito Modificación de los datos RUEX, puede apersonarse a nuestras oficinas con los documentos para validar sus actualizaciones';
            if($empresa->getEstado()==13)
                $mensaje_estado = 'Su Modificación de datos RUEX Presenta Observaciones, presione Editar para ver las observaciones en la parte inferior del documento';
            
            $imprimir_ruex = $empresa->getEstado()==2;
            $vista->assign('imprimir_ruex', $imprimir_ruex);
            $vista->assign('mensaje_estado', $mensaje_estado);
            $vista->assign('titulo', '$titulo');
            $vista->assign('observacion',$observacion);

            $vista->assign('municipio',$municipio!=null? $municipio->getDescripcion():'');
            $vista->assign('ciudad',$ciudad!=null? $ciudad->getDescripcion():'');
            $vista->assign('afiliaciones_val',$empresa->getAfiliaciones());

            $departamento = new Departamento();
            $datosdepartamento=$sqlEmpresa->getDatosDepartamento($departamento);
            $vista->assign('datosdepartamento', $datosdepartamento);
            $vista->assign('empresad', $empresad);
            $vista->assign('empresa', $empresa);
            $vista->assign("renovacion_editar", ($empresa->getEstado()==6 || $empresa->getEstado()==14)? 1:0);
            $vista->assign('valido', ($empresa->getEstado()==2 || $empresa->getEstado()==10 )? 1:0 );
             $vista->assign("rep_legal", $empresaPersona->getId_Perfil()==3? 1:0);
            $vista->display("ruex/RuexModificacionTodo.tpl");
            exit;
        }    
        //------------------esto0 es para la configutracion de unb empresa---------------------------------------------

        if($_REQUEST['tarea']=='editarEmpresaTodo')
        {
            $empresaRevision = new EmpresaRevision();
           
            $empresa->setId_empresa($_SESSION['id_empresa']);
            $empresa = $sqlEmpresa->getEmpresaPorId($empresa);
            
            $empresaRevision->setId_empresa($empresa->getId_empresa());
            $empresaRevision->setRazon_social($empresa->getRazon_Social());
            $empresaRevision->setNombre_comercial($empresa->getNombre_Comercial());
            $empresaRevision->setNit($empresa->getNit());
            $empresaRevision->setMatricula_fundempresa($empresa->getMatricula_Fundempresa());
            $empresaRevision->setIdtipo_empresa($empresa->getIdTipo_Empresa());
            $empresaRevision->setIdactividad_economica($empresa->getIdActividad_Economica());
            $empresaRevision->setIdcategoria_empresa($empresa->getIdCategoria_Empresa());
            $empresaRevision->setDireccion($empresa->getDireccion());
            $empresaRevision->setEmail($empresa->getEmail());
            $empresaRevision->setEmail_secundario($empresa->getEmail_Secundario());
            $empresaRevision->setRuex($empresa->getRuex());
            $empresaRevision->setEstado($empresa->getEstado());
            $empresaRevision->setFecha_asignacion_ruex($empresa->getFecha_asignacion_ruex());
            $empresaRevision->setFecha_registro($empresa->getFecha_registro());
            $empresaRevision->setFecha_renovacion_ruex($empresa->getFecha_renovacion_ruex());
            $empresaRevision->setObservaciones($empresa->getObservaciones());
            $empresaRevision->setDatos_categoria_empresa($empresa->getDatos_categoria_empresa());
            $empresaRevision->setVigencia($empresa->getVigencia());
            $empresaRevision->setIco($empresa->getIco());
            $empresaRevision->setId_representante_legal($empresa->getId_representante_legal());
            $empresaRevision->setCertificacionnit($empresa->getCertificacionnit());
            $empresaRevision->setTituloco($empresa->getTituloco());
            $empresaRevision->setOea($empresa->getOea());
            $empresaRevision->setDescripcion_empresa($empresa->getDescripcion_empresa());
            $empresaRevision->setDate_fundacion($empresa->getDate_fundacion());
            $empresaRevision->setDate_inicio_operaciones($empresa->getDate_inicio_operaciones());
            $empresaRevision->setCoordenada_lat($empresa->getCoordenada_lat());
            $empresaRevision->setCoordenada_long($empresa->getCoordenada_long());
            $empresaRevision->setAfiliaciones($empresa->getAfiliaciones());
//            $empresaRevision->setCodigo_seguridad($empresa->getCodigo_seguridad());
            $empresaRevision->setIdrubro_exportaciones($empresa->getIdRubro_Exportaciones());
            $empresaRevision->setFecha_modificacion(date("Y-m-d H:i:s"));
            
            /*---------------------modificamos la empresa---------------------------*/
            if($_REQUEST['chbx_nro_ruex']=='on'){
                $empresa->setRuex ($_REQUEST['nro_ruex']);
            }
            
            if($empresa->getEstado() == 0 || $empresa->getEstado() == 9){
                $empresa->setRazon_Social($_REQUEST['razonsocial']);
                $empresa->setNombre_Comercial($_REQUEST['nombrecomercial']);
                $empresa->setNit($_REQUEST['nit']);
                $empresa->setMatricula_Fundempresa($_REQUEST['fundaempresa']);
            }

            $empresa->setIdTipo_Empresa($_REQUEST['tipoempresa']);
            if($_REQUEST['afiliaciones']!='' ) $empresa->setAfiliaciones($_REQUEST['afiliaciones']);
            $empresa->setCoordenada_lat($_REQUEST['coordenadas_lat']);
            $empresa->setCoordenada_long($_REQUEST['coordenadas_lon']);
            $empresa->setDate_fundacion($_REQUEST['fundacion_empresa']);
            $empresa->setDate_inicio_operaciones($_REQUEST['inicio_empresa']);
            $empresa->setDescripcion_empresa($_REQUEST['descripcion_empresa']);

            if($_REQUEST['habilitado']=='true' || $_REQUEST['editable']=='1'){
                $_request=$_REQUEST;
                $empresa->setDireccion(AdmDireccion::guardarDireccion($_request));
            }

            if($_REQUEST['actualizacion'] && $_REQUEST['chbx_renovacion'] != '1'){

                if($empresa->getId_representante_legal() != $_REQUEST['representante']){
                    $ep = new EmpresaPersona();
                    $sqlEp = new SQLEmpresaPersona();
                    $ep->setId_Perfil(3);
                    $ep->setId_Empresa($_SESSION['id_empresa']);
                    $list = $sqlEp->getListPersonasPorPerfil($ep);

                    foreach ($list as $value) {
                        $hoy = date("Y-m-d H:i:s");
                        $value->setActivo('0');
                        $value->setFecha_Baja($hoy);
                        $sqlEp->setGuardarEmpresaPersona($value);

                        $nep = new EmpresaPersona();
                        $nep->setId_Persona($value->getId_Persona());
                        $nep->setId_Empresa($value->getId_Empresa());
                        $nep->setId_Perfil(4);
                        $nep->setFecha_Vinculacion($hoy);
                        $nep->setActivo('1');
                        $nep->setId_regional($value->getId_regional());
                        $sqlEp->setGuardarEmpresaPersona($nep);
                    }

                    $ep->setId_Empresa($_SESSION['id_empresa']);
                    $ep->setId_Persona($_REQUEST['representante']);
                    $ep = $sqlEp->getEmpresaPorPersonaEmpresa($ep);
                    $ep->setActivo('0');
                    $ep->setFecha_Baja($hoy);
                    $sqlEp->setGuardarEmpresaPersona($ep);

                    $ep = new EmpresaPersona();
                    $ep->setId_Empresa($_SESSION['id_empresa']);
                    $ep->setId_Persona($_REQUEST['representante']);
                    $ep->setActivo('1');
                    $ep->setId_Perfil(3);
                    $ep->setFecha_Vinculacion($hoy);
                    $sqlEp->setGuardarEmpresaPersona($ep);
                    $empresa->setId_representante_legal($_REQUEST['representante']);
                }

                if($_REQUEST['editable']=='0' && $_REQUEST['cobrar']=='0'){
                    $empresa->setEstado(4);
                    $servicio = new Servicio();
                    $sqlServicio = new SQLServicio();
                    $servicio->setId_servicio(4);
                    $servicio=$sqlServicio->getBuscarServicioPorId($servicio);

                    $servicio_exportador = new ServicioExportador();
                    $sqlServicio_exportador = new SQLServicioExportador();
                    $servicio_exportador->setId_Servicio($servicio->getId_servicio());
                    $servicio_exportador->setCosto_Actual($servicio->getCosto());
                    $servicio_exportador->setFecha_Servicio(date("Y-m-d H:i:s"));
                    $servicio_exportador->setId_Persona($_SESSION['id_persona']);
                    $servicio_exportador->setId_empresa($empresa->getId_empresa());
                    $servicio_exportador->setFacturado(0);
                    $sqlServicio_exportador->Save($servicio_exportador);
                }

            }

            //----------------------para la categoria-----------------------------//
            if($_REQUEST['ventas']=='0' or $_REQUEST['exportaciones']=='0') $categoria='1';
            if($_REQUEST['trabajadores']=='1' or $_REQUEST['activos']=='1' or $_REQUEST['ventas']=='1' or $_REQUEST['exportaciones']=='1')  $categoria='1';
            if($_REQUEST['trabajadores']=='2' or $_REQUEST['activos']=='2' or $_REQUEST['ventas']=='2' or $_REQUEST['exportaciones']=='2') $categoria='2'; 
            if($_REQUEST['trabajadores']=='3' or $_REQUEST['activos']=='3' or $_REQUEST['ventas']=='3' or $_REQUEST['exportaciones']=='3')  $categoria='3';
            if($_REQUEST['trabajadores']=='4' or $_REQUEST['activos']=='4' or $_REQUEST['ventas']=='4' or $_REQUEST['exportaciones']=='4') $categoria='4';

            $empresa->setDatos_categoria_empresa($_REQUEST['trabajadores'].','.$_REQUEST['activos'].','.$_REQUEST['ventas'].','.$_REQUEST['exportaciones']);
            $empresa->setIdCategoria_Empresa($categoria);
            $empresa->setOea($_REQUEST['oea']);
    /*      ------------------------de acuerdo a la categoria de la empresale agino una vigencia------------------------
                /*$vigencia_empresa = new VigenciaEmpresa();
                $sqlVigenciaEmpresa = new SQLVigenciaEmpresa();
                $vigencia_empresa->setId_vigencia_empresa(($_REQUEST['oea'] ? 3 : 4));//esto ese cambia de acuerdo a la OEA
                $vigencia_empresa=$sqlVigenciaEmpresa->getBuscarDescripcionPorId($vigencia_empresa);
                $empresa->setVigencia($vigencia_empresa->getDescripcion());
                $empresa->setFecha_asignacion_ruex(date("Y-m-d"));
                $empresa->setFecha_renovacion_ruex(date('Y-m-d', strtotime(date("Y-m-d"). ' + '.$vigencia_empresa->getDias().' days')));
            //----------------------------------------------------*/
            $empresa->setIdActividad_Economica($_REQUEST['actividad']);
    /*        $empresa->setIdDepartamento_Procedencia($_REQUEST['departamento']);
    //        $empresa->setMunicipio($_REQUEST['municipio']);
    //        $empresa->setCiudad($_REQUEST['ciudad']);
    //        $empresa->setMunicipio($_REQUEST['municipio']);
    //        $empresa->setEstado(0);
    //        $empresa->setNumero_Contacto($_REQUEST['numero']);
    //        if($_REQUEST['fax'])  $empresa->setFax($_REQUEST['fax']);*/
            $empresa->setPagina_Web($_REQUEST['paginaweb']);
            $empresa->setEmail($_REQUEST['email']);
    /*        $empresa->setEmail_Secundario($_REQUEST['email2']);
            if($_REQUEST['direccionfiscal']) $empresa->setDireccionfiscal($_REQUEST['direccionfiscal']);*/
            $empresa->setNim($_REQUEST['nim']);

            $cafeICO = new CafeICO();
            $sqlcafeICO = new SQLCafeICO();
            $cafeICO->setId_empresa($_SESSION['id_empresa']);
            $existe = $sqlcafeICO->ExisteICO($cafeICO);
            if($_REQUEST['respcafe']=='si'){
                
                if(count($existe)>0){
                    $cafeICO=$sqlcafeICO->getCafeICO_Empresa($cafeICO);
                }else{
                    $cafeICO->setIco(0);
                }

                if($_REQUEST['respico'])
                {
                    if($_REQUEST['respico']=='si')//si tiene lo gruadamos
                    {
                        if($_REQUEST['ico'] != $cafeICO->getIco()){
                            $cafeICO->setIco($_REQUEST['ico']);
                        }
                    }
                    else// si no tiene le asignamos
                    {
                        $cafeICO=$sqlcafeICO->getCafeICO_Empresa($cafeICO);
                        $correlativooic= new Correlativooic();
                        $sqlcorrelativooic = new SQLCorrelativooic();
                        $correlativooic=$sqlcorrelativooic->getCorrelativooic($correlativooic);
                        //$cafeICO->setIco('BO-'.$correlativooic->getCorrelativooic());                
                        $cafeICO->setIco($correlativooic->getCorrelativooic());                
                        $sqlcorrelativooic->setGuardarCorrelativooic($correlativooic);
                    }
                    $cafeICO->setLote(0);
                    $sqlcafeICO->Save($cafeICO);
                }
                else{
                    if($cafeICO){
                        $sqlcafeICO->setEliminarCafeIco($cafeICO);
                    }
                }
            }else{
                if(count($existe) > 0){
                    //print('<pre>'.print_r($existe,true).'</pre>');
                    $cafeICO=$sqlcafeICO->getCafeICO_Empresa($cafeICO);
                    $sqlcafeICO->setEliminarCafeIco($cafeICO);
                }
            }

            if (isset($_REQUEST['rubroexportacionesarray'])) {
                $optionArray = $_REQUEST['rubroexportacionesarray'];
                for ($i=0; $i<count($optionArray); $i++) {
                    if($i==0)
                    {
                        $rubros=$optionArray[$i];
                    }
                    else
                    {                    
                        $rubros=$rubros.','.$optionArray[$i];
                    }
                }
            }
            $empresa->setIdRubro_Exportaciones($rubros);
            $empresa->setNim($_REQUEST['nim']);
            if($_REQUEST['cuantia']) $empresa->setMenor_Cuantia('true');
            else $empresa->setMenor_Cuantia('false');  
            $empresa->setId_Usuario_Temporal($_SESSION["id_usuario"]);    
            if($_REQUEST['radioenf'])$empresa->setFrecuente(($_REQUEST['radioenf']=='1'?true:false));
            else $empresa->setFrecuente(false);
            $empresa->setCertificacionnit($_REQUEST['certificacionnit']);
            $empresa->setTituloco(($_REQUEST['titulocof']=='1'?true:false));
            
            if($_REQUEST['chbx_renovacion'] === '1'){
                $empresa->setEstado(6);
                $servicio = new Servicio();
                $sqlServicio = new SQLServicio();
                if(($empresa->getIdTipo_Empresa()>=1 && $empresa->getIdTipo_Empresa()<=7) || ($empresa->getIdTipo_Empresa()>=18 && $empresa->getIdTipo_Empresa()<=19)){
                    $servicio->setId_servicio(74);
                }else{
                    $servicio->setId_servicio(73);
                }
                $servicio=$sqlServicio->getBuscarServicioPorId($servicio);

                $servicio_exportador = new ServicioExportador();
                $sqlServicio_exportador = new SQLServicioExportador();
                $servicio_exportador->setId_Servicio($servicio->getId_servicio());
                $servicio_exportador->setCosto_Actual($servicio->getCosto());
                $servicio_exportador->setFecha_Servicio(date("Y-m-d H:i:s"));
                $servicio_exportador->setId_Persona($_SESSION['id_persona']);
                $servicio_exportador->setId_empresa($empresa->getId_empresa());
                $servicio_exportador->setFacturado(0);
                $sqlServicio_exportador->Save($servicio_exportador);
            }else{
                if($empresa->getEstado()==9){
                    $empresa->setEstado(0);
                }
                if($empresa->getEstado()==2 || $empresa->getEstado()==13){
                    $empresa->setEstado(4);
                }
                if($empresa->getEstado()==14){
                    $empresa->setEstado(6);
                }
//                }else{
//                    $empresa->setEstado($empresa->getEstado()==9? 0:($empresa->getEstado()==13? 4: $empresa->getEstado()) );
//                }
            }
//            print('<pre>'.print_r($empresa,true).'</pre>');
            if($sqlEmpresa->setGuardarEmpresa($empresa))
            {
                $sqlEmpresaRevision = new SQLEmpresaRevision();
                $sqlEmpresaRevision->save($empresaRevision);
                echo '[{"suceso":"0"}]';
            }
            else{
                echo '[{"suceso":"1"}]';
            }
            exit;
        }
        if($_REQUEST['tarea']=='editarEmpresaParcial1')
        {
             //print('<pre>'.print_r($_REQUEST,true).'</pre>');
             $empresa=new Empresa();
             $empresa->setIdCategoria_Empresa(1);
             $empresa->setIdTipo_Empresa(1);
             $empresa->setEstado(0);
    //         $empresa->setId_empresa(8);
             $empresa->setRazon_Social('ocho');
             $empresa->setNombre_Comercial('ocjo');
            // print('<pre>'.print_r($sqlEmpresa->GuardarEmpresa($empresa),true).'</pre>');
        }
        if($_REQUEST['tarea']=='editarEmpresaParcial')
        {
            //print('<pre>'.print_r($_REQUEST,true).'</pre>');
            $empresa->setId_empresa($_SESSION['id_empresa']);
            $empresa = $sqlEmpresa->getEmpresaPorId($empresa);

            $hoy = date("Y-m-d");
            $swcambio=false;
            $modificaciones='';

            //-----------------verificar si se cambio algun dato importante------------------------------
                if($_REQUEST['razonsocial']!=$empresa->getRazon_social()){ $modificaciones.='1,';$swcambio=true;} //echo 'cambio razon social'.$_REQUEST['razonsocial'].'-'.$empresa->getRazon_social();}
                if($_REQUEST['nombrecomercial']!=$empresa->getNombre_comercial()){ $modificaciones.='2,';$swcambio=true; }
                if($_REQUEST['fundaempresa'] && $_REQUEST['fundaempresa']!=$empresa->getMatricula_fundempresa()){$modificaciones.='12,'; $swcambio=true;} //echo 'cambio fundaempresal';}
                if($_REQUEST['tipoempresa']!=$empresa->getIdtipo_empresa()){ $swcambio=true;$modificaciones.='4,';} //echo 'campio tipo empresa';}
                if($_REQUEST['oea']!=$empresa->getOea()){if($_REQUEST['oea']!=''){$modificaciones.='6,';} $swcambio=true;}// echo 'campio oea';}
                if($_REQUEST['direccionfiscal']!=$empresa->getDireccionfiscal()){$modificaciones.='5,'; $swcambio=true;}//echo 'campio direcionfiscal';}
                $rubros=explode(",",$empresa->getIdrubro_exportaciones());
                $swrn=false;
                foreach ($rubros as &$rubro) {
                    if($rubro==8)
                    {
                        $swrn=true;
                        break;
                    }
                }
                if(!$swrn)
                {
                   $optionArray = $_REQUEST['rubroexportacionesarray'];
                    for ($i=0; $i<count($optionArray); $i++) {
                        if($optionArray[$i]==8)
                        {
                            $swcambio=true;// echo 'adicionoel rubro minerales';
                            $swadicionom=1;
                            $modificaciones.='8,';
                            break;
                        }
                    } 
                }
                if($_REQUEST['nim']!=$empresa->getNim()) //echo 'cambio nim';}
                {
                    if($_REQUEST['nim']!='')
                    { 
                        $modificaciones.='10,';
                    }
                    $swcambio=true;
                } 

                $cafeICO = new CafeICO();
                $sqlcafeICO = new SQLCafeICO();
                $cafeICO->setId_empresa($_SESSION['id_empresa']);
                $cafeICO=$sqlcafeICO->getCafeICO_Empresa($cafeICO);
                if($cafeICO )
                {
                    if($_REQUEST['ico'] )                    
                    {
                    if($_REQUEST['ico']!=$cafeICO->getIco()){ $swcambio=true; $modificaciones.='9,';}//echo 'se modifico el ico';}
                    }
                    else{ $swcambio=true; $modificaciones.='9,';}//echo 'se elimino el ico';}
                }
                else 
                {
                     if($_REQUEST['respico'])
                        {
                            if($_REQUEST['respico']=='no') $swcambio=true;// echo 'se le asignara un numero ico';}
                            else if($_REQUEST['ico']) $swcambio=true;// echo 'se registra el nuevo ico';} 
                            $modificaciones.='9,';
                        } 
                }



                if($_REQUEST['representante']!=$empresa->getId_representante_legal()){ $swcambio=true;$modificaciones.='11,';}// echo 'cambio rl';}
                if($_REQUEST['renovacion']=='1'){ $swcambio=true;$modificaciones.='3,';}// echo 'piderenovacion';}
                if(($_REQUEST['radioenf']==0?false:true)!=$empresa->getFrecuente()){ $swcambio=true;$modificaciones.='13,';}
            //----------------------------------------------------------------------------------------
            if($swcambio)
            {//-----------------------------------se cambiaron datos importantes-------------------------------------------
                //aqui se genera la emrpesa para revisión antes de ser aprobada
                $empresarevision = new EmpresaRevision();
                $sqlEmpresarevision = new SQLEmpresaRevision();
                $empresarevision->setId_empresa($empresa->getId_empresa());
                $empresarevision->setRazon_Social($_REQUEST['razonsocial']);
                $empresarevision->setEstado(0);
                $empresarevision->setNombre_Comercial($_REQUEST['nombrecomercial']);
                $empresarevision->setNit($empresa->getNit());
                if($_REQUEST['fundaempresa'] && $_REQUEST['fundaempresa']!=$empresa->getMatricula_fundempresa()) $empresarevision->setMatricula_Fundempresa($_REQUEST['fundaempresa']);
                else $empresarevision->setMatricula_Fundempresa($empresa->getMatricula_Fundempresa());
                $empresarevision->setIdTipo_Empresa(($_REQUEST['tipoempresa']?$_REQUEST['tipoempresa']:$empresa->getIdtipo_empresa()));
                $empresarevision->setIdActividad_Economica($_REQUEST['actividad']);
                //------para la categoria-----------------------------//
                  if($_REQUEST['ventas']=='0' or $_REQUEST['exportaciones']=='0') $categoria='1';
                  if($_REQUEST['trabajadores']=='1' or $_REQUEST['activos']=='1' or $_REQUEST['ventas']=='1' or $_REQUEST['exportaciones']=='1')  $categoria='1';
                  if($_REQUEST['trabajadores']=='2' or $_REQUEST['activos']=='2' or $_REQUEST['ventas']=='2' or $_REQUEST['exportaciones']=='2') $categoria='2'; 
                  if($_REQUEST['trabajadores']=='3' or $_REQUEST['activos']=='3' or $_REQUEST['ventas']=='3' or $_REQUEST['exportaciones']=='3')  $categoria='3';
                  if($_REQUEST['trabajadores']=='4' or $_REQUEST['activos']=='4' or $_REQUEST['ventas']=='4' or $_REQUEST['exportaciones']=='4') $categoria='4';

                $empresarevision->setDatos_categoria_empresa($_REQUEST['trabajadores'].','.$_REQUEST['activos'].','.$_REQUEST['ventas'].','.$_REQUEST['exportaciones']);
                $empresarevision->setIdCategoria_Empresa($categoria);        

                $empresarevision->setIdDepartamento_Procedencia($_REQUEST['departamento']);
                $empresarevision->setCiudad($_REQUEST['ciudad']);            
                $empresarevision->setNumero_Contacto($_REQUEST['numero']);
                $empresarevision->setFax($_REQUEST['fax']);
                $empresarevision->setPagina_Web($_REQUEST['paginaweb']);
                $empresarevision->setEmail($_REQUEST['email']);
                $empresarevision->setMenor_Cuantia($empresa->getMenor_Cuantia());
                if($_REQUEST['nim'] && $_REQUEST['nim']!=$empresa->getNim()) $empresarevision->setNim($_REQUEST['nim']);
                $empresarevision->setId_Usuario_Temporal($empresa->getId_Usuario_temporal());   

                    $vigencia_empresa = new VigenciaEmpresa();
                    $sqlVigenciaEmpresa = new SQLVigenciaEmpresa();

                if($_REQUEST['oea'] && $_REQUEST['oea']!=$empresa->getOea())
                {
                    $empresarevision->setOea($_REQUEST['oea']);
                    $vigencia_empresa->setId_vigencia_empresa(3);
                }
                else $vigencia_empresa->setId_vigencia_empresa(2);

                    //esto ese cambia de acuerdo a la OEA

                    $vigencia_empresa=$sqlVigenciaEmpresa->getBuscarDescripcionPorId($vigencia_empresa);
                $empresarevision->setVigencia($vigencia_empresa->getDescripcion());

                $empresarevision->setFecha_asignacion_ruex($hoy);
                $empresarevision->setFecha_renovacion_ruex(date('Y-m-d', strtotime(date("Y-m-d"). ' + '.$vigencia_empresa->getDias().' days')));
                $empresarevision->setId_usuario_root($empresa->getId_usuario_root());     
                $empresarevision->setRuex($empresa->getRuex());
                $empresarevision->setFormato_imagen($empresa->getFormato_imagen());
                if (isset($_REQUEST['rubroexportacionesarray'])) {
                    $optionArray = $_REQUEST['rubroexportacionesarray'];
                    for ($i=0; $i<count($optionArray); $i++) {
                        if($i==0)
                        {
                            $rubros=$optionArray[$i];
                        }
                        else
                        {                    
                            $rubros=$rubros.','.$optionArray[$i];
                        }
                    }
                }
                $empresarevision->setIdRubro_Exportaciones($rubros); 
                if($_REQUEST['respico'])//preguntamos si es exportador de cafe
                {
                    if($_REQUEST['respico']=='si')//si tiene lo gruadamos
                    {
                        $empresarevision->setIco($_REQUEST['ico']);
                    }
                    else// si no tiene le asignamos
                    {
                        $correlativooic= new Correlativooic();
                        $sqlcorrelativooic = new SQLCorrelativooic();
                        $correlativooic=$sqlcorrelativooic->getCorrelativooic($correlativooic);
                        //$empresarevision->setIco('BO-'.$correlativooic->getCorrelativooic());
                        $empresarevision->setIco($correlativooic->getCorrelativooic());
                    }
                }   
                $empresarevision->setDireccionfiscal($_REQUEST['direccionfiscal']);
                $empresarevision->setId_representante_legal($_REQUEST['representante']);
                $empresarevision->setFecha_solicitud($hoy);
                $empresarevision->setRenovacion(($_REQUEST['renovacion'] ? true : false));
                if($_REQUEST['radioenf'])$empresarevision->setFrecuente(($_REQUEST['radioenf']=='1'?true:false));
                else $empresarevision->setFrecuente(false);
                $empresarevision->setCertificacionnit($empresa->getCertificacionnit());
                //$empresarevision->setTituloco(($_REQUEST['titulocof']=='1'?true:false));
                $empresarevision->setModificaciones(trim($modificaciones, ","));
                if($sqlEmpresarevision->setGuardarEmpresa($empresarevision))
                {
                    //------para la categoria-----------------------------//
                      if($_REQUEST['ventas']=='0' or $_REQUEST['exportaciones']=='0') $categoria='1';
                      if($_REQUEST['trabajadores']=='1' or $_REQUEST['activos']=='1' or $_REQUEST['ventas']=='1' or $_REQUEST['exportaciones']=='1')  $categoria='1';
                      if($_REQUEST['trabajadores']=='2' or $_REQUEST['activos']=='2' or $_REQUEST['ventas']=='2' or $_REQUEST['exportaciones']=='2') $categoria='2'; 
                      if($_REQUEST['trabajadores']=='3' or $_REQUEST['activos']=='3' or $_REQUEST['ventas']=='3' or $_REQUEST['exportaciones']=='3')  $categoria='3';
                      if($_REQUEST['trabajadores']=='4' or $_REQUEST['activos']=='4' or $_REQUEST['ventas']=='4' or $_REQUEST['exportaciones']=='4') $categoria='4';

                    $empresa->setDatos_categoria_empresa($_REQUEST['trabajadores'].','.$_REQUEST['activos'].','.$_REQUEST['ventas'].','.$_REQUEST['exportaciones']);
                    $empresa->setIdCategoria_Empresa($categoria);        
                    $empresa->setIdActividad_Economica($_REQUEST['actividad']);
                    $empresa->setIdDepartamento_Procedencia($_REQUEST['departamento']);
                    $empresa->setCiudad($_REQUEST['ciudad']);
                    $empresa->setDireccion($_REQUEST['direccion']);
                    $empresa->setNumero_Contacto($_REQUEST['numero']);
    //                $empresa->setFax($_REQUEST['fax']);
                    $empresa->setPagina_Web($_REQUEST['paginaweb']);
                    $empresa->setEmail($_REQUEST['email']);
                    $empresa->setEstado(($empresarevision->getRenovacion() ? 6 : 4));

                    if (isset($_REQUEST['rubroexportacionesarray'])) {
                        $optionArray = $_REQUEST['rubroexportacionesarray'];
                        for ($i=0; $i<count($optionArray); $i++) {
                            if($optionArray[$i]!='8')
                            {
                                $rubrosd.=$optionArray[$i].',';
                            }
                        }
                    }
                    $empresa->setIdRubro_Exportaciones(rtrim($rubrosd, ","));
                    $empresa->setTituloco(($_REQUEST['titulocof']=='1'?true:false));
                    if($sqlEmpresa->setGuardarEmpresa($empresa))
                    {
                        ///------------------------ creamos la cola y el servicio desp la modificacion empresa relevancia--------------
                            //aquitengo que sacar el costo segun el tipo de empresa que tenga
                            $servicio = new Servicio();
                            $sqlServicio = new SQLServicio();
                            $servicio->setId_servicio(($empresarevision->getRenovacion() ? 10 : 4));
                            $servicio = $sqlServicio->getBuscarServicioPorId($servicio);
                            $costo_modificacion = $servicio->getCosto();
                            //-esto es para el sistema de colas epecificamente para asignar a algun asistente
                            $serv_export = AdmSistemaColas::generarServicioExportadorParaModificacionEmpresa($costo_modificacion,$_SESSION['id_empresa'],($empresarevision->getRenovacion() ? 10 : 4));
                            $id_asistente = AdmSistemaColas::generarColaParaModificacionEmpresa($serv_export);



                        $modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
                        $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia();
                        $modificacionemrpesarelevancia->setId_empresa($_SESSION['id_empresa']);
                        //preguntamos si esque existe una modificacion todavia no realizada
                        if($sqlModificacionempresarelevancia->getModificacionEmpresaRelevanciaSolicitud($modificacionemrpesarelevancia)==0)
                        {  
                            //-- creamos la modificacion empresa relevancia
                            $modificacionemrpesarelevancia->setId_empresa($_SESSION['id_empresa']);
                            $modificacionemrpesarelevancia->setFecha_solicitud($hoy);
                            $modificacionemrpesarelevancia->setEstado(0); 
                            $modificacionemrpesarelevancia->setId_servicio_exportador($serv_export); 
                            $modificacionemrpesarelevancia->setRenovacion(($empresarevision->getRenovacion() ? true : false));
                            $modificacionemrpesarelevancia->setId_empresa_revision($empresarevision->getId_empresa_revision());

                            if($sqlModificacionempresarelevancia->setGuardarModificacionEmpresaRelevancia($modificacionemrpesarelevancia))
                            {
                                $_SESSION["nombrecompleto"] = strtoupper($empresa->getNombre_comercial());
                                echo '[{"suceso":"0","nombrecomercial":"'.strtoupper($empresa->getNombre_comercial()).' - '.$empresa->getRuex().'"}]';
                            }
                            else echo '[{"suceso":"1","razon":"relevancia"}}]';
                        }
                        else  echo '[{"suceso":"1","razon":"no ya tiene uno"}}]';
                    }
                    else echo '[{"suceso":"1","razon":"no guarda empresa"}}]';
                }
                else echo '[{"suceso":"1","razon":"no guarda empresa revision"}}]';

            }
            else
            {//------------------------------------no se cambio datos importantes--------------------------------------------------------


                //aqui guadradas todo lo de la emresa al historico
                $empresa_historico = new EmpresaHistorico();
                $sqlEmpresa_historico = new SQLEmpresaHistorico();

                $empresa_historico->setId_empresa($empresa->getId_empresa());
                $empresa_historico->setRazon_Social($empresa->getRazon_social());
                $empresa_historico->setNombre_Comercial($empresa->getNombre_comercial());
                $empresa_historico->setNit($empresa->getNit());
                $empresa_historico->setMatricula_Fundempresa($empresa->getMatricula_Fundempresa());
                $empresa_historico->setIdTipo_Empresa($empresa->getIdtipo_Empresa());
                $empresa_historico->setIdActividad_Economica($empresa->getIdactividad_Economica());
                $empresa_historico->setIdCategoria_Empresa($empresa->getIdcategoria_Empresa());
                $empresa_historico->setIdDepartamento_Procedencia($empresa->getIddepartamento_Procedencia());
                $empresa_historico->setCiudad($empresa->getCiudad());
                $empresa_historico->setDireccionfiscal($empresa->getDireccionfiscal());
                $empresa_historico->setNumero_Contacto($empresa->getNumero_Contacto());
                $empresa_historico->setFax($empresa->getFax());
                $empresa_historico->setPagina_Web($empresa->getPagina_web());
                $empresa_historico->setEmail($empresa->getEmail());
                //$empresa_historico->setEmail_Secundario($empresa->getEmail_Secundario());
                $empresa_historico->setMenor_Cuantia($empresa->getMenor_Cuantia());
                $empresa_historico->setNim($empresa->getNim());
               // $empresa_historico->setTestimonio_Constitucion($empresa->getTestimonio_Constitucion());
               // $empresa_historico->setNorma_Creacion_Empresa_Publica($empresa->getNorma_Creacion_Empresa_Publica());
                $empresa_historico->setFecha_renovacion_ruex($empresa->getFecha_renovacion_ruex()); //esto todavia no esta implementado
                $empresa_historico->setFecha_asignacion_ruex($empresa->getFecha_asignacion_ruex());
                $empresa_historico->setRuex($empresa->getRuex());
                $empresa_historico->setIdRubro_Exportaciones($empresa->getIdrubro_Exportaciones());
                $empresa_historico->setDatos_categoria_empresa($empresa->getDatos_categoria_empresa());
                $empresa_historico->setFecha_modificacion($hoy);
                $empresa_historico->setId_representante_legal($empresa->getId_representante_legal());
                $empresa_historico->setOea($empresa->getOea());           

                if($sqlEmpresa_historico->setGuardarEmpresaHistorico($empresa_historico))
                {

                    //------para la categoria-----------------------------//
                      if($_REQUEST['ventas']=='0' or $_REQUEST['exportaciones']=='0') $categoria='1';
                      if($_REQUEST['trabajadores']=='1' or $_REQUEST['activos']=='1' or $_REQUEST['ventas']=='1' or $_REQUEST['exportaciones']=='1')  $categoria='1';
                      if($_REQUEST['trabajadores']=='2' or $_REQUEST['activos']=='2' or $_REQUEST['ventas']=='2' or $_REQUEST['exportaciones']=='2') $categoria='2'; 
                      if($_REQUEST['trabajadores']=='3' or $_REQUEST['activos']=='3' or $_REQUEST['ventas']=='3' or $_REQUEST['exportaciones']=='3')  $categoria='3';
                      if($_REQUEST['trabajadores']=='4' or $_REQUEST['activos']=='4' or $_REQUEST['ventas']=='4' or $_REQUEST['exportaciones']=='4') $categoria='4';
    //                  $empresa = new Empresa();
    //                  print('<pre>'.print_r($sqlEmpresa->GuardarEmpresa($empresa),true).'</pre>');
    //                  print('<pre>'.print_r($_REQUEST,true).'</pre>');
                    $empresa->setDatos_categoria_empresa($_REQUEST['trabajadores'].','.$_REQUEST['activos'].','.$_REQUEST['ventas'].','.$_REQUEST['exportaciones']);
                    $empresa->setIdCategoria_Empresa($categoria);        

                    $empresa->setIdActividad_Economica($_REQUEST['actividad']);
                    $empresa->setIdDepartamento_Procedencia($_REQUEST['departamento']);
                    $empresa->setMunicipio($_REQUEST['municipio']);
                    $empresa->setCiudad($_REQUEST['ciudad']);

                    $empresa->setDireccion($_REQUEST['direccion']);
                    $empresa->setNumero_Contacto($_REQUEST['numero']);

    //                $empresa->setFax($_REQUEST['num_fax']);

                    $empresa->setPagina_Web($_REQUEST['paginaweb']);

                    $empresa->setEmail($_REQUEST['email']);
                    $empresa->setAfiliaciones($_REQUEST['afiliac']);
                    $empresa->setCoordenada_lat($_REQUEST['coordenadas_lat']);
                    $empresa->setCoordenada_long($_REQUEST['coordenadas_lon']);
                    $empresa->setDescripcion_empresa($_REQUEST['descripcion_empresa']);
                    $empresa->setDate_fundacion($_REQUEST['fundacion_empresa']);
                    $empresa->setDate_inicio_operaciones($_REQUEST['inicio_empresa']);
                    if (isset($_REQUEST['rubroexportacionesarray'])) {
                        $optionArray = $_REQUEST['rubroexportacionesarray'];
                        for ($i=0; $i<count($optionArray); $i++) {
                            if($i==0)
                            {
                                $rubros=$optionArray[$i];
                            }
                            else
                            {
                                $rubros=$rubros.','.$optionArray[$i];
                            }
                        }
                    }
                    $empresa->setIdRubro_Exportaciones($rubros);

                    $empresa->setTituloco(($_REQUEST['titulocof']=='1'?true:false));
                  //print('<pre>'.print_r($sqlEmpresa->GuardarEmpresa($empresa),true).'</pre>');

    //                print('<pre>'.print_r($empresa,true).'</pre>');

                    if($sqlEmpresa->setGuardarEmpresa($empresa))
                    {
                        $_SESSION["nombrecompleto"] = strtoupper($empresa->getNombre_comercial());
                        echo '[{"suceso":"0","nombrecomercial":"'.strtoupper($empresa->getNombre_comercial()).' - '.$empresa->getRuex().'"}]';

                    }
                    else
                    {
                        echo '[{"suceso":"1","razon":"no guarda empresa"}]';
                    }

                }
                else echo '[{"suceso":"1","razon":"no guarda historico"}]';
            }
            exit;
        }
        if($_REQUEST['tarea']=='validarModificacionEmpresa')
        {
            $hoy = date("Y-m-d H:i:s");
            $modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
            $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia(); 
            $modificacionemrpesarelevancia->setId_modificacion_empresa_relevancia($_REQUEST['id_modificacion_empresa_relevancia']);
            $modificacionemrpesarelevancia=$sqlModificacionempresarelevancia->getModificacionEmpresaRelevanciaPorID($modificacionemrpesarelevancia);
            $modificacionemrpesarelevancia->setEstado(2);//finalizado con exito
            if($sqlModificacionempresarelevancia->setGuardarModificacionEmpresaRelevancia($modificacionemrpesarelevancia))
            {
                $empresa->setId_empresa($modificacionemrpesarelevancia->getId_empresa());
                $empresa=$sqlEmpresa->getEmpresaPorID($empresa);

                $empresa_historico = new EmpresaHistorico();
                $sqlEmpresa_historico = new SQLEmpresaHistorico();

                $empresa_historico->setId_empresa($empresa->getId_empresa());
                $empresa_historico->setRazon_Social($empresa->getRazon_social());
                $empresa_historico->setNombre_Comercial($empresa->getNombre_comercial());
                $empresa_historico->setNit($empresa->getNit());
                $empresa_historico->setMatricula_Fundempresa($empresa->getMatricula_Fundempresa());
                $empresa_historico->setIdTipo_Empresa($empresa->getIdtipo_Empresa());
                $empresa_historico->setIdActividad_Economica($empresa->getIdactividad_Economica());
                $empresa_historico->setIdCategoria_Empresa($empresa->getIdcategoria_Empresa());
                $empresa_historico->setIdDepartamento_Procedencia($empresa->getIddepartamento_Procedencia());
                $empresa_historico->setCiudad($empresa->getCiudad());
                $empresa_historico->setDireccionfiscal($empresa->getDireccionfiscal());
                $empresa_historico->setNumero_Contacto($empresa->getNumero_Contacto());
                $empresa_historico->setFax($empresa->getFax());
                $empresa_historico->setPagina_Web($empresa->getPagina_web());
                $empresa_historico->setEmail($empresa->getEmail());
                //$empresa_historico->setEmail_Secundario($empresa->getEmail_Secundario());
                $empresa_historico->setMenor_Cuantia($empresa->getMenor_Cuantia());
                $empresa_historico->setNim($empresa->getNim());
               // $empresa_historico->setTestimonio_Constitucion($empresa->getTestimonio_Constitucion());
               // $empresa_historico->setNorma_Creacion_Empresa_Publica($empresa->getNorma_Creacion_Empresa_Publica());
                $empresa_historico->setFecha_renovacion_ruex($empresa->getFecha_renovacion_ruex()); //esto todavia no esta implementado
                $empresa_historico->setFecha_asignacion_ruex($empresa->getFecha_asignacion_ruex());
                $empresa_historico->setRuex($empresa->getRuex());
                $empresa_historico->setIdRubro_Exportaciones($empresa->getIdrubro_Exportaciones());
                $empresa_historico->setDatos_categoria_empresa($empresa->getDatos_categoria_empresa());
                $empresa_historico->setFecha_modificacion($hoy);
                $empresa_historico->setId_representante_legal($empresa->getId_representante_legal());
                $empresa_historico->setOea($empresa->getOea());  
                $empresa_historico->setFrecuente($empresa->getFrecuente()); 
                if($sqlEmpresa_historico->setGuardarEmpresaHistorico($empresa_historico))
                {
                    $empresarevision = new EmpresaRevision();
                    $sqlEmpresarevision = new SQLEmpresaRevision();
                    $empresarevision->setId_empresa_revision($modificacionemrpesarelevancia->getId_empresa_revision());
                    $empresarevision=$sqlEmpresarevision->getEmpresaPorID($empresarevision);
                    $empresarevision->setEstado(1);
                    if($sqlEmpresarevision->setGuardarEmpresa($empresarevision))
                    {
                        $empresa->setRazon_social($empresarevision->getRazon_social());
                        if(!$empresa->getMatricula_fundempresa())$empresa->setMatricula_fundempresa($empresarevision->getMatricula_fundempresa());
                        if($empresarevision->getRenovacion())
                        {
                            $empresa->setVigencia($empresarevision->getVigencia());
                            $empresa->setFecha_renovacion_ruex($empresarevision->getFecha_renovacion_ruex());
                        }
                        $empresa->setIdtipo_empresa($empresarevision->getIdtipo_empresa());
                        $empresa->setDireccionfiscal($empresarevision->getDireccionfiscal());
                        $empresa->setEstado(2);
                        $option= $empresarevision->getIdrubro_exportaciones();
                        $optionArray=explode(',',$option);
                        for ($i=0; $i<count($optionArray); $i++) {
                            if($optionArray[$i]=='8')
                            {
                                $empresa->setIdrubro_exportaciones($empresa->getIdrubro_exportaciones().',8');
                                break;
                            }
                        }
                        $empresa->setNim($empresarevision->getNim());
                        $empresa->setOea($empresarevision->getOea());
                        $empresa->setFrecuente($empresarevision->getFrecuente());
                        $empresa->setId_representante_legal($empresarevision->getId_representante_legal());
                        if($empresarevision->getIco())
                        {
                            $cafeICO = new CafeICO();
                            $sqlcafeICO = new SQLCafeICO();
                            $cafeICO->setId_empresa($empresa->getId_empresa());
                            $cafeICO=$sqlcafeICO->getCafeICO_Empresa($cafeICO);
                            if($cafeICO )
                            {
                                $cafeICO->setIco($empresarevision->getIco());
                            }
                            else 
                            {
                                $cafeICO = new CafeICO();
                                $cafeICO->setId_empresa($empresa->getId_empresa());
                                $cafeICO->setIco($empresarevision->getIco());
                                $cafeICO->setLote(0);
                            }
                            $sqlcafeICO->Save($cafeICO);


                        }
                        else
                        {
                            $cafeICO = new CafeICO();
                            $sqlcafeICO = new SQLCafeICO();
                            $cafeICO->setId_empresa($empresa->getId_empresa());
                            $cafeICO=$sqlcafeICO->getCafeICO_Empresa($cafeICO);
                            if($cafeICO )//eliminamos el face
                            {
                                 $sqlcafeICO->setEliminarCafeIco($cafeICO);
                            }
                        }
                        if($sqlEmpresa->setGuardarEmpresa($empresa))
                        {
                            $admisiones=AdmEmpresa::EmpresasAdmitidasCount();
                            echo '[{"suceso":"0","admisiones":"'.$admisiones.'","id_empresa_relevancia":"'.$modificacionemrpesarelevancia->getId_modificacion_empresa_relevancia().'"}]';
                        }

                    }
                    else echo '[{"suceso":"1"}]';
                }

            }
            else echo '[{"suceso":"1"}]';
            exit;
        }
        if($_REQUEST['tarea']=='revisionDocumentosModificacion')
        {      
            $modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
            $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia();
            $modificacionemrpesarelevancia->setId_modificacion_empresa_relevancia($_REQUEST['id_empresa']);
            $modificacionemrpesarelevancia=$sqlModificacionempresarelevancia->getModificacionEmpresaRelevanciaPorID($modificacionemrpesarelevancia);
            $empresarevision=$this->AsignarEmpresaRevision($modificacionemrpesarelevancia->getId_empresa_revision());    
            //-----------------------para el formato d/m/a-------------------
            $fecha_renovacion_a= explode("-", $empresarevision->getFecha_renovacion_ruex());
            $empresarevision->setFecha_renovacion_ruex($fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0]);


            //------------------------preguntamos si es cafetalera
            $vista->assign('ico', $empresarevision->getIco());
            $personal=  AdmPersona::listarFPersonasPorEmpresa($empresarevision->getId_empresa());
            $vista->assign('personal', $personal);
            $vista->assign('empresa', $empresarevision);
            $vista->assign('modificaciones',explode(",",$empresarevision->getModificaciones()));
            $vista->assign('modificacionempresarelevancia', $modificacionemrpesarelevancia);
           /* var_dump(explode(",",$empresarevision->getModificaciones()));*/
            $vista->display("admEmpresa/EmpresaModificacionAprobar.tpl");
            exit;
        }
        if($_REQUEST['tarea']=='admitirModificacionEmpresa')
        {
             // aqui hay que enviar un correo diciendo gil tienes este tiempo ara traer estos papeles
            // se pone a la empresa en estado de admitidas
            $modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
            $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia();
            $modificacionemrpesarelevancia->setId_modificacion_empresa_relevancia($_REQUEST['id_modificacion_empresa_relevancia']);
            $modificacionemrpesarelevancia=$sqlModificacionempresarelevancia->getModificacionEmpresaRelevanciaPorID($modificacionemrpesarelevancia);
            $modificacionemrpesarelevancia->setEstado(1);// admitida
            if($sqlModificacionempresarelevancia->setGuardarModificacionEmpresaRelevancia($modificacionemrpesarelevancia) )
            {
                    AdmSistemaColas::desactivarServicioExportadorColaParaModificacionEmpresa($modificacionemrpesarelevancia->getId_empresa());
                    $registromodificacion=AdmSistemaColas::listarColaAsistentePorTemporalesModificacion($_SESSION["id_persona"]);
                    $admisiones=AdmEmpresa::EmpresasAdmitidasCount();
                    echo '[{"suceso":"0","modificaciones":"'.count($registromodificacion).'","admisiones":"'.$admisiones.'","id_empresa_relevancia":"'.$modificacionemrpesarelevancia->getId_modificacion_empresa_relevancia().'"}]';

                /*// aqui desactivamos la cola
                $resp = AdmSistemaColas::desactivarServicioExportadorColaParaModificacionEmpresa($modificacionemrpesarelevancia->getId_empresa());
                if($resp)
                {
                    echo '[{"suceso":"0","modificaciones":"'.count($registromodificacion).'","admisiones":"'.$admisiones.'"}]';
                }
                else
                {
                     echo '[{"suceso":"1"}]';
                }*/
            }
            else
            {
                echo '[{"suceso":"1"}]';
            }
            exit;
        }
        if($_REQUEST['tarea']=='observacionModificacion')
        {
            // aqui se vuelve tood como estaba empresa relevancia estado 2

            $modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
            $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia();
            $modificacionemrpesarelevancia->setId_modificacion_empresa_relevancia($_REQUEST['id_modificacion_empresa_relevancia']);
            $modificacionemrpesarelevancia=$sqlModificacionempresarelevancia->getModificacionEmpresaRelevanciaPorID( $modificacionemrpesarelevancia);
            $modificacionemrpesarelevancia->setObservacion_asistente($_REQUEST['observacion']);
            $modificacionemrpesarelevancia->setEstado(3);//rechazado
            if($sqlModificacionempresarelevancia->setGuardarModificacionEmpresaRelevancia($modificacionemrpesarelevancia))
            {
                $empresa->setId_empresa($modificacionemrpesarelevancia->getId_empresa());
                $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
                $empresa->setEstado(2);
                if($sqlEmpresa->setGuardarEmpresa($empresa))
                {
                    $empresarevision = new EmpresaRevision();
                    $sqlEmpresarevision = new SQLEmpresaRevision();

                    $empresarevision->setId_empresa_revision($modificacionemrpesarelevancia->getId_empresa_revision());      
                    $empresarevision=$sqlEmpresarevision->getEmpresaPorID($empresarevision);
                    $empresarevision->setEstado(1);
                    if($sqlEmpresarevision->setGuardarEmpresa($empresarevision))
                    {
                        AdmSistemaColas::desactivarServicioExportadorColaParaModificacionEmpresa($empresa->getId_empresa());
                        $registromodificacion=AdmSistemaColas::listarColaAsistentePorTemporalesModificacion($_SESSION["id_persona"]);
                        echo '[{"suceso":"0","modificaciones":"'.count($registromodificacion).'","id_empresa_relevancia":"'.$modificacionemrpesarelevancia->getId_modificacion_empresa_relevancia().'"}]';
                    }
                }
                else
                {
                    echo '[{"suceso":"1"}]';
                }
                // -- aqui e sdonde lle envias uin correo notificandole y diciendole gil esto esta mal

            }
            else
            {
                echo '[{"suceso":"1"}]';
            }
            exit;
        }
         if($_REQUEST['tarea']=='rechazarModificacionRuex')
        {
            // aqui se vuelve tood como estaba empresa relevancia estado 2

            $modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
            $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia();
            $modificacionemrpesarelevancia->setId_modificacion_empresa_relevancia($_REQUEST['id_modificacion_empresa_relevancia']);
            $modificacionemrpesarelevancia=$sqlModificacionempresarelevancia->getModificacionEmpresaRelevanciaPorID( $modificacionemrpesarelevancia);
            $modificacionemrpesarelevancia->setEstado(3);//rechazado
            $modificacionemrpesarelevancia->setId_asistente_rechazo($_SESSION['id_persona']);
            $modificacionemrpesarelevancia->setObservacion_asistente($_REQUEST['observacion']);
            if($sqlModificacionempresarelevancia->setGuardarModificacionEmpresaRelevancia($modificacionemrpesarelevancia))
            {
                $empresa->setId_empresa($modificacionemrpesarelevancia->getId_empresa());
                $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
                $empresa->setEstado(2);
                if($sqlEmpresa->setGuardarEmpresa($empresa))
                {
                    $empresarevision = new EmpresaRevision();
                    $sqlEmpresarevision = new SQLEmpresaRevision();

                    $empresarevision->setId_empresa_revision($modificacionemrpesarelevancia->getId_empresa_revision());      
                    $empresarevision=$sqlEmpresarevision->getEmpresaPorID($empresarevision);
                    $empresarevision->setEstado(1);
                    if($sqlEmpresarevision->setGuardarEmpresa($empresarevision))
                    {
                        $admisiones=AdmEmpresa::EmpresasAdmitidasCount();
                        echo '[{"suceso":"0","admisiones":"'.$admisiones.'","id_empresa_relevancia":"'.$modificacionemrpesarelevancia->getId_modificacion_empresa_relevancia().'"}]';
                    }
                }
                else
                {
                    echo '[{"suceso":"1"}]';
                }
                // -- aqui e sdonde lle envias uin correo notificandole y diciendole gil esto esta mal
            }
            else
            {
                echo '[{"suceso":"1"}]';
            }
            exit;
        }
        if($_REQUEST['tarea']=='revisionModificacionEmpresa')
        {
            $modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
            $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia();
            $modificacionemrpesarelevancia->setId_modificacion_empresa_relevancia($_REQUEST['id_modificacion_empresa_relevancia']);
            $modificacionemrpesarelevancia=$sqlModificacionempresarelevancia->getModificacionEmpresaRelevanciaPorID( $modificacionemrpesarelevancia);

            $empresarevision=$this->AsignarEmpresaRevision($modificacionemrpesarelevancia->getId_empresa_revision());    
            //-----------------------para el formato d/m/a-------------------
            $fecha_renovacion_a= explode("-", $empresarevision->getFecha_renovacion_ruex());
            $empresarevision->setFecha_renovacion_ruex($fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0]);


            //------------------------preguntamos si es cafetalera
                    $vista->assign('ico', $empresarevision->getIco());
            //------------------------------
            //---------------------esto es para todo los funcionarios de esa empresa------------------------
            $personal=  AdmPersona::listarPersonasPorEmpresa($modificacionemrpesarelevancia->getId_empresa());
            $vista->assign('personal', $personal);
            $vista->assign('modificacionempresarelevancia', $modificacionemrpesarelevancia);
            $vista->assign('modificaciones',explode(",",$empresarevision->getModificaciones()));
            $vista->assign('empresa', $empresarevision);
            $vista->display("admEmpresa/EmpresaModificacion.tpl");
            exit;
        }
        if($_REQUEST['tarea']=='mostrarSolicitudesModificacion')
        {
            $registromodificacion=AdmSistemaColas::listarColaAsistentePorTemporalesModificacion($_SESSION["id_persona"]);
            $vista->assign('registromodificacion', $registromodificacion);
            $vista->display("admEmpresa/EmpresasModificacion.tpl");
            exit;
        }
        if($_REQUEST['tarea']=='solicitudModificacion')
        {
            $modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
            $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia();
            $modificacionemrpesarelevancia->setId_empresa($_SESSION['id_empresa']);
            //preguntamos si esque existe una modificacion todavia no realizada
            if($sqlModificacionempresarelevancia->getModificacionEmpresaRelevanciaSolicitud($modificacionemrpesarelevancia)==0)
            {  
                 //-----creamos el servicio exportador-------------
                //aquitengo que sacar el costo segun el tipo de empresa que tenga
                $servicio = new Servicio();
                $sqlServicio = new SQLServicio();
                $servicio->setId_servicio(4);
                $servicio = $sqlServicio->getBuscarServicioPorId($servicio);
                $costo_modificacion = $servicio->getCosto();
                //-esto es para el sistema de colas epecificamente para asignar a algun asistente
                $serv_export = AdmSistemaColas::generarServicioExportadorParaModificacionEmpresa($costo_modificacion,$_SESSION['id_empresa']);
                $id_asistente = AdmSistemaColas::generarColaParaModificacionEmpresa($serv_export);

                //-- creamos la modificacion empresa relevancia
                $modificacionemrpesarelevancia->setId_empresa($_SESSION['id_empresa']);
                $modificacionemrpesarelevancia->setObservacion($_REQUEST['modificacion']);
                $modificacionemrpesarelevancia->setFecha_solicitud(date("Y-m-d H:i:s"));
                $modificacionemrpesarelevancia->setEstado(0); 
                $modificacionemrpesarelevancia->setId_servicio_exportador($serv_export); 
                if($_REQUEST['renovacion']=='1')
                {
                    $modificacionemrpesarelevancia->setRenovacion(true);
                }
                else
                {
                    $modificacionemrpesarelevancia->setRenovacion(false);
                }
                if($sqlModificacionempresarelevancia->setGuardarModificacionEmpresaRelevancia($modificacionemrpesarelevancia))
                {
                   echo '[{"suceso":"0","msg":"Datos guardados correctamente."}]';
                }
                else
                {
                   echo '[{"suceso":"2"}]';
                }
            }
            else
            {
                echo '[{"suceso":"1"}]';
            }
            //aqui hay que crear un modificacion empresa relevancia como peticion y se le crea su servivio en cola y eso
            exit;
        }
        if($_REQUEST['tarea']=='editarEmpresa')
        {
            $sucesso='0';
            if($_REQUEST['nuevousuario'] or $_REQUEST['nuevacontrasena'])
            {
                $usuario->setId_usuario($_SESSION['id_usuario']);
                $usuario=$sqlUsuario_Temporal->getDatosUsuarioPorId($usuario);
                if($_REQUEST['nuevousuario']) $usuario->setUsuario($_REQUEST['nuevousuario']);
                if($_REQUEST['nuevacontrasena']) $usuario->setClave($_REQUEST['nuevacontrasena']);
                if($sqlUsuario_Temporal->setGuardarUsuario($usuario))
                {
                    if($_REQUEST['nuevousuario']) $_SESSION['usuario']=$_REQUEST['nuevousuario'];
                    //echo 'se guardo';
                }
                else
                {
                    $sucesso='1';
                }
            }
            if($_REQUEST['swempresa']=='1')
            {
                $empresa->setId_empresa($_SESSION['id_empresa']);
                $empresa = $sqlEmpresa->getEmpresaPorId($empresa);
                $hoy = date("Y-m-d H:i:s");
                //aqui guadradas todo lo de la emresa al historico
                $empresa_historico = new EmpresaHistorico();
                $sqlEmpresa_historico = new SQLEmpresaHistorico();

                $empresa_historico->setId_empresa($empresa->getId_empresa());
                $empresa_historico->setRazon_Social($empresa->getRazon_social());
                $empresa_historico->setNombre_Comercial($empresa->getNombre_comercial());
                $empresa_historico->setNit($empresa->getNit());
                $empresa_historico->setMatricula_Fundempresa($empresa->getMatricula_Fundempresa());
                $empresa_historico->setIdTipo_Empresa($empresa->getIdtipo_Empresa());
                $empresa_historico->setIdActividad_Economica($empresa->getIdactividad_Economica());
                $empresa_historico->setIdCategoria_Empresa($empresa->getIdcategoria_Empresa());
                $empresa_historico->setIdDepartamento_Procedencia($empresa->getIddepartamento_Procedencia());
                $empresa_historico->setCiudad($empresa->getCiudad());
                $empresa_historico->setDireccion($empresa->getDireccion());
                $empresa_historico->setNumero_Contacto($empresa->getNumero_Contacto());
                $empresa_historico->setFax($empresa->getFax());
                $empresa_historico->setPagina_Web($empresa->getPagina_web());
                $empresa_historico->setEmail($empresa->getEmail());
                $empresa_historico->setEmail_Secundario($empresa->getEmail_Secundario());
                $empresa_historico->setMenor_Cuantia($empresa->getMenor_Cuantia());
                $empresa_historico->setNim($empresa->getNim());
                $empresa_historico->setTestimonio_Constitucion($empresa->getTestimonio_Constitucion());
                $empresa_historico->setNorma_Creacion_Empresa_Publica($empresa->getNorma_Creacion_Empresa_Publica());
                //$empresa_historico->setFecha_renovacion_ruex($empresa->getFax()); //esto todavia no esta implementado
                $empresa_historico->setRuex($empresa->getRuex());
                $empresa_historico->setIdRubro_Exportaciones($empresa->getIdrubro_Exportaciones());
                $empresa_historico->setDatos_categoria_empresa($empresa->getDatos_categoria_empresa());
                $empresa_historico->setFecha_modificacion($hoy);
                $empresa_historico->setDireccionfiscal($empresa->getDireccionfiscal());


                if($sqlEmpresa_historico->setGuardarEmpresaHistorico($empresa_historico))
                {
                    // aqui modificamos a la empresa
                    $empresa->setIddepartamento_procedencia(mb_strtoupper($_REQUEST['departamento']));
                    $empresa->setCiudad($_REQUEST['ciudad']);
                    $empresa->setDireccion($_REQUEST['direccion']);
                    $empresa->setNumero_contacto($_REQUEST['numero']);
                    $empresa->setFax($_REQUEST['fax']);//este es el documento
                    $empresa->setPagina_web($_REQUEST['paginaweb']);
                    $empresa->setEmail($_REQUEST['email']);
                    $empresa->setEmail_secundario($_REQUEST['email2']);
                    $empresa->setDireccionfiscal($_REQUEST['direccionfiscal']);

                    if($sqlEmpresa->setGuardarEmpresa($empresa))
                    {
                        //echo 'se guardo'; 
                    }
                    else
                    {
                        $sucesso='1';
                    }
                }
                else
                {
                    $sucesso='1';
                }

            }
            if($sucesso=='0')
            {
                echo '[{"suceso":"0","msg":"Datos guardados correctamente."}]';
            }
            else
            {
                echo '[{"suceso":"1","msg":"Problemas al guardar los datos del usuario."}]';
            }
            exit;
        }
        if($_REQUEST['tarea']=='editarUsuarioEmpresa')
        {
            $sucesso='0';
            if($_REQUEST['nuevousuario'] or $_REQUEST['nuevacontrasena'])
            {
                $usuario->setId_usuario($_SESSION['id_usuario']);
                $usuario=$sqlUsuario_Temporal->getDatosUsuarioPorId($usuario);
                if($_REQUEST['nuevousuario']) $usuario->setUsuario($_REQUEST['nuevousuario']);
                if($_REQUEST['nuevacontrasena']) $usuario->setClave($_REQUEST['nuevacontrasena']);
                if($sqlUsuario_Temporal->setGuardarUsuario($usuario))
                {
                    if($_REQUEST['nuevousuario']) $_SESSION['usuario']=$_REQUEST['nuevousuario'];
                    echo '[{"suceso":"0","msg":"Datos guardados correctamente."}]';
                }
                else echo '[{"suceso":"1","msg":"Problemas al guardar los datos del usuario."}]';
                {
                    $sucesso='1';
                }
            }
            exit;
        }
        if($_REQUEST['tarea']=='configuracionEmpresa')
        { 
            $vista->display('admEmpresa/ConfiguracionEmpresa.tpl');
            exit;
        }
       //-----------------------------------------esto es para el registro de una empresa-----------------------------------
        if($_REQUEST['tarea']=='rubroExportaciones')//devuelve en un json el rubro de exportaciones
        { 
            $rubro_exportaciones = new RubroExportaciones();
            $sqlRubro_exportaciones = new SQLRubroExportaciones();
            $rubros_exportaciones=$sqlRubro_exportaciones-> getListarRubroExportaciones($rubro_exportaciones);
            // creamos el json
            echo '[';
            foreach ($rubros_exportaciones as $rubro_exportaciones){
                $strJson .= '{"id_rubro_exportaciones":"' . $rubro_exportaciones->getId_rubro_exportaciones() .
                    '","descripcion":"' . $rubro_exportaciones->getDescripcion() . '"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='revisarempresatemporal')//para ver las empresas que son temporales en la tabla
        {
            //tengo que sacar todas las empresas de la cola        
            $registros_empresa_temporal=AdmSistemaColas::listarColaAsistentePorTemporales($_SESSION["id_persona"]);

            if ($registros_empresa_temporal != NULL){           
                foreach ($registros_empresa_temporal as &$valor) {
                   //$valor["vigencia"] = FuncionesGenerales::diasrestantesusuariotemporal($valor["fecha_creacion"]);
                   if($valor["estado"]=='0')
                   {
                       $valor["estado"]='Empresa Nueva';
                   }
                   if($valor["estado"]=='2')
                   {
                       $valor["estado"]='Por Revisar';
                   }
                   if($valor["estado"]=='3')
                   {
                       $valor["estado"]='Observado';
                   }
                   if($valor["estado"]=='4')
                   {
                       $valor["estado"]='Modificacion';
                   }
                }   
            }

            // en esta parte tengo que hacerlo qgeneral por que me va a servi para las solicitude de empresa tb
            $vista->assign("registros_empresa_temporal",$registros_empresa_temporal); 
            $vista->display("ruex/RevisarEmpresasTemporales.tpl");
            exit;
        }
    /**/if($_REQUEST['tarea']=='asignarruex')//devuelve los datos de la empresa y el usuario3temporal
        {
            $empresa = $this->AsignarEmpresa($_REQUEST["id_empresa"]);
            //------------------------preguntamos si es cafetalera
            $ico = $this->verificaEmpresaIco($empresa);
            if(!empty($ico))
            {
                $vista->assign('ico', $ico);
            }  
            //------------------------------
            $usuariotemporal->setId_usuario_temporal($empresa->getId_Usuario_Temporal());
            $usuariotemporal=$sqlUsuario_Temporal->getUsuarioTemporalPorId($usuariotemporal);
            //---------------------esto es para todo los funcionarios de esa empresa------------------------
            $personal=  AdmPersona::listarPersonasPorEmpresa($_REQUEST["id_empresa"]);      
            //--------------------estoe spara el formato de la fecha d/m/a----------------------
            $fecha_renovacion_a= explode("-", $empresa->getFecha_renovacion_ruex());
            $empresa->setFecha_renovacion_ruex($fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0]);

            $vista->assign('personal', $personal);
            /*print('<pre>'.print_r($usuariotemporal, true).'</pre>');
            print('<pre>'.print_r($empresa, true).'</pre>');*/
            $municipio=new Municipio();
            $sqlMunicipio=new SQLMunicipio();
            $municipio->setId_municipio($empresa->getMunicipio());
            $municipio=$sqlMunicipio->getMunicipioPorID($municipio);

            $ciudad=new Ciudad();
            $sqlCiudad=new SQLCiudad();
            $ciudad->setId_ciudad($empresa->getCiudad());
            $ciudad=$sqlCiudad->getCiudadPorID($ciudad);


            $vista->assign('municipio',$municipio!=null? $municipio->getDescripcion():'');
            $vista->assign('ciudad',$ciudad!=null? $ciudad->getDescripcion():'');
            $vista->assign('afiliaciones_val',$empresa->getAfiliaciones());

            $vista->assign('usuario_temporal', $usuariotemporal);
            $vista->assign('empresa_temporal', $empresa);
            $vista->display("ruex/ColaEmpresasRegistradas.tpl");

            exit;
        }
        if($_REQUEST['tarea']=='observaciones')//para hacerle observaciones aun emrpesa recien registrada
        {
            $idserv = AdmSistemaColas::desactivarServicioExportadorColaParaRuex($_REQUEST['id_empresa']);

               AdmCorreo::enviarCorreo($empresa->getEmail(),$_REQUEST['observacion'],'','','',11); 
             ////---------------cambiamos estado empresa
            $empresa->setId_empresa($_REQUEST['id_empresa']);
            $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
            $empresa->setEstado(9);//empresa registrada observada

             //-- creamos la modificacion empresa relevancia
            if($sqlEmpresa->setGuardarEmpresa($empresa))
            {
                $modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
                $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia();
                $modificacionemrpesarelevancia->setId_empresa($_REQUEST['id_empresa']);
                $modificacionemrpesarelevancia->setObservacion($_REQUEST['observacion']);
                $modificacionemrpesarelevancia->setFecha_solicitud(date("Y-m-d H:i:s"));
                $modificacionemrpesarelevancia->setEstado(0); 
                $modificacionemrpesarelevancia->setId_servicio_exportador(0); 
                $modificacionemrpesarelevancia->setRenovacion(false);
                $modificacionemrpesarelevancia->setId_asistente_rechazo($_SESSION["id_persona"]);
                if($sqlModificacionempresarelevancia->getModificacionEmpresaRelevanciaSolicitud($modificacionemrpesarelevancia)==0)
                { 
                    if($sqlModificacionempresarelevancia->setGuardarModificacionEmpresaRelevancia($modificacionemrpesarelevancia))
                    {
                         //para registro de empresas
                        $registroempresas=AdmSistemaColas::listarColaAsistentePorTemporales($_SESSION["id_persona"]);
                        //para empresas admitidas
                        $admisiones=AdmEmpresa::EmpresasAdmitidasCount();
                        echo '[{"suceso":"0","registros":"'.count($registroempresas).'","admisiones":"'.$admisiones.'","idserv":"'.$idserv .'"}]';
                    }
                    else
                    {
                        echo '[{"suceso":"1","causa":"No guardo la observacion"]';
                    }
                }   
            }
            else
            {
                echo '[{"suceso":"1","causa":"no guardo la empresa"]';
            }
            exit;
        }
        if($_REQUEST['tarea']=='observacionesValidacion')//para hacerle observaciones aun emrpesa recien registrada
        {
           // $resp = AdmSistemaColas::desactivarServicioExportadorColaParaRuex($_REQUEST['id_empresa']);

             //  AdmCorreo::enviarCorreo($empresa->getEmail(),$_REQUEST['observacion'],'','','',11); 
             ////---------------cambiamos estado empresa
            $empresa->setId_empresa($_REQUEST['id_empresa']);
            $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
            if($empresa->getEstado()==0 || $empresa->getEstado()==2){
                $sgc_estado = 9;
                $empresa->setEstado(9);
            }
            if($empresa->getEstado()==4){
                $sgc_estado = 4;
                $empresa->setEstado(13);
            }
            if($empresa->getEstado()==6){
                $sgc_estado = 6;
                $empresa->setEstado(14);
            }
            /*$estado_anterior = $empresa->getEstado();
            switch ($empresa->getEstado()) {
                
                case 4:
                    $empresa->setEstado(13);
                    break;
                
                case 6:
                    $empresa->setEstado(14);
                    break;
                
                default:
                    $empresa->setEstado(9);
                    break;
            }*/
                
//            $empresa->setEstado( $empresa->getEstado()==4? 13 : 9 );//empresa registrada observada

             //-- creamos la modificacion empresa relevancia
            if($sqlEmpresa->setGuardarEmpresa($empresa))
            {
                //--------------aqui hay que enlazar de quien esta rechazando y por que
                /*$modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
                $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia();
                $modificacionemrpesarelevancia->setId_empresa($_REQUEST['id_empresa']);
                $modificacionemrpesarelevancia->setObservacion_asistente($_REQUEST['observacion']);
                $modificacionemrpesarelevancia->setId_asistente_rechazo($_SESSION['id_persona']);
                $modificacionemrpesarelevancia->setFecha_solicitud(date("Y-m-d H:i:s"));
                $modificacionemrpesarelevancia->setEstado(0); 
                $modificacionemrpesarelevancia->setId_servicio_exportador(0); 
                $modificacionemrpesarelevancia->setRenovacion(false);
                if($sqlModificacionempresarelevancia->getModificacionEmpresaRelevanciaSolicitud($modificacionemrpesarelevancia)==0)
                { 
                    if($sqlModificacionempresarelevancia->setGuardarModificacionEmpresaRelevancia($modificacionemrpesarelevancia))
                    {
                         //para registro de empresas
                        $registroempresas=AdmSistemaColas::listarColaAsistentePorTemporales($_SESSION["id_persona"]);
                        //para empresas admitidas
                        $admisiones=AdmEmpresa::EmpresasAdmitidasCount();
                        echo '[{"suceso":"0","registros":"'.count($registroempresas).'","admisiones":"'.$admisiones.'","id_empresa_relevancia":"'.$modificacionemrpesarelevancia->getId_modificacion_empresa_relevancia().'"}]';
                    }
                    else
                    {
                        echo '[{"suceso":"1","causa":"No guardo la observacion"]';
                    }
                }*/

                $empresa_persona = new EmpresaPersona();
                $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
                $sqlEmpresaPersona = new SQLEmpresaPersona();
                $empresa_persona = $sqlEmpresaPersona->getEmpresaPersonaPorID($empresa_persona);

                $sgc_ruex=new SGCRuex();
                $sql_sgc_ruex = new SQLSGCRuex();
                $sgc_ruex->setId_empresa($_REQUEST['id_empresa']);
                $sgc_ruex->setRevisado(0);
                $sgc_ruex = $sql_sgc_ruex->getSGCRuexPorEmpresaRevisado($sgc_ruex);
                if($sgc_ruex==null){
                    $sgc_ruex=new SGCRuex();
                    $sgc_ruex->setId_empresa($_REQUEST['id_empresa']);
                    $sgc_ruex->setId_asistente($empresa_persona->getId_empresa_persona());
                    $sgc_ruex->setId_regional($empresa_persona->getId_regional());
                    $sgc_ruex->setFecha_inicio_revision(date('Y-m-d H:i:s'));
                }
                $sgc_ruex->setRevisado(2);
                
//                $sgc_ruex->setId_estado($empresa->getEstado());
                $sgc_ruex->setId_estado($sgc_estado);
                $sgc_ruex->setFecha_fin_revision(date('Y-m-d H:i:s'));
                $sgc_ruex->setObservaciones($_REQUEST['observacion']);
                $sql_sgc_ruex->setGuardarSGCRuex($sgc_ruex);
                echo '[{"suceso":"0","registros":"","admisiones":"","id_empresa_relevancia":""}]';
            }
            else
            {
                echo '[{"suceso":"1","causa":"no guardo la empresa"]';
            }
            exit;
        }
        if($_REQUEST['tarea']=='admision')//se admite la empresa temporal
        {
            $empresa->setId_empresa($_REQUEST['id_empresa']);
            $datEmpresa_temporal=$sqlEmpresa->getEmpresaPorID($empresa);
             //---------------------aqui trabajamos en la empresa---------------------------
            if (!empty($datEmpresa_temporal)){
                $t_empresa=$datEmpresa_temporal->getIdTipo_Empresa();
                $serv_export=  AdmSistemaColas::generarServicioExportadorParaRuexPorServicio( ($t_empresa>=1 && $t_empresa<=7 ? 60:59),0,$_REQUEST['id_empresa']);
                $datEmpresa_temporal->setId_servicio_exportador($serv_export);
                $datEmpresa_temporal->setEstado(1);

               if ($sqlEmpresa->setGuardarEmpresa($datEmpresa_temporal)){
                    //------aqui es donde se tiene que actualizar la cola y el servicio exportador---------
                    $idserv  = AdmSistemaColas::desactivarServicioExportadorColaParaRuex($_REQUEST['id_empresa']);
                    if($idserv)
                    {

                        //para registro de empresas
                        $registroempresas=AdmSistemaColas::listarColaAsistentePorTemporales($_SESSION["id_persona"]);
                        //para empresas admitidas
                        $admisiones=AdmEmpresa::EmpresasAdmitidasCount();
                        echo '[{"suceso":"0","registros":"'.count($registroempresas).'","admisiones":"'.$admisiones.'","idserv":"'.$idserv.'"}]';
                    }
                    else
                    {
                        echo '[{"suceso":"1","causa":"no hay resp de colas"]';
                    }
                }else{
                    echo '[{"suceso":"1","causa":"no guarda"]';
                }
            }
            else {
                echo '[{"suceso":"1","causa":"es vacio"]';
            }
            exit;
        }
        if($_REQUEST['tarea']=='empresasadmitidas')//esta parte es para la asignacion de ruex para empresas temporales admitidas
        {
            $vista->display("ruex/EmpresasTemporalesAdmitidas.tpl");
            exit;
        }
        if($_REQUEST['tarea']=='empresasAdmitidasJson')//esta parte es para la asignacion de ruex para empresas temporales admitidas
        {
            // aqui me envias todas las empresas temporales que se han admitido que estan ya para asignacion de ruex
            $empresa = new Empresa();
            $empresa->setEstado($_REQUEST['estado']);
            $admisiones=$sqlEmpresa->getEmpresaPorEstado($empresa);
            foreach ($admisiones as $admision){ 
                $empresapersona = new EmpresaPersona();
                $sqlEmpresaPersona = new SQLEmpresaPersona();
                $empresapersona->setId_Empresa($admision->getId_empresa());
                $lista = $sqlEmpresaPersona->getListarPersonaPorEmpresa($empresapersona);
                $personas = '';
                foreach ($lista as $pers) {
                    $personas .= ' '.$pers->persona->getNombres().' '.$pers->persona->getPaterno().',';
                }
                $personas = substr($personas, 0, strlen($personas) - 1);
                $strJson .='{"id_empresa":"'.$admision->getId_empresa().
                    '","razonsocial":"' . (strlen($admision->getRazon_social())>30 ? (substr($admision->getRazon_social(),0,25).' ...'):$admision->getRazon_social()) .
                    '","nit" : "'.$admision->getNit().
                    '","estado_codigo":"' .$admision->getEstado().
                    '","estado":"' .$personas.
                    '"},';
                }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo '['.$strJson.']';
            exit;
        }
        
        if($_REQUEST['tarea']=='ListarEmpresasPorEstado')
        {
            switch ($_REQUEST['tipo']) {
                case 1:
                    $tipo = "0,1";
                    break;
                case 0:
                    $tipo = "9";
                    break;
                case 2:
                    $tipo = "4";
                    break;
                case 3:
                    $tipo = "13";
                    break;
                case 4:
                    $tipo = "6";
                    break;
                case 5:
                    $tipo = "14";
                    break;
            }
            $empresa = new Empresa();
            $admisiones=$sqlEmpresa->getListarEmpresasPorFechaDescendenteEstados($empresa, $tipo);
            foreach ($admisiones as $admision){ 
                $empresapersona = new EmpresaPersona();
                $sqlEmpresaPersona = new SQLEmpresaPersona();
                $empresapersona->setId_Empresa($admision->getId_empresa());
                $lista = $sqlEmpresaPersona->getListarPersonaPorEmpresa($empresapersona);
                $personas = '';
                foreach ($lista as $pers) {
                    $personas .= ' '.$pers->persona->getNombres().' '.$pers->persona->getPaterno().',';
                }
                    // '","razonsocial":"' . (strlen($admision->getRazon_social())>30 ? (substr($admision->getRazon_social(),0,25).' ...'):$admision->getRazon_social()) .
                $personas = substr($personas, 0, strlen($personas) - 1);

                $razon_social = str_replace('"','\"',$admision->getRazon_social());
                $strJson .='{"id_empresa":"'.$admision->getId_empresa().
                    '","razonsocial":"' . (strlen($admision->getRazon_social())>30 ? (substr($razon_social,0,25).' ...'): $razon_social) .
                    '","nit" : "'.$admision->getNit().
                    '","estado_codigo":"' .$admision->getEstado().
                    '","estado":"' .$personas.
                    '"},';
                }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo '['.$strJson.']';
            exit;
        }
       
        if($_REQUEST['tarea']=='empresasObservadasJson')//esta parte es para la asignacion de ruex para empresas temporales admitidas
        {
            // aqui me envias todas las empresas temporales que se han admitido que estan ya para asignacion de ruex

    //        $admisiones=$sqlEmpresa->getListarEmpresasObservadas($empresa);
            $empresa->setEstado(9);
            $lista1 = $sqlEmpresa->getEmpresaPorEstado($empresa);
            $empresa->setEstado(13);
            $lista2 = $sqlEmpresa->getEmpresaPorEstado($empresa);
            $admisiones= array_merge($lista1, $lista2);
            foreach ($admisiones as $admision){
                $strJson .='{"id_empresa":"'.$admision->getId_empresa().
                    '","razonsocial":"' .  (strlen($admision->getRazon_social())>30 ? (substr($admision->getRazon_social(),0,25).' ...'):$admision->getRazon_social()) .
                    '","nit" : "'.$admision->getNit().
                    '","estado_codigo":"' .$admision->getEstado().
                    '","estado":"' .'Empresa Observada'.
                    '"},';
                }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo '['.$strJson.']';
            exit;
        }
        if($_REQUEST['tarea']=='empresasAdmitidasModificacionJson')//esta parte es para la asignacion de ruex para empresas temporales admitidas
        {
            // aqui me envias todas las empresas temporales que se han admitido que estan ya para asignacion de ruex
            $modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
            $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia();
            $sqlEmpresarevision = new SQLEmpresaRevision();
            $admisiones2=$sqlModificacionempresarelevancia->getListarEmpresasAdmitidas($modificacionemrpesarelevancia);

            $admisiones= array();
            $i = 0;

            foreach ($admisiones2 as $admision2){
                $empresarevision = new EmpresaRevision();
                $empresarevision->setId_empresa_revision($admision2->getId_empresa_revision());
                $empresarevision=$sqlEmpresarevision->getEmpresaPorID($empresarevision);

                $strJson .='{"id_empresa":"'.$admision2->getId_modificacion_empresa_relevancia().
                    '","razonsocial":"' . $empresarevision->getRazon_Social().
                    '","ruex" : "'.$empresarevision->getRuex().
                    '","estado_codigo":"' .($empresarevision->getRenovacion() ? '6' : '4').
                    '","estado":"' .($empresarevision->getRenovacion() ? 'Renovación de RUEX' : 'Modificación de empresa').
                    '"},';
            }

            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo '['.$strJson.']';
            exit;
        }
        if($_REQUEST['tarea']=='cerrarAsignacionRuex')
        {
            //$vista->assign('id_empresa',$_REQUEST['id_empresa']);
    //        $empresa_persona = new EmpresaPersona();
    //        $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
    //        $sqlEmpresaPersona = new SQLEmpresaPersona();
    //        $empresa_persona = $sqlEmpresaPersona->getEmpresaPersonaPorID($empresa_persona);
    //            
    //        $sgc_ruex=new SGCRuex();
            /*$sgc_ruex->setId_empresa($_REQUEST['id_empresa']);
            $sgc_ruex->setId_estado(13);
            $sgc_ruex->setId_asistente($_SESSION['id_empresa_persona']);
            $sgc_ruex->setFecha_inicio_revision($_REQUEST['fecha_ini']);
            $sgc_ruex->setFecha_fin_revision(date('Y-m-d H:i:s'));
            $sgc_ruex->setId_regional($empresa_persona->getId_regional());
            $sql_sgc_ruex = new SQLSGCRuex();

            if($sql_sgc_ruex->setGuardarSGCRuex($sgc_ruex)){*/
    //            echo '[{"suceso":"1","accion":"Empresa Revisada","id_sgc_ruex":"'.$sgc_ruex->getId_sgc_ruex().'"}]';
            /*}else{
                echo '[{"suceso":"0"}]';
            }*/
            //print('<pre>'.print_r($_REQUEST,true).'</pre>');
            //$vista->display("ruex/avisoAsignacionRuex.tpl"); 
            exit;
        }
        if($_REQUEST['tarea']=='asignacionruex')//esta es para asignar ruex a una empresa temporal 
        {

            $hoy = date('Y-m-d H:i:s');
            $empresa = new Empresa();
            $sqlEmpresa = new SQLEmpresa();
            $empresa->setId_empresa($_REQUEST["id_empresa"]);
            $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
            $idactividad_economica = $empresa->getIdActividad_Economica();
            $idtipo_empresa = $empresa->getIdTipo_Empresa();
            $idrubro_exportaciones = $empresa->getIdRubro_Exportaciones();
            $empresa = $this->AsignarEmpresa($_REQUEST["id_empresa"]);
            $empresaRevision = new EmpresaRevision();
            $sqlEmpresaRevision = new SQLEmpresaRevision();
           
            if($empresa->getEstado()==2 || $empresa->getEstado()==0){
//            if( ($empresa->getEstado()==9 || $empresa->getEstado()==6 || $empresa->getEstado()== 4 ) && count($lista)>0 ){
                $empresaRevision = Null;
                $direccionRevision = Null;
            }else{
                $empresaRevision->setId_empresa($empresa->getId_empresa());
                $lista = $sqlEmpresaRevision->getRegistrosPorIdEmpresa($empresaRevision);
                if(count($lista)>0){
                    $empresaRevision = $lista[0];
                    $direccionRevision = new Direccion();
                    $sqlDireccion = new SQLDireccion();
                    $direccionRevision->setId_direccion($empresaRevision->getDireccion());
                    $direccionRevision = $sqlDireccion->getDireccionByID($direccionRevision);
                }else{
                    $empresaRevision = Null;
                    $direccionRevision = Null;
                }
            }
//            print('<pre>'.print_r($empresaRevision,true).'</pre>');
    //         exit();
    //        

            //------------------------preguntamos si es cafetalera
            $ico = $this->verificaEmpresaIco($empresa);
            if(!empty($ico))
            {
                $vista->assign('ico', $ico);
            }  

            //------------------------------
            //---------------------esto es para todo los funcionarios de esa empresa------------------------
            $personal=  AdmPersona::listarPersonasPorEmpresa($_REQUEST["id_empresa"]);
             //--------------------estoe spara el formato de la fecha d/m/a----------------------
            $fecha_renovacion_a= explode("-", $empresa->getFecha_renovacion_ruex());
            $empresa->setFecha_renovacion_ruex($fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0]);

            /*$municipio=new Municipio();
            $sqlMunicipio=new SQLMunicipio();
            $municipio->setId_municipio($empresa->getMunicipio());
            $municipio=$sqlMunicipio->getMunicipioPorID($municipio);*/


            /*$ciudad=new Ciudad();
            $sqlCiudad=new SQLCiudad();
            $ciudad->setId_ciudad($empresa->getCiudad());
            $ciudad=$sqlCiudad->getCiudadPorID($ciudad);*/

            /*$vRuex = new VerificacionRuex();
            $sqlvRuex = new SQLVerificacionRuex();
            $vRuex->setRuex($empresa->getRuex());
            $vRuex = $sqlvRuex->getVerificacionRuex($vRuex);*/

            $sgc_ruex = new SGCRuex();
            $sql_sgc_ruex = new SQLSGCRuex();

            $empresa_persona = new EmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $sqlEmpresaPersona = new SQLEmpresaPersona();
            $empresa_persona = $sqlEmpresaPersona->getEmpresaPersonaPorID($empresa_persona);

            $regional = new Regional();
            $sqlRegional = new SQLRegional();
            $regional->setId_regional($empresa_persona->getId_regional());
            $regional = $sqlRegional->getBuscarRegionalPorId($regional);

            $persona =new Persona();
            $sqlPersona = new SQLPersona();
            $persona->setId_persona($empresa_persona->getId_Persona());
            $persona = $sqlPersona->getDatosPersonaPorId($persona);

            $sgc_ruex->setId_empresa($_REQUEST['id_empresa']);
            $sgc_ruex->setRevisado(0);
            $sgc_ruex = $sql_sgc_ruex->getSGCRuexPorEmpresaRevisado($sgc_ruex);
            $observacion='';
            if($_REQUEST['revisar']=='1'){
                if( $sgc_ruex == null){
                    $sgc_ruex=new SGCRuex();
                    $sgc_ruex->setId_empresa($_REQUEST['id_empresa']);
                    $sgc_ruex->setRevisado(0);
                    $sgc_ruex->setId_asistente($empresa_persona->getId_empresa_persona());
                    $sgc_ruex->setFecha_inicio_revision(date('Y-m-d H:i:s'));
                    $sgc_ruex->setId_regional($empresa_persona->getId_regional());
                    if($empresa_persona->getId_Perfil()!= 17){
                        $sql_sgc_ruex->setGuardarSGCRuex($sgc_ruex);
                    }

                }else{
                    $empresa_persona = new EmpresaPersona();
                    $empresa_persona->setId_empresa_persona($sgc_ruex->getId_asistente());
                    $empresa_persona = $sqlEmpresaPersona->getEmpresaPersonaPorID($empresa_persona);

                    $persona =new Persona();
                    $persona->setId_persona($empresa_persona->getId_Persona());
                    $persona = $sqlPersona->getDatosPersonaPorId($persona);
                    $observacion = $sgc_ruex->getObservaciones();
                }
                $vista->assign('asignado', $persona->getNombres().' '.$persona->getPaterno().' '.$persona->getMaterno());
                $vista->assign('fecha_ini',$sgc_ruex->getFecha_inicio_revision());
            }
            
            $vista->assign("idrubro_exportaciones",$idrubro_exportaciones);
            $vista->assign("idactividad_economica",$idactividad_economica);
            $vista->assign("idtipo_empresa",$idtipo_empresa);
            $vista->assign("empresaRevision", $empresaRevision);
            $vista->assign("direccionRevision",$direccionRevision);
            $vista->assign('asignarruex', $empresa->getEstado()==0 || $empresa->getEstado()==4? 1:0);
            $vista->assign('regional', $regional->getCiudad());
            $vista->assign('observacion',$observacion);
            $vista->assign('vRuex','1');
            //$vista->assign('municipio',$municipio!=null? $municipio->getDescripcion():'');
            //$vista->assign('ciudad',$ciudad!=null? $ciudad->getDescripcion():'');
            $vista->assign('afiliaciones_val',$empresa->getAfiliaciones());

            $vista->assign('revisar',$_REQUEST['revisar']);

            $vista->assign('personal', $personal);
            $vista->assign('empresa_temporal', $empresa);
            $vista->display("ruex/AsignacionRuex.tpl"); 
            exit;
        }
        if($_REQUEST['tarea']=='asignarRuexEmpresa')//Aqui te envio el ID de la empresa que se dara de alta
        {
            
            $hoy = date("Y-m-d H:i:s");
            $empresa->setId_empresa($_REQUEST['id_empresa']);
            $empresa = $sqlEmpresa->getEmpresaPorID($empresa);
            $estado_anterior = $empresa->getEstado();

            $empresa->setEstado(2);
            
            //------------para el ruex------------
                $vigencia_empresa = new VigenciaEmpresa();
                $sqlVigenciaEmpresa = new SQLVigenciaEmpresa();

                $vRuex = new VerificacionRuex();
                $sqlvRuex = new SQLVerificacionRuex();
                $vRuex->setRuex($empresa->getRuex());
                $vRuex = $sqlvRuex->getVerificacionRuex($vRuex);
                $fAsignacion = date("Y-m-d");
                $fRenovacion = '';
                $sw = false;
                /*if(!empty($vRuex) && $vRuex->getEstado()=='0' && $_REQUEST['chk-vigencia']=='true' && $sw){
                    $vRuex->setEstado('1');
                    $fAsignacion = $vRuex->getUltima_fecha_renovacion();
                    $fRenovacion = $vRuex->getUltima_fecha_renovacion();
                    $vigencia_empresa->setId_vigencia_empresa(1);//esto ese cambia de acuerdo a la OEA
                    $sqlvRuex->ActualizarVerificacion($vRuex);
                }else{
                    
                }*/
                if($estado_anterior==0 || $estado_anterior==9 || $estado_anterior==6 || $estado_anterior == 14){
                    $vigencia_empresa->setId_vigencia_empresa(($empresa->getOea() ? 4 : 3));//esto ese cambia de acuerdo a la OEA
                    $fRenovacion=date("Y-m-d");
                    $vigencia_empresa=$sqlVigenciaEmpresa->getBuscarDescripcionPorId($vigencia_empresa);
                    $empresa->setVigencia($vigencia_empresa->getDescripcion());
                    $empresa->setFecha_asignacion_ruex($fAsignacion);
                    $empresa->setFecha_renovacion_ruex(date('Y-m-d', strtotime($fAsignacion. ' + '.$vigencia_empresa->getDias().' days')));
                }
                if($empresa->getRuex()==null || $empresa->getRuex()==''){
                    $correlativoruex = new CorrelativoRuex();
                    $sqlcorrelativoruex = new SQLCorrelativoruex();

                    $correlativoruex=$sqlcorrelativoruex->getCorrelativoRuex($correlativoruex);
                    $empresa->setRuex($correlativoruex->getCorrelativo_ruex());
                    $sqlcorrelativoruex->setGuardarCorrelativoRuex($correlativoruex);
                }

            //------------ohhhh-------------------
            //$empresa->setFecha_registro($hoy);

            if($sqlEmpresa->setGuardarEmpresa($empresa)){
                // esto es para la auditoria----------------------------------------------------
                $modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
                $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia();
                $modificacionemrpesarelevancia->setId_empresa($_REQUEST['id_empresa']);
                $modificacionemrpesarelevancia->setObservacion_asistente('Empresa con Ruex');
                $modificacionemrpesarelevancia->setId_asistente_rechazo($_SESSION['id_persona']);
                $modificacionemrpesarelevancia->setFecha_solicitud($hoy);
                $modificacionemrpesarelevancia->setEstado($estado_anterior); 
                $modificacionemrpesarelevancia->setId_servicio_exportador(0); 
                $modificacionemrpesarelevancia->setRenovacion(false);
                $sqlModificacionempresarelevancia->setGuardarModificacionEmpresaRelevancia($modificacionemrpesarelevancia);
                //aqui cargamos los datos de las notificaciones
                    //para empresas admitidas
                    $admisiones=AdmEmpresa::EmpresasAdmitidasCount();

                $empresa_persona = new EmpresaPersona();
                $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
                $sqlEmpresaPersona = new SQLEmpresaPersona();
                $empresa_persona = $sqlEmpresaPersona->getEmpresaPersonaPorID($empresa_persona);

                $sgc_ruex=new SGCRuex();
                $sql_sgc_ruex = new SQLSGCRuex();

                $sgc_ruex->setId_empresa($_REQUEST['id_empresa']);
                $sgc_ruex->setRevisado(0);
                $sgc_ruex = $sql_sgc_ruex->getSGCRuexPorEmpresaRevisado($sgc_ruex);
                if($sgc_ruex==null){
                    $sgc_ruex=new SGCRuex();
                    $sgc_ruex->setId_empresa($_REQUEST['id_empresa']);
                    $sgc_ruex->setId_asistente($empresa_persona->getId_empresa_persona());
                    $sgc_ruex->setId_regional($empresa_persona->getId_regional());
                    $sgc_ruex->setFecha_inicio_revision(date('Y-m-d H:i:s'));
                }
                $sgc_ruex->setRevisado(1);
                if($estado_anterior==0){
                    $estado_anterior = 9;
                }
                if($estado_anterior==14){
                    $estado_anterior = 6;
                }
                if($estado_anterior==13){
                    $estado_anterior = 4;
                }
                $sgc_ruex->setId_estado($estado_anterior);
                
                $sgc_ruex->setFecha_fin_revision(date('Y-m-d H:i:s'));
                $sql_sgc_ruex->setGuardarSGCRuex($sgc_ruex);
                
                // llamar al metodo ws
                
                $var= $this->EnvioEmpresaVicem($_REQUEST['id_empresa']);
                
                echo '[{"suceso":"1","admisiones":"'.$admisiones.'","id_empresa_relevancia":"'.$modificacionemrpesarelevancia->getId_modificacion_empresa_relevancia().'"}]';
            }else{
                echo '[{"suceso":"0"}]';
            }
            exit;
        }
	if($_REQUEST['tarea']=='empresasruex')//aqui se listan todas las empresas que tiene RUEX por orde decendente de fecha
        {   
            //me envias en empresasruex
            $empresasruex=$sqlEmpresa->getListarEmpresaPorFechaDescendenteComilla($empresa);
            $json_r = json_encode($empresasruex); 

            $vista->assign('empresasruex',$json_r);
            $vista->display("ruex/EmpresasRuex.tpl");
            exit;
        }        
        if($_REQUEST['tarea']=='empresaruex')//es para mostrar un empresa que tien su ruex
        {
            $empresa = $this->AsignarEmpresa($_REQUEST["id_empresa"]);
            //------------------------preguntamos si es cafetalera
                $ico = $this->verificaEmpresaIco($empresa);
                if(!empty($ico))
                {
                    $vista->assign('ico', $ico);
                }  
            //------------------------------
            //---------------------esto es para todo los funcionarios de esa empresa------------------------
            $personal=  AdmPersona::listarPersonasPorEmpresa($_REQUEST["id_empresa"]);
            //-----------------------para el formato d/m/a-------------------
            $fecha_renovacion_a= explode("-", $empresa->getFecha_renovacion_ruex());
            $empresa->setFecha_renovacion_ruex($fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0]);

            $municipio=new Municipio();
            $sqlMunicipio=new SQLMunicipio();
            $municipio->setId_municipio($empresa->getMunicipio());
            $municipio=$sqlMunicipio->getMunicipioPorID($municipio);

            $ciudad=new Ciudad();
            $sqlCiudad=new SQLCiudad();
            $ciudad->setId_ciudad($empresa->getCiudad());
            $ciudad=$sqlCiudad->getCiudadPorID($ciudad);


            $vista->assign('municipio',$municipio!=null? $municipio->getDescripcion():'');
            $vista->assign('ciudad',$ciudad!=null? $ciudad->getDescripcion():'');
            $vista->assign('afiliaciones_val',$empresa->getAfiliaciones());

            $vista->assign('personal', $personal);
            $vista->assign('empresa', $empresa);
            $vista->display("ruex/EmpresaRuex.tpl");
            exit;
        }
        //---------------------------------------------------------------esta parte es para el bloqueo de empresas------------------------------
      //-------------------------- Tareas para las Fábricas -----------------
      if($_REQUEST['tarea']=='listarDirecciones'){
        $sqldireccion = new SQLDireccion();

        $fabrica=new Fabrica();
        $sqlFabrica =new SQLFabrica();

        $fabrica->setId_Empresa($_SESSION["id_empresa"]);
        $resultado = $sqlFabrica->getListarFabricasporEmpresa($fabrica);
        $strJson = '';
        echo '[';
        foreach ($resultado as $datos){
          $direccion= new Direccion();
          $direccion->setId_direccion($datos->getId_direccion());
          $direccion = $sqldireccion->getDireccionByID($direccion);
          $strJson .= '{"id_direccion":"' . $direccion->getId_direccion() .
            '","direccion":"'.$direccion->getNombre_zona_barrio().'"},';
          $selected='';
        }
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
      }
        if($_REQUEST['tarea']=='estadoEmpresas')//empresas su ruex y su estado
        {
            //me envias en empresasruex
            $empresas=$sqlEmpresa->getListarEmpresas($empresa);
            $vista->assign('empresas', $empresas);
            $vista->display("admEmpresa/EmpresasEstado.tpl");
            exit;
        }
        //-------------------------- Tareas para las Fábricas -----------------
        if($_REQUEST['tarea']=='listarFabricas')
        {
            $fabrica->setId_Empresa($_SESSION["id_empresa"]);
            $resultado = $sqlFabrica->getListarFabricasporEmpresa($fabrica);
            $selected = ',"selected":true';

            $strJson = '';
            echo '[';
            foreach ($resultado as $datos){
                $strJson .= '{"id_fabrica":"' . $datos->getId_fabrica() .
                        '","fabricas":"'.$datos->getCiudad(). ' - '.$datos->getDireccion().'"},';
                $selected='';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='guardarFabrica')//aqui se Guardan las fábricas de una empresa
        {
            $fabrica->setId_empresa($_SESSION["id_empresa"]);
            $fabrica->setCiudad($_REQUEST["ciudad_fabrica"]);
            $fabrica->setDireccion($_REQUEST["direccion_fabrica"]);
            $fabrica->setNumero_contacto($_REQUEST["telefono_fabrica"]);
            $fabrica->setPersona_contacto($_REQUEST["persona_contacto"]);

            if($sqlFabrica->setGuardarFabrica($fabrica)){
                echo 1;
            }else{
                echo 0;
            }
            exit;
        }
        if($_REQUEST['tarea']=='listarMunicipios') 
        {

            $resultado = $sqlEmpresa->getListarFabricasporEmpresa($fabrica);
            $selected = ',"selected":true';

            $strJson = '';
            echo '[';
            foreach ($resultado as $datos){
                $strJson .= '{"id_fabrica":"' . $datos->getId_fabrica() .
                        '","fabricas":"'.$datos->getCiudad(). ' - '.$datos->getDireccion().'"},';
                $selected='';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='agregarEmpresa')
        {
            //print('<pre>'.print_r($_REQUEST,true).'</pre>');
            $FSEmpresa = new FacturaSenavexEmpresa();
            $sqlFSEmpresa = new SQLFacturaSenavexEmpresa();

            $FSEmpresa->setNit($_REQUEST['empresa_nit']);
            $FSEmpresa->setNombre($_REQUEST['empresa_nombre']);
            $FSEmpresa->setRuex($_REQUEST['empresa_ruex']);
            $sqlFSEmpresa->Save($FSEmpresa);
            //print('<pre>'.print_r($FSEmpresa,true).'</pre>');
            if(empty($FSEmpresa)==true){
                    echo '-1';
            }else{

                echo '[';
                echo '{"id":"'.$FSEmpresa->getId_factura_senavex_empresa().'",'
                    .'"nit":"'.$FSEmpresa->getNit().'",'
                    .'"nombre":"'.$FSEmpresa->getNombre().'"}';
                echo ']';
            }
            exit;
        }
        if($_REQUEST['tarea']=='listarPersonalHabilitado')  
        {
          $empresaPersona = new EmpresaPersona();
          $empresaPersona->setId_Empresa($_REQUEST['id_empresa']);
          $sqlEmpresaPersona = new SQLEmpresaPersona();
          $listar= $sqlEmpresaPersona->getListarPersonaPorEmpresa($empresaPersona);
          echo '[';
          $strJson = '';
          foreach ($listar as $value){
              $persona = new Persona();
              $sqlPersona = new SQLPersona();
              $persona->setId_persona($value->getId_persona());
              $persona = $sqlPersona->getDatosPersonaPorId($persona);
              $strJson.= '{"id_empresa_persona":"'.$value->getId_empresa_persona() . 
                          '", "descripcion":"'.$persona->getNumero_documento() .' - '.$persona->getNombres().' '.$persona->getPaterno(). ' ' . $persona->getMaterno(). '"},';
          }
          $strJson = substr($strJson, 0, strlen($strJson) - 1);
          echo $strJson;
          echo ']';
          exit;
      }

    }
    static function EmpresasAdmitidasCount()// lleno los id de la empresa temporal con valores reales para enviarlos a ala vista  
    {
      // aqui me envias todas las empresas que se han admitido que estan ya para asignacion de ruex
        $empresa= new Empresa();
        $sqlEmpresa = new SQLEmpresa();
        $admisiones=$sqlEmpresa->getListarEmpresasAdmitidas($empresa);
        
        $modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
        $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia();
        $admisiones2=$sqlModificacionempresarelevancia->getListarEmpresasAdmitidas($modificacionemrpesarelevancia);
        
        return  (int)count($admisiones)+(int)count($admisiones2);
  }
    public function explodeRubroExportaciones($IdRubro_Exportaciones)
    {
        $rubro_exportaciones = new RubroExportaciones();
        $sqlRubro_exportaciones = new SQLRubroExportaciones();
        $rubros=explode(",",$IdRubro_Exportaciones);
        foreach ($rubros as &$rubro) {
              $rubro_exportaciones->setId_rubro_exportaciones($rubro);
              $rubro_exportaciones=$sqlRubro_exportaciones-> getBuscarRubroPorId($rubro_exportaciones);
              $rubro = $rubro_exportaciones->getDescripcion().'<br>';
              $rubroexportaciones=$rubroexportaciones.$rubro;
          }
        return $rubroexportaciones;
  }
    static function EmpresaAdmitidaParaModificacion($id_empresa)//pregunto si la empresa esta con solicitud de modificacion  
    {
        $modificacionemrpesarelevancia = new ModificacionEmpresaRelevancia();
        $sqlModificacionempresarelevancia = new SQLModificacionEmpresaRelevancia();
        $modificacionemrpesarelevancia->setId_empresa($id_empresa);
        $modificacionemrpesarelevancia=$sqlModificacionempresarelevancia->getModificacionEmpresaRelevanciaPorId_Empresa($modificacionemrpesarelevancia);
         if($modificacionemrpesarelevancia)
        {
            if($modificacionemrpesarelevancia->getEstado()==0)
            {
                return 0;//tu empresa ha enviado su solicitud para modificacion
            }
            else
            {
                return 1;//tu empresa ha sido aprobada para modificacion
            }
        }
        else
        {
            return null;// tuempresa no ha enviado solicitud de modificacion 
        }
    }
    public function AsignarEmpresa($id_empresa)// lleno los id de la empresa temporal con valores reales para enviarlos a ala vista  
    {
        $empresa = new Empresa();
        $sqlEmpresa = new SQLEmpresa();
        
        $empresa->setId_empresa($id_empresa);      
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
      
        $categoria_empresa = new CategoriaEmpresa();
        $sqlCategoriaEmpresa = new SQLCategoriaEmpresa();
        $categoria_empresa->setId_categoria_empresa($empresa->getIdcategoria_empresa());
        $categoria_empresa=$sqlCategoriaEmpresa->getBuscarDescripcionPorId($categoria_empresa);
        $empresa->setIdcategoria_empresa($categoria_empresa->getDescripcion());
         
        $tipo_empresa = new TipoEmpresa();
        $sqlTipoempresa = new SQLTipoEmpresa();
        
        if($empresa->getIdtipo_empresa()!=null)
        {
            $tipo_empresa->setId_tipo_empresa($empresa->getIdtipo_empresa());
            $tipo_empresa=$sqlTipoempresa->getBuscarDescripcionPorId($tipo_empresa);        
            $empresa->setIdTipo_Empresa($tipo_empresa->getDescripcion());
        }
        
        
        $actividad_economica = new ActividadEconomica();
        $sqlActivisdadEconomica = new SQLActividadEconomica();
        $actividad_economica->setId_actividad_economica($empresa->getIdActividad_Economica());
        $actividad_economica=$sqlActivisdadEconomica->getBuscarDescripcionPorId($actividad_economica);        
        $empresa->setIdActividad_Economica($actividad_economica->getDescripcion());
        $empresa->setIdRubro_Exportaciones($this->explodeRubroExportaciones($empresa->getIdRubro_Exportaciones()));
        
        /*$departamento = new Departamento();
        $sqlDepartamento = new SQLDepartamento();
        $departamento->setId_departamento($empresa->getIdDepartamento_Procedencia());
        $departamento=$sqlDepartamento-> getBuscarDepartamentoPorId($departamento);
        $empresa->setIdDepartamento_Procedencia($departamento->getNombre());*/
//        print('<pre>'.print_r($empresa,true).'</pre>'); exit();
        
      
        return $empresa;
  }
    public function verificaEmpresaIco($empresa)// me devuelve el Ico de la empresa si esta es cafetalera si no lo es me devuelve null
    {
        $cafeICO = new CafeICO();
        $sqlcafeICO = new SQLCafeICO();
        $cafeICO->setId_empresa($empresa->getId_empresa());
        $cafeICO=$sqlcafeICO->getCafeICO_Empresa($cafeICO);
        if(empty($cafeICO))
        {
            return null;
        }
        else
        {
            return $cafeICO;
        }
    }
    public function AsignarEmpresaRevision($id_empresa_revision){
        $empresa = new EmpresaRevision();
        $sqlEmpresa = new SQLEmpresaRevision();

        $empresa->setId_empresa_revision($id_empresa_revision);      
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
        
        
        $categoria_empresa = new CategoriaEmpresa();
        $sqlCategoriaEmpresa = new SQLCategoriaEmpresa();
        $categoria_empresa->setId_categoria_empresa($empresa->getIdcategoria_empresa());
        $categoria_empresa=$sqlCategoriaEmpresa->getBuscarDescripcionPorId($categoria_empresa);
        $empresa->setIdcategoria_empresa($categoria_empresa->getDescripcion());

        $tipo_empresa = new TipoEmpresa();
        $sqlTipoempresa = new SQLTipoEmpresa();
        if($empresa->getIdtipo_empresa()!=null)
        {
            $tipo_empresa->setId_tipo_empresa($empresa->getIdtipo_empresa());
            $tipo_empresa=$sqlTipoempresa->getBuscarDescripcionPorId($tipo_empresa);        
            $empresa->setIdTipo_Empresa($tipo_empresa->getDescripcion());
        }
        
        $actividad_economica = new ActividadEconomica();
        $sqlActivisdadEconomica = new SQLActividadEconomica();
        $actividad_economica->setId_actividad_economica($empresa->getIdActividad_Economica());
        $actividad_economica=$sqlActivisdadEconomica->getBuscarDescripcionPorId($actividad_economica);        
        $empresa->setIdActividad_Economica($actividad_economica->getDescripcion());

        $departamento = new Departamento();
        $sqlDepartamento = new SQLDepartamento();
        $departamento->setId_departamento($empresa->getIdDepartamento_Procedencia());
        $departamento=$sqlDepartamento-> getBuscarDepartamentoPorId($departamento);
        $empresa->setIdDepartamento_Procedencia($departamento->getNombre());

        $empresa->setIdRubro_Exportaciones($this->explodeRubroExportaciones($empresa->getIdRubro_Exportaciones()));

        return $empresa;
    }
     public function EnvioEmpresaVicem($id_empresa)
    {
        //buscamos emmpresa
        $empresa = new Empresa();
        $sqlEmpresa = new SQLEmpresa();
        $empresa->setId_empresa($id_empresa);      
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
        
        //buscamos direccion
        $direccion = new Direccion();
        $sqlDireccion = new SQLDireccion();
        $direccion->setId_direccion($empresa->getDireccion());
        $direccion = $sqlDireccion->getDireccionByID($direccion);
        
        //buscamos Representante legal
        
        $rep_legal =new Persona();
        $sqlPersona = new SQLPersona();
        $rep_legal->setId_persona($empresa->getId_representante_legal());
        $rep_legal = $sqlPersona->getDatosPersonaPorId($rep_legal);
            
        //buscamos emmpresa
        $rep_legal_cargo = new EmpresaPersona();
        $sqlEp = new SQLEmpresaPersona();
        $rep_legal_cargo->setId_Empresa($id_empresa);
        $rep_legal_cargo->setId_Persona($empresa->getId_representante_legal());
        $rep_legal_cargo = $sqlEp->getEmpresaPorPersonaEmpresa($rep_legal_cargo);
        
        if ($empresa->getOea() != null)
        {
            $empresa->setOea("1");      
        }
        if ($direccion != null)
        {
         $datos=array(
                    "empresa"=>array(
                            "id_empresa"=>''.$empresa->getId_empresa().'',
                            "ruex"=>''.$empresa->getRuex().'',
                            "nit"=>''.$empresa->getNit().'',
                            "razon_social"=>''.$empresa->getRazon_Social().'',
                            "nom_comercial"=>''.$empresa->getNombre_Comercial().'',
                            "desc_empresa"=>''.$empresa->getDescripcion_empresa().'',
                            "fundempresa"=>''.$empresa->getMatricula_Fundempresa().'',
                            "ges_fundacion"=>''.$empresa->getDate_fundacion().'',
                            "ges_export"=>''.$empresa->getDate_inicio_operaciones().'',
                            "tipo_empresa"=>''.$empresa->getIdTipo_Empresa().'',
                            "tipo_actividad"=>''.$empresa->getIdActividad_Economica().'',
                            "pagina_web"=>''.$empresa->getPagina_Web().'',
                            "oea"=>''.$empresa->getOea().'',
                            "rubro"=>''.$empresa->getIdRubro_Exportaciones().'',
                            "afiliacion"=>''.$empresa->getAfiliaciones().'',
                            "categoria"=>''.$empresa->getIdCategoria_Empresa(),
			    "fecha_asignacion_ruex"=>''.$empresa->getFecha_asignacion_ruex()
                    ),
                    "direccion"=>array(
                            "id_direccion_tipo"=>''.$direccion->getId_direccion_tipo().'',
                            "id_direccion_tipo_calle"=>''.$direccion->getId_direccion_tipo_calle().'',
                            "nombre_tipo_calle"=>''.$direccion->getNombre_direccion_tipo_calle().'',
                            "nro_domicilio"=>''.$direccion->getNumero_domicilio().'',
                            "nombre_edificio"=>''.$direccion->getNombre_edificio().'',
                            "piso"=>''.$direccion->getPiso().'',
                            "id_tipo_ubic_edificio"=>''.$direccion->getId_direccion_tipo_ubicacion_edificio().'',
                            "nro_dpto_oficina"=>''.$direccion->getNumero_dpto_oficina().'',
                            "id_tipo_zona"=>''.$direccion->getId_direccion_tipo_zona().'',
                            "nombre_zona_barrio"=>''.$direccion->getNombre_zona_barrio().'',
                            "id_departamento"=>''.$direccion->getId_departamento().'',
                            "id_municipio"=>''.$direccion->getId_municipio().'',
                            "telefono_fijo"=>''.$direccion->getTelefono_fijo().'',
                            "telefono_celular"=>''.$direccion->getTelefono_celular().'',
                            "telefono_fax"=>''.$direccion->getTelefono_fax().'',
                            "email"=>''.$direccion->getEmail().'',
                            "direccion_descriptiva"=>''.$direccion->getDireccion_descriptiva().'',
                            "latitud"=>''.$empresa->getCoordenada_lat().'',
                            "longitud"=>''.$empresa->getCoordenada_long().'',
                            "direccion_formato_anterior"=>''.$empresa->getDireccionfiscal()
                    ),
                    "rep_legal"=>array(
                            "nombres"=>''.$rep_legal->getNombres().'',
                            "apellido_1"=>''.$rep_legal->getPaterno().'',
                            "apellido_2"=>''.$rep_legal->getMaterno().'',
                            "tipo_doc"=>''.$rep_legal->getId_tipo_documento().'',
                            "nro_doc"=>''.$rep_legal->getNumero_documento().'',
                            "fono_1"=>''.$rep_legal->getNumero_contacto().'',
                            "fono_2"=>''.$rep_legal->getNumero_contacto2().'',
                            "email"=>''.$rep_legal->getEmail().'',
                            "pais_origen"=>''.$rep_legal->getId_pais_origen().'',
                            "sexo"=>''.$rep_legal->getGenero().'',
                            "cargo"=>''.$rep_legal_cargo->getCargo()
                    )
            );
         }
         else
             {
         $datos=array(
                    "empresa"=>array(
                            "id_empresa"=>''.$empresa->getId_empresa().'',
                            "ruex"=>''.$empresa->getRuex().'',
                            "nit"=>''.$empresa->getNit().'',
                            "razon_social"=>''.$empresa->getRazon_Social().'',
                            "nom_comercial"=>''.$empresa->getNombre_Comercial().'',
                            "desc_empresa"=>''.$empresa->getDescripcion_empresa().'',
                            "fundempresa"=>''.$empresa->getMatricula_Fundempresa().'',
                            "ges_fundacion"=>''.$empresa->getDate_fundacion().'',
                            "ges_export"=>''.$empresa->getDate_inicio_operaciones().'',
                            "tipo_empresa"=>''.$empresa->getIdTipo_Empresa().'',
                            "tipo_actividad"=>''.$empresa->getIdActividad_Economica().'',
                            "pagina_web"=>''.$empresa->getPagina_Web().'',
                            "oea"=>''.$empresa->getOea().'',
                            "rubro"=>''.$empresa->getIdRubro_Exportaciones().'',
                            "afiliacion"=>''.$empresa->getAfiliaciones().'',
                            "categoria"=>''.$empresa->getIdCategoria_Empresa(),
			    "fecha_asignacion_ruex"=>''.$empresa->getFecha_asignacion_ruex()
                    ),
                    "direccion"=>array(
                            "id_direccion_tipo"=>''.'',
                            "id_direccion_tipo_calle"=>''.'',
                            "nombre_tipo_calle"=>''.'',
                            "nro_domicilio"=>''.'',
                            "nombre_edificio"=>''.'',
                            "piso"=>''.'',
                            "id_tipo_ubic_edificio"=>''.'',
                            "nro_dpto_oficina"=>''.'',
                            "id_tipo_zona"=>''.'',
                            "nombre_zona_barrio"=>''.'',
                            "id_departamento"=>''.$empresa->getIdDepartamento_Procedencia().'',
                            "id_municipio"=>''.$empresa->getMunicipio().'',
                            "telefono_fijo"=>''.'',
                            "telefono_celular"=>''.'',
                            "telefono_fax"=>''.'',
                            "email"=>''.'',
                            "direccion_descriptiva"=>''.'',
                            "latitud"=>''.$empresa->getCoordenada_lat().'',
                            "longitud"=>''.$empresa->getCoordenada_long().'',
                            "direccion_formato_anterior"=>''.$empresa->getDireccionfiscal()
                    ),
                    "rep_legal"=>array(
                            "nombres"=>''.$rep_legal->getNombres().'',
                            "apellido_1"=>''.$rep_legal->getPaterno().'',
                            "apellido_2"=>''.$rep_legal->getMaterno().'',
                            "tipo_doc"=>''.$rep_legal->getId_tipo_documento().'',
                            "nro_doc"=>''.$rep_legal->getNumero_documento().'',
                            "fono_1"=>''.$rep_legal->getNumero_contacto().'',
                            "fono_2"=>''.$rep_legal->getNumero_contacto2().'',
                            "email"=>''.$rep_legal->getEmail().'',
                            "pais_origen"=>''.$rep_legal->getId_pais_origen().'',
                            "sexo"=>''.$rep_legal->getGenero().'',
                            "cargo"=>''.$rep_legal_cargo->getCargo()
                    )
            );
         }
            $headers=['Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImlkIjoxLCJ1c2VyIjoic2VuYXZleCIsImVudGlkYWQiOiJzZW5hdmV4In19.ReffJFfesADfsJ7UKLhM6znGrxwj3tj_4TPARtwNbFI'];
            $url = 'http://vcie.produccion.gob.bo/siexco/ws_ruex/index.php/empresa';
            
            $curl = curl_init($url);
            curl_setopt($curl,  CURLOPT_HTTPHEADER,  $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,  true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST,  "POST");
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($datos));
            $resp = curl_exec($curl);
            $var_estado_ws = 0;
            if (!curl_errno($curl)) {
              switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                case 200:  # OK
                    $obj = json_decode($resp);
                    if ($obj->{'estado'}== 'Ok')
                    {
                        $var_estado_ws = 1;
                    }
                    break;
                default:
                    $resp = '{"estado_ws_net":"error","codigo":"'.$http_code.'"}';  
              }
            }
            else
            {
                $resp = '{"estado_net":"error","codigo":"000"}';  
            }
            $hoy = date("Y-m-d h:m:s");
            $sqlBitacora_ws = new SQLBitacora_ws();
            $bitacora_ws = new Bitacora_ws();
            $bitacora_ws->setId_entidades_ws("5");
            $bitacora_ws->setMetodo($url);
            $bitacora_ws->setRespuesta(curl_getinfo($curl, CURLINFO_HTTP_CODE));
            if($_SESSION['usuario'])
            {
                $bitacora_ws->setUsuario($_SESSION['usuario']);
                $separador=substr ($_REQUEST["usuario"],0,2);
                if($separador=='T-')
                {
                    $bitacora_ws->setTipo_usuario("T");
                }
                else
                {
                    $bitacora_ws->setTipo_usuario("F");
                }
            }
            else
            {
                $bitacora_ws->setUsuario("-1");
                $bitacora_ws->setTipo_usuario("N");
            }
	    $bitacora_ws->setId_empresa($id_empresa);
            $bitacora_ws->setFecha_registro($hoy);
            $bitacora_ws->setEstado(true);
            $sqlBitacora_ws->setGuardarBitacora_ws($bitacora_ws);            
            /*
            $empresa_1 = new Empresa();
            $sqlEmpresa_1 = new SQLEmpresa();
            $empresa_1->setId_empresa($id_empresa);      
            $empresa_1=$sqlEmpresa->getEmpresaPorID($empresa_1);
            $empresa_1->setEncuesta($var_estado_ws);
            $sqlEmpresa->setGuardarEmpresa($empresa_1);                        
            //echo '  123  ' . $resp .'  lau  ';*/
            curl_close($curl);
    }
}
