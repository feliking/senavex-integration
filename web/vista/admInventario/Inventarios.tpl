<div class="row-fluid  form" >
    <div id="inventario" class="fadein"></div>
    
</div>  
 <script>
{literal} 
 $(document).ready(function () {    
    $("#inventario").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admInventario&tarea=inventario",
                   dataType: "json"
                }
            },
            pageSize: 10
        },
        pageable: {},
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
        columns: [
            { field: "descripcion", title: "Descripcion"},
            { field: "tipodescripcion", title: "Tipo Factura",width: 40},
            { field: "numero_factura", title: "Numero de Factura",width: 20},
            { field: "cantidad", title: "Saldo",filterable: false},
            { field: "utilizado", title: "Estado"},
        ]
    });
}); 
{/literal}      
</script>