<?php
/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'TipoAusencia.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'Perfil.php');
include_once(PATH_TABLA . DS . 'AusenciaAsistente.php');

include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLPerfil.php');
include_once(PATH_MODELO . DS . 'SQLTipoAusencia.php');
include_once(PATH_MODELO . DS . 'SQLAusenciaAsistente.php');

class AdmAdministrativa extends Principal {

  public function AdmAdministrativa() {

    $vista = Principal::getVistaInstance();

    $persona = new Persona();    
    $empresa_persona = new EmpresaPersona();
    $perfil = new Perfil();   
    $sqlPersona = new SQLPersona();
    $sqlEmpresaPersona = new SQLEmpresaPersona();
    $sqlPerfil = new SQLPerfil();
    //--------------------------------------permisos y vacaciones-----------------------------------------------
    if($_REQUEST['tarea']=='eliminarPermiso')
    {
        $ausenciaasistente = new AusenciaAsistente();
        $sqlausenciaasistente = new SQLAusenciaAsistente();
        
        $ausenciaasistente->setId_ausencia_asistente($_REQUEST['idausenciaasistente']);
        $ausenciaasistente=$sqlausenciaasistente->getAusenciaAsistentePorID($ausenciaasistente);
        $ausenciaasistente->setEstado(false);
        
        if($sqlausenciaasistente->setGuardarAusenciaAsistente($ausenciaasistente))
        {
            $empresa_persona->setId_Persona($ausenciaasistente->getId_persona());
            $empresa_persona=$sqlEmpresaPersona->getDatosEmpresaPersonaPorIdPersonaVacacionSenavex($empresa_persona);
            $empresa_persona->setActivo(1);
            if($sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona))
            {
                 echo '[{"suceso":"0","msg":"Datos guardados correctamente.","id_ausencia":"'.$_REQUEST['idausenciaasistente'].'"}]';
            }
            else
            {
                echo '[{"suceso":"1","msg":"Problemas al guardar los datos del usuario."}]';
            }
        }
        else
        {
             echo '[{"suceso":"1","msg":"Problemas al guardar los datos del usuario."}]';
        }
        exit;
    }
    if($_REQUEST['tarea']=='permiso')
    {
        $ausenciaasistente = new AusenciaAsistente();
        $sqlausenciaasistente = new SQLAusenciaAsistente();
        
        $ausenciaasistente->setId_ausencia_asistente($_REQUEST['id_ausencia_asistente']);
        $ausenciaasistente=$sqlausenciaasistente->getAusenciaAsistentePorID($ausenciaasistente);
        
        $vista->assign('ausenciaasistente',$ausenciaasistente);
        $vista->display('admAdministrativo/Permiso.tpl');
        exit;
    }
    if($_REQUEST['tarea']=='cancelarPermiso')
    {
        // aqui registrar un permiso
        //echo $_REQUEST['id_persona'];
        $ausenciaasistente = new AusenciaAsistente();
        $sqlausenciaasistente = new SQLAusenciaAsistente();
        
        $ausenciaasistente->setId_ausencia_asistente($_REQUEST['id_ausencia_asistente']);
        $ausenciaasistente=$sqlausenciaasistente->getAusenciaAsistentePorID($ausenciaasistente);
        
        $vista->assign('ausenciaasistente',$ausenciaasistente);
        $vista->display('admAdministrativo/CancelarPermiso.tpl');
        exit;
    }
    if($_REQUEST['tarea']=='nuevoPermiso')
    {
        // aqui registrar un permiso
        $tipoausencia = new TipoAusencia();   
        $sqltipoausencia = new SQLTipoAusencia();
        $ausencias=$sqltipoausencia->getListarTipoAusencia($tipoausencia);
        $vista->assign('ausencias',$ausencias);
        $vista->display('admAdministrativo/NuevoPermiso.tpl');
        exit;
    }
    if($_REQUEST['tarea']=='registroAusencia')
    {
        //aqui se tiene que registrar un nuevo permiso 
        $ausenciaasistente = new AusenciaAsistente();
        $sqlausenciaasistente = new SQLAusenciaAsistente();
		
        $fecha_desde_array=explode("/",$_REQUEST['fechadesde']);
		$fecha_desde=$fecha_desde_array[2].'-'.$fecha_desde_array[1].'-'.$fecha_desde_array[0]; 
		$fecha_hasta_array=explode("/",$_REQUEST['fechahasta']);
		$fecha_hasta=$fecha_hasta_array[2].'-'.$fecha_hasta_array[1].'-'.$fecha_hasta_array[0]; 
		
		
		$hora_hasta_array=explode(" ",$_REQUEST['fechahasta']);
		$fecha_hasta_array=explode("/",$hora_hasta_array[0]);
		$fecha_hasta=$fecha_hasta_array[2].'-'.$fecha_hasta_array[1].'-'.$fecha_hasta_array[0].' '.$hora_hasta_array[1]; 
		
		$hora_desde_array=explode(" ",$_REQUEST['fechahasta']);
		$fecha_desde_array=explode("/",$hora_desde_array[0]);
		$fecha_desde=$fecha_desde_array[2].'-'.$fecha_desde_array[1].'-'.$fecha_desde_array[0].' '.$hora_desde_array[1]; 
		
		
		
        $ausenciaasistente->setId_persona($_REQUEST['funcionarioslicencia']);
        $ausenciaasistente->setId_persona_firma($_REQUEST['idpersonafirma']);
        $ausenciaasistente->setMotivo($_REQUEST['motivolicencia']);
        $ausenciaasistente->setFecha_desde($fecha_desde);
        $ausenciaasistente->setFecha_hasta($fecha_hasta);
        $ausenciaasistente->setEstado(true);
        $ausenciaasistente->setId_tipo_ausencia($_REQUEST['idausencia']);
        if($sqlausenciaasistente->setGuardarAusenciaAsistente($ausenciaasistente))
        {
            //---------------------aqui hay que poner el estado de asistencia persona de baja--------------
            $empresa_persona->setId_Persona($_REQUEST['funcionarioslicencia']);
            $empresa_persona=$sqlEmpresaPersona->getDatosEmpresaPersonaPorIdPersonaSenavex($empresa_persona);
            $empresa_persona->setActivo(2);
            if($sqlEmpresaPersona->setGuardarEmpresaPersona($empresa_persona))
            {
                //-----------------aqui tengo que reparte las colas--------------------------------
                AdmSistemaColas::redistribucionColaAsistente($_REQUEST['funcionarioslicencia']);
                //-------------------------------------------------------------------------------------
                echo '[{"suceso":"0","msg":"Datos guardados correctamente.","id_ausencia":"'.$ausenciaasistente->getId_ausencia_asistente().'"}]';
            }
            else
            {
                echo '[{"suceso":"1","msg":"Problemas al guardar los datos del usuario."}]';
            }
        }      
        else
        {
            echo '[{"suceso":"1","msg":"Problemas al guardar los datos del usuario."}]';
        }
        exit;
    }
    if($_REQUEST['tarea']=='permisos')
    {
        $ausenciaasistente = new AusenciaAsistente();
        $sqlausenciaasistente = new SQLAusenciaAsistente();
        $ausenciaasistentes=$sqlausenciaasistente->getAusenciaAsistente($ausenciaasistente);
        //var_dump($ausenciaasistentes);
        $i = -1;
        foreach ($ausenciaasistentes as $asistente) {
            $i++;
            
            $empresa_persona->setId_Persona($asistente->getId_persona());
            $empresa_persona=$sqlEmpresaPersona->getEmpresaPersonaPorPersonaSenavex($empresa_persona);
            $perfil->setId_perfil($empresa_persona->getId_perfil());
            $perfil=$sqlPerfil->getBuscarDescripcionPorId($perfil);
            $AsistenteVago[$i] = array('id_persona'=>$asistente->getId_persona(), 
            'nombres'=>$asistente->persona->getNombres().' '.$asistente->persona->getPaterno().' '.$asistente->persona->getMaterno(), 
            'cargo'=>$perfil->getDescripcion(),
            'tipo'=>$asistente->tipoausencia->getDescripcion(),
            'fecha_desde'=>$asistente->getFecha_desde(),
            'fecha_hasta'=>$asistente->getFecha_hasta(),
            'id_ausencia_asistente'=>$asistente->getId_ausencia_asistente()
            );
        }
        $vista->assign('personas',$AsistenteVago);
        $vista->display('admAdministrativo/PersonasVacaciones.tpl');
        exit;
    }
  }
}