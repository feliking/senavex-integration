<div class="row-fluid" class="fadein" >
    <div class="row-fluid  form" >
        <div id="certificadosorigenenviados" class="fadein">
        </div>
    </div>
</div>

<script>
{literal}
 $(document).ready(function (){
    $("#certificadosorigenenviados").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admCertificado&tarea=listarCertificadosOrigenEnviados",
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
            { field: "tipo_co", title: "Tipo de C.O."},
            { field: "acuerdo", title: "Acuerdo"},
            { field: "pais", title: "País de Destino"},
            { field: "fecha_llenado", title: "Fecha de Llenado"},
            { field: "valor_fob_total", title: "Valor Total ($us)"}
        ]
    });
});

var registroco=0;
    
function cambiarceldasco()
{  
    var gridco = $("#certificadosorigenenviados").data("kendoGrid");
    var row = gridco.select();
    var data = gridco.dataItem(row);
    if(registroco==data.id_certificado_origen)
    {  
        anadir('Ver C.O.','admCertificado','mostrarCertificado&id_certificado_origen='+data.id_certificado_origen);
    }
    else
    {
        registroco=data.id_certificado_origen;
    }
}
{/literal}
</script>
