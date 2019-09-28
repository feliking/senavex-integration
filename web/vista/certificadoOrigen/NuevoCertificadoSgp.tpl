<div id="ddjjfacturasgp">
    <form name="form_ddjjfacturasgp" id="form_ddjjfacturasgp" method="post" action="index.php">
        <div id="divfacturasescogersgp">
            <div class="row-fluid form">
                <div class="span12">Escoja su Factura</div>
            </div>
            <div class="row-fluid form">
                <div class="span12"><div id="facturasSgp" class="fadein"></div>
                  <center> <input type="hidden" name="hiddenvalidatorfacturassgp" id="hiddenvalidatorfacturassgp" 
                data-facturassgpvalidator
                data-required-msg="Escoja por lo menos una opción" /></center>
                </div>
            </div>
            <div class="row-fluid form">
                <input id="desgloseDdjjSgp" type="button"  value="Desglosar por DDJJ" class="k-primary" /> 
                <input id="desgloseFacturaSgp" type="button"  value="Desglosar por Factura" class="k-primary" />
                <input id="cancelardatossgp" type="button"  value="Cancelar" class="k-primary" /> 
            </div>
        </div>
    </form>
</div>

<div class="row-fluid fadein"  id="firmaenvioSgp" >
       <div class="k-block fadein">
                <div class="k-header">
                    <div class="k-header"><div class="titulo">Confirmación de Envío de Certificado de Origen</div></div>
                </div>
                <div class="k-cuerpo"> 
                    <div class="row-fluid  form" >
                        <div class="span1" > </div>
                        <div class="span10" >
                            <p> Yo <span class="letrarelevante">{$nombrecompleto}</span>, certifico el envío para revisión
                                del Certificado de Origen tipo SGP.</p>
                            <p > El costo de la emisión que debe cancelar para el recojo del Certificado de Origen es de:</p>
                            <p ><div id="costo_sgp" style="color:red; font-size: 18px;"></div> </p>
                        </div>  
                        <div class="span1" ></div>
                    </div> 
                    <form name="formfirmaenvioSgp" id="formfirmaenvioSgp" method="post"  action="index.php" >
                        <div class="row-fluid  form" >
                            <div class="span5" ></div>
                            <div class="span2" >
                                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                               class="k-textbox " placeholder="Pin" name="pinfirmaenvioSgp"  id="pinfirmaenvioSgp" maxlength="4" size="4" style="width:50px;"
                               required data-required-msg="Por favor ingrese su Pin." data-firmarenvioSgp /> 
                            </div>  
                            <div class="span5" ></div>
                        </div>  
                        <div class="row-fluid  form" >
                            <div class="span4 hidden-phone" >
                             </div>
                             <div class="span2 " >
                                 <input id="cancelafirmaenvioSgp" type="button" value="Cancelar" class="k-primary" style="width:100%"/> <br> <br>
                             </div> 
                             <div class="span2 " >
                                 <input id="firmarenvioSgp" type="button"  value="Firmar" class="k-primary" style="width:100%"/>
                             </div> 
                             <div class="span4 hidden-phone" >
                             </div>
                         </div> 
                    </form> 
                </div>   
      </div>              
</div>

<script>
ocultar('firmaenvioSgp');

//FUNCIONES PARA LA FIRMA DEL EXPORTADOR ENVIANDO EL C.O.
$("#cancelafirmaenvioSgp").kendoButton();
$("#firmarenvioSgp").kendoButton();
var cancelafirmaenvioSgp = $("#cancelafirmaenvioSgp").data("kendoButton");
var firmarenvioSgp = $("#firmarenvioSgp").data("kendoButton");

cancelafirmaenvioSgp.bind("click", function(e){             
    //ocultar('firmaenvioSgp');
    cambiar('firmaenvioSgp','datosgeneralesco');
    borrarPin('{$nombre}');
});

firmarenvioSgp.bind("click", function(e){
    if(formfirmaenvioSgp.validate())
    {
        var sgp = $("#tabla_sgp").data("kendoGrid");
        var data_sgp = sgp.dataSource;
        var valores_sgp = data_sgp.data();

        var acuerdo = $("#lista_co").val();
        var pais = $("#combopais").val();
        var regional = $("#comboregional").val();
        var fechaexportacion = $("#fechaexportacion").val();
        var tablaSgp = JSON.stringify(valores_sgp);
        var nombreconsig = $("#nombreconsignatariosgp").val();
        var direccionconsig = $("#direccionconsignatariosgp").val();
        var paisconsig = $("#paisconsignatariosgp").val();
            
        var datos = $("#form_sgp").serialize()+"&opcion=admCertificado&tarea=guardarCOSgp&id_pais="+pais+"&id_acuerdo="+acuerdo+"&id_regional="+regional+"&fechaexportacion="+fechaexportacion+"&nombreconsignatario="+nombreconsig+"&direccionconsignatario="+direccionconsig+"&paisconsignatario="+paisconsig+"&tabla_sgp="+tablaSgp;
        
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
var formfirmaenvioSgp = $("#formfirmaenvioSgp").kendoValidator({
    rules:{ 
        firmarenvioSgp: function(input) { 
            var validate = input.data('firmarenvioSgp');
            if (typeof validate !== 'undefined' && validate !== false) 
            {
                if (firmacache !== $("#pinfirmaenvioSgp").val()) 
                {
                    verificarPinSgp($("#pinfirmaenvioSgp").val());                    
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
        firmarenvioSgp: function(input) { 
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

function verificarPinSgp(pin_insertado)
{
    $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=funcionesGenerales&tarea=verificarPin&id_transaccion_pin='+id_transaccion_pin+'&pin_introducido='+pin_insertado+'',
            success: function (data) {    
                swfirma=data;
                firmacache=$("#pinfirmaenvioSgp").val();
                formfirmaenvioSgp.validateInput($("#pinfirmaenvioSgp"));
            }
        }); 
}

//***** Funciones y métodos para el C.O. ********//
$("#addfiladdjj_sgp").kendoButton();
$("#elimfiladdjj_sgp").kendoButton();
$("#enviar_sgp").kendoButton();
$("#cancelar_sgp").kendoButton();
$("#cancelardatossgp").kendoButton();
$("#desgloseDdjjSgp").kendoButton();
$("#desgloseFacturaSgp").kendoButton();

var addfiladdjj_sgp = $("#addfiladdjj_sgp").data("kendoButton");
var elimfiladdjj_sgp = $("#elimfiladdjj_sgp").data("kendoButton");
var enviar_sgp = $("#enviar_sgp").data("kendoButton");
var cancelar_sgp = $("#cancelar_sgp").data("kendoButton");
var cancelardatossgp = $("#cancelardatossgp").data("kendoButton");
var desgloseDdjjSgp = $("#desgloseDdjjSgp").data("kendoButton");
var desgloseFacturaSgp = $("#desgloseFacturaSgp").data("kendoButton");

var ddjjfacturasgp = $("#ddjjfacturasgp").kendoWindow({
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
ddjjfacturasgp.center(); 

//*******Acciones para Certificado SGP
addfiladdjj_sgp.bind("click", function(e){
    ddjjfacturasgp.open();
    listarFacturasSgp();
});

//TABLAS Y VALIDACIONES PARA SGP
var form_sgp = $("#form_sgp").kendoValidator({
    rules:{
        gridvalidatorsgp: function(input) { 
            var validate = input.data('gridvalidatorsgp');
            if (typeof validate !== 'undefined') 
            {
                //---aqui cuentas los productos y verificas si no estan vacíos
                swp=verificagridtablasgp();
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
        gridvalidatorsgp: function(input) { 
            if(swp==0){  
                return 'Ingrese al menos un dato para el certificado.';
            }else{
                return 'Por favor Complete los datos';
            }
        },
    }
}).data("kendoValidator");

function verificagridtablasgp()
{
    var grid_sgp = $("#tabla_sgp").data("kendoGrid");
    var data_sgp = grid_sgp.dataSource;
    var numfilas_sgp = data_sgp.total();
    if(numfilas_sgp==0){
        return 0;
    }else{
        var valores_sgp = data_sgp.data();
        for (var i = 0; i < numfilas_sgp; i++) {
            if(!valores_sgp[i].descripcion_comercial.trim())
            {
                return 1;
            }
        }
        return 2;
    }
}

enviar_sgp.bind("click", function(e){
    if(form_general.validate() && form_sgp.validate()){
        //Recorrer la tabla para sacar el total de la mercaderia
        var valor,costo, total=0;
        $("#tabla_sgp tbody tr").each(function (index) {
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
            data: 'opcion=admCertificado&tarea=calcularPago&total='+total+'&id_tipo_certificado=3',
            success: function (data) {
                costo = eval('('+data+')');
                costo = "Total a Pagar: "+ costo + " Bs.";
                $("#costo_sgp").html(costo);
            }
        });
        
        cambiar('datosgeneralesco','firmaenvioSgp');
        generarPin('{$id_empresa}','{$id_persona}','14');
    }
});
cancelar_sgp.bind("click", function(e){  
    ddjjfacturasgp.close();
    remover(tabStrip.select());
});

var form_ddjjfacturasgp = $("#form_ddjjfacturasgp").kendoValidator({
    rules:{
        facturassgpvalidator: function(input) { 
            var validate = input.data('facturassgpvalidator');
            if (typeof validate !== 'undefined') 
            {
                swp=verificagridfacturassgp();
                if(swp==0){
                    return false;
                }
            }
            return true;
        }
    },
    messages:{
        facturassgpvalidator: function(input) { 
            if(swp==0){  
                return 'Escoja por lo menos una Factura';
            }else{
                return 'Por favor Complete los datos';
            }
        }
    }
}).data("kendoValidator");
function verificagridfacturassgp()
{
    var facturassgp = $("#facturasSgp").data("kendoGrid");
    var currentDataItem = facturassgp.dataItem(facturassgp.select());
    if(!currentDataItem){
        return 0;
    }else{
        return 1;
    }
}

desgloseDdjjSgp.bind("click", function(e){
    if(form_ddjjfacturasgp.validate()){
        //Tabla con datos del Sgp
        var tabla = $("#tabla_sgp").data("kendoGrid");
        //Tabla con las facturas e insumos.
        var facturassgp = $("#facturasSgp").data("kendoGrid");

        facturassgp.select().each(function () {
            //Capturar todos los datos de la tabla FacturasSgp
            var dataItem = facturassgp.dataItem($(this));
            //Capturar los datos de la tabla_sgp
            var data_sgp = tabla.dataSource;
            
            if(data_sgp.total()==0){
                var dataItem2 = dataItem;
                
                if(dataItem.cantidad_ddjj==1){
                    dataItem2.tipo_desglose = "1";
                    
                    var id_insumos = dataItem.id_insumos_factura.split(";");
                    var insumos = dataItem.insumos.split(";");
                    var total_fob = 0;
                    var total_peso = 0;
                    var unidad='';
                    for(var i=0; i<id_insumos.length; i++){
                        var contenido = insumos[i].split("|");
                        total_fob=total_fob+parseFloat(contenido[5]);
                        total_peso=total_peso+parseFloat(contenido[6]);
                        unidad=contenido[7];
                    }
                    dataItem2.total = total_fob;
                    dataItem2.cantidad = total_peso;
                    dataItem2.id_unidad_medida = unidad;
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
                        var total_fob = 0;
                        var total_peso = 0;
                        var unidad = ''
                        for(var j=0;j<cantidad_insumos;j++){
                            var detalle_insumos = insumos[j].split("|");
                            
                            if(id_ddjj[i]==detalle_insumos[2]){
                                cadena_insumos=cadena_insumos+insumos[j]+";";
                            }
                            total_fob=total_fob+parseFloat(detalle_insumos[5]);
                            total_peso=total_peso+parseFloat(detalle_insumos[6]);
                            unidad=detalle_insumos[7];
                        }
                        var cadena_insumos = cadena_insumos.substring(0, cadena_insumos.length-1);
                        dataItem2.insumos = cadena_insumos;
                        dataItem2.total = total_fob;
                        dataItem2.fecha_emision = dataItem.fecha_emision;
                        dataItem2.tipo_desglose = "1";
                        dataItem2.cantidad = total_peso;
                        dataItem2.id_unidad_medida = unidad;
                        tabla.dataSource.add(dataItem2);
                    }
                }
                
                var datos=JSON.stringify(dataItem);
                $.ajax({
                    type: 'get',
                    url: 'index.php?opcion=admInventario&tarea=buscarConsignatarioFactura&valores='+datos,
                    success: function(data) {
                        var data = eval('('+data+')');
                        $("#nombreconsignatariosgp").val(data.nombre_consignatario);
                        $("#direccionconsignatariosgp").val(data.direccion_consignatario);
                        $("#paisconsignatariosgp").val(data.pais_consignatario);
                    }
                });
            }else{
                var valores_sgp = data_sgp.data();
                var bandera=0;

                for(var i=0; i<data_sgp.total(); i++){
                    if((valores_sgp[i].id_factura==dataItem.id_factura)&&(valores_sgp[i].tipo_factura==dataItem.tipo_factura)){
                        bandera=1;
                        break;
                    }
                }
                if(bandera==0){
                    var dataItem2 = dataItem;

                    if(dataItem.cantidad_ddjj==1){
                        dataItem2.tipo_desglose = "1";
                        
                        var id_insumos = dataItem.id_insumos_factura.split(";");
                        var insumos = dataItem.insumos.split(";");
                        var total_fob = 0;
                        var total_peso = 0;
                        var unidad='';
                        for(var i=0; i<id_insumos.length; i++){
                            var contenido = insumos[i].split("|");
                            total_fob=total_fob+parseFloat(detalle_insumos[5]);
                            total_peso=total_peso+parseFloat(contenido[6]);
                            unidad=contenido[7];
                        }
                        dataItem2.total = total_fob;
                        dataItem2.cantidad = total_peso;
                        dataItem2.id_unidad_medida = unidad;
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
                            var total_fob = 0;
                            var total_peso = 0;
                            var unidad = ''
                            for(var j=0;j<cantidad_insumos;j++){
                                var detalle_insumos = insumos[j].split("|");

                                if(id_ddjj[i]==detalle_insumos[2]){
                                    cadena_insumos=cadena_insumos+insumos[j]+";";
                                }
                                total_fob=total_fob+parseFloat(detalle_insumos[5]);
                                total_peso=total_peso+parseFloat(detalle_insumos[6]);
                                unidad=detalle_insumos[7];
                            }
                            var cadena_insumos = cadena_insumos.substring(0, cadena_insumos.length-1);
                            dataItem2.insumos = cadena_insumos;
                            dataItem2.total = total_fob;
                            dataItem2.fecha_emision = dataItem.fecha_emision;
                            dataItem2.tipo_desglose = "1";
                            dataItem2.cantidad = total_peso;
                            dataItem2.id_unidad_medida = unidad;
                            tabla.dataSource.add(dataItem2);
                        }
                    }

                    var datos=JSON.stringify(dataItem);
                    $.ajax({
                        type: 'get',
                        url: 'index.php?opcion=admInventario&tarea=buscarConsignatarioFactura&valores='+datos,
                        success: function(data) {
                            var data = eval('('+data+')');
                            $("#nombreconsignatariosgp").val(data.nombre_consignatario);
                            $("#direccionconsignatariosgp").val(data.direccion_consignatario);
                            $("#paisconsignatariosgp").val(data.pais_consignatario);
                        }
                    });
                }else{
                    alert("Ya existe la Factura: "+dataItem.numero_factura);
                }

            }
        });
        tabla.refresh();
        ddjjfacturasgp.close();
    }
});

desgloseFacturaSgp.bind("click", function(e){
    if(form_ddjjfacturasgp.validate()){
        //Tabla con datos del Sgp
        var tabla = $("#tabla_sgp").data("kendoGrid");
        //Tabla con las facturas e insumos.
        var facturassgp = $("#facturasSgp").data("kendoGrid");

        facturassgp.select().each(function () {
            //Capturar todos los datos de la tabla FacturasSgp
            var dataItem = facturassgp.dataItem($(this));
            //Capturar los datos de la tabla_sgp
            var data_sgp = tabla.dataSource;
            
            if(data_sgp.total()==0){
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
                    dataItem2.total = contenido[5];
                    dataItem2.cantidad = contenido[6];
                    dataItem2.id_unidad_medida = contenido[7];
                    dataItem2.fecha_emision = dataItem.fecha_emision;
                    dataItem2.tipo_desglose = "2";
                    tabla.dataSource.add(dataItem2);
                }
                var datos=JSON.stringify(dataItem);
                $.ajax({
                    type: 'get',
                    url: 'index.php?opcion=admInventario&tarea=buscarConsignatarioFactura&valores='+datos,
                    success: function(data) {
                        var data = eval('('+data+')');
                        $("#nombreconsignatariosgp").val(data.nombre_consignatario);
                        $("#direccionconsignatariosgp").val(data.direccion_consignatario);
                        $("#paisconsignatariosgp").val(data.pais_consignatario);
                    }
                });
            }else{
                var valores_sgp = data_sgp.data();
                var bandera=0;

                for(var i=0; i<data_sgp.total(); i++){
                    if((valores_sgp[i].id_factura==dataItem.id_factura)&&(valores_sgp[i].tipo_factura==dataItem.tipo_factura)){
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
                        dataItem2.total = contenido[5];
                        dataItem2.cantidad = contenido[6];
                        dataItem2.id_unidad_medida = contenido[7];
                        dataItem2.fecha_emision = dataItem.fecha_emision;
                        dataItem2.tipo_desglose = "2";
                        tabla.dataSource.add(dataItem2);
                    }
                    var datos=JSON.stringify(dataItem);
                    $.ajax({
                        type: 'get',
                        url: 'index.php?opcion=admInventario&tarea=buscarConsignatarioFactura&valores='+datos,
                        success: function(data) {
                            var data = eval('('+data+')');
                            $("#nombreconsignatariosgp").val(data.nombre_consignatario);
                            $("#direccionconsignatariosgp").val(data.direccion_consignatario);
                            $("#paisconsignatariosgp").val(data.pais_consignatario);
                        }
                    });
                }else{
                    alert("Ya existe la Factura: "+dataItem.numero_factura);
                }
            }
        });
        tabla.refresh();
        ddjjfacturasgp.close();
    }
});

/***** Botones de Cancelar *****/
cancelardatossgp.bind("click", function(e){  
    ddjjfacturasgp.close();
});

var dataSgp = new kendo.data.DataSource({
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
                tipo_desglose: { editable: false},
                cantidad: { editable: false},
                id_unidad_medida: { editable: false},
                marcapaquete: { type: "number", validation: { required: true, min: 1}, editable: true}
            }
        }
    }
});

$(document).ready(function (){
    
    $('#check_consignatariosgp').change(function(){
        var marcado = $(this).prop('checked');
        if(marcado){
            $('#nombreconsignatariosgp').removeAttr('disabled');
            $('#direccionconsignatariosgp').removeAttr('disabled');
            $('#paisconsignatariosgp').removeAttr('disabled');
        } else {
            $('#nombreconsignatariosgp').attr('disabled','disabled');
            $('#direccionconsignatariosgp').attr('disabled','disabled');
            $('#paisconsignatariosgp').attr('disabled','disabled');
        }  
    });
    
    $("#combomediotransportesgp").kendoDropDownList({
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
    
    $("#tabla_sgp").kendoGrid({
        dataSource: dataSgp,
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
            { field: "tipo_desglose", hidden: true},
            { field: "cantidad", hidden: true},
            { field: "id_unidad_medida", hidden: true},
            { field: "marcapaquete", title: "Marcas/Paquetes"}
            /*
            { field: "id_ddjj", title: "ddjj"},
            { field: "clasificacion_arancelaria", title: "Clasificación Arancelaria"},
            { field: "descripcion_comercial", title: "Denominación Comercial de las Mercancías"},
            { field: "id_factura", title: "id_factura"},
            { field: "tipo_factura", title: "tipo_factura"},
            { field: "numero_factura", title: "N° Factura"},
            { field: "id_insumos_factura", title: "id_insumos_factura"},
            { field: "insumos", title: "insumos"},
            { field: "total", title: "total"},
            { field: "fecha_emision", title: "Fecha de Emisión"},
            { field: "tipo_desglose", title: "Tipo Desglose"},
            { field: "cantidad", title: "Peso"},
            { field: "id_unidad_medida", title: "U.Medida"},
            { field: "marcapaquete", title: "Marcas/Paquetes"}
            */
        ]
    });
});

/************Funciones para los botones *********************************************/
function listarddjjsgp(){
    var acuerdo = $("#lista_co").val();
    $("#ddjjsgp").kendoGrid({
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
            cambiar('divddjjescogersgp','divfacturasescogersgp');
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

function listarFacturasSgp(){  
    var acuerdo = $("#lista_co").val();
    $("#facturasSgp").kendoGrid({
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
        detailInit: detalleFacturaSgp,
        dataBound: function() {
            this.expandRow(this.tbody.find("tr.k-master-row").first());
        },
        columns: [
            /*
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
            */
            { field: "id_ddjj", title: "id_ddjj"},
            { field: "descripcion_comercial", title: "descripcion"},
            { field: "clasificacion_arancelaria", title: "clasificacion"},
            { field: "cantidad_ddjj", title: "cantidad"},//, hidden: true},
            { field: "id_factura", title: "id_factura"},
            { field: "tipo_factura", title: "tipo_factura"},
            { field: "numero_factura", title: "N° Factura"},
            { field: "fecha_emision", title: "Fecha emisión"},
            { field: "total", title: "Total"},
            { field: "tipo", title: "Tipo Factura"}
        ]
    });
}

function detalleFacturaSgp(e) {
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

function eliminarfilasgp(){
    var tabla_sgp = $("#tabla_sgp").data("kendoGrid");
    var currentDataItem = tabla_sgp.dataItem(tabla_sgp.select());
    var dataRow = tabla_sgp.dataSource.getByUid(currentDataItem.uid);
    tabla_sgp.dataSource.remove(dataRow);
}

</script>  
