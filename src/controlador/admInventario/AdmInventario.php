<?php

defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_MODELO . DS . 'SQLFactura.php');
include_once(PATH_MODELO . DS . 'SQLInsumosFactura.php');
include_once(PATH_TABLA . DS . 'Factura.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'Incoterm.php');
include_once(PATH_TABLA . DS . 'InsumosFactura.php');
include_once(PATH_TABLA . DS . 'UnidadMedida.php');
include_once(PATH_MODELO . DS . 'SQLUnidadMedida.php');
include_once(PATH_MODELO . DS . 'SQLFacturaNoDosificada.php');
include_once(PATH_MODELO . DS . 'SQLInsumosFacturaNoDosificada.php');
include_once(PATH_TABLA . DS . 'FacturaNoDosificada.php');
include_once(PATH_TABLA . DS . 'InsumosFacturaNoDosificada.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_MODELO . DS . 'SQLFacturaTercerOperador.php');
include_once(PATH_TABLA . DS . 'FacturaTercerOperador.php');
include_once(PATH_MODELO . DS . 'SQLInsumosFacturaTercerOperador.php');
include_once(PATH_TABLA . DS . 'InsumosFacturaTercerOperador.php');


class AdmInventario extends Principal {
  public function AdmInventario() 
  {
    $vista = Principal::getVistaInstance();
    $factura = new Factura();
    $sqlFactura = new SQLFactura();
    $facturanodosificada = new FacturaNoDosificada();
    $sqlFacturanodosificada = new SQLFacturaNoDosificada();
    $facturaterceroperador = new FacturaTercerOperador();            
    $sqlFacturaterceroperador = new SQLFacturaTercerOperador();
        
    if($_REQUEST['tarea']=='mostrarfactura')
    {
        $unidadmedida = new UnidadMedida();
        $sqlUnidadmedida = new SQLUnidadMedida();
        $unidades=$sqlUnidadmedida->getListarUnidadMedida($unidadmedida);
        
        if($_REQUEST['tipo_factura']=='1') //dosificada
        {
            $factura->setId_factura($_REQUEST['id_factura']);
            $facturaempresainsumos=$sqlFactura->getFacturaEmpresaInsumoPorID($factura);             
            $vista->assign('esdosificada', '1');
        }
        else if($_REQUEST['tipo_factura']=='0') //no dosificada
        {
            
            $facturanodosificada->setId_factura_no_dosificada($_REQUEST['id_factura']);
            $facturaempresainsumos=$sqlFacturanodosificada->getFacturaEmpresaInsumoPorID($facturanodosificada);
            $vista->assign('esdosificada','0');
            
            if($facturaempresainsumos->getId_factura())
            {
                $facturasnumero='';
                $idfacturas=explode(",", $facturaempresainsumos->getId_factura());
                foreach ($idfacturas as $idfactura) {
                    $factura->setId_factura($idfactura);
                    $factura=$sqlFactura->getFacturaEmpresaInsumoPorID($factura);
                    $facturasnumero.='<span class="terminos letrarelevante" onclick="anadir(\'Factura Nro. '.$factura->getNumero_factura().'\',\'admInventario\',\'mostrarfactura&id_factura='.$factura->getId_factura().'&tipo_factura=1\')">Nro. '.$factura->getNumero_factura().'</span>, ';
                }
                $facturasnumero=rtrim(trim($facturasnumero), ",");
                $vista->assign('facturapadre',$facturasnumero);
            }
        }
        else if($_REQUEST['tipo_factura']=='2') //tercer operador
        {
            $facturaterceroperador->setId_factura_tercer_operador($_REQUEST['id_factura']);
            $facturaempresainsumos=$sqlFacturaterceroperador->getFacturaEmpresaInsumoPorID($facturaterceroperador);  
            $vista->assign('esdosificada', '2');
        }
        
        $vista->assign('unidades',$unidades);
        $vista->assign('facturaempresainsumos', $facturaempresainsumos);
        $vista->display("admInventario/Inventario.tpl");
        exit;
        
    }
    if($_REQUEST['tarea']=='inventario')
    {
        echo '[';
        //-------------- esta es para el insumo de la factura---------------------------
        $insumosfactura = new InsumosFactura();
        $sqlInsumosFactura = new SQLInsumosFactura();
        $factura->setId_Empresa($_SESSION['id_empresa']);
        $facturas=$sqlFactura->getListarFacturasPorEmpresaNoUtilizado($factura);
        foreach ($facturas as &$facturaa) {
            $insumosfactura->setId_factura($facturaa->getId_factura());
            $insumosfacturas=$sqlInsumosFactura->getListarInsumosPorFactura($insumosfactura);
            
                    
            foreach ($insumosfacturas as &$insumosfacturasa) {
                if($insumosfacturasa->getUtilizado()==false)
                {
                         //-------------declaramos la factura-----
                $strJson .= '{"id_factura":"' . $facturaa->getId_Factura() .
                            '","numero_factura":"' . $facturaa->getNumero_factura().
                            '","numero_autorizacion":"' . $facturaa->getNumero_autorizacion() .
                            '","fecha_emision":"' . $facturaa->getFecha_emision() .
                            '","puerto_embarque":"' . $facturaa->getPuerto_embarque() .
                            '","puerto_destino":"' . $facturaa->getPuerto_destino() .
                            '","id_empresa":"' . $facturaa->getId_empresa() .
                        //--------------aqui empieza el insumofactura
                            '","id_insumos_factura":"' . $insumosfacturasa->getId_insumos_factura() .
                            '","cantidad":"' . $insumosfacturasa->getSaldo() .
                            '","descripcion":"' . $insumosfacturasa->getDescripcion() .
                            '","precio":"' . $insumosfacturasa->getPrecio() . 
                            '","utilizado":"' . 'Sin Utilizar'. 
                        //--------------determina si es dosificada
                            '","tipodosificada":"' .'1'. 
                            '","tipodescripcion":"' . 'Dosificada' . 
                            '"},';
                }
               
            }        
        }
        //-------------- esta es para el insumo de la factura no dosificada---------------------------
        $insumosfacturanodosificada = new InsumosFacturaNoDosificada();
        $sqlInsumosFacturanodosficada = new SQLInsumosFacturaNoDosificada();
        $facturanodosificada->setId_Empresa($_SESSION['id_empresa']);
        $facturasnodosificadas=$sqlFacturanodosificada->getListarFacturasPorEmpresaNoUtilizado($facturanodosificada);
        foreach ($facturasnodosificadas as &$facturan) {
            $insumosfacturanodosificada->setId_factura_no_dosificada($facturan->getId_factura_no_dosificada());
            $insumosfacturanodosificadas=$sqlInsumosFacturanodosficada->getListarInsumosPorFactura($insumosfacturanodosificada);
            foreach ($insumosfacturanodosificadas as &$insumosfacturasn) {
                if($insumosfacturasn->getUtilizado()==false)
                {
                            //-------------declaramos la factura-----
                $strJson .= '{"id_factura":"' . $facturan->getId_Factura_no_dosificada() .
                            '","numero_factura":"' . $facturan->getNumero_factura().
                            '","numero_autorizacion":"' . '' .
                            '","fecha_emision":"' . $facturan->getFecha_emision() .
                            '","puerto_embarque":"' . $facturan->getPuerto_embarque() .
                            '","puerto_destino":"' . $facturan->getPuerto_destino() .
                            '","id_empresa":"' . $facturan->getId_empresa() .
                        //--------------aqui empieza el insumofactura
                            '","id_insumos_factura":"' . $insumosfacturasn->getId_insumos_factura() .
                            '","cantidad":"' . $insumosfacturasn->getCantidad() .
                            '","descripcion":"' . $insumosfacturasn->getDescripcion() .
                            '","precio":"' . $insumosfacturasn->getPrecio() . 
                            '","utilizado":"' . 'Sin Utilizar' .
                        //-------------determina si es dosificada
                            '","tipodosificada":"' . '0' . 
                            '","tipodescripcion":"' . 'No Dosificada' . 
                            '"},';
                }
              
            }        
        }
        //--------------------------------------------
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    if($_REQUEST['tarea']=='buscarConsignatarioFactura')
    {
        $valores = json_decode($_REQUEST["valores"]);
        if($valores->tipo_factura==1){
            $factura->setId_factura($valores->id_factura);
            $factura=$sqlFactura->getFacturaPorID($factura);
            //echo '{"datos":[{"nombre_consignatario":"' . $factura->getCliente() .
            echo '{"nombre_consignatario":"' . $factura->getConsignatario() .
                    '","direccion_consignatario":"' . $factura->getDireccion_consignatario() .
                    '","pais_consignatario":"' . $factura->getPais_consignatario() .
                    '","nombre_importador":"' . $factura->getImportador() .
                    '","direccion_importador":"' . $factura->getDireccion_importador() .
                    '","pais_importador":"' . $factura->getPais_importador() . '"}';
        }else{
            $facturanodosificada->setId_factura_no_dosificada($valores->id_factura);
            $facturanodosificada=$sqlFacturanodosificada->getFacturaPorID($facturanodosificada);
            //return $facturanodosificada;
            echo '{"nombre_consignatario":"' . $facturanodosificada->getConsignatario() .
                    '","direccion_consignatario":"' . $facturanodosificada->getDireccion_consignatario() .
                    '","pais_consignatario":"' . $facturanodosificada->getPais_consignatario() . '"}';
                    '","nombre_importador":"' . $facturanodosificada->getImportador() . '"}';
                    '","direccion_importador":"' . $facturanodosificada->getDireccion_importador() . '"}';
                    '","pais_importador":"' . $facturanodosificada->getPais_importador() . '"}';
        }
        exit;
    }
    
    
    
    
    
    $vista->display("admInventario/Inventarios.tpl");
    exit;
  }
}