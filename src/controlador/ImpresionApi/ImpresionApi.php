<?php
session_start();
ini_set ('error_reporting', E_ALL);
////////////////////////////////////////-----------------------esto es para sacar la empresa-------------------------------------------------
include_once(PATH_BASE . DS . 'lib' . DS . 'qrcode'. DS .'qrcode.class.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaImportador.php');
include_once(PATH_TABLA . DS . 'EmpresaImportador.php');
include_once(PATH_TABLA . DS . 'Ciudad.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'Direccion.php');
include_once(PATH_TABLA . DS . 'DireccionTipo.php');
include_once(PATH_TABLA . DS . 'DireccionTipoCalle.php');
include_once(PATH_TABLA . DS . 'DireccionTipoZona.php');
include_once(PATH_TABLA . DS . 'DireccionUbicacionEdificio.php');
include_once(PATH_TABLA . DS . 'Municipio.php');
include_once(PATH_TABLA . DS . 'Departamento.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'TipoDocumentoIdentidad.php');
include_once(PATH_TABLA . DS . 'AutorizacionPrevia.php');
include_once(PATH_TABLA . DS . 'AutorizacionPreviaDetalle.php');


include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLRubroExportaciones.php');
include_once(PATH_TABLA . DS . 'RubroExportaciones.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLCiudad.php');
include_once(PATH_MODELO . DS . 'SQLDireccion.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaImportador.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipo.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoCalle.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoZona.php');
include_once(PATH_MODELO . DS . 'SQLDireccionUbicacionEdificio.php');
include_once(PATH_MODELO . DS . 'SQLMunicipio.php');
include_once(PATH_MODELO . DS . 'SQLDepartamento.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');
include_once(PATH_MODELO . DS . 'SQLTipoDocumentoIdentidad.php');
include_once(PATH_MODELO . DS . 'SQLAutorizacionPrevia.php');

//include_once(PATH_CONTROLADOR . DS . 'admFacturaSenavex'.DS.'facturar.php');
//include_once(PATH_CONTROLADOR . DS . 'admFacturaSenavex'.DS.'numeros.php');

$empresaImportador = new EmpresaImportador();
$sqlEmpresaImportador = new SQLEmpresaImportador();

$autorizacionPrevia = new AutorizacionPrevia();
$sqlAutorizacionPrevia = new SQLAutorizacionPrevia();


$id_autoriza=$_REQUEST['id_autorizacion'];

$autorizacionPrevia->setId_autorizacion_previa($id_autoriza);
$autorizacionPrevia=$sqlAutorizacionPrevia->getAutorizacionPorId($autorizacionPrevia);

$empresaImportador->setId_empresa_importador($autorizacionPrevia->getId_empresa_importador());
$empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
//----------para la fecha de renovacion
//$fecha_renovacion_a= explode("-", $empresaImportador->getFecha_renovacion_rui());
//$fecha_renovacion=$fecha_renovacion_a[2].'/'.$fecha_renovacion_a[1].'/'.$fecha_renovacion_a[0];
//$fecha_asignacion_a= explode("-", $empresaImportador->getFecha_asignacion_rui());
//$fecha_asignacion=$fecha_asignacion_a[2].'/'.$fecha_asignacion_a[1].'/'.$fecha_asignacion_a[0];
$sqldireccion= new SQLDireccion();
$sqlmunicipio= new SQLMunicipio();
$sqldepartamento = new SQLDepartamento();
$sqltipozona = new SQLDireccionTipoZona();
$sqltipocalle = new SQLDireccionTipoCalle();
$sqlDireccionUbicacionEdificio = new SQLDireccionUbicacionEdificio();
$sqlPersona= new SQLPersona();
$sqlPais= new SQLPais();
$sqlTipodoc= new SQLTipoDocumentoIdentidad();

$direccion= new Direccion();
$direccion = new Direccion();
$direccion->setId_direccion($empresaImportador->getId_direccion());
$direccion = $sqldireccion->getDireccionByID($direccion);
$municipio= new Municipio();
$municipio->setId_municipio($direccion->getId_municipio());
$municipio = $sqlmunicipio->getMunicipioPorID($municipio);
$departamento = new Departamento();
$departamento->setId_departamento($direccion->getId_departamento());
$departamento = $sqldepartamento->getBuscarDepartamentoPorId($departamento);
$tipozona= new DireccionTipoZona();
$tipozona->setId_direccion_tipo_zona($direccion->getId_direccion_tipo_zona());
$tipozona = $sqltipozona->getDireccionTipoZonaByID($tipozona);
$tipocalle= new DireccionTipoCalle();
$tipocalle->setId_direccion_tipo_calle($direccion->getId_direccion_tipo_calle());
$tipocalle = $sqltipocalle->getDireccionTipoCalleByID($tipocalle);
if($direccion->getId_direccion_tipo_ubicacion_edificio()!=null){
$direccionUbicacionEdificio = new DireccionUbicacionEdificio();
$direccionUbicacionEdificio->setId_direccion_ubicacion_edificio($direccion->getId_direccion_tipo_ubicacion_edificio());
$direccionUbicacionEdificio = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificio);
$direccionUbicacionEdificion=$direccionUbicacionEdificio->getDescripcion();
}
else{
$direccionUbicacionEdificion='';
}
//aca verificamos si es una persona o es un representante legal
$rrll = new Persona();
$tipodocr= new TipoDocumentoIdentidad();
$expedidor = new Departamento();
$direccionr = new Direccion();
$municipior= new Municipio();
$departamentor = new Departamento();
$tipozonar= new DireccionTipoZona();
$tipocaller= new DireccionTipoCalle();
$direccionUbicacionEdificior = new DireccionUbicacionEdificio();
$paisr = new Pais();
$direccionUbicacionEdificionr='';
$rrll->setId_persona($empresaImportador->getId_representante_legal());
$rrll=$sqlPersona->getDatosPersonaPorId($rrll);
$tipodocr->setId_tipo_documentoidentidad($rrll->getId_tipo_documento());
$tipodocr = $sqlTipodoc->getBuscarDescripcionPorId($tipodocr);
$expedidor->setId_departamento($rrll->getExpedido());
$expedidor = $sqldepartamento->getBuscarDepartamentoPorId($expedidor);
if ((!is_numeric($rrll->getDireccion())) ) { }
else{
    $direccionr->setId_direccion($rrll->getDireccion());
    $direccionr = $sqldireccion->getDireccionByID($direccionr);    
    $municipior->setId_municipio($direccionr->getId_municipio());
    $municipior = $sqlmunicipio->getMunicipioPorID($municipior);   
    $departamentor->setId_departamento($direccionr->getId_departamento());
    $departamentor = $sqldepartamento->getBuscarDepartamentoPorId($departamentor);
    $tipozonar->setId_direccion_tipo_zona($direccionr->getId_direccion_tipo_zona());
    $tipozonar = $sqltipozona->getDireccionTipoZonaByID($tipozonar);   
    $tipocaller->setId_direccion_tipo_calle($direccionr->getId_direccion_tipo_calle());
    $tipocaller = $sqltipocalle->getDireccionTipoCalleByID($tipocaller);
    $direccionUbicacionEdificionr='';
    if($direccionr->getId_direccion_tipo_ubicacion_edificio()!=''){
        $direccionUbicacionEdificior->setId_direccion_ubicacion_edificio($direccionr->getId_direccion_tipo_ubicacion_edificio());
        $direccionUbicacionEdificior = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificior);
        $direccionUbicacionEdificionr=$direccionUbicacionEdificior->getDescripcion();
    }
    else{
        $direccionUbicacionEdificionr='';
    }
}
$paisr->setId_pais($rrll->getId_pais_origen());
$paisr = $sqlPais->getBuscarDescripcionPorId($paisr);


// datos del apoderado
$apoderado = new Persona();
$expedidoa = new Departamento();
$tipodoca= new TipoDocumentoIdentidad();
$expedidoa = new Departamento();
$direcciona = new Direccion();
$municipioa= new Municipio();
$departamentoa = new Departamento();
$tipozonaa= new DireccionTipoZona();
$tipocallea= new DireccionTipoCalle();
$direccionUbicacionEdificiona ='';
$paisa = new Pais();
$direccionUbicacionEdificioa = new DireccionUbicacionEdificio();


if($empresaImportador->getId_apoderado()!=''){
$apoderado->setId_persona($empresaImportador->getId_apoderado());
$apoderado=$sqlPersona->getDatosPersonaPorId($apoderado);
$tipodoca->setId_tipo_documentoidentidad($apoderado->getId_tipo_documento());
$tipodoca = $sqlTipodoc->getBuscarDescripcionPorId($tipodocr);
$expedidoa->setId_departamento($apoderado->getExpedido());
$expedidoa = $sqldepartamento->getBuscarDepartamentoPorId($expedidoa);
if (!is_numeric($apoderado->getDireccion())) { }
else{
    $direcciona->setId_direccion($apoderado->getDireccion());
    $direcciona = $sqldireccion->getDireccionByID($direcciona);
    $municipioa->setId_municipio($direcciona->getId_municipio());
    $municipioa = $sqlmunicipio->getMunicipioPorID($municipioa);
    $departamentoa->setId_departamento($direcciona->getId_departamento());
    $departamentoa = $sqldepartamento->getBuscarDepartamentoPorId($departamentoa);
    $tipozonaa->setId_direccion_tipo_zona($direcciona->getId_direccion_tipo_zona());
    $tipozonaa = $sqltipozona->getDireccionTipoZonaByID($tipozonaa);
    $tipocallea->setId_direccion_tipo_calle($direcciona->getId_direccion_tipo_calle());
    $tipocallea = $sqltipocalle->getDireccionTipoCalleByID($tipocallea);
    if($direcciona->getId_direccion_tipo_ubicacion_edificio()!=''){
    $direccionUbicacionEdificioa->setId_direccion_ubicacion_edificio($direcciona->getId_direccion_tipo_ubicacion_edificio());
    $direccionUbicacionEdificioa = $sqlDireccionUbicacionEdificio->getDireccionUbicacionEdificioByID($direccionUbicacionEdificioa);
    $direccionUbicacionEdificiona=$direccionUbicacionEdificioa->getDescripcion();
    }else{
    $direccionUbicacionEdificiona='';
    }
}    
$paisa->setId_pais($apoderado->getId_pais_origen());
$paisa = $sqlPais->getBuscarDescripcionPorId($paisa);
}

$paiseso = '';

$idpaises = explode(",", $autorizacionPrevia->getId_pais_origen());
foreach ($idpaises as $value) {
    $paiso = new Pais();
    $paiso->setId_pais($value);
    $paiso = $sqlPais->getBuscarDescripcionPorId($paiso);
    $paiseso .= $paiso->getNombre().'/';
}

$departamentoo = '';

$iddpto = explode(",", $autorizacionPrevia->getId_departamento_destino());
foreach ($iddpto as $value) {
    $dep = new Departamento();
    $dep->setId_departamento($value);
    $dep = $sqldepartamento->getBuscarDepartamentoPorId($dep);
    $departamentoo .= $dep->getNombre().'/';
}

if($autorizacionPrevia->getTipo_cuenta()==1){
    $tcm ='M/N'; 
}else {
    $tcm ='M/E';
}

$paisp = new Pais();
    $paisp->setId_pais($autorizacionPrevia->getId_pais_procedencia());
    $paisp = $sqlPais->getBuscarDescripcionPorId($paisp);
    // $paispro = $paisp->getNombre().'/';

$person = new Persona();
    $person->setId_persona($autorizacionPrevia->getPersona_autorizada());
    $person = $sqlPersona->getDatosPersonaPorId($person);
    $nrocorr = 10000 + $autorizacionPrevia->getId_autorizacion_previa();
require_once('lib/tcpdf/tcpdf_include.php');
require_once('lib/tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Senavex');
$pdf->SetTitle('Solicitud de Autorización');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// IMPORTANT: disable font subsetting to allow users editing the document
$pdf->setFontSubsetting(false);

// set font
$pdf->SetFont('helvetica', '', 10, '', false);

// add a page
$pdf->AddPage();

// create some HTML content
$html = 
        '<DIV align="left" style="font-size:10pt">'.
                    '<table border="1" cellpadding="3">'.
                        '<tr>'.
                        '<td width="193"> <img src="styles/img/institucion/MDPyEP_2018.png" height="51" width="193"> </td>'.
                            '<td align="center" width="290"><strong>FORMULARIO DE SOLICITUD PARA LA<br>'.
            'EMISIÓN DE UNA AUTORIZACIÓN PREVIA DE IMPORTACIÓN</strong></td>'.
                            '<td width="155"> <img src="styles/img/institucion/vortex2.png" height="58" width="150"> </td>'.
                        '</tr>'.
                    '</table>'.
        '</DIV>'.
        '<div style="font-size:7pt">'.
		'<b>Fecha de Registro: '. $autorizacionPrevia->getFecha_registro().' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NRO. SOLICITUD: &nbsp; &nbsp;'. $nrocorr .'  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; V 1.0'.
            '</b><br><table border="1" cellpadding="4" >'.
                '<tr>'.
                    '<td colspan="4"><strong>DATOS DEL IMPORTADOR</strong></td>'.
               '</tr>'.
                '<tr>'.
                    '<td colspan="2">Nombre Completo o Razón Social del Importador:</td>'.
                    '<td colspan="2">'.$empresaImportador->getRazon_social().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Domicilio Fiscal:</td>'.
                    '<td colspan="2">'.$tipocalle->getDescripcion().' '.$direccion->getNombre_direccion_tipo_calle().' Nº'.$direccion->getNumero_domicilio().', '.$tipozona->getDescripcion().' '.$direccion->getNombre_zona_barrio().' - '.$departamento->getNombre(). '</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Teléfono Fijo:</td>'.
                    '<td colspan="2">'.$direccion->getTelefono_fijo().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Teléfono Fax:</td>'.
                    '<td colspan="2">'.$direccion->getTelefono_fax().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Teléfono Celular:</td>'.
                    '<td colspan="2">'.$direccion->getTelefono_celular().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Nombre Completo del Representante Legal:</td>'.
                    '<td colspan="2">'.$rrll->getNombres().' '.$rrll->getPaterno().' '.$rrll->getMaterno().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Nacionalidad:</td>'.
                    '<td colspan="2">'.$paisr->getNombre().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Domicilio:</td>'.
                    '<td colspan="2">'.$tipocaller->getDescripcion().' '.$direccionr->getNombre_direccion_tipo_calle().' Nº'.$direccionr->getNumero_domicilio().', '.$tipozonar->getDescripcion().' '.$direccionr->getNombre_zona_barrio().' - '.$departamentor->getNombre(). '</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Teléfono Fijo:</td>'.
                    '<td colspan="2">'.$direccion->getTelefono_fijo().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Teléfono Celular:</td>'.
                    '<td colspan="2">'.$direccionr->getTelefono_celular().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Número de Identificación Tributaria (NIT)</td>'.
                    '<td colspan="2">'.$empresaImportador->getNit().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Número Matrícula de Comercio (FUNDEMPRESA)</td>'.
                    '<td colspan="2">'.$empresaImportador->getMatricula_fundempresa().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Código Padrón Importador:</td>'.
                    '<td colspan="2">'.$empresaImportador->getPadron_importador().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="4"><strong>DATOS DEL PRODUCTO</strong></td>'.
                '</tr>'.
                
                '<tr>'.
                    '<td colspan="2">Cantidad total </td>'.
                    '<td colspan="2">'.$autorizacionPrevia->getCantidad_total().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Peso Bruto Total Kg</td>'.
                    '<td colspan="2">'.$autorizacionPrevia->getPeso_total().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Valor FOB total (valor en Sus)</td>'.
                    '<td colspan="2">'.$autorizacionPrevia->getValor_total().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">País de Origen:</td>'.
                    '<td colspan="2">'.$paiseso.'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">País de Procedencia</td>'.
                    '<td colspan="2">'.$paisp->getNombre().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Departamento(s) de Destino:</td>'.
                    '<td colspan="2">'.$departamentoo.'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="4"><strong>DATOS FINANCIEROS:</strong></td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Origen de los recursos para la adquisición de divisas:</td>'.
                    '<td colspan="2">'.$autorizacionPrevia->getOrigen_recursos().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Entidad Bancaria para la adquisición de divisas:</td>'.
                    '<td colspan="2">'.$autorizacionPrevia->getEntidad_bancaria().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Número de Cuenta Bancaria para la adquisición de divisas:</td>'.
                    '<td colspan="2">'.$autorizacionPrevia->getNumero_cuenta().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td>Tipo de Cuenta:</td>'.
                    '<td>'. $tcm .'</td>'.
                    '<td>Tipo de cambio empleado:</td>'.
                    '<td>'.$autorizacionPrevia->getTipo_cambio().'</td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="4"><strong>DATOS DE AUTORIZACIÓN:</strong></td>'.
                '</tr>'.
                '<tr>'.
                    '<td colspan="2">Persona Autorizada el trámite y recojo de la Autorización Previa:</td>'.
                    '<td colspan="2">'.$person->getNombres().' '.$person->getPaterno() .' '. $person->getMaterno().'</td>'.
                '</tr>'.
            '</table>'. 
        '<div style="font-size:7pt">'.
        '<p align="justify">'.
        '* Una vez presentada y recepcionada este Formulario, no podrá ser sujeto a modificación o ampliación. Si el Importador hubiese detectado algún dato erróneo en su solicitud, deberá dar de baja dicha Solicitud mediante Nota escrita dirigida al VCIE a la brevedad posible.<br>'.
'** Los niveles de tolerancia aceptados para valores son el 3% y para cantidades del 5%. Dichos valores serán verificados a posteriori con información de Aduana Nacional y serán tomados en cuenta al momento de procesar y evaluar nuevas solicitudes de Autorización Previa de Importación presentadas por el Importador.<br>'.
'*** El presente Formulario tiene carácter de Declaración Jurada. La indebida o errónea información brindada por el Importador será pasible a sanciones por los delitos de Falsedad Material y Uso de Instrumento Falsificado, conforme a normativa Penal vigente.<br>'.
'</p>'.
    '<table align="center" border="0" cellpadding="3" >'.
                '<tr>'.
                    '<td style="vertical-align:bottom;" colspan="2"><center>'.
                    '<table align="center" border="0" cellpadding="3" >'.
                        '<tr><td></td>'.
                            '<td border="1"  width="233" height="60" style="vertical-align:bottom;" colspan="2">Firma</td>'.
                       '</tr>'.
                    '</table>'.
                    '</td>'.
               '</tr>'.
            '</table><br><br>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Aclaracion de firma :  ________________________________________________'.

'</div>'.
'</div>';
ob_end_clean();
// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output();

//============================================================+
// END OF FILE
//============================================================+

?>
