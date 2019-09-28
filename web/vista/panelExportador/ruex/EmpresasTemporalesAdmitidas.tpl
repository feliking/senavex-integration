<div class="row-fluid  form" >
    <div class="span12 fadein" style="text-align: left;">
        <input id="menuempresasadmitidas" value="1" class="botonElegir"/>
    </div>
</div>
<div class="row-fluid  form" >
    <div id="admision" class="fadein"></div>
</div>    
 <script>
{literal} 
var grid3 =  $("#admision").kendoGrid({
    dataSource: {
        transport: {
            read: {
               url: "index.php?opcion=admEmpresa&tarea=empresasAdmitidasJson&estado=0",
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
    change: cambiarceldasadmision,
    columns: [
        { field: "razonsocial", title: "Razon Social", width: '41%', },
        { field: "nit", title: "Nit", width: '14%',},
        { field: "estado", title: "Habilitados",filterable: false, width: '41%', }
    ]
});
var registroadmision=0;
function cambiarceldasadmision()
{  
    var gridadmision = $("#admision").data("kendoGrid");
    var row = gridadmision.select();
    var data = gridadmision.dataItem(row);
    if(registroadmision==data.id_empresa)
    {   
       if(data.estado_codigo=='0' || data.estado_codigo=='1' || data.estado_codigo=='4' ) 
       {
            anadir({/literal}data.razonsocial{literal},'admEmpresa','asignacionruex&id_empresa='+data.id_empresa+'&revisar=1');
       }
       else if( data.estado_codigo=='6')
       {
            anadir({/literal}data.razonsocial{literal},'admEmpresa','asignacionruex&id_empresa='+data.id_empresa+'&revisar=1');
       }
       else if(data.estado_codigo=='9' || data.estado_codigo=='13')
       {
            anadir({/literal}data.razonsocial{literal},'admEmpresa','asignacionruex&id_empresa='+data.id_empresa+'&revisar=0');
       }
    }
    else
    {
        registroadmision=data.id_empresa;
    }
}
var estadosadmision = [
    { text: "Empresas Nuevas", value: "0" },
    { text: "Renovación", value: "2" },
    { text: "Observadas", value: "9" },
    { text: "Modificacion", value: "4" }
];
var dropDown3 = $("#menuempresasadmitidas").kendoDropDownList({
    dataTextField: "text",
    dataValueField: "value",
    dataSource: estadosadmision,
    index: 0,
    change : function (e) {
        var grid = $("#admision").data("kendoGrid");
        if(this.value()=='1' || this.value()=='4' || this.value()=='0' || this.value()=='13')
        {
            var dataadmision = new kendo.data.DataSource({
                transport: {
                    read: {
                        url: "index.php?opcion=admEmpresa&tarea=empresasAdmitidasJson&estado="+this.value(),
                       dataType: "json"
                    }
                }
                ,
            pageSize: 15,
            });
        }
        if(this.value()=='2')
        {
            var dataadmision= new kendo.data.DataSource({
                transport: {
                    read: {
                        url: "index.php?opcion=admEmpresa&tarea=empresasAdmitidasModificacionJson",
                       dataType: "json"
                    }
                }
                ,
            pageSize: 10
            });
        }
        if(this.value()=='9')
        {
            var dataadmision= new kendo.data.DataSource({
                transport: {
                    read: {
                        url: "index.php?opcion=admEmpresa&tarea=empresasObservadasJson",
                       dataType: "json"
                    }
                }
                ,
            pageSize: 10
            });
        }
        grid.setDataSource(dataadmision);
        grid.refresh();
    }
});
{/literal}      
</script>
       