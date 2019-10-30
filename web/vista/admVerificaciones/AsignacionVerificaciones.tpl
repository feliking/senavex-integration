<div class="border-section">
    <div class="row-fluid ">
        <label>Asignar Personal para revision</label>
    </div>
    <div class="row-fluid form">
        <div class="span2 ddjj-section-label">
            Regional:
        </div>
        <div class="span3">
            <input id="regionalverificaciones"  class="form-select" />
        </div>
        <div class="span2 ddjj-section-label">
            Personal:
        </div>
        <div class="span4">
            <input id="personalverificaciones" class="form-select" />
            <span class="k-widget k-tooltip k-tooltip-validation k-invalid-msg fadein hidden" id="personalverificacionesValidator" ><span class="k-icon k-warning"> </span> Seleccione una persona</span>
        </div>
        <div class="span1">
            <button id='asignarPersonal' onclick="asignarPersonal({$verificacion->id_ver_verificacion})" class="k-button">Asignar</button>
        </div>
    </div>
</div>
<script>
    $("#personalverificaciones").kendoDropDownList({
        dataTextField: "persona",
        dataValueField: "id_persona",
        dataSource: {
            transport: {
                read: {
                    dataType: "json",
                    url: 'index.php?opcion=admVerificaciones&tarea=personalRegional&id_regional={$verificacion->id_regional}',
                    cache: false
                }
            }
        },
        optionLabel: "Escoja el Personal",
        change:function(){ $('#personalverificacionesValidator').addClass('hidden'); },
        {if $verificacion && $verificacion->id_persona_verificacion}
        value:{$verificacion->id_persona_verificacion}
        {/if}
    });
    $("#regionalverificaciones").kendoDropDownList({
        dataTextField: "text",
        dataValueField: "value",
        dataSource: [
            {foreach $regionales as $regional}
            { text: "{$regional->ciudad}", value: "{$regional->id_regional}" },
            {/foreach}
        ],
        {if $verificacion && $verificacion->id_regional}
        value:{$verificacion->id_regional},
        {/if}
        change: function(){
            var dataSource = new kendo.data.DataSource({
                transport: {
                    read: {
                        dataType: "json",
                        url: 'index.php?opcion=admVerificaciones&tarea=personalRegional&id_regional='+this.value(),
                        cache: false
                    }
                }
            }),
            personal = $("#personalverificaciones").data("kendoDropDownList");
            personal.setDataSource(dataSource);
        }
    });

</script>