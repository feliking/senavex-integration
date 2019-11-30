<div class="border-section">
    <div class="row-fluid ">
        <label>Verificaciones antiguas {$empresaVerificacion->razon_social}</label><br><br>
    </div>
    {foreach $verificaciones as $verificacion}
    <div class="row-fluid form">
        <div class="span1 ddjj-section-label">
            Nro:
        </div>
        <div class="span1 ddjj-section-field"">
            {$verificacion->id_ver_verificacion}
        </div>
        <div class="span1 ddjj-section-label">
            Regional:
        </div>
        <div class="span2 ddjj-section-field"">
            {$verificacion->regional->ciudad}
        </div>
        <div class="span1 ddjj-section-label">
            Riesgo
        </div>
        <div class="span1 ddjj-section-field"">
            {$verificacion->nivel}
        </div>
        <div class="span2 ddjj-section-label">
            Fecha de Registro:
        </div>
        <div class="span1 ddjj-section-field"">
            {$verificacion->fecha_creacion}
        </div>
        <div class="span2">
            <button onclick="verVerificacion({$verificacion->id_ver_verificacion})">Ver Verificación</button>
        </div>
    </div>
    {/foreach}
</div>
