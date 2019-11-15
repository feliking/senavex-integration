<div class="row-fluid  form  none" id="{$id}_notice_ddjj">
    <div class="span12 ddjj-container" >
        <div class="ddjj-notice-header">
            <div class="row-fluid">
                <div class="span12">
                    <h2>Aviso</h2>
                </div>
            </div>
        </div>
        <div class="ddjj-message">
            {$custom_message}
            <div id="notice_ddjj_message"></div>
        </div>
        <div class="row-fluid form" >
            <ul class="ul-buttons">
                <li>
                    <input type="button"  value="Aceptar" class="k-button btn-lg " onclick="acceptAction()"/>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
function acceptAction(){
    {if $alta_ddjj=="true" }
    remover(tabStrip.select());
    cerraractualizartab('Declaración Jurada','admDeclaracionJurada','declaracionesJuradas');
    {/if}
    {if $acuerdo=="true"}
    remover(tabStrip.select());
    cerraractualizartab('Acuerdos','admAcuerdo','acuerdos');
    {/if}
    {if $review_ddjj || $documentReview}
    remover(tabStrip.select());
    cerraractualizartab('Revisiones DDJJ','admDeclaracionJurada','listarRevisionDeclaracionJurada');
    {/if}
    {if $reasignarDeclaracion}
    remover(tabStrip.select());
    cerraractualizartab('Declaración Jurada','admDeclaracionJurada','listarRevisionDeclaracionJurada');
    {/if}
}
</script>