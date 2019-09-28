<div class="row-fluid" class="fadein" >
    <div class="row-fluid  form" >
        <div id="certificados" class="fadein">
            
        </div>
    </div>
    <div class="row-fluid  form" id="exportador">
        <div class="span" ></div>
            <input id="estado" type="hidden" value="{$estado}" class="k-primary" style="width:100%"/> 
            <div class="span2 fadein">
                <input id="nuevo" type="button" value="Nuevo" class="k-primary" style="width:100%"/> 
            </div>
            <div class="span2 fadein">
                <input id="rechazados" {if $estado == 2 } disabled {/if} type="button"  value="Rechazados" class="k-primary" style="width:100%"/> 
            </div>
      
            <div class="span2 fadein">
                <input id="aprobados" {if $estado == 1 } disabled {/if} type="button"  value="Aprobados" class="k-primary" style="width:100%"/> 
            </div>
      
            <div class="span2 fadein">
                <input id="enviados" {if $estado == 0 } disabled {/if} type="button"  value="Enviados" class="k-primary" style="width:100%"/> 
            </div>
       
        <div class="span" ></div>
    </div>
</div>

<script>
{literal}
 $(document).ready(function () {    
    
    $("#certificados").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admCafe&tarea=list_cafe&estado="+$("#estado").val(),
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
        if($("#estado").val()==1 || $("#estado").val()==0)
        {
            anadir("Certificado "+{/literal}data.id_certificado{literal},'admCafe','check_cafe&estado='+$("#estado").val()+'&id_cafe='+data.id_certificado);
        }   
        else
        {
            anadir("Certificado "+{/literal}data.id_certificado{literal},'admCafe','do_cafe&estado='+$("#estado").val()+'&id_cafe='+data.id_certificado);
        }
}
    else
    {
        registro_oic=data.id_certificado;
    }
}

$("#nuevo").kendoButton();
var nuevo = $("#nuevo").data("kendoButton");
nuevo.bind("click", function(e){
    
    anadir('Nuevo OIC','admCafe','do_cafe');
});

$("#rechazados").kendoButton();
var rechazados = $("#rechazados").data("kendoButton");
rechazados.bind("click", function(e){   
  
    cerraractualizartab($("#rechazados").val()+" OIC",'admCafe','listar_cafe&estado=2');
});

$("#aprobados").kendoButton();
var aprobados = $("#aprobados").data("kendoButton");
aprobados.bind("click", function(e){   
   
    cerraractualizartab($("#aprobados").val()+" OIC",'admCafe','listar_cafe&estado=1');
});

$("#enviados").kendoButton();
var enviados = $("#enviados").data("kendoButton");
enviados.bind("click", function(e){   
   
    cerraractualizartab($("#enviados").val()+" OIC",'admCafe','listar_cafe&estado=0');
});

{/literal}
</script>
