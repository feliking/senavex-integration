<div class="row-fluid" class="fadein" >
    <div class="row-fluid  form" >
        <div id="declaracionesjuradas" class="fadein">
            
        </div>
    </div>
    <div class="row-fluid  form" >
        <div class="span4" ></div>
        <div class="span2 fadein">
            <input id="altaddjj" type="button" value="Nueva Declaración Jurada" class="k-primary" style="width:100%"/> 
        </div>
        <div class="span2 fadein">
            <input id="ddjjpasadas" type="button" value="DDJJ Pasadas" class="k-primary" style="width:100%"/> 
        </div>
        <div class="span4" ></div>
    </div>
</div>

<script>
{literal}
 $(document).ready(function () {    
    $("#declaracionesjuradas").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admDeclaracionJurada&tarea=listarDeclaracionesVigentes",
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
    var gridddjj = $("#declaracionesjuradas").data("kendoGrid");
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
/************esto es para los botones *********************************************/

$("#altaddjj").kendoButton();
var altaddjj = $("#altaddjj").data("kendoButton");
altaddjj.bind("click", function(e){   
    anadir('Nueva Declaración Jurada','admDeclaracionJurada','altadeclaracionjurada');
});

$("#ddjjpasadas").kendoButton();
var ddjjpasadas = $("#ddjjpasadas").data("kendoButton");
ddjjpasadas.bind("click", function(e){   
    anadir('Declaraciones Juradas Pasadas','admDeclaracionJurada','declaracionesJuradasPasadas');
});
{/literal}
</script>
