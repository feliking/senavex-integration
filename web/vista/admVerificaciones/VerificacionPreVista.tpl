<div class="k-block">
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
        {if $verificacion->informe}
        <div class="row-fluid form">
            <div class="span3 ddjj-section-label">
                Nro. de Informe:
            </div>
            <div class="span9 ddjj-section-field">
                {$verificacion->informe}
            </div>
        </div>
        {/if}
        {if $verificacion->verificacion_personal}
        <div class="row-fluid form">
            <div class="span3 ddjj-section-label">
                Persona que asigno:
            </div>
            <div class="span9 ddjj-section-field">
                {$nombre_completo}
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
        <div class="row-fluid">
            El sistema asigno automaticamente esta visita de verificación.
        </div>
        {/if}
        
        
        
        
        
        {if $verificacion->id_regional}
            <div class="row-fluid form">
                {if $nombre_completo_revision}
                    <div class="span2 ddjj-section-label">
                        Persona que {if $verificacion->id_ver_estado_verificacion ==1} revisara {else}reviso{/if}:
                    </div>
                    <div class="span4 ddjj-section-field">
                        {$nombre_completo_revision}
                    </div>
                {/if}
                {if $verificacion->fecha_asignacion_verificacion}
                <div class="span2 ddjj-section-label">
                    Fecha de Asignación:
                </div>
                <div class="span1 ddjj-section-field">
                    {$verificacion->fecha_asignacion_verificacion}
                </div>
                {/if}
                <div class="span1 ddjj-section-label">
                    Regional:
                </div>
                <div class="span2 ddjj-section-field">
                    {$verificacion->regional->ciudad}
                </div>
            </div>
        {/if}
        
        
        
        
        
        
        
        {if $verificacion->verificacion_estricta AND ($verificacion->id_ver_estado_verificacion !=0 OR $verificacion->id_ver_estado_verificacion !=1)}
            <div class="row-fluid form">
                <div class="span12">
                    Esta visita de verificacion requiere ser atendida con prioridad ya que es una <strong>Verificación que postergara la emisión de la DDJJ</strong>, hasta que se realize la visita de verificación.
                </div>
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
                <div class="accordion-item">
                    <strong> Ver Verificaciones Antiguas</strong>
                </div>
                {include file=$verificaciones_antiguas}
            </section>
        {/if}
        
        
    </div>
</div>



