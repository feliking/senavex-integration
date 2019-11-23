<div class="border-section">
    <div class="row-fluid ">
        <label>Visita de Verificacion</label>
    </div>
    <div class="row-fluid form">
        <div class="span3 ddjj-section-label">
            Resumen:
        </div>
        <div class="span9">
            <textarea name="" id="verificacionResultado" cols="30" rows="10" class="k-textbox skip-restriccion"></textarea>
            <span class="k-widget k-tooltip k-tooltip-validation k-invalid-msg hidden fadein" id="verificacionResultadoValidation">
                <span class="k-icon k-warning"> </span> Ingrese un resumen de la visita de verificación.
            </span>
        </div>
    </div>
    <div class="row-fluid form">
        <div class="span12 ddjj-section-label">
            Resultado de la visita verificación:
            <input type="radio" name="verificacionResultadoRadio" value="true"> La Declaración Jurada cumple con el criterio.
            <input type="radio" name="verificacionResultadoRadio" value="false"> La Declaración Jurada no cumple con el criterio.
            <span class="k-widget k-tooltip k-tooltip-validation k-invalid-msg hidden fadein" id="verificacionResultadoRadioValidation">
                <span class="k-icon k-warning"> </span> Escoja almenos una opcion para la conclusión visita de verificación.
            </span>
        </div>
    </div>
    <div class="row-fluid  form">
        <div class="span4">
        </div>
        <div class="span2 ">
            <input id='aceptarVerificacionDdjj' type="button" value="Aceptar DDJJ" onclick="aceptarVerificacionDdjj({$verificacion->id_ver_verificacion})" class="k-primary k-button form-button tooltip-item fadein"
                   title="Concluira con la visita de verificación. Si la visita de verificación es estrica, aprobara la declaración para que esta pueda ser utilizada.">
        </div>
        <div class="span2">
            <input id='rechazarVerificacionDdjj' type="button" value="Rechazar DDJJ" onclick="rechazarVerificacionDdjj({$verificacion->id_ver_verificacion})" class="k-primary k-button form-button tooltip-item fadein"
                   title="Concluira con la visita de verificación. Deshabilitara el uso de la Declaracion Jurada.">
        </div>
        <div class="span4">
        </div>
    </div>
</div>
<script>
    $('input[name=verificacionResultadoRadio]').change(function(){
        if($(this).val()=="true") {
            $('#aceptarVerificacionDdjj').removeClass('hidden');
            $('#rechazarVerificacionDdjj').addClass('hidden');
        }
        else{
            $('#aceptarVerificacionDdjj').addClass('hidden');
            $('#rechazarVerificacionDdjj').removeClass('hidden');
        }
    });
</script>