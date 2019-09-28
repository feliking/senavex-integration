<div class="row-fluid  form" >
    <div id="empresasruex" class="fadein"></div>
</div>    
 <script>
 var empresasruex = {$empresasruex};
{literal}
 $(document).ready(function () {    
    $("#empresasruex").kendoGrid({
        dataSource: {
            data: empresasruex,
            schema: {
                model: {
                    fields: {
                        razon_social: { type: "string" },
                        ruex: { type: "string" },
                        nit: { type: "string" },
                        vigencia: { type: "string" },
                        fecha_renovacion_ruex: { type: "date" }
                        
                    }
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
                            buttonCount: 10
                        },
        change: cambiarceldasruex,
        columns: [
                            { field: "razon_social", title: "Razon Social" },
                            { field: "ruex", title: "Ruex"},
                            { field: "nit", title: "Nit"},
                            { field: "vigencia", title: "Vigencia"},
                            { field: "fecha_renovacion_ruex", title: "Fecha de Vigencia",format: "{0:MM/dd/yyyy}",filterable: {
                                    ui: "datepicker"
                                }}
                            
            ]
        });
    }); 
    var registroruex=0;
   function cambiarceldasruex()
    {  
        var gridruex = $("#empresasruex").data("kendoGrid");
        var row = gridruex.select();
        var data = gridruex.dataItem(row);
        if(registroruex==data.id_empresa)
        {         
           anadir({/literal}data.razon_social{literal},'admEmpresa','empresaruex&id_empresa='+data.id_empresa);
        }
        else
        {
            registroruex=data.id_empresa;
        }
    }
    
{/literal}      
</script>
       