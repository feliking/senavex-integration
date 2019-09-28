<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Vista.php v1.0 19-06-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */
require(PATH_BASE . DS . 'lib'.DS.'smarty'.DS.'Smarty.class.php');

class Vista extends Smarty 
{
   /* public function Vista()     
    {
        $this->template_dir = PATH_BASE.DS . 'web/vista';
        $this->compile_dir  = PATH_BASE.DS . 'web_cache';
    }*/
    function __construct() 
         { 
            parent::__construct(); 
            
           $this->setTemplateDir( PATH_BASE.DS . 'web/vista'); 
           $this->setCompileDir( PATH_BASE.DS . 'web_cache'); 
           $this->setCacheDir(PATH_BASE.DS . 'web_cache'); 
          
           /*$this->caching = true; 
           $this->assign('app_name', 'cti'); */
         } 
}

?>