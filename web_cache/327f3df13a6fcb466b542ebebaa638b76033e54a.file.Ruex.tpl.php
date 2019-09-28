<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-06 11:44:50
         compiled from "/enex/web1/sitio/web/vista/ruex/Ruex.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166740376257cee472ccfd43-96573212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '327f3df13a6fcb466b542ebebaa638b76033e54a' => 
    array (
      0 => '/enex/web1/sitio/web/vista/ruex/Ruex.tpl',
      1 => 1472763128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166740376257cee472ccfd43-96573212',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'empresa' => 0,
    'afiliaciones_val' => 0,
    'municipio' => 0,
    'ciudad' => 0,
    'ico' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cee472d7c3f8_40681572',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cee472d7c3f8_40681572')) {function content_57cee472d7c3f8_40681572($_smarty_tpl) {?><div class="row-fluid  form" >
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
               <div class="row-fluid " >
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
                        Codigo NIT:
                    </div>     
                    <div class="span2 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->certificacionnit;?>

                    </div> 
                </div>
                <div class="row-fluid " >
                    <div class="span7 hidden-phone" ></div>
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->matricula_fundempresa) {?>
                        <div class="span2 parametro" >
                            Nro. FundEmpresa:
                        </div>     
                        <div class="span2 campo" >
                           <?php echo $_smarty_tpl->tpl_vars['empresa']->value->matricula_fundempresa;?>

                        </div> 
                    <?php }?>
                    
                </div>
              <?php if ($_smarty_tpl->tpl_vars['empresa']->value->matricula_fundempresa||$_smarty_tpl->tpl_vars['empresa']->value->menor_cuantia==1||$_smarty_tpl->tpl_vars['empresa']->value->oea||$_smarty_tpl->tpl_vars['empresa']->value->frecuente!=1) {?>
                <div class="row-fluid " >
                    <div class="span2 hidden-phone" ></div>
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->oea) {?>
                        <div class="span3" >
                            <b>OPERADOR ECON&Oacute;MICO AUTORIZADO</b>
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
                <?php if ($_smarty_tpl->tpl_vars['empresa']->value->ruex) {?>
                <div class="row-fluid  form " >
                    <div class="span2 parametro" >
                       Ruex:
                    </div>     
                    <div class="span2 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->ruex;?>

                    </div>  
                    <div class="span2 parametro" >
                        Vigencia:
                    </div>     
                    <div class="span2 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->vigencia;?>
              
                    </div> 
                    <div class="span2 parametro" >
                        Fecha Vigencia:
                    </div>     
                    <div class="span2 campo" >
                      <?php echo $_smarty_tpl->tpl_vars['empresa']->value->fecha_renovacion_ruex;?>
 <?php if ($_smarty_tpl->tpl_vars['empresa']->value->estado==10) {?><span class='letrarelevanteroja'>Vencido</span><?php }?> 
                    </div> 
                </div>
                <?php }?>   
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                       Categoria:
                    </div>     
                    <div class="span2 campo" >
                         <?php echo $_smarty_tpl->tpl_vars['empresa']->value->idcategoria_empresa;?>

                    </div>  
                    <div class="span2 parametro" >
                        Actividad Economica:
                    </div>     
                    <div class="span2 campo" >
                      <?php echo $_smarty_tpl->tpl_vars['empresa']->value->idactividad_economica;?>

                    </div> 
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->idtipo_empresa) {?>      
                        <div class="span2 parametro" >
                            Tipo de Empresa:
                        </div>     
                        <div class="span2 campo" >
                           <?php echo $_smarty_tpl->tpl_vars['empresa']->value->idtipo_empresa;?>
                   
                        </div> 
                    <?php }?>
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
                    <div class="span2 parametro" >
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
                    
                    <div class="span2 parametro" >
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
                    <div class="span2 parametro" >
                        <b>Departamento:</b>
                    </div>     
                    <div class="span2 campo" >
                      <?php echo $_smarty_tpl->tpl_vars['empresa']->value->iddepartamento_procedencia;?>

                    </div>
                    <div class="span2 parametro" >
                        <b>Municipio:</b>
                    </div>     
                    <div class="span2 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['municipio']->value;?>

                    </div>
                    <div class="span2 parametro" >
                        <b>Ciudad:</b>
                    </div>     
                    <div class="span2 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['ciudad']->value;?>

                    </div>
                </div>
                
                <div class="row-fluid  form" >
                    
                    
                    <div class="span2 parametro" >
                        <b> Domicilio Fiscal:</b>
                     </div>     
                     <div class="span8 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->direccionfiscal;?>

                     </div> 
                    
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 parametro" >
                       <b> Telf/Cel de Contacto:</b>
                    </div>     
                    <div class="span2 campo" >
                       <?php echo $_smarty_tpl->tpl_vars['empresa']->value->numero_contacto;?>

                    </div> 
                                      
               
                    <div class="span2 parametro" >
                        <b>Correo Electronico:</b>
                    </div>     
                    <div class="span5 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->email;?>

                    </div> 
                </div>
                <?php if ($_smarty_tpl->tpl_vars['empresa']->value->pagina_web||$_smarty_tpl->tpl_vars['empresa']->value->fax) {?>
                <div class="row-fluid  form" >    
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->fax) {?>
                    <div class="span2 parametro" >
                        <b> Fax:</b>
                    </div>     
                    <div class="span2 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresa']->value->fax;?>

                    </div>    
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['empresa']->value->pagina_web) {?>
                            <div class="span2 parametro" >
                              <b>Pagina:</b>
                            </div>     
                            <div class="span5 campo" >
                                <?php echo $_smarty_tpl->tpl_vars['empresa']->value->pagina_web;?>

                            </div>  
                    <?php }?> 
                    
                </div>
                <?php }?>
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
                        <div class="span9 campo" >
                            <?php echo $_smarty_tpl->tpl_vars['ico']->value->ico;?>

                        </div>  
                    </div>
                <?php }?>  
                <?php if ($_smarty_tpl->tpl_vars['empresa']->value->nim) {?>
                    <div class="row-fluid  form" >
                        <div class="span3 parametro" >
                            <b>Numero de Identificación Minera:</b>
                        </div>     
                        <div class="span9 campo">
                            <?php echo $_smarty_tpl->tpl_vars['empresa']->value->nim;?>

                        </div>  
                    </div>
                <?php }?>    
                <div class="row-fluid  form" >
                    <div class="span4" >
                    </div>  
                    <div class="span4" >
                        <?php if ($_smarty_tpl->tpl_vars['empresa']->value->estado=='0') {?>
                            <b>Empresa en estado de revisión</b>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['empresa']->value->estado=='1') {?>
                            <b>Aproximese a cualquiera de nuestras oficinas con su documentación para completar su registro.</b>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['empresa']->value->estado=='4') {?>
                            <b>En revisi&oacute;n para modificaci&oacute;n de datos.</b>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['empresa']->value->estado=='6') {?>
                            <b>En revisi&oacute;n para renovasi&oacute;n de RUEX.</b>
                        <?php }?>
                    </div>  
                    <div class="span3" >
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
        placeholder:"Afiliaciones",
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
>    <?php }} ?>
