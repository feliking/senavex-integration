<link rel="stylesheet" type="text/css" href="styles/css-personales/mathquill.css" media="screen" />
<script src="styles/js-personales/mathquill.min.js"></script>
<div class="k-header">
    <div class="row-fluid form">
        <div class="span12">
            <div class="titulonegro">Historial de formulas de Riesgo</div>
        </div>
    </div>
</div>
<div class="k-body">
    {foreach $formulas as $formula}
    <section class="ddjj-section">
        <div class="row-fluid">
            <div class="span4 verificacion-formula">
                <span class="formula-renderizada">
                   {$formula->formula}
                </span>
                {if $formula->estado}
                    <em>
                        Formula Vigente
                    </em>
                {/if}
            </div>
            <div class="span8">
                {if ($formula->id_persona_alta)}
                    <div class="row">
                        <label class="span2 ddjj-section-label">
                            Fecha Creación:
                        </label>
                        <div class="span2 ddjj-section-field">
                            {$formula->fecha_alta}
                        </div>
                        <label class="span2 ddjj-section-label">
                            Autor:
                        </label>
                        <div class="span6 ddjj-section-field">
                            {$formula->id_persona_alta->nombres} {$formula->id_persona_alta->paterno} {$formula->id_persona_alta->materno}
                        </div>
                    </div>
                {/if}
                {if ($formula->id_persona_baja)}
                    <div class="row">
                        <label class="span2 ddjj-section-label">
                            Fecha Baja:
                        </label>
                        <div class="span2 ddjj-section-field">
                            {$formula->fecha_baja}
                        </div>
                        <label class="span2 ddjj-section-label">
                            Responsable:
                        </label>
                        <div class="span6 ddjj-section-field">
                            {$formula->id_persona_baja->nombres} {$formula->id_persona_baja->paterno} {$formula->id_persona_baja->materno}
                        </div>
                    </div>
                {/if}
            </div>
        </div>
        {if $formula->justificativo}
        <div class="row-fluid">
            <div class="span2 ddjj-section-label">Justificativo:</div>
            <div class="span10 ddjj-section-field">{$formula->justificativo}</div>
        </div>
        {/if}
    </section>
    {/foreach}
</div>
<script>
    var MQ = MathQuill.getInterface(2);
    math.sqrt(-4); // 2i

    $.each($('.formula-renderizada'), function (index,element)
    {
        MQ.StaticMath(element);
    });
</script>


