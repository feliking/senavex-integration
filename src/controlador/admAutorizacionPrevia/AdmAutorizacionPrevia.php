<?php
/**
/* Registrar solicitudes api*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'AutorizacionPrevia.php');
include_once(PATH_TABLA . DS . 'AutorizacionPreviaDetalle.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'EmpresaImportador.php');
include_once(PATH_TABLA . DS . 'Usuario.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'Perfil.php');
include_once(PATH_TABLA . DS . 'TipoUsuario.php');
include_once(PATH_TABLA . DS . 'PerfilOpciones.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'TipoDocumentoIdentidad.php');
include_once(PATH_TABLA . DS . 'Municipio.php');
include_once(PATH_TABLA . DS . 'Ciudad.php');
include_once(PATH_TABLA . DS . 'Direccion.php');
include_once(PATH_TABLA . DS . 'DireccionTipo.php');
include_once(PATH_TABLA . DS . 'DireccionTipoCalle.php');
include_once(PATH_TABLA . DS . 'DireccionTipoZona.php');
include_once(PATH_TABLA . DS . 'DireccionUbicacionEdificio.php');
include_once(PATH_TABLA . DS . 'Logs.php');
include_once(PATH_TABLA . DS . 'EmpresaImportadorObservacion.php');


include_once(PATH_MODELO . DS . 'SQLAutorizacionPrevia.php');
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

class AdmAutorizacionPrevia extends Principal {

    public function AdmAutorizacionPrevia() {

        $vista = Principal::getVistaInstance();


        $persona = new Persona();
        $autorizacionPrevia = new AutorizacionPrevia();
        $autorizacionPreviaDetalle = new AutorizacionPreviaDetalle();
        $perfil = new Perfil();

        $empresaImportador = new EmpresaImportador();
        $sqlAutorizacionPrevia = new SQLAutorizacionPrevia();
        $sqlPersona = new SQLPersona();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        $sqlEmpresaImportador = new SQLEmpresaImportador();

        $sqlPerfil = new SQLPerfil();

        if($_REQUEST['tarea']=='listado'){
            $empresa=$sqlAutorizacionPrevia->getListar($autorizacionPrevia);

        }

        if($_REQUEST['tarea']=='guardaSolicitud'){

            $allowedfileExtensions = array('xls', 'xlsx');
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $fileName = $_FILES['file']['name'];
                $fileNameCm = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCm));
                $fileTmpPath = $_FILES['file']['tmp_name'];
                $fech = date("m-d-h-i-s");
                if (in_array($fileExtension, $allowedfileExtensions)) {

                    $uploadFileDir = 'styles/solicitudes/';
                    $autorizacionPrevia->setId_pais_origen($_REQUEST['paises']);
                    $autorizacionPrevia->setId_pais_procedencia($_REQUEST['pais_proc']);
                    $autorizacionPrevia->setId_departamento_destino($_REQUEST['depto']);
                    $autorizacionPrevia->setCantidad_total($_REQUEST['cantidad']);
                    $autorizacionPrevia->setPeso_total($_REQUEST['peso_bruto']);
                    $autorizacionPrevia->setValor_total($_REQUEST['fob']);
                    $autorizacionPrevia->setOrigen_recursos($_REQUEST['orig_divisas']);
                    $autorizacionPrevia->setEntidad_bancaria($_REQUEST['ent_bancaria']);
                    $autorizacionPrevia->setNumero_cuenta($_REQUEST['num_cuenta']);
                    $autorizacionPrevia->setTipo_cuenta($_REQUEST['tipo_cuenta']);
                    $autorizacionPrevia->setTipo_cambio($_REQUEST['cambio_empleado']);
                    $autorizacionPrevia->setPersona_autorizada($_REQUEST['pers_autorizada']);
                    $autorizacionPrevia->setFecha_registro(date("Y-m-d H:i:s")); 
                    $autorizacionPrevia->setEstado(3); 
                    $autorizacionPrevia->setId_empresa_importador($_SESSION['id_empresa']);
                    
                    $autorizacion = $sqlAutorizacionPrevia->save($autorizacionPrevia);
		    $corr = 10000 + $autorizacionPrevia->getId_autorizacion_previa();

                    $dest_path = $uploadFileDir . $corr.'_'.$_SESSION['id_empresa'].'_'.$fech.'.'.$fileExtension;
                     
                    if(move_uploaded_file($fileTmpPath, $dest_path))
                    {
                      echo 1;
                    }
                    else
                    {
                      echo 3;
                    }
                } else {
                    echo 2;
                }
                
            } else {
                echo 2;
            }
        
            
            exit;
        }

        if($_REQUEST['tarea']=='revisionApi'){
                $vista->display("admEmpresaApi/ColaApiRegistradas.tpl"); 
                exit;
        }
        
        // listar cola AP
        if($_REQUEST['tarea']=='ListarColaApiEmpresa'){
            $vista->display("admEmpresaApi/ColaSolicitudApiImpor.tpl");
            exit;
        }

        if($_REQUEST['tarea']=='listar_personas'){
          $sqlEmpresaImportador = new SQLEmpresaImportador();
          $empresaImportador = new EmpresaImportador();
          $empresaImportador->setId_empresa_importador($_SESSION['id_empresa']);

          $empresaImportador=$sqlEmpresaImportador->getEmpresaPorId($empresaImportador);
          $persona->setId_persona($empresaImportador->getId_representante_legal());
          $persona = $sqlPersona->getDatosPersonaPorId($persona);
    //        print('<pre>'.print_r($lista,true).'</pre>');
            $id_pe1 =$persona->getId_persona();
            $strJson = '';
            echo '[';
            $strJson .= '{"id_persona":"' . $persona->getId_persona().
                        '","nombre":"' . $persona->getNombres() . ' ' . $persona->getPaterno() . ' ' . $persona->getMaterno() .'"},';
            $persona1 = new Persona();
            $persona1->setId_persona($empresaImportador->getId_apoderado());
            $persona1 = $sqlPersona->getDatosPersonaPorId($persona1);
            if($persona1){
                if($id_pe1 != $persona1->getId_persona()){
                    $strJson .= '{"id_persona":"' . $persona1->getId_persona().
                            '","nombre":"' . $persona1->getNombres() . ' ' . $persona1->getPaterno() . ' ' . $persona1->getMaterno() .'"},';
                }
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        
        // listar AP por estado por empresa
        if($_REQUEST['tarea']=='ListarApiPorEstado'){

            $autorizacionPrevia = new AutorizacionPrevia();
            $autorizacionPrevia->setId_empresa_importador($_SESSION['id_empresa']);
            $autorizacionPrevia->setEstado($_REQUEST['id_estado']);
            $sqlAutorizacionPrevia = new SQLAutorizacionPrevia();

            $autorizacionPrevia=$sqlAutorizacionPrevia->getListarAPxEmpresa($autorizacionPrevia);
            $strJson = '';
            echo '[';
            foreach ($autorizacionPrevia as $datos){

                if($datos->getId_autorizacion_previa() > 291 or $datos->getEstado() != 3 ){
                    $pais = new Pais();
                    $sqlPais = new SQLPais();
                    $persona = new Persona();
                    $sqlPersona = new SQLPersona();
                    $pais->setId_pais($datos->getId_pais_procedencia());
                    $pais = $sqlPais->getBuscarDescripcionPorId($pais);
                    $id_autorizado = $datos->getPersona_autorizada();
                    $persona->setId_persona($id_autorizado);
                    $persona = $sqlPersona->getDatosPersonaPorId($persona);
    		        $nro = 10000 + $datos->getId_autorizacion_previa();
                    if ($datos->getEstado() == 1){
                        $estado1 = 'APROBADO';
                    } else if ( $datos->getEstado() == 2){
                        $estado1 = 'RECHAZADO';
                    } else if ( $datos->getEstado() == 3){
                        $estado1 = 'CON REGISTRO';
                    }


                    $strJson .= '{"id_autorizacion":"' . $datos->getId_autorizacion_previa() .
    			'","correlativo":"'.$nro .
                            '","fecha_registro":"'.$datos->getFecha_registro().'"
                            ,"recursos":"'.$datos->getOrigen_recursos().'"
                            ,"estado":"'.$estado1.'"
                            ,"pais_procedencia":"'.$pais->getNombre().'"},';
                            // ,"persona":"'.$persona->getNombres().'"},';
                    $selected='';
                }
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;

        }

        if($_REQUEST['tarea']=='altaNuevaApi'){
            $vista->display("admEmpresaApi/SolicitudApi.tpl");
            exit;
        }

        // listar solicitudes
        if($_REQUEST['tarea']=='ListarApiPendientes'){
            $vista->display("admSolicitudApi/ListaSolicitudApi.tpl");
            exit;
        }

         // listar solicitudes AP 
        if($_REQUEST['tarea']=='ListaSolicitudApi'){

            $autorizacionPrevia = new AutorizacionPrevia();
            // $autorizacionPrevia->setEstado($_REQUEST['id_estado']);
            $sqlAutorizacionPrevia = new SQLAutorizacionPrevia();

            $autorizacionPrevia=$sqlAutorizacionPrevia->getListarAPsinDetalle($autorizacionPrevia);
            $strJson = '';
            echo '[';
            foreach ($autorizacionPrevia as $datos){

                if($datos->getId_autorizacion_previa() > 291 or $datos->getEstado() == 1 ){
                    $pais = new Pais();
                    $sqlPais = new SQLPais();
                    $persona = new Persona();
                    $sqlPersona = new SQLPersona();
                    $pais->setId_pais($datos->getId_pais_procedencia());
                    $pais = $sqlPais->getBuscarDescripcionPorId($pais);
                    $id_autorizado = $datos->getPersona_autorizada();
                    $persona->setId_persona($id_autorizado);
                    $persona = $sqlPersona->getDatosPersonaPorId($persona);
                    $nro = 10000 + $datos->getId_autorizacion_previa();
                    if ($datos->getEstado() == 1){
                        $estado1 = 'APROBADO';
                    } else if ( $datos->getEstado() == 2){
                        $estado1 = 'RECHAZADO';
                    } else if ( $datos->getEstado() == 3){
                        $estado1 = 'CON REGISTRO';
                    }


                    $strJson .= '{"id_autorizacion":"' . $datos->getId_autorizacion_previa() .
                '","correlativo":"'.$nro .
                            '","fecha_registro":"'.$datos->getFecha_registro().'"
                            ,"recursos":"'.$datos->getOrigen_recursos().'"
                            ,"estado":"'.$estado1.'"
                            ,"pais_procedencia":"'.$pais->getNombre().'"},';
                            // ,"persona":"'.$persona->getNombres().'"},';
                    $selected='';
                }
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;

        }


    }

}