<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-01-29 15:05:10
         compiled from "/enex/web1/sitio/web/vista/ruex/EmpresasRuex.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14236416257cedb04803883-04753374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21ccf6df98ce249c3915377349e4e6eb3e71a703' => 
    array (
      0 => '/enex/web1/sitio/web/vista/ruex/EmpresasRuex.tpl',
      1 => 1548788479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14236416257cedb04803883-04753374',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cedb04821150_97406757',
  'variables' => 
  array (
    'empresasruex' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cedb04821150_97406757')) {function content_57cedb04821150_97406757($_smarty_tpl) {?><div class="row-fluid  form" >
    <div id="empresasruex" class="fadein"></div>
</div>    
 <?php echo '<script'; ?>
>
 var empresasruex = <?php echo $_smarty_tpl->tpl_vars['empresasruex']->value;?>
;

 $(document).ready(function () {    
    $("#empresasruex").kendoGrid({
        dataSource: {
            data: empresasruex,
            schema: {
                model: {
                    fields: {
                        razon_social: { type: "string" },
                        ruex: { type: "string" },
                        nit: { type: "string" },
                        vigencia: { type: "string" },
                        fecha_renovacion_ruex: { type: "date" }
                        
                    }
                }
            },
            pageSize: 10
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
                            buttonCount: 10
                        },
        change: cambiarceldasruex,
        columns: [
                            { field: "razon_social", title: "Razon Social" },
                            { field: "ruex", title: "Ruex"},
                            { field: "nit", title: "Nit"},
                            { field: "vigencia", title: "Vigencia"},
                            { field: "fecha_renovacion_ruex", title: "Fecha de Vigencia",format: "{0:MM/dd/yyyy}",filterable: {
                                    ui: "datepicker"
                                }}
                            
            ]
        });
    }); 
    var registroruex=0;
   function cambiarceldasruex()
    {  
        var gridruex = $("#empresasruex").data("kendoGrid");
        var row = gridruex.select();
        var data = gridruex.dataItem(row);
        if(registroruex==data.id_empresa)
        {         
           anadir(data.razon_social,'admEmpresa','empresaruex&id_empresa='+data.id_empresa);
        }
        else
        {
            registroruex=data.id_empresa;
        }
    }
    
      
<?php echo '</script'; ?>
>
       <?php }} ?>
