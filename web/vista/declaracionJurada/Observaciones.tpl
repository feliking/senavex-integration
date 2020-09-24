<div class="ddjj-container" id="observaciones_ddjj">
    <div class="ddjj-body">
        <div class="ddjj-section">
            <h2>Observaciones</h2>
            <label class="ddjj-section-label">
                Por favor tome nota de las siguientes observaciones y envie la declaración para su nueva revisión.
            </label>
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
                {/foreach}            </table>
            {/if}
            </div>
            <!--div class="row-fluid  form">
                <label class="span3 ddjj-section-label">
                    Consulta:
                </label>
                <div class="span9 ddjj-input">
                    <textarea id="observacion_general" name="observacion_general" class="k-textbox form-textarea" rows="8"></textarea>
                </div>
            </div-->
        </div>
    </div>
</div>

