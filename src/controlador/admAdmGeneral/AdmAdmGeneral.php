<?php
/**
/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once( PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'ws_generales.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLDireccion.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLBitacora_ws.php');
include_once(PATH_MODELO . DS . 'SQLUsuario.php');

include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'Direccion.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'Bitacora_ws.php');
include_once(PATH_TABLA . DS . 'Usuario.php');

class AdmAdmGeneral extends Principal {
      
    public function AdmAdmGeneral() {

        $vista = Principal::getVistaInstance();
                
        if($_REQUEST['tarea']=='ver_operaciones'){               
            //$vista->assign('empresas_reg',json_encode($array));
            $vista->display("admAdmGeneral/EnvioBloque.tpl");
            exit;
        }
        if($_REQUEST['tarea']=='encuesta_activa'){   
            if($_SESSION['id_perfil']==23){
                echo '0';  
                exit;
            }
    
            $empresa=new Empresa();
            $sqlEmpresa=new SQLEmpresa();
            $empresa->setId_empresa($_SESSION['id_empresa']);
            $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
            $usuario = new Usuario();
            $sqlUsuario=new SQLUsuario();
            if ($empresa->getEncuesta()=='0' && ($empresa->getEstado()==2 || $empresa->getEstado()==4 || $empresa->getEstado()==13 || $empresa->getEstado()==6 || $empresa->getEstado()==14))
            {
                
                $usuario->setId_usuario($_SESSION['id_usuario']);
                $usuario=$sqlUsuario->getDatosUsuarioPorId($usuario);
                //print_r($usuario);
                if ($usuario->getId_tipo_usuario()==2)
                {
                    echo '1';
                }
                else 
                {
                    echo '0';
                }
            }    
            else
            {
                echo '0';
            }
            exit;
        }
        
        if($_REQUEST['tarea']=='envia_bloque'){               
            $empresa_reg=new Empresa();
            $sqlEmpresa=new SQLEmpresa();
            $empresa_registro=$sqlEmpresa->getListarEmpresaActiva_VCIE($empresa_reg);
            echo 'entra';
            foreach ($empresa_registro as $value) {
                
                  //$var = ws_generales::EnvioEmpresaVicem($value->Id_empresa);
                  $var= $this->EnvioEmpresaVicem($value->Id_empresa);  
                  print_r($var);
            }
            exit;
        }
       
    }
     public function EnvioEmpresaVicem($id_empresa)
    {
       //echo $id_empresa;
        //buscamos emmpresa
        $empresa = new Empresa();
        $sqlEmpresa = new SQLEmpresa();
        $empresa->setId_empresa($id_empresa);      
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
        
        //buscamos direccion
        $direccion = new Direccion();
        $sqlDireccion = new SQLDireccion();
        $direccion->setId_direccion($empresa->getDireccion());
        $direccion = $sqlDireccion->getDireccionByID($direccion);
        
        //buscamos Representante legal
        
        $rep_legal =new Persona();
        $sqlPersona = new SQLPersona();
        $rep_legal->setId_persona($empresa->getId_representante_legal());
        $rep_legal = $sqlPersona->getDatosPersonaPorId($rep_legal);
            
        //buscamos emmpresa
        $rep_legal_cargo = new EmpresaPersona();
        $sqlEp = new SQLEmpresaPersona();
        $rep_legal_cargo->setId_Empresa($id_empresa);
        $rep_legal_cargo->setId_Persona($empresa->getId_representante_legal());
        $rep_legal_cargo = $sqlEp->getEmpresaPorPersonaEmpresa($rep_legal_cargo);
        
        if ($empresa->getOea() != null)
        {
            $empresa->setOea("1");      
        }
       
        if($rep_legal_cargo != null)
        {
            $rep_legal_cargo_nombre=$rep_legal_cargo->getCargo();
        }
        else
        {
            $rep_legal_cargo_nombre='';
        }
        
        if ($direccion != null)
        {
            
         $datos=array(
                    "empresa"=>array(
                            "id_empresa"=>''.$empresa->getId_empresa().'',
                            "ruex"=>''.$empresa->getRuex().'',
                            "nit"=>''.$empresa->getNit().'',
                            "razon_social"=>''.utf8_encode($empresa->getRazon_Social()).'',
                            "nom_comercial"=>''.utf8_encode($empresa->getNombre_Comercial()).'',
                            "desc_empresa"=>''.utf8_encode($empresa->getDescripcion_empresa()).'',
                            "fundempresa"=>''.utf8_encode($empresa->getMatricula_Fundempresa()).'',
                            "ges_fundacion"=>''.utf8_encode($empresa->getDate_fundacion()).'',
                            "ges_export"=>''.utf8_encode($empresa->getDate_inicio_operaciones()).'',
                            "tipo_empresa"=>''.utf8_encode($empresa->getIdTipo_Empresa()).'',
                            "tipo_actividad"=>''.utf8_encode($empresa->getIdActividad_Economica()).'',
                            "pagina_web"=>''.utf8_encode($empresa->getPagina_Web()).'',
                            "oea"=>''.utf8_encode($empresa->getOea()).'',
                            "rubro"=>''.utf8_encode($empresa->getIdRubro_Exportaciones()).'',
                            "afiliacion"=>''.utf8_encode($empresa->getAfiliaciones()).'',
                            "categoria"=>''.utf8_encode($empresa->getIdCategoria_Empresa()),
                            "fecha_asignacion_ruex"=>''.utf8_encode($empresa->getFecha_asignacion_ruex())
                    ),
                    "direccion"=>array(
                            "id_direccion_tipo"=>''.utf8_encode($direccion->getId_direccion_tipo()).'',
                            "id_direccion_tipo_calle"=>''.utf8_encode($direccion->getId_direccion_tipo_calle()).'',
                            "nombre_tipo_calle"=>''.utf8_encode($direccion->getNombre_direccion_tipo_calle()).'',
                            "nro_domicilio"=>''.utf8_encode($direccion->getNumero_domicilio()).'',
                            "nombre_edificio"=>''.utf8_encode($direccion->getNombre_edificio()).'',
                            "piso"=>''.utf8_encode($direccion->getPiso()).'',
                            "id_tipo_ubic_edificio"=>''.utf8_encode($direccion->getId_direccion_tipo_ubicacion_edificio()).'',
                            "nro_dpto_oficina"=>''.utf8_encode($direccion->getNumero_dpto_oficina()).'',
                            "id_tipo_zona"=>''.utf8_encode($direccion->getId_direccion_tipo_zona()).'',
                            "nombre_zona_barrio"=>''.utf8_encode($direccion->getNombre_zona_barrio()).'',
                            "id_departamento"=>''.utf8_encode($direccion->getId_departamento()).'',
                            "id_municipio"=>''.utf8_encode($direccion->getId_municipio()).'',
                            "telefono_fijo"=>''.utf8_encode($direccion->getTelefono_fijo()).'',
                            "telefono_celular"=>''.utf8_encode($direccion->getTelefono_celular()).'',
                            "telefono_fax"=>''.utf8_encode($direccion->getTelefono_fax()).'',
                            "email"=>''.utf8_encode($direccion->getEmail()).'',
                            "direccion_descriptiva"=>''.utf8_encode($direccion->getDireccion_descriptiva()).'',
                            "latitud"=>''.utf8_encode($empresa->getCoordenada_lat()).'',
                            "longitud"=>''.utf8_encode($empresa->getCoordenada_long()).'',
                            "direccion_formato_anterior"=>''.utf8_encode($empresa->getDireccionfiscal())
                    ),
                    "rep_legal"=>array(
                            "nombres"=>''.utf8_encode($rep_legal->getNombres()).'',
                            "apellido_1"=>''.utf8_encode($rep_legal->getPaterno()).'',
                            "apellido_2"=>''.utf8_encode($rep_legal->getMaterno()).'',
                            "tipo_doc"=>''.utf8_encode($rep_legal->getId_tipo_documento()).'',
                            "nro_doc"=>''.utf8_encode($rep_legal->getNumero_documento()).'',
                            "fono_1"=>''.utf8_encode($rep_legal->getNumero_contacto()).'',
                            "fono_2"=>''.utf8_encode($rep_legal->getNumero_contacto2()).'',
                            "email"=>''.utf8_encode($rep_legal->getEmail()).'',
                            "pais_origen"=>''.utf8_encode($rep_legal->getId_pais_origen()).'',
                            "sexo"=>''.utf8_encode($rep_legal->getGenero()).'',
                            "cargo"=>'123'.utf8_encode($rep_legal_cargo_nombre)
                    )
            );
         }
         else
             {
         $datos=array(
                    "empresa"=>array(
                            "id_empresa"=>''.utf8_encode($empresa->getId_empresa()).'',
                            "ruex"=>''.utf8_encode($empresa->getRuex()).'',
                            "nit"=>''.utf8_encode($empresa->getNit()).'',
                            "razon_social"=>''.utf8_encode($empresa->getRazon_Social()).'',
                            "nom_comercial"=>''.utf8_encode($empresa->getNombre_Comercial()).'',
                            "desc_empresa"=>''.utf8_encode($empresa->getDescripcion_empresa()).'',
                            "fundempresa"=>''.utf8_encode($empresa->getMatricula_Fundempresa()).'',
                            "ges_fundacion"=>''.utf8_encode($empresa->getDate_fundacion()).'',
                            "ges_export"=>''.utf8_encode($empresa->getDate_inicio_operaciones()).'',
                            "tipo_empresa"=>''.utf8_encode($empresa->getIdTipo_Empresa()).'',
                            "tipo_actividad"=>''.utf8_encode($empresa->getIdActividad_Economica()).'',
                            "pagina_web"=>''.utf8_encode($empresa->getPagina_Web()).'',
                            "oea"=>''.utf8_encode($empresa->getOea()).'',
                            "rubro"=>''.utf8_encode($empresa->getIdRubro_Exportaciones()).'',
                            "afiliacion"=>''.utf8_encode($empresa->getAfiliaciones()).'',
                            "categoria"=>''.utf8_encode($empresa->getIdCategoria_Empresa()),
                            "fecha_asignacion_ruex"=>''.utf8_encode($empresa->getFecha_asignacion_ruex())
                    ),
                    "direccion"=>array(
                            "id_direccion_tipo"=>''.'',
                            "id_direccion_tipo_calle"=>''.'',
                            "nombre_tipo_calle"=>''.'',
                            "nro_domicilio"=>''.'',
                            "nombre_edificio"=>''.'',
                            "piso"=>''.'',
                            "id_tipo_ubic_edificio"=>''.'',
                            "nro_dpto_oficina"=>''.'',
                            "id_tipo_zona"=>''.'',
                            "nombre_zona_barrio"=>''.'',
                            "id_departamento"=>''.utf8_encode($empresa->getIdDepartamento_Procedencia()).'',
                            "id_municipio"=>''.utf8_encode($empresa->getMunicipio()).'',
                            "telefono_fijo"=>''.'',
                            "telefono_celular"=>''.'',
                            "telefono_fax"=>''.'',
                            "email"=>''.'',
                            "direccion_descriptiva"=>''.'',
                            "latitud"=>''.utf8_encode($empresa->getCoordenada_lat()).'',
                            "longitud"=>''.$empresa->getCoordenada_long().'',
                            "direccion_formato_anterior"=>''.utf8_encode($empresa->getDireccionfiscal())
                    ),
                    "rep_legal"=>array(
                            "nombres"=>''.utf8_encode($rep_legal->getNombres()).'',
                            "apellido_1"=>''.utf8_encode($rep_legal->getPaterno()).'',
                            "apellido_2"=>''.utf8_encode($rep_legal->getMaterno()).'',
                            "tipo_doc"=>''.utf8_encode($rep_legal->getId_tipo_documento()).'',
                            "nro_doc"=>''.utf8_encode($rep_legal->getNumero_documento()).'',
                            "fono_1"=>''.utf8_encode($rep_legal->getNumero_contacto()).'',
                            "fono_2"=>''.utf8_encode($rep_legal->getNumero_contacto2()).'',
                            "email"=>''.utf8_encode($rep_legal->getEmail()).'',
                            "pais_origen"=>''.utf8_encode($rep_legal->getId_pais_origen()).'',
                            "sexo"=>''.utf8_encode($rep_legal->getGenero()).'',
                            "cargo"=>''.utf8_encode($rep_legal_cargo_nombre)
                    )
            );
         }
         
         print_r($empresa);
         echo '<br>';
         
            $headers=['Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImlkIjoxLCJ1c2VyIjoic2VuYXZleCIsImVudGlkYWQiOiJzZW5hdmV4In19.ReffJFfesADfsJ7UKLhM6znGrxwj3tj_4TPARtwNbFI'];
            $url = 'http://vcie.produccion.gob.bo/siexco/ws_ruex/index.php/empresa';
            // servidor local del VCIE
            //$url = 'http://192.168.50.131/siexco/ws_ruex/index.php/empresa';
            $curl = curl_init($url);
            curl_setopt($curl,  CURLOPT_HTTPHEADER,  $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,  true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST,  "POST");
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($datos));
            $resp = curl_exec($curl);
            $var_estado_ws = 0;
            if (!curl_errno($curl)) {
              switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                case 200:  # OK
                    $obj = json_decode($resp);
                    if ($obj->{'estado'}== 'Ok')
                    {
                        $var_estado_ws = 1;
                    }
                    break;
                default:
                    $resp = '{"estado_ws_net":"error","codigo":"'.$http_code.'"}';  
              }
            }
            else
            {
                $resp = '{"estado_net":"error","codigo":"000"}';  
            }
            $hoy = date("Y-m-d h:m:s");
            $sqlBitacora_ws = new SQLBitacora_ws();
            $bitacora_ws = new Bitacora_ws();
            $bitacora_ws->setId_entidades_ws("5");
            $bitacora_ws->setMetodo($url);
            $bitacora_ws->setRespuesta(curl_getinfo($curl, CURLINFO_HTTP_CODE));
            if($_SESSION['usuario'])
            {
                $bitacora_ws->setUsuario($_SESSION['usuario']);
                $separador=substr ($_REQUEST["usuario"],0,2);
                if($separador=='T-')
                {
                    $bitacora_ws->setTipo_usuario("T");
                }
                else
                {
                    $bitacora_ws->setTipo_usuario("F");
                }
            }
            else
            {
                $bitacora_ws->setUsuario("-1");
                $bitacora_ws->setTipo_usuario("N");
            }
            $bitacora_ws->setFecha_registro($hoy);
            $bitacora_ws->setEstado(true);
            $sqlBitacora_ws->setGuardarBitacora_ws($bitacora_ws);            
            /*
            $empresa_1 = new Empresa();
            $sqlEmpresa_1 = new SQLEmpresa();
            $empresa_1->setId_empresa($id_empresa);      
            $empresa_1=$sqlEmpresa->getEmpresaPorID($empresa_1);
            $empresa_1->setEncuesta($var_estado_ws);
            $sqlEmpresa->setGuardarEmpresa($empresa_1);    */                  
            //echo '  123  ' . $resp .'  lau  ';
            curl_close($curl);
            
    }

}   