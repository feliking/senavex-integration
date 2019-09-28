<html >
<head>
<meta charset="utf-8">
<title>Sistema de Certificación de Origen - SENAVEX</title>
<meta name="viewport" content="width=device-width, target-densityDpi=device-dpi">
<meta name="author-development" content="Jose Alfredo Arroyo Santa Cruz - jalfredo.arroyo@gmail.com">
<meta name="author-development" content="Renzo Calla Chavez - renzocallachavez@gmail.com">
<meta name="author-development" content="Marcelo Ivo Sanabria Ribera">
<!-- Icono de la aplicación -->
<link rel="shortcut icon" href="styles/img/favicon.ico" type="image/x-icon">
<link rel="icon" href="styles/img/favicon.ico" type="image/x-icon">

<!-- Hojas de Estilo -->
<link href="styles/css/kendo.common.min.css" rel="stylesheet">
<link href="styles/css/kendo.rtl.min.css" rel="stylesheet">
<link href="styles/css/kendo.uniform.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="styles/css-personales/principal.css" media="screen" />
<link rel="stylesheet" type="text/css" href="styles/css-personales/bootstrap.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="styles/css-personales/bootstrap-responsive.min.css" media="screen" />
<link href="styles/css-personales/k-window-bienvenida.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="styles/css-personales/idangerous.swiper.css" media="screen" />

<!-- Scripts JS globales -->
<script src="styles/js/jquery.min.js"></script>
<script src="styles/js/kendo.all.min.js"></script>
<script src="styles/js/cultures/kendo.culture.es-BO.min.js"></script>
<script src="styles/js/messages/kendo.messages.es-ES.min.js"></script>
<script src="styles/js-personales/idangerous.swiper-2.1.min.js"></script> 

<script src="styles/js-personales/principal.js"></script>
</head>

<body>
<?php
define('_ACCESO', 1);
$var = $_REQUEST["datos"];
$ruex = $_REQUEST["ruex"];
//$codigo = $_REQUEST["consulta_codigo"];

include_once('config/Config.php');
include_once('src/Aplicacion.php');

include_once(PATH_TABLA . DS . 'Empresa.php');
include_once(PATH_MODELO . DS . 'SQLEmpresa.php');

$empresa = new Empresa();
$sqlEmpresa = new SQLEmpresa();

$empresa->setCodigo_seguridad($var);
$empresa->setRuex($ruex);
$result = $sqlEmpresa->getEmpresaPorCodigoRUEX_Seguridad($empresa);

?> 
    <div class="cuerpoinicio"><img src="styles/img/logo_intro.png"  >
        <center>
            <div class="row-fluid fadein" style="width:80%;">
                <div class="k-block fadein">
                    <?php  if(empty($var) || empty($ruex)) { ?>
                        <div class="k-header">
                            <div class="titulonegro">CONSULTA EMPRESA RUEX</div>
                        </div>
                        <form name="formbuscarruex" id="formbuscarruex" method="post"  action="index.php"> 
                            <div class="row-fluid " >
                                <div class="span4 hidden-phone"></div>
                                <div class="span2 parametrocentro1">
                                    <input type="text" class="k-textbox" id="ruex" name="ruex" placeholder="Número de Ruex"  required validationMessage="Ingrese Número de RUEX"/>
                                </div>     

                                <div class="span2 parametrocentro1">
                                    <input type="text" class="k-textbox" id="datos" name="datos" placeholder="Código de Seguridad"  required validationMessage="Ingrese el código de seguridad del RUEX"/>
                                </div>
                            </div>

                            <div class="row-fluid " >
                                <div class="span5 hidden-phone" ></div>
                                <div class="span2"> 
                                    <input id="consulta_aceptar" name="consulta_aceptar" type="button"  value= "Buscar" class="k-primary" style="width:100%"/>
                                </div>
                            </div>
                        </form>
                    <script>
                        var validator = $("#formbuscarruex").kendoValidator().data("kendoValidator");
                        
                        $("#consulta_aceptar").kendoButton();
                        var consulta_aceptar = $("#consulta_aceptar").data("kendoButton");
                        consulta_aceptar.bind("click", function(e){
                            if(validator.validate()){
                                window.open('ruex.php?'+ $('#formbuscarruex').serialize(), 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
                            }
                        });
                    </script>
                    <?php } else { ?>
                    <?php if(empty($result)){ ?>
                        <div class="k-header">
                            <div class="titulonegro">DATOS DE LA EMPRESA</div>
                        </div>
                        <br /><br /><br />
                        <div class="titulo">LA EMPRESA CON RUEX <?php echo $ruex?> <br> Y CODIGO DE SEGURIDAD <?php echo $var?> <br>NO ESTA REGISTRADA EN NUESTRO SISTEMA</div>
                        <br /><br /><br />
                    <?php } else{ 
                        include_once(PATH_TABLA . DS . 'CategoriaEmpresa.php');
                        include_once(PATH_TABLA . DS . 'ActividadEconomica.php');
                        include_once(PATH_TABLA . DS . 'TipoEmpresa.php');
                        include_once(PATH_TABLA . DS . 'Departamento.php');
                        include_once(PATH_TABLA . DS . 'Municipio.php');
                        include_once(PATH_TABLA . DS . 'Ciudad.php');
                        include_once(PATH_TABLA . DS . 'Direccion.php');
                        include_once(PATH_TABLA . DS . 'DireccionTipoCalle.php');
                        include_once(PATH_TABLA . DS . 'Persona.php');

                        include_once(PATH_MODELO . DS . 'SQLCategoriaEmpresa.php');
                        include_once(PATH_MODELO . DS . 'SQLActividadEconomica.php');
                        include_once(PATH_MODELO . DS . 'SQLTipoEmpresa.php');
                        include_once(PATH_MODELO . DS . 'SQLDepartamento.php');
                        include_once(PATH_MODELO . DS . 'SQLMunicipio.php');
                        include_once(PATH_MODELO . DS . 'SQLCiudad.php');
                        include_once(PATH_MODELO . DS . 'SQLDireccion.php');
                        include_once(PATH_MODELO . DS . 'SQLDireccionTipoCalle.php');
                        include_once(PATH_MODELO . DS . 'SQLPersona.php');

                        $categoria_empresa =  new CategoriaEmpresa();
                        $actividad_economica = new ActividadEconomica();
                        $tipo_empresa = new TipoEmpresa();
                        $departamento = new Departamento();
                        $municipio = new Municipio();
                        $ciudad = new Ciudad();
                        $direccion = new Direccion();
                        $direccion_tipo_calle = new DireccionTipoCalle();
                        $persona = new Persona();

                        $sqlCategoria_empresa = new SQLCategoriaEmpresa();
                        $sqlActividad_economica = new SQLActividadEconomica();
                        $sqlTipo_empresa = new SQLTipoEmpresa();
                        $sqlDepartamento = new SQLDepartamento();
                        $sqlMunicipio = new SQLMunicipio();
                        $sqlCiudad = new SQLCiudad();
                        $sqlDireccion = new SQLDireccion();
                        $sqlDireccion_tipo_calle = new SQLDireccionTipoCalle();
                        $sqlPersona = new SQLPersona();

                        $categoria_empresa->setId_categoria_empresa($result->getIdCategoria_empresa());
                        $categoria_empresa=$sqlCategoria_empresa->getBuscarDescripcionPorId($categoria_empresa);

                        $actividad_economica->setId_actividad_economica($result->getIdActividad_economica());
                        $actividad_economica=$sqlActividad_economica->getBuscarDescripcionPorId($actividad_economica);

                        $tipo_empresa->setId_tipo_empresa($result->getIDTipo_empresa());
                        $tipo_empresa=$sqlTipo_empresa->getBuscarDescripcionPorId($tipo_empresa);

                        $persona->setId_persona($result->getId_representante_legal());
                        $persona=$sqlPersona->getDatosPersonaPorId($persona);

                        if( $result->getDireccion()!=''){ 
                            $dato = (int) $result->getDireccion(); 
                            $direccion->setId_direccion($dato);
                            $direccion=$sqlDireccion->getDireccionxID($direccion);

                            $departamento->setId_departamento($direccion->getId_departamento());
                            $departamento=$sqlDepartamento->getBuscarDepartamentoPorId($departamento);

                            $municipio->setId_municipio($direccion->getId_municipio());
                            $municipio=$sqlMunicipio->getMunicipioPorID($municipio);

                            $direccion_tipo_calle->setId_direccion_tipo_calle($direccion->getId_direccion_tipo_calle());
                            $direccion_tipo_calle=$sqlDireccion_tipo_calle->getDireccionTipoCalleByID($direccion_tipo_calle);



                        } else {
                            $departamento->setId_departamento($result->getIdDepartamento_Procedencia());
                            $departamento=$sqlDepartamento->getBuscarDepartamentoPorId($departamento);

                            $municipio->setId_municipio($result->getMunicipio());
                            $municipio=$sqlMunicipio->getMunicipioPorID($municipio);

                            $ciudad->setId_ciudad($result->getCiudad());
                            $ciudad=$sqlCiudad->getCiudadPorID($ciudad);
                        }
                        
                        

                    ?>
                    <div class="span12">
                       <div class="k-block fadein">
                           
                            <div class="k-header">
                               <div class="row-fluid  form" >
                                   <div class="span12" >
                                       <div class="titulonegro" > DATOS DE LA EMPRESA</div>  
                                   </div>                                      
                               </div>  
                            </div>
                           
                            <div class="row-fluid " >
                                <div class="span2 parametrocentro1" align="center">
                                    Nombre o Razón Social :
                                </div>
                                <div class="span5 campo1" >
                                    <?php echo $result->getRazon_Social(); ?>
                                </div>  
                                <div class="span2 parametrocentro1" align="center">
                                    NIT :
                                </div>     
                                <div class="span2 campo1" >
                                    <?php echo $result->getNit(); ?>
                                </div> 
                            </div>
                           
                            <div class="row-fluid " >
                                <div class="span2 parametrocentro1" align="center">
                                    Nombre Comercial:
                                </div>     
                                <div class="span5 campo1" >
                                    <?php echo $result->getNombre_comercial(); ?>
                                </div>
                                <?php if($result->getMatricula_Fundempresa()!=''){ ?>
                                        <div class="span2 parametrocentro1" align="center">
                                            Nro. FundEmpresa:
                                        </div>     
                                        <div class="span2 campo1" >
                                            <?php echo $result->getMatricula_Fundempresa(); ?>
                                        </div> 
                                <?php } ?>
                            </div>
                           
                            <div class="row-fluid " >
                                <div class="span2 hidden-phone" ></div>
                                <?php if (!is_null($result->getOea())){ ?>
                                    <div class="span5" align="center">
                                        <b>OPERADOR ECON&Oacute;MICO AUTORIZADO</b>
                                    </div>
                                    <div class="span3" >
                                        <b><?php echo $result->getOea(); ?></b>
                                    </div>
                                <?php } ?>
                            </div>

                            <?php if( $result->getRuex()!=''){ ?>
                                <div class="row-fluid  form " >
                                    <div class="span2 parametrocentro1" align="center">
                                       Ruex:
                                    </div>
                                    <div class="span1 campo1" >
                                        <?php echo $result->getRuex(); ?>
                                    </div>  
                                    <div class="span2 parametrocentro1" align="center">
                                        Vigencia:
                                    </div>     
                                    <div class="span2 campo1" >
                                        <?php echo $result->getVigencia(); ?>
                                    </div> 
                                    <div class="span2 parametrocentro1" align="center">
                                        Fecha Vigencia:
                                    </div>     
                                    <div class="span2 campo1" >
                                    <?php
                                        echo $result->getFecha_renovacion_ruex(); 
                                        if($result->getEstado()==10) echo "<span class='letrarelevanteroja'>&nbsp;&nbsp;Vencido</span>";
                                    ?>
                                    </div> 
                                </div>
                            <?php } ?>
                           
                            <div class="row-fluid  form" >
                                <div class="span2 parametrocentro1" >
                                    Categoría:
                                </div>     
                                <div class="span1 campo1" >
                                    <?php echo $categoria_empresa->getDescripcion(); ?>
                                </div>  
                                <div class="span2 parametrocentro1" >
                                    Actividad Económica:
                                </div>     
                                <div class="span2 campo1" >
                                    <?php echo $actividad_economica->getDescripcion(); ?>
                                </div>       
                                <div class="span2 parametrocentro1" >
                                    Tipo de Empresa:
                                </div>     
                                <div class="span3 campo1" >
                                    <?php echo $tipo_empresa->getDescripcion(); ?>
                                </div>
                            </div>
                       
                            <div class="row-fluid form" >
                                <div class="barra" >                                         
                                </div> 
                            </div> 
                            <!--  Eddy: Verificaremos si la empresa tiene el nuevo formato de direccion -->
                            <?php if( $result->getDireccion()!=''){ ?>

                            <div class="row-fluid  form" >
                                <div class="span2 parametrocentro1">
                                    <b>Departamento:</b>
                                </div>     
                                <div class="span2 campo1" >
                                    <?php echo $departamento->getNombre(); ?>
                                </div>
                                <div class="span2 parametrocentro1" >
                                    <b>Municipio:</b>
                                </div>     
                                <div class="span2 campo1" >
                                    <?php echo $municipio->getDescripcion(); ?>
                                </div>
                                
                            </div>

                            <div class="row-fluid  form" >
                                <div class="span2 parametrocentro1" >
                                   <b> Número de Contacto:</b>
                                </div>     
                                <div class="span2 campo1" >
                                    <?php echo $direccion->getTelefono_fijo(); ?>
                                </div> 

                            </div>

                            <div class="row-fluid  form" >

                                <div class="span2 parametrocentro1">
                                    <b> Domicilio Fiscal:</b>
                                 </div>     
                                 <div class="span5 campo1" >
                                    <?php echo $direccion_tipo_calle->getDescripcion(). ' '. $direccion->getNombre_direccion_tipo_calle() . ' ' . $direccion->getNumero_domicilio(); ?>
                                 </div> 
                                <div class="span2 parametrocentro1" >
                                    <b>Correo Electrónico:</b>
                                </div>     
                                <div class="span3 campo1" >
                                    <?php echo $result->getEmail(); ?>
                                </div> 
                            </div>
                            <!-- Eddy: para el caso que todavia no tenga el nuevo formato de direccion -->
                            <?php } else { ?>   

                           <div class="row-fluid  form" >
                                <div class="span2 parametrocentro1">
                                    <b>Departamento:</b>
                                </div>     
                                <div class="span2 campo1" >
                                    <?php echo $departamento->getNombre(); ?>
                                </div>
                                <div class="span2 parametrocentro1" >
                                    <b>Municipio:</b>
                                </div>     
                                <div class="span2 campo1" >
                                    <?php echo $municipio->getDescripcion(); ?>
                                </div>
                                
                            </div>
                            <div class="row-fluid  form" >
                                <div class="span2 parametrocentro1" >
                                   <b> Número de Contacto:</b>
                                </div>     
                                <div class="span2 campo1" >
                                    <?php echo $result->getNumero_Contacto(); ?>
                                </div> 

                            </div>

                            <div class="row-fluid  form" >

                                <div class="span2 parametrocentro1">
                                    <b> Domicilio Fiscal:</b>
                                 </div>     
                                 <div class="span5 campo1" >
                                    <?php echo $result->getDireccionfiscal(); ?>
                                 </div> 
                                <div class="span2 parametrocentro1" >
                                    <b>Correo Electrónico:</b>
                                </div>     
                                <div class="span3 campo1" >
                                    <?php echo $result->getEmail(); ?>
                                </div> 
                            </div>

                            <?php } ?>

                            <div class="row-fluid  form" >

                                <div class="span2 parametrocentro1">
                                    <b> Representante Legal:</b>
                                 </div>     
                                 <div class="span5 campo1" >
                                    <?php echo $persona->getNombres(). ' '.$persona->getPaterno(). ' '. $persona->getMaterno(); ?>
                                 </div> 
                                <div class="span2 parametrocentro1" >
                                    <b>Correo Electrónico (representante):</b>
                                </div>     
                                <div class="span3 campo1" >
                                    <?php echo $persona->getEmail(); ?>
                                </div> 
                            </div>
                           
                           
                            
                            <div class="row-fluid form" >
                                <div class="barra" >                                         
                                </div> 
                            </div>                
                            <div class="row-fluid  form" >
                               
                                <div class="span12" >
                                    <?php if($result->getEstado()=='0'){ ?>
                                        <span style="font-size:160%;" class='letrarelevanteroja' style><b>Empresa en estado de revisión</b></span>
                                    <?php }elseif($result->getEstado()=='1'){ ?>
                                        <span style="font-size:160%;" class='letrarelevanteroja'><b>Aproxímese a cualquiera de nuestras oficinas con su documentación para completar su registro.</b></span>
                                    <?php }elseif($result->getEstado()=='2'){ ?>
                                        <span style="font-size:160%;" class='letrarelevanteroja'><b>RUEX VIGENTE</b></span>
                                    <?php }elseif($result->getEstado()=='4'){ ?>
                                        <span style="font-size:160%;" class='letrarelevanteroja'><b>En revisi&oacute;n para modificaci&oacute;n de datos.</b></span>
                                    <?php }elseif($result->getEstado()=='6'){ ?>
                                        <span style="font-size:160%;" class='letrarelevanteroja'><b>En revisi&oacute;n para renovaci&oacute;n de RUEX.</b></span>
                                    <?php } ?>
                                </div>
                            </div>
                      
                        </div>
                    </div>
                    <?php } ?> 
                    <!--div class="row-fluid " >
                        <div class="span5 hidden-phone" ></div>
                        <div class="span2"> 
                            <input id="consulta_volver" name="consulta_volver" type="button"  value= "Buscar" class="k-primary" style="width:100%"/>
                        </div>
                    </div-->
                    <script>
                        
                        
                        //$("#consulta_volver").kendoButton();
                        //var consulta_volver = $("#consulta_volver").data("kendoButton");
                        //consulta_volver.bind("click", function(e){  
                            //window.open('ruex.php?ruex.php', 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
                        //});
                    </script>
                    <?php } ?>
                    
                </div>   
            </div>
        </div>
    </center>
   
</div>
</body>




</html>
