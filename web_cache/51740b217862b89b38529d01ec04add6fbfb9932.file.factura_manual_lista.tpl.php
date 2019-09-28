<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-05 10:17:10
         compiled from "/enex/web1/sitio/web/vista/ProForma/factura_manual_lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138444431257cf24af8c71f0-76775126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51740b217862b89b38529d01ec04add6fbfb9932' => 
    array (
      0 => '/enex/web1/sitio/web/vista/ProForma/factura_manual_lista.tpl',
      1 => 1493940913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138444431257cf24af8c71f0-76775126',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cf24af90d910_43740123',
  'variables' => 
  array (
    'estado' => 0,
    'factura_recibo' => 0,
    'listaEstados' => 0,
    'est' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cf24af90d910_43740123')) {function content_57cf24af90d910_43740123($_smarty_tpl) {?><div class="row-fluid" class="fadein" >
    
    <div class="row-fluid  form" >
        <input id="estado" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
" class="k-primary" />
        
        <div class="span2">
            <input style="width:100%;" id="lfestado" name="lfestado" required validationMessage="Seleccione un Estado">
        </div>
        <div class="span2">
            <input style="width:100%;" id="cbfactura_recibo" name="cbfactura_recibo" required validationMessage="Seleccione un Estado">
        </div>
    </div>
    <div class="row-fluid  form" >
        <div id="facturas_manual" class="fadein">

        </div>
    </div>
    <!--div class="row-fluid  form" id="botonoes">
        <div class="span" ></div>
            <input id="estado" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
" class="k-primary" style="width:100%"/> 
            
            <div class="span2 fadein">
                <input id="Valido" <?php if ($_smarty_tpl->tpl_vars['estado']->value==2) {?> disabled <?php }?> type="button"  value="Validos" class="k-primary" style="width:100%"/> 
            </div>
      
            <div class="span2 fadein">
                <input id="Anulado" <?php if ($_smarty_tpl->tpl_vars['estado']->value==1) {?> disabled <?php }?> type="button"  value="Anulados" class="k-primary" style="width:100%"/> 
            </div>
        <div class="span" ></div>
    </div-->
</div>

<?php echo '<script'; ?>
>

 $(document).ready(function () {    
    $("#facturas_manual").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admProForma&tarea=list_factura_manual&estado="+$('#estado').val()+'&factura_recibo=<?php echo $_smarty_tpl->tpl_vars['factura_recibo']->value;?>
',
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
        change: cambiarceldas,
        columns: [
            { field: "id_factura", title: "id", hidden:'true'},
            { field: "nro_factura", title: "<?php if ($_smarty_tpl->tpl_vars['factura_recibo']->value==0) {?>FACTURA N°<?php } else { ?>RECIBO N°<?php }?>"},
            { field: "nombre", title: "EMPRESA"},
            { field: "fecha_emision", title: "FECHA"},
            { field: "total", title: "TOTAL"},
        ]
    });
}); 


        
var registro=0;
    
function cambiarceldas()
{
    var grid_oic = $("#facturas_manual").data("kendoGrid");
    var row = grid_oic.select();
    var data = grid_oic.dataItem(row);
    if(registro==data.id_factura)
    {  
        //window.open('index.php?'+'opcion=admProForma&tarea=mostrar_factura_manual&id_factura='+data.id_factura, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        anadir('Editar <?php if ($_smarty_tpl->tpl_vars['factura_recibo']->value==0) {?>Factura<?php } else { ?>Recibo<?php }?>','admProForma','editar_factura_manual&id_factura='+data.id_factura);
        //window.open( editar_factura_manual id_factura='+data.id_factura, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
    }
    else
    {
        registro=data.id_factura;
    }
}



/*$("#Valido").kendoButton();
var Valido = $("#Valido").data("kendoButton");
Valido.bind("click", function(e){   
  
    cerraractualizartab("Pendiente",'admProForma','listar_facturas&estado=2');
});

$("#Cancelado").kendoButton();
var Cancelado = $("#Cancelado").data("kendoButton");
Cancelado.bind("click", function(e){   
   
    cerraractualizartab("Cancelado",'admProForma','listar_facturas&estado=1');
});

$("#Anulado").kendoButton();
var Anulado = $("#Anulado").data("kendoButton");
Anulado.bind("click", function(e){   
   
    cerraractualizartab("Anulado",'admProForma','listar_facturas&estado=1');
});*/


$("#lfestado").kendoDropDownList({
        placeholder:"Seleccione un Estado",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        <?php  $_smarty_tpl->tpl_vars['est'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['est']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaEstados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['est']->key => $_smarty_tpl->tpl_vars['est']->value) {
$_smarty_tpl->tpl_vars['est']->_loop = true;
?>
             { value: "<?php echo $_smarty_tpl->tpl_vars['est']->value->getDescripcion();?>
", Id: <?php echo $_smarty_tpl->tpl_vars['est']->value->getId_factura_senavex_manual_estado();?>
},
        <?php } ?>
        ],
        value:<?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
,
        change : function (e) {
            var est= this.value();
            var texto = this.text();
            if (this.value() && this.selectedIndex == -1) {
                
            }else{
                cerraractualizartab('Listar Facturas('+texto+')','admProForma','listar_facturas&estado='+est+'&factura_recibo=<?php echo $_smarty_tpl->tpl_vars['factura_recibo']->value;?>
');
            }
        }
   });
$("#cbfactura_recibo").kendoDropDownList({
    dataTextField: "text",
    dataValueField: "value",
    dataSource: [
        { text: "Facturas", value: "0" },
        { text: "Recibos", value: "1" }
    ],
    filter: "contains",
    suggest: true,
    index: <?php echo $_smarty_tpl->tpl_vars['factura_recibo']->value;?>
,
    change : function (e) {
        if (this.value() && this.selectedIndex == -1) {
            
        }else{
            var est = $("#lfestado").val();
            var texto = $("#lfestado").data("kendoDropDownList").text();
            cerraractualizartab('Listar '+(this.value()=="0"? 'Facturas' : 'Recibos')+'('+texto+')','admProForma','listar_facturas&estado='+est+'&factura_recibo='+this.value());
        }
    }
});

<?php echo '</script'; ?>
>
<?php }} ?>
