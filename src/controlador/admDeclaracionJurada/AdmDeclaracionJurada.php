<?php
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');
include_once(PATH_CONTROLADOR . DS .'admDeclaracionJurada'. DS .'AdmDeclaracionJuradaFunctions.php');
include_once(PATH_CONTROLADOR . DS .'admVerificaciones'. DS .'AdmVerificaciones.php');
include_once(PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');
include_once(PATH_CONTROLADOR . DS . 'admDireccion' . DS . 'AdmDireccion.php');
include_once(PATH_CONTROLADOR . DS . 'admUploader' . DS . 'AdmUploader.php');
include_once(PATH_CONTROLADOR . DS . 'admAnalisisRiesgo' . DS . 'AdmAnalisisFormula.php');
include_once(PATH_CONTROLADOR . DS . 'middleware' . DS . 'Middleware.php');

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
include_once(PATH_TABLA . DS . 'Servicio.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'Fabrica.php');
include_once(PATH_TABLA . DS . 'SistemaColas.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'ObservacionesDdjj.php');
include_once(PATH_TABLA . DS . 'TipoAcuerdo.php');
include_once(PATH_TABLA . DS . 'EstadoAcuerdo.php');
include_once(PATH_TABLA . DS . 'TipoValorInternacional.php');
include_once(PATH_TABLA . DS . 'Arancel.php');
include_once(PATH_TABLA . DS . 'AcuerdoArancel.php');
include_once(PATH_TABLA . DS . 'ZonasEspeciales.php');
include_once(PATH_TABLA . DS . 'DeclaracionJuradaZonasEspeciales.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'CriterioOrigen.php');
include_once(PATH_TABLA . DS . 'Partida.php');
include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'Direccion.php');
include_once(PATH_TABLA . DS . 'SGCDdjj.php');
include_once(PATH_TABLA . DS . 'Regional.php');

include_once(PATH_MODELO . DS . 'SQLDeclaracionJurada.php');
include_once(PATH_MODELO . DS . 'SQLDdjjAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLDetalleArancel.php');
include_once(PATH_MODELO . DS . 'SQLUnidadMedida.php');
include_once(PATH_MODELO . DS . 'SQLInsumosNacionales.php');
include_once(PATH_MODELO . DS . 'SQLInsumosImportados.php');
include_once(PATH_MODELO . DS . 'SQLComercializador.php');
include_once(PATH_MODELO . DS . 'SQLEstadoDdjj.php');
include_once(PATH_MODELO . DS . 'SQLServicio.php');
include_once(PATH_MODELO . DS . 'SQLServicioExportador.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');
include_once(PATH_MODELO . DS . 'SQLFabrica.php');
include_once(PATH_MODELO . DS . 'SQLSistemaColas.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLObservacionesDdjj.php');
include_once(PATH_MODELO . DS . 'SQLTipoAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLTipoValorInternacional.php');
include_once(PATH_MODELO . DS . 'SQLArancel.php');
include_once(PATH_MODELO . DS . 'SQLZonasEspeciales.php');
include_once(PATH_MODELO . DS . 'SQLDeclaracionJuradaZonasEspeciales.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLCriterioOrigen.php');
include_once(PATH_MODELO . DS . 'SQLDireccion.php');
include_once(PATH_MODELO . DS . 'SQLPartida.php');
include_once(PATH_MODELO . DS . 'SQLRegional.php');
include_once(PATH_MODELO . DS . 'SQLTipoCertificadoOrigen.php');

class AdmDeclaracionJurada extends Principal {
  const DDJJ_VIGENTE = 1;
  const DDJJ_CANCELAR = 5;
  const DDJJ_VISITA = 6;
  const DDJJ_CORREGIR = 4;
  const DDJJ_REVISAR = 0;
  const DDJJ_ELIMINADA = 7;
  const DDJJ_VENCIDA = 2;
  public function AdmDeclaracionJurada()
  {
    $midleware = new Middleware();
    $midleware->verificaEmpresaBloqueada();


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
    $servicio = new Servicio();
    $sistema_colas = new SistemaColas();
    $pais = new Pais();
    $fabrica = new Fabrica();
    $persona = new Persona();
    $observaciones_ddjj = new ObservacionesDdjj();
    $tipo_acuerdo = new TipoAcuerdo();
    $tipo_valor_internacional = new TipoValorInternacional();
    $arancel = new Arancel();
    $zonas_especiales = new ZonasEspeciales();
    $direccion = new Direccion();
    $functions = new AdmDeclaracionJuradaFunctions();

    $sqlDeclaracionJurada = new SQLDeclaracionJurada();
    $sqlAcuerdo = new SQLAcuerdo();
    $sqlDetalleArancel = new SQLDetalleArancel();
    $sqlUnidadMedida = new SQLUnidadMedida();
    $sqlInsumosNacionales = new SQLInsumosNacionales();
    $sqlInsumosImportados = new SQLInsumosImportados();
    $sqlComercializador = new SQLComercializador();
    $sqlEstadoDdjj = new SQLEstadoDdjj();
    $sqlDdjjAcuerdo = new SQLDdjjAcuerdo();
    $sqlServicio = new SQLServicio();
    $sqlServicioExportador = new SQLServicioExportador();
    $sqlSistemaColas = new SQLSistemaColas();
    $sqlPais = new SQLPais();
    $sqlFabrica = new SQLFabrica();
    $sqlPersona = new SQLPersona();
    $sqlObservacionesDdjj = new SQLObservacionesDdjj();
    $sqlTipoAcuerdo = new SQLTipoAcuerdo();
    $sqlTipoValorInternacional = new SQLTipoValorInternacional();
    $sqlArancel = new SQLArancel();
    $sqlZonasEspeciales = new SQLZonasEspeciales();
    $sqlDireccion = new SQLDireccion();

    $funcionesGenerales = new FuncionesGenerales();
    $uploader = new AdmUploader();
    $condicional = new Condicionales();

    $perfil_uco=$condicional->esPerfilUco();
    $vista->assign('perfil_uco',$perfil_uco);

    //***********************declaraciones Juradas vista previa******************
    if($_REQUEST['tarea']=='declaracionesJuradas'){

      $estados = $sqlEstadoDdjj->getListarEstadoDdjj($estado_ddjj);
      $vista->assign('estados',$estados);
      $vista->assign('esExportador',$condicional->esExportador());
      $vista->display("declaracionJurada/DeclaracionesJuradas.tpl");
    }
    // ************************envia el formulario de una ddjj*******************************/////
    if($_REQUEST['tarea']=='altadeclaracionjurada')
    {
      if($_REQUEST['correction']=='true' || $_REQUEST['clonacion']=='true'){
        $declaracion_jurada->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
        $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
        $vista->assign('ddjj', $declaracion_jurada);
        $vista->assign('edition',true);
        $vista->assign('partidas',$functions->getPartidas($declaracion_jurada->getId_partidas_acuerdo()));
      }
      if($_REQUEST['clonacion']=='true') $vista->assign('clon', true);
      $uploader->DeleteSessionFolder();
      $unidad_medida=$sqlUnidadMedida->getListarUnidadMedida($unidad_medida);
      $pais=$sqlPais->getListarPais($pais);
      $tipo_acuerdos=$sqlTipoAcuerdo->getListarTipoAcuerdo($tipo_acuerdo);
      $tipo_valor_internacionales = $sqlTipoValorInternacional->getListarTipoValorInternacional($tipo_valor_internacional);
      $arancel_vigente = $sqlArancel->getArancelVigente($arancel);
      $aranceles = $sqlArancel->getListarNoVigente($arancel);
      $zonas_especialess = $sqlZonasEspeciales->getAll($zonas_especiales);
      $representanteEmpresa = $functions->getPersonaEmpresa($_SESSION["id_empresa"],$_SESSION['id_persona']);
      //********************* verifica si tiene bloqueo por acuerdo,si no extrae normalmente******
      $acuerdosVerificacion=$functions->extraeAcuerdoSiHayBloqueo($_SESSION['id_empresa']);
      $acuerdos = $acuerdosVerificacion[0];

      $direccionRepresentanteTpl = AdmDireccion::obtenerDireccionTpl($representanteEmpresa[1]->direccion);

      if($acuerdosVerificacion[1]) $vista->assign('acuerdoBloqueo',$acuerdosVerificacion[1]);



      $vista->assign('representanteEmpresa',$representanteEmpresa);
      $vista->assign('unidadmedida', $unidad_medida);
      $vista->assign('tipoacuerdos', $tipo_acuerdos);
      $vista->assign('pais', $pais);
      $vista->assign('acuerdos', $acuerdos);
      $vista->assign('tipo_valor_internacionales', $tipo_valor_internacionales);
      $vista->assign('arancel_vigente', $arancel_vigente);
      $vista->assign('aranceles', $aranceles);
      $vista->assign('zonas_especiales',$zonas_especialess);
      $vista->assign('direccion',$direccionRepresentanteTpl);
      $vista->assign('key',session_id());

      if($_REQUEST['correction']=='true'){
        $vista->assign('observaciones_ddjj',$functions->getObservaciones($_REQUEST["id_declaracion_jurada"]));
        $vista->display('declaracionJurada/Observaciones.tpl');
      } ;

      $vista->display("declaracionJurada/FormDeclaracionJurada.tpl");

      $vista->assign('direccion',$direccionRepresentanteTpl);
      $vista->assign('representanteEmpresa',$representanteEmpresa);
      $vista->assign('edition',true);
      $vista->assign('id','view_ddjj');

      $vista->display("declaracionJurada/DeclaracionJurada.tpl");
      exit;
    }
    if($_REQUEST['tarea']=='rechazodeclaracionjurada')
    {

      $declaracion_jurada->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
      $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
      $vista->assign('ddjj', $declaracion_jurada);
      $vista->assign('edition',true);
      $vista->assign('partidas',$functions->getPartidas($declaracion_jurada->getId_partidas_acuerdo()));

      $uploader->DeleteSessionFolder();
      $unidad_medida=$sqlUnidadMedida->getListarUnidadMedida($unidad_medida);
      $pais=$sqlPais->getListarPais($pais);
      $tipo_acuerdos=$sqlTipoAcuerdo->getListarTipoAcuerdo($tipo_acuerdo);
      $tipo_valor_internacionales = $sqlTipoValorInternacional->getListarTipoValorInternacional($tipo_valor_internacional);
      $arancel_vigente = $sqlArancel->getArancelVigente($arancel);
      $aranceles = $sqlArancel->getListarNoVigente($arancel);
      $zonas_especialess = $sqlZonasEspeciales->getAll($zonas_especiales);
      //********************* verifica si tiene bloqueo por acuerdo,si no extrae normalmente******
      $acuerdosVerificacion=$functions->extraeAcuerdoSiHayBloqueo($_SESSION['id_empresa']);
      $acuerdos = $acuerdosVerificacion[0];

      if($acuerdosVerificacion[1]) $vista->assign('acuerdoBloqueo',$acuerdosVerificacion[1]);


      //********************* esta seccion incluye la regional a ser escojida***********
      /*$regional = new Regional();
      $sqlRegional = new SQLRegional();
      $regionales = $sqlRegional->getListarRegionales($regional,FALSE);
      $vista->assign('regionales',$regionales);
      $vista->display("declaracionJurada/Regionales.tpl");*/
      //********************************************************************************

      $vista->assign('representanteEmpresa',$functions->getPersonaEmpresa($_SESSION["id_empresa"],$_SESSION['id_persona']));
      $vista->assign('unidadmedida', $unidad_medida);
      $vista->assign('tipoacuerdos', $tipo_acuerdos);
      $vista->assign('pais', $pais);
      $vista->assign('acuerdos', $acuerdos);
      $vista->assign('tipo_valor_internacionales', $tipo_valor_internacionales);
      $vista->assign('arancel_vigente', $arancel_vigente);
      $vista->assign('aranceles', $aranceles);
      $vista->assign('zonas_especiales',$zonas_especialess);
      $vista->assign('key',session_id());

      if($_REQUEST['correction']=='true'){
        $vista->assign('observaciones_ddjj',$functions->getObservaciones($_REQUEST["id_declaracion_jurada"]));
        $vista->display('declaracionJurada/Observaciones.tpl');
      } ;
//laura

      $vista->assign('representanteEmpresa',$functions->getPersonaEmpresa($_SESSION["id_empresa"],$_SESSION['id_persona']));
      // $vista->assign('edition',true);
      $vista->assign('id','view_ddjj');
      $vista->assign('preview',true);
      //$vista->display("declaracionJurada/previewDeclaracion&id_declaracion_jurada.tpl");

      exit;
    }
    if($_REQUEST['tarea']=='reasignardeclaracionjurada')
    {
      $conf = new stdClass();
      $conf->reasignarDeclaracion = true;
      print $this->getDdjjTpl($_REQUEST["id_declaracion_jurada"],$conf);
      exit;
    }

    //************************ guarda la declaracion juradad opcional id_ddjj si no significa que es nueva ************************///
    if($_REQUEST['tarea']=='saveDeclaracionJurada'){
      if($_REQUEST['id_ddjj']){
        $declaracion_jurada->setId_ddjj($_REQUEST['id_ddjj']);
        $declaracion_jurada = $sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
        $servicio_exportador=AdmSistemaColas::buscarServicioExportadorParaDdjj($declaracion_jurada->getId_servicio_exportador());
      }
      else{
        $servicio_exportador=AdmSistemaColas::generarServicioExportadorParaDdjj($_SESSION["id_persona"],0,$_SESSION["id_empresa"]);
      }

      $acuerdo->setId_Acuerdo($_REQUEST['acuerdo']);
      $acuerdo = $sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
      $date=date("Y-m-d");

      $declaracion_jurada->setId_Empresa($_SESSION["id_empresa"]);
      $declaracion_jurada->setId_Persona($_SESSION["id_persona"]);
      $declaracion_jurada->setId_estado_ddjj(0);// status por Revisar
      /*print_r($servicio_exportador);
      echo $servicio_exportador->getId_servicio_exportador();
      echo 'Laurex';*/
      $declaracion_jurada->setId_Servicio_Exportador($servicio_exportador->getId_servicio_exportador());
      $declaracion_jurada->setDenominacion_Comercial(strtoupper ($_REQUEST["denominacion_comercial"]));
      if(isset($_REQUEST["caracteristicas"]) && $_REQUEST["caracteristicas"] !='') $declaracion_jurada->setCaracteristicas(strtoupper ($_REQUEST["caracteristicas"]));
      $declaracion_jurada->setId_Unidad_Medida(strtoupper ($_REQUEST["unidadmedida"]));
      $declaracion_jurada->setProceso_Productivo(strtoupper ($_REQUEST["procesoproductivo"]));
      $declaracion_jurada->setComplemento(strtoupper ($_REQUEST["complemento"]));
      $declaracion_jurada->setFecha_Registro($date);
      //echo $_REQUEST["esComercializador"];
      $declaracion_jurada->setComercializador($_REQUEST["esComercializador"]=='true'?TRUE:FALSE);
      $declaracion_jurada->setMuestra($_REQUEST["muestra"]=='true'?TRUE:FALSE);
      $declaracion_jurada->setNombre_tecnico(strtoupper ($_REQUEST["nombre_tecnico"]));
      $declaracion_jurada->setAplicacion(strtoupper ($_REQUEST["aplicacion"]));
      if($_REQUEST["produccion_mensual_mercancia"]!='') $declaracion_jurada->setProduccion_mensual(str_replace(',', '.',$_REQUEST["produccion_mensual_mercancia"]));
      $declaracion_jurada->setValor_total_insumosnacional($funcionesGenerales->setNumeric($_REQUEST["valor_total_insumosnacional"]));
      $declaracion_jurada->setSobrevalor_total_insumosnacional($funcionesGenerales->setNumeric($_REQUEST["sobrevalor_total_insumosnacional"]));
      $declaracion_jurada->setValor_total_insumosimportados($funcionesGenerales->setNumeric($_REQUEST["valor_total_insumosimportados"]));
      $declaracion_jurada->setSobrevalor_total_insumosimportados($funcionesGenerales->setNumeric($_REQUEST["sobrevalor_total_insumosimportados"]));
      $declaracion_jurada->setValor_mano_obra($funcionesGenerales->setNumeric($_REQUEST["valor_mano_obra"]));
      $declaracion_jurada->setSobrevalor_mano_obra($funcionesGenerales->setNumeric($_REQUEST["sobrevalor_mano_obra"]));
      $declaracion_jurada->setValor_fob($funcionesGenerales->setNumeric($_REQUEST["valor_fob"]));
      $declaracion_jurada->setSobrevalor_fob($funcionesGenerales->setNumeric($_REQUEST["sobrevalor_fob"]));
      $declaracion_jurada->setValor_exw($funcionesGenerales->setNumeric($_REQUEST["valor_exw"]));
      $declaracion_jurada->setSobrevalor_exw($funcionesGenerales->setNumeric($_REQUEST["sobrevalor_exw"]));
      $declaracion_jurada->setValor_frontera($funcionesGenerales->setNumeric($_REQUEST["valor_frontera"]));
      $declaracion_jurada->setSobrevalor_frontera($funcionesGenerales->setNumeric($_REQUEST["sobrevalor_frontera"]));
      //$declaracion_jurada->setId_regional($funcionesGenerales->setNumeric($_REQUEST["regional"]));
      //buscamos el ID DIRECCION DE EMPRESA
      $empresa = new Empresa();
      $sqlEmpresa = new SQLEmpresa();
      $empresa->setId_empresa($_SESSION['id_empresa']);
      $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
      $direccion = new Direccion();
      $sqlDireccion = new SQLDireccion();
      $direccion->setId_direccion($empresa->getDireccion());
      $direccion = $sqlDireccion->getDireccionByID($direccion);
      $regional = new Regional();
      $sqlRegional = new SQLRegional();
      $regional->setId_departamento($direccion->getId_departamento());
      $regional = $sqlRegional->getBuscarRegionalPorDepto($regional);
      $regional_id=$regional->getId_regional();
      $declaracion_jurada->setId_regional($regional_id);

      if($_REQUEST["combo_fabricas"]!='') $declaracion_jurada->setId_direccion($_REQUEST["combo_fabricas"]);
      else $declaracion_jurada->setId_direccion($empresa->getDireccion());
      $declaracion_jurada->setDetalle_otros(strtoupper ($_REQUEST['elaboracion_detalle']));
      $declaracion_jurada->setId_acuerdo($_REQUEST['acuerdo']);
//            $declaracion_jurada->setId_criterios( implode (",", json_decode($_REQUEST['criterios_origen'])));
      $declaracion_jurada->setId_arancel( $_REQUEST['id_arancel']);
      $declaracion_jurada->setId_partida( $_REQUEST['id_partida']);
      $declaracion_jurada->setId_partidas_acuerdo( implode (",", json_decode($_REQUEST['id_partidas_acuerdo'])));
      $declaracion_jurada->setReo(strtoupper ($_REQUEST['reo']));
      $declaracion_jurada->setFecha_limite_revision($functions->addDaysReview($date));//3 days for senavex revition;
      $declaracion_jurada->setRevisado_uco(0);
      $declaracion_jurada->setAprobado_uco(0);


      if($sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada)){
        if($_REQUEST['observacion_general']) $functions->saveObservacion($_REQUEST['observacion_general']);
        //print_r($_REQUEST["tabla_insumosnacionales"]);
        $functions->guardarInsumosNacionales($_REQUEST["tabla_insumosnacionales"], $declaracion_jurada->getId_ddjj());
        $functions->guardarInsumosImportados($_REQUEST["tabla_insumosimportados"], $declaracion_jurada->getId_ddjj());
        if($_REQUEST["esComercializador"]=='true') $functions->guardarComercializadores($_REQUEST["tabla_comercializadores"], $declaracion_jurada->getId_ddjj());
        $functions->saveZonasEspeciales($_REQUEST["lista_elaboracion"], $declaracion_jurada->getId_ddjj());
        $uploader->saveDocuments($_REQUEST['ddjj_documents'],$declaracion_jurada->getId_ddjj());

        $asist_senavex = AdmSistemaColas::generarColaParaDdjj($servicio_exportador->getId_servicio_exportador(),$regional_id);
        $declaracion_jurada->setId_asistente($asist_senavex);
        $declaracion_jurada->save();
        //Send Mails
        $PersonaEmpresa=$functions->getPersonaEmpresa($_SESSION["id_empresa"],$_SESSION["id_persona"]);
        $nombre_persona=$PersonaEmpresa[0]->getNombres().' '.$PersonaEmpresa[0]->getPaterno().' '. $PersonaEmpresa[0]->getMaterno();
        AdmCorreo::enviarCorreo($PersonaEmpresa[0]->email,$PersonaEmpresa[1]->razon_social,$nombre_persona,'','',31);
        $functions->auditoriaDdjj(0, $declaracion_jurada->getId_ddjj(), $_SESSION['id_persona']);
        echo '{"status":"success"}';
      }else{
        $servicio_exportador->delete();
        echo '{"status":"fail"}';
      }
      exit;
    }
    //************************ json de la lista de ddjj *******************////
    if($_REQUEST['tarea']=='listarDeclaraciones'){
      $declaracion_jurada->setId_Empresa($_SESSION["id_empresa"]);
      $declaracion_jurada->setId_estado_ddjj($_REQUEST['estado_ddjj']!=''?$_REQUEST['estado_ddjj']:1);
      $resultado = $sqlDeclaracionJurada->getListarDdjjObjectsEstado($declaracion_jurada,!$condicional->esExportador());
      $sqlpartida = new SQLPartida();
      $strJson = '';
      echo '[';
      foreach ($resultado as $datos){
//                $detalle_arancel->setId_detalle_arancel($datos->getId_detalle_arancel());
//                $detalle_arancel = $sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
        $partida=new Partida();

        $partida->setId_partida($datos->getId_partida());
        $partida = $sqlpartida->getById($partida);
        $strJson .= '{"id_ddjj":"' . $datos->getId_ddjj() .
          '","denominacion_comercial":' . json_encode($datos->getDenominacion_comercial()) .
          ',"acuerdo":' . json_encode($datos->acuerdo->getSigla()) .
          ',"denominacion":' . json_encode($partida?$partida->getPartida().' - '.$partida->getDenominacion():'') .
          ',"codigo":' . json_encode($datos->getCorrelativo_ddjj() ).
          ',"fecha_vencimiento":"' . substr($datos->getFecha_vencimiento(), 0, 11).
          '","fecha_registro":"' . substr($datos->getFecha_registro(), 0, 11) .'"},';
      }

      $strJson = substr($strJson, 0, strlen($strJson) - 1);
      echo $strJson;
      echo ']';
      exit;
    }
    //************************ vista de la declaracion jurada *******************////
    if($_REQUEST['tarea']=='previewDeclaracion'){
      if($condicional->esCertificador()){
        $conf = new stdClass();
        $conf->documentReview = true;
      }
      print $this->getDdjjTpl($_REQUEST["id_declaracion_jurada"],$conf);
      exit;
    }
    if($_REQUEST['tarea']=='reviewDocumentsDeclaracion'){
      $conf = new stdClass();
      $conf->documentReview = true;
      print $this->getDdjjTpl($_REQUEST["id_declaracion_jurada"],$conf);
      exit;
    }

    /********** Asistente SENAVEX***********/
    if($_REQUEST['tarea']=='listarRevisionDeclaracionJurada')
    {
      $estados = $sqlEstadoDdjj->getListarEstadoDdjjRevisionCertificador($estado_ddjj,[AdmDeclaracionJurada::DDJJ_REVISAR,AdmDeclaracionJurada::DDJJ_CANCELAR]);
      $vista->assign('estados',$estados);
      $vista->display("declaracionJurada/ListarRevisionDeclaracionJurada.tpl");
      exit;
    }
    if($_REQUEST['tarea']=='listarRevisionDeclaraciones')
    {
      if($_REQUEST['estado_ddjj'] && $_REQUEST['estado_ddjj'] == AdmDeclaracionJurada::DDJJ_CANCELAR) {
        $resultado = $sqlDeclaracionJurada->getListarDeclaracionesEstado($declaracion_jurada,AdmDeclaracionJurada::DDJJ_CANCELAR);
      } else {
        $resultado = $sqlDeclaracionJurada->getListarDeclaracionesParaRevisar($declaracion_jurada,$_SESSION["id_persona"]);
      }

      $strJson = '';
      echo '[';

      $longitud = sizeof($resultado);

      $sqlpartida=new SQLPartida();

      for($i=0; $i<$longitud; $i++){
        $partida=new Partida();
        $partida->setId_partida($resultado[$i]["id_partida"]);
        $partida = $sqlpartida->getById($partida);

        $strJson .= '{"id_ddjj":"' . $resultado[$i]["id_ddjj"] .
          '","descripcion_comercial":' . json_encode($resultado[$i]["denominacion_comercial"]) .
          ',"denominacion":' . json_encode($partida?$partida->getPartida().' - '.$partida->getDenominacion():'') .
          ',"caracteristicas":' . json_encode($resultado[$i]["caracteristicas"]) .
//          '","fecha_limite_revision":"' . substr($resultado[$i]["fecha_limite_revision"], 0, 11) .
          ',"fecha_registro":"' . substr($resultado[$i]["fecha_registro"], 0, 11) .
          '","estadoddjj":"' . $resultado[$i]["estadoddjj"] . '"},';

        $selected='';
      }

      $strJson = substr($strJson, 0, strlen($strJson) - 1);
      echo $strJson;
      echo ']';
      exit;
    }
    if($_REQUEST['tarea'] == 'saveReasignarDatos') {
      $declaracion_jurada->setId_ddjj($_REQUEST['id_ddjj']);
      $declaracion_jurada = $sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
      $reasignar = new stdClass();
      $reasignar->ref = $_REQUEST['ref'];
      if(isset($_REQUEST['id_partida']) AND $_REQUEST['id_partida'] != ''){
        $reasignar->id_partida = $declaracion_jurada->getId_partida();
        $declaracion_jurada->setId_partida( $_REQUEST['id_partida']);
      }
      if(isset($_REQUEST['fecha_vencimiento']) AND $_REQUEST['fecha_vencimiento'] != ''){
        $fecha_vencimiento = $funcionesGenerales->setFechaToBd($_REQUEST['fecha_vencimiento']);
        $reasignar->fecha_vencimiento = $declaracion_jurada->getFecha_vencimiento();
        $declaracion_jurada->setFecha_vencimiento($fecha_vencimiento);
      }

      $functions->auditoriaDdjjReasignar($reasignar, $_REQUEST['id_ddjj']);




      if($sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada)){
        $PersonaEmpresa=$functions->getPersonaEmpresa($declaracion_jurada->getId_Empresa(),$declaracion_jurada->getId_Persona());
        $nombre_persona=$PersonaEmpresa[0]->getNombres().' '.$PersonaEmpresa[0]->getPaterno().' '. $PersonaEmpresa[0]->getMaterno();
        AdmCorreo::enviarCorreo($PersonaEmpresa[0]->email,$PersonaEmpresa[1]->razon_social,$nombre_persona,$declaracion_jurada,'',53);
        $functions->auditoriaDdjj(6, $declaracion_jurada->getId_ddjj(), $_SESSION['id_persona']);
        echo '{"status":"success"}';
      }else{
        echo '{"status":"fail"}';
      }
      exit;
    }

    ///---------------------------revision de la declaracion jurada pro pate del analista
    if($_REQUEST['tarea']=='reviewDeclaracion'){
      $declaracion_jurada->setId_ddjj($_REQUEST["id_declaracion_jurada"]);
      $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
      $tipo_valor_internacional->setId_tipo_valor_internacional($declaracion_jurada->acuerdo->id_tipo_valor_internacional);
      $tipo_valor_internacional = $sqlTipoValorInternacional->getBuscarDescripcionPorId($tipo_valor_internacional);
      $zonas=$functions->getZonasEspeciales($declaracion_jurada->getId_ddjj());

      $tipo_acuerdos=$sqlTipoAcuerdo->getListarTipoAcuerdo($tipo_acuerdo);
      $unidad_medida=$sqlUnidadMedida->getListarUnidadMedida($unidad_medida);
      $pais=$sqlPais->getListarPais($pais);
      $acuerdos=$sqlAcuerdo->getAcuerdoSinNinguno($acuerdo,true);
      $direccion = $functions->getDireccion($declaracion_jurada->getId_direccion());
      $fabrica=$functions->getFabrica($declaracion_jurada->getId_direccion());

      $acuerdo->setId_Acuerdo($declaracion_jurada->getId_acuerdo());
      $acuerdo=$sqlAcuerdo->getByIdArguments($acuerdo);

      //--------------FUNCION DE ANALISIS DE RIESGO: Esta funcion devuelve la formula prearmada, las variables utilizadas con sus valores-----
      $analisisRiesgo = new AdmAnalisisFormula();
      $objetoAnalisiRiesgo = $analisisRiesgo->getAnalisisRiesgo($declaracion_jurada);
      $vista->assign('objectoAnalisiRiesgo', $objetoAnalisiRiesgo);
      $verificacion = new AdmVerificaciones();
      $verificacion->verificacionesAntiguasPorEmpresa($vista,$declaracion_jurada->getId_empresa());

//      ----------------------------------------------------------------------------------------------------------------------------------------------------------------------

      $vista->assign('partidas',$functions->getPartidas($declaracion_jurada->getId_partidas_acuerdo()));
      $vista->assign('representanteEmpresa',$functions->getPersonaEmpresa($declaracion_jurada->getId_empresa(),$declaracion_jurada->getId_persona()));
      $vista->assign('observaciones_ddjj',$functions->getObservaciones($_REQUEST["id_declaracion_jurada"]));
      $vista->assign('tipo_valor_internacional',$tipo_valor_internacional->abreviatura);
      $vista->assign('tipoacuerdos', $tipo_acuerdos);
      $vista->assign('direccion', $direccion);
      $vista->assign('fabrica', $fabrica);
      $vista->assign('paises', $pais);
      $vista->assign('acuerdos', $acuerdos);
      $vista->assign('review',true);
      $vista->assign('ddjj', $declaracion_jurada);
      $vista->assign('unidadmedida', $unidad_medida);
      $vista->assign('zonas', $zonas);
      $vista->assign('criterios', $functions->getCriterios($declaracion_jurada->getId_criterios()));
      $vista->assign('id', 'review');

      $vista->display("declaracionJurada/DeclaracionJurada.tpl");
      exit;
    }
    /// para denegar una declaracion jurada para no ponerla en vigencia
    if($_REQUEST['tarea']=='denyDdjj')
    {
      $hoy=date("Y-m-d H:i:s");
      $declaracion_jurada->setId_ddjj($_REQUEST["id_ddjj"]);
      $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
      $declaracion_jurada->setId_estado_ddjj(AdmDeclaracionJurada::DDJJ_CORREGIR); //para corregir
      $declaracion_jurada->setObservacion_ddjj($_REQUEST['observacion_ddjj']);
      $functions->saveObservacion($_REQUEST['observacion_general']);
      //Envío de Correos
      $correos=AdmCorreo::obtenerCorreosEmpresa($declaracion_jurada->getId_Empresa());
      $correos=explode(',',$correos);
      if(trim($correos[0])==trim($correos[1]))
      {
        AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->getRazon_social(),'','','',34);
      }
      else
      {
        AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->getRazon_social(),'','','',34);
        AdmCorreo::enviarCorreo($correos[1],$declaracion_jurada->empresa->getRazon_social(),'','','',34);
      }

      if($sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada)){
        //Actualizar el Sistema de Colas para eliminar el registro que ya esta revisado
        AdmDeclaracionJuradaFunctions::terminarServicioColas($declaracion_jurada->getId_Servicio_Exportador());
        $functions->auditoriaDdjj(4, $declaracion_jurada->getId_ddjj(), $_SESSION['id_persona']);

        echo '{"status":1,"message":"success"}';
      }else{
        echo '{"status":0,"message":"fail"}';
      }
      exit;
    }
    //------------------para aprovar una ddjj por parate del exportador
    if($_REQUEST['tarea']=='aproveDdjj')
    {
      $hoy = date('Y-m-d H:i:s');
      $declaracion_jurada->setId_ddjj($_REQUEST["id_ddjj"]);
      $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
      $declaracion_jurada->setFecha_Revision($hoy);
      //si la DDJJ es Para ferias o muestras
      if ($declaracion_jurada->getMuestra()=== true){
        $declaracion_jurada->setId_estado_ddjj(AdmDeclaracionJurada::DDJJ_VIGENTE);/// verificacion aprobada
      }
      //si no es para ferias o muestras le mandamos a pago
      else{
        $declaracion_jurada->setId_estado_ddjj(AdmDeclaracionJurada::DDJJ_CANCELAR);/// verificacion aprobada
        $declaracion_jurada->setFecha_limite_cancelacion($funcionesGenerales->addDate($hoy,15));
      }
      $declaracion_jurada->setObservacion_ddjj(trim($_REQUEST['observacion_ddjj']));
      $declaracion_jurada->setId_asistente($_SESSION['id_persona']);
      $declaracion_jurada->setId_criterios( implode (",", json_decode($_REQUEST['criterios_origen'])));


      //---------creacion de la verificacon y asignacion de revision estricta si es necesario--------
      $admVerificaciones= new AdmVerificaciones();
      $declaracion_jurada=$admVerificaciones->procesaVerificacion($_REQUEST['verificacion'], $declaracion_jurada);
      //----------------------------------------------------------------

      if($sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada)){

        AdmDeclaracionJuradaFunctions::terminarServicioColas($declaracion_jurada->getId_Servicio_Exportador());

        if($declaracion_jurada->getId_estado_ddjj()!=AdmDeclaracionJurada::DDJJ_VISITA) {
          $functions->auditoriaDdjj(5, $declaracion_jurada->getId_ddjj(), $_SESSION['id_persona']);
          AdmDeclaracionJuradaFunctions::setVigenciaDdjjxServicioexportador_APROVE($declaracion_jurada->getId_Servicio_Exportador());
          $tipo_correo = 33;
        } else {
          $functions->auditoriaDdjj(8, $declaracion_jurada->getId_ddjj(), $_SESSION['id_persona']);
          $tipo_correo = 54;
        }

        $correos=AdmCorreo::obtenerCorreosEmpresa($declaracion_jurada->getId_Empresa());
        $correos=explode(',',$correos);
        if(trim($correos[0])==trim($correos[1]))
        {
          AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->getRazon_social(),'','','',$tipo_correo);
        }
        else
        {
          AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->getRazon_social(),'','','',$tipo_correo);
          AdmCorreo::enviarCorreo($correos[1],$declaracion_jurada->empresa->getRazon_social(),'','','',$tipo_correo);
        }

        echo '{"status":1,"message":"success"}';
      }else{
        echo '{"status":0,"message":"fail"}';
      }
      exit;
    }
    ////METODO especial para poner en vigencia la ddjjj debe ser utiliaado por el modulo de facturacion
    if($_REQUEST['tarea']=='validarCancelacion')
    {
      if($functions->validarCancelacion($_REQUEST['id_ddjj'])){
        echo '{"status":1,"message":"success"}';
      }else{
        echo '{"status":0,"message":"fail"}';
      }
      exit;
    }


//-----------------------------------------------------------------------------------------------------------------------------------------------
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

    if($_REQUEST['tarea']=='eliminarDeclaracion'){
      if(isset($_REQUEST['id_ddjj']) AND isset($_REQUEST['justificacion'])){

        $functions->bajaDdjj($_REQUEST['id_ddjj'],$_REQUEST['justificacion']);
        echo '{"status":1,"message":"success"}';
      }else{
        echo '{"status":0,"message":"fail"}';
      }
    }
    if($_REQUEST['tarea']=='BajasCausas'){
      if($perfil_uco)
      {
        $sw=1;
      }
      else{
        $sw=2;
      }

      $DdjjBajas = new DdjjBajas();
      $SqlDdjjBajas = new SQLDdjjBajas();
      $DdjjBajas->setPermisos($sw);
      $DdjjBajas=$SqlDdjjBajas->getbyPermiso($DdjjBajas);
      print_r($DdjjBajas);
      //echo 'LauLau';
    }

  }
  public function getDdjjTpl($id_ddjj, $conf = null){
    if($conf == null) $conf = new stdClass();
    if(!isset($conf->preview)) $conf->preview = false;
    if(!isset($conf->documentReview)) $conf->documentReview = false;
    if(!isset($conf->reasignarDeclaracion)) $conf->reasignarDeclaracion = false;

    $vista = Principal::getVistaInstance();
    $declaracion_jurada = new DeclaracionJurada();
    $acuerdo = new Acuerdo();
    $unidad_medida = new UnidadMedida();
    $pais = new Pais();
    $tipo_acuerdo = new TipoAcuerdo();
    $tipo_valor_internacional = new TipoValorInternacional();
    $functions = new AdmDeclaracionJuradaFunctions();

    $sqlDeclaracionJurada = new SQLDeclaracionJurada();
    $sqlAcuerdo = new SQLAcuerdo();
    $sqlUnidadMedida = new SQLUnidadMedida();
    $sqlPais = new SQLPais();
    $sqlTipoAcuerdo = new SQLTipoAcuerdo();
    $sqlTipoValorInternacional = new SQLTipoValorInternacional();



    $declaracion_jurada->setId_ddjj($id_ddjj);
    $declaracion_jurada=$sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
    $tipo_valor_internacional->setId_tipo_valor_internacional($declaracion_jurada->acuerdo->id_tipo_valor_internacional);
    $tipo_valor_internacional = $sqlTipoValorInternacional->getBuscarDescripcionPorId($tipo_valor_internacional);
    $zonas=$functions->getZonasEspeciales($declaracion_jurada->getId_ddjj());
    $tipo_acuerdos=$sqlTipoAcuerdo->getListarTipoAcuerdo($tipo_acuerdo);
    $unidad_medida=$sqlUnidadMedida->getListarUnidadMedida($unidad_medida);
    $pais=$sqlPais->getListarPais($pais);
    $acuerdos=$sqlAcuerdo->getAcuerdoSinNinguno($acuerdo,true);
    $direccion=$functions->getDireccion($declaracion_jurada->getId_direccion());
    $direccionRepresentanteTpl = AdmDireccion::obtenerDireccionTpl($declaracion_jurada->getId_direccion());
    $fabrica=$functions->getFabrica($declaracion_jurada->getId_direccion());




    $id = $conf->documentReview? 'documentReview' : 'preview';
    if($conf->reasignarDeclaracion) $id = 'reasignarDatos';


    if($conf->reasignarDeclaracion){
      $reasignaciones = $functions->reasignacionesAnteriores($id_ddjj);
      if($reasignaciones){
        $vista->assign('reasignaciones', $reasignaciones);
      }

    }

    if($declaracion_jurada->getFecha_vencimiento()){
      $vista->assign('fecha_vencimiento', date('d/m/y',strtotime($declaracion_jurada->getFecha_vencimiento())));
    }

    $vista->assign('representanteEmpresa',$functions->getPersonaEmpresa($declaracion_jurada->getId_empresa(),$declaracion_jurada->getId_persona()));
    $vista->assign('criterios',$functions->getCriterios($declaracion_jurada->getId_criterios()));
    $vista->assign('partidas',$functions->getPartidas($declaracion_jurada->getId_partidas_acuerdo()));
    $vista->assign('direccion',$direccion);
    $vista->assign('direccionTpl',$direccionRepresentanteTpl);
    $vista->assign('fabrica',$fabrica);
    $vista->assign('tipo_valor_internacional',$tipo_valor_internacional->abreviatura);
    $vista->assign('tipoacuerdos', $tipo_acuerdos);
    $vista->assign('paises', $pais);
    $vista->assign('acuerdos', $acuerdos);
    $vista->assign('preview',$conf->preview);
    $vista->assign('documentReview',$conf->documentReview);
    $vista->assign('reasignarDeclaracion',$conf->reasignarDeclaracion);
    $vista->assign('ddjj', $declaracion_jurada);
    $vista->assign('unidadmedida', $unidad_medida);
    $vista->assign('zonas', $zonas);
    $vista->assign('id', $id);
    $vista->assign("facturacion",$declaracion_jurada && $declaracion_jurada->getId_estado_ddjj()==AdmDeclaracionJurada::DDJJ_CANCELAR && $_SESSION["id_empresa"]!=0);
    $vista->assign('estado', AdmDeclaracionJuradaFunctions::getEstado($declaracion_jurada->getId_estado_ddjj()));
    $vista->assign('esCancelacion', $declaracion_jurada->getId_estado_ddjj() === AdmDeclaracionJurada::DDJJ_CANCELAR);

    //solo para las de vigencia
    if($declaracion_jurada && $declaracion_jurada->getId_estado_ddjj()==AdmDeclaracionJurada::DDJJ_VIGENTE) $vista->assign('criterios',$functions->getCriterios($declaracion_jurada->getId_criterios()));

    return $vista->fetch("declaracionJurada/DeclaracionJuradaWrapper.tpl");
  }
}

