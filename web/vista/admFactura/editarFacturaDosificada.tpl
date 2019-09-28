{assign var="id" value="ed"|cat:$factura->id_factura}  
<div class="row-fluid "  id="registrofacturaed{$id}" >
    <div class="span12" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="row-fluid  form" >
                    <div class="span12" >
                        <div class="titulonegro" >FACTURA COMERCIAL DE EXPORTACI&Oacute;N</div>  
                    </div>                                      
                </div>  
            </div>
            <form id="facturaformed{$id}">
                <input type='hidden' name='id_factura' value={$factura->id_factura}>
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
                            <span class="titulofactura" >NIT: {$empresa->nit}</span><br>
                             <b>Nro. de Autorizaci&oacute;n:</b><br>
                            <input type="text" class="k-textbox"  style="width:90%;" 
                                value='{$factura->numero_autorizacion}' onkeypress='return validateQty(event);'
                                placeholder="Nro. de Autorización"  name="nroautorizacioned" id="nroautorizacioned{$id}" required validationMessage="Por favor ingrese el numero de su Autorización." /><br>
                            <b>Nro. de Factura:</b><br>
                            <input type="text" class="k-textbox"  style="width:90%;margin-bottom:5px;"  
                                value='{$factura->numero_factura}' onkeypress='return validateQty(event);'
                                placeholder="Nro. de Factura"  name="nrofacturaed" id="nrofacturaed{$id}" 
                                required data-required-msg="Por favor ingrese el numero de su factura."
                                    data-verificanum{$id}
                                    data-verificanum-url="validate/username" /><br>
                            
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
                        <input type="text" class="k-textbox"  placeholder='Importador' name="importadored" id="importadored{$id}" 
                        value='{$factura->importador}'   required validationMessage="Ingrese el Importador" />
                    </div>   
                     <div class="span1 parametro" >
                        Pa&iacute;s:
                    </div>
                    <div class="span3" >
                        <input type="text" class="k-textbox"  placeholder='Pa&iacute;s del Importador' name="paisimportadored" id="paisimportadored{$id}" 
                        value='{$factura->pais_importador}'    required validationMessage="Ingrese el Pais." />
                    </div> 
                     <div class="span1 parametro" >
                         Direcci&oacute;n:
                    </div>
                    <div class="span3" >
                        <input type="text" class="k-textbox"  placeholder='Dirección Importador' name="direccionimportadored" id="direccionimportadored{$id}" 
                        value='{$factura->direccion_importador}' required validationMessage="Ingrese la Dirección." />
                    </div> 
                </div>
                <div class="row-fluid form" >
                     <div class="span1 parametro" >
                        Consignatario:
                    </div>
                    <div class="span3 fadein" id='consignatariodiv'>
                        <input type="text" class="k-textbox"  placeholder='Consignatario' name="consignatarioed" id="consignatarioed{$id}" 
                        value='{$factura->consignatario}'  validationMessage="Ingrese el Consignatario" />
                    </div> 
                     <div class="span1 parametro" >
                         Pa&iacute;s:
                    </div>
                    <div class="span3 fadein" id='consignatariopaisdiv'>
                        <input type="text" class="k-textbox"  placeholder='Pa&iacute;s del Consignatario' name="paisconsignatarioed" id="paisconsignatarioed{$id}" 
                        value='{$factura->pais_consignatario}' validationMessage="Ingrese el Pais." />
                    </div> 
                     <div class="span1 parametro" >
                         Direcci&oacute;n:
                    </div>
                    <div class="span3 fadein" id='consignatariodirdiv{$id}'>
                        <input type="text" class="k-textbox"  placeholder='Dirección Consignatario' name="direccionconsignatarioed" id="direccionconsignatarioed{$id}" 
                        value='{$factura->direccion_consignatario}'  validationMessage="Ingrese la Dirección." />
                    </div> 
                </div>
                <div class="row-fluid form" id='puertodestinodiv'> 
                    <div class="span2 parametro" >
                        Pa&iacute;s de Embarque:
                    </div>
                    <div class="span2 fadein" >
                        <input type="text" class="k-textbox"  placeholder='Puerto de embarque' name="puertoembarqueed" id="puertoembarqueed{$id}" 
                        value='{$factura->puerto_embarque}'  required validationMessage="Ingrese el puerto de embarque." />
                    </div> 
                    <div class="span2 parametro" >
                        Pa&iacute;s de Destino:
                    </div>
                    <div class="span2 fadein" >
                        <input placeholder='Pais de Destino' style="width:100%;" name="destinofacturaed" id="destinofacturaed{$id}" 
                               required validationMessage="Ingrese el destino." />
                    </div>                     
                    <div class="span2 parametro" >
                        Fecha:
                    </div>     
                    <div class="span2" >
                       <input id="datepickered{$id}" type="date" name="fechafacturaed"   placeholder="dd/mm/aa"  style="width:100%"> <br>
                       <center><input type="hidden" name="hiddenvalidatordate" id="hiddenvalidatordate{$id}" data-date data-required-msg="Ingrese la Fecha de expedición" /></center>
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                           
                    </div> 
                </div> 
                <div class="row-fluid form" >
                    <div class="span12" >
                            <div id="insumosfacturaed{$id}" class="fadein"></div>
                         <input type="hidden"  name="hiddenvalidatoreded" id="hiddenvalidatoreded{$id}"
                         data-gridvalidatored{$id}
                         data-required-msg="Complete los campos de productos" />
                    </div> 
                </div> 
                <div class="row-fluid form fadein">
                    <div class="span4" >
                    </div> 
                    <div class="span2 " >
                        <input id="addinsumofacturaed{$id}" type="button" value="+" class="k-primary" style="width:100%"/> 
                    </div> 
                    <div class="span2 " >
                        <input id="removeinsumofacturaed{$id}" type="button"  value="-" class="k-primary" style="width:100%"/>
                    </div> 
                    <div class="span4" >
                    </div> 
                </div> 
                <div class="row-fluid form" id='totalproductosdived{$id}'>
                    <div class="span12" >
                        <span class="letrarelevante">TOTAL PRODUCTOS: <span id="totalproductosed{$id}">0</span> $us DOLARES AMERICANOS</span>
                    </div> 
                </div> 
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid form"> 
                    <div class="span4 parametro" >
                        Gastos de Flete y Seguro:
                    </div> 
                    <div class="span2 " >
                        <input type="number"   placeholder='Total $us' name="costofleteed" id="costofleteed{$id}"  />
                        <input type="hidden" name="costofletevalidatored" id="costofletevalidatored{$id}" 
                         data-costofletevalidatored{$id}
                         data-required-msg="Ingrese el monto" />
                    </div> 
                    <div class="span1 parametro" >
                        Icoterm:
                    </div> 
                    <div class="span2" >
                        <input style="width:100%;" id="incotermed{$id}" name="incotermed" required validationMessage="Escoja Icoterm">
                    </div> 
                    <div class="span1 " >
                        <img src="styles/img/ayuda.png" width="100%" onclick="ayudaIcotermed()" style="max-width:30px;" class="ayuda">
                    </div>
                </div> 
                <div class="row-fluid form" id='totalfobdiv'>
                    <div class="span12" >
                        <span class="letrarelevante">TOTAL VALOR FOB FRONTERA: <span id="totalincotermed{$id}">0</span> $us DOLARES AMERICANOS</span>
                    </div> 
                </div> 
                <div class="row-fluid form">
                    <div class="barra" >                                         
                    </div> 
                </div> 
            </form>
            <div class="row-fluid  form" >
                <div class="span4" >
                </div>
                <div class="span2 " >
                 <input id="cancelarfacturaed{$id}" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                </div> 
                <div class="span2" >
                <input id="editarfacturaed{$id}" type="button" value="Editar" class="k-primary" style="width:100%"/> <br><br>
                </div>
                <div class="span4" >
                </div>
            </div>
        </div>
    </div>
</div>  
<div id="ayudaicotermed{$id}"  style="display:none">
    <div class="row-fluid " id="ayudaicotermed0">
        <div class="span12" >
            <div class="row-fluid " >
                <div class="span12" >
                   <b>Clasificaci&oacute;n de Incoterms</b>
                </div>
            </div>
            <div class="row-fluid " >
                <div class="span12" >
                   Escoja un Incoterm para obtener ayuda.
                </div>
            </div>
        </div>
    </div>
    {foreach $incoterms as $incoterm} 
    <div class="row-fluid " id="ayudaicotermed{$incoterm->id_incoterm}">
        <div class="span12" >
            <div class="row-fluid " >
                <div class="span12" >
                   <b>{$incoterm->titulo}</b>
                </div>
            </div>
            <div class="row-fluid " >
                <div class="span12" >
                   {$incoterm->descripcion}
                </div>
            </div>
        </div>
    </div>
    {/foreach} 
</div>
 {include file="avisos/firmaDigital.tpl"} 
<script>  
$("#datepickered{$id}").kendoDatePicker({
    value:'{$factura->fecha_emision}'
});
//-----------------para el pais-----------------------------
$("#destinofacturaed{$id}").kendoComboBox(
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
var destinofactura{$id} = $("#destinofacturaed{$id}").data("kendoComboBox");

///-------------------to es para el grid-------------------------
var unidadmedidaed{$id} = [
{foreach $unidades as $unidad} 
{
    "id_unidad_medida": "{$unidad->getId_unidad_medida()}",
    "descripcion": "{$unidad->getDescripcion()}"
},
{/foreach} 
];
var declaracionesed{$id} = [
{foreach $declaraciones as $declaracion} 
{
    "id_ddjj": "{$declaracion->getId_ddjj()}",
    "descripcion": "{$declaracion->getDescripcion_comercial()}"
},
{/foreach} 
];
dataSourceed{$id} = new kendo.data.DataSource({
    data: [
        {foreach $factura->insumosfactura as $insumosfactura} 
            { 
                id_insumo: "{$insumosfactura->id_insumos_factura}", 
                productoed: "{$insumosfactura->descripcion}",
                unidad_medidaed:"{$insumosfactura->unidad_medida}",
                cantidaded:"{$insumosfactura->cantidad}",
                precio_unitarioed:"{$insumosfactura->precio_unitario}",
                totaled:"{$insumosfactura->precio}",
                valor_fobed:"{$insumosfactura->valor_fob}",
                id_ddjjed:"0"
            },
        {/foreach}
     ],
    schema: {
        model: {
            fields: {
                id_insumo: {
                    defaultValue:0,
                    type: "number"
                },
                productoed: { 
                    defaultValue:" ",
                    validation: {
                        required: true,
                        productoedvalidation: function (input) {
                            if (input.is("[name='productoed']") && input.val() == " ") {
                                input.attr("data-productoedvalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }
                            return true;
                        }
                    }
                },
                unidad_medidaed: { 
                    type: "number",
                    defaultValue: 1,
                    validation: {
                        unidad_medidaedvalidation: function (input) {
                            if (input.is("[name='unidad_medided']") && input.val() == "0") {
                                input.attr("data-unidad_medidaedvalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }

                            return true;
                        }
                    }
                },
                cantidaded: {
                    type: "float",
                    validation: {
                         min:0,
                         required: true,
                        cantidadedvalidation: function (input) {
                            if (input.is("[name='cantidaded']") && input.val() == "0") {
                                input.attr("data-cantidadedvalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }

                            return true;
                        }
                    }
                },
                precio_unitarioed: {
                    type: "float",
                    validation: {
                         min:0,
                        required: true,
                        precio_unitarioedvalidation: function (input) {
                            if (input.is("[name='precio_unitarioed']") && input.val() == "0") {
                                input.attr("data-precio_unitarioedvalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }

                            return true;
                        }
                    }
                },
                totaled: {
                    type: "float"
                },
                valor_fobed: {
                    type: "float",
                    validation: {
                         min:0,
                        required: true,
                        valor_fobedvalidation: function (input) {
                            if (input.is("[name='valor_fobed']") && input.val() == "0") {
                                input.attr("data-valor_fobedvalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }

                            return true;
                        }
                    }
                },
                id_ddjjed: { 
                    type: "number",
                    defaultValue: {$id_ddjj_primero} ,
                    validation: {
                        id_ddjjvalidationed: function (input) {
                            if (input.is("[name='id_ddjj']") && input.val() == "0") {
                                input.attr("data-id_ddjjvalidationed-msg","Debe escoger una declaraci&oacute;n");
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
$("#insumosfacturaed{$id}").kendoGrid({
    dataSource: dataSourceed{$id},
    editable: true,
    scrollable: false,
    resizable: true,
    selectable: "simple",
    columns: [
        { field: "id_insumo",hidden: true
        }, 
        { field: "productoed", title: "Producto",editable: false
        },   
        { field: "cantidaded", title: "Cantidad/Peso"
        },
        { field: "unidad_medidaed", title: "Unidad de Medida",template:"#=getDescripcioned{$id}(unidad_medidaed)#"
            , editor: UMedidaDropDownEditored{$id}
        },
        { field: "precio_unitarioed", title: "Precio Unitario $us"
        },
        { field: "totaled", title: "Total $us",
           /* editor: function(cont, options) {
                $("<span>" + options.model.totaled + "</span>").appendTo(cont);
            }*/
        },
        { field: "valor_fobed", title: "Valor Fob $us"
        },
        { field: "id_ddjjed", title: "Declaraci&oacute;n Jurada",template:"#=getDescripcionDdjjed{$id}(id_ddjjed)#"
            , editor: UMedidaDropDownEditorDdjjed{$id}
        }
    ],
    save: function(data) {
        if (data.values.valor_fobed) {
            setTimeout(function (){
                actualizatotaled{$id}();
            },1000); 
        }
       /*  if (data.values.cantidaded) {
            var test = data.model.set("totaled", data.values.cantidaded * data.model.precio_unitarioed);
            actualizatotaled{$id}();
        }
         if (data.values.precio_unitarioed) {
            var test = data.model.set("totaled", data.model.cantidaded * data.values.precio_unitarioed);
            actualizatotaled{$id}();
        }*/
    }
});
//----------------------para los etodos dle kendo grid---------------------

function getDescripcioned{$id}(unidad_medidaed)
{  
    for(var i=0, length = unidadmedidaed{$id}.length; i< length;i++)
    {  
        if(unidadmedidaed{$id}[i].id_unidad_medida==unidad_medidaed)
        {
            return unidadmedidaed{$id}[i].descripcion;
        }
    }
}
var dsumedidaed{$id} = new kendo.data.DataSource({
        data: unidadmedidaed{$id}
});
function UMedidaDropDownEditored{$id}(container, options) {
    $('<input required data-bind="value:' + options.field+ '"/>')
        .appendTo(container)
        .kendoDropDownList({
                dataTextField: "descripcion",
                dataValueField: "id_unidad_medida",
                autoBind: false,
                dataSource: dsumedidaed{$id},
                select: onSelectunidadmedidaed{$id}
    });
}

function onSelectunidadmedidaed{$id}(e) {
    var dataItem = this.dataItem(e.item.index());
};

function getDescripcionDdjjed{$id}(id_ddjjed)
{  
    for(var i=0, length = declaracionesed{$id}.length; i< length;i++)
    {  
        if(declaracionesed{$id}[i].id_ddjj==id_ddjjed)
        {
            return declaracionesed{$id}[i].descripcion;
        }
    }
}
var dsddjjed{$id} = new kendo.data.DataSource({
        data: declaracionesed{$id}
});
function UMedidaDropDownEditorDdjjed{$id}(container, options) {
    $('<input required data-bind="value:' + options.field+ '"/>')
        .appendTo(container)
        .kendoDropDownList({
                dataTextField: "descripcion",
                dataValueField: "id_ddjj",
                autoBind: false,
                dataSource: dsddjjed{$id},
                select: onSelectddjjed{$id}
    });
}

function onSelectddjjed{$id}(e) {
    var dataItem = this.dataItem(e.item.index());
};
//----------para los botones de adicion------------------------
$("#addinsumofacturaed{$id}").kendoButton();
var addinsumofacturaed{$id} = $("#addinsumofacturaed{$id}").data("kendoButton");
addinsumofacturaed{$id}.bind("click", function(e){             
   var insumosfactura = $("#insumosfacturaed{$id}").data("kendoGrid");
   insumosfactura.addRow();
   insumosfactura.dataSource.sync();
}); 
$("#removeinsumofacturaed{$id}").kendoButton();
var removeinsumofacturaed{$id} = $("#removeinsumofacturaed{$id}").data("kendoButton");
removeinsumofacturaed{$id}.bind("click", function(e){             
    var insumosfactura = $("#insumosfacturaed{$id}").data("kendoGrid");
    var currentDataItem = insumosfactura.dataItem(insumosfactura.select());
    var dataRow = insumosfactura.dataSource.getByUid(currentDataItem.uid);
    insumosfactura.dataSource.remove(dataRow);
    insumosfactura.dataSource.sync();
    actualizatotaled{$id}();
});
//-----------para el costo de flete y seguro--------------
 $("#costofleteed{$id}").kendoNumericTextBox({
     min: 0,
     value: {$factura->flete}
 }); 
//------------------------------par el combo del incoterm------------------------------
var incotermlasted='0';
$("#incotermed{$id}").kendoComboBox(
    {   placeholder:"Icoterm",
        ignoreCase: true,
        dataTextField: "sigla",
        dataValueField: "Id",
        index: {$factura->id_incoterm},
        dataSource: [
        {foreach $incoterms as $incoterm} 
             { sigla: "{$incoterm->sigla}", Id: {$incoterm->id_incoterm}},
        {/foreach}  
        ],
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) { 
             this.text('');             
            }
            else
            {
                cambiar('ayudaicotermed'+incotermlasted,'ayudaicotermed'+String(this.value()));
                incotermlasted=String(this.value());
            }
        }
    });
var incotermed{$id} = $("#incotermed{$id}").data("kendoComboBox");

{foreach $incoterms as $incoterm} 
ocultar('ayudaicotermed{$incoterm->id_incoterm}');
{/foreach}
//------------------------------para las ayudas del incoterm-------------------------------------
//----------esto es para la ventana de ayuda de incoterm-------------------------------------------
var titulosincotermed = new Array(); 
var descripcionesincotermed = new Array();  

var ayudaicotermed = $("#ayudaicotermed{$id}");
function ayudaIcotermed()
{
    if (!$("#ayudaicotermed{$id}").data("kendoWindow")) { 
      ayudaicotermed.kendoWindow({

              draggable: true,
              height: "300px",                      
              width: "350px",
              resizable: true,
              actions: [ "Minimize", "Maximize", "Close"],
              animation: {
                close: {
                  effects: "fade:out",
                  duration: 1000
                },
                 open: {
                    effects: "fade:in",
                     duration: 1000
                  }
                }
        }).data("kendoWindow");
        ayudaicotermed.data("kendoWindow").open();
        ayudaicotermed.data("kendoWindow").center();}
    else
    {
        ayudaicotermed.data("kendoWindow").refresh();
        ayudaicotermed.data("kendoWindow").open();
        ayudaicotermed.data("kendoWindow").center();
    }
}
//---------------------------botones de cancelar y editar--------------------------
$("#cancelarfacturaed{$id}").kendoButton();
var cancelarfacturaed{$id} = $("#cancelarfacturaed{$id}").data("kendoButton");
cancelarfacturaed{$id}.bind("click", function(e){
     remover(tabStrip.select()); 
      anadir('Mis Facturas','admFactura','verFacturas');
});
$("#editarfacturaed{$id}").kendoButton();
var editarfacturaed{$id} = $("#editarfacturaed{$id}").data("kendoButton");

editarfacturaed{$id}.bind("click", function(e){  
    //aqui se validan los formualrios
    if(facturaformed{$id}.validate())
    {
        cambiar('registrofacturaed{$id}','firmadigital{$id}');
        generarPin('{$id_empresa}','{$id_persona}','26');   
        cambiarRedaccionFirma{$id}(26,'de edici&oacute;n de Factura',' edito la factura Nro: '+$("#nrofacturaed{$id}").val()); 
    }
});
//------------------es el actualiza total------------------------
var totalincotermed{$id}=0;// lña suma de los fob 
var totalproductosed{$id}=0;// la suma de los 
function actualizatotaled{$id}()
{   
    totalproductosed{$id}=0; 
    totalincotermed{$id}=0;
     var grid_factura = $("#insumosfacturaed{$id}").data("kendoGrid");
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
    var valores_factura = data_factura.data();
    for (var i = 0; i < numfilas_factura; i++) {
            totalproductosed{$id}+=valores_factura[i].totaled;
            totalincotermed{$id}+=valores_factura[i].valor_fobed;
    }
    //-------------actulaizamos el ttal de la factura
    if(isNaN(totalproductosed{$id}))
    {
        totalproductosed{$id}=0;
    }
   // alert(totalproductosed{$id});
    $("#totalproductosed{$id}").html(totalproductosed{$id});
    //----- actulaizamos el total de los valores fob
    $("#totalincotermed{$id}").html(totalincotermed{$id});
    
}
//-----------------------esto es para el validator-----------------------

var swped{$id}=0;
var swned{$id}=2;
var numcacheed{$id}='';
var numautorizacioned{$id}='';
var facturaformed{$id}= $("#facturaformed{$id}").kendoValidator({
    rules:{
        gridvalidatored{$id}: function(input) { ///aqui tienes que hacer el gran cambio de validacion
            var validate = input.data('gridvalidatored{$id}');
            if (typeof validate !== 'undefined') 
            {
                //---aqui cuentas los productos y verificas dsi no han metido panplinas
                swped{$id}=verificagrided{$id}();
                if(swped{$id}==0)
                {
                    return false;
                }
                else if(swped{$id}==1)
                {
                    return false;
                }
                else if(swped{$id}==3)
                {
                    return false;
                }
                else if(swped{$id}==2)
                {
                    return true
                }
                
            }
            return true;
        },
        verificanum{$id}: function(input) {
            var  validate = input.data('verificanum{$id}');
            if(typeof  validate !== 'undefined' && $("#nrofacturaed{$id}").val()!=='' && $("#nrofacturaed{$id}").val()!=='{$factura->numero_factura}'&& $("#nroautorizacioned{$id}").val()!=='{$factura->numero_autorizacion}')
            { 
               
                if($("#nrofacturaed{$id}").val()!==numcacheed{$id} || $("#nroautorizacioned{$id}").val()!==numautorizacioned{$id})
                {
                    verificaRepeticionNumed{$id}($("#nrofacturaed{$id}").val(),$("#nroautorizacioned{$id}").val());  
                    return false;
                }
                if(swned{$id}==0)
                {
                    return true;
                }
                if(swned{$id}==1)
                {  
                   
                    return false;
                }   
                return false;
            }
            return true;
        },
        costofletevalidatored{$id}: function(input) {
            var  costofletevalidatored{$id} = input.data('costofletevalidatored{$id}');
            if(typeof  costofletevalidatored{$id} !== 'undefined' )
            {
                if($("#costofleteed{$id}").val())
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
        date: function(input) {
            var date = input.data('date');
            if(typeof date !== 'undefined' && date !== false)
            {
                 if(isDate($("#datepickered{$id}").val()))
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
        costofletevalidatored{$id} :'Ingrese un monto',
        gridvalidatored{$id}: function(input) { 
            if(swped{$id}==0)
            {  
              return 'Ingrese almenos un producto para facturar.';
            }
            else if(swped{$id}==1)
            {
                return 'Por favor complete los productos';
            }
            else if(swped{$id}==3)
            {
                return 'Por favor escoja por lo menos una declaraci&oacute;n jurada';
            }
        },
         verificanum{$id}: function(input) {
            if(swned{$id}==1) { return 'El número de factura ya esta registrado'; }
            else { return 'Revisando..'; }
        },
        date: "Ingrese su fecha de expedición"
    }
}).data("kendoValidator");   
$("#nroautorizacioned{$id}").kendoMaskedTextBox({
    change: function() {
         facturaformed{$id}.validateInput($("#nrofacturaed{$id}"));
    }
});
function verificaRepeticionNumed{$id}(numero,autorizacion)
{
    $.ajax({             
    type: 'post',
    url: 'index.php',
    data: 'opcion=admFactura&tarea=verificarNumero&numero='+numero+'&autorizacion='+autorizacion,
    success: function (data) {
        swned{$id}=data;
        numcacheed{$id}=$("#nrofacturaed{$id}").val();
        numautorizacioned{$id}=$("#nroautorizacioned{$id}").val();
        facturaformed{$id}.validateInput($("#nrofacturaed{$id}"));
    }
    });
}
function verificagrided{$id}()
{
    var grid_factura = $("#insumosfacturaed{$id}").data("kendoGrid");
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
     var valores_factura = data_factura.data();
    if(numfilas_factura==0){
        return 0;
    }else{
        var swid_ddjj=true;//ninguna declaracion esta seleccionada
        for (var i = 0; i < numfilas_factura; i++) {
            if(!valores_factura[i].productoed.trim() || valores_factura[i].cantidaded==0 || valores_factura[i].precio_unitarioed==0 || valores_factura[i].valor_fobed==0 || valores_factura[i].totaled==0)
            { 
                return 1;
            }
            if(valores_factura[i].id_ddjjed!=0) swid_ddjj=false;
        }
        if(swid_ddjj) return 3;
        return 2;
    }
}
var datosinsumosfacturaed{$id}="";
function guardainsumosed{$id}()
{
    datosinsumosfacturaed{$id}="";
    var grid_factura = $("#insumosfacturaed{$id}").data("kendoGrid");
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
    var valores_factura = data_factura.data();
    var arr_factura = [];
    for (var i = 0; i < numfilas_factura; i++) {
        var valores=valores_factura[i].id_insumo+";"+valores_factura[i].productoed.trim()+";"+valores_factura[i].unidad_medidaed+";"+valores_factura[i].cantidaded+";"+valores_factura[i].precio_unitarioed+";"+valores_factura[i].totaled+";"+valores_factura[i].valor_fobed+";"+valores_factura[i].id_ddjjed;

        arr_factura.push(valores.trim());
    }
    datosinsumosfacturaed{$id}="insumosfactura="+arr_factura; 
}
actualizatotaled{$id}();


</script>  