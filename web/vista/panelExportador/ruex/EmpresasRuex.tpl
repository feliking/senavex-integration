<div class="row-fluid  form" >
    <div id="empresasruex" class="fadein"></div>
</div>    
 <script>
 var empresasruex = [
{foreach $empresasruex as $empresaruex} 
{
    id_empresa:"{$empresaruex->id_empresa}",
    razonsocial :"{$empresaruex->razon_social}",
    ruex : "{$empresaruex->ruex}",
    vigencia :"{$empresaruex->vigencia}",
    fecharenovacion:"{$empresaruex->fecha_renovacion_ruex}"
    
},
{/foreach}       
];
{literal}
 $(document).ready(function () {    
    $("#empresasruex").kendoGrid({
        dataSource: {
            data: empresasruex,
            schema: {
                model: {
                    fields: {
                        razonsocial: { type: "string" },
                        ruex: { type: "string" },
                        vigencia: { type: "string" },
                        fecharenovacion: { type: "date" }
                        
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
                            { field: "razonsocial", title: "Razon Social" },
                            { field: "ruex", title: "Ruex"},
                            { field: "vigencia", title: "Vigencia"},
                            { field: "fecharenovacion", title: "Fecha de Vigencia",format: "{0:MM/dd/yyyy}",filterable: {
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
           anadir({/literal}data.razonsocial{literal},'admEmpresa','empresaruex&id_empresa='+data.id_empresa);
        }
        else
        {
            registroruex=data.id_empresa;
        }
    }
    
{/literal}      
</script>
       