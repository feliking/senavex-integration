<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 23-09-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_TABLA . DS . 'SistemaColas.php');
include_once(PATH_TABLA . DS . 'ServicioExportador.php');
include_once(PATH_TABLA . DS . 'Servicio.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_MODELO . DS . 'SQLSistemaColas.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLServicioExportador.php');
include_once(PATH_MODELO . DS . 'SQLServicio.php');

class AdmSistemaColas extends Principal {

  public function AdmSistemaColas() {

    $vista = Principal::getVistaInstance();

    $sistema_colas = new SistemaColas();
    $servicio_exportador = new ServicioExportador();
    $persona =  new Persona();

    $sqlSistemaColas = new SQLSistemaColas();
    $sqlServicioExportador = new SQLServicioExportador();
    $sqlPersona = new SQLPersona();
    
    if($_REQUEST['tarea']=='listarColaAsistenteGeneral'){
        $sistema_colas->setId_Asistente($_SESSION["id_persona"]);
        $resultado = $sqlSistemaColas->getListarColaAsistenteGeneral($sistema_colas);
        
        //var_dump($resultado);
        if (!empty($resultado)){
            $vista->assign('colaAsistente', $resultado);
        }
        else {
            $vista->assign('colaAsistente', 0);
        }
        exit;
    }
    
    if($_REQUEST['tarea']=='listarColaAsistenteRuex'){
        $sistema_colas->setId_Asistente($_SESSION["id_persona"]);
        $resultado = $sqlSistemaColas->getListarColaAsistenteRuex($sistema_colas);
        
        //var_dump($resultado);
        if (!empty($resultado)){
            $vista->assign('colaAsistente', $resultado);
        }
        else {
            $vista->assign('colaAsistente', 0);
        }
        exit;
    }
  }
  public static function redistribucionColaAsistente($id_persona) // te redistribuye todas tus colas entre los demas asistentes 
  {
    $sistema_colas = new SistemaColas();
    $sqlSistemaColas = new SQLSistemaColas();

    $sistema_colas->setId_Asistente($id_persona);
    $colas = $sqlSistemaColas->getListarColasAsistente($sistema_colas);
    foreach ($colas as $cola) {
        //------ se tiene que sacar el servicio_exportador  para sacar el tipo de sevicio que sera
        $servicio_exportador = new ServicioExportador();
        $sqlServicioExportador = new SQLServicioExportador();

        $servicio_exportador->setId_servicio_exportador($cola->getId_servicio_exportador());
        $servicio_exportador=$sqlServicioExportador->getBuscarServicioExportadorPorId($servicio_exportador);
        $tiposervicio=$servicio_exportador->getId_servicio();

        $empresa_persona = new EmpresaPersona();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        if($tiposervicio=='1' or $tiposervicio=='2' or $tiposervicio=='4')
        {
            $certificadores = $sqlEmpresaPersona->getListarCertificadoresSenavexParaRuex($empresa_persona);
            //echo 'ruex';
        }
        elseif ($tiposervicio=='3') 
        {
            $certificadores = $sqlEmpresaPersona->getListarCertificadoresSenavexParaDDJJ($empresa_persona);
            //echo 'ddjj';
        }
        elseif ($tiposervicio=='5' or $tiposervicio=='6') 
        {
             $certificadores = $sqlEmpresaPersona->getListarCertificadoresSenavexParaCO($empresa_persona);
             //echo 'co';
        }


        //Crear dos variables para almacenar el Certificador($certif) y quien tiene la menor carga laboral($suma_certif)
        $certif=0; $suma_certif=9999999;
        foreach ($certificadores as $certif) {
            $pers = $certif->getId_Persona();
            $suma_cola = $sqlSistemaColas->getSumarColaAsistenteGeneral($sistema_colas, $pers);
            //echo $suma_cola[0]["suma"];

            if($suma_cola[0]["suma"]==NULL){
                $suma_certif=0;
                $certificador = $pers;
                break;
            }else{
                if($suma_cola[0]["suma"]<$suma_certif){
                    $suma_certif=$suma_cola[0]["suma"];
                    $certificador=$pers;
                }
            }
        }
        $cola->setId_Asistente($certificador);
        $sqlSistemaColas->setGuardarSistemaColas($cola);
    }
  }
  public static function listarColaAsistentePorServicio($id_persona,$id_servicio)
  {
        $sistema_colas = new SistemaColas();
        $sqlSistemaColas = new SQLSistemaColas();
        $sistema_colas->setId_Asistente($id_persona);
       
        $resultado = $sqlSistemaColas->getListarColaAsistentePorServicio($sistema_colas,$id_servicio);
        if (!empty($resultado)){
            return $resultado;
        }
        else {
            return null;
        }
  }

  public static function listarColaAsistentePorTemporales($id_persona)
  {
      
        $sistema_colas = new SistemaColas();
        $sqlSistemaColas = new SQLSistemaColas();
        $sistema_colas->setId_Asistente($id_persona);
       
        $resultado = $sqlSistemaColas->getListarColaAsistentePorTemporales($sistema_colas);
        if (!empty($resultado)){
            return $resultado;
        }
        else {
            return null;
        }
  }
  public static function listarColaAsistentePorDDJJ($id_persona)
  {
        $sistema_colas = new SistemaColas();
        $sqlSistemaColas = new SQLSistemaColas();
        $sistema_colas->setId_Asistente($id_persona);
       
        $resultado = $sqlSistemaColas->getListarColaAsistentePorDdjj($sistema_colas);
        if (!empty($resultado)){
            return $resultado;
        }
        else {
            return null;
        }
  }
  public static function listarColaAsistentePorTemporalesModificacion($id_persona)
  {
      
        $sistema_colas = new SistemaColas();
        $sqlSistemaColas = new SQLSistemaColas();
        $sistema_colas->setId_Asistente($id_persona);
       
        $resultado = $sqlSistemaColas->getListarColaAsistentePorTemporalesModificacion($sistema_colas);
        
        if (!empty($resultado)){
            return $resultado;
        }
        else {
            return null;
        }
  }
  
  public static function generarColaParaAsistente($id_persona)
  {
        $sistema_colas = new SistemaColas();
        $sqlSistemaColas = new SQLSistemaColas();
        $sistema_colas->setId_Asistente($id_persona);
       
        $resultado = $sqlSistemaColas->getListarColaAsistentePorTemporales($sistema_colas);
        if (!empty($resultado)){
            return $resultado;
        }
        else {
            return null;
        }
  }
  
  /***** Generar el Servicio Exportador para la DDJJ****/
  public static function generarServicioExportadorParaDdjj($id_persona,$costo_total,$id_empresa)
  {
        $hoy=date("Y-m-d h:i:s");
        $servicio_exportador = new ServicioExportador();
        $sqlServicioExportador = new SQLServicioExportador();
        
        $servicio_exportador->setId_Servicio(3);
        $servicio_exportador->setFecha_Servicio($hoy);
        $servicio_exportador->setId_Persona($id_persona);
        $servicio_exportador->setEstado(FALSE);
        $servicio_exportador->setCosto_Actual($costo_total);
        $servicio_exportador->setId_Empresa($id_empresa);
        
        if($sqlServicioExportador->setGuardarServicioExportador($servicio_exportador)){
            $datServicioExportador = $sqlServicioExportador->getBuscarServicioExportadorPorId($servicio_exportador);
            return $datServicioExportador->getId_servicio_exportador();
        }
        else{
            return null;
        }
  }
  
  public static function generarColaParaDdjj($serv_export,$cantidad_ddjj)
  {
        $sistema_colas = new SistemaColas();
        $empresa_persona = new EmpresaPersona();
        $sqlSistemaColas = new SQLSistemaColas();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        
        $certificadoresddjj = $sqlEmpresaPersona->getListarCertificadoresSenavexParaDDJJ($empresa_persona);
        
        //Crear dos variables para almacenar el Certificador($certif) y quien tiene la menor carga laboral($suma_certif)
        $certif=0; $suma_certif=9999999;
        foreach ($certificadoresddjj as $certif_ddjj) {
            $pers = $certif_ddjj->getId_Persona();
            $suma_cola = $sqlSistemaColas->getSumarColaAsistenteGeneral($sistema_colas, $pers);
            //echo $suma_cola[0]["suma"];
            
            if($suma_cola[0]["suma"]==NULL){
                $suma_certif=0;
                $certif = $pers;
                break;
            }else{
                if($suma_cola[0]["suma"]<$suma_certif){
                    $suma_certif=$suma_cola[0]["suma"];
                    $certif=$pers;
                }
            }
        }
        
        //Calcular la valoración de las ddjj de acuerdo a la cantidad de acuerdos solicitados
        //Por defecto la valoración de cada ddjj es 3, por eso se multiplica por 3
        $cantidad_ddjj = $cantidad_ddjj * 3;
        
        //Cargar los valores para generar la cola
        $sistema_colas->setId_Servicio_Exportador($serv_export);
        $sistema_colas->setId_Asistente($certif);
        $sistema_colas->setValoracion($cantidad_ddjj);
        $sistema_colas->setAtendido(0);
        
        if($sqlSistemaColas->setGuardarSistemaColas($sistema_colas)){
            return $certif;
        }
        else{
            return 0;
        }
  }
  
  //-------------------------generar el servicio para el ruex----------------------------------
  public static function generarServicioExportadorParaRuex($costo_total,$id_empresa)
  {
       
        $hoy=date("Y-m-d h:i:s");
        $servicioexportador = new ServicioExportador();
        $sqlServicioExportador = new SQLServicioExportador();
        
        $servicioexportador->setId_servicio(1);
        $servicioexportador->setFecha_Servicio($hoy);
        $servicioexportador->setId_Persona(0);
        //$servicioexportador->setEstado(FALSE);
        $servicioexportador->setCosto_Actual($costo_total);
        $servicioexportador->setId_empresa($id_empresa);

        if($sqlServicioExportador->setGuardarServicioExportador($servicioexportador))
        {
                return $servicioexportador->getId_servicio_exportador();
        }
        else
        {
            return null;
        }
        
  }
  public static function generarServicioExportadorParaRuex2($costo_total,$id_servicio,$id_empresa)
  {
       
        $hoy=date("Y-m-d h:i:s");
        $servicioexportador = new ServicioExportador();
        $sqlServicioExportador = new SQLServicioExportador();
        
        $servicioexportador->setId_servicio($id_servicio);
        $servicioexportador->setFecha_Servicio($hoy);
        $servicioexportador->setId_Persona(0);
        //$servicioexportador->setEstado(FALSE);
        $servicioexportador->setCosto_Actual($costo_total);
        $servicioexportador->setId_empresa($id_empresa);

        if($sqlServicioExportador->setGuardarServicioExportador($servicioexportador))
        {
                return $servicioexportador->getId_servicio_exportador();
        }
        else
        {
            return null;
        }
        
  }
  public static function generarServicioExportadorParaRuexPorServicio($id_servicio,$id_persona,$id_empresa)
  {
       
        $hoy=date("Y-m-d h:i:s");
        $servicioexportador = new ServicioExportador();
        $sqlServicioExportador = new SQLServicioExportador();
        
        $servicio=new Servicio();
        $sqlServicio=new SQLServicio();
        
        $servicio->setId_servicio($id_servicio);
        $servicio=$sqlServicio->getBuscarServicioPorId($servicio);
        
        $servicioexportador->setId_servicio($id_servicio);
        $servicioexportador->setFecha_Servicio($hoy);
        $servicioexportador->setId_Persona($id_persona);
        $servicioexportador->setEstado(FALSE);
        $servicioexportador->setCosto_Actual($servicio->getCosto());
        $servicioexportador->setId_empresa($id_empresa);
        if($sqlServicioExportador->setGuardarServicioExportador($servicioexportador))
        {
                return $servicioexportador->getId_servicio_exportador();
        }
        else
        {
            return null;
        }
        
  }
  public static function generarColaParaRuex($serv_export)
  {
        $sistema_colas = new SistemaColas();
        $empresa_persona = new EmpresaPersona();
        $sqlSistemaColas = new SQLSistemaColas();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        
        $certificadoresruex = $sqlEmpresaPersona->getListarCertificadoresSenavexParaRuex($empresa_persona);
        
        //Crear dos variables para almacenar el Certificador($certif) y quien tiene la menor carga laboral($suma_certif)
        $certif=0; $suma_certif=9999999;
        foreach ($certificadoresruex as $certif_ruex) {
            $pers = $certif_ruex->getId_Persona();
            $suma_cola = $sqlSistemaColas->getSumarColaAsistenteGeneral($sistema_colas, $pers);
            if($suma_cola[0]["suma"]==NULL){
                $suma_certif=0;
                $certif = $pers;
                break;
            }else{
                if($suma_cola[0]["suma"]<$suma_certif){
                    $suma_certif=$suma_cola[0]["suma"];
                    $certif=$pers;
                }
            }
        }
        
        //Cargar los valores para generar la cola
        $sistema_colas->setId_Servicio_Exportador($serv_export);
        $sistema_colas->setId_Asistente($certif);
        $sistema_colas->setValoracion(1);
        $sistema_colas->setAtendido(0);
        
        if($sqlSistemaColas->setGuardarSistemaColas($sistema_colas)){
            return $certif;
        }
        else{
            return 0;
        }
  }
   public static function generarColaParaRuexDirecta($serv_export,$id_persona)
  {
        $sistema_colas = new SistemaColas();
        $sqlSistemaColas = new SQLSistemaColas();
        
        $sistema_colas->setId_Servicio_Exportador($serv_export);
        $sistema_colas->setId_Asistente($id_persona);
        $sistema_colas->setValoracion(1);
        $sistema_colas->setAtendido(0);
        
        if($sqlSistemaColas->setGuardarSistemaColas($sistema_colas)){
            return $id_persona;
        }
        else{
            return 0;
        }
  }
  public static function desactivarServicioExportadorColaParaRuex($id_empresa)
  {
        $servicioexportador = new ServicioExportador();
        $sqlServicioExportador = new SQLServicioExportador();
        
        $servicioexportador->setId_empresa($id_empresa);
        $servicioexportador=$sqlServicioExportador->getBuscarServicioRuex($servicioexportador);
   
        if($servicioexportador)
        {
            $servicioexportador->setEstado(true);
            if($sqlServicioExportador->setGuardarServicioExportador($servicioexportador))
            {
                $sistema_colas = new SistemaColas();
                $sqlSistemaColas = new SQLSistemaColas();

                $sistema_colas->setId_Servicio_Exportador($servicioexportador->getId_servicio_exportador());
                $sistema_colas=$sqlSistemaColas->getBuscarColaPorServicioExportador($sistema_colas);
                $sistema_colas->setAtendido(2);
                if($sqlSistemaColas->setGuardarSistemaColas($sistema_colas)){
                    return $servicioexportador->getId_servicio_exportador();
                }
                else{
                    return NULL;
                }
            }
        }
  }
   //--------------generar el servicio de modificacion de datos del senavex-------------------------------------------
  public static function generarServicioExportadorParaModificacionEmpresa($costo_total,$id_empresa,$estado)
  {
       
        $hoy=date("Y-m-d h:i:s");
        $servicioexportador = new ServicioExportador();
        $sqlServicioExportador = new SQLServicioExportador();
        
        $servicioexportador->setId_servicio($estado);
        $servicioexportador->setFecha_Servicio($hoy);
        $servicioexportador->setId_Persona(0);
        $servicioexportador->setEstado(FALSE);
        $servicioexportador->setCosto_Actual($costo_total);
        $servicioexportador->setId_empresa($id_empresa);
        if($sqlServicioExportador->setGuardarServicioExportador($servicioexportador))
        {
            return $servicioexportador->getId_servicio_exportador();
        }
        else
        {
            return null;
        }     
  }
  public static function generarColaParaModificacionEmpresa($serv_export)
  {
        $sistema_colas = new SistemaColas();
        $empresa_persona = new EmpresaPersona();
        $sqlSistemaColas = new SQLSistemaColas();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        
        $certificadoresruex = $sqlEmpresaPersona->getListarCertificadoresSenavexParaRuex($empresa_persona);
        
        //Crear dos variables para almacenar el Certificador($certif) y quien tiene la menor carga laboral($suma_certif)
        $certif=0; $suma_certif=9999999;
        foreach ($certificadoresruex as $certif_ruex) {
            $pers = $certif_ruex->getId_Persona();
            $suma_cola = $sqlSistemaColas->getSumarColaAsistenteGeneral($sistema_colas, $pers);
            //echo $suma_cola[0]["suma"];
            
            if($suma_cola[0]["suma"]==NULL){
                $suma_certif=0;
                $certif = $pers;
                break;
            }else{
                if($suma_cola[0]["suma"]<$suma_certif){
                    $suma_certif=$suma_cola[0]["suma"];
                    $certif=$pers;
                }
            }
        }
        
        //Cargar los valores para generar la cola
        $sistema_colas->setId_Servicio_Exportador($serv_export);
        $sistema_colas->setId_Asistente($certif);
        $sistema_colas->setValoracion(1);
        $sistema_colas->setAtendido(0);
        if($sqlSistemaColas->setGuardarSistemaColas($sistema_colas)){
            return $certif;
        }
        else{
            return 0;
        }
  }
   public static function desactivarServicioExportadorColaParaModificacionEmpresa($id_empresa)
  {
        $servicioexportador = new ServicioExportador();
        $sqlServicioExportador = new SQLServicioExportador();
        
        $servicioexportador->setId_empresa($id_empresa);
        $servicioexportador=$sqlServicioExportador->getBuscarServicioRuexModificacion($servicioexportador);
        
        if($servicioexportador)
        {
            $servicioexportador->setEstado(true);
            if($sqlServicioExportador->setGuardarServicioExportador($servicioexportador))
            {
                $sistema_colas = new SistemaColas();
                $sqlSistemaColas = new SQLSistemaColas();

                $sistema_colas->setId_Servicio_Exportador($servicioexportador->getId_servicio_exportador());
                $sistema_colas=$sqlSistemaColas->getBuscarColaPorServicioExportador($sistema_colas);
                $sistema_colas->setAtendido(2);
                if($sqlSistemaColas->setGuardarSistemaColas($sistema_colas)){
                    return $sistema_colas;
                }
                else{
                    return NULL;
                }
            }
        }
  }
  /***** Generar el Servicio Exportador para la DDJJ****/
  public static function generarServicioExportadorParaCO($id_persona,$costo_total,$id_empresa,$valor_fob)
  {
        $hoy=date("Y-m-d h:i:s");
        $servicio_exportador = new ServicioExportador();
        $servicio = new Servicio();
        $sqlServicioExportador = new SQLServicioExportador();
        $sqlServicio = new SQLServicio();
        
        $servicio_exportador->setId_Servicio(5);
        $servicio_exportador->setFecha_Servicio($hoy);
        $servicio_exportador->setId_Persona($id_persona);
        $servicio_exportador->setEstado(FALSE);
        
        if($valor_fob>750){
            $servicio->setId_servicio(5);
        }else{
            $servicio->setId_servicio(6);
        }
        $servicio=$sqlServicio->getBuscarServicioPorId($servicio);
        $costo_total = $servicio->getCosto();
        //$costo_total = $costo_total + $servicio->getCosto();
        
        $servicio_exportador->setCosto_Actual($costo_total);
        $servicio_exportador->setId_Empresa($id_empresa);
        
        if($sqlServicioExportador->setGuardarServicioExportador($servicio_exportador)){
            $datServicioExportador = $sqlServicioExportador->getBuscarServicioExportadorPorId($servicio_exportador);
            return $datServicioExportador->getId_servicio_exportador();
        }
        else{
            return null;
        }
  }
  
  public static function generarColaParaCO($serv_export)
  {
        $sistema_colas = new SistemaColas();
        $empresa_persona = new EmpresaPersona();
        $sqlSistemaColas = new SQLSistemaColas();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        
        $certificadoresco = $sqlEmpresaPersona->getListarCertificadoresSenavexParaCO($empresa_persona);
        
        //Crear dos variables para almacenar el Certificador($certif) y quien tiene la menor carga laboral($suma_certif)
        $certif=0; $suma_certif=9999999;
        foreach ($certificadoresco as $certif_co) {
            $pers = $certif_co->getId_Persona();
            $suma_cola = $sqlSistemaColas->getSumarColaAsistenteGeneral($sistema_colas, $pers);
            //echo $suma_cola[0]["suma"];
            
            if($suma_cola[0]["suma"]==NULL){
                $suma_certif=0;
                $certif = $pers;
                break;
            }else{
                if($suma_cola[0]["suma"]<$suma_certif){
                    $suma_certif=$suma_cola[0]["suma"];
                    $certif=$pers;
                }
            }
        }
        
        //Cargar los valores para generar la cola
        $sistema_colas->setId_Servicio_Exportador($serv_export);
        $sistema_colas->setId_Asistente($certif);
        $sistema_colas->setValoracion(2);
        $sistema_colas->setAtendido(0);
        
        if($sqlSistemaColas->setGuardarSistemaColas($sistema_colas)){
            return $certif;
        }
        else{
            return 0;
        }
  }

  
  
}