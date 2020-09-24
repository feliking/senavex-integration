<?php
/**
 * Created by PhpStorm.
 * User: RENZO
 * Date: 11/11/2017
 * Time: 10:42 AM
 */

// Este controlador sirve para prevenir que un usuario ingrese a tareas o metodos a los que tiene acceso
// Restringido.

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_CONTROLADOR . DS . 'middleware' . DS . 'Condicionales.php');

class Middleware extends Principal
{

    public function Middleware()
    {
        //aqui se pueden poner las validaciones genericas del sitio..

    }

    public function verificaCondicional($metodo){
        $condicional = new Condicionales();
        if(!$condicional->$metodo()) $this->muestraRestriccion();
    }
    public function verificaEmpresaBloqueada(){
        $condicional = new Condicionales();
        if(isset($_SESSION['estado_empresa'])
            AND ($_SESSION['estado_empresa'] == $condicional->getEstadoEmpresaBloqueada())){
            $this->muestraRestriccion('Su empresa ha sido inhabilitada, por favor aproxímese al SENAVEX para regularizar su
            estado.');
        }
    }

    public function muestraRestriccion(
        $mensaje = 'Disculpe las molestias usted no tiene acceso a esta opción.'
    )
    {
        if($this->esAjax()) {
            echo '{"status":0,"message":"'.$mensaje.'"}';
        }
        else {
            $vista = Principal::getVistaInstance();
            $vista->assign('mensaje',$mensaje);
            $vista->display('includes/Restriccion.tpl');
        }
        exit;
    }
    public function esAjax(){
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

}
