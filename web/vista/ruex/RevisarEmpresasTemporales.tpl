<div class="row-fluid fadein"  id="empresastemporales" >
    <div class="span12" >
        <div id="grid" ></div>
    </div>
    
</div>
<script>
 var products = [
{section name=empresa_temporal loop=$registros_empresa_temporal}	
{
    id_empresa:"{$registros_empresa_temporal[empresa_temporal].id_empresa}",
    razonsocial :"{$registros_empresa_temporal[empresa_temporal].razon_social}",
    ruex : "{$registros_empresa_temporal[empresa_temporal].nit}",
    vigencia : "{$registros_empresa_temporal[empresa_temporal].vigencia}",
    estado : "{$registros_empresa_temporal[empresa_temporal].estado}"
},
{/section}
];
{literal}
 $(document).ready(function () {    
    $("#grid").kendoGrid({
        dataSource: {
            data: products,
            schema: {
                model: {
                    fields: {
                        razonsocial: { type: "string" },
                        vigencia: { type: "string" },
                        ruex: { type: "string" },
                        estado: { type: "string" }
                    }
                }
            }
        },
        sortable: true,
        scrollable: false,
        selectable: "simple",
        reorderable: true,
        resizable: true,
        change: cambiarceldas,
        columns: [
                            { field: "razonsocial", title: "Razon Social" },
                            { field: "ruex", title: "Nit"},
                            { field: "vigencia", title: "Vigencia",hidden:true},
                            { field: "estado", title: "Estado" },
            ]
        });
    }); 
    var registro=0;
   function cambiarceldas()
    {  
        var grid = $("#grid").data("kendoGrid");
        var row = grid.select();
        var data = grid.dataItem(row);
        if(registro==data.id_empresa)
        {          
            // anadir('Revisar Empresa','admEmpresa','asignarruex&id_empresa='+data.id_empresa);
            anadir({/literal}data.razonsocial{literal},'admEmpresa','asignarruex&id_empresa='+data.id_empresa);
        }
        else
        {
            registro=data.id_empresa;
        }
    }
{/literal}
</script>
