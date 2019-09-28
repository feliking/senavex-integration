<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-05-05 10:18:58
         compiled from "/enex/web1/sitio/web/vista/ProForma/editar_factura.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65163983957cf2bc857e1a7-06745743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88bb748b2a4fe1defebdaa976165fd7c06607a51' => 
    array (
      0 => '/enex/web1/sitio/web/vista/ProForma/editar_factura.tpl',
      1 => 1493940911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65163983957cf2bc857e1a7-06745743',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57cf2bc86058f1_86190114',
  'variables' => 
  array (
    'facturasm' => 0,
    'fmEmpresa' => 0,
    'dcantidad_servicios' => 0,
    'cont' => 0,
    'p' => 0,
    'dservicios' => 0,
    'dprecio_servicios' => 0,
    'dlista_precios' => 0,
    'literal' => 0,
    'fmEstados' => 0,
    'est' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57cf2bc86058f1_86190114')) {function content_57cf2bc86058f1_86190114($_smarty_tpl) {?><div class="row-fluid  form" >
    <div class="row-fluid "  id="revisarempresatemporal" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > <?php if ($_smarty_tpl->tpl_vars['facturasm']->value->numero_factura!=-1) {?> FACTURA N° <?php echo $_smarty_tpl->tpl_vars['facturasm']->value->numero_factura;
} else { ?> RECIBO N° <?php echo $_smarty_tpl->tpl_vars['facturasm']->value->numero_recibo;?>
 <?php }?> </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 hidden-phone" ></div>
                    
                    <div class="span2 parametro" ><?php if ($_smarty_tpl->tpl_vars['facturasm']->value->numero_factura!=-1) {?> Número de Factura <?php } else { ?> Número de Recibo <?php }?></div>
                    <div class="span2 campo" ><?php if ($_smarty_tpl->tpl_vars['facturasm']->value->numero_factura!=-1) {?> <?php echo $_smarty_tpl->tpl_vars['facturasm']->value->numero_factura;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['facturasm']->value->numero_recibo;?>
 <?php }?></div>
                    
                    <?php if ($_smarty_tpl->tpl_vars['facturasm']->value->getEstado()==2||$_smarty_tpl->tpl_vars['facturasm']->value->getEstado()==5) {?>
                    <div class="span2 parametro" >Estado</div>
                    <div class="span2" id="estado" >
                        <input style="width:100%;" id="cestado" name="cestado" required validationMessage="Seleccione un Estado">
                    </div>
                    <?php }?>
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 hidden-phone" ></div>
                    <div class="span2 parametro" >Nombre o Razon Social:</div>
                    <div class="span6 campo" ><label id="lbl_empresanombre"><?php echo $_smarty_tpl->tpl_vars['fmEmpresa']->value->nombre;?>
 </label></div>
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 hidden-phone" ></div>
                    <div class="span2 parametro" >NIT:</div>
                    <div class="span2 campo" ><label id="lbl_empresanit"> <?php echo $_smarty_tpl->tpl_vars['fmEmpresa']->value->nit;?>
 </label></div>
                    <div class="span2 parametro" >RUEX:</div>
                    <div class="span2 campo" ><label id="lbl_empresaruex"><?php echo $_smarty_tpl->tpl_vars['fmEmpresa']->value->ruex;?>
</label></div>
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 hidden-phone" ></div>
                    <div class="span2 parametro" >Número de Autorización:</div>
                    <div class="span2 campo" id="fechaemision"><label id="lbl_fechaemision"><?php echo $_smarty_tpl->tpl_vars['facturasm']->value->numero_autorizacion;?>
</label></div>
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 hidden-phone" ></div>
                    <div class="span2 parametro" >Fecha de Emision:</div>
                    <div class="span2 campo" id="fechaemision"><label id="lbl_fechaemision"><?php echo substr($_smarty_tpl->tpl_vars['facturasm']->value->fecha_emision,0,10);?>
</label></div>
                    <div class="span2 parametro" >Fecha de Límite:</div>
                    <div class="span2 campo" id="fechalimite" ><label id="lbl_fechalimite"><?php echo substr($_smarty_tpl->tpl_vars['facturasm']->value->fecha_limite,0,10);?>
</label></div>
                </div>
                    <div class="row-fluid form" >
                    <div class="barra" >
                    </div>
                </div>
                <div class="row-fluid" >
                    <div class="span2 hidden-phone" ></div>
                    <div class="span8 campo" >
                         <div class="row-fluid" >
                            <div class="span1 parametro" >Nro</div>
                            <div class="span1 parametro" >Cantidad</div>
                            <div class="span3 parametro" >Servicio</div>
                            <div class="span4 parametro" >Precio Unitario</div>
                            <div class="span2 parametro" >Precio Total</div>
                        </div>
                         <div class="row-fluid" >
                            <div class="barra" >                                         
                            </div> 
                        </div> 
                        <?php $_smarty_tpl->tpl_vars['cont'] = new Smarty_variable(1, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dcantidad_servicios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                            <div class="row-fluid" >
                                <div class="span1" ><?php echo $_smarty_tpl->tpl_vars['cont']->value;?>
</div>
                                <div class="span1" ><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</div>
                                <div class="span4" ><?php echo $_smarty_tpl->tpl_vars['dservicios']->value[$_smarty_tpl->tpl_vars['p']->key];?>
</div>
                                <div class="span3" >Bs. <?php echo $_smarty_tpl->tpl_vars['dprecio_servicios']->value[$_smarty_tpl->tpl_vars['p']->key];?>
</div>
                                <div class="span3" >Bs. <?php echo $_smarty_tpl->tpl_vars['dlista_precios']->value[$_smarty_tpl->tpl_vars['p']->key];?>
</div>
                            </div>
                            
                            <div class="row-fluid" >
                                <div class="barra" >                                         
                                </div> 
                            </div> 
                            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['cont']->value++;?>
"/>
                        <?php } ?>
                    </div>
                    <div class="span2 hidden-phone" ></div>
                </div>
                <div class="row-fluid form" ></div> 
                <div class="row-fluid form" ><div class="barra" ></div></div>
                <div class="row-fluid  form" >
                    <div class="span1 hidden-phone" ></div>
                    <div class="span2 parametro" >
                       Total Factura:
                    </div>
                    <div class="span2 campo" >
                        <label id="lbl_total" >Bs. <?php echo $_smarty_tpl->tpl_vars['facturasm']->value->total;?>
</label>
                    </div>
                    <div class="span1 parametro" >
                        Literal
                    </div>
                    <div class="span4 campo" >
                        <label id="lbl_literal"><?php echo $_smarty_tpl->tpl_vars['literal']->value;?>
</label>
                    </div>
                </div>
                <div class="row-fluid" >
                                <div class="barra" >                                         
                                </div> 
                            </div> 
                 <div class="row-fluid  form" >
                    <?php echo $_smarty_tpl->getSubTemplate ("ProForma/factura_depositos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id_fact'=>$_smarty_tpl->tpl_vars['facturasm']->value->id_factura_senavex_manual), 0);?>

                </div>
                
                <?php if ($_smarty_tpl->tpl_vars['facturasm']->value->descripcion) {?>
                <div class="row-fluid  form" >
                    <div class="span2 hidden-phone" ></div>
                    <div class="span8" >
                        <fieldset  class="k-textbox campo" >
                            <legend>Justificación del Estado</legend>
                            <label id="justificacion"><?php echo $_smarty_tpl->tpl_vars['facturasm']->value->descripcion;?>
</label>
                        </fieldset>
                    </div>
                    <div class="span2 hidden-phone" ></div>
                </div>
                <?php }?>
                <div class="row-fluid  form" >
                    <div class="span8" >
                    </div>
                    <div class="span1 " >
                        <div class="menucf">
                            <a href='index.php?opcion=admProForma&tarea=mostrar_factura_manual&id_factura=<?php echo $_smarty_tpl->tpl_vars['facturasm']->value->id_factura_senavex_manual;?>
&estado=<?php echo $_smarty_tpl->tpl_vars['facturasm']->value->estado;?>
' target='_blank'><img src="styles/img/imp_b.png"   class="menubottom ayuda"></a>
                            <a href='index.php?opcion=admProForma&tarea=mostrar_factura_manual&id_factura=<?php echo $_smarty_tpl->tpl_vars['facturasm']->value->id_factura_senavex_manual;?>
&estado=<?php echo $_smarty_tpl->tpl_vars['facturasm']->value->estado;?>
' target='_blank'><img src="styles/img/imp.png"    class="menutop ayuda"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="div_cambio_ventana">

</div>
<?php echo '<script'; ?>
>
    
    function create_ventana(){
        var campo = 
                '<div id="cambio_ventana">'+
                    '<form name="cambio_form" id="cambio_form" method="post" action="index.php">'+
                        '<input type="hidden" name="opcion" id="opcion" value="admProForma" />'+
                        '<input type="hidden" name="tarea" id="tarea" value="cambiar_estado_factura" />'+
                        '<input type="hidden" name="id_factura" id="id_factura" value="<?php echo $_smarty_tpl->tpl_vars['facturasm']->value->id_factura_senavex_manual;?>
" />'+
                        '<div class="titulo" id="tituloventana">Aviso Cambio de Estado</div><br>'+
                        '<div class="row-fluid form">'+
                            '<label id="cambio_texto">Cambio de estado de la Factura Nro <b id="bold_numfact"></b> a <b id="bold_estado"></b>, por favor detalle la razon de esta acción en el campo siguiente</label><br><br>'+
                            '<textarea id="cambio_descripcion" name="cambio_descripcion" rows="4" cols="50" class="k-textbox" required validationMessage="Describa la razón por la cual se realiza el cambio de estado de la factura"></textarea>'+
                        '</div>'+
                        '<div class="row-fluid form">'+
                            '<input id="cambioaceptar" type="button"  value="Aceptar" class="k-primary" style="width:40"/> '+
                            '<input id="cambiocancelar" type="button"  value="Cancelar" class="k-primary" style="width:40"/> '+
                        '</div>'+
                    '</form>'+
                '</div>';
        $('#div_cambio_ventana').append(campo);
        
        $("#cambioaceptar").kendoButton();
        $("#cambiocancelar").kendoButton();
        var cambioaceptar = $("#cambioaceptar").data("kendoButton");
        var cambiocancelar = $("#cambiocancelar").data("kendoButton");
        var cambio_form = $("#cambio_form").kendoValidator().data("kendoValidator");
        cambioaceptar.bind("click", function(e){
            if(cambio_form.validate()){
                $.ajax({             
                    type: 'post',
                    url: 'index.php',
                    data: $("#cambio_form").serialize()+'&estado='+$('#cestado').val(),
                    success: function (data) {
                            $("#cambio_ventana").data("kendoWindow").close();
                            $('#cambio_ventana').remove();
                            remover(tabStrip.select());
                            cerraractualizartab('Listar Facturar','admProForma','listar_facturas');
                        }
                    });
            }
        });
        cambiocancelar.bind("click", function(e){
            dropdownlist.value(<?php echo $_smarty_tpl->tpl_vars['facturasm']->value->getEstado();?>
);
            $('#cambio_descripcion').val('');
            $("#cambio_ventana").data("kendoWindow").close();
            $('#cambio_ventana').remove();
        });
        $("#cambio_ventana").kendoWindow({
            draggable: false,
            height: "350px",
            width: "410px",
            resizable: false,
            modal: true,
            actions: [
                      "Close"
                  ],
            animation: {
                close: {
                  effects: "fade:out",
                  duration: 1000
                }
            }
        }).data("kendoWindow").center().open();
        
    }
  
    if(<?php echo $_smarty_tpl->tpl_vars['facturasm']->value->getEstado();?>
==2 || <?php echo $_smarty_tpl->tpl_vars['facturasm']->value->getEstado();?>
==5){
        $("#cestado").kendoDropDownList({
            placeholder:"Seleccione el Importador",
            ignoreCase: true,
            dataTextField: "value",
            dataValueField: "Id",
            dataSource: [
            <?php  $_smarty_tpl->tpl_vars['est'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['est']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fmEstados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['est']->key => $_smarty_tpl->tpl_vars['est']->value) {
$_smarty_tpl->tpl_vars['est']->_loop = true;
?>
                 { value: "<?php echo $_smarty_tpl->tpl_vars['est']->value->getDescripcion();?>
", Id: <?php echo $_smarty_tpl->tpl_vars['est']->value->getId_factura_senavex_manual_estado();?>
},
            <?php } ?>
            ],
            value:<?php echo $_smarty_tpl->tpl_vars['facturasm']->value->getEstado();?>
,
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) {

                }else{

                    $('#bold_numfact').html(<?php echo $_smarty_tpl->tpl_vars['facturasm']->value->numero_factura;?>
);
                    $('#bold_estado').html(dropdownlist.text());

                    create_ventana();
                }
            }
       });
       var dropdownlist = $("#cestado").data("kendoDropDownList");
   }
   
<?php echo '</script'; ?>
>
<?php }} ?>
