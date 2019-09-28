#!/usr/bin/php -q
<?php

    define('_ACCESO', 1);
    include_once('config/Config.php');
    include_once('src/Aplicacion.php');

    include_once(PATH_TABLA . DS . 'Empresa.php');
    include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
    include_once( PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');

        $hoy = new DateTime(date("Y-m-d"));
        $empresa =new Empresa();
        $sqlempresa =new SQLEmpresa();
        $empresa->setEstado('15');
        $empresas=$sqlempresa->getEmpresaPorEstado($empresa);

        foreach ($empresas as $emp) {

            $mail=false;
            $message='';
            $aviso='';
            $fecha_vigencia = new DateTime( $emp->getFecha_renovacion_ruex());
            $interval = $hoy->diff($fecha_vigencia);
            // $f=fopen("/enex/web1/sitio/tmp/prueba".microtime().".txt",'w');
            //         fwrite($f,"Raton sin cola: ".$interval->format('%R%a'));
            //         fclose($f);  
            // echo "id:".$emp->getId_empresa() ."  :".$interval->format('%R%a') ."<br>";
            switch ($interval->format('%R%a')) {
                case '+30':
                    $mail=true;
                    $aviso.='<br/>- Tiene un mes para renovar el RUEX';  

                    break;
                case '+7':
                    $mail=true;
                    $aviso.='<br/>- Tiene una semana para renovar el RUEX';      
                    break;
                case '+1':
                    $mail=true;
                    $aviso.='<br/>- Tiene un d&iacute;a para renovar el RUEX';      
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
                 $message.='<br/>Por favor ingrese a nuestra plataforma y solicite la renovaci&oacute;n de su RUEX.<br/>';
                $correos=AdmCorreo::obtenerCorreosEmpresa($emp->getId_empresa());
                $correos=explode( ',', $correos);
                if(trim($correos[0])==trim($correos[1]))
                {
                    AdmCorreo::enviarCorreo($correos[0],$message,'','','',36);
                }
                else
                {
                    AdmCorreo::enviarCorreo($correos[0].','.$correos[1],$message,'','','',36);
                }
            }
            
        }//end foreach

?>