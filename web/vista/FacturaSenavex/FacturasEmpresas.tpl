<div class="row-fluid" class="fadein" >
    <div class="row-fluid  form" >
        <div id="facturas" class="fadein">
        </div>
    </div>
</div>

<script>
{literal}
 $(document).ready(function () {
    $("#facturas").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admProForma&tarea=list_facturas",
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
        change: cambiarceldas,
        columns: [
            { field: "id_factura", title: "ID"},
            { field: "nro_factura", title: "Nro Factura"},
            { field: "nro_ruex", title: "RUEX"},
            { field: "empresa", title: "Empresa"},
            { field: "monto", title: "Monto"},
        ]
    });
}); 

var registro_factura=0;
    
function cambiarceldas()
{
    var grid_oic = $("#facturas").data("kendoGrid");
    var row = grid_oic.select();
    var data = grid_oic.dataItem(row);
    if(registro_factura==data.id_factura)
    {  
        window.open('index.php?opcion=admProForma&tarea=imprimirPDF&id_factura='+data.id_factura, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        //cerraractualizartab("factura",'admDeposito','imprimirPDF&id_factura='+data.id_factura);
        //window.open("index.php?opcion=admDeposito&tarea=imprimirPDF&id_factura="+data.id_factura, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
    }
    else
    {
        registro_factura=data.id_factura;
    }
}
{/literal}
</script>
