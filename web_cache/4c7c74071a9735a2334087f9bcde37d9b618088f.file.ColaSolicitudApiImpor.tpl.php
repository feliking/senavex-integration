<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-27 17:25:18
         compiled from "/enex/web1/sitio/web/vista/admEmpresaApi/ColaSolicitudApiImpor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11927312035d6e7b62154e81-21288254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c7c74071a9735a2334087f9bcde37d9b618088f' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admEmpresaApi/ColaSolicitudApiImpor.tpl',
      1 => 1569618985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11927312035d6e7b62154e81-21288254',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d6e7b62188b99_20796624',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6e7b62188b99_20796624')) {function content_5d6e7b62188b99_20796624($_smarty_tpl) {?><div class="row-fluid  form" >
    <div class="span12 fadein" style="text-align: left;">
        <button name="altaApi" id="altaApi" class="k-button form-small" onclick="cerraractualizartab('Nueva API','admRegistroApi','mostrarapi')">Nueva API</button>
        <!--input id="ApiRegistradas" value="1" class="botonElegir"/-->
    </div>
</div>
<div class="row-fluid  form" >
    <div id="admision" class="fadein"></div>
</div>  
 <?php echo '<script'; ?>
>
 
    
$("#altaApi").kendoButton();
var estadosadmision = [
    { text: "Solicitudes pendientes", value: "1" },
    //{ text: "Solicitudes Observadas", value: "0" },
    //{ text: "Solicitudes", value: "2" },
    //{ text: "Solicitudes Observada", value: "3" },
    //{ text: "Solicitudes", value: "4" },
    //{ text: "Solicitudes Observada", value: "5" }
];
var dropDown3 = $("#ApiRegistradas").kendoDropDownList({
    dataTextField: "text",
    dataValueField: "value",
    dataSource: estadosadmision,
    index: "1",
    change : function (e) {
        var grid = $("#admision").data("kendoGrid");
        
        var dataadmision= new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=AdmAutorizacionPrevia&tarea=ListarApiPorEstado&id_estado=1",
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

var grid3 =  $("#admision").kendoGrid({
    dataSource: {
        transport: {
            read: {
               url: "index.php?opcion=admAutorizacionPrevia&tarea=ListarApiPorEstado&id_estado=1",
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
    //change: cambiarceldasadmision,
    columns: [
        { field: "correlativo", title: "Nro. Solicitud", width: '10%', },
        { field: "fecha_registro", title: "Fecha de registro",filterable: false, width: '12%', },
        { field: "pais_procedencia", title: "Pais de Procedencia", width: '15%', },
        { field: "recursos", title: "Origen de recursos para la adquisicion", width: '30%',},
        { field: "estado", title: "Estado", width: '20%',},
        { field: "Opciones", template: '<a target="_blank" href="index.php?opcion=ImpresionApi&tarea=ImpresionApi&id_autorizacion=#= id_autorizacion #" class="k-button link">Imprimir</a>' }
    ]
});

      
<?php echo '</script'; ?>
><?php }} ?>
