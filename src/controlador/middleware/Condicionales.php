<?php
/**
 * Created by PhpStorm.
 * User: RENZO
 * Date: 11/11/2017
 * Time: 10:42 AM
 */

// Este controlador agrupa las condicionales staticas de todo el sistema...................

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');


class Condicionales
{

  //-------------------------------variables estaticas de los perfiles
  private $id_unidad_legal=21; // este es el id del perfil de unidad legal...
  private $id_exportador_2=2; // este es el id del perfil de unidad legal...
  private $id_exportador_3=3; // este es el id del perfil de unidad legal...
  private $id_analista_ruex=6; // este es el id del perfil de analista ruex
  private $id_analista_ddjj=7; // este es el id del perfil de Analista ddjj
  private $id_analista_co=8;   // este es el id del perfil de analista co
  private $id_certificador=19;  // este es el id del perfil de certificador
  private $id_administrador_uco=25;  // este es el id del perfil de certificador
  //private $id_analista_co=19;   // este es el id del perfil de analista co
  //private $id_certificador=19;  // este es el id del perfil de certificador
  //-----------------------------------estado de seguimietno-------------
  private $estado_sancion_cancelada = 8;
  private $estado_sancion_recurso_jerarquico = 7;
  private $estado_sancion_eliminado = 9;
  private $estado_sancion_informe_tecnico = 1;

  //-----------------------------------Estado Empresa
  private $estado_empresa_bloqueada = 3;
  private $estado_empresa_senavex = 5;
  private $estado_empresa_registrada = 0;

  //------------------------------metodos del perfil
  public function esUnidadLegal()
  {
    return $_SESSION['id_perfil']==$this->id_unidad_legal;
  }
  public function esPerfilUco()
  {
    return $_SESSION['id_perfil']==$this->id_administrador_uco;
  }
  public function esExportador()
  {
    return $_SESSION['id_perfil']==$this->id_exportador_2 || $_SESSION['id_perfil']==$this->id_exportador_3;
  }
  public function esCertificador()
  {
    return $_SESSION['id_perfil']==$this->id_certificador;
  }
  //este metodo se creo para evaluar si el usuario puede registrar una infraccion en el sistema
  //usualemente los certiifcadores son los que registran infracciones
  public function puedeRegistrarSanciones()
  {
    return $_SESSION['id_perfil']==$this->id_certificador OR
      $_SESSION['id_perfil']==$this->id_analista_ruex OR
      $_SESSION['id_perfil']==$this->id_analista_ddjj OR
      $_SESSION['id_perfil']==$this->id_analista_co;
  }

  public function veSanciones(){
    return $_SESSION['id_perfil']==$this->id_certificador OR
      $_SESSION['id_perfil']==$this->id_analista_ruex OR
      $_SESSION['id_perfil']==$this->id_analista_ddjj OR
      $_SESSION['id_perfil']==$this->id_unidad_legal OR
      $_SESSION['id_perfil']==$this->id_analista_co;
  }


  public function getEstadoSancionCancelada(){
    return $this->estado_sancion_cancelada;
  }
  public function getEstadoRecursoJerarquico(){
    return $this->estado_sancion_recurso_jerarquico;
  }
  public function getEstadoSancionEliminado(){
    return $this->estado_sancion_eliminado;
  }
  public function getEstadoSancionInformeTecnico(){
    return $this->estado_sancion_informe_tecnico;
  }
  public function getEstadoEmpresaBloqueada(){
    return $this->estado_empresa_bloqueada;
  }
  public function getPerfilUco(){
    return $this->id_administrador_uco;
  }

  //------------------------------metodos genericos
  public function asignaCondicionalesVista($vista){

    //aqui anadimos todas las condicionales genericas que queremos que aparescan en una vista
    $vista->assign('esUnidadLegal',$this->esUnidadLegal());
    $vista->assign('veSanciones',$this->veSanciones());

    return $vista;
  }
  public function getEstadosEmpresaDropdown(){
    return array($this->estado_empresa_registrada,$this->estado_empresa_senavex);
  }
}
