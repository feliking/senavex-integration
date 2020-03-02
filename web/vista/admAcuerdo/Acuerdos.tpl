<div class="row-fluid" class="fadein" >
    <div class="row-fluid  header-menu fadein" >
        <div class="span12">
            <div class="header-menu-title">Acuerdos y/o Regimenes Preferenciales</div>
            <div class="header-menu-item">
                <button name="nuevoAcuerdoBtn" id="nuevoAcuerdoBtn" class="botonElegir float-l" >Nuevo Acuerdo</button>
                {*<input id="menuddjj" value="1" class="comboElegir" />*}
            </div>
        </div>
    </div>
    <div class="row-fluid  form" >
        <div id="acuerdos" class="fadein">
        </div>
    </div>
</div>
<script>

{literal}

$(document).ready(function () {
    $("#acuerdos").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "index.php?opcion=admAcuerdo&tarea=listarAcuerdosSinNinguno",
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
            {field: "sigla", title: "Sigla"},
            {field: "descripcion", title: "Denominación"},
            {field: "tipo_acuerdo", title: "Tipo Acuerdo",filterable:false},
            {field: "id_estado_acuerdo", title: "Estado",filterable:false,editor: estadoDropDownEditor, template: "#=estado_acuerdo#",width:"200px"},
            {field: 'Opciones', width:240,filterable:false,
                template: '<div onclick="seeAcuerdo(#= id_acuerdo #)" class="k-button link">Ver</div><div onclick="editAcuerdo(#= id_acuerdo #)" class="k-button link">Editar</div><div onclick="anularAcuerdo(#= id_acuerdo #)" class="k-button link">Anular</div>'},
        ]
    });
    $("#nuevoAcuerdoBtn").kendoButton({
        click: function () {
            cerrarDemas('Acuerdo','Acuerdos');
            cerrarDemas('Nuevo Acuerdo','Acuerdos');
            anadir('Nuevo Acuerdo','admAcuerdo','formAcuerdo');
        }
    });
    function estadoDropDownEditor(container,options) {
        $('<input required name="' + options.field + '"/>')
                .appendTo(container)
                .kendoDropDownList({
                    autoBind: false,
                    dataTextField: "CategoryName",
                    dataValueField: "CategoryID",
                });
    }
});

function seeAcuerdo(id_acuerdo) {
    var tabla_acuerdos=$("#acuerdos").data("kendoGrid");
    var row = tabla_acuerdos.select();
    var data = tabla_acuerdos.dataItem(row);
    anadir(data.descripcion,'admAcuerdo','acuerdo&id_acuerdo='+id_acuerdo);
}
function editAcuerdo(id_acuerdo) {
    var tabla_acuerdos=$("#acuerdos").data("kendoGrid");
    var row = tabla_acuerdos.select();
    var data = tabla_acuerdos.dataItem(row);
    cerrarDemas('Acuerdo','Acuerdos');
    cerrarDemas('Nuevo Acuerdo','Acuerdos');
    anadir('Acuerdo '+data.descripcion,'admAcuerdo','formAcuerdo&id_acuerdo='+id_acuerdo);
}
function anularAcuerdo(id_acuerdo) {
    var tabla_acuerdos=$("#acuerdos").data("kendoGrid");
    var row = tabla_acuerdos.select();
    var data = tabla_acuerdos.dataItem(row);
    if(confirm('Esta seguro de Anular el '+data.descripcion+' no se podra crear mas declaraciones con este acuerdo')){
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admAcuerdo&tarea=anularAcuerdo&id_acuerdo='+id_acuerdo,
            success: function (data) {
                var data = JSON.parse(data);
                if(+data.status)
                {
                    fadeMessage('Se anulo el acuerdo correctamente');
                    cerraractualizartab('Acuerdos','admAcuerdo','acuerdos');
                }
            }
        });
    }
}
{/literal}
</script>
