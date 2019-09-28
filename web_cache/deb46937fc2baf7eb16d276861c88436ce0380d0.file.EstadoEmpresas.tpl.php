<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-08-09 11:05:27
         compiled from "/enex/web1/sitio/web/vista/admEstadoEmpresas/EstadoEmpresas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:943183320580f6b8b3771a6-33163602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'deb46937fc2baf7eb16d276861c88436ce0380d0' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admEstadoEmpresas/EstadoEmpresas.tpl',
      1 => 1493940878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '943183320580f6b8b3771a6-33163602',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_580f6b8b3c7a67_04743247',
  'variables' => 
  array (
    'empresasestado' => 0,
    'empresa' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580f6b8b3c7a67_04743247')) {function content_580f6b8b3c7a67_04743247($_smarty_tpl) {?><div class="row-fluid  form" > 
    <div id="empresasestado" class="fadein"></div>
</div>    
 <?php echo '<script'; ?>
>
 var empresasestado = [
<?php  $_smarty_tpl->tpl_vars['empresa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['empresa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['empresasestado']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->key => $_smarty_tpl->tpl_vars['empresa']->value) {
$_smarty_tpl->tpl_vars['empresa']->_loop = true;
?> 
{
    id_empresa:"<?php echo $_smarty_tpl->tpl_vars['empresa']->value->id_empresa;?>
",
    razonsocial :"<?php echo $_smarty_tpl->tpl_vars['empresa']->value->razon_social;?>
",
    ruex : "<?php if ($_smarty_tpl->tpl_vars['empresa']->value->ruex) {?>BO<?php echo $_smarty_tpl->tpl_vars['empresa']->value->ruex;
} else { ?>Sin Ruex<?php }?>",
    estado :"<?php echo $_smarty_tpl->tpl_vars['empresa']->value->estadoempresas->descripcion;?>
",
    estadoc :"<?php echo $_smarty_tpl->tpl_vars['empresa']->value->estado;?>
"
    
},
<?php } ?>       
];

 $(document).ready(function () {    
$("#empresasestado").kendoGrid({
    dataSource: {
        data: empresasestado,
        schema: {
            model: {
                fields: {
                    razonsocial: { type: "string" },
                    ruex: { type: "string" },
                    estado: { type: "string" }                        
                }
            }
        },
        pageSize: 20
    },
    filterable: {
                        extra: false,
                        operators: {
                            string: {
                                startswith: "Empieza con:",
                                eq: "Es igual a:",
                                neq: "No es igual a:"
                            }
                        }
                    },
    sortable: true,
    scrollable: false,
    selectable: "simple",
    reorderable: true,
    resizable: true,
     pageable: {
                        refresh: true,
                        pageSizes: true,
                        buttonCount: 5
                    },
    columns: [
            { field: "razonsocial", title: "Razon Social" },
            { field: "ruex", title: "Ruex"},
            { field: "estado", title: "Estado"},
            { title: "Bloquear", width: 10,command: [
                {
                 name: "Bloquear",
                 text: "",
                 imageClass: "k-icon k-i-lock",
                 click: function(e) {
                    e.preventDefault();
                    restringirEmpresa();
                 },
                 confirmation: false
                }
              ]}
        ]
    });
}); 
function restringirEmpresa()
{
    var gridestado = $("#empresasestado").data("kendoGrid");
    var row = gridestado.select();
    var data = gridestado.dataItem(row); 
    anadir(data.razonsocial,'admEstadoEmpresas','restringirEmpresa&id_empresa='+data.id_empresa+'&estado='+data.estadoc);
}
    
      
<?php echo '</script'; ?>
>
       <?php }} ?>
