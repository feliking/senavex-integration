<?php
// Activamos las sesiones para el funcionamiento de flash['']
@session_start();
require 'Slim/Slim.php';
include 'config_ws.php';
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
$secret_key = getenv("secret");
\Slim\Slim::registerAutoloader();
// Creamos la aplicación.
$app = new \Slim\Slim();
$app = Slim\Slim::getInstance(); 
//configuracion de la conexion con la base de datos de vortex
$app->config(array(
    'templates.path' => 'vistas',
));
// Indicamos el tipo de contenido y condificación que devolvemos desde el framework Slim.
$app->contentType('text/html; charset=utf-8');
$db = new PDO('pgsql:host=' . BD_SERVIDOR . ';dbname=' . BD_NOMBRE, BD_USUARIO, BD_PASSWORD);

$authentication = function () use($db,$app,$secret_key){
    $headers = apache_request_headers();
    $tokens = isset($headers['Authorization']) ? $headers['Authorization'] : "";
    if (!empty($tokens)) {
        if (preg_match('/Bearer\s(\S+)/', $tokens, $matches)) {
            $token = $matches[1];   
            try{
                $data = JWT::decode($token, $secret_key, array('HS256')); 
                $consulta = $db->prepare("select * from usuario_ws where usuario=:param1 and tipo_usuario_ws=1");
                $consulta->execute(array(':param1' => $data));
                $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
                if(!$resultados)
                {
                    echo json_encode(array("ACCESO"=>"INVALIDO"));
                    $app->stop();
                }
            }catch(\Exception $e){
                 echo json_encode(array("ACCESO"=>"INVALIDO"));
                 $app->stop();
            }
        }
        else {
            echo json_encode(array("ACCESO"=>"INVALIDO"));
            $app->stop();
        }
    }
    else
    {
        echo json_encode(array("ACCESO"=>"INVALIDO"));
        $app->stop();
    }
};

////////////////////////////////////////////////
//AUTENTICACION PARA ADMINISTRADORES          //
////////////////////////////////////////////////
$authentication_master = function () use($db,$app,$secret_key){
    $headers = apache_request_headers();
    $tokens = isset($headers['Authorization']) ? $headers['Authorization'] : "";
    if (!empty($tokens)) {
        if (preg_match('/Bearer\s(\S+)/', $tokens, $matches)) {
            $token = $matches[1];   
            try{
                $data = JWT::decode($token, $secret_key, array('HS256')); 
                $consulta = $db->prepare("select * from usuario_ws where usuario=:param1 and tipo_usuario_ws=2");
                $consulta->execute(array(':param1' => $data));
                $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
                if(!$resultados)
                {
                    echo json_encode(array("ACCESO"=>"INVALIDO"));
                 $app->stop();
                }
            }catch(\Exception $e){
                 echo json_encode(array("ACCESO"=>"INVALIDO"));
                 $app->stop();
            }
        }
        else {
            echo json_encode(array("ACCESO"=>"INVALIDO"));
            $app->stop();
        }
    }
    else
    {
        echo json_encode(array("ACCESO"=>"INVALIDO"));
        $app->stop();
    }
};

$app->get('/',function() use($db,$app,$secret_key) {
	echo "Servicios Web Senavex";
});
//  Cuando accedamos por get a la ruta /ws/ruex/ ejecutará lo siguiente:
$app->get('/ws/ruex/:ruex',function($ruex_consulta) use($db) {
	$consulta = $db->prepare("select e.nit AS NIT_EMPRESA, e.ruex AS EMPRESA_RUEX, e.fecha_asignacion_ruex as FECHA_EMISION, "
	."e.fecha_renovacion_ruex  as FECHA_RENOVACION, "
	."p.numero_documento AS REP_LEGAL_N_DOCUMENTO "
	."from empresa e inner join tipo_empresa te on (e.idtipo_empresa=te.id_tipo_empresa)"
	."inner join persona p on (e.id_representante_legal=p.id_persona)"
	."inner join estado_empresas em on (e.estado=em.estado)"
	."inner join tipo_documentoidentidad tdi on (p.id_tipo_documento=tdi.id_tipo_documentoidentidad)"
	."where e.ruex =:param1");
	$consulta->execute(array(':param1' => $ruex_consulta));
	$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
        if($resultados)
        {
            echo json_encode($resultados);
        }
        else
        {
            echo json_encode(array('estado' => false, 'mensaje' => 'Numero de Ruex Invalido.'));
        }
	
});




$app->get('/ws/ruex_datos/:ruex/:codigo_seguridad',function($ruex_consulta, $codigo_seguridad_consulta) use($db) {
    $db = new PDO('pgsql:host=' . BD_SERVIDOR . ';dbname=' . BD_NOMBRE, BD_USUARIO, BD_PASSWORD);

    $consulta = $db->prepare("select * from empresa e
where e.ruex = :param1 and e.codigo_seguridad = :param2");        
	$consulta->execute(array(':param1' => $ruex_consulta,':param2' => $codigo_seguridad_consulta ));
	$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
    if($resultados)
        {
	$consulta = $db->prepare("select e.direccion, e.razon_social,e.nit, e.nombre_comercial, e.matricula_fundempresa, e.oea, e.ruex, e.vigencia, e.fecha_renovacion_ruex, 
ce.descripcion as categoria_de_empresa, ae.descripcion as actividad_de_empresa, te.descripcion as tipo_de_empresa, de.nombre as nombre_departamento,
m.descripcion as empresa_municipio, e.numero_contacto, e.email, e.estado,ee.descripcion, dc.descripcion as calle, d.nombre_direccion_tipo_calle, d.numero_domicilio,
dz.descripcion as zona, d.nombre_zona_barrio, dt.descripcion as tipo_direccion
from empresa e inner join direccion d on (e.direccion = d.id_direccion::text)
inner join categoria_empresa ce on (e.idcategoria_empresa = ce.id_categoria_empresa)
inner join actividad_economica ae on (ae.id_actividad_economica = e.idactividad_economica)
inner join tipo_empresa te on (e.idtipo_empresa = te.id_tipo_empresa)
inner join departamento de on (de.id_departamento = d.id_departamento)
inner join municipio m on (m.id_municipio = d.id_municipio)
inner join direccion_tipo_calle dc on (dc.id_direccion_tipo_calle = d.id_direccion_tipo_calle)
inner join direccion_tipo_zona dz on (dz.id_direccion_tipo_zona = d.id_direccion_tipo_zona)
inner join direccion_tipo dt on (dt.id_direccion_tipo = d.id_direccion_tipo)
inner join estado_empresas ee on (ee.estado = e.estado)
                        where e.ruex = :param1 and e.codigo_seguridad = :param2");        
            $consulta->execute(array(':param1' => $ruex_consulta,':param2' => $codigo_seguridad_consulta ));
            $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);

            if($resultados)
            {
		echo json_encode($resultados, JSON_UNESCAPED_UNICODE);
            }
            else
            {
                echo json_encode(array('estado' => True, 'mensaje' => 'Actualice sus datos'));
            }
        }
	else
        {
            echo json_encode(array('estado' => false, 'mensaje' => 'Datos incorrectos'));
        }
});



$app->get('/v1/BuscarRuexNit/:ruex/:nit',function($ruex_consulta, $nit_consulta) use($db) {
    $db = new PDO('pgsql:host=' . BD_SERVIDOR . ';dbname=' . BD_NOMBRE, BD_USUARIO, BD_PASSWORD);

    $consulta = $db->prepare("select * from empresa e
where e.ruex = :param1 and e.nit = :param2");        
	$consulta->execute(array(':param1' => $ruex_consulta,':param2' => $nit_consulta ));
	$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
    if($resultados)
        {
            $consulta = $db->prepare("select 'OK' as existe, e.fecha_asignacion_ruex , e.fecha_renovacion_ruex from empresa e where e.ruex = :param1 and e.nit = :param2 and (e.estado=2 or e.estado=4 or e.estado=13)");
            $consulta->execute(array(':param1' => $ruex_consulta,':param2' => $nit_consulta ));
            $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);

            if($resultados)
            {
		echo json_encode($resultados, JSON_UNESCAPED_UNICODE);
            }
            else
            {
                $consulta = $db->prepare("select 'OK' as existe, e.fecha_asignacion_ruex , e.fecha_renovacion_ruex from empresa e where e.ruex = :param1 and e.nit = :param2 and (e.estado=6 or e.estado=14)");
                $consulta->execute(array(':param1' => $ruex_consulta,':param2' => $nit_consulta ));
                $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
                if($resultados)
                    {
                        echo json_encode($resultados, JSON_UNESCAPED_UNICODE);
                    }
                else
                    {
                        $consulta = $db->prepare("select 'RUEX SIN VIGENCIA O DADO DE BAJA' as existe, e.fecha_asignacion_ruex , e.fecha_renovacion_ruex from empresa e where e.ruex = :param1 and e.nit = :param2 and (e.estado=10 or e.estado=16)");
                        $consulta->execute(array(':param1' => $ruex_consulta,':param2' => $nit_consulta ));
                        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
                        if($resultados)
                            {
                                echo json_encode($resultados, JSON_UNESCAPED_UNICODE);
                            }
                        else
                            {

                                echo json_encode(array('estado' => false, 'mensaje' => 'CONSULTE CON ADMINITRADOR SENAVEX'));
                            }
                    
                    
                    }
                
            }
        }
	else
        {
            echo json_encode(array('estado' => false, 'mensaje' => 'Datos incorrectos'));
        }
});


$app->post("/crear_token/:name/:institucion", function ($name, $institucion) use($db,$app,$secret_key) {
    $db = new PDO('pgsql:host=' . BD_SERVIDOR . ';dbname=' . BD_NOMBRE, BD_USUARIO, BD_PASSWORD);
    $payload = $name;
    $token = JWT::encode($payload, $secret_key);
    echo $token;
    $consulta = $db->prepare("INSERT INTO usuario_ws(usuario, token, entidad, fecha_creacion, ultima_modificacion, ultimo_ingreso, activo, tipo_usuario_ws) VALUES (:usuario, :token, :entidad, :fecha_creacion, :ultima_modificacion,:ultimo_ingreso, :activo, :tipo_usuario_ws);");
    $consulta->execute(array(
                        ':usuario'=>$name,
                        ':token'=>$token,
                        ':entidad'=>$institucion,
                        ':fecha_creacion'=> date("Y-m-d H:i:s"),
                        ':ultima_modificacion'=> date("Y-m-d H:i:s"),
                        ':ultimo_ingreso'=> date("Y-m-d H:i:s"),
                        ':activo'=>1,
                        ':tipo_usuario_ws'=>1
                )
	);
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    if ($resultados)            
		echo json_encode(array('estado' => true, 'mensaje' => 'Usuario insertado correctamente.'));
	else
            
		echo json_encode(array('estado' => false, 'mensaje' => 'Error en al agregar usuario en la base de datos.'));       
});

$app->post("/act_encuesta/:ID",$authentication, function ($ID) use($db){

    $db = new PDO('pgsql:host=' . BD_SERVIDOR . ';dbname=' . BD_NOMBRE, BD_USUARIO, BD_PASSWORD);
    $consulta = $db->prepare("UPDATE empresa SET encuesta='1' WHERE id_empresa=:ID;");
    $consulta->execute(
		   array( 
                            ':ID'=> $ID
                        )
	);
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
    if ($resultados)
		echo json_encode(array('estado' => true, 'mensaje' => 'Empresa acutalizada correctamente.'));
	else
		echo json_encode(array('estado' => false, 'mensaje' => 'Error en la actualizacion de la empresa.'));
});

$app->post('/adm/add_usuarios/:usuario_ws/:clave_ws', $authentication_master, function( $usuario_ws, $clave_ws) use($db, $app) {
	$user = $app->request->headers->get('HTTP_USER');
        $consulta = $db->prepare("INSERT INTO usuario_ws( usuario_ws, clave_ws, fecha_creacion, ultima_modificacion, activo, usuario_ws_tipo, usuario_creador)
                                  VALUES (:usuario_ws, :clave_ws, :fecha_creacion, :ultima_modificacion, :activo, :usuario_ws_tipo, :usuario_creador)");
        $estado = $consulta->execute(
		   array( 
                            ':usuario_ws'=> $usuario_ws, 
                            ':clave_ws'=> sha1($clave_ws), 
                            ':fecha_creacion'=> date("Y-m-d h:m:s"),
                            ':ultima_modificacion'=> date("Y-m-d h:m:s"), 
                            ':activo'=> true,
                            ':usuario_ws_tipo'=> 0, 
                            ':usuario_creador'=> $user
                        )
	);
	if ($estado)
		echo json_encode(array('estado' => true, 'mensaje' => 'Usuario creado correctamente.'));
	else
		echo json_encode(array('estado' => false, 'mensaje' => 'Error al crear usuario.'));
    });
//
// Baja de usuarios de consumo 
//
$app->put('/adm/baja_usuarios/:idusuario', $authentication_master, function($idusuario) use($db, $app) {
    
	$consulta = $db->prepare("update usuario_ws set activo=false, ultima_modificacion= :ultima_modificacion
				  where usuario_ws=:idusuario");

	$estado = $consulta->execute(
		   array(
			  ':idusuario' => $idusuario,
                          ':ultima_modificacion'=> date("Y-m-d h:m:s")
		   )
	);
	// Si se han modificado datos...
	if ($consulta->rowCount() == 1)
		echo json_encode(array('estado' => true, 'mensaje' => 'Datos actualizados correctamente.'));
	else
		echo json_encode(array('estado' => false, 'mensaje' => 'Error al actualizar datos, datos 
						no modificados o registro no encontrado.'));
});

$app->run();
?>