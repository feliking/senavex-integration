<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-25 10:32:11
         compiled from "/enex/web1/sitio/web/vista/admCafe/listar_certificados_cafe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:928184204580f6ceb80feb0-41062347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bfb282da4f2a0a2b4c99e9f35b1ab8b2617b2ea' => 
    array (
      0 => '/enex/web1/sitio/web/vista/admCafe/listar_certificados_cafe.tpl',
      1 => 1462303061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '928184204580f6ceb80feb0-41062347',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'estado' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_580f6ceb84eac3_16005853',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_580f6ceb84eac3_16005853')) {function content_580f6ceb84eac3_16005853($_smarty_tpl) {?><div class="row-fluid  form" >
     <input id="estado" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
" class="k-primary" style="width:100%"/> 
    <div class="span12 fadein" style="text-align: left;">
        <button name="nuevo_oic" id="nuevo_oic" class="botonElegir">Nuevo OIC</button> 
        <input id="menuoic" value="1" class="botonElegir"/>
    </div>
</div>
<div class="row-fluid  form" >
    <div id="misoic" class="fadein"></div>
</div> 
 <?php echo '<script'; ?>
>

var estadosoic = [
    { text: "Enviados", value: "0" },
    { text: "Aprobados", value: "1" },
    { text: "Rechazados", value: "2" },
];
var dropDown = $("#menuoic").kendoDropDownList({
    dataTextField: "text",
    dataValueField: "value",
    dataSource: estadosoic,
    index: 0,
    change : function (e) {
            cerraractualizartab('Enviados','admCafe','listar_cafe&estado='+this.value());
    }
});

var grid2 =  $("#misoic").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admCafe&tarea=list_cafe&estado="+$("#estado").val(),
                   dataType: "json"
                }
            },
            pageSize: 10
        },
        pageable: {},
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
        change: function (e) {
            setTimeout(function () {cambiarceldasmisfacturas()}, 200);
        },
        columns: [
   
            { field: "id_certificado", title: "Nro Certificado"},
            { field: "nro_ruex", title: "RUEX"},
            { field: "nro_factura", title: "Factura"},
            { field: "nombre_importador", title: "Importador"},
            { field: "pais_destino", title: "Destino"},
            { field: "valor_fob", title: "valor FOB"}
        ]
    });
//--------------para el button
$("#nuevo_oic").kendoButton();
var nueva_oic = $("#nuevo_oic").data("kendoButton");
nueva_oic.bind("click", function(e){   
    //cerraractualizartab('Nuevo OIC','admCafe','do_cafe');
    anadir('oic','admCafe',"list_cafe&estado="+$("#estado").val())
});
      
<?php echo '</script'; ?>
><?php }} ?>
