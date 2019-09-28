{assign var="id" value="end"|cat:$factura->id_factura_no_dosificada}  

<div class="row-fluid "  id="registrofacturaend{$id}" >    
    <div class="span12" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="row-fluid  form" >
                    <div class="span12" >
                        <div class="titulonegro" >FACTURA COMERCIAL DE EXPORTACI&Oacute;N</div>  
                    </div>                                      
                </div>  
            </div>
            <form id="facturaformend{$id}">
                <input type='hidden' name='id_factura' value={$factura->id_factura_no_dosificada}>
                <input type='hidden' name='id_acuerdo' value={$id_acuerdo}>
                <div class="row-fluid form" >
                    <div class="span2">
                        <img  id="imagenempresacabecera" src="styles/img/empresas/{$id_empresa}.{$formato_imagen}" onError='this.onerror=null;imgendefectoempresa(this);' />
                    </div>
                    <div class="span6" >
                        <div class="row-fluid fadein">
                            <div class="span12  cabecerafactura" >
                                 <span class="titulofactura" >{$empresa->razon_social}</span> <br>
                                {$empresa->direccion}<br>
                                Telf. {$empresa->numero_contacto} {if $empresa->fax} Fax:{$empresa->fax}{/if}<br>
                                {$empresa->email} {if $empresa->pagina_web}{$empresa->pagina_web}{/if}<br> 
                                {$empresa->ciudad}-BOLIVIA
                            </div>  
                        </div>
                    </div>
                    <div class="span4"> 
                        <div class="bordefactura fadein"  style="padding-bottom:2px;padding-top:4px;">
                            <div class="row-fluid fadein">
                                <div class="span12 form">
                                    escoja una o mas facturas Dosificadas relacionadas
                                    <select id="facturasadmitidasend{$id}" style="width:95%;margin-left:7px;" name="facturaadmitidarelacionadaend" required validationMessage="Escuja sus facturas."></select>
                                </div>
                            </div>
                            <div class="row-fluid fadein">
                                <div class="span12">
                                    <b>Nro. de Factura:</b><br>
                                    <input type="text" class="k-textbox fadein"  style="width:95%;margin-bottom:5px;" 
                                    value='{$factura->numero_factura}'
                                    placeholder="Nro. de Factura"  name="nrofacturaend" id="nrofacturaend{$id}" required validationMessage="Ingrese el numero de su factura." /><br>
                                    Factura no Dosificada
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid form" > 
                     <div class="span1 parametro" >
                        Importador:
                    </div>
                    <div class="span3" >
                        <input type="text" class="k-textbox"  placeholder='Importador' name="importadorend" id="importadorend{$id}" 
                        value='{$factura->importador}'   required validationMessage="Ingrese el Importador" />
                    </div>   
                     <div class="span1 parametro" >
                        Pa&iacute;s:
                    </div>
                    <div class="span3" >
                        <input type="text" class="k-textbox"  placeholder='Pa&iacute;s del Importador' name="paisimportadorend" id="paisimportadorend{$id}" 
                        value='{$factura->pais_importador}'    required validationMessage="Ingrese el Pais." />
                    </div> 
                     <div class="span1 parametro" >
                         Direcci&oacute;n:
                    </div>
                    <div class="span3" >
                        <input type="text" class="k-textbox"  placeholder='Dirección Importador' name="direccionimportadorend" id="direccionimportadorend{$id}" 
                        value='{$factura->direccion_importador}' required validationMessage="Ingrese la Dirección." />
                    </div> 
                </div>
                <div class="row-fluid form" >
                     <div class="span1 parametro" >
                        Consignatario:
                    </div>
                    <div class="span3 fadein" id='consignatariodiv'>
                        <input type="text" class="k-textbox"  placeholder='Consignatario' name="consignatarioend" id="consignatarioend{$id}" 
                        value='{$factura->consignatario}'  validationMessage="Ingrese el Consignatario" />
                    </div> 
                     <div class="span1 parametro" >
                         Pa&iacute;s:
                    </div>
                    <div class="span3 fadein" id='consignatariopaisdiv'>
                        <input type="text" class="k-textbox"  placeholder='Pa&iacute;s del Consignatario' name="paisconsignatarioend" id="paisconsignatarioend{$id}" 
                        value='{$factura->pais_consignatario}' validationMessage="Ingrese el Pais." />
                    </div> 
                     <div class="span1 parametro" >
                         Direcci&oacute;n:
                    </div>
                    <div class="span3 fadein" id='consignatariodirdiv'>
                        <input type="text" class="k-textbox"  placeholder='Dirección Consignatario' name="direccionconsignatarioend" id="direccionconsignatarioend{$id}" 
                        value='{$factura->direccion_consignatario}'  validationMessage="Ingrese la Dirección." />
                    </div> 
                </div>
                <div class="row-fluid form" id='puertodestinodiv{$id}'> 
                    <div class="span2 parametro" >
                        Pa&iacute;s de Embarque:
                    </div>
                    <div class="span2 fadein" >
                        <input type="text" class="k-textbox"  placeholder='Puerto de embarque' name="puertoembarqueend" id="puertoembarqueend{$id}" 
                        value='{$factura->puerto_embarque}'  required validationMessage="Ingrese el puerto de embarque." />
                    </div> 
                    <div class="span2 parametro" >
                        Pa&iacute;s de Destino:
                    </div>
                    <div class="span2 fadein" >              
                        <input placeholder='Pais de Destino' style="width:100%;" name="destinofacturaend" id="destinofacturaend{$id}" 
                            required validationMessage="Ingrese el destino." />
                    </div>                     
                    <div class="span2 parametro" >
                        Fecha:
                    </div>     
                    <div class="span2" >
                       <input id="datepickerend{$id}" type="date" name="fechafacturaend"   placeholder="dd/mm/aa"  style="width:100%"> <br>
                       <center><input type="hidden" name="hiddenvalidatordate" id="hiddenvalidatordate" data-date{$id} data-required-msg="Ingrese la Fecha de expedición" /></center>
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                           
                    </div> 
                </div> 
                <div class="row-fluid form" >
                    <div class="span12" >
                            <div id="insumosfacturaend{$id}" class="fadein"></div>
                         <input type="hidden"  name="hiddenvalidatoreded" id="hiddenvalidatoreded{$id}"
                         data-gridvalidatorend{$id}
                         data-required-msg="Complete los campos de productos" />
                    </div> 
                </div> 
                <div class="row-fluid form" id="insumosfacturabend{$id}">
                    <div class="span5" >
                    </div> 
                    <div class="span2"  >
                        <input id="removeinsumofacturaend{$id}" type="button"  value="-" class="k-primary" style="width:100%"/>
                    </div> 
                    <div class="span5" >
                    </div> 
                </div> 
                <div class="row-fluid form">
                    <div class="span12" >
                        <span class="letrarelevante">TOTAL PRODUCTOS: <span id="totalproductosend{$id}">{$factura->total_productos}</span> $us DOLARES AMERICANOS</span>
                    </div> 
                </div> 
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div>  
            </form>
            <div class="row-fluid  form" >
                <div class="span4" >
                </div>
                <div class="span2 " >
                 <input id="cancelarfacturaend{$id}" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                </div> 
                <div class="span2" >
                <input id="editarfacturaend{$id}" type="button" value="Editar" class="k-primary" style="width:100%"/> <br><br>
                </div>
                <div class="span4" >
                </div>
            </div>
        </div>
    </div>
</div>        
<div class="row-fluid fadein"  id="firmafacturaend" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header"><div class="titulo">Firma Digital</div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, doy consentimiento de la veracidad de los datos modificados en la factura Nro: <span class="letrarelevante" id='nrofacturafirmaend'></span>, para su uso en la emisión de certificados de origen.</p> 
                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmarfacturaeend" id="formfirmafacturaend" method="post"  action="index.php" >
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return validateQty(event);'
                       class="k-textbox " placeholder="Pin" name="pinfirmafacturaend"  id="pinfirmafacturaend" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmarfacturaend /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="cancelafirmafacturabend" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="firmafacturabend" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                     </div> 
                     <div class="span3 hidden-phone" >
                     </div>
                    <div class="span1 " >
                        <img src="styles/img/ayuda.png" width="100%" onclick="ayuda('firmaDigital')" style="max-width:35px;" class="ayuda">
                    </div>
                 </div> 
            </form> 
        </div>   
   </div>              
</div>  
{include file="avisos/firmaDigital.tpl"} 
<script>  
//-----------------------para la elecion de facturas-----------------------------------
$("#facturasadmitidasend{$id}").kendoMultiSelect({
    dataTextField: "numero_factura",
    dataValueField: "id_factura",
    dataSource: {
        transport: {
            read: {
                dataType: "json",
                url: "index.php?opcion=admFactura&tarea=facturasDispuestasEdicion&valoresmultiselect="+"{$valoresmultiselect}"
            }
        }
    },
    change : function (e) {
        actualizaGridNoDosificadaend{$id}(this.value());
    }    
});
//------------------es para poner los valores por defecto del ajax-----------------------------------
$.ajax({             
    type: 'post',
    url: 'index.php',
    data: "opcion=admFactura&tarea=facturasDispuestasEdicion&valoresmultiselect="+"{$valoresmultiselect}"+"&defecto=1",
    success: function (data) { 
        var dat = eval('('+data+')');
        var multiselect = $('#facturasadmitidasend{$id}').data("kendoMultiSelect");
        var valoresdefecto = new Array();
        var i=0;
        $(jQuery.parseJSON(JSON.stringify(dat))).each(function() {  
            valoresdefecto[i]=this.id_factura;
            i++;
        });
        multiselect.value(valoresdefecto);
     }
}); 
//-------------para la fecha-----------------------
$("#datepickerend{$id}").kendoDatePicker({
    value:'{$factura->fecha_emision}'
});

//-------------oara los datos----------------------
var declaracionesend{$id} = [
{foreach $declaraciones as $declaracion} 
{
    "id_ddjj": "{$declaracion->getId_ddjj()}",
    "descripcion": "{$declaracion->getDescripcion_comercial()}"
},
{/foreach} 
];




////------------------para el grid de la factura----------------------------
dataSourceend{$id} = new kendo.data.DataSource({
    data: [
    {foreach $insumosend as $insumo} 
        { 
            id_factura: "{$insumo[0]}",
            id_insumos_factura: "{$insumo[1]}", 
            id_insumo_dosificada: "{$insumo[9]}", 
            producto: "{$insumo[2]}",
            cantidadsaldototal:"{$insumo[3]}",
            cantidadsaldo:"{$insumo[4]}",
            cantidad:"{$insumo[5]}",
            unidad_medida:"{$insumo[6]}",
            precio_unitario:"{$insumo[7]}",
            total:"{$insumo[8]}",
            id_ddjj:"0"
        },
    {/foreach}
     ],
    schema: {
        model: {
            fields: {
                id_factura: { 
                    defaultValue: 0
                }, 
                id_insumos_factura: { 
                    defaultValue: 0
                }, 
                id_insumos_dosificada: { 
                    defaultValue: 0
                }, 
                producto: { 
                    editable: false
                },     
                cantidadsaldototal: {
                    type: "float"
                },
                cantidadsaldo: {
                    type: "float"
                },
                cantidad: {
                    type: "float",
                    validation: {
                         min:0,
                        cantidadvalidation: function (input) { 
                            if (input.is("[name='cantidad']") && input.val() == "0") {
                                input.attr("data-cantidadvalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }
                            return true;
                        }
                    }
                },
                unidad_medida: { 
                    editable: false
                },
                precio_unitario: {
                    type: "float",
                    defaultValue: 0,
                    validation: {
                         min:0,
                        required: true,
                        precio_unitariovalidation: function (input) {
                            if (input.is("[name='precio_unitario']") && input.val() == "0") {
                                input.attr("data-precio_unitariovalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }
                            return true;
                        }
                    }
                },
                total: {
                    type: "float"
                },
                id_ddjj: { 
                    type: "number",
                    validation: {
                        id_ddjjvalidation: function (input) {
                            if (input.is("[name='id_ddjj']") && input.val() == "0") {
                                input.attr("data-id_ddjjvalidation-msg","Debe escoger una declaraci&oacute;n");
                                return /^[A-Z]/.test(input.val());
                            }
                            return true;
                        }
                    }
                }
            }
        }
    }
});
$("#insumosfacturaend{$id}").kendoGrid({
    dataSource: dataSourceend{$id},
    editable: true,
    scrollable: false,
    resizable: true,
    selectable: "simple",
    columns: [
        { field: "id_factura", hidden: true}, 
        { field: "id_insumos_factura", hidden: true},  
        { field: "id_insumo_dosificada", hidden: true},  
        { field: "producto", title: "Producto"
                ,editable: false},  
        { field: "cantidadsaldototal"
                ,hidden: true},  
        { field: "cantidadsaldo", title: "Cantidad/Peso (saldo)"
                ,
            editor: function(cont, options) {
                $("<span>" + options.model.cantidadsaldo + "</span>").appendTo(cont);
            }
        },
        { field: "cantidad", title: "Cantidad/Peso",           
            editor: function(cont, options) {
               // $("<span>" + options.model.cantidadend + "</span>").appendTo(cont);
                var input = $("<input name='" + options.field + "'/>");
                // append it to the container
                input.appendTo(cont);
                // initialize a Kendo UI numeric text box and set max value
                input.kendoNumericTextBox({
                    max: options.model.cantidadsaldototal,
                    min: '1',
                    change: function() {
                    }
                });
            }
        },
        { field: "unidad_medida", title: "Unidad de Medida"
        },
        { field: "precio_unitario", title: "Precio Unitario $us"
        },
        { field: "total", title: "Total $us"
                ,
            /*editor: function(cont, options) {
                $("<span>" + options.model.total + "</span>").appendTo(cont);
            }*/
        },
        { field: "id_ddjj", title: "Declaraci&oacute;n Jurada",template:"#=getDescripcionDdjjend{$id}(id_ddjj)#",
            editor: UMedidaDropDownEditorDdjjend{$id}
        }       
    ],
    save: function(data) {
        if (data.values.cantidad) {
            
            var test = data.model.set("cantidadsaldo", data.model.cantidadsaldototal - data.values.cantidad);
        }
        /*if (data.values.cantidad) {
            var test = data.model.set("total", data.values.cantidad * data.model.precio_unitario);
        }
        if (data.values.precio_unitario) {
            var test = data.model.set("total", data.model.cantidad * data.values.precio_unitario);
        }*/
        actualizatotalend{$id}();
    }
});
function getDescripcionDdjjend{$id}(id_ddjj)
{  
    for(var i=0, length = declaracionesend{$id}.length; i< length;i++)
    {  
        if(declaracionesend{$id}[i].id_ddjj==id_ddjj)
        {
            return declaracionesend{$id}[i].descripcion;
        }
    }
}
var dsddjjend{$id} = new kendo.data.DataSource({
        data: declaracionesend{$id}
});
function UMedidaDropDownEditorDdjjend{$id}(container, options) {
    $('<input required data-bind="value:' + options.field+ '"/>')
        .appendTo(container)
        .kendoDropDownList({
                dataTextField: "descripcion",
                dataValueField: "id_ddjj",
                autoBind: false,
                dataSource: dsddjjend{$id},
                select: onSelectddjjend{$id}
    });
}

function onSelectddjjend{$id}(e) {
    var dataItem = this.dataItem(e.item.index());
};

//------------para remover el grid en la no disificada---------------------------------------
$("#removeinsumofacturaend{$id}").kendoButton();
var removeinsumofacturaend{$id} = $("#removeinsumofacturaend{$id}").data("kendoButton");
removeinsumofacturaend{$id}.bind("click", function(e){ 
   
    var grid_factura = $("#insumosfacturaend{$id}").data("kendoGrid");
    var currentDataItem = grid_factura.dataItem(grid_factura.select());
    var dataRow = grid_factura.dataSource.getByUid(currentDataItem.uid);
    
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
    var valores_factura = data_factura.data();
    sweliminar=1;
    
    for (var i = 0; i < numfilas_factura; i++) {
        if((dataRow.id_factura==valores_factura[i].id_factura) && (dataRow.id_insumos_factura!=valores_factura[i].id_insumos_factura))
        {
            sweliminar=0;
        }
    }
    
    if(sweliminar==1)
    {
        eliminaMultiselectend{$id}(dataRow.id_factura);
    }
    grid_factura.dataSource.remove(dataRow);
    grid_factura.dataSource.sync();
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
    if(numfilas_factura==1)
    {
        ocultar('insumosfacturabend{$id}');
    }
    actualizatotalend{$id}();  
});
function eliminaMultiselectend{$id}(id_factura)
{
    var multiselect = $("#facturasadmitidasend{$id}").data("kendoMultiSelect");
    var value = multiselect.value();
    valoresmultiselect='';
    for (var i = 0; i < value.length; i++) 
    {
        var index = value[i].indexOf(";");  // Gets the first index where a space occours
        var id_factura_i = value[i].substr(0,index);  // Gets the text part  
        
        if(id_factura_i!=id_factura)
        {
            valoresmultiselect=valoresmultiselect+','+value[i];
        }
    }
    
    valoresmultiselect = valoresmultiselect.substr(1,valoresmultiselect.length); 
    
    multiselect.dataSource.filter(); //clear applied filter before setting value
    multiselect.value(valoresmultiselect.split(","));
}
//--------------para mostrar o ocultar el boton---------------------------
var grid= $("#insumosfacturaend{$id}").data("kendoGrid");
var data = grid.dataSource;
var numfilas = data.total();
if(numfilas>1)
{
     mostrar('insumosfacturabend{$id}');
}
else
{
     ocultar('insumosfacturabend{$id}');
}
//-----------------------para los botones-----------------------------------
//---------------------------botones de cancelar y editar--------------------------
$("#cancelarfacturaend{$id}").kendoButton();
var cancelarfacturaend{$id} = $("#cancelarfacturaend{$id}").data("kendoButton");
cancelarfacturaend{$id}.bind("click", function(e){
     remover(tabStrip.select()); 
      anadir('Mis Facturas','admFactura','verFacturas');
});
$("#editarfacturaend{$id}").kendoButton();
var editarfacturaend{$id} = $("#editarfacturaend{$id}").data("kendoButton");

editarfacturaend{$id}.bind("click", function(e){  
    //aqui se validan los formualrios
    if(facturaformend{$id}.validate())
    {
        cambiar('registrofacturaend{$id}','firmadigital{$id}');
            generarPin('{$id_empresa}','{$id_persona}','25');   
            cambiarRedaccionFirma{$id}(25,'de edici&oacute;n de Factura',' edito la factura Nro: '+$("#nrofacturaend{$id}").val()); 
    }
});
//-----------------actualiza total----------------------------------------------
var totalproductosend{$id}=0;// la suma de los 
function actualizatotalend{$id}()
{
    totalproductosend{$id}=0; 
    
    var grid_factura = $("#insumosfacturaend{$id}").data("kendoGrid");
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
    var valores_factura = data_factura.data();
    var arr_factura = [];
    for (var i = 0; i < numfilas_factura; i++) {
        totalproductosend{$id}+=parseInt(valores_factura[i].total);
    }
    //-------------actulaizamos el ttal de la factura
    if(isNaN(totalproductosend{$id}))
    {
        totalproductosend{$id}=0;
    }
    $("#totalproductosend{$id}").html(totalproductosend{$id});
}
//-------------------------------metodo de actualizion del grid---------------------
function actualizaGridNoDosificadaend{$id}(ids)
{
    if(ids=='')//mostrar el grid normal
   {   
       var grid_factura = $("#insumosfacturaend{$id}").data("kendoGrid");
       grid_factura.dataSource.data([]);
       //esinsumosfactura=1;//cambiamos cuando quieran emitri sin una dosificada
       actualizatotalend{$id}();
       ocultar('insumosfacturabend{$id}');
   }
   else// aqui es donde se añade el grid especial
   {   
       var idinsumos=''; //esta variaable es para unir todos los ids
       for (var i = 0; i < ids.length; i++) 
       {
           var index = ids[i].indexOf(";");  // Gets the first index where a space occours
           var id_insumos_factura = ids[i].substr(index + 1);  // Gets the text part

           idinsumos=idinsumos+';'+id_insumos_factura;
       }
       idinsumos=idinsumos.substr(1);//le quitamos la primer ;
       //--------------aca preguntamos si de los id_insumos es de los que estan pordefecto---------------
       idarray=idinsumos.split(';');
       
       for (var i = 0; i < idarray.length; i++)   
       {
           {foreach $insumosend as $insumo}            
            if(idarray[i]=={$insumo[9]})
            {
                idarray[i]=idarray[i]+'-'+'{$insumo[1]}';
            }
            {/foreach}
       }
       
       //--------------------esto es para mostrar y ocultar botones--------------------------------
       if(idarray.length>1) //tiene varios insumos
       {        
           mostrar('insumosfacturabend{$id}');
       }
       else
       {
           ocultar('insumosfacturabend{$id}');
       }
       aumentaInsumosFacturaend{$id}(idarray);
   }
}
function aumentaInsumosFacturaend{$id}(ids)//aumentarcolumnas al kendo grid
{
    $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admFactura&tarea=devuelveInsumosFacturaEdicion&id_insumos_factura='+ids,
            success: function (data) { 
                var insumos = eval('('+data+')');
                var tablaa = $("#insumosfacturaend{$id}").data("kendoGrid");
                tablaa.dataSource.data([]);
                insumos.forEach(function(insumo) {
                    tablaa.dataSource.add(insumo);
                });
                actualizatotalend{$id}();
            }
        }); 
}
//-----------------------esto es para el validator-----------------------
var swpend{$id}=0;
var facturaformend{$id}= $("#facturaformend{$id}").kendoValidator({
    rules:{
        gridvalidatorend{$id}: function(input) { ///aqui tienes que hacer el gran cambio de validacion
            var validate = input.data('gridvalidatorend{$id}');
            if (typeof validate !== 'undefined') 
            {
                //---aqui cuentas los productos y verificas dsi no han metido panplinas
                swpend{$id}=verificagridend{$id}();
                if(swpend{$id}==0)
                {
                    return false;
                }
                else if(swpend{$id}==1)
                {
                    return false;
                }
                else if(swpend{$id}==3)
                {
                    return false;
                }
                else if(swpend{$id}==2)
                {
                    return true
                }
                
            }
            return true;
        },
        costofletevalidatorend{$id}: function(input) {
            var  costofletevalidatorend = input.data('costofletevalidatorend{$id}');
            if(typeof  costofletevalidatorend !== 'undefined' )
            {
                if($("#costofleteend{$id}").val())
                {
                    return true
                }
                else
                {
                    return false
                }
            }
            return true
        },
        date{$id}: function(input) {
            var date = input.data('date{$id}');
            if(typeof date !== 'undefined' && date !== false)
            {
                 if(isDate($("#datepickerend{$id}").val()))
                 { 
                     return true
                 }
                 else
                 {
                     return false
                 }
            }
            return true
        }
    },
    messages:{
        costofletevalidatorend{$id} :'Ingrese un monto',
        gridvalidatorend{$id}: function(input) { 
            if(swpend{$id}==0)
            {  
              return 'Ingrese almenos un producto para facturar.';
            }
            else if(swpend{$id}==1)
            {
                return 'Por favor complete los productos';
            }
            else if(swpend{$id}==3)
            {
                return 'Por favor escoja por lo menos una declaraci&oacute;n jurada';
            }
        },
        date{$id}: "Ingrese su fecha de expedición"
    }
}).data("kendoValidator");   
function verificagridend{$id}()
{
    var grid_factura = $("#insumosfacturaend{$id}").data("kendoGrid");
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
     var valores_factura = data_factura.data();
    if(numfilas_factura==0){
        return 0;
    }else{
       var swid_ddjj=true;//ninguna declaracion esta seleccionada
        for (var i = 0; i < numfilas_factura; i++) {
            if( valores_factura[i].cantidad==0 || valores_factura[i].precio_unitario==0)
            {
                return 1;
            }
            if(valores_factura[i].id_ddjj!=0) swid_ddjj=false;
        }
        if(swid_ddjj) return 3;
        return 2;
    }
}


//-------------------pára los guarda insumos------------------------------
var datosinsumosfacturaend{$id}="";
function guardainsumosend{$id}()
{
    datosinsumosfacturaend{$id}="";
    var grid_factura = $("#insumosfacturaend{$id}").data("kendoGrid");
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
    var valores_factura = data_factura.data();
    var arr_factura = [];
    for (var i = 0; i < numfilas_factura; i++) {
        var valores=valores_factura[i].id_factura+";"
                +valores_factura[i].id_insumos_factura+";"
                +valores_factura[i].id_insumo_dosificada+";"
                +valores_factura[i].producto.trim()+";"
                +valores_factura[i].cantidadsaldo+";"
                +valores_factura[i].cantidad+";"
                +valores_factura[i].precio_unitario+";"
                +valores_factura[i].total+";"
                +valores_factura[i].id_ddjj+";"
                +valores_factura[i].unidad_medida;

        arr_factura.push(valores.trim());
    }
    
    datosinsumosfacturaend{$id}="insumosfactura="+arr_factura; 
}
function getFacturaAdmitidaend{$id}()
{
    var multiselect = $("#facturasadmitidasend{$id}").data("kendoMultiSelect");
    var value = multiselect.value();
    var id_facturas='';
    for (var i = 0; i < value.length; i++) 
    {
        var index = value[i].indexOf(";");  // Gets the first index where a space occours
        var id_factura_i = value[i].substr(0,index);  // Gets the text part  
        id_facturas=id_facturas+','+id_factura_i;
    }
    id_facturas = id_facturas.substr(1,id_facturas.length); 
    return id_facturas;
}

//------------------------------para la firma-------------------------
ocultar('firmafacturaend');
$("#cancelafirmafacturabend").kendoButton();
$("#firmafacturabend").kendoButton();
var cancelarfirmafacturabend = $("#cancelafirmafacturabend").data("kendoButton");
var firmafacturabend = $("#firmafacturabend").data("kendoButton");
cancelarfirmafacturabend.bind("click", function(e){             
    cambiar('firmafacturaend','registrofacturaend');
    borrarPin('{$nombre}');
});
firmafacturabend.bind("click", function(e){  
    if(formfirmafacturaend.validate())
    { 
        guardainsumosend();//en datosinsumosfactura
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admFactura&tarea=editarFacturaNoDosificada&'+$("#facturaformend").serialize()+'&'+datosinsumosfacturaend+'&totalproductosend='+totalproductosend+'&facturasRelacionadas='+getFacturaAdmitidaend(), 
            success: function (data) {
               // alert(data);
                var respuesta = eval('('+data+')');
                if(respuesta[0].suceso=='0')
                {
                    firmarPin('Mis Facturas','admFactura','verFacturas','{$nombre}','d{$factura->id_factura_no_dosificada}');
                    if(verificarsiexiste('Inventario'))
                    {
                        $("#inventario").data('kendoGrid').dataSource.read();
                        $("#inventario").data('kendoGrid').refresh();
                    }
                    if(verificarsiexiste('Mis Facturas'))
                    {
                        $("#misfacturas").data('kendoGrid').dataSource.read();
                        $("#misfacturas").data('kendoGrid').refresh();
                    }
                    
                }
                else
                { 
                   alert('No se guardo correctamente, verifique su conexión a internet');
                }
            }
        });
    }
});    
var swfirmafacturaend=2;        
var firmafacturacacheend='';
var formfirmafacturaend = $("#formfirmafacturaend").kendoValidator({
   rules:{ 
       firmarfacturaend: function(input) { 
         var validate = input.data('firmarfacturaend');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmafacturacacheend !== $("#pinfirmafacturaend").val()) 
                 {
                verificarPinFacturaend($("#pinfirmafacturaend").val());                    
                return false;
                }
                if(swfirmafacturaend==1)
                {
                     return true;
                }
                if(swfirmafacturaend==0)
                {  
                    return false;
                }  
                return false;
            }

           return true;
       }
   },
   messages:{
        firmarfacturaend: function(input) { 
            if(swfirmafacturaend==0)
            {  
              return 'El Pin no es Correcto';
            }
            else
            {    
              return 'Revisando..';
            }
         }
   }
   }).data("kendoValidator");
function verificarPinFacturaend(pin_insertado)
{
    $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
        success: function (data) {    
            swfirmafacturaend=data;
           firmafacturacacheend=$("#pinfirmafacturaend").val();
           formfirmafacturaend.validateInput($("#pinfirmafacturaend"));
         }
    }); 
}
//-----------------para el pais-----------------------------
$("#destinofacturaend{$id}").kendoComboBox(
    {   placeholder:"País de Destino",
        dataTextField: "pais",
        dataValueField: "Id",
        dataSource: [
        {foreach $paises as $pais} 
        { pais: "{$pais->nombre}", Id: {$pais->id_pais}},
        {/foreach}
        ],
        value: {$factura->id_pais},
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) { 
             this.text('');
            }
        }
});
var destinofacturaend{$id} = $("#destinofacturaend{$id}").data("kendoComboBox");


</script>  