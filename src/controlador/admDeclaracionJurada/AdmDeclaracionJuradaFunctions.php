<?php
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');
include_once(PATH_CONTROLADOR . DS . 'admEstadoEmpresas' . DS . 'AdmEstadoEmpresas.php');
include_once(PATH_CONTROLADOR . DS . 'admArancel' . DS . 'AdmArancel.php');
include_once(PATH_CONTROLADOR . DS .'admDeclaracionJurada'. DS .'AdmDeclaracionJurada.php');

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
include_once(PATH_TABLA . DS . 'Ciudad.php');
include_once(PATH_TABLA . DS . 'Partida.php');
include_once(PATH_TABLA . DS . 'Arancel.php');
include_once(PATH_TABLA . DS . 'SGCDdjj.php');
include_once(PATH_TABLA . DS . 'Direccion.php');
include_once(PATH_TABLA . DS . 'Departamento.php');
include_once(PATH_TABLA . DS . 'Municipio.php');
include_once(PATH_TABLA . DS . 'DireccionTipo.php');
include_once(PATH_TABLA . DS . 'DireccionTipoCalle.php');
include_once(PATH_TABLA . DS . 'DireccionTipoZona.php');
include_once(PATH_TABLA . DS . 'DireccionUbicacionEdificio.php');
include_once(PATH_TABLA . DS . 'RetrasoDdjj.php');
include_once(PATH_TABLA . DS . 'DdjjEliminacion.php');


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
include_once(PATH_MODELO . DS . 'SQLCiudad.php');
include_once(PATH_MODELO . DS . 'SQLPartida.php');
include_once(PATH_MODELO . DS . 'SQLArancel.php');
include_once(PATH_MODELO . DS . 'SQLSGCDdjj.php');
include_once(PATH_MODELO . DS . 'SQLDireccion.php');
include_once(PATH_MODELO . DS . 'SQLDepartamento.php');
include_once(PATH_MODELO . DS . 'SQLMunicipio.php');
include_once(PATH_MODELO . DS . 'SQLCiudad.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipo.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoCalle.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoZona.php');
include_once(PATH_MODELO . DS . 'SQLDireccionUbicacionEdificio.php');

class AdmDeclaracionJuradaFunctions {
  const SGCDdjj_reasignar = 10;
    //****** FUNCIONES PARA LAS DDJJ **********************//
    public static function guardarInsumosNacionales($nacionales,$id_ddjj){
        $insumos_nacionales = new InsumosNacionales();
        $sqlInsumosNacionales = new SQLInsumosNacionales();

        $insumos_nacionales->setId_ddjj($id_ddjj);
        $sqlInsumosNacionales->setEliminarInsumosNacionalesPorDdjj($insumos_nacionales);

        $nacionales = json_decode($nacionales);
        if(count($nacionales)) {
            foreach ($nacionales as $object) {
                $insumos_nacionales = new InsumosNacionales();

                $insumos_nacionales->setId_ddjj($id_ddjj);
                $insumos_nacionales->setDescripcion(strtoupper($object->descripcion));
                $insumos_nacionales->setNombre_Tecnico('');
                $insumos_nacionales->setSubpartida('0');
                $insumos_nacionales->setNombre_Fabricante(strtoupper($object->fabricante));
                $insumos_nacionales->setCi(strtoupper($object->ci));
                $insumos_nacionales->setCi(strtoupper($object->ci));
                $insumos_nacionales->setTelefono_Fabricante(strtoupper($object->telefono));
                $insumos_nacionales->setUnidad_Medida(strtoupper($object->unidad_medida));
                $insumos_nacionales->setValor($object->valor);
                $insumos_nacionales->setCantidad($object->cantidad);
                $insumos_nacionales->setSobrevalor($object->sobrevalor);

                $sqlInsumosNacionales->setGuardarInsumosNacionales($insumos_nacionales);
            }
        }
    }

    public static function guardarInsumosImportados($importados,$id_ddjj){
        $insumos_importados = new InsumosImportados();
        $sqlInsumosImportados = new SQLInsumosImportados();

        $insumos_importados->setId_DDJJ($id_ddjj);
        $sqlInsumosImportados->setEliminarInsumosImportadosPorDdjj($insumos_importados);

        $importados = json_decode($importados);
        if(count($importados))
        {
            foreach ($importados as $object) {
                $insumos_importados = new InsumosImportados();

                $insumos_importados->setId_DDJJ($id_ddjj);
                $insumos_importados->setDescripcion(strtoupper($object->descripcion));
                $insumos_importados->setNombre_Tecnico(strtoupper($object->nombre_tecnico));
                $insumos_importados->setId_Detalle_Arancel(strtoupper($object->nandina));
                $insumos_importados->setId_Pais($object->pais);
                $insumos_importados->setRazon_Social_Productor(strtoupper($object->productor));
                $insumos_importados->setTiene_Certificado_Origen($object->cuenta_co=="SI"?TRUE:FALSE);
                $insumos_importados->setId_Acuerdo($object->acuerdo);
                $insumos_importados->setId_unidad_medida(strtoupper($object->unidad_medida));
                $insumos_importados->setCantidad($object->cantidad);
                $insumos_importados->setValor($object->valor);
                $insumos_importados->setSobrevalor($object->sobrevalor);
                $sqlInsumosImportados->setGuardarInsumosImportados($insumos_importados);
            }
        }
    }

    public static function guardarComercializadores($comercializadores,$id_ddjj){
        $comercializador = new Comercializador();
        $sqlComercializador = new SQLComercializador();


        $comercializador->setId_ddjj($id_ddjj);
        $sqlComercializador->setEliminarComercializador($comercializador);

        $comercializadores = json_decode($comercializadores);
        if(count($comercializadores))
        {
            foreach ($comercializadores as $object) {
                $comercializador = new Comercializador();

                $comercializador->setId_ddjj($id_ddjj);
                $comercializador->setRazon_social(strtoupper($object->razon_social));
                $comercializador->setCi_nit(strtoupper($object->ci_nit));
                $comercializador->setDomicilio_legal(strtoupper($object->domicilio));
                $comercializador->setRepresentante_legal(strtoupper($object->representante_legal));
                $comercializador->setDireccion_fabrica(strtoupper($object->direccion_fabrica));
                $comercializador->setTelefono($object->telefono);
                $comercializador->setPrecio_venta($object->precio_venta);
                $comercializador->setId_unidad_medida(strtoupper($object->unidad_medida));
                $comercializador->setProduccion_mensual($object->produccion_mensual);

                $sqlComercializador->setGuardarComercializador($comercializador);
            }
        }

    }
    public static function saveZonasEspeciales($zonas_especiales,$id_ddjj){
        $ddjj_zonas_especiales = new DeclaracionJuradaZonasEspeciales();
        $sqlDeclaracionJuradaZonasEspeciales = new SQLDeclaracionJuradaZonasEspeciales();

        $ddjj_zonas_especiales->setId_ddjj($id_ddjj);
        $sqlDeclaracionJuradaZonasEspeciales->setEliminarZonasPorDdjj($ddjj_zonas_especiales);

        //foreach($zonas_especiales as $object){
            $ddjj_zonas_especiales = new DeclaracionJuradaZonasEspeciales();    
            $ddjj_zonas_especiales->setId_zonas_especiales($zonas_especiales);
            $ddjj_zonas_especiales->setId_ddjj($id_ddjj);

            $sqlDeclaracionJuradaZonasEspeciales->setGuardarDeclaracionJuradaZonasEspeciales($ddjj_zonas_especiales);
        //}
    }

    public static function  getPersonaEmpresa($id_empresa,$id_persona){
        $empresa = new Empresa();
        $sqlEmpresa = new SQLEmpresa();
        $persona = new Persona();
        $sqlPersona = new SQLPersona();
        $ciudad = new Ciudad();
        $sqlCiudad = new SQLCiudad();
        $direccion = new Direccion();
        $sqldireccion = new SQLDireccion();
        $departamento = new Departamento();
        $sqlDepartamento = new SQLDepartamento;
        
        $empresa->setId_empresa($id_empresa);
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);

        $persona->setId_persona($id_persona);
        $persona = $sqlPersona->getDatosPersonaPorId($persona);

        $direccion->setId_direccion($empresa->getDireccion());
        $direccion=$sqldireccion->getDireccionByID($direccion);
        
        $departamento->setId_departamento($direccion->getId_departamento());
        $departamento = $sqlDepartamento->getBuscarDepartamentoPorId($departamento);

        $representante = new Persona();
        $representante->setId_persona($empresa->getId_representante_legal());
        $representante = $sqlPersona->getDatosPersonaPorId($representante);

        return array($persona,$empresa,$departamento,$representante);
    }



    public static function getIniciales($id_persona){
        $persona = new Persona();
        $sqlPersona = new SQLPersona();

        $persona->setId_persona($id_persona);
        $persona = $sqlPersona->getDatosPersonaPorId($persona);

        if($persona){
            $iniciales=$persona->getNombres()[0].$persona->getPaterno()[0].$persona->getMaterno()[0];
            return $iniciales;
        }else{
            return '';
        }


    }

    public static function getZonasEspeciales($id_ddjj) {
        $sqlDeclaracionJuradaZonasEspeciales = new SQLDeclaracionJuradaZonasEspeciales();
        $ddjj_zonas_especiales = new DeclaracionJuradaZonasEspeciales();
        $sqlZonasEspeciales = new SQLZonasEspeciales();

        $zonasDescripcion = [];
        $ddjj_zonas_especiales->setId_ddjj($id_ddjj);
        $zonas = $sqlDeclaracionJuradaZonasEspeciales->getByDdjjDeclaracionJuradaZonasEspeciales($ddjj_zonas_especiales);
        foreach($zonas as $zona)
        {
            $zona_espcial = new ZonasEspeciales();
            $zona_espcial->setId_zonas_especiales($zona->getId_zonas_especiales());
            $zona_espcial=$sqlZonasEspeciales->getById($zona_espcial);

            array_push($zonasDescripcion,$zona_espcial->getDenominacion());
        }
        return $zonasDescripcion;
    }
    public static function getObservaciones($id_ddjj) {
        $observaciones_ddjj = new ObservacionesDdjj();
        $sqlObservacionesDdjj = new SQLObservacionesDdjj();

        $observaciones_ddjj->setId_ddjj($id_ddjj);
        $observaciones_ddjj = $sqlObservacionesDdjj->getListarObservacionesDdjj($observaciones_ddjj);
        return $observaciones_ddjj;
    }

    public static function saveObservacion($observacion_general) {
        $hoy=date("Y-m-d H:i:s");
        $observaciones_ddjj = new ObservacionesDdjj();
        $sqlObservacionesDdjj = new SQLObservacionesDdjj();
        //Guardar las observaciones para que corrija
        $observaciones_ddjj->setObservaciones_generales($observacion_general);
        $observaciones_ddjj->setFecha_observacion($hoy);
        $observaciones_ddjj->setId_tipo_usuario($_SESSION["tipo_usuario"]);
        $observaciones_ddjj->setId_ddjj($_REQUEST["id_ddjj"]);
        $sqlObservacionesDdjj->setGuardarObservacionesDdjj($observaciones_ddjj);
    }
    public static function setVigenciaDdjj($id_ddjj) {
        $hoy=date("Y-m-d H:i:s");
        $declaracion_jurada = new DeclaracionJurada();
        $sqlDeclaracionJurada = new SQLDeclaracionJurada();
        $servicio_exportador = new ServicioExportador();
        $sqlServicioExportador = new SQLServicioExportador();
        $acuerdo = new Acuerdo();
        $sqlAcuerdo = new SQLAcuerdo();
        $funcionesGenerales = new FuncionesGenerales();

        $declaracion_jurada->setId_ddjj($id_ddjj);
        $declaracion_jurada = $sqlDeclaracionJurada->getById($declaracion_jurada);

        $correlativo_ddjj = $sqlDeclaracionJurada->getDesignarCorrelativoDDJJ($declaracion_jurada);
        $declaracion_jurada->setId_estado_ddjj(1);
        $declaracion_jurada->setFecha_vigencia($hoy);
        $declaracion_jurada->setCorrelativo_ddjj($correlativo_ddjj[0]['max']+1);

        $acuerdo->setId_Acuerdo($declaracion_jurada->getId_acuerdo());
        $acuerdo = $sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);

        //$declaracion_jurada->setVigencia($acuerdo->getVigencia_ddjj());
        if($sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada)) {

            $correos=AdmCorreo::obtenerCorreosEmpresa($declaracion_jurada->getId_Empresa());
            $correos=explode(',',$correos);
            try{
                if(trim($correos[0])==trim($correos[1]))
                {
                    AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->razon_social,'','','',52);
                }
                else
                {
                    AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->razon_social?$declaracion_jurada->empresa->razon_social:'','','','',52);
                    AdmCorreo::enviarCorreo($correos[1],$declaracion_jurada->empresa->razon_social?$declaracion_jurada->empresa->razon_social:'','','','',52);
                }
            }catch(Exception $e){}

//            del Servicio Exportador a TRUE
            $servicio_exportador->setId_servicio_exportador($declaracion_jurada->getId_Servicio_Exportador());
            $servicio_exportador = $sqlServicioExportador->getBuscarServicioExportadorPorId($servicio_exportador);
            $servicio_exportador->setEstado(TRUE);
            $sqlServicioExportador->setGuardarServicioExportador($servicio_exportador);
          AdmDeclaracionJuradaFunctions::auditoriaDdjj(1, $declaracion_jurada->getId_ddjj(), $_SESSION['id_persona']);
           return true;
        }else{
           return false;
        }

    }
  public static function validarCancelacion($id_ddjj) {
    $declaracion_jurada = new DeclaracionJurada();
    $sqlDeclaracionJurada = new SQLDeclaracionJurada();


    $declaracion_jurada->setId_ddjj($id_ddjj);
    $declaracion_jurada = $sqlDeclaracionJurada->getById($declaracion_jurada);
    $declaracion_jurada->setId_estado_ddjj(AdmDeclaracionJurada::DDJJ_VIGENTE);

    if($sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada)) {

      $correos=AdmCorreo::obtenerCorreosEmpresa($declaracion_jurada->getId_Empresa());
      $correos=explode(',',$correos);
      try{
        if(trim($correos[0])==trim($correos[1]))
        {
          AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->razon_social,'','','',52);
        }
        else
        {
          AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->razon_social?$declaracion_jurada->empresa->razon_social:'','','','',52);
          AdmCorreo::enviarCorreo($correos[1],$declaracion_jurada->empresa->razon_social?$declaracion_jurada->empresa->razon_social:'','','','',52);
        }
      }catch(Exception $e){}

      AdmDeclaracionJuradaFunctions::terminarServicioExportador($declaracion_jurada->getId_Servicio_Exportador());
      AdmDeclaracionJuradaFunctions::auditoriaDdjj(1, $declaracion_jurada->getId_ddjj(), $_SESSION['id_persona']);
      return true;
    }else{
      return false;
    }

  }
  public static function terminarServicioExportador($id_servicio_exportador) {
    $servicio_exportador = new ServicioExportador();
    $sqlServicioExportador = new SQLServicioExportador();

    $servicio_exportador->setId_servicio_exportador($id_servicio_exportador);
    $servicio_exportador = $sqlServicioExportador->getBuscarServicioExportadorPorId($servicio_exportador);
    $servicio_exportador->setEstado(TRUE);
    $sqlServicioExportador->setGuardarServicioExportador($servicio_exportador);

  }
    public static function setVigenciaDdjjxServicioexportador_APROVE($id_servicio_exportador) {
        $hoy=date("Y-m-d H:i:s");
        $declaracion_jurada = new DeclaracionJurada();
        $declaracion_juradab = new DeclaracionJurada();
        $sqlDeclaracionJurada = new SQLDeclaracionJurada();
        $acuerdo = new Acuerdo();
        $sqlAcuerdo = new SQLAcuerdo();
        $funcionesGenerales = new FuncionesGenerales();

        $declaracion_juradab = $sqlDeclaracionJurada->getByIdServicioExportador($declaracion_juradab,$id_servicio_exportador);

        $correlativo_ddjj = $sqlDeclaracionJurada->getDesignarCorrelativoDDJJ($declaracion_juradab[0]);
        $declaracion_jurada->setId_ddjj($declaracion_juradab[0]->getId_ddjj());
        $declaracion_jurada = $sqlDeclaracionJurada->getById($declaracion_jurada);
        $declaracion_jurada->setFecha_vigencia($hoy);
        $acuerdo->setId_Acuerdo($declaracion_jurada->getId_acuerdo());
        $acuerdo = $sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
        if($declaracion_jurada->getCorrelativo_ddjj()=='')
        {
          $declaracion_jurada->setCorrelativo_ddjj($correlativo_ddjj[0]['max']+1);
        }

        if($declaracion_jurada->getMuestra()) {
          // si es muestra es 3 dias
          $declaracion_jurada->setFecha_vencimiento($funcionesGenerales->addDate(date("Y-m-d"),30));
        } else {
          $declaracion_jurada->setFecha_vencimiento($funcionesGenerales->addDate(date("Y-m-d"),$acuerdo->getVigencia_ddjj()));
        }
        $declaracion_jurada->setVigencia($acuerdo->getVigencia_ddjj());

        if($sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada)) {
            AdmDeclaracionJuradaFunctions::auditoriaDdjj(1, $declaracion_jurada->getId_ddjj(), $_SESSION['id_persona']);
           return true;
        }else{
           return false;
        }
    }
    public static function setVigenciaDdjjxServicioexportador($id_servicio_exportador) {
        
        $hoy=date("Y-m-d H:i:s");
        $declaracion_jurada = new DeclaracionJurada();
        $declaracion_juradab = new DeclaracionJurada();
        $sqlDeclaracionJurada = new SQLDeclaracionJurada();
        $servicio_exportador = new ServicioExportador();
        $sqlServicioExportador = new SQLServicioExportador();
        $acuerdo = new Acuerdo();
        $sqlAcuerdo = new SQLAcuerdo();
        $funcionesGenerales = new FuncionesGenerales();
        
        $declaracion_juradab = $sqlDeclaracionJurada->getByIdServicioExportador($declaracion_juradab,$id_servicio_exportador);

        //print_r($declaracion_juradab);
        $correlativo_ddjj = $sqlDeclaracionJurada->getDesignarCorrelativoDDJJ($declaracion_juradab[0]);
        $declaracion_jurada->setId_ddjj($declaracion_juradab[0]->getId_ddjj());
        $declaracion_jurada = $sqlDeclaracionJurada->getById($declaracion_jurada);
        $declaracion_jurada->setId_estado_ddjj(1);
        
            if($sqlDeclaracionJurada->setGuardarDdjj($declaracion_jurada)) {

            $correos=AdmCorreo::obtenerCorreosEmpresa($declaracion_jurada->getId_Empresa());
            $correos=explode(',',$correos);
            try{
                if(trim($correos[0])==trim($correos[1]))
                {
                    AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->razon_social,'','','',37);
                }
                else
                {
                    AdmCorreo::enviarCorreo($correos[0],$declaracion_jurada->empresa->razon_social?$declaracion_jurada->empresa->razon_social:'','','','',37);
                    AdmCorreo::enviarCorreo($correos[1],$declaracion_jurada->empresa->razon_social?$declaracion_jurada->empresa->razon_social:'','','','',37);
                }
            }catch(Exception $e){}


//            del Servicio Exportador a TRUE
            $servicio_exportador->setId_servicio_exportador($declaracion_jurada->getId_Servicio_Exportador());
            $servicio_exportador = $sqlServicioExportador->getBuscarServicioExportadorPorId($servicio_exportador);
            $servicio_exportador->setEstado(TRUE);
            $sqlServicioExportador->setGuardarServicioExportador($servicio_exportador);

            AdmDeclaracionJuradaFunctions::auditoriaDdjj(1, $declaracion_jurada->getId_ddjj(), $_SESSION['id_persona']);

           return true;
        }else{
           return false;
        }

    }
    public static function getCriterios($criterios) {
        if($criterios =='') return[];
        $array = explode(',',$criterios);
        $labels =[];
        $sqlCriterios = new SQLCriterioOrigen();


        foreach ($array as $id_criterio){
            $criterio =new CriterioOrigen();
            $criterio->setId_criterio_origen($id_criterio);
            $criterio = $sqlCriterios->getBuscarDescripcionPorId($criterio);
            array_push($labels, $criterio->getDescripcion());
        }
        return $labels;
    }

    public static function getPartidas($partidas){
        if($partidas!=''){
            $array = explode(',',$partidas);
            $labels =[];
            $sqlPartida = new SQLPartida();
            $sqlArancel = new SQLArancel();

            foreach ($array as $id_partida){
                $partida =new Partida();
                $partida->setId_partida($id_partida);
                $partida = $sqlPartida->getById($partida);
                if($partida){
                    $arancel = new Arancel();
                    $arancel->setId_arancel($partida->getId_arancel());
                    $arancel = $sqlArancel->getBuscarArancelPorId($arancel);

                    $partida->arancel=$arancel->getDenominacion();
                    $partida->gestion=$arancel->getGestion_Publicacion();

                    array_push($labels, $partida);
                }
            }
            return $labels;
        }else{
            return '';
        }

    }
    public static function auditoriaDdjj($id_estado,$id_ddjj,$id_persona){
        $sgc_ddjj = new SGCDdjj();
        $sgc_ddjj->setFecha_inicio_revision(date("Y-m-d h:i:sa"));
        $sgc_ddjj->setId_ddjj($id_ddjj);
        $sgc_ddjj->setEstado($id_estado);
        $sgc_ddjj->setId_certificador($id_persona);// this can be exportador or certificador depending the action
        $sgc_ddjj->save();
    }
    public static function auditoriaDdjjReasignar($data, $id_ddjj){
      $sgc_ddjj = new SGCDdjj();
      $sgc_ddjj->setFecha_inicio_revision(date("Y-m-d h:i:sa"));
      $sgc_ddjj->setId_ddjj($id_ddjj);
      $sgc_ddjj->setEstado(AdmDeclaracionJuradaFunctions::SGCDdjj_reasignar); /// estado para seguimiento
      $sgc_ddjj->setId_certificador($_SESSION['id_persona']);// this can be exportador or certificador depending the action
      $sgc_ddjj->setObservaciones(json_encode($data));
      $sgc_ddjj->save();
    }
  public static function reasignacionesAnteriores($id_ddjj){
    try{
      $sgc_ddjj = new SGCDdjj();
      $sqlDgc_ddjj = new SQLSGCDdjj();
      $sgc_ddjj->setId_ddjj($id_ddjj);
      $sgc_ddjj->setEstado((string)AdmDeclaracionJuradaFunctions::SGCDdjj_reasignar);
      $reasignaciones = $sqlDgc_ddjj->getSGCDdjjEstadoyDdjj($sgc_ddjj);



      if(!empty($reasignaciones)) {
        foreach ($reasignaciones as &$reasignacion) {
          $reasignacion->observaciones = json_decode($reasignacion->observaciones);
          if(!empty($reasignacion->observaciones) && $reasignacion->observaciones->id_partida) {
            $partida = AdmArancel::getPartida($reasignacion->observaciones->id_partida);
            $reasignacion->observaciones->partida = $partida;
          }
        }
        $vista = Principal::getVistaInstance();
        $vista->assign('reasignaciones', $reasignaciones);
        return $vista->fetch("declaracionJurada/reviewDocument/reasignarDeclaracionAnteriores.tpl");
      } else {
        return null;
      }
    } catch (Exception $e){
      return null;
    }

  }
    public static function getDireccion($id_direccion){
        $direccion = new Direccion();
        $sqlDireccion = new SQLDireccion();

        if ($direccion != null && !is_null($id_direccion)&& $id_direccion!=0){
            $direccion->setId_direccion($id_direccion);
            $direccion = $sqlDireccion->getDireccionByID($direccion);
            $departamento = new Departamento();
            $sqlDepartamento = new SQLDepartamento();
            $departamento->setId_departamento($direccion->getId_departamento());
            $departamento=$sqlDepartamento->getBuscarDepartamentoPorId($departamento);
            $direccion->setId_departamento($departamento->getNombre());

            $municipio = new Municipio();
            $sqlMunicipio = new SQLMunicipio();
            $municipio->setId_municipio($direccion->getId_municipio());
            $municipio=$sqlMunicipio->getMunicipioPorID($municipio);
            $direccion->setId_municipio($municipio->getDescripcion());

            $tipo_calle = new DireccionTipoCalle();
            $sqltipo_calle = new SQLDireccionTipoCalle();
            $tipo_calle->setId_direccion_tipo_calle($direccion->getId_direccion_tipo_calle());
            $tipo_calle = $sqltipo_calle->getDireccionTipoCalleByID($tipo_calle);
            $direccion->setId_direccion_tipo_calle($tipo_calle->getDescripcion());

            $tipo_zona = new DireccionTipoZona();
            $sqltipo_zona = new SQLDireccionTipoZona();
            $tipo_zona->setId_direccion_tipo_zona($direccion->getId_direccion_tipo_zona());
            $tipo_zona = $sqltipo_zona->getDireccionTipoZonaByID($tipo_zona);
            $direccion->setId_direccion_tipo_zona($tipo_zona->getDescripcion());


//            $tipo_dpto = new DireccionUbicacionEdificio();
//            $sqltipo_dpto = new SQLDireccionUbicacionEdificio();
//            $tipo_dpto->setId_direccion_ubicacion_edificio($direccion->getId_direccion_tipo_ubicacion_edificio());
//            $tipo_dpto=$sqltipo_dpto->getDireccionUbicacionEdificioByID($tipo_dpto);
//            $direccion->setId_direccion_tipo_ubicacion_edificio($tipo_dpto->getDescripcion());

            return $direccion;
        }else{
            return null;
        }
    }
    public static function getFabrica($id_direccion){
        $fabrica = new Fabrica();
        $sqlfabrica = new SQLFabrica();

        $fabrica->setId_direccion($id_direccion);
        $fabrica = $sqlfabrica->getByDireccion($fabrica);
        return $fabrica;
    }
    public static function addDaysReview($date) {
        $days=3;//remaining days to review the ddjj
        for ($x = 1; $x <= $days; $x++) {
            $date=date('Y-m-d', strtotime($date. ' + 1 days'));
            if(self::isWeekend($date)){
               $days++;
            }
        }
      return $date;
    }
    public static function isWeekend($date) {
        return (date('N', strtotime($date)) >= 6);
    }
    public static function verificaRevision() {
        $declaracion_jurada = new DeclaracionJurada();
        $sqlDeclaracionJurada = new SQLDeclaracionJurada();
        $declaracion_jurada->setId_estado_ddjj(0);
        $declaraciones = $sqlDeclaracionJurada->getByEstado($declaracion_jurada);
        foreach($declaraciones as $declaracion){
            $daterevision= date($declaracion->getFecha_limite_revision());
            $hoy=date("Y-m-d H:i:s");
            if($hoy>$daterevision){
                $declaracion->getId_asistente();
                $retraso_ddjj = new RetrasoDdjj();
                $retraso_ddjj->setId_Asistente($declaracion->getId_asistente());
                $retraso_ddjj->setFecha_Limite_Revision($declaracion->getFecha_limite_revision());
                $retraso_ddjj->setFecha_Registro($declaracion->getFecha_Registro());
                $retraso_ddjj->setFecha_Retraso($hoy);
                $retraso_ddjj->setId_ddjj($declaracion->getId_ddjj());
                $retraso_ddjj->save();
            }
        }
    }
  public static function verificaRevisionParaCancelar() {
    $declaracion_jurada = new DeclaracionJurada();
    $sqlDeclaracionJurada = new SQLDeclaracionJurada();
    $declaracion_jurada->setId_estado_ddjj(AdmDeclaracionJurada::DDJJ_CANCELAR);
    $declaraciones = $sqlDeclaracionJurada->getByEstado($declaracion_jurada);
    foreach($declaraciones as $declaracion){
      $datecancelacion= date($declaracion->getFecha_limite_cancelacion());
      $hoy=date("Y-m-d H:i:s");
      if($datecancelacion && $hoy>$datecancelacion){
        AdmDeclaracionJuradaFunctions::bajaDdjjporCancelacion($declaracion->getId_ddjj());
      }
    }
  }
    public static function venceDdjj() {
        $declaracion_jurada = new DeclaracionJurada();
        $sqlDeclaracionJurada = new SQLDeclaracionJurada();
        $declaracion_jurada->setId_estado_ddjj(AdmDeclaracionJurada::DDJJ_VIGENTE);
        $declaraciones = $sqlDeclaracionJurada->getByEstado($declaracion_jurada);
        foreach($declaraciones as $declaracion){
            $dateVencimiento= date($declaracion->getFecha_vencimiento());
            $hoy=date("Y-m-d H:i:s");
            if($hoy>$dateVencimiento){
                $declaracion_jurada = new DeclaracionJurada();
                $declaracion_jurada->setId_ddjj($declaracion->getId_ddjj());
                $declaracion_jurada=$sqlDeclaracionJurada->getById($declaracion_jurada);
                $declaracion_jurada->setId_estado_ddjj(AdmDeclaracionJurada::DDJJ_VENCIDA);
                $declaracion_jurada->save();
            }
        }
    }
    public function verDdjjResumen($vista,$id)
    { // devuelve una plantilla solo con los datos imporatantes de la declaracion jurada
      $ddjj = new DeclaracionJurada();
      $sqlDdjj = new SQLDeclaracionJurada();
      $ddjj->setId_ddjj($id);
      $ddjj = $sqlDdjj->getBuscarDeclaracionPorIdEmpresa($ddjj);
      $direccionRepresentanteTpl = AdmDireccion::obtenerDireccionTpl($ddjj->getId_direccion());

      $vista->assign('representanteEmpresa', $this->getPersonaEmpresa($ddjj->getId_empresa(), $ddjj->getId_persona()));
      $vista->assign('criterios', $this->getCriterios($ddjj->getId_criterios()));
      $vista->assign('partidas', $this->getPartidas($ddjj->getId_partidas_acuerdo()));
      $vista->assign('direccion', $direccionRepresentanteTpl);
      $vista->assign('fabrica', $this->getFabrica($ddjj->getId_direccion()));
      $vista->assign('ddjj', $ddjj);

      $vista->assign('ddjj_resumen', 'declaracionJurada/DeclaracionJuradaResumen.tpl');

      return 'ddjj_resumen';
    }
    public static function getDdjj($id_ddjj){//devuelve el objeto de la declaracion jurada
        $ddjj= new DeclaracionJurada();
        $sqlDdjj = new SQLDeclaracionJurada();
        $ddjj->setId_ddjj($id_ddjj);
        $ddjj = $sqlDdjj->getById($ddjj);
        return $ddjj;
    }
    public function asignaColaServicio() {

    }
    public function aprobarDdjj($id_ddjj){/// aprobar ddjj para cancelacion
        $ddjj= new DeclaracionJurada();
        $sqlDdjj = new SQLDeclaracionJurada();
        $funcionesGenerales = new FuncionesGenerales();
        $hoy = date('Y-m-d H:i:s');

        $ddjj->setId_ddjj($id_ddjj);
        $ddjj = $sqlDdjj->getBuscarDeclaracionPorIdEmpresa($ddjj);

        $ddjj->setFecha_Revision(date('Y-m-d H:i:s'));
        $ddjj->setId_estado_ddjj(AdmDeclaracionJurada::DDJJ_CANCELAR);/// verificacion aprobada
        $ddjj->setFecha_limite_cancelacion($funcionesGenerales->addDate($hoy,15));
        $ddjj->setObservacion_ddjj(trim($_REQUEST['observacion_ddjj']));
        $ddjj->setId_asistente($_SESSION['id_persona']);


        if($sqlDdjj->setGuardarDdjj($ddjj)) {
          AdmDeclaracionJuradaFunctions::terminarServicioColas($ddjj->getId_Servicio_Exportador());
          AdmDeclaracionJuradaFunctions::terminarServicioExportador($ddjj->getId_Servicio_Exportador());
            AdmDeclaracionJuradaFunctions::setVigenciaDdjjxServicioexportador_APROVE($ddjj->getId_Servicio_Exportador());
            //Envío de Correos
            $correos = AdmCorreo::obtenerCorreosEmpresa($ddjj->getId_Empresa());
            $correos = explode(',', $correos);
            if (trim($correos[0]) == trim($correos[1])) {
                AdmCorreo::enviarCorreo($correos[0], $ddjj->empresa->getRazon_social(), '', '', '', 33);
            } else {
                AdmCorreo::enviarCorreo($correos[0], $ddjj->empresa->getRazon_social(), '', '', '', 33);
                AdmCorreo::enviarCorreo($correos[1], $ddjj->empresa->getRazon_social(), '', '', '', 33);
            }

            $this->auditoriaDdjj(5, $ddjj->getId_ddjj(), $_SESSION['id_persona']);
        }

    }
    public static function terminarServicioColas($id_servicio_exportador) {
      $sistema_colas = new SistemaColas();
      $sqlSistemaColas = new SQLSistemaColas();
      $sistema_colas->setId_Servicio_Exportador($id_servicio_exportador);
      $sistema_colas=$sqlSistemaColas->getBuscarColaPorServicioExportadorAll($sistema_colas);
      foreach ($sistema_colas as $cola) {
        $cola->setAtendido(1);
        $sqlSistemaColas->setGuardarSistemaColas($cola);
      }
    }
    public function bajaDdjj($id_ddjj,$justificacion){/// dar de baja una ddjj
        $ddjj= new DeclaracionJurada();
        $sqlDdjj = new SQLDeclaracionJurada();
        $ddjj->setId_ddjj($id_ddjj);
        $ddjj = $sqlDdjj->getBuscarDeclaracionPorIdEmpresa($ddjj);

        $ddjj->setId_estado_ddjj(AdmDeclaracionJurada::DDJJ_ELIMINADA);/// declaracion jurada Eliminada

        if($ddjj->save()){
            $ddjjEliminacion = new DdjjEliminacion();
            $ddjjEliminacion->setId_ddjj($ddjj->getId_ddjj());
            $ddjjEliminacion->setId_persona($_SESSION['id_persona']);
            $ddjjEliminacion->setFecha_eliminacion(date('Y-m-d H:i:s'));
            $ddjjEliminacion->setJustificacion($justificacion);
            $ddjjEliminacion->setMotivo(1);
            $ddjjEliminacion->save();

            //
            $correos=AdmCorreo::obtenerCorreosEmpresa($ddjj->getId_Empresa());
            $correos=explode(',',$correos);
            if(trim($correos[0])==trim($correos[1]))
            {
                AdmCorreo::enviarCorreo($correos[0],$ddjj->getDenominacion_comercial(),$justificacion,'','',50);
            }
            else
            {
                AdmCorreo::enviarCorreo($correos[0],$ddjj->getDenominacion_comercial(),$justificacion,'','',50);
                AdmCorreo::enviarCorreo($correos[1],$ddjj->getDenominacion_comercial(),$justificacion,'','',50);
            }

//            $persona = new Persona();
//            $sqlPersona = new SQLPersona();
//            $persona->setId_persona($ddjj->getId_asistente());
//            $persona = $sqlPersona->getDatosPersonaPorId($persona);
//
//            AdmCorreo::enviarCorreo($persona->getEmail(),$ddjj->getDenominacion_comercial(),$justificacion,'','',50);
        }
    }
    public static function bajaDdjjporCancelacion($id_ddjj){
      try{
        $ddjj= new DeclaracionJurada();
        $sqlDdjj = new SQLDeclaracionJurada();
        $ddjj->setId_ddjj($id_ddjj);
        $ddjj = $sqlDdjj->getById($ddjj);
        $ddjj->setId_estado_ddjj(AdmDeclaracionJurada::DDJJ_ELIMINADA);/// declaracion jurada Eliminada

        if($ddjj->save()){
          $ddjjEliminacion = new DdjjEliminacion();
          $ddjjEliminacion->setId_ddjj($ddjj->getId_ddjj());
          $ddjjEliminacion->setId_persona(0);
          $ddjjEliminacion->setFecha_eliminacion(date('Y-m-d H:i:s'));
          $ddjjEliminacion->setJustificacion('Eliminacion por no Cancelacion');
          $ddjjEliminacion->setMotivo(1);
          $ddjjEliminacion->save();
        }
      } catch(Exception $e) {
      }

    }
    public function reasignaDdjjRevision($id_ddjj)
    {
      $ddjj = new DeclaracionJurada();
      $sqlDdjj = new SQLDeclaracionJurada();
      $ddjj->setId_ddjj($id_ddjj);
      $ddjj = $sqlDdjj->getById($ddjj);

      $ddjj->setId_estado_ddjj(AdmDeclaracionJurada::DDJJ_REVISAR);//estado de revision
      $servicio_exportador = AdmSistemaColas::generarServicioExportadorParaDdjj($ddjj->getId_persona(), 0, $ddjj->getId_empresa());

      $ddjj->setId_Servicio_Exportador($servicio_exportador->getId_servicio_exportador());
      $ddjj->setFecha_limite_revision($this->addDaysReview(date("Y-m-d")));//3 days for senavex revition;

      $asist_senavex = AdmSistemaColas::generarColaParaDdjjAsistente($servicio_exportador->getId_servicio_exportador(), $ddjj->getId_asistente());
      $ddjj->save();

      $this->auditoriaDdjj(0, $ddjj->getId_ddjj(), $ddjj->getId_persona());
    }
    ///bloqueo por acuerdo
    public function extraeAcuerdoSiHayBloqueo($id_empresa){
        $sqlAcuerdo = new SQLAcuerdo();
        $admEstadoEmpresa = new AdmEstadoEmpresas();
        $bloqueo = $admEstadoEmpresa->verificaSiTieneBloqueoAcuerdo($id_empresa);
        if($bloqueo){
            $acuerdos = $sqlAcuerdo->getAcuerdoSinNinguno(new Acuerdo(),true,$bloqueo->getId_acuerdo());
            $tieneBloqueo=$bloqueo;
        }else{
            $acuerdos = $sqlAcuerdo->getAcuerdoSinNinguno(new Acuerdo(),true);
            $tieneBloqueo=FALSE;
        }
        return array($acuerdos,$tieneBloqueo);
    }
    public static function getEstado($id_estado_ddjj){
      $estado_ddjj = new EstadoDdjj();
      $sql_estado_ddjj = new SQLEstadoDdjj();
      $estado_ddjj->setId_estado_ddjj($id_estado_ddjj);
      $estado_ddjj = $sql_estado_ddjj->getById($estado_ddjj);
      return $estado_ddjj->getDescripcion();
    }
}

