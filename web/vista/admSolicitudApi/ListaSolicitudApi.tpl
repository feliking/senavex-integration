<div class="row-fluid  form" >
    <div class="span12 fadein" style="text-align: left;">
        <!-- <button name="altaApi" id="altaApi" class="k-button form-small" onclick="cerraractualizartab('Nueva API','admRegistroApi','mostrarapi')">Nueva API</button> -->
        <input id="ApiRegistradas" value="1" class="botonElegir">
    </div>
</div>
<div class="row-fluid  form" >
    <div id="sol_admision" class="fadein"></div>
</div>  
 <script>
{literal} 
    
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
        var grid = $("#sol_admision").data("kendoGrid");
        
        var dataadmision= new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=AdmAutorizacionPrevia&tarea=ListarApiPorEstado&id_estado=1",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });

        grid.setDataSource(dataadmision);
        grid.refresh();
    }
});

var grid3 =  $("#sol_admision").kendoGrid({
    dataSource: {
        transport: {
            read: {
               url: "index.php?opcion=admAutorizacionPrevia&tarea=ListaSolicitudApi",
               dataType: "json"
            }
        },
        pageSize: 50
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
        buttonCount: 50
    },
    change: cambiarvistarevisa,
    columns: [
        { field: "correlativo", title: "Nro. Solicitud", width: '10%', },
        { field: "fecha_registro", title: "Fecha de registro",filterable: false, width: '12%', },
        { field: "pais_procedencia", title: "Pais de Procedencia", width: '15%', },
        { field: "recursos", title: "Origen de recursos para la adquisicion", width: '30%',},
        { field: "estado", title: "Estado", width: '20%',}
    ]
});
var registrosol=0;
function cambiarvistarevisa()
{  
    var gridsol = $("#sol_admision").data("kendoGrid");
    var row = gridsol.select();
    var data = gridsol.dataItem(row);
    if(registrosol==data.id_autorizacion)
    {   
        cerraractualizartab({/literal}data.correlativo{literal},'admAutorizacionPrevia','revisa&id_autorizacion='+data.id_autorizacion+'&revisar=1');
    }
    else
    {
        registrosol=data.id_autorizacion;
    }
}

{/literal}      
</script>