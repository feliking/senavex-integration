<?php

defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_MODELO . DS . 'SQLFactura.php');
include_once(PATH_TABLA . DS . 'Factura.php');
include_once(PATH_MODELO . DS . 'SQLFacturaNoDosificada.php');
include_once(PATH_TABLA . DS . 'FacturaNoDosificada.php');
include_once(PATH_MODELO . DS . 'SQLFacturaTercerOperador.php');
include_once(PATH_TABLA . DS . 'FacturaTercerOperador.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Incoterm.php');
include_once(PATH_TABLA . DS . 'UnidadMedida.php');
include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');
include_once(PATH_TABLA . DS . 'DdjjAcuerdo.php');
include_once(PATH_TABLA . DS . 'EstadoDdjj.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'DetalleArancel.php');
include_once(PATH_TABLA . DS . 'Pais.php');

include_once(PATH_MODELO . DS . 'SQLAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLDdjjAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLInsumosFactura.php');
include_once(PATH_MODELO . DS . 'SQLInsumosFacturaTercerOperador.php');
include_once(PATH_MODELO . DS . 'SQLIncoterm.php');
include_once(PATH_TABLA . DS . 'InsumosFactura.php');
include_once(PATH_MODELO . DS . 'SQLInsumosFacturaNoDosificada.php');
include_once(PATH_MODELO . DS . 'SQLUnidadMedida.php');
include_once(PATH_TABLA . DS . 'InsumosFacturaNoDosificada.php');
include_once(PATH_TABLA . DS . 'InsumosFacturaTercerOperador.php');
include_once(PATH_MODELO . DS . 'SQLDeclaracionJurada.php');
include_once(PATH_MODELO . DS . 'SQLDetalleArancel.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');

class AdmFactura extends Principal {
  public function AdmFactura() 
  {
    $vista = Principal::getVistaInstance();
    $factura = new Factura();
    $facturanodosificada = new FacturaNoDosificada();
    $insumosfactura = new InsumosFactura();
    $insumosfacturanodosificada = new InsumosFacturaNoDosificada();
    $declaracion_jurada = new DeclaracionJurada();
    $detalle_arancel = new DetalleArancel();
            
    $sqlFactura = new SQLFactura();
    $sqlFacturanodosificada = new SQLFacturaNoDosificada();
    $sqlInsumosFactura = new SQLInsumosFactura();
    $sqlInsumosFacturanodosificada = new SQLInsumosFacturaNoDosificada();
    $sqlDeclaracionJurada = new SQLDeclaracionJurada();
    $sqlDetalleArancel = new SQLDetalleArancel();
    
    //-------------------------------------------------esto es para mostrar todas las facturas--------------------------------
    if($_REQUEST['tarea']=='listarFacturas')//no utilidas
    {
        $facturaterceroperador = new FacturaTercerOperador();            
        $sqlFacturaterceroperador = new SQLFacturaTercerOperador();
        $acuerdo = new Acuerdo();
        $sqlacuerdo =new SQLAcuerdo();
        
        echo '[';
        //-------------- esta es para el insumo de la factura---------------------------
        $factura->setId_Empresa($_SESSION['id_empresa']);
        $facturas=$sqlFactura->getListarFacturasPorEmpresaNoUtilizado($factura);
        foreach ($facturas as &$facturaa) {
            //------------------para el acuerdo---------------------------
            $acuerdo->setId_Acuerdo((int)$facturaa->getId_acuerdo());
            $acuerdo=$sqlacuerdo->getBuscarAcuerdoPorId($acuerdo);
                        //-------------declaramos la factura-----
                $strJson .= '{"id_factura":"' . $facturaa->getId_Factura() .
                            '","numero_factura":"' . $facturaa->getNumero_factura().
                            '","numero_autorizacion":"' . $facturaa->getNumero_autorizacion() .
                            '","fecha_emision":"' . $facturaa->getFecha_emision() .
                            '","puerto_embarque":"' . $facturaa->getPuerto_embarque() .
                            '","puerto_destino":"' . $facturaa->getPuerto_destino() .
                            '","id_empresa":"' . $facturaa->getId_empresa() .
                            '","total":"' . $facturaa->getTotal_incoterm() .
                            '","id_estado_factura":"' . $facturaa->getId_estado_factura() .
                        //--------------determina si es dosificada
                            '","tipodosificada":"' .'1'. 
                            '","tipodescripcion":"' . 'Dosificada' . 
                            '","facturapadre":"' . ''.
                            '","id_acuerdo":"' . $acuerdo->getSigla().
                            '"},';     
        }
        //-------------- esta es para el insumo de la factura no dosificada---------------------------
        $facturanodosificada->setId_Empresa($_SESSION['id_empresa']);
        $facturasnodosificadas=$sqlFacturanodosificada->getListarFacturasPorEmpresaNoUtilizado($facturanodosificada);
        foreach ($facturasnodosificadas as &$facturan) {
            //----------------------para numerod de factura padre--------------------------------------
                if($facturan->getId_factura())
                {
                    $facturasnumero='';
                    $idfacturas=explode(",", $facturan->getId_factura());
                    foreach ($idfacturas as $idfactura) {
                        $factura->setId_factura($idfactura);
                        $factura=$sqlFactura->getFacturaEmpresaInsumoPorID($factura);
                        $facturasnumero.='Nro. '.$factura->getNumero_factura().', ';
                    }
                    $facturasnumero=rtrim(trim($facturasnumero), ",");
                }
               //------------------para el acuerdo---------------------------
            $acuerdo->setId_Acuerdo((int)$facturan->getId_acuerdo());
            $acuerdo=$sqlacuerdo->getBuscarAcuerdoPorId($acuerdo);
                        //-------------declaramos la factura-----
                $strJson .= '{"id_factura":"' . $facturan->getId_Factura_no_dosificada() .
                            '","numero_factura":"' . $facturan->getNumero_factura().
                            '","numero_autorizacion":"' . '' .
                            '","fecha_emision":"' . $facturan->getFecha_emision() .
                            '","puerto_embarque":"' . $facturan->getPuerto_embarque() .
                            '","puerto_destino":"' . $facturan->getPuerto_destino() .
                            '","id_empresa":"' . $facturan->getId_empresa() .
                            '","total":"' . $facturan->getTotal_productos() .
                            '","id_estado_factura":"' . $facturan->getId_estado_factura() .
                        //-------------determina si es dosificada
                            '","tipodosificada":"' . '0' . 
                            '","tipodescripcion":"' . 'No Dosificada' . 
                        '","facturapadre":"' . $facturasnumero.
                        '","id_acuerdo":"' . $acuerdo->getSigla().
                            '"},';
        }
       /* //-------------- esta es para tercer operador---------------------------
        $facturaterceroperador->setId_Empresa($_SESSION['id_empresa']);
        $facturaterceroperadors=$sqlFacturaterceroperador->getListarFacturasTercerOperadorPorEmpresaNoUtilizado($facturaterceroperador);
        foreach ($facturaterceroperadors as &$facturat) {
                        //-------------declaramos la factura-----
                $strJson .= '{"id_factura":"' . $facturat->getId_Factura_tercer_operador() .
                            '","numero_factura":"' . $facturat->getNumero_factura().
                            '","numero_autorizacion":"' . '' .
                            '","fecha_emision":"' . $facturat->getFecha_emision() .
                            '","puerto_embarque":"' . $facturat->getPuerto_embarque() .
                            '","puerto_destino":"' . $facturat->getPuerto_destino() .
                            '","id_empresa":"' . $facturat->getId_empresa() .
                            '","total":"' . $facturat->getTotal() .
                            '","id_estado_factura":"' . $facturat->getId_estado_factura() .
                        //-------------determina si es dosificada
                            '","tipodosificada":"' . '2' . 
                            '","tipodescripcion":"' . 'Tercer Operador' . 
                        '","facturapadre":"' . ''.
                            '"},';
        }*/
        //--------------------------------------------
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
     if($_REQUEST['tarea']=='listarFacturasUtilizado')//utilizadas
    {
        $facturaterceroperador = new FacturaTercerOperador();            
        $sqlFacturaterceroperador = new SQLFacturaTercerOperador();
        
        echo '[';
        //-------------- esta es para el insumo de la factura---------------------------
        $factura->setId_Empresa($_SESSION['id_empresa']);
        $facturas=$sqlFactura->getListarFacturasPorEmpresaUtilizado($factura);
        foreach ($facturas as &$facturaa) {
                        //-------------declaramos la factura-----
                $strJson .= '{"id_factura":"' . $facturaa->getId_Factura() .
                            '","numero_factura":"' . $facturaa->getNumero_factura().
                            '","numero_autorizacion":"' . $facturaa->getNumero_autorizacion() .
                            '","fecha_emision":"' . $facturaa->getFecha_emision() .
                            '","puerto_embarque":"' . $facturaa->getPuerto_embarque() .
                            '","puerto_destino":"' . $facturaa->getPuerto_destino() .
                            '","id_empresa":"' . $facturaa->getId_empresa() .
                            '","total":"' . $facturaa->getTotal_incoterm() .
                            '","id_estado_factura":"' . $facturaa->getId_estado_factura() .
                        //--------------determina si es dosificada
                            '","tipodosificada":"' .'1'. 
                            '","tipodescripcion":"' . 'Dosificada' . 
                            '"},';      
        }
        //-------------- esta es para el insumo de la factura no dosificada---------------------------
        $facturanodosificada->setId_Empresa($_SESSION['id_empresa']);
        $facturasnodosificadas=$sqlFacturanodosificada->getListarFacturasPorEmpresaUtilizado($facturanodosificada);
        foreach ($facturasnodosificadas as &$facturan) {
                        //-------------declaramos la factura-----
                $strJson .= '{"id_factura":"' . $facturan->getId_Factura_no_dosificada() .
                            '","numero_factura":"' . $facturan->getNumero_factura().
                            '","numero_autorizacion":"' . '' .
                            '","fecha_emision":"' . $facturan->getFecha_emision() .
                            '","puerto_embarque":"' . $facturan->getPuerto_embarque() .
                            '","puerto_destino":"' . $facturan->getPuerto_destino() .
                            '","id_empresa":"' . $facturan->getId_empresa() .
                            '","total":"' . $facturan->getTotal_productos() .
                            '","id_estado_factura":"' . $facturan->getId_estado_factura() .
                        //-------------determina si es dosificada
                            '","tipodosificada":"' . '0' . 
                            '","tipodescripcion":"' . 'No Dosificada' . 
                            '"},';
        }
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
     if($_REQUEST['tarea']=='listarFacturasEnEspera')//emnespera
    {
        $facturaterceroperador = new FacturaTercerOperador();            
        $sqlFacturaterceroperador = new SQLFacturaTercerOperador();
        
        echo '[';
        //-------------- esta es para el insumo de la factura---------------------------
        $factura->setId_Empresa($_SESSION['id_empresa']);
        $facturas=$sqlFactura->getListarFacturasPorEmpresaEnEspera($factura);
        foreach ($facturas as &$facturaa) {
                        //-------------declaramos la factura-----
                $strJson .= '{"id_factura":"' . $facturaa->getId_Factura() .
                            '","numero_factura":"' . $facturaa->getNumero_factura().
                            '","numero_autorizacion":"' . $facturaa->getNumero_autorizacion() .
                            '","fecha_emision":"' . $facturaa->getFecha_emision() .
                            '","puerto_embarque":"' . $facturaa->getPuerto_embarque() .
                            '","puerto_destino":"' . $facturaa->getPuerto_destino() .
                            '","id_empresa":"' . $facturaa->getId_empresa() .
                            '","total":"' . $facturaa->getTotal_incoterm() .
                            '","id_estado_factura":"' . $facturaa->getId_estado_factura() .
                        //--------------determina si es dosificada
                            '","tipodosificada":"' .'1'. 
                            '","tipodescripcion":"' . 'Dosificada' . 
                            '"},';      
        }
        //-------------- esta es para el insumo de la factura no dosificada---------------------------
        $facturanodosificada->setId_Empresa($_SESSION['id_empresa']);
        $facturasnodosificadas=$sqlFacturanodosificada->getListarFacturasPorEmpresaEnEspera($facturanodosificada);
        foreach ($facturasnodosificadas as &$facturan) {
                        //-------------declaramos la factura-----
                $strJson .= '{"id_factura":"' . $facturan->getId_Factura_no_dosificada() .
                            '","numero_factura":"' . $facturan->getNumero_factura().
                            '","numero_autorizacion":"' . '' .
                            '","fecha_emision":"' . $facturan->getFecha_emision() .
                            '","puerto_embarque":"' . $facturan->getPuerto_embarque() .
                            '","puerto_destino":"' . $facturan->getPuerto_destino() .
                            '","id_empresa":"' . $facturan->getId_empresa() .
                            '","total":"' . $facturan->getTotal_productos() .
                            '","id_estado_factura":"' . $facturan->getId_estado_factura() .
                        //-------------determina si es dosificada
                            '","tipodosificada":"' . '0' . 
                            '","tipodescripcion":"' . 'No Dosificada' . 
                            '"},';
        }       
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    
    if($_REQUEST['tarea']=='verFacturas')
    {
        
        $acuerdo =new Acuerdo();
        $sqlacuerdo=new SQLAcuerdo();
        $acuerdos=$sqlacuerdo->getListarAcuerdo($acuerdo);
        $vista->assign('acuerdos',$acuerdos);
        $vista->assign('menor_cuantia',$_SESSION['menor_cuantia']);
        $vista->display("admFactura/Facturas.tpl");
        exit;

    }
    //-------------------------------------------------esto es para la reparticion de factura-----------------------------------------
    if($_REQUEST['tarea']=='devuelveInsumosFactura')//te envia en un json os id de las facturas dosificadas con saldo disponible
     {
        $unidadmedida = new UnidadMedida();
        $sqlUnidadmedida = new SQLUnidadMedida();
            
        $insumos = explode(";", $_REQUEST['id_insumos_factura']);
        foreach ($insumos as $insumo) {
            $insumosfactura->setId_insumos_factura($insumo);
            $insumo=$sqlInsumosFactura->getInsumosPorId($insumosfactura);
            
            $unidadmedida->setId_Unidad_Medida($insumo->getUnidad_medida());
            $unidadmedida=$sqlUnidadmedida->getBuscarDescripcionPorId($unidadmedida);
            
            $strJson .= '{"id_insumos_factura":"' . $insumo->getId_insumos_factura() .
                   '","id_factura":"' . $insumo->getId_factura() .
                   '","cantidadn":"0' .
                   '","producton":"' .$insumo->getDescripcion() .
                   '","unidad_medidan":"' .$unidadmedida->getDescripcion().
                   '","cantidadnsaldo":"' .$insumo->getSaldo() .
                    '","cantidadnsaldototal":"' .$insumo->getSaldo() .
                    '","precio_unitarion":"0'.
                    '","totaln":"0' .
                    '","id_ddjj":"' . $_REQUEST['id_ddjj_primero'].
                   '"},';
        }
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo '['.$strJson.']';
        exit;
     }
    if($_REQUEST['tarea']=='facturasDispuestas')//te envia en un jason os id de las facturas dosificadas con saldo disponible
     {
        // aqui le tenemos que enviar la lista de dosificada por numero
        $factura->setId_Empresa($_SESSION['id_empresa']);
        $facturas=$sqlFactura->getListarFacturasPorEmpresaNoUtilizado($factura);//obtengo todas las facturas no utilizadas
        
        //aqui obtendre todos lso insumos de esas facturas que no tiene saldo
        $facturasdispuestas= array();
        $i = 0;
        foreach ($facturas as $fac) {
            $insumosfactura->setId_factura($fac->getId_factura());
            $insumosfacturas=$sqlInsumosFactura->getListarInsumosPorFacturaConSaldo($insumosfactura);
            
            $strJson .= '{"id_factura":"' . $fac->getId_factura().';' ;//aqui concatena el id de la factura como primer elemento
            //------aqui voy a mostrar todos los insumos facturas que tienes saldo y almacenare los id facturas con conbinaciones con id insumos
            $long = count($insumosfacturas);$f = 0;
            foreach ($insumosfacturas as $ins) //aqui concatena los id de los insumos
            {
                $strJson .= $ins->getId_insumos_factura();
                $facturasdispuestas[$i]['id_insumos'].=$ins->getId_insumos_factura();
                if($f!=$long - 1)
                {
                    $strJson .= ';';
                }   
                $f++;
            }
            $i++;
            $strJson .='","numero_factura":"Nro. ' .$fac->getNumero_factura() .'"},';
        }
        //$strJson .= '{"id_factura":"","numero_factura":"Ninguna"}';
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo '['.$strJson.']';
        exit;
     }
     if($_REQUEST['tarea']=='facturasDispuestasEdicion')//te envia en un jason os id de las facturas dosificadas con saldo disponible
     {
        // aqui le tenemos que enviar la lista de dosificada por numero
        $factura->setId_Empresa($_SESSION['id_empresa']);
        $facturas=$sqlFactura->getListarFacturasPorEmpresaNoUtilizado($factura);//obtengo todas las facturas no utilizadas
        
       
        //--------------------------esto es para los campos que hansido editados-----------
        $multiarray= array();
        $j=0;
        $multiselect=explode(',',$_REQUEST['valoresmultiselect']);
        foreach ($multiselect as $m)
        {
            $n=explode(';',$m);
            $multiarray[$j][0]=$n[0];//idfactura
            for($k = 1; $k < count($n); $k++)
            {
                
                $multiarray[$j][1][$k-1]=(int)$n[$k];
            }     
            $multiarray[$j][2]=0;//---esto es para cuando no esta combinado
            $multiarray[$j][3]=1;//--esto es para decirle que sera por defecto
            $j++;
        }
        //----------------------------
         $insumosbd= array();
         $l=0;
        //----------------------------------este lo asiganmo en un array--------------------------
        foreach ($facturas as $fac) {
            $insumosfactura->setId_factura($fac->getId_factura());
            $insumosfacturas=$sqlInsumosFactura->getListarInsumosPorFacturaConSaldo($insumosfactura);
                      
            //$strJson .= '{"id_factura":"' . $fac->getId_factura().';' ;//aqui concatena el id de la factura como primer elemento
            $insumosbd[$l][0]=$fac->getId_factura();
            $m=0;
            //------aqui voy a mostrar todos los insumos facturas que tienes saldo y almacenare los id facturas con conbinaciones con id insumos
            foreach ($insumosfacturas as $ins) //aqui concatena los id de los insumos
            {
                $insumosbd[$l][1][$m]=$ins->getId_insumos_factura();
                $m++;
            }
            $l++;
        }
        //-----------------aqui hacemos la mescolanzza de editados y los de la bd-------------------------
        
        for ($n = 0; $n < count($insumosbd); $n++)
        {
            for ($o = 0; $o < count($multiarray); $o++)
            {
                if($insumosbd[$n][0]==$multiarray[$o][0])//osea los iod son iguales entonces aumento los insumos
                {
                    
                    $insumosbd[$n][1]=array_merge($insumosbd[$n][1], $multiarray[$o][1]);
                    $insumosbd[$n][1]=array_unique ($insumosbd[$n][1]);
                    $insumosbd[$n][3]=1;
                    $multiarray[$o][2]=1;
                }
            }
        }   
        //---------------aqui unimos los editados que no han entrado ------------------
        for ($o = 0; $o < count($multiarray); $o++)
        {
            if($multiarray[$o][2]==0)//osea los iod son iguales entonces aumento los insumos
            {
                 array_push($insumosbd, $multiarray[$o]);
            }
        }
        //----------------aqui hacemos es pinche json--------------------
        if($_REQUEST['defecto']==1)
        {
            for ($n = 0; $n < count($insumosbd); $n++)
            {
                if($insumosbd[$n][3]==1)
                {
                    $factura = new Factura();
                    $factura->setId_factura($insumosbd[$n][0]);
                    $factura=$sqlFactura->getFacturaPorID($factura);

                    $strJson .= '{"id_factura":"' . $insumosbd[$n][0].';' ;//aqui concatena el id de la factura como primer elemento
                    //------aqui voy a mostrar todos los insumos facturas que tienes saldo y almacenare los id facturas con conbinaciones con id insumos
                    $long = count($insumosbd[$n][1]);$f = 0;
                    foreach ($insumosbd[$n][1] as $ins) //aqui concatena los id de los insumos
                    {
                        $strJson .= $ins;
                        if($f!=$long - 1)
                        {
                            $strJson .= ';';
                        }   
                        $f++;
                    }
                    $strJson .='"},';
                }
            }
        }
        else
        {
            for ($n = 0; $n < count($insumosbd); $n++)
            {
                $factura = new Factura();
                $factura->setId_factura($insumosbd[$n][0]);
                $factura=$sqlFactura->getFacturaPorID($factura);

                $strJson .= '{"id_factura":"' . $insumosbd[$n][0].';' ;//aqui concatena el id de la factura como primer elemento
                //------aqui voy a mostrar todos los insumos facturas que tienes saldo y almacenare los id facturas con conbinaciones con id insumos
                $long = count($insumosbd[$n][1]);$f = 0;
                foreach ($insumosbd[$n][1] as $ins) //aqui concatena los id de los insumos
                {
                    $strJson .= $ins;
                    if($f!=$long - 1)
                    {
                        $strJson .= ';';
                    }   
                    $f++;
                }
                $strJson .='","numero_factura":"Nro. ' .$factura->getNumero_factura() .'"},';
            }
        }
        //$strJson .= '{"id_factura":"","numero_factura":"Ninguna"}';
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo '['.$strJson.']';
        exit;
     }
    //-------------------------------------------------para mostrar un fractura----------------------------------------
    if($_REQUEST['tarea']=='dosificada')
    {
       if($_REQUEST['sw']=='1')
        {
            $vista->assign('nit',$_REQUEST['nit']);
            $vista->display("admFactura/Dosificada.tpl");
        }
        elseif($_REQUEST['sw']=='0') {             
             $vista->display("admFactura/Nodosificada.tpl");
        }

       exit;

    }
    if($_REQUEST['tarea']=='flete')
    {
        $incoterm = new Incoterm();
        $sqlIncoterm = new SQLIncoterm();
        $incoterms=$sqlIncoterm->getListarIncoterm($incoterm);
        $vista->assign('incoterms',$incoterms);
        $vista->display("admFactura/Flete.tpl");
        exit;
    }
    if($_REQUEST['tarea']=='puerto')
    {    
        $pais = new Pais();
        $sqlPais = new SQLPais();
        $paises=$sqlPais->getListarPaisSinNinguno($pais);
        
        $vista->assign('paises',$paises);
        $vista->display("admFactura/Puerto.tpl");
       exit;

    }  
  
    
    if($_REQUEST['tarea']=='crearFactura' && $_REQUEST['acuerdor']=='')
    {
        //---------------------------aqui vamos a validar primero------------------------
        $declaracion_jurada = new DeclaracionJurada();
        $sqlDeclaracionJurada = new SQLDeclaracionJurada();
        $declaracion_jurada->setId_Empresa($_SESSION['id_empresa']);
        $declaracion_jurada->setId_estado_ddjj(1);
        $declaraciones=$sqlDeclaracionJurada->getListarDeclaracionesPorEstado($declaracion_jurada);
        if(count ($declaraciones)>0)///aqui pregunto si tiene almenos una ddjj aprobada
        {
             //aca voy a sacar de todas las ddjj que tiene y arama un combo para que escoja su acuerdo
            $misacuerdos = array();
            $i=0;
            $sqlDdjjAcuerdo = new SQLDdjjAcuerdo();
            foreach ($declaraciones as $declaracion) {
                $ddjj_acuerdo = new DdjjAcuerdo();
                $ddjj_acuerdo->setId_ddjj($declaracion->getId_ddjj());
                $ddjj_acuerdos=$sqlDdjjAcuerdo->getListarAcuerdosPorDdjjVigentes($ddjj_acuerdo);
                foreach ($ddjj_acuerdos as $ddjj_acuerdo){
                    $misacuerdos[$i]=$ddjj_acuerdo->getId_Acuerdo();
                    $i++;
                }
            }
            $misacuerdos = array_unique($misacuerdos);
            $sqlAcuerdo = new SQLAcuerdo();
            $acuerdos = array();
            $i=0;
            
            foreach ($misacuerdos as $id_acuerdo) {
                $acuerdo = new Acuerdo();
                $acuerdo->setId_Acuerdo($id_acuerdo);
                $acuerdo=$sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
                $acuerdos[$i][0] =$acuerdo->getId_acuerdo(); 
                $acuerdos[$i][1] =$acuerdo->getDescripcion(); 
                $i++;
            }
            if(count ($misacuerdos)==1)//esto es para cuando es uno
            {
                $_REQUEST['acuerdor']=(string)$misacuerdos[0];
            }
            else// para el caso en que tenga varios acuerdos
            {
                $vista->assign('acuerdos',$acuerdos);
               
                $vista->display("admFactura/acuerdos.tpl");
                exit;
            }
        }
        else
        {
            $vista->display("admFactura/avisoNoDdjj.tpl");
            exit;
        }
    }
    if($_REQUEST['tarea']=='crearFactura')
    {
        //---------------saco todas la declaraciones juradas de ese acuerdo y envio el acuerdo como hidden
        $declaracion_jurada = new DeclaracionJurada();
        $sqlDeclaracionJurada = new SQLDeclaracionJurada();
        $declaracion_jurada->setId_Empresa($_SESSION['id_empresa']);
        $declaracion_jurada->setId_estado_ddjj(1);
        $declaraciones=$sqlDeclaracionJurada->getListarDeclaracionesPorEstado($declaracion_jurada);
        //------------esto es para el ninguno------
        $declaracion_jurada->setId_ddjj(0);
        $declaracion_jurada->setDescripcion_Comercial('Ninguno');
        
        $misdeclaraciones = array();
        $misdeclaraciones[0]=$declaracion_jurada;
        $i=1;
        $sqlDdjjAcuerdo = new SQLDdjjAcuerdo();
        foreach ($declaraciones as $declaracion) {
            $ddjj_acuerdo = new DdjjAcuerdo();
            $ddjj_acuerdo->setId_ddjj($declaracion->getId_ddjj());
            $ddjj_acuerdos=$sqlDdjjAcuerdo->getListarAcuerdosPorDdjjVigentes($ddjj_acuerdo);
            foreach ($ddjj_acuerdos as $ddjj_acuerdo){
                if($ddjj_acuerdo->getId_Acuerdo()==$_REQUEST['acuerdor'])
                {
                    $misdeclaraciones[$i]=$declaracion;
                    break; 
                }
            }
            $i++;
        }
        
        $vista->assign('id_ddjj_primero',0);
        $vista->assign('declaraciones',$misdeclaraciones);
        $vista->assign('id_acuerdo',$_REQUEST['acuerdor']);
       ////---------->----------------tenemos que verificar que tenga facturas dfosificadas acitavas-------------
        $factura->setId_Empresa($_SESSION['id_empresa']);
        $facturas=$sqlFactura->getListarFacturasPorEmpresaNoUtilizado($factura);
        $vista->assign('nrodosificadas',count($facturas));
        ///----------------->-----------------------------------esto es para al empresa----------
        $empresa = new Empresa();
        $sqlEmpresa = new SQLEmpresa();
        $incoterm = new Incoterm();
        $sqlIncoterm = new SQLIncoterm();
        $unidadmedida = new UnidadMedida();
        $sqlUnidadmedida = new SQLUnidadMedida();
        $pais = new Pais();
        $sqlPais = new SQLPais();

        $empresa->setId_empresa($_SESSION['id_empresa']);
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);

        $incoterms=$sqlIncoterm->getListarIncoterm($incoterm);
        $paises=$sqlPais->getListarPaisSinNinguno($pais);
        $unidades=$sqlUnidadmedida->getListarUnidadMedida($unidadmedida);
        
        $vista->assign('paises',$paises);
        $vista->assign('unidades',$unidades);
        $vista->assign('incoterms',$incoterms);
        $vista->assign('empresa',$empresa);

        if($_SESSION['menor_cuantia']==1)
        {
           $vista->display("admFactura/FacturaMenorCuantia.tpl");
        }
        else
        {
            $vista->display("admFactura/Factura.tpl");
        }
        exit;
    }
    if($_REQUEST['tarea']=='guardarFactura')
    {
        $succeso='0';        
        $hoy = date("Y-m-d h:m:s");
        $pais = new Pais();
        $sqlpais = new SQLPais();
        $idfact='';
        
        if($_REQUEST['dosificada']=='1')//esto es para diferenciar un dosificado de una no dosificada
        {
			$fecha_emision_array=explode("/",$_REQUEST['fechafactura']);
			$fecha_emision=$fecha_emision_array[2].'-'.$fecha_emision_array[1].'-'.$fecha_emision_array[0];
           //--------------------guardamos la factura--------------------------------------
             $factura->setNumero_Factura($_REQUEST['nrofactura']);
             $factura->setNumero_Autorizacion($_REQUEST['nroautorizacion']);
             $factura->setFecha_Emision($fecha_emision);             
             $factura->setPuerto_Embarque($_REQUEST['puertoembarque']);   
             $factura->setId_pais($_REQUEST['destinofactura']);  
             $factura->setId_Empresa($_SESSION['id_empresa']);
             $factura->setImportador($_REQUEST['importador']);
             $factura->setPais_importador($_REQUEST['paisimportador']);
             $factura->setDireccion_importador($_REQUEST['direccionimportador']);
             $factura->setConsignatario($_REQUEST['consignatario']);
             $factura->setPais_consignatario($_REQUEST['paisconsignatario']);
             $factura->setDireccion_consignatario($_REQUEST['direccionconsignatario']);
             $factura->setId_incoterm($_REQUEST['incoterm']);
             $factura->setTotal_incoterm($_REQUEST['totalincoterm']);
             $factura->setTotal_productos($_REQUEST['totalproductos']); 
             $factura->setFlete($_REQUEST['costoflete']); 
             $factura->setId_estado_factura(1); 
             $factura->setId_acuerdo($_REQUEST['id_acuerdo']);
             
             if($sqlFactura->setGuardarFactura($factura))
             {
                 $idfact='d'.$factura->getId_factura();
                 //--------------esta parte es para guardar los insumos de la factura-----------
                 $insumos=$_REQUEST['insumosfactura'];
                 $filas_insumos = explode(",", $insumos);
                 foreach ($filas_insumos as $fila) {
                     $insumo = explode(";", $fila);
                     $insumosfactura = new InsumosFactura();
                     $insumosfactura->setId_factura($factura->getId_factura());
                     $insumosfactura->setDescripcion($insumo[0]);
                     $insumosfactura->setUnidad_medida($insumo[1]);
                     $insumosfactura->setCantidad($insumo[2]);
                     $insumosfactura->setPrecio_unitario($insumo[3]);
                     $insumosfactura->setPrecio($insumo[4]);
                     $insumosfactura->setValor_fob($insumo[5]);
                     $insumosfactura->setSaldo($insumo[2]);
                     $insumosfactura->setId_ddjj($insumo[6]);
                     $insumosfactura->setUtilizado(false);
                     
                    if(!$sqlInsumosFactura->setGuardarInsumosFactura($insumosfactura))
                    {
                          $succeso=='1';
                    }
                 } 
            }
            else
            {
               $succeso=='1';
            }
        }
        elseif($_REQUEST['dosificada']=='0') // aqui se guardan los no dosificadas
        {
			$fecha_emision_array=explode("/",$_REQUEST['fechafactura']);
			$fecha_emision=$fecha_emision_array[2].'-'.$fecha_emision_array[1].'-'.$fecha_emision_array[0];
            //aqui se pondra de la s no odsificadas
            $facturanodosificada->setNumero_Factura($_REQUEST['nrofactura']);
            $facturanodosificada->setFecha_Emision($fecha_emision);
            $facturanodosificada->setPuerto_Embarque($_REQUEST['puertoembarque']);   
            $facturanodosificada->setId_pais($_REQUEST['destinofactura']);  
            $facturanodosificada->setId_Empresa($_SESSION['id_empresa']);
            $facturanodosificada->setImportador($_REQUEST['importador']);
            $facturanodosificada->setPais_importador($_REQUEST['paisimportador']);
            $facturanodosificada->setDireccion_importador($_REQUEST['direccionimportador']);
            $facturanodosificada->setConsignatario($_REQUEST['consignatario']);
            $facturanodosificada->setPais_consignatario($_REQUEST['paisconsignatario']);
            $facturanodosificada->setDireccion_consignatario($_REQUEST['direccionconsignatario']);
            $facturanodosificada->setTotal_productos($_REQUEST['totalproductos']); 
            $facturanodosificada->setTotal_incoterm($_REQUEST['totalincoterm']);
            $facturanodosificada->setFlete($_REQUEST['costoflete']); 
            $facturanodosificada->setId_estado_factura(1); 
            $facturanodosificada->setId_acuerdo($_REQUEST['id_acuerdo']); 
            
            
            if($_REQUEST['facturaadmitidarelacionada'])
            {                
                $facturanodosificada->setId_factura($_REQUEST['facturasRelacionadas']);
                // esto es mpara verificar que las facturas no tiene saldo
                $swsaldo = array();
                $k=0;//contador de id factura
            }
            $insumos=$_REQUEST['insumosfactura'];
            if($sqlFacturanodosificada->setGuardarFactura($facturanodosificada))
            {
                $idfact='n'.$facturanodosificada->getId_factura_no_dosificada();
                //--------------esta parte es para guardar los insumos de la factura-----------
                $filas_insumos = explode(",", $insumos);
                foreach ($filas_insumos as $fila) {
                    $insumo = explode(";", $fila);
                    $insumosfacturanodosificada = new InsumosFacturaNoDosificada();
                    $insumosfacturanodosificada->setId_factura_no_dosificada($facturanodosificada->getId_factura_no_dosificada());
                    $insumosfacturanodosificada->setDescripcion($insumo[0]);
                   
                    if($_REQUEST['facturaadmitidarelacionada'])
                    {
                         //--------------aqui hago la convercion de unidad de medida a su id-------------------------
                        $unidadmedida = new UnidadMedida();
                        $sqlUnidadmedida = new SQLUnidadMedida();

                        $unidadmedida->setDescripcion($insumo[1]);
                        $unidadmedida=$sqlUnidadmedida->getBuscarIdPorDescripcion($unidadmedida);
                        $insumosfacturanodosificada->setUnidad_medida($unidadmedida->getId_unidad_medida());
                    }
                    else
                    {
                        $insumosfacturanodosificada->setUnidad_medida($insumo[1]);
                        
                    }
                    $insumosfacturanodosificada->setCantidad($insumo[2]);
                    $insumosfacturanodosificada->setPrecio_unitario($insumo[3]);
                    $insumosfacturanodosificada->setPrecio($insumo[4]);
                    $insumosfacturanodosificada->setUtilizado(false);
                    if($_REQUEST['facturaadmitidarelacionada'])
                    {
                        $insumosfacturanodosificada->setId_insumos_factura($insumo[5]);
                    }
                    $insumosfacturanodosificada->setId_ddjj($insumo[7]);
                    
                  if($sqlInsumosFacturanodosificada->setGuardarInsumosFacturaNoDosificada($insumosfacturanodosificada))
                    {
                        //aqui tienes que bajar el saldo de insumos_factura
                        if($_REQUEST['facturaadmitidarelacionada'])
                        {
                                $swsaldo[$k]=$insumo[8];//id_factura
                                $k++;
                            
                            $insumosfactura = new InsumosFactura();
                            $insumosfactura->setId_insumos_factura($insumo[5]);
                            $insumosfactura=$sqlInsumosFactura->getInsumosPorId($insumosfactura);
                            $insumosfactura->setSaldo($insumo[6]);
                            if($insumo[6]==0)
                            {
                                $insumosfactura->setUtilizado(true);
                            }
                            $sqlInsumosFactura->setGuardarInsumosFactura($insumosfactura);
                        }
                    }
                    else
                    {
                        $succeso=='1';
                    }
                } 
            }
            //aqui cambiamos el estado de factura
            if($_REQUEST['facturaadmitidarelacionada'])
            {      
                $swsaldo=array_unique($swsaldo);
                foreach ($swsaldo as $sw)
                {
                    $resultado = $this->EstadoFacturaDosificada($sw);
                }
            }
        }       
        if($succeso=='0')
        {
            echo '[{"suceso":"0","msg":"Datos guardados correctamente.","id_factura":"'.$idfact.'"}]';
        }
        else
        {
            echo '[{"suceso":"1","msg":"Problemas al guardar los datos del usuario."}]';
        }
        exit;
    }
    
    if($_REQUEST['tarea']=='listarFacturasVigentes')
    {
        //Listar las Facturas Vigentes Dosificadas
        $factura->setId_Empresa($_SESSION['id_empresa']);
        $resultado=$sqlFactura->getListarFacturasVigentesPorEmpresa($factura);

        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        
        foreach ($resultado as $datos){
            $insumosfactura->setId_factura($datos->getId_factura());
            $resultadoinsumos=$sqlInsumosFactura->getListarInsumosVigentesPorFactura($insumosfactura);
            $aux='';
            $aux2='';
            foreach ($resultadoinsumos as $ins){
                $aux = $aux . $ins->getDescripcion() . " -";
                $aux2 = $aux2 . $ins->getId_insumos_factura() . ",";
            }
            $aux = substr($aux, 0, strlen($aux) - 1);
            $aux2 = substr($aux2, 0, strlen($aux2) - 1);
                        
            $strJson .= '{"id_factura":"' . $datos->getId_factura() .
                    '","tipo_factura":"1'.
                    '","numero_factura":"' . $datos->getNumero_Factura() .
                    '","fecha_emision":"' . $datos->getFecha_Emision() .
                    '","insumos":"' .$aux .
                    '","id_insumos_factura":"' .$aux2 .
                    '","total":"' .$datos->getTotal() .
                    '","tipo":"Dosificada"},';
            $selected='';
        }
        
        //Listar las Facturas Vigentes no Dosificadas
        $facturanodosificada->setId_Empresa($_SESSION['id_empresa']);
        $resultado2=$sqlFacturanodosificada->getListarFacturasVigentesPorEmpresa($facturanodosificada);
        //var_dump($resultado2);
        foreach ($resultado2 as $datos2){
            $insumosfacturanodosificada->setId_factura_no_dosificada($datos2->getId_factura_no_dosificada());
            $resultadoinsumosfnd=$sqlInsumosFacturanodosificada->getListarInsumosVigentesPorFactura($insumosfacturanodosificada);
            
            $auxnd='';
            $auxnd2='';
            foreach ($resultadoinsumosfnd as $insnd){
                $auxnd = $auxnd . $insnd->getDescripcion() . " -";
                $auxnd2 = $auxnd2 . $insnd->getId_insumos_factura_no_dosificada() . ",";
                //var_dump($auxnd2);
            }
            $auxnd = substr($auxnd, 0, strlen($auxnd) - 1);
            $auxnd2 = substr($auxnd2, 0, strlen($auxnd2) - 1);
            
            $strJson .= '{"id_factura":"' . $datos2->getId_factura_no_dosificada() .
                    '","tipo_factura":"2'.
                    '","numero_factura":"' . $datos2->getNumero_Factura() .
                    '","fecha_emision":"' . $datos2->getFecha_Emision() .
                    '","insumos":"' .$auxnd .
                    '","id_insumos_factura":"' .$auxnd2 .
                    '","total":"' .$datos2->getTotal() .
                    '","tipo":"No Dosificada"},';
            $selected='';
        }
        
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }

    if($_REQUEST['tarea']=='listarFacturasVigentesEnArbol')
    {
        //Listar las Facturas Vigentes Dosificadas
        $factura->setId_Empresa($_SESSION['id_empresa']);
        $resultado=$sqlFactura->getListarFacturasVigentesPorEmpresa($factura);

        $selected = ',"selected":true';

        $strJson = '';
        echo '[';
        
        foreach ($resultado as $datos){
            $insumosfactura->setId_factura($datos->getId_factura());
            $resultadoinsumos=$sqlInsumosFactura->getListarInsumosVigentesPorFactura($insumosfactura);
            $aux='';
            $aux2='';
            foreach ($resultadoinsumos as $ins){
                $aux = $aux . $ins->getDescripcion() . " -";
                $aux2 = $aux2 . $ins->getId_insumos_factura() . ",";
            }
            $aux = substr($aux, 0, strlen($aux) - 1);
            $aux2 = substr($aux2, 0, strlen($aux2) - 1);
                        
            $strJson .= '{"id_factura":"' . $datos->getId_factura() .
                    '","tipo_factura":"1'.
                    '","numero_factura":"' . $datos->getNumero_Factura() .
                    '","fecha_emision":"' . $datos->getFecha_Emision() .
                    '","insumos":"' .$aux .
                    '","id_insumos_factura":"' .$aux2 .
                    '","total":"' . $datos->getTotal() .
                    '","tipo":"Dosificada"},';
            
        '[{"id_factura":"' . $datos->getId_factura() .
        '","tipo_factura" :"1' .
        '","numero_factura" :"' . $datos->getNumero_Factura() .
        '","fecha_emision" :"'. $datos->getFecha_Emision() .
        '","total":"' . $datos->getTotal() .
        '","tipo" :"Dosificada'.
        '","texto":"' .$datos->getNumero_Factura() .
        '","items":[
            {
                "id"   :1,
                "text" :"Vehicle"
            }
            ]
        }]';
            
            
            $selected='';
        }
        
        //Listar las Facturas Vigentes no Dosificadas
        $facturanodosificada->setId_Empresa($_SESSION['id_empresa']);
        $resultado2=$sqlFacturanodosificada->getListarFacturasVigentesPorEmpresa($facturanodosificada);
        //var_dump($resultado2);
        foreach ($resultado2 as $datos2){
            $insumosfacturanodosificada->setId_factura_no_dosificada($datos2->getId_factura_no_dosificada());
            $resultadoinsumosfnd=$sqlInsumosFacturanodosificada->getListarInsumosVigentesPorFactura($insumosfacturanodosificada);
            
            $auxnd='';
            $auxnd2='';
            foreach ($resultadoinsumosfnd as $insnd){
                $auxnd = $auxnd . $insnd->getDescripcion() . " -";
                $auxnd2 = $auxnd2 . $insnd->getId_insumos_factura_no_dosificada() . ",";
                //var_dump($auxnd2);
            }
            $auxnd = substr($auxnd, 0, strlen($auxnd) - 1);
            $auxnd2 = substr($auxnd2, 0, strlen($auxnd2) - 1);
            
            $strJson .= '{"id_factura":"' . $datos2->getId_factura_no_dosificada() .
                    '","tipo_factura":"2'.
                    '","numero_factura":"' . $datos2->getNumero_Factura() .
                    '","fecha_emision":"' . $datos2->getFecha_Emision() .
                    '","insumos":"' .$auxnd .
                    '","id_insumos_factura":"' .$auxnd2 .
                    '","total":"' .$datos2->getTotal() .
                    '","tipo":"No Dosificada"},';
            $selected='';
        }
        
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }

    if($_REQUEST['tarea']=='listarFacturasVigentesPorAcuerdo')
    {
        //Listar las Facturas Vigentes Dosificadas
        $factura->setId_Empresa($_SESSION['id_empresa']);
        $factura->setId_Acuerdo($_REQUEST['id_acuerdo']);
        $resultado=$sqlFactura->getListarFacturasVigentesPorEmpresayAcuerdo($factura);
        $selected = ',"selected":true';
        $strJson = '';
        echo '[';
        
        foreach ($resultado as $datos){
            $insumosfactura->setId_factura($datos->getId_factura());
            $resultadoinsumos=$sqlInsumosFactura->getListarDDjjPorFacturaEnInsumos($insumosfactura);
            $cantidad_ddjj=  count($resultadoinsumos);
            $id_ddjj='';
            $descr_com='';
            $arancel='';
            $id_insumos_factura='';
            $insumos_factura='';
            foreach ($resultadoinsumos as $ins){
                $declaracion_jurada->setId_ddjj($ins->getId_ddjj());
                $declaracion_jurada = $sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
                $detalle_arancel->setId_detalle_arancel($declaracion_jurada->getId_Detalle_Arancel());
                $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                $id_ddjj = $id_ddjj . $ins->getId_ddjj() . ";";
                $arancel = $arancel . $detalle_arancel->getCodigo() . ";";
                $descr_com = $descr_com . $declaracion_jurada->getDescripcion_Comercial() . ";";
            }
            $id_ddjj = substr($id_ddjj, 0, strlen($id_ddjj) - 1);
            $arancel = substr($arancel, 0, strlen($arancel) - 1);
            $descr_com = substr($descr_com, 0, strlen($descr_com) - 1);
            
            $resultadoinsumos=$sqlInsumosFactura->getListarInsumosVigentesPorFactura($insumosfactura);
            foreach ($resultadoinsumos as $ins){
                $declaracion_jurada->setId_ddjj($ins->getId_ddjj());
                $declaracion_jurada = $sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
                $detalle_arancel->setId_detalle_arancel($declaracion_jurada->getId_Detalle_Arancel());
                $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                $insumos_factura = $insumos_factura . $ins->getDescripcion()."|".$detalle_arancel->getCodigo()."|".$ins->getId_ddjj()."|".$ins->getCantidad()."|".$ins->getUnidad_medida()."|".$ins->getValor_fob()."|".$ins->getCantidad()."|".$ins->getUnidad_medida().";";
                $id_insumos_factura = $id_insumos_factura . $ins->getId_insumos_factura() . ";";
            }
            
            $id_insumos_factura = substr($id_insumos_factura, 0, strlen($id_insumos_factura) - 1);
            $insumos_factura = substr($insumos_factura, 0, strlen($insumos_factura) - 1);

            $strJson .= '{"id_factura":"' . $datos->getId_factura() .
                    '","tipo_factura":"1'.
                    '","numero_factura":"' . $datos->getNumero_Factura() .
                    '","fecha_emision":"' . $datos->getFecha_Emision() .
                    '","total":"' . $datos->getTotal_incoterm() .
                    '","id_insumos_factura":"' . $id_insumos_factura .
                    '","insumos":"' . $insumos_factura .
                    '","id_ddjj":"' . $id_ddjj .
                    '","descripcion_comercial":"' . $descr_com .
                    '","clasificacion_arancelaria":"' . $arancel .
                    '","cantidad_ddjj":"' . $cantidad_ddjj .
                    '","tipo":"Dosificada"},';
            $selected='';
        }
        
        //Listar las Facturas Vigentes no Dosificadas
        $facturanodosificada->setId_Empresa($_SESSION['id_empresa']);
        $facturanodosificada->setId_Acuerdo($_REQUEST['id_acuerdo']);
        $resultado2=$sqlFacturanodosificada->getListarFacturasVigentesPorEmpresayAcuerdo($facturanodosificada);
        foreach ($resultado2 as $datos2){
            $insumosfacturanodosificada->setId_factura_no_dosificada($datos2->getId_factura_no_dosificada());
            $resultadoinsumosfnd=$sqlInsumosFacturanodosificada->getListarDDjjPorFacturaEnInsumos($insumosfacturanodosificada);
            $cantidad_ddjj=  count($resultadoinsumosfnd);
            $id_ddjj='';
            $descr_com='';
            $arancel='';
            $id_insumos_factura='';
            $insumos_factura='';
            foreach ($resultadoinsumosfnd as $insnd){
                $declaracion_jurada->setId_ddjj($insnd->getId_ddjj());
                $declaracion_jurada = $sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
                $detalle_arancel->setId_detalle_arancel($declaracion_jurada->getId_Detalle_Arancel());
                $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                $id_ddjj = $id_ddjj . $insnd->getId_ddjj() . ";";
                $arancel = $arancel . $detalle_arancel->getCodigo() . ";";
                $descr_com = $descr_com . $declaracion_jurada->getDescripcion_Comercial() . ";";
            }
            $id_ddjj = substr($id_ddjj, 0, strlen($id_ddjj) - 1);
            $arancel = substr($arancel, 0, strlen($arancel) - 1);
            $descr_com = substr($descr_com, 0, strlen($descr_com) - 1);
            
            $resultadoinsumosfnd=$sqlInsumosFacturanodosificada->getListarInsumosVigentesPorFactura($insumosfacturanodosificada);
            foreach ($resultadoinsumosfnd as $insnd){
                $declaracion_jurada->setId_ddjj($insnd->getId_ddjj());
                $declaracion_jurada = $sqlDeclaracionJurada->getBuscarDeclaracionPorId($declaracion_jurada);
                $detalle_arancel->setId_detalle_arancel($declaracion_jurada->getId_Detalle_Arancel());
                $detalle_arancel=$sqlDetalleArancel->getBuscarDescripcionPorId($detalle_arancel);
                $insumos_factura = $insumos_factura . $insnd->getDescripcion()."|".$detalle_arancel->getCodigo()."|".$insnd->getId_ddjj()."|".$insnd->getCantidad()."|".$insnd->getUnidad_medida()."|".$insnd->getValor_fob()."|".$insnd->getCantidad()."|".$insnd->getUnidad_medida().";";
                $id_insumos_factura = $id_insumos_factura . $insnd->getId_insumos_factura() . ";";
            }
            
            $id_insumos_factura = substr($id_insumos_factura, 0, strlen($id_insumos_factura) - 1);
            $insumos_factura = substr($insumos_factura, 0, strlen($insumos_factura) - 1);

            $strJson .= '{"id_factura":"' . $datos2->getId_factura_no_dosificada() .
                    '","tipo_factura":"2'.
                    '","numero_factura":"' . $datos2->getNumero_Factura() .
                    '","fecha_emision":"' . $datos2->getFecha_Emision() .
                    '","total":"' .$datos2->getTotal_incoterm() .
                    '","id_insumos_factura":"' . $id_insumos_factura .
                    '","insumos":"' . $insumos_factura .
                    '","id_ddjj":"' . $id_ddjj .
                    '","descripcion_comercial":"' . $descr_com .
                    '","clasificacion_arancelaria":"' . $arancel .
                    '","cantidad_ddjj":"' . $cantidad_ddjj .
                    '","tipo":"No Dosificada"},';
            $selected='';
        }
        
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
        exit;
    }
    
    //lista todos los insumos de la factura
    if($_REQUEST['tarea']=='listarInsumosFactura')
    {
        if($_REQUEST["tipo_factura"]==1){
            $insumosfactura->setId_factura($_REQUEST["id_factura"]);
            $resultado = $sqlInsumosFactura->getListarInsumosVigentesPorFactura($insumosfactura);
            foreach ($resultado as $insumo) {
                $strJson .= '{"id_insumos_factura":"' . $insumo->getId_insumos_factura() .
                       '","id_factura":"' . $insumo->getId_factura() .
                       '","cantidad":"' . $insumo->getCantidad() .
                       '","descripcion":"' .$insumo->getDescripcion() .
                       '","precio_unitario":"' .$insumo->getPrecio_unitario().
                       '","valor_fob":"' . $insumo->getValor_fob() .
                       '","saldo":"' .$insumo->getSaldo() . '"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo '['.$strJson.']';
        }else{
            $insumosfacturanodosificada->setId_factura_no_dosificada($_REQUEST["id_factura"]);
            $resultado = $sqlInsumosFacturanodosificada->getListarInsumosVigentesPorFactura($insumosfacturanodosificada);
            foreach ($resultado as $insumo) {
                $strJson .= '{"id_insumos_factura":"' . $insumo->getId_insumos_factura_no_dosificada() .
                       '","id_factura":"' . $insumo->getId_factura_no_dosificada() .
                       '","cantidad":"' . $insumo->getCantidad() .
                       '","descripcion":"' .$insumo->getDescripcion() .
                       '","precio_unitario":"' .$insumo->getPrecio_unitario().
                       '","saldo":"' .$insumo->getSaldo() .
                        '","valor_fob":"' . $insumo->getValor_fob() . '"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo '['.$strJson.']';
        }
        exit;
    }
    
    //esto es para elimianr factura
    if($_REQUEST['tarea']=='eliminarFactura')
    {
       if(($_REQUEST['tipo_factura']=='0')/*||($_REQUEST['tipo_factura']=='2')*/)//nd
       {
           
            $facturanodosificada->setId_factura_no_dosificada($_REQUEST['id_factura']);
            $facturanodosificada=$sqlFacturanodosificada->getFacturaPorID($facturanodosificada);
            $facturanodosificada->setId_estado_factura(4);
            $sqlFacturanodosificada->setGuardarFactura($facturanodosificada);
            //---------------------------hay que eliminar los inventarios tambien------------
            $insumosfacturanodosificada = new InsumosFacturaNoDosificada();
            $insumosfacturanodosificada->setId_factura_no_dosificada($_REQUEST['id_factura']);
            $insumosfacturas=$sqlInsumosFacturanodosificada->getListarInsumosPorFactura($insumosfacturanodosificada);    
           
            foreach ($insumosfacturas as $insumo)
            {
                $insumo->setUtilizado(true);
                if($sqlInsumosFacturanodosificada-> setGuardarInsumosFacturaNoDosificada($insumo))
                {
                  //  echo 'devolvio correctamente';
                    $resultado = $this->DevuelveInsumo($insumo->getId_insumos_factura(),$insumo->getCantidad());
                }
            }
            
       }
       if($_REQUEST['tipo_factura']=='1')//d
       {
            $factura->setId_factura($_REQUEST['id_factura']);
            $factura=$sqlFactura->getFacturaPorID($factura);
            $factura->setId_estado_factura(4);
            $sqlFactura->setGuardarFactura($factura);
            //---------------------------hay que eliminar los inventarios tambien------------
            
            $insumosfactura = new InsumosFactura();
            $insumosfactura->setId_factura($_REQUEST['id_factura']);
            $insumosfacturas=$sqlInsumosFactura->getListarInsumosPorFactura($insumosfactura);          
            foreach ($insumosfacturas as $insumo) 
            {
                $insumo->setUtilizado(true);
                $sqlInsumosFactura->setGuardarInsumosFactura($insumo);
            }
       }     
        exit;
    }
     if($_REQUEST['tarea']=='verFacturasDosificadas')
    {
        $facturanodosificada->setId_Empresa($_SESSION['id_empresa']);
        $facturanodosificadas=$sqlFacturanodosificada->getListarFacturasPorEmpresaActivas($facturanodosificada);
        
        $misfd = array();
        $i=0;
                    
        foreach ($facturanodosificadas as $factura)//factura no odsificada 
        {
            $idsfd=explode(",",$factura->getId_factura());
            foreach ($idsfd as $idfd)
            {
                if($idfd==$_REQUEST['id_factura'])
                {
                    $misfd[$i]=$factura->getNumero_Factura();
                    $i++;
                }
            }
        }
        
        $misfd= array_unique($misfd);
        $fnds='';
        for ($i = 0; $i < count($misfd); $i++) {
            $fnds.=' Nro:'.$misfd[$i].',';
        }
        echo rtrim($fnds, ",");
        exit;
    }
    //------------------------------esto es para editar una factura-------------------------------
     if($_REQUEST['tarea']=='devuelveInsumosFacturaEdicion')//te envia en un json os id de las facturas dosificadas con saldo disponible
     {
        $unidadmedida = new UnidadMedida();
        $sqlUnidadmedida = new SQLUnidadMedida();
            
        $insumos = explode(",", $_REQUEST['id_insumos_factura']);
        foreach ($insumos as $insumo) {
           $idinsumo=explode("-", $insumo);
           
           $insumosfactura->setId_insumos_factura($idinsumo[0]);
           $insumo=$sqlInsumosFactura->getInsumosPorId($insumosfactura);
           
           $unidadmedida->setId_Unidad_Medida($insumo->getUnidad_medida());
           $unidadmedida=$sqlUnidadmedida->getBuscarDescripcionPorId($unidadmedida);
           
            if(count($idinsumo)==2)
            {
                $insumosfacturanodosificada = new InsumosFacturaNoDosificada();
                $insumosfacturanodosificada->setId_insumos_factura_no_dosificada($idinsumo[1]);
                $insumosfacturanodosificada=$sqlInsumosFacturanodosificada->getInsumosPorId($insumosfacturanodosificada);
            }
            $strJson .= '{"id_factura":"' . $insumo->getId_factura();
               if(count($idinsumo)==2)
                {
            $strJson .='","id_insumos_factura":"' . $idinsumo[1];
                }
                else
                {
            $strJson .='","id_insumos_factura":"' . '0';            
                }
            $strJson .='","id_insumo_dosificada":"' . $insumo->getId_insumos_factura();    
            $strJson .='","producto":"' .$insumo->getDescripcion();
                if(count($idinsumo)==2)
                {
                    $saldo=(int)$insumo->getSaldo()+(int)$insumosfacturanodosificada->getCantidad();
            $strJson .='","cantidadsaldototal":"' .(string)$saldo;  
                }
                else
                {
            $strJson .='","cantidadsaldototal":"' .$insumo->getSaldo();         
                }
            $strJson .='","cantidadsaldo":"' .$insumo->getSaldo();       
                if(count($idinsumo)==2)
                {
            $strJson .= '","cantidad":"'.$insumosfacturanodosificada->getCantidad();
                }
                else
                {
            $strJson .= '","cantidad":"0';
                } 
            $strJson .='","unidad_medida":"' .$unidadmedida->getDescripcion();       
            if(count($idinsumo)==2)
                {
            $strJson .='","precio_unitario":"'.$insumosfacturanodosificada->getPrecio_unitario();
                }
                else
                {
            $strJson .='","precio_unitario":"0';
                } 
            if(count($idinsumo)==2)
                {
             $strJson .='","total":"'.$insumosfacturanodosificada->getPrecio();
                }
                else
                {
            $strJson .='","total":"0';
                } 
                    
            $strJson .='","id_ddjj":"0'.
                   '"},';
        }
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo '['.$strJson.']'; 
        
        exit;
     }
    if($_REQUEST['tarea']=='editarFacturaVista' && $_REQUEST['acuerdore']=='')//esto te muestra las facturas dependientes de esa dosificada
    {
       
                //---------------------------aqui vamos a validar primero------------------------
             $declaracion_jurada = new DeclaracionJurada();
             $sqlDeclaracionJurada = new SQLDeclaracionJurada();
             $declaracion_jurada->setId_Empresa($_SESSION['id_empresa']);
             $declaracion_jurada->setId_estado_ddjj(1);
             $declaraciones=$sqlDeclaracionJurada->getListarDeclaracionesPorEstado($declaracion_jurada);
             if(count ($declaraciones)>0)///aqui pregunto si tiene almenos una ddjj aprobada
             {
                  //aca voy a sacar de todas las ddjj que tiene y arama un combo para que escoja su acuerdo
                 $misacuerdos = array();
                 $i=0;
                 $sqlDdjjAcuerdo = new SQLDdjjAcuerdo();
                 foreach ($declaraciones as $declaracion) {
                     $ddjj_acuerdo = new DdjjAcuerdo();
                     $ddjj_acuerdo->setId_ddjj($declaracion->getId_ddjj());
                     $ddjj_acuerdos=$sqlDdjjAcuerdo->getListarAcuerdosPorDdjjVigentes($ddjj_acuerdo);
                     foreach ($ddjj_acuerdos as $ddjj_acuerdo){
                         $misacuerdos[$i]=$ddjj_acuerdo->getId_Acuerdo();
                         $i++;
                     }
                 }
                 $misacuerdos = array_unique($misacuerdos);
                 $sqlAcuerdo = new SQLAcuerdo();
                 $acuerdos = array();
                 $i=0;

                 foreach ($misacuerdos as $id_acuerdo) {
                     $acuerdo = new Acuerdo();
                     $acuerdo->setId_Acuerdo($id_acuerdo);
                     $acuerdo=$sqlAcuerdo->getBuscarAcuerdoPorId($acuerdo);
                     $acuerdos[$i][0] =$acuerdo->getId_acuerdo(); 
                     $acuerdos[$i][1] =$acuerdo->getDescripcion(); 
                     $i++;
                 }
                 if(count ($misacuerdos)==1)//esto es para cuando es uno
                 {
                     $_REQUEST['acuerdore']=(string)$misacuerdos[0];
                     
                 }
                 else// para el caso en que tenga varios acuerdos
                 {
                     $vista->assign('id_factura',$_REQUEST['id_factura']);
                     $vista->assign('acuerdos',$acuerdos);
                     $vista->assign('tipo_factura',$_REQUEST['tipo_factura']);
                     $vista->display("admFactura/acuerdosEdicion.tpl");
                     exit;
                 }
             }
             else
             {
                 $vista->display("admFactura/avisoNoDdjjEditar.tpl");
                 exit;
             }
       // exit;
    }
    if($_REQUEST['tarea']=='editarFacturaVista')
    {
        //---------------saco todas la declaraciones juradas de ese acuerdo y envio el acuerdo como hidden
        $declaracion_jurada = new DeclaracionJurada();
        $sqlDeclaracionJurada = new SQLDeclaracionJurada();
        $declaracion_jurada->setId_Empresa($_SESSION['id_empresa']);
        $declaracion_jurada->setId_estado_ddjj(1);
        $declaraciones=$sqlDeclaracionJurada->getListarDeclaracionesPorEstado($declaracion_jurada);
        //--------------------------------------esto es para el ninguno-------------------------------
        $declaracion_jurada->setId_ddjj(0);
        $declaracion_jurada->setDescripcion_Comercial('Ninguno');
        
        $misdeclaraciones = array();
        $misdeclaraciones[0]=$declaracion_jurada;
        $i=1;
        $sqlDdjjAcuerdo = new SQLDdjjAcuerdo();
        foreach ($declaraciones as $declaracion){
            $ddjj_acuerdo = new DdjjAcuerdo();
            $ddjj_acuerdo->setId_ddjj($declaracion->getId_ddjj());
            $ddjj_acuerdos=$sqlDdjjAcuerdo->getListarAcuerdosPorDdjjVigentes($ddjj_acuerdo);
            foreach ($ddjj_acuerdos as $ddjj_acuerdo){
                if($ddjj_acuerdo->getId_Acuerdo()==$_REQUEST['acuerdore'])
                {
                    $misdeclaraciones[$i]=$declaracion;
                    break; 
                }
            }
            $i++;
        }
        
        $vista->assign('id_ddjj_primero',0);
        $vista->assign('declaraciones',$misdeclaraciones);
        $vista->assign('id_acuerdo',$_REQUEST['acuerdore']);
       ////---------->----------------tenemos que verificar que tenga facturas dfosificadas acitavas-------------
        $factura->setId_Empresa($_SESSION['id_empresa']);
        $facturas=$sqlFactura->getListarFacturasPorEmpresaNoUtilizado($factura);
        $vista->assign('nrodosificadas',count($facturas));
        ///----------------->-----------------------------------esto es para al empresa----------
        $empresa = new Empresa();
        $sqlEmpresa = new SQLEmpresa();
        $incoterm = new Incoterm();
        $sqlIncoterm = new SQLIncoterm();
        $unidadmedida = new UnidadMedida();
        $sqlUnidadmedida = new SQLUnidadMedida();
        $pais = new Pais();
        $sqlPais = new SQLPais();

        $empresa->setId_empresa($_SESSION['id_empresa']);
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);

        $incoterms=$sqlIncoterm->getListarIncoterm($incoterm);

        $unidades=$sqlUnidadmedida->getListarUnidadMedida($unidadmedida);
        
        $paises=$sqlPais->getListarPaisSinNinguno($pais);
        
        $vista->assign('paises',$paises);
        $vista->assign('unidades',$unidades);
        $vista->assign('incoterms',$incoterms);
        $vista->assign('empresa',$empresa);
        if($_SESSION['menor_cuantia']==1)
        {
            $facturanodosificada->setId_factura_no_dosificada($_REQUEST['id_factura']);
            $facturanodosificada=$sqlFacturanodosificada->getFacturaEmpresaInsumoPorID($facturanodosificada);
            $fecha_renovacion_a= explode("-", $facturanodosificada->getFecha_Emision());
            $facturanodosificada->setFecha_Emision($fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0]);
                
            $vista->assign('factura',$facturanodosificada);
            $vista->display("admFactura/editarFacturaNoDosificadamenorcuantia.tpl");
        }
        else
        {
            if($_REQUEST['tipo_factura']=='1')//d 
            {
                //---- her ui sende alll the tpl for dipalying --------------------------
                $factura->setId_factura($_REQUEST['id_factura']);
                $factura=$sqlFactura->getFacturaInsumosPorID($factura);
                $fecha_renovacion_a= explode("-", $factura->getFecha_Emision());
                $factura->setFecha_Emision($fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0]);
        
                
                $vista->assign('factura',$factura);
                $vista->display("admFactura/editarFacturaDosificada.tpl");
                
            }
            if($_REQUEST['tipo_factura']=='0')//nd
            {
                $facturanodosificada->setId_factura_no_dosificada($_REQUEST['id_factura']);
                $facturanodosificada=$sqlFacturanodosificada->getFacturaEmpresaInsumoPorID($facturanodosificada);
                $fecha_renovacion_a= explode("-", $facturanodosificada->getFecha_Emision());
                $facturanodosificada->setFecha_Emision($fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0]);
                    $insumos = array();//--------------esto es par alas insumos de la factura nos dosificada
                    $multiselect = array();
                    
                    //---------------------aqui se etiene que enviar el producto---------------------
                    $insumosfacturanodosificada->setId_factura_no_dosificada($_REQUEST['id_factura']);
                    $insumosnodosificada=$sqlInsumosFacturanodosificada->getListarInsumosPorFactura($insumosfacturanodosificada);
                    $i=0;
                    $j=-1;
                    $idfactura=0;
                    
                    $sqlUnidadmedida = new SQLUnidadMedida();
                                
                    foreach($insumosnodosificada as $ind)
                    {
                        $unidadmedida = new UnidadMedida();
                        $unidadmedida->setId_Unidad_Medida($ind->getUnidad_medida());
                        $unidadmedida=$sqlUnidadmedida->getBuscarDescripcionPorId($unidadmedida);
                
                        $insumosfactura = new InsumosFactura();
                        $insumosfactura->setId_insumos_factura($ind->getId_insumos_factura());
                        $insumosfactura=$sqlInsumosFactura->getInsumosPorId($insumosfactura);
                        
                        //--------------------------esto es par enviar al multiselect-----------------------------------------------
                        if($insumosfactura->getId_factura()!=$idfactura)
                        {
                            $j++;
                            $idfactura=$insumosfactura->getId_factura();
                            $multiselect[$j]=$insumosfactura->getId_factura().';'.$insumosfactura->getId_insumos_factura();
                        }
                        else
                        {
                            $multiselect[$j].=';'.$insumosfactura->getId_insumos_factura();
                        }
                        
                        //------------------------------eto es para enviar al grid de edicion---------------------------------------
                       
                        $insumos[$i][0]=$insumosfactura->getId_factura();
                        $insumos[$i][1]=$ind->getId_insumos_factura_no_dosificada();
                        $insumos[$i][2]=$ind->getDescripcion();
                        $insumos[$i][3]=(int)$ind->getCantidad()+(int)$insumosfactura->getSaldo();//la suma
                        $insumos[$i][4]=$insumosfactura->getSaldo();//lo qeu sobra en la nd
                        $insumos[$i][5]=$ind->getCantidad();// lo que esta usando
                        $insumos[$i][6]=$unidadmedida->getDescripcion();
                        $insumos[$i][7]=$ind->getPrecio_unitario();
                        $insumos[$i][8]=$ind->getPrecio();
                        $insumos[$i][9]=$insumosfactura->getId_insumos_factura();
                        $i++;
                    }
                    //----------------------
                $vista->assign('valoresmultiselect',implode(',',$multiselect));   
                $vista->assign('insumosend',$insumos);
                $vista->assign('factura',$facturanodosificada);
                $vista->display("admFactura/editarFacturaNoDosificada.tpl");
            }
        }        
        exit;
    }
    if($_REQUEST['tarea']=='editarFacturaDosificada')//esto te muestra las facturas dependientes de esa dosificada
    {
        $fecha_emision_array=explode("/",$_REQUEST['fechafacturaed']);
        $fecha_emision=$fecha_emision_array[2].'-'.$fecha_emision_array[1].'-'.$fecha_emision_array[0];
			
        $succeso='0';
        $factura->setId_factura($_REQUEST['id_factura']);
        $factura=$sqlFactura->getFacturaPorID($factura);
        
        $factura->setNumero_factura($_REQUEST['nrofacturaed']);
        $factura->setNumero_Autorizacion($_REQUEST['nroautorizacioned']);
        $factura->setImportador($_REQUEST['importadored']);
        $factura->setDireccion_importador($_REQUEST['direccionimportadored']);
        $factura->setPais_importador($_REQUEST['paisimportadored']);
        $factura->setConsignatario($_REQUEST['consignatarioed']);
        $factura->setDireccion_consignatario($_REQUEST['direccionconsignatarioed']);
        $factura->setPais_consignatario($_REQUEST['paisconsignatarioed']);
        $factura->setPuerto_Embarque($_REQUEST['puertoembarqueed']);
        $factura->setId_pais($_REQUEST['destinofacturaed']);
        $factura->setFecha_Emision($fecha_emision);
        $factura->setFlete($_REQUEST['costofleteed']);
        $factura->setId_acuerdo($_REQUEST['id_acuerdo']);
        $factura->setTotal_incoterm($_REQUEST['totalincoterm']);
        $factura->setTotal_productos($_REQUEST['totalproductos']);
        $factura->setId_incoterm($_REQUEST['incotermed']);
        if($sqlFactura->setGuardarFactura($factura))
        {
            $insumosfactura->setId_factura($_REQUEST['id_factura']);
            $insumosfd=$sqlInsumosFactura->getListarInsumosPorFactura($insumosfactura);
            
            
            $insumos=$_REQUEST['insumosfactura'];
            $filas_insumos = explode(",", $insumos);
            //-------------------aqui actulizamos o guardamos--------
            foreach ($filas_insumos as $fila) {
                $insumo = explode(";", $fila);
                $insumosfactura = new InsumosFactura();
                if ($insumo[0]!='0')
                {
                    $insumosfactura->setId_insumos_factura((int)$insumo[0]);
                    $insumosfactura=$sqlInsumosFactura->getInsumosPorId($insumosfactura);
                }
                $insumosfactura->setId_factura($_REQUEST['id_factura']);
                $insumosfactura->setDescripcion($insumo[1]);
                $insumosfactura->setUnidad_medida($insumo[2]);
                $insumosfactura->setCantidad($insumo[3]);
                $insumosfactura->setSaldo($insumo[3]);
                $insumosfactura->setPrecio_unitario($insumo[4]);
                $insumosfactura->setPrecio($insumo[5]);
                $insumosfactura->setValor_fob($insumo[6]);
                $insumosfactura->setId_ddjj($insumo[7]);
                $insumosfactura->setUtilizado(false);
                
               if(!$sqlInsumosFactura->setGuardarInsumosFactura($insumosfactura))
               {
                   $succeso=='1';
               }
            } 
            //--------------primero eliminams los insumos que estan fuera-------------------------
            foreach ($insumosfd as $ifd) {
                $sw=1;
                 foreach ($filas_insumos as $fila)
                 {
                     $insumo = explode(";", $fila);
                     
                    if($ifd->getId_insumos_factura()==$insumo[0])
                    {
                        $sw=0;
                    }
                 }
                 if($sw==1)
                 {
                     //eliminamos la factura
                     if(!$sqlInsumosFactura->setEliminarInsumosFactura($ifd))
                     {
                         $succeso=='1';
                     }
                 }
            }
            
       }
        else
       {
          $succeso=='1'; 
       }
        if($succeso=='0')
        {
            echo '[{"suceso":"0","msg":"Datos guardados correctamente."}]';
        }
        else
        {
            echo '[{"suceso":"1","msg":"Problemas al guardar los datos del usuario."}]';
        } 
        exit;
    }
    if($_REQUEST['tarea']=='editarFacturaNoDosificada')//esto te muestra las facturas dependientes de esa dosificada
    {
        $fecha_emision_array=explode("/",$_REQUEST['fechafacturaend']);
        $fecha_emision=$fecha_emision_array[2].'-'.$fecha_emision_array[1].'-'.$fecha_emision_array[0]; 
		
        $succeso='0';
        $facturanodosificada->setId_factura_no_dosificada($_REQUEST['id_factura']);
        $facturanodosificada=$sqlFacturanodosificada->getFacturaPorID($facturanodosificada);
        
        $facturanodosificada->setNumero_Factura($_REQUEST['nrofacturaend']);
        $facturanodosificada->setFecha_Emision($fecha_emision);
        $facturanodosificada->setPuerto_Embarque($_REQUEST['puertoembarqueend']);   
        $facturanodosificada->setId_pais($_REQUEST['destinofacturaend']);  
        $facturanodosificada->setImportador($_REQUEST['importadorend']);
        $facturanodosificada->setPais_importador($_REQUEST['paisimportadorend']);
        $facturanodosificada->setDireccion_importador($_REQUEST['direccionimportadorend']);
        $facturanodosificada->setConsignatario($_REQUEST['consignatarioend']);
        $facturanodosificada->setPais_consignatario($_REQUEST['paisconsignatarioend']);
        $facturanodosificada->setDireccion_consignatario($_REQUEST['direccionconsignatarioend']);
        $facturanodosificada->setTotal_productos($_REQUEST['totalproductosend']); 
        $facturanodosificada->setId_acuerdo($_REQUEST['id_acuerdo']); 
        
        $facturanodosificada->setId_factura($_REQUEST['facturasRelacionadas']);
        // esto es mpara verificar que las facturas no tiene saldo
        $swsaldo = array();
        $k=0;//contador de id factura
            
        $insumos=$_REQUEST['insumosfactura'];
        if($sqlFacturanodosificada->setGuardarFactura($facturanodosificada))
        {
            $insumosfacturanodosificada->setId_factura_no_dosificada($_REQUEST['id_factura']);
            $insumosfnd=$sqlInsumosFacturanodosificada->getListarInsumosPorFactura($insumosfacturanodosificada);
            
            $filas_insumos = explode(",", $insumos);
            //-------------------aqui actulizamos o guardamos--------
            foreach ($filas_insumos as $fila) {
                $insumo = explode(";", $fila);
                $insumosfacturanodosificada = new InsumosFacturaNoDosificada();
                if ($insumo[1]!='0' and !empty($insumo[1]))
                {
                   
                    $insumosfacturanodosificada->setId_insumos_factura_no_dosificada((int)$insumo[1]);
                    $insumosfacturanodosificada=$sqlInsumosFacturanodosificada->getInsumosPorId($insumosfacturanodosificada);
                }
                $insumosfacturanodosificada->setId_factura_no_dosificada($_REQUEST['id_factura']);
                $insumosfacturanodosificada->setId_insumos_factura($insumo[2]);
                $insumosfacturanodosificada->setDescripcion($insumo[3]);
                $insumosfacturanodosificada->setCantidad($insumo[5]);
                $insumosfacturanodosificada->setPrecio_unitario($insumo[6]);
                $insumosfacturanodosificada->setPrecio($insumo[7]);
                $insumosfacturanodosificada->setId_ddjj($insumo[8]);
                    $unidadmedida = new UnidadMedida();
                    $sqlUnidadmedida = new SQLUnidadMedida();
                    $unidadmedida->setDescripcion($insumo[9]);
                    $unidadmedida=$sqlUnidadmedida->getBuscarIdPorDescripcion($unidadmedida);
                $insumosfacturanodosificada->setUnidad_medida($unidadmedida->getId_unidad_medida());
                $insumosfacturanodosificada->setUtilizado(false);  
                
                if($sqlInsumosFacturanodosificada->setGuardarInsumosFacturaNoDosificada($insumosfacturanodosificada))
                {
                    $swsaldo[$k]=$insumo[0];//id_factura
                    $k++;
                    $insumosfactura = new InsumosFactura();
                    $insumosfactura->setId_insumos_factura($insumo[2]);
                    $insumosfactura=$sqlInsumosFactura->getInsumosPorId($insumosfactura);
                    $insumosfactura->setSaldo($insumo[4]);
                    if($insumo[4]==0)
                    {
                        $insumosfactura->setUtilizado(true);
                    }
                    $sqlInsumosFactura->setGuardarInsumosFactura($insumosfactura);
                }
                else
                {
                    $succeso=='1';
                }
            } 
            ///------------------------ahora eliminamos------------------------------------------
            //--------------primero eliminams los insumos que estan fuera-------------------------
            foreach ($insumosfnd as $ifnd) {
                $sw=1;
                 foreach ($filas_insumos as $fila)
                 {
                     $insumo = explode(";", $fila);
                     
                    if($ifnd->getId_insumos_factura_no_dosificada()==$insumo[1])
                    {
                        $sw=0;
                    }
                 }
                 if($sw==1)
                 {
                      //-------------aqui hay que actualizar el id insumos factura--------
                        $insumosfactura = new InsumosFactura();
                        $insumosfactura->setId_insumos_factura($ifnd->getId_insumos_factura());
                        $insumosfactura=$sqlInsumosFactura->getInsumosPorId($insumosfactura);
                        $saldos=(int)$insumosfactura->getSaldo() + (int)$ifnd->getCantidad();
                        $insumosfactura->setSaldo($saldos);
                        if($saldos!=0)
                        {
                            $insumosfactura->setUtilizado(false);
                        }
                        $sqlInsumosFactura->setGuardarInsumosFactura($insumosfactura);
                        
                        $swsaldo[$k]=$insumosfactura->getId_factura();//id_factura
                        $k++;
                        
                    //eliminamos el insumo
                    if(!$sqlInsumosFacturanodosificada->setEliminarInsumosFacturaNoDosificada($ifnd))
                    {
                        $succeso=='1';
                    }
                 }
            }
        }
        else
        {
            $succeso=='1';
        }
            
        $swsaldo=array_unique($swsaldo);
        foreach ($swsaldo as $sw)
        {
            $resultado = $this->EstadoFacturaDosificada($sw);
        }
        $this->ActualizarDependientesNoDosificada($_REQUEST['id_factura']);
        if($succeso=='0')
        {
            echo '[{"suceso":"0","msg":"Datos guardados correctamente."}]';
        }
        else
        {
            echo '[{"suceso":"1","msg":"Problemas al guardar los datos del usuario."}]';
        } 
        exit;
    }
     if($_REQUEST['tarea']=='editarFacturaNoDosificadaMenorcuantia')//esto te muestra las facturas dependientes de esa dosificada
    {
        $succeso='0';    
        $fecha_emision_array=explode("/",$_REQUEST['fechafacturaend']);
        $fecha_emision=$fecha_emision_array[2].'-'.$fecha_emision_array[1].'-'.$fecha_emision_array[0];
        
        $facturanodosificada->setId_factura_no_dosificada($_REQUEST['id_factura']);
        $facturanodosificada=$sqlFacturanodosificada->getFacturaPorID($facturanodosificada);
        
        
        $facturanodosificada->setNumero_Factura($_REQUEST['nrofacturaend']);
        $facturanodosificada->setFecha_Emision($fecha_emision);
        $facturanodosificada->setPuerto_Embarque($_REQUEST['puertoembarqueend']);   
        $facturanodosificada->setId_pais($_REQUEST['destinofacturaend']);  
        $facturanodosificada->setImportador($_REQUEST['importadorend']);
        $facturanodosificada->setPais_importador($_REQUEST['paisimportadorend']);
        $facturanodosificada->setDireccion_importador($_REQUEST['direccionimportadorend']);
        $facturanodosificada->setConsignatario($_REQUEST['consignatarioend']);
        $facturanodosificada->setPais_consignatario($_REQUEST['paisconsignatarioend']);
        $facturanodosificada->setDireccion_consignatario($_REQUEST['direccionconsignatarioend']);
        $facturanodosificada->setTotal_productos($_REQUEST['totalproductosend']); 
        $facturanodosificada->setId_acuerdo($_REQUEST['id_acuerdo']); 
        
        if($sqlFacturanodosificada->setGuardarFactura($facturanodosificada))
        {
            $insumosfacturanodosificada->setId_factura_no_dosificada($_REQUEST['id_factura']);
            $insumosfnd=$sqlInsumosFacturanodosificada->getListarInsumosPorFactura($insumosfacturanodosificada);
            
            
            $insumos=$_REQUEST['insumosfactura'];
            $filas_insumos = explode(",", $insumos);
            //-------------------aqui actulizamos o guardamos--------
            foreach ($filas_insumos as $fila) {
                $insumo = explode(";", $fila);
                 $insumosfacturanodosificada = new InsumosFacturaNoDosificada();
                if ($insumo[0]!='0' and !empty($insumo[0]))
                {
                    $insumosfacturanodosificada->setId_insumos_factura_no_dosificada((int)$insumo[0]);
                    $insumosfacturanodosificada=$sqlInsumosFacturanodosificada->getInsumosPorId($insumosfacturanodosificada);
                }
                $insumosfacturanodosificada->setId_factura_no_dosificada($_REQUEST['id_factura']);
                $insumosfacturanodosificada->setDescripcion($insumo[1]);
                $insumosfacturanodosificada->setCantidad($insumo[2]);
                $insumosfacturanodosificada->setUnidad_medida($insumo[3]);
                $insumosfacturanodosificada->setPrecio_unitario($insumo[4]);
                $insumosfacturanodosificada->setPrecio($insumo[5]);
                $insumosfacturanodosificada->setId_ddjj($insumo[6]);
              
                $insumosfacturanodosificada->setUtilizado(false);  
                
               if($sqlInsumosFacturanodosificada->setGuardarInsumosFacturaNoDosificada($insumosfacturanodosificada))
               {
                   $succeso=='1';
               }
            } 
            //--------------primero eliminams los insumos que estan fuera-------------------------
            foreach ($insumosfnd as $ifnd) {
                $sw=1;
                 foreach ($filas_insumos as $fila)
                 {
                     $insumo = explode(";", $fila);
                     
                    if($ifnd->getId_insumos_factura_no_dosificada()==$insumo[0])
                    {
                        $sw=0;
                    }
                 }
                 if($sw==1)
                 {
                     //eliminamos la factura
                    if(!$sqlInsumosFacturanodosificada->setEliminarInsumosFacturaNoDosificada($ifnd))
                    {
                        $succeso=='1';
                    }
                 }
            }
            
       }
        else
       {
          $succeso=='1'; 
       }
        if($succeso=='0')
        {
            echo '[{"suceso":"0","msg":"Datos guardados correctamente."}]';
        }
        else
        {
            echo '[{"suceso":"1","msg":"Problemas al guardar los datos del usuario."}]';
        } 
        exit;
    }
    if($_REQUEST['tarea']=='verificarNumero')//esto es para veriifcar el numero
    {
        $factura->setId_Empresa($_SESSION['id_empresa']);
        $factura->setNumero_Factura($_REQUEST['numero']);
        $factura->setNumero_Autorizacion($_REQUEST['autorizacion']);  
        if($_REQUEST['numero'] && $_REQUEST['autorizacion'])
        {
            $resultado=$sqlFactura->getListarFacturasPorEmpresaNumAutorizacion($factura);     
            if ($resultado=='0'){
                echo '0';
            }
            else {
                echo '1';
            }
        }
        else echo '0';
       
        exit;
    }
    
    
  }
  
    public function DevuelveInsumo($id_insumos_factura,$saldo_devolver)// este metodo devuelve los saldos al insumo de la factura dosificada y si es el ultimo saldo vuelve a la factura dosificada como no utilizada 
    {
        $insumosfactura = new InsumosFactura();
        $sqlInsumosFactura = new SQLInsumosFactura();
        $insumosfactura->setId_insumos_factura((int)$id_insumos_factura);
        $insumosfactura= $sqlInsumosFactura->getInsumosPorId($insumosfactura);
        $insumosfactura->setSaldo((int)$insumosfactura->getSaldo()+(int)$saldo_devolver);
        $insumosfactura->setUtilizado(false);
        $sqlInsumosFactura->setGuardarInsumosFactura($insumosfactura);
       
            //verificamos si la factura d tienes todo susu insumos activos si es asi la activamos
            $resultado = $this->EstadoFacturaDosificada($insumosfactura->getId_factura());   
    }
    public function EstadoFacturaDosificada($id_factura)//cambiamos el estado de la factura si todos sus insumos son iguales cantidades
    {
        //echo 'entro';
        $factura = new Factura();            
        $sqlFactura = new SQLFactura();
        $factura->setId_factura((int)$id_factura);
        $factura=$sqlFactura->getFacturaInsumosPorID($factura);
        $sw=3;//suponemos que es utilizado
        if($factura)
		{
			foreach ($factura->insumosfactura as $insumosfactura)
			{
				if((int)$insumosfactura->getSaldo()>0)
				{
					$sw=1;
				}
			}
			
			if($sw==1)//suponomeos que es no utilizado
			{
				foreach ($factura->insumosfactura as $insumosfactura)
				{
					if($insumosfactura->getSaldo()!=$insumosfactura->getCantidad())
					  {
						  $sw=5;
						  break;
					  }
				}
			}
			
			
			switch ($sw) {
				case 1:
					$factura->setId_estado_factura(1);
					break;
				case 3:
					$factura->setId_estado_factura(3);
					break;
				case 5:
					$factura->setId_estado_factura(5);
					break;
			}
			$sqlFactura->setGuardarFactura($factura);
		}
    }
    public function ActualizarDependientesNoDosificada($id_factura)//cambiamos el estado de la factura si todos sus insumos son iguales cantidades
    {
        
        $facturanodosificada = new FacturaNoDosificada();
        $sqlFacturanodosificada = new SQLFacturaNoDosificada();
         $sqlInsumosFactura = new SQLInsumosFactura();
        
        
        $facturanodosificada->setId_factura_no_dosificada($id_factura);
        $facturanodosificada=$sqlFacturanodosificada->getFacturaInsumosPorID($facturanodosificada);
        
        $id_facturas = array();
        $k=0;//contador de id factura
        
        foreach ($facturanodosificada->insumosfacturanodosificada as $insumosfacturand)
        {
            $insumosfactura = new InsumosFactura();
            $insumosfactura->setId_insumos_factura($insumosfacturand->getId_insumos_factura());
            $insumosfactura=$sqlInsumosFactura->getInsumosPorId($insumosfactura);
            
            $id_facturas[$k]=$insumosfactura->getId_factura();//id_factura
            $k++;
            
        }
        $id_facturas = array_unique($id_facturas);
        $ids='';
        foreach ($id_facturas as $id)
        {
            $ids.=$id.',';
        }
        $ids = substr($ids, 0, strlen($ids) - 1);
        $facturanodosificada->setId_factura($ids);
        $sqlFacturanodosificada->setGuardarFactura($facturanodosificada);
    }
}