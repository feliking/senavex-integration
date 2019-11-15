<?php

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_CONTROLADOR . DS . 'admDeclaracionJurada' . DS . 'AdmDeclaracionJuradaFunctions.php');
include_once(PATH_CONTROLADOR . DS . 'admEmpresa' . DS . 'AdmEmpresa.php');
include_once(PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');
include_once(PATH_CONTROLADOR . DS . 'middleware' . DS . 'Condicionales.php');

include_once(PATH_TABLA . DS . 'VerVerificacion.php');
include_once(PATH_TABLA . DS . 'VerJustificacion.php');
include_once(PATH_TABLA . DS . 'VerEstadoVerificacion.php');
include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'VerCorreo.php');


include_once(PATH_MODELO . DS . 'SQLVerVerificacion.php');
include_once(PATH_MODELO . DS . 'SQLRegional.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');


class AdmVerificaciones extends Principal
{

    public function AdmVerificaciones()
    {
        $vista = Principal::getVistaInstance();
        $funcionesGenerales = new FuncionesGenerales();
        $condicionales  = new Condicionales();
        $perfil_uco=$condicionales->esPerfilUco();
        $vista->assign('perfil_uco',$perfil_uco);

        if($_REQUEST['tarea']=='verificaciones') {
            $estado = new VerEstadoVerificacion();
            $criterio = 'id_ver_estado_verificacion != 4';// todas menos las eliminiadas
            $criterio .= (!$perfil_uco?' AND id_ver_estado_verificacion != 0':'');// menos para asignar
            $estados=$estado->finder()->findAll($criterio);
            $correo = new VerCorreo();
            $correo = $correo->finder()->find('id_ver_correo = 1');


            $vista->assign('correoVerificaciones', $correo->getCorreo());
            $vista->assign('estados', $estados);
            $vista->display("admVerificaciones/Verificaciones.tpl");
            exit;
        }
        if($_REQUEST['tarea']=='listarVerificaciones'){
            if(isset($_REQUEST['estado'])) $estado=$_REQUEST['estado'];
            else $estado = 0;
            echo $this->listarVerificaiones($estado);
            exit;
        }
        if($_REQUEST['tarea']=='editarVerificacion'){
            $verificacion = new VerVerificacion();
            $sqlVerificaion = new SQLVerVerificacion();

            $functionsDdjj = new AdmDeclaracionJuradaFunctions();
            $verificacion->setId_ver_verificacion($_REQUEST['id']);
            $verificacion = $sqlVerificaion->getVerificacion($verificacion);
            $verificacion->setFecha_creacion($funcionesGenerales->formatoFecha($verificacion->getFecha_creacion()));
            ///trayendo el resumen de una declaracion jurada
            $functionsDdjj->verDdjjResumen($vista,$verificacion->getId_ddjj());
            ///trayendo el nombre de la persona que asigno la verificacion
            if($verificacion->getVerificacion_personal()){
                $persona = $this->getPersona($verificacion->getId_persona_creacion());
                $vista->assign('nombre_completo', $persona->getNombreCompleto());
                $vista->assign('persona', $persona);
            }
            ///trayendo el nombre de la persona que asigno la verificacion
            if($verificacion->getId_persona_verificacion()){
                $persona = $this->getPersona($verificacion->getId_persona_verificacion());
                $vista->assign('nombre_completo_revision', $persona->getNombreCompleto());
            }
            //trayendo regionales solo si es de perfil de la uco
            if($condicionales->esPerfilUco()){
                $this->listarRegionales($vista); //administrador UCO\
                $vista->assign('admin',TRUE);// si puede editar esta variable se muestra
            } else {
                $vista->assign('admin',FALSE);// es un analista del SENAVEX
            }
            //Trayendo las verificaciones antiguas ralizadas a esa misma empresa
            $this->verificacionesAntiguasPorEmpresa($vista,$verificacion->getId_empresa());
            //Trayendo la verifiacion si existe
            $this->getJustificacion($vista, $verificacion->getId_ver_verificacion());

            $vista->assign('verificacion', $verificacion);
            $vista->display("admVerificaciones/Verificacion.tpl");

            exit;
        }
        if($_REQUEST['tarea']=='verVerificacion'){

            $verificacion = new VerVerificacion();
            $sqlVerificaion = new SQLVerVerificacion();

            $functionsDdjj = new AdmDeclaracionJuradaFunctions();
            $verificacion->setId_ver_verificacion($_REQUEST['id']);
            $verificacion = $sqlVerificaion->getVerificacion($verificacion);
            $verificacion->setFecha_creacion($funcionesGenerales->formatoFecha($verificacion->getFecha_creacion()));

            //Trayendo las verificaciones antiguas ralizadas a esa misma empresa
            $this->verificacionesAntiguasPorEmpresa($vista,$verificacion->getId_empresa(),$verificacion->id_ver_verificacion);

            ///trayendo el nombre de la persona que asigno la verificacion
            if($verificacion->getVerificacion_personal()){
                $persona = $this->getPersona($verificacion->getId_persona_creacion());
                $vista->assign('nombre_completo', $persona->getNombreCompleto());
            }

            ///trayendo el nombre de la persona que asigno la verificacion
            if($verificacion->getId_persona_verificacion()){
                $persona = $this->getPersona($verificacion->getId_persona_verificacion());
                $vista->assign('nombre_completo_revision', $persona->getNombreCompleto());
            }
            $functionsDdjj->verDdjjResumen($vista,$verificacion->getId_ddjj());
            //trayendo la justificacion y asignandola a la vista
            $this->getJustificacion($vista, $verificacion->getId_ver_verificacion());

            $vista->assign('verificacion', $verificacion);
             //print_r($verificacion);        
            $vista->display("admVerificaciones/VerificacionPreVista.tpl");

            exit;
        }
        if($_REQUEST['tarea']=='personalRegional'){
            if(isset($_REQUEST['id_regional'])) $id_regional=$_REQUEST['id_regional'];
            echo $this->personalRegional($id_regional);
            exit;
        }
        if($_REQUEST['tarea']=='asignarPersonal'){
            if(isset($_REQUEST['id_ver_verificacion']) && isset($_REQUEST['id_persona_verificacion'])){
                $verificacion=new VerVerificacion();
                $sqlVerificaion=new SQLVerVerificacion();
                $verificacion->setId_ver_verificacion($_REQUEST['id_ver_verificacion']);
                $verificacion = $sqlVerificaion->getVerificacion($verificacion);
                $this->asignaPersona($verificacion, $_REQUEST['id_persona_verificacion']);
                echo '{"status":1,"message":"success"}';
            }else{
                echo '{"status":0,"message":"fail"}';
            }
        }
        if($_REQUEST['tarea']=='eliminarVerificacion'){
            if(isset($_REQUEST['id_ver_verificacion'])){
                $elimino=$this->eliminarVerificacion($_REQUEST['id_ver_verificacion'],$_REQUEST['justificacion']);
                if($elimino){
                    echo '{"status":1,"message":"success"}';
                }
                else{
                    echo '{"status":0,"message":"fail"}';
                }
            }else{
                echo '{"status":0,"message":"fail"}';
            }
        }
        if($_REQUEST['tarea']=='guardarInforme'){
            if(isset($_REQUEST['id_ver_verificacion'])){
                $guardo=$this->guardarInforme($_REQUEST['id_ver_verificacion'],$_REQUEST['informe']);
                if($guardo){
                    echo '{"status":1,"message":"success"}';
                }
                else{
                    echo '{"status":0,"message":"fail"}';
                }
            }else{
                echo '{"status":0,"message":"fail"}';
            }
        }
        if($_REQUEST['tarea']=='aceptarVerificacionDdjj'){
            if(isset($_REQUEST['id_ver_verificacion'])){
                $this->guardarInforme($_REQUEST['id_ver_verificacion'],$_REQUEST['informe']);
                $guardo=$this->aprovarVerificacion($_REQUEST['id_ver_verificacion'],$_REQUEST['resumen'],$_REQUEST['estado_verificacion']);
                if($guardo){
                    echo '{"status":1,"message":"success"}';
                }
                else{
                    echo '{"status":0,"message":"fail"}';
                }
            }else {
                echo '{"status":0,"message":"fail"}';
            }
        }
        if($_REQUEST['tarea']=='rechazarVerificacionDdjj'){
            if(isset($_REQUEST['id_ver_verificacion'])){
                $guardo=$this->rechazarVerificacion($_REQUEST['id_ver_verificacion'],$_REQUEST['resumen'],$_REQUEST['estado_verificacion']);
                if($guardo){
                    echo '{"status":1,"message":"success"}';
                }
                else{
                    echo '{"status":0,"message":"fail"}';
                }
            }else {
                echo '{"status":0,"message":"fail"}';
            }
            exit;
        }
        if($_REQUEST['tarea']=='guardarCorreo'){
            if(isset($_REQUEST['correo'])){
                $correo = new VerCorreo();
                $correo = $correo->finder()->find('id_ver_correo = 1');
                $correo->setCorreo($_REQUEST['correo']);
                if($correo->save()){
                    echo '{"status":1,"message":"success"}';
                }
                else{
                    echo '{"status":0,"message":"fail"}';
                }
            }else {
                echo '{"status":0,"message":"fail"}';
            }
        }
    }
    public function setVerificacion($obj){
        $verificacion = new VerVerificacion();
        if(isset($obj->id_ver_verificacion)){
            $verificacion->setId_ver_verificacion($obj->id_ver_verificacion);
            $sqlVerificacion = new SQLVerVerificacion();
            $verificacion = $sqlVerificacion->getVerificacion($verificacion);
        }

        $ddjj=AdmDeclaracionJuradaFunctions::getDdjj($obj->id_ddjj);

        $verificacion->setId_ddjj($obj->id_ddjj);
        $verificacion->setId_regional($obj->id_regional);
        $verificacion->setId_formula($obj->id_formula);
        $verificacion->setId_admision($obj->id_admision);
        $verificacion->setFecha_creacion(date('Y-m-d H:i:s'));
        $verificacion->setId_persona_creacion($_SESSION['id_persona']);
        $verificacion->setNivel($obj->nivel);
        $verificacion->setResultado($obj->resultado);
        $verificacion->setVerificacion_estricta($obj->verificacion_estricta);
        $verificacion->setVerificacion_personal($obj->verificacion_personal);
        $verificacion->setId_ver_estado_verificacion(isset($obj->estado)?$obj->estado:0);
        $verificacion->setId_empresa($ddjj->getId_Empresa());

        $correo = new VerCorreo();
        $correo = $correo->finder()->find('id_ver_correo = 1');



        if($verificacion->save()){
            AdmCorreo::enviarCorreo($correo->getCorreo(),$verificacion->getId_ver_verificacion(),'','','',51);
            $obj->id_ver_verificacion = $verificacion->getId_ver_verificacion();
            if($obj->justificacion_verificacion) $this->setJustificacion($obj);
            return $verificacion;
        }
        else return null;
    }
    public function setJustificacion($obj){
        $justificacion = new VerJustificacion();

        if(isset($obj->id_ddjj))$justificacion->setId_ddjj($obj->id_ddjj);
        if(isset($obj->justificacion_verificacion)) $justificacion->setJustificacion($obj->justificacion_verificacion);
        if(isset($obj->id_ver_verificacion)) $justificacion->setId_ver_verificacion($obj->id_ver_verificacion);
        $justificacion->setFecha_justificacion(date('Y-m-d H:i:s'));
        $justificacion->setId_persona($_SESSION['id_persona']);

        $justificacion->save();
    }
    public function getJustificacion($vista,$id_ver_verificacion){
        $justificacion = new VerJustificacion();
        $justificacion=$justificacion->finder()->find('id_ver_verificacion = '.$id_ver_verificacion);
        if($justificacion){
            $vista->assign('justificacion_personal',$justificacion->getJustificacion());
        }

    }
    public function listarVerificaiones($estado){
        $verficacion= new VerVerificacion();
        $sqlVerficacion = new SQLVerVerificacion();
        $condicional = new Condicionales();
        $esUco = $condicional->esPerfilUco();
        if($estado){
            $verficacion->setId_ver_estado_verificacion($estado);
        } else {
            $verficacion->setId_ver_estado_verificacion($esUco?0:1);
        }


        $id_persona=($esUco?FALSE:$_SESSION['id_persona']);// verificando si es de la UCO

        $verificaciones = $sqlVerficacion->getListarVerificacionesPorEstado($verficacion,$id_persona);
        $strJson = '';
        echo '[';
        foreach ($verificaciones as $datos){
            $strJson .= '{"id_ver_verificacion":"' . $datos->getId_ver_verificacion() .
                '","ddjj":"' . $datos->ddjj->denominacion_comercial .
                '","regional":"' . $datos->regional->ciudad .
                '","riesgo":"' . $datos->getNivel() .
                '","estado":"' . $datos->estado->denominacion .
                '","fecha_registro":"' . $datos->getFecha_creacion() . '"},';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    public function listarRegionales($vista){
        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        $regionales = $sqlRegional->getListarRegionales($regional,FALSE);
        $vista->assign('regionales',$regionales);
        $vista->assign('regionales_personal','admVerificaciones/AsignacionVerificaciones.tpl');
    }
    public function getPersona($id_persona){
        $persona = new Persona();
        $sqlPersona = new SQLPersona();
        $persona->setId_persona($id_persona);
        $persona = $sqlPersona->getDatosPersonaPorId($persona);
        return $persona;
    }
    public function personalRegional($regional){
        $empresaPersona= new EmpresaPersona();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        $sqlPersona= new SQLPersona();
        if(is_null($regional) or $regional==''){
            $personal = $sqlEmpresaPersona->getListarCertificadoresSenavexParaDDJJ($empresaPersona);
        }else{
            $empresaPersona->setId_regional($regional);
            $personal = $sqlEmpresaPersona->getListarCertificadoresSenavexParaDDJJRegional($empresaPersona);
        }
        $strJson = '';
        echo '[';
        foreach ($personal as $puesto){
            $persona=new Persona();
            $persona->setId_persona($puesto->getId_persona());
            $persona = $sqlPersona->getDatosPersonaPorId($persona);
            $strJson .= '{"id_persona":"' . $persona->getId_persona() .
                '","persona":"' . $persona->getNombreCompleto() . '"},';
        }

        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    public function verificaSoloUnoEnRegional($verificacion){//verificamos si solo hay uno en la regional, si hay asignamos
        $empresaPersona = new EmpresaPersona();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        $empresaPersona->setId_regional($verificacion->getId_regional());
        $perfiles = $sqlEmpresaPersona->getListarCertificadoresSenavexParaDDJJRegional($empresaPersona);
        if(count($perfiles)==1){//solo hay una persona
            $this->asignaPersona($verificacion,$perfiles[0]->getId_persona());
        }
    }
    public function asignaPersona($verificacion,$id_persona){// asigna una persona a una verificaion
        $verificacion->setId_persona_verificacion($id_persona);
        $verificacion->setFecha_asignacion_verificacion(date("Y-m-d H:i:s"));
        $verificacion->setId_ver_estado_verificacion(1);//estado asignado
        $verificacion->save();
    }
    public function eliminarVerificacion($id_ver_verificacion,$justificacion){// asigna una persona a una verificaion
        $verificacion = new VerVerificacion();
        $verificacion->setId_ver_verificacion($id_ver_verificacion);
        $sqlVerificacion = new SQLVerVerificacion();
        $verificacion = $sqlVerificacion->getVerificacion($verificacion);

        $verificacion->setId_ver_estado_verificacion(4);/// Eliminado
        $verificacion->setId_persona_elimino($_SESSION['id_persona']);
        $verificacion->setFecha_eliminacion(date('Y-m-d H:i:s'));
        $verificacion->setJustificacion($justificacion);

        $flag = $verificacion->save();

        if($flag AND $verificacion->getVerificacion_estricta()){
            $functionsDdjj = new AdmDeclaracionJuradaFunctions();
            $functionsDdjj->reasignaDdjjRevision($verificacion->getId_ddjj());
        }

        return $flag;
    }
    public function verificacionesAntiguasPorEmpresa($vista,$id_empresa,$except_id = null){
        $verificacion = new VerVerificacion();
        $sqlVerificaciones=new SQLVerVerificacion();
        $empresaVerificacion= new Empresa();
        $sqlEmpresa= new SQLEmpresa();

        $empresaVerificacion->setId_empresa($id_empresa);
        $empresaVerificacion = $sqlEmpresa->getEmpresaPorID($empresaVerificacion);

        $verificacion->setId_empresa($id_empresa);
        $verificaciones= $sqlVerificaciones->getVerificacionesAntiguasPorEmpresa($verificacion, $except_id);

        $vista->assign('verificaciones',$verificaciones);
        $vista->assign('empresaVerificacion',$empresaVerificacion);
        if(count($verificaciones)>1){
          $vista->assign('verificaciones_antiguas','admVerificaciones/VerificacionesAntiguasa.tpl');
        }
    }
    public function guardarInforme($id_ver_verificacion, $informe){
        $verificacion = new VerVerificacion();
        $verificacion->setId_ver_verificacion($id_ver_verificacion);
        $sqlVerificacion = new SQLVerVerificacion();
        $verificacion = $sqlVerificacion->getVerificacion($verificacion);

        $verificacion->setInforme($informe);/// Eliminado
        return ($verificacion->save());
    }
    public function procesaVerificacion($request_verificacion,$declaracion_jurada){ /// logica para la verificacion la momento de aprobar una ddjj
        $verificacion = json_decode($request_verificacion);

        if($verificacion->verificacion){// si requiere verificacion
            $verificacion->id_ddjj=$declaracion_jurada->getId_ddjj();
            $verificacion->id_regional=$declaracion_jurada->getId_regional();
            $verificacionObj=$this->setVerificacion($verificacion);// guardamos la verificaion
            $this->verificaSoloUnoEnRegional($verificacionObj);// verificamos si solo hay una persona en la regional
            if($verificacionObj->getVerificacion_estricta())//pausamos el flujo cambiandole de estado
            {
                $declaracion_jurada->setId_estado_ddjj(AdmDeclaracionJurada::DDJJ_VISITA);//estado de pause hasta que se realize la visita de verificaicon
            }
        }
//        elseif($verificacion->verificacion_personal) { // no requiere verificacion pero fue impedida por una persona
//            $verificacion->id_ddjj=$declaracion_jurada->getId_ddjj();
//            $this->setJustificacion($verificacion);
//        }

        return $declaracion_jurada;
    }
    public function aprovarVerificacion($id_ver_verificacion,$resumen,$estado_verificacion){
        $verificacion = new VerVerificacion();
        $verificacion->setId_ver_verificacion($id_ver_verificacion);
        $sqlVerificacion = new SQLVerVerificacion();
        $verificacion = $sqlVerificacion->getVerificacion($verificacion);

        $admEmpresa = new AdmEmpresa();
        $admEmpresa->AsignaUltimaVerificacion($verificacion->getId_empresa());

        $verificacion->setId_ver_estado_verificacion($estado_verificacion=='true'?2:3);//estado aprovado o eliminado
        $verificacion->setResumen($resumen);/// Eliminado
        $verificacion->setConclusion_ddjj('aprobo ddjj');// si es que aprobo o no la declaracion jurada
        $verificacion->setFecha_verificacion(date("Y-m-d H:i:s"));

        //-----------
        if($verificacion->getVerificacion_estricta()){
            $functionsDdjj = new AdmDeclaracionJuradaFunctions();
            $functionsDdjj->aprobarDdjj($verificacion->getId_ddjj());/// se aprobara la ddjj y se la enviara a proceso de verificacion.
        }

        return ($verificacion->save());

    }
    public function rechazarVerificacion($id_ver_verificacion,$resumen,$estado_verificacion){
        $verificacion = new VerVerificacion();
        $verificacion->setId_ver_verificacion($id_ver_verificacion);
        $sqlVerificacion = new SQLVerVerificacion();
        $verificacion = $sqlVerificacion->getVerificacion($verificacion);

        $admEmpresa = new AdmEmpresa();
        $admEmpresa->AsignaUltimaVerificacion($verificacion->getId_empresa());

        $verificacion->setId_ver_estado_verificacion($estado_verificacion=='true'?2:3);//estado aprovado o eliminado
        $verificacion->setResumen($resumen);/// Eliminado
        $verificacion->setConclusion_ddjj('rechazo ddjj');// si es que aprobo o no la declaracion jurada
        $verificacion->setFecha_verificacion(date("Y-m-d H:i:s"));

        //-----------
        $functionsDdjj = new AdmDeclaracionJuradaFunctions();
        $functionsDdjj->bajaDdjj($verificacion->getId_ddjj(),'La visita de Verificación rechazo la declaración jurada.');/// se da de baja la declaracion jurada
        //-----------
      $ddjj = AdmDeclaracionJuradaFunctions::getDdjj($verificacion->getId_ddjj());
      AdmDeclaracionJuradaFunctions::terminarServicioExportador($ddjj->getId_Servicio_Exportador());
      AdmDeclaracionJuradaFunctions::terminarServicioColas($ddjj->getId_Servicio_Exportador());

        return ($verificacion->save());
    }
}
