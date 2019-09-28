<?php
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'TipoEmpresa.php');
include_once(PATH_TABLA . DS . 'CategoriaEmpresa.php');
include_once(PATH_TABLA . DS . 'VigenciaEmpresa.php');
include_once(PATH_TABLA . DS . 'ActividadEconomica.php');
include_once(PATH_TABLA . DS . 'Departamento.php');
include_once(PATH_TABLA . DS . 'RubroExportaciones.php');
include_once(PATH_TABLA . DS . 'Servicio.php');
include_once(PATH_TABLA . DS . 'Correlativooic.php');
include_once(PATH_TABLA . DS . 'CafeICO.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'TipoDocumentoIdentidad.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'EmpresaAfiliacion.php');
include_once(PATH_TABLA . DS . 'Municipio.php');
include_once(PATH_TABLA . DS . 'Ciudad.php');
include_once(PATH_TABLA . DS . 'Direccion.php');
include_once(PATH_TABLA . DS . 'DireccionTipo.php');
include_once(PATH_TABLA . DS . 'DireccionTipoCalle.php');
include_once(PATH_TABLA . DS . 'DireccionTipoZona.php');
include_once(PATH_TABLA . DS . 'DireccionUbicacionEdificio.php');
include_once(PATH_TABLA . DS . 'Logs.php');

include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLRubroExportaciones.php');
include_once(PATH_TABLA . DS . 'UsuarioTemporal.php');
include_once(PATH_MODELO . DS . 'SQLUsuario.php');
include_once(PATH_MODELO . DS . 'SQLServicio.php');
include_once(PATH_MODELO . DS . 'SQLVigenciaEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLCorrelativooic.php');
include_once(PATH_MODELO . DS . 'SQLCafeICO.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');
include_once(PATH_MODELO . DS . 'SQLTipoDocumentoIdentidad.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaAfiliacion.php');
include_once(PATH_MODELO . DS . 'SQLMunicipio.php');
include_once(PATH_MODELO . DS . 'SQLCiudad.php');
include_once(PATH_MODELO . DS . 'SQLDireccion.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipo.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoCalle.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoZona.php');
include_once(PATH_MODELO . DS . 'SQLDireccionUbicacionEdificio.php');
include_once(PATH_MODELO . DS . 'SQLLogs.php');

include_once( PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once( PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');
include_once( PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');
include_once( PATH_CONTROLADOR . DS . 'admPersona' . DS . 'AdmPersona.php');
class AdmEmpresaTemporal extends Principal {

  public function AdmEmpresaTemporal() {
      
    $vista = Principal::getVistaInstance();

    $tipo_empresa = new TipoEmpresa();
    $actividad_economica = new ActividadEconomica();
    $empresa = new Empresa();
    $departamento = new Departamento();
    $rubro_exportaciones = new RubroExportaciones();
    $sqlEmpresa = new SQLEmpresa();
    $usuario_temp = new UsuarioTemporal();
    $sqlUsuario = new SQLUsuario();
    $servicio = new Servicio();
    $sqlServicio = new SQLServicio();
    
    $datostipoempresa=$sqlEmpresa->getDatosTipoEmpresa($tipo_empresa);
    $datosactividadeconomica=$sqlEmpresa->getDatosActividadEconomica($actividad_economica);
    $datosdepartamento=$sqlEmpresa->getDatosDepartamento($departamento);
    $datosrubro=$sqlEmpresa->getDatosRubroExportaciones($rubro_exportaciones);
    
    //---esto es para enviarle los rubros de exportacion
    $rubro_exportaciones = new RubroExportaciones();
    $sqlRubro_exportaciones = new SQLRubroExportaciones();
    $rubros_exportaciones=$sqlRubro_exportaciones-> getListarRubroExportaciones($rubro_exportaciones);
    
    //aqui es para la fecha de vigencia 
    $dias=FuncionesGenerales::diasrestantesusuariotemporal($_SESSION["fecha_creacion"]);
    $vista->assign('dias',$dias);

    if($_POST['tarea']=='verificarCorreoInstitucional'){
        $empresa_temporal->setEmail($_REQUEST["email"]);
        $resultado = $sqlEmpresaTemporal->getVerificaCorreoInstitucional($empresa_temporal);        
        if ($resultado=='0'){
            echo '0';
        }
        else {
            echo '1';
        }
        exit;
    }
    if($_POST['tarea']=='verificarDominioCorreo'){
     
        $domain = substr($_REQUEST["email"], strpos($_REQUEST["email"], '@') + 1);
        if  (checkdnsrr($domain) !== FALSE) {
        
            echo '0';
        }
        else {
            echo '1';
        }
        exit;
    }
    if($_REQUEST['tarea']=='registra'){
        $swresultado='-1';
         
        $logs = new Logs();
        $sqlLogs = new SQLLogs();
        $logs->setId_servicio(0);
        
        $empresa->setRazon_Social(str_replace('"', "''", $_REQUEST['razonsocial']));
        $empresa->setNombre_Comercial(str_replace('"', "''", $_REQUEST['nombrecomercial']));
        $empresa->setNit($_REQUEST['nit']);
        $empresa->setMatricula_Fundempresa($_REQUEST['fundaempresa']);
        $empresa->setIdTipo_Empresa($_REQUEST['tipoempresa']);
        $empresa->setAfiliaciones($_REQUEST['afiliaciones']);
        $empresa->setDate_fundacion($_REQUEST['fundacion_empresa']);
        $empresa->setDate_inicio_operaciones($_REQUEST['inicio_empresa']);
        $empresa->setCoordenada_lat($_REQUEST['coordenadas_lat']);
        $empresa->setCoordenada_long($_REQUEST['coordenadas_lon']);
        $empresa->setDescripcion_empresa($_REQUEST['descripcion_empresa']);
        $empresa->setEmail($_REQUEST['email']);
        $empresa->setEmail_Secundario($_REQUEST['email2']);

        /******************REGISTRO DE DIRECCION DE LA EMPREA *****************/
        $direccion1 = new Direccion();
        $sqlDireccion = new SQLDireccion();
        $direccion1->setId_direccion_tipo(2);
        
        $direccion1->setId_direccion_tipo_calle($_REQUEST['ed_tc_1']);
        $direccion1->setNombre_direccion_tipo_calle($_REQUEST['ed_ntc_1']);
        
        if($_REQUEST['ed_numero_domicilio_1']!='')$direccion1->setNumero_domicilio($_REQUEST['ed_numero_domicilio_1']);
        if($_REQUEST['ed_nombre_edificio_1']!='')$direccion1->setNombre_edificio($_REQUEST['ed_nombre_edificio_1']);
        if($_REQUEST['ed_piso_1']!='') $direccion1->setPiso($_REQUEST['ed_piso_1']);
        
        if($_REQUEST['ed_td_1']!='-1' && $_REQUEST['ed_td_1']!='') $direccion1->setId_direccion_tipo_ubicacion_edificio($_REQUEST['ed_td_1']);
        if($_REQUEST['ed_ntd_1']==''){
            $direccion1->setNumero_dpto_oficina(0);
        }else{
            $direccion1->setNumero_dpto_oficina($_REQUEST['ed_ntd_1']);
        }
        
        $direccion1->setId_direccion_tipo_zona($_REQUEST['ed_tz_1']);
        $direccion1->setNombre_zona_barrio($_REQUEST['ed_ntz_1']);
        
        $direccion1->setId_departamento($_REQUEST['ed_dpto_1']);
        $direccion1->setId_municipio($_REQUEST['ed_municipio_1']);
        
        if($_REQUEST['ed_tfijo_1']!='')$direccion1->setTelefono_fijo($_REQUEST['ed_tfijo_1']);
        if($_REQUEST['ed_tcel_1']!='')$direccion1->setTelefono_celular($_REQUEST['ed_tcel_1']);
        if($_REQUEST['ed_tfax_1']!='')$direccion1->setTelefono_fax($_REQUEST['ed_tfax_1']);
        
        $direccion1->setEmail($_REQUEST['ed_email_1']);
         if($_REQUEST['ed_dir_desc_1']!='')$direccion1->setDireccion_descriptiva($_REQUEST['ed_dir_desc_1']);
        
        try{
            $sw_direccion1 = $sqlDireccion->save($direccion1);
        } catch (Exception $ex) {
           // print('<pre>'.print_r($ex,true).'</pre>');
            $logs->setDescripcion('ERROR: Registro de direccion de la Empresa');
            $logs->setMensaje($ex->getMessage());
            $logs->setObjeto(print_r($direccion1,true));
            $logs->setDate(Date('Y-m-d H:i:s'));
            $sqlLogs->Save($logs);
            $resultado = '[{"id":"'.$swresultado.'","descripcion":"'.$logs->getDescripcion().'"}]';
            echo $resultado;
            exit();
        }
       
        
        $empresa->setDireccion($direccion1->getId_direccion());
        $existePersona = AdmPersona::existePersonaId($_REQUEST['id_persona']);
        $direccion2 = new Direccion();
        $sqlDireccion = new SQLDireccion();
        $swPersona = true;
        if($existePersona->getId_persona()==0){
            $swPersona=false;
            $direccion2->setId_direccion_tipo(3);
            $direccion2->setId_direccion_tipo_calle($_REQUEST['ed_tc_2']);
            $direccion2->setNombre_direccion_tipo_calle($_REQUEST['ed_ntc_2']);        
            if($_REQUEST['ed_numero_domicilio_2']!='') $direccion2->setNumero_domicilio($_REQUEST['ed_numero_domicilio_2']);
            if($_REQUEST['ed_nombre_edificio_2']!='') $direccion2->setNombre_edificio($_REQUEST['ed_nombre_edificio_2']);
            if($_REQUEST['ed_piso_2']!='') $direccion2->setPiso($_REQUEST['ed_piso_2']);
            if($_REQUEST['ed_td_2']!='-1' && $_REQUEST['ed_td_2']!='')$direccion2->setId_direccion_tipo_ubicacion_edificio($_REQUEST['ed_td_2']);
            $direccion2->setNumero_dpto_oficina($_REQUEST['ed_ntd_2']);
            $direccion2->setId_direccion_tipo_zona($_REQUEST['ed_tz_2']);
            $direccion2->setNombre_zona_barrio($_REQUEST['ed_ntz_2']);
            $direccion2->setId_departamento($_REQUEST['ed_dpto_2']);
            $direccion2->setId_municipio($_REQUEST['ed_municipio_2']);
            if($_REQUEST['ed_tfijo_2']!='') $direccion2->setTelefono_fijo($_REQUEST['ed_tfijo_2']);
            if($_REQUEST['ed_tcel_2']!='') $direccion2->setTelefono_celular($_REQUEST['ed_tcel_2']);
            if($_REQUEST['ed_tfax_2']!='') $direccion2->setTelefono_fax($_REQUEST['ed_tfax_2']);
            $direccion2->setEmail($_REQUEST['ed_email_2']);
            $direccion2->setDireccion_descriptiva($_REQUEST['ed_dir_desc_2']);
            try{
                $sw_direccion2 = $sqlDireccion->save($direccion2);
            } catch (Exception $ex) {
                $logs->setDescripcion('Registro de direccion del Rep. legal');
                $logs->setMensaje($ex->getMessage());
                $logs->setObjeto(print_r($direccion2,true));
                $logs->setDate(Date('Y-m-d H:i:s'));
                $sqlLogs->Save($logs);
                if(!$sw_direccion1) $sqlDireccion->delete($direccion1);

                $resultado = '[{"id":"'.$swresultado.'","descripcion":"'.$logs->getDescripcion().'"}]';
                echo $resultado;
                exit();
            }
        }else{
            $direccion2->setId_direccion($existePersona->getDireccion());
        }
        /*************************TERMINO REGISTRO DIRECCION ********************/
        
        if(!empty($_REQUEST['nro_ruex'])){
            $empresa->setRuex($_REQUEST['nro_ruex']);
        }
        if($_REQUEST['ventas']=='0' or $_REQUEST['exportaciones']=='0') $categoria='1';
        if($_REQUEST['trabajadores']=='1' or $_REQUEST['activos']=='1' or $_REQUEST['ventas']=='1' or $_REQUEST['exportaciones']=='1')  $categoria='1';
        if($_REQUEST['trabajadores']=='2' or $_REQUEST['activos']=='2' or $_REQUEST['ventas']=='2' or $_REQUEST['exportaciones']=='2') $categoria='2'; 
        if($_REQUEST['trabajadores']=='3' or $_REQUEST['activos']=='3' or $_REQUEST['ventas']=='3' or $_REQUEST['exportaciones']=='3')  $categoria='3';
        if($_REQUEST['trabajadores']=='4' or $_REQUEST['activos']=='4' or $_REQUEST['ventas']=='4' or $_REQUEST['exportaciones']=='4') $categoria='4';

        $empresa->setDatos_categoria_empresa($_REQUEST['trabajadores'].','.$_REQUEST['activos'].','.$_REQUEST['ventas'].','.$_REQUEST['exportaciones']);
        $empresa->setIdCategoria_Empresa($categoria);
        $empresa->setOea($_REQUEST['oea']);
       
        $empresa->setIdActividad_Economica($_REQUEST['actividad']);

        $empresa->setEstado(0);
        $empresa->setFormato_imagen('jpg');

        $empresa->setPagina_Web($_REQUEST['paginaweb']);

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
        if(!empty($_REQUEST['nim'])){
            $empresa->setNim($_REQUEST['nim']);
        }
        if($_REQUEST['tipoempresa']==20) $empresa->setMenor_Cuantia('true');
        else $empresa->setMenor_Cuantia('false');  
        $empresa->setId_Usuario_Temporal($_SESSION["id_usuario"]);    
        if($_REQUEST['radioenf'])$empresa->setFrecuente(($_REQUEST['radioenf']=='1'?true:false));
        else $empresa->setFrecuente(false);
        $empresa->setCertificacionnit($_REQUEST['certificacionnit']);
        $empresa->setTituloco(($_REQUEST['titulocof']=='1'?true:false));
        //print('<pre>'.print_r($empresa,true).'</pre>');
        try{
            $sqlEmpresa->setGuardarEmpresa($empresa);

            $resultador = FuncionesGenerales::generarRepresentanteLegal($empresa,$_REQUEST['nombres'],$_REQUEST['apellidop'],$_REQUEST['apellidom'],$_REQUEST['tipodocumento'],$_REQUEST['customers'],$direccion2->getId_direccion(),'',$_REQUEST['idpais'],$_REQUEST['genero'],$_REQUEST['emailrp'],$_REQUEST['id_persona'],$_REQUEST['cargo'],$_REQUEST['dpto_exp']);            
            //-------------------------enviamos mail al representante legal---------------
             if($resultador)
            {
                $usuariorl = explode(",", $resultador);//id-usuario,clave,usuario
          
                //------------ se le envia un mail ala empresa diciendole tiene que llevar los siguientes documentos
                if($usuariorl[2]=='')// ers u usuario antiguo
                {
                    if(!AdmCorreo::enviarCorreo($usuariorl[0],$empresa->getId_empresa(),'','','',1)); // $swresultado='no envio correo representante legal';
                }
                else// es un usaurio nuevo
                {
                    if(!AdmCorreo::enviarCorreo($usuariorl[3],$_REQUEST['nombres'],$_REQUEST['razonsocial'],$usuariorl[2],$usuariorl[1],3));// $swresultado='no envio correo representante legal';
                }
                //$swresultado=$empresa->getId_empresa();
            }
            else
            {
                $swresultado='no creo representante legal';
                $logs->setDescripcion('Registro de direccion del Rep. legal');
                $logs->setMensaje($ex->getMessage());
                $logs->setObjeto(print_r($direccion2,true));
                $logs->setDate(Date('Y-m-d H:i:s'));
                $sqlLogs->Save($logs);
                $sqlEmpresa->delete($empresa);
                $sqlDireccion->delete($direccion2);
                $sqlDireccion->delete($direccion1);

                $resultado = '[{"id":"-1","descripcion":"'.$swresultado.'"}]';
                echo $resultado;
                exit();
            }
            //$empresa->setId_usuario_root($usuarioroot[0]);
            $empresa->setId_representante_legal($usuariorl[0]);
            $hoy = date("Y-m-d H:i:s");
            $empresa->setFecha_registro($hoy);
            try{
                $sqlEmpresa->setGuardarEmpresa($empresa);
               //------------------------esta parte es para guardar su OIC si es cafetalero
                if($_REQUEST['respico'])//preguntamos si es exportador de cafe
                {
                    $cafeICO = new CafeICO();
                    $sqlcafeICO = new SQLCafeICO();
                    $cafeICO->setId_empresa($empresa->getId_empresa());
                    if($_REQUEST['respico']=='si')//si tiene lo gruadamos
                    {
                        $cafeICO->setIco($_REQUEST['ico']);
                    }
                    else// si no tiene le asignamos
                    {
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
                if( ($empresa->getIdTipo_Empresa()>=1 && $empresa->getIdTipo_Empresa()<=7) || ($empresa->getIdTipo_Empresa()>=18 && $empresa->getIdTipo_Empresa()<=19) ){
                    $servicio->setId_servicio(60);
                }else{
                    $servicio->setId_servicio(59);
                }
//                $servicio->setId_servicio(1);
                $servicio = $sqlServicio->getBuscarServicioPorId($servicio);
                $costo_ruex = $servicio->getCosto();
                //-esto es para el sistema de colas epecificamente para asignar a algun asistente
                
                $serv_export = AdmSistemaColas::generarServicioExportadorParaRuex2($costo_ruex, $servicio->getId_servicio(), $empresa->getId_empresa());
                $id_asistente = AdmSistemaColas::generarColaParaRuex($serv_export);
                
                //------------actualizamos el estado del usuario
                
                $usuario_temp->setId_usuario_temporal($_SESSION["id_usuario"]);
                $usuario_temp = $sqlUsuario->getUsuarioTemporalPorId($usuario_temp);  
                if($usuario_temp)
                {
                    $usuario_temp->setEstado(2); 
                }
                $sqlUsuario->setGuardarUsuarioTemp($usuario_temp);     
                $_SESSION["estado_usuario_temp"] = $usuario_temp->getEstado();
                $_SESSION["email"]= $usuario_temp->getEmail();
                $swresultado=$empresa->getId_empresa();
                $resultado = '[{"id":"'.$swresultado.'","descripcion":"Registro Exitoso"}]';
                echo $resultado;
                exit();
            
            } catch (Exception $ex) {
                $logs->setDescripcion('ERROR: Registra: Registro de la empresa, paso 2, actualización');
                $logs->setMensaje($ex->getMessage());
                $logs->setObjeto(print_r($direccion2,true));
                $logs->setDate(Date('Y-m-d H:i:s'));
                $sqlLogs->Save($logs);
                $sqlDireccion->delete($direccion1);
                if($swPersona==false){ $sqlDireccion->delete($direccion2);}
                $sqlEmpresa->delete($empresa);
                $resultado = '[{"id":"'.$swresultado.'","descripcion":"'.$logs->getDescripcion().'"}]';
                echo $resultado;
                exit();
            }
        } catch (Exception $ex) {
            $logs->setDescripcion('ERROR: Registra: Registro de la Empresa');
            $logs->setMensaje($ex->getMessage());
            $logs->setObjeto(print_r($direccion2,true));
            $logs->setDate(Date('Y-m-d H:i:s'));
            $sqlLogs->Save($logs);
            $sqlDireccion->delete($direccion1);
            if($swPersona==false){ $sqlDireccion->delete($direccion2);}
            $resultado = '[{"id":"'.$swresultado.'","descripcion":"'.$logs->getDescripcion().'"}]';
            echo $resultado;
            exit();
        }
    }
    
    if($_REQUEST['tarea']=='registra_old'){
        $swresultado='0';
//        print('<pre>'.print_r($_REQUEST,true).'</pre>');
         //----------------------------guardamos los datos de la empresa
        $empresa->setRazon_Social($_REQUEST['razonsocial']);
        $empresa->setNombre_Comercial($_REQUEST['nombrecomercial']);
        $empresa->setNit($_REQUEST['nit']);
        $empresa->setMatricula_Fundempresa($_REQUEST['fundaempresa']);
        $empresa->setIdTipo_Empresa($_REQUEST['tipoempresa']);
        $empresa->setAfiliaciones($_REQUEST['afiliaciones']);
        $empresa->setDate_fundacion($_REQUEST['fundacion_empresa']);
        $empresa->setDate_inicio_operaciones($_REQUEST['inicio_empresa']);
        $empresa->setCoordenada_lat($_REQUEST['coordenadas_lat']);
        $empresa->setCoordenada_long($_REQUEST['coordenadas_lon']);
        $empresa->setDescripcion_empresa($_REQUEST['descripcion_empresa']);
        //$empresa->setMunicipio($_REQUEST['municipio']);
        //$empresa->setZona_barrio($_REQUEST['zona_barrio']);
        if(!empty($_REQUEST['nro_ruex'])){
           // $empresa->setNro_ruex($_REQUEST['nro_ruex']);
            $empresa->setRuex($_REQUEST['nro_ruex']);
        }

        /*$city=0;
        if($_REQUEST['ciudad']==0){
            $ciudad=new Ciudad();
            $sqlCiudad=new SQLCiudad();
            $ciudad->setId_municipio($_REQUEST['municipio']);
            $ciudad->setDescripcion($_REQUEST['new_ciudad']);
            $sqlCiudad->Save($ciudad);
            $city = $ciudad->getId_ciudad();
            
        }else{
            $city = $_REQUEST['ciudad'];
        }
        $empresa->setCiudad($city);*/
        
        if($_REQUEST['ventas']=='0' or $_REQUEST['exportaciones']=='0') $categoria='1';
        if($_REQUEST['trabajadores']=='1' or $_REQUEST['activos']=='1' or $_REQUEST['ventas']=='1' or $_REQUEST['exportaciones']=='1')  $categoria='1';
        if($_REQUEST['trabajadores']=='2' or $_REQUEST['activos']=='2' or $_REQUEST['ventas']=='2' or $_REQUEST['exportaciones']=='2') $categoria='2'; 
        if($_REQUEST['trabajadores']=='3' or $_REQUEST['activos']=='3' or $_REQUEST['ventas']=='3' or $_REQUEST['exportaciones']=='3')  $categoria='3';
        if($_REQUEST['trabajadores']=='4' or $_REQUEST['activos']=='4' or $_REQUEST['ventas']=='4' or $_REQUEST['exportaciones']=='4') $categoria='4';

        $empresa->setDatos_categoria_empresa($_REQUEST['trabajadores'].','.$_REQUEST['activos'].','.$_REQUEST['ventas'].','.$_REQUEST['exportaciones']);
        $empresa->setIdCategoria_Empresa($categoria);
        $empresa->setOea($_REQUEST['oea']);
       
        $empresa->setIdActividad_Economica($_REQUEST['actividad']);
        //$empresa->setIdDepartamento_Procedencia($_REQUEST['departamento']);
        //$empresa->setDireccion($_REQUEST['direccion']);
        $empresa->setEstado(0);
        $empresa->setFormato_imagen('jpg');
        //$empresa->setNumero_Contacto($_REQUEST['numero']);
        //if($_REQUEST['fax'])  $empresa->setFax($_REQUEST['fax']);
        $empresa->setPagina_Web($_REQUEST['paginaweb']);
        //$empresa->setEmail($_REQUEST['email']);
        //$empresa->setEmail_Secundario($_REQUEST['email2']);
        //if($_REQUEST['direccionfiscal']) $empresa->setDireccionfiscal($_REQUEST['direccionfiscal']);
        //$empresa->setNim($_REQUEST['nim']);
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
        if(!empty($_REQUEST['nim'])){
            $empresa->setNim($_REQUEST['nim']);
        }
        if($_REQUEST['tipoempresa']==20) $empresa->setMenor_Cuantia('true');
        else $empresa->setMenor_Cuantia('false');  
        $empresa->setId_Usuario_Temporal($_SESSION["id_usuario"]);    
        if($_REQUEST['radioenf'])$empresa->setFrecuente(($_REQUEST['radioenf']=='1'?true:false));
        else $empresa->setFrecuente(false);
        $empresa->setCertificacionnit($_REQUEST['certificacionnit']);
        $empresa->setTituloco(($_REQUEST['titulocof']=='1'?true:false));

        if($sqlEmpresa->setGuardarEmpresa($empresa))
        {
            
            
            //---------------------aqui vamos a crea el root de la empresa y su usuario root
             //Crear un usuario root             
            /*$resultado = FuncionesGenerales::generarUsuarioRoot($_REQUEST['nit']);
            $usuarioroot = explode(",", $resultado);//id-usuario,clave,usuario
            if($resultado)
            {
                //------------ se le envia un mail ala empresa diciendole tiene que llevar los siguientes documentos
                if(!AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['razonsocial'],$usuarioroot[2],$usuarioroot[1],'',4)); // $swresultado='no envio correo al root';

            }
            else $swresultado='no creo el usuario root';*/
            
             //creamos el usario representante legal
            
            $resultador = FuncionesGenerales::generarRepresentanteLegal($empresa,$_REQUEST['nombres'],$_REQUEST['apellidop'],$_REQUEST['apellidom'],$_REQUEST['tipodocumento'],$_REQUEST['customers'],$_REQUEST['numerocontacto'],$_REQUEST['numerocontacto2'],$_REQUEST['idpais'],$_REQUEST['genero'],$_REQUEST['emailrp'],$_REQUEST['id_persona'],$_REQUEST['cargo'],$_REQUEST['dpto_exp']);
            //-------------------------enviamos mail al representante legal---------------
            $usuariorl = explode(",", $resultador);//id-usuario,clave,usuario
          
            if($resultador)
            {
                
                //------------ se le envia un mail ala empresa diciendole tiene que llevar los siguientes documentos
                if($usuariorl[2]=='')// ers u usuario antiguo
                {
                    if(!AdmCorreo::enviarCorreo($usuariorl[0],$empresa->getId_empresa(),'','','',1)); // $swresultado='no envio correo representante legal';

                }
                else// es un usaurio nuevo
                {
                    if(!AdmCorreo::enviarCorreo($usuariorl[3],$_REQUEST['nombres'],$_REQUEST['razonsocial'],$usuariorl[2],$usuariorl[1],3));// $swresultado='no envio correo representante legal';
                }
                //$swresultado=$empresa->getId_empresa();
            }
            else   $swresultado='no creo representante legal';
            //$empresa->setId_usuario_root($usuarioroot[0]);
            $empresa->setId_representante_legal($usuariorl[0]);
            $hoy = date("Y-m-d H:i:s");
            $empresa->setFecha_registro($hoy);
            if($sqlEmpresa->setGuardarEmpresa($empresa))
            {
                
               //------------------------esta parte es para guardar su OIC si es cafetalero
                if($_REQUEST['respico'])//preguntamos si es exportador de cafe
                {
                    $cafeICO = new CafeICO();
                    $sqlcafeICO = new SQLCafeICO();
                    $cafeICO->setId_empresa($empresa->getId_empresa());
                    if($_REQUEST['respico']=='si')//si tiene lo gruadamos
                    {
                        $cafeICO->setIco($_REQUEST['ico']);
                    }
                    else// si no tiene le asignamos
                    {
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
                //-----creamos el servicio exportador-------------
                //aquitengo que sacar el costo segun el tipo de empresa que tenga
                /*if( $_REQUEST['tipoempresa']>=1 && $_REQUEST['tipoempresa']<=7 ){
                    $servicio->setId_servicio(60);
                }else{
                    $servicio->setId_servicio(59);
                }*/
                $servicio->setId_servicio(1);
                $servicio = $sqlServicio->getBuscarServicioPorId($servicio);
                $costo_ruex = $servicio->getCosto();
                //-esto es para el sistema de colas epecificamente para asignar a algun asistente
                
                $serv_export = AdmSistemaColas::generarServicioExportadorParaRuex($costo_ruex,$empresa->getId_empresa());
                $id_asistente = AdmSistemaColas::generarColaParaRuex($serv_export);
                
                //------------actualizamos el estado del usuario
                
                $usuario_temp->setId_usuario_temporal($_SESSION["id_usuario"]);
                $usuario_temp = $sqlUsuario->getUsuarioTemporalPorId($usuario_temp);  
                if($usuario_temp)
                {
                    $usuario_temp->setEstado(2); 
                }
                $sqlUsuario->setGuardarUsuarioTemp($usuario_temp);     
                $_SESSION["estado_usuario_temp"] = $usuario_temp->getEstado();
                $_SESSION["email"]= $usuario_temp->getEmail();
                
            }
            else
            {
                 $swresultado='no guardo la empresa';
            }

        }
        else
        {
            $swresultado='1';
        }     
        echo $swresultado;
        exit();
    }
    if($_POST['tarea']=='radio')
    {
        if($_POST['sw']=='1')
        {
            echo '<input type="text" class="k-textbox " id="testimonio" name="testimonio" placeholder="Testimonio de Constitución"  required validationMessage="Porfavor Ingrese su testimonio de constitución"/>';
        }
        else {
             echo ' <input type="text" class="k-textbox " id="norma" name="norma" placeholder="Norma de Creación de Empresa Publica" required validationMessage="Porfavor Ingrese su norma de creación"/> ';  
        }
        exit;
    }
    if($_REQUEST['tarea']=='registroCafe')
    {
        switch ($_REQUEST['sw']) {
            case 0: // para el caso de que escojan rubro de exportaciones cafe
                  echo '<div class="span5 fadein">Su empresa se dedica a la exportaci&oacute;n de cafe?</div><div class="span3 fadein">
                      <input type="radio" class="checked" name="respcafe" id="sicafe" value="si" onclick="siCafe()">Si
                      <input type="radio" class="checked" name="respcafe" id="nocafe" value="no" checked>No</div>';
                  break;
            case 1: /// para el caso de si cafe
                  echo '<div class="span5 fadein">Su empresa posee registro ICO?</div><div class="span3 fadein">
                      <input type="radio" class="checked" name="respico" id="siico" value="si" onclick="siIco()">Si
                      <input type="radio" class="checked" name="respico" id="noico" value="no" onclick="noIco()" checked>No</div>
                      <div class="span4 fadein" id="cajaico"></div>';
                  break;
            case 2: //cuando tiene ico y mostramo campo                  
                  echo '<input type="text" class="k-textbox "  placeholder="ICO"  name="ico" id="ico"  required validationMessage="Ingrese su ICO" />';
                  break;
         }
       exit;
    }
     if($_REQUEST['tarea']=='registroCafeEdicion')
    {
        echo '<div class="row-fluid"><div class="span4">*ICO:</div><div class="span8"><input type="text" class="k-textbox "  placeholder="ICO"  name="ico" id="ico"  required validationMessage="Ingrese su ICO" /></div></div>';
       exit;
    }
     if($_REQUEST['tarea']=='registroOEA')
    {
        echo '<input type="text" class="k-textbox "  placeholder="N&uacute;mero de registro OEA"  name="oea" id="oea"  required validationMessage="Ingrese su Registro OEA" />';
        exit;
    }
    if($_REQUEST['tarea']=='nim')
    {                
        echo '<input type="text" class="k-textbox "  placeholder="N&uacute;mero de Identificaci&oacute;n minera"  name="nim" id="nim"  required validationMessage="Ingrese su Nim" />';
        exit;
    }
    if($_REQUEST['tarea']=='nimEdicion')
    {             
        echo '<div class="span3 parametro">*Nim:</div><div class="span9"> <input type="text" class="k-textbox "  placeholder="N&uacute;mero de Identificaci&oacute;n minera"  name="nim" id="nim"  required validationMessage="Ingrese su Nim" /></div>';
                
        exit;
    }
    if($_REQUEST['tarea']=='fundaempresa')
    {                
        echo '<div class="span12" style="padding-bottom:10;"><input type="text" pattern="[1-9][0-9]{6,}"class="k-textbox "  placeholder="No. de Matricula FUNDEMPRESA" name="fundaempresa" id="fundaempresa" required validationMessage="Ingrese su matricula de FUNDEMPRESA"/></div>';
        exit;
    }
    if($_REQUEST['tarea']=='tipoempresadiv')
    {                
        echo '<div class="fadein" ><input style="width:100%;" id="tipoempresa" name="tipoempresa" required validationMessage="Escoja su tipo de Empresa"></div>';
        echo '&';
        echo '<div class="span10 fadein radio" >
                                    Es un exportador habitual?(Si su empresa emite facturas dosificadas de exportación por impuestos)</br>
                                    Si <input type="radio" name="radioenf" value="1" id="sioea" class="radio">
                                    No <input type="radio" name="radioenf" value="0" id="nooea" class="radio" checked>
                                </div>';
        exit;
    }
     if($_REQUEST['tarea']=='tipoempresadivedicion')
    {                               
        echo '<div class="span2 parametro fadein" >Tipo de Empresa:</div><div class="span2 fadein" ><input style="width:100%;" id="tipoempresa" name="tipoempresa" required validationMessage="Escoja su tipo de Empresa"></div>';
        echo '&&';       
        echo '<div class="span10 fadein" >
                Es un exportador habitual?(Si su empresa emite facturas dosificadas de exportaci&oacute;n por impuestos)</br>
                    Si <input type="radio" name="radioenf" value="1" id="sioea" class="radio" >
                    No <input type="radio" name="radioenf" value="0" id="nooea" class="radio" checked>
                </div> ';
        exit;
    }
    if($_REQUEST['tarea']=='fundaempresaEdicion')
    {    
        echo '<div class="span2 parametro fadein" >Fundempresa:</div><div class="span10 fadein">  ';
        echo '<input type="text" pattern="[1-9][0-9]{6,}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="k-textbox " placeholder="Matricula Fundempresa" name="fundaempresa" id="fundaempresa"   required validationMessage="Ingrese su Matricula de Fundempresa"/></div>';
        exit;
    }
    if($_REQUEST['tarea']=='fundaempresaEdicionParcial')
    {    
        echo '<div class="span2 parametro fadein" >*Fundaempresa:</div><div class="span10 fadein">  ';
        echo '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="k-textbox " placeholder="Matricula Fundaempresa" name="fundaempresa" id="fundaempresa"   required validationMessage="Ingrese su Matricula de Fundaempresa"/></div>';
        exit;
    }
    if($_REQUEST['tarea']=='listarMunicipios')
    {
        $municipio = new Municipio();
        $sqlMunicipio = new SQLMunicipio();
        $municipio->setId_departamento($_REQUEST['id_departamento']);
       
        $lista = $sqlMunicipio->getListarMunicipiosPorDepartamento($municipio);
        $selected = ',"selected":true';
        $strJson = '';
        echo '[';
        foreach ($lista as $datos){
            $strJson .= '{"id_municipio":"' . $datos->getId_municipio().
                    '","descripcion":"' . $datos->getDescripcion() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    if($_REQUEST['tarea']=='listarciudades')
    {
        $ciudad = new Ciudad();
        $sqlCiudad = new SQLCiudad();
        $ciudad->setId_municipio($_REQUEST['id_municipio']);
       
        $lista = $sqlCiudad->getListarCiudadesPorMunicipio($ciudad);
        $selected = ',"selected":true';
        $strJson = '';
        echo '[';
        $strJson.='{"id_ciudad":"0","descripcion":"NINGUNO"},';
        foreach ($lista as $datos){
            $strJson .= '{"id_ciudad":"' . $datos->getId_ciudad().
                    '","descripcion":"' . $datos->getDescripcion() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    if($_REQUEST['tarea']=='listarAfiliaciones')
    {
        $empresaAfiliacion = new EmpresaAfiliacion();
        $sqlEmpresaAfiliacion = new SQLEmpresaAfiliacion();
//       
        $lista = $sqlEmpresaAfiliacion->getListarAfiliacion($empresaAfiliacion);
//        print('<pre>'.print_r($lista,true).'</pre>');
        $selected = ',"selected":true';
        $strJson = '';
        echo '[';
        
        foreach ($lista as $datos){
            $strJson .= '{"id_empresa_afiliacion":"' . $datos->getId_empresa_afiliacion().
                    '","descripcion":"' . $datos->getDescripcion() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    if($_REQUEST['tarea']=='listarYear'){
        $selected = ',"selected":true';
        $strJson = '';
        echo '[';
        $i=1920;
        for ($index = 1920; $index <= date('Y'); $index++) {
            $strJson .= '{"year":"' . $index. '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    //-----------------------------------esto es para las parametricas del usuario tipo de documento,depratamento pais
        $pais = new Pais();
        $tipodocumentoidentidad =new TipoDocumentoIdentidad();
    
        $sqlPais =new SQLPais();
        $sqlTipodocumentoidentidad = new SQLTipoDocumentoIdentidad();
        
        $datostipodocumento=$sqlTipodocumentoidentidad->getListarTipoDocumentoIdentidad($tipodocumentoidentidad);
        $datospais=$sqlPais->getListarPaisSinNinguno($pais);

        $vista->assign('datostipodocumento', $datostipodocumento);
        $vista->assign('datospais', $datospais);        
    //------------esto verifica si el usuario ya a registrado su empresa o no
        if($_SESSION["estado_usuario_temp"]=='2')  
        {
            $empresa->setId_Usuario_Temporal($_SESSION['id_usuario']);
            $empresa=$sqlEmpresa->getEmpresaPorIdUsuarioTemp($empresa);
            $persona = new Persona();
            $sqlpersona =new SQLPersona();
            $persona->setId_persona($empresa->getId_representante_legal());
            $persona=$sqlpersona->getDatosPersonaPorId($persona);
            
            $vista->assign('estado_usuario_temp',$_SESSION["estado_usuario_temp"]);
            $vista->assign('email', $empresa->getEmail()); 
            $vista->assign('emailrp', $persona->getEmail());  
            $vista->display("empresaTemporal/AvisoEsperaEmpresaTemporal.tpl");
        }
        else
        {
            $vista->assign('datostipoempresa', $datostipoempresa);
            $vista->assign('datosactividadeconomica', $datosactividadeconomica);
            $vista->assign('datosdepartamento', $datosdepartamento);
            $vista->assign('datosrubro', $datosrubro);
            $vista->assign('rubros_exportaciones', $rubros_exportaciones);
           
            $vista->display("empresaTemporal/EmpresaTemporal.tpl");
        }
    }
}