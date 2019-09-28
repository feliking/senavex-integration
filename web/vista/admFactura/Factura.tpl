{assign var="id" value="ff"} 
<div class="row-fluid "  id="registrofactura" >
    <div class="span12" >
        <div class="k-block fadein">
            <div class="k-header">
                <div class="row-fluid  form" >
                    <div class="span12" >
                        <div class="titulonegro" >FACTURA COMERCIAL DE EXPORTACI&Oacute;N</div>  
                    </div>                                      
                </div>  
            </div>
            <form id="facturaform">
                <input type='hidden' name='id_acuerdo' value={$id_acuerdo}>
                <div class="row-fluid form" >
                    <div class="span2">
                        <img  id="imagenempresacabecera" src="styles/img/empresas/{$id_empresa}.{$formato_imagen}" onError='this.onerror=null;imgendefectoempresa(this);' />
                    </div>
                    <div class="span6" >
                        <div class="row-fluid fadein" id='factcabecera'>
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
                        Que tipo de Factura tiene?
                            Dosificada <input type="radio" name="dosificada" value="1" id="sidosificada" checked data-radio required> 
                            {if $nrodosificadas>0}
                            No Dosificada <input type="radio" name="dosificada" value="0" id="nodosificada" data-radio required> 
                            {/if}
                             <br/><span class="k-invalid-msg" data-for="dosificada"></span> 
                        <div class="bordefactura fadein" id="bordefactura" style="padding-bottom:2px;padding-top:4px;">
                            <span class="titulofactura" >NIT: {$empresa->nit}</span><br>
                            <input type="text" class="k-textbox"  style="width:90%;" onkeypress='return validateQty(event);'
                                    placeholder="Nro. de Autorización"  name="nroautorizacion" id="nroautorizacion" required validationMessage="Por favor ingrese el numero de su Autorización." /><br>
                            <br>
                            <input type="text" class="k-textbox"  style="width:90%;margin-bottom:5px;"  onkeypress='return validateQty(event);'
                                    placeholder="Nro. de Factura"  name="nrofactura" id="nrofactura"
                                    required data-required-msg="Por favor ingrese el numero de su factura."
                                    data-verificanum
                                    data-verificanum-url="validate/username" />
                        </div>
                    </div>
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid form" >   
                    <div class="span4" >
                        <input type="text" class="k-textbox"  placeholder='Importador' name="importador" id="importador" 
                               required validationMessage="Ingrese el Importador" />
                    </div>      
                    <div class="span4" >
                        <input type="text" class="k-textbox"  placeholder='Pais del Importador' name="paisimportador" id="paisimportador" 
                               required validationMessage="Ingrese el Pais." />
                    </div> 
                    <div class="span4" >
                        <input type="text" class="k-textbox"  placeholder='Dirección Importador' name="direccionimportador" id="direccionimportador" 
                               required validationMessage="Ingrese la Dirección." />
                    </div> 
                </div>
                <div class="row-fluid form" >   
                    <div class="span4 fadein" id='consignatariodiv'>
                        <input type="text" class="k-textbox"  placeholder='Consignatario' name="consignatario" id="consignatario" 
                                validationMessage="Ingrese el Consignatario" />
                    </div>      
                    <div class="span4 fadein" id='consignatariopaisdiv'>
                        <input type="text" class="k-textbox"  placeholder='Pais del Consignatario' name="paisconsignatario" id="paisconsignatario" 
                               validationMessage="Ingrese el Pais." />
                    </div> 
                    <div class="span4 fadein" id='consignatariodirdiv'>
                        <input type="text" class="k-textbox"  placeholder='Dirección Consignatario' name="direccionconsignatario" id="direccionconsignatario" 
                               validationMessage="Ingrese la Dirección." />
                    </div> 
                </div>
                <div class="row-fluid form" id='puertodestinodiv'> 
                    <div class="span4 fadein" >
                        <input type="text" class="k-textbox"  placeholder='Puerto de embarque' name="puertoembarque" id="puertoembarque" 
                               required validationMessage="Ingrese el puerto de embarque." />
                    </div> 
                    <div class="span4 fadein" >
                        <input placeholder='Pais de Destino' style="width:100%;" name="destinofactura" id="destinofactura" 
                               required validationMessage="Ingrese el destino." />
                    </div>                     
                    <div class="span1 parametro" >
                        Fecha:
                    </div>     
                    <div class="span3" >
                       <input id="datepicker" type="date" name="fechafactura"   placeholder="dd/mm/aa"  style="width:100%"> <br>
                       <center><input type="hidden" name="hiddenvalidatordate" id="hiddenvalidatordate" data-date data-required-msg="Ingrese la Fecha de expedición" /></center>
                    </div> 
                </div>
                <div class="row-fluid form" >
                    <div class="barra" >                           
                    </div> 
                </div> 
                <div class="row-fluid form" >
                    <div class="span12" >
                        <div id="insumosfacturad" class="fadein">
                            <div id="insumosfactura" class="fadein"></div>
                        </div>
                        <div id="insumosfacturand" class="fadein">
                            <div id="insumosfacturan" class="fadein"></div>
                        </div>
                         <input type="hidden" name="hiddenvalidator" id="hiddenvalidator" 
                         data-gridvalidator
                         data-required-msg="Complete los campos de productos" />
                    </div> 
                </div> 
                <div class="row-fluid form fadein" id="insumosfacturab">
                    <div class="span4" >
                    </div> 
                    <div class="span2 " >
                        <input id="addinsumofactura" type="button" value="+" class="k-primary" style="width:100%"/> 
                    </div> 
                    <div class="span2 " >
                        <input id="removeinsumofactura" type="button"  value="-" class="k-primary" style="width:100%"/>
                    </div> 
                    <div class="span4" >
                    </div> 
                </div> 
                <div class="row-fluid form" id="insumosfacturabn">
                    <div class="span5" >
                    </div> 
                    <div class="span2"  >
                        <input id="removeinsumofacturan" type="button"  value="-" class="k-primary" style="width:100%"/>
                    </div> 
                    <div class="span5" >
                    </div> 
                </div> 
                <div class="row-fluid form" id='totalproductosdiv'>
                    <div class="span12" >
                        <span class="letrarelevante">TOTAL PRODUCTOS: <span id="totalproductos">0</span> $us DOLARES AMERICANOS</span>
                    </div> 
                </div> 
                <div class="row-fluid form" >
                    <div class="barra" >                                         
                    </div> 
                </div> 
                <div class="row-fluid form" id='fletediv'> 
                    <div class="span4 parametro" >
                        Gastos de Flete y Seguro:
                    </div> 
                    <div class="span2 " >
                        <input type="number"   placeholder='Total $us' name="costoflete" id="costoflete"  />
                        <input type="hidden" name="costofletevalidator" id="costofletevalidator" 
                         data-costofletevalidator
                         data-required-msg="Ingrese el monto" />
                    </div> 
                    <div class="span2" >
                        <input style="width:100%;" id="incoterm" name="incoterm" required validationMessage="Escoja Incoterm">
                    </div> 
                    <div class="span1 " >
                        <img src="styles/img/ayuda.png" width="100%" onclick="ayudaIcoterm()" style="max-width:30px;" class="ayuda">
                    </div>
                </div> 
                <div class="row-fluid form" id='totalfobdiv'>
                    <div class="span12" >
                        <span class="letrarelevante">TOTAL VALOR FOB FRONTERA: <span id="totalincoterm">0</span> $us DOLARES AMERICANOS</span>
                    </div> 
                </div> 
                <div class="row-fluid form" id='barrafobdiv'>
                    <div class="barra" >                                         
                    </div> 
                </div> 
            </form>
            <div class="row-fluid  form" >
                <div class="span4" >
                </div>
                <div class="span2 " >
                 <input id="cancelarfactura" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                </div> 
                <div class="span2" >
                <input id="registrarfactura" type="button" value="Registrar" class="k-primary" style="width:100%"/> <br><br>
                </div>
                <div class="span4" >
                </div>
            </div>
        </div>
    </div>
</div>  
{include file="avisos/firmaDigital.tpl"}   
<div id="ayudaicoterm"  style="display:none">
    <div class="row-fluid " id="ayudaicoterm0">
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
    <div class="row-fluid " id="ayudaicoterm{$incoterm->id_incoterm}">
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
<script>  
//------------------- para los botnes-----------------------------
$("#addinsumofactura").kendoButton();
var addinsumofactura = $("#addinsumofactura").data("kendoButton");
addinsumofactura.bind("click", function(e){             
   var insumosfactura = $("#insumosfactura").data("kendoGrid");
   insumosfactura.addRow();
}); 
$("#removeinsumofactura").kendoButton();
var removeinsumofactura = $("#removeinsumofactura").data("kendoButton");
removeinsumofactura.bind("click", function(e){             
    var insumosfactura = $("#insumosfactura").data("kendoGrid");
    var currentDataItem = insumosfactura.dataItem(insumosfactura.select());
    var dataRow = insumosfactura.dataSource.getByUid(currentDataItem.uid);
    insumosfactura.dataSource.remove(dataRow);
    actualizatotal();
});
$("#cancelarfactura").kendoButton();
var cancelarfactura = $("#cancelarfactura").data("kendoButton");
cancelarfactura.bind("click", function(e){
     remover(tabStrip.select()); 
});
$("#registrarfactura").kendoButton();
var registrarfactura = $("#registrarfactura").data("kendoButton");
registrarfactura.bind("click", function(e){  
    //aqui se validan los formualrios
    if(facturaform.validate())
    {
      /*  $("#nrofacturafirma").html($("#nrofactura").val());// para el comentario de la factura
        cambiar('registrofactura','firmafactura');//cambiamos al valor de firma
        generarPinCorreo('{$id_empresa}','{$id_persona}','6');     */
        
        
        ///$("#nrofacturafirma").html($("#nrofactura").val());// para el comentario de la factura
        //generarPinCorreo('{$id_empresa}','{$id_persona}','6');   
        cambiar('registrofactura','firmadigital{$id}');
        generarPin('{$id_empresa}','{$id_persona}','24');
        cambiarRedaccionFirma{$id}(24,'de Facutra','valido la factura NRO: '+$("#nrofactura").val()); 
    }
});
$("#datepicker").kendoDatePicker({
 value: new Date()
});

                       
//--------------- esto es para el grid de insumos----------------
var totalincoterm=0;// lña suma de los fob 
var totalproductos=0;// la suma de los 
dataSource = new kendo.data.DataSource({
    schema: {
        model: {
            fields: {
                producto: { 
                    defaultValue:" ",
                    validation: {
                        required: true,
                        productovalidation: function (input) {
                            if (input.is("[name='producto']") && input.val() == " ") {
                                input.attr("data-productovalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }
                            return true;
                        }
                    }
                },
                unidad_medida: { 
                    type: "number",
                    defaultValue: 1,
                    validation: {
                        unidad_medidavalidation: function (input) {
                            if (input.is("[name='unidad_medida']") && input.val() == "0") {
                                input.attr("data-unidad_medida-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }

                            return true;
                        }
                    }
                },
                cantidad: {
                    type: "number",
                    validation: {
                         min:0,
                         required: true,
                        cantidadvalidation: function (input) {
                            if (input.is("[name='cantidad']") && input.val() == "0") {
                                input.attr("data-cantidadvalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }

                            return true;
                        }
                    }
                },
                precio_unitario: {
                    type: "number",
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
                    type: "number",
                    validation: {
                         min:0,
                        required: true,
                        totalvalidation: function (input) {
                            if (input.is("[name='total']") && input.val() == "0") {
                                input.attr("data-totalvalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }

                            return true;
                        }
                    }
                },
                valor_fob: {
                    type: "number",
                    validation: {
                         min:0,
                        required: true,
                        valor_fobvalidation: function (input) {
                            if (input.is("[name='valor_fob']") && input.val() == "0") {
                                input.attr("data-valor_fobvalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }

                            return true;
                        }
                    }
                },
                id_ddjj: { 
                    type: "number",
                    defaultValue: {$id_ddjj_primero} ,
                    validation: {
                        id_ddjjvalidation: function (input) {
                            if (input.is("[name='id_ddjj']") && input.val() == "0") {
                                input.attr("data-id_ddjj-msg","Debe escoger una declaraci&oacute;n");
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
var unidadmedida = [
{foreach $unidades as $unidad} 
{
    "id_unidad_medida": "{$unidad->getId_unidad_medida()}",
    "descripcion": "{$unidad->getDescripcion()}"
},
{/foreach} 
];
var declaraciones = [
{foreach $declaraciones as $declaracion} 
{
    "id_ddjj": "{$declaracion->getId_ddjj()}",
    "descripcion": "{$declaracion->getDescripcion_comercial()}"
},
{/foreach} 
];
$("#insumosfactura").kendoGrid({
    dataSource: dataSource,
    editable: true,
    scrollable: false,
    resizable: true,
    selectable: "simple",
    columns: [
        { field: "producto", title: "Producto",editable: false
        },   
        { field: "cantidad", title: "Cantidad/Peso"
        },
        { field: "unidad_medida", title: "Unidad de Medida",template:"#=getDescripcion(unidad_medida)#"
            , editor: UMedidaDropDownEditor},
        { field: "precio_unitario", title: "Precio Unitario $us"
        },
        { field: "total", title: "Total $us"
            ,
          /*  editor: function(cont, options) {
                $("<span>" + options.model.total + "</span>").appendTo(cont);
            }*/
        },
        { field: "valor_fob", title: "Valor Fob $us"
        },
        { field: "id_ddjj", title: "Declaraci&oacute;n Jurada",template:"#=getDescripcionDdjj(id_ddjj)#"
            , editor: UMedidaDropDownEditorDdjj
        }
    ],
    save: function(data) {
        if (data.values.valor_fob) {
            setTimeout(function (){
                actualizatotal();
            },1000); 
        }
        /* if (data.values.cantidad) {
            var test = data.model.set("total", data.values.cantidad * data.model.precio_unitario);
            actualizatotal();
        }
         if (data.values.precio_unitario) {
            var test = data.model.set("total", data.model.cantidad * data.values.precio_unitario);
            actualizatotal();
        }*/
    }
});

function getDescripcion(unidad_medida)
{  
    for(var i=0, length = unidadmedida.length; i< length;i++)
    {  
        if(unidadmedida[i].id_unidad_medida==unidad_medida)
        {
            return unidadmedida[i].descripcion;
        }
    }
}
function getDescripcionDdjj(id_ddjj)
{  
    for(var i=0, length = declaraciones.length; i< length;i++)
    {  
        if(declaraciones[i].id_ddjj==id_ddjj)
        {
            return declaraciones[i].descripcion;
        }
    }
}
var dsumedida = new kendo.data.DataSource({
        data: unidadmedida
});
function UMedidaDropDownEditor(container, options) {
    $('<input required data-bind="value:' + options.field+ '"/>')
        .appendTo(container)
        .kendoDropDownList({
                dataTextField: "descripcion",
                dataValueField: "id_unidad_medida",
                autoBind: false,
                dataSource: dsumedida,
                select: onSelectunidadmedida
    });
}

function onSelectunidadmedida(e) {
    var dataItem = this.dataItem(e.item.index());
};
var dsddjj = new kendo.data.DataSource({
        data: declaraciones
});
function UMedidaDropDownEditorDdjj(container, options) {
    $('<input required data-bind="value:' + options.field+ '"/>')
        .appendTo(container)
        .kendoDropDownList({
                dataTextField: "descripcion",
                dataValueField: "id_ddjj",
                autoBind: false,
                dataSource: dsddjj,
                select: onSelectddjj
    });
}

function onSelectddjj(e) {
    var dataItem = this.dataItem(e.item.index());
};
/*-----------------------kedo validator -----------------------------------------*/
var swp=0;
var swn=2;
var numcache='';
var numautorizacion='';
var facturaform = $("#facturaform").kendoValidator({
    rules:{
        radio: function(input) { 
                var validate = input.data('radio');
                if (typeof validate !== 'undefined' && validate !== false) 
                {
                    return $("#facturaform").find("[name=" + input.attr("name") + "]").is(":checked");
                }
                return true;
            },
        gridvalidator: function(input) { ///aqui tienes que hacer el gran cambio de validacion
            var validate = input.data('gridvalidator');
            if (typeof validate !== 'undefined') 
            {
                //---aqui cuentas los productos y verificas dsi no han metido panplinas
                swp=verificagrid();
                if(swp==0)
                {
                    return false;
                }
                else if(swp==1)
                {
                    return false;
                }
                else if(swp==3)
                {
                    return false;
                }
                else if(swp==2)
                {
                    return true
                }
                
            }
            return true;
        },
        verificanum: function(input) {
            var  validate = input.data('verificanum');
            if(typeof  validate !== 'undefined' && $("#nrofactura").val()!=='')
            { 
                
                if($("#nrofactura").val()!==numcache || $("#nroautorizacion").val()!==numautorizacion)
                {
                    verificaRepeticionNum($("#nrofactura").val(),$("#nroautorizacion").val());  
                    return false;    
                }    
                if(swn==0)
                {
                    return true;
                }
                if(swn==1)
                {  
                    return false;
                }   
                return false;
            }
            return true;
        },
        costofletevalidator: function(input) {
            var  costofletevalidator = input.data('costofletevalidator');
            if(typeof  costofletevalidator !== 'undefined' )
            {
                if($("#costoflete").val())
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

                 if(isDate($("#datepicker").val()))
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
        radio: "Seleccione una opción",
        costofletevalidator :'Ingrese un monto',
        gridvalidator: function(input) { 
            if(swp==0)
            {  
              return 'Ingrese almenos un producto para facturar.';
            }
            else if(swp==1)
            {
                return 'Por favor complete los campos';
            }
            else if(swp==3)
            {
                return 'Por favor escoja por lo menos una declaraci&oacute;n jurada';
            }
        },    
         verificanum: function(input) {
            if(swn==1) { return 'El número de factura ya esta registrado'; }
            else { return 'Revisando..'; }
        },
        date: "Ingrese su fecha de expedición"
    }
}).data("kendoValidator"); 
$("#nroautorizacion").kendoMaskedTextBox({
    change: function() {
         facturaform.validateInput($("#nrofactura"));
    }
});
function verificaRepeticionNum(numero,autorizacion)
{
    $.ajax({             
    type: 'post',
    url: 'index.php',
    data: 'opcion=admFactura&tarea=verificarNumero&numero='+numero+'&autorizacion='+autorizacion,
    success: function (data) {
        swn=data;
        numcache=$("#nrofactura").val();
        numautorizacion=$("#nroautorizacion").val();
        facturaform.validateInput($("#nrofactura"));
    }
    });
}
function verificagrid()
{
    if(esinsumosfactura==1)
    {
        var grid_factura = $("#insumosfactura").data("kendoGrid");
    }
    else
    {
        var grid_factura = $("#insumosfacturan").data("kendoGrid");
    }
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
    if(numfilas_factura==0){
         return 0;
    }else{
        var valores_factura = data_factura.data();
        var arr_factura = [];
        var swid_ddjj=true;//ninguna declaracion esta seleccionada
        if(esinsumosfactura==1)
        {
           
            if($('#nodosificada').is(':checked')) ////esto es etamente para el caso en que register una nd sin nin factura d relacionada
            { 
              
               for (var i = 0; i < numfilas_factura; i++) {
                    if(!valores_factura[i].producto.trim() || valores_factura[i].cantidad==0 
                            || valores_factura[i].precio_unitario==0)
                    {
                        return 1;
                    }
                    if(valores_factura[i].id_ddjj!=0) swid_ddjj=false;
                }
                
            }
            else
            {
                for (var i = 0; i < numfilas_factura; i++) {
                    if(!valores_factura[i].producto.trim() || valores_factura[i].cantidad==0 
                            || valores_factura[i].precio_unitario==0 || valores_factura[i].valor_fob==0)
                    {
                        return 1;
                    }
                    if(valores_factura[i].id_ddjj!=0) swid_ddjj=false;
                }
            }
           
        }
        else
        {
            for (var i = 0; i < numfilas_factura; i++) {
                if(valores_factura[i].precio_unitarion=='0' || valores_factura[i].cantidadn=='0' || valores_factura[i].totaln=='0')
                {
                    return 1;
                }
                if(valores_factura[i].id_ddjj!=0) swid_ddjj=false;
            }
        }
         if(swid_ddjj) return 3;
        return 2;
    }
}
//-----------------------------------guardar datos del grid
var datosinsumosfactura="";
function guardainsumos()
{
    datosinsumosfactura="";
    if(esinsumosfactura==1)
    {
        var grid_factura = $("#insumosfactura").data("kendoGrid");
    }
    else
    {
        var grid_factura = $("#insumosfacturan").data("kendoGrid");
    }
    
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
    var valores_factura = data_factura.data();
    var arr_factura = [];
    if(esinsumosfactura==1)
    {
        for (var i = 0; i < numfilas_factura; i++) {
            var valores=valores_factura[i].producto.trim()+";"+valores_factura[i].unidad_medida+";"+valores_factura[i].cantidad+";"+valores_factura[i].precio_unitario+";"+valores_factura[i].total+";"+valores_factura[i].valor_fob+";"+valores_factura[i].id_ddjj;
            
            arr_factura.push(valores.trim());
        }
    }
    else
    {
        for (var i = 0; i < numfilas_factura; i++) {
            var valores=valores_factura[i].producton.trim()+";"+valores_factura[i].unidad_medidan+";"+valores_factura[i].cantidadn+";"+valores_factura[i].precio_unitarion+";"+valores_factura[i].totaln+";"+valores_factura[i].id_insumos_factura+";"+valores_factura[i].cantidadnsaldo+";"+valores_factura[i].id_ddjj+";"+valores_factura[i].id_factura;
            arr_factura.push(valores.trim());
        }
    }
    datosinsumosfactura="insumosfactura="+arr_factura; 
}
function actualizatotal()
{
    totalproductos=0; 
    if(esinsumosfactura==1)
    {
        totalincoterm=0;
        var grid_factura = $("#insumosfactura").data("kendoGrid");
        var data_factura = grid_factura.dataSource;
        var numfilas_factura = data_factura.total();
    }
    else
    {
        var grid_factura = $("#insumosfacturan").data("kendoGrid");
        var data_factura = grid_factura.dataSource;
        var numfilas_factura = data_factura.total();
    }
    var valores_factura = data_factura.data();
    var arr_factura = [];
    for (var i = 0; i < numfilas_factura; i++) {
        if(esinsumosfactura==1)
        {
            totalproductos+=valores_factura[i].total;
            totalincoterm+=valores_factura[i].valor_fob;
        }
        else
        {
            totalproductos+=valores_factura[i].totaln;
        }
    }
    //-------------actulaizamos el ttal de la factura
    if(isNaN(totalproductos))
    {
        totalproductos=0;
    }
    $("#totalproductos").html(totalproductos);
    //----- actulaizamos el total de los valores fob
    if(esinsumosfactura==1)
    {
        $("#totalincoterm").html(totalincoterm);
    }
    
}
//-----------------------------para los radis--------------------------------------
$(document).ready(function(){
   $('#sidosificada').click(function(){ 
        mostrar('totalproductosdiv');
        //-----esto es para el puerto destino
        $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=admFactura&tarea=puerto',
        success: function (data) {
            $("#puertodestinodiv").html(data);
            }
        });
        //------------mostrar consignatario--------
        mostrar('consignatariodiv');
         mostrar('consignatariodirdiv');
         mostrar('consignatariopaisdiv');
        //----para mostrar el fob no dosificdas-------------
        var grid_factura = $("#insumosfactura").data("kendoGrid");
        grid_factura.showColumn("valor_fob");
        grid_factura.showColumn("total");
        grid_factura.showColumn("precio_unitario");
        grid_factura.showColumn("id_ddjj");
        //-------------------estoe es para el flete-----------
        $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=admFactura&tarea=flete',
        success: function (data) {
             $("#fletediv").html(data);
             mostrar('totalfobdiv');
             mostrar('barrafobdiv');
            }
        });
        //-------------------------------
        cambiar('factcabeceraoperador','factcabecera');
        cambiar('insumosfacturand','insumosfacturad');
        cambiar('insumosfacturabn','insumosfacturab');
        esinsumosfactura=1;
        actualizatotal();
        $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=admFactura&tarea=dosificada&sw=1&nit='+{$empresa->nit},
        success: function (data) {
            $("#bordefactura").html(data);
            }
        });
        
         document.getElementsByName('importador')[0].placeholder='Importador';
        document.getElementsByName('paisimportador')[0].placeholder='País del Importador';
        document.getElementsByName('direccionimportador')[0].placeholder='Dirección Importador';
        //----para la validacion del numero de autori
        swn=2;
   }); 
   $('#nodosificada').click(function(){
        mostrar('totalproductosdiv');
        //---------------------
        $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=admFactura&tarea=puerto',
        success: function (data) {
            $("#puertodestinodiv").html(data);
            }
        });
        
         mostrar('consignatariodiv');
         mostrar('consignatariodirdiv');
         mostrar('consignatariopaisdiv');
        //----------to es para ocultar el fob del grid factura-------------------
        
        var grid_factura = $("#insumosfacturan").data("kendoGrid");
        //grid_factura.hideColumn("valor_fob");
        grid_factura.showColumn("total");
        grid_factura.showColumn("precio_unitario");
        grid_factura.showColumn("id_ddjj");
        //-------------para cambiar el row de flete si es dosificada-----------------------
        $("#fletediv").html('');
        ocultar('totalfobdiv');
        ocultar('barrafobdiv');
        //----------------------estoees para e nuemro de factura
        $.ajax({             
        type: 'post',
        url: 'index.php',
        data: 'opcion=admFactura&tarea=dosificada&sw=0',
        success: function (data) {
            $("#bordefactura").html(data);
            }
        });
        //-------------cambia el grid------------
        esinsumosfactura=0;
        grid_factura.dataSource.data([]);
        cambiar('insumosfacturad','insumosfacturand');
        ocultar('insumosfacturab');//ocultamos los botones mas
        ocultar('insumosfacturabn');//ocultamos boton negatvo
        
         document.getElementsByName('importador')[0].placeholder='Importador';
        document.getElementsByName('paisimportador')[0].placeholder='País del Importador';
        document.getElementsByName('direccionimportador')[0].placeholder='Dirección Importador';
        actualizatotal();
   }); 
});
//------------------------------par el combo del incoterm------------------------------
$("#incoterm").kendoComboBox(
    {   placeholder:"Icnoterm",
        ignoreCase: true,
        dataTextField: "sigla",
        dataValueField: "Id",
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
                cambiar('ayudaicoterm'+incotermlast,'ayudaicoterm'+String(this.value()));
                incotermlast=String(this.value());
            }
        }
    });
var incoterm = $("#incoterm").data("kendoComboBox");
var incotermlast='0'; 
{foreach $incoterms as $incoterm} 
ocultar('ayudaicoterm{$incoterm->id_incoterm}');
{/foreach}
//----------------------para la fecha -------------------------------


//----------esto es para la ventana de ayuda de incoterm-------------------------------------------
var titulosincoterm = new Array(); 
var descripcionesincoterm = new Array();  

var ayudaicoterm = $("#ayudaicoterm");
function ayudaIcoterm()
{
    if (!$("#ayudaicoterm").data("kendoWindow")) { 
      ayudaicoterm.kendoWindow({

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
        ayudaicoterm.data("kendoWindow").open();
        ayudaicoterm.data("kendoWindow").center();}
    else
    {
        ayudaicoterm.data("kendoWindow").refresh();
        ayudaicoterm.data("kendoWindow").open();
        ayudaicoterm.data("kendoWindow").center();
    }
}
//-----------------para las unidades de medida------------------------------------------
ocultar('insumosfacturand');//esto es para ocultar el grid de no dosificada
ocultar('insumosfacturabn');// esto es para ocultar el boton - de nodosificada

//------------------------para el costo de flete------------------------------
 $("#costoflete").kendoNumericTextBox({
     min: 0
 }); 
 //---------------------------eto va a ser para el medoto que me va a añadir porductos a mi grid---------------------------------
 //----------------------------este es el grid para inumos factura no dosificada-------------------------
dataSourcen = new kendo.data.DataSource({
    schema: {
        model: {
            fields: {
                id_factura: { 
                }, 
                id_insumos_factura: { 
                }, 
                producton: { 
                    editable: false
                },     
                cantidadnsaldototal: {
                    type: "number"
                },
                cantidadnsaldo: {
                    type: "number"
                },
                cantidadn: {
                    type: "number",
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
                unidad_medidan: { 
                    editable: false
                },
                precio_unitarion: {
                    type: "number",
                    defaultValue: 0,
                    validation: {
                         min:0,
                        required: true,
                        peso_netovalidation: function (input) {
                            if (input.is("[name='peso_neto']") && input.val() == "0") {
                                input.attr("data-peso_netovalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }
                            return true;
                        }
                    }
                },
                totaln: {
                    type: "number"
                },
                id_ddjj: { 
                    type: "number",
                   // defaultValue: {$id_ddjj_primero} ,
                    validation: {
                        id_ddjjvalidation: function (input) {
                            if (input.is("[name='id_ddjj']") && input.val() == "0") {
                                input.attr("data-id_ddjj-msg","Debe escoger una declaraci&oacute;n");
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
$("#insumosfacturan").kendoGrid({
    dataSource: dataSourcen,
    editable: true,
    scrollable: false,
    resizable: true,
    selectable: "simple",
    columns: [
        { field: "id_insumos_factura", hidden: true},  
        { field: "id_factura", hidden: true}, 
        { field: "producton", title: "Producto"
                ,editable: false},  
        { field: "cantidadnsaldototal"
                ,hidden: true},  
        { field: "cantidadnsaldo", title: "Cantidad/Peso (saldo)"
                ,
            editor: function(cont, options) {
                $("<span>" + options.model.cantidadnsaldo + "</span>").appendTo(cont);
            }
        },
        { field: "cantidadn", title: "Cantidad/Peso",         
            editor: function(cont, options) {
               // $("<span>" + options.model.cantidadn + "</span>").appendTo(cont);
                var input = $("<input name='" + options.field + "'/>");
                // append it to the container
                input.appendTo(cont);
                // initialize a Kendo UI numeric text box and set max value
                input.kendoNumericTextBox({
                    max: options.model.cantidadnsaldototal,
                    min: '1',
                    change: function() {
                    }
                });
            }
        },
        { field: "unidad_medidan", title: "Unidad de Medida"
        },
        { field: "precio_unitarion", title: "Precio Unitario $us"
        },
        { field: "totaln", title: "Total $us",    
           /* editor: function(cont, options) {
                $("<span>" + options.model.totaln + "</span>").appendTo(cont);
            }*/
        },
        { field: "id_ddjj", title: "Declaraci&oacute;n Jurada",template:"#=getDescripcionDdjj(id_ddjj)#",
            attributes: {
              class: "table-cell",
              style: " font-size: 12px"
            }
            , editor: UMedidaDropDownEditorDdjj
        }       
    ],
    save: function(data) {
        if (data.values.cantidadn) {
            var test = data.model.set("cantidadnsaldo", data.model.cantidadnsaldototal - data.values.cantidadn);
        }
        /*if (data.values.cantidadn) {
            var test = data.model.set("totaln", data.values.cantidadn * data.model.precio_unitarion);
            esinsumosfactura=0;
            
        }
         if (data.values.precio_unitarion) {
            var test = data.model.set("totaln", data.model.cantidadn * data.values.precio_unitarion);
            esinsumosfactura=0;
        }*/
         actualizatotal();
    }
});
function actualizaGridNoDosificada(ids)
{
    if(ids=='')//mostrar el grid normal
   {   
       //cambiar('insumosfacturand','insumosfacturad');
       //cambiar('insumosfacturabn','insumosfacturab');
       ocultar('insumosfacturabn');
       var grid_factura = $("#insumosfacturan").data("kendoGrid");
       grid_factura.dataSource.data([]);
       //esinsumosfactura=1;//cambiamos cuando quieran emitri sin una dosificada
       actualizatotal();
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
       //--------------------esto es para mostrar y ocultar botones--------------------------------
       idarray=idinsumos.split(';');
       if(idarray.length>1) //tiene varios insumos
       {        
           cambiar('insumosfacturab','insumosfacturabn');//cambiamos botones

       }
       else //tiene un insumo
       {
           ocultar('insumosfacturab');//ocultamos los botones mas
           ocultar('insumosfacturabn');//ocultamos boton negatvo
       }
       esinsumosfactura=0;
       aumentaInsumosFacturan(idinsumos);
      // cambiar('insumosfacturad','insumosfacturand');//ocultamos cuando quieran emitri sin una dosificada
   }
   //cambiar('insumosfacturad','insumosfacturand');//ocultamos cuando quieran emitri sin una dosificada
}
function aumentaInsumosFacturan(ids)//aumentarcolumnas al kendo grid
{
    $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admFactura&tarea=devuelveInsumosFactura&id_insumos_factura='+ids+'&id_ddjj_primero={$id_ddjj_primero}',
            success: function (data) {  
               
                var insumos = eval('('+data+')');
                var tablaa = $("#insumosfacturan").data("kendoGrid");
                tablaa.dataSource.data([]);
                insumos.forEach(function(insumo) {
                    
                    tablaa.dataSource.add(insumo);
                    
                });
                actualizatotal();
            }
        }); 
}
//-------------------eto es par el boton de menos------------------------
$("#removeinsumofacturan").kendoButton();
var removeinsumofacturna = $("#removeinsumofacturan").data("kendoButton");
removeinsumofacturna.bind("click", function(e){  
   
    var insumosfacturan = $("#insumosfacturan").data("kendoGrid");
    var currentDataItem = insumosfacturan.dataItem(insumosfacturan.select());
    var dataRow = insumosfacturan.dataSource.getByUid(currentDataItem.uid);
    
    //alert(dataRow.id_insumos_factura);
    //alert(dataRow.id_factura);
    
    var grid_factura = $("#insumosfacturan").data("kendoGrid");
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
    var valores_factura = data_factura.data();
    sweliminar=1;
    for (var i = 0; i < numfilas_factura; i++) {
        if((dataRow.id_factura==valores_factura[i].id_factura) && (dataRow.id_insumos_factura!=valores_factura[i].id_insumos_factura ))
        {
            sweliminar=0;
        }
    }
    if(sweliminar==1)
    {
        eliminaMultiselect(dataRow.id_factura);
    }
    
    insumosfacturan.dataSource.remove(dataRow);
    var data_factura = insumosfacturan.dataSource;
    var numfilas_factura = data_factura.total();
    if(numfilas_factura==1)
    {
        ocultar('insumosfacturabn');
    }
    actualizatotal();  
    
});
var esinsumosfactura=1;//esto es para saber esta con el grid de nuevo, 0 si es grid esinsumosfacturan
//--------------to es para el tercer operador----------------------------

function eliminaMultiselect(id_factura)
{
    var multiselect = $("#facturasadmitidas").data("kendoMultiSelect");
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

//-----------me devuelve las facturas que estan een el multiselect
function getFacturaAdmitida()
{
    if($('#nodosificada').is(':checked')) // restringimos solo para las dosificadas
    {
        var multiselect = $("#facturasadmitidas").data("kendoMultiSelect");
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
    else
    {
        return null;
    }
    
}
//--------------------------esto es para el pais-----------------------------------------------
$("#destinofactura").kendoComboBox(
    {   placeholder:"País de Destino",
        dataTextField: "pais",
        dataValueField: "Id",
        dataSource: [
        {foreach $paises as $pais} 
        { pais: "{$pais->nombre}", Id: {$pais->id_pais}},
        {/foreach}
        ],
        change : function (e) {
            if (this.value() && this.selectedIndex == -1) { 
             this.text('');
            }
        }
});
var destinofactura = $("#destinofactura").data("kendoComboBox");
</script>  