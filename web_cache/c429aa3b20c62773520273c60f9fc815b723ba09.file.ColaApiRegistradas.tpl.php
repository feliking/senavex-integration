<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-08-27 15:22:26
         compiled from "/enex/web1/sitio/web/vista/admEmpresaApi/ColaApiRegistradas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:438615695d6582f28b3eb7-32798188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c429aa3b20c62773520273c60f9fc815b723ba09' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admEmpresaApi/ColaApiRegistradas.tpl',
      1 => 1566415055,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '438615695d6582f28b3eb7-32798188',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d6582f28dd1c8_93519865',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6582f28dd1c8_93519865')) {function content_5d6582f28dd1c8_93519865($_smarty_tpl) {?><div class="row-fluid  form" >
    <div class="span12 fadein" style="text-align: left;">
        <input id="menuempresasadmitidas" value="1" class="botonElegir"/>
    </div>
</div>
<div class="row-fluid  form" >
    <div id="admision" class="fadein"></div>
</div>    
 <?php echo '<script'; ?>
>
 
var grid3 =  $("#admision").kendoGrid({
    dataSource: {
        transport: {
            read: {
               url: "index.php?opcion=admRegistroApi&tarea=ListarEmpresasApiPorEstado&tipo=1",
               dataType: "json"
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
    change: cambiarceldasadmision,
    columns: [
        { field: "razonsocial", title: "Razon Social", width: '41%', },
        { field: "nit", title: "Nit", width: '14%',},
        { field: "padron", title: "Padron Importador",filterable: false, width: '41%', }
    ]
});
var registroadmision=0;
function cambiarceldasadmision()
{  
    var gridadmision = $("#admision").data("kendoGrid");
    var row = gridadmision.select();
    var data = gridadmision.dataItem(row);
    if(registroadmision==data.id_empresa)
    {   
       if(data.estado=='0' || data.estado=='1' || data.estado=='4' || data.estado=='6' || data.estado=='14') 
       {
            cerraractualizartab(data.razonsocial,'admRegistroApi','asignacionrui&id_empresa='+data.id_empresa+'&revisar=1');
       }
    }
    else
    {
        registroadmision=data.id_empresa;
    }
}
var estadosadmision = [
    { text: "Empresas Nuevas", value: "1" },
    //{ text: "Empresas Observadas", value: "0" },
    //{ text: "Modificacion", value: "2" },
    //{ text: "Modificacion Observada", value: "3" },
    //{ text: "Renovación", value: "4" },
    //{ text: "Renovación Observada", value: "5" }
];
var dropDown3 = $("#menuempresasadmitidas").kendoDropDownList({
    dataTextField: "text",
    dataValueField: "value",
    dataSource: estadosadmision,
    index: "1",
    change : function (e) {
        var grid = $("#admision").data("kendoGrid");
        
        var dataadmision= new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admEmpresa&tarea=ListarEmpresasPorEstado&tipo="+this.value(),
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });

        grid.setDataSource(dataadmision);
        grid.refresh();
    }
});
      
<?php echo '</script'; ?>
>
       <?php }} ?>
