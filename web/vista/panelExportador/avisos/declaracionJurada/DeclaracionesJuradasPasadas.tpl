<div class="row-fluid" class="fadein" >
    <div class="row-fluid form" >
    <div id="declaracionesjuradaspasadas" class="fadein"></div>
    </div>
</div>

<script>
{literal}
 $(document).ready(function () {    
    $("#declaracionesjuradaspasadas").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admDeclaracionJurada&tarea=listarDeclaracionesPasadas",
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
            buttonCount: 5
        },
        change: cambiarceldasddjj,
        columns: [
            { field: "descripcion_comercial", title: "Descripción Comercial"},
            { field: "detalle_arancel", title: "Detalle Arancel"},
            { field: "acuerdo", title: "Acuerdo"},
            { field: "criterio_origen", title: "Criterio de Origen"},
            { field: "fecha_registro", title: "Fecha de Registro"},
            { field: "unidad_medida", title: "Unidad de Medida",filterable: false}
        ]
    });
}); 

var registroddjj=0;
    
function cambiarceldasddjj()
{  
    var gridddjj = $("#declaracionesjuradaspasadas").data("kendoGrid");
    var row = gridddjj.select();
    var data = gridddjj.dataItem(row);
    if(registroddjj==data.id_ddjj)
    {  
        anadir({/literal}data.id_ddjj{literal},'admDeclaracionJurada','mostrardeclaracion&id_declaracion_jurada='+data.id_ddjj);
    }
    else
    {
        registroddjj=data.id_ddjj;
    }
}
{/literal}
</script>
       