<div class="row-fluid  form" >
    <div class="row-fluid "  id="revisarempresatemporal" >
        <div class="span12" >
            <div class="k-block fadein">
                <div class="k-header">
                    <div class="row-fluid  form" >
                        <div class="span12" >
                            <div class="titulonegro" > {if $facturasm->numero_factura != -1} FACTURA N° {$facturasm->numero_factura}{else} RECIBO N° {$facturasm->numero_recibo} {/if} </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 hidden-phone" ></div>
                    
                    <div class="span2 parametro" >{if $facturasm->numero_factura != -1} Número de Factura {else} Número de Recibo {/if}</div>
                    <div class="span2 campo" >{if $facturasm->numero_factura != -1} {$facturasm->numero_factura} {else} {$facturasm->numero_recibo} {/if}</div>
                    
                    {if $facturasm->getEstado()==2 || $facturasm->getEstado()==5 }
                    <div class="span2 parametro" >Estado</div>
                    <div class="span2" id="estado" >
                        <input style="width:100%;" id="cestado" name="cestado" required validationMessage="Seleccione un Estado">
                    </div>
                    {/if}
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 hidden-phone" ></div>
                    <div class="span2 parametro" >Nombre o Razon Social:</div>
                    <div class="span6 campo" ><label id="lbl_empresanombre">{$fmEmpresa->nombre} </label></div>
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 hidden-phone" ></div>
                    <div class="span2 parametro" >NIT:</div>
                    <div class="span2 campo" ><label id="lbl_empresanit"> {$fmEmpresa->nit} </label></div>
                    <div class="span2 parametro" >RUEX:</div>
                    <div class="span2 campo" ><label id="lbl_empresaruex">{$fmEmpresa->ruex}</label></div>
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 hidden-phone" ></div>
                    <div class="span2 parametro" >Número de Autorización:</div>
                    <div class="span2 campo" id="fechaemision"><label id="lbl_fechaemision">{$facturasm->numero_autorizacion}</label></div>
                </div>
                <div class="row-fluid  form" >
                    <div class="span2 hidden-phone" ></div>
                    <div class="span2 parametro" >Fecha de Emision:</div>
                    <div class="span2 campo" id="fechaemision"><label id="lbl_fechaemision">{$facturasm->fecha_emision|substr:0:10}</label></div>
                    <div class="span2 parametro" >Fecha de Límite:</div>
                    <div class="span2 campo" id="fechalimite" ><label id="lbl_fechalimite">{$facturasm->fecha_limite|substr:0:10}</label></div>
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
                        {$cont=1}
                        {foreach $dcantidad_servicios as $p}
                            <div class="row-fluid" >
                                <div class="span1" >{$cont}</div>
                                <div class="span1" >{$p}</div>
                                <div class="span4" >{$dservicios[$p@key]}</div>
                                <div class="span3" >Bs. {$dprecio_servicios[$p@key]}</div>
                                <div class="span3" >Bs. {$dlista_precios[$p@key]}</div>
                            </div>
                            
                            <div class="row-fluid" >
                                <div class="barra" >                                         
                                </div> 
                            </div> 
                            <input type="hidden" value="{$cont++}"/>
                        {/foreach}
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
                        <label id="lbl_total" >Bs. {$facturasm->total}</label>
                    </div>
                    <div class="span1 parametro" >
                        Literal
                    </div>
                    <div class="span4 campo" >
                        <label id="lbl_literal">{$literal}</label>
                    </div>
                </div>
                <div class="row-fluid" >
                                <div class="barra" >                                         
                                </div> 
                            </div> 
                 <div class="row-fluid  form" >
                    {include file="ProForma/factura_depositos.tpl" id_fact=$facturasm->id_factura_senavex_manual}
                </div>
                
                {if $facturasm->descripcion }
                <div class="row-fluid  form" >
                    <div class="span2 hidden-phone" ></div>
                    <div class="span8" >
                        <fieldset  class="k-textbox campo" >
                            <legend>Justificación del Estado</legend>
                            <label id="justificacion">{$facturasm->descripcion}</label>
                        </fieldset>
                    </div>
                    <div class="span2 hidden-phone" ></div>
                </div>
                {/if}
                <div class="row-fluid  form" >
                    <div class="span8" >
                    </div>
                    <div class="span1 " >
                        <div class="menucf">
                            <a href='index.php?opcion=admProForma&tarea=mostrar_factura_manual&id_factura={$facturasm->id_factura_senavex_manual}&estado={$facturasm->estado}' target='_blank'><img src="styles/img/imp_b.png"   class="menubottom ayuda"></a>
                            <a href='index.php?opcion=admProForma&tarea=mostrar_factura_manual&id_factura={$facturasm->id_factura_senavex_manual}&estado={$facturasm->estado}' target='_blank'><img src="styles/img/imp.png"    class="menutop ayuda"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="div_cambio_ventana">

</div>
<script>
    
    function create_ventana(){
        var campo = 
                '<div id="cambio_ventana">'+
                    '<form name="cambio_form" id="cambio_form" method="post" action="index.php">'+
                        '<input type="hidden" name="opcion" id="opcion" value="admProForma" />'+
                        '<input type="hidden" name="tarea" id="tarea" value="cambiar_estado_factura" />'+
                        '<input type="hidden" name="id_factura" id="id_factura" value="{$facturasm->id_factura_senavex_manual}" />'+
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
            dropdownlist.value({$facturasm->getEstado()});
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
  
    if({$facturasm->getEstado()}==2 || {$facturasm->getEstado()}==5){
        $("#cestado").kendoDropDownList({
            placeholder:"Seleccione el Importador",
            ignoreCase: true,
            dataTextField: "value",
            dataValueField: "Id",
            dataSource: [
            {foreach $fmEstados as $est}
                 { value: "{$est->getDescripcion()}", Id: {$est->getId_factura_senavex_manual_estado()}},
            {/foreach}
            ],
            value:{$facturasm->getEstado()},
            change : function (e) {
                if (this.value() && this.selectedIndex == -1) {

                }else{

                    $('#bold_numfact').html({$facturasm->numero_factura});
                    $('#bold_estado').html(dropdownlist.text());

                    create_ventana();
                }
            }
       });
       var dropdownlist = $("#cestado").data("kendoDropDownList");
   }
   
</script>
