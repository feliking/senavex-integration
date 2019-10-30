<div class="row-fluid" class="fadein" >
    <div class="row-fluid  header-menu fadein" >
        <div class="span12">
            <div class="header-menu-title">Aranceles</div>
            <div class="header-menu-item">
                <button class="botonElegir float-l" onclick="nuevo_arancel()">Nuevo Arancel</button>
            </div>
        </div>
    </div>
    <div class="row-fluid  form" >
        <div id="aranceles" class="fadein">
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    $("#aranceles").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "index.php?opcion=admArancel&tarea=listarAranceles",
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
        columns: [
            { field: "denominacion", title: "Denominación" },
            { field: "gestion_publicacion", title: "Gestión" },
            { field: "activo", title: "Estado" },
            { field: 'Opciones', width:240,filterable:false,
//            template: '<div onclick="seeArancel(#= id_arancel #)" class="k-button link">Ver</div># if (editable) { #<div onclick="editArancel(#= id_arancel #)" class="k-button link">Editar</div># } ## if (activo_boolean) { #<div onclick="desactivarArancel(#= id_arancel #)" class="k-button link">Desactivar</div># } #'}
            template: '<div onclick="seeArancel(#= id_arancel #)" class="k-button link">Ver</div><div onclick="editArancel(#= id_arancel #)" class="k-button link">Editar</div># if (activo_boolean) { #<div onclick="desactivarArancel(#= id_arancel #)" class="k-button link">Eliminar</div># } #'}
        ]
    });

});
function nuevo_arancel() {
    cerrarDemas('Arancel','Aranceles');
    cerrarDemas('Nuevo Arancel','Aranceles');
    anadir('Nuevo Arancel','admArancel','formArancel');
}
function seeArancel(id_arancel) {
    var tabla_aranceles=$("#aranceles").data("kendoGrid");
    var row = tabla_aranceles.select();
    var data = tabla_aranceles.dataItem(row);
    anadir(data.denominacion,'admArancel','arancel&id_arancel='+id_arancel);
}
function editArancel(id_arancel) {
    var tabla_aranceles=$("#aranceles").data("kendoGrid");
    var row = tabla_aranceles.select();
    var data = tabla_aranceles.dataItem(row);
    cerrarDemas('Arancel','Aranceles');
    cerrarDemas('Nuevo Arancel','Aranceles');
    anadir('Arancel '+data.denominacion,'admArancel','formArancel&id_arancel='+id_arancel);
}
function desactivarArancel(id_arancel) {
    var tabla_aranceles=$("#aranceles").data("kendoGrid");
    var row = tabla_aranceles.select();
    var data = tabla_aranceles.dataItem(row);
    if(confirm('Esta seguro de Eliminar el Arancel '+data.denominacion+' no se podra crear mas declaraciones con este arancel')){
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admArancel&tarea=desactivarArancel&id_arancel='+id_arancel,
            success: function (data) {
                var data = JSON.parse(data);
                if(+data.status)
                {
                    fadeMessage('Se elimino el arancel correctamente');
                    cerraractualizartab('Aranceles','admArancel','aranceles');
                }
            }
        });
    }
}
</script>
