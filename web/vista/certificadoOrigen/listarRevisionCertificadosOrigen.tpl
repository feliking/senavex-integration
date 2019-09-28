<div class="row-fluid" class="fadein" >
    <div class="row-fluid  form" >
        <div id="listarrevisionco" class="fadein">
        </div>
    </div>
    <!--
    <div class="row-fluid  form" >
        <div class="span" ></div>
        <div class="span2 fadein">
            <input id="impresion_co" type="button" value="Impresión de C.O." class="k-primary" style="width:100%"/> 
        </div>
    </div>
    -->
</div>

<script>
{literal}
 $(document).ready(function (){
    $("#listarrevisionco").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admCertificado&tarea=listarRevisionCertificados",
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
            { field: "id_co", hidden: true},
            { field: "estado_co", title: "Estado"},
            { field: "tipo_co", title: "Tipo de C.O."},
            { field: "empresa", title: "Empresa"},
            { field: "pais", title: "País de Destino"},
            { field: "valor_fob", title: "Total FOB ($us)"},
            { field: "fecha_llenado", title: "Fecha de Envío"}
        ]
    });
});

var registroco=0;

function cambiarceldasddjj()
{  
    var gridddjj = $("#listarrevisionco").data("kendoGrid");
    var row = gridddjj.select();
    var data = gridddjj.dataItem(row);
    if(registroco==data.id_certificado_origen)
    {  
        anadir('Revisar C.O.','admCertificado','revisarCertificadoOrigen&id_certificado_origen='+data.id_certificado_origen);
    }
    else
    {
        registroco=data.id_certificado_origen;
    }
}
/*
$("#impresion_co").kendoButton();
var impresion_co = $("#impresion_co").data("kendoButton");
impresion_co.bind("click", function(e){   
    anadir('Entregar C.O.','admCertificado','entregaCertificado');
});
*/
{/literal}
</script>
