<div class="row-fluid form" id="{$id}">
    <div class="ddjj-container fadein">
        <div class="ddjj-header">
            <div class="row-fluid">
                <div class="span12">
                    <img class="hidden-phone" src="styles/img/portada/logo.png">
                    <h1>Declaración Jurada de Origen</h1>
                    {if $ddjj }
                        <div class="ddjj-codigo">
                            {if $ddjj->correlativo_ddjj}
                                <p>N° DDJJ: {$representanteEmpresa[1]->ruex}-{$ddjj->correlativo_ddjj}</p>
                            {/if}
                            {if $fecha_vencimiento}
                                <p>Vencimiento: {$fecha_vencimiento}</p>
                            {/if}
                            {if $estado}
                                <p>{$estado}</p>
                            {/if}

                        </div>
                    {/if}
                </div>
            </div>
        </div>
        <div class="ddjj-body">
            <h2>I. DATOS DEL EXPORTADOR</h2>
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

            <section>
                <h2>II. DATOS DEL PRODUCTOR</h2>
                {if $edition || $ddjj->comercializador}
                    <div id="view_productor">
                        <section class="ddjj-section" >
                            <table class="ddjj-table">
                                <thead><tr><th>2.1 Nombre o Razón Social del Productor</th><th>2.2 Domicilio Legal</th><th>2.3 Repr. Legal</th><th>2.4 CI o NIT</th><th>2.5 Teléfono y/o N° de celular</th><th>2.6 Precio Venta al Exportador en $us</th><th>2.7 Unidad de Medida</th><th>2.8 Cap. Producción Mensual</th><th>2.9 Dirección de Fábrica</th></tr></thead>
                                <tbody>
                                {foreach $ddjj->comercializadores as $productor}
                                    <tr>
                                        <td>{$productor->razon_social}</td>
                                        <td>{$productor->domicilio_legal}</td>
                                        <td>{$productor->representante_legal}</td>
                                        <td>{$productor->ci_nit}</td>
                                        <td>{$productor->telefono}</td>
                                        <td>{$productor->precio_venta}</td>
                                        <td>{foreach $unidadmedida as $um}{if $um->id_unidad_medida==$productor->id_unidad_medida}{$um->descripcion}{/if}{/foreach}</td>
                                        <td>{$productor->produccion_mensual}</td>
                                        <td>{$productor->direccion_fabrica}</td>
                                    </tr>
                                {/foreach}
                                </tbody>
                            </table>
                        </section>
                    </div>
                {else}
                    <div id="ddjj_fabrica">
                        <section class="ddjj-section" >
                            <div class="row-fluid form">
                                <label class="span4 ddjj-section-label">2.1 Dirección de la Planta de Producción o fábrica:</label>
                                <div class="span4 ddjj-section-field" id="view_fabrica">{{$direccion->nombre_direccion_tipo_calle}}</div>
                                <label class="span2 ddjj-section-label">2.2 :</label>
                                <div class="span2 ddjj-section-field" id="view_fabrica_ciudad">{{$direccion->id_departamento}}</div>
                            </div>
                            <div class="row-fluid form">
                                <label class="span4 ddjj-section-label" >2.3 Nombre de Contacto:</label>
                                <div class="span4 ddjj-section-field" id="view_fabrica_contacto">{{$fabrica->persona_contacto}}</div>
                                <label class="span2 ddjj-section-label">2.4 Teléfono:</label>
                                <div class="span2 ddjj-section-field" id="view_fabrica_telefono">{{$direccion->telefono_fijo}}</div>
                            </div>
                        </section>
                    </div>
                {/if}
            </section>


            {*{if $ddjj->fabrica == 0}*}
            {*<div id="view_combo_fabricas_container">*}
            {*<h2>FABRICA</h2>*}
            {*<section class="ddjj-section">*}
            {*<div class="row-fluid form">*}
            {*<label class="span5 ddjj-section-label">Seleccione la Fábrica donde se elabora la mercancía</label>*}
            {*<div id="view_combo_fabricas" class="span7 ddjj-section-field">*}
            {*{$ddjj->fabrica->ciudad} - {$ddjj->fabrica->direccion}*}
            {*</div>*}
            {*</div>*}
            {*</section>*}
            {*</div>*}
            {*{/if}*}
            <h2>III. DATOS DE LA MERCANCÍA</h2>
            <section class="ddjj-section">
                <div class="row-fluid form">
                    <label class="span3 ddjj-section-label" >
                        3.1 Nombre Comercial:
                    </label>
                    <div class="span9 ddjj-section-field" id="view_denominacion_comercial">
                        {$ddjj->denominacion_comercial}
                    </div>
                </div>
                <div class="row-fluid form">
                    <label class="span3 ddjj-section-label" >
                        3.2 Uso y Aplicación:
                    </label>
                    <div class="span9 ddjj-section-field" id="view_aplicacion">
                        {$ddjj->aplicacion}
                    </div>
                </div>
                <div class="row-fluid form">
                    <label class="span3 ddjj-section-label" >
                        3.3 Nombre Técnico:
                    </label>
                    <div class="span9 ddjj-section-field" id="view_nombre_tecnico">
                        {$ddjj->nombre_tecnico}
                    </div>
                </div>
                {if $ddjj->caracteristicas}
                <div class="row-fluid form">
                    <label class="span4 ddjj-section-label" >
                        3.4 Especificaciones de la mercancia:
                    </label>
                    <div class="span8 ddjj-section-field" id="view_caracteristicas">
                        {$ddjj->caracteristicas}
                    </div>
                </div>
                {/if}
                <div class="row-fluid form">
                    <label class="span2 ddjj-section-label">3.5 Subpartida Arancelaria:</label>
                    <div class="span4 ddjj-section-field" id="view_ddjj_arancel">
                        {$ddjj->partida->partida}
                    </div>
                    <label class="span2 ddjj-section-label">3.6 Descripción Arancel</label>
                    <div class="span4 ddjj-section-field" id="view_descripcion_arancel">
                        {$ddjj->partida->denominacion}
                    </div>
                </div>
                <div class="row-fluid form" >
                    <label class="span3 ddjj-section-label">3.7 Capacidad de producción mensual:</label>
                    <div class="span3 ddjj-section-field" id="view_produccion_mensual_mercancia">
                        {$ddjj->produccion_mensual}
                    </div>
                    <label class="span3 ddjj-section-label">
                        3.8 Unidad de Medida Comercial:
                    </label>
                    <div class="span3 ddjj-section-field" id="view_unidadmedida">
                        {$ddjj->id_unidad_medida}
                    </div>
                </div>

            </section>
            <h2>IV. TRATAMIENTO ESPECIAL</h2>
            <section class="ddjj-section">

                <label class="span12 ddjj-section-label">
                    4.1 La mercancía es utilizada en ferias o muestras.</label>
                <div class="span3 ddjj-section-field">
                    <div id="view_muestra" class="row-fluid form "></div>
                    {if $ddjj->muestra===true}
                        SI
                    {/if}
                    {if $ddjj->muestra===false}
                        NO
                    {/if}
                </div>
            </section>
            <h2>V. ACUERDO COMERCIAL O SISTEMA GENERALIZADO DE PREFERENCIAS</h2>
            <section  id="view_acuerdo_container" class="ddjj-section">
                <div class="row-fluid">
                    <label class="span5 ddjj-section-label">
                        5.1 Acuerdo Comercial o Sistema generalizado de Preferendcias
                    </label>
                    <div class="span7 ddjj-section-field view_acuerdo_label">{$ddjj->acuerdo->descripcion} ({$ddjj->acuerdo->sigla})</div>
                    <section  id="view_acuerdo_container" class="ddjj-section">
                    </section>
                </div>
                {if ($ddjj && $partidas|@count!=0 && $partidas!='')}
                    {foreach $partidas as $partida}
                        <div class="view_acuerdo_item">
                            <div class="row-fluid">
                                <label class="span2 ddjj-section-label">
                                    5.2 Clasificación Usada
                                </label>
                                <div class="span3 ddjj-section-field view_acuerdo_item_partida">
                                    {$partida->arancel}
                                </div>
                                <label class="span2 ddjj-section-label">
                                    5.3 Clasificación Arancelaria
                                </label>
                                <div class="span5 ddjj-section-field view_acuerdo_item_clacificacion">
                                    {$partida->partida}
                                </div>
                            </div>
                            <div class="row-fluid">
                                <label class="span3 ddjj-section-label">
                                    5.4 Descripción Arancel:
                                </label>
                                <div class="span9 ddjj-section-field view_acuerdo_item_descripcion">
                                    {$partida->denominacion}
                                </div>
                            </div>
                        </div>
                    {/foreach}
                {/if}

            </section>
            <h2>VI. COMPONENTES QUE FORMAN PARTE DE LA ESTRUCTURA DE LA MERCANCÍA</h2>
            {if ($ddjj && $ddjj->insumosnacionales|@count!=0) || !$ddjj}
                <section class="ddjj-section" id="view_insumos_nacionales">
                    <label class="ddjj-section-label">6.1 Materiales e Insumos Nacionales:</label>
                    <table class="ddjj-table">
                        <thead><tr><th>Nombre Comercial</th><th>Nombre o Razón Social</th><th>CI o NIT</th><th>No. Telf. Productor</th><th>Unidad de Medida</th><th>Cantidad</th><th>Valor ($us)</th><th>% Sobrevalor</th></tr></thead>
                        <tbody>
                        {foreach $ddjj->insumosnacionales as $insumonacional}
                            <tr>
                                <td>{$insumonacional->descripcion}</td>
                                <td>{$insumonacional->nombre_fabricante}</td>
                                <td>{$insumonacional->ci}</td>
                                <td>{$insumonacional->telefono_fabricante}</td>
                                <td>{foreach $unidadmedida as $um}{if $um->id_unidad_medida==$insumonacional->unidad_medida}{$um->descripcion}{/if}{/foreach}</td>
                                <td>{$insumonacional->cantidad}</td>
                                <td>{$insumonacional->valor}</td>
                                <td>{$insumonacional->sobrevalor}%</td>
                            </tr>
                        {/foreach}
                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="ddjj-table-total-label">6.2 Total:</td>
                            <td class="ddjj-table-total view-total-valor">{$ddjj->valor_total_insumosnacional}</td>
                            <td class="ddjj-table-total view-total-sobrevalor">{$ddjj->sobrevalor_total_insumosnacional}%</td>
                        </tr>
                        </tfoot>
                    </table>
                </section>
            {/if}
            {if ($ddjj && $ddjj->insumosimportados|@count!=0) || !$ddjj}
                <section class="ddjj-section" id="view_insumosimportados">
                    <label class="ddjj-section-label">6.3 Materiales e Insumos, Importados Directamente o Extranjeros Adquiridos en el Mercado Nacional:</label>
                    <table class="ddjj-table">
                        <thead><tr><th>Nombre Comercial</th><th>Nombre Tecnico</th><th>Código Arancelario</th><th>País de Origen</th><th>Nombre o Razón Social</th><th>Cuenta C.O.</th><th>Acuerdo Comercial</th><th>Unidad de Medida</th><th>Cantidad</th><th>Valor($us)</th><th>% Sobrevalor</th></tr></thead>
                        <tbody>
                        {foreach $ddjj->insumosimportados as $insumoimportado}
                            <tr>
                                <td>{$insumoimportado->descripcion}</td>
                                <td>{$insumoimportado->nombre_tecnico}</td>
                                <td>{$insumoimportado->id_detalle_arancel}</td>
                                <td>{foreach $paises as $pais}{if $pais->id_pais==$insumoimportado->id_pais}{$pais->nombre}{/if}{/foreach}</td>
                                <td>{$insumoimportado->razon_social_productor}</td>
                                <td>{if $insumoimportado->tiene_certificado_origen}SI{else}NO{/if}</td>
                                <td>{if $insumoimportado->id_acuerdo ==0}NINGUNO{else}{foreach $acuerdos as $acuerdo}{if $acuerdo->id_acuerdo==$insumoimportado->id_acuerdo}{$acuerdo->sigla}{/if}{/foreach}{/if}</td>
                                <td>{foreach $unidadmedida as $um}{if $um->id_unidad_medida==$insumoimportado->id_unidad_medida}{$um->descripcion}{/if}{/foreach}</td>
                                <td>{$insumoimportado->cantidad}</td>
                                <td>{$insumoimportado->valor}</td>
                                <td>{$insumoimportado->sobrevalor}%</td>
                            </tr>
                        {/foreach}
                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="ddjj-table-total-label">6.4 Total:</td>
                            <td class="ddjj-table-total view-total-valor">{$ddjj->valor_total_insumosimportados}</td>
                            <td class="ddjj-table-total view-total-sobrevalor">{$ddjj->sobrevalor_total_insumosimportados}%</td>
                        </tr>
                        </tfoot>
                    </table>
                </section>
            {/if}
            <section class="ddjj-section">
                <div class="row-fluid form">
                    <label class="span6 ddjj-section-label">6.5 Mano de Obra, otros costos de Fabricación y Unidad:</label>
                    <div class="ddjj-total">
                        Total % sobre el valor:<div id="view_totalSobrevalorMO" class="ddjj-total-input ddjj-section-field">{$ddjj->sobrevalor_mano_obra}%</div>
                    </div>
                    <div class="ddjj-total">
                        Total Valor ($us): <div id="view_totalValorMO" class="ddjj-total-input ddjj-section-field">{$ddjj->valor_mano_obra}</div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="row-fluid form">
                    <label class="span6 ddjj-section-label">6.6 Total Valor en Fabrica por Producto: (Campo 6.6) = (Campo 6.2) + (Campo 6.4) + (Campo 6.5)</label>
                    <div class="ddjj-total">
                        Total % sobre el valor:<div id="view_totalEnFabricaPercentage" class="ddjj-total-input ddjj-section-field">{$ddjj->sobrevalor_exw}%</div>
                    </div>
                    <div class="ddjj-total">
                        Total Valor ($us): <div id="view_totalEnFabrica" class="ddjj-total-input ddjj-section-field" valor="{$ddjj->valor_exw_numeric}">{$ddjj->valor_exw_numeric}</div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="row-fluid form">
                    <label class="span6 ddjj-section-label">6.7 Costos de Logistica hasta Frontera Nacional (flete, seguro, carga, etc.)</label>
                    <div class="ddjj-total">
                        Total % sobre el valor:<div id="view_costoFronterePercentage" class="ddjj-total-input ddjj-section-field">{$ddjj->sobrevalor_frontera}%</div>
                    </div>
                    <div class="ddjj-total">
                        Total Valor ($us): <div id="view_costoFrontere" class="ddjj-total-input ddjj-section-field">{$ddjj->valor_frontera}</div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="row-fluid form">
                    <label class="span6 ddjj-section-label">6.8 Total Valor FOB por Producto: (Campo 6.8)= (Campo 6.6) + (Campo 6.7)</label>
                    <div class="ddjj-total">
                        Total % sobre el valor:<div id="view_fobPercentage" class="ddjj-total-input ddjj-section-field">{$ddjj->sobrevalor_fob}%</div>
                    </div>
                    <div class="ddjj-total">
                        Total Valor ($us): <div id="view_fob" class="ddjj-total-input ddjj-section-field">{$ddjj->valor_fob}</div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </section>
            <h2>VII. LA MERCANCIA ES PRODUCIDA EN ZONA FRANCA</h2>
            <section class="ddjj-section">
                <div class="row-fluid form">
                    <div class="span12 ddjj-section-field" id="view_elaboraciondetalle">{foreach $zonas as $zona}{$zona}{if not $zona@last}, {/if}{/foreach}</div>
                </div>
            </section>
            <h2>VIII. DESCRIPCIÓN DEL PROCESO PRODUCTIVO</h2>
            <section class="ddjj-section">
                <div class="row-fluid  form" >
                    <div class="span12 ddjj-section-area" id="view_procesoproductivo">
                        {$ddjj->proceso_productivo}
                    </div>
                </div>
            </section>
            <!--h2>VIII. DETERMINACIÓN DEL CRITERIO DE ORIGEN</h2>
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
                <table class="ddjj-table">
                    <thead><tr><th> REO</th></tr></thead>
                    <tbody>
                    <tr>
                        <td id="view_reo">
                            {$ddjj->reo}
                        </td>
                    </tr>
                    </tbody>
                </table><br>
                <div class="row-fluid  form" >
                    <label class="span2 ddjj-section-label">8.1 Complemento</label>
                    <div class="span10 ddjj-section-area" id="view_complemento">
                        {if $ddjj->complemento}{$ddjj->complemento}{/if}
                    </div>
                </div>
            </section>
                  -->
            <h2>IX. DECLARACION JURADA</h2>
            <section class="ddjj-section-fit">
                <div class="ddjj-declaration">

                    Yo <span class="ddjj-bold">{$representanteEmpresa[0]->nombres} {$representanteEmpresa[0]->paterno} {$representanteEmpresa[0]->materno}</span>, mayor de edad, hábil por ley con documento de identidad N° <span class="ddjj-bold">{$representanteEmpresa[0]->numero_documento}</span>,
                    declaro de mi libre voluntad sin ningún tipo de coacción bajo juramento y asumiendo la responsabilidad legal
                    de lo declarado que la información contenida en el presente formulario es fiel reflejo de la verdad y que la mercancía declarada cumple con las Normas de Origen del <span class="ddjj-bold view_acuerdo_label">{$ddjj->acuerdo->descripcion} ({$ddjj->acuerdo->sigla})</span>, por lo que se faculta
                    al SENAVEX a solicitar mayor información al respecto y realizar visitas de verificación en el momento que así lo requiera, teniendo la obligación de presentar lo que proceda y corresponda.
                    Así como estoy consciente que en caso de falsedad, alteración se proceda iniciar las acciones pertinentes y/o establecer las sanciones respectivas a la unidad productiva y/o comercializadora que represento.
                    Asimismo, doy mi conformidad que cualquier comunicación efectuada por SENAVEX referente a la presente DDJJ será remitida a mi correo electrónico

                    <div class="ddjj-agree">
                        {if $edition }
                            <input type="checkbox" id="aggrement-check"/> Estoy de acuerdo.
                            <span id="aggrement-validation" class="k-widget k-tooltip k-tooltip-validation k-invalid-msg none fadein" ><span class="k-icon k-warning"> </span> Necesita estar de acuerdo.</span>
                        {/if}
                    </div>
                </div>
                <div class="ddjj-qr">

                </div>
            </section>
            {if $review}
                {include file="declaracionJurada/ControlDeclaracionJurada.tpl"}
            {/if}
            {if ($ddjj && $ddjj->ddjjdocumentos|@count!=0) || !$ddjj || $clon}
                <div id="view_documentos_adjuntos">
                    <h2>DOCUMENTOS ADJUNTOS</h2>
                    <section class="ddjj-section">
                        {if !$clon}
                            {foreach $ddjj->ddjjdocumentos as $documento}
                                <a class="ddjj-document" href="documents/ddjj/{$documento->title}" target="_blank">
                                    <img src="styles/img/ddjj/DDJJ_document.png" alt="DOCUMENT"/>
                                    <h3>{$documento->nombre}
                                    </h3>
                                </a>
                            {/foreach}
                        {/if}
                    </section>
                </div>
            {/if}
{*            {if $ddjj && $ddjj->id_estado_ddjj==1 && !$clon}*}
{*                <section class="ddjj-section">*}
{*                    <div class="menucf float-r">*}
{*                        <a href="index.php?opcion=impresionDdjj&tarea=ImpresionDdjj&id_ddjj={$ddjj->id_ddjj}" target="_blank"><img src="styles/img/ddjj/imp_b.png" class="menubottom ayuda"></a>*}
{*                        <a href="index.php?opcion=impresionDdjj&tarea=ImpresionDdjj&id_ddjj={$ddjj->id_ddjj}" target="_blank"><img src="styles/img/ddjj/imp.png" class="menutop ayuda"></a>*}
{*                    </div>*}
{*                </section>*}
{*            {/if}*}
            {if $preview || $documentReview}
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
                    <div class="row-fluid  form" >
                        <label class="span2 ddjj-section-label">Complemento</label>
                        <div class="span10 ddjj-section-area" id="view_complemento">
                            {if $ddjj->complemento}{$ddjj->complemento}{/if}
                        </div>
                    </div>
                </section>
            {elseif $review}
                <div class="row-fluid form" >
                    <ul class="ul-buttons">
                        <li>
                            <button class="k-button btn-lg" id="aceptarDdjj" onclick="aceptarDdjj()" >Aceptar</button>
                        </li>
{*                        {if $ddjj->acuerdo->sigla =="ACE36"}*}
{*                            <li>*}
{*                                <button class="k-button btn-lg" id="actualizarDdjj" onclick="actualizarDdjj()" >Actualizar MEC</button>*}
{*                            </li>*}
{*                        {/if}*}
                        <li>
                            <button class="k-button btn-lg " onclick="rechazarDdjj()">Rechazar</button>
                        </li>
                    </ul>
                </div>
            {elseif $edition}
                <div class="row-fluid form" >
                    <ul class="ul-buttons">
                        <li>
                            <button id="view_ddjj_accept" class="k-button btn-lg button-disabled" onclick="sendDdjjForm()" >Aceptar</button>
                        </li>
                        <li>
                            <input type="button"  value="Cancelar" class="k-button btn-lg " onclick="cambiar('view_ddjj','alta_ddjj_container');if($('#observaciones_ddjj').length) $('#observaciones_ddjj').show()"/>
                        </li>
                    </ul>
                </div>
            {/if}
        </div>
    </div>
</div>
<script>
    $('#view_actualizacion').addClass('hidden');
    //muestra alerta solo qi hay bloqueo
    {if $acuerdoBloqueo}
    fadeMessage('Se bloqueo el acceso al acuerdo {$acuerdoBloqueo->acuerdo->descripcion}, aproximese al SENAVEX a regularizar su Estado.');
    {/if}

    ///solo sirve para asignar la regional de recojo
    function getRegional(){
        cambiar('review','{$id}loading_ddjj');
    }

    function sendDdjjForm() {

        if($("#{$id} #aggrement-check").prop('checked'))
        {

            $('#{$id} #aggrement-validation').hide();
            cambiar('view_ddjj','{$id}loading_ddjj');
            var datos='opcion=admDeclaracionJurada&tarea=saveDeclaracionJurada&';
            datos+=$("#alta_ddjj").serialize();
            datos+='&unidadmedida='+$("#alta_ddjj #unidadmedida").text().trim();
            datos+='&valor_total_insumosnacional='+$("#alta_ddjj #totalValorIN").html().trim();
            datos+='&sobrevalor_total_insumosnacional='+$("#alta_ddjj #totalSobrevalorIN").html().trim();
            datos+='&valor_total_insumosimportados='+$("#alta_ddjj #totalValorII").html().trim();
            datos+='&sobrevalor_total_insumosimportados='+$("#alta_ddjj #totalSobrevalorII").html().trim();
            datos += '&id_partida=' + $('#alta_ddjj #ddjj_arancel').attr('id_partida');
            //datos += '&reo=' + $('#alta_ddjj #ddjj_reo').html().trim();
            var values=genericUpdate();
            datos+='&sobrevalor_mano_obra='+values.manoObraPercentage;
            datos+='&valor_mano_obra='+values.manoObra;
            datos+='&sobrevalor_fob='+values.fobPercentage;
            datos+='&valor_fob='+values.fob;
            datos+='&sobrevalor_exw='+values.exwPercentage;
            datos+='&valor_exw='+values.exw;
            datos+='&sobrevalor_frontera='+values.fronteraPercentage;
            datos+='&valor_frontera='+values.frontera;
            var acuerdo=$('#alta_ddjj input:radio[name="acuerdo"]:checked');
            var id_partidas_acuerdo = [];
            $.each(acuerdo.attr('data-arancel').split(','), function (index, value) {
                if($('#denominacion_arancel_'+value).length) {
                    id_partidas_acuerdo.push($('#' + value + '_ddjj_arancel').attr('id_partida'));
                }
            });
            datos+='&id_partidas_acuerdo='+JSON.stringify(id_partidas_acuerdo);
            if(tabla_comercializadores.dataSource.total()!=0) datos+='&tabla_comercializadores='+getTableData(tabla_comercializadores);
            if(tabla_insumosnacionales.dataSource.total()!=0) datos+='&tabla_insumosnacionales='+getTableData(tabla_insumosnacionales);
            if(tabla_insumosimportados.dataSource.total()!=0) datos+='&tabla_insumosimportados='+getTableData(tabla_insumosimportados);
//        datos += '&criterios_origen=' + JSON.stringify($('#criterio_origen').data("kendoMultiSelect").value());

            var files = documentos_files;
            var documents = files.map(function(item){ return { name:item.name , format:item.type ,size:item.size,edit:item.edit}; });
            datos+='&ddjj_documents='+JSON.stringify(documents);
            {if $edition && $ddjj->id_ddjj && !$clon}
            datos+='&id_ddjj='+{$ddjj->id_ddjj};
            if($('#observacion_general').length && $('#observacion_general').val().trim()!=""){
                datos+='&observacion_general='+$('#observacion_general').val();
            }
            {/if}
            $.ajax({
                type: 'post',
                url: 'index.php',
                data: datos,
                success: function(data) {
                    data=JSON.parse(data);
                    if(data.status='success'){
                        cambiar('{$id}loading_ddjj','ddjj_notice_ddjj'); //alert("entra");
                    }else{
                        alert('Se produjo un error Intente nuevamente');
                        console.log(data);
                        cambiar('{$id}loading_ddjj','alta_ddjj');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Se produjo un error Intente nuevamente');
                    cambiar('{$id}loading_ddjj','alta_ddjj');
                    console.log('jqXHR:');
                    console.log(jqXHR);
                    console.log('textStatus:');
                    console.log(textStatus);
                    console.log('errorThrown:');
                    console.log(errorThrown);
                }
            });
        }
        else $('#{$id} #aggrement-validation').show();
    }
    $('#aggrement-validation').hide();
    $("#aggrement-check").change(function () {
        if($(this).prop('checked')){
            $('#view_ddjj_accept').removeClass('button-disabled');
            $('#aggrement-validation').hide();
        }
        else $('#view_ddjj_accept').addClass('button-disabled');
    });
    function fillForm() {
        $('#{$id} #view_denominacion_comercial').html($('#alta_ddjj #denominacion_comercial').val());
        $('#{$id} #view_nombre_tecnico').html($('#alta_ddjj #nombre_tecnico').val());
        $('#{$id} #view_aplicacion').html($('#alta_ddjj #aplicacion').val());
        $('#{$id} #view_caracteristicas').html($('#alta_ddjj #caracteristicas').val());

        $('#{$id} #view_ddjj_arancel').html($('#alta_ddjj #ddjj_arancel').val());

        $('#{$id} #view_descripcion_arancel').html($('#alta_ddjj #descripcion_arancel').text());

        $('#{$id} #view_unidadmedida').html($('#alta_ddjj #unidadmedida').text());
        //if($('#alta_ddjj #complemento_criterio_origen').val()){
        if($('#alta_ddjj input:radio[name="muestra"]:checked').val()=="true") $('#{$id} #view_muestra').html('SI');
        else $('#{$id} #view_muestra').html('NO');

        $('#{$id} #view_produccion_mensual_mercancia').html($('#alta_ddjj #produccion_mensual_mercancia').val());
        $('#{$id} #view_procesoproductivo').html($('#alta_ddjj #procesoproductivo').val());

        if($('#alta_ddjj #complemento_criterio_origen').val()) $('#{$id} #view_complemento').html($('#alta_ddjj #complemento_criterio_origen').val());
        else  $('#{$id} #view_complemento').html('');



        var acuerdo=$('#alta_ddjj input:radio[name="acuerdo"]:checked');
        $('#{$id}').find('.view_acuerdo_label').html(acuerdo.attr('data-acuerdo-descripcion')+' ('+acuerdo.attr('data-acuerdo-sigla')+')');
        var acuerdo_item=$('<div class="view_acuerdo_item"><div class="row-fluid"><label class="span2 ddjj-section-label">5.2 Clasificación Usada</label><div class="span3 ddjj-section-field view_acuerdo_item_partida"></div><label class="span2 ddjj-section-label">5.3 Subpartida Arancelaria</label><div class="span5 ddjj-section-field view_acuerdo_item_clacificacion"></div></div><div class="row-fluid"><label class="span3 ddjj-section-label">5.4 Descripción Arancel:</label><div class="span9 ddjj-section-field view_acuerdo_item_descripcion"></div></div></div>');    $('#view_acuerdo_container .view_acuerdo_item').remove();
        $.each(acuerdo.attr('data-arancel').split(','), function (index, value) {
            if($('#denominacion_arancel_'+value).length) {
                acuerdo_item.find('.view_acuerdo_item_partida').html($('#denominacion_arancel_' + value).text());
                acuerdo_item.find('.view_acuerdo_item_clacificacion').html($('#' + value + '_ddjj_arancel').val());
                acuerdo_item.find('.view_acuerdo_item_descripcion').html($('#descripcion_arancel_' + value).text());
                acuerdo_item.clone().appendTo('#view_acuerdo_container');
            }
        });

        $('#{$id} #ddjj_fabrica').show();
        if($('#alta_ddjj input:radio[name="esComercializador"]:checked').val()=="false") $('#{$id} #view_productor').hide();
        else{
            $('#{$id} #view_productor').show();
            var tabla_data=generateTableHtml(tabla_comercializadores,totalPercentage());
            $('#{$id} #view_productor .ddjj-table').html('').append(tabla_data.head).append(tabla_data.body);

            var  fabrica_selected = $("#combo_fabricas").data("kendoComboBox").select();
            if(fabrica_selected !=-1){
                $('#ddjj_fabrica').removeClass('none');
                $('#{$id} #view_fabrica').html(fabrica_object.direccion);
                $('#{$id} #view_fabrica_ciudad').html(fabrica_object.ciudad);
                $('#{$id} #view_fabrica_contacto').html(fabrica_object.contacto);
                $('#{$id} #view_fabrica_telefono').html(fabrica_object.telefono);
            }
            else{
                $('#ddjj_fabrica').addClass('none');
            }
        }

        if(tabla_insumosnacionales.dataSource.total()==0) $('#{$id} #view_insumos_nacionales').hide();
        else{
            $('#{$id} #view_insumos_nacionales').show();
            var tabla_data=generateTableHtml(tabla_insumosnacionales,totalPercentage());
            $('#{$id} #view_insumos_nacionales .ddjj-table').html('').prepend(tabla_data.head).append(tabla_data.body).append(tabla_data.footer);
            $('#{$id} #view_insumos_nacionales .view-total-valor').html($('#totalValorIN').html());
            $('#{$id} #view_insumos_nacionales .view-total-sobrevalor').html($('#totalSobrevalorIN').html()+'%');

        }
        if(tabla_insumosimportados.dataSource.total()==0) $('#{$id} #view_insumosimportados').hide();
        else{
            $('#{$id} #view_insumosimportados').show();
            var tabla_data=generateTableHtml(tabla_insumosimportados,totalPercentage());
            $('#{$id} #view_insumosimportados .ddjj-table').html('').prepend(tabla_data.head).append(tabla_data.body).append(tabla_data.footer);
            $('#{$id} #view_insumosimportados .view-total-valor').html($('#totalValorII').html());
            $('#{$id} #view_insumosimportados .view-total-sobrevalor').html($('#totalSobrevalorII').html()+'%');
        }

        var values=genericUpdate();

        $('#{$id} #view_totalValorMO').html(kendo.toString(values.manoObra, "n").split('.').join(""));
        $('#{$id} #view_totalSobrevalorMO').html(values.manoObraPercentage+'%');
        $('#{$id} #view_totalEnFabrica').html(kendo.toString(values.exw, "n").split('.').join(""));
        $('#{$id} #view_totalEnFabricaPercentage').html(values.exwPercentage+'%');
        $('#{$id} #view_costoFrontere').html(kendo.toString(values.frontera, "n").split('.').join(""));
        $('#{$id} #view_costoFronterePercentage').html(values.fronteraPercentage+'%');
        $('#{$id} #view_fob').html(kendo.toString(values.fob, "n").split('.').join(""));
        $('#{$id} #view_fobPercentage').html(values.fobPercentage+'%');


        //var zonas_especiales=$('#alta_ddjj input:radio[name="lista_elaboracion"]:checked');
        //var acuerdo=$('#alta_ddjj input:radio[name="elaboracion_detalle"]:checked');
        $('#{$id} #view_elaboraciondetalle').html($('#alta_ddjj input:radio[name="lista_elaboracion"]:checked').val());
        if (($('#alta_ddjj input:radio[name="lista_elaboracion"]:checked').val())==1)
        {
            $('#{$id} #view_elaboraciondetalle').html("La mercancia SI es producida en Zona Franca ");
        }
        else
        {
            $('#{$id} #view_elaboraciondetalle').html("La mercancia NO es producida en Zona Franca ");
        }



        $("#{$id} #view_reo").html($('#alta_ddjj #ddjj_reo').text());

        var documents=documentos_files;
        if(documents.length)
        {
            $('#view_documentos_adjuntos').show();
            var document_container=$('#view_documentos_adjuntos').find('.ddjj-section');
            document_container.html('');
            var key = $('#alta_ddjj_key').val();
            $.each(documents,function (index,object) {
                if(object.status=='success'){
                    if(object.edit){
                        var figure=$('<a href="documents/ddjj/'+object.title+'" target="_blank" class="ddjj-document"><img src="styles/img/ddjj/DDJJ_document.png" alt="DOCUMENT"/><h3>'+object.name+'</h3></a>');
                    }else{
                        var figure=$('<a href="documents/tmp/'+key+'/'+object.name+'" target="_blank" class="ddjj-document"><img src="styles/img/ddjj/DDJJ_document.png" alt="DOCUMENT"/><h3>'+object.name+'</h3></a>');
                    }
                }
                document_container.append(figure);
            });
        }
        else $('#view_documentos_adjuntos').hide();
    }
</script>
{if $review}
    {include file="declaracionJurada/LoadingDeclaracionJurada.tpl" customtitle="Enviando Información"}
    {include file="declaracionJurada/NoticeDeclaracionJurada.tpl" custom_message="Se reviso correctamente la declaracion jurada" review_ddjj="true" id="review"}
    <script>

        $("#combo_actualizacionesDDJJ").kendoComboBox({
            dataTextField: "text",
            dataValueField: "value",
            dataSource: [
                { text: "Primera Actualización", value: "1" },
                { text: "Segunda Actualización", value: "2" },
                { text: "Tercera Actualización", value: "3" }
            ],
            filter: "contains",
            suggest: true,
            index: 3
        });

        function actualizarDdjj()
        {
            $('#view_actualizacion').removeClass('hidden');
            $('#{$id}').hide();
        }
        //FUNCION PARA ACEPTAR UNA DDJJ
        function aceptarDdjj() {
            if(!$('#criterio_origen').data("kendoMultiSelect").value().length){
                $('#criterio_origen-validation').removeClass('hidden').addClass('fadein');
                return;
            }
            $('#criterio_origen-validation').removeClass('fadein').addClass('hidden');
            $('#obervacion-validation').hide();
            $('#justificacionVerificacion').next().addClass('hidden');

            var cambioVerificacion=JSON.stringify(verificacion) !== JSON.stringify(verificacion_inicial);

            if(!cambioVerificacion || (cambioVerificacion  && $('#justificacionVerificacion').val().trim()!='')){
                cambiar('review','{$id}loading_ddjj');
                var data='opcion=admDeclaracionJurada&tarea=aproveDdjj&id_ddjj={$ddjj->id_ddjj}';
                data+='&observacion_general='+$('#observacion_general').val();
                // data+='&observacion_ddjj='+$('#observacion_ddjj').val();
                data += '&criterios_origen=' + JSON.stringify($('#criterio_origen').data("kendoMultiSelect").value());

                verificacion.verificacion_personal=cambioVerificacion;
                verificacion.justificacion_verificacion=$('#justificacionVerificacion').val();
                data+='&verificacion='+JSON.stringify(verificacion);

                $("#review_notice_ddjj .ddjj-message").text("Se reviso correctamente la declaración jurada.");

                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: data,
                    success: function(data) {
                        data=JSON.parse(data);
                        if(data.status=1){
                            cambiar('{$id}loading_ddjj','review_notice_ddjj');
                        }else{
                            alert('Se produjo un error Intente nuevamente');
                            console.log(data);
                            cambiar('{$id}loading_ddjj','review');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Se produjo un error Intente nuevamente');
                        cambiar('{$id}loading_ddjj','alta_ddjj');
                        console.log('jqXHR:');
                        console.log(jqXHR);
                        console.log('textStatus:');
                        console.log(textStatus);
                        console.log('errorThrown:');
                        console.log(errorThrown);
                    }
                });
            }else{
                $('#justificacionVerificacion').next().removeClass('hidden');
            }
        }
        function rechazarDdjj() {
            if($('#observacion_general').val().trim()!='')
            {
                $('#obervacion-validation').hide();
                cambiar('review','{$id}loading_ddjj');
                var data='opcion=admDeclaracionJurada&tarea=denyDdjj&id_ddjj={$ddjj->id_ddjj}';
                data+='&observacion_general='+$('#observacion_general').val();

                $("#review_notice_ddjj .ddjj-message").text("Se rechazo correctamente la declaración jurada.");

                $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: data,
                    success: function(data) {
                        data=JSON.parse(data);
                        if(data.status=1){
                            cambiar('{$id}loading_ddjj','review_notice_ddjj');
                        }else{
                            alert('Se produjo un error Intente nuevamente');
                            console.log(data);
                            cambiar('{$id}loading_ddjj','review');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Se produjo un error Intente nuevamente');
                        cambiar('{$id}loading_ddjj','alta_ddjj');
                        console.log('jqXHR:');
                        console.log(jqXHR);
                        console.log('textStatus:');
                        console.log(textStatus);
                        console.log('errorThrown:');
                        console.log(errorThrown);
                    }
                });

            }else   $('#obervacion-validation').show();
        }
    </script>
{/if}