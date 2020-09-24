<?php

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_TABLA . DS . 'VerFormula.php');
include_once(PATH_TABLA . DS . 'VerVariable.php');
include_once(PATH_TABLA . DS . 'VerVariableValor.php');
include_once(PATH_TABLA . DS . 'VerRango.php');
include_once(PATH_TABLA . DS . 'VerAdmision.php');

include_once(PATH_TABLA . DS . 'ActividadEconomica.php');
include_once(PATH_TABLA . DS . 'TipoEmpresa.php');
include_once(PATH_TABLA . DS . 'EmpresaAfiliacion.php');
include_once(PATH_TABLA . DS . 'Departamento.php');
include_once(PATH_TABLA . DS . 'Municipio.php');
include_once(PATH_TABLA . DS . 'Ciudad.php');
include_once(PATH_TABLA . DS . 'RubroExportaciones.php');

include_once(PATH_MODELO . DS . 'SQLVerFormula.php');
include_once(PATH_MODELO . DS . 'SQLVerVariable.php');
include_once(PATH_MODELO . DS . 'SQLVerVariableValor.php');
include_once(PATH_MODELO . DS . 'SQLVerRango.php');
include_once(PATH_MODELO . DS . 'SQLVerAdmision.php');

include_once(PATH_MODELO . DS . 'SQLActividadEconomica.php');
include_once(PATH_MODELO . DS . 'SQLTipoEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaAfiliacion.php');
include_once(PATH_MODELO . DS . 'SQLDepartamento.php');
include_once(PATH_MODELO . DS . 'SQLMunicipio.php');
include_once(PATH_MODELO . DS . 'SQLCiudad.php');
include_once(PATH_MODELO . DS . 'SQLRubroExportaciones.php');

class AdmAnalisisFormula extends Principal
{
    public function AdmAnalisisFomula(){

    }
    public function getAnalisisRiesgo($ddjj){
        $formula = new VerFormula();
        $sqlFormula = new SQLVerFormula();
        $formula = $sqlFormula->getFormulaVigente($formula);
        $variablesArray=explode(',',$formula->getVariables());
        $admision= new VerAdmision();
        $sqlAdmision = new SQLVerAdmision();
        $admisiones = $sqlAdmision->getAdmisionesActivas($admision);

        $object= new stdClass();

        if(in_array('a',$variablesArray)) $object->variables['a']=$this->getVariablea($ddjj);//variable de aranceles
        if(in_array('b',$variablesArray)) $object->variables['b']=$this->getVariablesValor('b',$ddjj,FALSE);//variable si tiene fabrica
        if(in_array('c',$variablesArray)) $object->variables['c']=$this->getVariablesValor('c',$ddjj,FALSE);//es comercializador?
        if(in_array('d',$variablesArray)) $object->variables['d']=$this->getVariablesValor('d',$ddjj,FALSE);//Es de Ferias o muestra?
        if(in_array('e',$variablesArray)) $object->variables['e']=$this->getVariablee($ddjj);//Obtiene de Acuerdo al Acuerdo
        if(in_array('f',$variablesArray)) $object->variables['f']=$this->getVariablesValor('f',$ddjj,FALSE);//Es SGP o Acuerdo??
        if(in_array('g',$variablesArray)) $object->variables['g']=$this->getVariablesValor('g',$ddjj,FALSE);//Tiene insumos nacionales??
        if(in_array('h',$variablesArray)) $object->variables['h']=$this->getVariablesValor('h',$ddjj,FALSE);//Tiene insumos importados??
        if(in_array('i',$variablesArray)) $object->variables['i']=$this->getVariablesValor('i',$ddjj,FALSE);//Evalua la cantidad de insumos nacionales Rango
        if(in_array('j',$variablesArray)) $object->variables['j']=$this->getVariablesValor('j',$ddjj,FALSE);//Evalua la cantidad de insumos importados Rango
        if(in_array('k',$variablesArray)) $object->variables['k']=$this->getVariablesValor('k',$ddjj,FALSE);//Evalua el total de insumos nacionales
        if(in_array('l',$variablesArray)) $object->variables['l']=$this->getVariablesValor('l',$ddjj,FALSE);//Evalua el total de insumos importados
        if(in_array('m',$variablesArray)) $object->variables['m']=$this->getVariablesValor('m',$ddjj,FALSE);//Evalua el valor de otros costos
        if(in_array('n',$variablesArray)) $object->variables['n']=$this->getVariablesValor('n',$ddjj,FALSE);//Evalua el valor de total fabrica
        if(in_array('o',$variablesArray)) $object->variables['o']=$this->getVariablesValor('o',$ddjj,FALSE);//Evalua el valor de total costo frontera
        if(in_array('p',$variablesArray)) $object->variables['p']=$this->getVariablesValor('p',$ddjj,FALSE);//Evalua el valor de total fob
        if(in_array('q',$variablesArray)) $object->variables['q']=$this->getVariableq($ddjj);//Zonas Especiales
        if(in_array('r',$variablesArray)) $object->variables['r']=$this->getVariabler($ddjj);//Criterio de Origen
        if(in_array('A',$variablesArray)) $object->variables['A']=$this->getVariableruexA($ddjj);//Actividad Economica En la empresa
        if(in_array('B',$variablesArray)) $object->variables['B']=$this->getVariableruexB($ddjj);//De acuerdo al tipo de empresa
        if(in_array('C',$variablesArray)) $object->variables['C']=$this->getVariablesValor('C',$ddjj,TRUE);//Si tiene fudaempresa
        if(in_array('D',$variablesArray)) $object->variables['D']=$this->getVariableruexD($ddjj);//Afiliaciones
        if(in_array('E',$variablesArray)) $object->variables['E']=$this->getVariablesValor('E',$ddjj,TRUE);//Nro Trabajadores
        if(in_array('F',$variablesArray)) $object->variables['F']=$this->getVariablesValor('F',$ddjj,TRUE);//Nro Activos UFV
        if(in_array('G',$variablesArray)) $object->variables['G']=$this->getVariablesValor('G',$ddjj,TRUE);//Nro Ventas UFV
        if(in_array('H',$variablesArray)) $object->variables['H']=$this->getVariablesValor('H',$ddjj,TRUE);//Nro Exportaciones UFV
        if(in_array('I',$variablesArray)) $object->variables['I']=$this->getVariableruexI($ddjj);//Criteso por departamento
        if(in_array('J',$variablesArray)) $object->variables['J']=$this->getVariableruexJ($ddjj);//Criteso por departamento
        if(in_array('K',$variablesArray)) $object->variables['K']=$this->getVariableruexK($ddjj);//Criteso por departamento
        if(in_array('L',$variablesArray)) $object->variables['L']=$this->getVariablesValor('L',$ddjj,TRUE);//Nro Exportaciones UFV
        if(in_array('M',$variablesArray)) $object->variables['M']=$this->getVariablesValor('M',$ddjj,TRUE);//Es empresa estatal
        if(in_array('N',$variablesArray)) $object->variables['N']=$this->getVariableruexN($ddjj);//rubro de exporataciones
        if(in_array('O',$variablesArray)) $object->variables['O']=$this->getVariablesValor('O',$ddjj,TRUE);//Es empresa estatal
        if(in_array('P',$variablesArray)) $object->variables['P']=$this->getVariablesValor('P',$ddjj,TRUE);//Es empresa estatal

        $object->formula=$formula;
        $object->admisiones=$admisiones;

        return $object;
    }
    public function getVariablea($ddjj){//trae la vairiable de la tabla aranceles dependiento del id de partida
        $funcionesgenerales = new FuncionesGenerales();
        $partida = new Partida();
        $partida->setId_partida($ddjj->getId_partida());
        $sqlPartida = new SQLPartida();
        $partida = $sqlPartida->getById($partida);

        return $funcionesgenerales->validateNumberArancel($partida->getCriterio_valor());
    }
    public function getVariablesValor($letra,$ddjj,$esRuex){// Obtiene el valor de la variable de acuero a la letra que se le de
        $variable=new VerVariable();
        $sqlVariable = new SQLVerVariable();

        $valor=0;

        $variable->setVariable($letra);
        $variable=$sqlVariable->getVariablePorLetra($variable);
        $booleanos=$variable->valores_booleanos;
        $rangos=$variable->valores_rangos;

        if($esRuex) $empresa=$this->getEmpresa($ddjj);

        switch($letra){
            case 'b':// si la declaracion jurada tiene o no fabricas
                $valor=($ddjj->getId_direccion()!=0 and !is_null($ddjj->getId_direccion()))?$this->getValorPorFlag($booleanos,1):$this->getValorPorFlag($booleanos,0);
            break;
            case 'c':// si es comercializador
                $valor=$ddjj->getComercializador()?$this->getValorPorFlag($booleanos,1):$this->getValorPorFlag($booleanos,0);
            break;
            case 'd':// si es comercializador
                $valor=$ddjj->getMuestra()?$this->getValorPorFlag($booleanos,1):$this->getValorPorFlag($booleanos,0);
            break;
            case 'f':// es SGP o Acuerdo?
                $acuerdo = new Acuerdo();
                $acuerdo->setId_Acuerdo($ddjj->getId_acuerdo());
                $sqlAcuerdo = new SQLAcuerdo();
                $acuerdo = $sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);

                if($acuerdo->getId_tipo_acuerdo()==1) $valor=$this->getValorPorFlag($booleanos,0);//es acuerdo comercial
                else $valor=$this->getValorPorFlag($booleanos,1);//es SGP
            break;
            case 'g'://tiene insumos nacionlaes??
                $valor=(count($ddjj->insumosnacionales)!=0)?$valor=$this->getValorPorFlag($booleanos,1):$valor=$this->getValorPorFlag($booleanos,0);
            break;
            case 'h'://tiene insumos importados??
                $valor=(count($ddjj->insumosimportados)!=0)?$valor=$this->getValorPorFlag($booleanos,1):$valor=$this->getValorPorFlag($booleanos,0);
            break;
            case 'i'://rango de cantidad de insumos
                $valor=$this->getValorPorRango($rangos,count($ddjj->insumosnacionales));
            break;
            case 'j'://rango de cantidad de insumos
                $valor=$this->getValorPorRango($rangos,count($ddjj->insumosimportados));
            break;
            case 'k'://rango total de insumos nacionales
                $valor=$this->getValorPorRango($rangos,$ddjj->valor_total_insumosnacional);
            break;
            case 'l'://rango total de insumos nacionales
                $valor=$this->getValorPorRango($rangos,$ddjj->valor_total_insumosimportados);
            break;
            case 'm'://rango total de insumos nacionales
                $valor=$this->getValorPorRango($rangos,$ddjj->valor_mano_obra);
            break;
            case 'n'://rango total de insumos nacionales
                $valor=$this->getValorPorRango($rangos,$ddjj->valor_exw);
            break;
            case 'o'://rango total de costo frontera
                $valor=$this->getValorPorRango($rangos,$ddjj->valor_frontera);
            break;
            case 'p'://rango total de costo frontera
                $valor=$this->getValorPorRango($rangos,$ddjj->valor_fob);
            break;
            case 'C':// si tiene fundaempresa
                $valor=(trim($empresa->getMatricula_Fundempresa())!='' and $empresa->getMatricula_Fundempresa()!=null)?$this->getValorPorFlag($booleanos,1):$this->getValorPorFlag($booleanos,0);
            break;
            case 'D':// si tiene fundaempresa
                $valor=(trim($empresa->getMatricula_Fundempresa())!='' and $empresa->getMatricula_Fundempresa()!=null)?$this->getValorPorFlag($booleanos,1):$this->getValorPorFlag($booleanos,0);
            break;
            case 'E':// nro de trabajadores
                $categoria=explode(',',$empresa->getDatos_categoria_empresa());
                if($categoria[0]==1) $valor=$this->getValorPorFlag($booleanos,0);
                if($categoria[0]==2) $valor=$this->getValorPorFlag($booleanos,1);
                if($categoria[0]==3) $valor=$this->getValorPorFlag($booleanos,2);
                if($categoria[0]==4) $valor=$this->getValorPorFlag($booleanos,3);
            break;
            case 'F':// nro de activos
                $categoria=explode(',',$empresa->getDatos_categoria_empresa());
                if($categoria[1]==1) $valor=$this->getValorPorFlag($booleanos,0);
                if($categoria[1]==2) $valor=$this->getValorPorFlag($booleanos,1);
                if($categoria[1]==3) $valor=$this->getValorPorFlag($booleanos,2);
                if($categoria[1]==4) $valor=$this->getValorPorFlag($booleanos,3);
            break;
            case 'G':// nro de ventas UFV
                $categoria=explode(',',$empresa->getDatos_categoria_empresa());
                if($categoria[2]==0) $valor=$this->getValorPorFlag($booleanos,0);
                if($categoria[2]==1) $valor=$this->getValorPorFlag($booleanos,1);
                if($categoria[2]==2) $valor=$this->getValorPorFlag($booleanos,2);
                if($categoria[2]==3) $valor=$this->getValorPorFlag($booleanos,3);
                if($categoria[2]==4) $valor=$this->getValorPorFlag($booleanos,4);
            break;
            case 'H':// nro de ventas UFV
                $categoria=explode(',',$empresa->getDatos_categoria_empresa());
                if($categoria[3]==0) $valor=$this->getValorPorFlag($booleanos,0);
                if($categoria[3]==1) $valor=$this->getValorPorFlag($booleanos,1);
                if($categoria[3]==2) $valor=$this->getValorPorFlag($booleanos,2);
                if($categoria[3]==3) $valor=$this->getValorPorFlag($booleanos,3);
                if($categoria[3]==4) $valor=$this->getValorPorFlag($booleanos,4);
            break;
            case 'L'://tiene oea
                $valor=(trim($empresa->getOea())!='' and $empresa->getOea()!=null)?$this->getValorPorFlag($booleanos,1):$this->getValorPorFlag($booleanos,0);
            break;
            case 'M'://empresa estatal,    SE NECESITA MODIFICAR  CUANDO SE AUMENTE EL CAMPO DE EMPRESA ESTATAL
                $valor=true?$valor=$this->getValorPorFlag($booleanos,1):$valor=$this->getValorPorFlag($booleanos,0);
            break;
            case 'O';
                $funcionesgenerales = new FuncionesGenerales();
                $valor=$this->getValorPorRango($rangos,$funcionesgenerales->diffDiasHoy($empresa->getFecha_asignacion_ruex()));
            break;
            case 'P';
                $funcionesgenerales = new FuncionesGenerales();
                if(!is_null($empresa->getUltima_revision())) $valor=$this->getValorPorRango($rangos,$funcionesgenerales->diffDiasHoy($empresa->getUltima_revision()));
                else $valor=0;
            break;
        }
        return (int)$valor;
    }
    public function getValorPorFlag($array,$flag){//trae el valor numerico de array valor de acuerdo al flag que se le pase, BOOLEANAS
        $valor=0;
        foreach($array as $item){
            if($item->flag==$flag){
                $valor=$item->valor;
                break;
            }
        }
        return $valor;
    }
    public function getValorPorRango($arrayRango,$numero){// Obtiene el valor de la variable por RANGO si se encuentra en mas de un rango este SUMA.
        $numero=(int)$numero;
        $valor=0;
        foreach ($arrayRango as $item) {
            if((int)$item->min <= $numero and $numero<=(int)$item->max){
                $valor+=$item->valor;
            }
        }
        return $valor;
    }
    public function getVariablee($ddjj){//Obtiene el valor de acuerdo al acuerdo
        $funcionesgenerales = new FuncionesGenerales();
        $acuerdo = new Acuerdo();
        $acuerdo->setId_Acuerdo($ddjj->getId_acuerdo());
        $sqlAcuerdo = new SQLAcuerdo();
        $acuerdo = $sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);

        return $funcionesgenerales->validateNumberArancel($acuerdo->getCriterio_valor());
    }
    public function getVariableq($ddjj){//Obtiene el valor de acuerdo a las zonas especiales
        $sqlZona= new SQLZonasEspeciales();
        $valor=0;
        foreach($ddjj->zonasespeciales as $zonaEspecial){
            $zona = new ZonasEspeciales();
            $zona->setId_zonas_especiales($zonaEspecial->id_zonas_especiales);
            $zona = $sqlZona->getById($zona);
            $valor+=$zona->getCriterio_valor();
        }
        return $valor;
    }
    public function getVariabler($ddjj){//Obtiene el valor de acuerdo al criterio de origen
        $sqlCriterios= new SQLCriterioOrigen();
        $valor=0;
        $criterios=explode(',',$ddjj->id_criterios);
        foreach($criterios as $id_criterio){
            $criterio = new CriterioOrigen();
            $criterio->setId_criterio_origen($id_criterio);
            $criterio = $sqlCriterios->getBuscarDescripcionPorId($criterio);
            $valor+=$criterio->getCriterio_valor();
        }
        return $valor;
    }
    public function getEmpresa($ddjj){
        $empresa = new Empresa();
        $sqlEmpresa = new SQLEmpresa();
        $empresa->setId_empresa($ddjj->getId_empresa());
        $empresa = $sqlEmpresa->getEmpresaPorID($empresa);
        return $empresa;
    }
    public function getVariableruexA($ddjj){//Obtiene el valor de acuerdo a la actividad economica de la empresa
        $valor=0;
        $empresa=$this->getEmpresa($ddjj);
        $actividad= new ActividadEconomica();
        $actividad->setId_actividad_economica($empresa->getIdActividad_Economica());
        $sqlActividad= new SQLActividadEconomica();
        $actividad = $sqlActividad->getBuscarDescripcionPorId($actividad);

        return (int)$actividad->getCriterio_valor();
    }
    public function getVariableruexB($ddjj){//Obtiene el valor de acuerdo al tipo de empresa
        $valor=0;
        $empresa=$this->getEmpresa($ddjj);
        $tipoempresa= new TipoEmpresa();
        $tipoempresa->setId_tipo_empresa($empresa->getIdTipo_Empresa());
        $sqlTipoEmpresa= new SQLTipoEmpresa();
        $tipoempresa = $sqlTipoEmpresa->getBuscarDescripcionPorId($tipoempresa);
        return (int)$tipoempresa->getCriterio_valor();
    }
    public function getVariableruexD($ddjj){//Obtiene el valor de afiliaciones
        $valor=0;
        $empresa=$this->getEmpresa($ddjj);
        $sqlAfiliaciones= new SQLEmpresaAfiliacion();
        $afiliaciones=explode(',',$empresa->getAfiliaciones());
        foreach($afiliaciones as $id_afiliacion){
            if(trim($id_afiliacion)!=''){
                $empresaAfiliacion= new EmpresaAfiliacion();
                $empresaAfiliacion->setId_empresa_afiliacion($id_afiliacion);
                $empresaAfiliacion = $sqlAfiliaciones->getById($empresaAfiliacion);
                $valor+=$empresaAfiliacion->getCriterio_valor();
            }
        }
        return (int)$valor;
    }
    public function getVariableruexI($ddjj){//opciones por departamento
        $empresa=$this->getEmpresa($ddjj);
        $departamento = new Departamento();
        $sqlDepartamento= new SQLDepartamento();
        $departamento->setId_departamento($empresa->getIdDepartamento_Procedencia());
        $departamento = $sqlDepartamento->getBuscarDepartamentoPorId($departamento);
        return (int)$departamento->getCriterio_valor();
    }
    public function getVariableruexJ($ddjj){//opciones por Municipio
        $empresa=$this->getEmpresa($ddjj);
        $municipio = new Municipio();
        $sqlMunicipio= new SQLMunicipio();
        $municipio->setId_municipio($empresa->getMunicipio());
        $municipio = $sqlMunicipio->getMunicipioPorID($municipio);
        return (int)$municipio->getCriterio_valor();
    }
    public function getVariableruexK($ddjj){//opciones por Ciudad
        $empresa=$this->getEmpresa($ddjj);
        $ciudad = new Ciudad();
        $sqlCiudad= new SQLCiudad();
        $ciudad->setId_ciudad($empresa->getCiudad());
        $ciudad = $sqlCiudad->getCiudadPorID($ciudad);
        return (int)$ciudad->getCriterio_valor();
    }
    public function getVariableruexN($ddjj){//opciones por Rubro de exportaciones
        $valor=0;
        $empresa=$this->getEmpresa($ddjj);
        $sqlrubro= new SQLRubroExportaciones();
        $rubros = explode(',', $empresa->getIdRubro_Exportaciones());
        foreach($rubros as $id_rubro){
            $rubro = new RubroExportaciones();
            $rubro->setId_rubro_exportaciones($id_rubro);
            $rubro = $sqlrubro->getBuscarRubroPorId($rubro);
            $valor+=$rubro->getCriterio_valor();
        }
        return (int)$valor;
    }

}
