<h2>DETERMINACIÓN DEL CRITERIO DE ORIGEN</h2>
<section class="ddjj-section">
    <table class="ddjj-table">
        <thead><tr><th colspan="2">NORMA DE ORIGEN A CUMPLIR</th></tr></thead>
        <tbody id="ddjj_normas">
        </tbody>
    </table>
    <table class="ddjj-table">
        <thead><tr><th class="cell-lg">Acuerdo Comercial O Régimen Preferencial Seleccionado</th><th >Criterio de Origen, según Acuerdo Comercial o Régimen</th></tr></thead>
        <tbody>
        <tr>
            <td id="ddjj_acuerdo_copy">
                {$ddjj->acuerdo->descripcion} ({$ddjj->acuerdo->sigla})
            </td>
            <td id="criterio_origen_container">
                <select id="criterio_origen" multiple="multiple" data-placeholder="Seleccione el criterio de origen">
                </select>
            </td>

        </tr>

        </tbody>
    </table>
    <!--table class="ddjj-table">
        <thead><tr><th> REO(campo opcional, se llena automaticamente al escojer la partida)</th></tr></thead>
        <tbody>
        <tr>
            <td id="ddjj_reo">
                {$ddjj->reo}
            </td>
        </tr>
        </tbody>
    </table-->
    <input type="hidden" name="hiddenvalidatorco" data-criteriorigen=""><br>
    <div class="row-fluid  form" >
        <div class="span2 ddjj-section-label">
            <span class="tooltip" title="Engrese información complementaria la criterio de origen o al REO">?</span>Complemento:
        </div>
        <div class="span10 ddjj-input">
            <textarea id="complemento_criterio_origen" name="complemento" class="k-textbox form-textarea" rows="4" value="">{if $ddjj && $ddjj->complemento}{$ddjj->complemento}{/if}</textarea>
            <input type="hidden" name="hiddenvalidatorcomplemento" data-complemento="">
        </div>
    </div>
</section>

<h2>CERTIFICADOR DE ORIGEN</h2>
<section class="ddjj-section">
    <div class="row-fluid form">
        {if $observaciones_ddjj|@count!=0}
            <table class="ddjj-table">

                <tr>
                    <td width="70%"><strong>Detalle de la Observación<strong></td>
                    <td width="15%"><strong>Fecha Observación<strong></td>
                    <td width="15%"><strong>Usuario<strong></td>
                </tr>
                {foreach $observaciones_ddjj as $observacion}
                    <tr {if ($observacion->getId_tipo_usuario()!=1)}class="cell-outstand"{/if}>
                        <td align="justify" class="cell-observation">{$observacion->getObservaciones_generales()}</td>
                        <td>{$observacion->getFecha_observacion()}</td>
                        <td>{if ($observacion->getId_tipo_usuario()==1)}
                                Certificador
                            {else}
                                Exportador
                            {/if}
                        </td>
                    </tr>
                {/foreach}
            </table>
        {/if}
    </div>
    <div class="row-fluid  form">
        <label class="span3 ddjj-section-label">
            Observaciones para rechazo:
        </label>
        <div class="span9 ddjj-input">
            <textarea id="observacion_general" name="observacion_general" class="k-textbox form-textarea" rows="8"></textarea>
            <span id="obervacion-validation" class="m5 k-widget k-tooltip k-tooltip-validation k-invalid-msg none fadein" ><span class="k-icon k-warning"> </span> Ingrese las observaciones</span>
        </div>
    </div>
    <div class="row-fluid  form">
        <label class="span3 ddjj-section-label">
            Observaciones:
        </label>
        <div class="span9 ddjj-input">
            <textarea id="observacion_ddjj" name="observacion_ddjj" class="k-textbox form-textarea" rows="6">{$ddjj->observacion_ddjj}</textarea>
        </div>
    </div>
</section>
<h2>CRITERIO DE RIEGO</h2>
<section class="ddjj-section">
    <script src="styles/js-personales/Math.min.js"></script>
    <div class="row-fluid  form">
        <label class="span3 ddjj-section-label">
            Criterio de Riesgo:
        </label>
        <div id='criterio-riesgo' class="span3 ddjj-section-field">
        </div>
        <label id='tendra-visita' class="span6 ddjj-section-label">
        </label>
    </div>
    <div class="row-fluid  form">
        <label class="span12 ddjj-section-label">
            * El criterio de Riesgo es el resultado de una operacion interna la cual determina si la siguiente declaración jurada, necesita una visita de verificación para continuar con su tramite.
        </label>
    <div>
    <div class="row-fluid  form">
        <label class="span12 ddjj-section-label">
            Si usted considera que esta declaración Jurada necesita o no una visita de verificación, por favor incluya una justificación y marque la opción si.
            Si se escoje la opción requiere verificación estricta, se creara un verificacion pero esta detendra el flujo de la declaración jurada hasta que esta verificación sea concluida</label>
        </label>
    </div>
    <div class="row-fluid  form">
        <div class="span5">
            <label class="ddjj-section-label">
                Se necesita un visita de Verificación?
                <input type="radio" name="verificacion" value="true"> Si
                <input type="radio" name="verificacion" value="false" checked="true"> No
            </label>
            <label id='verificacion-estricta' class="ddjj-section-label fadein">
                Se necesita un visita de Verificación previa a la emisión de la DDJJ?
                <input type="radio" name="verificacion_estricta" value="true" > Si
                <input type="radio" name="verificacion_estricta" value="false" checked="true"> No
            </label>
        </div>
        <label class="span2 ddjj-section-label">
            Justificación:
        </label>
        <div class="span5 ddjj-section-input">
            <textarea id="justificacionVerificacion" name="justificacionVerificacion" class="k-textbox form-textarea" rows="3"></textarea>
            <span class="m5 k-widget k-tooltip k-tooltip-validation k-invalid-msg hidden fadein" ><span class="k-icon k-warning"> </span> Ingrese una Justificacion</span>
        </div>
    </div>
</section>
{if $verificaciones_antiguas} {* // verificaciones antiguas que se ralizaron a la misma empresa*}
    <section class="accordion close">
        <div class="accordion-item"  >
            <strong> Ver Verificaciones Antiguas</strong>
        </div>
        {include file=$verificaciones_antiguas}
    </section>
{/if}
<script>
    $('#obervacion-validation').hide();
    //------------------------------------------------
    math.sqrt(-4); // 2i
    var scope = { {foreach from=$objectoAnalisiRiesgo->variables key=k item=v} {$k}:{$v},{/foreach} };
    var admisiones =[
        {foreach from=$objectoAnalisiRiesgo->admisiones item=admision}
            {
                id:{$admision->id_ver_admision},
                nivel:'{$admision->nivel}',
                min:{$admision->min},
                max:{$admision->max},
                verificacion:{if $admision->verificacion} true {else} false {/if},
                verificacion_estricta:{if $admision->verificacion_estricta} true {else} false {/if}
            },
        {/foreach}
    ];
    var resultado,criterio=$('#criterio-riesgo'),tendraVisita=$('#tendra-visita'),verificacion_inicial,
        $radioVerificacion= $("input[name=verificacion]:radio"),
        $radioVerificacionEstricta= $("input[name=verificacion_estricta]:radio"),
        verificacion= {
            id_admision:0,
            id_formula:{$objectoAnalisiRiesgo->formula->id_ver_formula},
            nivel: 'No Definido',
            resultado: null,
            verificacion: false,
            verificacion_estricta: false
        };

    function setRadioVerificacion(ver,ver_estricta){
        verificacion.verificacion=ver;
        verificacion.verificacion_estricta=ver_estricta;

        if($('#aceptarDdjj').length) $('#aceptarDdjj').text('Aceptar');

        if(verificacion.verificacion){
            $($radioVerificacion[0]).prop("checked",true);
            $('#tendra-visita').text('Se realizara una visita de Verificación para este producto');
            $('#verificacion-estricta').removeClass('hidden');
        }
        else{
            $($radioVerificacion[1]).prop("checked",true);
            $('#tendra-visita').text('No se realizara una visita de verificación a este producto');
            $('#verificacion-estricta').addClass('hidden');
        }
        if(verificacion.verificacion_estricta){
            $($radioVerificacionEstricta[0]).prop("checked",true);
            $('#tendra-visita').html('Se realizara una visita de <strong>Verificación que postergara  la emisión de la DDJJ </strong> hasta que se concluya la visita.');
            if($('#aceptarDdjj').length) $('#aceptarDdjj').text('Enviar a Visita de Verificación');
            $($radioVerificacion[0]).prop("checked",true);
            $('#verificacion-estricta').removeClass('hidden');
        }
        else{
            $($radioVerificacionEstricta[1]).prop("checked",true);
        }

    }
    function setVerificacion(){
        try { verificacion.resultado=math.eval('{$objectoAnalisiRiesgo->formula->formula}', scope);}
        catch(err) { verificacion.resultado=null;}
        if(verificacion.resultado!==null)
        {
            $.each(admisiones, function (index,value) {
                if(value.min<=verificacion.resultado && verificacion.resultado<=value.max){
                    verificacion.id_admision=value.id;
                    verificacion.nivel=value.nivel;
                    if(value.verificacion_estricta) value.verificacion=true;
                    setRadioVerificacion(value.verificacion,value.verificacion_estricta);
                    return false;
                }
            });
        }
        criterio.text(verificacion.nivel);
        verificacion_inicial = Object.assign({ }, verificacion);
    }
    $radioVerificacion.change(function() {
        if(this.value!=='true') setRadioVerificacion(false,false);
        else setRadioVerificacion(true,$('input[name=verificacion_estricta]:radio:checked').val()==='true');
    });
    $radioVerificacionEstricta.change(function () {
        setRadioVerificacion($('input[name=verificacion]:radio:checked').val()==='true',this.value==='true');
    });

    setVerificacion();
    console.log(scope,verificacion.resultado);


    //----------------incluyendo el criterio de origen
    function setMultiselect() {
        $("#criterio_origen").kendoMultiSelect({
            dataTextField: 'descripcion',
            dataValueField: 'id_criterio_origen',
            {if $ddjj}value:[{$ddjj->id_criterios}],{/if}
            dataSource: {
                transport: {
                    read: {
                        dataType: "json",
                        url: 'index.php?opcion=admAcuerdo&tarea=normas&id_acuerdo={$ddjj->acuerdo->id_acuerdo}',
                        cache: false
                    }
                }
            },
            open: function(e) {
                console.log(e);
                // var $criterio =$('#criterio_origen-list');
                solveDropdowns(e);
            }
        });
    }

    setMultiselect();
</script>