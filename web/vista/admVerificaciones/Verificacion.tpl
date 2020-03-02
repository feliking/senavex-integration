<div class="k-block" id="verificacion_edicion_template">
    <div class="k-header">
        <div class="row-fluid form">
            <div class="span12">
                <div class="titulonegro"> Verificacion Nro {$verificacion->id_ver_verificacion}</div>
            </div>
        </div>
    </div>
    <div class="k-body ddjj-container">
        <div class="row-fluid form">
            <div class="span2 ddjj-section-label">
                Producto de la Verificación:
            </div>
            <div class="span4 ddjj-section-field">
               {$verificacion->ddjj->denominacion_comercial}
            </div>
            <div class="span2 ddjj-section-label">
                Regional:
            </div>
            <div class="span4 ddjj-section-field">
                {$verificacion->regional->ciudad}
            </div>
        </div>
        <div class="row-fluid form">
            <div class="span2 ddjj-section-label">
                Riesgo:
            </div>
            <div class="span2 ddjj-section-field">
                {$verificacion->nivel}
            </div>
            <div class="span2 ddjj-section-label">
                Fecha de Registro:
            </div>
            <div class="span2 ddjj-section-field">
                {$verificacion->fecha_creacion}
            </div>
            <div class="span2 ddjj-section-label">
                Estado:
            </div>
            <div class="span2 ddjj-section-field">
                {$verificacion->estado->denominacion}
            </div>
        </div>
        {if $verificacion->verificacion_personal}
        <div class="row-fluid form">
            <div class="span3 ddjj-section-label">
                Persona que asigno:
            </div>
            <div class="span9 ddjj-section-field">
                {$persona->getNombreCompleto()}
            </div>
        </div>
            {if $justificacion_personal}
            <div class="row-fluid form">
                <div class="span3 ddjj-section-label">
                    Justificación:
                </div>
                <div class="span9 ddjj-section-field">
                    {$justificacion_personal}
                </div>
            </div>
            {/if}
        {else}
        <div class="row-fluid form">
            <label for="">El sistema asigno automaticamente esta visita de verificación.</label>
        </div>
        {/if}
        <div class="row-fluid form">
            <div class="span3 ddjj-section-label">
                Nro. de Informe:
            </div>
            <div class="span8">
                <input type="text" name="nroInforme" id="nroInforme" class="k-textbox" {if $verificacion->informe}value="{$verificacion->informe}"{/if} />
                <span class="k-widget k-tooltip k-tooltip-validation k-invalid-msg hidden fadein" id="nroInformeValidation"><span class="k-icon k-warning"> </span> Ingrese el Informe respectivo.</span>
            </div>
            <div>
                <button class="k-button" onclick="guardarInforme({$verificacion->id_ver_verificacion})">Guardar</button>
            </div>
        </div>
        {if $verificacion->verificacion_estricta AND ($verificacion->id_ver_estado_verificacion !=0 OR $verificacion->id_ver_estado_verificacion !=1)}
            <div class="row-fluid form">
                <div class="span12">
                    Esta visita de verificacion requiere ser atendida con prioridad ya que es una <strong>verifcación previa a la emisión de DDJJ </strong> , la emisión de la declaración jurada se postergara hasta que se realize la visita de verificación.
                </div>
            </div>
        {/if}

        {if $admin AND $regionales_personal}  {* ///mstarmos la regional y el personal para escojer*}
            {include file=$regionales_personal}
        {else}
            <div class="row-fluid form">
                <div class="span2 ddjj-section-label">
                    Regional:
                </div>
                <div class="span4 ddjj-section-field">
                    {$verificacion->regional->ciudad}
                </div>
                {if $nombre_completo_revision}
                    <div class="span2 ddjj-section-label">
                        Persona que {if $verificacion->id_ver_estado_verificacion ==1} revisara {else}reviso{/if}:
                    </div>
                    <div class="span4 ddjj-section-field">
                        {$nombre_completo_revision}
                    </div>
                {/if}
            </div>
        {/if}

        {if $ddjj_resumen} {* // vista resumen de la declaracion jurada*}
            <section class="accordion close">
                <div class="accordion-item">
                    <strong> Ver Declaración Jurada</strong>
                </div>
                {include file=$ddjj_resumen}
            </section>
        {/if}
        {if $verificaciones_antiguas} {* // verificaciones antiguas que se ralizaron a la misma empresa*}
            <section class="accordion close">
                <div class="accordion-item"  >
                    <strong> Ver Verificaciones Antiguas</strong>
                </div>
                {include file=$verificaciones_antiguas}
            </section>
        {/if}
        {if $admin}
        <div class="row-fluid form">
            <ul class="ul-buttons ">
                <li>
                    <button class="k-button" onclick="remover(tabStrip.select());">Cerrar</button>
                </li>
                {if $verificacion->id_ver_estado_verificacion!=2 AND $verificacion->id_ver_estado_verificacion!=3}
                <li>
                    <button class="k-button" onclick="eliminarVerificacion({$verificacion->id_ver_verificacion})">Eliminar</button>
                </li>
                {/if}
            </ul>
        </div>
        {else}
            {include file='admVerificaciones/RevisionAnalista.tpl'}
        {/if}
    </div>
</div>
{include file="declaracionJurada/LoadingDeclaracionJurada.tpl" customtitle="Actualizando Verificación..." id="verificaion_"}



