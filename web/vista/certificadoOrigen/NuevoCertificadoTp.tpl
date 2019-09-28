<div id="ddjjfacturatp">
    <form name="form_ddjjfacturatp" id="form_ddjjfacturatp" method="post" action="index.php">
        <div id="divfacturasescogertp">
            <div class="row-fluid form">
                <div class="span12">Escoja su Factura.</div>
            </div>
            <div class="row-fluid form">
                <div class="span12"><div id="facturasTp" class="fadein"></div>
                  <center> <input type="hidden" name="hiddenvalidatorfacturastp" id="hiddenvalidatorfacturastp" 
                data-facturastpvalidator
                data-required-msg="Escoja por lo menos una opción" /></center>
                </div>
            </div>
            <div class="row-fluid form">
                <input id="desgloseDdjjTp" type="button"  value="Desglosar por DDJJ" class="k-primary" /> 
                <input id="desgloseFacturaTp" type="button"  value="Desglosar por Factura" class="k-primary" />
                <input id="cancelardatostp" type="button"  value="Cancelar" class="k-primary" /> 
            </div>
        </div>
    </form>
</div>

<div class="row-fluid fadein"  id="firmaenvioTp" >
       <div class="k-block fadein">
                <div class="k-header">
                    <div class="k-header"><div class="titulo">Confirmación de Envío de Certificado de Origen</div></div>
                </div>
                <div class="k-cuerpo"> 
                    <div class="row-fluid  form" >
                        <div class="span1" > </div>
                        <div class="span10" >
                            <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico el envío para revisión
                                del Certificado de Origen tipo TERCEROS PAÍSES.</p>
                            <p > El costo de la emisión que debe cancelar para el recojo del Certificado de Origen es de:</p>
                            <p ><div id="costo_tp" style="color:red; font-size: 18px;"></div> </p>
                        </div>  
                        <div class="span1" ></div>
                    </div> 
                    <form name="formfirmaenvioTp" id="formfirmaenvioTp" method="post"  action="index.php" >
                        <div class="row-fluid  form" >
                            <div class="span5" ></div>
                            <div class="span2" >
                                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                               class="k-textbox " placeholder="Pin" name="pinfirmaenvioTp"  id="pinfirmaenvioTp" maxlength="4" size="4" style="width:50px;"
                               required data-required-msg="Por favor ingrese su Pin." data-firmarenvioTp /> 
                            </div>  
                            <div class="span5" ></div>
                        </div>  
                        <div class="row-fluid  form" >
                            <div class="span4 hidden-phone" >
                             </div>
                             <div class="span2 " >
                                 <input id="cancelafirmaenvioTp" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                             </div> 
                             <div class="span2 " >
                                 <input id="firmarenvioTp" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                             </div> 
                             <div class="span4 hidden-phone" >
                             </div>
                         </div> 
                    </form> 
                </div>   
      </div>              
</div>

<script>
ocultar('firmaenvioTp');

//FUNCIONES PARA LA FIRMA DEL EXPORTADOR ENVIANDO EL C.O.
$("#cancelafirmaenvioTp").kendoButton();
$("#firmarenvioTp").kendoButton();
var cancelafirmaenvioTp = $("#cancelafirmaenvioTp").data("kendoButton");
var firmarenvioTp = $("#firmarenvioTp").data("kendoButton");

cancelafirmaenvioTp.bind("click", function(e){             
    //ocultar('firmaenvioTp');
    cambiar('firmaenvioTp','datosgeneralesco');
    borrarPin('{$nombre}');
});

firmarenvioTp.bind("click", function(e){
    if(formfirmaenvioTp.validate())
    {
        var tp = $("#tabla_tp").data("kendoGrid");
        var data_tp = tp.dataSource;
        var valores_tp = data_tp.data();

        var acuerdo = $("#lista_co").val();
        var pais = $("#combopais").val();
        var regional = $("#comboregional").val();
        var fechaexportacion = $("#fechaexportacion").val();
        var tablaTp = JSON.stringify(valores_tp);
        var nombreconsig = $("#nombreconsignatariotp").val();
        var direccionconsig = $("#direccionconsignatariotp").val();
        var paisconsig = $("#paisconsignatariotp").val();
            
        var datos = $("#form_tp").serialize()+"&opcion=admCertificado&tarea=guardarCOTp&id_pais="+pais+"&id_acuerdo="+acuerdo+"&id_regional="+regional+"&fechaexportacion="+fechaexportacion+"&nombreconsignatario="+nombreconsig+"&direccionconsignatario="+direccionconsig+"&paisconsignatario="+paisconsig+"&tabla_tp="+tablaTp;
        
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: datos,
            success: function(data) {
                firmarPin('Certificados de Origen','admCertificado','','{$nombre}');
            }
        });
    }
});

/*-----------esto es para la validacion del pin*****************************************/
var swfirma=2;        
var firmacache='';
var formfirmaenvioTp = $("#formfirmaenvioTp").kendoValidator({
    rules:{ 
        firmarenvioTp: function(input) { 
            var validate = input.data('firmarenvioTp');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmacache !== $("#pinfirmaenvioTp").val()) 
                {
                    verificarPinTp($("#pinfirmaenvioTp").val());                    
                    return false;
                }
                if(swfirma==1)
                {
                     return true;
                }
                if(swfirma==0)
                {  
                    return false;
                }  
                return false;
            }

           return true;
        }
    },
    messages:{
        firmarenvioTp: function(input) { 
            if(swfirma==0)
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

function verificarPinTp(pin_insertado)
{
    $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
            success: function (data) {    
                swfirma=data;
                firmacache=$("#pinfirmaenvioTp").val();
                formfirmaenvioTp.validateInput($("#pinfirmaenvioTp"));
            }
        }); 
}

//***** Funciones y métodos para el C.O. ********//
$("#addfiladdjj_tp").kendoButton();
$("#elimfiladdjj_tp").kendoButton();
$("#enviar_tp").kendoButton();
$("#cancelar_tp").kendoButton();
$("#cancelardatostp").kendoButton();
$("#desgloseDdjjTp").kendoButton();
$("#desgloseFacturaTp").kendoButton();

var addfiladdjj_tp = $("#addfiladdjj_tp").data("kendoButton");
var elimfiladdjj_tp = $("#elimfiladdjj_tp").data("kendoButton");
var enviar_tp = $("#enviar_tp").data("kendoButton");
var cancelar_tp = $("#cancelar_tp").data("kendoButton");
var cancelardatostp = $("#cancelardatostp").data("kendoButton");
var desgloseDdjjTp = $("#desgloseDdjjTp").data("kendoButton");
var desgloseFacturaTp = $("#desgloseFacturaTp").data("kendoButton");

var ddjjfacturatp = $("#ddjjfacturatp").kendoWindow({
    draggable: true,
    height: "550px",                      
    width: "900px",
    resizable: true,
    animation: {
        close: {
          effects: "fade:out",
          duration: 1000
        }
    }
}).data("kendoWindow");
ddjjfacturatp.center(); 

//*******Acciones para Certificado SGP
addfiladdjj_tp.bind("click", function(e){
    ddjjfacturatp.open();
    listarFacturasTp();
});

//TABLAS Y VALIDACIONES PARA ALADI
var form_tp = $("#form_tp").kendoValidator({
    rules:{
        gridvalidatortp: function(input) { 
            var validate = input.data('gridvalidatortp');
            if (typeof validate !== 'undefined') 
            {
                //---aqui cuentas los productos y verificas si no estan vacíos
                swp=verificagridtablatp();
                if(swp==0){
                    return false;
                }
                else if(swp==1){
                    return false;
                }
                else if(swp==2){
                    return true
                }
            }
            return true;
        }
    },
    messages:{
        gridvalidatortp: function(input) { 
            if(swp==0){  
                return 'Ingrese al menos un dato para el certificado.';
            }else{
                return 'Por favor Complete los datos';
            }
        },
    }
}).data("kendoValidator");

function verificagridtablatp()
{
    var grid_tp = $("#tabla_tp").data("kendoGrid");
    var data_tp = grid_tp.dataSource;
    var numfilas_tp = data_tp.total();
    if(numfilas_tp==0){
        return 0;
    }else{
        var valores_tp = data_tp.data();
        for (var i = 0; i < numfilas_tp; i++) {
            if(!valores_tp[i].descripcion_comercial.trim())
            {
                return 1;
            }
        }
        return 2;
    }
}

var form_to_tp = $("#form_to_tp").kendoValidator({
}).data("kendoValidator");

enviar_tp.bind("click", function(e){
    if(form_general.validate() && form_tp.validate()){
        //Recorrer la tabla para sacar el total de la mercaderia
        var valor,costo, total=0;
        $("#tabla_tp tbody tr").each(function (index) {
            $(this).children("td").each(function (index2) {
                switch (index2){
                    case 8: valor = $(this).text();
                            break;
                }
            });
            total=total+parseFloat(valor);
        });
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admCertificado&tarea=calcularPago&total='+total+'&id_tipo_certificado=4',
            success: function (data) {
                costo = eval('('+data+')');
                costo = "Total a Pagar: "+ costo + " Bs.";
                $("#costo_tp").html(costo);
            }
        });
        
        var check_to = $("#check_factterceroperadortp").prop('checked');
        if(check_to){
            if(form_to_tp.validate()){
                cambiar('datosgeneralesco','firmaenvioTp');
                generarPin('{$id_empresa}','{$id_persona}','14');
            }
        }else{            
            cambiar('datosgeneralesco','firmaenvioTp');
            generarPin('{$id_empresa}','{$id_persona}','14');
        }
    }
});
cancelar_tp.bind("click", function(e){  
    ddjjfacturatp.close();
    remover(tabStrip.select());
});

var form_ddjjfacturatp = $("#form_ddjjfacturatp").kendoValidator({
    rules:{
        facturastpvalidator: function(input) { 
            var validate = input.data('facturastpvalidator');
            if (typeof validate !== 'undefined') 
            {
                swp=verificagridfacturastp();
                if(swp==0){
                    return false;
                }
            }
            return true;
        }
    },
    messages:{
        facturastpvalidator: function(input) { 
            if(swp==0){  
                return 'Escoja por lo menos una Factura';
            }else{
                return 'Por favor Complete los datos';
            }
        }
    }
}).data("kendoValidator");
function verificagridfacturastp()
{
    var facturastp = $("#facturasTp").data("kendoGrid");
    var currentDataItem = facturastp.dataItem(facturastp.select());
    if(!currentDataItem){
        return 0;
    }else{
        return 1;
    }
}

desgloseDdjjTp.bind("click", function(e){
    if(form_ddjjfacturatp.validate()){
        //Tabla con datos del Tp
        var tabla = $("#tabla_tp").data("kendoGrid");
        //Tabla con las facturas e insumos.
        var facturastp = $("#facturasTp").data("kendoGrid");

        facturastp.select().each(function () {
            //Capturar todos los datos de la tabla FacturasTp
            var dataItem = facturastp.dataItem($(this));
            //Capturar los datos de la tabla_tp
            var data_tp = tabla.dataSource;
            
            //alert(data_tp.total());
            if(data_tp.total()==0){
                var dataItem2 = dataItem;
                
                if(dataItem.cantidad_ddjj==1){
                    dataItem2.tipo_desglose = "1";
                    tabla.dataSource.add(dataItem2);
                }else{
                    var id_ddjj = dataItem.id_ddjj.split(";");
                    var descripcion = dataItem.descripcion_comercial.split(";");
                    var arancel = dataItem.clasificacion_arancelaria.split(";");
                    
                    for(var i=0;i<dataItem.cantidad_ddjj;i++){
                        dataItem2.id_ddjj = id_ddjj[i];
                        dataItem2.clasificacion_arancelaria = arancel[i];
                        dataItem2.descripcion_comercial = descripcion[i];
                        dataItem2.id_factura = dataItem.id_factura;
                        dataItem2.tipo_factura = dataItem.tipo_factura;
                        dataItem2.numero_factura = dataItem.numero_factura;
                        dataItem2.id_insumos_factura = dataItem.id_insumos_factura;
                        dataItem2.total = dataItem.total;
                        dataItem2.fecha_emision = dataItem.fecha_emision;
                        dataItem2.tipo_desglose = "1";
                        tabla.dataSource.add(dataItem2);
                    }
                }
                var datos=JSON.stringify(dataItem2);
                $.ajax({
                    type: 'get',
                    url: 'index.php?opcion=admInventario&tarea=buscarConsignatarioFactura&valores='+datos,
                    success: function(data) {
                        var data = eval('('+data+')');
                        $("#nombreconsignatariotp").val(data.nombre_consignatario);
                        $("#direccionconsignatariotp").val(data.direccion_consignatario);
                        $("#paisconsignatariotp").val(data.pais_consignatario);
                    }
                });
            }else{
                var valores_tp = data_tp.data();
                var bandera=0;

                for(var i=0; i<data_tp.total(); i++){
                    if((valores_tp[i].id_factura==dataItem.id_factura)&&(valores_tp[i].tipo_factura==dataItem.tipo_factura)){
                        bandera=1;
                        break;
                    }
                }
                if(bandera==0){
                    var dataItem2 = dataItem;

                    if(dataItem.cantidad_ddjj==1){
                        tabla.dataSource.add(dataItem2);
                    }else{
                        var id_ddjj = dataItem.id_ddjj.split(";");
                        var descripcion = dataItem.descripcion_comercial.split(";");
                        var arancel = dataItem.clasificacion_arancelaria.split(";");

                        for(var i=0;i<dataItem.cantidad_ddjj;i++){
                            dataItem2.id_ddjj = id_ddjj[i];
                            dataItem2.clasificacion_arancelaria = arancel[i];
                            dataItem2.descripcion_comercial = descripcion[i];
                            dataItem2.id_factura = dataItem.id_factura;
                            dataItem2.tipo_factura = dataItem.tipo_factura;
                            dataItem2.numero_factura = dataItem.numero_factura;
                            dataItem2.id_insumos_factura = dataItem.id_insumos_factura;
                            dataItem2.total = dataItem.total;
                            dataItem2.fecha_emision = dataItem.fecha_emision;
                            dataItem2.tipo_desglose = "1";
                            tabla.dataSource.add(dataItem2);
                        }
                    }

                    var datos=JSON.stringify(dataItem2);
                    $.ajax({
                        type: 'get',
                        url: 'index.php?opcion=admInventario&tarea=buscarConsignatarioFactura&valores='+datos,
                        success: function(data) {
                            var data = eval('('+data+')');
                            $("#nombreconsignatariotp").val(data.nombre_consignatario);
                            $("#direccionconsignatariotp").val(data.direccion_consignatario);
                            $("#paisconsignatariotp").val(data.pais_consignatario);
                        }
                    });
                }else{
                    alert("Ya existe la Factura: "+dataItem.numero_factura);
                }
            }
        });
        tabla.refresh();
        ddjjfacturatp.close();
    }
});

desgloseFacturaTp.bind("click", function(e){
    if(form_ddjjfacturatp.validate()){
        //Tabla con datos del Tp
        var tabla = $("#tabla_tp").data("kendoGrid");
        //Tabla con las facturas e insumos.
        var facturastp = $("#facturasTp").data("kendoGrid");

        facturastp.select().each(function () {
            //Capturar todos los datos de la tabla FacturasTp
            var dataItem = facturastp.dataItem($(this));
            //Capturar los datos de la tabla_tp
            var data_tp = tabla.dataSource;
            
            if(data_tp.total()==0){
                var dataItem2 = dataItem;
                var id_insumos = dataItem.id_insumos_factura.split(";");
                var insumos = dataItem.insumos.split(";");
                
                for(var i=0; i<id_insumos.length; i++){
                    var contenido = insumos[i].split("|");
                    
                    dataItem2.id_ddjj = contenido[2];
                    dataItem2.clasificacion_arancelaria = contenido[1];
                    dataItem2.descripcion_comercial = contenido[0];
                    dataItem2.id_factura = dataItem.id_factura;
                    dataItem2.tipo_factura = dataItem.tipo_factura;
                    dataItem2.numero_factura = dataItem.numero_factura;
                    dataItem2.id_insumos_factura = dataItem.id_insumos;
                    dataItem2.insumos = dataItem.insumos;
                    dataItem2.total = dataItem.total;
                    dataItem2.fecha_emision = dataItem.fecha_emision;
                    dataItem2.tipo_desglose = "2";
                    tabla.dataSource.add(dataItem2);
                }
                var datos=JSON.stringify(dataItem2);
                $.ajax({
                    type: 'get',
                    url: 'index.php?opcion=admInventario&tarea=buscarConsignatarioFactura&valores='+datos,
                    success: function(data) {
                        var data = eval('('+data+')');
                        $("#nombreconsignatariotp").val(data.nombre_consignatario);
                        $("#direccionconsignatariotp").val(data.direccion_consignatario);
                        $("#paisconsignatariotp").val(data.pais_consignatario);
                    }
                });
            }else{
                var valores_tp = data_tp.data();
                var bandera=0;

                for(var i=0; i<data_tp.total(); i++){
                    if((valores_tp[i].id_factura==dataItem.id_factura)&&(valores_tp[i].tipo_factura==dataItem.tipo_factura)){
                        bandera=1;
                        break;
                    }
                }
                if(bandera==0){
                    var dataItem2 = dataItem;
                    var id_insumos = dataItem.id_insumos_factura.split(";");
                    var insumos = dataItem.insumos.split(";");

                    for(var i=0; i<id_insumos.length; i++){
                        var contenido = insumos[i].split("|");

                        dataItem2.id_ddjj = contenido[2];
                        dataItem2.clasificacion_arancelaria = contenido[1];
                        dataItem2.descripcion_comercial = contenido[0];
                        dataItem2.id_factura = dataItem.id_factura;
                        dataItem2.tipo_factura = dataItem.tipo_factura;
                        dataItem2.numero_factura = dataItem.numero_factura;
                        dataItem2.id_insumos_factura = dataItem.id_insumos;
                        dataItem2.insumos = dataItem.insumos;
                        dataItem2.total = dataItem.total;
                        dataItem2.fecha_emision = dataItem.fecha_emision;
                        dataItem2.tipo_desglose = "2";
                        tabla.dataSource.add(dataItem2);
                    }
                    var datos=JSON.stringify(dataItem2);
                    $.ajax({
                        type: 'get',
                        url: 'index.php?opcion=admInventario&tarea=buscarConsignatarioFactura&valores='+datos,
                        success: function(data) {
                            var data = eval('('+data+')');
                            $("#nombreconsignatariotp").val(data.nombre_consignatario);
                            $("#direccionconsignatariotp").val(data.direccion_consignatario);
                            $("#paisconsignatariotp").val(data.pais_consignatario);
                        }
                    });
                }else{
                    alert("Ya existe la Factura: "+dataItem.numero_factura);
                }
            }
        });
        tabla.refresh();
        ddjjfacturatp.close();
    }
});

/***** Botones de Cancelar *****/
cancelardatostp.bind("click", function(e){  
    ddjjfacturatp.close();
});

var dataTp = new kendo.data.DataSource({
    schema: {
        model: {
            fields: {
                id_ddjj:{ editable: false},
                clasificacion_arancelaria: { editable: false},
                descripcion_comercial: { type: "string", editable: true, validation: { required: true}},
                id_factura: { editable: false},
                tipo_factura: { editable: false},
                numero_factura: { editable: false},
                id_insumos_factura: { editable: false},
                insumos: { editable: false},
                total: { editable: false},
                fecha_emision: { editable: false},
                tipo_desglose: { editable: false}
            }
        }
    }
});

$(document).ready(function (){
    
    $('#check_consignatariotp').change(function(){
        var marcado = $(this).prop('checked');
        if(marcado){
            $('#nombreconsignatariotp').removeAttr('disabled');
            $('#direccionconsignatariotp').removeAttr('disabled');
            $('#paisconsignatariotp').removeAttr('disabled');
        } else {
            $('#nombreconsignatariotp').attr('disabled','disabled');
            $('#direccionconsignatariotp').attr('disabled','disabled');
            $('#paisconsignatariotp').attr('disabled','disabled');
        }  
    });
    /*
    $('#check_factterceroperadortp').change(function(){
        var marcado = $(this).prop('checked');
        if(marcado){
            $('#fto_tp').fadeIn(1000);
        } else {
            $('#fto_tp').fadeOut(1000);
        }  
    });
    */
    $('#check_factterceroperadortp').change(function(){
        var marcado = $(this).prop('checked');
        if(marcado){
            $('#div_factterceroptp').fadeIn(1000);
            $('#div_factterceroptp2').fadeIn(1000);
        } else {
            $('#div_factterceroptp').fadeOut(1000);
            $('#div_factterceroptp2').fadeOut(1000);
        }  
    });

    $("#combomediotransportetp").kendoDropDownList({
        autoBind: false,
        optionLabel: "Seleccionar Medio de Transporte...",
        dataTextField: "descripcion",
        dataValueField: "id_medio_transporte",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admMedioTransporte&tarea=listarMedioTransporte"
                }
            }
        }
    }).data("kendoDropDownList");
    
    $("#combopaisconsignatario").kendoDropDownList({
        autoBind: false,
        optionLabel: "Pais de Consignatario...",
        dataTextField: "nombre",
        dataValueField: "id_pais",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admPais&tarea=listarPaises"
                }
            }
        }
    }).data("kendoDropDownList");
    
    $("#tabla_tp").kendoGrid({
        dataSource: dataTp,
        editable: true,
        scrollable: false,
        resizable: true,
        selectable: "simple",
        columns: [
            
            { field: "id_ddjj", hidden: true},
            { field: "clasificacion_arancelaria", title: "Clasificación Arancelaria"},
            { field: "descripcion_comercial", title: "Denominación Comercial de las Mercancías"},
            { field: "id_factura", hidden: true},
            { field: "tipo_factura", hidden: true},
            { field: "numero_factura", title: "N° Factura"},
            { field: "id_insumos_factura", hidden: true},
            { field: "insumos", hidden: true},
            { field: "total", hidden: true},
            { field: "fecha_emision", title: "Fecha de Emisión"},
            { field: "tipo_desglose", hidden: true}
            /*
            { field: "id_ddjj", title: "id_ddjj"},
            { field: "clasificacion_arancelaria", title: "Clasificación Arancelaria"},
            { field: "descripcion_comercial", title: "Denominación Comercial de las Mercancías"},
            { field: "id_factura", title: "id_factura"},
            { field: "tipo_factura", title: "tipo_factura"},
            { field: "numero_factura", title: "N° Factura"},
            { field: "id_insumos_factura", title: "id_insumos_factura"},
            { field: "insumos", title: "insumos"},
            { field: "total", title: "total"},
            { field: "fecha_emision", title: "Fecha de Emisión"},
            { field: "tipo_desglose", title: "Tipo Desglose"}
            */
        ]
    }); 
});

/************Funciones para los botones *********************************************/
function listarddjjtp(){
    var acuerdo = $("#lista_co").val();
    $("#ddjjtp").kendoGrid({
        editable: false,
        scrollable: false,
        resizable: true,
        selectable: "simple",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admDeclaracionJurada&tarea=listarDeclaracionesVigentesConCriterioOrigen&id_acuerdo="+acuerdo
                }
            },
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true
        },
        change: function(e) {
            cambiar('divddjjescogertp','divfacturasescogertp');
        },
        columns: [
            { field: "id_ddjj", hidden: true},
            { field: "id_ddjj_acuerdo", hidden: true},
            { field: "descripcion_comercial", title: "Denominación Comercial"},
            { field: "clasificacion_arancelaria", title: "Clasificación Arancelaria"},
            { field: "criterio_origen", title: "Criterio de Origen"},
            { field: "fecha_inicio", title: "Fecha Inicio"},
            { field: "fecha_fin", title: "Fecha Fin"}
        ]
    }).data("kendoGrid");
}

function listarFacturasTp(){  
    var acuerdo = $("#lista_co").val();
    $("#facturasTp").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admFactura&tarea=listarFacturasVigentesPorAcuerdo&id_acuerdo="+acuerdo
                }
            },
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            pageSize: 6,
        },
        //height: 600,
        sortable: true,
        pageable: true,
        editable: false,
        scrollable: true,
        selectable: "simple",
        filterable: true,
        detailInit: detalleFacturaTp,
        dataBound: function() {
            this.expandRow(this.tbody.find("tr.k-master-row").first());
        },
        columns: [
            { field: "id_ddjj", hidden: true},
            { field: "descripcion_comercial", hidden: true},
            { field: "clasificacion_arancelaria", hidden: true},
            { field: "cantidad_ddjj", title: "cantidad", width:"10%"},//, hidden: true},
            { field: "id_factura", hidden: true},
            { field: "tipo_factura", hidden: true},
            { field: "numero_factura", title: "N° Factura", width:"20%" },
            { field: "fecha_emision", title: "Fecha emisión", width:"20%"},
            { field: "total", title: "Total", width:"20%"},
            { field: "tipo", title: "Tipo Factura", width:"30%"}
        ]
    });
}

function detalleFacturaTp(e) {
    $("<div/>").appendTo(e.detailCell).kendoGrid({
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admFactura&tarea=listarInsumosFactura&id_factura="+e.data.id_factura+"&tipo_factura="+e.data.tipo_factura
                }
            },
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            pageSize: 10
        },
        scrollable: false,
        sortable: true,
        pageable: true,
        columns: [
            { field: "descripcion", title:"Descripcion"},
            { field: "cantidad", title:"Cantidad"},
            { field: "precio_unitario", title:"P. Unitario" },
            { field: "saldo", title:"Saldo" },
            { field: "valor_fob", title: "Vaslor FOB($us)", width: "300px" }
        ]
    });
}

function eliminarfilatp(){
    var tabla_tp = $("#tabla_tp").data("kendoGrid");
    var currentDataItem = tabla_tp.dataItem(tabla_tp.select());
    var dataRow = tabla_tp.dataSource.getByUid(currentDataItem.uid);
    tabla_tp.dataSource.remove(dataRow);
}

</script>  
