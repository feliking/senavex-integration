<div class="row-fluid" class="fadein" >
    <div class="row-fluid  form" >
        <div class="span7 fadein form-options">
            <input id="menuverificaciones" value="1" class="form-small" />
        </div>
        {if $perfil_uco }
        <div class="span3 fadein form-options">
            <input id="correoverificaciones" {if $correoVerificaciones}value="{$correoVerificaciones}"{/if} class="k-textbox" />
        </div>
        <div class="span2 fadein form-options">
            <button class="k-button" onclick="guardarCorreoVerificacion()" title="correo al que se enviara una notificacion cuando se tengan que asignar visitas de verificación">Guardar correo</button>
        </div>
        {/if}
    </div>
    
    <div class="row-fluid  form" >
        <div id="verificaciones" class="fadein">
        </div>
    </div>
</div>
<script>
 $(document).ready(function () {
    $("#verificaciones").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admVerificaciones&tarea=listarVerificaciones",
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
        columns: [
            { field: "id_ver_verificacion",title:"Nro" },
            { field: "ddjj", title: "Producto"},
            { field: "regional", title: "Regional"},
            { field: "riesgo", title: "Riesgo"},
            { field: "estado", title: "Estado",Test:true},
            { field: "fecha_registro", title: "Fecha de Registro"},
            { field: 'Opciones',filterable:false,
                template: '<button onclick="editarVerificacion(#= id_ver_verificacion #)" class="k-button link">Editar</button><button onclick="verVerificacion(#= id_ver_verificacion #)" class="k-button link">Ver</button>' },
        ]
    });
     $("#menuverificaciones").kendoDropDownList({
         dataTextField: "text",
         dataValueField: "value",
         dataSource: [
             {foreach $estados as $estado}
             { text: "{$estado->denominacion}", value: "{$estado->id_ver_estado_verificacion}" },
             {/foreach}
         ],
         value:0,
         change: function(){
             var grid = $("#verificaciones").data("kendoGrid");
             var dataverificaciones = new kendo.data.DataSource({
                 transport: {
                     read: {
                         url: "index.php?opcion=admVerificaciones&tarea=listarVerificaciones&estado="+this.value(),
                         dataType: "json"
                     }
                 }
                 ,
                 pageSize: 10
             });

//             if(this.value()=='0' || this.value()=='4' || this.value()=='5') grid.hideColumn(0);
//             else grid.showColumn(0);

             grid.setDataSource(dataverificaciones);
             grid.refresh();
         }
     });
});
</script>
