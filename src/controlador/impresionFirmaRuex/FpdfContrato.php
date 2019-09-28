<?php

require_once('lib/fpdf/fpdf.php');
////////////////////////////////////////-----------------------esto es para sacar la empresa-------------------------------------------------
include_once(PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once(PATH_BASE . DS . 'lib' . DS . 'qrcode'. DS .'qrcode.class.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');
include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_TABLA . DS . 'Perfil.php');
include_once(PATH_MODELO . DS . 'SQLPerfil.php');

$empresa = new Empresa();
$sqlEmpresa = new SQLEmpresa();
$empresa->setId_empresa($id_empresa);
$empresa=$sqlEmpresa->getEmpresaPorID($empresa);

$persona = new Persona();
$sqlPersona= new SQLPersona();
$persona->setId_persona($empresa->getId_representante_legal());
$persona=$sqlPersona->getDatosPersonaPorId($persona);

if($id_persona!=$persona->getId_persona())
{
    $empresapersona =new EmpresaPersona();
    $sqlempresapersona =new SQLEmpresaPersona ();
    $firmante = new Persona();
    $perfil = new Perfil();
    $sqlperfil = new SQLPerfil();
    
    $firmante->setId_persona($id_persona);
    $firmante=$sqlPersona->getDatosPersonaPorId($firmante);
    $empresapersona->setId_Persona($id_persona);
    $empresapersona->setId_Empresa($id_empresa);
    $empresapersona=$sqlempresapersona->getEmpresaPorPersonaEmpresa($empresapersona);
    $perfil->setId_perfil($empresapersona->getId_perfil());
    $perfil=$sqlperfil->getBuscarDescripcionPorId($perfil);
}

        
        
//----------para la fecha de renovacion
/*$fecha_renovacion_a= explode("-", $empresa->getFecha_renovacion_ruex());
$fecha_renovacion=$fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0];

*/

////////////////////////////////////////////////////-----------------------------------------------------------------------------------------------------

class PDF extends FPDF
{	
    
    function Header()
    {	
        $empresa = new Empresa();
        $sqlEmpresa = new SQLEmpresa();
        global $id_empresa;
        global $id_persona;
        $empresa->setId_empresa( $id_empresa);
        $empresa=$sqlEmpresa->getEmpresaPorID($empresa);
        //Cell(width, height, text, border, position-next-cell, alignment);
        $this->Image('styles/img/institucion/logo-min.png',18,20,55,17);
        $this->Image('styles/img/institucion/vortex2.png',148,20,40,17);
    }
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Número de página        
        $this->SetY(-10);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'',0,0,'C');
    }   
}

$pdf = new PDF('P','mm','Letter');

$pdf->SetMargins(18,40,25);
$pdf->AddPage();
$pdf->SetFont('Arial','B',18);
$pdf->Ln(4);
$pdf->Cell(180,7,utf8_decode('ACEPTACIÓN DE TÉRMINOS Y CONDICIONES DE USO'),0,0,'C');
$pdf->Ln();
$pdf->Cell(180,7,utf8_decode('DEL SISTEMA INFORMÁTICO DEL SENAVEX'),0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(180,5,utf8_decode('
ADVERTENCIA: Estos términos y condiciones y todo aquello que esté relacionado al Sistema Informático del SENAVEX, está protegido por las leyes de Derechos de Autor. Su clonación, modificación, distribución, acceso y/o uso y/o goce indebido, será pasible del inicio de las acciones legales que correspondan.

'),1,'J');
$pdf->Ln(10);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('1. INTRODUCCIÓN'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='La Plataforma del SENAVEX es una aplicación de Software para la Web que permite a los exportadores acceder a través de internet, desde cualquier lugar en que se encuentren, a los servicios que brinda el SENAVEX al Exportador. Se comunicará oportunamente a los Exportadores, las nuevas funcionalidades que serán incorporadas eventualmente o sus modificaciones.

En mérito a lo descrito precedentemente se entenderá como Usuario al representante legal de la Empresa, que accede a la Plataforma del SENAVEX y acepta los términos y condiciones de uso.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('2. OBJETO'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='El presente documento tiene por objeto establecer los términos y condiciones de uso del Sistema Informático bajo los cuales el SENAVEX, efectuará el servicio a través de internet, el cual consiste en permitir al Usuario una comunicación directa a través de cualquier computador, teléfono móvil u otro dispositivo electrónico, brindando servicios, accesibles desde diferentes lugares.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('3. ANUNCIO LEGAL'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='Por el presente Anuncio Legal se regula el acceso y uso del Sistema Informático del SENAVEX, por cualquier persona a quien se atribuye la calidad de Usuario. Implica la aceptación expresa y plena de todos los términos y condiciones de uso.
    
La Plataforma del SENAVEX, podrá contener toda clase de material sujeto a protección de propiedad intelectual, derechos de autor y derechos conexos, por consiguiente, cualquier reproducción, uso, redistribución, publicación u otros quedan estrictamente prohibidos.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,4,utf8_decode('4. CONDICIONES DE USO PARA EL USUARIO Y ACEPTACIÓN'),0,1,'');
$pdf->Ln(4);
$pdf->Cell(0,7,utf8_decode('Importante, por favor lea detenidamente'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='Este documento es de carácter obligatorio, respecto al uso de la Plataforma del SENAVEX, así como al acceso a sus herramientas y otros recursos,  por consiguiente:';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->SetFont('Arial','B',10);
$parrafo1='EL USUARIO QUEDA OBLIGADO, A CUMPLIR LOS PRESENTES TÉRMINOS Y CONDICIONES DE USO DE LA PLATAFORMA, CASO CONTRARIO, SI NO ACEPTA, NO TIENE EL PERMISO PARA ACCEDER A LA PLATAFORMA, SIENDO DE SU RESPONSABILIDAD  ABSOLUTAMENTE TODOS LOS DAÑOS Y PERJUICIOS QUE PODRÍAN GENERARSE, POR LAS CONTINGENCIAS O CONFLICTOS PRODUCIDOS.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('5. ESPECIFICACIONES Y CONDICIONES DEL SERVICIO.'),0,1,'');
$pdf->Cell(0,7,utf8_decode('5.1 OTORGAMIENTO DE ACCESO:'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='El SENAVEX, otorga el acceso a la Plataforma Virtual a través de un registro del Usuario, debiendo introducir los datos solicitados en el sistema. Se presume la veracidad de la información proporcionada por el Usuario en el proceso de registro. Es importante que la información introducida sea exacta y precisa, particularmente el correo electrónico, mismo que será utilizado para la comunicación con el usuario.

Cada Usuario es responsable de mantener la confidencialidad de su código de USUARIO y CONTRASEÑA. Además, cada Usuario es responsable de todas las  actividades realizadas con ese usuario y contraseña. En caso de uso no autorizado de un código de Usuario, se deberá notificar inmediatamente al SENAVEX, para la cancelación de ese registro y las medidas de seguridad que correspondan.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('5.2 ADMINISTRACIÓN DEL USUARIO Y CONTRASEÑA:'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='El usuario y contraseña otorgado, permite administrar el acceso a la plataforma mediante la habilitación de personal de su dependencia o confianza, bajo su absoluta responsabilidad.

El Usuario tiene las siguientes facultades: 
 
a.	Administrar y autorizar la habilitación del personal de su dependencia para registrar y firmar documentos de exportación y realizar trámites ante el SENAVEX. 
b.	Renovar, modificar o actualizar los datos de su RUEX. 
c.	Firmar el documento de aceptación de términos y condiciones de uso del sistema informático (Plataforma del SENAVEX). 
d.	Registrar en el sistema Certificados de Origen, Facturas Comerciales de Exportación, Declaraciones Juradas de Origen y otros que se encuentren habilitados en el sistema. 
e.	Firmar Certificados de Origen, Facturas Comerciales de Exportación y otros. 
f.	Firmar y presentar notas de solicitudes de tramitación o reemplazo de Certificados de Origen, rectificación, legalización o aclaración de trámites. 
g.	Entregar y/o recoger trámites. 
h.	Configurar sus datos personales (usuario y contraseña).';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('5.3 PERSONAL HABILITADO POR EL USUARIO:'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='El Usuario manifiesta pleno conocimiento de los riesgos y la responsabilidad que implica la habilitación y baja de los Usuarios (personal habilitado) de su dependencia. Por lo que, el mismo acepta y asume todas las responsabilidades emergentes de lo señalado precedentemente.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('5.4 RESPONSABILIDADES DEL USUARIO:'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='Sin perjuicio de las responsabilidades del Usuario, descritos en el presente documento, el mismo acepta de forma irrefutable constituirse en único responsable por la administración, uso y registros generados en la plataforma.

Consecuentemente, libera, excluye y exonera al SENAVEX de toda obligación o responsabilidad por los daños o perjuicios y otras consecuencias resultantes de la mala administración de la información y del inadecuado uso de la plataforma que podría causar perjuicio.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('5.5 SEÑALAMIENTO DE DOMICILIO Y COMUNICACIONES:'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='Es responsabilidad del Usuario señalar domicilio para efectos de comunicación y/o notificación, se reconoce como domicilio del Usuario la dirección que tiene registrada en la plataforma como domicilio fiscal, la cual deberá ser coincidente con el registrado en el Número de Identificación Tributaria (NIT). 

El Usuario acepta el conocimiento de los Comunicados a ser emitidos por el SENAVEX y cualquier información que sea remitida por escrito, vía correo electrónico, por la página web u otro medio de comunicación, que determine la entidad, obligándose el mismo a su cumplimiento.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('6. PRIVACIDAD DE LA INFORMACIÓN.'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='La información proporcionada por el Usuario está resguardada por el SENAVEX, a este efecto, únicamente se utilizará la información, para el servicio correspondiente, no debiendo utilizarse para otros fines.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('7. LIMITACIONES EN MATERIA DE INGENIERÍA INVERSA.'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='No se podrán utilizar técnicas de ingeniería inversa, descompilar ni desensamblar el código de la aplicación Web, las Bases de Datos, Software relacionado, Algoritmos, u otros comprendidos en la Plataforma del SENAVEX, que vulneren su seguridad e integridad.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('8. CONTENIDO SEGURO.'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='La Unidad de Sistemas y Planificación del SENAVEX, utiliza tecnologías y prácticas de seguridad y encriptación a objeto de proteger la integridad de su contenido, además de la protección del ingenio tecnológico de la Plataforma del SENAVEX.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('9. EXCLUSIÓN DE RESPONSABILIDAD.'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='Sin perjuicio de lo previsto en la normativa legal aplicable, el SENAVEX no será responsable por ningún daño que podría generarse, salvo por dolo o negligencia grave comprobada.

El SENAVEX, podrá suspender el acceso a cualquier Usuario, en caso de detectarse un mal uso.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('10.	DERECHO APLICABLE.'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='Los presentes Términos y Condiciones se rigen por la normativa legal vigente en el territorio nacional y por los Tratados y Convenios Internacionales a partir del acceso extraterritorial a los predios de la Plataforma del SENAVEX. 

Todos los derechos de propiedad intelectual de la Plataforma del SENAVEX, son de propiedad del Servicio Nacional de Verificación de Exportaciones SENAVEX, los mismos están protegidos por Ley, incluyendo las leyes relacionadas con el copyright, con los secretos comerciales, industriales, las patentes y las marcas institucionales. ';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('11. CARÁCTER VINCULANTE.'),0,1,'');
$pdf->SetFont('Arial','',10);
$parrafo1='La Unidad de Sistemas y Planificación del SENAVEX, utiliza tecnologías y prácticas de seguridad y encriptación a objeto de proteger la integridad de su contenido, además de la protección del ingenio tecnológico de la Plataforma del SENAVEX.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);



$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,utf8_decode('12. ACEPTACIÓN.'),0,1,'');
$pdf->SetFont('Arial','',10);

$fechafirma= FuncionesGenerales::fechaenespañol();
//if($empresa->getId_empresa()==495){
//    $fechafirma='Jueves, 03 de Noviembre de 2016';
//}
$parrafo1='Yo, '. $persona->getNombres().' '.$persona->getPaterno().' '.$persona->getMaterno().', con DOCUMENTO DE IDENTIDAD N° '.($persona->getNumero_documento()[0]=='E' && $persona->getNumero_documento()[1]=='-'? $persona->getNumero_documento() : ($persona->getId_tipo_documento()==4? "E-":""). $persona->getNumero_documento()).', Representante Legal de la Empresa '.$empresa->getRazon_social().', con NIT '.$empresa->getNit().', mediante la suscripción del presente documento, manifiesto mi plena y absoluta conformidad con su tenor y  con las condiciones, requisitos, restricciones, medidas de seguridad y funcionalidades establecidas, para el servicio a ser brindado por el SENAVEX.';
$pdf->MultiCell(0,5,utf8_decode($parrafo1),'','J');
$pdf->Ln(4);


if($id_persona==$persona->getId_persona())
{
    $fechafirma= FuncionesGenerales::fechaenespañol();
//    if($empresa->getId_empresa()==495){
//        $fechafirma='Jueves, 03 de Noviembre de 2016';
//    }
    $pdf->SetXY(8, 210);
    $pdf->Cell(200,7,utf8_decode($persona->getNombres().' '.$persona->getPaterno().' '.$persona->getMaterno()),0,1,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(180,7,'REPRESENTANTE LEGAL',0,1,'C');
    $pdf->Cell(180,7,$fechafirma,0,1,'C');
}
else 
{
    $fechafirma= FuncionesGenerales::fechaenespañol();
//    if($empresa->getId_empresa()==495){
//        $fechafirma='Jueves, 03 de Noviembre de 2016';
//    }
    $pdf->SetXY(8, 210);
    $pdf->Cell(200,7,utf8_decode($firmante->getNombres().' '.$firmante->getPaterno().' '.$firmante->getMaterno()),0,1,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(180,7,'REPRESENTANTE LEGAL',0,1,'C');
    $pdf->Cell(180,7,$fechafirma,0,1,'C');
}
if($formail) 
{
    global $pdfdoc;
    $pdfdoc=$pdf->Output("", "S");
}
else $pdf->Output();

?>