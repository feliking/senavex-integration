<div class="row-fluid form" id="botones-analisis">
    <div class="span12 fadein form-options">
        <button  id="variables-button" class="k-button form-small {if $tab=='variables'}tab-inicial{/if}" section='variablesriesgo' onclick="abrirSeccion('admAnalisisRiesgo',this)">Variables de Riesgo</button>
        <button  id="formula-button" class="k-button form-small {if $tab=='formula'}tab-inicial{/if}" section='formula' onclick="abrirSeccion('admAnalisisRiesgo',this)">Análisis de Riesgo</button>
        <button  id="valores-button" class="k-button form-small {if $tab=='historial'}tab-inicial{/if}" section='historialFormulas' onclick="abrirSeccion('admAnalisisRiesgo',this)">Historial de Formulas</button>
    </div>
</div>
<div class="k-block verificacion-container ddjj-container" id="verificacion-variables">
</div>
<script>
    var tab_inicial=$('.tab-inicial');
    var contenedor_analisis=$('#verificacion-variables');
    function abrirSeccion(opcion,button){
        $('#botones-analisis button').removeClass('k-state-disabled').removeAttr('disabled');
        $(button).addClass('k-state-disabled').attr('diabled','disabled');
        contenedor_analisis.addClass('loading-block');
        getContenido(opcion,$(button).attr('section'), function (data) {
            contenedor_analisis.removeClass('loading-block').html(data);
        });
    }
    abrirSeccion('admAnalisisRiesgo',tab_inicial[0]);
</script>