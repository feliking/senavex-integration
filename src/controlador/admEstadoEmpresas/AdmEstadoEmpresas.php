<?php
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_CONTROLADOR . DS . 'admEmpresa' . DS . 'AdmEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLEstadoEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLBloqueoEmpresa.php');

include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'EstadoEmpresas.php');
include_once(PATH_TABLA . DS . 'BloqueoEmpresa.php');

class AdmEstadoEmpresas extends Principal {
  public function AdmEstadoEmpresas() 
  {
    $vista = Principal::getVistaInstance();
    
    $empresa = new Empresa();    
    $sqlEmpresa = new SQLEmpresa();
    if($_REQUEST['tarea']=='desbloquearEmpresa')//restringimos a la Empresa;
    {
        $bloqueoempresa = new BloqueoEmpresa();    
        $sqlbloqueoempresa = new SQLBloqueoEmpresa();
        $bloqueoempresa->setId_empresa($_REQUEST['id_empresa']);
        $bloqueoempresa=$sqlbloqueoempresa->getBloqueoEmpresaPorIdEmpresa($bloqueoempresa);
        $bloqueoempresa->setEstado(false);
        $bloqueoempresa->setFecha_desbloqueo(date("Y-m-d h:m:s"));
        $bloqueoempresa->setId_persona_alta( $_REQUEST['id_persona']);
        $bloqueoempresa->setMotivo_alta($_REQUEST['camposmotivo']);
        $estado=$bloqueoempresa->getEstado_empresa_anterior();
        if($sqlbloqueoempresa->setGuardarBloqueoEmpresa($bloqueoempresa))
        {
            $empresa->setId_empresa($_REQUEST['id_empresa']);
            $empresa= $sqlEmpresa->getEmpresaPorID($empresa);
            $empresa->setEstado($estado);
            if($sqlEmpresa->setGuardarEmpresa($empresa))
            {
                echo '[{"suceso":"1","id_bloqueo":"'.$bloqueoempresa->getId_bloqueo().'"}]';
            }  
            else {
                echo '[{"suceso":"0"}]';
            }
        }
        else
        {
            echo '[{"suceso":"0"}]';
        }
        
        exit;
    }
    if($_REQUEST['tarea']=='bloquearEmpresa')//restringimos a la Empresa;
    {
        $empresa->setId_empresa($_REQUEST['id_empresa']);
        $empresa= $sqlEmpresa->getEmpresaPorID($empresa);
        $estado=$empresa->getEstado();
        $empresa->setEstado(3);
        
        if($sqlEmpresa->setGuardarEmpresa($empresa))
        {
            //-------- aqui se guarda el bloqueo de las empresas-----------
            $bloqueoempresa = new BloqueoEmpresa();    
            $sqlbloqueoempresa = new SQLBloqueoEmpresa();
            $bloqueoempresa->setFecha_bloqueo(date("Y-m-d h:m:s"));
            $bloqueoempresa->setId_empresa($_REQUEST['id_empresa']);
            $bloqueoempresa->setId_persona($_REQUEST['id_persona']);
            $bloqueoempresa->setEstado(true);
            $bloqueoempresa->setMotivo($_REQUEST['camposmotivo']);
            $bloqueoempresa->setEstado_empresa_anterior($estado);
            //-------------------------------------------------
            if($sqlbloqueoempresa->setGuardarBloqueoEmpresa($bloqueoempresa))
            {
                echo '[{"suceso":"1","id_bloqueo":"'.$bloqueoempresa->getId_bloqueo().'"}]';
            }
            else
            {
                echo '[{"suceso":"0"}]';
            }
        }
        else {
            echo '[{"suceso":"0"}]';
        }
        exit;
    }
    
    if($_REQUEST['tarea']=='restringirEmpresa')//restringimos a la Empresa;
    {
        $admEmpresa = new AdmEmpresa(); 
        $empresa= $admEmpresa->AsignarEmpresa($_REQUEST['id_empresa']);
         //-----------------------para el formato d/m/a-------------------
        $fecha_renovacion_a= explode("-", $empresa->getFecha_renovacion_ruex());
        $empresa->setFecha_renovacion_ruex($fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0]);
        //------------------------preguntamos si es cafetalera
            $ico = $admEmpresa->verificaEmpresaIco($empresa);
            if(!empty($ico))
            {
                $vista->assign('ico', $ico);
            }  
        //------------------------------
        $personal=  AdmPersona::listarPersonasPorEmpresa($_REQUEST["id_empresa"]);
        if($_REQUEST['estado']=='3')
        {
            $desbloquear='1';
        }
        ////---------------------esto es para todo los funcionarios de esa empresa------------------------
        $vista->assign('desbloquear', $desbloquear);
        $vista->assign('personal', $personal);
        $vista->assign('empresa', $empresa);
        $vista->display("admEstadoEmpresas/EstadoEmpresa.tpl");
        exit;
    }
    if($_REQUEST['tarea']=='estadoEmpresas')//todas las empresas su ruex y su estado
    {
        $empresas=$sqlEmpresa->getListarEmpresas($empresa);
        $vista->assign('empresasestado', $empresas);
        $vista->display("admEstadoEmpresas/EstadoEmpresas.tpl");
        exit;
    }
  }
  public function getEmpresa($id){
    $empresa= new Empresa();
    $sqlEmpresa = new SQLEmpresa();
    $empresa->setId_empresa($id);
    return $sqlEmpresa->getEmpresaPorID($empresa);
  }
  public function guardarBloqueo($variables){

    if(!isset($variables['id_acuerdo'])){ // va ser bloqueo general
      $conditiona  = new Condicionales();
      $empresa= $this->getEmpresa($variables['id_empresa']);
      $estado_anterior=$empresa->getEstado();
      $empresa->setEstado($conditiona->getEstadoEmpresaBloqueada()); //estado de bloqueo
      if(!$empresa->save()){
        return FALSE;
      }
    }

    $bloqueoempresa = new BloqueoEmpresa();
    $sqlbloqueoempresa = new SQLBloqueoEmpresa();
    $bloqueoempresa->setFecha_bloqueo(date("Y-m-d h:m:s"));
    $bloqueoempresa->setId_empresa($variables['id_empresa']);
    $bloqueoempresa->setId_persona($_SESSION['id_persona']);
    $bloqueoempresa->setEstado(true);
    $bloqueoempresa->setMotivo($_REQUEST['camposmotivo']);
    $bloqueoempresa->setEstado_empresa_anterior($estado_anterior);
    if(isset($variables['id_acuerdo'])){
      $bloqueoempresa->setId_acuerdo($variables['id_acuerdo']);
      $bloqueoempresa->setTipo_bloqueo(2);// bloqeuo solo por acuerdo
    }else{
      $bloqueoempresa->setTipo_bloqueo(1);// bloqueo general
    }

    //-------------------------------------------------
    return $sqlbloqueoempresa->setGuardarBloqueoEmpresa($bloqueoempresa);

  }
  public function getEstadoEmpresas($estados_restringidos){
    $sqlestado = new SQLEstadoEmpresa();
    return $sqlestado->getEstadosEmpresas(new EstadoEmpresas(),$estados_restringidos);
  }
  public function verificaSiTieneBloqueoAcuerdo($id_empresa){
    $bloqueo = new BloqueoEmpresa();
    $sqlBloqueo = new SQLBloqueoEmpresa();
    $bloqueo->setId_empresa($id_empresa);
    return $sqlBloqueo->getBloqueoEmpresaPorIdEmpresaAcuerdo($bloqueo);

  }
}