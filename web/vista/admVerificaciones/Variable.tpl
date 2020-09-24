<div class="k-header">
    <div class="row-fluid form">
        <div class="span12">
            <div class="titulonegro">Edición {$variable->descripcion}</div>
        </div>
    </div>
</div>
<div class="k-body">
    <div class="row-fluid form">
        <label class="ddjj-section-label">Configure los posibles valores de la variable.</label>
        <label class="ddjj-section-label">{$variable->ayuda}</label>

        <form id="valores_form">
            <input type="hidden" name="id_ver_tipo_variable" value="{$variable->id_ver_tipo_variable}"/>
            <input type="hidden" name="id_ver_variable" value="{$variable->id_ver_variable}"/>
            <section class="row-fluid  form">
            {if $variable->id_ver_tipo_variable==1}
                {foreach $variable->valores_booleanos as $valores}
                    {$valores->descripcion} <div class="input-number-container"><input min="0" type="text"  value="{$valores->valor}" name="valor_{$valores->id_ver_variable_valor}" class="input-number"/></div>
                {/foreach}
            {elseif $variable->id_ver_tipo_variable==2}
                <button type="button" class="k-primary k-button" onclick="aumentarRango()"><span class="k-icon k-add"></span> Añadir Rango</button>
                <ul class="verificacion-rango-list">
                    {foreach $variable->valores_rangos as $rango}
                        {if $rango->estado}
                        <li>
                            Min:<div class="input-number-container"><input min="0" type="text"  value="{$rango->min}" name="min_{$rango->id_ver_rango}" class="input-number"/></div>
                            Max:<div class="input-number-container"><input min="0" type="text"  value="{$rango->max}" name="max_{$rango->id_ver_rango}" class="input-number"/></div>
                            Valor:<div class="input-number-container"><input min="0" type="text"  value="{$rango->valor}" name="valor_{$rango->id_ver_rango}" class="input-number"/></div>
                            <button type="button" class="k-primary k-button" onclick="eliminarRango(this,'{$rango->id_ver_rango}')">Eliminar</button>
                        </li>
                        {/if}
                    {/foreach}
                </ul>
            {elseif $variable->id_ver_tipo_variable==3}
                <ul class="verificacion-opciones-list">
                    <input type="hidden" name="tabla_modelo" value="{$variable->tabla_modelo}"/>
                {foreach $opciones as $opcion}
                    <li>
                        {$opcion->descripcion}
                        <div class="input-number-container"><input min="0" type="text"  value="{$opcion->criterio_valor}" name="valor_{$opcion->id}" class="input-number"/></div>
                    </li>
                {/foreach}
                </ul>
            {/if}
            </section>
        </form>
        <div class="row-fluid  form">
            <div class="span4">
            </div>
            <div class="span2 ">
                <input type="button" value="Volver" onclick="cancelarValores()" class="k-primary k-button form-button">
            </div>
            <div class="span2">
                <input type="button" value="Guardar" onclick="guardarValores()" class="k-primary k-button form-button"/>
            </div>
            <div class="span4">
            </div>
        </div>
    </div>
</div>
<script>
var rangoArray=[ //id de variables rango por defecto
    {if $variable->id_ver_tipo_variable==2}
    {foreach $variable->valores_rangos as $rango}
    {if $rango->estado} '{$rango->id_ver_rango}',{/if}
    {/foreach}
    {/if}
];
var formatoNumber={if $variable->id_ver_tipo_variable==2}{ format:"0",decimals: 0 }; {else} { format:"n" };{/if}
function cancelarValores(){
    abrirSeccion('admAnalisisRiesgo',$('#variables-button')[0]);
}

function guardarValores() {
    $('.verificacion-container').addClass('loading-block');
    var data='&tarea=guardarValores&' + $('#valores_form').serialize();
    {if $variable->id_ver_tipo_variable==2}
        data+='&rangoArray='+JSON.stringify(rangoArray);
    {/if}
    $.ajax({
        type: 'post',
        url: 'index.php',
        data: 'opcion=admAnalisisRiesgo'+data,
        success: function (data) {
            $('.verificacion-container').removeClass('loading-block');
            var data = JSON.parse(data);
            if (!+data.status) alert('ocurrio un error: ' + data.message);
            abrirSeccion('admAnalisisRiesgo', $('#variables-button')[0]);
        }
    });
}
var count = 0;
function aumentarRango(){
    var nuevoRango= '<li id="new_'+count+'">' +
            'Min:<div class="input-number-container"><input min="0" type="text"  value="0" name="min_n'+count+'" class="input-number"/></div> ' +
            'Max:<div class="input-number-container"><input min="0" type="text"  value="0" name="max_n'+count+'" class="input-number"/></div> ' +
            'Valor:<div class="input-number-container"><input min="0" type="text"  value="0" name="valor_n'+count+'" class="input-number"/></div> ' +
            ' <button class="k-primary k-button" onclick="eliminarRango(this,\'n'+count+'\')">Eliminar</button> </li> ';
    $('.verificacion-rango-list').append(nuevoRango);
    $('#new_'+count).find('.input-number').kendoNumericTextBox(formatoNumber);
    rangoArray.push('n'+count);
    count++;
}
function eliminarRango(target,id_rango){
    var index =rangoArray.indexOf(id_rango);
    if (index > -1)  rangoArray.splice(index, 1);

    if(!id_rango.startsWith('n')){
        $('.verificacion-container').addClass('loading-block');
        $.ajax({
            type: 'post',
            url: 'index.php',
            data: 'opcion=admAnalisisRiesgo&tarea=eliminarRango&id_ver_rango=' + id_rango,
            success: function (data) {
                $('.verificacion-container').removeClass('loading-block');
                var data = JSON.parse(data);
                if (!+data.status) alert('ocurrio un error: ' + data.message);
                $(target).closest('li').remove();
            }
        });
    }else{
        $(target).closest('li').remove();
    }
}
$('#valores_form .input-number').kendoNumericTextBox(formatoNumber);

</script>



