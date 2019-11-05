<?php
/**
/* Registrar solicitudes api*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_LIB . DS . 'PHPExcel' . DS . 'IOFactory.php');
include_once(PATH_LIB . DS . 'PHPExcel' . DS . 'PHPExcel.php');
include_once(PATH_LIB . DS . 'PHPExcel' . DS . 'Writer'. DS . 'Excel2007.php');

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
include_once(PATH_MODELO . DS . 'SQLAutorizacionPreviaDetalle.php');
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

        if($_REQUEST['tarea']=='revisa'){

            $autorizacionPrevia = new AutorizacionPrevia();
            $sqlAutorizacionPrevia = new SQLAutorizacionPrevia();
            $id_autorizacion=$_REQUEST['id_autorizacion'];
            $autorizacionPrevia->setId_autorizacion_previa($id_autorizacion);
            $autorizacionPrevia = $sqlAutorizacionPrevia->getAutorizacionPorId($autorizacionPrevia);
            $empresaImportador = new EmpresaImportador();
            $sqlEmpresaImportador = new SQLEmpresaImportador();
            $empresaImportador->setId_empresa_importador($autorizacionPrevia->getId_empresa_importador());
            $empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
            $autorizacionPreviaDetalle = new AutorizacionPreviaDetalle();
            $sqlAutorizacionPreviaDetalle = new SQLAutorizacionPreviaDetalle();
            $autorizacionPreviaDetalle->setId_autorizacion_previa($id_autorizacion);
            $autorizacionPreviaDetalle = $sqlAutorizacionPreviaDetalle->getAutorizacionDetallePorId($autorizacionPreviaDetalle);
            $vista->assign('autorizacionPrevia', $autorizacionPrevia);
            $vista->assign('empresaRevision', $empresaImportador);
            $vista->assign('id_autorizacion', $id_autorizacion);
            $vista->assign('autorizacionPreviaDetalle', $autorizacionPreviaDetalle);

            $vista->display("admSolicitudApi/RevisaApi.tpl"); 
            exit;

        }

        if($_REQUEST['tarea']=='guardaDeatallex'){

            $allowedfileExtensions = array('xls', 'xlsx');
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $fileName = $_FILES['file']['name'];
                $fileNameCm = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCm));
                $fileTmpPath = $_FILES['file']['tmp_name'];

                if (in_array($fileExtension, $allowedfileExtensions)) {

                    $i = $_REQUEST['id_autorizacion'];
                    $autorizacionPreviaDetalle = new AutorizacionPreviaDetalle();
                    $sqlAutorizacionPreviaDetalle = new sqlAutorizacionPreviaDetalle();
                    $autorizacionPreviaDetalle->setId_autorizacion_previa($i);
                    $autdel = $sqlAutorizacionPreviaDetalle->DeletAutDetalle($autorizacionPreviaDetalle);

                    $inputFileType = PHPExcel_IOFactory::identify($fileTmpPath);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($fileTmpPath);
                    $sheet = $objPHPExcel->getSheet(0); 
                    $highestRow = $sheet->getHighestRow();
                    $highestColumn = $sheet->getHighestColumn();

                    for ($row = 11; $highestRow; $row++){
                        $autorizacionPreviaDetalle = new AutorizacionPreviaDetalle();
                        $sqlAutorizacionPreviaDetalle = new sqlAutorizacionPreviaDetalle();
                        $desc_comercial = $sheet->getCell("E".$row)->getCalculatedValue();
                        $desc_comercial = str_replace("'", " ", $desc_comercial);
                        if ($desc_comercial == '') break; //
                        $subpartida = $sheet->getCell("C".$row)->getCalculatedValue();
                        $desc_arancelaria = $sheet->getCell("D".$row)->getCalculatedValue();

                        $cantidad = $sheet->getCell("F".$row)->getCalculatedValue();
                        $unidad_medida = $sheet->getCell("G".$row)->getCalculatedValue();
                        $peso_bruto = $sheet->getCell("H".$row)->getCalculatedValue();

                        $precio_unitario = $sheet->getCell("I".$row)->getCalculatedValue();
                        $valor_total = $sheet->getCell("J".$row)->getCalculatedValue();

                       $precio_unitario_fob_divisa = $sheet->getCell("L".$row)->getCalculatedValue();
                       
                       $valor_fob_total_divisa = $sheet->getCell("M".$row)->getCalculatedValue();

                       if($unidad_medida == 'u') $unidad_medida = 1;
                       else $unidad_medida = 2;
                        //    $valor_fob_total_divisa = $sheet->getCell("M".$row)->getCalculatedValue();
                        if(!$precio_unitario_fob_divisa && !$valor_fob_total_divisa && $peso_bruto) {
                            $autorizacionPreviaDetalle->setCodigo_nandina($subpartida);
                            $autorizacionPreviaDetalle->setDescripcion_arancelaria($desc_arancelaria);
                            $autorizacionPreviaDetalle->setDescripcion_comercial($desc_comercial);
                            $autorizacionPreviaDetalle->setCantidad($cantidad);
                            $autorizacionPreviaDetalle->setUnidad_medida($unidad_medida);
                            $autorizacionPreviaDetalle->setPeso($peso_bruto);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob($precio_unitario);
                            $autorizacionPreviaDetalle->setFob($valor_total);
                            $autorizacionPreviaDetalle->setId_autorizacion_previa($i);

                        } else if (!$precio_unitario_fob_divisa && !$valor_fob_total_divisa && !$peso_bruto) {
                            $autorizacionPreviaDetalle->setCodigo_nandina($subpartida);
                            $autorizacionPreviaDetalle->setDescripcion_arancelaria($desc_arancelaria);
                            $autorizacionPreviaDetalle->setDescripcion_comercial($desc_comercial);
                            $autorizacionPreviaDetalle->setCantidad($cantidad);
                            $autorizacionPreviaDetalle->setUnidad_medida($unidad_medida);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob($precio_unitario);
                            $autorizacionPreviaDetalle->setFob($valor_total);
                            $autorizacionPreviaDetalle->setId_autorizacion_previa($i);

                        } else if ($precio_unitario_fob_divisa && $valor_fob_total_divisa && !$peso_bruto) {
                            $autorizacionPreviaDetalle->setCodigo_nandina($subpartida);
                            $autorizacionPreviaDetalle->setDescripcion_arancelaria($desc_arancelaria);
                            $autorizacionPreviaDetalle->setDescripcion_comercial($desc_comercial);
                            $autorizacionPreviaDetalle->setCantidad($cantidad);
                            $autorizacionPreviaDetalle->setUnidad_medida($unidad_medida);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob($precio_unitario);
                            $autorizacionPreviaDetalle->setFob($valor_total);
                            $autorizacionPreviaDetalle->setValor_fob_total_divisa($precio_unitario_fob_divisa);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob_divisa($valor_fob_total_divisa);
                            $autorizacionPreviaDetalle->setId_autorizacion_previa($i);

                        } else if (!$precio_unitario_fob_divisa && $valor_fob_total_divisa) {
                            $autorizacionPreviaDetalle->setCodigo_nandina($subpartida);
                            $autorizacionPreviaDetalle->setDescripcion_arancelaria($desc_arancelaria);
                            $autorizacionPreviaDetalle->setDescripcion_comercial($desc_comercial);
                            $autorizacionPreviaDetalle->setCantidad($cantidad);
                            $autorizacionPreviaDetalle->setUnidad_medida($unidad_medida);
                            $autorizacionPreviaDetalle->setPeso($peso_bruto);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob($precio_unitario);
                            $autorizacionPreviaDetalle->setFob($valor_total);
                            $autorizacionPreviaDetalle->setValor_fob_total_divisa($precio_unitario_fob_divisa);
                            $autorizacionPreviaDetalle->setId_autorizacion_previa($i);
                        } else if ($precio_unitario_fob_divisa && !$valor_fob_total_divisa) {
                            $autorizacionPreviaDetalle->setCodigo_nandina($subpartida);
                            $autorizacionPreviaDetalle->setDescripcion_arancelaria($desc_arancelaria);
                            $autorizacionPreviaDetalle->setDescripcion_comercial($desc_comercial);
                            $autorizacionPreviaDetalle->setCantidad($cantidad);
                            $autorizacionPreviaDetalle->setUnidad_medida($unidad_medida);
                            $autorizacionPreviaDetalle->setPeso($peso_bruto);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob($precio_unitario);
                            $autorizacionPreviaDetalle->setFob($valor_total);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob_divisa($valor_fob_total_divisa);
                            $autorizacionPreviaDetalle->setId_autorizacion_previa($i);
                        } else if ($precio_unitario_fob_divisa && $valor_fob_total_divisa) {
                            $autorizacionPreviaDetalle->setCodigo_nandina($subpartida);
                            $autorizacionPreviaDetalle->setDescripcion_arancelaria($desc_arancelaria);
                            $autorizacionPreviaDetalle->setDescripcion_comercial($desc_comercial);
                            $autorizacionPreviaDetalle->setCantidad($cantidad);
                            $autorizacionPreviaDetalle->setUnidad_medida($unidad_medida);
                            $autorizacionPreviaDetalle->setPeso($peso_bruto);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob($precio_unitario);
                            $autorizacionPreviaDetalle->setFob($valor_total);
                            $autorizacionPreviaDetalle->setValor_fob_total_divisa($precio_unitario_fob_divisa);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob_divisa($valor_fob_total_divisa);
                            $autorizacionPreviaDetalle->setId_autorizacion_previa($i);
                        }

                        $autorizaciond = $sqlAutorizacionPreviaDetalle->SaveAutDetalle($autorizacionPreviaDetalle);

                    }//enf for excel

                    echo 1;
                    exit;

                } else {
                    echo 2;
                }
                
            } else {
                echo 2;
            }
        
            exit;
        }


    }

}