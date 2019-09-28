<?php

defined('_ACCESO') or die('Acceso restringido');

include_once( PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once( PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');
include_once( PATH_CONTROLADOR . DS . 'admEmpresa' . DS . 'AdmEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLPerfil.php');
include_once(PATH_MODELO . DS . 'SQLPerfilOpciones.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLDeclaracionJurada.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'Perfil.php');
include_once(PATH_TABLA . DS . 'PerfilOpciones.php');
include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');


class AdmPanelPrincipal extends Principal {
    public function AdmPanelPrincipal() 
  {
    $vista = Principal::getVistaInstance();
    $declaracion_jurada = new DeclaracionJurada();
    $sqlDeclaracionJurada = new SQLDeclaracionJurada();
    $mensajebienvenida=FuncionesGenerales::MensajeBienvenida();//esto es para la bienvenida
    if($_REQUEST['tarea']=='menuprincipal')//para cuando uno entra a una empresa que tiene una opcion especifica
    {
   
        $opciones = str_split($_REQUEST['opciones']);
        $vista->assign('opciones',$opciones);//la asignamos a la vista       
        $vista->display("panelAdministrativo/menuprincipal.tpl");
       exit;  
    }
    if($_REQUEST['tarea']=='entroEmpresa')//para cuando un exportador tiene varios perfiles y entra a una empresa
    {
       $_SESSION["exportadorentroempresa"]=null;
       $_SESSION["id_empresa"] =$_REQUEST['id_empresa'];
       $_SESSION["id_perfil"] =$_REQUEST['id_perfil'];
       //-----------------------aca sacamos la descricion del perfil--------------------
            $perfil = new Perfil();
            $sqlPerfil = new SQLPerfil();
            $perfil->setId_perfil($_REQUEST['id_perfil']);
            $perfil = $sqlPerfil->getBuscarDescripcionPorId($perfil);
            $_SESSION["perfil"]=$perfil->getDescripcion();
        //-----------------------------------
        $_SESSION["empresa"]=$_REQUEST['empresa'];
        $_SESSION["id_empresa_persona"]=$_REQUEST["id_empresa_persona"];
        //es para sacar las opciones de la persona
        $empresapersona = new EmpresaPersona();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        $empresapersona->setId_empresa_persona($_REQUEST["id_empresa_persona"]);
        $empresapersona= $sqlEmpresaPersona->getEmpresaPersonaPorID($empresapersona);
       
        $opcion_x=$perfil->getOpciones();
        $str='';
        for ($index = 0; $index < strlen($opcion_x); $index++) {
            $POpciones = new PerfilOpciones();
            $SQLPOpciones = new SQLPerfilOpciones();
            $POpciones->setOpcion($opcion_x[$index]);
            $lista = $SQLPOpciones->getPerfilOpcionesByOpcion($POpciones);
            if($lista[0]->getHabilitado()=='1'){
                $str.=$lista[0]->getOpcion();
            }
        }
        $_SESSION["opciones_persona"] = str_split($str);
//        $_SESSION["opciones_persona"]=str_split($empresapersona->getOpciones_persona());
       
       //- pregunta si tu empresa no tiene nada pendiente
       
       $empresa = new Empresa();
       $sqlEmpresa = new SQLEmpresa();
       $empresa->setId_empresa($_SESSION["id_empresa"]);
       $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
       $_SESSION["estado_empresa"]=$empresa->getEstado();
        if($empresa->getMenor_Cuantia()=='1')
        {
            $_SESSION["menor_cuantia"]=$empresa->getMenor_Cuantia();
        }
        else
        {
            if($empresa->getFrecuente()=="1") $_SESSION["menor_cuantia"]='';
            else $_SESSION["menor_cuantia"]='1';
        }
       
       $_SESSION["ruex"]=$empresa->getRuex();
       //asignamos las variables de la vista
       if($_SESSION["estado_empresa"]=='3')// a empresa esta bloqueada
       {//cargar modulos pendientes
            $vista->assign('estado_empresa','3');
       }
        $vista->assign('variosperfiles', '1');
        $vista->assign('ruex', $_SESSION["ruex"]);
        $vista->assign('id_empresa', $_SESSION["id_empresa"]);
        $vista->assign('perfil', $_SESSION["perfil"]);
       
        $opcion_x= $_SESSION["opciones_persona"];
        
        $str='';
        foreach ($opcion_x as $value) {
            $POpciones = new PerfilOpciones();
            $SQLPOpciones = new SQLPerfilOpciones();
            $POpciones->setOpcion($value);
            $lista = $SQLPOpciones->getPerfilOpcionesByOpcion($POpciones);
            if($lista[0]->getHabilitado()=='1'){
                $str.=$lista[0]->getOpcion();
            }
        
        }
        //$_SESSION["opciones_persona"] = str_split($str);
        $vista->assign('opciones_persona', str_split($str));
//        $vista->assign('opciones_persona', $_SESSION["opciones_persona"]);
        $vista->assign('empresa', $_SESSION["empresa"]);
    }
    if($_REQUEST['tarea']=='salioempresa')////para cuando un exportador tiene varios perfiles y sale de una empresa
    { 
       $_SESSION["id_empresa_persona"]='x';
       $_SESSION["estado_empresa"]='';
       $_SESSION["menor_cuantia"]='';
       $vista->assign('ruex',null);
       $vista->assign('empresa', null);
       $vista->assign('perfil', null);
       
    }
    if($_SESSION["tipo_usuario"] =='2')//es un exportador
    { 
        if($_SESSION["id_empresa_persona"] =='x') //esto se da para el menu principal cuando un exportador tiene mas de un perfil en varias empresas
        {
            $empresas = FuncionesGenerales::perfilesEnEmpresaPorPersona($_SESSION["id_persona"]);//aca sacamos las empresas en las cuales tien perfil el cuate 
            foreach ($empresas as &$valor) {
              $valor = $this->AsignarEmpresaPersona($valor);             
            }  
            $vista->assign('empresas',$empresas);//la asignamos a la vista            
            $vista->assign('id_empresa_persona', $_SESSION["id_empresa_persona"]);
            $vista->display("panelAdministrativo/Paneladministrativo.tpl");
            exit;   
            
        }
        // para asignarle el estaod de a empresa
        $vista->assign('estado_empresa',$_SESSION["estado_empresa"]);
        
        //Notificaciones al exportador de ddjj y Certificados de origen
        if($_SESSION["id_perfil"] =='3' || $_SESSION["id_perfil"] =='4')
        {
            $declaracion_jurada->setId_Empresa($_SESSION["id_empresa"]);
            $declaracion_jurada->setId_estado_ddjj(1);
            $resultado = $sqlDeclaracionJurada->getListarDeclaracionesPorEstado($declaracion_jurada);
            
            
            /*
            $registroempresas=AdmSistemaColas::listarColaAsistentePorTemporales($_SESSION["id_persona"]);
            $vista->assign('registroempresas',  count($registroempresas));
            //para solicitudes de modificacion de datos
            $registromodificacion=AdmSistemaColas::listarColaAsistentePorTemporalesModificacion($_SESSION["id_persona"]);
            $vista->assign('registromodificacion',  count($registromodificacion));     
            //para empresas admitidas
            $admisiones=AdmEmpresa::EmpresasAdmitidasCount();
            
            $vista->assign('admisiones', $admisiones);
             */
        }
        $persona = new Persona();
        $sqlpersona = new SQLPersona();
        $persona->setId_persona($_SESSION['id_persona']);
        $persona=$sqlpersona->getDatosPersonaPorId($persona);
        if (!$persona->getFirma()) $vista->assign('firma','1');
    }
    if($_SESSION["tipo_usuario"] =='3')//empresa
    {  
        //esto pregunta si ha sido aprobada la modificacion de datos de la empresa
        $estadomodificacion=AdmEmpresa::EmpresaAdmitidaParaModificacion($_SESSION['id_empresa']);
        $vista->assign('estadomodificacion',$estadomodificacion);
        // aqui tine que validar si el estado de la empresa esta bloqueado
      
            $vista->assign('estado_empresa', $_SESSION["estado_empresa"]);
    }
    //en esta parte cargamos los mensages de bienbenida segun el perfil que tenga
    if($_SESSION["tipo_usuario"] =='1')//usuario interno del senavex
    {
        //en esta parte se asignan los valores de las notificaciones segun el perfil que tengas
        if($_SESSION["id_perfil"] =='6' || $_SESSION["id_perfil"] =='9')
        {
            //en ese ingreasan las notificatciones
            //para registro de empresas
            $registroempresas=AdmSistemaColas::listarColaAsistentePorTemporales($_SESSION["id_persona"]);
            $vista->assign('registroempresas',  count($registroempresas));
            //para solicitudes de modificacion de datos
            $registromodificacion=AdmSistemaColas::listarColaAsistentePorTemporalesModificacion($_SESSION["id_persona"]);
            $vista->assign('registromodificacion',  count($registromodificacion));     
            //para empresas admitidas
            $admisiones=AdmEmpresa::EmpresasAdmitidasCount();
            
            $vista->assign('admisiones', $admisiones);
        }

        if($_SESSION["id_perfil"] =='7' || $_SESSION["id_perfil"] =='9')
        {
            //listar las notificatciones de las ddjj por revisar
            $certif = $_SESSION["id_persona"];
            //Listar las DDJJ por persona a revisar
            $ddjjporrevisar = $sqlDeclaracionJurada->getListarDeclaracionesParaRevisar($declaracion_jurada,$certif);
            $vista->assign('ddjjporrevisar',  count($ddjjporrevisar));
        }
        /*
        if($_SESSION["id_perfil"] =='8' || $_SESSION["id_perfil"] =='9')
        {
            //listar las notificatciones de las ddjj por revisar
            $ddjjporrevisar=AdmSistemaColas::listarColaAsistente($_SESSION["id_persona"]);
            $vista->assign('$ddjjporrevisar',  count($ddjjporrevisar));
            
        }
        */
    }
    $vista->assign('id_empresa_persona', $_SESSION["id_empresa_persona"]);
    $vista->assign("mensajebienvenida",$mensajebienvenida);  
    $vista->display("panelAdministrativo/Paneladministrativo.tpl");
    exit;
  }
  public function AsignarEmpresaPersona(EmpresaPersona $empresapersona)// Este metodo asigna NOmbres en lo scampos ID par amostralos en la vista a una empresa persona  
  {
        include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
        include_once(PATH_TABLA . DS . 'Empresa.php');
        
        $empresa = new Empresa();
        $sqlEmpresa = new SQLEmpresa();
        $empresa->setId_empresa($empresapersona->getId_empresa());         
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
        $empresapersona->setId_Persona($empresa->getRazon_Social());//vamos a porner la razon social en id persona por que es la unica que sabemos
        $empresapersona->setFecha_Vinculacion($empresa->getFormato_imagen());//le asignamos el formato de l afoto
        return $empresapersona;
  }
}