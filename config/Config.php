<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Config.php v1.0 19-06-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

//Definimos una variable para el nombre del sistema
define('SISTEMA', 'Sistema de Certificación de Origen - SICO');

define('DS', DIRECTORY_SEPARATOR);
//Definimos el path del directorio base donde estara nuestro proyecto
define('PATH_BASE', '/enex/web1/sitio');
//Definimos la variable para acceder a <la></la> carpeta SRC
define('PATH_SRC', PATH_BASE . DS . 'src');
//Definimos la variable para acceder a la carpeta CONTROLADOR 
define('PATH_CONTROLADOR', PATH_SRC . DS . 'controlador');
//Definimos la variable para acceder a la carpeta TABLA
define('PATH_TABLA', PATH_SRC . DS . 'tabla');
//Definimos la variable para acceder a la carpeta MODELO
define('PATH_MODELO', PATH_SRC . DS . 'modelo');
//Definimos la variable para acceder a la carpeta MODELO
define('PATH_LIB', PATH_BASE . DS . 'lib');
//Definimos la variable para acceder a la carpeta MODELO
define('PATH_STYLES', PATH_BASE . DS . 'styles');
 
 
//define('KEY','DakBf%sAAnqeM8a%UV89B\=@9=3pDFsU\BE=$LL9\C{9#Y@2LTyZbCT8X-A5*%H6');
//define('AUTORIZACION',439401600001372);
define('NIT',161546020);
define('EMAIL','soporte@senavex.gob.bo');

?>
