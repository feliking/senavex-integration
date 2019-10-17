<?php
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');

include_once(PATH_MODELO . DS . 'SQLDepartamento.php');
include_once(PATH_MODELO . DS . 'SQLMunicipio.php');
include_once(PATH_MODELO . DS . 'SQLCiudad.php');

include_once(PATH_MODELO . DS . 'SQLDireccion.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipo.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoCalle.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoZona.php');
include_once(PATH_MODELO . DS . 'SQLDireccionUbicacionEdificio.php');


include_once(PATH_TABLA . DS . 'Departamento.php');
include_once(PATH_TABLA . DS . 'Municipio.php');
include_once(PATH_TABLA . DS . 'Ciudad.php');
include_once(PATH_TABLA . DS . 'Fabrica.php');

include_once(PATH_TABLA . DS . 'Direccion.php');
include_once(PATH_TABLA . DS . 'DireccionTipo.php');
include_once(PATH_TABLA . DS . 'DireccionTipoCalle.php');
include_once(PATH_TABLA . DS . 'DireccionTipoZona.php');
include_once(PATH_TABLA . DS . 'DireccionUbicacionEdificio.php');


include_once( PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');

class AdmDireccion extends Principal {
    public function AdmDireccion() 
    {
      $vista = Principal::getVistaInstance();

     
      //--------------------esto es para la impresion del ruex----------------------------------------------------
    
      
        if($_REQUEST['tarea']=='save_data_direccion'){
            echo AdmDireccion::guardarDireccion($_REQUEST);
            exit;
        }
      //-------------added for implementation in ddjj
        if($_REQUEST['tarea']=='save_data_direccion_new'){
          echo AdmDireccion::guardarDireccionNueva($_REQUEST);
          exit;
        }
        if($_REQUEST['tarea']=='get_data_direccion'){
          $direccion =  AdmDireccion::obtenerDireccion($_REQUEST['id_direccion']);
          echo '['.json_encode($direccion).']';
          exit;
        }
        if($_REQUEST['tarea']=='list_direccion_tipo'){
            $direccionTipo = new DireccionTipo();
            $sqldireccionTipo = new SQLDireccionTipo();
            $resultado = $sqldireccionTipo->getListDireccionTipo($direccionTipo);

            $strJson = '';
            echo '[';
            foreach ($resultado as $datos){
                $strJson .= '{"id":"' . $datos->getId_direccion_tipo() .
                        '","descripcion":"'.$datos->getDescripcion().'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='list_direccion_tipo_calle'){
            $direccionTipoCalle = new DireccionTipoCalle();
            $sqldireccionTipoCalle = new SQLDireccionTipoCalle();
            $resultado = $sqldireccionTipoCalle->getListDireccionTipoCalle($direccionTipoCalle);

            $strJson = '';
            echo '[';
            foreach ($resultado as $datos){
                $strJson .= '{"id":"' . $datos->getId_direccion_tipo_calle() .
                        '","descripcion":"'.$datos->getDescripcion().'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='list_direccion_tipo_zona'){
            $direccionTipoZona = new DireccionTipoZona();
            $sqldireccionTipoZona = new SQLDireccionTipoZona();
            $resultado = $sqldireccionTipoZona->getListDireccionTipoZona($direccionTipoZona);

            $strJson = '';
            echo '[';
            foreach ($resultado as $datos){
                $strJson .= '{"id":"' . $datos->getId_direccion_tipo_zona() .
                        '","descripcion":"'.$datos->getDescripcion().'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='list_direccion_ubicacion_edificio'){
            $direccionUbicacionEdificio = new DireccionUbicacionEdificio();
            $sqlDireccionUbicacionEdificio = new SQLDireccionUbicacionEdificio();
            $resultado = $sqlDireccionUbicacionEdificio->getListDireccionUbicacionEdificio($direccionUbicacionEdificio);

            $strJson = '';
            echo '[';
            $strJson .= '{"id":"-1","descripcion":"NINGUNO"},';
            foreach ($resultado as $datos){
                $strJson .= '{"id":"' . $datos->getId_direccion_ubicacion_edificio() .
                        '","descripcion":"'.$datos->getDescripcion().'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='list_departamentos'){
            $departamento = new Departamento();
            $sqlDepartamento = new SQLDepartamento();
            $resultado = $sqlDepartamento->getListarDepartamento($departamento);

            $strJson = '';
            echo '[';
            foreach ($resultado as $datos){
                $strJson .= '{"id":"' . $datos->getId_departamento() .
                        '","descripcion":"'.$datos->getNombre().'"},';
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='listarMunicipios')
        {
            $municipio = new Municipio();
            $sqlMunicipio = new SQLMunicipio();
            $municipio->setId_departamento($_REQUEST['id_departamento']);

            $lista = $sqlMunicipio->getListarMunicipiosPorDepartamento($municipio);
            $selected = ',"selected":true';
            $strJson = '';
            echo '[';
            foreach ($lista as $datos){
                $strJson .= '{"id_municipio":"' . $datos->getId_municipio().
                        '","descripcion":"' . $datos->getDescripcion() . '"},';
                $selected='';
            }

            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        if($_REQUEST['tarea']=='listarciudades')
        {
            $ciudad = new Ciudad();
            $sqlCiudad = new SQLCiudad();
            $ciudad->setId_municipio($_REQUEST['id_municipio']);

            $lista = $sqlCiudad->getListarCiudadesPorMunicipio($ciudad);
            $selected = ',"selected":true';
            $strJson = '';
            echo '[';
            $strJson.='{"id_ciudad":"0","descripcion":"NINGUNO"},';
            foreach ($lista as $datos){
                $strJson .= '{"id_ciudad":"' . $datos->getId_ciudad().
                        '","descripcion":"' . $datos->getDescripcion() . '"},';
                $selected='';
            }

            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        
        if($_REQUEST['tarea']=='show_direccion'){
            $vista->assign('de_id',3);
            $vista->assign('tipo',3);
            $vista->display("admDireccion/Direccion_Edit.tpl");
        }
        
        if($_REQUEST['tarea']=='edit_direccion'){
            $vista->assign('ds_id',333);
            $vista->assign('tipo',3);
            $vista->display("admDireccion/Direccion_Show.tpl");
        }
    }

    public static function obtenerDireccion($id_direccion){
        $direccion = new Direccion();
        $sqlDireccion = new SQLDireccion();
        $direccion->setId_direccion($id_direccion);
        $direccion = $sqlDireccion->getDireccionByID($direccion);
        if ($direccion != null){
            $departamento = new Departamento();
            $sqlDepartamento = new SQLDepartamento();
            $departamento->setId_departamento($direccion->getId_departamento());
            $departamento=$sqlDepartamento->getBuscarDepartamentoPorId($departamento);

            $municipio = new Municipio();
            $sqlMunicipio = new SQLMunicipio();
            $municipio->setId_municipio($direccion->getId_municipio());
            $municipio=$sqlMunicipio->getMunicipioPorID($municipio);

            $tipo_calle = new DireccionTipoCalle();
            $sqltipo_calle = new SQLDireccionTipoCalle();
            $tipo_calle->setId_direccion_tipo_calle($direccion->getId_direccion_tipo_calle());
            $tipo_calle = $sqltipo_calle->getDireccionTipoCalleByID($tipo_calle);

            $tipo_zona = new DireccionTipoZona();
            $sqltipo_zona = new SQLDireccionTipoZona();
            $tipo_zona->setId_direccion_tipo_zona($direccion->getId_direccion_tipo_zona());
            $tipo_zona = $sqltipo_zona->getDireccionTipoZonaByID($tipo_zona);


            $tipo_dpto = new DireccionUbicacionEdificio();
            $sqltipo_dpto = new SQLDireccionUbicacionEdificio();
            $tipo_dpto->setId_direccion_ubicacion_edificio($direccion->getId_direccion_tipo_ubicacion_edificio());
            $tipo_dpto=$sqltipo_dpto->getDireccionUbicacionEdificioByID($tipo_dpto);

            return Array(
              "id"=>$direccion->getId_direccion(),
              "tipo_calle"=>$tipo_calle->getDescripcion(),
              "nombre_tipo_calle"=>$direccion->getNombre_direccion_tipo_calle(),
              "numero_domicilio"=>($direccion->getNumero_domicilio()==''? '':$direccion->getNumero_domicilio()),
              "nombre_edificio"=>$direccion->getNombre_edificio(),
              "piso"=>$direccion->getPiso(),
              "tipo_dpto"=>($direccion->getId_direccion_tipo_ubicacion_edificio()!=''? $tipo_dpto->getDescripcion():''),
              "numero_tipo_dpto"=>$direccion->getNumero_dpto_oficina(),
              "tipo_zona"=>$tipo_zona->getDescripcion(),
              "nombre_tipo_zona"=>$direccion->getNombre_zona_barrio(),
              "id_dpto"=>$departamento->getId_departamento(),
              "dpto"=>$departamento->getNombre(),
              "id_municipio"=>$municipio->getId_municipio(),
              "municipio"=>$municipio->getDescripcion(),
              "tfijo"=>$direccion->getTelefono_fijo(),
              "tcel"=>$direccion->getTelefono_celular(),
              "tfax"=>$direccion->getTelefono_fax(),
              "email"=>$direccion->getEmail(),
              "dir_descript"=>$direccion->getDireccion_descriptiva(),
            );

        }else{
            return Array();
        }
    }

    public static function obtenerDireccionTpl($id_direccion){
      $vista = Principal::getVistaInstance();
      $direccion =  AdmDireccion::obtenerDireccion($id_direccion);
      $vista->assign('dir',$direccion);
      return $vista->fetch('admDireccion/direccion.tpl');
    }

    public static function guardarDireccion($_request){
//print('<pre>'.print_r($_request,true).'</pre>');
        $list = array_keys($_request);
        foreach ($list as $value) {
             $val = explode("_", $value);
             if($val[0]=="de" && $val[1]=="id"){
                 $de_id = $_request[$val[0].'_'.$val[1].'_'.$val[2]];
                 break;
             }
        }

        $direccion = new Direccion();
        $sqlDireccion = new SQLDireccion();
        $direccion->setId_direccion($_request['direccion_id_'+$de_id]);
        $direccion=$sqlDireccion->getDireccionByID($direccion);
        
        if($direccion==null || empty($direccion)){
            $direccion=new Direccion();
            $direccion->setId_direccion_tipo($_request['direcciontipo_'.$de_id]);
        }

        $direccion->setId_direccion_tipo_calle($_request['ed_tc_'.$de_id]);
        $direccion->setNombre_direccion_tipo_calle($_request['ed_ntc_'.$de_id]);
        $direccion->setId_direccion_tipo_zona($_request['ed_tz_'.$de_id]);
        $direccion->setNombre_zona_barrio($_request['ed_ntz_'.$de_id]);
        $direccion->setId_departamento($_request['ed_dpto_'.$de_id]);
        $direccion->setId_municipio($_request['ed_municipio_'.$de_id]);
        
        if($_request['ed_numero_domicilio_'.$de_id]!='') $direccion->setNumero_domicilio(strtoupper($_request['ed_numero_domicilio_'.$de_id]) == 'S/N'? '0':$_request['ed_numero_domicilio_'.$de_id]);
        if($_request['ed_nombre_edificio_'.$de_id]!='') $direccion->setNombre_edificio($_request['ed_nombre_edificio_'.$de_id]);
        
        if($_request['ed_piso_'.$de_id]!='') $direccion->setPiso( strtoupper($_request['ed_piso_'.$de_id]) == 'S/N'? '0':$_request['ed_piso_'.$de_id]);
        if($_request['ed_td_'.$de_id]!='' && $_request['ed_td_'.$de_id]!='-1') $direccion->setId_direccion_tipo_ubicacion_edificio($_request['ed_td_'.$de_id]);        
        if($_request['ed_ntd_'.$de_id]!='') $direccion->setNumero_dpto_oficina(strtoupper($_request['ed_ntd_'.$de_id]) == 'S/N'? '0':$_request['ed_ntd_'.$de_id]);

        if($_request['ed_tfijo_'.$de_id]!='') $direccion->setTelefono_fijo($_request['ed_tfijo_'.$de_id]);
        if($_request['ed_tcel_'.$de_id]!='') $direccion->setTelefono_celular($_request['ed_tcel_'.$de_id]);
        if($_request['ed_tfax_'.$de_id]!='') $direccion->setTelefono_fax($_request['ed_tfax_'.$de_id]);
        if($_request['ed_dir_desc_'.$de_id]!='') $direccion->setDireccion_descriptiva($_request['ed_dir_desc_'.$de_id]);
        
        try{
            $sqlDireccion->save($direccion);
            $resultado = $direccion->getId_direccion();
        } catch (Exception $ex) {

            $resultado = -1;
        }
        return $resultado;
    }
  //added for implementation in ddjj
  public static function guardarDireccionNueva($_request){
    $fabrica = new Fabrica();
//    $sqlFabrica = new SQLFabrica();
    $list = array_keys($_request);
    foreach ($list as $value) {
      $val = explode("_", $value);
      if($val[0]=="de" && $val[1]=="id"){
        $de_id = $_request[$val[0].'_'.$val[1].'_'.$val[2]];
        break;
      }
    }
    $direccion = new Direccion();
    $sqlDireccion = new SQLDireccion();

    if($direccion==null || empty($direccion)){
      $direccion=new Direccion();
      $direccion->setId_direccion_tipo($_request['direcciontipo_'.$de_id]);
    }

    $direccion->setId_direccion_tipo(1);
    $direccion->setId_direccion_tipo_calle($_request['ed_tc_'.$de_id]);
    $direccion->setNombre_direccion_tipo_calle($_request['ed_ntc_'.$de_id]);
    $direccion->setId_direccion_tipo_zona($_request['ed_tz_'.$de_id]);
    $direccion->setNombre_zona_barrio($_request['ed_ntz_'.$de_id]);
    $direccion->setId_departamento($_request['ed_dpto_'.$de_id]);
    $direccion->setId_municipio($_request['ed_municipio_'.$de_id]);




    if($_request['ed_numero_domicilio_'.$de_id]!='') $direccion->setNumero_domicilio($_request['ed_numero_domicilio_'.$de_id]);
    if($_request['ed_nombre_edificio_'.$de_id]!='') $direccion->setNombre_edificio($_request['ed_nombre_edificio_'.$de_id]);
    if($_request['ed_piso_'.$de_id]!='') $direccion->setPiso($_request['ed_piso_'.$de_id]);
    if($_request['ed_td_'.$de_id]!='' && $_request['ed_td_'.$de_id]!='-1') $direccion->setId_direccion_tipo_ubicacion_edificio($_request['ed_td_'.$de_id]);
    if($_request['ed_ntd_'.$de_id]!='') $direccion->setNumero_dpto_oficina($_request['ed_ntd_'.$de_id]);

    if($_request['ed_tfijo_'.$de_id]!='') $direccion->setTelefono_fijo($_request['ed_tfijo_'.$de_id]);
    if($_request['ed_tcel_'.$de_id]!='') $direccion->setTelefono_celular($_request['ed_tcel_'.$de_id]);
    if($_request['ed_tfax_'.$de_id]!='') $direccion->setTelefono_fax($_request['ed_tfax_'.$de_id]);
    if($_request['ed_numero_domicilio_'.$de_id]!='') $direccion->setDireccion_descriptiva($_request['ed_dir_desc_'.$de_id]);
//        print('<pre>'.print_r($direccion,true).'</pre>');
    try{
      $sqlDireccion->save($direccion);
      $resultado = $direccion->getId_direccion();
      $fabrica->setId_empresa($_SESSION['id_empresa']);
      $fabrica->setPersona_Contacto($_REQUEST['ed_contacto_'.$de_id]);
      $fabrica->setId_direccion($resultado);
      $fabrica->save();
    } catch (Exception $ex) {
      $resultado=$ex;
    }
    return $resultado;
  }
}