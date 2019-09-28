<div id="ddjjfacturaaladi">
    <form name="form_ddjjfacturaaladi" id="form_ddjjfacturaaladi" method="post" action="index.php">
        <div id="divfacturasescogeraladi">
            <div class="row-fluid form">
                <div class="span12">Escoja su Factura.</div>
            </div>
            <div class="row-fluid form">
                <div class="span12"><div id="facturasAladi"></div>
                  <center> <input type="hidden" name="hiddenvalidatorfacturasaladi" id="hiddenvalidatorfacturasaladi" 
                    data-facturasaladivalidator
                    data-required-msg="Escoja por lo menos una opción" /></center>
                </div>
            </div>
            <div class="row-fluid form">
                <input id="desgloseDdjjAladi" type="button"  value="Desglosar por DDJJ" class="k-primary" /> 
                <input id="desgloseFacturaAladi" type="button"  value="Desglosar Factura" class="k-primary" />
                <input id="cancelardatosaladi" type="button"  value="Cancelar" class="k-primary" /> 
            </div>
        </div>
    </form>
</div>

<div class="row-fluid fadein" id="firmaenvioAladi" >
    <div class="k-block fadein">
        <div class="k-header">
            <div class="k-header"><div class="titulo">Confirmación de Corrección del Certificado de Origen</div></div>
        </div>
        <div class="k-cuerpo"> 
            <div class="row-fluid  form" >
                <div class="span1" > </div>
                <div class="span10" >
                    <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico el envío para revisión por corrección
                        del Certificado de Origen tipo ALADI.</p>
                    <p > El costo de la emisión que debe cancelar para el recojo del Certificado de Origen es de:</p>
                    <p ><div id="costo_aladi" style="color:red; font-size: 18px;"></div></p>
                </div>  
                <div class="span1" ></div>
            </div> 
            <form name="formfirmaenvioAladi" id="formfirmaenvioAladi" method="post"  action="index.php" >
                <div class="row-fluid  form" >
                    <div class="span5" ></div>
                    <div class="span2" >
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                       class="k-textbox " placeholder="Pin" name="pinfirmaenvioAladi"  id="pinfirmaenvioAladi" maxlength="4" size="4" style="width:50px;"
                       required data-required-msg="Por favor ingrese su Pin." data-firmarenvioAladi /> 
                    </div>  
                    <div class="span5" ></div>
                </div>  
                <div class="row-fluid  form" >
                    <div class="span4 hidden-phone" >
                     </div>
                     <div class="span2 " >
                         <input id="cancelafirmaenvioAladi" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                     </div> 
                     <div class="span2 " >
                         <input id="firmarenvioAladi" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                     </div> 
                     <div class="span4 hidden-phone" >
                     </div>
                 </div> 
            </form> 
        </div>   
    </div>              
</div>

<script>
ocultar('firmaenvioAladi');

//FUNCIONES PARA LA FIRMA DEL EXPORTADOR ENVIANDO EL C.O.
$("#cancelafirmaenvioAladi").kendoButton();
$("#firmarenvioAladi").kendoButton();
var cancelafirmaenvioAladi = $("#cancelafirmaenvioAladi").data("kendoButton");
var firmarenvioAladi = $("#firmarenvioAladi").data("kendoButton");

cancelafirmaenvioAladi.bind("click", function(e){             
    cambiar('firmaenvioAladi','datosgeneralesco');
    borrarPin('{$nombre}');
});

firmarenvioAladi.bind("click", function(e){
    if(formfirmaenvioAladi.validate())
    {
        var aladi = $("#tabla_aladi").data("kendoGrid");
        var data_aladi = aladi.dataSource;
        var valores_aladi = data_aladi.data();

        var acuerdo = $("#lista_co").val();
        var pais = $("#combopais").val();
        var regional = $("#comboregional").val();
        var fechaexportacion = $("#fechaexportacion").val();
        var tablaAladi = JSON.stringify(valores_aladi);  
        
        var datos = $("#form_aladi").serialize()+"&opcion=admCertificado&tarea=guardarCOAladi&id_pais="+pais+"&id_acuerdo="+acuerdo+"&id_regional="+regional+"&fechaexportacion="+fechaexportacion+"&tabla_aladi="+tablaAladi;
        
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
var formfirmaenvioAladi = $("#formfirmaenvioAladi").kendoValidator({
    rules:{ 
        firmarenvioAladi: function(input) { 
            var validate = input.data('firmarenvioAladi');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmacache !== $("#pinfirmaenvioAladi").val()) 
                {
                    verificarPinAladi($("#pinfirmaenvioAladi").val());                    
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
        firmarenvioAladi: function(input) { 
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

function verificarPinAladi(pin_insertado)
{
    $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
            success: function (data) {    
                swfirma=data;
                firmacache=$("#pinfirmaenvioAladi").val();
                formfirmaenvioAladi.validateInput($("#pinfirmaenvioAladi"));
            }
        }); 
}

$("#addfiladdjj_aladi").kendoButton();
$("#elimfiladdjj_aladi").kendoButton();
$("#enviar_aladi").kendoButton();
$("#cancelar_aladi").kendoButton();
$("#cancelardatosaladi").kendoButton();
$("#desgloseDdjjAladi").kendoButton();
$("#desgloseFacturaAladi").kendoButton();

var addfiladdjj_aladi = $("#addfiladdjj_aladi").data("kendoButton");
var elimfiladdjj_aladi = $("#elimfiladdjj_aladi").data("kendoButton");
var enviar_aladi = $("#enviar_aladi").data("kendoButton");
var cancelar_aladi = $("#cancelar_aladi").data("kendoButton");
var cancelardatosaladi = $("#cancelardatosaladi").data("kendoButton");
var desgloseDdjjAladi = $("#desgloseDdjjAladi").data("kendoButton");
var desgloseFacturaAladi = $("#desgloseFacturaAladi").data("kendoButton");

var ddjjfacturaaladi = $("#ddjjfacturaaladi").kendoWindow({
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
ddjjfacturaaladi.center(); 

//*******Acciones para Certificado ALADI
addfiladdjj_aladi.bind("click", function(e){
    ddjjfacturaaladi.open();
    listarFacturasAladi();
});

//TABLAS Y VALIDACIONES PARA ALADI
var form_aladi = $("#form_aladi").kendoValidator({
    rules:{
        gridvalidatoraladi: function(input) { 
            var validate = input.data('gridvalidatoraladi');
            if (typeof validate !== 'undefined') 
            {
                //---aqui cuentas los productos y verificas si no estan vacíos
                swp=verificagridtablaaladi();
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
        gridvalidatoraladi: function(input) { 
            if(swp==0){  
                return 'Ingrese al menos un dato para el certificado.';
            }else{
                return 'Por favor Complete los datos';
            }
        }
        //ftoaladivalidator: "Debe colocar numero de factura",
    }
}).data("kendoValidator");

function verificagridtablaaladi()
{
    var grid_aladi = $("#tabla_aladi").data("kendoGrid");
    var data_aladi = grid_aladi.dataSource;
    var numfilas_aladi = data_aladi.total();
    if(numfilas_aladi==0){
        return 0;
    }else{
        var valores_aladi = data_aladi.data();
        for (var i = 0; i < numfilas_aladi; i++) {
            if(!valores_aladi[i].descripcion_comercial.trim())
            {
                return 1;
            }
        }
        return 2;
    }
}

var form_to_aladi = $("#form_to_aladi").kendoValidator({
}).data("kendoValidator");

enviar_aladi.bind("click", function(e){
    if(form_general.validate() && form_aladi.validate()){
        //Recorrer la tabla para sacar el total de la mercaderia
        var valor,costo, total=0;
        $("#tabla_aladi tbody tr").each(function (index) {
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
            data: 'opcion=admCertificado&tarea=calcularPago&total='+total+'&id_tipo_certificado=1',
            success: function (data) {
                costo = eval('('+data+')');
                costo = "Total a Pagar: "+ costo + " Bs.";
                $("#costo_aladi").html(costo);
            }
        }); 

        var check_to = $("#check_factterceroperadoraladi").prop('checked');
        if(check_to){
            if(form_to_aladi.validate()){
                cambiar('datosgeneralesco','firmaenvioAladi');
                generarPin('{$id_empresa}','{$id_persona}','14');
            }
        }else{            
            cambiar('datosgeneralesco','firmaenvioAladi');
            generarPin('{$id_empresa}','{$id_persona}','14');
        }
    }
});
cancelar_aladi.bind("click", function(e){
    ddjjfacturaaladi.close();
    remover(tabStrip.select());
});

var form_ddjjfacturaaladi = $("#form_ddjjfacturaaladi").kendoValidator({
    rules:{
        facturasaladivalidator: function(input) { 
            var validate = input.data('facturasaladivalidator');
            if (typeof validate !== 'undefined') 
            {
                swp=verificagridfacturasaladi();
                if(swp==0){
                    return false;
                }
            }
            return true;
        }
    },
    messages:{
        facturasaladivalidator: function(input) { 
            if(swp==0){  
                return 'Escoja por lo menos una Factura';
            }else{
                return 'Por favor Complete los datos';
            }
        }
    }
}).data("kendoValidator");
function verificagridfacturasaladi()
{
    var facturasaladi = $("#facturasAladi").data("kendoGrid");
    var currentDataItem = facturasaladi.dataItem(facturasaladi.select());
    if(!currentDataItem){
        return 0;
    }else{
        return 1;
    }
}

desgloseDdjjAladi.bind("click", function(e){
    if(form_ddjjfacturaaladi.validate()){
        //Tabla con datos del Aladi
        var tabla = $("#tabla_aladi").data("kendoGrid");
        //Tabla con las facturas e insumos.
        var facturasaladi = $("#facturasAladi").data("kendoGrid");

        facturasaladi.select().each(function () {
            //Capturar todos los datos de la tabla FacturasAladi
            var dataItem = facturasaladi.dataItem($(this));
            //Capturar los datos de la tabla_aladi
            var data_aladi = tabla.dataSource;
            
            //alert(data_aladi.total());
            if(data_aladi.total()==0){
                var dataItem2 = dataItem;
                
                if(dataItem.cantidad_ddjj==1){
                    var dataItem2 = dataItem;
                    dataItem2.tipo_desglose = "1";
                    tabla.dataSource.add(dataItem2);
                }else{
                    var id_ddjj = dataItem.id_ddjj.split(";");
                    var descripcion = dataItem.descripcion_comercial.split(";");
                    var arancel = dataItem.clasificacion_arancelaria.split(";");
                    var insumos = dataItem.insumos.split(";");
                    var cantidad_insumos = insumos.length;
                    
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
            }else{
                var valores_aladi = data_aladi.data();
                var bandera=0;

                for(var i=0; i<data_aladi.total(); i++){
                    if((valores_aladi[i].id_factura==dataItem.id_factura)&&(valores_aladi[i].tipo_factura==dataItem.tipo_factura)){
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
                }else{
                    alert("Ya existe la Factura: "+dataItem.numero_factura);
                }
            }
        });
        tabla.refresh();
        ddjjfacturaaladi.close();
    }
});

desgloseFacturaAladi.bind("click", function(e){
    if(form_ddjjfacturaaladi.validate()){
        //Tabla con datos del Aladi
        var tabla = $("#tabla_aladi").data("kendoGrid");
        //Tabla con las facturas e insumos.
        var facturasaladi = $("#facturasAladi").data("kendoGrid");

        facturasaladi.select().each(function () {
            //Capturar todos los datos de la tabla FacturasAladi
            var dataItem = facturasaladi.dataItem($(this));
            //Capturar los datos de la tabla_aladi
            var data_aladi = tabla.dataSource;
            
            if(data_aladi.total()==0){
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
                    dataItem2.insumos = dataItem.insumos;
                    dataItem2.total = contenido[5];
                    dataItem2.fecha_emision = dataItem.fecha_emision;
                    dataItem2.tipo_desglose = "2";
                    tabla.dataSource.add(dataItem2);
                }
            }else{
                var valores_aladi = data_aladi.data();
                var bandera=0;

                for(var i=0; i<data_aladi.total(); i++){
                    if((valores_aladi[i].id_factura==dataItem.id_factura)&&(valores_aladi[i].tipo_factura==dataItem.tipo_factura)){
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
                }else{
                    alert("Ya existe la Factura: "+dataItem.numero_factura);
                }
            }
        });
        tabla.refresh();
        ddjjfacturaaladi.close();
    }
});

/***** Botones de Cancelar *****/
cancelardatosaladi.bind("click", function(e){  
    ddjjfacturaaladi.close();
});

var dataAladi = new kendo.data.DataSource({
    transport: {
        read: {
            dataType: "json",
            url: "index.php?opcion=admCertificado&tarea=cargarTablaAladi&id_co_aladi="+{$co_aladi->getId_co_aladi()}
        }
    },
    serverPaging: true,
    serverFiltering: true,
    serverSorting: true,
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
    $('#check_factterceroperadoraladi').change(function(){
        var marcado = $(this).prop('checked');
        if(marcado){
            $('#div_factterceropaladi').fadeIn(1000);
            $('#div_factterceropaladi2').fadeIn(1000);
        } else {
            $('#div_factterceropaladi').fadeOut(1000);
            $('#div_factterceropaladi2').fadeOut(1000);
        }  
    });
    
    $("#tabla_aladi").kendoGrid({
        dataSource: dataAladi,
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
            { field: "tipo_desglose", title: "Tipo Desglose"},
            */
        ]
    });
});

/************Funciones para los botones *********************************************/
function listarddjjaladi(){
    //var acuerdo = $("#lista_co").val();
    $("#ddjjaladi").kendoGrid({
        editable: false,
        scrollable: false,
        resizable: true,
        selectable: "simple",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admDeclaracionJurada&tarea=listarDeclaracionesVigentesConCriterioOrigen&id_acuerdo="+{$co->getId_Acuerdo()}
                }
            },
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true
        },
        change: function(e) {
            cambiar('divddjjescogeraladi','divfacturasescogeraladi');
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

function listarFacturasAladi(){
    //var acuerdo = $("#lista_co").val();
    var grid = $("#facturasAladi").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: "index.php?opcion=admFactura&tarea=listarFacturasVigentesPorAcuerdo&id_acuerdo="+{$co->getId_Acuerdo()}
                }
            },
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
            pageSize: 6
        },
        sortable: true,
        pageable: true,
        editable: false,
        scrollable: true,
        selectable: "simple",
        filterable: true,
        detailInit: detalleFacturaAladi,
        dataBound: function() {
            this.expandRow(this.tbody.find("tr.k-master-row").first());
        },
        columns: [
            /*
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
            */
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
            
        ]
    });
    //var grid = $("#grid").data("kendoGrid");
}

function detalleFacturaAladi(e) {
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

function eliminarfilaaladi(){
    var tabla_aladi = $("#tabla_aladi").data("kendoGrid");
    var currentDataItem = tabla_aladi.dataItem(tabla_aladi.select());
    var dataRow = tabla_aladi.dataSource.getByUid(currentDataItem.uid);
    tabla_aladi.dataSource.remove(dataRow);
}

</script>  
