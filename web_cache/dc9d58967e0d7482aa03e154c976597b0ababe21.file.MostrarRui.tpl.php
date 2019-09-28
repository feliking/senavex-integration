<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-03 09:39:59
         compiled from "/enex/web1/sitio/web/vista/admEmpresaApi/MostrarRui.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20679949785d6e6d2fe987a0-17281767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc9d58967e0d7482aa03e154c976597b0ababe21' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admEmpresaApi/MostrarRui.tpl',
      1 => 1566939354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20679949785d6e6d2fe987a0-17281767',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'empresaRevision' => 0,
    'direccionRevision' => 0,
    'paisr' => 0,
    'tipodocr' => 0,
    'empresaRRLL' => 0,
    'expedidor' => 0,
    'paisa' => 0,
    'tipodoca' => 0,
    'empresaApoderado' => 0,
    'expedidoa' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d6e6d2ff2bd58_59494057',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6e6d2ff2bd58_59494057')) {function content_5d6e6d2ff2bd58_59494057($_smarty_tpl) {?><div class="row-fluid fadein"  id="asignacionrui<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" >
    <div class="k-block">
        <div class="k-header">
            <div class="titulonegro">Mi RUI - SENAVEX - <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->rui;?>
</div> 
        </div>   
        <div class="k-cuerpo"> 
            <fieldset >
                <legend>1. DATOS DE LA EMPRESA</legend>
                <div class="row-fluid " >
                    <div class="span3 " >
                        PADRON IMPORTADOR:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->padron_importador;?>

                    </div> 
                    <div class="span3" >
                        Nombre o Razon Social:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->razon_social;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        NIT:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->nit;?>

                    </div> 
                    <div class="span3" >
                        Nº Testimonio de Constitución:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->testimonio_constitucion;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Nº Licencia de Funcionamiento:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->patente_municipal;?>

                    </div> 
                    <div class="span3" >
                        Nº Matricula de Comercio:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->matricula_fundempresa;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Fecha de Vencimiento de la Matricula de Comercio:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->vencimiento_fundempresa;?>

                    </div> 
                    <div class="span3" >
                        La empresa es Unipersonal:
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->unipersonal;?>
 
                    </div>  
                </div>
            </fieldset>
            <fieldset >
                <legend>2. UBICACION GEOGRAFICA</legend>
                <div class="row-fluid " >
                    <?php $_smarty_tpl->tpl_vars["direccionRevision"] = new Smarty_variable($_smarty_tpl->tpl_vars['direccionRevision']->value, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["ds_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresaRevision']->value->id_direccion, null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Show.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>   
            </fieldset>
            <fieldset >
                <legend>3. IFORMACION DEL PROPIETARIO O REPRESENTANTE LEGAL</legend>
                
                <div class="row-fluid " >
                    <div class="span3" >
                        Pais
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['paisr']->value->nombre;?>

                    </div> 
                    <div class="span3" >
                        Tipo de Documento de Identidad
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['tipodocr']->value->descripcion;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Numero de Documento de Identidad
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->numero_documento;?>

                    </div> 
                    <div class="span3" >
                        Expedido
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['expedidor']->value->sigla;?>
  
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Nombres
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->nombres;?>

                    </div> 
                    <div class="span3" >
                        Primer Apellido
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->paterno;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Segundo Apellido
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->materno;?>

                    </div> 
                    <div class="span3" >
                        Correo Electronico
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->email;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Testimonio o Poder
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->testimonio_poder_representante;?>

                    </div> 
                    <div class="span3" >
                        Fecha de Vecimiento de su Carnet de Identidad
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->vencimiento_documento;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3" >
                        Sexo
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRRLL']->value->genero;?>

                    </div> 
                      
                </div>
                <div class="row-fluid " >
                    <?php $_smarty_tpl->tpl_vars["direccionRRLL"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresaRRLL']->value, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["ds_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresaRRLL']->value->direccion, null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Show.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>  
            </fieldset>
            <fieldset >
                <legend>4. INFORMACION DEL APODERADO</legend>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Pais
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['paisa']->value->nombre;?>

                    </div> 
                    <div class="span3 " >
                        Tipo de Documento de Identidad
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['tipodoca']->value->descripcion;?>
  
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Numero de Documento de Identidad
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaApoderado']->value->numero_documento;?>

                    </div> 
                    <div class="span3 " >
                        Expedido
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['expedidoa']->value->sigla;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Nombres
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaApoderado']->value->nombres;?>

                    </div> 
                    <div class="span3 " >
                        Primer Apellido
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaApoderado']->value->paterno;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Segundo Apellido
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaApoderado']->value->materno;?>

                    </div> 
                    <div class="span3 " >
                        Correo Electronico
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaApoderado']->value->email;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Testimonio o Poder
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->testimonio_poder_apoderado;?>

                    </div> 
                    <div class="span3 " >
                        Fecha de Vecimiento de su Carnet de Identidad
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaApoderado']->value->vencimiento_documento;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <div class="span3 " >
                        Sexo
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaApoderado']->value->genero;?>

                    </div> 
                    <div class="span3 " >
                        Fecha de Vecimiento de su Testimonio o Poder
                    </div>     
                    <div class="span3 campo" >
                        <?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->vencimiento_poder_apoderado;?>
 
                    </div>  
                </div>
                <div class="row-fluid " >
                    <?php $_smarty_tpl->tpl_vars["direccionApoderado"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresaApoderado']->value, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["ds_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['empresaApoderado']->value->direccion, null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ("admDireccion/Direccion_Show.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>    
            </fieldset>    
        </div>
        <div class="row-fluid form" >
            <div class="barra" >                                         
            </div> 
        </div>
        <fieldset >
            <legend>REVISION</legend>                           
            <div class="row-fluid  form" >
                <div class="span12 parametro" style="text-align: left;" >

                        <center>OBSERVACIONES</center>
                </div> 
            </div>       
            <div class="row-fluid  form" >
                <div class="span12 " > 
                    <textarea id="editorr_soporte"  >
                    </textarea> 
                </div>
            </div>
            <div class="row-fluid" id="notificacionobservacionr<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                <div class="span4 " >
                </div>
                <div class="span4 " > 
                    <div class="span1 " >
                        <div class="menucf">
                            <a href='index.php?opcion=ImpresionCertificadoRui&tarea=ImpresionCertificadoRui&id_empresa=<?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->id_empresa_importador;?>
' target='_blank'><img src="styles/img/imp_b.png"   class="menubottom ayuda"></a>
                            <a href='index.php?opcion=ImpresionCertificadoRui&tarea=ImpresionCertificadoRui&id_empresa=<?php echo $_smarty_tpl->tpl_vars['empresaRevision']->value->id_empresa_importador;?>
' target='_blank'><img src="styles/img/imp.png"    class="menutop ayuda"></a>
                        </div>
                    </div>
                </div>

            </div>
        </fieldset>
    </div>    
</div>
<?php echo '<script'; ?>
>
    var editorr = $("#editorr_soporte").kendoEditor({
        tools: []
        }).data("kendoEditor"); 

<?php echo '</script'; ?>
>
<?php }} ?>
