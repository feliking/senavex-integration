<section class="ddjj-section">
    <div class="row-fluid form">
        <label class="span2 ddjj-section-label ">1.1 No. RUEX:</label>
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
        {assign var="ds_id" value=$representanteEmpresa[1]->direccion}
        {include file="admDireccion/Direccion_Show.tpl" }
    </div>
</section>
