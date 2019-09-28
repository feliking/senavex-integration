<div class="row-fluid  form" >
     <input id="estado" type="hidden" value="{$estado}" class="k-primary" style="width:100%"/> 
    <div class="span12 fadein" style="text-align: left;">
        <button name="nuevo_oic" id="nuevo_oic" class="botonElegir">Nuevo OIC</button> 
        <input id="menuoic" value="1" class="botonElegir"/>
    </div>
</div>
<div class="row-fluid  form" >
    <div id="misoic" class="fadein"></div>
</div> 
 <script>
{literal}
var estadosoic = [
    { text: "Enviados", value: "0" },
    { text: "Aprobados", value: "1" },
    { text: "Rechazados", value: "2" },
];
var dropDown = $("#menuoic").kendoDropDownList({
    dataTextField: "text",
    dataValueField: "value",
    dataSource: estadosoic,
    index: 0,
    change : function (e) {
            cerraractualizartab('Enviados','admCafe','listar_cafe&estado='+this.value());
    }
});

var grid2 =  $("#misoic").kendoGrid({
        dataSource: {
            transport: {
                read: {
                   url: "index.php?opcion=admCafe&tarea=list_cafe&estado="+$("#estado").val(),
                   dataType: "json"
                }
            },
            pageSize: 10
        },
        pageable: {},
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
        change: function (e) {
            setTimeout(function () {cambiarceldasmisfacturas()}, 200);
        },
        columns: [
   
            { field: "id_certificado", title: "Nro Certificado"},
            { field: "nro_ruex", title: "RUEX"},
            { field: "nro_factura", title: "Factura"},
            { field: "nombre_importador", title: "Importador"},
            { field: "pais_destino", title: "Destino"},
            { field: "valor_fob", title: "valor FOB"}
        ]
    });
//--------------para el button
$("#nuevo_oic").kendoButton();
var nueva_oic = $("#nuevo_oic").data("kendoButton");
nueva_oic.bind("click", function(e){   
    //cerraractualizartab('Nuevo OIC','admCafe','do_cafe');
    anadir('oic','admCafe',"list_cafe&estado="+$("#estado").val())
});
{/literal}      
</script>