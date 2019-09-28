<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-05 08:24:23
         compiled from "/enex/web1/sitio/web/vista/ruex/EmpresaRuex.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157195172157cedb0714e516-43709472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6bedf8d011231f7b7427f432856eae9a12629388' => 
    array (
      0 => '/enex/web1/sitio/web/vista/ruex/EmpresaRuex.tpl',
      1 => 1493940915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157195172157cedb0714e516-43709472',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cedb072122d8_11068052',
  'variables' => 
  array (
    'empresa' => 0,
    'municipio' => 0,
    'ciudad' => 0,
    'afiliaciones_val' => 0,
    'ico' => 0,
    'personal' => 0,
    'persona' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cedb072122d8_11068052')) {function content_57cedb072122d8_11068052($_smarty_tpl) {?><div class="row-fluid  form" >
    <div class="row-fluid "  id="revisarempresatemporal" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > <?php echo $_smarty_tpl->tpl_vars['empresa']->value->razon_social;?>
 - RUEX:<?php echo $_smarty_tpl->tpl_vars['empresa']->value->ruex;?>
</div>  
                        </div>                                      
                    </div>  
                </div>
            <?php if ($_smarty_tpl->tpl_vars['empresa']->value->estado==4) {?>
            <div class="row-fluid ">
                <div class="span12 parametro" >
                    EMPRESA CON SOLICITUD DE MODIFICACIÓN DE DATOS RUEX, REPRESENTANTE LEGAL O DIRECCIÓN 
                </div>     
                
            </div>
            <?php }?>
            <div class="row-fluid ">
                <div class="span2 parametro" >
                    Nombre o Razon Social:
                </div>     
                <div class="span5 campo" >
                    <?php echo $_smarty_tpl->tpl_vars['empresa']->value->razon_social;?>
 
                </div>  
                <div class="span2 parametro" >
                    NIT:
                </div>     
                <div class="span2 campo" >
                    <?php echo $_smarty_tpl->tpl_vars['empresa']->value->nit;?>

                </div> 
            </div>
            <div class="row-fluid " >
                <div class="span2 parametro" >
                    Nombre Comercial:
                </div>     
                <div class="span5 campo" >
                    <?php echo $_smarty_tpl->tpl_vars['empresa']->value->nombre_comercial;?>
 
                </div>
                <div class="span2 parametro" >
                    Codigo de certif. de NIT:
                </div>     
                <div class="span2 campo" >
                    <?php echo $_smarty_tpl->tpl_vars['empresa']->value->certificacionnit;?>

                </div> 
            </div>
            <div class="row-fluid " >
                
                <?php if ($_smarty_tpl->tpl_vars['empresa']->value->ico) {?>
                    <div class="span5 hidden-phone" ></div>
                    <div class="span1 parametro" > Nro ICO </div>
                    <div class="span1 campo" > <?php echo $_smarty_tpl->tpl_vars['empresa']->value->ico;?>
 </div>
                <?php } else { ?>
                    <div class="span7 hidden-phone" ></div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['empresa']->value->matricula_fundempresa||$_smarty_tpl->tpl_vars['empresa']->value->menor_cuantia=="1"||$_smarty_tpl->tpl_vars['empresa']->value->oea||$_smarty_tpl->tpl_vars['empresa']->value->frecuente!='1') {?>
                   
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->matricula_fundempresa) {?>
                        <div class="span2 parametro" >
                            Nro. FundEmpresa:
                        </div>     
                        <div class="span2 campo" >
                           <?php echo $_smarty_tpl->tpl_vars['empresa']->value->matricula_fundempresa;?>

                        </div> 
                    <?php }?>
                <?php }?>
                
            </div>
            <div class="row-fluid form" >
                
            </div>  
            <?php if ($_smarty_tpl->tpl_vars['empresa']->value->matricula_fundempresa||$_smarty_tpl->tpl_vars['empresa']->value->menor_cuantia=="1"||$_smarty_tpl->tpl_vars['empresa']->value->oea||$_smarty_tpl->tpl_vars['empresa']->value->frecuente!='1') {?>
                <div class="row-fluid " >
                    <div class="span2 hidden-phone" ></div>
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->oea) {?>
                        <div class="span3" >
                            <b>OPERADOR ECON&Oacute;MICO AUTORIZADO <?php echo $_smarty_tpl->tpl_vars['empresa']->value->oea;?>
</b>
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->menor_cuantia=="1") {?>
                        <div class="span3" >
                            <b>Empresa registrada de menor cuantia.</b>
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->frecuente!="1") {?>  
                        <!--div class="span3" >
                            <b>Exportador no habitual.</b>
                        </div-->  
                    <?php }?> 
                </div>
            <?php }?>
            <div class="row-fluid form" >
                <!--div class="span2 parametro" >
                   Ruex:
                </div>     
                <div class="span2 campo" >
                     <?php echo $_smarty_tpl->tpl_vars['empresa']->value->ruex;?>

                </div-->  
            </div>
            <div class="row-fluid  form" >
                                 
                <div class="span2 parametro" >
                    Actividad Economica:
                </div>     
                <div class="span3 campo" >
                  <?php echo $_smarty_tpl->tpl_vars['empresa']->value->idactividad_economica;?>

                </div> 
                <div class="span2 parametro" >
                    Vigencia:
                </div>     
                <div class="span2 campo" >
                   <?php echo $_smarty_tpl->tpl_vars['empresa']->value->vigencia;?>
                   
                </div> 
                <div class="span1 parametro" >
                   Categoria:
                </div>     
                <div class="span1 campo" >
                     <?php echo $_smarty_tpl->tpl_vars['empresa']->value->idcategoria_empresa;?>

                </div>
            </div> 
            <div class="row-fluid  form" >
                <?php if ($_smarty_tpl->tpl_vars['empresa']->value->idtipo_empresa) {?>      
                    <div class="span2 parametro" >
                        Tipo de Empresa:
                    </div>     
                    <div class="span3 campo" >
                       <?php echo $_smarty_tpl->tpl_vars['empresa']->value->idtipo_empresa;?>
                   
                    </div> 
                <?php }?>
                <div class="span2 parametro" >
                    Fecha Vigencia:
                </div>     
                <div class="span2 campo" >
                  <?php echo $_smarty_tpl->tpl_vars['empresa']->value->fecha_renovacion_ruex;?>

                </div> 
            </div>
            <div class="row-fluid form" >
                <div class="barra" >                                         
                </div> 
            </div> 
            <!--div class="row-fluid  form" >
                <div class="span2 parametro" >
                    <b>Departamento:</b>
                </div>     
                <div class="span2 campo" >
                  <?php echo $_smarty_tpl->tpl_vars['empresa']->value->iddepartamento_procedencia;?>

                </div>
                <div class="span1 parametro" >
                    <b>Municipio:</b>
                </div>     
                <div class="span2 campo" >
                    <?php echo $_smarty_tpl->tpl_vars['municipio']->value;?>

                </div>
                <div class="span1 parametro" >
                    <b>Ciudad:</b>
                </div>     
                <div class="span2 campo" >
                    <?php echo $_smarty_tpl->tpl_vars['ciudad']->value;?>

                </div>         
            </div-->
            <div class="row-fluid  form" >

                <div class="span2 parametro" >
                    <b> Domicilio Fiscal(Antigüo):</b>
                 </div>     
                 <div class="span8 campo" >
                    <?php echo $_smarty_tpl->tpl_vars['empresa']->value->direccionfiscal;?>

                 </div> 
                

            </div>
                <div class="row-fluid form" >
                <div class="barra" >                                         
                </div> 
            </div> 
                <div class="row-fluid  form" >
                    <?php $_smarty_tpl->tpl_vars["ds_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresa']->value->direccion, null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Show.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


                </div>
            <div class="row-fluid  form" >
                <!--div class="span2 parametro" >
                    <b> Telf/Cel Contacto:</b>
                </div>     
                <div class="span2 campo" >
                    <?php echo $_smarty_tpl->tpl_vars['empresa']->value->numero_contacto;?>

                </div--> 
                <div class="span2 parametro" >
                    <b>Correo Electronico:</b>
                </div>     
                <div class="span8 campo" >
                    <?php echo $_smarty_tpl->tpl_vars['empresa']->value->email;?>

                </div> 
            </div>
            
            <div class="row-fluid  form" > 
                
                    <div class="span2 parametro" >
                      <b>Pagina:</b>
                    </div>     
                    <div class="span8 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->pagina_web;?>

                    </div>  
               
            </div>
           
            <div class="row-fluid form" >
                <div class="barra" >                                         
                </div> 
            </div> 
            <div class="row-fluid  form" >
                <div class="span1 hidden-phone" ></div>
                <div class="span3 parametro" >
                   Año de Fundacion:
                </div>     
                <div class="span2 campo" >
                     <?php echo $_smarty_tpl->tpl_vars['empresa']->value->date_fundacion;?>

                </div> 
                <div class="span3 parametro" >
                    latitud(coordenadas):
                </div>     
                <div class="span2 campo" >
                     <?php echo $_smarty_tpl->tpl_vars['empresa']->value->coordenada_lat;?>

                </div> 
            </div> 
            <div class="row-fluid  form" >
                <div class="span1 hidden-phone" ></div>
                <div class="span3 parametro" >
                   Año de inicio de Operaciones:
                </div>     
                <div class="span2 campo" >
                     <?php echo $_smarty_tpl->tpl_vars['empresa']->value->date_inicio_operaciones;?>

                </div> 
                
                <div class="span3 parametro" >
                   longitud(coordenadas):
                </div>     
                <div class="span2 campo" >
                     <?php echo $_smarty_tpl->tpl_vars['empresa']->value->coordenada_long;?>

                </div> 
            </div> 
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                      Descripcion de la Empresa
                    </div>     
                    <div class="span9 campo" >
                         <?php echo $_smarty_tpl->tpl_vars['empresa']->value->descripcion_empresa;?>

                    </div> 
                </div>                
            <div class="row-fluid form" >
                <div class="span2 parametro" >
                    Afiliaciones:
                </div>     
                <div class="span9" >
                    <input type="hidden" name="afiliaciones_values" id="afiliaciones_values" value="<?php echo $_smarty_tpl->tpl_vars['afiliaciones_val']->value;?>
" />
                    <input style="width:100%;" id="afiliaciones" name="afiliaciones">
                </div> 
            </div>
                    
             <div class="row-fluid form" >
                <div class="barra" >                                         
                </div> 
            </div> 
                <div class="row-fluid  form" >
                    <div class="span3 parametro" >
                        <b>Rubro de Exportaciones:</b>
                    </div>     
                    <div class="span9 campo" >
                       <?php echo $_smarty_tpl->tpl_vars['empresa']->value->idrubro_exportaciones;?>

                    </div>  
                </div>
                <?php if ($_smarty_tpl->tpl_vars['ico']->value->ico) {?>
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            <b>Numero ICO:</b>
                        </div>     
                        <div class="span5 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['ico']->value->ico;?>

                        </div>  
                    </div>
                <?php }?>  
                <?php if ($_smarty_tpl->tpl_vars['empresa']->value->nim) {?>
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            <b>Numero de Identificación Minera:</b>
                        </div>     
                        <div class="span9 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['empresa']->value->nim;?>

                        </div>  
                    </div>
                <?php }?>  
                <?php if (count($_smarty_tpl->tpl_vars['personal']->value)!=0) {?>                
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid" >
                    <div class="span12 parametro" >
                        <center>Personal de la Empresa</center>
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <?php  $_smarty_tpl->tpl_vars['persona'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['persona']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['personal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['persona']->key => $_smarty_tpl->tpl_vars['persona']->value) {
$_smarty_tpl->tpl_vars['persona']->_loop = true;
?>
                    <div class="row-fluid selectpersona" onclick="anadir('<?php echo $_smarty_tpl->tpl_vars['persona']->value['perfil'];?>
','admPersona','verPersona&id_persona=<?php echo $_smarty_tpl->tpl_vars['persona']->value['id_persona'];?>
')" >
                        <div class="selectpersona">  
                        <div class="span1 parametro" >
                          Nombre:
                        </div>     
                        <div class="span3 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value['nombres'];?>
 
                        </div>  
                        <div class="span1 parametro" >
                          Documento:
                        </div>     
                        <div class="span2 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value['numero_documento'];?>
 
                        </div>  
                        <div class="span1 parametro" >
                          Perfil:
                        </div>     
                        <div class="span3 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['persona']->value['perfil'];
if ($_smarty_tpl->tpl_vars['persona']->value['id_persona']==$_smarty_tpl->tpl_vars['empresa']->value->id_representante_legal) {?> RESPONSABLE <?php }?>
                        </div> 
                        </div>
                        <div class="span1" >
                         <?php if ($_smarty_tpl->tpl_vars['persona']->value['id_perfil']=='3'||$_smarty_tpl->tpl_vars['persona']->value['id_perfil']=='2') {?>
                             <a href='index.php?opcion=impresionFirmaRuex&tredrt=<?php echo $_smarty_tpl->tpl_vars['persona']->value['id_persona'];?>
&sdfercw=<?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
' target='_blank'>
                             <input type="button" value="Firmar" class="k-button " style="width:100%;height:20px; font-size: 12px;padding-top:0px;margin-top:0px;"/>
                             </a>
                         <?php }?>
                        </div>
                    </div>                    
                <?php } ?>
                <?php }?>
                <div class="row-fluid " >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid" >
                    <div class="span11 " >
                    </div>  
                    <div class="span1 " >
                         <?php if ($_smarty_tpl->tpl_vars['empresa']->value->estado=='2'||$_smarty_tpl->tpl_vars['empresa']->value->estado=='4'||$_smarty_tpl->tpl_vars['empresa']->value->estado=='6'||$_smarty_tpl->tpl_vars['empresa']->value->estado=='9') {?>
                        <div class="menucf">
                            <a href='index.php?opcion=impresionRuex&tarea=ImpresionRuex&id_empresa=<?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
' target='_blank'><img src="styles/img/imp_b.png"   class="menubottom ayuda"></a>
                            <a href='index.php?opcion=impresionRuex&tarea=ImpresionRuex&id_empresa=<?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
' target='_blank'><img src="styles/img/imp.png"    class="menutop ayuda"></a>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>                       
</div>  
<?php echo '<script'; ?>
>
   
    $("#afiliaciones").kendoMultiSelect({
        placeholder:"Sin Afiliaciones",
        dataTextField: "descripcion",
        dataValueField: "id_empresa_afiliacion",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admEmpresaTemporal&tarea=listarAfiliaciones"
                }
            }
        },
    });
   
    var multiSelect = $("#afiliaciones").data("kendoMultiSelect"),
            setValue = function(e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.dataSource.filter({}); //clear applied filter before setting value

                    multiSelect.value($("#afiliaciones_values").val().split(","));
                }
            },
            setSearch = function (e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    multiSelect.search($("#word").val());
                }
            };
    multiSelect.enable(false);
    this.onload(setValue($('#afiliaciones_values').val()));
    
<?php echo '</script'; ?>
>  <?php }} ?>
