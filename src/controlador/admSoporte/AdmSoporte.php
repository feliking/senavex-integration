<?php
/**
/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');


include_once(PATH_TABLA . DS . 'Incidencia.php');
include_once(PATH_TABLA . DS . 'IncidenciaCategoria.php');
include_once(PATH_TABLA . DS . 'IncidenciaEstado.php');
include_once(PATH_TABLA . DS . 'IncidenciaTipo.php');
include_once(PATH_TABLA . DS . 'IncidenciaHistorial.php');

include_once(PATH_MODELO . DS . 'SQLIncidencia.php');
include_once(PATH_MODELO . DS . 'SQLIncidenciaCategoria.php');
include_once(PATH_MODELO . DS . 'SQLIncidenciaEstado.php');
include_once(PATH_MODELO . DS . 'SQLIncidenciaTipo.php');
include_once(PATH_MODELO . DS . 'SQLIncidenciaHistorial.php');



include_once( PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');

class AdmSoporte extends Principal {

    public function AdmSoporte() {

        $vista = Principal::getVistaInstance();
        $incidencia = new Incidencia();
        $incidenciaTipo = new IncidenciaTipo();
        $incidenciaEstado = new IncidenciaEstado();
        $incidenciaCategoria = new IncidenciaCategoria();
        $incidenciaHistorial = new IncidenciaHistorial();
        
        $sqlincidencia = new SQLIncidencia();
        $sqlincidenciaTipo = new SQLIncidenciaTipo();
        $sqlincidenciaEstado = new SQLIncidenciaEstado();
        $sqlincidenciaCategoria = new SQLIncidenciaCategoria();
        $sqlincidenciaHistorial = new SQLIncidenciaHistorial();
        
        if($_REQUEST['tarea']=='show_formulario')
        {
            $vista->display('admSoporte/formulario.tpl');
        }
        if($_REQUEST['tarea']=='show_incidencias')
        {
            $vista->display('admSoporte/listasIncidencias.tpl');
        }
        if($_REQUEST['tarea']=='show_solicitud')
        {
            print('<pre>'.print_r($_REQUEST,true).'</pre>');
            //$vista->display('admSoporte/listasIncidencias.tpl');
        }
        if($_REQUEST['tarea']=='save_solicitud')
        {
            
        }
        if($_REQUEST['tarea']=='list_estado')
        {
            $lista = $sqlincidenciaEstado->getListIncidencia($incidenciaEstado);            
            $strJson = '';
            echo '[';
            foreach ($lista as $value){
                if($value->getId_incidencia_estado()!=5){
                    $strJson .= '{"id_estado":"' . $value->getId_incidencia_estado() .
                     '","descripcion":"' . $value->getDescripcion() . '"},';
                }
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='list_incidencias')
        {
            $estado=empty($_REQUEST['estado']) ? 0 : $_REQUEST['estado'];
            
            $incidencia->setId_estado($estado);
            $lista = $sqlincidencia->getListIncidencia($incidencia);
            
            $strJson = '';
            echo '[';
            foreach ($lista as $value){
                
                if($value->getId_estado()!=5){
                    $incidenciaCategoria->setId_incidencia_categoria(5);
                    $incidenciaCategoria = $sqlincidenciaCategoria->getIncidenciaCategoriaById($incidenciaCategoria);
                    $strJson .= '{"id_incidencia":"' . $value->getId_incidencia() .
                     '","ticket":"' . $value->getTicket() .
                     '","titulo":"' . $value->getTitulo().
                     '","fecha":"' . substr( $value->getFecha(), 0, 10 ) .
                     '","categoria":"' . $incidenciaCategoria->getDescripcion() . '"},';
                }
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='list_categorias')
        {
            $strJson = '';
            echo '[';
            $incidenciaCategoria->setId_incidencia_tipo(3);
            $list1 = $sqlincidenciaCategoria->getIncidenciaCategoriaTipo($incidenciaCategoria);
            foreach ($list1 as $value){
                $strJson .= '{"id_incidencia_categoria":"' . $value->getId_incidencia_categoria() .
                 '","descripcion":"' . $value->getDescripcion() . '"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        exit;
    }
}