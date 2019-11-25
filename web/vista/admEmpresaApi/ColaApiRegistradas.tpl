<div class="row-fluid  form" >
    <div class="span12 fadein" style="text-align: left;">
        <input id="menuempresasadmitidas" value="1" class="botonElegir"/>
    </div>
</div>
<div class="row-fluid  form" >
    <div id="admisiona" class="fadein"></div>
</div>    
 <script>
{literal} 
var grid3 =  $("#admisiona").kendoGrid({
    dataSource: {
        transport: {
            read: {
               url: "index.php?opcion=admRegistroApi&tarea=ListarEmpresasApiPorEstado&tipo=1",
               dataType: "json"
            }
        },
        pageSize: 30
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
    change: cambiarceldasadmisiona,
    columns: [
        { field: "razonsocial", title: "Razon Social", width: '41%', },
        { field: "nit", title: "Nit", width: '14%',},
        { field: "padron", title: "Padron Importador",filterable: false, width: '41%', }
    ]
});
var registroadmisiona=0;
function cambiarceldasadmisiona()
{  
    
    var gridadmision = $("#admisiona").data("kendoGrid");
    var row = gridadmision.select();
    var data = gridadmision.dataItem(row);
    if(registroadmisiona==data.id_empresa)
    {   
       if(data.estado=='0' || data.estado=='1' || data.estado=='2') 
       {
            cerraractualizartab({/literal}data.razonsocial{literal},'admRegistroApi','asignacionrui&id_empresa='+data.id_empresa+'&revisar='+data.estado);
       }     
    }
    else
    {
        registroadmisiona=data.id_empresa;
    }
}
var estadosadmisiona = [
    { text: "Empresas Nuevas", value: "1" },
    { text: "Empresas con RUI", value: "2" }
    //{ text: "Modificacion", value: "2" },

];
var dropDown3 = $("#menuempresasadmitidas").kendoDropDownList({
    dataTextField: "text",
    dataValueField: "value",
    dataSource: estadosadmisiona,
    index: "1",
    change : function (e) {
        var grid = $("#admisiona").data("kendoGrid");
        
        var dataadmision= new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admRegistroApi&tarea=ListarEmpresasApiPorEstado&tipo="+this.value(),
                   dataType: "json"
                }
            }
            ,
        pageSize: 30
        });

        grid.setDataSource(dataadmision);
        grid.refresh();
    }
});
{/literal}      
</script>
       