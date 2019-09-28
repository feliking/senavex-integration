<div class="row-fluid  form" >  

    <div id="empresasmodificacion" class="fadein"></div>
</div>    
 <script>
 var empresasmodificacion = [
{section name=empresa_temporal loop=$registromodificacion}	
{
    id_empresa:"{$registromodificacion[empresa_temporal].id_empresa}",
    id_modificacion_empresa_relevancia:"{$registromodificacion[empresa_temporal].id_modificacion_empresa_relevancia}",
    ruex : "{$registromodificacion[empresa_temporal].ruex}",
    razonsocial:"{$registromodificacion[empresa_temporal].razon_social}",
    fechasolicitud:"{$registromodificacion[empresa_temporal].fecha_solicitud}"   
},
{/section}    
];
{literal}
 $(document).ready(function () {    
    $("#empresasmodificacion").kendoGrid({
        dataSource: {
            data: empresasmodificacion,
            schema: {
                model: {
                    fields: {
                        ruex: { type: "string" },
                        razonsocial: { type: "string" },
                        fechasolicitud: { type: "date" }
                        
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
        change: cambiarceldasmodificacion,
        columns: [
                { field: "razonsocial", title: "Razon Social" },  
                { field: "ruex", title: "Ruex"},
                { field: "fechasolicitud", title: "Fecha de Solicitud",format: "{0:MM/dd/yyyy}",filterable: {
                        ui: "datepicker"
                    }}
                            
            ]
        });
    }); 
    var registromodificacion=0;
   function cambiarceldasmodificacion()
    {  
        var gridruex = $("#empresasmodificacion").data("kendoGrid");
        var row = gridruex.select();
        var data = gridruex.dataItem(row);
        if(registromodificacion==data.id_empresa)
        {              
           anadir({/literal}'Modificación "'+data.razonsocial+'"'{literal},'admEmpresa','revisionModificacionEmpresa&id_empresa='+data.id_empresa+'&id_modificacion_empresa_relevancia='+data.id_modificacion_empresa_relevancia);
        }
        else
        {
            registromodificacion=data.id_empresa;
        }
    }
    
{/literal}      
</script>
       