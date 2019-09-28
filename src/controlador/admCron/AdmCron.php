<?php
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once( PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');


class AdmCron extends Principal {
    public function AdmCron() 
    {
        $f=fopen("/enex/web1/sitio/tmp/prueb_".microtime().".txt",'w');
	fwrite($f,"Primeras pruebas del cron");
	fclose($f); 
        //$this->actualizacionEstadosRuex();
    }
    //funcion para actualizar el RUEX
/*
    public function actualizacionEstadosRuex()
    {
        $hoy = new DateTime(date("Y-m-d"));
        $mail=false;
        
        $empresa =new Empresa();
        $sqlempresa =new SQLEmpresa();
        $empresa->setEstado('2');
        $empresas=$sqlempresa->getEmpresaPorEstado($empresa);
        echo 'hoy '.$hoy->format('Y-m-d').' ,empresas con RUEX vigente:</br>';
        
        foreach ($empresas as $emp) {
            $fecha_vigencia = new DateTime( $emp->getFecha_renovacion_ruex());
            $interval = $hoy->diff($fecha_vigencia);
           
            switch ($interval->format('%R%a')) {
                case '-244':
                    $mail=true;
                    $aviso.='<br/>- Tiene tres meses para renovar el RUEX';         
                    break;
                case '-31':
                    $mail=true;
                    $aviso.='<br/>- Tiene un mes para renovar el RUEX';        
                    break;
                case '-7':
                    $mail=true;
                    $aviso.='<br/>- Tiene una semana para renovar el RUEX';      
                    break;
                case '+0':
                    $mail=true;
                    $aviso.='<br/>- Ya no cuenta con vigencia en RUEX'; 
                    $emp->setEstado('10');
                    $sqlempresa->setGuardarEmpresa($emp);
                    break;
            }
            if($mail)
            {
                $fecha_renovacion= explode("-", $emp->getFecha_renovacion_ruex());
                $emp->setFecha_renovacion_ruex($fecha_renovacion[2].'/'.$fecha_renovacion[1].'/'.$fecha_renovacion[0]);
                 $message.='<br/>Le informamos que la empresa '.$emp->getRazon_social().' con:<br/>'
                         . '<br/><center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> Fecha de Vigencia:'.$emp->getFecha_renovacion_ruex().'</span></center>'
                            . '<br/><br/><center><span style="background-color:white;border-radius:10px;padding:10px;color:black;"> RUEX:'.$emp->getRuex().'</span></center>'
                            . '<br/>';
                 $message.=$aviso.'<br/>';
                 $message.='<br/>Por favor ingrese a nuestra plataforma y solicite la renovacion de su RUEX.<br/>';
                $correos=AdmCorreo::obtenerCorreosEmpresa($emp->getId_empresa());
                $correos=explode( ',', $correos);
	$eme = 'equintanilla@senavex.gob.bo';
                if(trim($correos[0])==trim($correos[1]))
                {
                    AdmCorreo::enviarCorreo($eme,$message,'','','',36);
                }
                else
                {
                    AdmCorreo::enviarCorreo($eme.','.$eme,$message,'','','',36);
                }
            }
        }
    }
*/
}
