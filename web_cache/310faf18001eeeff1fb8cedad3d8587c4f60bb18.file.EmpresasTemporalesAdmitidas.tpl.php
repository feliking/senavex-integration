<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-25 13:11:12
         compiled from "/enex/web1/sitio/web/vista/ruex/EmpresasTemporalesAdmitidas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119488019457cedb1a7ada67-37610769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '310faf18001eeeff1fb8cedad3d8587c4f60bb18' => 
    array (
      0 => '/enex/web1/sitio/web/vista/ruex/EmpresasTemporalesAdmitidas.tpl',
      1 => 1495732019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119488019457cedb1a7ada67-37610769',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cedb1a7b8003_86818938',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cedb1a7b8003_86818938')) {function content_57cedb1a7b8003_86818938($_smarty_tpl) {?><div class="row-fluid  form" >
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
               url: "index.php?opcion=admEmpresa&tarea=ListarEmpresasPorEstado&tipo=1",
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
        { field: "estado", title: "Habilitados",filterable: false, width: '41%', }
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
       if(data.estado_codigo=='0' || data.estado_codigo=='1' || data.estado_codigo=='4' || data.estado_codigo=='6' || data.estado_codigo=='14') 
       {
            anadir(data.razonsocial,'admEmpresa','asignacionruex&id_empresa='+data.id_empresa+'&revisar=1');
       }
       else if(  data.estado_codigo=='9')
       {
           anadir(data.razonsocial,'admEmpresa','asignacionruex&id_empresa='+data.id_empresa+'&revisar=2');
       }
       else if( data.estado_codigo=='13')
       {
            anadir(data.razonsocial,'admEmpresa','asignacionruex&id_empresa='+data.id_empresa+'&revisar=0');
       }
    }
    else
    {
        registroadmision=data.id_empresa;
    }
}
var estadosadmision = [
    { text: "Empresas Nuevas", value: "1" },
    { text: "Empresas Observadas", value: "0" },
    { text: "Modificacion", value: "2" },
    { text: "Modificacion Observada", value: "3" },
    { text: "Renovación", value: "4" },
    { text: "Renovación Observada", value: "5" }
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
