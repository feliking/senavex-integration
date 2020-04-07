<?php
/**
/* Registrar solicitudes api*/
defined('_ACCESO') or die('Acceso restringido');

include_once(PATH_LIB . DS . 'PHPExcel' . DS . 'IOFactory.php');
include_once(PATH_LIB . DS . 'PHPExcel' . DS . 'PHPExcel.php');
include_once(PATH_LIB . DS . 'PHPExcel' . DS . 'Writer'. DS . 'Excel2007.php');
include_once(PATH_LIB . DS . 'Spreadsheet' . DS . 'php-excel-reader'. DS . 'excel_reader2.php');
include_once(PATH_LIB . DS . 'Spreadsheet' . DS . 'SpreadsheetReader.php');

include_once(PATH_TABLA . DS . 'AutorizacionPrevia.php');
include_once(PATH_TABLA . DS . 'AutorizacionPreviaDetalle.php');
include_once(PATH_TABLA . DS . 'Persona.php');
include_once(PATH_TABLA . DS . 'EmpresaImportador.php');
include_once(PATH_TABLA . DS . 'Usuario.php');
include_once(PATH_TABLA . DS . 'EmpresaPersona.php');
include_once(PATH_TABLA . DS . 'Perfil.php');
include_once(PATH_TABLA . DS . 'TipoUsuario.php');
include_once(PATH_TABLA . DS . 'PerfilOpciones.php');
include_once(PATH_TABLA . DS . 'Pais.php');
include_once(PATH_TABLA . DS . 'TipoDocumentoIdentidad.php');
include_once(PATH_TABLA . DS . 'Municipio.php');
include_once(PATH_TABLA . DS . 'Ciudad.php');
include_once(PATH_TABLA . DS . 'Direccion.php');
include_once(PATH_TABLA . DS . 'DireccionTipo.php');
include_once(PATH_TABLA . DS . 'DireccionTipoCalle.php');
include_once(PATH_TABLA . DS . 'DireccionTipoZona.php');
include_once(PATH_TABLA . DS . 'DireccionUbicacionEdificio.php');
include_once(PATH_TABLA . DS . 'Logs.php');
include_once(PATH_TABLA . DS . 'EmpresaImportadorObservacion.php');


include_once(PATH_MODELO . DS . 'SQLAutorizacionPrevia.php');
include_once(PATH_MODELO . DS . 'SQLAutorizacionPreviaDetalle.php');
include_once(PATH_MODELO . DS . 'SQLPersona.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaImportador.php');
include_once(PATH_MODELO . DS . 'SQLUsuario.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaPersona.php');
include_once(PATH_MODELO . DS . 'SQLPerfil.php');
include_once(PATH_MODELO . DS . 'SQLTipoUsuario.php');
include_once(PATH_MODELO . DS . 'SQLPerfilOpciones.php');
include_once(PATH_MODELO . DS . 'SQLPais.php');
include_once(PATH_MODELO . DS . 'SQLTipoDocumentoIdentidad.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaAfiliacion.php');
include_once(PATH_MODELO . DS . 'SQLMunicipio.php');
include_once(PATH_MODELO . DS . 'SQLCiudad.php');
include_once(PATH_MODELO . DS . 'SQLDireccion.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipo.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoCalle.php');
include_once(PATH_MODELO . DS . 'SQLDireccionTipoZona.php');
include_once(PATH_MODELO . DS . 'SQLDireccionUbicacionEdificio.php');
include_once(PATH_MODELO . DS . 'SQLLogs.php');
include_once(PATH_MODELO . DS . 'SQLEmpresaImportadorObservacion.php');


include_once( PATH_CONTROLADOR . DS . 'admCorreo' . DS . 'AdmCorreo.php');
include_once( PATH_CONTROLADOR . DS . 'admSistemaColas' . DS . 'AdmSistemaColas.php');
include_once( PATH_CONTROLADOR . DS . 'funcionesGenerales' . DS . 'FuncionesGenerales.php');
include_once( PATH_CONTROLADOR . DS . 'admPersona' . DS . 'AdmPersona.php');

class AdmAutorizacionPrevia extends Principal {

    public function AdmAutorizacionPrevia() {

        $vista = Principal::getVistaInstance();


        $persona = new Persona();
        $autorizacionPrevia = new AutorizacionPrevia();
        $autorizacionPreviaDetalle = new AutorizacionPreviaDetalle();
        $perfil = new Perfil();

        $empresaImportador = new EmpresaImportador();
        $sqlAutorizacionPrevia = new SQLAutorizacionPrevia();
        $sqlPersona = new SQLPersona();
        $sqlEmpresaPersona = new SQLEmpresaPersona();
        $sqlEmpresaImportador = new SQLEmpresaImportador();

        $sqlPerfil = new SQLPerfil();

        if($_REQUEST['tarea']=='listado'){
            $empresa=$sqlAutorizacionPrevia->getListar($autorizacionPrevia);

        }
        if($_REQUEST['tarea']=='loadExcel'){

            $allowedfileExtensions = array('xls', 'xlsx');
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $fileName = $_FILES['file']['name'];
                $fileNameCm = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCm));
                $fileTmpPath = $_FILES['file']['tmp_name'];
                $fech = date("m-d-h-i-s");
                if (in_array($fileExtension, $allowedfileExtensions)) {
                    $uploadFileDir = 'styles/solicitudes/';
                    $dest_path = $uploadFileDir .$_SESSION['id_empresa'].'_'.$fech.'.'.$fileExtension;
                    if(move_uploaded_file($fileTmpPath, $dest_path))
                    {
                        $Reader = new SpreadsheetReader($dest_path);
                        $data = array();
                        $key_success = [];
                        $key_error = [];
                        $key_total = 0;
                        $i = 1;
                        $subpartidas = array(
                            '3923.10.90.00.0'=>'- - Los demás|u',
                            '6101.20.00.00.0'=>'- De algodón|u',
                            '6101.30.00.00.0'=>'- De fibras sintéticas o artificiales|u',
                            '6101.90.10.00.0'=>'- - De lana o pelo fino|u',
                            '6101.90.90.00.0'=>'- - Los demás|u',
                            '6102.10.00.00.0'=>'- De lana o pelo fino|u',
                            '6102.20.00.00.0'=>'- De algodón|u',
                            '6102.30.00.00.0'=>'- De fibras sintéticas o artificiales|u',
                            '6102.90.00.00.0'=>'- De las demás materias textiles|u',
                            '6103.10.10.00.0'=>'- - De lana o pelo fino|u',
                            '6103.10.20.00.0'=>'- - De fibras sintéticas|u',
                            '6103.10.90.00.0'=>'- - De las demás materias textiles|u',
                            '6103.22.00.00.0'=>'- - De algodón|u',
                            '6103.23.00.00.0'=>'- - De fibras sintéticas|u',
                            '6103.29.10.00.0'=>'- - - De lana o pelo fino|u',
                            '6103.29.90.00.0'=>'- - - Los demás|u',
                            '6103.31.00.00.0'=>'- - De lana o pelo fino|u',
                            '6103.31.00.00.1'=>'- - DE VICUÑA O DE GUANACO|u',
                            '6103.32.00.00.0'=>'- - De algodón|u',
                            '6103.33.00.00.0'=>'- - De fibras sintéticas|u',
                            '6103.39.00.00.0'=>'- - De las demás materias textiles|u',
                            '6103.41.00.00.0'=>'- - De lana o pelo fino|u',
                            '6103.42.00.00.0'=>'- - De algodón|u',
                            '6103.43.00.00.0'=>'- - De fibras sintéticas|u',
                            '6103.49.00.00.0'=>'- - De las demás materias textiles|u',
                            '6104.13.00.00.0'=>'- - De fibras sintéticas|u',
                            '6104.19.10.00.0'=>'- - - De lana o pelo fino|u',
                            '6104.19.20.00.0'=>'- - - De algodón|u',
                            '6104.19.90.00.0'=>'- - - Los demás|u',
                            '6104.22.00.00.0'=>'- - De algodón|u',
                            '6104.23.00.00.0'=>'- - De fibras sintéticas|u',
                            '6104.29.10.00.0'=>'- - - De lana o pelo fino|u',
                            '6104.29.10.00.1'=>'- - - DE ALPACA|u',
                            '6104.29.90.00.0'=>'- - - Los demás|u',
                            '6104.31.00.00.0'=>'- - De lana o pelo fino|u',
                            '6104.31.00.00.1'=>'- - DE ALPACA|u',
                            '6104.31.00.00.2'=>'- - DE VICUÑA O DE GUANACO|u',
                            '6104.32.00.00.0'=>'- - De algodón|u',
                            '6104.33.00.00.0'=>'- - De fibras sintéticas|u',
                            '6104.39.00.00.0'=>'- - De las demás materias textiles|u',
                            '6104.41.00.00.0'=>'- - De lana o pelo fino|u',
                            '6104.42.00.00.0'=>'- - De algodón|u',
                            '6104.43.00.00.0'=>'- - De fibras sintéticas|u',
                            '6104.44.00.00.0'=>'- - De fibras artificiales|u',
                            '6104.49.00.00.0'=>'- - De las demás materias textiles|u',
                            '6104.51.00.00.0'=>'- - De lana o pelo fino|u',
                            '6104.52.00.00.0'=>'- - De algodón|u',
                            '6104.53.00.00.0'=>'- - De fibras sintéticas|u',
                            '6104.59.00.00.0'=>'- - De las demás materias textiles|u',
                            '6104.61.00.00.0'=>'- - De lana o pelo fino|u',
                            '6104.62.00.00.0'=>'- - De algodón|u',
                            '6104.63.00.00.0'=>'- - De fibras sintéticas|u',
                            '6104.69.00.00.0'=>'- - De las demás materias textiles|u',
                            '6105.10.00.00.0'=>'- De algodón|u',
                            '6105.20.10.00.0'=>'- - De fibras acrílicas o modacrílicas|u',
                            '6105.20.90.00.0'=>'- - De las demás fibras sintéticas o artificiales|u',
                            '6105.90.00.00.0'=>'- De las demás materias textiles|u',
                            '6106.10.00.00.0'=>'- De algodón|u',
                            '6106.20.00.00.0'=>'- De fibras sintéticas o artificiales|u',
                            '6106.90.00.00.0'=>'- De las demás materias textiles|u',
                            '6107.11.00.00.0'=>'- - De algodón|u',
                            '6107.12.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6107.19.00.00.0'=>'- - De las demás materias textiles|u',
                            '6107.21.00.00.0'=>'- - De algodón|u',
                            '6107.22.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6107.29.00.00.0'=>'- - De las demás materias textiles|u',
                            '6107.91.00.00.0'=>'- - De algodón|u',
                            '6107.99.10.00.0'=>'- - - De fibras sintéticas o artificiales|u',
                            '6107.99.90.00.0'=>'- - - Los demás|u',
                            '6108.11.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6108.19.00.00.0'=>'- - De las demás materias textiles|u',
                            '6108.21.00.00.0'=>'- - De algodón|u',
                            '6108.22.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6108.29.00.00.0'=>'- - De las demás materias textiles|u',
                            '6108.31.00.00.0'=>'- - De algodón|u',
                            '6108.32.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6108.39.00.00.0'=>'- - De las demás materias textiles|u',
                            '6108.91.00.00.0'=>'- - De algodón|u',
                            '6108.92.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6108.99.00.00.0'=>'- - De las demás materias textiles|u',
                            '6109.10.00.00.0'=>'- De algodón|u',
                            '6109.90.10.00.0'=>'- - De fibras acrílicas o modacrílicas|u',
                            '6109.90.10.00.1'=>'- - CAMISETAS DE FIBRAS ACRILICAS|u',
                            '6109.90.90.00.0'=>'- - Las demás|u',
                            '6109.90.90.00.1'=>'- - CAMISETAS DE LANA O PELO FINO|u',
                            '6110.11.10.00.0'=>'- -  Suéteres (jerseys)|u',
                            '6110.11.20.00.0'=>'- -  Chalecos|u',
                            '6110.11.30.00.0'=>'- - - Cárdigan|u',
                            '6110.11.90.00.0'=>'- -  Los demás|u',
                            '6110.12.00.00.0'=>'- - De cabra de Cachemira|u',
                            '6110.19.10.00.0'=>'- -  Suéteres (jerseys)|u',
                            '6110.19.10.00.1'=>'- - - DE VICUÑA O DE GUANACO|u',
                            '6110.19.20.00.0'=>'- - - Chalecos|u',
                            '6110.19.20.00.1'=>'- - - DE VICUÑA O DE GUANACO|u',
                            '6110.19.30.00.0'=>'- - - Cárdigan|u',
                            '6110.19.30.00.1'=>'- - - DE VICUÑA O DE GUANACO|u',
                            '6110.19.90.00.0'=>'- - - Los demás|u',
                            '6110.19.90.00.1'=>'- - - DE VICUÑA O DE GUANACO|u',
                            '6110.20.10.00.0'=>'- - Suéteres (jerseys)|u',
                            '6110.20.20.00.0'=>'- - Chalecos|u',
                            '6110.20.30.00.0'=>'- - Cárdigan|u',
                            '6110.20.90.00.0'=>'- - Los demás|u',
                            '6110.30.10.00.0'=>'- - De fibras acrílicas o modacrílicas|u',
                            '6110.30.90.00.0'=>'- - Las demás|u',
                            '6110.90.00.00.0'=>'- De las demás materias textiles|u',
                            '6111.20.00.00.0'=>'- De algodón|u',
                            '6111.30.00.00.0'=>'- De fibras sintéticas|u',
                            '6111.90.10.00.0'=>'- - De lana o pelo fino|u',
                            '6111.90.90.00.0'=>'- - Las demás|u',
                            '6112.11.00.00.0'=>'- - De algodón|u',
                            '6112.12.00.00.0'=>'- - De fibras sintéticas|u',
                            '6112.19.00.00.0'=>'- - De las demás materias textiles|u',
                            '6112.20.00.00.0'=>'- Monos (overoles) y conjuntos de esquí|u',
                            '6112.31.00.00.0'=>'- - De fibras sintéticas|u',
                            '6112.39.00.00.0'=>'- - De las demás materias textiles|u',
                            '6112.41.00.00.0'=>'- - De fibras sintéticas|u',
                            '6112.49.00.00.0'=>'- - De las demás materias textiles|u',
                            '6113.00.00.00.0'=>'Prendas de vestir confeccionadas con tejidos de punto de las partidas 59.03, 59.06 ó 59.07.|u',
                            '6114.20.00.00.0'=>'- De algodón|u',
                            '6114.30.00.00.0'=>'- De fibras sintéticas o artificiales|u',
                            '6114.90.10.00.0'=>'- - De lana o pelo fino|u',
                            '6114.90.90.00.0'=>'- - Las demás|u',
                            '6115.10.10.00.0'=>'- - Medias de compresión progresiva|2u',
                            '6115.10.90.00.0'=>'- - Las demás|2u',
                            '6115.21.00.00.0'=>'- - De fibras sintéticas, de título inferior a 67 decitex por hilo sencillo|2u',
                            '6115.22.00.00.0'=>'- - De fibras sintéticas, de título superior o igual a 67 decitex por hilo sencillo|2u',
                            '6115.29.00.00.0'=>'- - De las demás materias textiles|2u',
                            '6115.30.10.00.0'=>'- - De fibras sintéticas|2u',
                            '6115.30.90.00.0'=>'- - Las demás|2u',
                            '6115.94.00.00.0'=>'- - De lana o pelo fino|2u',
                            '6115.95.00.00.0'=>'- - De algodón|2u',
                            '6115.96.00.00.0'=>'- - De fibras sintéticas|2u',
                            '6115.99.00.00.0'=>'- - De las demás materias textiles|2u',
                            '6116.10.00.00.0'=>'- Impregnados, recubiertos o revestidos con plástico o caucho|2u',
                            '6116.91.00.00.0'=>'- - De lana o pelo fino|2u',
                            '6116.91.00.00.1'=>'- - DE VICUÑA O DE GUANACO|2u',
                            '6116.92.00.00.0'=>'- - De algodón|2u',
                            '6116.93.00.00.0'=>'- - De fibras sintéticas|2u',
                            '6116.99.00.00.0'=>'- - De las demás materias textiles|2u',
                            '6117.10.00.00.0'=>'- Chales, pañuelos de cuello, bufandas, mantillas, velos y artículos similares|u',
                            '6117.10.00.00.1'=>'- DE ALPACA|u',
                            '6117.10.00.00.2'=>'- DE VICUÑA O DE GUANACO|u',
                            '6117.80.10.00.0'=>'- - Rodilleras y tobilleras|u',
                            '6117.80.20.00.0'=>'- - Corbatas y lazos similares|u',
                            '6117.80.90.00.0'=>'- - Los demás|u',
                            '6117.90.10.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6117.90.90.00.0'=>'- - Las demás|u',
                            '6201.11.00.00.0'=>'- - De lana o pelo fino|u',
                            '6201.12.00.00.0'=>'- - De algodón|u',
                            '6201.13.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6201.19.00.00.0'=>'- - De las demás materias textiles|u',
                            '6201.91.00.00.0'=>'- - De lana o pelo fino|u',
                            '6201.92.00.00.0'=>'- - De algodón|u',
                            '6201.93.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6201.99.00.00.0'=>'- - De las demás materias textiles|u',
                            '6202.11.00.00.0'=>'- - De lana o pelo fino|u',
                            '6202.12.00.00.0'=>'- - De algodón|u',
                            '6202.13.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6202.19.00.00.0'=>'- - De las demás materias textiles|u',
                            '6202.91.00.00.0'=>'- - De lana o pelo fino|u',
                            '6202.91.00.00.1'=>'- - DE ALPACA|u',
                            '6202.92.00.00.0'=>'- - De algodón|u',
                            '6202.93.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6202.99.00.00.0'=>'- - De las demás materias textiles|u',
                            '6203.11.00.00.0'=>'- - De lana o pelo fino|u',
                            '6203.12.00.00.0'=>'- - De fibras sintéticas|u',
                            '6203.19.00.00.0'=>'- - De las demás materias textiles|u',
                            '6203.22.00.00.0'=>'- - De algodón|u',
                            '6203.23.00.00.0'=>'- - De fibras sintéticas|u',
                            '6203.29.10.00.0'=>'- - - De lana o pelo fino|u',
                            '6203.29.90.00.0'=>'- - - Los demás|u',
                            '6203.31.00.00.0'=>'- - De lana o pelo fino|u',
                            '6203.31.00.00.1'=>'- - DE VICUÑA O DE GUANACO|u',
                            '6203.32.00.00.0'=>'- - De algodón|u',
                            '6203.32.00.00.1'=>'- - DE MEZCLILLA|u',
                            '6203.33.00.00.0'=>'- - De fibras sintéticas|u',
                            '6203.39.00.00.0'=>'- - De las demás materias textiles|u',
                            '6203.41.00.00.0'=>'- - De lana o pelo fino|u',
                            '6203.42.10.00.0'=>'- - - De tejidos de mezclilla («denim»)|u',
                            '6203.42.20.00.0'=>'- - - De terciopelo rayado («corduroy»)|u',
                            '6203.42.90.00.0'=>'- - - Los demás|u',
                            '6203.43.00.00.0'=>'- - De fibras sintéticas|u',
                            '6203.49.00.00.0'=>'- - De las demás materias textiles|u',
                            '6204.11.00.00.0'=>'- - De lana o pelo fino|u',
                            '6204.12.00.00.0'=>'- - De algodón|u',
                            '6204.13.00.00.0'=>'- - De fibras sintéticas|u',
                            '6204.19.00.00.0'=>'- - De las demás materias textiles|u',
                            '6204.21.00.00.0'=>'- - De lana o pelo fino|u',
                            '6204.22.00.00.0'=>'- - De algodón|u',
                            '6204.23.00.00.0'=>'- - De fibras sintéticas|u',
                            '6204.29.00.00.0'=>'- - De las demás materias textiles|u',
                            '6204.31.00.00.0+C8'=>'- - De lana o pelo fino|u',
                            '6204.31.00.00.1'=>'- - DE VICUÑA O DE GUANACO|u',
                            '6204.32.00.00.0'=>'- - De algodón|u',
                            '6204.32.00.00.1'=>'- - DE MEZCLILLA|u',
                            '6204.33.00.00.0'=>'- - De fibras sintéticas|u',
                            '6204.39.00.00.0'=>'- - De las demás materias textiles|u',
                            '6204.41.00.00.0'=>'- - De lana o pelo fino|u',
                            '6204.42.00.00.0'=>'- - De algodón|u',
                            '6204.43.00.00.0'=>'- - De fibras sintéticas|u',
                            '6204.44.00.00.0'=>'- - De fibras artificiales|u',
                            '6204.49.00.00.0'=>'- - De las demás materias textiles|u',
                            '6204.51.00.00.0'=>'- - De lana o pelo fino|u',
                            '6204.52.00.00.0'=>'- - De algodón|u',
                            '6204.53.00.00.0'=>'- - De fibras sintéticas|u',
                            '6204.59.00.00.0'=>'- - De las demás materias textiles|u',
                            '6204.61.00.00.0'=>'- - De lana o pelo fino|u',
                            '6204.62.00.00.0'=>'- - De algodón|u',
                            '6204.62.00.00.1'=>'- - DE MEZCLILLA|u',
                            '6204.63.00.00.0'=>'- - De fibras sintéticas|u',
                            '6204.69.00.00.0'=>'- - De las demás materias textiles|u',
                            '6204.69.00.00.1'=>'- - EXCEPTO DE FIBRAS ARTIFICIALES|u',
                            '6205.20.00.00.0'=>'- De algodón|u',
                            '6205.30.00.00.0'=>'- De fibras sintéticas o artificiales|u',
                            '6205.90.10.00.0'=>'- - De lana o pelo fino|u',
                            '6205.90.90.00.0'=>'- - Las demás|u',
                            '6206.10.00.00.0'=>'- De seda o desperdicios de seda|u',
                            '6206.20.00.00.0'=>'- De lana o pelo fino|u',
                            '6206.30.00.00.0'=>'- De algodón|u',
                            '6206.40.00.00.0'=>'- De fibras sintéticas o artificiales|u',
                            '6206.90.00.00.0'=>'- De las demás materias textiles|u',
                            '6207.11.00.00.0'=>'- - De algodón|u',
                            '6207.19.00.00.0'=>'- - De las demás materias textiles|u',
                            '6207.21.00.00.0'=>'- - De algodón|u',
                            '6207.22.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6207.29.00.00.0'=>'- - De las demás materias textiles|u',
                            '6207.91.00.00.0'=>'- - De algodón|u',
                            '6207.91.00.00.1'=>'- - CAMISETAS, ALBORNOCES, BATAS Y ARTICULOS SIMILARES|u',
                            '6207.99.10.00.0'=>'- - - De fibras sintéticas o artificiales|u',
                            '6207.99.90.00.0'=>'- - - Los demás|u',
                            '6208.11.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6208.19.00.00.0'=>'- - De las demás materias textiles|u',
                            '6208.21.00.00.0'=>'- - De algodón|u',
                            '6208.22.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6208.29.00.00.0'=>'- - De las demás materias textiles|u',
                            '6208.91.00.00.0'=>'- - De algodón|u',
                            '6208.92.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6208.99.00.00.0'=>'- - De las demás materias textiles|u',
                            '6209.20.00.00.0'=>'- De algodón|u',
                            '6209.30.00.00.0'=>'- De fibras sintéticas|u',
                            '6209.90.10.00.0'=>'- - De lana o pelo fino|u',
                            '6209.90.90.00.0'=>'- - Las demás|u',
                            '6210.10.00.00.0'=>'- Con productos de las partidas 56.02 ó 56.03|u',
                            '6210.20.00.00.0'=>'- Las demás prendas de vestir del tipo de las citadas en las subpartidas 6201.11 a 6201.19|u',
                            '6210.30.00.00.0'=>'- Las demás prendas de vestir del tipo de las citadas en las subpartidas 6202.11 a 6202.19|u',
                            '6210.40.00.00.0'=>'- Las demás prendas de vestir para hombres o niños|u',
                            '6210.50.00.00.0'=>'- Las demás prendas de vestir para mujeres o niñas|u',
                            '6211.11.00.00.0'=>'- - Para hombres o niños|u',
                            '6211.12.00.00.0'=>'- - Para mujeres o niñas|u',
                            '6211.20.00.00.0'=>'- Monos (overoles) y conjuntos de esquí|u',
                            '6211.32.00.00.0'=>'- - De algodón|u',
                            '6211.33.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6211.39.10.00.0'=>'- - De lana o pelo fino|u',
                            '6211.39.90.00.0'=>'- - Las demás|u',
                            '6211.42.00.00.0'=>'- - De algodón|u',
                            '6211.43.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6211.49.10.00.0'=>'- - - De lana o pelo fino|u',
                            '6211.49.90.00.0'=>'- - - Las demás|u',
                            '6212.10.00.00.0'=>'- Sostenes (corpiños)|u',
                            '6212.20.00.00.0'=>'- Fajas y fajas braga (fajas bombacha)|u',
                            '6212.30.00.00.0'=>'- Fajas sostén (fajas corpiño)|u',
                            '6212.90.00.00.0'=>'- Los demás|u',
                            '6213.20.00.00.0'=>'- De algodón|u',
                            '6213.90.10.00.0'=>'- - De seda o desperdicios de seda|u',
                            '6213.90.90.00.0'=>'- - Las demás|u',
                            '6214.10.00.00.0'=>'- De seda o desperdicios de seda|u',
                            '6214.20.00.00.0'=>'- De lana o pelo fino|u',
                            '6214.20.00.00.1'=>'- DE VICUÑA O DE GUANACO|u',
                            '6214.30.00.00.0'=>'- De fibras sintéticas|u',
                            '6214.40.00.00.0'=>'- De fibras artificiales|u',
                            '6214.90.00.00.0'=>'- De las demás materias textiles|u',
                            '6215.10.00.00.0'=>'- De seda o desperdicios de seda|u',
                            '6215.20.00.00.0'=>'- De fibras sintéticas o artificiales|u',
                            '6215.90.00.00.0'=>'- De las demás materias textiles|u',
                            '6216.00.10.00.0'=>'- Especiales para la protección de trabajadores|2u',
                            '6216.00.90.00.0'=>'- Los demás|2u',
                            '6301.20.10.00.0'=>'- - De lana|u',
                            '6301.20.20.00.0'=>'- - De pelo de vicuña|u',
                            '6301.20.90.00.0'=>'- - Las demás|u',
                            '6301.30.00.00.0'=>'- Mantas de algodón (excepto las eléctricas)|u',
                            '6301.40.00.00.0'=>'- Mantas de fibras sintéticas (excepto las eléctricas)|u',
                            '6301.90.00.00.0'=>'- Las demás mantas|u',
                            '6302.10.10.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6302.10.90.00.0'=>'- - Las demás|u',
                            '6302.21.00.00.0'=>'- - De algodón|u',
                            '6302.22.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6302.29.00.00.0'=>'- - De las demás materias textiles|u',
                            '6302.31.00.00.0'=>'- - De algodón|u',
                            '6302.32.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6302.39.00.00.0'=>'- - De las demás materias textiles|u',
                            '6302.40.10.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6302.40.90.00.0'=>'- - Las demás|u',
                            '6302.51.00.00.0'=>'- - De algodón|u',
                            '6302.53.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6302.59.10.00.0'=>'- - - De lino|u',
                            '6302.59.90.00.0'=>'- - - Las demás|u',
                            '6302.60.00.00.0'=>'- Ropa de tocador o cocina, de tejido con bucles del tipo toalla, de algodón|u',
                            '6302.91.00.00.0'=>'- - De algodón|u',
                            '6302.93.00.00.0'=>'- - De fibras sintéticas o artificiales|u',
                            '6302.99.10.00.0'=>'- - - De lino|u',
                            '6302.99.90.00.0'=>'- - - Las demás|u',
                            '6303.12.00.00.0'=>'- - De fibras sintéticas|u',
                            '6303.19.10.00.0'=>'- - - De algodón|u',
                            '6303.19.90.00.0'=>'- - - Las demás|u',
                            '6303.91.00.00.0'=>'- - De algodón|u',
                            '6303.92.00.00.0'=>'- - De fibras sintéticas|u',
                            '6303.99.00.00.0'=>'- - De las demás materias textiles|u',
                            '6304.11.00.00.0'=>'- - De punto|u',
                            '6304.19.00.00.0'=>'- - Las demás|u',
                            '6304.91.00.00.0'=>'- - De punto|u',
                            '6304.92.00.00.0'=>'- - De algodón, excepto de punto|u',
                            '6304.93.00.00.0'=>'- - De fibras sintéticas, excepto de punto|u',
                            '6304.99.00.00.0'=>'- - De las demás materias textiles, excepto de punto|u',
                            '6305.10.10.00.0'=>'- - De yute|u',
                            '6305.10.90.00.0'=>'- - Los demás|u',
                            '6305.20.00.00.0'=>'- De algodón|u',
                            '6305.33.20.00.0'=>'- - - De polipropileno|u',
                            '6305.39.00.00.0'=>'- - Los demás|u',
                            '6305.90.10.00.0'=>'- - De pita (cabuya, fique)|u',
                            '6305.90.90.00.0'=>'- - Las demás|u',
                            '6306.12.00.00.0'=>'- - De fibras sintéticas|u',
                            '6306.19.10.00.0'=>'- - - De algodón|u',
                            '6306.19.90.00.0'=>'- - - Las demás|u',
                            '6306.22.00.00.0'=>'- - De fibras sintéticas|u',
                            '6306.29.00.00.0'=>'- - De las demás materias textiles|u',
                            '6307.10.00.00.0'=>'- Paños para fregar o lavar (bayetas, paños rejilla), franelas y artículos similares para limpieza|u',
                            '6308.00.00.00.0'=>'Juegos constituidos por piezas de tejido e hilados, incluso con accesorios, para la confección de alfombras, tapicería, manteles o servilletas bordados o de artículos textiles similares, en envases para la venta al por menor.|u',
                            '6401.10.00.00.0'=>'- Calzado con puntera metálica de protección|2u',
                            '6401.92.00.00.0'=>'- - Que cubran el tobillo sin cubrir la rodilla|2u',
                            '6401.99.00.00.0'=>'- - Los demás|2u',
                            '6402.12.00.00.0'=>'- - Calzado de esquí y calzado para la práctica de «snowboard» (tabla para nieve)|2u',
                            '6402.19.00.00.0'=>'- - Los demás|2u',
                            '6402.20.00.00.0'=>'- Calzado con la parte superior de tiras o bridas fijas a la suela por tetones (espigas)|2u',
                            '6402.91.00.00.0'=>'- - Que cubran el tobillo|2u',
                            '6402.99.10.00.0'=>'- - - Con puntera metálica de protección|2u',
                            '6402.99.90.00.0'=>'- - - Los demás|2u',
                            '6403.12.00.00.0'=>'- - Calzado de esquí y calzado para la práctica de «snowboard» (tabla para nieve)|2u',
                            '6403.19.00.00.0'=>'- - Los demás|2u',
                            '6403.20.00.00.0'=>'- Calzado con suela de cuero natural y parte superior de tiras de cuero natural que pasan por el empeine y rodean el dedo gordo|2u',
                            '6403.40.00.00.0'=>'- Los demás calzados, con puntera metálica de protección|2u',
                            '6403.51.00.00.0'=>'- - Que cubran el tobillo|2u',
                            '6403.59.00.00.0'=>'- - Los demás|2u',
                            '6403.91.10.00.0'=>'- - - Calzado con palmilla o plataforma de madera, sin plantillas ni puntera metálica de protección|2u',
                            '6403.91.90.00.0'=>'- - - Los demás|2u',
                            '6403.99.10.00.0'=>'- - - Calzado con palmilla o plataforma de madera, sin plantillas ni puntera metálica de protección|2u',
                            '6403.99.90.00.0'=>'- - - Los demás|2u',
                            '6404.11.10.00.0'=>'- - - Calzado de deporte|2u',
                            '6404.11.20.00.0'=>'- - - Calzado de tenis, baloncesto, gimnasia, entrenamiento y calzados similares|2u',
                            '6404.19.00.00.0'=>'- - Los demás|2u',
                            '6404.20.00.00.0'=>'- Calzado con suela de cuero natural o regenerado|2u',
                            '6405.10.00.00.0'=>'- Con la parte superior de cuero natural o regenerado|2u',
                            '6405.20.00.00.0'=>'- Con la parte superior de materia textil|2u',
                            '6405.90.00.00.0'=>'- Los demás|2u',
                            '6907.21.00.10.0'=>'- - - Sin esmaltar ni barnizar, en los que la superficie mayor pueda inscribirse en un cuadrado de lado superior a 7 cm|m2',
                            '6907.21.00.90.0'=>'- - - Las demás|m2',
                            '6907.22.00.10.0'=>'- - - Sin esmaltar ni barnizar, en los que la superficie mayor pueda inscribirse en un cuadrado de lado superior a 7 cm|m2',
                            '6907.22.00.90.0'=>'- - - Las demás|m2',
                            '6907.23.00.10.0'=>'- - - Sin esmaltar ni barnizar, en los que la superficie mayor pueda inscribirse en un cuadrado de lado superior a 7 cm|m2',
                            '6907.23.00.90.0'=>'- - - Las demás|m2',
                            '6907.30.00.10.0'=>'- - Sin esmaltar ni barnizar, en los que la superficie mayor pueda inscribirse en un cuadrado de lado superior a 7 cm|m2',
                            '6907.40.00.10.0'=>'- - Sin esmaltar ni barnizar, en los que la superficie mayor pueda inscribirse en un cuadrado de lado superior a 7 cm|m2',
                            '7010.90.10.00.0'=>'- - De capacidad superior a 1 l |u',
                            '7010.90.10.00.1'=>'- - BOMBONAS Y BOTELLAS|u',
                            '7010.90.20.00.0'=>'- - De capacidad superior a 0,33 l pero inferior o igual a 1 l|u',
                            '7010.90.20.00.1'=>'- - BOMBONAS Y BOTELLAS|u',
                            '7010.90.30.00.0'=>'- - De capacidad superior a 0,15 l pero inferior o igual a 0,33 l|u',
                            '7010.90.30.00.1'=>'- - BOMBONAS Y BOTELLAS|u',
                            '7210.41.00.00.0'=>'- - Ondulados|Kg',
                            '7210.49.00.00.0'=>'- - Los demás|Kg',
                            '7210.61.00.00.0'=>'- - Revestidos de aleaciones de aluminio y cinc|Kg',
                            '7210.69.00.00.0'=>'- - Los demás|Kg',
                            '7210.70.10.00.0'=>'- - Revestidos previamente de aleaciones de aluminio-cinc|Kg',
                            '7310.21.00.00.0'=>'- - Latas o botes para ser cerrados por soldadura o rebordeado|u',
                            '7612.10.00.00.0'=>'- Envases tubulares flexibles|u',
                            '9403.30.00.00.0'=>'- Muebles de madera de los tipos utilizados en oficinas|u',
                            '9403.40.00.00.0'=>'- Muebles de madera de los tipos utilizados en cocinas|u',
                            '9403.50.00.00.0'=>'- Muebles de madera de los tipos utilizados en dormitorios|u',
                            '9403.60.00.00.0'=>'- Los demás muebles de madera|u',
                            '9403.82.00.00.0'=>'- - De bambú|u',
                            '9403.83.00.00.0'=>'- - De roten (ratán)*|u'
                        );
//                        var_dump($Reader); die('<<<<');
                        foreach ($Reader as $Key => $Row)
                        {
                           if ($Key == 8) {
                               $data['tipo_divisa'] = $Row[12];
                               $data['tipo_cambio_divisa'] = $Row[13];
                           }
                           if ($Key >= 10) { //rows data
                               if (trim($Row[2]) == '' && trim($Row[3]) == '' && trim($Row[4]) == '' && trim($Row[5]) == '' && trim($Row[6]) == '' && trim($Row[7]) == '' && trim($Row[8]) == '' && trim($Row[9]) == '') {
                                   $some = '';
                               }
                               else {
                                   if (trim($Row[2]) != '' && trim($Row[3]) != '' && trim($Row[4]) != '' && trim($Row[5]) != '' && trim($Row[6]) != '' && trim($Row[7]) != '' && trim($Row[8]) != '' && trim($Row[9]) != '') {
                                       if (array_key_exists($Row[2], $subpartidas)) {
                                           $data[$i]['num']=$i;
                                           $data[$i]['subpartida']=$Row[2];
                                           $data[$i]['desc_arancelaria']=$Row[3];
                                           $data[$i]['desc_comercial']=str_replace('"',"'",$Row[4]);
                                           $data[$i]['pais_origen_grid']=$Row[5];
                                           $data[$i]['cantidadgrid']=$Row[6];
                                           $data[$i]['unidad_medida']=$Row[7];
                                           $data[$i]['peso_bruto']=$Row[8];
                                           $data[$i]['precio_unitario_sus']=preg_replace('([^0-9.])', '', $Row[9]);;
                                           $data[$i]['valor_total_sus']=preg_replace('([^0-9.])', '', $Row[10]);;
                                           $data[$i]['precio_unitario_div']=$Row[12];
                                           $data[$i]['valor_total_div']=$Row[13];
                                           $i++;
                                           $key_success[] = $Key+1;
                                       }
                                       else{
                                           $key_error[] = $Key+1;
                                       }
                                   }
                                   else {
                                       $key_error[] = $Key+1;
                                   }
                               }
                           }
                        }
                        $data['success']['rows'] = $key_success;
                        $data['success']['count'] = count($key_success);
                        $data['error']['rows'] = $key_error;
                        $data['error']['count'] = count($key_error);
                        $data['total'] = count($key_success) + count($key_error);
                        echo json_encode($data);
                    }
                }
            }
        }
        if($_REQUEST['tarea']=='guardaSolicitud'){

            $allowedfileExtensions = array('xls', 'xlsx');
            $checkfiles = false;
            if (!$checkfiles || isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                if ($checkfiles) {
                    $fileName = $_FILES['file']['name'];
                    $fileNameCm = explode(".", $fileName);
                    $fileExtension = strtolower(end($fileNameCm));
                    $fileTmpPath = $_FILES['file']['tmp_name'];
                    $fech = date("m-d-h-i-s");
                }
                if (!$checkfiles || in_array($fileExtension, $allowedfileExtensions)) {

                    $uploadFileDir = 'styles/solicitudes/';
                    $autorizacionPrevia->setId_pais_origen($_REQUEST['paises']);
                    $autorizacionPrevia->setId_pais_procedencia($_REQUEST['pais_proc']);
                    $autorizacionPrevia->setId_departamento_destino($_REQUEST['depto']);
                    $autorizacionPrevia->setCantidad_total($_REQUEST['cantidad']);
                    $autorizacionPrevia->setPeso_total($_REQUEST['peso_bruto']);
                    $autorizacionPrevia->setTipo_divisa($_REQUEST['tipo_divisa']);
                    $autorizacionPrevia->setTipo_cambio_divisa($_REQUEST['tipo_cambio_divisa']);
                    $autorizacionPrevia->setValor_total($_REQUEST['fob']);
                    $autorizacionPrevia->setOrigen_recursos($_REQUEST['orig_divisas']);
                    $autorizacionPrevia->setEntidad_bancaria($_REQUEST['ent_bancaria']);
                    $autorizacionPrevia->setNumero_cuenta($_REQUEST['num_cuenta']);
                    $autorizacionPrevia->setTipo_cuenta($_REQUEST['tipo_cuenta']);
                    $autorizacionPrevia->setTipo_cambio($_REQUEST['cambio_empleado']);
                    $autorizacionPrevia->setPersona_autorizada($_REQUEST['pers_autorizada']);
                    $autorizacionPrevia->setFecha_registro(date("Y-m-d H:i:s")); 
                    $autorizacionPrevia->setEstado(3); 
                    $autorizacionPrevia->setId_empresa_importador($_SESSION['id_empresa']);
                    $autorizacion = $sqlAutorizacionPrevia->save($autorizacionPrevia);
		            $corr = 10000 + $autorizacionPrevia->getId_autorizacion_previa();
                    if ($checkfiles) {
                        $dest_path = $uploadFileDir . $corr.'_'.$_SESSION['id_empresa'].'_'.$fech.'.'.$fileExtension;
                        if(move_uploaded_file($fileTmpPath, $dest_path))
                        {
                            echo 1;
                        }
                        else
                        {
                            echo 3;
                        }
                    }
                } else {
                    echo 2;
                }
                
            } else {
                echo 2;
            }
            $detalle = json_decode($_REQUEST['arrayvalue']);
            $arraytmp = [];
            foreach ($detalle as $key => $item) {
                $sqlAutorizacionPreviaDetalle = new SQLAutorizacionPreviaDetalle();
                $autorizacionPreviaDetalle = new autorizacionPreviaDetalle();
                $autorizacionPreviaDetalle->setCodigo_nandina($item->subpartida);
                $autorizacionPreviaDetalle->setDescripcion_arancelaria($item->desc_arancelaria);
                $autorizacionPreviaDetalle->setDescripcion_comercial($item->desc_comercial);
                $autorizacionPreviaDetalle->setPais_origen($item->pais_origen_grid);
                $autorizacionPreviaDetalle->setCantidad($item->cantidadgrid);
                $autorizacionPreviaDetalle->setUnidad_medida($item->unidad_medida);
                $autorizacionPreviaDetalle->setPeso($item->peso_bruto);
                $autorizacionPreviaDetalle->setPrecio_unitario_fob($item->precio_unitario_sus);
                $autorizacionPreviaDetalle->setFob($item->valor_total_sus);
                if ($item->valor_total_div == '')
                    $autorizacionPreviaDetalle->setValor_fob_total_divisa(null);
                else
                    $autorizacionPreviaDetalle->setValor_fob_total_divisa($item->valor_total_div);
                if ($item->precio_unitario_div == '')
                    $autorizacionPreviaDetalle->setPrecio_unitario_fob_divisa(null);
                else
                    $autorizacionPreviaDetalle->setPrecio_unitario_fob_divisa($item->precio_unitario_div);
                $autorizacionPreviaDetalle->setId_autorizacion_previa(intval($autorizacionPrevia->getId_autorizacion_previa()));
                $sqlAutorizacionPreviaDetalle->SaveAutDetalle($autorizacionPreviaDetalle);
                $arraytmp[] = $autorizacionPreviaDetalle;
            }
            exit;
        }

        if($_REQUEST['tarea']=='revisionApi'){
                $vista->display("admEmpresaApi/ColaApiRegistradas.tpl"); 
                exit;
        }
        
        // listar cola AP
        if($_REQUEST['tarea']=='ListarColaApiEmpresa'){
            $vista->display("admEmpresaApi/ColaSolicitudApiImpor.tpl");
            exit;
        }

        if($_REQUEST['tarea']=='listar_personas'){
          $sqlEmpresaImportador = new SQLEmpresaImportador();
          $empresaImportador = new EmpresaImportador();
          $empresaImportador->setId_empresa_importador($_SESSION['id_empresa']);

          $empresaImportador=$sqlEmpresaImportador->getEmpresaPorId($empresaImportador);
          $persona->setId_persona($empresaImportador->getId_representante_legal());
          $persona = $sqlPersona->getDatosPersonaPorId($persona);
    //        print('<pre>'.print_r($lista,true).'</pre>');
            $id_pe1 =$persona->getId_persona();
            $strJson = '';
            echo '[';
            $strJson .= '{"id_persona":"' . $persona->getId_persona().
                        '","nombre":"' . $persona->getNombres() . ' ' . $persona->getPaterno() . ' ' . $persona->getMaterno() .'"},';
            $persona1 = new Persona();
            $persona1->setId_persona($empresaImportador->getId_apoderado());
            $persona1 = $sqlPersona->getDatosPersonaPorId($persona1);
            if($persona1){
                if($id_pe1 != $persona1->getId_persona()){
                    $strJson .= '{"id_persona":"' . $persona1->getId_persona().
                            '","nombre":"' . $persona1->getNombres() . ' ' . $persona1->getPaterno() . ' ' . $persona1->getMaterno() .'"},';
                }
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;
        }
        
        // listar AP por estado por empresa
        if($_REQUEST['tarea']=='ListarApiPorEstado'){

            $autorizacionPrevia = new AutorizacionPrevia();
            $autorizacionPrevia->setId_empresa_importador($_SESSION['id_empresa']);
            $autorizacionPrevia->setEstado($_REQUEST['id_estado']);
            $fecha_comite = '2019-10-04';  //TODO MODIFICAR FECHA PARA COMITES
            $autorizacionPrevia->setFecha_registro($fecha_comite);  
            $sqlAutorizacionPrevia = new SQLAutorizacionPrevia();

            $autorizacionPrevia=$sqlAutorizacionPrevia->getListarAPxEmpresa($autorizacionPrevia);
            $strJson = '';
            echo '[';
            foreach ($autorizacionPrevia as $datos){

                if($datos->getId_autorizacion_previa() > 291 or $datos->getEstado() != 3 ){
                    $pais = new Pais();
                    $sqlPais = new SQLPais();
                    $persona = new Persona();
                    $sqlPersona = new SQLPersona();
                    $pais->setId_pais($datos->getId_pais_procedencia());
                    $pais = $sqlPais->getBuscarDescripcionPorId($pais);
                    $id_autorizado = $datos->getPersona_autorizada();
                    $persona->setId_persona($id_autorizado);
                    $persona = $sqlPersona->getDatosPersonaPorId($persona);
    		        $nro = 10000 + $datos->getId_autorizacion_previa();
                    if ($datos->getEstado() == 1){
                        $estado1 = 'APROBADO';
                    } else if ( $datos->getEstado() == 2){
                        $estado1 = 'RECHAZADO';
                    } else if ( $datos->getEstado() == 3){
                        $estado1 = 'CON REGISTRO';
                    }


                    $strJson .= '{"id_autorizacion":"' . $datos->getId_autorizacion_previa() .
    			'","correlativo":"'.$nro .
                            '","fecha_registro":"'.$datos->getFecha_registro().'"
                            ,"recursos":"'.$datos->getOrigen_recursos().'"
                            ,"estado":"'.$estado1.'"
                            ,"pais_procedencia":"'.$pais->getNombre().'"},';
                            // ,"persona":"'.$persona->getNombres().'"},';
                    $selected='';
                }
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;

        }

        if($_REQUEST['tarea']=='altaNuevaApi'){
            $vista->display("admEmpresaApi/SolicitudApi.tpl");
            exit;
        }

        // listar solicitudes
        if($_REQUEST['tarea']=='ListarApiPendientes'){
            $vista->display("admSolicitudApi/ListaSolicitudApi.tpl");
            exit;
        }

         // listar solicitudes AP 
        if($_REQUEST['tarea']=='ListaSolicitudApi'){

            $autorizacionPrevia = new AutorizacionPrevia();
            // $autorizacionPrevia->setEstado($_REQUEST['id_estado']);
            $sqlAutorizacionPrevia = new SQLAutorizacionPrevia();

            $autorizacionPrevia=$sqlAutorizacionPrevia->getListarAPsinDetalle($autorizacionPrevia);
            $strJson = '';
            echo '[';
            foreach ($autorizacionPrevia as $datos){

                if($datos->getId_autorizacion_previa() > 291 or $datos->getEstado() == 1 ){
                    $pais = new Pais();
                    $sqlPais = new SQLPais();
                    $persona = new Persona();
                    $sqlPersona = new SQLPersona();
                    $pais->setId_pais($datos->getId_pais_procedencia());
                    $pais = $sqlPais->getBuscarDescripcionPorId($pais);
                    $id_autorizado = $datos->getPersona_autorizada();
                    $persona->setId_persona($id_autorizado);
                    $persona = $sqlPersona->getDatosPersonaPorId($persona);
                    $nro = 10000 + $datos->getId_autorizacion_previa();
                    if ($datos->getEstado() == 1){
                        $estado1 = 'APROBADO';
                    } else if ( $datos->getEstado() == 2){
                        $estado1 = 'RECHAZADO';
                    } else if ( $datos->getEstado() == 3){
                        $estado1 = 'CON REGISTRO';
                    }


                    $strJson .= '{"id_autorizacion":"' . $datos->getId_autorizacion_previa() .
                '","correlativo":"'.$nro .
                            '","fecha_registro":"'.$datos->getFecha_registro().'"
                            ,"recursos":"'.$datos->getOrigen_recursos().'"
                            ,"estado":"'.$estado1.'"
                            ,"pais_procedencia":"'.$pais->getNombre().'"},';
                            // ,"persona":"'.$persona->getNombres().'"},';
                    $selected='';
                }
            }
            $strJson = substr($strJson, 0, strlen($strJson) - 1);
            echo $strJson;
            echo ']';
            exit;

        }

        if($_REQUEST['tarea']=='revisa'){

            $autorizacionPrevia = new AutorizacionPrevia();
            $sqlAutorizacionPrevia = new SQLAutorizacionPrevia();
            $id_autorizacion=$_REQUEST['id_autorizacion'];
            $autorizacionPrevia->setId_autorizacion_previa($id_autorizacion);
            $autorizacionPrevia = $sqlAutorizacionPrevia->getAutorizacionPorId($autorizacionPrevia);
            $empresaImportador = new EmpresaImportador();
            $sqlEmpresaImportador = new SQLEmpresaImportador();
            $empresaImportador->setId_empresa_importador($autorizacionPrevia->getId_empresa_importador());
            $empresaImportador=$sqlEmpresaImportador->getEmpresaApiPorID($empresaImportador);
            $autorizacionPreviaDetalle = new AutorizacionPreviaDetalle();
            $sqlAutorizacionPreviaDetalle = new SQLAutorizacionPreviaDetalle();
            $autorizacionPreviaDetalle->setId_autorizacion_previa($id_autorizacion);
            $autorizacionPreviaDetalle = $sqlAutorizacionPreviaDetalle->getAutorizacionDetallePorId($autorizacionPreviaDetalle);
            $vista->assign('autorizacionPrevia', $autorizacionPrevia);
            $vista->assign('empresaRevision', $empresaImportador);
            $vista->assign('id_autorizacion', $id_autorizacion);
            $vista->assign('autorizacionPreviaDetalle', $autorizacionPreviaDetalle);

            $vista->display("admSolicitudApi/RevisaApi.tpl"); 
            exit;

        }

        if($_REQUEST['tarea']=='guardaDeatallex'){

            $allowedfileExtensions = array('xls', 'xlsx');
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $fileName = $_FILES['file']['name'];
                $fileNameCm = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCm));
                $fileTmpPath = $_FILES['file']['tmp_name'];

                if (in_array($fileExtension, $allowedfileExtensions)) {

                    $i = $_REQUEST['id_autorizacion'];
                    $autorizacionPreviaDetalle = new AutorizacionPreviaDetalle();
                    $sqlAutorizacionPreviaDetalle = new sqlAutorizacionPreviaDetalle();
                    $autorizacionPreviaDetalle->setId_autorizacion_previa($i);
                    $autdel = $sqlAutorizacionPreviaDetalle->DeletAutDetalle($autorizacionPreviaDetalle);

                    $inputFileType = PHPExcel_IOFactory::identify($fileTmpPath);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($fileTmpPath);
                    $sheet = $objPHPExcel->getSheet(0); 
                    $highestRow = $sheet->getHighestRow();
                    $highestColumn = $sheet->getHighestColumn();

                    for ($row = 11; $highestRow; $row++){
                        $autorizacionPreviaDetalle = new AutorizacionPreviaDetalle();
                        $sqlAutorizacionPreviaDetalle = new sqlAutorizacionPreviaDetalle();
                        $desc_comercial = $sheet->getCell("E".$row)->getCalculatedValue();
                        $desc_comercial = str_replace("'", " ", $desc_comercial);
                        if ($desc_comercial == '') break; //
                        $subpartida = $sheet->getCell("C".$row)->getCalculatedValue();
                        $desc_arancelaria = $sheet->getCell("D".$row)->getCalculatedValue();

                        $cantidad = $sheet->getCell("F".$row)->getCalculatedValue();
                        $unidad_medida = $sheet->getCell("G".$row)->getCalculatedValue();
                        $peso_bruto = $sheet->getCell("H".$row)->getCalculatedValue();

                        $precio_unitario = $sheet->getCell("I".$row)->getCalculatedValue();
                        $valor_total = $sheet->getCell("J".$row)->getCalculatedValue();

                       $precio_unitario_fob_divisa = $sheet->getCell("L".$row)->getCalculatedValue();
                       
                       $valor_fob_total_divisa = $sheet->getCell("M".$row)->getCalculatedValue();

                       if($unidad_medida == 'u') $unidad_medida = 1;
                       else $unidad_medida = 2;
                        //    $valor_fob_total_divisa = $sheet->getCell("M".$row)->getCalculatedValue();
                        if(!$precio_unitario_fob_divisa && !$valor_fob_total_divisa && $peso_bruto) {
                            $autorizacionPreviaDetalle->setCodigo_nandina($subpartida);
                            $autorizacionPreviaDetalle->setDescripcion_arancelaria($desc_arancelaria);
                            $autorizacionPreviaDetalle->setDescripcion_comercial($desc_comercial);
                            $autorizacionPreviaDetalle->setCantidad($cantidad);
                            $autorizacionPreviaDetalle->setUnidad_medida($unidad_medida);
                            $autorizacionPreviaDetalle->setPeso($peso_bruto);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob($precio_unitario);
                            $autorizacionPreviaDetalle->setFob($valor_total);
                            $autorizacionPreviaDetalle->setId_autorizacion_previa($i);

                        } else if (!$precio_unitario_fob_divisa && !$valor_fob_total_divisa && !$peso_bruto) {
                            $autorizacionPreviaDetalle->setCodigo_nandina($subpartida);
                            $autorizacionPreviaDetalle->setDescripcion_arancelaria($desc_arancelaria);
                            $autorizacionPreviaDetalle->setDescripcion_comercial($desc_comercial);
                            $autorizacionPreviaDetalle->setCantidad($cantidad);
                            $autorizacionPreviaDetalle->setUnidad_medida($unidad_medida);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob($precio_unitario);
                            $autorizacionPreviaDetalle->setFob($valor_total);
                            $autorizacionPreviaDetalle->setId_autorizacion_previa($i);

                        } else if ($precio_unitario_fob_divisa && $valor_fob_total_divisa && !$peso_bruto) {
                            $autorizacionPreviaDetalle->setCodigo_nandina($subpartida);
                            $autorizacionPreviaDetalle->setDescripcion_arancelaria($desc_arancelaria);
                            $autorizacionPreviaDetalle->setDescripcion_comercial($desc_comercial);
                            $autorizacionPreviaDetalle->setCantidad($cantidad);
                            $autorizacionPreviaDetalle->setUnidad_medida($unidad_medida);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob($precio_unitario);
                            $autorizacionPreviaDetalle->setFob($valor_total);
                            $autorizacionPreviaDetalle->setValor_fob_total_divisa($precio_unitario_fob_divisa);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob_divisa($valor_fob_total_divisa);
                            $autorizacionPreviaDetalle->setId_autorizacion_previa($i);

                        } else if (!$precio_unitario_fob_divisa && $valor_fob_total_divisa) {
                            $autorizacionPreviaDetalle->setCodigo_nandina($subpartida);
                            $autorizacionPreviaDetalle->setDescripcion_arancelaria($desc_arancelaria);
                            $autorizacionPreviaDetalle->setDescripcion_comercial($desc_comercial);
                            $autorizacionPreviaDetalle->setCantidad($cantidad);
                            $autorizacionPreviaDetalle->setUnidad_medida($unidad_medida);
                            $autorizacionPreviaDetalle->setPeso($peso_bruto);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob($precio_unitario);
                            $autorizacionPreviaDetalle->setFob($valor_total);
                            $autorizacionPreviaDetalle->setValor_fob_total_divisa($precio_unitario_fob_divisa);
                            $autorizacionPreviaDetalle->setId_autorizacion_previa($i);
                        } else if ($precio_unitario_fob_divisa && !$valor_fob_total_divisa) {
                            $autorizacionPreviaDetalle->setCodigo_nandina($subpartida);
                            $autorizacionPreviaDetalle->setDescripcion_arancelaria($desc_arancelaria);
                            $autorizacionPreviaDetalle->setDescripcion_comercial($desc_comercial);
                            $autorizacionPreviaDetalle->setCantidad($cantidad);
                            $autorizacionPreviaDetalle->setUnidad_medida($unidad_medida);
                            $autorizacionPreviaDetalle->setPeso($peso_bruto);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob($precio_unitario);
                            $autorizacionPreviaDetalle->setFob($valor_total);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob_divisa($valor_fob_total_divisa);
                            $autorizacionPreviaDetalle->setId_autorizacion_previa($i);
                        } else if ($precio_unitario_fob_divisa && $valor_fob_total_divisa) {
                            $autorizacionPreviaDetalle->setCodigo_nandina($subpartida);
                            $autorizacionPreviaDetalle->setDescripcion_arancelaria($desc_arancelaria);
                            $autorizacionPreviaDetalle->setDescripcion_comercial($desc_comercial);
                            $autorizacionPreviaDetalle->setCantidad($cantidad);
                            $autorizacionPreviaDetalle->setUnidad_medida($unidad_medida);
                            $autorizacionPreviaDetalle->setPeso($peso_bruto);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob($precio_unitario);
                            $autorizacionPreviaDetalle->setFob($valor_total);
                            $autorizacionPreviaDetalle->setValor_fob_total_divisa($precio_unitario_fob_divisa);
                            $autorizacionPreviaDetalle->setPrecio_unitario_fob_divisa($valor_fob_total_divisa);
                            $autorizacionPreviaDetalle->setId_autorizacion_previa($i);
                        }

                        $autorizaciond = $sqlAutorizacionPreviaDetalle->SaveAutDetalle($autorizacionPreviaDetalle);

                    }//enf for excel

                    echo 1;
                    exit;

                } else {
                    echo 2;
                }
                
            } else {
                echo 2;
            }
        
            exit;
        }


    }

}