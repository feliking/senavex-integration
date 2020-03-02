<?php

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'VerFormula.php');
include_once(PATH_TABLA . DS . 'VerVariable.php');
include_once(PATH_TABLA . DS . 'VerVariableValor.php');
include_once(PATH_TABLA . DS . 'VerRango.php');
include_once(PATH_TABLA . DS . 'VerAdmision.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');

include_once(PATH_MODELO . DS . 'SQLVerFormula.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLVerVariable.php');
include_once(PATH_MODELO . DS . 'SQLVerVariableValor.php');
include_once(PATH_MODELO . DS . 'SQLVerRango.php');
include_once(PATH_MODELO . DS . 'SQLVerAdmision.php');


class AdmAnalisisRiesgo extends Principal
{

    public function AdmAnalisisRiesgo()
    {
        $vista = Principal::getVistaInstance();
        $today = date("Y-m-d h:m:s");
        $funcionesGenerales = new FuncionesGenerales();

        if($_REQUEST['tarea']=='analisisContenido'){
            $vista->assign("tab",$_REQUEST['tab']?$_REQUEST['tab']:'formula');
            $vista->display("admVerificaciones/ContenedorAnalisis.tpl");
            exit;
        }
        if ($_REQUEST['tarea'] == 'formula') {
            $formula = new VerFormula();
            $sqlFormula = new SQLVerFormula();
            $formula=$sqlFormula->getFormulaVigente($formula);

            $variable = new VerVariable();
            $sqlVariable = new SQLVerVariable();

            $variables=$sqlVariable->getVariablesActivas($variable);

            $vista->assign('formula',$formula);
            $vista->assign('variables',$variables);
            $vista->display("admVerificaciones/Formula.tpl");
            exit;
        }
        if ($_REQUEST['tarea'] == 'guardarFormula') {
            $formula = new VerFormula();
            $sqlFormula = new SQLVerFormula();

            $formula=$sqlFormula->getFormulaVigente($formula);
            $formula->setEstado(FALSE);
            $formula->setId_persona_baja($_SESSION['id_persona']);
            $formula->setFecha_baja($today);
            $formula->save();

            $formula = new VerFormula();

            $formula->setFormula($_REQUEST['formula']);
            $formula->setVariables($_REQUEST['variables']);
            $formula->setFecha_alta($today);
            $formula->setId_persona_alta($_SESSION['id_persona']);
            $formula->setEstado(TRUE);
            $formula->setJustificativo($_REQUEST['justificativo']);

            if($formula->save()){
                echo '{"status":"1","message":"La formula se guardo satisfactoriamente."}';
            }
            else{
                echo '{"status":"0","message":"Error al guardar la formula."}';
            }
        }

        if ($_REQUEST['tarea'] == 'variablesriesgo') {

            $admision= new VerAdmision();
            $sqlAdmision = new SQLVerAdmision();
            $admisiones = $sqlAdmision->getAdmisionesActivas($admision);
            $vista->assign('admisiones',$admisiones);
            $vista->display('admVerificaciones/Variables.tpl');
            exit;
        }
        if ($_REQUEST['tarea'] == 'listarVariables') {
            $variable=new VerVariable();
            $sqlVariable= new SQLVerVariable();
            $variable->setModulo_dep($_REQUEST['modulo_dep']);
            $variables = $sqlVariable->getVariablesActivasModulo($variable);

            $strJson = '[';
            foreach ($variables as $variable){
                $strJson .= '{"id_ver_variable":"' . $variable->getId_ver_variable() .
                    '","variable":"' . $variable->getVariable() .
                    '","descripcion":"' . $variable->getDescripcion() .
                    '","ayuda":"' . $variable->getAyuda() .
                    '","estado":"' . ($variable->getEstado()==''?'Inactivo':'Activo'). '"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson.']';
            exit;
        }
        if ($_REQUEST['tarea'] == 'guardarVariable') {
            $variable=new VerVariable();
            $sqlVariable= new SQLVerVariable();
            $variable->setId_ver_variable($_REQUEST['id_ver_variable']);
            $variable = $sqlVariable->getVariable($variable);
            if($_REQUEST['variable']) $variable->setVariable($_REQUEST['variable']);
            if($_REQUEST['descripcion']) $variable->setDescripcion($_REQUEST['descripcion']);
            if($_REQUEST['ayuda']) $variable->setAyuda($_REQUEST['ayuda']);
            if($_REQUEST['variable']) $variable->setEstado(($_REQUEST['estado']=="Activo"?TRUE:FALSE));

            if($variable->save()){
                echo '{"status":"1","message":"La variable se guardo satisfactoriamente."}';
            }
            else{
                echo '{"status":"0","message":"Error al guardar la variable."}';
            }
        }

        if ($_REQUEST['tarea'] == 'historialFormulas') {
            $formula= new VerFormula();
            $sqlFormula= new SQLVerFormula();

            $formulas = $sqlFormula->getFormulas($formula);
            $sqlPersona = new SQLPersona();
            foreach($formulas as &$formula){
                $formula->setFecha_alta(date('d/m/y',strtotime($formula->getFecha_alta())));
                $formula->setFecha_baja(date('d/m/y',strtotime($formula->getFecha_baja())));


                $persona = new Persona();
                $persona->setId_persona($formula->getId_persona_alta());
                $persona = $sqlPersona->getDatosPersonaPorId($persona);
                $formula->setId_persona_alta($persona);
                $persona = new Persona();
                $persona->setId_persona($formula->getId_persona_baja());
                $persona = $sqlPersona->getDatosPersonaPorId($persona);
                $formula->setId_persona_baja($persona);
            }

            $vista->assign('formulas',$formulas);
            $vista->display('admVerificaciones/Historial.tpl');
            exit;
        }

        if ($_REQUEST['tarea'] == 'editarValores') {
            $variable = new VerVariable();
            $sqlVariable = new SQLVerVariable();
            $variable->setId_ver_variable($_REQUEST['id_ver_variable']);
            $variable = $sqlVariable->getVariable($variable);


            switch ($variable->getId_ver_tipo_variable()){
                case 1:// variables booleanas
                    foreach ($variable->valores_booleanos as &$valor) {
                        $valor->setValor($funcionesGenerales->setInverseComma($valor->getValor()));
                    }
                break;
                case 2://variables de rango
                break;
                case 3://variables de opciones
                    $opciones=$this->variablesOpcionales( ucfirst($variable->getTabla_modelo()));
                    $vista->assign('opciones',$opciones);
                break;
                case 4://variables de aranceles
                break;
            }
            $vista->assign('variable',$variable);
            $vista->display('admVerificaciones/Variable.tpl');
            exit;
        }
        if ($_REQUEST['tarea'] == 'guardarValores') {
            $message = '{"status":1,"message":"Se guardo los valores correctamente."}';
            switch($_REQUEST['id_ver_tipo_variable']) {
                case 1://variables booleanasd
                    $variableValor = new VerVariableValor();
                    $sqlVariableValor = new SQLVerVariableValor();
                    $variableValor->setId_ver_variable($_REQUEST['id_ver_variable']);
                    $valores = $sqlVariableValor->getValoresbyVariable($variableValor);
                    foreach ($valores as &$valor) {
                        $request_valor = $_REQUEST['valor_' . $valor->getId_ver_variable_valor()];
                        $valor->setValor($funcionesGenerales->setNumeric($request_valor));
                        if (!$valor->save()) $message = '{"status":0,"message":"No se pudo guardar los valores"}';
                    }
                break;
                case 2://variables rango
                    $array=json_decode($_REQUEST['rangoArray']);
                    $sqlVarRango= new SQLVerRango();
                    foreach($array as $id_rango){
                        $variableValor = new VerRango();
                        if(substr($id_rango,0,1)!='n'){
                            $variableValor->setId_ver_rango((int)$id_rango);
                            $variableValor = $sqlVarRango->getRango($variableValor);
                        }
                        if(isset($_REQUEST['max_'.$id_rango])) $variableValor->setMax($_REQUEST['max_'.$id_rango]);
                        if(isset($_REQUEST['min_'.$id_rango])) $variableValor->setMin($_REQUEST['min_'.$id_rango]);
                        if(isset($_REQUEST['valor_'.$id_rango])) $variableValor->setValor($_REQUEST['valor_'.$id_rango]);
                        $variableValor->setId_ver_variable($_REQUEST['id_ver_variable']);
                        $variableValor->setEstado(TRUE);
                        if (!$variableValor->save()) $message = '{"status":0,"message":"No se pudo guardar los valores"}';
                    }
                break;
                case 3://variables opcionales
                    $opciones=$this->guardarVariablesOpcionales($_REQUEST);
                break;
            }
            echo $message;
            exit;
        }
        if ($_REQUEST['tarea'] == 'eliminarRango') {
            if($_REQUEST['id_ver_rango']){
                $rango = new VerRango();
                $sqlverrango = new SQLVerRango();
                $rango->setId_ver_rango($_REQUEST['id_ver_rango']);
                $rango = $sqlverrango->getRango($rango);
                $rango->setEstado(FALSE);
                if($rango->save()) echo '{"status":"1","message":"Se elimino el rango satisfactoriamente satisfactoriamente."}';
                else echo '{"status":"0","message":"No se pudo eliminar el rango."}';
            }
            exit;
        }
        if($_REQUEST['tarea']=='guardarAdmision'){
            $admision = new VerAdmision();
            if(isset($_REQUEST['id_ver_admision'])){
                $admision->setId_ver_admision($_REQUEST['id_ver_admision']);
                $sqlAdmision = new SQLVerAdmision();
                $admision = $sqlAdmision->getAdmision($admision);
            }
            $admision->setMin($_REQUEST['min']);
            $admision->setMax($_REQUEST['max']);
            $admision->setNivel($_REQUEST['nivel']);
            $admision->setVerificacion($_REQUEST['verificacion']=='1'?TRUE:FALSE);
            $admision->setVerificacion_estricta($_REQUEST['verificacion_estricta']=='1'?TRUE:FALSE);
            $admision->setEstado(TRUE);
            if ($admision->save()) {
                echo '{"status":1,"message":"Se guardo la admision correctamente","id_admision":"'.$admision->getId_ver_admision().'"}';
            }
            else echo '{"status":0,"message":"No se pudo guardar la admision"}';
            exit;
        }
        if($_REQUEST['tarea']=='eliminarAdmision'){
            $message = '{"status":0,"message":"No se pudo eliminar la admisión"}';
            if(isset($_REQUEST['id_ver_admision'])){
                $admision = new VerAdmision();
                $sqlAdmision = new SQLVerAdmision();
                $admision->setId_ver_admision($_REQUEST['id_ver_admision']);
                $admision = $sqlAdmision->getAdmision($admision);
                $admision->setEstado(FALSE);
                if ($admision->save()) $message = '{"status":1,"message":"Se elimino correctament"}';
            }
            echo $message;
            exit;
        }

    }
    public function variablesOpcionales($tabla){
        $funcionesGenerales = new FuncionesGenerales();

        include_once(PATH_TABLA . DS . $tabla.'.php');
        $opcion = new $tabla();
        $opciones = $opcion->findAll($this->getVariablesOpcionalesCriterio($tabla));
        foreach($opciones as &$opcion){
            $opcion=$this->setObjetoOpcionales($opcion,$tabla);
        }
        return $opciones;
    }
    public function guardarVariablesOpcionales($request){
        $funcionesGenerales = new FuncionesGenerales();
        $tabla = ucfirst($request['tabla_modelo']);

        include_once(PATH_TABLA . DS . $tabla.'.php');
        $opcion = new $tabla();
        $opciones = $opcion->findAll($this->getVariablesOpcionalesCriterio($tabla));
        foreach($opciones as &$opcion){
            $campos=$this->getTablasCamposOpcionales($tabla);
            if($opcion->$campos['id']()){
                $opcion->setCriterio_valor($funcionesGenerales->setNumeric($request['valor_'.$opcion->$campos['id']()]));
                $opcion->save();
            }
        }
        return $opciones;
    }
    public function getVariablesOpcionalesCriterio($tabla){
        $criteria='';
        if($tabla=='Acuerdo') $criteria ='id_estado_acuerdo=1';
        if($tabla=='CriterioOrigen') $criteria ='activo=TRUE';
        //aqui se anaden mas criterio dependiendo si la tabla tiene algun sw que indique que esta de alta
        return $criteria;
    }
    public function setObjetoOpcionales($opcion,$tabla){
        $object = new stdClass();
        $funcionesGenerales = new FuncionesGenerales();
        $campos = $this->getTablasCamposOpcionales($tabla);
        $object->descripcion=$opcion->$campos['descripcion']();
        $object->criterio_valor=$funcionesGenerales->setInverseComma($opcion->getCriterio_valor());
        $object->id=$opcion->$campos['id']();
        return $object;
    }
    public function getTablasCamposOpcionales($tabla){
        $campos = array();
        switch($tabla){
            case 'Acuerdo':
                $campos = array("id"=>"getId_acuerdo", "descripcion"=>"getDescripcion");
                break;
            case 'ZonasEspeciales':
                $campos = array("id"=>"getId_zonas_especiales", "descripcion"=>"getDenominacion");
                break;
            case 'CriterioOrigen':
                $campos = array("id"=>"getId_criterio_origen", "descripcion"=>"getDescripcion");
                break;
            case 'ActividadEconomica':
                $campos = array("id"=>"getId_actividad_economica","descripcion"=>"getDescripcion");
                break;
            case 'TipoEmpresa':
                $campos = array("id"=>"getId_tipo_empresa","descripcion"=>"getDescripcion");
                break;
            case 'EmpresaAfiliacion':
                $campos = array("id"=>"getId_empresa_afiliacion","descripcion"=>"getDescripcion");
                break;
            case 'Departamento':
                $campos = array("id"=>"getId_departamento","descripcion"=>"getNombre");
                break;
            case 'Municipio':
                $campos = array("id"=>"getId_municipio","descripcion"=>"getDescripcion");
                break;
            case 'Ciudad':
                $campos = array("id"=>"getId_ciudad","descripcion"=>"getDescripcion");
                break;
            case 'RubroExportaciones':
                $campos = array("id"=>"getId_rubro_exportaciones","descripcion"=>"getDescripcion");
                break;
            //aqui se anade el array para saber como se denominan los campos id y descripcion de la tabla
        }
        return $campos;
    }

}
