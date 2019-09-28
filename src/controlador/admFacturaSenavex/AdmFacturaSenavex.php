<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 23-09-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');
 

include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavex.php');
include_once(PATH_MODELO . DS . 'SQLProForma.php');
include_once(PATH_MODELO . DS . 'SQLServicio.php');
include_once(PATH_MODELO . DS . 'SQLServicioExportador.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexPersona.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexEmpresa.php');

include_once(PATH_TABLA . DS . 'FacturaSenavex.php');
include_once(PATH_TABLA . DS . 'ProForma.php');
include_once(PATH_TABLA . DS . 'ServicioExportador.php');
include_once(PATH_TABLA . DS . 'Servicio.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexEmpresa.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexPersona.php');



class AdmFacturaSenavex extends Principal {

    public function AdmFacturaSenavex(){
        $vista = Principal::getVistaInstance();
        
        if($_REQUEST['tarea']=='mostrar_factura_manual'){
            $facturaSenavexPersona = new FacturaSenavexPersona();
            $sqlFacturaSenavexPersona = new SQLFacturaSenavexPersona();
            $facturaSenavexPersona->setApellido_paterno('ap paterno');
            $facturaSenavexPersona->setApellido_materno('ap materno');
            $facturaSenavexPersona->setNombres('nombres');
            $facturaSenavexPersona = $sqlFacturaSenavexPersona->Save($facturaSenavexPersona);
            print('<pre>'.print_r($facturaSenavexPersona, true).'</pre>'); 
        }
        if($_REQUEST['tarea']=='listarFacturas'){
        }
        
        if($_REQUEST['tarea']=='generarFactura'){
            
        }
    }
}