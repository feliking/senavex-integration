<div class="row-fluid form">
    <div class="ddjj-container fadein">
        <div class="ddjj-header">
            <div class="row-fluid">
                <div class="span12">
                    <img class="hidden-phone" src="styles/img/portada/logo.png">
                    <h1>Declaración Jurada de Origen</h1>
                    {if $ddjj && $ddjj->correlativo_ddjj}
                        <div class="ddjj-codigo">
                            N° DDJJ: {$representanteEmpresa[1]->ruex}-{$ddjj->correlativo_ddjj}
                        </div>
                    {/if}
                </div>
            </div>
        </div>
        <div class="ddjj-body">
            <h2>DATOS DE LA UNIDAD EXPORTADORA / PRODUCTIVA</h2>
            
            
           <section class="ddjj-section">
                <div class="row-fluid form">
                    <label class="span2 ddjj-section-label">1.1 No. RUEX:</label>
                    <div class="span2 ddjj-section-field">{$representanteEmpresa[1]->ruex}</div>
                    <label class="span2 ddjj-section-label">1.2 No. NIT:</label>
                    <div class="span2 ddjj-section-field">{$representanteEmpresa[1]->nit}</div>
                </div>
                <div class="row-fluid">
                    <label class="span2 ddjj-section-label">1.3 Razón Social:</label>
                    <div class="span10 ddjj-section-field">{$representanteEmpresa[1]->razon_social}</div>
                </div>
                <div class="row-fluid">
                    <label class="span2 ddjj-section-label">1.4 Domicilio Fiscal:</label>
                </div>
                <div class="row-fluid">
                   {$direccionTpl}
                </div>      
            </section>
            
            
            <h2>DATOS DE LA MERCANCÍA</h2>
            <section class="ddjj-section">
                <div class="row-fluid form">
                    <label class="span3 ddjj-section-label" >
                         Nombre Comercial:
                    </label>
                    <div class="span9 ddjj-section-field">
                        {$ddjj->denominacion_comercial}
                    </div>
                </div>
                <div class="row-fluid form">
                    <label class="span3 ddjj-section-label" >
                        Uso y Aplicación:
                    </label>
                    <div class="span9 ddjj-section-field">
                        {$ddjj->aplicacion}
                    </div>
                </div>
                <div class="row-fluid form">
                    <label class="span3 ddjj-section-label" >
                        Nombre Técnico:
                    </label>
                    <div class="span9 ddjj-section-field">
                        {$ddjj->nombre_tecnico}
                    </div>
                </div>
                {if $ddjj->caracteristicas}
                <div class="row-fluid form">
                    <label class="span4 ddjj-section-label" >
                        Caracteristicas Técnicas del Producto:
                    </label>
                    <div class="span8 ddjj-section-field">
                        {$ddjj->caracteristicas}
                    </div>
                </div>
                {/if}
                <div class="row-fluid form">
                    <label class="span2 ddjj-section-label">Subpartida Arancelaria:</label>
                    <div class="span4 ddjj-section-field">
                        {$ddjj->partida->partida}
                    </div>
                    <label class="span2 ddjj-section-label">Descripción Arancel</label>
                    <div class="span4 ddjj-section-field">
                        {$ddjj->partida->denominacion}
                    </div>
                </div>
                <div class="row-fluid form" >
                    <label class="span3 ddjj-section-label">Capacidad de producción mensual:</label>
                    <div class="span3 ddjj-section-field">
                        {$ddjj->produccion_mensual}
                    </div>
                    <label class="span3 ddjj-section-label">
                         Unidad de Medida Comercial:
                    </label>
                    <div class="span3 ddjj-section-field">
                        {$ddjj->id_unidad_medida}
                    </div>
                </div>
                {if $ddjj->muestra}
                    <div class="row-fluid form ">
                        <label class="span12 ddjj-section-label">
                             La mercancía es utilizada en ferias o muestras.
                        </label>
                    </div>
                {/if}
            </section>
            <h2>ACUERDO COMERCIAL O SISTEMA GENERALIZADO DE PREFERENCIAS</h2>
            <section  class="ddjj-section">
                <div class="row-fluid">
                    <label class="span5 ddjj-section-label">
                         Acuerdo Comercial o Sistema generalizado de Preferencias
                    </label>
                    <div class="span7 ddjj-section-field ">{$ddjj->acuerdo->descripcion} ({$ddjj->acuerdo->sigla})</div>
                </div>
                {if ($ddjj && $partidas|@count!=0 && $partidas!='')}
                    {foreach $partidas as $partida}
                        <div class="view_acuerdo_item">
                            <div class="row-fluid">
                                <label class="span2 ddjj-section-label">
                                     Clasificación Usada
                                </label>
                                <div class="span3 ddjj-section-field view_acuerdo_item_partida">
                                    {$partida->arancel}
                                </div>
                                <label class="span2 ddjj-section-label">
                                     Subpartida Arancelaria
                                </label>
                                <div class="span5 ddjj-section-field view_acuerdo_item_clacificacion">
                                    {$partida->partida}
                                </div>
                            </div>
                            <div class="row-fluid">
                                <label class="span3 ddjj-section-label">
                                     Descripción Arancel:
                                </label>
                                <div class="span9 ddjj-section-field view_acuerdo_item_descripcion">
                                    {$partida->denominacion}
                                </div>
                            </div>
                        </div>
                    {/foreach}
                {/if}
            </section>
            <h2>DETERMINACIÓN DEL CRITERIO DE ORIGEN</h2>
            <section class="ddjj-section">
                <table class="ddjj-table">
                    <thead><tr><th class="cell-lg">Acuerdo Comercial O Régimen Preferencial Seleccionado</th><th >Criterio de Origen, según Acuerdo Comercial o Régimen</th></tr></thead>
                    <tbody>
                    <tr>
                        <td class="view_acuerdo_label">
                            {$ddjj->acuerdo->descripcion} ({$ddjj->acuerdo->sigla})
                        </td>
                        <td id="view_criterio_origen">
                            {foreach $criterios as $criterio}{$criterio}{if not $criterio@last}, {/if}{/foreach}
                        </td>

                    </tr>
                    </tbody>
                </table>
                <!--table class="ddjj-table">
                    <thead><tr><th> REO</th></tr></thead>
                    <tbody>
                    <tr>
                        <td id="view_reo">
                            {$ddjj->reo}
                        </td>
                    </tr>
                    </tbody>
                </table-->
            </section>
            <label class="pointer" onclick="anadir('Ver DDJJ','admDeclaracionJurada','previewDeclaracion&id_declaracion_jurada={$ddjj->id_ddjj}');"> <h3>Ver Declaración Jurada Completa</h3></label>
        </div>
    </div>
</div>

