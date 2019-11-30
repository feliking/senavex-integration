<section class="ddjj-section" >
    <span class="ddjj-section-alert">
        Nota.- En caso que el exportador no sea el productor de la mercancía a exportar, debe llenar los datos del productor o productores de quien adquiere la mercancia.
    </span>
    <label class="ddjj-section-label center bold"><span class="tooltip" title="En caso que el exportador sea comercializador (adquiere la mercancía terminada de un productor) debe registrar la siguiente información.">?</span>Es comercializador?
        <input type="radio" name="esComercializador" value="true" {if $ddjj && $ddjj->comercializador} checked{/if}> Si
        <input type="radio" name="esComercializador" value="false" {if $ddjj && !$ddjj->comercializador} checked{/if}> No</label>
    <div class="row-fluid fadein"><input type="hidden" name="hiddenvalidatorec" data-escomercializador=""></div>
    <div class="tabla_comercializadores_container {if ($ddjj && !$ddjj->comercializador) || !$ddjj}none{/if} fadein">
        <label class="ddjj-section-label">Agrege uno o más productores.</label>
        <div id="tabla_comercializadores" class="fadein"></div>
        <ul class="ul-buttons">
            <li>
                <input id="addfilacomercializador" type="button" value="Agregar Productor" class="k-button"  onclick="agregarfilacomercializador();"/>
            </li>
            <li>
                <input id="elimfilacomercializador" type="button" value="Remover Productor" class="k-button" onclick="eliminarfilacomercializador();"/>
            </li>
        </ul>
        <div class="row-fluid fadein"><input type="hidden" name="hiddenvalidatorpro" data-productor=""></div>
    </div>
    <div class="tabla_fabrica_comer {if ($ddjj && !$ddjj->comercializador) || !$ddjj}none{/if} fadein">
                    <span class="ddjj-section-alert">
                        Nota.- En caso que la dirección de la planta de producción o fábrica sea distinto al domicilio fiscal, agregue la siguiente información.
                        </span>
        <div class="row-fluid form">
            <label class="span5 ddjj-section-label"><span class="tooltip" title="En caso que el exportador tenga una dirección de fábrica distinta a la dirección del domicilio fiscal, deberá seleccionar la dirección registrada anteriormente.">?</span>Seleccione la dirección de la Fábrica donde se elabora la mercancía</label>
            <div class="span5" >
                <input id="combo_fabricas" name="combo_fabricas" class="form-select"
                       validationMessage="Por favor Introduzca la Fábrica"/>
            </div>
            <div class="span2">
                <input id="addfabrica" type="button" value="Agregar Fábrica" class="k-button form-button" onclick="addFabrica()"/>
            </div>
        </div>
    </div>
</section>