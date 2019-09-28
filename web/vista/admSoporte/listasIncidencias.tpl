<div class="row-fluid" class="fadein" >
    
    <div class="row-fluid  form" >
        <input id="estado" type="hidden" value="{$estado}" class="k-primary" />
        
        <div class="span2">
            <input style="width:100%;" id="iestado" name="iestado" required validationMessage="Seleccione un Estado">
        </div>
       <div class="span2 " >
            <input id="nuevoticket" name="nuevoticket" type="button" value="Nuevo" class="k-primary" style="width:100%"/> <br> 
        </div> 
    </div>
    <div class="row-fluid  form" >
        <div id="incidencias" class="fadein">

        </div>
    </div>
        
</div>

<script>
    $("#nuevoticket").kendoButton();
    var nuevoticket = $("#nuevoticket").data("kendoButton");
    nuevoticket.bind("click", function(e){
        anadir('Nuevo Ticket','admSoporte','show_formulario');
    });
 $(document).ready(function () {    
    $("#incidencias").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admSoporte&tarea=list_incidencias&estado="+$('#estado').val(),
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
            { field: "id_incidencia", title: "id", hidden:'true'},
            { field: "ticket", title: "TICKET"},
            { field: "asunto", title: "TITULO"},
            { field: "fecha", title: "FECHA"},
            { field: "categoria", title: "CATEGORIA"},
        ]
    });
}); 


        
var registro=0;
    
function cambiarceldas()
{
    var grid_oic = $("#incidencias").data("kendoGrid");
    var row = grid_oic.select();
    var data = grid_oic.dataItem(row);
    if(registro==data.id_incidencia)
    {  
        anadir('TICKET Nro:'+data.ticket,'admSoporte','show_solicitud&id_incidencia='+data.id_incidencia);
    }
    else
    {
        registro=data.id_incidencia;
    }
}

   // window.open("index.php?opcion=admSoporte&tarea=list_estado", 'mywindow','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
    $("#iestado").kendoComboBox({
        placeholder:"Estado",
        dataTextField: "descripcion",
        dataValueField: "id_estado",
        dataSource: { 
            transport: {
                    read: {
                        dataType: "json",
                        url: "index.php?opcion=admSoporte&tarea=list_estado"
                    }
            }
        },
        change : function (e) {
            if (this.value() && this.selectedIndex === -1) { 
                this.text('');
            }else{ 
                cerraractualizartab('Soporte('+this.text()+')','admSoporte','show_incidencias&estado='+this.value());
            }

        }
    });


</script>
