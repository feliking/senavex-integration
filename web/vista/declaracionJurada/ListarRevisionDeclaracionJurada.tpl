<div class="row-fluid" class="fadein" >
    <div class="row-fluid  form" >
        <div id="revisardeclaracionesjuradas" class="fadein">
            
        </div>
    </div>
</div>

<script>
{literal}
 $(document).ready(function () {    
    $("#revisardeclaracionesjuradas").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admDeclaracionJurada&tarea=listarRevisionDeclaraciones",
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
            { field: "denominacion", title: "Clasificación Arancelaria"},
            { field: "caracteristicas", title: "Características"},
            { field: "fecha_registro", title: "Fecha de Registro"},
            { field: "estadoddjj", title: "Estado"}
        ]
    });
}); 

var registroddjj=0;
    
function cambiarceldasddjj()
{  
    var gridddjj = $("#revisardeclaracionesjuradas").data("kendoGrid");
    var row = gridddjj.select();
    var data = gridddjj.dataItem(row);
    if(registroddjj==data.id_ddjj)
    {  
        anadir('Revisar DD.JJ.','admDeclaracionJurada','reviewDeclaracion&id_declaracion_jurada='+data.id_ddjj);
    }
    else
    {
        registroddjj=data.id_ddjj;
    }
}
{/literal}
</script>
