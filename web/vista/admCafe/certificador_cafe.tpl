<div class="row-fluid" class="fadein" >
    <div class="row-fluid  form" >
        <div id="certificados" class="fadein">
            
        </div>
    </div>
    <div class="row-fluid  form" id="exportador">
        <div class="span" ></div>
            <input id="estado" type="hidden" value="{$estado}" class="k-primary" style="width:100%"/> 
            
            <div class="span2 fadein">
                <input id="Revisar" {if $estado == 0 } disabled {/if} type="button"  value="Revisar" class="k-primary" style="width:100%"/> 
            </div>
      
            <div class="span2 fadein">
                <input id="Rechazados" {if $estado == 2 } disabled {/if} type="button"  value="Rechazados" class="k-primary" style="width:100%"/> 
            </div>
      
            <div class="span2 fadein">
                <input id="Validados" {if $estado == 1 } disabled {/if} type="button"  value="Validados" class="k-primary" style="width:100%"/> 
            </div>
       
        <div class="span" ></div>
    </div>
</div>

<script>
{literal}
 $(document).ready(function () {    
    var estado=$("#estado").val();
    $("#certificados").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admCafe&tarea=list_cafe&revision=1&estado="+estado,
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
        change: cambiarceldas_oic,
        columns: [
            { field: "id_certificado", title: "Nro Certificado"},
            { field: "nro_ruex", title: "RUEX"},
            { field: "nro_factura", title: "Factura"},
            { field: "nombre_importador", title: "Importador"},
            { field: "pais_destino", title: "Destino"},
            { field: "valor_fob", title: "valor FOB"},

        ]
    });
}); 


var registro_oic=0;
    
function cambiarceldas_oic()
{
    var grid_oic = $("#certificados").data("kendoGrid");
    var row = grid_oic.select();
    var data = grid_oic.dataItem(row);
    if(registro_oic==data.id_certificado)
    {  
        //anadir('Nuevo OIC','admCafe','do_cafe');
        var imprimir=($("#estado").val()==1)? '1':'0';
        var estado=$("#estado").val();
        if($("#estado").val()!=0)
        {
            anadir("Certificado "+{/literal}data.id_certificado{literal},'admCafe','check_cafe&revision=1&imprimir='+imprimir+'&estado='+estado+'&id_cafe='+data.id_certificado);
        }   
        else
        {
            anadir("Certificado "+{/literal}data.id_certificado{literal},'admCafe','check_cafe&revision=0&imprimir=0&estado='+estado+'&id_cafe='+data.id_certificado);
        }
}
    else
    {
        registro_oic=data.id_certificado;
    }
}



$("#Validados").kendoButton();
var Validados = $("#Validados").data("kendoButton");
Validados.bind("click", function(e){   
  
    cerraractualizartab($("#Validados").val()+" OIC",'admCafe','listar_cafe&revision=0&estado=1&imprimir=1');
});

$("#Rechazados").kendoButton();
var Rechazados = $("#Rechazados").data("kendoButton");
Rechazados.bind("click", function(e){   
   
    cerraractualizartab($("#Rechazados").val()+" OIC",'admCafe','listar_cafe&revision=0&estado=2&imprimir=0');
});

$("#Revisar").kendoButton();
var Revisar = $("#Revisar").data("kendoButton");
Revisar.bind("click", function(e){   
   
    cerraractualizartab($("#Revisar").val()+" OIC",'admCafe','listar_cafe&revision=0&estado=0&imprimir=0');
});

{/literal}
</script>
