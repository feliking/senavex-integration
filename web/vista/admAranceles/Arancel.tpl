<div class="k-block"><div class="k-header">
    <div class="row-fluid form">
        <div class="span12">
            <div class="titulonegro" > Arancel</div>
        </div>
    </div>
</div>
<div class="k-body ddjj-container">
    <div class="row-fluid form">
        <div class="span2 ddjj-section-label" >
            Denominación:
        </div>
        <div class="span5 ddjj-section-field" >
            {$arancel->denominacion}
        </div>
        <div class="span1 ddjj-section-label" >
            Gestion:
        </div>
        <div class="span2 ddjj-section-field" >
            {$arancel->gestion_publicacion}
        </div>
        <div class="span2 ddjj-section-label" >
            {if $arancel->vigente} Es el Arancel boliviano actual.{/if}
        </div>
    </div>
    <div class="row-fluid form">
        <div id="{$arancel->id_arancel}_partidas_table" class="fadein"></div>
    </div>
</div></div>
<script>
    $("#{$arancel->id_arancel}_partidas_table").kendoGrid({
        scrollable: false,
        sortable:true,
        resizable: true,
        pageable:{
            buttonCount:5
        },
        dataSource:{
            data: [
            {foreach $partidas as $partida}
                {
                  id_partida:"{$partida->id_partida}",
                  partida: "{$partida->partida}",
                  denominacion: "{$partida->denominacion}",
                  unidad_medida:"{if $partida->unidad_medida}{$partida->unidad_medida}{/if}",
                  reo:"{if $partida->reo}{$partida->reo}{/if}",
                  criterio_valor:  {if $partida->criterio_valor}{$partida->criterio_valor}{else}0{/if}
                },
            {/foreach}
            ],
            pageSize:25,
            schema: {
                model: {
                    fields: {
                        id_partida: "id_partida",
                        partida:"partida",
                        denominacion: "denominacion",
                        unidad_medida: "unidad_medida",
                        reo:"reo",
                        criterio_valor:"criterio_valor"
                    }
                }
            }
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
        columns: [
            { id_partida:"id_partida",hidden:true},
            { field: "partida", title: "Partida"},
            { field: "denominacion", title: "Denominación"},
            { field: "unidad_medida", title: "Unidad de Medida"},
            { field: "reo", title: "REO"},
            { field: "criterio_valor", title: "Valor de Riesgo"}
        ]
    });
</script>