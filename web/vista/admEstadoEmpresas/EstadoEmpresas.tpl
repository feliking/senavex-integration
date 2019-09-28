<div class="row-fluid  form" > 
    <div id="empresasestado" class="fadein"></div>
</div>    
 <script>
 var empresasestado = [
{foreach $empresasestado as $empresa} 
{
    id_empresa:"{$empresa->id_empresa}",
    razonsocial :"{$empresa->razon_social}",
    ruex : "{if $empresa->ruex}BO{$empresa->ruex}{else}Sin Ruex{/if}",
    estado :"{$empresa->estadoempresas->descripcion}",
    estadoc :"{$empresa->estado}"
    
},
{/foreach}       
];
{literal}
 $(document).ready(function () {    
$("#empresasestado").kendoGrid({
    dataSource: {
        data: empresasestado,
        schema: {
            model: {
                fields: {
                    razonsocial: { type: "string" },
                    ruex: { type: "string" },
                    estado: { type: "string" }                        
                }
            }
        },
        pageSize: 20
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
            { field: "razonsocial", title: "Razon Social" },
            { field: "ruex", title: "Ruex"},
            { field: "estado", title: "Estado"},
            { title: "Bloquear", width: 10,command: [
                {
                 name: "Bloquear",
                 text: "",
                 imageClass: "k-icon k-i-lock",
                 click: function(e) {
                    e.preventDefault();
                    restringirEmpresa();
                 },
                 confirmation: false
                }
              ]}
        ]
    });
}); 
function restringirEmpresa()
{
    var gridestado = $("#empresasestado").data("kendoGrid");
    var row = gridestado.select();
    var data = gridestado.dataItem(row); 
    anadir({/literal}data.razonsocial{literal},'admEstadoEmpresas','restringirEmpresa&id_empresa='+data.id_empresa+'&estado='+data.estadoc);
}
    
{/literal}      
</script>
       