<div class="row-fluid  form" >
    <div class="span12 fadein" style="text-align: left;">
        <input id="compoApis1" value="1" class="botonElegir"/>
    </div>
</div>
<div class="row-fluid  form" >
    <div id="listadoapis" class="fadein"></div>
</div>    
 <script>
{literal} 
var grid3 =  $("#listadoapis").kendoGrid({
    dataSource: {
        transport: {
            read: {
               url: "index.php?opcion=admRegistroApi&tarea=ListarApis&tipo=1",
               dataType: "json"
            }
        },
        pageSize: 30
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
    change: cambiarceldasadmision,
    columns: [
        { field: "correlativo", title: "Nro. Solicitud", width: '8%', },
        { field: "fecha_registro", title: "Fecha de registro",filterable: false, width: '10%', },
        { field: "razonsocial", title: "Razon Social", width: '25%', },
        { field: "nit", title: "Nit", width: '14%',},
        { field: "cantidad", title: "Cantidad Total", width: '14%',},
        { field: "peso", title: "Peso Total", width: '14%',},
        { field: "valor", title: "Valor Total", width: '14%', },
        { field: "Opciones", template: '<a target="_blank" href="index.php?opcion=ImpresionCertificadoApi&tarea=ImpresionCertificadoApi&id_autorizacionPrevia=#= id_api #" class="k-button link">CERTIFICADO</a>' }
    ]
});
var registroadmision=0;
function cambiarceldasadmision()
{  
    var gridadmision = $("#listadoapis").data("kendoGrid");
    var row = gridadmision.select();
    var data = gridadmision.dataItem(row);
    if(registroadmision==data.id_empresa)
    {   
       if(data.estado=='0' || data.estado=='1' || data.estado=='4' || data.estado=='6' || data.estado=='14') 
       {
            cerraractualizartab({/literal}data.razonsocial{literal},'admRegistroApi','asignacionrui&id_empresa='+data.id_empresa+'&revisar=1');
       }
    }
    else
    {
        registroadmision=data.id_empresa;
    }
}
var estadosadmision = [
    { text: "Empresas Nuevas", value: "1" },
    //{ text: "Empresas Observadas", value: "0" },
    //{ text: "Modificacion", value: "2" },
    //{ text: "Modificacion Observada", value: "3" },
    //{ text: "Renovación", value: "4" },
    //{ text: "Renovación Observada", value: "5" }
];
var dropDown3 = $("#compoApis1").kendoDropDownList({
    dataTextField: "text",
    dataValueField: "value",
    dataSource: estadosadmision,
    index: "1",
    change : function (e) {
        var grid = $("#admision").data("kendoGrid");
        
        var dataadmision= new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admEmpresa&tarea=ListarEmpresasPorEstado&tipo="+this.value(),
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
{/literal}      
</script>
       