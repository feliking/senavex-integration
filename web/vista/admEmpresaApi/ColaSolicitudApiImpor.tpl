<div class="row-fluid  form" >
    <div class="span12 fadein" style="text-align: left;">
        <button name="altaApi" id="altaApi" class="k-button form-small" onclick="cerraractualizartab('Nueva API','admRegistroApi','mostrarapi')">Nueva API</button>
        <!--input id="ApiRegistradas" value="1" class="botonElegir"/-->
    </div>
</div>
<div class="row-fluid  form" >
    <div id="admision" class="fadein"></div>
</div>  
 <script>
{literal} 
    
$("#altaApi").kendoButton();
var estadosadmision = [
    { text: "Solicitudes pendientes", value: "1" },
    //{ text: "Solicitudes Observadas", value: "0" },
    //{ text: "Solicitudes", value: "2" },
    //{ text: "Solicitudes Observada", value: "3" },
    //{ text: "Solicitudes", value: "4" },
    //{ text: "Solicitudes Observada", value: "5" }
];
var dropDown3 = $("#ApiRegistradas").kendoDropDownList({
    dataTextField: "text",
    dataValueField: "value",
    dataSource: estadosadmision,
    index: "1",
    change : function (e) {
        var grid = $("#admision").data("kendoGrid");
        
        var dataadmision= new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=AdmAutorizacionPrevia&tarea=ListarApiPorEstado&id_estado=1",
                   dataType: "json"
                }
            }
            ,
        pageSize: 20
        });

        grid.setDataSource(dataadmision);
        grid.refresh();
    }
});

var grid3 =  $("#admision").kendoGrid({
    dataSource: {
        transport: {
            read: {
               url: "index.php?opcion=admAutorizacionPrevia&tarea=ListarApiPorEstado&id_estado=1",
               dataType: "json"
            }
        },
        pageSize: 10
    },
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
    pageable: {
        refresh: true,
        pageSizes: true,
        buttonCount: 10
    },
    //change: cambiarceldasadmision,
    columns: [
        { field: "correlativo", title: "Nro. Solicitud", width: '10%', },
        { field: "fecha_registro", title: "Fecha de registro",filterable: false, width: '12%', },
        { field: "pais_procedencia", title: "Pais de Procedencia", width: '15%', },
        { field: "recursos", title: "Origen de recursos para la adquisicion", width: '30%',},
        { field: "estado", title: "Estado", width: '20%',},
        { field: "Opciones", template: '<a target="_blank" href="index.php?opcion=ImpresionApi&tarea=ImpresionApi&id_autorizacion=#= id_autorizacion #" class="k-button link">Imprimir</a>' }
    ]
});

{/literal}      
</script>