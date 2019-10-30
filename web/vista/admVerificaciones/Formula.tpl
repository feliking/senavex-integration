
<link rel="stylesheet" type="text/css" href="styles/css-personales/mathquill.css" media="screen" />
<script src="styles/js-personales/mathquill.min.js"></script>
<script src="styles/js-personales/Math.min.js"></script>
<div class="k-header">
    <div class="row-fluid form">
        <div class="span12">
            <div class="titulonegro">Formula de Análisis de Riesgo</div>
        </div>
    </div>
</div>
<div class="k-body" id="formula-container">
    <div class="row-fluid form">
        <section class="ddjj-section">
            <label class="ddjj-section-label">Variables a ser utilizadas en la formula.</label>
            <ul class="verificacion-list">
                {foreach from=$variables item=variable}
                    <li><em class="em-list">{$variable.variable}: </em><span class="tooltip" title="{$variable.ayuda}">?</span>{$variable.descripcion}</li>
                {/foreach}
            </ul>
            <div class="verificacion-formula">
                <span id="formula-rendered">{{$formula->formula}}</span>
            </div>
            <div class="row-fluid  form" id="editar-formula-boton">
                <div class="span5">
                </div>
                <div class="span2 ">
                    <input type="button" value="Editar Formula" onclick="editarFormula()" class="k-primary k-button form-button">
                </div>
                <div class="span5">
                </div>
            </div>
        </section>
        <section id="edicion-formula-container" style="display: none">
            <strong class="ddjj-section-label">Atención: El uso y Configuración de esta fórmula es uso exclusivo de la Unidad de Certificación de origen para fines de análisis de riesgo.</strong>
            <ul class="verificacion-buttons-list">
                {foreach from=$variables item=variable}
                    <li>
                        <button class="k-button form-small" onclick="botonFormula('{$variable.variable}')">{$variable.variable}</button>
                    </li>
                {/foreach}
                <li>
                    <button class="k-button form-small" onclick="botonFormula('^2')">x²</button>
                </li>
            </ul>
            <div class="row-fluid form">
                <label class="span3 ddjj-section-label">
                    Formula:
                </label>
                <div class="span9 ddjj-input">
                    <input type="hidden" value="{{$formula->formula}}" id="forumula_editor_inicial"/>
                    <input type="text" class="k-textbox no-restriccion" id="formula_editor" value="{{$formula->formula}}">
                    <span class="k-widget k-tooltip k-tooltip-validation k-invalid-msg fadein hidden"><span class="k-icon k-warning"> </span> Verifique el formato de la formula, recuerde usar *,-,+,/,(,) para las operaciones.</span>
                </div>
            </div>
            <div class="row-fluid form">
                <label class="span3 ddjj-section-label">
                    Justificativo:
                </label>
                <div class="span9 ddjj-input">
                    <textarea id="justificativoFormula" name="justificativoFormula" class="k-textbox form-textarea" rows="8" value=""></textarea>
                    <span class="k-widget k-tooltip k-tooltip-validation k-invalid-msg fadein hidden"><span class="k-icon k-warning"> </span> Por favor ingrese una justificación.</span>
                </div>
            </div>
            <div class="row-fluid  form" id="editar-formula-boton">
                <div class="span4">
                </div>
                <div class="span2 ">
                    <input type="button" value="Cancelar" onclick="editarFormula()" class="k-primary k-button form-button">
                </div>
                <div class="span2">
                    <input type="button" value="Guardar" onclick="guardarFormula()" class="k-primary k-button form-button"/>
                </div>
                <div class="span4">
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    var MQ = MathQuill.getInterface(2);
    math.sqrt(-4); // 2i

    var scope = {
        {foreach from=$variables item=variable}
        {$variable.variable}:{$variable@iteration},
        {/foreach}
    };
    // variables can be read from the scope

    var problemSpan = document.getElementById('formula-rendered');
    var editorInput=$( "#formula_editor" );
    var $justificativo=$('#justificativoFormula');

    editorInput.keydown(function (e) {
        if (!e.key.match(/[{foreach from=$variables item=variable}{$variable.variable}|{/foreach}+|\-|/|*|^|.|(|)|0-9]/)) e.preventDefault()
    });
    function renderMathFunction(){
        $('#formula-rendered').text(editorInput.val());
        MQ.StaticMath(problemSpan);
    };
    function editarFormula(){
        if($('#edicion-formula-container').is(':visible'))  cambiar('edicion-formula-container','editar-formula-boton');
        else cambiar('editar-formula-boton','edicion-formula-container');
    }
    function botonFormula(caracter){
        insertAtCaret('formula_editor',caracter);
        renderMathFunction();
    }
    function validarFormula(){
        var valid=true;
        $justificativo.next().addClass('hidden');
        editorInput.next().addClass('hidden');
        if($("#forumula_editor_inicial").val()==editorInput.val()){
            valid=false;
            editorInput.next().html('<span class="k-icon k-warning"> </span> No se modifico la Formula').removeClass('hidden');
        }
        if($justificativo.val()==''){
            valid=false;
            $justificativo.next().html('<span class="k-icon k-warning"> </span>Por favor ingrese una justificación.').removeClass('hidden');
        }
        try {
            var testResult=math.eval(editorInput.val(), scope);
            console.log(testResult);
        }
        catch(err) {
            editorInput.next().html(' <span class="k-icon k-warning"> </span> Verifique el formato de la formula, recuerde usar *,-,+,/,(,) para las operaciones.').removeClass('hidden');
            valid=false;
        }
        return valid;
    }
    function guardarFormula(){
        if(validarFormula()){
            var variables_array=editorInput.val().match(/[a-zA-Z]+/g);
            $.ajax({
                type: 'post',
                url: 'index.php',
                data:{
                    opcion:'admAnalisisRiesgo',
                    tarea:'guardarFormula',
                    formula:editorInput.val(),
                    justificativo:$justificativo.val(),
                    variables:variables_array.join()
                },
                success: function(data) {
                    var data = JSON.parse(data);
                    if(!+data.status) fadeMessage('ocurrio un error',data.message);
                    cerraractualizartab('Análisis de Riesgo','admAnalisisRiesgo','analisisContenido');
                }
            });
        }
    }

    var tooltip = $("#formula-container").kendoTooltip({
        filter: ".tooltip",
        width: 400,
        position: "top"
    }).data("kendoTooltip");

    editorInput.keyup(renderMathFunction);
    renderMathFunction();
</script>

