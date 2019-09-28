<div class="row-fluid" class="fadein" >
    <div class="row-fluid  form" >
        <div class="span12 fadein" style="text-align: left;">
            <button name="altaddjj" id="altaddjj" class="botonElegir" >Nueva DDJJ</button> 
            <input id="menuddjj" value="1" class="comboElegir" />
        </div>
    </div>
    
    <div class="row-fluid  form" >
        <div id="declaracionesjuradas" class="fadein">
        </div>
    </div>
</div>

<style>
.botonElegir{
    font-size: 10px;
}
.comboElegir{
    font-size: 10px;
}
</style>

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
            { field: "correlativo_ddjj", title: "N° DDJJ"},
            { field: "descripcion_comercial", title: "Descripción Comercial"},
            { field: "detalle_arancel", title: "Clasificación Arancelaria"},
            { field: "caracteristicas", title: "Características"},
            { field: "fecha_registro", title: "Fecha de Registro"},
            { field: "proceso_productivo", title: "Proceso Productivo"},
            { field: 'Opciones',
                template: '<a target="_blank" onclick="clonarDeclaracionJurada(#= id_ddjj #)" class="k-button link">Clonar</a>' },
        ]
    });
 
    var data = [
        { text: "DDJJ Vigentes", value: "1" },
        { text: "DDJJ Enviadas", value: "2" },
        { text: "Con Asesoramiento", value: "3" },
        { text: "DDJJ Rechazadas", value: "4" },
        { text: "DDJJ Para Aprobación", value: "5" },
        { text: "DDJJ Para Corrección", value: "7" },
        { text: "DDJJ Vencidas", value: "6" }
    ];

    // create DropDownList from input HTML element
    $("#menuddjj").kendoDropDownList({
        dataTextField: "text",
        dataValueField: "value",
        dataSource: data,
        index: 1,
        change: onChange
    });

}); 

function onChange() {
    var grid = $("#declaracionesjuradas").data("kendoGrid");
    if(this.value()=='1')
    {
        var dataddjj = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admDeclaracionJurada&tarea=listarDeclaracionesVigentes",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });
        grid.showColumn(0);
        grid.showColumn(6);
    }
    if(this.value()=='2')
    {
        var dataddjj = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admDeclaracionJurada&tarea=listarDeclaracionesEnviadas",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });
        grid.hideColumn(0);
        grid.hideColumn(6);
    }
    if(this.value()=='3')
    {
        var dataddjj = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admDeclaracionJurada&tarea=listarDeclaracionesConAsesoramiento",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });
        grid.hideColumn(0);
        grid.hideColumn(6);
    }
    if(this.value()=='4')
    {
        var dataddjj = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admDeclaracionJurada&tarea=listarDeclaracionesRechazadas",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });
        grid.hideColumn(0);
        grid.hideColumn(6);
    }
    if(this.value()=='5')
    {
        var dataddjj = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admDeclaracionJurada&tarea=listarDeclaracionesParaAprobar",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });
        grid.hideColumn(0);
        grid.hideColumn(6);
    }
    if(this.value()=='6')
    {
        var dataddjj = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admDeclaracionJurada&tarea=listarDeclaracionesPasadas",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });
        grid.showColumn(0);
        grid.showColumn(6);
    }
    if(this.value()=='7')
    {
        var dataddjj = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admDeclaracionJurada&tarea=listarDeclaracionesParaCorregir",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });
        grid.hideColumn(0);
        grid.hideColumn(6);
    }
    grid.setDataSource(dataddjj);
    grid.refresh();
};

function clonarDeclaracionJurada(id_ddjj){
    anadir('Nueva DDJJ','admDeclaracionJurada','clonarDeclaracionJurada&id_declaracion_jurada='+id_ddjj);
}

var registroddjj=0;
    
function cambiarceldasddjj()
{  
    var gridddjj = $("#declaracionesjuradas").data("kendoGrid");
    var row = gridddjj.select();
    var data = gridddjj.dataItem(row);
    
    var comboddjj = $("#menuddjj").val();

    if(registroddjj==data.id_ddjj)
    {
        switch(comboddjj){
            case '3':
                anadir("Ver DDJJ",'admDeclaracionJurada','editarDeclaracionJurada&id_declaracion_jurada='+data.id_ddjj);
                break;
            case '5':
                anadir("Aprobar",'admDeclaracionJurada','mostrarDdjjParaAprobacion&id_declaracion_jurada='+data.id_ddjj);
                break;
            case '7':
                anadir("Ver DDJJ",'admDeclaracionJurada','corregirDeclaracionJurada&id_declaracion_jurada='+data.id_ddjj);
                break;
            default:
                anadir('Ver DDJJ','admDeclaracionJurada','mostrardeclaracion&id_declaracion_jurada='+data.id_ddjj);
                break;
        }
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
    anadir('Nueva DDJJ','admDeclaracionJurada','altadeclaracionjurada');
});
{/literal}
</script>
