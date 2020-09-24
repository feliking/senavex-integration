<div class="ddjj-container">
    <div class="ddjj-body">
        <h2>REASIGNACIONES</h2>
        {foreach $reasignaciones as $reasignacion}
            <section class="ddjj-section">
                {if $reasignacion->observaciones->fecha_vencimiento}
                <div class="row-fluid form">
                    <label class="span3 ddjj-section-label" >
                        <span class="tooltip" title="Puede reasignar la fecha de vigencia">?</span>Fecha de Vencimiento:
                    </label>
                    <div class="span9 ddjj-section-field">
                        {$reasignacion->observaciones->fecha_vencimiento}
                    </div>
                </div>
                {/if}
                {if $reasignacion->observaciones->partida}
                <div class="row-fluid form">
                    <label class="span3 ddjj-section-label">
                        Subpartida Arancelaria:
                    </label>
                    <div class="span3 ddjj-section-field">
                        {$reasignacion->observaciones->partida->partida}
                    </div>
                    <label class="span3 ddjj-section-label">
                        Descripción nuevo arancel:
                    </label>
                    <div class="span3 ddjj-section-field" >
                        {$reasignacion->observaciones->partida->denominacion}
                    </div>
                </div>
                {/if}
                <div class="row-fluid form">
                    <label class="span3 ddjj-section-label">
                        Nota de Ref.:
                    </label>
                    <div class="span9 ddjj-section-field">
                        {$reasignacion->observaciones->ref}
                    </div>
                </div>
            </section>
        {/foreach}
    </div>
</div>
