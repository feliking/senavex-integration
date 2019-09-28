<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-05 08:15:30
         compiled from "/enex/web1/sitio/web/vista/admDireccion/Direccion_Show.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1860313922586ba029240e78-51995354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe21c9c72b85ad8de21a1522a959273e0d28b8d9' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admDireccion/Direccion_Show.tpl',
      1 => 1493940875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1860313922586ba029240e78-51995354',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586ba02929c768_70373733',
  'variables' => 
  array (
    'ds_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586ba02929c768_70373733')) {function content_586ba02929c768_70373733($_smarty_tpl) {?>
<div class="row-fluid fadein"  id="show_dir_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="show_dir_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" >
    <div >
        <div class="k-cuerpo">
            <div class="row-fluid " >
                <div class="span2 parametro" >Calle/Avenida/Plaza/Otro</div>
                <div class="span2 campo" id="sh_tc_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_tc_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div>
                <div class="span3 parametro" >Nombre Calle/Avenida/Plaza/Otro</div>
                <div class="span4 campo" id="sh_ntc_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_ntc_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div>
            </div>

            <div class="row-fluid " >
                <div class="span2 parametro" >Número de Domicilio</div>
                <div class="span1 campo" id="sh_num_domicilio_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_num_domicilio_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div>
                <div class="span4 parametro" >Nombre del Edificio</div>
                <div class="span3 campo" id="sh_nombre_edif_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_nombre_edif_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div>
                <div class="span1 parametro" >Piso</div>
                <div class="span1 campo" id="sh_piso_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_piso_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div> 
            </div>

            <div class="row-fluid " >
                <div class="span2 parametro" >Dpto/Oficina/Local</div>
                <div class="span2 campo" id="sh_td_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_td_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div>
                <div class="span3 parametro" >Número Dpto/Oficina/Local</div>
                <div class="span2 campo" id="sh_ntd_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_ntd_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div>
            </div>

            <div class="row-fluid " >
                <div class="span2 parametro" >Zona/Barrio/Otro</div>
                <div class="span2 campo" id="sh_tz_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_tz_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div>
                <div class="span3 parametro" >Nombre Zona/Barrio/Otro</div>
                <div class="span3 campo" id="sh_ntz_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_ntz_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div>
            </div>
            <div class="row-fluid " >
                <div class="span2 parametro" >Departamento</div>
                <div class="span2 campo" id="sh_dpto_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_dpto_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div>
                <div class="span2 parametro" >Municipio</div>
                <div class="span3 campo" id="sh_municipio_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_municipio_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div> 
            </div>
            <div class="row-fluid " >
                <div class="span2 parametro" >Teléfono Fijo</div>     
                <div class="span2 campo" id="sh_tfijo_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_tfijo_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div> 
                <div class="span2 parametro" >Teléfono Celular</div>     
                <div class="span2 campo" id="sh_tcel_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_tcel_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div> 
                <div class="span2 parametro" >Teléfono Fax</div>     
                <div class="span2 campo" id="sh_tfax_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_tfax_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div> 
            </div>
            <div class="row-fluid " >
                <div class="span2 parametro" >Dirección Descriptiva</div>     
                <div class="span9 campo" id="sh_dir_desc_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
" name="sh_dir_desc_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
">                </div>
            </div>
        </div>
    </div>    
</div>
<?php echo '<script'; ?>
>
    $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admDireccion&tarea=get_data_direccion&id_direccion=<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
',
            success: function (data) {
                var dt=eval("("+data+")");
                $('#sh_tc_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].tipo_calle);
                $('#sh_ntc_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].nombre_tipo_calle);
                
                $('#sh_num_domicilio_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].numero_domicilio);
                $('#sh_nombre_edif_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].nombre_edificio);
                $('#sh_piso_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].piso);
                $('#sh_td_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].tipo_dpto);
                $('#sh_ntd_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].numero_tipo_dpto);
                $('#sh_tz_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].tipo_zona);
                $('#sh_ntz_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].nombre_tipo_zona);
                $('#sh_dpto_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].dpto);
                $('#sh_municipio_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].municipio);
                $('#sh_tfijo_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].tfijo);
                $('#sh_tcel_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].tcel);
                $('#sh_tfax_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].tfax);
                $('#sh_dir_desc_<?php echo $_smarty_tpl->tpl_vars['ds_id']->value;?>
').html(dt[0].dir_descript);
           }
        });
<?php echo '</script'; ?>
>
<?php }} ?>
