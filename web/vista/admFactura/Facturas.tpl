<div class="row-fluid  form" >
    <div class="span12 fadein" style="text-align: left;">
        <button name="nuevafactura" id="nuevafactura" class="botonElegir">Nueva Factura</button> 
        <input id="menufactura" value="1" class="botonElegir"/>
    </div>
</div>
<div class="row-fluid  form" >
    <div id="misfacturas" class="fadein"></div>
</div>  
<div id="avisonoeliminar"  style="display:none">
    Para poder <span id='xeliminar'>eliminar</span> esta factura, necesita eliminar las facturas:<br><br><center> <span id='xfacturasdp'></span></center>
</div>
 <script>
{literal}
var grid2 =  $("#misfacturas").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admFactura&tarea=listarFacturas",
                   dataType: "json"
                }
            },
            pageSize: 10
        },
        pageable: {},
        filterable: {
            extra: false,
            operators: {
                string: {
                    startswith: "Empieza con:",
                    eq: "Es igual a:",
                    neq: "No es igual a:"
                }
            }
        },        
        sortable: true,
        scrollable: false,
        selectable: "simple",
        reorderable: true,
        resizable: true,
        change: function (e) {
            setTimeout(function () {cambiarceldasmisfacturas()}, 200);
        },
        columns: [
            { field: "id_estado_factura", title: "estado",hidden:true
            },
            { field: "tipodescripcion", title: "Tipo Factura" {/literal}
                {if $menor_cuantia==1}
                    ,filterable: false
                {else}
                    ,filterable: {
                    ui: cityFilter
                }
                {/if}
           
            },
            { field: "numero_factura", title: "Numero de Factura"},
            { field: "facturapadre", title: "Proviene de Fact."{if $menor_cuantia==1},hidden:true{/if} {literal}},
            { field: "id_acuerdo", title: "Acuerdo", filterable: {
                    ui: acuerdosFilter
                }
            },
            { field: "fecha_emision", title: "Fecha",filterable: false},
            { field: "total", title: "Total $us",filterable: false},
            { title: "Editar", width: 10,command: [
                {
                 name: "Editar",
                 text: "",
                 imageClass: "k-icon k-i-pencil",
                 click: function(e) {
                     swmisfacturas=0;
                    e.preventDefault();
                    editarFactura();
                 },
                 confirmation: false
                }
            ]},
            { title: "Eliminar",width: 10,command: [
                {
                 name: "Eliminar",
                 text: "",
                 imageClass: "k-icon k-i-close",
                 click: function(e) {
                     swmisfacturas=0;
                    e.preventDefault();
                    eliminarFactura();
                 },
                 confirmation: false
                }
              ]}
        ]
    });
var estadosfactura = [
    { text: "No Utilizadas", value: "1" },
    { text: "En espera de emisión", value: "2" },
    { text: "Utilizadas", value: "3" },
];
var dropDown = $("#menufactura").kendoDropDownList({
    dataTextField: "text",
    dataValueField: "value",
    dataSource: estadosfactura,
    index: 0,
    change : function (e) {
        var grid = $("#misfacturas").data("kendoGrid");
        if(this.value()=='1')
        {
            var datafacturas = new kendo.data.DataSource({
                transport: {
                    read: {
                        url: "index.php?opcion=admFactura&tarea=listarFacturas",
                       dataType: "json"
                    }
                }
                ,
            pageSize: 10
            });
            var grid_factura = $("#insumosfactura").data("kendoGrid");
            grid.showColumn(7);
            grid.showColumn(6);
        }
        if(this.value()=='2')
        {
            var datafacturas = new kendo.data.DataSource({
                transport: {
                    read: {
                        url: "index.php?opcion=admFactura&tarea=listarFacturasEnEspera",
                       dataType: "json"
                    }
                }
                ,
            pageSize: 10
            });
            grid.hideColumn(7);
            grid.hideColumn(6);
        }
        if(this.value()=='3')
        {
            var datafacturas = new kendo.data.DataSource({
                transport: {
                    read: {
                        url: "index.php?opcion=admFactura&tarea=listarFacturasUtilizado",
                       dataType: "json"
                    }
                }
                ,
            pageSize: 10
            });
            grid.hideColumn(7);
            grid.hideColumn(6);
        }        
        grid.setDataSource(datafacturas);
        grid.refresh();
    }
});
  cities= [ "Tercer Operador","No Dosificada","Dosificada"];
acuerdos=[
{/literal}
    {foreach $acuerdos as $acuerdo} 
    "{$acuerdo->sigla}",
    {/foreach} 
{literal}
];
function cityFilter(element) {
    element.kendoDropDownList({
        dataSource: cities,
        optionLabel: "Seleccione.."
    });
}
function acuerdosFilter(element) {
    element.kendoDropDownList({
        dataSource: acuerdos,
        optionLabel: "Seleccione.."
    });
}
var swmisfacturas=0;
    
function cambiarceldasmisfacturas()
{  
   
    var gridmisfacturas = $("#misfacturas").data("kendoGrid");
    var row = gridmisfacturas.select();
    var data = gridmisfacturas.dataItem(row);
    if(swmisfacturas==data.id_factura)
    {  
        anadir({/literal}'Factura Nro. '+data.numero_factura{literal},'admInventario','mostrarfactura&id_factura='+data.id_factura+'&tipo_factura='+data.tipodosificada);
    }
    else
    {
        swmisfacturas=data.id_factura;
    }
}


//--------------------------esto es p0ara eliminar una factura----------------------------
function eliminarFactura()
{
   var gridfactura = $("#misfacturas").data("kendoGrid");
    var row = gridfactura.select();
    var data = gridfactura.dataItem(row); 
    //gridfactura.dataSource.remove(data);
    if(data.id_estado_factura==5)
    {
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admFactura&tarea=verFacturasDosificadas&id_factura='+data.id_factura,
            success: function (data) {
                $("#xeliminar").html('eliminar');
                 $("#xfacturasdp").html(data);
                 if (!$("#avisonoeliminar").data("kendoWindow")) { 
                    avisonoeliminar.kendoWindow({
                        draggable: true,
                        height: "120px",                      
                        width: "320px",
                        resizable: true,
                        actions: [ "Minimize", "Close"],
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
                    avisonoeliminar.data("kendoWindow").open();
                    avisonoeliminar.data("kendoWindow").center();
                }
                else
                {
                    avisonoeliminar.data("kendoWindow").open();
                    avisonoeliminar.data("kendoWindow").center();
                }
                
                
                
            }
        }); 
    }
    else
    {
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admFactura&tarea=eliminarFactura&id_factura='+data.id_factura+'&tipo_factura='+data.tipodosificada,
            success: function (data) {
               // alert(data);
                cerraractualizartab('Mis Facturas','admFactura','verFacturas');
                //actualizamos la tabla inventarios s es que esta abierta

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
        }); 
    }
}
function editarFactura()
{
    
   var gridfactura = $("#misfacturas").data("kendoGrid");
    var row = gridfactura.select();
    var data = gridfactura.dataItem(row); 
    if(data.id_estado_factura==5)
    {
        $.ajax({             
            type: 'post',
            url: 'index.php',
            data: 'opcion=admFactura&tarea=verFacturasDosificadas&id_factura='+data.id_factura,
            success: function (data) { 
                $("#xeliminar").html('editar');
                 $("#xfacturasdp").html(data);
                 if (!$("#avisonoeliminar").data("kendoWindow")) { 
                    avisonoeliminar.kendoWindow({
                        draggable: true,
                        height: "120px",                      
                        width: "320px",
                        resizable: true,
                        actions: [ "Minimize", "Close"],
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
                    avisonoeliminar.data("kendoWindow").open();
                    avisonoeliminar.data("kendoWindow").center();
                }
                else
                {
                    avisonoeliminar.data("kendoWindow").open();
                    avisonoeliminar.data("kendoWindow").center();
                }                
                
                
            }
        }); 
    }
    else
    { 
        cerraractualizartab('Editar Factura Nro. '+data.numero_factura,'admFactura','editarFacturaVista&id_factura='+data.id_factura+'&tipo_factura='+data.tipodosificada);
    }
}
var avisonoeliminar= $("#avisonoeliminar");
//--------------para el button
$("#nuevafactura").kendoButton();
var nuevafactura = $("#nuevafactura").data("kendoButton");
nuevafactura.bind("click", function(e){   
    cerraractualizartab('Factura','admFactura','crearFactura');
});
{/literal}      
</script>