<?php

defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLDireccion.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLBitacora_ws.php');

include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'Direccion.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'Bitacora_ws.php');

class ws_generales extends Principal {
      public static function EnvioEmpresaVicem($id_empresa)
    {
          echo $id_empresa;
        //buscamos emmpresa
        $empresa = new Empresa();
        $sqlEmpresa = new SQLEmpresa();
        $empresa->setId_empresa($id_empresa);      
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
        
        //buscamos direccion
        if ($empresa->getDireccion() == null)
        {
            $direccion=null;
        }     
        else
        {
            
            $direccion = new Direccion();
            $sqlDireccion = new SQLDireccion();
            $direccion->setId_direccion($empresa->getDireccion());
            $direccion = $sqlDireccion->getDireccionByID($direccion);
        }
        
        
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
        if ($empresa->getCargo() == null)
        {
            $cargo_rev="";      
        }
        else
        {
            $cargo_rev=$empresa->getCargo();
        }
        if ($direccion != null)
        {
         $datos=array(
                    "empresa"=>array(
                            "id_empresa"=>''.$empresa->getId_empresa().'',
                            "ruex"=>''.$empresa->getRuex().'',
                            "nit"=>''.$empresa->getNit().'',
                            "razon_social"=>''.$empresa->getRazon_Social().'',
                            "nom_comercial"=>''.$empresa->getNombre_Comercial().'',
                            "desc_empresa"=>''.$empresa->getDescripcion_empresa().'',
                            "fundempresa"=>''.$empresa->getMatricula_Fundempresa().'',
                            "ges_fundacion"=>''.$empresa->getDate_fundacion().'',
                            "ges_export"=>''.$empresa->getDate_inicio_operaciones().'',
                            "tipo_empresa"=>''.$empresa->getIdTipo_Empresa().'',
                            "tipo_actividad"=>''.$empresa->getIdActividad_Economica().'',
                            "pagina_web"=>''.$empresa->getPagina_Web().'',
                            "oea"=>''.$empresa->getOea().'',
                            "rubro"=>''.$empresa->getIdRubro_Exportaciones().'',
                            "afiliacion"=>''.$empresa->getAfiliaciones().'',
                            "categoria"=>''.$empresa->getIdCategoria_Empresa()
                    ),
                    "direccion"=>array(
                            "id_direccion_tipo"=>''.$direccion->getId_direccion_tipo().'',
                            "id_direccion_tipo_calle"=>''.$direccion->getId_direccion_tipo_calle().'',
                            "nombre_tipo_calle"=>''.$direccion->getNombre_direccion_tipo_calle().'',
                            "nro_domicilio"=>''.$direccion->getNumero_domicilio().'',
                            "nombre_edificio"=>''.$direccion->getNombre_edificio().'',
                            "piso"=>''.$direccion->getPiso().'',
                            "id_tipo_ubic_edificio"=>''.$direccion->getId_direccion_tipo_ubicacion_edificio().'',
                            "nro_dpto_oficina"=>''.$direccion->getNumero_dpto_oficina().'',
                            "id_tipo_zona"=>''.$direccion->getId_direccion_tipo_zona().'',
                            "nombre_zona_barrio"=>''.$direccion->getNombre_zona_barrio().'',
                            "id_departamento"=>''.$direccion->getId_departamento().'',
                            "id_municipio"=>''.$direccion->getId_municipio().'',
                            "telefono_fijo"=>''.$direccion->getTelefono_fijo().'',
                            "telefono_celular"=>''.$direccion->getTelefono_celular().'',
                            "telefono_fax"=>''.$direccion->getTelefono_fax().'',
                            "email"=>''.$direccion->getEmail().'',
                            "direccion_descriptiva"=>''.$direccion->getDireccion_descriptiva().'',
                            "latitud"=>''.$empresa->getCoordenada_lat().'',
                            "longitud"=>''.$empresa->getCoordenada_long().'',
                            "direccion_formato_anterior"=>''.$empresa->getDireccionfiscal()
                    ),
                    "rep_legal"=>array(
                            "nombres"=>''.$rep_legal->getNombres().'',
                            "apellido_1"=>''.$rep_legal->getPaterno().'',
                            "apellido_2"=>''.$rep_legal->getMaterno().'',
                            "tipo_doc"=>''.$rep_legal->getId_tipo_documento().'',
                            "nro_doc"=>''.$rep_legal->getNumero_documento().'',
                            "fono_1"=>''.$rep_legal->getNumero_contacto().'',
                            "fono_2"=>''.$rep_legal->getNumero_contacto2().'',
                            "email"=>''.$rep_legal->getEmail().'',
                            "pais_origen"=>''.$rep_legal->getId_pais_origen().'',
                            "sexo"=>''.$rep_legal->getGenero().'',
                            "cargo"=>''.$cargo_rev
                    )
            );
         }
         else
             {
         $datos=array(
                    "empresa"=>array(
                            "id_empresa"=>''.$empresa->getId_empresa().'',
                            "ruex"=>''.$empresa->getRuex().'',
                            "nit"=>''.$empresa->getNit().'',
                            "razon_social"=>''.$empresa->getRazon_Social().'',
                            "nom_comercial"=>''.$empresa->getNombre_Comercial().'',
                            "desc_empresa"=>''.$empresa->getDescripcion_empresa().'',
                            "fundempresa"=>''.$empresa->getMatricula_Fundempresa().'',
                            "ges_fundacion"=>''.$empresa->getDate_fundacion().'',
                            "ges_export"=>''.$empresa->getDate_inicio_operaciones().'',
                            "tipo_empresa"=>''.$empresa->getIdTipo_Empresa().'',
                            "tipo_actividad"=>''.$empresa->getIdActividad_Economica().'',
                            "pagina_web"=>''.$empresa->getPagina_Web().'',
                            "oea"=>''.$empresa->getOea().'',
                            "rubro"=>''.$empresa->getIdRubro_Exportaciones().'',
                            "afiliacion"=>''.$empresa->getAfiliaciones().'',
                            "categoria"=>''.$empresa->getIdCategoria_Empresa()
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
                            "id_departamento"=>''.$empresa->getIdDepartamento_Procedencia().'',
                            "id_municipio"=>''.$empresa->getMunicipio().'',
                            "telefono_fijo"=>''.'',
                            "telefono_celular"=>''.'',
                            "telefono_fax"=>''.'',
                            "email"=>''.'',
                            "direccion_descriptiva"=>''.'',
                            "latitud"=>''.$empresa->getCoordenada_lat().'',
                            "longitud"=>''.$empresa->getCoordenada_long().'',
                            "direccion_formato_anterior"=>''.$empresa->getDireccionfiscal()
                    ),
                    "rep_legal"=>array(
                            "nombres"=>''.$rep_legal->getNombres().'',
                            "apellido_1"=>''.$rep_legal->getPaterno().'',
                            "apellido_2"=>''.$rep_legal->getMaterno().'',
                            "tipo_doc"=>''.$rep_legal->getId_tipo_documento().'',
                            "nro_doc"=>''.$rep_legal->getNumero_documento().'',
                            "fono_1"=>''.$rep_legal->getNumero_contacto().'',
                            "fono_2"=>''.$rep_legal->getNumero_contacto2().'',
                            "email"=>''.$rep_legal->getEmail().'',
                            "pais_origen"=>''.$rep_legal->getId_pais_origen().'',
                            "sexo"=>''.$rep_legal->getGenero().'',
                            "cargo"=>''.$cargo_rev
                    )
            );
         }
         
        print_r ($datos);
       /*
       $headers=['Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImlkIjoxLCJ1c2VyIjoic2VuYXZleCIsImVudGlkYWQiOiJzZW5hdmV4In19.ReffJFfesADfsJ7UKLhM6znGrxwj3tj_4TPARtwNbFI'];
            //$url = 'http://vcie.produccion.gob.bo/siexco/ws_ruex/index.php/empresa';
            $url = 'http://172.21.1.120/siexco/ws_ruex/index.php/empresa';
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
            
            $empresa_1 = new Empresa();
            $sqlEmpresa_1 = new SQLEmpresa();
            $empresa_1->setId_empresa($id_empresa);      
            $empresa_1=$sqlEmpresa->getEmpresaPorID($empresa_1);
            $empresa_1->setEncuesta($var_estado_ws);
            $sqlEmpresa->setGuardarEmpresa($empresa_1);                        
            //echo '  123  ' . $resp .'  lau  ';
            curl_close($curl);
           //*/
         return ('OK');
    }
}