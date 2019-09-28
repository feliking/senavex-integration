<?php
/*
$to = '"RONALD" <rchavez@senavex.gob.bo>';$subject = 'PHP mail tester';$message = 'This message was sent via PHP!' . PHP_EOL .
           'Some other message text.' . PHP_EOL . PHP_EOL .
           '-- signature' . PHP_EOL;$headers = 'From: "e-NEX" <soporte@senavex.gob.bo>' . PHP_EOL .
           'Reply-To: reply@email.com' . PHP_EOL .
           'Cc: "OTRO" <ronald.chavez.bo@gmail.com>' . PHP_EOL .
           'X-Mailer: PHP/' . phpversion();
          
if (mail($to, $subject, $message, $headers)) {
  echo 'mail() Success!';
}
else {
  echo 'mail() Failed!';
}
*/
echo 'Prueba de coreo ejecutando';
$para = '"Eddy Quin" <equintanilla@senavex.gob.bo>';
$asunto = 'Plataforma Virtual del Senavex';
$remitente = "senavex.bolivia@gmail.com";
$contenido = 'Correo de prueba';
$headers = "From: ".$remitente." \r\n";
$headers .= "Reply-To: ".$remitente."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$mensaje = '<html><body><img src="http://www.produccion.gob.bo/media/images/miniaturas2/4e615596171ffImage_11.png">'
 . '<div style="background-color:#d3d3d3;border-radius:10px;padding:10px;color:black;">';
$mensaje .= 'Plataforma Virtual del Senavex<br>';
$mensaje .= $contenido;
$mensaje .='<a href="www.senavex.gob.bo">www.senavex.gob.bo</a>';
$mensaje .= '</div></body></html>';
if(mail($para, $asunto, $mensaje, $headers)) 
{ 
	return true; 
} 
else 
{
	 return false;
}
?>
