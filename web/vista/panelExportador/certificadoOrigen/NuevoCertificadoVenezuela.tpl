<div id="ddjjfacturavenezuela">
    <form name="form_ddjjfacturavenezuela" id="form_ddjjfacturavenezuela" method="post" action="index.php">
        <div id="divfacturasescogervenezuela">
            <div class="row-fluid form">
                <div class="span12">Escoja su Factura.</div>
            </div>
            <div class="row-fluid form">
                <div class="span12"><div id="facturasVenezuela" class="fadein"></div>
                  <center> <input type="hidden" name="hiddenvalidatorfacturasvenezuela" id="hiddenvalidatorfacturasvenezuela" 
                data-facturasvenezuelavalidator
                data-required-msg="Escoja por lo menos una opción" /></center>
                </div>
            </div>
            <div class="row-fluid form">
                <input id="desgloseDdjjVenezuela" type="button"  value="Desglosar por DDJJ" class="k-primary" /> 
                <input id="desgloseFacturaVenezuela" type="button"  value="Desglosar por Factura" class="k-primary" />
                <input id="cancelardatosvenezuela" type="button"  value="Cancelar" class="k-primary" /> 
            </div>
        </div>
    </form>
</div>

<div class="row-fluid fadein"  id="firmaenvioVenezuela" >
       <div class="k-block fadein">
                <div class="k-header">
                    <div class="k-header"><div class="titulo">Confirmación de Envío de Certificado de Origen</div></div>
                </div>
                <div class="k-cuerpo"> 
                    <div class="row-fluid  form" >
                        <div class="span1" > </div>
                        <div class="span10" >
                            <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico el envío para revisión
                                del Certificado de Origen tipo VENEZUELA.</p>
                            <p > El costo de la emisión que debe cancelar para el recojo del Certificado de Origen es de:</p>
                            <p ><div id="costo_venezuela" style="color:red; font-size: 18px;"></div> </p>
                        </div>  
                        <div class="span1" ></div>
                    </div> 
                    <form name="formfirmaenvioVenezuela" id="formfirmaenvioVenezuela" method="post"  action="index.php" >
                        <div class="row-fluid  form" >
                            <div class="span5" ></div>
                            <div class="span2" >
                                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                               class="k-textbox " placeholder="Pin" name="pinfirmaenvioVenezuela"  id="pinfirmaenvioVenezuela" maxlength="4" size="4" style="width:50px;"
                               required data-required-msg="Por favor ingrese su Pin." data-firmarenvioVenezuela /> 
                            </div>  
                            <div class="span5" ></div>
                        </div>  
                        <div class="row-fluid  form" >
                            <div class="span4 hidden-phone" >
                             </div>
                             <div class="span2 " >
                                 <input id="cancelafirmaenvioVenezuela" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                             </div> 
                             <div class="span2 " >
                                 <input id="firmarenvioVenezuela" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                             </div> 
                             <div class="span4 hidden-phone" >
                             </div>
                         </div> 
                    </form> 
                </div>   
      </div>              
</div>

<script>
ocultar('firmaenvioVenezuela');

//FUNCIONES PARA LA FIRMA DEL EXPORTADOR ENVIANDO EL C.O.
$("#cancelafirmaenvioVenezuela").kendoButton();
$("#firmarenvioVenezuela").kendoButton();
var cancelafirmaenvioVenezuela = $("#cancelafirmaenvioVenezuela").data("kendoButton");
var firmarenvioVenezuela = $("#firmarenvioVenezuela").data("kendoButton");

cancelafirmaenvioVenezuela.bind("click", function(e){             
    cambiar('firmaenvioVenezuela','datosgeneralesco');
    borrarPin('{$nombre}');
});

firmarenvioVenezuela.bind("click", function(e){
    if(formfirmaenvioVenezuela.validate())
    {
        var venezuela = $("#tabla_venezuela").data("kendoGrid");
        var data_venezuela = venezuela.dataSource;
        var valores_venezuela = data_venezuela.data();

        var acuerdo = $("#lista_co").val();
        var pais = $("#combopais").val();
        var regional = $("#comboregional").val();
        var fechaexportacion = $("#fechaexportacion").val();
        var tablaVenezuela = JSON.stringify(valores_venezuela);
        var nombreimport = $("#nombreimportadorvenezuela").val();
        var direccionimport = $("#direccionimportadorvenezuela").val();
        var paisimport = $("#paisimportadorvenezuela").val();
        var tipo_desglose = $("#tipo_desglose").val();

        var datos = $("#form_venezuela").serialize()+"&opcion=admCertificado&tarea=guardarCOVenezuela&id_pais="+pais+"&id_acuerdo="+acuerdo+"&id_regional="+regional+"&fechaexportacion="+fechaexportacion+"&nombreimportador="+nombreimport+"&direccionimportador="+direccionimport+"&paisimportador="+paisimport+"&tipo_desglose="+tipo_desglose+"&tabla_venezuela="+tablaVenezuela;
        
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
var formfirmaenvioVenezuela = $("#formfirmaenvioVenezuela").kendoValidator({
    rules:{ 
        firmarenvioVenezuela: function(input) { 
            var validate = input.data('firmarenvioVenezuela');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmacache !== $("#pinfirmaenvioVenezuela").val()) 
                {
                    verificarPinVenezuela($("#pinfirmaenvioVenezuela").val());                    
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
        firmarenvioVenezuela: function(input) { 
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

function verificarPinVenezuela(pin_insertado)
{
    $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
            success: function (data) {    
                swfirma=data;
                firmacache=$("#pinfirmaenvioVenezuela").val();
                formfirmaenvioVenezuela.validateInput($("#pinfirmaenvioVenezuela"));
            }
        }); 
}

//***** Funciones y métodos para el C.O. ********//
$("#addfiladdjj_venezuela").kendoButton();
$("#elimfiladdjj_venezuela").kendoButton();
$("#enviar_venezuela").kendoButton();
$("#cancelar_venezuela").kendoButton();
$("#cancelardatosvenezuela").kendoButton();
$("#desgloseDdjjVenezuela").kendoButton();
$("#desgloseFacturaVenezuela").kendoButton();

var addfiladdjj_venezuela = $("#addfiladdjj_venezuela").data("kendoButton");
var elimfiladdjj_venezuela = $("#elimfiladdjj_venezuela").data("kendoButton");
var enviar_venezuela = $("#enviar_venezuela").data("kendoButton");
var cancelar_venezuela = $("#cancelar_venezuela").data("kendoButton");
var cancelardatosvenezuela = $("#cancelardatosvenezuela").data("kendoButton");
var desgloseDdjjVenezuela = $("#desgloseDdjjVenezuela").data("kendoButton");
var desgloseFacturaVenezuela = $("#desgloseFacturaVenezuela").data("kendoButton");

var ddjjfacturavenezuela = $("#ddjjfacturavenezuela").kendoWindow({
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
ddjjfacturavenezuela.center(); 

//*******Acciones para Certificado VENEZUELA
addfiladdjj_venezuela.bind("click", function(e){
    ddjjfacturavenezuela.open();
    listarFacturasVenezuela();
});

//TABLAS Y VALIDACIONES PARA ALADI
var form_venezuela = $("#form_venezuela").kendoValidator({
    rules:{
        gridvalidatorvenezuela: function(input) { 
            var validate = input.data('gridvalidatorvenezuela');
            if (typeof validate !== 'undefined') 
            {
                //---aqui cuentas los productos y verificas si no estan vacíos
                swp=verificagridtablavenezuela();
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
        gridvalidatorvenezuela: function(input) { 
            if(swp==0){  
                return 'Ingrese al menos un dato para el certificado.';
            }else{
                return 'Por favor Complete los datos';
            }
        },
    }
}).data("kendoValidator");

function verificagridtablavenezuela()
{
    var grid_venezuela = $("#tabla_venezuela").data("kendoGrid");
    var data_venezuela = grid_venezuela.dataSource;
    var numfilas_venezuela = data_venezuela.total();
    if(numfilas_venezuela==0){
        return 0;
    }else{
        var valores_venezuela = data_venezuela.data();
        for (var i = 0; i < numfilas_venezuela; i++) {
            if(!valores_venezuela[i].descripcion_comercial.trim())
            {
                return 1;
            }
        }
        return 2;
    }
}

var form_to_venezuela = $("#form_to_venezuela").kendoValidator({
}).data("kendoValidator");

enviar_venezuela.bind("click", function(e){
    if(form_general.validate() && form_venezuela.validate()){
        //Recorrer la tabla para sacar el total de la mercaderia
        var valor,costo, total=0;
        $("#tabla_venezuela tbody tr").each(function (index) {
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
                $("#costo_venezuela").html(costo);
            }
        });
        
        var check_to = $("#check_factterceroperadorvenezuela").prop('checked');
        if(check_to){
            if(form_to_venezuela.validate()){
                cambiar('datosgeneralesco','firmaenvioVenezuela');
                generarPin('{$id_empresa}','{$id_persona}','14');
            }
        }else{            
            cambiar('datosgeneralesco','firmaenvioVenezuela');
            generarPin('{$id_empresa}','{$id_persona}','14');
        }
    }
});
cancelar_venezuela.bind("click", function(e){  
    ddjjfacturavenezuela.close();
    remover(tabStrip.select());
});

var form_ddjjfacturavenezuela = $("#form_ddjjfacturavenezuela").kendoValidator({
    rules:{
        facturasvenezuelavalidator: function(input) { 
            var validate = input.data('facturasvenezuelavalidator');
            if (typeof validate !== 'undefined') 
            {
                swp=verificagridfacturasvenezuela();
                if(swp==0){
                    return false;
                }
            }
            return true;
        },
    },
    messages:{
        facturasvenezuelavalidator: function(input) { 
            if(swp==0){  
                return 'Escoja por lo menos una Factura';
            }else{
                return 'Por favor Complete los datos';
            }
        },
    }
}).data("kendoValidator");
function verificagridfacturasvenezuela()
{
    var facturasvenezuela = $("#facturasVenezuela").data("kendoGrid");
    var currentDataItem = facturasvenezuela.dataItem(facturasvenezuela.select());
    if(!currentDataItem){
        return 0;
    }else{
        return 1;
    }
}

desgloseDdjjVenezuela.bind("click", function(e){
    if(form_ddjjfacturavenezuela.validate()){
        //Tabla con datos del Venezuela
        var tabla = $("#tabla_venezuela").data("kendoGrid");
        //Tabla con las facturas e insumos.
        var facturasvenezuela = $("#facturasVenezuela").data("kendoGrid");

        facturasvenezuela.select().each(function () {
            //Capturar todos los datos de la tabla FacturasVenezuela
            var dataItem = facturasvenezuela.dataItem($(this));
            //Capturar los datos de la tabla_venezuela
            var data_venezuela = tabla.dataSource;
            
            if(data_venezuela.total()==0){
                var dataItem2 = dataItem;
                
                if(dataItem.cantidad_ddjj==1){
                    //var dataItem2 = dataItem;
                    dataItem2.tipo_desglose = "1";
                    tabla.dataSource.add(dataItem2);
                }else{
                    var id_ddjj = dataItem.id_ddjj.split(";");
                    var descripcion = dataItem.descripcion_comercial.split(";");
                    var arancel = dataItem.clasificacion_arancelaria.split(";");
                    var insumos = dataItem.insumos.split(";");
                    var cantidad_insumos = insumos.length;
                    //alert(cantidad_insumos);
                    for(var i=0;i<dataItem.cantidad_ddjj;i++){
                        dataItem2.id_ddjj = id_ddjj[i];
                        dataItem2.clasificacion_arancelaria = arancel[i];
                        dataItem2.descripcion_comercial = descripcion[i];
                        dataItem2.id_factura = dataItem.id_factura;
                        dataItem2.tipo_factura = dataItem.tipo_factura;
                        dataItem2.numero_factura = dataItem.numero_factura;
                        dataItem2.id_insumos_factura = dataItem.id_insumos_factura;
                        
                        var cadena_insumos = '';
                        for(var j=0;j<cantidad_insumos;j++){
                            var detalle_insumos = insumos[j].split("|");
                            
                            if(id_ddjj[i]==detalle_insumos[2]){
                                cadena_insumos=cadena_insumos+insumos[j]+";";
                            }
                        }
                        var cadena_insumos = cadena_insumos.substring(0, cadena_insumos.length-1);
                        dataItem2.insumos = cadena_insumos;
                        dataItem2.total = dataItem.total;
                        dataItem2.fecha_emision = dataItem.fecha_emision;
                        dataItem2.tipo_desglose = "1";
                        tabla.dataSource.add(dataItem2);
                    }
                }
                
                var datos=JSON.stringify(dataItem);
                $.ajax({
                    type: 'get',
                    url: 'index.php?opcion=admInventario&tarea=buscarConsignatarioFactura&valores='+datos,
                    success: function(data) {
                        var data = eval('('+data+')');
                        //Para los datos del Importador
                        $("#nombreimportadorvenezuela").val(data.nombre_importador);
                        $("#direccionimportadorvenezuela").val(data.direccion_importador);
                        $("#paisimportadorvenezuela").val(data.pais_importador);
                        //Desglose por DDJJ=1
                        $("#tipo_desglose").val(1);
                    }
                });
            }else{
                alert("Ya existe la Factura: "+dataItem.numero_factura);
            }
        });
        tabla.refresh();
        ddjjfacturavenezuela.close();
    }
});

desgloseFacturaVenezuela.bind("click", function(e){
    if(form_ddjjfacturavenezuela.validate()){
        //Tabla con datos del Venezuela
        var tabla = $("#tabla_venezuela").data("kendoGrid");
        //Tabla con las facturas e insumos.
        var facturasvenezuela = $("#facturasVenezuela").data("kendoGrid");

        facturasvenezuela.select().each(function () {
            //Capturar todos los datos de la tabla FacturasVenezuela
            var dataItem = facturasvenezuela.dataItem($(this));
            //Capturar los datos de la tabla_venezuela
            var data_venezuela = tabla.dataSource;
            
            if(data_venezuela.total()==0){
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
                        //Para los datos del Importador
                        $("#nombreimportadorvenezuela").val(data.nombre_importador);
                        $("#direccionimportadorvenezuela").val(data.direccion_importador);
                        $("#paisimportadorvenezuela").val(data.pais_importador);
                        //Desglose por Factura=2
                        $("#tipo_desglose").val(2);
                    }
                });
            }else{
                alert("Ya existe la Factura: "+dataItem.numero_factura);
            }
        });
        tabla.refresh();
        ddjjfacturavenezuela.close();
    }
});

/***** Botones de Cancelar *****/
cancelardatosvenezuela.bind("click", function(e){  
    ddjjfacturavenezuela.close();
});

var dataVenezuela = new kendo.data.DataSource({
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
    $('#check_importadorvenezuela').change(function(){
        var marcado = $(this).prop('checked');
        if(marcado){
            $('#nombreimportadorvenezuela').removeAttr('disabled');
            $('#direccionimportadorvenezuela').removeAttr('disabled');
            $('#paisimportadorvenezuela').removeAttr('disabled');
        } else {
            $('#nombreimportadorvenezuela').attr('disabled','disabled');
            $('#direccionimportadorvenezuela').attr('disabled','disabled');
            $('#paisimportadorvenezuela').attr('disabled','disabled');
        }  
    });

    $('#check_factterceroperadorvenezuela').change(function(){
        var marcado = $(this).prop('checked');
        if(marcado){
            $('#div_factterceropvenezuela').fadeIn(1000);
            $('#div_factterceropvenezuela2').fadeIn(1000);
        } else {
            $('#div_factterceropvenezuela').fadeOut(1000);
            $('#div_factterceropvenezuela2').fadeOut(1000);
        }  
    });
    
    $('#check_fechaexportacionvenezuela').change(function(){
        var marcado = $(this).prop('checked');
        if(marcado){
            $('#div_fechaexportacionvenezuela').fadeIn(1000);
        }else{
            $('#div_fechaexportacionvenezuela').fadeOut(1000);
        }  
    });

    $("#combomediotransportevenezuela").kendoDropDownList({
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
    
    $("#tabla_venezuela").kendoGrid({
        dataSource: dataVenezuela,
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
            { field: "id_ddjj", title: "id ddjj"},
            { field: "clasificacion_arancelaria", title: "Clasificación Arancelaria"},
            { field: "descripcion_comercial", title: "Denominación Comercial de las Mercancías"},
            { field: "id_factura", title: "id_factura"},
            { field: "tipo_factura", title: "tipo_factura"},
            { field: "numero_factura", title: "numero_factura"},
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
function listarddjjvenezuela(){
    var acuerdo = $("#lista_co").val();
    $("#ddjjvenezuela").kendoGrid({
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
            cambiar('divddjjescogervenezuela','divfacturasescogervenezuela');
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

function listarFacturasVenezuela(){  
    var acuerdo = $("#lista_co").val();
    $("#facturasVenezuela").kendoGrid({
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
        detailInit: detalleFacturaVenezuela,
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
            /*
            { field: "id_ddjj", title: "id_ddjj"},
            { field: "descripcion_comercial", title: "descripcion"},
            { field: "clasificacion_arancelaria", title: "nandina"},
            { field: "cantidad_ddjj", title: "cantidad_ddjj"},//, hidden: true},
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

function detalleFacturaVenezuela(e) {
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

function eliminarfilavenezuela(){
    var tabla_venezuela = $("#tabla_venezuela").data("kendoGrid");
    var currentDataItem = tabla_venezuela.dataItem(tabla_venezuela.select());
    var dataRow = tabla_venezuela.dataSource.getByUid(currentDataItem.uid);
    tabla_venezuela.dataSource.remove(dataRow);
}

$("#fechaexportacionvenezuela").kendoDatePicker({
    value: new Date()
});

</script>  
