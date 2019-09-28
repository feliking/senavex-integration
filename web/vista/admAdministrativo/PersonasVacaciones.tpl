<div class="row-fluid  form" >
    <div class="span12 fadein" style="text-align: left;">
        <button name="nuevalicencia" id="nuevalicencia" class="botonElegir">Nuevo</button> 
    </div>
</div>
<div class="row-fluid  form" >
    <div id="permisosgrid" class="fadein"></div>
</div> 
 <script>
 var permisos = [
{foreach $personas as $persona} 
{
    id_persona:"{$persona.id_persona}",
    nombres :"{$persona.nombres}",
    cargo : "{$persona.cargo}",
    tipo :"{$persona.tipo}",
    fechadesde:"{$persona.fecha_desde}",
    fechahasta:"{$persona.fecha_hasta}",
    id_ausencia_asistente:"{$persona.id_ausencia_asistente}"
    
},
{/foreach}       
];
{literal}
 $(document).ready(function () {    
$("#permisosgrid").kendoGrid({
    dataSource: {
        data: permisos,
        schema: {
            model: {
                fields: {
                    nombres: { type: "string" },
                    cargo: { type: "string" },
                    tipo: { type: "string" },
                    fechadesde: { type: "date" },
                    fechahasta: { type: "date" }

                }
            }
        },
        pageSize: 5
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
    change: cambiarceldaspermisos,
    columns: [
        { field: "nombres", title: "Nombre" },
        { field: "cargo", title: "Cargo"},
        { field: "tipo", title: "Tipo"},
        { field: "fechadesde", title: "Fecha Desde",format:"{0:dd/MM/yyyy HH:mm tt}",filterable: {
                ui: "datetimepicker"
            }},
        { field: "fechahasta", title: "Fecha Hasta",format:"{0:dd/MM/yyyy HH:mm tt}",filterable: {
                ui: "datetimepicker"
            }},
        { title: "Eliminar", width: "120px",command: [
            {
             name: "Eliminar",
             click: function(e) {
                e.preventDefault();
                var gridpermisos = $("#permisosgrid").data("kendoGrid");
                var row = gridpermisos.select();
                var data = gridpermisos.dataItem(row);
                anadir({/literal}"Cancelar Permiso "+data.nombres{literal},'admAdministrativa','cancelarPermiso&id_ausencia_asistente='+data.id_ausencia_asistente);
             },
             confirmation: false
            }
          ]}
        ]
    });
}); 
var registropermisos=0;
function cambiarceldaspermisos()
{  
    var gridpermisos = $("#permisosgrid").data("kendoGrid");
    var row = gridpermisos.select();
    var data = gridpermisos.dataItem(row);
    if(registropermisos==data.id_persona)
    {         
        anadir({/literal}data.nombres{literal},'admAdministrativa','permiso&id_ausencia_asistente='+data.id_ausencia_asistente);
    }
    else
    {
        registropermisos=data.id_persona;
    }
}
$("#nuevalicencia").kendoButton();
var nuevalicencia = $("#nuevalicencia").data("kendoButton");
nuevalicencia.bind("click", function(e){ 
  anadir('Nuevo Permiso','admAdministrativa','nuevoPermiso');
}); 
{/literal}      
</script>