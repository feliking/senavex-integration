<div class="row-fluid" class="fadein" >
    <div class="row-fluid  form" >
        <div class="span12 fadein" style="text-align: left;">
            <button name="nuevoco" id="nuevoco" class="botonElegir">Nueva Emisión</button> 
            <input id="menuco" value="1" class="comboElegir" />
        </div>
    </div>
    
    <div class="row-fluid  form" >
        <div id="certificadosorigen" class="fadein">
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
 $(document).ready(function (){
    $("#certificadosorigen").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admCertificado&tarea=listarCertificadosOrigenVigentes",
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
        change: cambiarceldasco,
        columns: [
            { field: "correlativo", title: "N° Certificado"},
            { field: "tipo_co", title: "Tipo de C.O."},
            { field: "acuerdo", title: "Acuerdo"},
            { field: "pais", title: "País de Destino"},
            { field: "fecha_llenado", title: "Fecha de Emisión", hidden: true},
            { field: "fecha_emision", title: "Fecha de Emisión"},
            { field: "fecha_fin", title: "Fecha de Fin"},
            { field: "valor_fob_total", title: "Valor Total ($us)", hidden: true},
            { field: "observaciones", title: "Motivo de Rechazo", hidden: true},
            { field: 'Opciones',
                //template: '<a target="_blank" href="index.php?opcion=imprimirCertificado&tarea=imprimirCertificadoOrigenBlanco&id_certificado_origen=#= id_certificado_origen #" class="k-button link">Imprimir</a>\n\
                template: '<a target="_blank" href="index.php?opcion=imprimirCertificado&tarea=imprimirCertificadoOrigen&id_certificado_origen=#= id_certificado_origen #" class="k-button link">Imprimir</a>\n\
                           <a target="_blank" onclick="anularCertificado(#= id_certificado_origen #)" class="k-button link">Anular</a>' },
            { field: 'Opciones',
                template: '<a target="_blank" href="index.php?opcion=imprimirCertificado&tarea=imprimirCertificadoOrigenExportador&id_certificado_origen=#= id_certificado_origen #" class="k-button link">Imprimir</a>', hidden: true }
        ]
    });
    
    var data = [
        { text: "C.O. Vigentes", value: "1" },
        { text: "C.O. Enviados", value: "2" },
        { text: "C.O. Rechazados", value: "3" },
        { text: "C.O. Vencidos", value: "4" },
        { text: "C.O. Anulados", value: "5" },
        { text: "C.O. Para Corrección", value: "6" }
    ];

    // create DropDownList from input HTML element
    $("#menuco").kendoDropDownList({
        dataTextField: "text",
        dataValueField: "value",
        dataSource: data,
        index: 1,
        change: onChange
    });
});

function onChange() {
    var grid = $("#certificadosorigen").data("kendoGrid");
    if(this.value()=='1')
    {
        var dataco = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admCertificado&tarea=listarCertificadosOrigenVigentes",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });
        grid.showColumn(0);
        grid.hideColumn(4);
        grid.showColumn(5);
        grid.showColumn(6);
        grid.hideColumn(7);
        grid.hideColumn(8);
        grid.showColumn(9);
        grid.hideColumn(10);
    }
    if(this.value()=='2')
    {
        var dataco = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admCertificado&tarea=listarCertificadosOrigenEnviados",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });
        grid.hideColumn(0);
        grid.showColumn(4);
        grid.hideColumn(5);
        grid.hideColumn(6);
        grid.showColumn(7);
        grid.hideColumn(8);
        grid.hideColumn(9);
        grid.showColumn(10);
    }
    if(this.value()=='3')
    {
        var dataco = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admCertificado&tarea=listarCertificadosOrigenRechazados",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });
        grid.hideColumn(0);
        grid.showColumn(4);
        grid.hideColumn(5);
        grid.hideColumn(6);
        grid.showColumn(7);
        grid.showColumn(8);
        grid.hideColumn(9);
        grid.hideColumn(10);
    }
    if(this.value()=='4')
    {
        var dataco = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admCertificado&tarea=listarCertificadosOrigenPasados",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });
        grid.showColumn(0);
        grid.hideColumn(4);
        grid.showColumn(5);
        grid.showColumn(6);
        grid.showColumn(7);
        grid.hideColumn(8);
        grid.hideColumn(9);
        grid.hideColumn(10);
    }
    if(this.value()=='5')
    {
        var dataco = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admCertificado&tarea=listarCertificadosOrigenAnulados",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });
        grid.showColumn(0);
        grid.hideColumn(4);
        grid.showColumn(5);
        grid.showColumn(6);
        grid.hideColumn(7);
        grid.hideColumn(8);
        grid.hideColumn(9);
        grid.hideColumn(10);
    }
    if(this.value()=='6')
    {
        var dataco = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admCertificado&tarea=listarCertificadosOrigenParaCorreccion",
                   dataType: "json"
                }
            }
            ,
        pageSize: 10
        });
        grid.hideColumn(0);
        grid.showColumn(4);
        grid.hideColumn(5);
        grid.hideColumn(6);
        grid.showColumn(7);
        grid.showColumn(8);
        grid.hideColumn(9);
        grid.hideColumn(10);
    }
    grid.setDataSource(dataco);
    grid.refresh();
};

var registroco=0;
    
function cambiarceldasco(){  
    var gridco = $("#certificadosorigen").data("kendoGrid");
    var row = gridco.select();
    var data = gridco.dataItem(row);
    
    var comboco = $("#menuco").val();
    
    if(registroco==data.id_certificado_origen)
    {  
        //anadir('Ver C.O.','admCertificado','mostrarCertificado&id_certificado_origen='+data.id_certificado_origen);
        switch(comboco){
            case '6':
                anadir('Ver C.O.','admCertificado','editarCertificadoOrigen&id_certificado_origen='+data.id_certificado_origen);
                break;
            case '1':
                //anadir('Ver C.O.','admCertificado','editarCertificadoOrigen&id_certificado_origen='+data.id_certificado_origen);
                break;
            default:
                anadir('Ver C.O.','admCertificado','mostrarCertificado&id_certificado_origen='+data.id_certificado_origen);
                break;
        }
    }
    else
    {
        registroco=data.id_certificado_origen;
    }
}

function anularCertificado(id_certificado_origen){
    anadir('Ver C.O.','admCertificado','mostrarCertificado&anular=1&id_certificado_origen='+id_certificado_origen);
}

/************esto es para los botones *********************************************/

$("#nuevoco").kendoButton();
var nuevoco = $("#nuevoco").data("kendoButton");
nuevoco.bind("click", function(e){   
    anadir('Nuevo C.O.','admCertificado','nuevoCertificadoOrigen');
});

{/literal}
</script>
