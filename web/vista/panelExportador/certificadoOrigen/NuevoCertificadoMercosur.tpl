<div id="ddjjfacturamercosur">
    <form name="form_ddjjfacturamercosur" id="form_ddjjfacturamercosur" method="post" action="index.php">
        <div id="divfacturasescogermercosur">
            <div class="row-fluid form">
                <div class="span12">Escoja la factura.</div>
            </div>
            <div class="row-fluid form">
                <div class="span12"><div id="facturasMercosur" class="fadein" ></div>
                  <center> <input type="hidden" name="hiddenvalidatorfacturasmercosur" id="hiddenvalidatorfacturasmercosur" 
                data-facturasmercosurvalidator
                data-required-msg="Escoja por lo menos una opción" /></center>
                </div>
            </div>
            <div class="row-fluid form">
                <input id="desgloseDdjjMercosur" type="button"  value="Desglosar por DDJJ" class="k-primary" /> 
                <input id="desgloseFacturaMercosur" type="button"  value="Desglosar Factura" class="k-primary" />
                <input id="cancelardatosmercosur" type="button"  value="Cancelar" class="k-primary" /> 
            </div>
        </div>
    </form>
</div>

<div class="row-fluid fadein"  id="firmaenvioMercosur" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header"><div class="titulo">Confirmación de Envío de Certificado de Origen</div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico el envío para revisión
                        del Certificado de Origen tipo MERCOSUR.</p>
                        <p > El costo de la emisión que debe cancelar para el recojo del Certificado de Origen es de:</p>
                        <p ><div id="costo_mercosur" style="color:red; font-size: 18px;"></div> </p>
                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmaenvioMercosur" id="formfirmaenvioMercosur" method="post"  action="index.php" >
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                       class="k-textbox " placeholder="Pin" name="pinfirmaenvioMercosur"  id="pinfirmaenvioMercosur" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmarenvioMercosur /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="cancelafirmaenvioMercosur" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="firmarenvioMercosur" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                     </div> 
                     <div class="span4 hidden-phone" >
                     </div>
                 </div> 
            </form> 
        </div>
    </div>              
</div>

<script>
ocultar('firmaenvioMercosur');

//FUNCIONES PARA LA FIRMA DEL EXPORTADOR ENVIANDO EL C.O.
$("#cancelafirmaenvioMercosur").kendoButton();
$("#firmarenvioMercosur").kendoButton();
var cancelafirmaenvioMercosur = $("#cancelafirmaenvioMercosur").data("kendoButton");
var firmarenvioMercosur = $("#firmarenvioMercosur").data("kendoButton");

cancelafirmaenvioMercosur.bind("click", function(e){             
    cambiar('firmaenvioMercosur','datosgeneralesco');
    borrarPin('{$nombre}');
});

firmarenvioMercosur.bind("click", function(e){
    if(formfirmaenvioMercosur.validate())
    {
        var mercosur = $("#tabla_mercosur").data("kendoGrid");
        var data_mercosur = mercosur.dataSource;
        var valores_mercosur = data_mercosur.data();

        var acuerdo = $("#lista_co").val();
        var pais = $("#combopais").val();
        var regional = $("#comboregional").val();
        var fechaexportacion = $("#fechaexportacion").val();
        var tablaMercosur = JSON.stringify(valores_mercosur);
        var nombreconsig = $("#nombreconsignatariomercosur").val();
        var direccionconsig = $("#direccionconsignatariomercosur").val();
        var paisconsig = $("#paisconsignatariomercosur").val();
        var nombreimport = $("#nombreimportadormercosur").val();
        var direccionimport = $("#direccionimportadormercosur").val();
        var paisimport = $("#paisimportadormercosur").val();
        var tipo_desglose = $("#tipo_desglose").val();
            
        var datos = $("#form_mercosur").serialize()+"&opcion=admCertificado&tarea=guardarCOMercosur&id_pais="+pais+"&id_acuerdo="+acuerdo+"&id_regional="+regional+"&fechaexportacion="+fechaexportacion+"&nombreconsignatario="+nombreconsig+"&direccionconsignatario="+direccionconsig+"&paisconsignatario="+paisconsig+"&nombreimportador="+nombreimport+"&direccionimportador="+direccionimport+"&paisimportador="+paisimport+"&tipo_desglose="+tipo_desglose+"&tabla_mercosur="+tablaMercosur;
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
var formfirmaenvioMercosur = $("#formfirmaenvioMercosur").kendoValidator({
    rules:{ 
        firmarenvioMercosur: function(input) { 
            var validate = input.data('firmarenvioMercosur');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmacache !== $("#pinfirmaenvioMercosur").val()) 
                {
                    verificarPinMercosur($("#pinfirmaenvioMercosur").val());                    
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
        firmarenvioMercosur: function(input) { 
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

function verificarPinMercosur(pin_insertado)
{
    $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
            success: function (data) {    
                swfirma=data;
                firmacache=$("#pinfirmaenvioMercosur").val();
                formfirmaenvioMercosur.validateInput($("#pinfirmaenvioMercosur"));
            }
        }); 
}

$("#addfiladdjj_mercosur").kendoButton();
$("#elimfiladdjj_mercosur").kendoButton();
$("#enviar_mercosur").kendoButton();
$("#cancelar_mercosur").kendoButton();
$("#cancelardatosmercosur").kendoButton();
$("#desgloseDdjjMercosur").kendoButton();
$("#desgloseFacturaMercosur").kendoButton();

var addfiladdjj_mercosur = $("#addfiladdjj_mercosur").data("kendoButton");
var elimfiladdjj_mercosur = $("#elimfiladdjj_mercosur").data("kendoButton");
var enviar_mercosur = $("#enviar_mercosur").data("kendoButton");
var cancelar_mercosur = $("#cancelar_mercosur").data("kendoButton");
var cancelardatosmercosur = $("#cancelardatosmercosur").data("kendoButton");
var desgloseDdjjMercosur = $("#desgloseDdjjMercosur").data("kendoButton");
var desgloseFacturaMercosur = $("#desgloseFacturaMercosur").data("kendoButton");

var ddjjfacturamercosur = $("#ddjjfacturamercosur").kendoWindow({
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
ddjjfacturamercosur.center(); 

//*******Acciones para Certificado MERCOSUR
addfiladdjj_mercosur.bind("click", function(e){
    ddjjfacturamercosur.open();
    listarFacturasMercosur();
});

//TABLAS Y VALIDACIONES PARA ALADI
var form_mercosur = $("#form_mercosur").kendoValidator({
    rules:{
        gridvalidatormercosur: function(input) { 
            var validate = input.data('gridvalidatormercosur');
            if (typeof validate !== 'undefined') 
            {
                //---aqui cuentas los productos y verificas si no estan vacíos
                swp=verificagridtablamercosur();
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
        gridvalidatormercosur: function(input) { 
            if(swp==0){  
                return 'Ingrese al menos un dato para el certificado.';
            }else{
                return 'Por favor Complete los datos';
            }
        },
    }
}).data("kendoValidator");

function verificagridtablamercosur()
{
    var grid_mercosur = $("#tabla_mercosur").data("kendoGrid");
    var data_mercosur = grid_mercosur.dataSource;
    var numfilas_mercosur = data_mercosur.total();
    if(numfilas_mercosur==0){
        return 0;
    }else{
        var valores_mercosur = data_mercosur.data();
        for (var i = 0; i < numfilas_mercosur; i++) {
            if(!valores_mercosur[i].descripcion_comercial.trim())
            {
                return 1;
            }
        }
        return 2;
    }
}

var form_to_mercosur = $("#form_to_mercosur").kendoValidator({
}).data("kendoValidator");

enviar_mercosur.bind("click", function(e){
    if(form_general.validate() && form_mercosur.validate()){
        //Recorrer la tabla para sacar el total de la mercaderia
        var valor,costo, total=0;
        $("#tabla_mercosur tbody tr").each(function (index) {
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
            data: 'opcion=admCertificado&tarea=calcularPago&total='+total+'&id_tipo_certificado=2',
            success: function (data) {
                costo = eval('('+data+')');
                costo = "Total a Pagar: "+ costo + " Bs.";
                $("#costo_mercosur").html(costo);
            }
        }); 
        
        var check_to = $("#check_factterceroperadormercosur").prop('checked');
        if(check_to){
            if(form_to_mercosur.validate()){
                cambiar('datosgeneralesco','firmaenvioMercosur');
                generarPin('{$id_empresa}','{$id_persona}','14');
            }
        }else{            
            cambiar('datosgeneralesco','firmaenvioMercosur');
            generarPin('{$id_empresa}','{$id_persona}','14');
        }
    }
});
cancelar_mercosur.bind("click", function(e){  
    ddjjfacturamercosur.close();
    remover(tabStrip.select());
});

var form_ddjjfacturamercosur = $("#form_ddjjfacturamercosur").kendoValidator({
    rules:{
        facturasmercosurvalidator: function(input) { 
            var validate = input.data('facturasmercosurvalidator');
            if (typeof validate !== 'undefined') 
            {
                swp=verificagridfacturasmercosur();
                if(swp==0){
                    return false;
                }
            }
            return true;
        }
    },
    messages:{
        facturasmercosurvalidator: function(input) { 
            if(swp==0){  
                return 'Escoja por lo menos una Factura';
            }else{
                return 'Por favor Complete los datos';
            }
        }
    }
}).data("kendoValidator");
function verificagridfacturasmercosur()
{
    var facturasmercosur = $("#facturasMercosur").data("kendoGrid");
    var currentDataItem = facturasmercosur.dataItem(facturasmercosur.select());
    if(!currentDataItem){
        return 0;
    }else{
        return 1;
    }
}


desgloseDdjjMercosur.bind("click", function(e){
    if(form_ddjjfacturamercosur.validate()){
        //Tabla con datos del Mercosur
        var tabla = $("#tabla_mercosur").data("kendoGrid");
        //Tabla con las facturas e insumos.
        var facturasmercosur = $("#facturasMercosur").data("kendoGrid");

        facturasmercosur.select().each(function () {
            //Capturar todos los datos de la tabla FacturasMercosur
            var dataItem = facturasmercosur.dataItem($(this));
            //Capturar los datos de la tabla_mercosur
            var data_mercosur = tabla.dataSource;
            
            //alert(data_mercosur.total());
            if(data_mercosur.total()==0){
                var dataItem2 = dataItem;
                
                if(dataItem.cantidad_ddjj==1){
                    var dataItem2 = dataItem;
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
                        //Para los datos del Consignatario
                        $("#nombreconsignatariomercosur").val(data.nombre_consignatario);
                        $("#direccionconsignatariomercosur").val(data.direccion_consignatario);
                        $("#paisconsignatariomercosur").val(data.pais_consignatario);
                        //Para los datos del Importador
                        $("#nombreimportadormercosur").val(data.nombre_importador);
                        $("#direccionimportadormercosur").val(data.direccion_importador);
                        $("#paisimportadormercosur").val(data.pais_importador);
                        //Desglose por DDJJ=1
                        $("#tipo_desglose").val(1);
                    }
                });
            }else{
                alert("Ya existe la Factura: "+dataItem.numero_factura);
            }
        });
        tabla.refresh();
        ddjjfacturamercosur.close();
    }
});

desgloseFacturaMercosur.bind("click", function(e){
    if(form_ddjjfacturamercosur.validate()){
        //Tabla con datos del Mercosur
        var tabla = $("#tabla_mercosur").data("kendoGrid");
        //Tabla con las facturas e insumos.
        var facturasmercosur = $("#facturasMercosur").data("kendoGrid");

        facturasmercosur.select().each(function () {
            //Capturar todos los datos de la tabla FacturasMercosur
            var dataItem = facturasmercosur.dataItem($(this));
            //Capturar los datos de la tabla_mercosur
            var data_mercosur = tabla.dataSource;
            
            if(data_mercosur.total()==0){
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
                    dataItem2.id_insumos_factura = id_insumos[i];
                    dataItem2.insumos = insumos[i];
                    dataItem2.total = contenido[5];
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
                        //Para los datos del Consignatario
                        $("#nombreconsignatariomercosur").val(data.nombre_consignatario);
                        $("#direccionconsignatariomercosur").val(data.direccion_consignatario);
                        $("#paisconsignatariomercosur").val(data.pais_consignatario);
                        //Para los datos del Importador
                        $("#nombreimportadormercosur").val(data.nombre_importador);
                        $("#direccionimportadormercosur").val(data.direccion_importador);
                        $("#paisimportadormercosur").val(data.pais_importador);
                        //Desglose por Factura=2
                        $("#tipo_desglose").val(2);
                    }
                });
            }else{
                alert("Ya existe la Factura: "+dataItem.numero_factura);
            }
        });
        tabla.refresh();
        ddjjfacturamercosur.close();
    }
});

/***** Botones de Cancelar *****/
cancelardatosmercosur.bind("click", function(e){  
    ddjjfacturamercosur.close();
});

var dataMercosur = new kendo.data.DataSource({
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
                total: { editable: true},
                fecha_emision: { editable: false},
                tipo_desglose: { editable: false}
            }
        }
    }
});

$(document).ready(function (){
    
    $('#check_consignatariomercosur').change(function(){
        var marcado = $(this).prop('checked');
        if(marcado){
            $('#nombreconsignatariomercosur').removeAttr('disabled');
            $('#direccionconsignatariomercosur').removeAttr('disabled');
            $('#paisconsignatariomercosur').removeAttr('disabled');
        } else {
            $('#nombreconsignatariomercosur').attr('disabled','disabled');
            $('#direccionconsignatariomercosur').attr('disabled','disabled');
            $('#paisconsignatariomercosur').attr('disabled','disabled');
        }  
    });

    $('#check_importadormercosur').change(function(){
        var marcado = $(this).prop('checked');
        if(marcado){
            $('#nombreimportadormercosur').removeAttr('disabled');
            $('#direccionimportadormercosur').removeAttr('disabled');
            $('#paisimportadormercosur').removeAttr('disabled');
        } else {
            $('#nombreimportadormercosur').attr('disabled','disabled');
            $('#direccionimportadormercosur').attr('disabled','disabled');
            $('#paisimportadormercosur').attr('disabled','disabled');
        }  
    });

    $('#check_factterceroperadormercosur').change(function(){
        var marcado = $(this).prop('checked');
        if(marcado){
            $('#div_factterceropmercosur').fadeIn(1000);
            $('#div_factterceropmercosur2').fadeIn(1000);
        } else {
            $('#div_factterceropmercosur').fadeOut(1000);
            $('#div_factterceropmercosur2').fadeOut(1000);
        }  
    });

    $("#combomediotransportemercosur").kendoDropDownList({
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
    
    $("#tabla_mercosur").kendoGrid({
        dataSource: dataMercosur,
        editable: true,
        scrollable: true,
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
            { field: "total", title: "Valor FOB"},
            { field: "fecha_emision", title: "Fecha de Emisión"},
            { field: "tipo_desglose", hidden: true}
            /*
            { field: "id_ddjj", title: "id ddjj"},
            { field: "clasificacion_arancelaria", title: "Clasificación Arancelaria"},
            { field: "descripcion_comercial", title: "Denominación Comercial de las Mercancías"},
            { field: "id_factura", title: "id_factura"},
            { field: "tipo_factura", title: "tipo_factura"},
            { field: "numero_factura", title: "numero_factura"},
            { field: "id_insumos_factura", title: "id_insumos_factura"},
            { field: "insumos", title: "insumos"},
            { field: "total", title: "Valor FOB"},
            { field: "fecha_emision", title: "Fecha de Emisión"},
            { field: "tipo_desglose", title: "Tipo Desglose"}
            */
        ]
    });
});

/************Funciones para los botones *********************************************/
function listarddjjmercosur(){
    var acuerdo = $("#lista_co").val();
    $("#ddjjmercosur").kendoGrid({
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
            cambiar('divddjjescogermercosur','divfacturasescogermercosur');
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

function listarFacturasMercosur(){  
    var acuerdo = $("#lista_co").val();
    $("#facturasMercosur").kendoGrid({
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
            pageSize: 6
        },
        //height: 600,
        sortable: true,
        pageable: true,
        editable: false,
        scrollable: true,
        selectable: "simple",
        filterable: true,
        detailInit: detalleFacturaMercosur,
        dataBound: function() {
            this.expandRow(this.tbody.find("tr.k-master-row").first());
        },
        columns: [
            
            { field: "id_ddjj", hidden: true},
            { field: "descripcion_comercial", hidden: true},
            { field: "clasificacion_arancelaria", hidden: true},
            { field: "cantidad_ddjj", hidden: true},
            { field: "id_factura", hidden: true},
            { field: "tipo_factura", hidden: true},
            { field: "numero_factura", title: "N° Factura", width:"20%" },
            { field: "fecha_emision", title: "Fecha emisión", width:"20%"},
            { field: "total", title: "Total", width:"20%"},
            { field: "tipo", title: "Tipo Factura", width:"30%"}
            /*
            { field: "id_ddjj", title: "id_ddjj"},
            { field: "descripcion_comercial", title: "descripcion"},
            { field: "clasificacion_arancelaria", title: "nandina"},
            { field: "cantidad_ddjj", title: "cantidad_ddjj"},
            { field: "id_factura", title: "id_factura"},
            { field: "tipo_factura", title: "tipo"},
            { field: "numero_factura", title: "N° Factura"},
            { field: "fecha_emision", title: "Fecha emisión"},
            { field: "total", title: "Total"},
            { field: "tipo", title: "Tipo Factura"}
            */
        ]
    });
}

function detalleFacturaMercosur(e) {
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

function eliminarfilamercosur(){
    var tabla_mercosur = $("#tabla_mercosur").data("kendoGrid");
    var currentDataItem = tabla_mercosur.dataItem(tabla_mercosur.select());
    var dataRow = tabla_mercosur.dataSource.getByUid(currentDataItem.uid);
    tabla_mercosur.dataSource.remove(dataRow);
}
/*
$("#comboterceroperadormercosur").kendoDropDownList();
$("#combofacturabolivianamercosur").kendoDropDownList();
var comboterceroperadormercosur = $("#comboterceroperadormercosur").data("kendoDropDownList");
var combofacturabolivianamercosur = $("#combofacturabolivianamercosur").data("kendoDropDownList");

comboterceroperadormercosur.bind("change", function(e){
    var combo = $("#comboterceroperadormercosur").val();
    if(combo!=0){
        //Borrar los datos de la tabla
        $("#tabla_mercosur").data('kendoGrid').dataSource.data([]);

        var tabla = $("#tabla_mercosur").data("kendoGrid");



        //Tabla con las facturas e insumos.
        var facturasmercosur = $("#facturasMercosur").data("kendoGrid");

        facturasmercosur.select().each(function () {
            //Capturar todos los datos de la tabla FacturasMercosur
            var dataItem = facturasmercosur.dataItem($(this));
            //Capturar los datos de la tabla_mercosur
            var data_mercosur = tabla.dataSource;

            if(data_mercosur.total()==0){
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
                    dataItem2.id_insumos_factura = id_insumos[i];
                    dataItem2.insumos = insumos[i];
                    dataItem2.total = contenido[5];
                    dataItem2.fecha_emision = dataItem.fecha_emision;
                    tabla.dataSource.add(dataItem2);
                }
                var datos=JSON.stringify(dataItem2);
                $.ajax({
                    type: 'get',
                    url: 'index.php?opcion=admInventario&tarea=buscarConsignatarioFactura&valores='+datos,
                    success: function(data) {
                        var data = eval('('+data+')');
                        //Para los datos del Consignatario
                        $("#nombreconsignatariomercosur").val(data.nombre_consignatario);
                        $("#direccionconsignatariomercosur").val(data.direccion_consignatario);
                        $("#paisconsignatariomercosur").val(data.pais_consignatario);
                        //Para los datos del Importador
                        $("#nombreimportadormercosur").val(data.nombre_importador);
                        $("#direccionimportadormercosur").val(data.direccion_importador);
                        $("#paisimportadormercosur").val(data.pais_importador);
                        //Desglose por Factura=2
                        $("#tipo_desglose").val(2);
                    }
                });
            }else{
                alert("Ya existe la Factura: "+dataItem.numero_factura);
            }
        });
        tabla.refresh();
    }
});
*/
</script>  
