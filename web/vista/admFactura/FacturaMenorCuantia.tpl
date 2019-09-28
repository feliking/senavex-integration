{assign var="id" value="f"}  
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
                <input type='hidden' name="dosificada" value="0">
                <div class="row-fluid form" >
                    <div class="span2">
                        <img  id="imagenempresacabecera" src="styles/img/empresas/{$id_empresa}.{$formato_imagen}" onError='this.onerror=null;imgendefectoempresa(this);' />
                    </div>
                    <div class="span7" >
                        <div class="row-fluid " >
                            <div class="span12  cabecerafactura" >
                                 <span class="titulofactura" >{$empresa->razon_social}</span> <br>
                                {$empresa->direccion}<br>
                                Telf. {$empresa->numero_contacto} {if $empresa->fax} Fax:{$empresa->fax}{/if}<br>
                                {$empresa->email} {if $empresa->pagina_web}{$empresa->pagina_web}{/if}<br> 
                                {$empresa->ciudad}-BOLIVIA
                            </div>  
                        </div>
                    </div>
                    <div class="span3"> 
                        <input type="text" class="k-textbox fadein"  style="width:90%;margin-bottom:5px;" onkeypress='return validateQty(event);'
                        placeholder="Nro. de Factura"  name="nrofactura" id="nrofactura" required validationMessage="Ingrese el numero de su factura." /><br>
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
                        <div id="insumosfactura"></div>
                         <input type="hidden" name="hiddenvalidator" id="hiddenvalidator" 
                         data-gridvalidator
                         data-required-msg="Complete los campos de productos" />
                    </div> 
                </div> 
                <div class="row-fluid form" >
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
                <div class="row-fluid form" >
                    <div class="span12" >
                        <span class="letrarelevante">TOTAL PRODUCTOS: <span id="totalproductos">0</span> $us DOLARES AMERICANOS</span>
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
        $("#nrofacturafirma").html($("#nrofactura").val());// para el comentario de la factura
        //generarPinCorreo('{$id_empresa}','{$id_persona}','6');   
        cambiar('registrofactura','firmadigital{$id}');
        generarPin('{$id_empresa}','{$id_persona}','6');
        cambiarRedaccionFirma{$id}(6,'de Facutra','valido la factura.'); 
    }
});
$("#datepicker").kendoDatePicker({
 value: new Date()
});

                       
//--------------- esto es para el grid de insumos----------------
var total=0;//es el total de la factura
var totalincoterm=0;
var totalproductos=0;
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
                        peso_netovalidation: function (input) {
                            if (input.is("[name='peso_neto']") && input.val() == "0") {
                                input.attr("data-peso_netovalidation-msg", "Debe ingresar un valor");
                                return /^[A-Z]/.test(input.val());
                            }

                            return true;
                        }
                    }
                },
                total: {
                    type: "number"
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
        { field: "producto", title: "Producto",editable: false},   
        { field: "cantidad", title: "Cantidad/Peso"},
        { field: "unidad_medida", title: "Unidad de Medida",template:"#=getDescripcion(unidad_medida)#", editor: UMedidaDropDownEditor},
        { field: "precio_unitario", title: "Precio Unitario $us"},
        { field: "total", title: "Total $us",
            /*editor: function(cont, options) {
                $("<span>" + options.model.total + "</span>").appendTo(cont);
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
       /*  if (data.values.cantidad) {
            var test = data.model.set("total", data.values.cantidad * data.model.precio_unitario);
            actualizatotal();
        }
         if (data.values.precio_unitario) {
            var test = data.model.set("total", data.model.cantidad * data.values.precio_unitario);
            actualizatotal();
        }*/
        actualizatotal();
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
}
/*-----------------------kedo validator -----------------------------------------*/
var swp=0;
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
                return 'Por favor complete los productos';
            }
             else if(swp==3)
            {
                return 'Por favor escoja por lo menos una declaraci&oacute;n jurada';
            }
        },
        date: "Ingrese su fecha de expedición"
    }
}).data("kendoValidator");   
function verificagrid()
{
    var grid_factura = $("#insumosfactura").data("kendoGrid");
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
    if(numfilas_factura==0){
        return 0;
    }else{
        var valores_factura = data_factura.data();
        var arr_factura = [];
        var swid_ddjj=true;//ninguna declaracion esta seleccionada
        for (var i = 0; i < numfilas_factura; i++) {
            if(!valores_factura[i].producto.trim() || valores_factura[i].precio_unitario=='0'
                    || valores_factura[i].cantidad=='0' || valores_factura[i].precio_unitario=='0' || valores_factura[i].total=='0')
            {
                return 1;
            }
            if(valores_factura[i].id_ddjj!=0) swid_ddjj=false;
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
    var grid_factura = $("#insumosfactura").data("kendoGrid");
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
    var valores_factura = data_factura.data();
    var arr_factura = [];
    for (var i = 0; i < numfilas_factura; i++) {
        var valores=valores_factura[i].producto.trim()+";"+valores_factura[i].unidad_medida+";"+valores_factura[i].cantidad+";"+valores_factura[i].precio_unitario+";"+valores_factura[i].total;
        arr_factura.push(valores.trim());
    }
    datosinsumosfactura="insumosfactura="+arr_factura; 
}
function actualizatotal()
{
    totalproductos=0;
    var grid_factura = $("#insumosfactura").data("kendoGrid");
    var data_factura = grid_factura.dataSource;
    var numfilas_factura = data_factura.total();
    var valores_factura = data_factura.data();
    var arr_factura = [];
    for (var i = 0; i < numfilas_factura; i++) {
        totalproductos+=valores_factura[i].total;
    }
    $("#totalproductos").html(totalproductos);      
}


//-----------------para las unidades de medida------------------------------------------
 

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
//----------------------para la fecha -------------------------------
{literal}
function isDate(txtDate)
{
  var currVal = txtDate;
  if(currVal == '')
    return false;
  //Declare Regex 
  var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
  var dtArray = currVal.match(rxDatePattern); // is format OK?
  if (dtArray == null)
     return false;
  //Checks for mm/dd/yyyy format. 
    dtDay = dtArray[1];
    dtMonth= dtArray[3];
    dtYear = dtArray[5]; 
  if (dtMonth < 1 || dtMonth > 12)
      return false;
  else if (dtDay < 1 || dtDay> 31)
      return false;
  else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31)
      return false;
  else if (dtMonth == 2)
  {
     var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
     if (dtDay> 29 || (dtDay ==29 && !isleap))
          return false;
  }
  return true;
}

{/literal}

</script>  