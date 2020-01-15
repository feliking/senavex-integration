<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 23-09-2014
 * @autor       Marcelo Ivo Sanabria Ribera
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');
 

include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');

include_once(PATH_MODELO . DS . 'SQLServicio.php');

include_once(PATH_MODELO . DS . 'SQLDeposito.php');
include_once(PATH_MODELO . DS . 'SQLDetalleDeposito.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManual.php');


include_once(PATH_TABLA . DS . 'Deposito.php');
include_once(PATH_TABLA . DS . 'DetalleDeposito.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManual.php');


class AdmDeposito extends Principal {
    

    public function AdmDeposito(){
        $vista = Principal::getVistaInstance();
        
        $deposito=new Deposito();
        $sqlDeposito = new SQLDeposito();
       
        if($_REQUEST['tarea']=='prueba')
        {
           // print('<pre>'.print_r($_REQUEST,true).'</pre>');
        }
        if($_REQUEST['tarea']=='verDepositosPorFactura')
        {
            $deposito->setId_factura($_REQUEST['id_factura']);        
            $lista = $sqlDeposito->getListarDepositoPorFactura($deposito);
            $strJson = '';
            echo '[';
            foreach ($lista as $depo){
                $strJson .= '{"id_deposito":"' . $depo->getId_deposito() .
                 '","codigo":"' . $depo->getCodigo_Deposito().
                 '","monto":"' . $depo->getMonto() .
                 '","descripcion":"' . $depo->getDescripcion() .
                 '","fecha":"' . substr($depo->getFecha_Deposito(), 0, 10) . '"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='registrar_fmdepositos')
        {
            $resultado = 'true';
            $lista = array_keys($_REQUEST);
            for ($index = 2; $index < count($lista)-2; $index++) {
                $aux = explode('-', $lista[$index]);
                if(count($aux)>2){
                    $fmDeposito = new Deposito();
                    $sqlfmDeposito = new SQLDeposito();
                    $fmDeposito->setEstado(0);
                    $fmDeposito->setMonto($_REQUEST['monto-deposito-'.$aux[2]]);
                    $fmDeposito->setFecha_Deposito($_REQUEST['fecha-deposito-'.$aux[2]]);
                    $fmDeposito->setCodigo_Deposito($_REQUEST['numero-deposito-'.$aux[2]]);
                    $fmDeposito->setId_factura($_REQUEST['id_factura']);
                    try {
                        $resultado = $sqlfmDeposito->Save($fmDeposito);
                    } catch (Exception $ex) {
                        $resultado=false;
                    }
                }
                $index+=2;
            }
            if($resultado)
                echo $fmDeposito->getId_deposito().'-'.$_REQUEST['id_factura'];
            else
                echo  '-1';
            
            exit;
        }
        if($_REQUEST['tarea']=='existe_deposito'){
            $deposito = new Deposito();
            $sqlDeposito = new SQLDeposito();
            $deposito->setCodigo_Deposito($_REQUEST['codigo_deposito']);
            $res = $sqlDeposito->getListarDepositoPorCodigo($deposito);
            if(count($res)>0){
                $factura = new FacturaSenavexManual();
                $sqlFacturaSenavexManual = new SQLFacturaSenavexManual();
                $factura->setId_factura_senavex_manual($res[0]->getId_factura());
                $factura = $sqlFacturaSenavexManual->getFacturaManualPorID($factura);
                if($factura->getEstado() == 1){
                    $res = array();
                }
            }
            echo '[';
            echo '{"suceso":"'. count($res) .'"}';
            echo ']';
        }
    }
    public function registrarDepositos($listaRequest){
        $resultado = true;
        $lista = array_keys($listaRequest);
        for ($index = 2; $index < count($lista)-2; $index++) {
            $aux = explode('-', $lista[$index]);
            if(count($aux)>2){
                $fmDeposito = new Deposito();
                $sqlfmDeposito = new SQLDeposito();
                $fmDeposito->setEstado(0);
                $fmDeposito->setMonto($listaRequest['monto-deposito-'.$aux[2]]);
                $fmDeposito->setFecha_Deposito($listaRequest['fecha-deposito-'.$aux[2]]);
                $fmDeposito->setCodigo_Deposito($listaRequest['numero-deposito-'.$aux[2]]);
                $fmDeposito->setId_factura($listaRequest['id_factura']);
                try {
                    $resultado = $sqlfmDeposito->Save($fmDeposito);
                } catch (Exception $ex) {
                    $resultado=false;
                }
            }
            $index+=2;
        }
        if($resultado)
            $salida = $fmDeposito->getId_deposito().'-'.$listaRequest['id_factura'];
        else
            $salida = '-1';

        return $salida;
    }
}