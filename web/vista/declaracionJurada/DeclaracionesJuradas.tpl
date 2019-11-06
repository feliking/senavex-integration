<div class="row-fluid" class="fadein" >

    <div class="row-fluid  form" >
        <div class="span12 fadein form-options">
            {if !$perfil_uco}
                <button name="altaddjj" id="altaddjj" class="k-button form-small" onclick="cerrarDemas('Corregir DDJJ','');cerrarDemas('Nueva DDJJ','');anadir('Nueva DDJJ','admDeclaracionJurada','altadeclaracionjurada')">Nueva DDJJ</button>
            {/if}
            <input id="menuddjj" value="1" class="form-small" />
        </div>
    </div>

    <div class="row-fluid  form" >
        <div id="declaracionesjuradas" class="fadein">
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#declaracionesjuradas").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "index.php?opcion=admDeclaracionJurada&tarea=listarDeclaraciones",
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
            change: cambiarceldasddjj,
            columns: [
                { field: "id_ddjj", title: "N° de la DDJJ"},
                { field: "acuerdo", title: "Acuerdo Comercial"},
                { field: "denominacion", title: "Partida Arancelaria"},
                { field: "denominacion_comercial", title: "Descripción Comercial"},
                { field: "observaciones", title: "Observacion"},
                { field: "fecha_registro", title: "Fecha de Registro"},
                {if !$perfil_uco }
                { field: 'Clonar',filterable:false ,template:'<a target="_blank" onclick="clonarDeclaracionJurada(#= id_ddjj #)" class="k-button link">Clonar</a>'},
                { field: 'Revalidar',filterable:false ,template: "# if(acuerdo == 'ACE36'){ # <a target='_blank' onclick='clonarDeclaracionJurada(#= id_ddjj #)' class='k-button link'>Revalidar</a> #  } else { # --- # } #"},

                {/if}
                { field: 'Dar de Baja',filterable:false,template:
                        '<a target="_blank" onclick="eliminarDdjj(#= id_ddjj #)" class="k-button link">Dar de Baja</a>'
                }
            ]
        });
        var data = [
            {foreach $estados as $estado}
            { text: "{$estado->descripcion}", value: "{$estado->id_estado_ddjj}" },
            {/foreach}
        ];
        // create DropDownList from input HTML element
        $("#menuddjj").kendoDropDownList({
            dataTextField: "text",
            dataValueField: "value",
            dataSource: data,
            index: 1,
            change: onChange
        });
    });

    function onChange() {

        var grid = $("#declaracionesjuradas").data("kendoGrid");
        var dataddjj = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "index.php?opcion=admDeclaracionJurada&tarea=listarDeclaraciones&estado_ddjj="+this.value(),
                    dataType: "json"
                }
            }
            ,
            pageSize: 10
        });
        if(this.value()=='1') grid.showColumn(8);
        else grid.hideColumn(8);
        if(this.value()=='1') grid.showColumn(7);
        else grid.hideColumn(7);
        //if(this.value()=='0' || this.value()=='4' || this.value()=='5') grid.hideColumn(0);
        //else grid.showColumn(0);
        //if(this.value()=='1') grid.showColumn(6);
        //else grid.hideColumn(6);
        $opcion=this.value();
        //grid.hideColumn(0)
        grid.setDataSource(dataddjj);
        grid.refresh();
    };

    function clonarDeclaracionJurada(id_ddjj){
        anadir('Nueva DDJJ','admDeclaracionJurada','altadeclaracionjurada&id_declaracion_jurada='+id_ddjj+'&clonacion=true');
    }

    var registroddjj=0;

    function cambiarceldasddjj()
    {
        var gridddjj = $("#declaracionesjuradas").data("kendoGrid");
        var row = gridddjj.select();
        var data = gridddjj.dataItem(row);
        var comboddjj = $("#menuddjj").val();
        if(registroddjj==data.id_ddjj)
        {
            switch(comboddjj){
            {if !$perfil_uco}
                case '4': //to correct ddjj
                    cerrarDemas('DDJJ RECHAZADA','');
                    cerrarDemas('Nueva DDJJ','');
                    // anadir("DDJJ RECHAZADA",'admDeclaracionJurada','rechazodeclaracionjurada&id_declaracion_jurada='+data.id_ddjj+'&correction=true');
                    anadir("Corregir DDJJ",'admDeclaracionJurada','altadeclaracionjurada&id_declaracion_jurada='+data.id_ddjj+'&correction=true');
                    break;
            {/if}

//            case '3':
//                anadir("Ver DDJJ",'admDeclaracionJurada','editarDeclaracionJurada&id_declaracion_jurada='+data.id_ddjj);
//                break;
//            case '7':
//                anadir("Ver DDJJ",'admDeclaracionJurada','corregirDeclaracionJurada&id_declaracion_jurada='+data.id_ddjj);
//                break;
                default:
                    anadir('Ver DDJJ','admDeclaracionJurada','previewDeclaracion&id_declaracion_jurada='+data.id_ddjj);
                    break;
            }
        }
        else
        {
            registroddjj=data.id_ddjj;
        }
    }
</script>
