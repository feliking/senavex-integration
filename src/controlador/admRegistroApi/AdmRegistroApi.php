<?php
/**
/* Registrar empresas api*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'CorrelativoRui.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'EmpresaImportador.php');
include_once(PATH_TABLA . DS . 'Usuario.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'Perfil.php');
include_once(PATH_TABLA . DS . 'TipoUsuario.php');
include_once(PATH_TABLA . DS . 'PerfilOpciones.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'TipoDocumentoIdentidad.php');
include_once(PATH_TABLA . DS . 'EmpresaAfiliacion.php');
include_once(PATH_TABLA . DS . 'Municipio.php');
include_once(PATH_TABLA . DS . 'Ciudad.php');
include_once(PATH_TABLA . DS . 'Direccion.php');
include_once(PATH_TABLA . DS . 'DireccionTipo.php');
include_once(PATH_TABLA . DS . 'DireccionTipoCalle.php');
include_once(PATH_TABLA . DS . 'DireccionTipoZona.php');
include_once(PATH_TABLA . DS . 'DireccionUbicacionEdificio.php');
include_once(PATH_TABLA . DS . 'Logs.php');
include_once(PATH_TABLA . DS . 'EmpresaImportadorObservacion.php');


include_once(PATH_MODELO . DS . 'SQLCorrelativorui.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaImportador.php');
include_once(PATH_MODELO . DS . 'SQLUsuario.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLPerfil.php');
include_once(PATH_MODELO . DS . 'SQLTipoUsuario.php');
include_once(PATH_MODELO . DS . 'SQLPerfilOpciones.php');
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
include_once(PATH_MODELO . DS . 'SQLEmpresaImportadorObservacion.php');


include_once( PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');
include_once( PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');
include_once( PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once( PATH_CONTROLADOR . DS . 'admPersona' . DS . 'AdmPersona.php');

class AdmRegistroApi extends Principal {

  public function AdmRegistroApi() {

    $vista = Principal::getVistaInstance();
    
    $persona = new Persona();
    $usuario = new Usuario();
    $empresa_persona = new EmpresaPersona();
    $perfil = new Perfil();
    $empresaImportador = new EmpresaImportador();
    $sqlPersona = new SQLPersona();
    $sqlUsuario = new SQLUsuario();
    $sqlEmpresaPersona = new SQLEmpresaPersona();
    $sqlEmpresaImportador = new SQLEmpresaImportador();
 
    $sqlPerfil = new SQLPerfil();

    if($_REQUEST['tarea']=='listado'){
        $empresaImportador=$sqlEmpresaImportador->getListar($empresaImportador);
        
    }

    if($_REQUEST['tarea']=='registro_api'){
        // 
        /******************REGISTRO DE DIRECCION DE LA EMPREA *****************/
        $empresaImportador = new EmpresaImportador();
        $sqlEmpresaImportador = new SQLEmpresaImportador();
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
        $empresaImportador->setId_direccion($direccion1->getId_direccion());

        /******************REGISTRO DEL REPRESENTANTE LEGAL *****************/
       
        $existePersona = AdmPersona::existePersonaId($_REQUEST['id_persona']);

        $direccion2 = new Direccion();
        $sqlDireccion = new SQLDireccion();
        $logs = new Logs();
        $sqlLogs = new SQLLogs();
        
        $persona = new Persona();
        $sqlPersona = new SQLPersona();
        $id_persona = '0';
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
            // $direccion2->setEmail($_REQUEST['emailrp']);
            $direccion2->setDireccion_descriptiva($_REQUEST['ed_dir_desc_2']);
            try{
                $sw_direccion2 = $sqlDireccion->save($direccion2);
            } catch (Exception $ex) {
                $logs->setDescripcion('Registro de direccion del Rep. legal');
                $logs->setMensaje($ex->getMessage());
                $logs->setObjeto(print_r($direccion2,true));
                $logs->setDate(Date('Y-m-d H:i:s'));
                $sqlLogs->Save($logs);
                if(!$sw_direccion2) $sqlDireccion->delete($direccion2);

                $resultado = '[{"id":"'.$swresultado.'","descripcion":"'.$logs->getDescripcion().'"}]';
                echo $resultado;
                exit();
            }
        }else{
            $direccion2->setId_direccion($existePersona->getDireccion());
            $id_persona = $existePersona->getId_persona();

        }

         if($id_persona=='0')
        {
            //es nuevo
            $persona->setNombres(mb_strtoupper($_REQUEST['nombres']));
            $persona->setPaterno(mb_strtoupper($_REQUEST['apellidop']));
            $persona->setMaterno(mb_strtoupper($_REQUEST['apellidom']));
            $persona->setId_tipo_documento($_REQUEST['tipodocumento']);
            $persona->setNumero_documento($_REQUEST['customers']);//este es el documento
            

            $direccions2 = ''.$direccion2->getId_direccion();
            $persona->setDireccion($direccions2);

           // if($numerocontacto!=''){$persona->setNumero_contacto($numerocontacto);}
           // if($numerocontacto2!=''){$persona->setNumero_contacto2($numerocontacto2);}
            $persona->setId_departamento($_REQUEST['ed_dpto_2']);
            $persona->setEmail($_REQUEST['emailrp']);
            $persona->setId_pais_origen($_REQUEST['idpais']);
            $persona->setExpedido($_REQUEST['dpto_exp']);
            $persona->setFecha_creacion(Date('Y-m-d H:i:s'));
            $persona->setEstado(true);//para el estado activo
            $persona->setId_usuario_creacion($_SESSION['id_usuario']);

            $partes = explode('/', $_REQUEST['f_ci_rl']);
            $f_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
            $persona->setVencimiento_documento($f_fecha);
            if($_REQUEST['genero']==1) $persona->setGenero(true);
            else $persona->setGenero(false);

            $sqlPersona->setGuardarPersona($persona);  
            
            try{
                 $sqlPersona->setGuardarPersona($persona);
            } catch (Exception $ex) {
                $logs->setDescripcion('ERROR: generarRepresentanteLegal: creacion de la PERSONA');
                $logs->setId_servicio(0);
                $logs->setMensaje($ex->getMessage());
                $logs->setObjeto(print_r($persona,true));
                $logs->setDate(Date('Y-m-d H:i:s'));
                $sqlLogs->Save($logs);
                return null;
            } 
         
        }
        else
        {
            //es antiguo

            $persona->setId_persona($id_persona);
            // $persona->setVencimiento_documento($_REQUEST['f_ci_rl']);
            $persona = $sqlPersona->getDatosPersonaPorId($persona);

            $partes = explode('/', $_REQUEST['f_ci_rl']);
            $f_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
            $persona->setVencimiento_documento($f_fecha);
            $sqlPersona->setGuardarPersona($persona); 
        }

        $empresaImportador->setId_representante_legal($persona->getId_persona());
        if($_REQUEST['poder']!='') $empresaImportador->setTestimonio_poder_representante($_REQUEST['poder']);


/******************REGISTRO DEL APODERADO *****************/
        
    if($_REQUEST['customersApoderado']){ 

        $existePersona = AdmPersona::existePersonaId($_REQUEST['id_apoderado']);

        $direccion2 = new Direccion();
        $sqlDireccion = new SQLDireccion();
        $logs = new Logs();
        $sqlLogs = new SQLLogs();
        
        $persona = new Persona();
        $sqlPersona = new SQLPersona();
        $id_persona = '0';
        $swPersona = true;
        
        if($existePersona->getId_persona()==0){
        
            $swPersona=false;
            $direccion2->setId_direccion_tipo(3);
            $direccion2->setId_direccion_tipo_calle($_REQUEST['ed_tc_3']);
            $direccion2->setNombre_direccion_tipo_calle($_REQUEST['ed_ntc_3']);        
            if($_REQUEST['ed_numero_domicilio_3']!='') $direccion2->setNumero_domicilio($_REQUEST['ed_numero_domicilio_3']);
            if($_REQUEST['ed_nombre_edificio_3']!='') $direccion2->setNombre_edificio($_REQUEST['ed_nombre_edificio_3']);
            if($_REQUEST['ed_piso_3']!='') $direccion2->setPiso($_REQUEST['ed_piso_3']);
            if($_REQUEST['ed_td_3']!='-1' && $_REQUEST['ed_td_3']!='')$direccion2->setId_direccion_tipo_ubicacion_edificio($_REQUEST['ed_td_3']);
            $direccion2->setNumero_dpto_oficina($_REQUEST['ed_ntd_3']);
            $direccion2->setId_direccion_tipo_zona($_REQUEST['ed_tz_3']);
            $direccion2->setNombre_zona_barrio($_REQUEST['ed_ntz_3']);
            $direccion2->setId_departamento($_REQUEST['ed_dpto_3']);
            $direccion2->setId_municipio($_REQUEST['ed_municipio_3']);
            if($_REQUEST['ed_tfijo_3']!='') $direccion2->setTelefono_fijo($_REQUEST['ed_tfijo_3']);
            if($_REQUEST['ed_tcel_3']!='') $direccion2->setTelefono_celular($_REQUEST['ed_tcel_3']);
            if($_REQUEST['ed_tfax_3']!='') $direccion2->setTelefono_fax($_REQUEST['ed_tfax_3']);

            // $direccion2->setEmail($_REQUEST['emailrp']);
            $direccion2->setDireccion_descriptiva($_REQUEST['ed_dir_desc_3']);
            try{
                $sw_direccion2 = $sqlDireccion->save($direccion2);
            } catch (Exception $ex) {
                $logs->setDescripcion('Registro de direccion del Apoderado');
                $logs->setMensaje($ex->getMessage());
                $logs->setObjeto(print_r($direccion3,true));
                $logs->setDate(Date('Y-m-d H:i:s'));
                $sqlLogs->Save($logs);
                if(!$sw_direccion2) $sqlDireccion->delete($direccion2);

                $resultado = '[{"id":"'.$swresultado.'","descripcion":"'.$logs->getDescripcion().'"}]';
                echo $resultado;
                exit();
            }
        }else{
            $direccion2->setId_direccion($existePersona->getDireccion());
            $id_persona = $existePersona->getId_persona();
        }

         if($id_persona=='0')
        {
            //es nuevo
            $persona->setNombres(mb_strtoupper($_REQUEST['nombresApoderado']));
            $persona->setPaterno(mb_strtoupper($_REQUEST['apellidopApoderado']));
            $persona->setMaterno(mb_strtoupper($_REQUEST['apellidomApoderado']));
            $persona->setId_tipo_documento($_REQUEST['tipodocumentoApoderado']);
            $persona->setNumero_documento($_REQUEST['customersApoderado']);//este es el documento
            

            $direccions2 = ''.$direccion2->getId_direccion();
            $persona->setDireccion($direccions2);

           // if($numerocontacto!=''){$persona->setNumero_contacto($numerocontacto);}
           // if($numerocontacto2!=''){$persona->setNumero_contacto2($numerocontacto2);}
            $persona->setId_departamento($_REQUEST['ed_dpto_3']);
            $persona->setEmail($_REQUEST['emailrpApoderado']);
            $persona->setId_pais_origen($_REQUEST['idpaisApoderado']);
            $persona->setExpedido($_REQUEST['dpto_expApoderado']);
            $persona->setFecha_creacion(Date('Y-m-d H:i:s'));
            $persona->setEstado(true);//para el estado activo
            $persona->setId_usuario_creacion($_SESSION['id_usuario']);

            $partes = explode('/', $_REQUEST['f_ci_ap']);
            $f_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
            $persona->setVencimiento_documento($f_fecha);
            
            if($_REQUEST['generoApoderado']==1) $persona->setGenero(true);
            else $persona->setGenero(false);

            $sqlPersona->setGuardarPersona($persona); 
            try{
                 $sqlPersona->setGuardarPersona($persona);
            } catch (Exception $ex) {
                $logs->setDescripcion('ERROR: generarApoderado: creacion de la PERSONA');
                $logs->setId_servicio(0);
                $logs->setMensaje($ex->getMessage());
                $logs->setObjeto(print_r($persona,true));
                $logs->setDate(Date('Y-m-d H:i:s'));
                $sqlLogs->Save($logs);
                return null;
            } 
         
        }
        else
        {
            //es antiguo

            $persona->setId_persona($id_persona);
            // $persona->setVencimiento_documento($_REQUEST['f_ci_rl']);
            $persona = $sqlPersona->getDatosPersonaPorId($persona);

            $partes = explode('/', $_REQUEST['f_ci_ap']);
            $f_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
            $persona->setVencimiento_documento($f_fecha);

            $sqlPersona->setGuardarPersona($persona);
        }

        if($_REQUEST['f_tes_fin']!=''){
                $partes = explode('/', $_REQUEST['f_tes_fin']);
                $f_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
                $empresaImportador->setVencimiento_poder_apoderado($f_fecha);
        }

         $empresaImportador->setId_apoderado($persona->getId_persona());
        if($_REQUEST['poderApoderado']!='') $empresaImportador->setTestimonio_poder_apoderado($_REQUEST['poderApoderado']);

        
    }
//TODO FECHA DE VIGENCIA

        /******************REGISTRO DE DIRECCION DE LA EMPREA *****************/

        
        $empresaImportador->setPadron_importador(str_replace('"', "''", $_REQUEST['padronimportador']));
        $empresaImportador->setRazon_social(str_replace('"', "''", $_REQUEST['razonsocial']));
        $empresaImportador->setNit($_REQUEST['nit']);
        if($_REQUEST['testimonioconstitucion']!='') $empresaImportador->setTestimonio_constitucion($_REQUEST['testimonioconstitucion']);
        if($_REQUEST['patentemunicipal']!='') $empresaImportador->setPatente_municipal($_REQUEST['patentemunicipal']);
        $empresaImportador->setMatricula_fundempresa($_REQUEST['fundempresa']);
        $partes = explode('/', $_REQUEST['f_fundempresa']);
        $f_fecha = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
        $empresaImportador->setVencimiento_fundempresa($f_fecha);
        $empresaImportador->setUnipersonal($_REQUEST['empresaunipersonal']);
        $empresaImportador->setNacionalidad($_REQUEST['empresanacionalidad']);
        $empresaImportador->setEstado(1);
        $empresaImportador->setFecha_registro(Date('Y-m-d'));
        $empresaImportador_sw = $sqlEmpresaImportador->save($empresaImportador);

        echo $empresaImportador->getId_empresa_importador();
        exit;
    }

    if($_REQUEST['tarea']=='revisionApi'){
            $vista->display("admEmpresaApi/ColaApiRegistradas.tpl"); 
            exit;
    }

    if($_REQUEST['tarea']=='VerificarNIT'){
            $empresaImportador = new EmpresaImportador();
            $sqlEmpresaImportador = new SQLEmpresaImportador();
            $empresaImportador->setNit($_REQUEST['nit']);
            $empresaImportador = $sqlEmpresaImportador->getEmpresaPorNIT($empresaImportador);
            if($empresaImportador){
                echo '[{"suceso":"1","msg":"Ya existe Empresa Importadora con ese NIT, por favor consulte en nuestras oficinas. Gracias!"}]';
            }else{
                echo '[{"suceso":"0","msg":"No Existe Empresa registrada con ese NIT."}]';
            }
            exit;
           // print('<pre>'.print_r($_REQUEST,true).'</pre>');
        }

    if($_REQUEST['tarea']=='ListarEmpresasApiPorEstado'){
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
            $empresaImportador1 = new EmpresaImportador();
            $admisiones = new EmpresaImportador();
            $sqlEmpresaImportador1 = new SQLEmpresaImportador();
            $admisiones=$sqlEmpresaImportador1->getListarEmpresasApiPorFechaDescendenteEstados($empresaImportador1, $tipo);
            foreach ($admisiones as $admision){ 
                $razon_social = str_replace('"','\"',$admision->getRazon_social());
                $strJson .='{"id_empresa":"'.$admision->getId_empresa_importador().
                    '","razonsocial":"' . (strlen($admision->getRazon_social())>30 ? (substr($razon_social,0,25).' ...'): $razon_social) .
                    '","nit" : "'.$admision->getNit().
                    '","padron":"' .$admision->getPadron_importador().
                    '","estado":"' .$admision->getEstado().
                    '"},';
                }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo '['.$strJson.']';
            exit;
        }
    if($_REQUEST['tarea']=='asignacionrui'){
        //Datos de la empresa
        $hoy = date('Y-m-d H:i:s');
        $empresaImportador = new EmpresaImportador();
        $sqlEmpresaImportador = new SQLEmpresaImportador();
        $id_empresaImportador=$_REQUEST['id_empresa'];
        $empresaImportador->setId_empresa_importador((isset($_REQUEST['id_empresa'])?$_REQUEST['id_empresa']:$_SESSION['id_empresa']));
        $empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
        $sqldireccion= new SQLDireccion();
        $sqlmunicipio= new SQLMunicipio();
        $sqldepartamento = new SQLDepartamento();
        $sqltipozona = new SQLDireccionTipoZona();
        $sqltipocalle = new SQLDireccionTipoCalle();
        $sqlDireccionUbicacionEdificio = new SQLDireccionUbicacionEdificio();
        $sqlPersona= new SQLPersona();
        $sqlPais= new SQLPais();
        $sqlTipodoc= new SQLTipoDocumentoIdentidad();
        $direccion= new Direccion();
        $direccion = new Direccion();
        $direccion->setId_direccion($empresaImportador->getId_direccion());
        $direccion = $sqldireccion->getDireccionByID($direccion);
        $municipio= new Municipio();
        $municipio->setId_municipio($direccion->getId_municipio());
        $municipio = $sqlmunicipio->getMunicipioPorID($municipio);
        $departamento = new Departamento();
        $departamento->setId_departamento($direccion->getId_departamento());
        $departamento = $sqldepartamento->getBuscarDepartamentoPorId($departamento);
        $tipozona= new DireccionTipoZona();
        $tipozona->setId_direccion_tipo_zona($direccion->getId_direccion_tipo_zona());
        $tipozona = $sqltipozona->getDireccionTipoZonaByID($tipozona);
        $tipocalle= new DireccionTipoCalle();
        $tipocalle->setId_direccion_tipo_calle($direccion->getId_direccion_tipo_calle());
        $tipocalle = $sqltipocalle->getDireccionTipoCalleByID($tipocalle);
        if($direccion->getId_direccion_tipo_ubicacion_edificio()!=null){
            $direccionUbicacionEdificio = new DireccionUbicacionEdificio();
            $direccionUbicacionEdificio->setId_direccion_ubicacion_edificio($direccion->getId_direccion_tipo_ubicacion_edificio());
            $direccionUbicacionEdificio = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificio);
            $direccionUbicacionEdificion=$direccionUbicacionEdificio->getDescripcion();
        }
        else{
            $direccionUbicacionEdificion='';
        }
        //aca verificamos si es una persona o es un representante legal
        $rrll = new Persona();
        $tipodocr= new TipoDocumentoIdentidad();
        $expedidor = new Departamento();
        $direccionr = new Direccion();
        $municipior= new Municipio();
        $departamentor = new Departamento();
        $tipozonar= new DireccionTipoZona();
        $tipocaller= new DireccionTipoCalle();
        $direccionUbicacionEdificior = new DireccionUbicacionEdificio();
        $paisr = new Pais();
        $direccionUbicacionEdificionr='';
        $rrll->setId_persona($empresaImportador->getId_representante_legal());
        $rrll=$sqlPersona->getDatosPersonaPorId($rrll);
        $tipodocr->setId_tipo_documentoidentidad($rrll->getId_tipo_documento());
        $tipodocr = $sqlTipodoc->getBuscarDescripcionPorId($tipodocr);
        $expedidor->setId_departamento($rrll->getExpedido());
        $expedidor = $sqldepartamento->getBuscarDepartamentoPorId($expedidor);
        if ((!is_numeric($rrll->getDireccion())) ) { }
        else{
            $direccionr->setId_direccion($rrll->getDireccion());
            $direccionr = $sqldireccion->getDireccionByID($direccionr);    
            $municipior->setId_municipio($direccionr->getId_municipio());
            $municipior = $sqlmunicipio->getMunicipioPorID($municipior);   
            $departamentor->setId_departamento($direccionr->getId_departamento());
            $departamentor = $sqldepartamento->getBuscarDepartamentoPorId($departamentor);
            $tipozonar->setId_direccion_tipo_zona($direccionr->getId_direccion_tipo_zona());
            $tipozonar = $sqltipozona->getDireccionTipoZonaByID($tipozonar);   
            $tipocaller->setId_direccion_tipo_calle($direccionr->getId_direccion_tipo_calle());
            $tipocaller = $sqltipocalle->getDireccionTipoCalleByID($tipocaller);
            $direccionUbicacionEdificionr='';
            if($direccionr->getId_direccion_tipo_ubicacion_edificio()!=''){
                $direccionUbicacionEdificior->setId_direccion_ubicacion_edificio($direccionr->getId_direccion_tipo_ubicacion_edificio());
                $direccionUbicacionEdificior = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificior);
                $direccionUbicacionEdificionr=$direccionUbicacionEdificior->getDescripcion();
            }
            else{
                $direccionUbicacionEdificionr='';
            }
        }
        $paisr->setId_pais($rrll->getId_pais_origen());
        $paisr = $sqlPais->getBuscarDescripcionPorId($paisr);
        // datos del apoderado
        $apoderado = new Persona();
        $expedidoa = new Departamento();
        $tipodoca= new TipoDocumentoIdentidad();
        $expedidoa = new Departamento();
        $direcciona = new Direccion();
        $municipioa= new Municipio();
        $departamentoa = new Departamento();
        $tipozonaa= new DireccionTipoZona();
        $tipocallea= new DireccionTipoCalle();
        $direccionUbicacionEdificiona ='';
        $paisa = new Pais();
        $direccionUbicacionEdificioa = new DireccionUbicacionEdificio();
        if($empresaImportador->getId_apoderado()!=''){
        $apoderado->setId_persona($empresaImportador->getId_apoderado());
        $apoderado=$sqlPersona->getDatosPersonaPorId($apoderado);
        $tipodoca->setId_tipo_documentoidentidad($apoderado->getId_tipo_documento());
        $tipodoca = $sqlTipodoc->getBuscarDescripcionPorId($tipodocr);
        $expedidoa->setId_departamento($apoderado->getExpedido());
        $expedidoa = $sqldepartamento->getBuscarDepartamentoPorId($expedidoa);
        if (!is_numeric($apoderado->getDireccion())) { }
        else{
            $direcciona->setId_direccion($apoderado->getDireccion());
            $direcciona = $sqldireccion->getDireccionByID($direcciona);
            $municipioa->setId_municipio($direcciona->getId_municipio());
            $municipioa = $sqlmunicipio->getMunicipioPorID($municipioa);
            $departamentoa->setId_departamento($direcciona->getId_departamento());
            $departamentoa = $sqldepartamento->getBuscarDepartamentoPorId($departamentoa);
            $tipozonaa->setId_direccion_tipo_zona($direcciona->getId_direccion_tipo_zona());
            $tipozonaa = $sqltipozona->getDireccionTipoZonaByID($tipozonaa);
            $tipocallea->setId_direccion_tipo_calle($direcciona->getId_direccion_tipo_calle());
            $tipocallea = $sqltipocalle->getDireccionTipoCalleByID($tipocallea);
            if($direcciona->getId_direccion_tipo_ubicacion_edificio()!=''){
            $direccionUbicacionEdificioa->setId_direccion_ubicacion_edificio($direcciona->getId_direccion_tipo_ubicacion_edificio());
            $direccionUbicacionEdificioa = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificioa);
            $direccionUbicacionEdificiona=$direccionUbicacionEdificioa->getDescripcion();
            }else{
            $direccionUbicacionEdificiona='';
            }
        }    
        $paisa->setId_pais($apoderado->getId_pais_origen());
        $paisa = $sqlPais->getBuscarDescripcionPorId($paisa);
        }

        $vista->assign("generor",$generor);
        $vista->assign("generoa",$generoa);
        $vista->assign("unipersonal",$unipersonal);
        $vista->assign("expedidor",$expedidor);
        $vista->assign("expedidoa",$expedidoa);
        $vista->assign("tipodocr",$tipodocr);
        $vista->assign("tipodoca",$tipodoca);
        $vista->assign("paisr",$paisr);
        $vista->assign("paisa",$paisa);
        $vista->assign("direccionRevision",$direccionRevision);
        $vista->assign('empresaRevision', $empresaImportador);
        $vista->assign('empresaRRLL', $rrll);
        $vista->assign("direccionRRLL",$direccionRRLL);
        $vista->assign('empresaApoderado', $apoderado);
        $vista->display("admEmpresaApi/AsignacionRui.tpl"); 
        exit;
        }
    if($_REQUEST['tarea']=='mostrarrui'){
            $hoy = date('Y-m-d H:i:s');
            $empresaImportador1 = new EmpresaImportador();
            $sqlEmpresaImportador1 = new SQLEmpresaImportador();
            if($_REQUEST["id_empresa"]){
            $empresaImportador1->setId_empresa_importador($_REQUEST["id_empresa"]);}
            else{
            $empresaImportador1->setId_empresa_importador($_SESSION["id_empresa"]);}    
        $hoy = date('Y-m-d H:i:s');
        $empresaImportador = new EmpresaImportador();
        $sqlEmpresaImportador = new SQLEmpresaImportador();
        $id_empresaImportador=$_REQUEST['id_empresa'];
        $empresaImportador->setId_empresa_importador((isset($_REQUEST['id_empresa'])?$_REQUEST['id_empresa']:$_SESSION['id_empresa']));
        $empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
        $sqldireccion= new SQLDireccion();
        $sqlmunicipio= new SQLMunicipio();
        $sqldepartamento = new SQLDepartamento();
        $sqltipozona = new SQLDireccionTipoZona();
        $sqltipocalle = new SQLDireccionTipoCalle();
        $sqlDireccionUbicacionEdificio = new SQLDireccionUbicacionEdificio();
        $sqlPersona= new SQLPersona();
        $sqlPais= new SQLPais();
        $sqlTipodoc= new SQLTipoDocumentoIdentidad();
        $direccion= new Direccion();
        $direccion = new Direccion();
        $direccion->setId_direccion($empresaImportador->getId_direccion());
        $direccion = $sqldireccion->getDireccionByID($direccion);
        $municipio= new Municipio();
        $municipio->setId_municipio($direccion->getId_municipio());
        $municipio = $sqlmunicipio->getMunicipioPorID($municipio);
        $departamento = new Departamento();
        $departamento->setId_departamento($direccion->getId_departamento());
        $departamento = $sqldepartamento->getBuscarDepartamentoPorId($departamento);
        $tipozona= new DireccionTipoZona();
        $tipozona->setId_direccion_tipo_zona($direccion->getId_direccion_tipo_zona());
        $tipozona = $sqltipozona->getDireccionTipoZonaByID($tipozona);
        $tipocalle= new DireccionTipoCalle();
        $tipocalle->setId_direccion_tipo_calle($direccion->getId_direccion_tipo_calle());
        $tipocalle = $sqltipocalle->getDireccionTipoCalleByID($tipocalle);
        if($direccion->getId_direccion_tipo_ubicacion_edificio()!=null){
            $direccionUbicacionEdificio = new DireccionUbicacionEdificio();
            $direccionUbicacionEdificio->setId_direccion_ubicacion_edificio($direccion->getId_direccion_tipo_ubicacion_edificio());
            $direccionUbicacionEdificio = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificio);
            $direccionUbicacionEdificion=$direccionUbicacionEdificio->getDescripcion();
        }
        else{
            $direccionUbicacionEdificion='';
        }
        //aca verificamos si es una persona o es un representante legal
        $rrll = new Persona();
        $tipodocr= new TipoDocumentoIdentidad();
        $expedidor = new Departamento();
        $direccionr = new Direccion();
        $municipior= new Municipio();
        $departamentor = new Departamento();
        $tipozonar= new DireccionTipoZona();
        $tipocaller= new DireccionTipoCalle();
        $direccionUbicacionEdificior = new DireccionUbicacionEdificio();
        $paisr = new Pais();
        $direccionUbicacionEdificionr='';
        $rrll->setId_persona($empresaImportador->getId_representante_legal());
        $rrll=$sqlPersona->getDatosPersonaPorId($rrll);
        $tipodocr->setId_tipo_documentoidentidad($rrll->getId_tipo_documento());
        $tipodocr = $sqlTipodoc->getBuscarDescripcionPorId($tipodocr);
        $expedidor->setId_departamento($rrll->getExpedido());
        $expedidor = $sqldepartamento->getBuscarDepartamentoPorId($expedidor);
        if ((!is_numeric($rrll->getDireccion())) ) { }
        else{
            $direccionr->setId_direccion($rrll->getDireccion());
            $direccionr = $sqldireccion->getDireccionByID($direccionr);    
            $municipior->setId_municipio($direccionr->getId_municipio());
            $municipior = $sqlmunicipio->getMunicipioPorID($municipior);   
            $departamentor->setId_departamento($direccionr->getId_departamento());
            $departamentor = $sqldepartamento->getBuscarDepartamentoPorId($departamentor);
            $tipozonar->setId_direccion_tipo_zona($direccionr->getId_direccion_tipo_zona());
            $tipozonar = $sqltipozona->getDireccionTipoZonaByID($tipozonar);   
            $tipocaller->setId_direccion_tipo_calle($direccionr->getId_direccion_tipo_calle());
            $tipocaller = $sqltipocalle->getDireccionTipoCalleByID($tipocaller);
            $direccionUbicacionEdificionr='';
            if($direccionr->getId_direccion_tipo_ubicacion_edificio()!=''){
                $direccionUbicacionEdificior->setId_direccion_ubicacion_edificio($direccionr->getId_direccion_tipo_ubicacion_edificio());
                $direccionUbicacionEdificior = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificior);
                $direccionUbicacionEdificionr=$direccionUbicacionEdificior->getDescripcion();
            }
            else{
                $direccionUbicacionEdificionr='';
            }
        }
        $paisr->setId_pais($rrll->getId_pais_origen());
        $paisr = $sqlPais->getBuscarDescripcionPorId($paisr);
        // datos del apoderado
        $apoderado = new Persona();
        $expedidoa = new Departamento();
        $tipodoca= new TipoDocumentoIdentidad();
        $expedidoa = new Departamento();
        $direcciona = new Direccion();
        $municipioa= new Municipio();
        $departamentoa = new Departamento();
        $tipozonaa= new DireccionTipoZona();
        $tipocallea= new DireccionTipoCalle();
        $direccionUbicacionEdificiona ='';
        $paisa = new Pais();
        $direccionUbicacionEdificioa = new DireccionUbicacionEdificio();
        if($empresaImportador->getId_apoderado()!=''){
        $apoderado->setId_persona($empresaImportador->getId_apoderado());
        $apoderado=$sqlPersona->getDatosPersonaPorId($apoderado);
        $tipodoca->setId_tipo_documentoidentidad($apoderado->getId_tipo_documento());
        $tipodoca = $sqlTipodoc->getBuscarDescripcionPorId($tipodocr);
        $expedidoa->setId_departamento($apoderado->getExpedido());
        $expedidoa = $sqldepartamento->getBuscarDepartamentoPorId($expedidoa);
        if (!is_numeric($apoderado->getDireccion())) { }
        else{
            $direcciona->setId_direccion($apoderado->getDireccion());
            $direcciona = $sqldireccion->getDireccionByID($direcciona);
            $municipioa->setId_municipio($direcciona->getId_municipio());
            $municipioa = $sqlmunicipio->getMunicipioPorID($municipioa);
            $departamentoa->setId_departamento($direcciona->getId_departamento());
            $departamentoa = $sqldepartamento->getBuscarDepartamentoPorId($departamentoa);
            $tipozonaa->setId_direccion_tipo_zona($direcciona->getId_direccion_tipo_zona());
            $tipozonaa = $sqltipozona->getDireccionTipoZonaByID($tipozonaa);
            $tipocallea->setId_direccion_tipo_calle($direcciona->getId_direccion_tipo_calle());
            $tipocallea = $sqltipocalle->getDireccionTipoCalleByID($tipocallea);
            if($direcciona->getId_direccion_tipo_ubicacion_edificio()!=''){
            $direccionUbicacionEdificioa->setId_direccion_ubicacion_edificio($direcciona->getId_direccion_tipo_ubicacion_edificio());
            $direccionUbicacionEdificioa = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificioa);
            $direccionUbicacionEdificiona=$direccionUbicacionEdificioa->getDescripcion();
            }else{
            $direccionUbicacionEdificiona='';
            }
        }    
        $paisa->setId_pais($apoderado->getId_pais_origen());
        $paisa = $sqlPais->getBuscarDescripcionPorId($paisa);
        }

        $vista->assign("generor",$generor);
        $vista->assign("generoa",$generoa);
        $vista->assign("unipersonal",$unipersonal);
        $vista->assign("expedidor",$expedidor);
        $vista->assign("expedidoa",$expedidoa);
        $vista->assign("tipodocr",$tipodocr);
        $vista->assign("tipodoca",$tipodoca);
        $vista->assign("paisr",$paisr);
        $vista->assign("paisa",$paisa);
        $vista->assign("direccionRevision",$direccionRevision);
        $vista->assign('empresaRevision', $empresaImportador);
        $vista->assign('empresaRRLL', $rrll);
        $vista->assign("direccionRRLL",$direccionRRLL);
        $vista->assign('empresaApoderado', $apoderado);
        $vista->display("admEmpresaApi/MostrarRui.tpl"); 
        exit;
    }
//METODO PARA LA CREACION DE USUARIOS
    if($_REQUEST['tarea']=='crea_usuario'){

        $hoy = date("Y-m-d h:m:s"); 
        $empresaImportador = new EmpresaImportador();
        $sqlEmpresaImportador = new SQLEmpresaImportador();

        $empresaImportador->setId_empresa_importador($_REQUEST['id_empresa_importador']);
        $empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);

        $empresa_persona->setActivo(0);

            $campousuario=$empresaImportador->getNit().'-IMP';
            //-guardamos el usuario
            
            $usuario->setUsuario($campousuario);
            $usuario->setClave(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8));
            //$usuario->setClave('123456');
            $usuario->setFecha_creacion($hoy);
            $usuario->setId_persona($empresaImportador->getId_representante_legal());
            $usuario->setActivo(1);
            $usuario->setId_tipo_usuario(2);
            try{
                $sqlUsuario->setGuardarUsuario($usuario);
            } catch (Exception $ex) {
                $logs->setDescripcion('ERROR: generarRepresentanteLegal: creacion del USUARIO');
                $logs->setId_servicio(0);
                $logs->setMensaje($ex->getMessage());
                $logs->setObjeto(print_r($usuario,true));
                $logs->setDate(Date('Y-m-d H:i:s'));
                $sqlLogs->Save($logs);
                $sqlPersona->delete($persona);
                return null;
            }

        $perfil = new Perfil();
        $sqlPerfil = new SQLPerfil();
        $perfil->setId_perfil(3);
        $perfil=$sqlPerfil->getBuscarDescripcionPorId($perfil);
        $perfil->getOpciones();

        $empresa_persona = new EmpresaPersona();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        $empresa_persona->setId_Persona($empresaImportador->getId_representante_legal());
        $empresa_persona->setId_Empresa($empresaImportador->getId_empresa_importador());
        $empresa_persona->setId_Perfil(23);
        $empresa_persona->setFecha_Vinculacion($hoy);
        $empresa_persona->setOpciones_persona($perfil->getOpciones());
        $empresa_persona->setActivo(1);
        $empresa_persona->setCargo('REPRESENTANTE LEGAL');
        try{
            $sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona);
            return $persona->getId_persona().','.$usuario->getClave().','.$campousuario.','.$persona->getEmail();
        } catch (Exception $ex) {
            $logs->setDescripcion('ERROR: generarRepresentanteLegal: registo EMPRESA - PERSONA');
            $logs->setId_servicio(0);
            $logs->setMensaje($ex->getMessage());
            $logs->setObjeto(print_r($empresa_persona,true));
            $logs->setDate(Date('Y-m-d H:i:s'));
            $sqlLogs->Save($logs);
            $sqlPersona->delete($persona);
            $sqlUsuario->delete($usuario);
        }
        return null;

        exit;
    }
    if($_REQUEST['tarea']=='eliminar'){
        $hoy = date("Y-m-d h:m:s"); 
        $empresa_persona->setId_Empresa_Persona($_REQUEST['id_empresa_persona']);
        $empresa_persona=$sqlEmpresaPersona->getEmpresaPersonaPorID($empresa_persona);
        $empresa_persona->setFecha_Baja($hoy);
        $empresa_persona->setActivo(0);
        if($sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona)){
            //-----------------aqui tengo que reparte las colas solo een el cazo del senavex--------------------------------
              if($_SESSION["tipo_usuario"] =='1') AdmSistemaColas::redistribucionColaAsistente($empresa_persona->getId_persona());
                
                echo '[{"suceso":"0","msg":"Datos guardados Correctamente."}]';
        }else{
                echo '[{"suceso":"1","msg":"Problemas al guardar los datos en empresa_persona"}]';
        }
        exit;
    }
    if($_REQUEST['tarea']=='asignarPerfilPersona')// es par asignarle un perfil a una person aque ya existe
    { 
        $empresa_persona->setId_Persona($_REQUEST['id_persona']);
        $empresa_persona->setId_Empresa($_SESSION['id_empresa']);

        $hoy = date("Y-m-d h:m:s"); 
        $usuario->setId_persona($_REQUEST['id_persona']);
        $usuario=$sqlUsuario->getDatosUsuarioPorIdPersona($usuario);
        $swnuevo_usr = false;
        if($usuario == null && empty($usuario)){
            $perfil->setId_perfil($_REQUEST['id_perfil']);
            $perfil=$sqlPerfil->getBuscarDescripcionPorId($perfil);
       

            //------creamos el usuario y la conteraseña------------------------
            $campousuario=trim(mb_strtoupper($_REQUEST['nombres']));
            $persona = new Persona();
            $persona->setId_persona($_REQUEST['id_persona']);
            $persona = $sqlPersona->getDatosPersonaPorId($persona);
            $campousuario=$campousuario[0].$persona->getNumero_documento();
            $clave=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
            $usuario = new Usuario();
            $usuario->setId_persona($_REQUEST['id_persona']);
            $usuario->setUsuario($campousuario);
            $usuario->setClave($clave);
            $usuario->setActivo(1);
            $usuario->setFecha_creacion($hoy);
            $swnuevo_usr = true;
        }

        if($_SESSION["tipo_usuario"] =='1') { 
            $usuario->setId_tipo_usuario(1);
        } else { 
            $usuario->setId_tipo_usuario(2);
        }
        $sqlUsuario->setGuardarUsuario($usuario);
        
        if($sqlEmpresaPersona->checkEmpresaPersonaPorIdpersonaIdempresa($empresa_persona)=='0')//no existe el perfil lo creamos
        {
           
            //----------- esto es para sacar las opciones segun e perfil que tenga---------
            $perfil->setId_perfil($_REQUEST['id_perfil']);
            $perfil=$sqlPerfil->getBuscarDescripcionPorId($perfil);
            $perfil->getOpciones();
            //--------------------
            $empresa_persona->setId_Persona($_REQUEST['id_persona']);
            $empresa_persona->setId_Empresa($_SESSION["id_empresa"]);
            $empresa_persona->setId_Perfil($_REQUEST['id_perfil']);
            $empresa_persona->setFecha_Vinculacion($hoy);
            $empresa_persona->setOpciones_persona($perfil->getOpciones());
            $empresa_persona->setActivo('1');

            if($sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona)){
                echo '[{"suceso":"0","msg":"Datos guardados Correctamente."}]';
            }else{
                echo '[{"suceso":"1","msg":"Problemas al guardar los datos en empresa_persona"}]';
            }
        }
        elseif($sqlEmpresaPersona->checkEmpresaPersonaPorIdpersonaIdempresa($empresa_persona)=='1')//ya existe el prefil lo modificamos
        {
            $empresa_persona=$sqlEmpresaPersona->getEmpresaPorPersonaEmpresa($empresa_persona);
            $empresa_persona->setActivo('0');
            $empresa_persona->setFecha_Baja($hoy);
            
            if($sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona))
            {
                $nueva_empresa_persona = new EmpresaPersona();
                $nueva_empresa_persona->setId_Persona($_REQUEST['id_persona']);
                $nueva_empresa_persona->setId_Empresa($_SESSION["id_empresa"]);
                $nueva_empresa_persona->setId_Perfil($_REQUEST['id_perfil']);
                $nueva_empresa_persona->setFecha_Vinculacion($hoy);
                $nueva_empresa_persona->setActivo('1');
                //------------ esto es para sacar las opciones segun e perfil que tenga---------
                    $perfil->setId_perfil($_REQUEST['id_perfil']);
                    $perfil=$sqlPerfil->getBuscarDescripcionPorId($perfil);
                    $perfil->getOpciones();
                //--------------------
                $nueva_empresa_persona->setOpciones_persona($perfil->getOpciones());
                if($sqlEmpresaPersona->setGuardarEmpresaPersona($nueva_empresa_persona))
                {
                    echo '[{"suceso":"0","msg":"Datos guardados Correctamente."}]';
                }
                else
                {
                    echo '[{"suceso":"1","msg":"Problemas al guardar los datos."}]';
                }
            }
        }
        else
        {
            echo '[{"suceso":"0","msg":"El perfil ya ha sido asignado anteriormente."}]'; 
        }
        //-------------------enviamos lso correos-------------------------------------------
        switch ($_REQUEST['id_perfil']) 
        {
            //-------------------------exporatadores----------------------
            case 3:  
                if(AdmCorreo::enviarCorreo($_REQUEST['id_persona'],$_SESSION["id_empresa"],'','','',1)) $swenvio=true;
                else $swenvio=false;
                break;//es un rl
            case 4: 
                if($swnuevo_usr){
                    if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],($_SESSION["tipo_usuario"] == 3 ? $_SESSION["nombre"]: $_SESSION["empresa"]),$usuario->getUsuario(),$usuario->getClave(),7)) {
                        $swenvio=true;
                    }
                }else{ 
                    if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],($_SESSION["tipo_usuario"] == 3 ? $_SESSION["nombre"]: $_SESSION["empresa"]),'','',9)){
                        $swenvio=true;
                    }else {
                        $swenvio=false;
                    }
                }
                break;//es un para firmas
            case 12:
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],($_SESSION["tipo_usuario"] == 3 ? $_SESSION["nombre"]: $_SESSION["empresa"]),'','',10)) $swenvio=true;
                else $swenvio=false;
                break;//apoderado
            case 5:  $swenvio=true;
                break;//es un recojo de tramites
            //-------------------------senavex-------------------------------------------
            case 1:  
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',24)) $swenvio=true;
                else $swenvio=false;
                break;//es un adminsitrador del sistema
            case 7: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',25)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 6:
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',26)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 10: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',27)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 8: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',28)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 9: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',29)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
            case 11: 
                if(AdmCorreo::enviarCorreo($_REQUEST['email'],$_REQUEST['nombres'],'','','',30)) $swenvio=true;
                else $swenvio=false;
                break;//es un para firmas
        }
        exit;
    }
    if($_REQUEST['tarea']=='opcionesestados'){
        $perfil = new Perfil();
        $sqlPerfil= new SQLPerfil();
        $lista_menu = $sqlPerfil->getListarPerfil($perfil);
        
        $perfilOpciones = new PerfilOpciones();
        $sqlPerfilOpciones = new SQLPerfilOpciones();
        $lista_opciones = $sqlPerfilOpciones->getListaPerfilOpciones($perfilOpciones);
        
        $tipoUsuario = new TipoUsuario();
        $sqlTipoUsuario = new SQLTipoUsuario();
        $lista_tipo_usuario = $sqlTipoUsuario->getListaTipoUsuario($tipoUsuario);
        
        $vista->assign('lista_usuario',$lista_tipo_usuario);
        $vista->assign('lista_opciones',$lista_opciones);
        $vista->assign('lista_menu',$lista_menu);
        $vista->display('admPerfil/editarmenu.tpl');
        exit;
    }
    
    
    if($_REQUEST['tarea']=='guardar_perfilopciones'){
        
        $perfil = new Perfil();
        $sqlPerfil = new SQLPerfil();
        $perfil->setId_perfil($_REQUEST['opciones']);
        $perfil= $sqlPerfil->getBuscarDescripcionPorId($perfil);
        $perfil->setTipo($_REQUEST['tipo_perfil']);
        $perfil->setHabilitado($_REQUEST['checkbox-perfil']=='on'? "1":"0");
        
        $str='';
        $lista=array_keys($_REQUEST);
        for ($index = 5; $index < count($lista) -1 ; $index++) {
            $str .= $_REQUEST[$lista[$index]];
        }
        $perfil->setOpciones($str);
        $salida = '';
        try {
            $sqlPerfil->save($perfil);
            $salida='1';
        } catch (Exception $exc) {
            $salida='-1';
        }
        echo $salida;
        
        //print('<pre>'.print_r($perfil,true).'</pre>');
        exit;
    }
    if($_REQUEST['tarea']=='perfil_opciones'){
//        print('<pre>'.print_r($_REQUEST,true).'</pre>');
        $perfil = new Perfil();
        $sqlPerfil = new SQLPerfil();
        $perfil->setId_perfil($_REQUEST['id_perfil']);
        $aux = $sqlPerfil->getBuscarDescripcionPorId($perfil);
//        print('<pre>'.print_r($aux->getOpciones(),true).'</pre>');
        echo '[';
        echo '{"opciones":"'.$aux->getOpciones().'","estado":"'.$aux->getHabilitado().'", "tipo":"'.$aux->getTipo().'"}';
        echo ']';
        exit;
    }
    if($_REQUEST['tarea']=='mostrarapi'){
            $hoy = date('Y-m-d H:i:s');
            $empresaImportador1 = new EmpresaImportador();
            $sqlEmpresaImportador1 = new SQLEmpresaImportador();
            if($_REQUEST["id_empresa"]){
            $empresaImportador1->setId_empresa_importador($_SESSION["id_empresa"]);}
            else{
            $empresaImportador1->setId_empresa_importador($_SESSION["id_empresa"]);}    
        $hoy = date('Y-m-d H:i:s');
        $empresaImportador = new EmpresaImportador();
        $sqlEmpresaImportador = new SQLEmpresaImportador();
        $id_empresaImportador=$_REQUEST['id_empresa'];
        $empresaImportador->setId_empresa_importador((isset($_SESSION['id_empresa'])?$_SESSION['id_empresa']:$_SESSION['id_empresa']));
        $empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
        $sqldireccion= new SQLDireccion();
        $sqlmunicipio= new SQLMunicipio();
        $sqldepartamento = new SQLDepartamento();
        $sqltipozona = new SQLDireccionTipoZona();
        $sqltipocalle = new SQLDireccionTipoCalle();
        $sqlDireccionUbicacionEdificio = new SQLDireccionUbicacionEdificio();
        $sqlPersona= new SQLPersona();
        $sqlPais= new SQLPais();
        $sqlTipodoc= new SQLTipoDocumentoIdentidad();
        $direccion= new Direccion();
        $direccion = new Direccion();
        $direccion->setId_direccion($empresaImportador->getId_direccion());
        $direccion = $sqldireccion->getDireccionByID($direccion);
        $municipio= new Municipio();
        $municipio->setId_municipio($direccion->getId_municipio());
        $municipio = $sqlmunicipio->getMunicipioPorID($municipio);
        $departamento = new Departamento();
        $departamento->setId_departamento($direccion->getId_departamento());
        $departamento = $sqldepartamento->getBuscarDepartamentoPorId($departamento);
        $tipozona= new DireccionTipoZona();
        $tipozona->setId_direccion_tipo_zona($direccion->getId_direccion_tipo_zona());
        $tipozona = $sqltipozona->getDireccionTipoZonaByID($tipozona);
        $tipocalle= new DireccionTipoCalle();
        $tipocalle->setId_direccion_tipo_calle($direccion->getId_direccion_tipo_calle());
        $tipocalle = $sqltipocalle->getDireccionTipoCalleByID($tipocalle);
        if($direccion->getId_direccion_tipo_ubicacion_edificio()!=null){
            $direccionUbicacionEdificio = new DireccionUbicacionEdificio();
            $direccionUbicacionEdificio->setId_direccion_ubicacion_edificio($direccion->getId_direccion_tipo_ubicacion_edificio());
            $direccionUbicacionEdificio = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificio);
            $direccionUbicacionEdificion=$direccionUbicacionEdificio->getDescripcion();
        }
        else{
            $direccionUbicacionEdificion='';
        }
        //aca verificamos si es una persona o es un representante legal
        $rrll = new Persona();
        $tipodocr= new TipoDocumentoIdentidad();
        $expedidor = new Departamento();
        $direccionr = new Direccion();
        $municipior= new Municipio();
        $departamentor = new Departamento();
        $tipozonar= new DireccionTipoZona();
        $tipocaller= new DireccionTipoCalle();
        $direccionUbicacionEdificior = new DireccionUbicacionEdificio();
        $paisr = new Pais();
        $direccionUbicacionEdificionr='';
        $rrll->setId_persona($empresaImportador->getId_representante_legal());
        $rrll=$sqlPersona->getDatosPersonaPorId($rrll);
        $tipodocr->setId_tipo_documentoidentidad($rrll->getId_tipo_documento());
        $tipodocr = $sqlTipodoc->getBuscarDescripcionPorId($tipodocr);
        $expedidor->setId_departamento($rrll->getExpedido());
        $expedidor = $sqldepartamento->getBuscarDepartamentoPorId($expedidor);
        if ((!is_numeric($rrll->getDireccion())) ) { }
        else{
            $direccionr->setId_direccion($rrll->getDireccion());
            $direccionr = $sqldireccion->getDireccionByID($direccionr);    
            $municipior->setId_municipio($direccionr->getId_municipio());
            $municipior = $sqlmunicipio->getMunicipioPorID($municipior);   
            $departamentor->setId_departamento($direccionr->getId_departamento());
            $departamentor = $sqldepartamento->getBuscarDepartamentoPorId($departamentor);
            $tipozonar->setId_direccion_tipo_zona($direccionr->getId_direccion_tipo_zona());
            $tipozonar = $sqltipozona->getDireccionTipoZonaByID($tipozonar);   
            $tipocaller->setId_direccion_tipo_calle($direccionr->getId_direccion_tipo_calle());
            $tipocaller = $sqltipocalle->getDireccionTipoCalleByID($tipocaller);
            $direccionUbicacionEdificionr='';
            if($direccionr->getId_direccion_tipo_ubicacion_edificio()!=''){
                $direccionUbicacionEdificior->setId_direccion_ubicacion_edificio($direccionr->getId_direccion_tipo_ubicacion_edificio());
                $direccionUbicacionEdificior = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificior);
                $direccionUbicacionEdificionr=$direccionUbicacionEdificior->getDescripcion();
            }
            else{
                $direccionUbicacionEdificionr='';
            }
        }
        $paisr->setId_pais($rrll->getId_pais_origen());
        $paisr = $sqlPais->getBuscarDescripcionPorId($paisr);
        // datos del apoderado
        $apoderado = new Persona();
        $expedidoa = new Departamento();
        $tipodoca= new TipoDocumentoIdentidad();
        $expedidoa = new Departamento();
        $direcciona = new Direccion();
        $municipioa= new Municipio();
        $departamentoa = new Departamento();
        $tipozonaa= new DireccionTipoZona();
        $tipocallea= new DireccionTipoCalle();
        $direccionUbicacionEdificiona ='';
        $paisa = new Pais();
        $direccionUbicacionEdificioa = new DireccionUbicacionEdificio();
        if($empresaImportador->getId_apoderado()!=''){
        $apoderado->setId_persona($empresaImportador->getId_apoderado());
        $apoderado=$sqlPersona->getDatosPersonaPorId($apoderado);
        $tipodoca->setId_tipo_documentoidentidad($apoderado->getId_tipo_documento());
        $tipodoca = $sqlTipodoc->getBuscarDescripcionPorId($tipodocr);
        $expedidoa->setId_departamento($apoderado->getExpedido());
        $expedidoa = $sqldepartamento->getBuscarDepartamentoPorId($expedidoa);
        if (!is_numeric($apoderado->getDireccion())) { }
        else{
            $direcciona->setId_direccion($apoderado->getDireccion());
            $direcciona = $sqldireccion->getDireccionByID($direcciona);
            $municipioa->setId_municipio($direcciona->getId_municipio());
            $municipioa = $sqlmunicipio->getMunicipioPorID($municipioa);
            $departamentoa->setId_departamento($direcciona->getId_departamento());
            $departamentoa = $sqldepartamento->getBuscarDepartamentoPorId($departamentoa);
            $tipozonaa->setId_direccion_tipo_zona($direcciona->getId_direccion_tipo_zona());
            $tipozonaa = $sqltipozona->getDireccionTipoZonaByID($tipozonaa);
            $tipocallea->setId_direccion_tipo_calle($direcciona->getId_direccion_tipo_calle());
            $tipocallea = $sqltipocalle->getDireccionTipoCalleByID($tipocallea);
            if($direcciona->getId_direccion_tipo_ubicacion_edificio()!=''){
            $direccionUbicacionEdificioa->setId_direccion_ubicacion_edificio($direcciona->getId_direccion_tipo_ubicacion_edificio());
            $direccionUbicacionEdificioa = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificioa);
            $direccionUbicacionEdificiona=$direccionUbicacionEdificioa->getDescripcion();
            }else{
            $direccionUbicacionEdificiona='';
            }
        }    
        $paisa->setId_pais($apoderado->getId_pais_origen());
        $paisa = $sqlPais->getBuscarDescripcionPorId($paisa);
        }

        $vista->assign("generor",$generor);
        $vista->assign("generoa",$generoa);
        $vista->assign("unipersonal",$unipersonal);
        $vista->assign("expedidor",$expedidor);
        $vista->assign("expedidoa",$expedidoa);
        $vista->assign("tipodocr",$tipodocr);
        $vista->assign("tipodoca",$tipodoca);
        $vista->assign("paisr",$paisr);
        $vista->assign("paisa",$paisa);
        $vista->assign("direccionRevision",$direccionRevision);
        $vista->assign('empresaRevision', $empresaImportador);
        $vista->assign('empresaRRLL', $rrll);
        $vista->assign("direccionRRLL",$direccionRRLL);
        $vista->assign('empresaApoderado', $apoderado);
        $vista->display("admEmpresaApi/SolicitudApi.tpl"); 
        exit;
    }

//Asignar Rui a Empresa Importadora   
    if($_REQUEST['tarea']=='asignarRuiEmpresa')//Aqui te envio el ID de la empresa que se dara de alta
        {
            $hoy = date("Y-m-d H:i:s");
            $empresaImportador1 = new EmpresaImportador();
            $sqlEmpresaImportador1 = new SQLEmpresaImportador();
            $empresaImportador1->setId_empresa_importador(($_REQUEST['id_empresa_importador']));
            $empresaImportador1 = $sqlEmpresaImportador1->getEmpresaApiPorID($empresaImportador1);
            $estado_anterior = $empresaImportador1->getEstado();
            $empresaImportador1->setEstado(2);
            $fAsignacion = date("Y-m-d");
            $fRenovacion = '';
            $empresaImportador1->setFecha_asignacion_rui($fAsignacion);
            $empresaImportador1->setFecha_renovacion_rui(date('Y-m-d', strtotime($fAsignacion. ' + 365 days')));
            $empresaImportador1->setId_usuario_aprob($_SESSION['id_persona']);
            $correlativorui = new CorrelativoRui();
            $sqlcorrelativorui = new SQLCorrelativorui();
            $correlativorui=$sqlcorrelativorui->getCorrelativoRui($correlativorui);
            $empresaImportador1->setRui($correlativorui->getCorrelativo_rui());
            $sqlcorrelativorui->setGuardarCorrelativoRui($correlativorui);
            if($sqlEmpresaImportador1->save($empresaImportador1)){
                $persona_imp = new Persona();
                $usuario_imp = new Usuario();
                $id_persona=0;
                $id_persona=$this->GeneraUsuarioApi($empresaImportador1->getId_empresa_importador());
                if($id_persona!=0){
                    $usuario_imp->setId_persona($id_persona);
                    $persona_imp->setId_persona($id_persona);
                    echo '[{"suceso":"Exito"}]';
                }
                else{
                    echo '[{"suceso":"Error111"}]';
                }
            }
            else{
                echo '[{"suceso":"Error"}]';
            }
            exit;
        }
    if($_REQUEST['tarea']=='RechazarRuiEmpresa'){
        $hoy = date("Y-m-d H:i:s");
        $empresaImportador1 = new EmpresaImportador();
        $sqlEmpresaImportador1 = new SQLEmpresaImportador();
        $empresaImportador1->setId_empresa_importador(($_REQUEST['id_empresa_importador']));
        $empresaImportador1 = $sqlEmpresaImportador1->getEmpresaApiPorID($empresaImportador1);
        $empresaImportador1->setEstado(17);
        if($sqlEmpresaImportador1->save($empresaImportador1)){
            $empresaimportobs= new EmpresaImportadorObservacion();
            $sqlempresaimportobs= new SQLEmpresaImportadorObservacion();
            $empresaimportobs->setFecha_observacion($hoy);
            $empresaimportobs->setObservacion($_REQUEST['motivo']);
            $empresaimportobs->setId_empresa_importador($_REQUEST['id_empresa_importador']);
            $empresaimportobs->setId_usuario_observacion($_SESSION['id_usuario']);
            $empresaimportobs=$sqlempresaimportobs->save($empresaimportobs);
           
            $persona = new Persona();
            $sqlPersona=new SQLPersona();
            $persona->setId_persona($empresaImportador1->getId_representante_legal());
            $persona = $sqlPersona->getDatosPersonaPorId($persona);
             echo $persona->getEmail();
            AdmCorreo::enviarCorreo($persona->getEmail(),$persona->getNombres(),$empresaImportador1->getRazon_social(), $_REQUEST['motivo'],'',42);

        }else{
            echo '[{"suceso":"Error111"}]';
        }
    }
    if($_REQUEST['tarea']=='listar_pais'){
      $sqlPais= new SQLPais();
      $pais = new Pais();
      $pais=$sqlPais->getListarPais($pais);
//        print('<pre>'.print_r($lista,true).'</pre>');
        $selected = ',"selected":true';
        $strJson = '';
        echo '[';
        
        foreach ($pais as $datos){
            $strJson .= '{"id_pais":"' . $datos->getId_pais().
                    '","nombre":"' . $datos->getNombre() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    if($_REQUEST['tarea']=='listar_depto'){
      $sqlDepto= new SQLDepartamento();
      $depto = new Departamento();
      $depto=$sqlDepto->getListarDepartamento($depto);
//        print('<pre>'.print_r($lista,true).'</pre>');
        $selected = ',"selected":true';
        $strJson = '';
        echo '[';
        
        foreach ($depto as $datos){
            $strJson .= '{"id_departamento":"' . $datos->getId_departamento().
                    '","nombre":"' . $datos->getNombre() . '"},';
            $selected='';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    
  }  
  
  public function GeneraUsuarioApi($id_empresa_importador){


        $hoy = date("Y-m-d h:m:s"); 
        $empresaImportador = new EmpresaImportador();
        $sqlEmpresaImportador = new SQLEmpresaImportador();
        $empresa_persona = new EmpresaPersona();    
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        $usuario = new Usuario();    
        $sqlUsuario = new SQLUsuario();
        $logs = new Logs();
        $sqlLogs = new SQLLogs();
        $empresaImportador->setId_empresa_importador($id_empresa_importador);
        $empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);

        $empresa_persona->setActivo(0);

            $campousuario=$empresaImportador->getNit().'-IMP';
            //-guardamos el usuario
            
            $usuario->setUsuario($campousuario);
            $usuario->setClave(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8));
            //$usuario->setClave('123456');
            $usuario->setFecha_creacion($hoy);
            $usuario->setId_persona($empresaImportador->getId_representante_legal());
            $usuario->setActivo(1);
            $usuario->setId_tipo_usuario(2);
            
            try{
                $sqlUsuario->setGuardarUsuario($usuario);
            } catch (Exception $ex) {
                $logs->setDescripcion('ERROR: generarRepresentanteLegal: creacion del USUARIO');
                $logs->setId_servicio(0);
                $logs->setMensaje($ex->getMessage());
                $logs->setObjeto(print_r($usuario,true));
                $logs->setDate(Date('Y-m-d H:i:s'));
                $sqlLogs->Save($logs);
                $sqlPersona->delete($persona);
                return null;
            }

        $perfil = new Perfil();
        $sqlPerfil = new SQLPerfil();
        $perfil->setId_perfil(3);
        $perfil=$sqlPerfil->getBuscarDescripcionPorId($perfil);
        $perfil->getOpciones();
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        $empresa_persona->setId_Persona($empresaImportador->getId_representante_legal());
        $empresa_persona->setId_Empresa($empresaImportador->getId_empresa_importador());
        $empresa_persona->setId_Perfil(23);
        $empresa_persona->setFecha_Vinculacion($hoy);
        $empresa_persona->setOpciones_persona($perfil->getOpciones());
        $empresa_persona->setActivo(1);
        $empresa_persona->setCargo('REPRESENTANTE LEGAL');
        
        try{
            $persona = new Persona();
            $sqlPersona=new SQLPersona();
            $persona->setId_persona($empresaImportador->getId_representante_legal());
            $persona = $sqlPersona->getDatosPersonaPorId($persona);
            $sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona);
            AdmCorreo::enviarCorreo($persona->getEmail(),$persona->getNombres(),$empresaImportador->getRazon_social(), $usuario->getUsuario(),$usuario->getClave(),41);
            $id_persona_agregada=$empresa_persona->getId_Persona();
        } catch (Exception $ex) {

            $logs->setDescripcion('ERROR: generarRepresentanteLegal: registo EMPRESA - PERSONA');
            $logs->setId_servicio(0);
            $logs->setMensaje($ex->getMessage());
            $logs->setObjeto(print_r($empresa_persona,true));
            $logs->setDate(Date('Y-m-d H:i:s'));
            $sqlLogs->Save($logs);
            $sqlPersona->delete($persona);
            $sqlUsuario->delete($usuario);
            $id_persona_agregada=0;
        }
        return $id_persona_agregada;
  }
}