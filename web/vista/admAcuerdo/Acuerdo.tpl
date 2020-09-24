<form name="alta_ddjj" id="alta_ddjj" method="post" class="k-block fadein"  action="index.php">
    <div class="k-header">
        <div class="row-fluid form">
            <div class="span12">
                <div class="titulonegro" > Nuevo Acuerdo</div>
            </div>
        </div>
    </div>
    <div class="k-body">
        <div class="row-fluid form">
            <div class="span2 parametro" >
                Denominación:
            </div>
            <div class="span4 campo" >
                {$acuerdo->descripcion}
            </div>
            <div class="span2 parametro" >
                Sigla:
            </div>
            <div class="span4 campo" >
                {$acuerdo->sigla}
            </div>
        </div>
        <div class="row-fluid form">
            <div class="span2 parametro" >
                Estado:
            </div>
            <div class="span2 campo" >
                {$acuerdo->estado_acuerdo->descripcion}
            </div>
            <div class="span2 parametro" >
                Arancel:
            </div>
            <div class="span6 campo" >
                {foreach $aranceles as $arancel}{$arancel->denominacion}{if not $arancel@last}, {/if}{/foreach}
            </div>
        </div>
        <div class="row-fluid form">
            <div class="span2 parametro" >
                Tipo de acuerdo:
            </div>
            <div class="span2 campo" >
                {$acuerdo->tipo_acuerdo->descripcion}
            </div>
            <div class="span2 parametro" >
                Tipo de valor:
            </div>
            <div class="span2 campo" >
                {$acuerdo->tipo_valor_internacional->descripcion}
            </div>
            <div class="span2 parametro" >
                Tipo de CO:
            </div>
            <div class="span2 campo" >
                {$acuerdo->tipo_co->descripcion}
            </div>
        </div>
        <div class="row-fluid form">
            <div class="span2 parametro" >
                Vigencia DDJJ:
            </div>
            <div class="span2 campo">
                {$acuerdo->vigencia_ddjj} dias
            </div>
            <div class="span2 parametro" >
                Fecha Creacion:
            </div>
            <div class="span2 campo">
                {$acuerdo->fecha_creacion}
            </div>
            {if $acuerdo->fecha_baja != ''}
            <div class="span2 parametro">
                Fecha Baja:
            </div>
            <div class="span2 campo">
                {$acuerdo->fecha_baja}
            </div>
            {/if}
        </div>
        {if $acuerdo->criterio_origen|@count!=0}
        <div class="row-fluid form">
            <table class="ddjj-table">
                <thead><tr><th>Criterio de Origen</th><th>Descripción</th></tr></thead>
                <tbody>
                {foreach $acuerdo->criterio_origen as $criterio_origen}
                    {if $criterio_origen->activo}
                    <tr >
                        <td>{$criterio_origen->descripcion}</td>
                        <td>{$criterio_origen->parrafo}</td>
                    </tr>
                    {/if}
                {/foreach}
                </tbody>
            </table>
        </div>
        {/if}
        {if $editable}
        <div class="row-fluid form" >
            <ul class="ul-buttons">
                <li>
                    <input type="button"  value="Editar" class="k-button btn-lg " onclick="cerraractualizartab('Edición {$acuerdo->descripcion}','admAcuerdo','formAcuerdo&id_acuerdo={$acuerdo->id_acuerdo}')"/>
                </li>
            </ul>
        </div>
        {/if}
    </div>
</form>

