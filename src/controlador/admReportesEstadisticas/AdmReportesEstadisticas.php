<?php

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_LIB . DS . 'PHPExcel' . DS . 'IOFactory.php');
include_once(PATH_LIB . DS . 'PHPExcel' . DS . 'PHPExcel.php');
include_once(PATH_LIB . DS . 'PHPExcel' . DS . 'Writer'. DS . 'Excel2007.php');

include_once(PATH_TABLA . DS . 'CertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'DeclaracionJurada.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'Acuerdo.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'EstadoCO.php');
include_once(PATH_TABLA . DS . 'TipoCertificadoOrigen.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'EstadoDdjj.php');
include_once(PATH_TABLA . DS . 'Fabrica.php');
include_once(PATH_TABLA . DS . 'UnidadMedida.php');
include_once(PATH_TABLA . DS . 'ObservacionesDdjj.php');
include_once(PATH_TABLA . DS . 'DetalleArancel.php');

include_once(PATH_TABLA . DS . 'COAladi.php');
include_once(PATH_TABLA . DS . 'COAladiDdjjFactura.php');
include_once(PATH_TABLA . DS . 'COSgp.php');
include_once(PATH_TABLA . DS . 'COSgpDdjjFactura.php');
include_once(PATH_TABLA . DS . 'COTp.php');
include_once(PATH_TABLA . DS . 'COTpDdjjFactura.php');
include_once(PATH_TABLA . DS . 'COMercosur.php');
include_once(PATH_TABLA . DS . 'COMercosurDdjjFactura.php');
include_once(PATH_TABLA . DS . 'COVenezuela.php');
include_once(PATH_TABLA . DS . 'COVenezuelaDdjjFactura.php');
include_once(PATH_TABLA . DS . 'TipoFactura.php');
include_once(PATH_TABLA . DS . 'MedioTransporte.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManual.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManualEstado.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexPersona.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexEmpresa.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManualDetalle.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManualDetalleServicio.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexEmpresaImport.php');

include_once(PATH_TABLA . DS . 'Servicio.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexEmpresa.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManual.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManualDetalle.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexManualDetalleServicio.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'Regional.php');
include_once(PATH_TABLA . DS . 'VerificacionRuex.php');
include_once(PATH_TABLA . DS . 'VigenciaEmpresa.php');

include_once(PATH_MODELO . DS . 'SQLReportesEstadisticas.php');
include_once(PATH_MODELO . DS . 'SQLCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLDeclaracionJurada.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');
include_once(PATH_MODELO . DS . 'SQLAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLEstadoCO.php');
include_once(PATH_MODELO . DS . 'SQLTipoCertificadoOrigen.php');
include_once(PATH_MODELO . DS . 'SQLRegional.php');
include_once(PATH_MODELO . DS . 'SQLEstadoDdjj.php');
include_once(PATH_MODELO . DS . 'SQLFabrica.php');
include_once(PATH_MODELO . DS . 'SQLUnidadMedida.php');
include_once(PATH_MODELO . DS . 'SQLObservacionesDdjj.php');
include_once(PATH_MODELO . DS . 'SQLTipoFactura.php');
include_once(PATH_MODELO . DS . 'SQLMedioTransporte.php');
include_once(PATH_MODELO . DS . 'SQLDetalleArancel.php');

include_once(PATH_MODELO . DS . 'SQLCafeCertificado.php');
include_once(PATH_MODELO . DS . 'SQLCafeCaracteristicasEspeciales.php');
include_once(PATH_MODELO . DS . 'SQLCafeCEspecial.php');
include_once(PATH_MODELO . DS . 'SQLCafeBorrador.php');
include_once(PATH_MODELO . DS . 'SQLCafeDescripcion.php');
include_once(PATH_MODELO . DS . 'SQLCafeDestinoTransbordo.php');
include_once(PATH_MODELO . DS . 'SQLCafeElaboracion.php');
include_once(PATH_MODELO . DS . 'SQLCafeImportador.php');
include_once(PATH_MODELO . DS . 'SQLCafeMedioTransporte.php');
include_once(PATH_MODELO . DS . 'SQLCafeMoneda.php');
include_once(PATH_MODELO . DS . 'SQLCafeNorma.php');
include_once(PATH_MODELO . DS . 'SQLCafeOrganizacion.php');
include_once(PATH_MODELO . DS . 'SQLCafePais.php');
include_once(PATH_MODELO . DS . 'SQLCafePuerto.php');
include_once(PATH_MODELO . DS . 'SQLCafeICO.php');
include_once(PATH_MODELO . DS . 'SQLCafeSistemaArmonizado.php');
include_once(PATH_MODELO . DS . 'SQLCafeTipoEmbalaje.php');
include_once(PATH_MODELO . DS . 'SQLCafeUnidadMedida.php');
include_once(PATH_MODELO . DS . 'SQLServicio.php');
include_once(PATH_MODELO . DS . 'SQLServicioExportador.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLDeclaracionJurada.php');
include_once(PATH_MODELO . DS . 'SQLCafeEstado.php');
include_once(PATH_MODELO . DS . 'SQLRegional.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManual.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManualEstado.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexPersona.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexEmpresaImport.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManualDetalle.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManualDetalleServicio.php');
include_once(PATH_MODELO . DS . 'SQLSGCRuex.php');

include_once(PATH_MODELO . DS . 'SQLServicio.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManual.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManualDetalle.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexManualDetalleServicio.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLRegional.php');
include_once(PATH_MODELO . DS . 'SQLVerificacionRuex.php');
include_once(PATH_MODELO . DS . 'SQLVigenciaEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaTipoAnulacionCO.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaAnulacionCO.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaCO.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaCOReemplazos.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaCO_DDJJ.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaDDJJ.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaDDJJAcuerdo.php');
include_once(PATH_MODELO . DS . 'SQLPlanillaCorrelativo.php');
include_once(PATH_MODELO . DS . 'SQLFacturaSenavexTipo.php');

include_once(PATH_TABLA . DS . 'CafeCertificado.php');
include_once(PATH_TABLA . DS . 'CafeCaracteristicasEspeciales.php');
include_once(PATH_TABLA . DS . 'CafeCEspecial.php');
include_once(PATH_TABLA . DS . 'CafeBorrador.php');
include_once(PATH_TABLA . DS . 'CafeDescripcion.php');
include_once(PATH_TABLA . DS . 'CafeDestinoTransbordo.php');
include_once(PATH_TABLA . DS . 'CafeElaboracion.php');
include_once(PATH_TABLA . DS . 'CafeImportador.php');
include_once(PATH_TABLA . DS . 'CafeMedioTransporte.php');
include_once(PATH_TABLA . DS . 'CafeMoneda.php');
include_once(PATH_TABLA . DS . 'CafeNorma.php');
include_once(PATH_TABLA . DS . 'CafeOrganizacion.php');
include_once(PATH_TABLA . DS . 'CafePais.php');
include_once(PATH_TABLA . DS . 'CafePuerto.php');
include_once(PATH_TABLA . DS . 'CafeICO.php');
include_once(PATH_TABLA . DS . 'CafeSistemaArmonizado.php');
include_once(PATH_TABLA . DS . 'CafeTipoEmbalaje.php');
include_once(PATH_TABLA . DS . 'CafeUnidadMedida.php');
include_once(PATH_TABLA . DS . 'CafeEstado.php');
include_once(PATH_TABLA . DS . 'SGCRuex.php');
include_once(PATH_TABLA . DS . 'PlanillaAnulacionCO.php');
include_once(PATH_TABLA . DS . 'PlanillaTipoAnulacionCO.php');
include_once(PATH_TABLA . DS . 'PlanillaCO.php');
include_once(PATH_TABLA . DS . 'PlanillaCOReemplazos.php');
include_once(PATH_TABLA . DS . 'PlanillaCO_DDJJ.php');
include_once(PATH_TABLA . DS . 'PlanillaDDJJ.php');
include_once(PATH_TABLA . DS . 'PlanillaDDJJAcuerdo.php');
include_once(PATH_TABLA . DS . 'PlanillaCorrelativo.php');
include_once(PATH_TABLA . DS . 'FacturaSenavexTipo.php');

include_once(PATH_MODELO . DS . 'SQLPerfil.php');

include_once(PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php'); 

//include_once(PATH_LIB . DS . 'PHPExcel' . DS . 'PHPExcel' . DS . 'Shared' . DS . 'String.php');


include_once('consulta.php');
include_once('reporte.php');

class AdmReportesEstadisticas extends Principal {
    
    public $ruta=[
                    'CertificadoOrigen'=>[
                        'COAladi'=>['COAladiDdjjFactura'=>['FIN'=>'DeclaracionJurada']],
                        'COMercosur'=>['COMercosurDdjjFactura'=>['FIN'=>'DeclaracionJurada']],
                        'COSgp'=>['COTpDdjjFactura'=>['FIN'=>'DeclaracionJurada']],
                        'COTp'=>['COVenezuelaDdjjFactura'=>['FIN'=>'DeclaracionJurada']],
                        'COVenezuela'=>['COVenezuelaDdjjFactura'=>['FIN'=>'DeclaracionJurada']]
                    ],
                    'DeclaracionJurada'=>
                    [
                        
                    ],
//                    "RUEX"=>
//                    [
//                        
//                    ],
//                    "Facturacion"=>
//                    [
//                        
//                    ],
                    "CafeBorrador"=>
                    [
                        
                    ]
                ];
    
    public function AdmReportesEstadisticas() {

        $vista = Principal::getVistaInstance();
        if($_REQUEST['tarea']=='ruta'){
            $this->ruta($_REQUEST['idtabla_select']);
        }


        if($_REQUEST['tarea']=='listarTipoServicios'){
            $tipo = new FacturaSenavexTipo();
            $sqlTipo = new SQLFacturaSenavexTipo();
            $lista = $sqlTipo->getListarFacturaSenavexTipo($tipo);
            $strJson = '';
            $strJson_aux = '';
            echo '[';
            foreach ($lista as $datos){
                    $strJson .= '{"id":"' . $datos->getId() .
                        '","descripcion":"'.$datos->getDescripcion().'"},';
                
            }
            $strJson.=$strJson_aux;
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        
        if($_REQUEST['tarea']=='cargarTabla'){
            $clase_reflected = new ReflectionClass($_REQUEST['idtabla']);
            $clase = $this->obtenerRelaciones($clase_reflected);
            $static=  $clase_reflected->getStaticProperties();
            $PK = $clase['PK'];
            $CPs = $clase['CP'];
            $FKs = $clase['FK'];
            $DSs = $clase['DS'];

            if(!empty($CPs)){
                foreach ($CPs as $cp) {
                    $campo_doc=$this->obtenerDocumentacion($cp);
                    $campos.='{"id":"'.$clase_reflected->getName().'-'.$cp->getName().'-'.$campo_doc[1].'","descripcion":"'.$campo_doc[2].'"},';
                }
            }

            if(!empty($FKs)){
                foreach ($FKs as $fk) {
                    $campo_doc=$this->obtenerDocumentacion($fk[0]);
                    
                    $aux = explode('_', $campo_doc[7]);
                    //print('<pre>'.print_r($fk,true).'<pre>');
                    if(count($aux)>1){
                        $superior='_'.$aux[1];
                    }else{
                        $superior='';
                    }
                    $relaciones.='{"id":"'.$fk[1].$superior.'-'.$fk[0]->getName().'-'.$campo_doc[1].'","descripcion":"'.$campo_doc[2].'"},';
                }
            }
            
            if(!empty($DSs)){
                foreach ($DSs as $ds) {
                    $campo_doc=$this->obtenerDocumentacion($ds);
                    $descripciones.='{"id":"'.$clase_reflected->getName().'-'.$ds->getName().'-'.$campo_doc[1].'","descripcion":"'.$campo_doc[2].'"},';
                }
            }

            echo '{';
            echo '"campos":';
                echo '[';
                    echo substr($campos, 0, strlen($campos) - 1);;
                echo '],';
            echo '"relaciones":';
                echo '[';
                    echo substr($relaciones, 0, strlen($relaciones) - 1);
                echo '],';
            echo '"descripcion":';
                echo '[';
                    echo substr($descripciones, 0, strlen($descripciones) - 1);
                echo ']';
            echo '}';

            exit();
        }
        
        if($_REQUEST['tarea']=='analizarClase'){
            $this->analizarClase($_REQUEST['value']);
        }

        if($_REQUEST['tarea']=='cargarTipo'){
            try{
                $objeto_reflected=new ReflectionClass($_REQUEST['value']);
                $objeto=$objeto_reflected->newInstanceArgs();
                $prop1=$objeto_reflected->getProperty('ruta');
                $prop2=$prop1->getValue($objeto);

                $strJson='';

                echo '[';
                $cont=0;
                foreach ($prop2 as $value) {

                    $strJson.='{"id":"'.$cont.'","descripcion":"'.$value['Nombre'].'"},';
                    $cont=$cont+1;
                }
                $strJson = substr($strJson, 0, strlen($strJson) - 1);
                echo $strJson;
                echo ']';
            }  catch (Exception $ex){
                echo '-1';
            }
            exit();
        }
 
        if($_REQUEST['tarea']=='cargarCombo'){
            
            $clase=$_REQUEST['value'];
            $array=  $this->analizarClase($clase);
            echo '[';
            echo $array['Descripcion'];
            echo ']';
            exit();
        }
        
        if($_REQUEST['tarea']=='lista'){
            
            $array=$_REQUEST;
            array_shift($array);
            array_shift($array);
            $salida_fk='';
            $salida_cp='';
            $salida_ds='';
            $clases='';
            $select='';
            $titulos=[];
            $size=[];
            $clase='';
//            print('<pre>'.print_r($array,true).'</pre>');
            
            foreach ($array as $key => $value) {
                $split_value=  explode("-", $value);
                $split_key=  explode("-", $key);
//                print('<pre>'.print_r($split_key,true).'</pre>');
//                print('<pre>'.print_r($split_value,true).'</pre>');
                
                if($key!='_' && $key!='tarea' && $key!='opcion' && $key!='group'){

                    if(count($split_key)==1){
                        $clase=$array[$key];
                        $clase_reflected=new ReflectionClass($array[$key]);
                        $nombre=$clase_reflected->getConstant("TABLE");

                        $static=$clase_reflected->getStaticProperties()["RELATIONS"];
                        $abrev=$this->obtenerDocumentacion($clase_reflected)[2];
                        $clases[$clase].=$nombre.' '.$clase.'_'.$abrev." , ";
                        $properties=$clase_reflected->getProperties(ReflectionProperty::IS_PRIVATE);
                        
                        foreach($properties as $prop){
                            $doc=$this->obtenerDocumentacion($prop);
                            if($doc[9]=='T'){
                                
                                $size[count($size)]=$doc[8];
                                if($doc[0]=='FK'){
                                    
                                    $prop_id = substr($prop->getName(),3,  strlen($prop->getName()));
                                    $prop_tabla = $static[$prop_id][1];
                                    $prop_reflect = new ReflectionClass($prop_tabla);
                                    $prop_prop = $prop_reflect->getProperties(ReflectionProperty::IS_PRIVATE);
                                    $prop_abrev = $this->obtenerDocumentacion($prop_reflect)[2];
                                    $prop_tabla_nombre = $prop_reflect->getConstant('TABLE');
                                    
                                    foreach ($prop_prop as $prop_value) {
                                        
                                        $prop_value_doc = $this->obtenerDocumentacion($prop_value);
                                        
                                        if($prop_value_doc[5]=='T'){
                                            $titulos[count($titulos)]=$this->obtenerDocumentacion($prop_reflect)[1];
                                            $select[$clase].=$clase.'_'.$prop_abrev.".".$prop_value->getName()." as ".$prop_value_doc[2]." , ";
                                            $clases[$clase].=$prop_tabla_nombre.' '.$clase.'_'.$prop_abrev." , ";
                                            $salida[$clase].=$clase.'_'.$abrev.'.'.$prop->getName().' = '.$clase.'_'.$prop_abrev.'.'. $static[$prop_id][2].' AND ';
                                        }
                                    }
                                }else{
                                    $titulos[count($titulos)]=$doc[2];
                                    $select[$clase].=$clase.'_'.$abrev.".".$prop->getName()." , ";
                                }
                                if($_REQUEST['group']!='0'){
                                    $group_array=  explode("-", $_REQUEST['group']);
                                    $group_reflect=new ReflectionClass($group_array[1]);
                                    $group_doc=$this->obtenerDocumentacion($group_reflect);
                                    if($prop->getName()==$group_array[2]){
                                        $group[$clase]=empty($_REQUEST['group'])? "":'ORDER BY '.$group_doc[2].'.'.$group_array[2];
                                    }
                                }
                            }
                        }
                    }
                    else{
                        switch ($split_key[0]) {
                            case 'FK':
                                $id=explode("-",$array['input-'.$split_key[1].'-'.$split_key[3].'-'.$split_key[4].'-'.$split_key[5]]);
                                $salida[$clase].=$clase.'_'.$this->obtenerDocumentacion($clase_reflected)[2].".".$split_value[2]." = ".$id[2].' AND ';
                                break;
                            case 'CP':
                                switch ($split_key[5]) {
                                    case 'DATE':
                                        $fecha_ini=$array['input-'.$split_key[1].'-'.$split_key[3].'-'.$split_key[4].'-'.$split_key[5].'-ini'];
                                        $fecha_ini_array=explode("/",$fecha_ini);
                                        $fecha_fin=$array['input-'.$split_key[1].'-'.$split_key[3].'-'.$split_key[4].'-'.$split_key[5].'-fin'];
                                        $fecha_fin_array=explode("/",$fecha_fin);
                                        $salida[$clase].=$clase.'_'.$this->obtenerDocumentacion($clase_reflected)[2].".".$split_key[4]." BETWEEN '".$fecha_ini_array[2].'-'.$fecha_ini_array[1].'-'.$fecha_ini_array[0]."' AND '".$fecha_fin_array[2].'-'.$fecha_fin_array[1].'-'.$fecha_fin_array[0]."'"." AND ";
                                        break;
                                    case 'INT':
                                        break;
                                    case 'NUMERIC':
                                        $number=$array['input-'.$split_key[1].'-'.$split_key[3].'-'.$split_key[4].'-'.$split_key[5].'-valor'];
                                        $may=$array['input-'.$split_key[1].'-'.$split_key[3].'-'.$split_key[4].'-'.$split_key[5].'-may'];
                                        $men=$array['input-'.$split_key[1].'-'.$split_key[3].'-'.$split_key[4].'-'.$split_key[5].'-men'];
                                        $equ=$array['input-'.$split_key[1].'-'.$split_key[3].'-'.$split_key[4].'-'.$split_key[5].'-equ'];
                                        $salida[$clase].= " ".$clase.'_'.$this->obtenerDocumentacion($clase_reflected)[2].".".$split_key[4]." ".($may=='on'? '>':'').($men=='on'? '<':'').($equ=='on'? '=':'')." ".$number." AND ";
                                        
                                        break;
                                }
                                break;
                            case 'DS':
                                break;
                        }
                    }
                }
            }
           
            if(!empty($select)){
                foreach ($select as $key => $value) {
                    $select[$key]=substr($value,0, strlen($value) - 2);
                    $orden[count($orden)]=$key;
                }
            }
            if(!empty($clases)){
                foreach ($clases as $key => $value) {
/*                    $from_array=explode(' , ',$value);
                    foreach ($from_array as $value_1) {
                        if(!empty($value_1) && $value_1!=' '){
                            $from[$value_1]=$value_1;
                        }
                    }*/
                    $clases[$key]=substr($value,0, strlen($value) - 2);
                }
            }

            if(!empty($salida)){
                foreach ($salida as $key => $value) {
                    $salida[$key]=substr($value,0, strlen($value) - 4);
                }
            }
//            print("<pre>".print_r($select,true)."</pre>");
//            print("<pre>".print_r($clases,true)."</pre>");
//            print("<pre>".print_r($salida,true)."</pre>");
            
            for ($index1 = count($orden)-1 ; $index1 >= 0; $index1--) {
                $aux=explode(',',$select[$orden[$index1]]); 
                if($index1>0)
                {
                    $_reflect_sig = new ReflectionClass($orden[$index1-1]);
                    $_reflect_doc_sig = $this->obtenerDocumentacion($_reflect_sig);

                    $_reflect_act = new ReflectionClass($orden[$index1]);
                    $_reflect_doc_act = $this->obtenerDocumentacion($_reflect_act);

                    if($_reflect_doc_act[0]=='CP'){
                        $static=$_reflect_sig->getStaticProperties()["RELATIONS"];
//                        print("<pre>".print_r($static,true)."</pre>");
                        foreach ($static as $key => $value) {
                            if(trim($value[2],' ')==trim(explode('.', $aux[0])[1],' ')){
                                $_IN=$orden[$index1-1].'_'.$_reflect_doc_sig[2].'.id_'.$key;
//                                print("<pre>".print_r(,true)."</pre>");
                            }
                        }
                    }
                    if($_reflect_doc_act[0]=='CD'){
                        $static=$_reflect_act->getStaticProperties()["RELATIONS"];
//                         print("<pre>".print_r($static,true)."</pre>");
                        $sig_name=$orden[$index1-1];
//                         print("<pre>".print_r($sig_name,true)."</pre>");
                        foreach ($static as $key => $value) {
//                            print("<pre>".print_r(trim($value[1],' '). ' '.$orden[$index1-1],true)."</pre>");
                            if(trim($value[1],' ')==$orden[$index1-1]){
                                $aux[0]=$orden[$index1].'_'.$_reflect_doc_act[2].'.id_'.$key;
                                $_IN=$orden[$index1-1].'_'.$_reflect_doc_sig[2].'.id_'.$key;
//                                print("<pre>".print_r($_reflect_doc_act[2].'.id_'.$key.' IN ',true)."</pre>");
                            }
                        }
                    }
                    
//                    empty($salida[$orden[$index1]])? '':' AND ';
                    $salida[$orden[0]].=(empty($salida[$orden[$index1]])? '':' AND ') .$salida[$orden[$index1]].' AND '.$_IN.' = '.$aux[0];
                    $clases[$orden[0]].=(empty($clases[$orden[$index1]])? '':' , ').$clases[$orden[$index1]];
//                    $_select = " SELECT ".$aux[0];
//                    $_from = " FROM ".$clases[$orden[$index1]];
//                    $_where = count($salida[$orden[$index1]])>0? " WHERE ".$salida[$orden[$index1]]:"";
//                    print("<pre>".print_r("(SELECT ".$aux[0]." FROM ".$clases[$orden[$index1]].(count($salida[$orden[$index1]])>0? " WHERE ".$salida[$orden[$index1]] : " ").")",true)."</pre>");
//                    $SQL=$_IN."(".$_select.$_from.$_where.(empty($_where)? ($SQL==''? "":' WHERE '.$SQL) : ($SQL==''? "":' AND '.$SQL)). ")";
                }
//                else
//                {
//                    $salida[$orden[0]]=$salida[$orden[0]].(!empty($SQL)? ' AND '.$SQL:'');
//                }
            }
            

/*
             print("<pre>".print_r($SQL,true)."</pre>");
            $select=substr($select,0, strlen($select) - 2);
            print("<pre>".print_r($orden,true)."</pre>");
            print("<pre>".print_r($titulos,true)."</pre>");
            print("<pre>".print_r($size,true)."</pre>");
            
            
            $clases='';
            foreach ($from as $value) {
                $clases.=$value.' , ';
            }
            
            $clases= substr($clases, 0, strlen($clases) - 3); 
            
            
            $salida=[$salida_fk,$salida_cp,$salida_ds];
            $salida= substr($salida, 0, strlen($salida) - 4); 
            $clases= substr($clases, 0, strlen($clases) - 2);
*/
            $sql=[$select[$orden[0]],$clases[$orden[0]],$salida[$orden[0]],''];
//            print("<pre>".print_r($sql,true)."</pre>");
            
            $sqlReportesEstadisticas = new SQLReportesEstadisticas();            
            $contenido=$sqlReportesEstadisticas->getConsultaAnidada($sql[0],$sql[1],$sql[2],$sql[3]);
//            print('<pre>'.print_r($contenido,true).'</pre>');
             $filas=33;
            $num=count($contenido)/$filas;
            $_num=  explode(".", $num);
            
            if($_num[1]>0){
                $_num[0]=$_num[0]+1;
            }
            
            $suma=1;
            $contador=0;
            $pdf = new ReportePDF();

            for ($index2 = 0; $index2 < count($contenido); $index2++) {
                $array_filas[count($array_filas)]=$contenido[$index2];
                if($suma>$filas || $index2==count($contenido)-1){
                    
                    $pdf->AddPage("L");
                    $pdf->Cabecera();
                    $pdf->Body($titulos,$size,$array_filas);
                    $pdf->Pie();
                    $array_filas=[];
                    $contador=$contador+1;
                    $suma=0;
                } 
                $suma=$suma+1;
            }
            $pdf->Output("Reporte.pdf",'I');
            exit;
        }
        
        if($_REQUEST['tarea']=='estadisticas'){
            $index="";
            $iteration=empty($index)? $this->ruta : $this->ruta[$index]; 
            foreach ($iteration as $key => $value) {
                $reflect = new ReflectionClass($key);
                $doc_reflect = $this->obtenerDocumentacion($reflect);
                $tablas[$key]=$doc_reflect[1];
            }
            $vista->assign("tablas",$tablas);
            $vista->display("admReportesEstadisticas/Generador.tpl");
            exit;
        }
        
        if($_REQUEST['tarea']=='ver_cierres'){
            $empresa_persona = New EmpresaPersona();
            $empresa_persona->setId_empresa_persona($_SESSION['id_empresa_persona']);
            $sqlEmpresa_persona = new SQLEmpresaPersona();
            $empresa_persona=$sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
            $vista->assign('regional',$empresa_persona->getId_regional());
            $vista->assign('desarrollo',$_SESSION['id_perfil']);
            $vista->display("admReportesEstadisticas/Cierres.tpl");
        }
        if($_REQUEST['tarea']=='prueba'){

        }
        if($_REQUEST['tarea']=='Cierres'){
            $fecha = explode('/',$_REQUEST['fecha_ini']);
            $fecha_ini = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
 
            $fecha = explode('/',$_REQUEST['fecha_fin']);
            $fecha_fin = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
            
            $tipo_reporte = $_REQUEST['tipo_rpte'];
            if($tipo_reporte == 1){
                $this->CierreGeneral($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte'], $_REQUEST['id_tipo_servicio']);
            }
            if($tipo_reporte == 21){
                $this->CierreGeneralXls($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte'], $_REQUEST['id_tipo_servicio']);
            }
            if($tipo_reporte == 2){
                $this->CierreDetallado($_SESSION['id_empresa_persona'],$fecha_ini, $fecha_fin, $_REQUEST['regional_reporte'], $_REQUEST['id_tipo_servicio']);
            }
            if($tipo_reporte == 22){
                $this->CierreDetalladoXls($_SESSION['id_empresa_persona'],$fecha_ini, $fecha_fin, $_REQUEST['regional_reporte'], $_REQUEST['id_tipo_servicio']);
            }
            if($tipo_reporte == 3){
                $this->getLibroVentasIVA($_SESSION['id_empresa_persona'],$fecha_ini, $fecha_fin, $_REQUEST['regional_reporte'], $_REQUEST['id_tipo_servicio']);
            }
            if($tipo_reporte == 4){
                $this->getConciliacion($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte'], $_REQUEST['id_tipo_servicio']);
            }
            if($tipo_reporte == 5){
                $this->getRecaudaciones($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte'], $_REQUEST['id_tipo_servicio']);
            }
            if($tipo_reporte == 6){
                $this->getAnulados($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
            }
            if($tipo_reporte == 7){
                $this->getReporteSGC($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
            }
            if($tipo_reporte == 8){
                $this->getReporteAnuladosCO($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
            }
            if($tipo_reporte == 9){
                $this->getReporteEmisiones($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
            }
            if($tipo_reporte == 10){
                $this->getReporteDdjjOrigen($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
            }
            if($tipo_reporte == 100){
                $this->cargarDocumento();
//                $this->getReporteEmisiones($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
                //$this->cargarDDJJ($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
                //$this->getReporteSGC($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin);
                //$this->pruebaOlvidePassw();
            }
            if($tipo_reporte == 11){
                $this->getReporteSgcDDJJ($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
            }
            if($tipo_reporte == 12){
                $this->getReporteSgcCO($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
            }
	    if($tipo_reporte == 13){
                $this->getSgcResumen($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
            }
	    if($tipo_reporte == 14){
                $this->getDesglose($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
            }
	    if($tipo_reporte == 15){
                $this->getSeguimientoDDJJ($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
            }
            if($tipo_reporte == 16){
                $this->getSeguimientoCO($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
            }

	    if($tipo_reporte == 17){
                $this->getEmpresasNuevas($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
            }

            if($tipo_reporte == 20){
                $this->getExportacionesResumen1($_SESSION['id_empresa_persona'], $fecha_ini, $fecha_fin, $_REQUEST['regional_reporte']);
            }
            exit;
        }
    }
    
    public function existe($lista,$objeto){
        $result=false;
        
        foreach ($lista as $value) {
            if($value==$objeto){
                $result=true;
            }
        }
        return $result;
    }
    
    public function ruta($idtabla){
        $array=explode('|',$idtabla);
        $ruta_x=$this->ruta;
        foreach ($array as $value) {

            if($value==''){
                $ruta_x=$ruta_x;
            }else{
                $ruta_x=$ruta_x[$value];
            }
        }
        $iteration=$ruta_x;
        echo '[';
        foreach ($iteration as $key => $value) {
            if($key!='FIN')
            {
                $reflect = new ReflectionClass($key);
                $doc_reflect = $this->obtenerDocumentacion($reflect);
                $strJson.='{"id":"'.$key.'","descripcion":"'.$doc_reflect[1].'"},';
            }
            else
            {
                    $reflect = new ReflectionClass($value);
                    $doc_reflect = $this->obtenerDocumentacion($reflect);
                    $strJson.='{"id":"'.$value.'","descripcion":"'.$doc_reflect[1].'"},';
            }
            
        }
        $strJson = substr($strJson, 0, strlen($strJson) - 1);
        echo $strJson;
        echo ']';
    }
    
    public function obtenerListar_consultaDB_parametros($clase, $parametro){
        $clase_reflected=new ReflectionClass($clase);
        $clase_object=$clase_reflected->newInstanceArgs();
        $SQLclase_reflected=new ReflectionClass('SQL'.$clase_reflected->getName());
        $SQLclase_object=$SQLclase_reflected->newInstanceArgs();
        $metodo_Reflected = new ReflectionMethod('SQL'.$clase_reflected->getName(), 'getListar'.$clase);
        $consulta = $metodo_Reflected->invokeArgs($SQLclase_object, array($clase_object,$parametro));
        return $consulta;
    }
    
    public function obtenerListar_consultaBD($clase){
        // creamos una instancia de esta clase reflectada ej: Regional
        $objetoTabla=$clase->newInstanceArgs();
        // obtenemos la refleccion de la clase SQL**** ej: SQLRegional
        $modelo=new ReflectionClass('SQL'.$clase->getName());
        // creamos una instancia de la clase modelo SQLRegional
        $objetoModelo=$modelo->newInstanceArgs();
        // cargamos el metodo getListarRegional que se encuentra en la clase SQLRegional
        $metodo=new ReflectionMethod('SQL'.$clase->getName(), 'getListar'.$clase->getName());
        // invokamos el metodo, pasandole la instancia del objeto que posee le metodo seguido
        // de las variables que solicita dicho metodo
        return $metodo->invoke($objetoModelo,$objetoTabla); 
    }
    
    public function obtenerDocumentacion($objeto){
        $doc=$objeto->getDocComment();
        $doc=trim($doc,'/**');
        $doc=substr($doc,1, strlen($doc) - 2);
        $doc_array=explode('|',$doc);
        return $doc_array;
    }
    
    public function obtenerAtributosClase($clase,$tipo_atributo){
        $clase_reflected=new ReflectionClass($clase);
        return $clase_reflected->getProperties($tipo_atributo);
    }
    
    public function obtenerRelaciones($clase){
        
        //$objeto_reflected=new ReflectionClass($clase);}
        $propiedades=$clase->getProperties(ReflectionProperty::IS_PRIVATE);
        
        //for ($index = 0; $index < count($array); $index++) {
        foreach ($propiedades as $value) {
            $prop_doc_array=$this->obtenerDocumentacion($value);
            $value->setAccessible(true);
            
            if($prop_doc_array[0]=='PK'){
                $primaria[count($primaria)]=$value;
            }
            if($prop_doc_array[5]=='T'){
                $ds[count($ds)]=$value;
            }
            if($prop_doc_array[4]=='T'){
                if($prop_doc_array[0]=='CP'){
                    $campo[count($campo)]=$value;
                }
                if($prop_doc_array[0]=='FK'){
                    $statics=$clase->getStaticProperties();
                    //$doc=trim($value->getName(),'id_');
                    $doc=substr($value->getName(),3, strlen($value->getName())-1);
                    
                    //echo $value->getName().' ==> '.$doc.'<br>';
                    
                    $foreign[count($foreign)]=[$value,$statics['RELATIONS'][$doc][1]];
                    
                }
            }
        }
        //print('<pre>'.print_r($statics['RELATIONS']['descafeinado'],true).'</pre>');
        return ['PK'=>$primaria,'CP'=>$campo,'FK'=>$foreign, 'DS'=>$ds];
    }
    
    public function analizarClase($_clase){
        //creamos una clase reflectada
        $superior=explode('_',$_clase);
        if(count($superior)>1){
            $clase=$superior[0];
        }else{
            $clase=$_clase;
            
        }
        $clase_reflected=new ReflectionClass($clase);

        // instanciamos una clase
        $clase_instanciated=$clase_reflected->newInstanceArgs();

        $clase_document=$this->obtenerDocumentacion($clase_reflected);
        //print('<pre>'.print_r($superior).'</pre>');
        if($clase_document[0]!='CP'){
            //echo count($superior);
            if(count($superior)==2){
                $lista_consulta=$this->obtenerListar_consultaDB_parametros($clase_reflected->getName(), $superior[1]);
            }else{
                $lista_consulta=$this->obtenerListar_consultaBD($clase_reflected);
            }
        }
        $clase_atributos = $this->obtenerRelaciones($clase_reflected);
       
        $PK=$clase_atributos['PK'];
        $CPs=$clase_atributos['CP'];
        $FKs=$clase_atributos['FK'];
        $DSs=$clase_atributos['DS'];
        
        $campos='';
        $relaciones='';
        $descripciones='';
        if(count($lista_consulta)>0){
            foreach ($lista_consulta as $value) {
                if(!empty($CPs)){
                    foreach ($CPs as $cp) {
                        $campo_doc=$this->obtenerDocumentacion($cp);
                        $campos.='{"id":"'.$clase.'-'.$campo_doc[2].'-'.$PK[0]->getValue($value).'-'.$campo_doc[1].'","descripcion":"'.$cp->getValue($value).'"},';
                    }
                }
                if(!empty($DSs)){
                    foreach ($DSs as $ds) {
                        $campo_doc=$this->obtenerDocumentacion($ds);
                        $descripciones.='{"id":"'.$clase.'-'.$campo_doc[2].'-'.$PK[0]->getValue($value).'-'.$campo_doc[1].'","descripcion":"'.$ds->getValue($value).'"},';
                    }
                }
                if(!empty($FKs)){
                    foreach ($FKs as $fk) {
                        $campo_doc=$this->obtenerDocumentacion($fk);
                        $relaciones.='{"id":"'.$clase.'-'.$campo_doc[2].'-'.$PK[0]->getValue($value).'-'.$campo_doc[1].'","descripcion":"'.$fk->getValue($value).'"},';
                    }
                }
            }
        }
        if(!empty($CPs)){        
            $campos = substr($campos, 0, strlen($campos) - 1); 
        }
        if(!empty($FKs)){
            $relaciones = substr($relaciones, 0, strlen($relaciones) - 1);
        }
        if(!empty($DSs)){
            $descripciones = substr($descripciones, 0, strlen($descripciones) - 1);
        }
        //print('<pre>'.print_r(['Relaciones'=>$relaciones,'Campos'=>$campos,'Descripcion'=>$descripciones], true).'</pre>');
        return ['Relaciones'=>$relaciones,'Campos'=>$campos,'Descripcion'=>$descripciones];
    }
    public function CierreGeneral($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional, $id_tipo){
        
        $regional = new Regional();
        $empresa_persona = new EmpresaPersona();

        $sqlRegional = new SQLRegional();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona=$sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        $facturaSenavexTipo = new FacturaSenavexTipo();
        $sqlFacturaSenavexTipo = new SQLFacturaSenavexTipo();

        if($id_tipo>0 && $id_tipo<11){
            $facturaSenavexTipo->setId($id_tipo);
        } else {
             $id_tipo = -1;
        }
        
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $regional->setId_regional($id_regional);
        }else{
            $regional->setId_regional($empresa_persona->getId_regional());
        }
//        $regional->setId_regional($empresa_persona->getId_regional());
        $regional=$sqlRegional->getBuscarRegionalPorId($regional);
//         print('<pre>'.print_r($regional,true).'</pre>');

        $servicio = new Servicio();
        $sqlServicio = new SQLServicio();
        $servicio->setId_Categoria_Servicio('6,7,8');
        $listaServicios = $sqlServicio->getListaServiciosPorCategoria($servicio);
        $lista = array();
        $sqlFSM = new SQLFacturaSenavexManual();
        $fsm = new FacturaSenavexManual();
        $fsm->setId_regional($regional->getId_regional());
        $fsm->setEstado(2);
        $facturas1 = $sqlFSM->ListFacturaManualFecha2($fsm, $fecha_ini, $fecha_fin, $id_tipo);
        $fsm->setId_regional($regional->getId_regional());
        $fsm->setEstado(5);
        $facturas2 = $sqlFSM->ListFacturaManualFecha2($fsm, $fecha_ini, $fecha_fin, $id_tipo);
        
        $facturas = array_merge($facturas1,$facturas2);
        foreach ($listaServicios as $value) {

            $fsmDetalle = new FacturaSenavexManualDetalle();
            $fsmDetalle->setId_servicio($value->getId_servicio());
            $sqlFSMDetalle = new SQLFacturaSenavexManualDetalle();
            $listaDetalle = $sqlFSMDetalle->getListFacturaDetallePorServicioFecha($fsmDetalle,$regional->getId_regional(), $fecha_ini, $fecha_fin, $id_tipo);
            $suma = 0;
            $del = -1;
            $al = -1;
            $cantidad = 0;
            // echo 3,$id_tipo;  die;
            if(count($listaDetalle)>0){
                foreach ($listaDetalle as $value2) {
                    $fsmdServicio = new FacturaSenavexManualDetalleServicio();
                    /*$fsmdServicio->getNro_ctrl_1();
                    $fsmdServicio->getNro_ctrl_2();
                    $fsmdServicio->getFOB(); */

                    $sqlFSMDServicio = new SQLFacturaSenavexManualDetalleServicio();
                    $fsmdServicio->setId_factura_senavex_manual_detalle($value2['id_factura_senavex_manual_detalle']);
                    $fsmdServicio=$sqlFSMDServicio->getFacturaDetallePorDetalle($fsmdServicio);
                    $suma += $value2['cantidad'] * $value2['precio'];
                    $cantidad += $value2['cantidad'];

                    if(($value->getId_servicio()>= 11 && $value->getId_servicio() <= 46) || ($value->getId_servicio()>= 75 && $value->getId_servicio() <= 78)){
                        $del = ($del==-1 ?  $fsmdServicio->getNro_ctrl_1():( $del > $fsmdServicio->getNro_ctrl_1()?  $fsmdServicio->getNro_ctrl_1() : $del));
                        if($value->getId_servicio()>= 22 && $value->getId_servicio() <= 46){
                            $al = ($al==-1 ?  $fsmdServicio->getNro_ctrl_1():( $al < $fsmdServicio->getNro_ctrl_1()?  $fsmdServicio->getNro_ctrl_1() : $al));
                        }else{
                            $al = ($al==-1 ? $fsmdServicio->getNro_ctrl_2():( $al < $fsmdServicio->getNro_ctrl_2()? $fsmdServicio->getNro_ctrl_2() : $al));
                        }
                    }else{
                        $del = 0; $al = 0;
                    }
                }

                array_push($lista, [$value->getDescripcion(), $cantidad, $del, $al, $suma]);
            }else{

            }
        }

        $pdf = new CierreGral();

        $parts = array_chunk($lista, 45);

        if(count($parts)==0) {
            $contador = 1;
        }else{
            $contador = count($parts);
        }
        for ($index = 0; $index < $contador; $index++) {

            $pdf->AddPage("P","Letter");
            $pdf->Cabecera($regional->getCiudad(),$fecha_ini,$fecha_fin, count($facturas));
            $pdf->Body($parts[$index]);
        }
        $pdf->Output("Reporte.pdf",'I');
    }

    public function CierreGeneralXls($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional, $id_tipo){

        $regional = new Regional();
        $empresa_persona = new EmpresaPersona();

        $sqlRegional = new SQLRegional();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona=$sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        $facturaSenavexTipo = new FacturaSenavexTipo();
        $sqlFacturaSenavexTipo = new SQLFacturaSenavexTipo();

        if($id_tipo>0 && $id_tipo<11){
            $facturaSenavexTipo->setId($id_tipo);
        } else {
            $id_tipo = -1;
        }

        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $regional->setId_regional($id_regional);
        }else{
            $regional->setId_regional($empresa_persona->getId_regional());
        }
//        $regional->setId_regional($empresa_persona->getId_regional());
        $regional=$sqlRegional->getBuscarRegionalPorId($regional);
//         print('<pre>'.print_r($regional,true).'</pre>');

        $servicio = new Servicio();
        $sqlServicio = new SQLServicio();
        $servicio->setId_Categoria_Servicio('6,7,8');
        $listaServicios = $sqlServicio->getListaServiciosPorCategoria($servicio);
        $lista = array();
        $sqlFSM = new SQLFacturaSenavexManual();
        $fsm = new FacturaSenavexManual();
        $fsm->setId_regional($regional->getId_regional());
        $fsm->setEstado(2);
        $facturas1 = $sqlFSM->ListFacturaManualFecha2($fsm, $fecha_ini, $fecha_fin, $id_tipo);
        $fsm->setId_regional($regional->getId_regional());
        $fsm->setEstado(5);
        $facturas2 = $sqlFSM->ListFacturaManualFecha2($fsm, $fecha_ini, $fecha_fin, $id_tipo);

        //DO EXCEL
        $inputFileName = "styles".DS."documentos".DS."cierre_general.xlsx";
        try{
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $row = 3;
            $col = 1;
            $facturas = array_merge($facturas1,$facturas2);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow($col ,$row , "REGIONAL: " . $regional->getCiudad());
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow($col ,$row + 1 , "Total Facturas: " . count($facturas));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow($col+2 ,$row + 1 , "Del " .  date('d/m/Y',strtotime($fecha_ini) ) . " - Al ".  date('d/m/Y',strtotime($fecha_fin) ) );
            $row = 6;
            $cantidadt = 0;
            $sumat = 0;
            foreach ($listaServicios as $value) {

                $fsmDetalle = new FacturaSenavexManualDetalle();
                $fsmDetalle->setId_servicio($value->getId_servicio());
                $sqlFSMDetalle = new SQLFacturaSenavexManualDetalle();
                $listaDetalle = $sqlFSMDetalle->getListFacturaDetallePorServicioFecha($fsmDetalle,$regional->getId_regional(), $fecha_ini, $fecha_fin, $id_tipo);
                $suma = 0;
                $del = -1;
                $al = -1;
                $cantidad = 0;
                // echo 3,$id_tipo;  die;
                if(count($listaDetalle)>0){
                    foreach ($listaDetalle as $value2) {
                        $fsmdServicio = new FacturaSenavexManualDetalleServicio();
                        /*$fsmdServicio->getNro_ctrl_1();
                        $fsmdServicio->getNro_ctrl_2();
                        $fsmdServicio->getFOB(); */

                        $sqlFSMDServicio = new SQLFacturaSenavexManualDetalleServicio();
                        $fsmdServicio->setId_factura_senavex_manual_detalle($value2['id_factura_senavex_manual_detalle']);
                        $fsmdServicio=$sqlFSMDServicio->getFacturaDetallePorDetalle($fsmdServicio);
                        $suma += $value2['cantidad'] * $value2['precio'];
                        $cantidad += $value2['cantidad'];

                        if(($value->getId_servicio()>= 11 && $value->getId_servicio() <= 46) || ($value->getId_servicio()>= 75 && $value->getId_servicio() <= 78)){
                            $del = ($del==-1 ?  $fsmdServicio->getNro_ctrl_1():( $del > $fsmdServicio->getNro_ctrl_1()?  $fsmdServicio->getNro_ctrl_1() : $del));
                            if($value->getId_servicio()>= 22 && $value->getId_servicio() <= 46){
                                $al = ($al==-1 ?  $fsmdServicio->getNro_ctrl_1():( $al < $fsmdServicio->getNro_ctrl_1()?  $fsmdServicio->getNro_ctrl_1() : $al));
                            }else{
                                $al = ($al==-1 ? $fsmdServicio->getNro_ctrl_2():( $al < $fsmdServicio->getNro_ctrl_2()? $fsmdServicio->getNro_ctrl_2() : $al));
                            }
                        }else{
                            $del = 0; $al = 0;
                        }
                    }
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(1 ,$row , $value->getDescripcion());
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(2 ,$row , $cantidad);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(3 ,$row , $del);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(4 ,$row , $al);
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(5 ,$row , $suma);
                    $cantidadt = $cantidadt + $cantidad;
                    $sumat = $sumat + $suma;
                    $row ++;
//                    array_push($lista, [$value->getDescripcion(), $cantidad, $del, $al, $suma]);
                }else{

                }

            }
            $objPHPExcel->getActiveSheet()->getStyle('B'.$row .':F'.$row )->getFont()->setBold(true);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(1 ,$row , "TOTALES");
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(2 ,$row , $cantidadt);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(5 ,$row , $sumat);

            header('Content-Disposition: attachment; filename="Cierre_General.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');

        } catch(Exception $e) {
    // die('<br>Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

    }

    public function CierreDetallado($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional, $id_tipo){
//print("<pre>".print_r($_REQUEST, true)."</pre>");
        try{
        $regional = new Regional();
        $empresa_persona = new EmpresaPersona();

        $sqlRegional = new SQLRegional();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona=$sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        $facturaSenavexTipo = new FacturaSenavexTipo();
        $sqlFacturaSenavexTipo = new SQLFacturaSenavexTipo();

        if($id_tipo>0 && $id_tipo<11){
            $facturaSenavexTipo->setId($id_tipo);
        } else {
             $id_tipo = -1;
        }
       
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $regional->setId_regional($id_regional);
        }else{
            $regional->setId_regional($empresa_persona->getId_regional());
        }
        $regional=$sqlRegional->getBuscarRegionalPorId($regional);
        $lista = array();
        
        $facturaSenavexManual = new FacturaSenavexManual();
        $sqlFacturaSenavexManual = new SQLFacturaSenavexManual();
        $facturaSenavexManual->setId_regional($regional->getId_regional());
        $facturaSenavexManual->setEstado(2);
        $listaFacturas1 = $sqlFacturaSenavexManual->ListFacturaManualFecha($facturaSenavexManual, $fecha_ini, $fecha_fin, $id_tipo);
        $facturaSenavexManual->setEstado(5);
        $listaFacturas2 = $sqlFacturaSenavexManual->ListFacturaManualFecha($facturaSenavexManual, $fecha_ini, $fecha_fin, $id_tipo);
        
        $listaFacturas = array_merge($listaFacturas1,$listaFacturas2);
        $total=0;
        $cantidad =0;
       // print('<pre>'.print_r(count($listaFacturas),true).'</pre>'); die;
        $contador = 1;
        foreach ($listaFacturas as $factura) {
            
            $fsmDetalle = new FacturaSenavexManualDetalle();
            $sqlFSMDetalle = new SQLFacturaSenavexManualDetalle();
            $fsmDetalle->setId_factura_senavex_manual($factura->getId_factura_senavex_manual());
            $listaDetalle = $sqlFSMDetalle->getListFacturaDetallePorIdFactura($fsmDetalle);
            $del = -1;
            $al = -1;
            
            $nombre = '';
            $nit = '';
            $ruex = '';
            if($factura->getVortex()=='1'){
                $empresa = new Empresa();
                $sqlEmpresa = new SQLEmpresa();
                $empresa->setId_empresa($factura->getId_empresa());
                $empresa = $sqlEmpresa->getEmpresaPorID($empresa);
                $nombre = $empresa->getRazon_Social();
                $ruex = $empresa->getRuex();
                $nit = $empresa->getNit();
            }elseif($factura->getVortex()=='2'){
                $sqlFSEmpresa = new SQLFacturaSenavexEmpresaImport();
                $fsEmpresa = new FacturaSenavexEmpresaImport();
                $fsEmpresa->setId_factura_senavex_empresa_import($factura->getId_empresa());
                $fsEmpresa= $sqlFSEmpresa->getEmpresa($fsEmpresa);
                $nombre = $fsEmpresa->getNombre();
                $nit = $fsEmpresa->getNit();
                $ruex = '';
            }else{
                $sqlFSEmpresa = new SQLFacturaSenavexEmpresa();
                $fsEmpresa = new FacturaSenavexEmpresa();
                $fsEmpresa->setId_factura_senavex_empresa($factura->getId_empresa());
                $fsEmpresa= $sqlFSEmpresa->getEmpresa($fsEmpresa);
                $nombre = $fsEmpresa->getNombre();
                $nit = $fsEmpresa->getNit();
                $ruex = $fsEmpresa->getRuex();
            }

            foreach ($listaDetalle as $detalle) {
                $del = -1;
                $al = -1;
                $sqlFSMDServicio = new SQLFacturaSenavexManualDetalleServicio();
                $fsmdServicio = new FacturaSenavexManualDetalleServicio();
                
                $fsmdServicio->setId_factura_senavex_manual_detalle($detalle->getId_factura_senavex_manual_detalle());
                $fsmdServicio=$sqlFSMDServicio->getFacturaDetallePorDetalle($fsmdServicio);
                
                $sqlServicio = new SQLServicio();
                $servicio = new Servicio();
                
                if($detalle->getVortex()==1){
                    $del = 0;
                    $al = 0;
                    $servicioExportador = new ServicioExportador();
                    $sqlServicioExportador = new SQLServicioExportador();
                    $servicioExportador->setId_servicio_exportador($detalle->getId_servicio());
                    $servicioExportador = $sqlServicioExportador->getBuscarServicioExportadorPorId($servicioExportador);
                    //print('<pre>'.print_r($servicioExportador,true).'</pre>');
                    
                    $servicio->setId_servicio($servicioExportador->getId_Servicio());
                    $servicio = $sqlServicio->getBuscarServicioPorId($servicio);
                }else{
                    $servicio->setId_servicio($detalle->getId_servicio());
                    $servicio = $sqlServicio->getBuscarServicioPorId($servicio);

                    if(($detalle->getId_servicio()>= 11 && $detalle->getId_servicio() <= 48) || ($detalle->getId_servicio()>= 75 && $detalle->getId_servicio() <= 78) ){
                        $del = ($del==-1 ?  $fsmdServicio->getNro_ctrl_1():( $del > $fsmdServicio->getNro_ctrl_1()? $fsmdServicio->getNro_ctrl_1() : $del));
                        if($detalle->getId_servicio()>= 22 && $detalle->getId_servicio() <= 46){
                            $al = ($al==-1 ? $fsmdServicio->getNro_ctrl_1():( $al < $fsmdServicio->getNro_ctrl_1()? $fsmdServicio->getNro_ctrl_1() : $al));
                        }else{
                            $al = ($al==-1 ? $fsmdServicio->getNro_ctrl_2():( $al < $fsmdServicio->getNro_ctrl_2()? $fsmdServicio->getNro_ctrl_2() : $al));
                        }
                    }else{
                        $del = 0; $al = 0;
                    }
                }
                
                $cantidad+=$detalle->getCantidad();
                $total+=$detalle->getPrecio() * $detalle->getCantidad();
                $lista[$factura->getId_factura_senavex_manual().''.$servicio->getId_servicio()] = ['numero_factura'=>$factura->getNumero_factura(), 
                                    'numero_recibo'=>$factura->getNumero_recibo(),
                                    'fecha_emision'=>$factura->getFecha_emision(), 
                                    'descripcion'=>$servicio->getDescripcion(), 
                                    'ruex'=>$ruex, 
                                    'nombre'=>$nombre, 
                                    'cantidad'=> $lista[$factura->getId_factura_senavex_manual().''.$servicio->getId_servicio()]['cantidad'] + $detalle->getCantidad(), 
                                    'nro_ctrl_1'=>$del, 
                                    'nro_ctrl_2'=>$al, 
                                    'total'=>$lista[$factura->getId_factura_senavex_manual().''.$servicio->getId_servicio()]['total'] + ($detalle->getPrecio() * $detalle->getCantidad())];
            }
            $contador++;
        }
        $pdf = new CierreDetallado();
        $parts = array_chunk($lista, 29);
        if(count($parts)==0) {
            $contador = 1;
        }else{
            $contador = count($parts);
        }
        for ($index = 0; $index < $contador; $index++) {

            $pdf->AddPage("L","Letter");
            $pdf->Cabecera($regional->getCiudad(),$fecha_ini,$fecha_fin);
            $pdf->Body( $parts[$index], ( $index == ( $contador-1 ) )? [$cantidad,$total]:[]);
        }
        $pdf->Output("Reporte.pdf",'I');
        } catch (Exception $e){
            print('<pre>'.print_r($e,true).'</pre>');
        }
    }

    public function CierreDetalladoXls($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional, $id_tipo){
//print("<pre>".print_r($_REQUEST, true)."</pre>");
        try{
            $regional = new Regional();
            $empresa_persona = new EmpresaPersona();

            $sqlRegional = new SQLRegional();
            $sqlEmpresa_persona = new SQLEmpresaPersona();
            $empresa_persona->setId_empresa_persona($id_empresa_persona);
            $empresa_persona=$sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
            $facturaSenavexTipo = new FacturaSenavexTipo();
            $sqlFacturaSenavexTipo = new SQLFacturaSenavexTipo();

            if($id_tipo>0 && $id_tipo<11){
                $facturaSenavexTipo->setId($id_tipo);
            } else {
                $id_tipo = -1;
            }

            if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
                $regional->setId_regional($id_regional);
            }else{
                $regional->setId_regional($empresa_persona->getId_regional());
            }
            $regional=$sqlRegional->getBuscarRegionalPorId($regional);
            $lista = array();

            $facturaSenavexManual = new FacturaSenavexManual();
            $sqlFacturaSenavexManual = new SQLFacturaSenavexManual();
            $facturaSenavexManual->setId_regional($regional->getId_regional());
            $facturaSenavexManual->setEstado(2);
            $listaFacturas1 = $sqlFacturaSenavexManual->ListFacturaManualFecha($facturaSenavexManual, $fecha_ini, $fecha_fin, $id_tipo);
            $facturaSenavexManual->setEstado(5);
            $listaFacturas2 = $sqlFacturaSenavexManual->ListFacturaManualFecha($facturaSenavexManual, $fecha_ini, $fecha_fin, $id_tipo);

            $listaFacturas = array_merge($listaFacturas1,$listaFacturas2);
            $total=0;
            $cantidad =0;
            $inputFileName = "styles".DS."documentos".DS."cierre_detallado.xlsx";
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $sheet=0;
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,4, "Del ". date('d/m/Y',strtotime($fecha_ini) ). " - Al " . date('d/m/Y',strtotime($fecha_fin)) );
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,3, "REGIONAL :" . $regional->getCiudad());

            $row = 6;
            $index = 0;
            $cantidadt = 0;
            $sumat = 0;
            foreach ($listaFacturas as $factura) {

                $fsmDetalle = new FacturaSenavexManualDetalle();
                $sqlFSMDetalle = new SQLFacturaSenavexManualDetalle();
                $fsmDetalle->setId_factura_senavex_manual($factura->getId_factura_senavex_manual());
                $listaDetalle = $sqlFSMDetalle->getListFacturaDetallePorIdFactura($fsmDetalle);
                $del = -1;
                $al = -1;

                $nombre = '';
                $nit = '';
                $ruex = '';
                if($factura->getVortex()=='1'){
                    $empresa = new Empresa();
                    $sqlEmpresa = new SQLEmpresa();
                    $empresa->setId_empresa($factura->getId_empresa());
                    $empresa = $sqlEmpresa->getEmpresaPorID($empresa);
                    $nombre = $empresa->getRazon_Social();
                    $ruex = $empresa->getRuex();
                    $nit = $empresa->getNit();
                }elseif($factura->getVortex()=='2'){
                    $sqlFSEmpresa = new SQLFacturaSenavexEmpresaImport();
                    $fsEmpresa = new FacturaSenavexEmpresaImport();
                    $fsEmpresa->setId_factura_senavex_empresa_import($factura->getId_empresa());
                    $fsEmpresa= $sqlFSEmpresa->getEmpresa($fsEmpresa);
                    $nombre = $fsEmpresa->getNombre();
                    $nit = $fsEmpresa->getNit();
                    $ruex = '';
                }else{
                    $sqlFSEmpresa = new SQLFacturaSenavexEmpresa();
                    $fsEmpresa = new FacturaSenavexEmpresa();
                    $fsEmpresa->setId_factura_senavex_empresa($factura->getId_empresa());
                    $fsEmpresa= $sqlFSEmpresa->getEmpresa($fsEmpresa);
                    $nombre = $fsEmpresa->getNombre();
                    $nit = $fsEmpresa->getNit();
                    $ruex = $fsEmpresa->getRuex();
                }

                foreach ($listaDetalle as $detalle) {
                    $del = -1;
                    $al = -1;
                    $sqlFSMDServicio = new SQLFacturaSenavexManualDetalleServicio();
                    $fsmdServicio = new FacturaSenavexManualDetalleServicio();

                    $fsmdServicio->setId_factura_senavex_manual_detalle($detalle->getId_factura_senavex_manual_detalle());
                    $fsmdServicio=$sqlFSMDServicio->getFacturaDetallePorDetalle($fsmdServicio);

                    $sqlServicio = new SQLServicio();
                    $servicio = new Servicio();

                    if($detalle->getVortex()==1){
                        $del = 0;
                        $al = 0;
                        $servicioExportador = new ServicioExportador();
                        $sqlServicioExportador = new SQLServicioExportador();
                        $servicioExportador->setId_servicio_exportador($detalle->getId_servicio());
                        $servicioExportador = $sqlServicioExportador->getBuscarServicioExportadorPorId($servicioExportador);
                        //print('<pre>'.print_r($servicioExportador,true).'</pre>');

                        $servicio->setId_servicio($servicioExportador->getId_Servicio());
                        $servicio = $sqlServicio->getBuscarServicioPorId($servicio);
                    }else{
                        $servicio->setId_servicio($detalle->getId_servicio());
                        $servicio = $sqlServicio->getBuscarServicioPorId($servicio);

                        if(($detalle->getId_servicio()>= 11 && $detalle->getId_servicio() <= 48) || ($detalle->getId_servicio()>= 75 && $detalle->getId_servicio() <= 78) ){
                            $del = ($del==-1 ?  $fsmdServicio->getNro_ctrl_1():( $del > $fsmdServicio->getNro_ctrl_1()? $fsmdServicio->getNro_ctrl_1() : $del));
                            if($detalle->getId_servicio()>= 22 && $detalle->getId_servicio() <= 46){
                                $al = ($al==-1 ? $fsmdServicio->getNro_ctrl_1():( $al < $fsmdServicio->getNro_ctrl_1()? $fsmdServicio->getNro_ctrl_1() : $al));
                            }else{
                                $al = ($al==-1 ? $fsmdServicio->getNro_ctrl_2():( $al < $fsmdServicio->getNro_ctrl_2()? $fsmdServicio->getNro_ctrl_2() : $al));
                            }
                        }else{
                            $del = 0; $al = 0;
                        }
                    }

                    $cantidad+=$detalle->getCantidad();
                    $total+=$detalle->getPrecio() * $detalle->getCantidad();
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,$row + $index, $factura->getFecha_emision());
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,$row + $index, $factura->getNumero_factura());
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,$row + $index, $servicio->getDescripcion());
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,$row + $index, $ruex);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,$row + $index, $nombre);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,$row + $index, $lista[$factura->getId_factura_senavex_manual().''.$servicio->getId_servicio()]['cantidad'] + $detalle->getCantidad());
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,$row + $index, $del);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(7 ,$row + $index, $al);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,$row + $index, $lista[$factura->getId_factura_senavex_manual().''.$servicio->getId_servicio()]['total'] + ($detalle->getPrecio() * $detalle->getCantidad()));

                    $cantidadt = $cantidadt + $lista[$factura->getId_factura_senavex_manual().''.$servicio->getId_servicio()]['cantidad'] + $detalle->getCantidad();
                    $sumat = $sumat + $lista[$factura->getId_factura_senavex_manual().''.$servicio->getId_servicio()]['total'] + ($detalle->getPrecio() * $detalle->getCantidad());
                }
                $row++;
            }


            $objPHPExcel->getActiveSheet()->getStyle('B'.$row .':I'.$row )->getFont()->setBold(true);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(4 ,$row , "TOTALES");
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(5 ,$row , $cantidadt);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(8 ,$row , $sumat);

            $objPHPExcel->getProperties()->setDescription("Cierre_Detallado ".$fecha_ini.' al '.$fecha_fin);
            header('Content-Disposition: attachment; filename="Cierre_detallado.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');

        } catch (Exception $e){
            print('<pre>'.print_r($e,true).'</pre>');
        }
    }

    public function getLibroVentasIVA($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional, $id_tipo){
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        $facturaSenavexTipo = new FacturaSenavexTipo();
        $sqlFacturaSenavexTipo = new SQLFacturaSenavexTipo();
        if($id_tipo>0 && $id_tipo<11){
            $facturaSenavexTipo->setId($id_tipo);
        } else {
             $id_tipo = -1;
        }
        
        $sqlReportesEstadisticas = new SQLReportesEstadisticas();
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $list = $sqlReportesEstadisticas->reporte_2($id_regional, $fecha_ini, $fecha_fin, $id_tipo);
        }else{
            $list = $sqlReportesEstadisticas->reporte_2($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin, $id_tipo);
        }
        
        $inputFileName = "styles".DS."documentos".DS."reporte.xlsx";//"styles/reporte.xlsx";
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            //$objPHPExcel = new PHPExcel();
            $row = 13;
            $col = 0;
            for ($index = 0; $index < count($list); $index++) {

                $nombre = '';
                $nit = '';
                if($list[$index]['vortex']=='1'){
                    $empresa = new Empresa();
                    $sqlEmpresa = new SQLEmpresa();
                    $empresa->setId_empresa($list[$index]['id_empresa']);
                    $empresa = $sqlEmpresa->getEmpresaPorID($empresa);
                    $nombre = $empresa->getRazon_Social();
                    $nit = $empresa->getNit();
                }elseif($list[$index]['vortex']=='2'){
                    $fsEmpresa = new FacturaSenavexEmpresaImport();
                    $sqlFSEmpresa = new SQLFacturaSenavexEmpresaImport();
                    $fsEmpresa->setId_factura_senavex_empresa_import($list[$index]['id_empresa']);
                    $fsEmpresa = $sqlFSEmpresa->getEmpresa($fsEmpresa);
                    $nombre = $fsEmpresa->getNombre();
                    $nit = $fsEmpresa->getNit();
                    
                }else{
                    $fsEmpresa = new FacturaSenavexEmpresa();
                    $sqlFSEmpresa = new SQLFacturaSenavexEmpresa();
                    $fsEmpresa->setId_factura_senavex_empresa($list[$index]['id_empresa']);
                    $fsEmpresa = $sqlFSEmpresa->getEmpresa($fsEmpresa);
                    $nombre = $fsEmpresa->getNombre();
                    $nit = $fsEmpresa->getNit();
                }
                
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(0 ,$row + $index, '3');
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(1 ,$row + $index, $index+1);
                $fechas = date('d/m/Y',strtotime($list[$index]['fecha_emision']));
                $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(2 ,$row + $index, $dateVal);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(3 ,$row + $index, $list[$index]['numero_factura']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(4 ,$row + $index, $list[$index]['numero_autorizacion']);
                $estado = $list[$index]['id_factura_senavex_manual_estado'];
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(5 ,$row + $index, ($estado == 1 || $estado == 6)? 'A': ($estado == 2? 'V':'C'));
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(6 ,$row + $index, $nit);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(7 ,$row + $index, ($estado == 1 || $estado == 6)? 'ANULADO' : $nombre);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(8 ,$row + $index, ($estado == 1 || $estado == 6)? 0 : $list[$index]['total'] );
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(9 ,$row + $index, 0);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(10 ,$row + $index, 0);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(11 ,$row + $index, 0);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(12 ,$row + $index, ($estado == 1 || $estado == 6)? 0 : $list[$index]['total']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(13 ,$row + $index, 0);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(14 ,$row + $index, ($estado == 1 || $estado == 6)? 0 : $list[$index]['total']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(15 ,$row + $index, ($estado == 1 || $estado == 6)? 0 : $list[$index]['total'] * 0.13 );
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(16 ,$row + $index, ($estado == 1 || $estado == 6)? '' : $list[$index]['codigo_control']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(17 ,$row + $index, $list[$index]['ciudad']);
		$facturaSenavexTipo->setId($list[$index]['id_tipo']);
                $tipo = $sqlFacturaSenavexTipo->getBuscarFacturaSenavexTipoPorId($facturaSenavexTipo);
                $idt = $tipo->getDescripcion();
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(18 ,$row + $index, $idt);

            }
	    $fila = $row + $index -1;
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('c13:c'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('i13:p'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            //print('<pre>'.print_r($_SESSION,true).'</pre>');
            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("Libro de Ventas IVA");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("libro de ventas del ".$fecha_ini.' al '.$fecha_fin);

            header('Content-Disposition: attachment; filename="ventas.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           // die('<br>Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
    }
    public function getConciliacion($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional, $id_tipo){
       	ini_set('memory_limit','2048M');
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        $facturaSenavexTipo = new FacturaSenavexTipo();
        $sqlFacturaSenavexTipo = new SQLFacturaSenavexTipo();

        if($id_tipo>0 && $id_tipo<11){
            $facturaSenavexTipo->setId($id_tipo);
        } else {
             $id_tipo = -1;
        }
        
        $sqlReportesEstadisticas = new SQLReportesEstadisticas();
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $list1 = $sqlReportesEstadisticas->conciliacion($id_regional, $fecha_ini, $fecha_fin, 2, $id_tipo);
            $list2 = $sqlReportesEstadisticas->conciliacion($id_regional, $fecha_ini, $fecha_fin, 5, $id_tipo);            
        }else{
            $list1 = $sqlReportesEstadisticas->conciliacion($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin, 2, $id_tipo);
            $list2 = $sqlReportesEstadisticas->conciliacion($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin, 5, $id_tipo);
        }
        
        $list = array_merge($list1,$list2);
        $inputFileName = "styles".DS."documentos".DS."conciliacion.xlsx";//"styles/reporte.xlsx";
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            //$objPHPExcel = new PHPExcel();
            $row = 6;
            $col = 0;
            for ($index = 0; $index < count($list); $index++) {

                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(0 ,$row + $index, $list[$index]['ciudad']);
                $fechas = date('d/m/Y',strtotime($list[$index]['fecha_emision']));
                $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(1 ,$row + $index, $dateVal);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(2 ,$row + $index, $list[$index]['numero_factura']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(3 ,$row + $index, $list[$index]['total']);
                $fechas = date('d/m/Y',strtotime($list[$index]['fecha_deposito']));
                $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(4 ,$row + $index, $dateVal);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(5 ,$row + $index, $list[$index]['codigo_deposito']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(6 ,$row + $index, $list[$index]['monto']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(7 ,$row + $index, $list[$index]['descripcion']);

                $facturaSenavexTipo->setId($list[$index]['id_tipo']);
                $tipo = $sqlFacturaSenavexTipo->getBuscarFacturaSenavexTipoPorId($facturaSenavexTipo);
                $idt = $tipo->getDescripcion();

                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(8 ,$row + $index, $idt);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(9 ,$row + $index, $list[$index]['asistente']);
            }
	    $rango = "DEL :". date('d/m/Y',strtotime($fecha_ini))."     AL :". date('d/m/Y',strtotime($fecha_fin));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(0 ,3, $rango);
            $fila = $row + $index -1;
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('b6:b'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('d6:d'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('e6:e'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('g6:g'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            //print('<pre>'.print_r($_SESSION,true).'</pre>');
            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("conciliacion");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("conciliacion ".$fecha_ini.' al '.$fecha_fin);

            header('Content-Disposition: attachment; filename="conciliacion.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           // die('<br>Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
    }
    public function getAnulados($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional){
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        
        $sqlReportesEstadisticas = new SQLReportesEstadisticas();
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $list1 = $sqlReportesEstadisticas->anulados($id_regional, $fecha_ini, $fecha_fin, 1);
            $list2 = $sqlReportesEstadisticas->anulados($id_regional, $fecha_ini, $fecha_fin, 6);
        }else{
            $list1 = $sqlReportesEstadisticas->anulados($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin, 1);
            $list2 = $sqlReportesEstadisticas->anulados($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin, 6);
        }
        
        $list = array_merge($list1,$list2);
        //$list=$list1;
        
        $inputFileName = "styles".DS."documentos".DS."anulados.xlsx";//"styles/reporte.xlsx";
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $row = 4;

            for ($index = 0; $index < count($list); $index++) {

                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(0 ,$row + $index, $index + 1);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(1 ,$row + $index, $list[$index]['ciudad']);
                $fechas = date('d/m/Y',strtotime($list[$index]['fecha_emision']));
                $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(2 ,$row + $index, $dateVal);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(3 ,$row + $index, $list[$index]['numero_factura']);
                $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(4 ,$row + $index, $list[$index]['descripcion']);
            }
            $fila = $row + $index -1;
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('c4:c'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);

            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("anulados");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("anulados ".$fecha_ini.' al '.$fecha_fin);

            header('Content-Disposition: attachment; filename="anulados.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           // die('<br>Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
    }
    public function getRecaudaciones($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional, $id_tipo){
//        print('<pre>'.print_r('<h1>REPORTE DE RECAUDACIONES DE SERVICIOS PRESTADOS EN PROCESO...</h1>',true).'</pre>');
     
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
	$facturaSenavexTipo = new FacturaSenavexTipo();
        $sqlFacturaSenavexTipo = new SQLFacturaSenavexTipo();

        if($id_tipo>0 && $id_tipo<11){
            $facturaSenavexTipo->setId($id_tipo);
        } else {
             $id_tipo = -1;
        }
                
        $sqlReportesEstadisticas = new SQLReportesEstadisticas();
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $lista1 = $sqlReportesEstadisticas->recaudaciones($id_regional, 2, $fecha_ini, $fecha_fin, $id_tipo);
            $lista2 = $sqlReportesEstadisticas->recaudaciones($id_regional, 5, $fecha_ini, $fecha_fin, $id_tipo); 
        }else{
            $lista1 = $sqlReportesEstadisticas->recaudaciones($empresa_persona->getId_regional(), 2, $fecha_ini, $fecha_fin, $id_tipo);
            $lista2 = $sqlReportesEstadisticas->recaudaciones($empresa_persona->getId_regional(), 5, $fecha_ini, $fecha_fin, $id_tipo); 
        }
       
        $lista = array_merge($lista1,$lista2);
        
        $servicios = new Servicio();
        $sql_servicios = new SQLServicio();
        $servicios->setId_Categoria_Servicio("6,7,8");
        $servicios=$sql_servicios->getListaServiciosPorCategoria($servicios);
        
        $regionales = new Regional();
        $sql_regionales = new SQLRegional();
        $regionales=$sql_regionales->getListarRegionales($regionales, false);
        
        foreach ($lista as $value) {
            $fsmDetalle = new FacturaSenavexManualDetalle();
            $SQLfsmDetalle = new SQLFacturaSenavexManualDetalle();
            $fsmDetalle->setId_factura_senavex_manual_detalle($value['id_factura_senavex_manual_detalle']);
            $fsmDetalle = $SQLfsmDetalle->getFacturaDetallePorID($fsmDetalle);
            $servicio = new Servicio();
            $SQLservicio = new SQLServicio();
//            print('<pre>'.print_r($value,true).'</pre>');
//            print('<pre>'.print_r($fsmDetalle,true).'</pre>');
            if($fsmDetalle->getVortex()==1){
                $servicio_exportador = new ServicioExportador();
                $SQLservicio_exportador = new SQLServicioExportador();
                $servicio_exportador->setId_servicio_exportador($fsmDetalle->getId_servicio());
                $servicio_exportador = $SQLservicio_exportador->getBuscarServicioExportadorPorId($servicio_exportador);
                $servicio->setId_servicio($servicio_exportador->getId_servicio());
            }else{
                $servicio->setId_servicio($fsmDetalle->getId_servicio());
            }
            $servicio=$SQLservicio->getBuscarServicioPorId($servicio);
            $id_regional = $value['id_regional'];
            $id_servicio = $servicio->getId_servicio();
            $descripcion = $servicio->getDescripcion();
            $precio = $fsmDetalle->getPrecio();
            $_cantidad = $fsmDetalle->getCantidad();
            $_total = $precio * $_cantidad;
            
            $cantidad = empty($array[$id_regional][$id_servicio][2])? $_cantidad : ($array[$id_regional][$id_servicio][2] + $_cantidad);
            $total = empty($array[$id_regional][$id_servicio][4])? $_total  : ($array[$id_regional][$id_servicio][4] + $_total );
            $array[$id_regional][$id_servicio] = [$value['ciudad'], $descripcion, $cantidad, $precio, $total];
        }
        $inputFileName = "styles".DS."documentos".DS."recaudaciones.xlsx";
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $row = 4;
            $index = 0;
            foreach ($regionales as $key => $regs) {
                foreach ($servicios as $key => $servs) {
                    if(!empty($array[$regs->getId_regional()][$servs->getId_servicio()][0])){
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(0 ,$row + $index, $index + 1);
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(1 ,$row + $index, $array[$regs->getId_regional()][$servs->getId_servicio()][0]);
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(2 ,$row + $index, $array[$regs->getId_regional()][$servs->getId_servicio()][1]);
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(3 ,$row + $index, $array[$regs->getId_regional()][$servs->getId_servicio()][2] / 2);
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(4 ,$row + $index, $array[$regs->getId_regional()][$servs->getId_servicio()][3]);
                        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(5 ,$row + $index, $array[$regs->getId_regional()][$servs->getId_servicio()][4] / 2);
                        $index++;
                    }
                }
            }
	    $rango = "DEL :". date('d/m/Y',strtotime($fecha_ini))."     AL :". date('d/m/Y',strtotime($fecha_fin));
            $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow(0 ,2, $rango);
            $fila = $row + $index -1;
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('d4:d'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('f4:f'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


            header('Content-Disposition: attachment; filename="recaudaciones.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           // die('<br>Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
    }
    public function getReporteSGC($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional){
        
        $meses = ['','ENERO','FEBRERO','MARZO','ABRIL', 'MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        $sqlReportesEstadisticas = new SQLReportesEstadisticas();
        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $list = $sqlReportesEstadisticas->sgc_ruex($id_regional, $fecha_ini, $fecha_fin);
            $regional->setId_regional($id_regional);
        }else{
            $list = $sqlReportesEstadisticas->sgc_ruex($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $regional->setId_regional($empresa_persona->getId_regional());
        }
        
        
        
        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        //print('<pre>'.print_r($list ,true).'</pre>');   die;
        $inputFileName = "styles".DS."documentos".DS."sgc_ruex.xlsx";
//        $inputFileName = "styles".DS."documentos".DS."ReporteRUEX.xlsx";
        try {
            
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $row = 8;
            $sheet=0;
            $index = 0; 
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,3, date('d/m/Y',strtotime($fecha_ini)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,4, date('d/m/Y',strtotime($fecha_fin)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,4, $regional->getCiudad());    
            foreach ($list as $value) {
                //if($value['id_estado']!=13){
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,$row + $index, $index + 1);    
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,$row + $index,  strtoupper($value['razon_social']));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,$row + $index, $value['nit']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,$row + $index, $value['ruex']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,$row + $index, $value['estado']);
                    $fechas = date('d/m/Y H:i',strtotime($value['fecha_inicio_revision']));
                    $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y H:i', $fechas));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,$row + $index, $dateVal);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,$row + $index, $value['revisado']==1? 'Aprobado':'Rechazado');
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(7 ,$row + $index, $value['asistente']);
                    $fechas = date('d/m/Y H:i',strtotime($value['fecha_fin_revision']));
                    $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y H:i', $fechas));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,$row + $index, $dateVal);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(9 ,$row + $index, str_replace('</p>', ', ', str_replace('<p>', '', html_entity_decode($value['observaciones']))));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(10 ,$row + $index, html_entity_decode($value['ciudad']));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(11 ,$row + $index, $meses[intval(date('m',strtotime($value['fecha_inicio_revision'])))]);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(12 ,$row + $index, date('Y',strtotime($value['fecha_inicio_revision'])));
                    $horas= $this->getHoras($value['fecha_inicio_revision'], $value['fecha_fin_revision']);
                    $fines_semana= $this->getWeke($value['fecha_inicio_revision'], $value['fecha_fin_revision']);
                    $horas_respuesta = $horas - ($fines_semana * 48);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(13 ,$row + $index, $horas_respuesta);
                    if($horas_respuesta > 4){
                        $en_plazo = 'NO ESTA EN PLAZO';
                    } else {
                        $en_plazo = 'SI';
                    }
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(14 ,$row + $index, $en_plazo);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(15 ,$row + $index, $value['rep_legal'] );
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(16 ,$row + $index, $value['genero']==true? "Masculino": "Femenino" );
                    $index++;
                //}
            }
	    $fila = $row + $index -1;
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('f8:f'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATEHOUR);
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('i8:i'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATEHOUR);
            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("SGC RUEX");
            $objPHPExcel->getProperties()->setSubject("");

            $objPHPExcel->getProperties()->setDescription("SGC RUEX ".$fecha_ini.' al '.$fecha_fin);
            header('Content-Disposition: attachment; filename="sgc_ruex.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           
        }
    }
    public function getReporteAnuladosCO($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional){
        $meses = ['','ENERO','FEBRERO','MARZO','ABRIL', 'MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);

        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $regional->setId_regional($id_regional);
        }else{
            $regional->setId_regional($empresa_persona->getId_regional());
        }
        $sql_paco = new SQLPlanillaAnulacionCO();
        $paco = new PlanillaAnulacionCO();
        
//        $paco->setId_planilla_tipo_anulacion_co(Null);
//        $paco->setId_tipo_co(Null);
        $paco->setFecha_registro($fecha_ini);
        $paco->setId_regional($regional->getId_regional());
//        print("<pre>".print_r($paco, true).'</pre>');
        $list = $sql_paco->getListarPlanillaAnulacionCO_Tipo_Fecha($paco, $fecha_fin);

        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        $inputFileName = "styles".DS."documentos".DS."anulaciones.xlsx";

        try {
            
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $sheet=0;
            $index = 0;
            $row = 8;
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,5, date('d/m/Y',strtotime($fecha_ini)) . ' - ' .date('d/m/Y',strtotime($fecha_fin)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,5, $regional->getCiudad());
            foreach ($list as $value) {
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,$row + $index, $index + 1);
		$fechas = date('d/m/Y',strtotime($value['fecha_registro']));
                $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,$row + $index, $dateVal);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,$row + $index, $value['nro_control']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,$row + $index, $value['tipo_co']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,$row + $index, $value['ruex']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,$row + $index, $value['razon_social']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,$row + $index, $value['ciudad']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(7 ,$row + $index, $value['tipo_anulacion_co']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,$row + $index, $value['observacion']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(9 ,$row + $index, $meses[intval(date('m',strtotime($value['fecha_registro'])))]);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(10 ,$row + $index, date('Y',strtotime($value['fecha_registro'])));
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(11 ,$row + $index, $value['certificador']);
                $index++;
            }
	    $fila = $row + $index -1;
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('b8:b'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("ANULADOS CO");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("ANULADOS CO ".$fecha_ini.' al '.$fecha_fin);
            header('Content-Disposition: attachment; filename="anulados_co.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
        }
    }
    
    public function getReporteDdjjOrigen($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional){
        $meses = ['','ENERO','FEBRERO','MARZO','ABRIL', 'MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $regional->setId_regional($id_regional);
        }else{
            $regional->setId_regional($empresa_persona->getId_regional());
        }
        $sqlPlanillaDDJJ = new SQLPlanillaDDJJ();
        $planillaDDJJ = new PlanillaDDJJ();

        $planillaDDJJ->setFecha_registro($fecha_ini);
        $planillaDDJJ->setId_regional($regional->getId_regional());

        $list = $sqlPlanillaDDJJ->getListarDdjjOrigen_Tipo_Fecha($planillaDDJJ, $fecha_fin);
        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        $inputFileName = "styles".DS."documentos".DS."ddjjOrigen.xlsx";

        try {
            
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $sheet=0;
            $index = 0;
            $row = 8;
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,5, $regional->getCiudad());
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(7 ,5, date('d/m/Y',strtotime($fecha_ini)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(9 ,5, date('d/m/Y',strtotime($fecha_fin)));
             foreach ($list as $value) {
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,$row + $index, $index + 1);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,$row + $index, $value['ruex']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,$row + $index, $value['razon_social']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,$row + $index, $value['categoria_empresa']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,$row + $index, $value['acuerdo']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,$row + $index, $value['descripcion']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,$row + $index, $value['nandina']);
		if( intval($value['naladisa'])>99999999 ) {
                    $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('g'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_CONSECUTES);
                } else {
                    $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('g'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_CONSECUTE);
                }
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(7 ,$row + $index, $value['naladisa']);
		
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,$row + $index, $value['criterio_origen']. ' ' .$value['complemento']);                
		$objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(9 ,$row + $index, $value['numero_ddjj']);
                $fechas = date('d/m/Y',strtotime($value['fecha_revision']));
                $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(10 ,$row + $index, $dateVal);
                $fechas = date('d/m/Y',strtotime($value['fecha_vencimiento']));
                $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(11 ,$row + $index, $dateVal);
                if($value['fecha_baja']){
                    $fechas = date('d/m/Y',strtotime($value['fecha_baja']));
                    $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(12 ,$row + $index, $dateVal);
                } else {
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(12 ,$row + $index, "");
                }
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(13 ,$row + $index, $value['certificador']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(14 ,$row + $index, $value['observacion']);
                // $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(13 ,$row + $index, date('m',strtotime($value['fecha_revision'])));
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(15 ,$row + $index, $meses[intval(date('m',strtotime($value['fecha_revision'])))]);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(16 ,$row + $index, date('Y',strtotime($value['fecha_revision'])));
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(17 ,$row + $index, $value['ciudad']);
                $index++;
            }
	    $fila = $row + $index -1;
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('g8:g'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_CONSECUTES);
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('k8:k'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('l8:l'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('h8:h'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_CONSECUTE);
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('m8:m'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("DDJJ DE ORIGEN");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("DDJJ DE ORIGEN".$fecha_ini.' al '.$fecha_fin);
            header('Content-Disposition: attachment; filename="ddjj_origen.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
        }
    }
    public function getReporteSgcDDJJ($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional){
        
        $meses = ['','ENERO','FEBRERO','MARZO','ABRIL', 'MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        $sqlReportesEstadisticas = new SQLReportesEstadisticas();
        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $list = $sqlReportesEstadisticas->sgc_ddjj($id_regional, $fecha_ini, $fecha_fin);
            $regional->setId_regional($id_regional);
        }else{
            $list = $sqlReportesEstadisticas->sgc_ddjj($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $regional->setId_regional($empresa_persona->getId_regional());
        }
        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        //print('<pre>'.print_r($regional,true).'</pre>'); 
        $inputFileName = "styles".DS."documentos".DS."sgc_ddjj.xlsx";
//        $inputFileName = "styles".DS."documentos".DS."ReporteRUEX.xlsx";
        try {
            
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $row = 8;
            $sheet=0;
            $index = 0; 
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,3, date('d/m/Y',strtotime($fecha_ini)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,4, date('d/m/Y',strtotime($fecha_fin)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,4, $regional->getCiudad());    
            foreach ($list as $value) {
                //if($value['id_estado']!=13){
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,$row + $index, $index + 1);    
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,$row + $index,  strtoupper($value['razon_social']));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,$row + $index, $value['nit']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,$row + $index, $value['ruex']);
                    $fechas = date('d/m/Y H:i',strtotime($value['fecha_registro']));
                    $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y H:i', $fechas));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,$row + $index, $dateVal);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,$row + $index, $value['estado']); 
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,$row + $index, $value['asistente']);
                    $fechas = date('d/m/Y H:i',strtotime($value['fecha_revision']));
                    $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y H:i', $fechas));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(7 ,$row + $index, $dateVal);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,$row + $index, str_replace('</p>', ', ', str_replace('<p>', '', html_entity_decode($value['observacion']))));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(9 ,$row + $index, html_entity_decode($value['ciudad']));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(10 ,$row + $index, $meses[intval(date('m',strtotime($value['fecha_revision'])))]);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(11 ,$row + $index, date('Y',strtotime($value['fecha_revision'])));
                    $horas= $this->getHoras($value['fecha_registro'], $value['fecha_revision']);
                    $fines_semana= $this->getWeke($value['fecha_registro'], $value['fecha_revision']);
                    $horas_respuesta = $horas - ($fines_semana * 48);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(12 ,$row + $index, $horas_respuesta);
                    if($horas_respuesta > 72){
                        $en_plazo = 'NO ESTA EN PLAZO';
                    } else {
                        $en_plazo = 'SI';
                    }
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(13 ,$row + $index, $en_plazo);
                    // $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(15 ,$row + $index, $value['rep_legal'] );
                    // $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(16 ,$row + $index, $value['genero']==true? "Masculino": "Femenino" );
                    $index++;
                //}
            }
            $fila = $row + $index -1;
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('e8:e'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATEHOUR);
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('h8:h'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATEHOUR);
            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("SGC RUEX");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("SGC RUEX ".$fecha_ini.' al '.$fecha_fin);
            header('Content-Disposition: attachment; filename="sgc_ddjj.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           
        }
    }

    public function getSeguimientoDDJJ($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional){
        
        $meses = ['','ENERO','FEBRERO','MARZO','ABRIL', 'MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        $sqlReportesEstadisticas = new SQLReportesEstadisticas();
        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $list = $sqlReportesEstadisticas->seguimiento_ddjj($id_regional, $fecha_ini, $fecha_fin);
            $regional->setId_regional($id_regional);
        }else{
            $list = $sqlReportesEstadisticas->seguimiento_ddjj($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $regional->setId_regional($empresa_persona->getId_regional());
        }
        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        //print('<pre>'.print_r($regional,true).'</pre>'); 
        $inputFileName = "styles".DS."documentos".DS."seguimiento_ddjj.xlsx";
//        $inputFileName = "styles".DS."documentos".DS."ReporteRUEX.xlsx";
        try {
            
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $row = 8;
            $sheet=0;
            $index = 0; 
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,3, date('d/m/Y',strtotime($fecha_ini)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,4, date('d/m/Y',strtotime($fecha_fin)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,4, $regional->getCiudad());    
            foreach ($list as $value) {
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,$row + $index, $index + 1);    
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,$row + $index, $value['numero_folder']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,$row + $index, $value['numero_ddjj']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,$row + $index, $value['sigla']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,$row + $index, $value['ruex']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,$row + $index,  strtoupper($value['razon_social']));
                    $fechas = date('d/m/Y H:i',strtotime($value['fecha_registro']));
                    $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y H:i', $fechas));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,$row + $index, $dateVal);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(7 ,$row + $index, $value['descripcion']); 
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,$row + $index, $value['estado']);
                    if($value['fecha_revision']){
                         $fechas = date('d/m/Y H:i',strtotime($value['fecha_revision']));
                        $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y H:i', $fechas));
                        $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(9 ,$row + $index, $dateVal);
                    }
		    if($value['fecha_entrega']){
                         $fechas = date('d/m/Y H:i',strtotime($value['fecha_entrega']));
                        $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y H:i', $fechas));
                        $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(10 ,$row + $index, $dateVal);
                    }
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(11 ,$row + $index, html_entity_decode($value['ciudad']));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(12 ,$row + $index, $meses[intval(date('m',strtotime($value['fecha_registro'])))]);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(13 ,$row + $index, date('Y',strtotime($value['fecha_registro'])));
                   
                    $index++;
            }
            $fila = $row + $index -1;
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('g8:g'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATEHOUR);
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('j8:j'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATEHOUR);
	    $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('k8:k'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATEHOUR);
            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("Seguimiento DDJJ");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("Seguimiento DDJJ ".$fecha_ini.' al '.$fecha_fin);
            header('Content-Disposition: attachment; filename="seguimiento_ddjj.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           
        }
    }

    public function getReporteSgcCO($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional){
        
        $meses = ['','ENERO','FEBRERO','MARZO','ABRIL', 'MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        $sqlReportesEstadisticas = new SQLReportesEstadisticas();
        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $list = $sqlReportesEstadisticas->sgc_co($id_regional, $fecha_ini, $fecha_fin);
            $regional->setId_regional($id_regional);
        }else{
            $list = $sqlReportesEstadisticas->sgc_co($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $regional->setId_regional($empresa_persona->getId_regional());
        }
        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        $inputFileName = "styles".DS."documentos".DS."sgc_co.xlsx";
        try {
            
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $row = 8;
            $sheet=0;
            $index = 0; 
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,3, date('d/m/Y',strtotime($fecha_ini)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,4, date('d/m/Y',strtotime($fecha_fin)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,4, $regional->getCiudad());    
            foreach ($list as $value) {
                //if($value['id_estado']!=13){
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,$row + $index, $index + 1);  
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,$row + $index, $value['nro_control']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,$row + $index, $value['acuerdo']);  
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,$row + $index,  strtoupper($value['razon_social']));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,$row + $index, $value['nit']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,$row + $index, $value['ruex']);
                    $fechas = date('d/m/Y H:i',strtotime($value['fecha_recepcion']));
                    $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y H:i', $fechas));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,$row + $index, $dateVal);
                    // $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,$row + $index, date('d/m/Y H:i',strtotime($value['fecha_recepcion'])));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(7 ,$row + $index, $value['estado']); 
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,$row + $index, $value['asistente']);
                    $fechas = date('d/m/Y H:i',strtotime($value['fecha_revision']));
                    $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y H:i', $fechas));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(9 ,$row + $index, $dateVal);
                    // $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(9 ,$row + $index, date('d/m/Y H:i',strtotime($value['fecha_revision'])));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(10 ,$row + $index, str_replace('</p>', ', ', str_replace('<p>', '', html_entity_decode($value['observacion_revision']))));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(11 ,$row + $index, html_entity_decode($value['ciudad']));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(12 ,$row + $index, $meses[intval(date('m',strtotime($value['fecha_revision'])))]);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(13 ,$row + $index, date('Y',strtotime($value['fecha_revision'])));
                    $horas= $this->getHoras($value['fecha_recepcion'], $value['fecha_revision']);
                    $fines_semana= $this->getWeke($value['fecha_recepcion'], $value['fecha_revision']);
                    $horas_respuesta = $horas - ($fines_semana * 48);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(14 ,$row + $index, $horas_respuesta);
                    if($horas_respuesta > 24){
                        $en_plazo = 'NO ESTA EN PLAZO';
                    } else {
                        $en_plazo = 'SI';
                    }
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(15 ,$row + $index, $en_plazo);
                    // $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(15 ,$row + $index, $value['rep_legal'] );
                    // $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(16 ,$row + $index, $value['genero']==true? "Masculino": "Femenino" );
                    $index++;
                //}
            }
            $fila = $row + $index -1;
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('g8:g'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATEHOUR);
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('j8:j'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATEHOUR);
            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("SGC RUEX");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("SGC RUEX ".$fecha_ini.' al '.$fecha_fin);
            header('Content-Disposition: attachment; filename="sgc_co.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           
        }
    }

    public function getSeguimientoCO($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional){
        
        $meses = ['','ENERO','FEBRERO','MARZO','ABRIL', 'MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        $sqlReportesEstadisticas = new SQLReportesEstadisticas();
        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $list = $sqlReportesEstadisticas->seguimiento_co($id_regional, $fecha_ini, $fecha_fin);
            $regional->setId_regional($id_regional);
        }else{
            $list = $sqlReportesEstadisticas->seguimiento_co($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $regional->setId_regional($empresa_persona->getId_regional());
        }
        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        $inputFileName = "styles".DS."documentos".DS."seguimiento_co.xlsx";
        try {
            
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $row = 8;
            $sheet=0;
            $index = 0; 
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,3, date('d/m/Y',strtotime($fecha_ini)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,4, date('d/m/Y',strtotime($fecha_fin)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,4, $regional->getCiudad());    
            foreach ($list as $value) {
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,$row + $index, $index + 1);  
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,$row + $index, $value['numero_folder']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,$row + $index, $value['nro_control']);  
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,$row + $index,  strtoupper($value['acuerdo']));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,$row + $index, $value['ruex']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,$row + $index, $value['razon_social']);
                    $fechas = date('d/m/Y H:i',strtotime($value['fecha_recepcion']));
                    $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y H:i', $fechas));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,$row + $index, $dateVal);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(7 ,$row + $index, $value['emision']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,$row + $index, $value['estado']);
                    if($value['fecha_revision']){
                        $fechas = date('d/m/Y H:i',strtotime($value['fecha_revision']));
                        $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y H:i', $fechas));
                        $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(9 ,$row + $index, $dateVal);
                    }
		    if($value['fecha_entrega']){
                        $fechas = date('d/m/Y H:i',strtotime($value['fecha_entrega']));
                        $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y H:i', $fechas));
                        $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(10 ,$row + $index, $dateVal);
                    }
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(11 ,$row + $index, html_entity_decode($value['ciudad']));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(12 ,$row + $index, $meses[intval(date('m',strtotime($value['fecha_recepcion'])))]);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(13 ,$row + $index, date('Y',strtotime($value['fecha_recepcion'])));
                    $index++;
            }
            $fila = $row + $index -1;
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('g8:g'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATEHOUR);
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('j8:j'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATEHOUR);
	    $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('k8:k'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DATEHOUR);
            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("Seguimiento CO");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("Seguimiento CO".$fecha_ini.' al '.$fecha_fin);
            header('Content-Disposition: attachment; filename="seguimiento_co.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           
        }
    }

    public function getSgcResumen($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional){
        
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        $sqlReportesEstadisticas = new SQLReportesEstadisticas();
        $regional = new Regional();
        $sqlRegional = new SQLRegional();

        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $concilia = $sqlReportesEstadisticas->conciliacion_r($id_regional, $fecha_ini, $fecha_fin);
            $facturas = $sqlReportesEstadisticas->libro_r($id_regional, $fecha_ini, $fecha_fin); 
            $anulados = $sqlReportesEstadisticas->libro_anulados_r($id_regional, $fecha_ini, $fecha_fin);
            $emitidos = $sqlReportesEstadisticas->sgc_co_r($id_regional, $fecha_ini, $fecha_fin);
            $rechazados = $sqlReportesEstadisticas->sgc_co_rechazado_r($id_regional, $fecha_ini, $fecha_fin);
            $aprobados = $sqlReportesEstadisticas->sgc_co_aprobado_r($id_regional, $fecha_ini, $fecha_fin);
            $tddjj = $sqlReportesEstadisticas->sgc_ddjj_r($id_regional, $fecha_ini, $fecha_fin);
            $addjj = $sqlReportesEstadisticas->sgc_ddjj_aprobado_r($id_regional, $fecha_ini, $fecha_fin);
            $ruex = $sqlReportesEstadisticas->sgc_ruex_r($id_regional, $fecha_ini, $fecha_fin);
            // $aruex = $sqlReportesEstadisticas->sgc_ruex_aprobado_r($id_regional, $fecha_ini, $fecha_fin);
            $rruex = $sqlReportesEstadisticas->sgc_ruex_rechazado_r($id_regional, $fecha_ini, $fecha_fin);
            $respuestos = $sqlReportesEstadisticas->sgc_repuesto_r($id_regional, $fecha_ini, $fecha_fin);
            $list1 = $sqlReportesEstadisticas->sgc_ruex($id_regional, $fecha_ini, $fecha_fin);
            $list2 = $sqlReportesEstadisticas->sgc_ddjj($id_regional, $fecha_ini, $fecha_fin);
            $list3 = $sqlReportesEstadisticas->sgc_co($id_regional, $fecha_ini, $fecha_fin);
            $regional->setId_regional($id_regional);  
        }else{
            $concilia = $sqlReportesEstadisticas->conciliacion_r($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $facturas = $sqlReportesEstadisticas->libro_r($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $anulados = $sqlReportesEstadisticas->libro_anulados_r($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $emitidos = $sqlReportesEstadisticas->sgc_co_r($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $rechazados = $sqlReportesEstadisticas->sgc_co_rechazado_r($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $aprobados = $sqlReportesEstadisticas->sgc_co_aprobado_r($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $tddjj = $sqlReportesEstadisticas->sgc_ddjj_r($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $addjj = $sqlReportesEstadisticas->sgc_ddjj_aprobado_r($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $ruex = $sqlReportesEstadisticas->sgc_ruex_r($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            // $aruex = $sqlReportesEstadisticas->sgc_ruex_aprobado_r($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $rruex = $sqlReportesEstadisticas->sgc_ruex_rechazado_r($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $respuestos = $sqlReportesEstadisticas->sgc_repuesto_r($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $list1 = $sqlReportesEstadisticas->sgc_ruex($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $list2 = $sqlReportesEstadisticas->sgc_ddjj($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $list3 = $sqlReportesEstadisticas->sgc_co($empresa_persona->getId_regional(), $fecha_ini, $fecha_fin);
            $regional->setId_regional($empresa_persona->getId_regional());
        }


        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        $inputFileName = "styles".DS."documentos".DS."sgc_resumen.xlsx";
        try {
            
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $row = 8;
            $sheet=0;
            $index = 0;
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,3, date('d/m/Y',strtotime($fecha_ini)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,4, date('d/m/Y',strtotime($fecha_fin)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,4, $regional->getCiudad());
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,9, $this->replaceGeneric($concilia));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,10, $this->replaceGeneric($anulados));
            $acount = 0;
            foreach ($list1 as $value) {
                    $horas= $this->getHoras($value['fecha_inicio_revision'], $value['fecha_fin_revision']);
                    $fines_semana= $this->getWeke($value['fecha_inicio_revision'], $value['fecha_fin_revision']);
                    $horas_respuesta = $horas - ($fines_semana * 48);
                    if($horas_respuesta <= 4){
                        $acount = $acount + 1;
                    }
            }
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,14, $acount);
            $acount = 0;
            foreach ($list2 as $value) {
                    $horas= $this->getHoras($value['fecha_registro'], $value['fecha_revision']);
                    $fines_semana= $this->getWeke($value['fecha_registro'], $value['fecha_revision']);
                    $horas_respuesta = $horas - ($fines_semana * 48);
                    if($horas_respuesta <= 72){
                        $acount = $acount + 1;
                    } 
            }
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,18, $acount);
            $acount = 0;
            foreach ($list3 as $value) {
                    $horas= $this->getHoras($value['fecha_recepcion'], $value['fecha_revision']);
                    $fines_semana= $this->getWeke($value['fecha_recepcion'], $value['fecha_revision']);
                    $horas_respuesta = $horas - ($fines_semana * 48);
                    if($horas_respuesta <= 24){
                        $acount = $acount + 1;
                    } 
            }
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,22, $acount);
            
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,11, $this->replaceGeneric($facturas));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,12, $this->replaceGeneric($respuestos));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,13, $this->replaceGeneric($aprobados));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,15, $this->replaceGeneric($ruex));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,16, $this->replaceGeneric($rruex));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,17, $this->replaceGeneric($ruex));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,19, $this->replaceGeneric($tddjj));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,21, $this->replaceGeneric($addjj));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,23, $this->replaceGeneric($emitidos));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,24, $this->replaceGeneric($rechazados));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,25, $this->replaceGeneric($emitidos));     
            $objPHPExcel->setActiveSheetIndex(0)->getStyle('e8:e25')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED3);
            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("SGC RESUMEN");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("SGC RESUMEN".$fecha_ini.' al '.$fecha_fin);
            header('Content-Disposition: attachment; filename="sgc_resumen.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           echo 'Error: '.$e;
        }
    }

    public function replaceGeneric($dato){
        if($dato[0]["count"]){
            return $dato[0]["count"];
        } else {
            return 0;
        }
    }
	
     public function replaceDataQuantity($dato){
        if($dato[0]["total"]){
            return $dato[0]["total"];
        } else {
            return 0;
        }
    }
    public function replaceDataFoo($dato){
        if($dato[0]["fob"]){
            return $dato[0]["fob"];
        } else {
            return 0;
        }
    }
    public function replaceDataWeight($dato){
        if($dato[0]["pneto"]){
            return $dato[0]["pneto"];
        } else {
            return 0;
        }
    }

    public function getReporteEmisiones($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional){
        $meses = ['','ENERO','FEBRERO','MARZO','ABRIL', 'MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);

        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $regional->setId_regional($id_regional);
        }else{
            $regional->setId_regional($empresa_persona->getId_regional());
        }

        $sqlRE = new SQLReportesEstadisticas();
        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        $list = $sqlRE->getReporteEmisiones($regional->getId_regional(), $fecha_ini, $fecha_fin);
//        print("<pre>".print_r($list, true)."</pre>");
        
        $inputFileName = "styles".DS."documentos".DS."reporte_emision.xlsx";
        $format = 'dd/mm/yyyy';
ini_set('memory_limit','2048M');
        try {
            
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
//            print("<pre>".print_r($_REQUEST, true)."</pre>");
            $sheet=0;
            $index = 0;
            $row = 9;
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,6, date('d/m/Y',strtotime($fecha_ini)) . ' - ' .date('d/m/Y',strtotime($fecha_fin)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(7 ,6, $regional->getCiudad());
            foreach ($list as $value) {
                
                if($value['id_servicio']=='11')
                    $abrev_co = 'AL';
                if($value['id_servicio']=='12')
                    $abrev_co = 'MC';
                if($value['id_servicio']=='13')
                    $abrev_co = 'SG';
                if($value['id_servicio']=='14')
                    $abrev_co = 'TP';
                if($value['id_servicio']=='15')
                    $abrev_co = '';
                if($value['id_servicio']=='16')
                    $abrev_co = 'VE';
                
                if($value['id_regional'] == '1')
                    $abrev_reg = 'LPZ';
                if($value['id_regional'] == '2')
                    $abrev_reg = 'EAL';
                if($value['id_regional'] == '3')
                    $abrev_reg = 'CHU';
                if($value['id_regional'] == '4')
                    $abrev_reg = 'YCB';
                if($value['id_regional'] == '5')
                    $abrev_reg = 'SCZ';
                if($value['id_regional'] == '6')
                    $abrev_reg = 'PTS';
                if($value['id_regional'] == '7')
                    $abrev_reg = 'CBB';
                if($value['id_regional'] == '8')
                    $abrev_reg = 'ORU';
                if($value['id_regional'] == '9')
                    $abrev_reg = 'TJA';
                if($value['id_regional'] == '10')
                    $abrev_reg = 'RBT';
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,$row + $index, $index + 1);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,$row + $index, $abrev_reg . " " .$value['nro_emision']);
                $fechas = date('d/m/Y',strtotime($value['fecha_sellado']));
                $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,$row + $index, $dateVal);
                // $fechas = date('d/m/Y',strtotime($value['fecha_revision']));
                // $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                // $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,$row + $index, $dateVal);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,$row + $index, $abrev_co . " " . $value['nro_control']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,$row + $index, $value['tipoco']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,$row + $index, $value['sigla']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,$row + $index, $value['codigo']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(7 ,$row + $index, $value['ddjj']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,$row + $index, $value['fob']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(9 ,$row + $index, $value['pneto']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(10 ,$row + $index, $value['factura']);
                $complemento =  $sqlRE->getComplementos($value['id_planilla_ddjj'], $value['id_criterio_origen']); 
                if($complemento[0]["complemento"]<> "undefined" && isset($complemento[0]["complemento"]) ){
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(11 ,$row + $index, $value['criterio']. ' - '.$complemento[0]["complemento"]);
                } else {
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(11 ,$row + $index, $value['criterio']);
                }                
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(12 ,$row + $index, $value['ruex']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(13 ,$row + $index, $value['numero_ddjj']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(14 ,$row + $index, $value['razon_social']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(15 ,$row + $index, $value['categoria_empresa']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(16 ,$row + $index, $value['codigo_pais']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(17 ,$row + $index, $value['pais']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(18 ,$row + $index, $value['certificador']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(19 ,$row + $index, $value['tipoemision']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(20 ,$row + $index, $value['observacion']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(21 ,$row + $index, $value['ciudad']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(22 ,$row + $index, $meses[intval(date('m',strtotime($value['fecha_revision'])))]);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(23 ,$row + $index, date('Y',strtotime($value['fecha_revision'])));
                $index++;
            }
	    $fila = $row + $index -1;
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('C9:C'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('G9:G'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_CONSECUTES);
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('I9:J'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("REPORTE EMISIONES CO");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("REPORTE EMISIONES CO ".$fecha_ini.' al '.$fecha_fin);
            header('Content-Disposition: attachment; filename="reporte_emisiones.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           
        }
        
    }

    public function getDesglose($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional){
	ini_set('memory_limit','2048M');
        $meses = ['','ENERO','FEBRERO','MARZO','ABRIL', 'MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);

        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $regional->setId_regional($id_regional);
        }else{
            $regional->setId_regional($empresa_persona->getId_regional());
        }

        $sqlRE = new SQLReportesEstadisticas();
        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        $list = $sqlRE->getReporteDesglose($regional->getId_regional(), $fecha_ini, $fecha_fin);
        //print("<pre>".print_r($list, true)."</pre>");   die;
        
        $inputFileName = "styles".DS."documentos".DS."reporte_desglose.xlsx";
        $format = 'dd/mm/yyyy';
        try {
            
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
//            print("<pre>".print_r($_REQUEST, true)."</pre>");
            $sheet=0;
            $index = 0;
            $row = 9;
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,6, date('d/m/Y',strtotime($fecha_ini)) . ' - ' .date('d/m/Y',strtotime($fecha_fin)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,6, $regional->getCiudad());
            foreach ($list as $value) {


                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,$row + $index, $index + 1);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,$row + $index, $value['numero_factura']);
                $fechas = date('d/m/Y',strtotime($value['f_ini']));
                $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,$row + $index, $dateVal);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,$row + $index, $value['abreviacion']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,$row + $index, $value['inicio']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,$row + $index, $value['fin']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(6 ,$row + $index, $value['razon_social']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(7 ,$row + $index, $value['ruex']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(8 ,$row + $index, $value['emitido']);
                if($value['fecha_emision']){
                    $fechas = date('d/m/Y',strtotime($value['f_fin']));
                    $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(9 ,$row + $index, $dateVal);
                }

                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(11 ,$row + $index, $value['ciudad']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(12 ,$row + $index, $meses[intval(date('m',strtotime($value['fecha_venta'])))]);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(13 ,$row + $index, date('Y',strtotime($value['fecha_venta'])));
                 $horas_respuesta= $this->getHoras1($value['f_ini'], $value['f_fin']);
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(14 ,$row + $index, round($horas_respuesta));

                $index++;
            }
            $fila = $row + $index -1;
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('C9:C'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('J9:J'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);


            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("REPORTE DESGLOSE");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("REPORTE DESGLOSE ".$fecha_ini.' al '.$fecha_fin);
            header('Content-Disposition: attachment; filename="reporte_desglose.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           
        }
        
    }

    public function getEmpresasNuevas($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional){

        $meses = ['','ENERO','FEBRERO','MARZO','ABRIL', 'MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);

        $regional = new Regional();
        $sqlRegional = new SQLRegional();
        
        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
            $regional->setId_regional($id_regional);
        }else{
            $regional->setId_regional($empresa_persona->getId_regional());
        }

        $sqlRE = new SQLReportesEstadisticas();
        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        $list = $sqlRE->getEmpresasNuevas($regional->getId_regional(), $fecha_ini, $fecha_fin);

        $array = array(
            "2" => 4, "4" => 5, "5" => 6, "7" => 7, "8" => 8, "9" => 9,  "10" => 10,  "11" => 11,  "12" => 12,  "15" => 13,  "16" => 14,
            "18" => 15,  "19" => 16, "20" => 17,  "21" => 18, "22" => 19,  "23" => 20, "24" => 21,  "25" => 22, "26" => 23,  "27" => 24,
        );

        $inputFileName = "styles".DS."documentos".DS."empresas_nuevas.xlsx";
        $format = 'dd/mm/yyyy';
        try {
            
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
           
            $sheet=0;
            $index = 0;
            $row = 8;
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,3, date('d/m/Y',strtotime($fecha_ini)) . ' - ' .date('d/m/Y',strtotime($fecha_fin)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,4, $regional->getCiudad());
            foreach ($list as $value) {

                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(0 ,$row + $index, $index + 1);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(1 ,$row + $index, $value['razon_social']);
                // $fechas = date('d/m/Y',strtotime($value['f_ini']));
                // $dateVal = PHPExcel_Shared_Date::PHPToExcel(DateTime::createFromFormat('d/m/Y', $fechas));
                // $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,$row + $index, $dateVal);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,$row + $index, $value['nit']);
                $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,$row + $index, $value['ruex']);

                $rubros = explode(",", $value['idrubro_exportaciones']);
                
                foreach ($rubros as $key) {
                    $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow($array[$key] ,$row + $index, '1');
                }
                
                
                $index++;
            }
            $fila = $row + $index -1;  
         
            // $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('C9:C'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
            // $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('J9:J'.$fila)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);


            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("REPORTE EMPRESAS");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("REPORTE EMPRESAS ".$fecha_ini.' al '.$fecha_fin);
            header('Content-Disposition: attachment; filename="empresas.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           
        }
        
    }

    public function getExportacionesResumen1($id_empresa_persona, $fecha_ini, $fecha_fin, $id_regional){
        
        $empresa_persona = new EmpresaPersona();
        $sqlEmpresa_persona = new SQLEmpresaPersona();
        $empresa_persona->setId_empresa_persona($id_empresa_persona);
        $empresa_persona = $sqlEmpresa_persona->getEmpresaPersonaPorID($empresa_persona);
        $sqlReportesEstadisticas = new SQLReportesEstadisticas();
        $regional = new Regional();
        $sqlRegional = new SQLRegional();

        if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){

            $regional->setId_regional($id_regional);  
        }else{

            $regional->setId_regional($empresa_persona->getId_regional());
        }


        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        // if($id_regional!=null && $id_regional!='-1' && $id_regional!=''){
        if($fecha_ini!=''){
            $nuecesBrasil = $sqlReportesEstadisticas->fob_peso_cantidad2($fecha_ini, $fecha_fin,'0801210000','0801220000');
            $quinua = $sqlReportesEstadisticas->fob_peso_cantidad2($fecha_ini, $fecha_fin,'1008501000','1008509000');
            $bananas = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'0803');
            $chia = $sqlReportesEstadisticas->fob_peso_cantidad2($fecha_ini, $fecha_fin,'1207991010','1207999910');
            $frijoles = $sqlReportesEstadisticas->fob_peso_cantidad2($fecha_ini, $fecha_fin,'0708200000','07133');
            $manies = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'1202');
            $cafeSinTostar = $sqlReportesEstadisticas->fob_peso_cantidad2($fecha_ini, $fecha_fin,'090111','090112');
            $semillaSesamo = $sqlReportesEstadisticas->fob_peso_cantidad2($fecha_ini, $fecha_fin,'1207401000','1515500000');
            $maiz = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'1005');
            $semillaHabasSoya = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'1201100000');

            $gasNatural = $sqlReportesEstadisticas->fob_peso_cantidad2($fecha_ini, $fecha_fin,'2711110000','2711210000');

            $mineralEstano = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'2609');
            $mineralCinc = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'2608');
            $wolfram = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'2611');
            $mineralAntimonio = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'261710');
            $mineralPlomo = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'2607');
            $mineralOro = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'2616901000');
            $mineralPlata = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'2616100000');
            $boratos = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'2528');
            $mineralCobre = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'2603');
            $piedrasPreciosasSemi = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'7103');
            $sulfatoBarioNatural = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'2511');

            $oroMetalico = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'7108');
            $soyaProductoSoya = $sqlReportesEstadisticas->fob_peso_cantidad3($fecha_ini, $fecha_fin,'1201900000','1302192000','2304000000');
            $estanoMetalico = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'8001');
            $plataMetalica = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'7106');
            $joyeriaOro = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'7113190000');
            $productosRefinacionPetroleo = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'2710');
            $maderasManufacturasMadera = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'44');
            // $joyeriaOroImportado = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'7113');
            $cueroManufacturaCuero = $sqlReportesEstadisticas->fob_peso_cantidad3($fecha_ini, $fecha_fin,'4203','4205','41');
            $girasolProductosGirasol = $sqlReportesEstadisticas->fob_peso_cantidad2($fecha_ini, $fecha_fin,'1206','1512');
            $alcohoEtilico = $sqlReportesEstadisticas->fob_peso_cantidad2($fecha_ini, $fecha_fin,'2207','2208');
            $gasLicuado = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'2711190010');
            $antimonioMetalicoOxidoAntimonio = $sqlReportesEstadisticas->fob_peso_cantidad2($fecha_ini, $fecha_fin,'2617','2825');
            $lechePolvoFluida = $sqlReportesEstadisticas->fob_peso_cantidad2($fecha_ini, $fecha_fin,'0402','0401');
            $carneEspecieBovina = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'0201');
            $palmitos = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'200891');
            $productosGalleteriaPanaderia = $sqlReportesEstadisticas->fob_peso_cantidad2($fecha_ini, $fecha_fin,'1905','190120');
            $cobreRefinado = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'7403');
            $mueblesMadera = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'9403');
            $joyeriaPlata = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'7113110000');
            $acidoOrtoborico = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'2810');
            $preparacionesAlimenticiasAceitesVegetales = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'1517');
            $barrasPlomo = $sqlReportesEstadisticas->fob_peso_cantidad($fecha_ini, $fecha_fin,'78060020');

        }

        $regional = $sqlRegional->getBuscarRegionalPorId($regional);
        $inputFileName = "styles".DS."documentos".DS."export_resumen_1.xlsx";
        try {

            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $row = 8;
            $sheet=0;
            $index = 0;
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,5, date('d/m/Y',strtotime($fecha_ini)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(2 ,6, date('d/m/Y',strtotime($fecha_fin)));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,6, $regional->getCiudad());
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,10, $this->replaceDataQuantity($nuecesBrasil));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,10, $this->replaceDataFoo($nuecesBrasil));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,10, $this->replaceDataWeight($nuecesBrasil));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,11, $this->replaceDataQuantity($quinua));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,11, $this->replaceDataFoo($quinua));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,11, $this->replaceDataWeight($quinua));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,12, $this->replaceDataQuantity($bananas));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,12, $this->replaceDataFoo($bananas));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,12, $this->replaceDataWeight($bananas));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,13, $this->replaceDataQuantity($chia));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,13, $this->replaceDataFoo($chia));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,13, $this->replaceDataWeight($chia));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,14, $this->replaceDataQuantity($frijoles));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,14, $this->replaceDataFoo($frijoles));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,14, $this->replaceDataWeight($frijoles));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,15, $this->replaceDataQuantity($manies));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,15, $this->replaceDataFoo($manies));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,15, $this->replaceDataWeight($manies));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,16, $this->replaceDataQuantity($cafeSinTostar));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,16, $this->replaceDataFoo($cafeSinTostar));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,16, $this->replaceDataWeight($cafeSinTostar));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,17, $this->replaceDataQuantity($semillaSesamo));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,17, $this->replaceDataFoo($semillaSesamo));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,17, $this->replaceDataWeight($semillaSesamo));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,18, $this->replaceDataQuantity($maiz));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,18, $this->replaceDataFoo($maiz));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,18, $this->replaceDataWeight($maiz));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,19, $this->replaceDataQuantity($semillaHabasSoya));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,19, $this->replaceDataFoo($semillaHabasSoya));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,19, $this->replaceDataWeight($semillaHabasSoya));

            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,21, $this->replaceDataQuantity($gasNatural));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,21, $this->replaceDataFoo($gasNatural));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,21, $this->replaceDataWeight($gasNatural));

            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,23, $this->replaceDataQuantity($mineralEstano));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,23, $this->replaceDataFoo($mineralEstano));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,23, $this->replaceDataWeight($mineralEstano));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,24, $this->replaceDataQuantity($mineralCinc));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,24, $this->replaceDataFoo($mineralCinc));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,24, $this->replaceDataWeight($mineralCinc));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,25, $this->replaceDataQuantity($wolfram));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,25, $this->replaceDataFoo($wolfram));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,25, $this->replaceDataWeight($wolfram));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,26, $this->replaceDataQuantity($mineralAntimonio));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,26, $this->replaceDataFoo($mineralAntimonio));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,26, $this->replaceDataWeight($mineralAntimonio));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,27, $this->replaceDataQuantity($mineralPlomo));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,27, $this->replaceDataFoo($mineralPlomo));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,27, $this->replaceDataWeight($mineralPlomo));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,28, $this->replaceDataQuantity($mineralOro));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,28, $this->replaceDataFoo($mineralOro));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,28, $this->replaceDataWeight($mineralOro));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,29, $this->replaceDataQuantity($mineralPlata));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,29, $this->replaceDataFoo($mineralPlata));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,29, $this->replaceDataWeight($mineralPlata));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,30, $this->replaceDataQuantity($boratos));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,30, $this->replaceDataFoo($boratos));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,30, $this->replaceDataWeight($boratos));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,31, $this->replaceDataQuantity($mineralCobre));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,31, $this->replaceDataFoo($mineralCobre));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,31, $this->replaceDataWeight($mineralCobre));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,32, $this->replaceDataQuantity($piedrasPreciosasSemi));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,32, $this->replaceDataFoo($piedrasPreciosasSemi));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,32, $this->replaceDataWeight($piedrasPreciosasSemi));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,33, $this->replaceDataQuantity($sulfatoBarioNatural));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,33, $this->replaceDataFoo($sulfatoBarioNatural));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,33, $this->replaceDataWeight($sulfatoBarioNatural));

            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,35, $this->replaceDataQuantity($oroMetalico));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,35, $this->replaceDataFoo($oroMetalico));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,35, $this->replaceDataWeight($oroMetalico));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,36, $this->replaceDataQuantity($soyaProductoSoya));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,36, $this->replaceDataFoo($soyaProductoSoya));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,36, $this->replaceDataWeight($soyaProductoSoya));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,37, $this->replaceDataQuantity($estanoMetalico));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,37, $this->replaceDataFoo($estanoMetalico));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,37, $this->replaceDataWeight($estanoMetalico));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,38, $this->replaceDataQuantity($plataMetalica));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,38, $this->replaceDataFoo($plataMetalica));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,38, $this->replaceDataWeight($plataMetalica));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,39, $this->replaceDataQuantity($joyeriaOro));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,39, $this->replaceDataFoo($joyeriaOro));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,39, $this->replaceDataWeight($joyeriaOro));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,40, $this->replaceDataQuantity($productosRefinacionPetroleo));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,40, $this->replaceDataFoo($productosRefinacionPetroleo));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,40, $this->replaceDataWeight($productosRefinacionPetroleo));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,41, $this->replaceDataQuantity($maderasManufacturasMadera));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,41, $this->replaceDataFoo($maderasManufacturasMadera));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,41, $this->replaceDataWeight($maderasManufacturasMadera));
            // $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,42, $this->replaceDataQuantity($joyeriaOroImportado));
            // $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,42, $this->replaceDataFoo($joyeriaOroImportado));
            // $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,42, $this->replaceDataWeight($joyeriaOroImportado));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,43, $this->replaceDataQuantity($cueroManufacturaCuero));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,43, $this->replaceDataFoo($cueroManufacturaCuero));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,43, $this->replaceDataWeight($cueroManufacturaCuero));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,44, $this->replaceDataQuantity($girasolProductosGirasol));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,44, $this->replaceDataFoo($girasolProductosGirasol));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,44, $this->replaceDataWeight($girasolProductosGirasol));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,45, $this->replaceDataQuantity($alcohoEtilico));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,45, $this->replaceDataFoo($alcohoEtilico));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,45, $this->replaceDataWeight($alcohoEtilico));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,46, $this->replaceDataQuantity($gasLicuado));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,46, $this->replaceDataFoo($gasLicuado));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,46, $this->replaceDataWeight($gasLicuado));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,47, $this->replaceDataQuantity($antimonioMetalicoOxidoAntimonio));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,47, $this->replaceDataFoo($antimonioMetalicoOxidoAntimonio));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,47, $this->replaceDataWeight($antimonioMetalicoOxidoAntimonio));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,48, $this->replaceDataQuantity($lechePolvoFluida));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,48, $this->replaceDataFoo($lechePolvoFluida));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,48, $this->replaceDataWeight($lechePolvoFluida));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,49, $this->replaceDataQuantity($carneEspecieBovina));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,49, $this->replaceDataFoo($carneEspecieBovina));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,49, $this->replaceDataWeight($carneEspecieBovina));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,50, $this->replaceDataQuantity($palmitos));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,50, $this->replaceDataFoo($palmitos));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,50, $this->replaceDataWeight($palmitos));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,51, $this->replaceDataQuantity($productosGalleteriaPanaderia));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,51, $this->replaceDataFoo($productosGalleteriaPanaderia));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,51, $this->replaceDataWeight($productosGalleteriaPanaderia));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,52, $this->replaceDataQuantity($cobreRefinado));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,52, $this->replaceDataFoo($cobreRefinado));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,52, $this->replaceDataWeight($cobreRefinado));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,53, $this->replaceDataQuantity($mueblesMadera));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,53, $this->replaceDataFoo($mueblesMadera));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,53, $this->replaceDataWeight($mueblesMadera));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,54, $this->replaceDataQuantity($joyeriaPlata));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,54, $this->replaceDataFoo($joyeriaPlata));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,54, $this->replaceDataWeight($joyeriaPlata));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,55, $this->replaceDataQuantity($acidoOrtoborico));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,55, $this->replaceDataFoo($acidoOrtoborico));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,55, $this->replaceDataWeight($acidoOrtoborico));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,56, $this->replaceDataQuantity($preparacionesAlimenticiasAceitesVegetales));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,56, $this->replaceDataFoo($preparacionesAlimenticiasAceitesVegetales));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,56, $this->replaceDataWeight($preparacionesAlimenticiasAceitesVegetales));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(3 ,57, $this->replaceDataQuantity($barrasPlomo));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(4 ,57, $this->replaceDataFoo($barrasPlomo));
            $objPHPExcel->setActiveSheetIndex($sheet)->setCellValueByColumnAndRow(5 ,57, $this->replaceDataWeight($barrasPlomo));


              
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('D10:D65')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED3);
            $objPHPExcel->setActiveSheetIndex($sheet)->getStyle('E10:F65')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getProperties()->setCreator($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setLastModifiedBy($_SESSION['nombrecompleto']);
            $objPHPExcel->getProperties()->setTitle("EXPORTACIONES RESUMEN");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("EXPORTACIONES RESUMEN".$fecha_ini.' al '.$fecha_fin);
            header('Content-Disposition: attachment; filename="exportaciones_resumen.xls"');
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel,'Excel2007');
            ob_end_clean();
            $objWriter->save('php://output');
        } catch(Exception $e) {
           echo 'Error: '.$e;
        }
    }
    

    public function cargarDocumento(){ 
        $inputFileName = "styles".DS."documentos".DS."ddjj_4.xlsx";
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            
            for($index=1; $index<=348; $index++){
                $planillaDDJJ = new PlanillaDDJJ();
                $sqlPlanillaDDJJ = new SQLPlanillaDDJJ();
                
                $c1 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $index)->getFormattedValue();
                $c2 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $index)->getFormattedValue();
                $c3 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2, $index)->getFormattedValue();
                $c4 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3, $index)->getFormattedValue();
                $c5 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4, $index)->getFormattedValue();
                $c6 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5, $index)->getFormattedValue();
                $c7 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $index)->getFormattedValue();
                $c8 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7, $index)->getFormattedValue();
                
                $c9 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(8, $index)->getFormattedValue();
                $c10 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(9, $index)->getFormattedValue();
                $c11 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(10, $index)->getFormattedValue();
                $c12 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(11, $index)->getFormattedValue();
                $c13 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(12, $index)->getFormattedValue();
                $c14 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(13, $index)->getFormattedValue();
                $c15 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(14, $index)->getFormattedValue();
                $c16 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(15, $index)->getFormattedValue();
                $c17 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(16, $index)->getFormattedValue();
                $c18 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(17, $index)->getFormattedValue();
                $c19 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(18, $index)->getFormattedValue();
                $c20 = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(19, $index)->getFormattedValue();
                /*******************planilla ddjj acuerdo***********************/
//                $pddjj_a = new PlanillaDDJJAcuerdo();
//                $sqlPddjj_a = new SQLPlanillaDDJJAcuerdo();
//                if($c2!='')
//                    $pddjj_a->setId_arancel($c2);
//                if($c3!='')
//                    $pddjj_a->setId_detalle_arancel($c3);
//                if($c4!='')
//                    $pddjj_a->setId_acuerdo($c4);
//                if($c5!='')
//                    $pddjj_a->setId_criterio($c5);
//                if($c6!='')
//                    $pddjj_a->setComplemento($c6);
//                if($c7!='')
//                    $pddjj_a->setObservacion($c7);
//                if($c8!='')
//                    $pddjj_a->setId_planilla_ddjj($c8);
//                print("<pre>".print_r($c1 . ' - '. $c2. ' - '. $c3. ' - '. $c4. ' - '. $c5. ' - '. $c6. ' - '. $c7 . ' - '. $c8 ,true).'</pre>');
//                $sqlPddjj_a->save($pddjj_a);
//                /**************************************************************/
//                $planillaDDJJ->setId_planilla_ddjj($c1);
                if($c2!='')
                    $planillaDDJJ->setNumero_ddjj($c2);
                if($c3!='')
                    $planillaDDJJ->setNumero_folder($c3);
                if($c4!='')
                    $planillaDDJJ->setId_empresa($c4);
                if($c5!='')
                    $planillaDDJJ->setId_asistente_registro($c5);
                
                if($c6!=''){
                    $fecha_registro = explode("-", $c6);
                    $planillaDDJJ->setFecha_registro('20'.$fecha_registro[2].'-'.$fecha_registro[0].'-'.$fecha_registro[1] );
                }
                if($c7!=''){
                    $fecha_vencimiento = explode("-", $c7);
                    $planillaDDJJ->setFecha_vencimiento( '20'.$fecha_vencimiento[2].'-'.$fecha_vencimiento[0].'-'.$fecha_vencimiento[1] );
                }

                if($c8!=''){
                    $fecha_entrega = explode("-", $c8);
                    $planillaDDJJ->setFecha_entrega( '20'.$fecha_entrega[2].'-'.$fecha_entrega[0].'-'.$fecha_entrega[1] );
                }
                if($c9!='')
                    $planillaDDJJ->setId_estado($c9);
                if($c10!='')
                    $planillaDDJJ->setId_nandina($c10);
                if($c11!='')
                    $planillaDDJJ->setDescripcion($c11);
                if($c12!='')
                    $planillaDDJJ->setId_tipo($c12);
                if($c13!='')
                    $planillaDDJJ->setId_regional($c13);
                if($c14!='')
                    $planillaDDJJ->setObservacion($c14);
                
                if($c15!=''){
                    $fecha_baja = explode("-", $c15);
                    $planillaDDJJ->setFecha_baja('20'.$fecha_baja[2].'-'.$fecha_baja[0].'-'.$fecha_baja[1]);
                }
                if($c16!=''){
                    $planillaDDJJ->setId_actualizacion_ddjj($c16);
                }
                if($c17!=''){
                    $fecha_revision = explode("-", $c17);
                    $planillaDDJJ->setFecha_revision($c17!=''? '20'.$fecha_revision[2].'-'.$fecha_revision[0].'-'.$fecha_revision[1] : '');
                }
                if($c18!='')
                    $planillaDDJJ->setId_asistente_revision($c18);
                if($c19!='')
                    $planillaDDJJ->setId_asistente_entrega($c19);
                if($c20!='')
                    $planillaDDJJ->setId_tipo_planilla($c20);
                
                print("<pre>".print_r($c1 . ' - '. $c2. ' - '. $c3. ' - '. $c4. ' - '. $c5. ' - '. $c6. ' - '. $c7 . ' - '. $c8. ' - '. $c9. ' - '. $c10. ' - '. $c11. ' - '. $c12. ' - '. $c13 . ' - '. $c14. ' - '. $c15. ' - '. $c16. ' - '. $c17. ' - '. $c18. ' - '. $c19. ' - '. $c20 ,true).'</pre>');
//                $sqlPlanillaDDJJ->save($planillaDDJJ);
            }
           
        } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
    }
    
//    public function cargarDocumento(){ 
//        $inputFileName = "styles".DS."documentos".DS."2_arancel2017.xlsx";
//        try {
//            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
//            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
//            $objPHPExcel = $objReader->load($inputFileName);
//            
//            for($index=1; $index<=5393; $index++){
//               
//                $codigo = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $index)->getFormattedValue();
//                $descripcion = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $index)->getFormattedValue();
//                $pda = new DetalleArancel();
//                $sql_pda = new SQLDetalleArancel();
//                $pda->setId_detalle_arancel($index + 15942);
//                $pda->setId_Arancel(1);
//                $pda->setCodigo(str_replace(".","",$codigo));
//                $pda->setDescripcion($descripcion);
//                $pda->setActivo(true);
//                //$sql_pda->save_consulta($pda);
//                //print("<pre>".print_r( $codigo. " - " . str_replace("'","´",$descripcion), true)."</pre>");
//            }
//           
//        } catch(Exception $e) {
//                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
//        }
//    }
    public function cargarDDJJ(){
        /*$inputFileName = "styles".DS."documentos".DS."consolidado1.xlsx";
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            print($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, 0)->getFormattedValue());
            print($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, 1)->getFormattedValue());
            print($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, 2)->getFormattedValue());
            print($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, 3)->getFormattedValue());
            print($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, 4)->getFormattedValue());
            print($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, 5)->getFormattedValue());
            print($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, 6)->getFormattedValue());
        } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }*/
    }
    public function getTiempo($fecha_ini, $fecha_fin){
//        $year1 =  date("Y", strtotime($fecha_ini));
//        $year2 =  date("Y", strtotime($fecha_fin));
//        $month1 =  date("m", strtotime($fecha_ini));
//        $month2 =  date("m", strtotime($fecha_fin));
        $day1 =  date("d", strtotime($fecha_ini));
        $day2 =  date("d", strtotime($fecha_fin));
        $hour1 = date("H", strtotime($fecha_ini));
        $hour2 = date("H", strtotime($fecha_fin));
        $min1 = date("i", strtotime($fecha_ini));
        $min2 = date("i", strtotime($fecha_fin));
        $seg1 = date("i", strtotime($fecha_ini));
        $seg2 = date("i", strtotime($fecha_fin));
       
        /*$total = (( $year2 - $year1 ) * 365 * 30 * 24 * 60 +  
                ( $month2 - $month1 ) * 30 * 24 * 60 +  
                ( $hour2 - $hour1 ) * 60 + 
                ( $min2 - $min1 ))/60;*/
        
        $total = ($day2 - $day1) * 24 * 60 + ($hour2 - $hour1) * 60 + ($min2 - $min1) + ($seg2 - $seg1) * 0.1;
        return $total;
    }

    public function getWeke($fecha_ini, $fecha_fin){

        $start = new DateTime($fecha_ini);
        $end = new DateTime($fecha_fin);
        
        $days = $start->diff($end, true)->days;
        $domingos = intval($days / 7) + ($start->format('N') + $days % 7 >= 7);

        return $domingos;
    }

    public function getHoras($fecha_ini, $fecha_fin){
        $mes1 = date('m',strtotime($fecha_ini));
        $mes2 = date('m',strtotime($fecha_fin));
	$day1 =  date("d", strtotime($fecha_ini));
        $day2 =  date("d", strtotime($fecha_fin));
        $hour1 = date("H", strtotime($fecha_ini));
        $hour2 = date("H", strtotime($fecha_fin));
        $min1 = date("i", strtotime($fecha_ini));
        $min2 = date("i", strtotime($fecha_fin));
        $seg1 = date("i", strtotime($fecha_ini));
        $seg2 = date("i", strtotime($fecha_fin));
        
        // $total = ($day2 - $day1) * 24 * 60 + ($hour2 - $hour1) * 60 + ($min2 - $min1) + ($seg2 - $seg1) * 0.1;
        $total = ($day2 - $day1) * 24 + ($hour2 - $hour1) + ($min2 - $min1)/60 + ($seg2 - $seg1)/ 3600 ;
	if($mes2 != $mes1){
            $diferencia = strtotime($fecha_fin) - strtotime($fecha_ini);
            $total = $diferencia / 3600;
        }
        return $total;
    }

    public function getHoras1($fecha_ini, $fecha_fin){
        if($fecha_fin){
            $diferencia = strtotime($fecha_fin) - strtotime($fecha_ini);

        } else {
            $hoy = date('d/m/Y');
            $diferencia = strtotime($hoy) -strtotime($fecha_ini);
        }
        
        $total = $diferencia / 86400;
        return $total;
    }

    public function pruebaOlvidePassw(){
       /* $correo = 'marcelo.ivo.sanabria.ribera@gmail.com';
        $numero_documento = '6346800';
        
        $persona = new Persona();
        $sql_persona = new SQLPersona();
        $persona->setEmail($correo);
        $persona->setNumero_documento($numero_documento);
        $lista = $sql_persona->getPersona_NumeroDocumento_Correo($persona);
      
        if(count($lista)>0){
            $usuario = new Usuario();
            $sql_usuario = new SQLUsuario();
            $usuario->setId_persona($lista[0]->getId_persona());
            $users = $sql_usuario->getListaDatosUsuarioPorIdPersona($usuario);
            if(count($users)>0){
                
                $clave=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
                
                if(AdmCorreo::enviarCorreo($lista[0]->getEmail(),$lista[0]->getNombres(),$users[0]->getUsuario(),$clave,'',37)){
                    $users[0]->setClave($clave);
                    if($sql_usuario->setGuardarUsuario($users[0])){
                        echo '[{"suceso":"1","causa":"Contraseña Reestablecida, Revise su correo por favor"]';
                    }else{
                        echo '[{"suceso":"0","causa":"Error, Intentelo mas tárde"]';
                    }
                }else{
                    echo '[{"suceso":"0","causa":"Error, no se pudo enviar la contraseña"]';
                }
            }else{
                echo '[{"suceso":"0","causa":"Persona sin usuario, consulte a su administrador"]';
            }
        }else{
            echo '[{"suceso":"0","causa":"Correo y Numero de Documento Incorrectos"]';
        }*/

    }
}
