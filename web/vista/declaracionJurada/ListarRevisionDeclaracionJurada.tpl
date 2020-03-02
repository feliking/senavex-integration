<div class="row-fluid" class="fadein" id="revisarDeclaracionesWrapper">
    <div class="row-fluid  form" >
        <div class="span12 fadein form-options">
            <input id="revisarmenuddjj" value="1" class="form-small" />
        </div>
    </div>
    <div class="row-fluid  form" >
        <div id="revisardeclaracionesjuradas" class="fadein">
            
        </div>
    </div>
</div>

<script>
{literal}
 $(document).ready(function () {    
    $("#revisarDeclaracionesWrapper #revisardeclaracionesjuradas").kendoGrid({
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
            { field: "ruex", title: "Nº RUEX"},
            { field: "descripcion_comercial", title: "Descripción Comercial"},
            { field: "denominacion", title: "Clasificación Arancelaria"},
            { field: "caracteristicas", title: "Características"},
            { field: "fecha_registro", title: "Fecha de Registro"},
            { field: "estadoddjj", title: "Estado"}
        ]
    });
    {/literal}
     var data = [
         {foreach $estados as $estado}
         { text: "{$estado->descripcion}", value: "{$estado->id_estado_ddjj}" },
         {/foreach}
     ];
     {literal}
     // create DropDownList from input HTML element
     $("#revisarDeclaracionesWrapper #revisarmenuddjj").kendoDropDownList({
         dataTextField: "text",
         dataValueField: "value",
         dataSource: data,
         index: 1,
         change: onChange
     });

     function onChange() {
         var grid = $("#revisarDeclaracionesWrapper #revisardeclaracionesjuradas").data("kendoGrid");
         var dataddjj = new kendo.data.DataSource({
             transport: {
                 read: {
                     url: "index.php?opcion=admDeclaracionJurada&tarea=listarRevisionDeclaraciones&estado_ddjj="+this.value(),
                     dataType: "json"
                 }
             }
             ,
             pageSize: 10
         });
         grid.setDataSource(dataddjj);
         grid.refresh();
     };
}); 

var registroddjj=0;
    
function cambiarceldasddjj()
{  
    var gridddjj = $("#revisarDeclaracionesWrapper #revisardeclaracionesjuradas").data("kendoGrid");
    var row = gridddjj.select();
    var data = gridddjj.dataItem(row);
    if(registroddjj==data.id_ddjj)
    {
        if(data.estadoddjj== 'Para pagar') {
            anadir('Revisar Documentos DD.JJ.','admDeclaracionJurada','reviewDocumentsDeclaracion&id_declaracion_jurada='+data.id_ddjj);
        } else {
            anadir('Revisar DD.JJ.','admDeclaracionJurada','reviewDeclaracion&id_declaracion_jurada='+data.id_ddjj);
        }
    }
    else
    {
        registroddjj=data.id_ddjj;
    }
}
{/literal}
</script>
