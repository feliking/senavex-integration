<div class="row-fluid" class="fadein" >
    
    <div class="row-fluid  form" >
        <input id="estado" type="hidden" value="{$estado}" class="k-primary" />
        
        <div class="span2">
            <input style="width:100%;" id="lfestado" name="lfestado" required validationMessage="Seleccione un Estado">
        </div>
        <div class="span2">
            <input style="width:100%;" id="cbfactura_recibo" name="cbfactura_recibo" required validationMessage="Seleccione un Estado">
        </div>
    </div>
    <div class="row-fluid  form" >
        <div id="facturas_manual" class="fadein">

        </div>
    </div>
    <!--div class="row-fluid  form" id="botonoes">
        <div class="span" ></div>
            <input id="estado" type="hidden" value="{$estado}" class="k-primary" style="width:100%"/> 
            
            <div class="span2 fadein">
                <input id="Valido" {if $estado == 2 } disabled {/if} type="button"  value="Validos" class="k-primary" style="width:100%"/> 
            </div>
      
            <div class="span2 fadein">
                <input id="Anulado" {if $estado == 1 } disabled {/if} type="button"  value="Anulados" class="k-primary" style="width:100%"/> 
            </div>
        <div class="span" ></div>
    </div-->
</div>

<script>

 $(document).ready(function () {    
    $("#facturas_manual").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admProForma&tarea=list_factura_manual&estado="+$('#estado').val()+'&factura_recibo={$factura_recibo}',
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
            buttonCount: 10
        },
        change: cambiarceldas,
        columns: [
            { field: "id_factura", title: "id", hidden:'true'},
            { field: "nro_factura", title: "{if $factura_recibo == 0}FACTURA N°{else}RECIBO N°{/if}"},
            { field: "nombre", title: "EMPRESA"},
            { field: "fecha_emision", title: "FECHA"},
            { field: "total", title: "TOTAL"},
        ]
    });
}); 


        
var registro=0;
    
function cambiarceldas()
{
    var grid_oic = $("#facturas_manual").data("kendoGrid");
    var row = grid_oic.select();
    var data = grid_oic.dataItem(row);
    if(registro==data.id_factura)
    {  
        //window.open('index.php?'+'opcion=admProForma&tarea=mostrar_factura_manual&id_factura='+data.id_factura, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
        anadir('Editar {if $factura_recibo == 0}Factura{else}Recibo{/if}','admProForma','editar_factura_manual&id_factura='+data.id_factura);
        //window.open( editar_factura_manual id_factura='+data.id_factura, 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
    }
    else
    {
        registro=data.id_factura;
    }
}



/*$("#Valido").kendoButton();
var Valido = $("#Valido").data("kendoButton");
Valido.bind("click", function(e){   
  
    cerraractualizartab("Pendiente",'admProForma','listar_facturas&estado=2');
});

$("#Cancelado").kendoButton();
var Cancelado = $("#Cancelado").data("kendoButton");
Cancelado.bind("click", function(e){   
   
    cerraractualizartab("Cancelado",'admProForma','listar_facturas&estado=1');
});

$("#Anulado").kendoButton();
var Anulado = $("#Anulado").data("kendoButton");
Anulado.bind("click", function(e){   
   
    cerraractualizartab("Anulado",'admProForma','listar_facturas&estado=1');
});*/


$("#lfestado").kendoDropDownList({
        placeholder:"Seleccione un Estado",
        ignoreCase: true,
        dataTextField: "value",
        dataValueField: "Id",
        dataSource: [
        {foreach $listaEstados as $est}
             { value: "{$est->getDescripcion()}", Id: {$est->getId_factura_senavex_manual_estado()}},
        {/foreach}
        ],
        value:{$estado},
        change : function (e) {
            var est= this.value();
            var texto = this.text();
            if (this.value() && this.selectedIndex == -1) {
                
            }else{
                cerraractualizartab('Listar Facturas('+texto+')','admProForma','listar_facturas&estado='+est+'&factura_recibo={$factura_recibo}');
            }
        }
   });
$("#cbfactura_recibo").kendoDropDownList({
    dataTextField: "text",
    dataValueField: "value",
    dataSource: [
        { text: "Facturas", value: "0" },
        { text: "Recibos", value: "1" }
    ],
    filter: "contains",
    suggest: true,
    index: {$factura_recibo},
    change : function (e) {
        if (this.value() && this.selectedIndex == -1) {
            
        }else{
            var est = $("#lfestado").val();
            var texto = $("#lfestado").data("kendoDropDownList").text();
            cerraractualizartab('Listar '+(this.value()=="0"? 'Facturas' : 'Recibos')+'('+texto+')','admProForma','listar_facturas&estado='+est+'&factura_recibo='+this.value());
        }
    }
});

</script>
